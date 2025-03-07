
@extends('layouts.master')
@section('title', '購物街-商品詳細資料')
@section('content')

<style>
    #star ul {
        list-style-type: none;
    }
    #star li {
        float: left;
        margin-left: 10px;
        font-size: 10px;
        font-family: "simsun";
        cursor: pointer;
    }
    #star div {
        clear: both;
    }
    #star button {
        margin-left: 30px;
        font-size: 15px;
    }
</style>
<!—JavaScript 部分-->
<script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    //    入口函数
    $(function () {
        //        设置两个状态的星星
        var emptyStar = "☆";
        var fullStar = "★";
        //        li鼠标移入事件
        $("#star li").mouseenter(function () {
            $(this).text(fullStar).prevAll().text(fullStar).end().nextAll().text(emptyStar);
        });
        //        li鼠标离开事件
        $("#star li").mouseleave(function () {
            $("#star li").text(emptyStar);
            $("#star li.current").text(fullStar).prevAll().text(fullStar).end().nextAll().text(emptyStar);
        });
        //        li点击事件
        $("#star li").click(function () {
            if ($(this).hasClass("current")) {
                $(this).removeAttr("class");
            } else {
                $(this).attr("class", "current").siblings().removeAttr("class");
            }
        })
        //        button点击事件
        $("button").click(function () {
            var boo = false;
            for (var i = 0; i < $("ul>li").length; i++) {
                if ($("ul>li").hasClass("current")) {
                    boo = true;
                }
            }
            if (boo) {
                var  p_sno= $("#p_sno").val();   
                var  eval = $("ul>li.current").index() + 1
                var  m_acc = $("#m_acc").val();				
                var  apiurl = "http://127.0.0.1:8000/Product/ProductEval/"+p_sno +"/"+m_acc+"/"+eval;
                // alert(apiurl);
                $.ajax({
                    url: apiurl,
                    type: 'GET',
                    success: function (data) {
                     //   alert("back=" + data);
                        $("#fEval").text(data);
                    },
                    error: function (data) {
                        alert("呼叫API ERROR");
                    }
                });  
             } else {
                return alert("您还没有选择呢！");
            }
        })
    })
</script>
<script>
  function AddCar()
  {
	 var  p_sno= $("#p_sno").val();            
     var  m_acc = $("#m_acc").val();
     var  price = $("#price").text();	 
     var  apiurl = "http://127.0.0.1:8000/Product/ProductAddCar/"+p_sno+"/"+m_acc + "/" +price;
     alert(apiurl);
          $.ajax({
                url: apiurl,
                    type: 'GET',
                    success: function (data) {
                        alert("加入購物車:" + data);
                    },
                    error: function (data) {
                        alert("呼叫API ERROR");
                    }
                });  	 
  }
</script>

<h1>服裝商城-衣衣不捨</h1>
<hr />
@php
	$acc = Session::get("LoginAcc");
@endphp
<div class="img-thumbnail text-center" style="margin: 0 auto; width: 80%;">
<input type="hidden" name="m_acc" id="m_acc" value={{$acc}} >
<input type="hidden" name="p_sno" id="p_sno" value={{$p->p_sno}} >

		  <table border=0>
		  <tr><td> 
              <img src={{url('images/productPhoto')}}/{{$p->p_photo}}  style="width:120px;" />
              </td>
		      <td> <h5>{{$p->p_name}}</h5>
			       <p>商品所有人：{{$p->m_name}}({{$p->m_acc}})  </p>		
                   <p>單價:<label id="price" >{{$p->p_price}}</label></p>		   
			       <p>評價:<label id="fEval" >{{$p->p_eval}} </label></p>
			 </td>
          </tr>
		  <tr>
		     <td  align='center' valign="middle">
               <div id="star" class="star">
                  <ul class="box">
                      <li>☆</li>
                      <li>☆</li>
                      <li>☆</li>
                      <li>☆</li>
                      <li>☆</li>
                  </ul>
                 <p> <button>我要評價</button></p>
              </div>
		    </td> 
		     <td>
			 <input type="button" value="加入購物車" class="btn btn-primary" onClick="AddCar()">
		    </td> 
		  </tr>

	</table>
  </div>      
</div>


@stop


