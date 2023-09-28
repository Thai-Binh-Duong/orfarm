@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Thêm mới vai trò</h5>
            <div class="form-search form-inline">
                <form action="" method="POST">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.role.update',$role->id)}}" method="" >
                @csrf
                <div class="form-group">
                    <label class="text-strong" for="name">Tên vai trò</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$role->name}}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-strong" for="description">Mô tả</label>
                    <textarea class="form-control" type="text" name="description" id="description">{{$role->description}}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <strong>Vai trò này có quyền gì?</strong>
                <small class="form-text text-muted pb-2">Check vào module hoặc các hành động bên dưới để chọn quyền.</small>
                <!-- List Permission  -->
                @foreach ($permissions as $permission_key => $permission_value)
                <div class="card my-4 border">
                    <div class="card-header">
                        <input type="checkbox" class="check-all" name="" id="{{ $permission_key }}">
                        <label for="{{ $permission_key }}" class="m-0">Module {{ ucfirst($permission_key) }}</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- {{ $role->permission }} --}}
                            @foreach ($permission_value as $permission_item)
                                <div class="col-md-3">
                                    <input type="checkbox" class="permission" value="{{$permission_item->id}}" name="permission_id[]" id="{{ $permission_item->slug }}"
                                    @if ( in_array( $permission_item->id , $role->permission->pluck("id")->toArray() ))
                                        checked
                                    @endif
                                    {{-- @if (in_array(3,[1,3,4,5,7,11,8,9,10]))
                                        checked
                                    @endif --}}
                                    
                                    >
                                    <label for="{{ $permission_item->slug }}">{{ $permission_item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                <input type="submit" name="btn-update" class="btn btn-primary" value="Cap nhat">
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $('.check-all').click(function () {
        $(this).closest('.card').find('.permission').prop('checked', this.checked)
      })
</script>
@endsection