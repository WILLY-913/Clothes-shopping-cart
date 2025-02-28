
@extends('layouts.master')
@section('title', '訂單管理')
@section('content')

<!—資料開始    -->

<h1 style="text-align:center">訂單管理</h1>
<a href="{{url('Admin/AdmOrderExport')}}" class="btn btn-primary">匯出訂單EXCEL</a>
<div class="container">
<table class="table">
        <thead>
            <tr>
                <th>購買者</th>
                <th>收件人姓名</th>
                <th>連絡電話</th>
                <th> 運送地址 </th>
                <th>金額</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
		@foreach($ods as $od)
             <tr>
                  <td>{{$od->m_acc}}</td>
                  <td>{{$od->om_name}}</td>
                  <td>{{$od->om_tel}}</td>
                  <td>{{$od->om_addr}}</td>
                  <td>{{$od->om_amt}}</td>
                 <td><a  href="{{url('Admin/AdmOrderDetail')}}/{{$od->om_sno}}" class="btn btn-primary">訂單明細</a></td>
             </tr>
	      @endforeach
        </tbody>
   </table>
</div>


<!—資料結束    -->
@stop


