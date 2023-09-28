<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href=" {{asset('css/style.css')}}">
    <title>Admintrator</title>
    <script src="https://cdn.tiny.cloud/1/bdrxakf4emfg4w5gqj681eoset7bcdm8pkrue1t3syojzkhj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        var editor_config = {
            path_absolute : "http://localhost:81/laravel/laravel-2/orfarm/",
            // path_absolute : "https://binhduong.unitopcv.com/",
            selector: 'textarea.textarea',
            relative_urls: false,
            plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no",
                onMessage: (api, message) => {
                callback(message.content);
                }
            });
            }
        };

        tinymce.init(editor_config);
        </script>
</head>

<body>
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="{{url('/admin')}}">ORFARM ADMIN</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/admin/post/add')}}">Thêm bài viết</a>
                        <a class="dropdown-item" href="{{url('/admin/product/add')}}">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="{{url('/admin/order/list')}}">Danh sách đơn hàng</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Tài khoản</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Thoát') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        @php
            $module = session('module_active');
            // dd($module);
        @endphp
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <ul id="sidebar-menu">
                    @canany(['product.add','product.edit','product.delete'])
                        <li class="nav-link {{ $module == "dashboard" ? 'active' : '' }}">
                            <a href="{{url('admin/dashboard')}}">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Dashboard
                            </a>
                        </li>
                    @endcanany

                    {{-- @canany(['page.add','page.edit','page.delete'])
                        <li class="nav-link  {{ $module == "page" ? 'active' : '' }}">
                            <a href="{{url('/admin/page/list')}}">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Trang
                            </a>
                            <i class="arrow fas fa-angle-right"></i>

                            <ul class="sub-menu">
                                @can('page.add')
                                    <li><a href="{{url('/admin/page/add')}}">Thêm mới</a></li>
                                @endcan
                                @canany(['page.edit','page.delete'])
                                    <li><a href="{{url('/admin/page/list')}}">Danh sách</a></li>
                                @endcanany
                            </ul>
                        </li>
                    @endcanany --}}

                    @canany(['post.add','post.edit','post.delete'])
                        <li class="nav-link  {{ $module == "post" ? 'active' : '' }}">
                            <a href="{{url('/admin/post/list')}}">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Bài viết
                            </a>
                            <i class="arrow fas fa-angle-right"></i>
                            <ul class="sub-menu">
                                @can('post.add')
                                    <li><a href="{{url('/admin/post/add')}}">Thêm mới</a></li>
                                @endcan
                                @canany(['post.edit','post.delete'])
                                    <li><a href="{{url('/admin/post/list')}}">Danh sách</a></li>
                                @endcanany
                                @canany(['post.add','post.edit','post.delete'])
                                    <li><a href="{{url('/admin/post/category/list')}}">Danh mục</a></li>
                                @endcanany
                            </ul>
                        </li>
                    @endcanany

                    @canany(['product.add','product.edit','product.delete'])
                        <li class="nav-link {{ $module == "product" ? 'active' : '' }}">

                            <a href="{{url('/admin/product/list')}}">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Sản phẩm
                            </a>
                            <i class="arrow fas fa-angle-right"></i>

                            <ul class="sub-menu">
                                @can('product.add')
                                    <li><a href="{{url('/admin/product/add')}}">Thêm mới</a></li>
                                @endcan
                                @canany(['product.edit','product.delete'])
                                    <li><a href="{{url('/admin/product/list')}}">Danh sách</a></li>
                                @endcanany
                                @canany(['product.add','product.edit','product.delete'])
                                    <li><a href="{{url('/admin/product/category/list')}}">Danh mục</a></li>
                                @endcanany
                                @canany(['product.add','product.edit','product.delete'])
                                    <li><a href="{{url('/admin/product/tag/list')}}">Tags</a></li>
                                @endcanany
                                @canany(['product.add','product.edit','product.delete'])
                                    <li><a href="{{url('/admin/product/brand/list')}}">Nhãn hàng</a></li>
                                @endcanany
                            </ul>
                        </li>
                    @endcanany

                    @canany(['product.add','product.edit','product.delete'])
                        <li class="nav-link {{ $module == "order" ? 'active' : '' }}">
                            
                            <a href="{{url('/admin/order/list')}}">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Bán hàng
                            </a>
                            <i class="arrow fas fa-angle-right"></i>
                            
                            <ul class="sub-menu">
                                <li><a href="{{url('/admin/order/list')}}">Đơn hàng</a></li>
                            </ul>
                        </li>
                    @endcanany

                    @canany(['user.add','user.edit','user.delete'])
                        <li class="nav-link {{ $module == "user" ? 'active' : '' }}">
                            {{-- {{$module}} --}}
                            
                                <a href="{{url('/admin/user/list')}}">
                                    <div class="nav-link-icon d-inline-flex">
                                        <i class="far fa-folder"></i>
                                    </div>
                                    Users
                                </a>
                                <i class="arrow fas fa-angle-right"></i>
                            
                            <ul class="sub-menu">
                                @can('user.add')
                                    <li><a href="{{url('/admin/user/add')}}">Thêm mới</a></li>
                                @endcan
                                @canany(['user.edit','user.delete'])
                                    <li><a href="{{url('/admin/user/list')}}">Danh sách</a></li>
                                @endcanany
                            </ul>
                        </li>
                    @endcanany

                    @canany(['role.add','role.edit','role.delete'])
                        <li class="nav-link {{ $module == "permission" ? 'active' : '' }}">
                            
                                <a href="{{route('admin.permission.add')}}">
                                    <div class="nav-link-icon d-inline-flex">
                                        <i class="far fa-folder"></i>
                                    </div>
                                    Phân quyền
                                </a>
                                <i class="arrow fas fa-angle-right"></i>
                            
                            <ul class="sub-menu">
                                @canany(['role.edit','role.delete'])
                                    <li><a href="{{route('admin.permission.add')}}">Quyền</a></li>
                                @endcanany
                                @can('role.add')
                                    <li><a href="{{ route('admin.role.add') }}">Thêm vai trò</a></li>
                                @endcan
                                @canany(['role.edit','role.delete'])
                                    <li><a href="{{ route('admin.role.list') }}">Danh sách vai trò</a></li>
                                @endcanany
                            </ul>
                        </li>
                    @endcanany

                    @canany(['page.add','page.edit','page.delete'])
                        <li class="nav-link  {{ $module == "slide" ? 'active' : '' }}">
                            <a href="{{url('/admin/slide/list')}}">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Slide
                            </a>
                            <i class="arrow fas fa-angle-right"></i>
                            <ul class="sub-menu">
                                @can('page.add')
                                    <li><a href="{{url('/admin/slide/add')}}">Thêm mới</a></li>
                                @endcan
                                @canany(['page.edit','page.delete'])
                                    <li><a href="{{url('/admin/slide/list')}}">Danh sách</a></li>
                                @endcanany
                            </ul>
                        </li>
                    @endcanany

                    {{-- <li class="nav-link"><a>Đơn hàng</a></li>
                    <li class="nav-link"><a>Hệ thống</a></li> --}}

                </ul>
            </div>
            <div id="wp-content">
                @yield('content')
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>