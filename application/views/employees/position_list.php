<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลตำแหน่งงาน <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-user"></i> Position List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <div align="right"><p><?php echo anchor('employees/position_insert','<button type="button" class="btn btn-primary" style="width:200px;">เพิ่มข้อมูลตำแหน่งงาน</button>')?></p></div>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="60%"><div align="center">ตำแหน่งงาน</i></div></th>
        <th width="15%"><div align="center">สถานะสิทธิ์</div></th>
        <th width="20%"><div align="center">จัดการข้อมูล</div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
      <?php foreach($position as $position){ ?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $position['position_name']?> ( <?php echo $position['position_details']?> )</td>
        <td><div align="center">
        <?php
        	if($position['position_status']==1){
				echo "<strong style='color:red;'>LV 1</strong>";
			}else if($position['position_status']==2){
				echo "<strong style='color:green;'>LV 2</strong>";
			}else if($position['position_status']==3){
				echo "<strong style='color:blue;'>LV 3</strong>";
			}
		?>
        </div></td>
        <td><div align="center">
            <?php echo anchor('employees/position_update/'.$position['position_id'],'<button type="button" class="btn btn-info">แก้ไขข้อมูล</button>')?>
            <?php echo anchor('employees/position_delete/'.$position['position_id'],'<button type="button" class="btn btn-danger">ลบข้อมูล</button>',$confirm)?>
          </div></td>
      </tr>
      <?php $i++ ?>
      <?php } ?>
    </tbody>
  </table>
</div>
