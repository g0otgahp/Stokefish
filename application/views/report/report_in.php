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
      <h1>รายงานการรับสินค้าเข้า <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th-large"> Warehouse List</i></li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-md-12">
      <?php echo form_open('report/report_in_search')?>
      <table width="90%" border="0" cellspacing="5" cellpadding="5">
        <tr>
          <td width="12%" align="center">เริ่มต้น</td>
          <td width="12%" align="center"><input type="text" name="start" id="start" value="<?php echo date('Y-m-d')?>" /></td>
          <td width="12%" align="center">สิ้นสุด</td>
          <td width="12%" align="center"><input type="text" name="end" id="end" value="<?php echo date('Y-m-d')?>" /></td>
          <td width="12%"></td>
          <td width="64%"><input type="submit" name="button" id="button" class="btn btn-info" value="ค้นหาข้อมูล" /></td>
        </tr>
      </table>
      <?php echo form_close()?>
    </div>
  </div>

<hr>
<div class="row">
  <div class="col-md-12">
    <?php if(@$changes[0]['warehouse_id']!=""){ ?>
      <table class="DataTable table table-hover">
      <thead>
        <tr>
          <th>ลำดับ</th>
          <th>รายการสินค้า</th>
          <th>วันท</th>
          <th>เวลา</th>
          <th>จำนวน</th>
          <th>ราคาต่อหน่วย</th>
          <th>ราคารวม</th>
        </tr>
      </thead>
      <tbody>
      <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
        <?php $i = 1 ?>
      <?php foreach($changes as $changes){ ?>
        <?php $total[] = ($changes['product_sale']*$changes['warehouse_amount'])?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $changes['product_name']?></td>
          <td><?php echo $changes['warehouse_date']?></td>
          <td><?php echo $changes['warehouse_time']?></td>
          <td><?php echo number_format($changes['warehouse_amount'])." ".$changes['product_unit']?></td>
          <td><?php echo number_format($changes['product_buy'])?> บาท</td>
          <td><?php echo number_format(($changes['product_buy']*$changes['warehouse_amount']))?> บาท</td>
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
