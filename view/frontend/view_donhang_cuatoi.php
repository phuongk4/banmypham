<div class="row justify-content-center">
	<div class="col-md-12">
		<!-- card -->
		
		<div class="card border-primary">
			<div class="card card-header bg-success text-white" style="padding:7px !important; font-weight:bold">Đơn hàng của tôi</div>
			<?php 
				$id = isset($_GET["id"]) ? $_GET["id"]:0;
				//lấy 1 bản ghi ở bảng tbl_taikhoan
				$customer = $this->model->get_a_record("select * from tbl_taikhoan");
				$customer_id=$_SESSION['customer_id'];
			 ?>
				<table class=" table table-bordered table-hover">
					<tr>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá</th>
					</tr>
					<?php 
						//lấy các bản ghi trong tbl_giaohang tương ứng với order_id truyền vào
					$product = $this->model->get_all("select tbl_giaohang.* from tbl_giaohang 
					INNER JOIN tbl_muahang ON tbl_giaohang.order_id = tbl_muahang.order_id WHERE tbl_muahang.customer_id = $customer_id");
					// var_dump($product);
					// die;
					foreach ($product as $rows): 
						//lấy sản phẩm
						$get_product = $this->model->get_a_record("select c_name, c_price from tbl_sanpham where id_sp=".$rows->fk_product_id);
					 ?>
					<tr>
						<td><?php echo $get_product->c_name; ?></td>
						<td><?php echo $rows->c_number; ?></td>
						<td><?php echo number_format($get_product->c_price*$rows->c_number); ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
		<!-- end card -->
	</div>
</div>