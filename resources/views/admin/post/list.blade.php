@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    @if (session('status'))
        <p class="alert-success">{{ session('status') }}</p> 
    @endif
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách bài viết</h5>
            <div class="form-search form-inline">
                <form action="" method="GET">
                    <input type="text" name="keyword" class="form-control form-search" value="{{ old('keyword') }}" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.post.action') }}" method="GET">
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" name="action" id="">
                        <option value="">Chọn</option>
                        <option value="delete">Xoa</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>

                <table class="table table-striped table-checkall">
                    
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ( $posts->total() > 0 )
                            @php
                                $stt = 0;
                            @endphp
                            @foreach ($posts as $post)
                                @php
                                    $stt ++;
                                @endphp
                                <tr>
                                    <td>
                                        <input type="checkbox" name="check[]" value="{{ $post->id }}">
                                    </td>
                                    <td scope="row">{{ $stt }}</td>
                                    <td>
                                        @if ($post->post_image != '')
                                            <img class="post-80" src="{{url("$post->post_image")}}" alt="">
                                        @endif
                                        
                                    </td>
                                    <td><a href="">{{ Str::limit($post->post_title, 15)  }}</a></td>
                                    <td>
                                        @foreach ($categories as $category)
                                            @if ($category->id == $post->category_id)
                                                {{ $category->name }}
                                            @endif
                                        @endforeach
                                        
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    
                                    <td>
                                        @foreach ($admins as $admin)
                                            @if ( $admin->id == $post->admin_id )
                                                {{$admin->name}}
                                            @endif
                                        @endforeach
                                        
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.post.delete',$post->id) }}"  onclick="return confirm('Bạn có chắc chắn muốn xóa bai viet này??')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">
                                    <p class="alert-danger">Khong co ban ghi nao phu hop</p>
                                </td>
                            </tr>
                        @endif
    
                    </tbody>

                </table>
            </form>
            
            <nav aria-label="Page navigation example">
                {{ $posts->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection