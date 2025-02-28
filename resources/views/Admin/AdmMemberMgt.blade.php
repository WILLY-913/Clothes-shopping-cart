
@extends('layouts.master')
@section('title', 'Home/index')
@section('content')

<!—資料開始    -->

<h1 style="text-align:center">會員管理</h1>
<div class="container">
    <div class="row">
		@foreach(  $mems  as  $m )
            <!-- 一個會員  -->
            <div class="col-12 col-md-4 mb-2">
                <div class="card" style="width:100%;">
                    <img class="card-img-top" src="{{ url('images/userPhoto') }}/{{$m->m_photo}}" style="width:150px;height:200px;margin:auto">
                    <div class="card-body"  style="margin:auto" >
                        <h5 class="card-title">{{ $m->m_acc }}</h5>
                        <p class="card-text text-secondary">{{ $m->m_name }}</p>
						<p class="card-text text-secondary">
						 <a href="{{url('Admin/AdmMemberDelete')}}/{{$m->m_acc}}"
                               onclick=return(confirm("確定刪除?"))      
	                           class="btn btn-danger">刪除</a> </p>
                    </div>
					
                </div>
            </div>
            <!-- 一個會員結束  -->
       @endforeach
    </div>
</div>


<!—資料結束    -->
@stop


