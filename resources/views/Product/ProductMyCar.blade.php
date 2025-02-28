
@extends('layouts.master')
@section('title', '購物車')
@section('content')

<h1 >購物車清單</h1>
<form name="myform" method='post'  action="{{url('Product/ProductCarToOrder')}}">
 @csrf
    <table class="table">
        <thead>
            <tr>
                <th>商品編號</th>
                <th>商品名稱</th>
                <th>商品照片</th>
                <th> 數量 </th>
                <th>價格</th>
				<th>小計</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php ($amt = 0)
		@foreach($cars as $car)
             <tr>
                  <td>{{$car->p_sno}}</td>
                     <input type="hidden" name="odsno[]" value="{{$car->od_sno}}" />
                  <td>{{$car->p_name }}</td>
                  <td> <img src="{{ url('images/productPhoto') }}/{{$car->p_photo}}" style="width: 50px;"/></td>                  
                  <td> <input type="text" name="qty[]" value="{{$car->od_qty}}" /></td>
                  <td>{{$car->od_price}}</td>
                  <input type="hidden" name="price[]"  value="{{$car->od_price}}" />
				  <td>{{$car->od_price * $car->od_qty}}</td>
                  @php ($amt=$amt + $car->od_price * $car->od_qty)
                 <td><a  href="">刪除</a></td>
             </tr>
	      @endforeach
		  <tr><td></td><td></td><td></td><td></td><td>總價</td><td>{{$amt}}</td></tr>
        </tbody>
   </table>
   <hr />
   <div  style="text-align:center;">
      <p>收件人姓名:  <input type="text" name="yname" /></p>
	  <p>收件人電話:  <input type="text" name="ytel" /></p>
	  <p>收件人地址:  <input type="text" name="yaddr" /></p>
	  <p> <input type="submit" value="確定購買" class="btn btn-primary" /></p>
   </div>
   </form>


<!—資料結束    -->
@stop


