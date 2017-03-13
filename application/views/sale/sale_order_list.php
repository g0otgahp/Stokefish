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
      <h1>สต๊อกสินค้าของร้าน <small>ระบบบริหารจัดการคลังสินค้า <?php echo $config[0]['config_shop_name'] ?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th-large"></i> Stock List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <table class="DataTable table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="10%"><div align="center">เลขที่บิล </div></th>
        <th width="10%"><div align="center">วันที่</div></th>
        <th width="10%"><div align="center">เวลา</div></th>
        <th width="20%"><div align="center">หมายเหตุ</div></th>
        <th width="10%"><div align="center">สถานะ</div></th>
        <th width="15%"><div align="center">ตัวเลือก</div></th>
      </tr>
    </thead>
    <tbody>
      <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
      <?php foreach($sale_order_detail as $row){ ?>
        <tr>
          <td><div align="center"><?php echo $i ?></div></td>
          <td><?php echo $row['sale_order_detail_no']?></td>

          <td><?php echo $row['sale_order_detail_date']?></td>
          <td><?php echo $row['sale_order_detail_time']?></td>

          <td><?php echo $row['member_note']?></td>
          <?php if ($row['sale_order_detail_status']==0): ?>
            <td><div align="center"><font color="red">ยกเลิก</font></td>
            <?php else: ?>
              <td><div align="center"><font color="green">ชำระแล้ว</font></div></td>
            <?php endif; ?>
            <?php if ($row['sale_order_detail_status']==0): ?>
              <td><div align="center"><?php echo anchor('stock/sale_order_detail/'.$row['sale_order_detail_id'],'<button type="button" class="btn btn-info">รายละเอียด</button>')?></div></td>
            <?php else: ?>
              <td><div align="center">
                <?php echo anchor('stock/sale_order_detail/'.$row['sale_order_detail_id'],'<button type="button" class="btn btn-info">รายละเอียด</button>')?>
                <?php echo anchor('stock/stock_cancel/'.$row['sale_order_detail_id'],'<button type="button" class="btn btn-danger">ยกเลิก</button>')?>
              </div></td>
            <?php endif; ?>
          </tr>
          <?php $i++ ?>
          <?php } ?>
        </tbody>
      </table>
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

    $('.DataTable').DataTable();
    </script>
  </div>
</div>

<script>
$(document).ready(function() {
  $("#start").kendoDatePicker({format: "yyyy-MM-dd"});
  $("#end").kendoDatePicker({format: "yyyy-MM-dd"});
});
</script>
