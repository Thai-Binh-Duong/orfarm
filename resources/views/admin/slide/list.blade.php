@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    @if (session('status'))
        <p class="alert-success">{{ session('status') }}</p> 
    @endif
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách slide</h5>
            <div class="form-search form-inline">
                {{-- <form action="" method="GET">
                    <input type="text" name="keyword" class="form-control form-search" value="{{ old('keyword') }}" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form> --}}
            </div>
        </div>
        <div class="card-body">

            <table class="table table-striped table-checkall">
                
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Link</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @php
                            $stt = 0;
                        @endphp
                        @foreach ($slides as $slide)
                            @php
                                $stt ++;
                            @endphp
                            <tr>
                                <td scope="row">{{ $stt }}</td>
                                <td>
                                    @if ($slide->slide_image != '')
                                        <img class="post-80" src="{{url("$slide->slide_image")}}" alt="">
                                    @endif
                                    
                                </td>
                                <td><a href="{{ route('admin.slide.edit',$slide->id) }}">{{ $slide->slide_link }}</a></td>
                                <td>{{ $slide->slide_slug }}</td>
                                <td>
                                    {{ $slide->admin }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.slide.edit',$slide->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.slide.delete',$slide->id) }}"  onclick="return confirm('Bạn có chắc chắn muốn xóa slide này??')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection