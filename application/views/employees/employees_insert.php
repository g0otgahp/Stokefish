<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>เพิ่มข้อมูลพนักงานใหม่ <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-user"></i> Employees Add</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('employees_manage/employees_insert')?>
  <table width="85%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td width="15%" height="50">รหัสพนักงาน</td>
      <td width="35%"><input type="text" name="employees_code" id="employees_code" class="form-control" style="width:80%;" required="required" placeholder="กรอกรหัสพนักงาน" /></td>
      <td width="15%">ชื่อ-นามสกุล</td>
      <td width="35%" height="50"><input type="text" name="employees_name" id="employees_name" class="form-control" style="width:80%;" required="required" placeholder="กรอกชื่อ-นามสกุล" /></td>
    </tr>
    <tr>
      <td height="50">ตำแหน่ง</td>
      <td><select name="employees_position" id="employees_position" class="form-control" style="width:80%;" required="required">
        <option value="">-- เลือกตำแหน่งงาน --</option>
		<?php foreach($position as $position){ ?>
        <option value="<?php echo $position['position_id']?>"><?php echo $position['position_name']?></option>
        <?php } ?>
      </select></td>
      <td>ร้าน <span style="color:red;">(เฉพาะคนขาย)</span></td>
      <td height="50"><select name="employees_shop" id="employees_shop" class="form-control" style="width:80%;" required="required">
        <option value="">-- เลือกร้านขาย --</option>
        <?php foreach($shop as $shop){ ?>
        <option value="<?php echo $shop['shop_id']?>"><?php echo $shop['shop_details']?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="50">Username</td>
      <td><input type="text" name="username" id="username" class="form-control" style="width:80%;" required="required" placeholder="กรอกชื่อผู้ใช้งาน"  /></td>
      <td>Password</td>
      <td height="50"><input type="password" name="password" id="password" class="form-control" style="width:80%;" required="required" placeholder="กรอกรหัสผ่าน"  /></td>
    </tr>
    <tr>
      <td height="100" colspan="4"><div align="center">
          <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
          <?php echo anchor('employees/employees_list','<input type="button" class="btn btn-danger" value="ยกเลิก">')?>
        </div></td>
    </tr>
  </table>
  <?php echo form_close()?>
</div>
