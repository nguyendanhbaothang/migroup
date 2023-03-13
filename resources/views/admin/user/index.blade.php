@extends('admin.include.master')
@section('content')
<style>
    img#avt {
width: 80px;
height: 80px;
border-radius:50%;
-moz-border-radius:50%;
-webkit-border-radius:50%;
}
</style>
<main class="page-content">

<section class="wrapper">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                    <header class="page-title-bar">
                        <h1 class="page-title">Sản phẩm</h1>
                        @include('sweetalert::alert')
                        @if (Auth::user()->hasPermission('User_create'))
                        <a href="{{ route('user.create') }}" class="btn btn-info">Đăng ký tài khoản user</a>
                        @endif
                    </header>
                    <hr>
                    <div class="panel-heading">
                      <h3> Nhân sự</h3>
                    </div>
                    <div>
                        <table class="table" ui-jq="footable"
                            ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>

                            <thead>
                                <tr>
                                    <th data-breakpoints="xs">Stt</th>
                                    <th>Avatar</th>
                                    <th>Tên</th>
                                    <th>Phone</th>
                                    <th>Chức vụ</th>
                                    <th data-breakpoints="xs">Tùy Chỉnh</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($users as $key => $user)
                                    <tr data-expanded="true" class="item-{{ $user->id }}">
                                        <td>{{  ++$key }}</td>
                                        <td><a href="{{ route('user.show', $user->id) }}"><img id="avt" src="{{asset('public/assets/images/user/' . $user->image)}}" alt=""></a></td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->group->name }}</td>
                                        <td>
                                            @if (Auth::user()->hasPermission('User_update'))
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-warning">Sửa</a>
                                            @endif
                                            @if (Auth::user()->hasPermission('User_delete'))
                                            <a data-href="{{ route('user.destroy', $user->id) }}"
                                                id="{{ $user->id }}" class="btn btn-danger deleteIcon">Xóa</i></a>
                                            @endif
                                            @if (Auth::user()->hasPermission('User_adminUpdatePass'))
                                            <a href="{{ route('user.adminpass', $user->id) }}"
                                                class="btn btn-info">Đổi mật khẩu</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       {{-- {{ $users->appends(request()->query()) }} --}}
                    </div>
                </div>
            </div>
        </section>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
           $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            console.log(id);
            Swal.fire({
                title: 'Bạn có chắc không?',
                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'delete',
                        data: {
                            _token: csrf
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Tệp của bạn đã bị xóa!',
                                'success'
                            )
                            $('.item-' + id).remove();
                        },
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Tuổi...?',
                        text: 'Tuổi gì đòi xóa Supper Admin!',
                    })
                }
            })
        });
        </script>

        <script>
            Swal.bindClickHandler()
            Swal.mixin({
            toast: true,
            icon: 'error',
            text: "Ngu!",
            }).bindClickHandler('data-swal-toast-template')
        </script>
</section>
</main>
@endsection
