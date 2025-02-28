
@extends('layouts.master')
@section('title', '商品上架')
@section('content')

<h1>商品上架</h1>
<hr />
<div class="row">
   <div class="col-md-4">           
<form name='form1' method='post'  action="{{url('Member/MemProductAddDB')}}"  enctype="multipart/form-data"> 
	 @csrf
      <div class="form-group">
           商品名稱 : <input type='text' name='p_name'  class="form-control" required />
        </div> 
	    
		<div class="form-group">
           商品價格 : <input type='text' name='p_price'  class="form-control" required />
        </div> 
	<div class="form-group">
            商品類別 : <select  id="c_sno" name="c_sno">
			@foreach ($cates as $cate)
                 <option  value="{{$cate->c_sno}}" >{{$cate->c_name}}</option>
            @endforeach
            </select>
        </div> 
		<div class="form-group">
		     商品照片: <input type="file" name="upFile" accept="image/jpeg,image/jpg,image/png" />
        </div>
		<div class="form-group">
              <input type='submit' value='新增'  class= "btn-primary">
            </div>
         </form>
    </div>
</div>

<!—資料結束    -->


@stop


