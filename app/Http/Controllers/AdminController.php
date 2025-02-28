<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdminController extends Controller
{
    public function Index()
	{
	   return view('Admin.Index');   // 顯示 index 的 view   
    }
	public function AdmMemberMgt()
	{
		
     $users = DB::select('select  *  from ymember order by  m_acc  desc');
     if ($users == NULL)
			   return "NO DATA........";
     else
		return view('Admin.AdmMemberMgt', ['mems' => $users]);


		
	  // return view('Admin.AdmMemberMgt');   // 顯示 index 的 view   
    }
	 public function AdmMemberDelete(Request $r)
	{
		
	//	return ("帳號:  $r->uid " );
	$sql = "select * from ymember where m_acc = '$r->uid'";        //先找到該帳號
    $users = DB::select($sql);          // $users  是陣列，  $users[0]  是第一筆資料
    $dstPath = 'images/userPhoto/';    // 會員照片放在 public/images/userPhoto 資料夾			
     // 刪除照片
     $oldFile = $dstPath . $users[0]->m_photo;
     if (file_exists($oldFile) )
	 {
	      unlink($oldFile);
	      // return("delete OK: " . $oldFile); 
		  }
	$sql = "delete from ymember where m_acc = '$r->uid' ";

	    DB::delete($sql);
		return redirect("Admin/AdmMemberMgt");


	  // return view('Admin.Index');   // 顯示 index 的 view   
    }
	public function AdmOrderMgt()
	{
		$sql = "select * from yordermain order by om_date desc  ";
		$ods = DB::select($sql); 
		
		return view('Admin.AdmOrderMgt', ['ods' => $ods]);		
	}

	public function AdmOrderDetail($omsno)
	{	
     $sql="SELECT A.*,B.p_name, B.p_photo FROM yorderdetail  as A , yproduct as  B where (A.p_sno = B.p_sno)  and  A.om_sno=$omsno";	
     $ps = DB::select("$sql");
     if ($ps == NULL)
			   return "NO DATA........";
     else
		return view('Admin.AdmOrderDetail', [ 'ps' => $ps ]);		
	}

	public function AdmOrderExport()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', '購買者');
		$sheet->setCellValue('B1', '收件人');
		
		$sql = "select * from yordermain";
		$oms = DB::select($sql);
		$row = 2;
		foreach($oms as $om)
		{
			$sheet->setCellValue('A'.$row, $om->m_acc);
			$sheet->setCellValue('B'.$row, $om->om_name);
			$row = $row + 1;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save('ydemo.xlsx');
	
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ydemo.xlsx"');
		header('Cache-Control: max-age=0');
	
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	
	}
	public function AdmMemberImport()
    {
		return view('Admin.AdmMemberImport');
	}
	public function AdmMemberExcelImport(Request $r)
    {  
	    $m="";
	    $reader = IOFactory::createReader('Xlsx');

        // 開啟檔案 載入excel表格
        $spreadsheet = $reader->load($r->file('excel_file'));
        $sheet = $spreadsheet->getActiveSheet();

        // 獲取內容的最大行 如:D
        $max_col = $sheet->getHighestColumn();

        // 獲取內容的最大列 如:4
        $max_row = $sheet->getHighestRow();
		$m .= "row=$max_row   ,  col= $max_col  <br>";  
       
        for ($i = 2;  $i <= $max_row;  $i++) {          
			$acc  = $sheet->getCellByColumnAndRow(1, $i)->getValue();
			$pwd  = $sheet->getCellByColumnAndRow(2, $i)->getValue();
            $name = $sheet->getCellByColumnAndRow(3, $i)->getValue();
			$sql = "insert into ymember (m_acc,m_pwd,m_name) values(";
			$sql .= "'$acc' , '$pwd' , '$name')";
			DB::insert($sql);
		}

        return ("匯入成功");
}

}
