<?php 
	class controller_slide{
		public $model;
		public function __construct(){
			$this->model = new model();
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "delete":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					//thuc hien xoa ban ghi co id truyen vao
					$this->model->execute("delete from tbl_binhluan where id=$id");
					//quay lai trang quan li binh luan
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php?controller=binhluan">';
					//-----------
				break;
			}
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 4;
			//tinh tong so ban ghi
			$total = $this->model->get_num_rows("select id from tbl_binhluan");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select tbl_binhluan.id,tbl_binhluan.user_id,tbl_binhluan.comment,tbl_binhluan.create_date,tbl_sanpham.c_name tensanpham from tbl_binhluan 
			left join tbl_sanpham on tbl_binhluan.product_id = tbl_sanpham.id_sp  order by create_date desc limit $from,$record_per_page");
			//load view
			include "view/backend/view_binhluan.php";
		}
	}
	new controller_slide();
 ?>