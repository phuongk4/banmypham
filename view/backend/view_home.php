<?php $dem= $this->model->get_all("select count(*) from tbl_sanpham") ?>
<div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">5 New Messages!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('admin/contact')}}">
                  <span class="float-left">Chi tiết</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><?php echo count($dem) ?> Sản phẩm !</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="admin.php?controller=product">
                  <span class="float-left">Chi tiết</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">15 Đơn hàng mới !</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="admin.php?controller=order">
                  <span class="float-left">Chi tiết</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">13 New Tickets!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">Chi tiết</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Bieu do tron the hien so don hang-->
          <div id="thongkedonhang"></div>
    <!-- <script src="public/backend/js/chart-area-demo.js"></script> -->
    <!-- <script src="public/backend/js/Chart.min.js"></script> -->
    <script src="public/backend/js/highcharts.js"></script>

    <?php
      $so_don_da_giao_hang = $this->model->get_num_rows("select * from tbl_muahang where trangthai = 3");
      $so_don_dang_giao_hang = $this->model->get_num_rows("select * from tbl_muahang where trangthai = 2");
      $so_don_chua_giao_hang = $this->model->get_num_rows("select * from tbl_muahang where trangthai = 1");
      $so_don_bi_huy = $this->model->get_num_rows("select * from tbl_muahang where trangthai = 4");
    ?>
    <script>

  // Tạo biểu đồ chart
  Highcharts.chart('thongkedonhang', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Tình trạng đơn hàng'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },
    series: [{
      name: 'Tỉ lệ',
      colorByPoint: true,
      data: [{
        name: 'Đã giao hàng',
        y: <?php echo $so_don_da_giao_hang; ?>
      }, {
        name: 'Đang giao hàng',
        y: <?php echo $so_don_dang_giao_hang; ?>
      }, {
        name: 'Chưa giao hàng',
        y: <?php echo $so_don_chua_giao_hang; ?>
      }, {
        name: 'Đơn hàng bị hủy',
        y: <?php echo $so_don_bi_huy; ?>
      }]
    }]
  });
</script>