@extends('admin.include.master')
@section('content')
    <main class="page-content">
        <h1>Danh sách bài viết</h1>
        @include('sweetalert::alert')
        @if (Auth::user()->hasPermission('Article_create'))
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Thêm tác giả</a>
        @endif
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Trạng thái</th>
                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($articles as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->title }}</td>
                            <td>{{ $team->category->name }}</td>
                            <td>{{ $team->author->name }}</td>

                            <td>
                                @if ($team->status == 0)
                                    <form>
                                        @csrf
                                        <select name="status" data-order_id="{{ $team->id }}"
                                            class="custom-select trangthai">
                                            <option selected value="0">Chờ duyệt</option>
                                            <option value="1">Đã duyệt</option>
                                        </select>
                                    </form>
                                @else
                                    <form>
                                        @csrf
                                        <select name="status" data-order_id="{{ $team->id }}" id="status"
                                            class="custom-select trangthai">
                                            <option value="0" <?= $team->status == 0 ? 'selected' : '' ?>>Chờ duyệt
                                            </option>
                                            <option value="1" <?= $team->status == 1 ? 'selected' : '' ?>>Đã duyệt
                                            </option>
                                        </select>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('articles.destroy', [$team->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    @if (Auth::user()->hasPermission('Article_delete'))
                                        <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                            class="btn btn-danger">Xóa</button>
                                    @endif
                                    @if (Auth::user()->hasPermission('Article_update'))
                                    <a href="{{ route('articles.edit', [$team->id]) }}" class="btn btn-warning">Sửa</a>
                                    @endif
                                    @if (Auth::user()->hasPermission('Article_view'))
                                    <a href="{{ route('articles.show', $team->id) }}" class="btn btn-warning">Chi tiết</a>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-6">
                <div class="pagination float-right">
                    {{ $articles->appends(request()->query()) }}
                </div>
            </div>
    </main>
    <script type="text/javascript">
        $('.trangthai').change(function() {
            const order_id = $(this).data('order_id');
            const trangthai = $(this).val();
            var _token = $('input[name="_token"]').val();
            if (trangthai == 0) {
                var thongbao = 'Thay đổi trạng thái thành chờ duyệt';
            } else {
                var thongbao = 'Thay đổi trạng thái thành đã giao';
            }
            $.ajax({
                url: "{{ route('articles.status') }}",
                method: "POST",
                data: {
                    trangthai: trangthai,
                    _token: _token,
                    order_id: order_id
                },
                success: function(data) {
                    alert(thongbao);
                }
            });
        });
    </script>
@endsection
