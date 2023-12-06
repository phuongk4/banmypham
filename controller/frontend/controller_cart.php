<?php
	class controller_cart{
		public $model;
		public function __construct(){			
			$this->model = new model();
			//khoi tao gio hang
			if(isset($_SESSION["cart"]) == false)
				$_SESSION["cart"] = array();
			//-----------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			switch ($act) {
				case 'add':
				//thêm 1 sản phẩm vào giỏ hàng
					$this->cart_add($id);
					//quay lại trang giỏ hàng
					//header("location:index.php?controller_cart");
					echo "<script>header('location:index.php?controller_cart')</script>";
					break;
				case 'delete':
				//xóa sản phẩm khỏi giỏ hàng
					$this->cart_delete($id);
					echo "<script>location.href='index.php?controller=cart'; </script>";
					break;
				case 'destroy':
				//huy toàn bộ giỏ hàng
					$this->cart_destroy();
					echo "<script>location.href='index.php?controller=cart'; </script>";
					break;
				case 'update':
					//caajjp nhật số lượng sản phẩm trong giỏ hàng
				//duyệt từng phần tử trong giỏ hàng, thực hiên  updat lại số lượng
				foreach ($_SESSION["cart"] as $product) {
					$id_sp = $product["id_sp"];
					$soluong = $_POST["$id_sp"];
					//gọi hàm cập nhật số lượng
					$this->cart_update($id_sp, $soluong);
				}
				echo "<script>location.href='index.php?controller=cart'; </script>";
					break;
				default:
					# code...
					break;
			}
			//===========
			//load view
			include "view/frontend/view_cart.php";
			//=================
		}

		public function cart_add($id_sp){
		    if(isset($_SESSION['cart'][$id_sp])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id_sp]['number']++;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        $product = $this->model->get_a_record("select * from tbl_sanpham where id_sp=$id_sp");
		        
		        $_SESSION['cart'][$id_sp] = array(
		            'id_sp' => $id_sp,
		            'c_name' => $product->c_name,
		            'c_img' => $product->c_img,
		            'number' => 1,
		            'c_price' => $product->c_price
		        );
		    }
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cart_update($id_sp, $number){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$id_sp]);
		    } else {
		        $_SESSION['cart'][$id_sp]['number'] = $number;
		    }
		}
		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cart_delete($id_sp){
		    unset($_SESSION['cart'][$id_sp]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cart_total(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += $product['c_price'] * $product['number'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cart_number(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['number'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cart_list(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cart_destroy(){
		    $_SESSION['cart'] = array();
		}

	}
	new controller_cart();
?>