<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>js\DataTables\media\css\dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>js\DataTables\extensions\Buttons\css\buttons.bootstrap.min.css">

<!-- jquery.dataTables -->
<script src="<?php echo base_url()?>js\DataTables\media\js\jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>js\DataTables\media\js\dataTables.bootstrap.min.js" charset="utf-8"></script>
<!-- Buttons -->
<script src="<?php echo base_url()?>js\DataTables\extensions\Buttons\js\dataTables.buttons.min.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>js\DataTables\extensions\Buttons\js\buttons.bootstrap.min.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>js\DataTables\extensions\Buttons\js\buttons.print.min.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>js\DataTables\extensions\Buttons\js\buttons.html5.min.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>js\DataTables\extensions\Buttons\js\buttons.colVis.min.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>js\DataTables\extensions\Buttons\js\buttons.flash.min.js" charset="utf-8"></script>

<link href="<?php echo base_url()?>css/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/kendo.bootstrap.min.css" rel="stylesheet" />
<script src="<?php echo base_url()?>js/kendo.all.min.js"></script>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>รายงานการขาย <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th-large"></i> Stock List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('report/report_product_search')?>
  <table width="90%" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td width="12%" align="center">เริ่มต้น</td>
      <td width="12%" align="center"><input type="text" name="start" id="start" value="<?php echo date('Y-m-d')?>" /></td>
      <td width="12%" align="center">สิ้นสุด</td>
      <td width="12%" align="center"><input type="text" name="end" id="end" value="<?php echo date('Y-m-d')?>" /></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" class="btn btn-info" value="ค้นหาข้อมูล" /></td>
    </tr>
  </table>
  <?php echo form_close()?>
  <p></p>
  <?php if(@$date_start!=""&&@$date_end!=""){ ?>
    <table class="DataTable table table-hover table-bordered" style="font-size:11px">
      <thead>
        <tr>
          <th><div align="center">ลำดับ</div></th>
          <th>รหัสสินค้า</th>
          <th><div align="center">รายการสินค้า </div></th>
          <th><div align="center">จำนวนที่ขาย </div></th>
          <th><div align="center">หน่วยขาย </div></th>
          <th><div align="center">ต้นทุนต่อหน่วย </div></th>
          <th><div align="center">ราคาขายต่อหน่วย </div></th>
          <th><div align="center">ต้นทุนรวม </div></th>
          <th><div align="center">ยอดขาย </div></th>
          <th><div align="center">กำไรก่อนหักส่วนลด </div></th>
          <th><div align="center">ส่วนลดรวม </div></th>
          <th><div align="center">กำไรหลังหักส่วนลด </div></th>
        </tr>
      </thead>
      <tfoot>
    <tr>
      <td colspan="4"></td>
      <td class="text-center"><span class="text-success"><strong>ยอดรวม</strong></span></td>
      <td></td>
    </tr>
  </tfoot>
      <tbody>
        <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
        <?php $i = 1;
        // echo "<pre>";
        // print_r($product);

        ?>
        <?php foreach($product as $row){ ?>
          <tr>
            <td><div align="center"><?php echo $i ?></div></td>
            <td><?php echo $row['product_code']?></td>
            <td><?php echo $row['product_name']?></td>
            <td class="text-right">

                <?php
                $this->db->where('stock_product', $row['product_code']);
                $this->db->where('stock_type',"out");
                $this->db->where('stock_date >=',$date_start);
                $this->db->where('stock_date <=',$date_end);
                $query = $this->db->get('stock');
                $stock_amount = $query->result_array();
                echo number_format(@$row['sum_stock']['stock_amount']);
                @$total[] = @$row['sum_stock']['stock_price'];
                @$amount[] = $row['sum_stock']['stock_amount']; ?>

            </td>
            <td><?php echo $row['product_unit'] ?></td>
            <td class="text-right"><?php echo number_format($row['product_buy']) ?>  </td>
            <td class="text-right"><?php echo number_format($row['product_sale']) ?></td>
            <td class="text-right"><?php  $total_buy = ($row['sum_stock']['stock_amount']*$row['product_buy']); echo number_format($total_buy) ?>  </td>
            <td class="text-right"><?php $total_sale = $row['sum_stock']['stock_amount']*$row['product_sale']; echo number_format($total_sale)  ?></td>
            <td class="text-right"><?php echo number_format($total_sale-$total_buy) ?></td>
            <?php// $total_order_sale = $row['sum_stock']['stock_price'];  ?>
            <?php $total_order_sale = array_sum($total);  ?>
            <td class="text-right"><?php echo number_format($total_sale-$total_order_sale)?> </td>
            <td class="text-right"><?php echo number_format($total_order_sale-$total_buy)?> </td>
          </tr>
          <?php $i++ ?>
          <?php } ?>
        </tbody>
      </table>
      <?php } ?>
    </div>

    <script type="text/javascript">
    $.extend(true, $.fn.dataTable.defaults, {
      "language": {
        "sProcessing": "กำลังดำเนินการ...",
        "sLengthMenu": "แสดง_MENU_ แถว",
        "sZeroRecords": "ไม่พบข้อมูล",
        "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
        "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
        "sInfoPostFix": "",
        "sSearch": "ค้นหา:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "เริ่มต้น",
          "sPrevious": "ก่อนหน้า",
          "sNext": "ถัดไป",
          "sLast": "สุดท้าย"
        }
      }
    });

    $('.DataTable').DataTable( {
      dom: 'Bfrtip',
      // buttons: [
      //   'excel',
      //   'print'
      // ]
      buttons: [
          'excel',
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '16px' )
                        .prepend(
                            '<p>สินค้า ... รายการ ต้นทุนรวม ... บาท กำไรก่อนหักส่วนลด .. บาท</p><p>ส่วนลดต่อรายการขายรวม ... บาท ส่วนลดต่อใบสั่งขายรวม ... บาท กำไรหลักหักส่วนลด ... บาท</p>'
                        );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', '11px' );
                }
            }
        ]
    } );
    </script>
  </div>
</div>

<script>
$(document).ready(function() {
  $("#start").kendoDatePicker({format: "yyyy-MM-dd"});
  $("#end").kendoDatePicker({format: "yyyy-MM-dd"});
});
</script>
