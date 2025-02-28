<header>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{url('Home/Index')}}"> <img src={{ url('images/123.jpg')}} width=50 class="rounded-circle"> </a>
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
                                產品分類
                            </a>
                            <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">男裝 </a>
									<a class="dropdown-item" href="#">女裝</a>
                                
                            </div>
                        </li>
                        <!-- 分類清單內容結束 -->
                        <li class="nav-item">
                            <a class="nav-link" href=" {{url('Admin/AdmMemberMgt')}}">會員管理</a>
                        </li>
                        

                        <li class="nav-item">
                            <a class="nav-link" href=" {{url('Admin/AdmOrderMgt')}}">管理訂單</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{url('Admin/AdmMemberImport')}}">會員EXCEL匯入</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href=" {{url('Home/Logout')}}">登出管理員</a>
                        </li>
                    </ul>
                </div>
            </div>
 </nav>
</header>

