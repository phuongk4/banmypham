<?php 
	class controller_them_sua_sp{
		public $model;
		public function __construct(){
			$this->model = new model();
			//--------
			$id = isset($_GET["id"])?$_GET["id"]:0;
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "edit":
					$form_action = "admin.php?controller=them_sua_sanpham&act=do_edit&id=$id";
					//lay mot ban ghi
					$arr = $this->model->get_a_record("select * from tbl_sanpham where id_sp=$id");
					//load view
					include "view/backend/view_them_sua_sanpham.php";
				break;
				case "do_edit":
					$c_name = $_POST["c_name"];
					$c_price = $_POST["c_price"];
					$c_description = $_POST["c_description"];
					$c_content = $_POST["c_content"];
					$c_hotproduct = isset($_POST["c_hotproduct"])?1:0;
					$fk_category_product_id = $_POST["fk_category_product_id"];
					//edit ban ghi
					$this->model->execute("update tbl_sanpham set c_name='$c_name',c_price='$c_price',c_description='$c_description',c_content='$c_content',c_hotproduct=$c_hotproduct,fk_category_product_id=$fk_category_product_id where id_sp=$id");					
					//upload image
					$c_img = "";
					if($_FILES["c_img"]["name"] != ""){
						//-----------
						//kiem tra, neu co anh cu thi xoa anh do di
						//lay anh o truong c_img trong table tbl_sanpham ung voi id truyen vao
						$old_img = $this->model->get_a_record("select c_img from tbl_sanpham where id_sp=$id");
						//kiem tra, neu file ton tai thi xoa file nay
						if(file_exists("public/upload/product/".$old_img->c_img)&&$old_img->c_img!=""){
							//xoa anh bang ham unlink
							unlink("public/upload/product/".$old_img->c_img);
						}
						//-----------
						$c_img = time().$_FILES["c_img"]["name"];
						//upload file
						move_uploaded_file($_FILES["c_img"]["tmp_name"], "public/upload/product/$c_img");
						//update truong c_img cua ban ghi co id truyen vao
						$this->model->execute("update tbl_sanpham set c_img='$c_img' where id_sp=$id");
					}
					//------------
					//quay lai trang tin tuc
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php?controller=sanpham">';
					// header("location:admin.php?controller=sanpham");
				break;
				case "add":
					//dinh nghia bien $form_action de chi action cua form
					$form_action = "admin.php?controller=them_sua_sanpham&act=do_add";
					//load view
					include "view/backend/view_them_sua_sanpham.php";
				break;
				case "do_add":
					$c_name = $_POST["c_name"];
					$c_price = $_POST["c_price"];
					$c_description = $_POST["c_description"];
					$c_content = $_POST["c_content"];
					$c_hotproduct = isset($_POST["c_hotproduct"])?1:0;
					$fk_category_product_id = $_POST["fk_category_product_id"];

					//upload image
					$c_img = "";
					if($_FILES["c_img"]["name"] != ""){
						$c_img = time().$_FILES["c_img"]["name"];
						//upload file
						move_uploaded_file($_FILES["c_img"]["tmp_name"], "public/upload/product/$c_img");
					}
					//them ban ghi vao csdl
					$this->model->execute("insert into tbl_sanpham(c_name,c_price,c_description,c_content,c_img,c_hotproduct,fk_category_product_id) values('$c_name','$c_price','$c_description','$c_content','$c_img','$c_hotproduct','$fk_category_product_id')");
					//------------
					//quay lai trang tin tuc
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php?controller=sanpham">';
				break;
			}
			//--------
		}
	}
	new controller_them_sua_sp();
 ?>