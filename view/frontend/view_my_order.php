<div class="row justify-content-center">
	<div class="col-md-12">
		<!-- card -->
		
		<div class="card border-primary">
			<div class="card card-header bg-danger text-white" style="padding:7px !important;">Đơn hàng của tôi</div>
			<?php 
				$id = isset($_GET["id"]) ? $_GET["id"]:0;
				//lấy 1 bản ghi ở bảng tbl_customer
				$customer = $this->model->get_a_record("select * from tbl_customer");
				$customer_id=$_SESSION['customer_id'];
			 ?>
				<table class=" table table-bordered table-hover">
					<tr>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá</th>
					</tr>
					<?php 
						//lấy các bản ghi trong tbl_order_detail tương ứng với order_id truyền vào
					$product = $this->model->get_all("select tbl_order_detail.* from tbl_order_detail 
					INNER JOIN tbl_order ON tbl_order_detail.order_id = tbl_order.order_id WHERE tbl_order.customer_id = $customer_id");
					// var_dump($product);
					// die;
					foreach ($product as $rows): 
						//lấy sản phẩm
						$get_product = $this->model->get_a_record("select c_name, c_price from tbl_product where pk_product_id=".$rows->fk_product_id);
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