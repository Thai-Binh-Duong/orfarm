@extends('layouts.admin')

@section('content')

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh Sửa Thông Tin Người Dùng
        </div>
        {{-- {{ $user->role }} --}}
        <div class="card-body">
            <form action="{{route('admin.user.update',$user->id)}}" method="">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" disabled type="email" name="email" id="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password">
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role">Nhóm quyền</label>
                    <select class="form-control" name="role[]" id="role" multiple>
                        
                        @foreach ($roles as $role_key => $role_value)
                            <option value="{{$role_value->id}}"
                            @if ( in_array( $role_value->id , $user->role->pluck('id')->toArray() )  )
                                selected
                            @endif
                            >{{$role_value->name}}</option>
                        @endforeach
                        
                    </select>
                </div>

                <button type="submit" name="btn-update" value="update" class="btn btn-primary">Cap nhat</button>
            </form>
        </div>
    </div>
</div>
@endsection