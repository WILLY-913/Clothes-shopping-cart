
@extends('layouts.master')
@section('title', '會員帳號匯入')
@section('content')

<!—資料開始    -->

<h1 style="text-align:center">會員帳號匯入</h1>
<div class="container">
<div class="container">
    <div class="row">
	  <form action="{{url('Admin/AdmMemberExcelImport')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mt-5">
            <input type="file" class="form-control" name='excel_file'>
            <button class="btn btn-outline-secondary" type="submit" >匯入</button>
        </div>
    </form>
    </div>
</div>


<!—資料結束    -->
@stop


