@extends('admin.include.master')
@section('content')
    <main class="page-content">
        <h2>Thêm thể loại</h2>
        <div class="container">

            <div class="col-12 col-lg-12 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('categories.store') }}" method='post'>
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Tên</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên thể loại">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Thêm</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-primary">Quay lại</a>
                            </div>
                        </form><br>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
