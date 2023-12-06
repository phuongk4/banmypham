<?php 
	class controller_register{
		public $model;
		public function __construct(){
			$this->model = new model();
			//-----
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$email = $_POST["email"];
				 //$password = md5("password");
				$password = $_POST["password"];
				$hovaten = $_POST["hovaten"];
				$diachi = $_POST["diachi"];
				$dienthoai = $_POST["dienthoai"];
				//insert ban ghi vao tbl_taikhoan, lay ra customer_id vua insert
				$customer_id = $this->model->execute("insert into tbl_taikhoan set email='$email',password='$password', hovaten='$hovaten',diachi='$diachi',dienthoai='$dienthoai'");
				//insert mot ban ghi vao tbl_muahang, lay ra order_id vua insert
				// $order_id = $this->model->execute("insert into tbl_muahang set customer_id=$customer_id, ngaymua=now(), trangthai=0");
				// //duyet cac phan tu cua session array cart, insert ban ghi vao tbl_muahang_detai
				// foreach($_SESSION["cart"] as $product){
				// 	 $fk_product_id = $product["id_sp"];
				// 	 $number = $product["number"];
				// 	 $this->model->execute("insert into tbl_giaohang set order_id=$order_id,fk_product_id=$fk_product_id,c_number=$number");
				
				// //xoa gio hang
				// $_SESSION["cart"] = array();
				// echo "<script>location.href='index.php?controller=cart';</script>";
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
						echo '<script language="javascript">';
  						echo 'alert("Đăng ký thành công !")';  //not showing an alert box.
  						echo '</script>'; 
						echo "<script>location.href='index.php?controller=login';</script>";
						exit;
			}
			//-----
			include "view/frontend/view_register.php";
			//-----
		}
	}
	new controller_register();
 ?>