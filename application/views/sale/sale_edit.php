<script>
function getfocus(){
  document.getElementById('barcode').focus();
}
</script>
<body onLoad="getfocus()">
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>การขาย <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-sitemap"></i> Shop Open</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <?php //echo "<pre>" ?>
        <?php// print_r($order_detail); ?>
        <?php //print_r($order_item); ?>
        <?php // print_r($_SESSION['product']); ?>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <?php echo form_open('sale_manage/sale_list_edit')?>
                <input type="text" name="barcode" id="barcode" class="form-control text-center" required autocomplete="off" placeholder="---- บาร์โค้ดสินค้า ----" />
                <?php echo form_close()?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-center">รายละเอียดลูกค้า</h3>
              <?php echo form_open('sale_manage/sale_member_edit')?>
              <input type="hidden" name="member_id" value="<?php echo @$order_detail[0]['member_id']?>">
              <div class="row" class="text-center">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" onchange="this.form.submit()" name="member_fullname" id="member_fullname" autocomplete="off" class="form-control" placeholder="---- ชื่อ - สกุล ----" value="<?php echo @$order_detail[0]['member_fullname']?>"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" onchange="this.form.submit()" name="member_phone" id="member_phone" autocomplete="off" class="form-control" placeholder="---- เบอร์โทรศัพท์ ----" value="<?php echo @$order_detail[0]['member_phone']?>"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea col="3" rows="3" onchange="this.form.submit()" name="member_address" id="member_address" class="form-control"  placeholder="---- ที่อยู่ ----" /><?php echo @$order_detail[0]['member_address']?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea col="3" rows="3" onchange="this.form.submit()" name="member_note" id="member_note" class="form-control"  placeholder="---- หมายเหตุ ----" /><?php echo @$order_detail[0]['member_note']?></textarea>
                  </div>
                </div>
              </div>
              <?php echo form_close()?>

            </div>
            <div class="col-md-12">
              <h4 class="text-center">รูปแบบชำระเงิน</h4>
              <?php echo form_open('sale_manage/sale_pay_type_edit'); ?>
              <input type="hidden" name="sale_order_detail_id" value="<?php echo @$order_detail[0]['sale_order_detail_id']?>">
              <div class="form-inline text-center">
                <div class="radio">
                  <label>
                    <input type="radio" name="sale_order_detail_pay_type" value="1" onchange="this.form.submit()"
                    <?php if (@$order_detail[0]['sale_order_detail_pay_type']==1 || @$order_detail[0]['sale_order_detail_pay_type']==''): ?>
                      checked
                    <?php endif; ?>
                    />
                    เงินสด
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="sale_order_detail_pay_type" value="2" onchange="this.form.submit()"
                    <?php if (@$order_detail[0]['sale_order_detail_pay_type']==2): ?>
                      checked
                    <?php endif; ?>
                    />
                    เช็ค
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="sale_order_detail_pay_type" value="3" onchange="this.form.submit()"
                    <?php if (@$order_detail[0]['sale_order_detail_pay_type']==3): ?>
                      checked
                    <?php endif; ?>
                    />
                    เครดิต
                  </label>
                </div>
              </div>
              <?php echo form_close(); ?>
              <hr>
            </div>
            <div class="col-md-12">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="7"><strong>รายการสินค้า ( Product List )</strong></th>
                  </tr>
                  <tr>
                    <th width="5%" class="text-center">#</th>
                    <th width="30%" class="text-center">รายการสินค้า</th>
                    <th width="10%" class="text-center">ต้นทุน</th>
                    <th width="15%" class="text-center">ราคาขาย</th>
                    <th width="15%" class="text-center">ราคาสั่งขาย</th>
                    <th width="10%" class="text-center">จำนวน</th>
                    <th width="30%"  class="text-center">ราคารวม</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $index =1; foreach ($order_item as $row): ?>
                    <?php $total_price[] = @$row['stock_price']?>
                    <?php $total_buy1[] = @$row['product_buy']?>
                    <tr>
                      <td class="text-center"><?php echo $index; $index++; ?></td>
                      <td >
                        <?php echo @$row['product_code']?> <?php echo @$row['product_name']?>
                        <a href="<?php echo site_url('sale_manage/stock_item_delete/'.$row['stock_id'])?>"><i class="fa fa-trash-o"></i></a>
                      </td>
                      <td class="text-right">
                        <?php echo @$row['product_buy']?>
                      </td>
                      <td class="text-right">
                        <?php echo @$row['product_sale']?>
                      </td>
                      <td class="text-right">
                        <?php echo form_open('sale_manage/sale_stock_price_edit')?>
                        <input type="hidden" name="stock_id" value="<?php echo @$row['stock_id']?>">
                        <input onchange="this.form.submit()" style="background-color: #f5bca2;" class="form-control text-right" type="number" step="any" name="stock_price" Max="<?php echo @$row['product_sale']?>" value="<?php echo @$row['stock_price']?>">
                        <?php echo form_close()?>
                      </td>
                      <td><div class="text-center">1</div>
                      </td>
                      <td class="text-right"><?php echo number_format(@$row['stock_price'], 2, '.', '') ?></div></td>
                    </tr>
                  <?php endforeach; ?>
                  <!--  -->
                  <tr>
                    <td colspan="7" style="background: rgb(255, 0, 59);color: #fff;">
                      <strong>
                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                        รายการขายใหม่ ต้อง "ยืนยันการแก้ไข" ก่อน
                      </strong>
                    </td>
                  </tr>
                  <?php  for($i=0;$i<30;$i++){ ?>
                    <?php $total_sale[] = @$_SESSION['product'][$i]['product_sale']?>
                    <?php $total_buy[] = @$_SESSION['product'][$i]['product_buy']?>
                    <?php if(@$_SESSION['product'][$i]['product_key']!=""){ ?>
                      <tr>
                        <td class="text-center"><?php echo $index; $index++; ?></td>
                        <td><?php echo @$_SESSION['product'][$i]['product_code']?> <?php echo @$_SESSION['product'][$i]['product_name']?><input name="product_code[]" id="product_code[]" type="hidden" value="<?php echo @$_SESSION['product'][$i]['product_code']?>" />
                          <a href="<?php echo site_url('sale_manage/sale_edit_delete/'.@$_SESSION['product'][$i]['product_key'])?>"><i class="fa fa-trash-o"></i></a>
                        </td>
                        <td>
                          <div class="text-right" >
                            <?php echo @$_SESSION['product'][$i]['product_buy']?>
                          </div>
                        </td>
                        <td class="text-right">
                          <?php echo form_open('sale_manage/sale_amount/'.$i)?>
                          <?php echo @$_SESSION['product'][$i]['product_normal_sale']?>
                          <?php echo form_close()?>
                        </td>
                        <td class="text-right">
                          <?php echo form_open('sale_manage/sale_amount/'.$i)?>
                          <input onchange="this.form.submit()" Max="<?php echo @$_SESSION['product'][$i]['product_normal_sale']?>" style="width: 100%; background-color: #f5bca2;" class="form-control text-right" type="number" step="any" name="sale_amount" value="<?php echo @$_SESSION['product'][$i]['product_sale']?>">
                          <?php echo form_close()?>
                        </td>
                        <td><div class="text-center">1</div></td>
                        <td class="text-right"><?php echo number_format(@$_SESSION['product'][$i]['product_sale'], 2, '.', '') ?></td>
                      </tr>
                      <?php } ?>
                      <?php  } ?>
                      <tr>
                        <td colspan="6" class="text-right"><strong>ยอดรวม</strong></td>
                        <td class="text-right">
                          <?php
                          $all_totol = @number_format(@array_sum(@$total_sale) + @array_sum(@$total_price) , 2, '.', '');
                          echo $all_totol;
                          ?>
                        </td>
                      </tr>
                      <?php echo form_open('/sale_manage/sale_discount_edit'); ?>
                      <tr>


                        <td colspan="6" class="text-right">
                          <!-- <input type="checkbox" name="businessType" value="1"> -->
                          <strong>
                            <?php if (@$order_detail[0]['sale_order_detail_discount_status']==1) {
                              $discount_status = "checked";
                              // $order_detail[0]['sale_order_detail_discount_status']=0;
                            }else {
                              $discount_status = "";
                              // $order_detail[0]['sale_order_detail_discount_status']=1;
                            }?>
                            <?php if (@$order_detail[0]['sale_order_detail_vat_status']==1) {
                              $vat_status = "checked";
                              // $order_detail[0]['sale_order_detail_vat_status'] = 0;
                            }else {
                              $vat_status = "";
                              // $order_detail[0]['sale_order_detail_vat_status'] = 1;
                            }?>
                            <input onchange="this.form.submit()" type="checkbox" name="sale_order_detail_discount_status" value="<?php echo $order_detail[0]['sale_order_detail_discount_status'] ?>" <?php echo @$discount_status; ?>>ส่วนลด
                          </strong>
                        </td>
                        <td >
                          <input type="hidden" name="sale_order_detail_id" value="<?php echo @$order_detail[0]['sale_order_detail_id']?>">

                          <?php if (@$discount_status!='checked'): ?>
                            <input class="form-control text-right disabled" readonly onchange="this.form.submit()" style="width: 100%; " type="number" step="any" name="sale_order_detail_discount" value="<?php echo @$order_detail[0]['sale_order_detail_discount']*1; ?>">
                          <?php else: ?>
                            <input  onchange="this.form.submit()" class="form-control input-xs text-right" style="width: 100%; background-color: #f5bca2;" type="number" step="any" name="sale_order_detail_discount" value="<?php echo @$order_detail[0]['sale_order_detail_discount']*1; ?>">
                          <?php endif; ?>
                        </td>
                      </tr>

                      <tr>
                        <td colspan="6" class="text-right"><strong>ยอดรวมหลังหักส่วนลด</strong></td>
                        <td class="text-right">
                          <?php
                          if (@$discount_status=='checked') {
                              echo @number_format($all_totol-( @$order_detail[0]['sale_order_detail_discount']*1) , 2, '.', '');
                          } else {
                              echo  @number_format(@$all_totol , 2, '.', '');
                          }
                          ?></div></td>
                        </tr>
                        <tr>
                          <td colspan="6"  class="text-right">
                            <strong><input onchange="this.form.submit()" type="checkbox" name="sale_order_detail_vat_status" value="<?php echo $order_detail[0]['sale_order_detail_vat_status'] ?>" <?php echo @$vat_status; ?>> ภาษี 7% </strong>
                          </td>
                          <td class="text-right">
                            <?php
                            if (@$vat_status=='checked') {
                              if (@$discount_status=='checked') {
                                @$discount_after_vat = ($all_totol-(@$order_detail[0]['sale_order_detail_discount']*1))*7/100;
                                echo @number_format(@$discount_after_vat , 2, '.', '');
                              } else {
                                echo @number_format(@$all_totol*7/100 , 2, '.', '');
                              }
                            } else {
                              echo "- ";
                            }
                            ?>
                          </td>
                        </tr>
                        <?php echo form_close(); ?>

                        <tr>
                          <td bgcolor="" colspan="6" class="text-right"><strong>ยอดสุทธิ</strong></td>
                          <td bgcolor="#88d660"  class="text-right">
                            <strong>
                              <?php
                              if (@$discount_status=='checked') {
                                echo @number_format(@$all_totol-(@$order_detail[0]['sale_order_detail_discount']*1), 2, '.', '');
                              } else {
                                echo  @number_format(@$all_totol, 2, '.', '');
                              }
                              ?>
                            </strong>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-right"><strong>ต้นทุนรวม</strong></td>
                          <td class="text-right"><?php echo @number_format(array_sum(@$total_buy1) + array_sum(@$total_buy), 2, '.', '')?></div></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-right"><strong>กำไรสุทธิ</strong></td>
                          <td class="text-right">
                            <?php
                            if (@$discount_status=='checked') {
                              echo @number_format(@$all_totol-(@$order_detail[0]['sale_order_detail_discount']*1)-(array_sum(@$total_buy1) + array_sum(@$total_buy)), 2, '.', '');
                            } else {
                              echo  @number_format(@$all_totol-(array_sum(@$total_buy1) + array_sum(@$total_buy)), 2, '.', '');
                            }
                            ?>
                          </td>
                        </tr>
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-3 text-center" >
                <?php echo form_open('sale_manage/sale_edit_insert')?>
                <input type="hidden" name="sale_order_detail_id" value="<?php echo @$order_detail[0]['sale_order_detail_id']?>">

                  <h2 style="color:green;">ยอดสุดทธิ </h2>
                  <h2 class="text-success">
                  <?php
                  if (@$discount_status=='checked') {
                    echo @number_format(@$all_totol-(@$order_detail[0]['sale_order_detail_discount']*1), 2, '.', '');
                  } else {
                    echo  @number_format(@$all_totol, 2, '.', '');
                  }

                  ?> บาท</h2>
                  <button type="submit" class="btn btn-lg btn-success btn-block">ยืนยันการแก้ไข</button>


                <?php echo form_close()?>
              </div>
            </div>
          </div>
        </body>
