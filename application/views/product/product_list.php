<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลสินค้า <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-tags"></i> Product List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <div align="right"><p><?php echo anchor('product/product_insert','<button type="button" class="btn btn-primary" style="width:200px;">เพิ่มข้อมูลสินค้าใหม่</button>')?></p></div>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="10%"><div align="center">รหัสสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">ประเภทสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="21%"><div align="center">ชื่อสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="7%"><div align="center"> หน่วย <i class="fa fa-sort"></i></div></th>
        <th width="12%"><div align="center">สถานะ <i class="fa fa-sort"></i></div></th>
        <th width="26%"><div align="center">จัดการข้อมูล</div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
	  <?php foreach($product as $product){ ?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $product['product_code']?></td>
        <td><?php echo $product['category_name']?></td>
        <td><?php echo $product['product_name']?></td>
        <td align="center"><?php echo $product['product_unit']?></td>
        <td><div align="center">
		<?php
        	if($product['product_status']==0){
				echo "<strong style='color:red;'>ปิดการใช้งาน</strong>";
			}else{
				echo "<strong style='color:green;'>เปิดการใช้งาน</strong>";
			}
		?>
        </div></td>
        <td><div align="center">
            <?php echo anchor('product/product_barcode/'.$product['product_id'],'<button type="button" class="btn btn-success">บาร์โค้ด</button>',array('target' => '_blank', 'class' => 'new_window'))?>
            <?php echo anchor('product/product_update/'.$product['product_id'],'<button type="button" class="btn btn-info">แก้ไขข้อมูล</button>')?>
            <?php echo anchor('product/product_delete/'.$product['product_id'],'<button type="button" class="btn btn-danger">ลบข้อมูล</button>',$confirm)?>
          </div></td>
      </tr>
      <?php $i++ ?>
	  <?php } ?>
    </tbody>
  </table>
</div>
