@extends('admin.include.master')
@section('content')
    <main class="page-content">
        <div class="container">

            <h2>Thêm bài viết</h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card">
                        </div>
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form class="row g-3" action="{{ route('articles.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Tên</label>
                                        <input type="text" class="form-control" name="title" placeholder="Tiêu đề">
                                        @error('title')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Nội dung</label>
                                        <textarea class="form-control" placeholder="Nội dung" name="content" rows="4" cols="4"></textarea>
                                        @error('content')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Ngày đăng</label>
                                        <div class="row g-3">
                                            <div class="col-lg-12">
                                                <input type="date" class="form-control" name="date"
                                                    placeholder="Ngày đăng">
                                                @error('price')
                                                    <div style="color: red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">--Vui lòng chọn--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror

                                    <select name="author_id" id="" class="form-control">
                                        <option value="">--Vui lòng chọn--</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('author_id ')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror

                                    <div class="ol-12">
                                        <label >Trạng thái</label>
                                        <select name="status" class="form-select" >
                                            <option value="">----Vui lòng chọn----</option>
                                            <option value="0">Chờ duyệt</option>
                                            <option value="1">Đã duyệt</option>
                                        </select>
                                        @error('status')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary px-4">Thêm sản phảm</button>
                                        <a class="btn btn-primary px-4" href="{{ route('articles.index') }}"
                                            class="w3-button w3-red">Quay Lại</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
