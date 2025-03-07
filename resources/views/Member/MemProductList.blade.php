
@extends('layouts.master')
@section('title', '購物街-商品清單')
@section('content')

<h1>商城-國王的新衣</h1>
<hr />
<div class="container">
   <div class="row">       
	 @foreach ($ps  as  $p)
        <!-- 一個產品開始  -->
        <div class="col-12 col-md-4 mb-2">
            <div class="card" style="width:100%;">
               <img class="card-img-top" src="{{url('images/productPhoto')}}/{{$p->p_photo}}" style="width: 150px;height: 180px;">
               <div class="card-body">
                <h5 class="card-title"><a href="{{url('Member/MemProductDetail')}}/{{$p->p_sno}}">{{$p->p_name}}</a></h5>
			    <p class="card-text text-secondary">定價: {{$p->p_price}}</p>
			    <p class="card-text text-secondary"><label id="fEval" >綜合評價: {{$p->p_eval}}</label></p>
			</div>
                </div>				
            </div>
            <!-- 一個產品結束  -->
      @endforeach
    </div>
</div>












@stop


