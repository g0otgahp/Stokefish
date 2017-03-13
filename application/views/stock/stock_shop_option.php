<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>ตั้งค่าสต๊อกสินค้าร้าน <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th-large"></i> Stock List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="15%"><div align="center">รหัสสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">ประเภทสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="30%"><div align="center">ชื่อสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">จำนวนแจ้งเตือน <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">ตัวเลือก <i class="fa fa-sort"></i></div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
	  <?php foreach($product as $product){ ?>
      <?php echo form_open('stock/stock_update/'.$product['product_id']);?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $product['product_code']?></td>
        <td><?php echo $product['category_name']?></td>
        <td><?php echo $product['product_name']?></td>
        <td><div align="center"><input required class="form-control text-center" type="text" name="product_limit_max" value="<?php echo $product['product_limit_max']?>"></div></td>
        <td><div align="center"><button type="submit" class="btn btn-success">บันทึก</button></div></td>
      </tr>
      <?php echo form_close();?>
      <?php $i++ ?>
	  <?php } ?>
    </tbody>
  </table>
</div>
