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
            <a class="navbar-brand" href="{{ url('Home/Index') }}">
                <img src="{{ url('images/123.jpg') }}" width="50" class="rounded-circle">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Home/DBtest') }}">資料庫測試</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Home/MemberRegister') }}">註冊會員</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Home/Login') }}">登入</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
