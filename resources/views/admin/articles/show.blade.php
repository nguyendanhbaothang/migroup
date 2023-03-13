@extends('admin.include.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="mb-1">Bài viết</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Bài viết</a></li>
                    <li class="breadcrumb-item"> Chi tiết bài viết </a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chi tiết bài viết</h5>
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="p-3 right-side">
                            <div class="product-info-tabs">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Tên</td>
                                                    <td>{{ $articleshow->title }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Thể loại</td>
                                                    <td>{{ $articleshow->category->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tác giả</td>
                                                    <td>{{ $articleshow->author->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày đăng</td>
                                                    <td>{{ $articleshow->date }} </td>
                                                </tr>



                                                <th>

                                                <td>
                                                    @if ($articleshow->status === 0)
                                                        <h5 style="color: rgb(144, 243, 147)"><i
                                                                class="bi bi-bookmark-plus-fill"></i>Chờ duyệt</h5>
                                                    @endif
                                                    @if ($articleshow->status === 1)
                                                        <h5 style="color: green"><i class="bi bi-bookmark-check-fill"></i>Đã
                                                            duyệt</h5>
                                                    @endif
                                                </td>
                                                </th>

                                            </tbody>
                                        </table>
                                        <label>Mô tả:{!! $articleshow->content !!}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </main>
  
@endsection
