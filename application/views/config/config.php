<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>ตั้งค่าร้านค้า <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th-large"></i> Config</li>
      </ol>
    </div>
  </div>

  <div class="body">
    <?php echo form_open_multipart('/Config/EditConfig'); ?>
    <input type="hidden" name="config_id" value="<?php echo $config[0]['config_id'];?>">

    <div class="row">
      <div class="col-sm-offset-3 col-sm-6 text-center">
        <div class="form-group">
          <label for=""><h2>โลโก้</h2></label>
          <div class="form-line">
            <img src="<?php echo base_url('images/'.$config[0]['config_logo']) ?>" width="200 " alt="">
            <input type="hidden" name="config_logo_old" value="<?php echo $config[0]['config_logo']; ?>">
            <input name="config_logo" type="file" class="form-control" >
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-3 col-sm-6 text-center">
        <div class="form-group">
          <label for="">ชื่อร้านค้า</label>
          <div class="form-line">
            <input name="config_shop_name" type="text" step="any" class="form-control input-lg" value="<?php echo $config[0]['config_shop_name'] ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-3 col-sm-6 text-center">
        <div class="form-group">
          <label for="">ที่อยู่ร้านค้า</label>
          <div class="form-line">
            <textarea name="config_address"  rows="2" cols="80" class="form-control input-lg"><?php echo $config[0]['config_address'] ?></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-3 col-sm-6 text-center">
        <div class="form-group">
          <label for="">รายละเอียดร้านค้า</label>
          <div class="form-line">
            <textarea name="config_detail"  rows="2" cols="80" class="form-control input-lg"><?php echo $config[0]['config_detail'] ?></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-3 col-sm-6 text-center">
        <div class="form-group">
          <label for="">เลขประจำผู้เสียภาษีอากร</label>
          <div class="form-line">
            <input name="config_tax" type="text" step="any" class="form-control input-lg" value="<?php echo $config[0]['config_tax'] ?>">
            <!-- <input name="products_detail" type="text" class="form-control input-lg"> -->
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-3 col-sm-6 text-center">
        <div class="form-group">
          <label for="">เบอร์โทรศัพท์</label>
          <div class="form-line">
            <input name="config_phone" type="text" class="form-control input-lg" value="<?php echo $config[0]['config_tax'] ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-lg btn-success">
          บันทึก
        </button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>

</div>
