<?php
class controller_checkout
{
	public $model;
	//khởi tạo 1 đối tượng 
	public function __construct()
	{
		$this->model = new model();
		// var_dump($_SESSION);
		// die;
		//-----
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$hoten = $_POST["hoten"];
			$diachi = $_POST["diachi"];
			$sdt = $_POST["sdt"];
			$ghichu = $_POST["ghichu"];
			//insert ban ghi vao tbl_customer, lay ra customer_id vua insert
			//$customer_id = $this->model->execute("insert into tbl_customer set hovaten='$hovaten',diachi='$diachi',dienthoai='$dienthoai',ghichu='$ghichu'");
			$customer_id = $_SESSION['customer_id'];
			// var_dump($customer_id);
			// die;
			//insert mot ban ghi vao tbl_order, lay ra order_id vua insert
			$order_id = $this->model->execute_return_id("insert into tbl_order set customer_id=$customer_id, hoten='$hoten',diachi='$diachi',sdt='$sdt',ghichu='$ghichu',ngaymua=now(),trangthai=0 ");

			//duyet cac phan tu cua session array cart, insert ban ghi vao tbl_order_detai
			// echo '<pre>';
			// var_dump($_SESSION["cart"]);
			// echo '</pre>';
			// var_dump($order_id);
			// die;
			foreach ($_SESSION["cart"] as $product) {

				$fk_product_id = $product["pk_product_id"];
				$number = $product["number"];
				$this->model->execute("insert into tbl_order_detail set order_id=$order_id,fk_product_id=$fk_product_id,c_number=$number");
			}

			//xoa gio hang
			$_SESSION["cart"] = array();
			echo "<script>location.href='index.php?controller=my_order';</script>";
		}
		//-----
		include "view/frontend/view_checkout.php";
		//-----
	}
}
new controller_checkout();
