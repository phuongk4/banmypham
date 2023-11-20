<?php 
	//huy session
	unset($_SESSION["email"]);
	unset($_SESSION["customer_id"]);
	//quay tro lai trang admin.php
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
	exit;
 ?>