<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Author::class);
        $authors = Author::paginate(5);
        $param = [
            'authors'=> $authors
        ];
        return view('admin.authors.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Author::class);
        return view('admin.authors.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $author = new Author();
        $author->name = $request->name;
        $author->save();
        alert()->success('Thêm tác giả','thành công');
        return redirect()->route('authors.index');
    } catch (\Exception) {
        alert()->error('Thêm tác giả','thất bại');
        return redirect()->route('authors.index');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', Author::class);
        $authors = Author::find($id);
        return view('admin.authors.edit', compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
        $authors = Author::find($id);
        $authors->name = $request->name;
        $authors->save();
        alert()->success('Sửa tác giả','thành công');
        return redirect()->route('authors.index');
    } catch (\Exception) {
        alert()->error('Sửa tác giả','thất bại');
        return redirect()->route('authors.index');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete',Author::class);
        try{
        Author::find($id)->delete();
        alert()->success('Xóa tác giả','thành công');
        return redirect()->route('authors.index');
    } catch (\Exception) {
        alert()->error('Xóa tác giả','thất bại');
        return redirect()->route('authors.index');
    }
    }
}
