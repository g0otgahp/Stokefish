<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>แก้ไขข้อมูลตำแหน่งงาน <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-user"></i> category Edit</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('product_manage/category_update')?>
  <table width="85%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td width="15%" height="50">ตำแหน่งงาน</td>
      <td width="35%"><input type="text" name="category_name" id="category_name" class="form-control" style="width:80%;" placeholder="กรอกข้อมูลตำแหน่งงาน" required="required" value="<?php echo @$category[0]['category_name']?>" /></td>
      <td width="15%">รายละเอียด</td>
      <td width="35%" height="50"><input type="text" name="category_details" id="category_details" class="form-control" style="width:80%;" placeholder="กรอกข้อมูลรายละเอียด" required="required" value="<?php echo @$category[0]['category_details']?>" /></td>
    </tr>
    <tr>
      <td width="15%" height="50">สถานะ</td>
      <td width="35%">
      <input <?php if (!(strcmp(@$category[0]['category_status'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="category_status" id="category_status" value="0" /> <span style="color:red;">ปิดการใช้งาน</span>
      <input <?php if (!(strcmp(@$category[0]['category_status'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="category_status" id="category_status" value="1" /> <span style="color:green;">เปิดการใช้งาน</span>
      </td>
      <td width="15%">&nbsp;</td>
      <td width="35%" height="50">&nbsp;</td>
    </tr>
    <tr>
      <td height="100" colspan="4"><div align="center">
          <input type="hidden" name="category_id" id="category_id" value="<?php echo @$category[0]['category_id']?>" />
          <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
          <?php echo anchor('product/category_list','<input type="button" class="btn btn-danger" value="ยกเลิก">')?>
        </div></td>
    </tr>
  </table>
  <?php echo form_close()?>
</div>
