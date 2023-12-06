<?php 
	class controller_chinhsach{
		public $model;
		public function __construct(){
			$this->model = new model();
			//load view
			include "view/frontend/view_chinhsach.php";
		}
	}
	new controller_chinhsach();
 ?>