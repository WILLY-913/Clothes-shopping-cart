<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class MemberController extends Controller
{
    //
	public function Index()
	{
	   return view('Member.Index');   // 顯示 index 的 view   
    }

	
	public function MemProductMgt()
	{   $m = "";
	    // return("MGT");
		$acc = session('LoginAcc' ); // 從Session變數取出會員帳號
		$sql = "select * from yproduct where m_acc = '$acc'";
		
        $ps =DB::select($sql);  // 找到該會員資料 $users 雖然只有一筆資料，但還是個陣列
	   
		if ($ps != NULL)
		{ 
	      // foreach($ps as $p)
	       //    $m .= " " . $p->p_name;
	     // return("count=" . $ps->count());
	       return view('Member.MemProductMgt', [ 'ps' => $ps ]); 
		}
		else
			return("NO DATA");
	  
    } 
	public function MemProductList($c_sno = 0 )
    { 
	    //return ("c_sno = " . $c_sno );
	   $acc = session('LoginAcc'); // 從Session變數取出會員帳號
       $sql = "select * from yproduct  where  m_acc != '$acc' ";
	   if ( $c_sno != 0 )
		  $sql .= "  and  c_sno='$c_sno'  ";  // 查全部就不須帶入條件
	 //  return($sql);
	 
  	   $ps = DB::select($sql);
	   
       if ($ps == NULL)
			   return "NO DATA........";
       else
	     return view('Member.MemProductList', [ 'ps' =>  $ps ]);	   
    }
	public function MemProductDetail($p_sno)
    { 
	   // return ("p_sno = " . $p_sno );
	   $sql = "SELECT  A.* , B.m_name FROM yproduct as A , ymember as B where (A.m_acc = B.m_acc)  and (p_sno = $p_sno)";	  
  	   $ps = DB::select($sql);
       if ($ps == NULL)
			   return "NO DATA........";
       else
	     return view('Member.MemProductDetail', [ 'p' => $ps[0] ]  );	  	 
    }
	
    public function MemProductUpdateDB(Request $r)
    {     
     // return("id=$r->p_sno, name=$r->p_name");
	  $sql = "update yproduct  set p_name='$r->p_name', p_price='$r->p_price' ,c_sno='$r->c_sno' ";
      $sql .= ", p_status = '$r->p_status' ";
	  if($r->hasFile('upFile')){
         $dstPath = 'images/productPhoto/';     // 會存到 public/images/userPhoto 資料夾
         $f = uniqid(). "."  . $r->upFile->getClientOriginalExtension() ;  // 產生亂數檔名
	     $r->upFile->move( $dstPath,  $f);  // 上傳檔案	
         $sql .= " , p_photo = '$f' ";	   // 更新照片欄	

         $oldFile = $dstPath . $r->oldPhoto;
		 // return("old=$oldFile");
		 if (file_exists($oldFile) )
               unlink($oldFile);   // 刪除舊檔
		 } 
	 
      $sql .= " where  p_sno = '$r->p_sno' ";
	 //  return($sql);
       DB::update($sql);
       return redirect("Member/MemProductMgt"); 
	   

    }
    public function MemProductDelete(Request $r)
    {   //return("p_sno = $r->p_sno");
	    $sql = "select * from yproduct where p_sno = '$r->p_sno'  ";
	    $ps = DB::select($sql);
		if($ps[0]->p_photo !="" )
		{
		   $dstPath = "images/productPhoto/";
		   $oldFile = $dstPath . $ps[0]->p_photo;
		   if (file_exists($oldFile))
			  unlink($oldFile);   // 刪除舊檔
		}
		$sql ="delete from yproduct  where p_sno = '$r->p_sno'  ";
		DB::delete($sql);
		return redirect("Member/MemProductMgt"); 
    }
	public function MemInfo()
	{
		
		$acc = session('LoginAcc' ); // 從Session變數取出會員帳號
		$sql = "select * from ymember where m_acc = '$acc'";
		//return("sql:" . $sql);
        $users =DB::select($sql);  // 找到該會員資料 $users 雖然只有一筆資料，但還是個陣列
		//return("name: " . $users[0]->m_name);
	   return view('Member.MemInfo', [ 'user' => $users[0]  ]);   //將第一筆紀錄傳給 view
	  
    }
	public function MemInfoUpdate(Request  $r)
	{
		// return($r->name . " , " . $r->sex);		
		$acc = session('LoginAcc' ); // 從Session變數取出會員帳號
	
		
		$sql = " update ymember set m_name = '$r->name' , m_sex = '$r->sex' ";  
		if($r->newPWD !="")
			$sql .= " , m_pwd = '$r->newPWD' ";
		// 若有選新照片
      // uniqid() : 亂數字串 ， $file->getClientOriginalExtension() : 取得副檔名 
       if($r->hasFile('upFile')){
         $dstPath = 'images/userPhoto/';     // 會存到 public/images/userPhoto 資料夾
         $f = uniqid(). "."  . $r->upFile->getClientOriginalExtension() ;  // 產生亂數檔名
	     $r->upFile->move( $dstPath,  $f);  // 上傳檔案	
         $sql .= " , m_photo = '$f' ";	   // 更新照片欄	

         $oldFile = $dstPath . $r->oldPhoto;
		 // return("old=$oldFile");
		 if (file_exists($oldFile) )
               unlink($oldFile);   // 刪除舊檔
		 } 
		
		//return("sql:" . $sql);
		
		$sql .=  " where m_acc = '$acc'";
        DB::update($sql);  // 找到該會員資料 $users 雖然只有一筆資料，但還是個陣列
		//return("name: " . $users[0]->m_name);
		
	   return redirect("Member/MemInfo"); 
    }
	public function MemProductAdd()
	{
		$cates = DB::select("select * from ycategory ");
		return view('Member.MemProductAdd', ['cates' => $cates ]); 
	}
	public function MemProductAddDB(Request  $r)
	{
		//return("name=$r->p_name");
		
		 $acc = session('LoginAcc' ); // 從Session變數取出會員帳號
         $sql = "insert into yproduct (p_name,p_price,c_sno ,m_acc,p_eval,p_status,p_photo) ";
		 $sql .= " values ('$r->p_name','$r->p_price','$r->c_sno','$acc','0','上架中' ";
	     // 若有上傳照片
		 $f = "";
         if($r->hasFile('upFile')){
           $dstPath = 'images/productPhoto/';     // 會存到 public/images/userPhoto 資料夾
           $f = uniqid(). "."  . $r->upFile->getClientOriginalExtension() ;  // 產生亂數檔名
	       $r->upFile->move( $dstPath,  $f);  // 上傳檔案      
		 }		   
	     $sql .= " ,'$f') ";	   // 更新照片欄
   
     //return($sql);
     DB::insert($sql);   
     return redirect("Member/MemProductMgt"); 		

		
		
	}
}
