<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    public function ProductEval(Request $r)
    {
      $v=DB::select("select * from pvalue where m_acc='$r->acc' and p_sno=$r->sno");
      if($v !=NULL)
      {
        DB::delete("delete from pvalue where m_acc='$r->acc' and p_sno=$r->sno");
      }
        //return "m_acc= $r->m_acc , p_sno = $r->p_sno , yval=$r->yval";

        // 先加入評價
        DB::insert('insert into pvalue (p_sno, m_acc, pv_val) values (?, ?, ?)', array($r->sno,  $r->acc, $r->yval));
        // 讀出平均評價
        $sql = "select avg(pv_val) as yval  from  pvalue  where p_sno= '$r->sno'";
        $vs = DB::select($sql);
        if ($vs == NULL)
            return "---";
        else
            return   round($vs[0]->yval ,2);

    }

    public function ProductAddCar(Request $r)
    {   
     
      $acc= $r->acc;
      $price=$r->price;
      $sno = $r->sno;
      //return "acc= $acc , price=$price, sno = $sno ";
      // 查看該商品是否已在訂單明細資料表， 且未轉成訂單

	  $v = DB::select("select * from yorderdetail  where  m_acc= '$acc' and p_sno = $sno and om_sno=-1 ");
      if ($v == NULL)   // 找不到就新增
      {
          DB::insert('insert into yorderdetail (m_acc, p_sno , od_price , od_qty) values (?,?,?,?)', array($acc, $sno, $price,1));  
      }
      else    // 找到就更新數量
      {
          DB::update("update  yorderdetail  set  od_qty=od_qty+1  where  m_acc= '$acc' and p_sno = $sno and om_sno=-1");   
      }
      return("OK");
    }

    public function ProductMyCar()
    {    // 查詢在訂單明細中屬於該會員的購物，且未轉成訂單的資料
        $acc = session('LoginAcc'); 
        $sql="SELECT A.*,B.p_name, B.p_photo FROM yorderdetail as A ,yproduct as B  where (A.p_sno= B.p_sno) and  (A.m_acc='$acc')  and  (om_sno=-1) ";
        $cars = DB::select($sql);
        return view('Product.ProductMyCar', [ 'cars' =>  $cars   ]);	
    }

    public function ProductCarToOrder(Request $r)
    {  
        $yno = count($r->odsno);   // count(陣列) 會傳回陣列元素個數
        // $msg="商品個數 = $yno  <br>";
        $amt=0;
        for($i=0; $i<$yno ;$i++)
        {
            $odsno=$r->odsno[$i];
	          $price=$r->price[$i];
	          $qty=$r->qty[$i];
            if ($qty > 0 )
	          {   // 更新數量 
              DB::update("update yorderdetail set od_qty= $qty  where  od_sno=$odsno");
              $amt += $price * $qty;
            }
	          else            // <= 0 則刪除該項購物	  
               DB::delete("delete from yorderdetail  where od_sno=$odsno");     
        }
        //$msg = "完成更新購物數量";
        $acc = session('LoginAcc' ); // 從Session變數取出會員帳號
        if($amt > 0)
        {
          $sql = "insert into yordermain (m_acc, om_name,om_tel,om_addr,om_amt) values (";
		      $sql .= "'$acc','$r->yname','$r->ytel','$r->yaddr',$amt)";
		      DB::insert($sql);
          $msg = "新增訂單主檔紀錄";
        // 取出最新的主檔流水號
          $sql = "select  om_sno  from yordermain order by om_sno desc limit 1 ";
		      $top1 = DB::select($sql);
		      $omsno = $top1[0]->om_sno;
          //$msg = "top1 = $omsno";

        // 更新購物資料的主檔流水號(代表該購物資料已經隸屬於某訂單，已轉成訂單)
          $sql = "update  yorderdetail  set  om_sno =$omsno  where  m_acc='$acc'  and  om_sno = -1";
		      DB::update($sql);	  
          $msg = "轉訂單OK";
        }
        return $msg;
    }
    public function ProductDeleteCar(Request $r, $od_sno)
    {
        try {
            $acc = session('LoginAcc'); // 取得當前登入會員帳號
            if (!$acc) {
                return response()->json(['success' => false, 'message' => '未登入，無法刪除購物車項目']);
            }

            // 檢查該項目是否存在且屬於該會員
            $item = DB::select("SELECT * FROM yorderdetail WHERE od_sno = ? AND m_acc = ? AND om_sno = -1", [$od_sno, $acc]);
            if (!$item) {
                return response()->json(['success' => false, 'message' => '找不到該購物車項目或無權限刪除']);
            }

            // 刪除該項目
            DB::delete("DELETE FROM yorderdetail WHERE od_sno = ? AND m_acc = ?", [$od_sno, $acc]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => '刪除失敗：' . $e->getMessage()]);
        }
    }

}
