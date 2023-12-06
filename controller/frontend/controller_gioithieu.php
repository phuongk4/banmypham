 <?php 
	 class controller_gioithieu{
	 	public $model;
	 	public function __construct(){
	 		$this->model = new model();
	 		//load view
	 		include "view/frontend/view_gioithieu.php";
	 	}
	 }
	 new controller_gioithieu();
 ?> 