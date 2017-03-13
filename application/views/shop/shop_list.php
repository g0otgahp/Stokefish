<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลสาขา <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-shopping-cart"></i> Shop List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <div align="right"><p><?php echo anchor('shop/shop_insert','<button type="button" class="btn btn-primary" style="width:200px;">เพิ่มร้านขายน้ำ</button>')?></p></div>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="50%"><div align="center">ชื่อร้าน</div></th>
        <th width="25%"><div align="center">โซนที่ตั้ง</div></th>
        <th width="20%"><div align="center">จัดการ</div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
	  <?php foreach($shop as $shop){ ?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $shop['shop_details']?></td>
        <td><?php echo $shop['shop_zone']?></td>
        <td><div align="center">
            <?php echo anchor('shop/shop_update/'.@$shop['shop_id'],'<button type="button" class="btn btn-info">แก้ไขข้อมูล</button>')?>
            <?php echo anchor('shop/shop_delete/'.@$shop['shop_id'],'<button type="button" class="btn btn-danger">ลบข้อมูล</button>',$confirm)?>
          </div></td>
      </tr>
      <?php $i++ ?>
	  <?php } ?>
    </tbody>
  </table>
</div>
