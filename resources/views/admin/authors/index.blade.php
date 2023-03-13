@extends('admin.include.master')
@section('content')
    <main class="page-content">
        <h1>Tên tác giả</h1>
        @include('sweetalert::alert')
        @if(Auth::user()->hasPermission('Author_create'))
        <a href="{{route('authors.create')}}" class="btn btn-primary">Thêm tác giả</a>
        @endif
        <div class="container">
            <table class="table">
                <div class="col-6">
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên</th>
                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($authors as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>
                                <form action="{{route('authors.destroy',[$team->id])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    @if (Auth::user()->hasPermission('Author_delete'))
                                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');" class="btn btn-danger">Xóa</button>
                                    @endif
                                    @if (Auth::user()->hasPermission('Author_update'))
                                    <a href="{{route('authors.edit',[$team->id])}}" class="btn btn-warning">Sửa</a>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $authors->appends(request()->query()) }}
        </div>
    </main>
@endsection
