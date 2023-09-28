@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    @if (session('status'))
        <p class="text-success">{{ session('status') }}</p>
    @endif
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách thành viên</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="text" name="keyword" class="form-control form-search" value="{{ request()->input('keyword') }}" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{ request()->fullUrlWithQuery(['status' => 'active'])}}" class="text-primary">Active<span class="text-muted">({{ $count['count_user_active'] }})</span></a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'trash'])}}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{ $count['count_user_trash'] }})</span></a>
            </div>
        <form action="{{url('/admin/user/action')}}" method="">
            @csrf
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" name="act" id="">
                    <option>--Chọn--</option>
                    @foreach ($list_action as $key => $action)
                        {{ $key.$action }}
                        <option value=" {{ $key }}"> {{ $action }}</option>
                    @endforeach
                </select>
                <input type="submit" name="btn-aply" value="Áp dụng" class="btn btn-primary">
            </div>
            @if ( $users->total() > 0 )
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                
                    <tbody>
                        @php
                            $stt=0;
                        @endphp
                        @foreach ($users as $user)
                            @php
                                $stt++;
                            @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="list_check[]" value="{{ $user->id }}">
                            </td>
                            <th scope="row">{{ $stt }}</th>
                            <td>{{ $user->name }}</td> 
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ( $user->role as $role)
                                    <span class="badge badge-warning">{{ $role->name }}</span> 
                                @endforeach
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href='{{url("/admin/user/edit/$user->id")}}' class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                @if ( Auth::user()->name != $user->name )
                                <a href='{{url("/admin/user/delete/$user->id")}}' class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                @endif
                                
                            </td>
                        </tr>
                        
                        @endforeach

                    </tbody>
                
                
            </table>
            @else
                <p>Khong co ban ghi nao thoa man yeu cau</p>
            @endif
        </form>
            

            {{-- pagination --}}
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection