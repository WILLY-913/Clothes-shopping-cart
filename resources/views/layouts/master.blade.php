<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @section('head')
        @include('layouts.head')
    @show
</head>
<body>
 <div class="container">
   @php
      $role = Session::get('LoginRole');
   @endphp
   
   @if ($role=="admin")
     @include('layouts.headerAdm')
   @elseif ($role=="member")
     @include('layouts.headerMem')
   @else
	 @include('layouts.header')
   @endif

    <main class="py-4">
        <div>
            @yield('content')
        </div>
		@include('layouts.footer')
    </main>
  </div>	
</body>
</html>

