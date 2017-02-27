<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>สต๊อกสินค้ากลาง <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th"></i> Warehouse List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <div align="right"><p><?php echo anchor('warehouse/warehouse_in','<button type="button" class="btn btn-primary" style="width:95px;">รับเข้า</button>')?> <?php echo anchor('warehouse/warehouse_out','<button type="button" class="btn btn-info" style="width:95px;">จ่ายออก</button>')?></p></div>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="10%"><div align="center">รหัสสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="10%"><div align="center">ประเภทสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="25%"><div align="center">ชื่อสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="7%"><div align="center">หน่วย</div></th>
        <th width="15%"><div align="center">จำนวนคงเหลือ <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">สถานะ</div></th>
        <th width="15%"><div align="center">หมายเหตุ</div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
	  <?php foreach($product as $product){ ?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $product['product_code']?></td>
        <td align="center"><?php echo $product['category_name']?></td>
        <td><?php echo $product['product_name']?></td>
        <td align="center"><?php echo $product['product_unit']?></td>
        <td><div align="center">
        <?php
      $this->db->select_sum('warehouse_amount');
			$this->db->where('warehouse_product',$product['product_code']);
			$this->db->where('warehouse_type','in');
			$in = $this->db->get('warehouse');
			$in_warehouse_amount = $in->result_array();

			$this->db->select_sum('warehouse_amount');
			$this->db->where('warehouse_product',$product['product_code']);
			$this->db->where('warehouse_type','out');
			$out = $this->db->get('warehouse');
			$out_warehouse_amount = $out->result_array();
			echo number_format($warehouse_amount = ((@$in_warehouse_amount[0]['warehouse_amount']+0) - (@$out_warehouse_amount[0]['warehouse_amount']+0)));
        ?>

        </div></td>
        <td><div align="center">
        <?php
        	if($product['product_max']<$warehouse_amount){
				echo "<span style='color:green;'>คงเหลือปกติ</span>";
			}else{
				echo "<span style='color:red;'>คงเหลือน้อยกว่าเกณฑ์</span>";
			}
		?>
        </div></td>
        <td align="center"><?php echo $product['product_note']?></td>
      </tr>
      <?php $i++ ?>
	  <?php } ?>
    </tbody>
  </table>
</div>
