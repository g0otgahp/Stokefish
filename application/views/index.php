<?php
	$month = array(
		'01' => "มกราคม",
		'02' => "กุมภาพันธ์",
		'03' => "มีนาคม",
		'04' => "เมษายน",
		'05' => "พฤษภาคม",
		'06' => "มิถุนายน",
		'07' => "กรกฎาคม",
		'08' => "สิงหาคม",
		'09' => "กันยายน",
		'10' => "ตุลาคม",
		'11' => "พฤศจิกายน",
		'12' => "ธันวาคม"
	);
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>ภาพรวม <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-lg-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6"> <i class="fa fa-sitemap fa-3x"></i> </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading"><?php echo $this->db->count_all_results('shop')?></p>
              <p class="announcement-text">ร้านค้าทั้งหมด</p>
            </div>
          </div>
        </div>
        <a href="#">
        <div class="panel-footer announcement-bottom">
          <!--<div class="row">
            <div class="col-xs-6"> รายละเอียด </div>
            <div class="col-xs-6 text-right"> <i class="fa fa-arrow-circle-right"></i> </div>
          </div>-->
        </div>
        </a> </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6"> <i class="fa fa-tags fa-3x"></i> </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading"><?php echo $this->db->count_all_results('product')?></p>
              <p class="announcement-text">รายการสินค้า</p>
            </div>
          </div>
        </div>
        <a href="#">
        <div class="panel-footer announcement-bottom">
          <!--<div class="row">
            <div class="col-xs-6"> รายละเอียด </div>
            <div class="col-xs-6 text-right"> <i class="fa fa-arrow-circle-right"></i> </div>
          </div>-->
        </div>
        </a> </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6"> <i class="fa fa-money fa-3x"></i> </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading">
          <?php
            $this->db->select_sum('stock.stock_price');
						$this->db->where('stock.stock_date',date('Y-m-d'));
						$this->db->where('stock.stock_type',"out");
						$query1 = $this->db->get('stock');
						$daily1 = $query1->result_array();
						echo number_format(@$daily1[0]['stock_price']);
					?>
              </p>
              <p class="announcement-text">ยอดรายวัน</p>
            </div>
          </div>
        </div>
        <a href="#">
        <div class="panel-footer announcement-bottom">
          <!--<div class="row">
            <div class="col-xs-6"> รายละเอียด </div>
            <div class="col-xs-6 text-right"> <i class="fa fa-arrow-circle-right"></i> </div>
          </div>-->
        </div>
        </a> </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6"> <i class="fa fa-money fa-3x"></i> </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading">
          <?php
            $this->db->select_sum('stock.stock_price');
						$this->db->where('stock.stock_date >=',date('Y-m').'-01');
						$this->db->where('stock.stock_date <=',date('Y-m').'-31');
						$this->db->where('stock.stock_type',"out");
						$query2 = $this->db->get('stock');
						$daily2 = $query2->result_array();
						echo number_format($daily2[0]['stock_price']);
					?>
              </p>
              <p class="announcement-text">ยอดรายเดือน</p>
            </div>
          </div>
        </div>
        <a href="#">
        <div class="panel-footer announcement-bottom">
          <!--<div class="row">
            <div class="col-xs-6"> รายละเอียด </div>
            <div class="col-xs-6 text-right"> <i class="fa fa-arrow-circle-right"></i> </div>
          </div>-->
        </div>
        </a> </div>
    </div>
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> สถิติประจำเดือน <?php echo $month[date('m')]." ".(date('Y')+543) ?></h3>
        </div>
        <div class="panel-body">
        <iframe src="<?php echo base_url()?>index.php/home/chart" width="100%" height="400" frameborder="0"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
