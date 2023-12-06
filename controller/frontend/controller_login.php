<?php 
	class controller_login{
		//tao bien model
		public $model;
		public function __construct(){
			//khoi tao object cua class model, gan vao bien model
			$this->model = new model();
			//----------------
			//neu user an nut submit
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$email = $_POST["email"];
				$password = $_POST["password"];
				//kiem tra dang nhap
				$check = $this->model->get_a_record("select email, password,customer_id from tbl_taikhoan where email='$email'");

				if(isset($check->email)){
					//if($check->password == md5($password)){
					if($check->password == $password){
						//gan vao session
						$_SESSION["email"] = $email;
						$_SESSION["customer_id"] = $check->customer_id;
						//quay tro lai trang index
					
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
						echo '<script language="javascript">';
  						echo 'alert("Đăng nhập thành công !")';  //not showing an alert box.
  						echo '</script>'; 
						exit;
							
					}
				}
						echo '<script language="javascript">';
  						echo 'alert("Sai tài khoản hoặc mật khẩu !")';  //not showing an alert box.
  						echo '</script>';
			}
			//----------------
			//load view
			include "view/frontend/view_login.php";
		}
	}
	new controller_login();
 ?>