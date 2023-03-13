@extends('admin.include.master')
@section('content')
    <main class="page-content">
        <h2>Sửa bài viết</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form class="row g-3" action="{{ route('articles.update', [$article->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" value="{{ $article->title }}" name="title"
                                        placeholder="Tên tiêu đề">
                                    @error('title')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Sự mô tả</label>
                                    <textarea class="form-control" placeholder="Nội dung" value="" name="content" rows="4" cols="4">{{ $article->content }}</textarea>
                                    @error('content')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Ngày đăng</label>
                                    <div class="row g-3">
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="{{ $article->date }}"
                                                name="date" placeholder="Ngày đăng">
                                            @error('date')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <label class="form-label">Chọn thể Loại</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    @foreach ($categories as $category)
                                        <option <?= $category->id == $article->category_id ? 'selected' : '' ?>
                                            value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror

                                <label class="form-label">Chọn thể Loại</label>
                                <select name="author_id" id="" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    @foreach ($authors as $author)
                                        <option <?= $author->id == $article->author_id  ? 'selected' : '' ?>
                                            value="{{ $author->id }}">
                                            {{ $author->name }}</option>
                                    @endforeach
                                </select>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" >Trạng thái</label>
                                    <select name="status" class="form-select" id="inputGroupSelect02">
                                    @if($article->status==0)
                                        <option selected value="0">Chưa duyệt<table></table></option>
                                        <option value="1">Đã duyệt</option>
                                    @else
                                        <option  value="0">Chưa duyệt<table></table></option>
                                        <option selected value="1">Đã duyệt</option>
                                    @endif
                                    </select>
                                    </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">Hoàn thành</button>
                                    <a class="btn btn-primary px-4" href="{{ route('authors.index') }}"
                                        class="w3-button w3-red">Quay Lại</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
