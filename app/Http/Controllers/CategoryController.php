<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:categories', ['only' => ['index']]);
        $this->middleware('permission:add_category', ['only' => ['create','store']]);
        $this->middleware('permission:edit_category', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_category', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(20);
        $paginate = true;
        return view('admin.categories.category-show', compact('categories','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.category-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect(route('categories.create'))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.category-edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $category->update($request->validated());

        return redirect(route('categories.index'))->with('msg',__('site.updatedMessage'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $product = $category->products;

        if($product->count() > 0){
            return back()->withErrors('لا يمن حذف هذا القسم يوجد أصناف مرتبطة به ');
        }

        $category->delete();

        return redirect(route('categories.index'))->with('msg',__('site.deletedMessage'));

    }

    public function report(Request $request)
    {
        $name = $request->category;

        $condition = [];

        if($name){

            $condition[] = ['name','LIKE',"%{$name}%"];

            }

        $categories = Category::where($condition)->get();

        $report = true;

        return view('admin.categories.category-show', compact('categories', 'request' , 'report'));
    }
}
