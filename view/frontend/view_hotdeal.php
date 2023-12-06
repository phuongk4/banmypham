<div class="timely">
    <div class="title-group"><h2>hot deals</h2></div>
    <div id="timely-owl" class="owl-container">
        <div class="owl">
            <?php
            //liệt kê sản phẩm nổi bật
            $product = $this->model->get_all("select * from tbl_sanpham_moi order by id_sp desc limit 0,8");
            foreach ($product as $rows):
            ?>
            <div class='timer-item item'>
                <div class="item-inner">
                    <div class="images-container">
                        <a href="index.php?controller=sanpham_chitiet&id=<?php echo $rows->id_sp; ?>" title="" class="product-image"><img style="width: 226px;height: 268px;" src="public/upload/product/<?php echo $rows->c_img; ?>" alt="hotdeal" /></a>
                        <div class="box-timer">
                            <div class="countbox_1 timer-grid"></div>
                        </div>
                    </div>
                    <div class="content-box">
                        <h2 style="text-align: center;" class="product-name"><a href="index.php?controller=sanpham_chitiet&id=<?php echo $rows->id_sp; ?>" title="Fusce aliquam"><?php echo $rows->c_name; ?></a></h2>
                        <div style="text-align: center;" class="price-box">
                            <p class="special-price">
                                <span class="price-label">Special Price</span>
                                <span class="price"><?php echo number_format($rows->c_price); ?>VNĐ</span>
                            </p>
                            <p class="old-price">
                                <span class="price-label">Regular Price: </span>
                                <span class="price">7.000.000 VNĐ</span>
                            </p>
                        </div>
                        <div class="ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:67%"></div>
                            </div>
                            <span class="amount"><a href="#">1 Review(s)</a></span>
                        </div>
                    </div>
                </div>
            </div>
           <?php endforeach; ?>  
        </div>
    </div>
</div><!-- /.timely -->