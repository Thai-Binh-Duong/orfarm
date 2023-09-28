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
                    Tags sản phẩm
                </div>
                
                <div class="card-body">
                    <form action="{{route('product.tag.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên tags</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <button type="submit" name="btn-add" value="add" class="btn btn-primary">Thêm mới</button>
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
                                <th scope="col">Stt</th>
                                <th scope="col">Name</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @php
                                $stt = 0;
                            @endphp
                            @foreach ( $tags as $tag)
                                @php
                                    $stt ++;
                                @endphp
                                    
                                <tr>
                                    <th scope="row">{{ $stt }}</th>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        <a href='{{route("product.tag.edit",$tag->id)}}' class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href='{{route("product.tag.delete",$tag->id)}}' onclick="return confirm('Bạn có chắc chắn muốn xóa trường này??')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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