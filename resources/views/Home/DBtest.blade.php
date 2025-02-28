
@extends('layouts.master')
@section('title', 'Home/index')
@section('content')

<!—資料開始    -->


      <h1 style="text-align:center">會員清單</h1>
<div class="container">

 <table class="table">
    <thead class="table-success">
      <tr>
        <th>帳號</th>
        <th>姓名</th>
        <th>密碼</th>
		<th>性別</th>
      </tr>
    </thead>
    <tbody>
	@foreach( $us  as  $u)  
      <tr>
        <td>{{  $u->m_acc  }}</td>
        <td>{{  $u->m_name  }}</td>
        <td>{{  $u->m_pwd  }}</td>
		<td>{{  $u->m_sex  }}</td>
      </tr>
     @endforeach 
    </tbody>
  </table>


   
</div>


<!—資料結束    -->
@stop


