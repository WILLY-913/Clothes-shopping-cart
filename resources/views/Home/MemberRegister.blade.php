@extends('layouts.master')
@section('title', 'Home/index')
@section('content')
<script>
   function checkPWD() {
	   
	   alert("check password");
	   var pwd1 = document.getElementById("pwd").value;   // 取得密碼資料
       var pwd2 = document.getElementById("pwd_c").value;
       if (pwd1 != pwd2) {
             alert("密碼與密碼確認欄不一致");
             document.myform.pwd.focus();     // 將游標聚焦於 密碼欄
         }     

   }
    function checkAcc() {           
        var acc =  document.getElementById("acc").value; 
		if (acc.length < 3 || acc.length >10 )
		{
            alert("帳號長度必須>3 且 <= 10");
         }
       
    }

   function checkALL() {  
        alert("checkALL()");   
        var acc =  document.getElementById("acc").value; 
		if (acc.length < 3 )
		{
            alert("帳號長度<3");
            document.myform.acc.focus();
			return;  }
        var pwd1 = document.getElementById("pwd").value;
        var pwd2 = document.getElementById("pwd_c").value;
        if (pwd1 != pwd2) {
              alert("密碼與密碼確認欄不一致");
              document.myform.pwd.focus();
			  return;}
        document.myform.submit();
    } 
   
   
   function API_checkAccount() {
        // alert("checkAccount");
        var  acc = $("#acc").val();     // 取出ID 為 acc 的資料內容
        $('#ymsg').text("");           // 清除訊息(ID: ymsg 
		if (acc.length < 3 )   // 長度>=3 才會去檢查
			return;
		//alert(id);
        var  apiurl = "http://127.0.0.1:8000/Home/API_checkAccount/"+acc;   // 呼叫API
        $.ajax({
            url:  apiurl,     // API 的url(網址)
            type:  'GET',
            success:  function (data) {   // 呼叫成功
                $('#ymsg').text(data);
            },
            error:  function (data) {   // 呼叫失敗
                alert("呼叫API ERROR");
            }
        });
    }

 </script>


<hr />
<div class="row">
    <div class="col-md-4">           
			<form  name="myform" method='post'  action="{{url('Home/MemberAddDB')}}"  enctype="multipart/form-data"  >
			 @csrf
                <div class="form-group">
                    帳號: <input type="text"  name="account"  id="acc"  class="form-control" onblur="checkAcc()"  onkeyup="API_checkAccount()"  required >
					<label  id=ymsg  name=ymsg ></label>
                </div>
                <div class="form-group">
                    密碼: <input type="password"  name="pwd"  id="pwd"  class="form-control" required >
                </div>
				<div class="form-group">
                    密碼確認: <input type="password"  name="pwd_c"  id="pwd_c"  class="form-control"  onblur="checkPWD()"  required >
                </div>
				  <div class="form-group">
                    姓名: <input type="text"  name="name"  id="name" class="form-control" >
                </div>  
<div class="form-group">
                    性別: 
					   <input type="radio"   id="sex" name="sex"  value="男"   >男生
					   <input type="radio"   id="sex" name="sex"  value="女"   checked>女生
                </div> 

				<div class="form-group">
                  照片:  <input  type="file"  name="imgFile"  accept="image/jpeg,image/jpg,image/png">
                </div>

				
				<div class="form-group">
                   <input type="button"  value="送出"  class= "btn-primary"  onclick="checkALL()">
                </div>
            </form>
    </div>
</div>

@stop