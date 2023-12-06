<?php
	class controller_donhang_cuatoi{
		public $model;
		public function __construct(){
			$this->model = new model();
			include "view/frontend/view_donhang_cuatoi.php";
		}
	}
	new controller_donhang_cuatoi();
?>