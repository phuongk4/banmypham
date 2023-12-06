<div class="row justify-content-center">
	<div class="col-md-12">
		<!-- card -->
		
		<div class="card border-primary">
			<div class="card card-header bg-primary text-white" style="padding:7px !important;">Chi tiết đơn hàng</div>
			<?php 
				$id = isset($_GET["id"]) ? $_GET["id"]:0;
				//lấy 1 bản ghi ở bảng tbl_taikhoan
				$customer = $this->model->get_a_record("select * from tbl_muahang where order_id = $id");
			 ?>
				<div class="card-body">
		            <?php
						switch ($customer->trangthai) {
							//chưa giao hàng
							case 1:
								echo "<div style='margin-bottom: 5px; margin-right: 5px; float:left;'><a href='admin.php?controller=giaohang&act=dagiaohang&id=$id' class='btn btn-success'>Xác nhận đã giao hàng</a></div>";
								echo "<div style='margin-bottom: 5px;margin-right: 5px; float:left;'><a href='admin.php?controller=giaohang&act=danggiaohang&id=$id' class='btn btn-warning'>Xác nhận đang giao hàng</a></div>";
								echo "<div style='margin-bottom: 5px;margin-right: 5px;'><a href='admin.php?controller=giaohang&act=huydonhang&id=$id' class='btn btn-secondary'>Xác nhận hủy đơn hàng</a></div>";
								break;
							//đang giao hàng
							case 2:
								echo "<div style='margin-bottom: 5px;margin-right: 5px; float:left;'><a href='admin.php?controller=giaohang&act=dagiaohang&id=$id' class='btn btn-success'>Xác nhận đã giao hàng</a></div>";
								echo "<div style='margin-bottom: 5px;margin-right: 5px;'><a href='admin.php?controller=giaohang&act=huydonhang&id=$id' class='btn btn-secondary'>Xác nhận hủy đơn hàng</a></div>";
								break;
							//đã giao hàng
							case 3:
								break;
							// hủy đơn hàng
							case 4:
								echo "<div style='margin-bottom: 5px;margin-right: 5px; float:left;'><a href='admin.php?controller=giaohang&act=dagiaohang&id=$id' class='btn btn-success'>Xác nhận đã giao hàng</a></div>";
								echo "<div style='margin-bottom: 5px;margin-right: 5px; '><a href='admin.php?controller=giaohang&act=danggiaohang&id=$id' class='btn btn-warning'>Xác nhận đang giao hàng</a></div>";
								break;
							default:
								break;
						}
					?>
				<p style="font-weight:bold">Họ và tên: <?php echo $customer->hoten; ?></p>
				<p style="font-weight:bold">Địa chỉ: <?php echo $customer->diachi; ?></p>
				<p style="font-weight:bold">Điện thoại: <?php echo $customer->sdt; ?></p>
				<p style="font-weight:bold">Ghi chú: <?php echo $customer->ghichu; ?></p>

				<p style="font-weight:bold">Trạng thái: <?php 
					switch ($customer->trangthai) {
						case 1:
							echo "<span class='badge badge-danger'>Chưa giao hàng</span>";
							break;
						case 2:
							echo "<span class='badge badge-warning'>Đang giao hàng</span>";
							break;
						case 3:
							echo "<span class='badge badge-success'>Đã giao hàng</span>";
							break;
						case 4:
							echo "<span class='badge badge-secondary'>Hủy đơn hàng </span>";
							break;
						default:
							echo "<span class='badge badge-dark'>Không xác định</span>";
							break;
					} ?></p>
				
				</div>
				<table class=" table table-bordered table-hover">
					<tr>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá</th>
					</tr>
					<?php 
						//lấy các bản ghi trong tbl_giaohang tương ứng với order_id truyền vào
					$product = $this->model->get_all("select * from tbl_giaohang where order_id=$id");
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