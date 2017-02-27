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
    <div class="col-lg-12">
      <h1>พญาปลามังกร Bhuvarat Fishing Net.</h1>
        <li class="active"><i class="fa fa-sitemap"></i> ใบเสร็จ เลขที่ : <?php echo $sale_order_detail[0]['sale_order_detail_no']?></li>
        <li class="active"><i class="fa fa-sitemap"></i>วันที่ : <?php echo $sale_order_detail[0]['sale_order_detail_date']?></li>
    </div>
  </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <div align="center"><h3>รายละเอียดใบเสร็จ</h3></div><br>
      </td>
    </tr>
    <tr>
      <td height="50">
        <div class="row">
          <div class="col-xs-4 col-md-4">
            <div class="form-group">
              ชื่อ :<?php echo $sale_order_detail[0]['member_fullname']?>
            </div>
          </div>
          <div class="col-xs-4 col-md-4">
            <div class="form-group">
              เบอร์โทรศัพท์ :<?php echo $sale_order_detail[0]['member_phone']?>
            </div>
          </div>
          <div class="col-xs-4 col-md-4">
            <div class="form-group">
              <?php if ($sale_order_detail[0]['sale_order_detail_pay_type']==1): ?>
                <div class="form-group">
                  ประเภท : เงินสด
                </div>
              <?php elseif($sale_order_detail[0]['sale_order_detail_pay_type']==2): ?>
                <div class="form-group">
                  ประเภท : เช็ค
                </div>
              <?php else: ?>
                <div class="form-group">
                  ประเภท : เครดิต
                </div>
              <?php endif; ?>
            </div>
          </div>
          <!-- <div class="col-md-1">
            <div class="form-group">
              <?php if ($sale_order_detail[0]['sale_order_detail_vat']==1): ?>
                <div class="form-group btn btn-warning">
                  VAT
                </div>
              <?php else: ?>
                <div class="form-group btn btn-info">
                  ไม่ VAT
                </div>
              <?php endif; ?>
            </div>
          </div> -->
        </div>
      </td>
    </tr>
    <tr>
      <td height="50">
        <div class="row">
          <div class="col-xs-4 col-md-4">
            <div class="form-group">
              ที่อยู่ :<?php echo $sale_order_detail[0]['member_address']?>
            </div>
          </div>
          <div class="col-xs-4 col-md-4">
            <div class="form-group">
              หมายเหตุ :<?php echo $sale_order_detail[0]['member_note']?>
            </div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td height="40" colspan="5">&nbsp;&nbsp;&nbsp;<strong>รายการสินค้า ( Product List )</strong></td>
        </tr>
        <tr>
          <td width="9%" align="center">ลำดับ</td>
          <td width="50%" align="center">รายการสินค้า</td>
          <td width="19%" align="center">ราคาต่อหน่วย</td>
          <td width="9%" align="center">จำนวน</td>
          <td width="13%" height="40" align="center">ราคารวม</td>
        </tr>
          <?php $i=1; foreach ($sale_order_detail as $row): ?>
          <?php $total[] = @$row['product_sale']?>
          <?php @$row['product_key'] = date('YmdHis');?>
          <?php if(@$row['product_key']!=""){ ?>
            <tr>
              <td><div align="center"><?php echo $i; ?></div></td>
              <td>&nbsp;<?php echo @$row['product_code']?> <?php echo @$row['product_name']?></td>
              <td><div align="right"><?php echo @$row['product_sale']?>.00&nbsp;</div></td>
              <td><div align="center">1</div></td>
              <td height="40"><div align="right"><?php echo @$row['product_sale']?>.00&nbsp;</div></td>
            </tr>
            <?php } ?>
            <?php $i++; endforeach; ?>
            <tr>
              <td colspan="2" align="center"><strong>รวมทั้งหมด</strong></td>
              <td><div align="right"><?php echo @number_format(@array_sum(@$total))?>.00&nbsp;</div></td>
              <td><div align="center"><?php echo count($sale_order_detail);?></div></td>
              <td height="40"><div align="right"><?php echo @number_format(@array_sum(@$total))?>.00&nbsp;</div></td>
            </tr>
          </table></td>
          </tr>
        </table>
</page>
