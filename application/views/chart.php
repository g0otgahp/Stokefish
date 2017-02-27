<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url()?>css/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/kendo.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/kendo.dataviz.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/kendo.dataviz.bootstrap.min.css" rel="stylesheet" />
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/kendo.all.min.js"></script>
</head>
<body>
<?php
	$day_now = array(
		'1' => "01",
		'2' => "02",
		'3' => "03",
		'4' => "04",
		'5' => "05",
		'6' => "06",
		'7' => "07",
		'8' => "08",
		'9' => "09",
		'10' => "10",
		'11' => "11",
		'12' => "12",
		'13' => "13",
		'14' => "14",
		'15' => "15",
		'16' => "16",
		'17' => "17",
		'18' => "18",
		'19' => "19",
		'20' => "20",
		'21' => "21",
		'22' => "22",
		'23' => "23",
		'24' => "24",
		'25' => "25",
		'26' => "26",
		'27' => "27",
		'28' => "28",
		'29' => "29",
		'30' => "30",
		'31' => "31",
	);
?>
<?php $num = cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y')); ?>
<div class="demo-section k-content">
  <div id="chart" style="background: center no-repeat url('../content/shared/styles/world-map.png');"></div>
</div>
<script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    //text: "Gross domestic product growth \n /GDP annual %/"
                },
                legend: {
                    position: "bottom"
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    type: "line",
                    style: "smooth"
                },
                series: [{
                    name: "การขายสินค้าทุกร้าน",
                    data: [
					<?php for($a=0;$a<$num;$a++){ ?>
					<?php
                    	$this->db->select_sum('product.product_sale');
						$this->db->like('stock.stock_date',date('Y')."-".date('m')."-".$day_now[($a+1)]);
						$this->db->where('stock.stock_type',"out");
						$this->db->join('product','product.product_code = stock.stock_product');
						$query = $this->db->get('stock');
						$daily = $query->result_array();
						echo number_format($daily[0]['product_sale']);
					?>,
					<?php } ?>
					]
                }],
                valueAxis: {
                    labels: {
                        format: "{0}"
                    },
                    line: {
                        visible: false
                    },
                    axisCrossingValue: -10
                },
                categoryAxis: {
                    categories: [
					<?php for($b=0;$b<$num;$b++){ ?>
					<?php echo ($b+1)?>,
					<?php } ?>
					],
                    majorGridLines: {
                        visible: false
                    }
                },
                tooltip: {
                    visible: true,
                    format: "{0}%",
                    template: "#= series.name #: #= value #"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
</body>
</html>
