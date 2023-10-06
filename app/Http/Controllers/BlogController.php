<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:blogs', ['only' => ['index']]);
        $this->middleware('permission:add_blogs', ['only' => ['create','store']]);
        $this->middleware('permission:edit_blogs', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_blogs', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(20);

        $paginate = true ;

        return view('admin.blogs.blog-show',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.blog-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            $photo = storePhoto($request, 'photo', 'blog');
            $columns['photo'] = $photo;
        }

        Blog::create($columns);

        return redirect(route('blogs.create'))->with('msg',__('site.addedMessage'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.blog-edit',compact('blog'));
    }


    public function update(BlogRequest $request, Blog $blog)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            deletePhoto($blog->photo);
            $photo = storePhoto($request, 'photo', 'blog');
            $columns['photo'] = $photo;
        }
        else{
            unset($columns['photo']);
        }

        $blog->update($columns);

        return redirect(route('blogs.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        deletePhoto($blog->photo);

        $blog->delete();

        return redirect(route('blogs.index'))->with('msg',__('site.deletedMessage'));

    }
}
