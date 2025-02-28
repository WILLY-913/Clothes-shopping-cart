
@extends('layouts.master')
@section('title', '個資管理')
@section('content')

<h1 >會員商品清單</h1>
<h4 ><a href={{ url('Member/MemProductAdd')}}  class="btn btn-primary">商品上架</a></h4>
<div class="container">
    <div class="row">
		@foreach($ps  as  $p)
            <!-- 一個產品開始  -->
            <div class="col-12 col-md-4 mb-2">
                <div class="card" style="width:100%;">
                    
                    <div class="card-body"><img class="card-img-top" src="{{ url('images/productPhoto') }}/{{$p->p_photo}}" style="width: 150px;height: 180px;">
                        <h5 class="card-title">{{$p->p_name}}</h5>
                        <p class="card-text text-secondary">綜合評價:{{$p->p_eval}}， 狀態:<font color="red" >{{$p->p_status}}</font></p>
                        <p class="card-text text-secondary"> <a href="{{url('Member/MemProductDelete')}}/{{$p->p_sno}}" class="btn btn-primary"  onclick="return confirm('確定刪除?')"  > 刪除 </a>
						<a href="{{url('Member/MemProductUpdate')}}/{{ $p->p_sno}}" class="btn btn-info"> 編輯 </a> </p>
                    </div>
                </div>
            </div>
            <!-- 一個產品結束  -->
       @endforeach
    </div>
</div>


<!—資料結束    -->
@stop


