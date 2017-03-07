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
      <?php
      // echo "<pre>";
      //   print_r($sale_order_detail);
      //   // exit();
       ?>
      <div class="col-md-12">
        <div class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <div class="navbar-brand">
                รายละเอียดใบเสร็จ
              </div>
            </div>
            <div class="collapse navbar-collapse">
              <div class="navbar-form navbar-right">
                <a href="<?php echo site_url('sale/sale_edit/'.$sale_order_detail[0]['sale_order_detail_id']);?>" class="btn btn-warning">แก้ไข</a>
                <a href="<?php echo site_url('sale/sale_result/'.$sale_order_detail[0]['sale_order_detail_id']);?>" class="btn btn-primary">พิมพ์</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">รายละเอียดการขาย</h3>
              </div>
              <ul class="list-group">
                <li class="list-group-item">เลขที่ใบเสร็จ: <?php echo $sale_order_detail[0]['sale_order_detail_no'] ?></li>
        <li class="list-group-item">วันที่สั่งขาย: <?php echo $sale_order_detail[0]['sale_order_detail_date']." เวลา ".$sale_order_detail[0]['sale_order_detail_time'] ; ?></li>
        <li class="list-group-item">
          ประเภทการชำระ:
          <?php if ($sale_order_detail[0]['sale_order_detail_pay_type']==1): ?>
          เงินสด
        <?php elseif($sale_order_detail[0]['sale_order_detail_pay_type']==2): ?>
          เช็ค
        <?php else: ?>
          เครดิต
        <?php endif; ?>
      </li>
        <li class="list-group-item">
          สถานะ:
          <?php if ($sale_order_detail[0]['sale_order_detail_status']==1): ?>
            <span class="text-success">ชำระแล้ว</span>
          <?php else: ?>
            <span class="text-danger">ยกเลิก</span>
          <?php endif; ?>
        </li>
      </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">รายละเอียดลูกค้า</h3>
              </div>
              <ul class="list-group">
        <li class="list-group-item">ชื่อ :<?php echo $sale_order_detail[0]['member_fullname']; ?></li>
        <li class="list-group-item">เบอร์โทรศัพท์ :<?php echo $sale_order_detail[0]['member_phone'];?></li>
        <li class="list-group-item">ที่อยู่ :<?php echo $sale_order_detail[0]['member_address'];?></li>
        <li class="list-group-item">หมายเหตุ :<?php echo $sale_order_detail[0]['member_note'];?></li>

      </ul>

            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">รายการสินค้า ( Product List )</h3>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="9%" class="text-center">ลำดับ</th>
                <th width="30%">รายการสินค้า</th>
                <th width="10%" class="text-right">ราคาทุน</th>
                <th width="15%" class="text-right">ราคาต่อหน่วย</th>
                <th width="18%" class="text-right">ราคาสั่งขายต่อหน่วย</th>
                <th width="9%" class="text-right">จำนวน</th>
                <th width="20%" class="text-right">ราคารวม</th>
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
                    <td>
                      <?php echo @$row['product_code']." - ".@$row['product_name']?>
                    </td>
                    <td class="text-right">
                      <?php echo @$row['product_buy']?>.00
                    </td>
                    <td class="text-right">
                      <?php echo @$row['product_sale']?>.00
                    </td>
                    <td class="text-right">
                      <?php echo @$row['stock_price']?>.00
                    </td>
                    <td class="text-right">1</td>
                    <td class="text-right">
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
                    <?php if ($sale_order_detail[0]['sale_order_detail_discount_status']==1): ?>
                    <td colspan="6" class="text-right"><strong>ส่วนลด</strong></td>
                    <td class="text-right">
                      <?php echo $sale_order_detail[0]['sale_order_detail_discount']; ?>.00
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6" class="text-right"><strong>หลังหักส่วนลด</strong></td>
                    <td class="text-right">
                      <?php  echo @number_format(@array_sum(@$total)-($sale_order_detail[0]['sale_order_detail_discount']*1));
                      ?>.00</div></td>
                    </tr>
                  <?php endif; ?>

                    <?php if ($sale_order_detail[0]['sale_order_detail_vat_status']==1): ?>
                    <tr>
                      <td colspan="6" class="text-right">
                        <strong> ภาษีมูลค่าเพิ่ม 7% </strong>
                      </td>
                      <td class="text-right">
                        <?php
                          if ($sale_order_detail[0]['sale_order_detail_discount_status']==1) {
                            @$discount_after_vat = (@array_sum(@$total)-(@$sale_order_detail[0]['sale_order_detail_discount']*1))*7/100;
                            echo @number_format($discount_after_vat).".00";
                          } else {
                            echo @number_format(@array_sum(@$total)*7/100).".00";
                          }
                        ?>
                      </td>
                    </tr>
                  <?php endif; ?>

                    <tr>
                      <td colspan="6" class="text-right"><strong>ยอดสุทธิ</strong></td>
                      <td bgcolor="#88d660" class="text-right">
                        <strong>
                        <?php
                        if ($sale_order_detail[0]['sale_order_detail_discount_status']==1) {
                          echo @number_format(@array_sum(@$total)-($sale_order_detail[0]['sale_order_detail_discount']));
                        } else {
                          echo  @number_format(@array_sum(@$total));
                        }
                        ?>.00
                      </strong>
                    </td>
                      </tr>
                      <tr>
                        <td colspan="6" class="text-right"><strong>ต้นทุน</strong></td>

                        <td  class="text-right"><?php echo @number_format(@array_sum(@$buy))?>.00</td>
                      </tr>
                      <tr>
                        <td colspan="6" class="text-right"><strong>กำไร</strong></td>

                        <td  class="text-right">
                          <?php
                          if ($sale_order_detail[0]['sale_order_detail_discount_status']==1) {
                            echo @number_format(@array_sum(@$total)-($sale_order_detail[0]['sale_order_detail_discount'])-@array_sum(@$buy));
                          } else {
                            echo  @number_format(@array_sum(@$total)-@array_sum(@$buy));
                          }
                          ?>
                        .00
                        </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </body>
