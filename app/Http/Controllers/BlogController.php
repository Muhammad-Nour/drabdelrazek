<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadNewsPhoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:news', ['only' => ['index']]);
        $this->middleware('permission:add_news', ['only' => ['create','store']]);
        $this->middleware('permission:edit_news', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_news', ['only' => ['destroy']]);
    }

    use UploadNewsPhoto;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(20);

        $paginate = true ;

        return view('admin.news.news-show',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.news-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            $photo = storePhoto($request, 'photo', 'news');
            $columns['photo'] = $photo;
        }

        News::create($columns);

        return redirect(route('news.create'))->with('msg',__('site.addedMessage'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.news-edit',compact('news'));
    }


    public function update(NewsRequest $request, News $news)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            deletePhoto($news->photo);
            $photo = storePhoto($request, 'photo', 'news');
            $columns['photo'] = $photo;
        }
        else{
            unset($columns['photo']);
        }

        $news->update($columns);

        return redirect(route('news.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        deletePhoto($news->photo);
        $news->delete();

        return redirect(route('news.index'))->with('msg',__('site.deletedMessage'));

    }
}
