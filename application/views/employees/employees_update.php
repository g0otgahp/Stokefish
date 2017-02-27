<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>แก้ไขข้อมูลพนักงาน <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-user"></i> Employees Edit</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('employees_manage/employees_update')?>
  <table width="85%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td width="15%" height="50">รหัสพนักงาน</td>
      <td width="35%"><input type="text" name="employees_code" id="employees_code" class="form-control" style="width:80%;" required="required" placeholder="กรอกรหัสพนักงาน" value="<?php echo @$employees[0]['employees_code']?>" /></td>
      <td width="15%">ชื่อ-นามสกุล</td>
      <td width="35%" height="50"><input type="text" name="employees_name" id="employees_name" class="form-control" style="width:80%;" required="required" placeholder="กรอกชื่อ-นามสกุล" value="<?php echo @$employees[0]['employees_name']?>" /></td>
    </tr>
    <tr>
      <td height="50">ตำแหน่ง</td>
      <td><select name="employees_position" id="employees_position" class="form-control" style="width:80%;" required="required">
        <option value="<?php echo @$employees[0]['position_id']?>"><?php echo @$employees[0]['position_name']?></option>
		<?php foreach($position as $position){ ?>
        <option value="<?php echo $position['position_id']?>"><?php echo $position['position_name']?></option>
        <?php } ?>
      </select></td>
      <td>ร้าน <span style="color:red;">(เฉพาะคนขาย)</span></td>
      <td height="50"><select name="employees_shop" id="employees_shop" class="form-control" style="width:80%;" required="required">
        <option value="<?php echo @$employees[0]['employees_shop']?>"><?php echo @$employees[0]['shop_details']?></option>
        <?php foreach($shop as $shop){ ?>
        <option value="<?php echo $shop['shop_id']?>"><?php echo $shop['shop_details']?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="50">Username</td>
      <td><input type="text" name="username" id="username" class="form-control" style="width:80%;" required="required" placeholder="กรอกชื่อผู้ใช้งาน" value="<?php echo @$employees[0]['username']?>"  /></td>
      <td>Password</td>
      <td height="50"><input type="password" name="password" id="password" class="form-control" style="width:80%;" placeholder="รหัสผ่านใหม่หากเปลี่ยนรหัสผ่าน" /></td>
    </tr>
    <tr>
      <td height="100" colspan="4"><div align="center">
          <input type="hidden" name="employees_id" id="employees_id" value="<?php echo @$employees[0]['employees_id']?>" />
          <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
          <?php echo anchor('employees/employees_list','<input type="button" class="btn btn-danger" value="ยกเลิก">')?>
        </div></td>
    </tr>
  </table>
  <?php echo form_close()?>
</div>
