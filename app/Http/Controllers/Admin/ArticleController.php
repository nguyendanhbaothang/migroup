<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Article::class);

        $articles = Article::paginate(5);
        $param = [
            'articles'=> $articles
        ];
        return view('admin.articles.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Article::class);
        $categories=Category::get();
        $authors=Author::get();
        $param = [
            'categories' => $categories,
            'authors' => $authors
        ];
        return view('admin.articles.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->date = $request->date;
        $article->category_id = $request->category_id;
        $article->author_id  = $request->author_id ;
        $article->status = $request->status;
        $article->save();
        alert()->success('Thêm bài viết','thành công');
        return redirect()->route('articles.index');
    } catch (\Exception) {
        alert()->success('Thêm bài viết','thất bại');
        return redirect()->route('articles.index');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('view', Article::class);

        $articleshow = Article::findOrFail($id);
        $param =[
            'articleshow'=>$articleshow,
        ];
        return view('admin.articles.show',  $param );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', Author::class);
        $article = Article::find($id);
        $categories=Category::get();
        $authors=Author::get();
        $param = [
            'article' => $article ,
            'categories' => $categories,
            'authors' => $authors
        ];
        return view('admin.articles.edit' , $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->date = $request->date;
        $article->category_id = $request->category_id;
        $article->author_id  = $request->author_id ;
        $article->status = $request->status;
        $article->save();
        alert()->success('Sửa bài viết','thành công');
        return redirect()->route('articles.index');
    } catch (\Exception) {
        alert()->success('Sửa bài viết','thất bại');
        return redirect()->route('articles.index');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete',Article::class);
        try {
        Article::find($id)->delete();
        alert()->success('Xóa bài viết','thành công');
        return redirect()->route('articles.index');
    } catch (\Exception) {
        alert()->success('Xóa bài viết','thất bại');
        return redirect()->route('articles.index');
    }
    }
    public function status(Request $request){
        $trangthai = Article::find($request->order_id);
        $trangthai->status = $request->trangthai;
        $trangthai->save();
    }
}
