@extends('admin.include.master')
@section('content')
    <main class="page-content">
        <h2>Sửa thể loại</h2>
        <div class="container">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('categories.update', [$categories->id]) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Tên</label>
                                <input type="text" class="form-control" value="{{ $categories->name }}" name="name">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Thêm thể loại</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-primary">Quay lại</a>
                            </div>
                        </form><br>

                    </div>
                </div>
            </div>
    </main>
@endsection
