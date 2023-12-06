<?php 
	class controller_sanpham_chitiet{
		public $model;
		public function __construct(){
			$this->model = new model();
			// id product
			$id = isset($_GET["id"])?$_GET["id"]: 0;

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(isset($_SESSION["customer_id"]) == false || !array_key_exists("customer_id",$_SESSION)) {
					echo '<script language="javascript">';
					echo 'alert("Vui lòng đăng nhập để bình luận !")';
					echo '</script>'; 
					echo "<meta http-equiv='refresh' content='0'>";
					return;
				}
				$comment_input = $_POST["comment-input"];
				$product_id = $id;
				$customer_id = $_SESSION['customer_id'];

				$this->model->execute("insert into tbl_binhluan set user_id='$customer_id',product_id='$product_id',comment='$comment_input', create_date = now()");
				//reload page
				echo "<meta http-equiv='refresh' content='0'>";
			}
			$arr_cmt = $this->model->get_all("select tbl_taikhoan.hovaten,tbl_binhluan.comment,tbl_binhluan.create_date from tbl_binhluan 
			left join tbl_taikhoan on tbl_taikhoan.customer_id  = tbl_binhluan.user_id
			where tbl_binhluan.product_id = $id  order by tbl_binhluan.create_date desc limit 5");
			include "view/frontend/view_sanpham_chitiet.php";
		}
	}
	new controller_sanpham_chitiet();
 ?>