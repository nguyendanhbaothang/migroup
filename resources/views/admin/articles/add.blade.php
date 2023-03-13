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
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Nội dung</label>
                                        <textarea class="form-control" placeholder="Nội dung" name="content" rows="4" cols="4"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Ngày đăng</label>
                                        <div class="row g-3">
                                            <div class="col-lg-12">
                                                <input type="date" class="form-control" name="date"
                                                    placeholder="Ngày đăng">
                                            </div>
                                        </div>
                                    </div>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">--Vui lòng chọn--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                    <select name="author_id" id="" class="form-control">
                                        <option value="">--Vui lòng chọn--</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach

                                    </select>

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
