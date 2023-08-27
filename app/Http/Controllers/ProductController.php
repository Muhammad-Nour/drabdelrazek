<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductGallery;

use App\Traits\UploadPhotoTrait;
use App\Traits\UploadSmallImage;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use UploadPhotoTrait;
    use UploadSmallImage;

    function __construct()
    {
        $this->middleware('permission:products', ['only' => ['index']]);
        $this->middleware('permission:add_products', ['only' => ['create','store']]);
        $this->middleware('permission:edit_products', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_products', ['only' => ['destroy']]);
        $this->middleware('permission:product_details', ['only' => ['getDetails']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);

        return view('admin.products.product-show',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.product-add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();

        $request->validated();

        $path  = $this->UploadPhotoTrait($request,'admin');

        $smallpath  = $this->UploadSmallImage($request,'admin');
        
        $products = Product::create([
            'photo'=>$path,
            'small_photo'=>$smallpath,
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'unit_ar'=>$request->unit_ar,
            'unit_en'=>$request->unit_en,

            'price'=>$request->price,
            'pre_price'=>$request->pre_price,
            'purchase_price'=>$request->purchase_price,
            'notify'=>$request->notify,
            'quantity'=>$request->quantity,

            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
            'description_ar'=>$request->description_ar,
            'description_en'=>$request->description_en,

            'updated_by' => Auth::user()->id,
            'category_id'=>$request->category_id,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'admin_id' => Auth::user()->id
        ]);

        if($request->hasFile('gallery'))
        {
            $files = $request->file('gallery');

            foreach($files as $file){

                $filename = $file->getClientOriginalName();

                $path  = $file->storeAs('admin',$filename,'galleries');

                ProductGallery::create([
                    'product_id' => $products->id,
                    'photo' => $path,
                    'admin_id' => Auth::user()->id
                ]);
            }
        }

        DB::commit();
        
        return redirect()->back()->withInput()->with('msg',__('site.addedMessage'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories   = Category::all();

        return view('admin.products.product-edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editMainImages(Product $product)
    {
        $products = Product::where('id',$product->id)->get();
        
        return view('admin.products.product-edit-main-image',
            compact('products','product'));
    }

    public function updateMainImage(Product $product,Request $request)
    {

        DB::beginTransaction();

        $path  = $this->UploadPhotoTrait($request,'admin');

        $smallpath  = $this->UploadSmallImage($request,'admin');

        $product->update([
            'photo'=>$path,
            'small_photo'=>$smallpath,
        ]);
        
        DB::commit();

        return redirect()->back()->withInput()->with('msg',__('site.updatedMessage'));
    }

    public function deleteMainImages(Product $product , Request $request)
    {
        $value = $request->deleteimage ; 

        if( $value == 1) 
        {
            $item = Product::where('id',$product->id)->first();
            
            $item->update(['photo'=>null]);
        }elseif ($value == 2) {
            $item = Product::where('id',$product->id)->first();
            
            $item->update(['small_photo'=>null]);
        }
        
        return redirect()->back()->withInput()->with('msg',__('site.deletedMessage'));
    }

    public function addImage(Product $product , Request $request)
    {
        if($request->hasFile('gallery'))
        {
            $files = $request->file('gallery');

            foreach($files as $file){

                $filename = $file->getClientOriginalName();

                $path  = $file->storeAs('admin',$filename,'galleries');

                ProductGallery::create([
                    'product_id' => $request->product_id,
                    'photo' => $path,
                    'admin_id' => Auth::user()->id
                ]);
            }
        }

        return redirect()->back()->withInput()->with('msg',__('site.addedMessage'));


    }

    public function getDetails(Product $product)
    {
        $ProductGallery = ProductGallery::where('product_id',$product->id)->get();

        $products = Product::where('id',$product->id)->get();

        return view('admin.products.product-details',
            compact('ProductGallery','products','product'));
    }

    public function update(ProductRequest $request, Product $product)
    {


        $product->update($request->validated());

        return redirect(route('products.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();

        $product_quantity = $product->quantity;

        if($product_quantity > 0){
            return back()->withErrors(__('site.error'));
        }

        $product->delete();

        $gallery = ProductGallery::where('product_id',$product->id)->delete();

        DB::commit();

        return redirect(route('products.index'))->with('msg',__('site.deletedMessage'));
    }
}
