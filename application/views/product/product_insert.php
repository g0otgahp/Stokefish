<script>
function getfocus(){
	document.getElementById('product_code').focus();
}
</script>
<body onLoad="getfocus()">
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>เพิ่มข้อมูลสินค้า <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-tags"></i> Product Add</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('product_manage/product_insert')?>
  <table width="85%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td width="15%" height="50">รหัสสินค้า</td>
      <td width="35%"><input type="text" name="product_code" id="product_code" class="form-control" style="width:80%;" required placeholder="กรอกรหัสสินค้า" /></td>
      <td width="15%">ประเภทสินค้า</td>
      <td width="35%" height="50"><select name="product_category" id="product_category" class="form-control" style="width:80%;" required="required">
        <option value="">-- เลือกประเภทสินค้า --</option>
        <?php foreach($category as $category){ ?>
        <option value="<?php echo $category['category_id']?>"><?php echo $category['category_name']?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="50">ชื่อสินค้า</td>
      <td><input type="text" name="product_name" id="product_name" class="form-control" style="width:80%;" required placeholder="กรอกชื่อสินค้า"  /></td>
      <td>จำนวนแจ้งเตือน</td>
      <td height="50"><input type="text" name="product_max" id="product_max" class="form-control" style="width:40%;" required placeholder="กรอกจำนวน"  /></td>
    </tr>
    <tr>
      <td height="50">ราคาซื้อ</td>
      <td><input type="text" name="product_buy" id="product_buy" class="form-control" style="width:35%;" required placeholder="ราคาขาย"  /></td>
      <td>ราคาขาย</td>
      <td height="50"><input type="text" name="product_sale" id="product_sale" class="form-control" style="width:35%;" required placeholder="ราคาขาย"  /></td>
		</tr>
    <tr>
      <td height="50">หน่วยนับ</td>
      <td height="50"><input type="text" name="product_unit" id="product_unit" class="form-control" style="width:35%;" required placeholder="ระบุหน่วยนับ"  /></td>
      <td height="50">หมายเหตุ</td>
      <td><textarea height="50" name="product_note" id="product_note" rows="4" cols="40" class="form-control" placeholder="หมายเหตุ"></textarea></td>
    <tr>
      <td height="100" colspan="4"><div align="center">
          <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
          <?php echo anchor('product/product_list','<input type="button" class="btn btn-danger" value="ยกเลิก">')?>
        </div></td>
    </tr>
  </table>
  <?php echo form_close()?>
</div>
</body>
