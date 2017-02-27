<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>สต๊อกสินค้าของร้าน <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th-large"></i> Stock List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="10%"><div align="center">วันที่<i class="fa fa-sort"></i></div></th>
        <th width="10%"><div align="center">เวลา<i class="fa fa-sort"></i></div></th>
        <th width="25%"><div align="center">เลขที่บิล <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">สถานะ</div></th>
        <th width="20%"><div align="center">หมายเหตุ</div></th>
        <th width="20%"><div align="center">ตัวเลือก</div></th>
      </tr>
    </thead>
    <tbody>
      <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
      <?php foreach($sale_order_detail as $row){ ?>
        <tr>
          <td><div align="center"><?php echo $i ?></div></td>
          <td><?php echo $row['stock_date']?></td>
          <td><?php echo $row['stock_time']?></td>
          <td><?php echo $row['sale_order_detail_no']?></td>
          <?php if ($row['sale_order_detail_status']==0): ?>
            <td><div align="center"><font color="red">ยกเลิกรายการแล้ว</font></td>
            <?php else: ?>
              <td><div align="center"><font color="green">ปกติ</font></div></td>
            <?php endif; ?>
            <td><?php echo $row['member_note']?></td>
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
