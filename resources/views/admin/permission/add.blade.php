@extends('layouts.admin')

@section('content')

@if (session('status'))
    <p class="alert alert-success">{{ session('status') }}</p>
@endif

<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm quyền
                </div>
                <div class="card-body">
                    <form method="POST" action='{{route("admin.permission.store")}}'>
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên quyền</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <small class="form-text text-muted pb-2">Ví dụ: posts.add</small>                            
                            <input class="form-control" type="text" name="slug" id="slug"  value="{{old('slug')}}">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" type="text" name="description" id="description">{{old('description')}}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" name="btn-add" class="btn btn-primary" value="add">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh sách quyền
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên quyền</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Tac vu</th>
                                <!-- <th scope="col">Mô tả</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ $permissions }} --}}
                            @foreach ($permissions as $permission_key => $permission_value)
                                {{-- {{$permission_key."---".$permissions_value}} --}}
                                <tr>
                                    <td scope="row"></td>
                                    <td><strong>Module {{ ucwords($permission_key) }}</strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @php
                                    $stt=0;
                                @endphp
                                @foreach ($permission_value as $permission)
                                    @php
                                        $stt++;
                                    @endphp
                                    <tr>
                                        <td scope="row">{{ $stt }}</td>
                                        <td>|---{{ $permission->name }}</td>
                                        <td>{{ $permission->slug }}</td>
                                        <td>
                                            <a href='{{url("/admin/permission/edit/$permission->id")}}' class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href='{{url("/admin/permission/delete/$permission->id")}}' class="btn btn-danger btn-sm rounded-0 text-white"  onclick="return confirm('Ban co chac chan muon xoa quyen nay khong??')"  type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection