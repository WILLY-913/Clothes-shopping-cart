
@extends('layouts.master')
@section('title', '訂單明細')
@section('content')

<!—資料開始    -->

<h1 style="text-align:center">訂單明細</h1>
<div class="container">
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
		@foreach($ps as $p)
             <tr>
                  <td>{{$p->p_sno}}</td>
                  <td>{{$p->p_name}}</td>
                  <td> <img src="{{url('images/productPhoto')}}/{{$p->p_photo}}" style="width: 50px;"/></td>                  
                  <td>{{$p->od_qty}}</td>
                  <td>{{$p->od_price}}</td>
				  <td>{{$p->od_price * $p->od_qty}}</td>
                  @php ($amt=$amt + $p->od_price * $p->od_qty)
                 <td><a  href="">刪除</a></td>
             </tr>
	      @endforeach
		  <tr><td></td><td></td><td></td><td></td><td>總價</td><td>{{$amt}}</td></tr>
        </tbody>
   </table>
</div>


<!—資料結束    -->
@stop


