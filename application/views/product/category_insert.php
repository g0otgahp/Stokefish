<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>เพิ่มข้อมูลประเภทสินค้า <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-tags"></i> Category Add</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('product_manage/category_insert')?>
  <table width="85%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td width="15%" height="50">ประเภทสินค้า</td>
      <td width="35%"><input type="text" name="category_name" id="category_name" class="form-control" style="width:80%;" placeholder="กรอกข้อมูลประเภทสินค้า" required="required" /></td>
      <td width="15%">รายละเอียด</td>
      <td width="35%" height="50"><input type="text" name="category_details" id="category_details" class="form-control" style="width:80%;" placeholder="กรอกข้อมูลรายละเอียด" required="required" /></td>
    </tr>
    <tr>
      <td height="100" colspan="4"><div align="center">
          <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
          <?php echo anchor('product/category_list','<input type="button" class="btn btn-danger" value="ยกเลิก">')?>
        </div></td>
    </tr>
  </table>
  <?php echo form_close()?>
</div>
