<?php
	class controller_giaohang{
		public $model;
		public function __construct(){
			$this->model = new model();
			$id = isset($_GET["id"]) ? $_GET["id"]:0;
			$act = isset($_GET["act"]) ? $_GET["act"]:"";
			switch ($act) {
				case 'dagiaohang':
					$this->model->execute("update tbl_muahang set trangthai=3 where order_id=$id");
					echo "<META HTTP-EQUIV='Refresh' Content='0; URL=admin.php?controller=giaohang&id=$id'>";
					break;
				case 'danggiaohang':
					$this->model->execute("update tbl_muahang set trangthai=2 where order_id=$id");
					echo "<META HTTP-EQUIV='Refresh' Content='0; URL=admin.php?controller=giaohang&id=$id'>";
					break;
				case 'huydonhang':
					$this->model->execute("update tbl_muahang set trangthai=4 where order_id=$id");
					echo "<META HTTP-EQUIV='Refresh' Content='0; URL=admin.php?controller=giaohang&id=$id'>";
					break;
				default:
					# code...
					break;
			}
			//load view
			include "view/backend/view_giaohang.php";
		}
	}
	new controller_giaohang();
?>