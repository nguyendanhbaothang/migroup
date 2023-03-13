<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $categories = Category::paginate(5);
        $param = [
            'categories'=> $categories
        ];
        return view('admin.category.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        alert()->success('Thêm thể loại','thành công');
        return redirect()->route('categories.index');
    } catch (\Exception) {
        alert()->error('Thêm thể loại','thất bại');
        return redirect()->route('categories.index');
    }
    }
    public function edit(string $id)
    {
        $this->authorize('update', Category::class);
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        alert()->success('Sửa thể loại','thành công');
        return redirect()->route('categories.index');
    } catch (\Exception) {
        alert()->error('Sửa thể loại','thất bại');
        return redirect()->route('categories.index');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Category::class);
        try {
        Category::find($id)->delete();
        alert()->success('Xóa thể loại','thành công');
        return redirect()->route('categories.index');
    } catch (\Exception) {
        alert()->error('Xóa thể loại','thất bại');
        return redirect()->route('categories.index');
    }
}
}
