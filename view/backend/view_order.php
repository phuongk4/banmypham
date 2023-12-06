<div class="row justify-content-center">
	<div class="col-md-12">
		<!-- card -->

		<div class="card border-primary">
			<div class="card card-header bg-primary text-white" style="padding:7px !important;">Danh sách đơn hàng</div>
			<div class="card-body">
				<!-- table -->
				<table class="table table-hover table-bordered">
					<tr>
						<th>Họ và tên</th>
						<th>Địa chỉ</th>
						<th>Số điện thoại</th>

						<th>Ngày mua</th>
						<th style="text-align: center;">Chi tiết</th>
						<th>Tình trạng</th>
						<!-- <th style="width: 70px;"></th> -->
					</tr>
					<?php foreach ($arr as $rows) : ?>
						<?php
						//lấy thông tin từ bảng tbl_taikhoan
						$customer = $this->model->get_a_record("select * from tbl_muahang where order_id=" . $rows->order_id);
						?>
						<tr>
							<td><?php echo $customer->hoten; ?></td>
							<td><?php echo $customer->diachi; ?></td>
							<td><?php echo $customer->sdt; ?></td>
							<td>
								<?php
								$date = date_create($rows->ngaymua);
								echo date_format($date, "d/m/Y");
								?>
							</td>
							<td style="text-align: center;">
								<a href="admin.php?controller=giaohang&id=<?php echo $rows->order_id; ?>">Chi tiết</a>
							</td>
							<td>
								<!-- <?php
								//if ($rows->trangthai == 1) :
								?>
									<span class="badge badge-success">Đã giao hàng</span>
								<?php //else : ?>
									<span class="badge badge-danger">Chưa giao hàng</span> -->
								<?php //endif; ?>

								<?php
									switch ($rows->trangthai) {
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
									}
								?>
							</td>

							<!-- <td style="text-align: center;">
								<a href="admin.php?controller=order&act=delete&id=<?php echo $rows->order_id; ?>">Delete</a>
							</td> -->
						</tr>
					<?php endforeach; ?>
				</table>

				<!-- end table -->
			</div>
			<div class="card-footer" style="padding:7px !important">
				<ul class="pagination">
					<li class="page-item"><a class="page-link" href="#">Trang</a></li>
					<?php
					for ($i = 1; $i <= $num_page; $i++) {
					?>
						<li class="page-item"><a class="page-link" href="admin.php?controller=order&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- end card -->
</div>
</div>s