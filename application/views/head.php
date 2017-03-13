<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>css\fontawesome321\css\font-awesome.min.css" rel="stylesheet">

<!-- Add custom CSS here -->
<link href="<?php echo base_url()?>css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url()?>font-awesome/css/font-awesome.min.css">
<!-- Page Specific CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>css/morris-0.4.3.min.css">
<!-- /#wrapper -->

<!-- JavaScript -->
<script src="<?php echo base_url()?>js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>js/moment.js"></script>
<script src="<?php echo base_url()?>js/moment-with-locales.js"></script>
<script src="<?php echo base_url()?>js/bootstrap.js"></script>

<!-- Page Specific Plugins -->
<script src="<?php echo base_url()?>js/raphael-min.js"></script>
<script src="<?php echo base_url()?>js/morris-0.4.3.min.js"></script>
<script src="<?php echo base_url()?>js/morris/chart-data-morris.js"></script>
<!-- <script src="<?php echo base_url()?>js/tablesorter/jquery.tablesorter.js"></script>
<script src="<?php echo base_url()?>js/tablesorter/tables.js"></script> -->
</head>
<?php @session_start()?>
<body>
<div id="wrapper">

  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <?php echo anchor('home/index','ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.','class="navbar-brand"')?> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
      <div align="center"><img src="<?php echo base_url()?>images/logo.png" width="80%"></div><br>
		<li class="active"><?php echo anchor('home/index','<i class="fa fa-dashboard"></i> ภาพรวมของระบบ')?></li>
        <?php if(@$_SESSION['position_status']==1){ ?>
          <li><?php echo anchor('warehouse/warehouse_list','<i class="fa fa-th"></i> สต๊อกสินค้ากลาง')?></li>
        <?php } ?>
        <?php if(@$_SESSION['position_status']==2){ ?>
          <li><?php echo anchor('warehouse/warehouse_list','<i class="fa fa-th"></i> สต๊อกสินค้ากลาง')?></li>
        <?php } ?>
        <?php if(@$_SESSION['position_status']==3){ ?>
        <li><?php echo anchor('sale/sale_list','<i class="fa fa-sitemap"></i> การขาย')?></li>
        <li><?php echo anchor('stock/sale_order_list','<i class="fa fa-sitemap"></i> ตารางการขาย')?></li>
        <li><?php echo anchor('stock/stock_list','<i class="fa fa-th-large"></i> สต๊อกสินค้าร้าน')?></li>
        <li><?php echo anchor('stock/stock_shop_option','<i class="fa fa-tags"></i> ตั้งค่า')?></li>
        <?php } ?>
        <?php if(@$_SESSION['position_status']==1||@$_SESSION['position_status']==2){ ?>
          <li><?php echo anchor('stock/stock_list_shop','<i class="fa fa-th-large"></i> สต๊อกสินค้าร้าน')?></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i> จัดการข้อมูลสินค้า <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><?php echo anchor('product/category_list','<i class="fa fa-caret-right"></i> ประเภทสินค้า')?></li>
            <li><?php echo anchor('product/product_list','<i class="fa fa-caret-right"></i> ข้อมูลสินค้า')?></li>
          </ul>
        </li>
        <?php } ?>
        <?php if(@$_SESSION['position_status']==1){ ?>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> จัดการข้อมูลพนักงาน <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><?php echo anchor('employees/position_list','<i class="fa fa-caret-right"></i> ตำแหน่งงาน')?></li>
            <li><?php echo anchor('employees/employees_list','<i class="fa fa-caret-right"></i> ข้อมูลพนักงาน')?></li>
          </ul>
        </li>
        <li><?php echo anchor('shop/shop_list','<i class="fa fa-shopping-cart"></i> จัดการข้อมูลร้านค้า')?></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart-o"></i> รายงาน <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><?php echo anchor('report/report_sale','<i class="fa fa-caret-right"></i> รายงานการขายทั้งหมด')?></li>
            <li><?php echo anchor('report/report_in','<i class="fa fa-caret-right"></i> รายงานการรับสินค้าเข้า')?></li>
            <li><?php echo anchor('report/report_out','<i class="fa fa-caret-right"></i> รายงานการโอนย้ายสินค้าออก')?></li>
            <li><?php echo anchor('report/report_product','<i class="fa fa-caret-right"></i> รายงานการขายจำแนก')?></li>
            <!--<li><?php echo anchor('report/expenditure','<i class="fa fa-caret-right"></i> รายจ่าย')?></li>-->
          </ul>
        </li>
    <li><?php echo anchor('config','<i class="fa fa-cog"></i> ตั้งค่า')?></li>
        <?php } ?>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
      </ul>
      <ul class="nav navbar-nav navbar-right navbar-user">
        <li class="dropdown messages-dropdown">
          <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>-->

        </li>
        <li class="dropdown alerts-dropdown">
          <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>-->
          <ul class="dropdown-menu">
            <li><a href="#">Default <span class="label label-default">Default</span></a></li>
            <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
            <li><a href="#">Success <span class="label label-success">Success</span></a></li>
            <li><a href="#">Info <span class="label label-info">Info</span></a></li>
            <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
            <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
            <li class="divider"></li>
            <li><a href="#">View All</a></li>
          </ul>
        </li>
        <li class="dropdown user-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo @$_SESSION['employees_name']?> ( <?php echo @$_SESSION['position_name']?> ) <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="divider"></li>
            <li><?php echo anchor('login/logout','<i class="fa fa-power-off"></i> Log Out')?></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </nav>
  <?php echo $this->load->view($page)?>
  </div>
</body>
</html>
