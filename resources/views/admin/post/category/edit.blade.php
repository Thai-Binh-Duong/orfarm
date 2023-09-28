@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    @if ( session('status') )
        <p class="alert-success">{{session('status')}}</p>
    @endif
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh mục bài viết
                </div>
                
                <div class="card-body">
                    <form action="{{route('admin.post.category.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$post->name}}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <button type="submit" name="btn-update" value="update" class="btn btn-primary">Cap nhat</button>
                    </form>
                </div>
            </div>
        </div>
        
        
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh sách
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 0;
                            @endphp
                            @foreach ( $categories as $category)
                                @php
                                    $stt ++;
                                @endphp
                                    
                                <tr>
                                    <th scope="row">{{ $stt }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @foreach ($admins as $admin)
                                            @if ( $admin->id == $category->admin_id )
                                                {{ $admin->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href='{{route("admin.post.category.edit",$category->id)}}' class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href='{{route("admin.post.category.delete",$category->id)}}' class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection