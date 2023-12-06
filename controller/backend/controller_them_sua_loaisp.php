<?php 
	class controller_them_sua_loaisp{
		public $model;
		public function __construct(){
			$this->model = new model();
			//-------------
			//lay bien act tu url
			$act = isset($_GET["act"]) ? $_GET["act"]:"";
			//lay bien id tu url
			$id = isset($_GET["id"]) ? $_GET["id"]:0;
			//tao bien $form_action de xac dinh trang thai submit cua form la add hay la edit
			//kiem tra cac truong hop cua bien $act
			switch($act){
				case "edit":
					$form_action = "admin.php?controller=them_sua_loaisp&act=do_edit&id=$id";
					//lay mot ban ghi tuong ung voi id truyen vao
					$arr = $this->model->get_a_record("select * from tbl_loaisp where id_loaisp=$id");
				break;
				case "do_edit":
					$c_name = $_POST["c_fullname"];
					//-------------
					//loai bo ky tu nhay don
					$c_name = str_replace("'", "\'", $c_name);
					//-------------
					//update ban ghi co id truyen vao
					$this->model->execute("update tbl_loaisp set c_name='$c_name' where id_loaisp=$id");
					//quay tro lai trang loaisp
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php?controller=loaisp">';
					// header("location:admin.php?controller=loaisp");
				break;
				case "add":
					$form_action = "admin.php?controller=them_sua_loaisp&act=do_add";
				break;
				case "do_add":
					$c_name = $_POST["c_fullname"];
					//insert ban ghi
					$this->model->execute("insert into tbl_loaisp (c_name) values ('$c_name')");
					//quay tro lai trang loaisp
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php?controller=loaisp">';
					// header("location:admin.php?controller=loaisp");
				break;
				case "delete":
					$form_action = "admin.php?controller=them_sua_loaisp&act=delete&id=$id";
					$this->model->execute("delete from tbl_loaisp where id_loaisp=$id");
					//quay tro lai trang loaisp
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php?controller=loaisp">';
					// header("location:admin.php?controller=loaisp");
				break;
			}
			//-------------
			//load view
			include "view/backend/view_them_sua_loaisp.php";
		}
	}
	new controller_them_sua_loaisp();
 ?>