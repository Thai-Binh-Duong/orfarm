@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cap nhat
            </div>
            <div class="card-body">
                <form method="POST" action='{{route("admin.permission.update",$permission->id)}}'>
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên quyền</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$permission->name}}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <small class="form-text text-muted pb-2">Ví dụ: posts.add</small>                            
                        <input class="form-control" type="text" name="slug" id="slug"  value="{{$permission->slug}}">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" type="text" name="description" id="description">{{$permission->description}}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" name="btn-add" class="btn btn-primary" value="update">Update</button>
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
                            </tr>
                            @php
                                $stt=0;
                            @endphp
                            @foreach ($permission_value as $permission_item)
                                @php
                                    $stt++;
                                @endphp
                                <tr>
                                    <td scope="row">{{ $stt }}</td>
                                    <td>|---{{ $permission_item->name }}</td>
                                    <td>{{ $permission_item->slug }}</td>
                                    <td>
                                        <a href='{{url("/admin/permission/edit/$permission_item->id")}}' class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href='{{url("/admin/permission/delete/$permission_item->id")}}' class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" onclick="return confirm('Ban co chac chan muon xoa quyen nay khong??')" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
@endsection