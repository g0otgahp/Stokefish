<script>
function getfocus(){
  document.getElementById('barcode').focus();
}
</script>
<body onLoad="getfocus()">
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>การขาย <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-sitemap"></i> Shop Open</li>
        </ol>
      </div>
    </div>
    <!-- /.row -->
    <table width="95%" border="0" align="center" cellpadding="5" cellspacing="5">
      <tr>
        <td width="61%">
          <div align="center">
            <?php if (@$_SESSION['check']==1): ?>
              <font color="red">สินค้าไม่มีในสต๊อก</font>
            <?php endif; ?>

            <?php echo form_open('sale_manage/sale_list')?>
            <input type="text" name="barcode" id="barcode" class="form-control" required autocomplete="off" style="width:90%; text-align:center;" placeholder="---- บาร์โค้ดสินค้า ----" />
            <?php echo form_close()?>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div align="center"><h3>รายละเอียดลูกค้า</h3></div>
        </td>
      </tr>
      <tr>
        <td height="50">
          <div class="row" align="center">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_open('sale_manage/sale_member_fullname')?>
                <input type="text" onchange="this.form.submit()" name="member_fullname" id="member_fullname" autocomplete="off" class="form-control" placeholder="---- ชื่อ - สกุล ----" value="<?php echo @$_SESSION['member']['member_fullname']?>"/>
                <?php echo form_close()?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_open('sale_manage/sale_member_phone')?>
                <input type="text" onchange="this.form.submit()" name="member_phone" id="member_phone" autocomplete="off" class="form-control" placeholder="---- เบอร์โทรศัพท์ ----" value="<?php echo @$_SESSION['member']['member_phone']?>"/>
                <?php echo form_close()?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="row" align="center">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_open('sale_manage/sale_member_address')?>
                <textarea col="3" rows="3" onchange="this.form.submit()" name="member_address" id="member_address" class="form-control"  placeholder="---- ที่อยู่ ----" /><?php echo @$_SESSION['member']['member_address']?></textarea>
                <?php echo form_close()?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <?php echo form_open('sale_manage/sale_member_note')?>
                <textarea col="3" rows="3" onchange="this.form.submit()" name="member_note" id="member_note" class="form-control"  placeholder="---- หมายเหตุ ----" /><?php echo @$_SESSION['member']['member_note']?></textarea>
                <?php echo form_close()?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div align=""><h4>รูปแบบชำระเงิน</h4></div>
        </td>
      </tr>
      <tr>
        <td style="padding:10px">
          <div class="form-inline">
            <div class="radio">
              <label>
                <?php if (@$_SESSION['pay_type']==1 || @$_SESSION['pay_type']==''): ?>
                  <input type="radio" name="sale_order_detail_pay_type"  value="1" checked/>
                  เงินสด
                <?php else: ?>
                  <?php echo form_open('sale_manage/sale_pay_type')?>
                  <input onchange="this.form.submit()" type="radio" name="sale_order_detail_pay_type"  value="1"/>
                  เงินสด
                  <?php echo form_close()?>
                <?php endif; ?>
              </label>
            </div>

            <div class="radio">
              <label>
                <?php if (@$_SESSION['pay_type']==2): ?>
                  <input type="radio" name="sale_order_detail_pay_type"  value="2" checked/>
                  เช็ค
                <?php else: ?>
                  <?php echo form_open('sale_manage/sale_pay_type')?>
                  <input onchange="this.form.submit()" type="radio" name="sale_order_detail_pay_type"  value="2"/>
                  เช็ค
                  <?php echo form_close()?>
                <?php endif; ?>
              </label>
            </div>

            <div class="radio">
              <label>
                <?php if (@$_SESSION['pay_type']==3): ?>
                  <input type="radio" name="sale_order_detail_pay_type"  value="3" checked/>
                  เครดิต
                <?php else: ?>
                  <?php echo form_open('sale_manage/sale_pay_type')?>
                  <input onchange="this.form.submit()" type="radio" name="sale_order_detail_pay_type"  value="3"/>
                  เครดิต
                  <?php echo form_close()?>
                <?php endif; ?>
              </label>
            </div>

          </div>
        </td>
      </tr>
      <tr>
        <td width="70%"><table class="table" cellpadding="10" width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td  colspan="7">&nbsp;&nbsp;&nbsp;<strong>รายการสินค้า ( Product List )</strong></td>
          </tr>
          <tr>
            <td width="5%" align="center">#</td>
            <td width="30%" align="center">รายการสินค้า</td>
            <td width="10%" align="center">ราคาทุน</td>
            <td width="15%" align="center">ราคาต่อหน่วย</td>
            <td width="15%" align="center">ราคาสั่งขายต่อหน่วย</td>
            <td width="10%" align="center">จำนวน</td>
            <td width="30%"  align="center">ราคารวม</td>
          </tr>
          <?php $index =1; for($i=0;$i<30;$i++){ ?>
            <?php $total[] = @$_SESSION['product'][$i]['product_sale']?>
            <?php $total_buy[] = @$_SESSION['product'][$i]['product_buy']?>
            <?php if(@$_SESSION['product'][$i]['product_key']!=""){ ?>
              <tr>
                <td><div align="center"><?php echo $index; $index++; ?></div></td>
                <td>&nbsp;<?php echo @$_SESSION['product'][$i]['product_code']?> <?php echo @$_SESSION['product'][$i]['product_name']?><input name="product_code[]" id="product_code[]" type="hidden" value="<?php echo @$_SESSION['product'][$i]['product_code']?>" /> <?php echo anchor('sale/sale_list_delete/'.@$_SESSION['product'][$i]['product_key'],'<i class="fa fa-trash-o"></i>')?></td>
                <td>
                  <div align="center" >
                    <?php echo @$_SESSION['product'][$i]['product_buy']?>
                  </div>
                </td>
                <td>
                  <div align="right">
                    <?php echo form_open('sale_manage/sale_amount/'.$i)?>
                    <?php echo @$_SESSION['product'][$i]['product_normal_sale']?>
                    <?php echo form_close()?>
                  </div>
                </td>
                <td>
                  <div align="right">
                    <?php echo form_open('sale_manage/sale_amount/'.$i)?>
                    <input onchange="this.form.submit()" Max="<?php echo @$_SESSION['product'][$i]['product_normal_sale']?>" style="width: 100%; background-color: #f5bca2;" class="text-right" type="number" step="any" name="sale_amount" value="<?php echo @$_SESSION['product'][$i]['product_sale']?>">
                    <?php echo form_close()?>
                  </div>
                </td>
                <td><div align="center">1</div></td>
                <td ><div align="right"><?php echo @$_SESSION['product'][$i]['product_sale']?>.00&nbsp;</div></td>
              </tr>
              <?php } ?>
              <?php  } ?>
              <tr>
                <td colspan="6" align="right"><strong>รวมทั้งหมด (ก่อนหักส่วนลด)</strong></td>

                <td ><div align="right">
                  <?php
                    echo @number_format(@array_sum(@$total));
                  ?>.00&nbsp;</div></td>
                </tr>
                <tr>
                  <td colspan="6" align="right"><strong> <input onchange="window.location ='<?php echo site_url(); ?>/sale_manage/is_discount'" type="checkbox" name="is_vat" <?php echo @$_SESSION['is_discount']; ?>>ส่วนลด</strong></td>

                  <td ><div align="right">
                    <?php echo form_open('/sale_manage/sale_discount'); ?>
                    <?php if (@$_SESSION['is_discount']!='checked'): ?>
                      <input class="text-right disabled" readonly onchange="this.form.submit()" style="width: 100%; " type="number" step="any" name="discount_value" value="<?php echo @$_SESSION['discount_value']*1; ?>">
                      <?php else: ?>
                        <input required onchange="this.form.submit()" class="text-right" style="width: 100%; background-color: #f5bca2;" type="number" step="any" name="discount_value" value="<?php echo @$_SESSION['discount_value']*1; ?>">
                    <?php endif; ?>

                  <?php echo form_close(); ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="6" align="right"><strong>หลังหักส่วนลด</strong></td>

                  <td ><div align="right">
                    <?php
                    if (@$_SESSION['is_discount']=='checked') {
                        echo @number_format(@array_sum(@$total)-(@$_SESSION['discount_value']*1));
                    } else {
                        echo  @number_format(@array_sum(@$total));
                    }
                    ?>.00&nbsp;</div></td>
                  </tr>
                <tr>
                  <td colspan="6" align="right">
                    <strong><input onchange="window.location ='<?php echo site_url(); ?>/sale_manage/sale_vat'" type="checkbox" name="is_vat" <?php echo @$_SESSION['is_vat']; ?>> ภาษีมูลค่าเพิ่ม 7% </strong>

                  </td>

                  <td ><div align="right">
                    <?php
                    if (@$_SESSION['is_vat']=='checked') {
                      if (@$_SESSION['is_discount']=='checked') {
                        @$discount_after_vat = (@array_sum(@$total)-(@$_SESSION['discount_value']*1))*7/100;
                      echo @number_format(@$discount_after_vat , 2, '.', '');
                      } else {
                      echo @number_format(@array_sum(@$total)*7/100).".00&nbsp";
                      }
                    } else {
                      echo "- ";
                    }

                    ?>
                  </div></td>
                </tr>
                <tr>
                  <td bgcolor="" colspan="6" align="right"><strong>ยอดสุทธิ</strong></td>

                  <td bgcolor="#88d660" ><div align="right"><strong>
                    <?php
                  if (@$_SESSION['is_discount']=='checked') {
                    echo @number_format(@array_sum(@$total)-(@$_SESSION['discount_value']*1));
                  } else {
                      echo  @number_format(@array_sum(@$total));
                  }
                  ?>.00&nbsp;</strong></div></td>
                </tr>
                <tr>
                  <td colspan="6" align="right"><strong>ต้นทุน</strong></td>

                  <td ><div align="right"><?php echo @number_format(@array_sum(@$total_buy))?>.00&nbsp;</div></td>
                </tr>
                <tr>
                  <td colspan="6" align="right"><strong>กำไร</strong></td>

                  <td ><div align="right">
                    <?php
                  if (@$_SESSION['is_discount']=='checked') {
                    echo @number_format(@array_sum(@$total)-(@$_SESSION['discount_value']*1)-@array_sum(@$total_buy));
                  } else {

                      echo  @number_format(@array_sum(@$total)-@array_sum(@$total_buy));

                  }

                  ?>
                  .00&nbsp;</div></td>
                </tr>
              </table>
            </td>
            <?php echo form_open('sale_manage/sale_insert')?>
            <td valign="top"><div align="center">
              <h2 style="color:green;">รวมเงิน   <?php
              if (@$_SESSION['is_discount']=='checked') {
                echo @number_format(@array_sum(@$total)-(@$_SESSION['discount_value']*1));
              } else {

                  echo  @number_format(@array_sum(@$total));

              }

              ?>.00 บาท&nbsp;</h2>
              <input type="submit" value="ยืนยันการซื้อ" class="btn btn-success" style="width:90%; font-size:30px;">
              <p></p>
              <?php echo anchor('sale_manage/sale_clear/','<button type="button" class="btn btn-danger" style="width:90%;font-size:30px;">เริ่มต้นใหม่</button>')?> </div></td>
            </tr>
            <?php echo form_close()?>
          </table>
        </div>
      </body>
