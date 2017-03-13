<script>
function getfocus(){
	document.getElementById('warehouse_product').focus();
}
</script>
<body onLoad="getfocus()">
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>แก้ไขข้อมูลสาขา <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-shopping-cart"></i> Edit Add</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('shop_manage/shop_update')?>
  <table width="85%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td width="15%" height="50">ชื่อร้าน</td>
      <td width="35%"><input type="text" name="shop_details" id="shop_details" class="form-control" autocomplete="off" style="width:80%;" placeholder="กรอกชื่อร้าน" required value="<?php echo @$shop[0]['shop_details']?>" /></td>
      <td width="15%">โซนที่ตั้ง</td>
      <td width="35%" height="50"><input type="text" name="shop_zone" id="shop_zone" class="form-control" autocomplete="off" style="width:80%;" placeholder="กรอกโซนที่ตั้งร้าน" required value="<?php echo @$shop[0]['shop_zone']?>" /></td>
    </tr>
    <tr>
      <td height="100" colspan="4"><div align="center">
      	  <input type="hidden" name="shop_id" id="shop_id" value="<?php echo @$shop[0]['shop_id']?>">
          <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
          <?php echo anchor('shop/shop_list','<input type="button" class="btn btn-danger" value="ยกเลิก">')?>
        </div></td>
    </tr>
  </table>
  <?php echo form_close()?>
</div>
</body>
