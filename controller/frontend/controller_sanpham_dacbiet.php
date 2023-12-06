<?php
	class controller_sanpham_dacbiet{
		public $model;
		public function __construct(){
			$this->model = new model();
			include "view/frontend/view_sanpham_dacbiet.php";
		}
	}
	new controller_sanpham_dacbiet();
?>