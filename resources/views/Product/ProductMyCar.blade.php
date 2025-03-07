
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
                  <td>
                    <a href="#" class="delete-btn" data-id="{{$car->od_sno}}">刪除</a>
                </td>
             </tr>
	      @endforeach
		  <tr><td></td><td></td><td></td><td></td><td>總價</td><td>{{$amt}}</td></tr>
        </tbody>
   </table>
   <hr />
   <div  style="text-align:left;">
      <p>收件人姓名:  <input type="text" name="yname" /></p>
	  <p>收件人電話:  <input type="text" name="ytel" /></p>
	  <p>收件人地址:  <input type="text" name="yaddr" /></p>
      <p>電子發票:  <select id="quantity" name="quantity">
                        <option>三聯式發票(公司)</option>
                        <option>二聯式發票(個人)</option>
                    </select>
      </p>
	  <p>請選擇支付方法:  <input type="radio" name="payment"/>
                        <label for="credit">信用卡繳費</label>
                        <input type="radio" name="payment"/>
                        <label for="cod">貨到付款</label>
      </p>
	  <p> <input type="submit" value="確定購買" class="btn btn-primary" /></p>
   </div>
   </form>

<!-- 添加 JavaScript 處理刪除 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.delete-btn').on('click', function(e) {
        e.preventDefault(); // 防止 <a> 標籤的預設行為
        const odSno = $(this).data('id'); // 取得 od_sno
        if (confirm('確定要刪除此商品？')) {
            $.ajax({
                url: '{{ url("Product/ProductDeleteCar") }}/' + odSno, // 後端刪除路由
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Laravel CSRF 保護
                },
                success: function(response) {
                    if (response.success) {
                        // 從前台移除該項目
                        $('tr.cart-item[data-id="' + odSno + '"]').remove();
                        alert('商品已成功從購物車移除！');
                        // 可選：重新計算總價並更新畫面
                        updateTotalPrice();
                    } else {
                        alert('刪除失敗：' + response.message);
                    }
                },
                error: function(xhr) {
                    alert('發生錯誤，請稍後再試！');
                }
            });
        }
    });

    // 重新計算總價的函數
    function updateTotalPrice() {
        let total = 0;
        $('.cart-item').each(function() {
            const price = parseFloat($(this).find('input[name="price[]"]').val());
            const qty = parseInt($(this).find('input[name="qty[]"]').val());
            total += price * qty;
        });
        $('tr:last td:last').text(total); // 更新總價
    }
});
</script>

<!-- 確保有 CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!—資料結束    -->
@stop


