<div class="row" style="    position: fixed;
right: 5%;
top: 0%;">
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ' style="margin-top:20px">
  <form class='form-group'>

    <button type='button' class='btn btn-lg btn-primary no-print' onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

  </form>

</div>
</div>
<page size="A4" style="color: #000;">
  <div class="row">
    <div class="col-lg-12" align="center">
      <h1>พญาปลามังกร Bhuvarat Fishing Net.</h1>
      <h1>ใบเสร็จ</h1>

    </div>
  </div>
  <div class="col-xs-6">
    <h4>รายละเอียดการขาย</h4>
    เลขที่ใบเสร็จ: <?php echo $sale_order_detail[0]['sale_order_detail_no'] ?><br>
    วันที่สั่งขาย: <?php echo $sale_order_detail[0]['sale_order_detail_date']." เวลา ".$sale_order_detail[0]['sale_order_detail_time'] ; ?><br>
    ประเภทการชำระ:
    <?php if ($sale_order_detail[0]['sale_order_detail_pay_type']==1): ?>
      เงินสด
    <?php elseif($sale_order_detail[0]['sale_order_detail_pay_type']==2): ?>
      เช็ค
    <?php else: ?>
      เครดิต
    <?php endif; ?>
  </div>
</div>

  <div class="col-xs-6">
    <h4>รายละเอียดลูกค้า</h4>
    ชื่อ :<?php echo $sale_order_detail[0]['member_fullname']; ?><br>
    เบอร์โทรศัพท์ :<?php echo $sale_order_detail[0]['member_phone'];?><br>
    ที่อยู่ :<?php echo $sale_order_detail[0]['member_address'];?><br>
    หมายเหตุ :<?php echo $sale_order_detail[0]['member_note'];?><br>
  </div>

  <div class="col-md-12">
    <div class="panel panel">
      <div class="panel-heading">
        <h3 class="panel-title">รายการสินค้า ( Product List )</h3>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="9%" class="text-center">ลำดับ</th>
            <th colspan="2" width="30%">รายการสินค้า</th>
            <th width="18%" class="text-right">ราคาสั่งขายต่อหน่วย</th>
            <th width="9%" class="text-right">จำนวน</th>
            <th colspan="2" width="2%" class="text-right">ราคารวม</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($sale_order_detail as $row): ?>
            <?php $total[] = @$row['stock_price']?>
            <?php $buy[] = @$row['product_buy']?>
            <?php @$row['product_key'] = date('YmdHis');?>
            <?php if(@$row['product_key']!=""){ ?>
              <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td colspan="2">
                  <?php echo @$row['product_code']." - ".@$row['product_name']?>
                </td>
                <td class="text-right">
                  <?php echo @$row['stock_price']?>.00
                </td>
                <td class="text-right">1</td>
                <td class="text-right" colspan="2">
                  <?php echo @$row['stock_price']?>.00
                </td>
              </tr>
              <?php } ?>
              <?php $i++; endforeach; ?>
              <tr>
                <td colspan="6" class="text-right"><strong>รวมทั้งหมด</strong></td>
                <td class="text-right"><?php echo @number_format(@array_sum(@$total))?>.00</td>
              </tr>
              <tr>
                <td colspan="6" class="text-right"><strong>ส่วนลด</strong></td>
                <td class="text-right">
                  <?php if ($sale_order_detail[0]['sale_order_detail_discount_status']==1): ?>
                  <?php echo $sale_order_detail[0]['sale_order_detail_discount']; ?>.00
                  <?php else: ?>
                    -
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td colspan="6" class="text-right"><strong>หลังหักส่วนลด</strong></td>
                <td class="text-right">
                  <?php
                  if ($sale_order_detail[0]['sale_order_detail_discount_status']==1) {
                    if ($sale_order_detail[0]['sale_order_detail_vat_status']==1) {
                      echo @number_format(@array_sum(@$total)-($sale_order_detail[0]['sale_order_detail_discount'])-(@array_sum(@$total)*7/100));
                    } else {
                      echo @number_format(@array_sum(@$total)-($sale_order_detail[0]['sale_order_detail_discount']));
                    }
                  } else {
                    if ($sale_order_detail[0]['sale_order_detail_vat_status']==1) {
                      echo  @number_format(@array_sum(@$total)-(@array_sum(@$total)*7/100));
                    } else {
                      echo  @number_format(@array_sum(@$total));
                    }
                  }
                  ?>.00</div></td>
                </tr>
                <tr>
                  <td colspan="6" class="text-right">
                    <strong> ภาษีมูลค่าเพิ่ม 7% </strong>
                  </td>
                  <td class="text-right">
                    <?php
                    if ($sale_order_detail[0]['sale_order_detail_vat_status']) {
                      echo @number_format(@array_sum(@$total)*7/100).".00";
                    } else {
                      echo "- ";
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="6" class="text-right"><strong>ยอดสุทธิ</strong></td>
                  <td bgcolor="#88d660" class="text-right">
                    <strong>
                    <?php
                    if (@$_SESSION['is_discount']=='checked') {
                      echo @number_format(@array_sum(@$total)-($sale_order_detail[0]['sale_order_detail_discount']));
                    } else {
                      echo  @number_format(@array_sum(@$total));
                    }
                    ?>.00
                  </strong>
                </td>
                  </tr>
                  </tbody>
                </table>
              </div>

              <div class="row" style="margin-top:50px">
            <div class="col-sm-6">
              <div class="row text-center">
                <div class="col-sm-12">ลงชื่อ.........................................................ผู้ชำระเงิน</div>
                <div class="col-sm-12">(.....................................................................)</div>
                <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row text-center">
                <div class="col-sm-12">ลงชื่อ...........................................................ผู้รับเงิน</div>
                <div class="col-sm-12">(.....................................................................)</div>
                <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              </div>
            </div>
          </div>
        </div>
</page>

<page size="A4" style="color: #000;">
  <div class="row">
    <div class="col-lg-12" align="center">
      <h1>พญาปลามังกร Bhuvarat Fishing Net.</h1>
      <h1>สำเนา ใบเสร็จ</h1>

    </div>
  </div>
  <div class="col-xs-6">
    <h4>รายละเอียดการขาย</h4>
    เลขที่ใบเสร็จ: <?php echo $sale_order_detail[0]['sale_order_detail_no'] ?><br>
    วันที่สั่งขาย: <?php echo $sale_order_detail[0]['sale_order_detail_date']." เวลา ".$sale_order_detail[0]['sale_order_detail_time'] ; ?><br>
    ประเภทการชำระ:
    <?php if ($sale_order_detail[0]['sale_order_detail_pay_type']==1): ?>
      เงินสด
    <?php elseif($sale_order_detail[0]['sale_order_detail_pay_type']==2): ?>
      เช็ค
    <?php else: ?>
      เครดิต
    <?php endif; ?>
  </div>
</div>

  <div class="col-xs-6">
    <h4>รายละเอียดลูกค้า</h4>
    ชื่อ :<?php echo $sale_order_detail[0]['member_fullname']; ?><br>
    เบอร์โทรศัพท์ :<?php echo $sale_order_detail[0]['member_phone'];?><br>
    ที่อยู่ :<?php echo $sale_order_detail[0]['member_address'];?><br>
    หมายเหตุ :<?php echo $sale_order_detail[0]['member_note'];?><br>
  </div>

  <div class="col-md-12">
    <div class="panel panel">
      <div class="panel-heading">
        <h3 class="panel-title">รายการสินค้า ( Product List )</h3>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="9%" class="text-center">ลำดับ</th>
            <th colspan="2" width="30%">รายการสินค้า</th>
            <th width="18%" class="text-right">ราคาสั่งขายต่อหน่วย</th>
            <th width="9%" class="text-right">จำนวน</th>
            <th colspan="2" width="2%" class="text-right">ราคารวม</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($sale_order_detail as $row): ?>
            <?php $total2[] = @$row['stock_price']?>
            <?php $buy2[] = @$row['product_buy']?>
            <?php @$row['product_key'] = date('YmdHis');?>
            <?php if(@$row['product_key']!=""){ ?>
              <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td colspan="2">
                  <?php echo @$row['product_code']." - ".@$row['product_name']?>
                </td>
                <td class="text-right">
                  <?php echo @$row['stock_price']?>.00
                </td>
                <td class="text-right">1</td>
                <td class="text-right" colspan="2">
                  <?php echo @$row['stock_price']?>.00
                </td>
              </tr>
              <?php } ?>
              <?php $i++; endforeach; ?>
              <tr>
                <td colspan="6" class="text-right"><strong>รวมทั้งหมด</strong></td>
                <td class="text-right"><?php echo @number_format(@array_sum(@$total2))?>.00</td>
              </tr>
              <tr>
                <td colspan="6" class="text-right"><strong>ส่วนลด</strong></td>
                <td class="text-right">
                  <?php if ($sale_order_detail[0]['sale_order_detail_discount_status']==1): ?>
                  <?php echo $sale_order_detail[0]['sale_order_detail_discount']; ?>.00
                  <?php else: ?>
                    -
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td colspan="6" class="text-right"><strong>หลังหักส่วนลด</strong></td>
                <td class="text-right">
                  <?php
                  if ($sale_order_detail[0]['sale_order_detail_discount_status']==1) {
                    if ($sale_order_detail[0]['sale_order_detail_vat_status']==1) {
                      echo @number_format(@array_sum(@$total2)-($sale_order_detail[0]['sale_order_detail_discount'])-(@array_sum(@$total)*7/100));
                    } else {
                      echo @number_format(@array_sum(@$total2)-($sale_order_detail[0]['sale_order_detail_discount']));
                    }
                  } else {
                    if ($sale_order_detail[0]['sale_order_detail_vat_status']==1) {
                      echo  @number_format(@array_sum(@$total2)-(@array_sum(@$total2)*7/100));
                    } else {
                      echo  @number_format(@array_sum(@$total2));
                    }
                  }
                  ?>.00</div></td>
                </tr>
                <tr>
                  <td colspan="6" class="text-right">
                    <strong> ภาษีมูลค่าเพิ่ม 7% </strong>
                  </td>
                  <td class="text-right">
                    <?php
                    if ($sale_order_detail[0]['sale_order_detail_vat_status']) {
                      echo @number_format(@array_sum(@$total2)*7/100).".00";
                    } else {
                      echo "- ";
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="6" class="text-right"><strong>ยอดสุทธิ</strong></td>
                  <td bgcolor="#88d660" class="text-right">
                    <strong>
                    <?php
                    if (@$_SESSION['is_discount']=='checked') {
                      echo @number_format(@array_sum(@$total2)-($sale_order_detail[0]['sale_order_detail_discount']));
                    } else {
                      echo  @number_format(@array_sum(@$total2));
                    }
                    ?>.00
                  </strong>
                </td>
                  </tr>
                  </tbody>
                </table>
              </div>

              <div class="row" style="margin-top:50px">
            <div class="col-sm-6">
              <div class="row text-center">
                <div class="col-sm-12">ลงชื่อ.........................................................ผู้ชำระเงิน</div>
                <div class="col-sm-12">(.....................................................................)</div>
                <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row text-center">
                <div class="col-sm-12">ลงชื่อ...........................................................ผู้รับเงิน</div>
                <div class="col-sm-12">(.....................................................................)</div>
                <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              </div>
            </div>
          </div>
</page>
