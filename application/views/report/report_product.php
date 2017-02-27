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
    <table class="DataTable table table-hover">
    <thead>
      <tr>
        <th><div align="center">ลำดับ</div></th>
        <th>รหัสสินค้า</th>
        <th><div align="center">รายการสินค้า <i class="fa fa-sort"></i></div></th>
        <th><div align="center">ราคาต่อหน่วย <i class="fa fa-sort"></i></div></th>
        <th><div align="center">จำนวนที่ขาย <i class="fa fa-sort"></i></div></th>
        <th><div align="center">ขายได้ทั้งหมด <i class="fa fa-sort"></i></div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
	  <?php foreach($product as $product){ ?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $product['product_code']?></td>
        <td><?php echo $product['product_name']?></td>
        <td><div align="right"><?php echo $product['product_sale']?> บาท</div></td>
        <td><div align="right">
        <?php
        	$this->db->where('stock_product',$product['product_code']);
        	$this->db->where('stock_type',"out");
        	$this->db->where('stock_date >=',$date_start);
        	$this->db->where('stock_date <=',$date_end);
			$query = $this->db->get('stock');
			$stock_amount = $query->result_array();
			echo number_format(@$product['sum_stock']['stock_amount']);
			@$total[] = @$product['sum_stock']['stock_price'];
			@$amount[] = $product['sum_stock']['stock_amount'];
		?> หน่วย</div></td>
        <td><div align="right"><?php echo number_format($product['sum_stock']['stock_price'])?> บาท</div></td>
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
  buttons: [
      'excel',
      'print'
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
