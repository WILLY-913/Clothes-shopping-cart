@php
       $cates = Session::get('cates');
@endphp

<header>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: #E6F0FA;
            background-image: url("/images/bk.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-size: cover;
            min-height: 100vh;
        }
    </style>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{url('Home/Index')}}"> 
                    <img src={{ url('images/123.jpg')}} width=50 class="rounded-circle"> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
                    <ul class="navbar-nav flex-grow-1">
                        <!-- 分類清單內容開始 -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                購物街
                            </a>
							
                            <div class="dropdown-menu">
							    <a class="dropdown-item" href="{{url('Member/MemProductList')}}/0">全部</a>
                                @foreach ($cates  as  $cate)
                                    <a class="dropdown-item" href="{{url('Member/MemProductList')}}/{{$cate->c_sno}}">{{$cate->c_name}}</a>
	                            @endforeach                             
                            </div>
                        </li>
                        <!-- 分類清單內容結束 -->
                        <li class="nav-item">
                            <a class="nav-link" href=" {{url('Member/MemInfo')}}">個資管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{url('Member/MemProductMgt')}}">商品管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{url('Product/ProductMyCar')}}">查看購物車</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href=" {{url('Home/Logout')}}">登出會員</a>
                        </li>
                    </ul>
                </div>
            </div>
 </nav>
</header>

