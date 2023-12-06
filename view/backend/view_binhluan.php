<div class="row justify-content-center">
	<div class="col-md-12">
		<!-- card -->

		<div class="card border-primary">
			<div class="card card-header bg-primary text-white" style="padding:7px !important;">Quản lý bình luận</div>
			<div class="card-body">
				<!-- table -->
				<table class="table table-hover table-bordered">
					<tr>
						<th style="text-align: center;">Tên khách hàng</th>
						<th style="text-align: center;">Địa chỉ</th>
						<th style="text-align: center;">Số điện thoại</th>
						<th style="text-align: center;">Tên sản phẩm</th>
						<th style="text-align: center;">Bình luận</th>
						<th style="text-align: center;">Ngày bình luận</th>
						<th style="text-align: center;">Hành động</th>
						<!-- <th style="width: 70px;"></th> -->
					</tr>
					<?php foreach ($arr as $rows) : ?>
						<?php
						//lấy thông tin từ bảng tbl_taikhoan
						$customer = $this->model->get_a_record("select *  from tbl_taikhoan where customer_id=" . $rows->user_id);
						?>
						<tr>
							<td><?php echo (isset($customer->hovaten)) ? $customer->hovaten : 'Không xác định';?></td>
							<td><?php echo (isset($customer->diachi)) ? $customer->diachi : 'Không xác định';?></td>
							<td><?php echo (isset($customer->dienthoai)) ? $customer->dienthoai : 'Không xác định';?></td>
							<td><?php echo $rows->tensanpham; ?></td>
							<td><?php echo $rows->comment; ?></td>
							<td>
								<?php
								$date = date_create($rows->create_date);
								echo date_format($date, "d/m/Y");
								?>
							</td>
							<td>
							<a onclick="return window.confirm('Bạn có muốn xóa không?');" href="admin.php?controller=binhluan&act=delete&id=<?php echo $rows->id; ?>">Delete</a>
							</td>
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
						<li class="page-item"><a class="page-link" href="admin.php?controller=binhluan&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- end card -->
</div>
</div>s