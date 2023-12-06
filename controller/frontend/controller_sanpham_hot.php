<?php
	class controller_sanpham_hot{
		public $model;
		public function __construct(){
			$this->model = new model();
			include "view/frontend/view_sanpham_hot.php";
		}
	}
	new controller_sanpham_hot();
?>