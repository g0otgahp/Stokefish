<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลประเภทสินค้า <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-tags"></i> Category Product List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <div align="right"><p><?php echo anchor('product/category_insert','<button type="button" class="btn btn-primary" style="width:200px;">เพิ่มข้อมูลประเภทสินค้า</button>')?></p></div>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="55%"><div align="center">ประเภทสินค้า</i></div></th>
        <th width="20%"><div align="center">สถานะ</div></th>
        <th width="20%"><div align="center">จัดการข้อมูล</div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
      <?php foreach($category as $category){ ?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $category['category_name']?> ( <?php echo $category['category_details']?> )</td>
        <td><div align="center">
        <?php
        	if($category['category_status']==0){
				echo "<strong style='color:red;'>ปิดการใช้งาน</strong>";
			}else{
				echo "<strong style='color:green;'>เปิดการใช้งาน</strong>";
			}
		?>
        </div></td>
        <td><div align="center">
            <?php echo anchor('product/category_update/'.$category['category_id'],'<button type="button" class="btn btn-info">แก้ไขข้อมูล</button>')?>
            <?php echo anchor('product/category_delete/'.$category['category_id'],'<button type="button" class="btn btn-danger">ลบข้อมูล</button>',$confirm)?>
          </div></td>
      </tr>
      <?php $i++ ?>
      <?php } ?>
    </tbody>
  </table>
</div>
