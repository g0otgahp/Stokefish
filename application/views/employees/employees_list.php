<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลพนักงาน <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-user"></i> Employees List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <div align="right"><p><?php echo anchor('employees/employees_insert','<button type="button" class="btn btn-primary" style="width:200px;">เพิ่มข้อมูลพนักงานใหม่</button>')?></p></div>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="15%"><div align="center">รหัสพนักงาน <i class="fa fa-sort"></i></div></th>
        <th width="30%"><div align="center">ชื่อ-นามสกุล <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">ตำแหน่ง <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">ชื่อผู้ใช้งาน <i class="fa fa-sort"></i></div></th>
        <th width="20%"><div align="center">จัดการข้อมูล</div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
	  <?php foreach($employees as $employees){ ?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $employees['employees_code']?></td>
        <td><?php echo $employees['employees_name']?></td>
        <td><div align="center"><?php echo $employees['position_name']?></div></td>
        <td><div align="center"><?php echo $employees['username']?></div></td>
        <td><div align="center">
            <?php echo anchor('employees/employees_update/'.$employees['employees_id'],'<button type="button" class="btn btn-info">แก้ไขข้อมูล</button>')?>
            <?php echo anchor('employees/employees_delete/'.$employees['employees_id'],'<button type="button" class="btn btn-danger">ลบข้อมูล</button>',$confirm)?>
          </div></td>
      </tr>
      <?php $i++ ?>
	  <?php } ?>
    </tbody>
  </table>
</div>
