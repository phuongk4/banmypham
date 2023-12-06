<div class="row justify-content-center">
	<div class="col-md-12">
		<!-- card -->
		<div style="margin:15px 0px">
			<a href="admin.php?controller=them_sua_sanpham&act=add" class="btn btn-primary">Add</a>
		</div>
		<div class="card border-primary">
			<div class="card card-header bg-primary text-white" style="padding:7px !important;">Login</div>
				<div class="card-body">
				<!-- table -->
				<table class="table table-hover table-bordered">
					<tr>
						<th style="width: 150px;">Ảnh</th>
						<th>Tên sản phẩm</th>
						<th style="width: 150px;">Giá</th>
						<th style="width: 150px;">Danh mục</th>
						<th style="width: 120px;">SP nổi bật</th>
						<th style="width: 150px;"></th>
					</tr>
				<?php 
					foreach($arr as $rows)
					{
				 ?>
					<tr>
						<td>
<?php if(file_exists("public/upload/product/".$rows->c_img)) { ?>
<img src="public/upload/product/<?php echo $rows->c_img; ?>" style="width: 150px; height: 124px;">
<?php } ?>
						</td>
						<td><?php echo $rows->c_name; ?></td>
						<td><?php echo $rows->c_price; ?></td>
						<td>
<?php 
	//lay mot ban ghi, goi ham get_a_record() trong model
	$category = $this->model->get_a_record("select c_name from tbl_loaisp where id_loaisp=".$rows->fk_category_product_id);
	echo isset($category->c_name)?$category->c_name:"";
 ?>
						</td>
						<td style="text-align: center;">
						<?php if($rows->c_hotproduct == 1){ ?>
						Hot
						<?php } ?>
						</td>
						<td style="text-align: center;">
<a href="admin.php?controller=them_sua_sanpham&act=edit&id=<?php echo $rows->id_sp; ?>">Edit</a>&nbsp;&nbsp;
<a onclick="return window.confirm('Bạn có muốn xóa không?');" href="admin.php?controller=sanpham&act=delete&id=<?php echo $rows->id_sp; ?>">Delete</a>
						</td>
					</tr>
				<?php } ?>
				</table>
				<!-- end table -->
				</div>
				<div class="card-footer" style="padding:7px !important">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="#">Trang</a></li>
					<?php
						for($i = 1; $i <= $num_page; $i++)
						{
					 ?>
						<li class="page-item"><a class="page-link" href="admin.php?controller=sanpham&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- end card -->
	</div>
</div>