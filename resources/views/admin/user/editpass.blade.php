@extends('admin.include.master')
@section('content')
<main class="page-content">

    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <div class="page-inner">
                        <header class="page-title-bar">
                            <nav aria-label="breadcrumb">
                            </nav>
                            <h1 class="page-title">Thay đổi mật khẩu của {{ auth()->user()->name }}</h1>
                        </header>
                        <hr>
                        <div class="page-section">

                            <form class="form-horizontal bucket-form" action="{{ route('user.updatepass', $user->id) }}"
                                method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group has-success">
                                    <label class="col-sm-3 control-label col-lg-3" for="currentPassword">Mật khẩu hiện
                                        tại</label>
                                    <div class="col-lg-6">
                                        <input name="password" type="password" class="form-control" id="inputSuccess">
                                    </div>
                                </div>
                                @error('password')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="form-group has-warning">
                                    <label class="col-sm-3 control-label col-lg-3" for="newPassword">Mật khẩu mới</label>
                                    <div class="col-lg-6">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>
                                @error('newpassword')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="form-group has-warning">
                                    <label class="col-sm-3 control-label col-lg-3" for="renewPassword">Nhập lại mật khẩu
                                        mới</label>
                                    <div class="col-lg-6">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                    </div>
                                </div>
                                @error('renewpassword')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="w3-button w3-blue">Lưu mật khẩu</button>
                                    <a href="{{ route('user.index') }}" class="w3-button w3-red">Hủy</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @php
       if(Session::has('saipass')){
       @endphp
       Swal.fire({
            icon: 'error',
            title: 'Sai mật khẩu mất rồi!',
            text: "Có thể liên hệ với SpAdmin để được cấp lại mật khẩu nhé♥",
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp
        @php
       if(Session::has('sainhap')){
       @endphp
       Swal.fire({
            icon: 'error',
            title: 'Ốiii!',
            text: "Vui lòng nhập lại trùng khớp nhé!",
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp
        </script>
    </section>
</main>
@endsection
