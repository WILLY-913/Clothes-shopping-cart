
@extends('layouts.master')
@section('title', '商品更新')
@section('content')

<h1>商品更新</h1>
<hr />
<div class="row">
    <div class="col-md-4">           
		<form name='form1' method='post'  action="{{url('Member/MemProductUpdateDB')}}"  enctype="multipart/form-data"> 
		 @csrf
            <input type="hidden"  name=p_sno  id=p_sno  value={{$p->p_sno}}>
            <div class="form-group">
                商品名稱 : <input type='text' name='p_name' id="p_name" value={{$p->p_name}} class="form-control" required />
            </div>
	   	    <div class="form-group">
                商品價格 :  <input type="text" name="p_price" id='p_price' value={{$p->p_price}} class="form-control" required />
            </div>  
			
			<div class="form-group">
              商品類別 :
			  <select id="c_sno" name="c_sno">
				 @foreach ($cates as $cate)
				   @if ($cate->c_sno == $p->c_sno )
                       <option value="{{$cate->c_sno}}"  selected  >{{$cate->c_name}}</option>
				   @else
					 <option value="{{$cate->c_sno}}"  >{{$cate->c_name}}</option>
				   @endif
                 @endforeach
              </select>
            </div> 
             <div class="form-group">
                上架狀態 : 
				@if($p->p_status == "上架中")
				   <input type="radio" name="p_status" id='p_status' value="上架中" checked />上架中
			       <input type="radio" name="p_status" id='p_status' value="已下架" />已下架
				@else
			       <input type="radio" name="p_status" id='p_status' value="上架中"  />上架中
			       <input type="radio" name="p_status" id='p_status' value="已下架" checked/>已下架
				@endif				
            </div>
			
			
		    <input type="hidden"  name="oldPhoto" value="{{$p->p_photo}}" >  
			<div class="form-group">
                  <img class="card-img-top" src="{{ url('images/productPhoto') }}/{{$p->p_photo}}" style="width: 200px;height: 240px;">
			<br>	   
           	   
            換照片 :
			   <input type="file" name="upFile" accept="image/jpeg,image/jpg,image/png" />
            </div>

			<div class="form-group">
                 <input type='submit' value='確定更新'  class= "btn-primary">
            </div>
         </form>
    </div>
</div>

<!—資料結束    -->
@stop


