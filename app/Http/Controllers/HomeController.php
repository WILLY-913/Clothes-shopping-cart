<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;    // 加這行

class HomeController extends Controller
{
	public function Index()
	{
	   return view('Home.Index');   // 顯示 index 的 view   
    }
	public function DBtest()
	{
		 $users = DB::select('select * from ymember');
         if ($users == NULL)
			   return "NO DATA........";
         else
		    return  view('Home.DBtest', [ 'us'  => $users ]);	  
    }

    public function Login()
	{
		   return view('Home.Login');
	}
	public function Logout()
    {	 
		// session(['LoginOK' => false]); 
        session()->flush();	// 清除所有 SESSION 	
	    return redirect("Home/Login");			 
    }
    public function API_checkAccount(Request $r)
	{   // return($r->uid);
        
        $p = DB::select("select * from ymember  where m_acc = '$r->uid'");
		if ($p == NULL)
            return "編號可用";
		else
			return "編號重複";       
    }
	
    public function MemberRegister()
	{
		   return view('Home.MemberRegister');
	}
	public function MemberAddDB(Request  $r)
    { 
	   $sql = "select * from ymember  where m_acc = '$r->account' ";
	   $user = DB::select($sql);
 	   if ($user != NULL)
			return redirect("Home/MemberRegister");	
		
	  $photo = "NoPic.jpg";
	 
      if($r->hasFile('imgFile')){
	      $file = request('imgFile');         // 取得檔案資訊物件	
          $dstPath = 'images/userPhoto';     // 會存到 public/images/userPhoto 資料夾
          $photo = uniqid() .".". $file->getClientOriginalExtension()  ;  // 產生亂數檔名
	      $file->move( $dstPath,   $photo);  // 上傳檔案			          
      }  
	  
     // DB::insert("insert into ymember (m_acc,m_pwd,m_name,m_sex,m_role,m_photo) values (?, ?, ?,? ,?,? )", array( $r->account, $r->pwd, $r->name, $r->sex ,'member', $photo));
	  
	  DB::insert( "insert into ymember (m_acc,m_pwd,m_name,m_sex,m_role,m_photo) values ('$r->account', '$r->pwd',  '$r->name','$r->sex' ,'member','$photo')" );
	  // return($r->account . ", " . $r->sex);
      return  redirect("Home/Login");			 
    }

	
	// 檢查登入
    public function  CheckLogin(Request  $r)
    {	
	  // return ("account: " . $r->acc . ", password:"  . $r->pwd  );	
	  $sql = "select * from ymember  where m_acc = '$r->acc'  and  m_pwd = '$r->pwd' ";

      $user = DB::select($sql);
 	  if ($user == NULL)
			return view('Home.Login',['msg' => "帳密不對", 'acc' => $r->acc ]);
	  else 
	  {	
	     session([ 'LoginAcc' => $r->acc ]);
	     $sql2 = " select * from ycategory  order by  c_sno ";
         $cates =DB::select($sql2);
         // 將類別資料存在 Session 變數中
		 session([ 'cates' =>  $cates ]);      // 產品類別

	     if ( $user[0]->m_role == "admin" )
         {
	        session(['LoginRole' => 'admin']);  // 管理員登入
	        return redirect("Admin/Index");		
         }
         else {
		    session(['LoginRole' => 'member']); // 一般會員登入
		    return redirect("Member/Index");		
        }	
    }	
		 
}


	
	
	
	
	
	
}
