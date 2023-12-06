<?php 
	class controller_lienhe{
		public $model;
		public function __construct(){
			$this->model = new model();
			//load view
			include "view/frontend/view_lienhe.php";
		}
	}
	new controller_lienhe();
 ?>