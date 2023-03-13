@extends('admin.include.master')
@section('content')
    <style>
        img#avtshow {
            border: 3px solid rgb(150, 0, 0);
            padding: 10px;
            height: 250px;
            width: 250px;
            border-radius: 50%;

        }
    </style>
    <main class="page-content">

        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel-panel-default">
                    <header class="page-title-bar">

                        <h1 class="page-title">Thông tin</h1>
                    </header>
                    <!-- Modal -->
                    <div style="color: red" class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit modal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="id">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Họ Và Tên</label>
                                            <input type="text" name="name" class="form-control" id="up_first_name"
                                                aria-describedby="emailHelp">
                                            <span style="color: red;" id="upfirst_name_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                                            <input type="text" name="phone" class="form-control" id="up_first_name"
                                                aria-describedby="emailHelp">
                                            <span style="color: red;" id="upfirst_name_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Giới tính</label>
                                            <input type="text" name="gender" class="form-control" id="up_first_name"
                                                aria-describedby="emailHelp">
                                            <span style="color: red;" id="upfirst_name_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Ngày sinh</label>
                                            <input type="text" name="	birthday" class="form-control" id="up_first_name"
                                                aria-describedby="emailHelp">
                                            <span style="color: red;" id="upfirst_name_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
                                            <input type="text" name="last_name" class="form-control" id="up_last_name">
                                            <span style="color: red;" id="uplast_name_error"></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="btnok">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr>
                    <div class="panel-heading">

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

                            <div class="gallery-grids">
                                <div class="gallery-top-grids">
                                    <div class="col-sm-3 com-w3ls">
                                        <section class="panel">
                                            <div class="gallery-grid">
                                                <br>
                                                <a class="example-image-link"
                                                    href="{{ asset('public/assets/images/user/' . $user->image) }}"
                                                    data-lightbox="example-set"
                                                    data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                                                    <img id="avtshow"
                                                        src="{{ asset('public/assets/images/user/' . $user->image) }}"
                                                        alt="" />
                                                    <div class="captn">
                                                        <h4>Xem Avt</h4>`
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="panel-body">
                                                <h3>{{ $user->name }}</h3>
                                                <ul class="nav nav-pills nav-stacked labels-info ">
                                                    <li>
                                                        <h4>{{ $user->group->name }}</h4>
                                                    </li>
                                                </ul>
                                                <div class="text-center">
                                                    {{-- @if (Auth::user()->id == $user->id || Auth::user()->hasPermission('User_update')) --}}
                                                        <a class="btn mini btn-default"
                                                            href="{{ route('user.edit', $user->id) }}">
                                                            <i class="fa fa-cog"> Thông tin</i>
                                                        </a>
                                                    {{-- @endif --}}
                                                    {{-- @if (Auth::user()->id == $user->id)
                                                        <a class="btn mini btn-default"
                                                            href="{{ route('user.editpass', Auth::user()->id) }}">
                                                            <i class="fa fa-cog"> Mật Khẩu </i>
                                                        </a>
                                                    @endif --}}

                                                    {{-- @if (Auth::user()->hasPermission('User_adminUpdatePass')) --}}
                                                        <a class="btn mini btn-default"
                                                            href="{{ route('user.adminpass', $user->id) }}">
                                                            <i class="fa fa-cog">Mật khẩu*</i>
                                                        </a>
                                                    {{-- @endif --}}
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-sm-9 com-w3ls">
                                        <section class="panel">
                                            <div class="gallery-grid">
                                                <div class="panel-body">
                                                    <ul class="nav nav-pills nav-stacked labels-info ">
                                                        <li>
                                                            <h3>Tên: {{ $user->name }}</h3>
                                                        </li>
                                                        <hr>
                                                        <li>
                                                            <h3>Email: {{ $user->email }}</h3>
                                                        </li>

                                                        <li>
                                                            <h3>Số điện thoại: {{ $user->phone }}</h3>
                                                        </li>
                                                        <hr>
                                                        <li>
                                                            <h3>Địa chỉ: {{ $user->address }}</h3>
                                                        </li>
                                                        <li>
                                                            <h3>Giới tính: {{ $user->gender }}</h3>
                                                        </li>
                                                        <li>
                                                            <h3>Ngày sinh: {{ $user->birthday }}</h3>
                                                        </li>
                                                        <hr>
                                                        <li>
                                                            <h3>Đã tham gia: {{ $user->created_at }}</h3>
                                                        </li>
                                                    </ul>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </section>
                                    </div>


                                    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}


                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <script>
            // Bat su kien sau khi ajax goi
            $('body').on('click', '.edit-btn', function() {
                //lay id
                let id = $(this).data('id');
                // Goi ajax
                let option = {
                    url: "http://127.0.0.1:8000/api/customer/show/" + id,
                    method: "GET",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        $("#up_first_name").val(response.first_name);
                        $("#up_last_name").val(response.last_name);
                        $("#id").val(response.id);
                    },
                }
                // Dua vao cac o input trong form
                $.ajax(option);
                // Goi modal
                $('#editModal').modal('show');
            });

            $('#btnok').on('click', function() {
                // validate form
                let id = $("#id").val();
                let first_name = $('#up_first_name').val();
                let last_name = $('#up_last_name').val();
                if (!first_name) {
                    $('#upfirst_name_error').html('truong bat buoc');
                }
                if (!last_name) {
                    $('#uplast_name_error').html(' aatruong bat buoc');
                    // alert('edit: ')
                } else {
                    // alert('edit: ' + id)
                    let option = {
                        url: "http://127.0.0.1:8000/api/customer/update/" + id,
                        method: "PUT",
                        dataType: "json",
                        data: {
                            first_name: first_name,
                            last_name: last_name,
                        },
                        success: function(response) {
                            // console.log(response);
                            $('#editModal').modal('hide');
                            getList();
                            // $("#id").val(0);
                            Swal.fire(
                                'Good job!',
                                'Cập nhật thành công!',
                                'success'
                            )
                        }
                    }
                    $.ajax(option)
                }
            })
        </script>
    </main>
@endsection
