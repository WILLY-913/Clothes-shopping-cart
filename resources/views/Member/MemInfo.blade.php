
@extends('layouts.master')
@section('title', '個資管理')
@section('content')

<script>
   function checkPWD() {
	   
	//   alert("check password");
	   var pwd1 = document.getElementById("newPWD").value;   // 取得密碼資料
       var pwd2 = document.getElementById("newPWD_c").value;
       if (pwd1 != pwd2) {
             alert("密碼與密碼確認欄不一致");
             document.myform.newPWD.focus();     // 將游標聚焦於 密碼欄
         }     

   }
</script>
@php
  $b = "";
  $g = "";
   if ($user->m_sex == "男")
			   $b = "checked";
		   else
			   $g = "checked"; 
	@endphp

	
<!—資料開始    -->

 <div class="flex-center position-ref full-height">
            <div class="content">
               
			   
			   
<h1>會員資料</h1>

<hr />
<div class="row">
    <div class="col-md-4">
      	<form name="myform" method='post'  action="{{url('Member/MemInfoUpdate')}}"  enctype="multipart/form-data"   >
	    @csrf
        
         <div class="form-group">
               姓名: <input type="text"  name="name" class="form-control" value="{{$user->m_name}}" /> 
         </div>
		 <div class="form-group">
               性別:  <input type='radio' name='sex' value="男"  {{$b}} >男生
				      <input type='radio' name='sex' value="女" {{$g}} >女生
         </div>
         <div class="form-group">
             新密碼: <input type="password" id="newPWD"  name="newPWD" class="form-control" />
         </div>   
	     <div class="form-group">
             新密碼確認: <input type="password" id="newPWD_c"  name="newPWD_c"  class="form-control"  onblur="checkPWD()" />
         </div>   
		 <div class="form-group">
              <img class="card-img-top" src="{{ url('images/userPhoto') }}/{{$user->m_photo}}" style="width: 200px;height: 240px;">
			  
         </div>	
		 <input type=hidden name="oldPhoto" value="{{$user->m_photo}}">
		 <div class="form-group">
            換照片:  <input type="file"  id="upFile" name="upFile">
        </div> 

         <div class="form-group">
           <input type="submit" value="儲存" class="btn btn-primary"  class="form-control" />
         </div>
        </form>
    </div>
</div>

			   
			   
			   
			   
			   
			   
            </div>
        </div>

<!—資料結束    -->
@stop


