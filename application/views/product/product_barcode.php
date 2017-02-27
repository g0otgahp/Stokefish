<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Product Barcode</title>
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
</head>
<style>
body {
	background: rgb(204,204,204);
}
page {
	background: white;
	display: block;
	padding: 1%;
	margin: 0 auto;
	margin-bottom: 0.5cm;
	box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {
	width: 21cm;
	height: 29.7cm;
}
page[size="A4"][layout="portrait"] {
	width: 29.7cm;
	height: 21cm;
}
page[size="A3"] {
	width: 29.7cm;
	height: 42cm;
}
page[size="A3"][layout="portrait"] {
	width: 42cm;
	height: 29.7cm;
}
page[size="A5"] {
	width: 14.8cm;
	height: 21cm;
}
page[size="A5"][layout="portrait"] {
	width: 21cm;
	height: 14.8cm;
}
@media print {
body, page {
	margin: 0;
	box-shadow: 0;
}
}
hr.style-two {
	border: 0;
	height: 1px;
	background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>
<style>
* {
	color: #7F7F7F;
	font-family: Arial, sans-serif;
	font-size: 12px;
	font-weight: normal;
}
#config {
	overflow: auto;
	margin-bottom: 10px;
}
.config {
	float: left;
	width: 200px;
	height: 250px;
	border: 1px solid #000;
	margin-left: 10px;
}
.config .title {
	font-weight: bold;
	text-align: center;
}
.config .barcode2D, #miscCanvas {
	display: none;
}
#submit {
	clear: both;
}
<?php for($i=0;$i<30;$i++){ ?>
#barcodeTarget, #canvasTarget {
	margin-top: 0px;
}
<?php } ?>
</style>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>barcode/jquery-barcode.js"></script>
<script type="text/javascript">
    
      function generateBarcode(){
        var value = "<?php echo $product[0]['product_code']?>";
        //var value = $("#barcodeValue").val();
        var btype = "code128";
        //var btype = $("input[name=btype]:checked").val();
        var renderer = $("input[name=renderer]:checked").val();
		
        
		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }
		
        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
          barWidth: $("#barWidth").val(),
          barHeight: $("#barHeight").val(),
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
		  <?php for($i=0;$i<32;$i++){ ?>
          $("#barcodeTarget<?php echo $i ?>").hide();
		  <?php } ?>
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
		
          $("#canvasTarget").hide();
		 <?php for($i=0;$i<32;$i++){ ?>
          $("#barcodeTarget<?php echo $i ?>").html("").show().barcode(value, btype, settings);
		  <?php } ?>
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });
  
    </script>
    
<body>
<!--<page size="A4"></page>
<page size="A4"></page>
<page size="A4" layout="portrait"></page>
<page size="A5"></page>-->
<page size="A4">
	<?php for($i=0;$i<32;$i++){ ?>
    <div style="float:left; margin:3%;">
  <span><?php echo $product[0]['product_name']?></span><br>
  <span>ราคา <?php echo number_format($product[0]['product_sale'],2)?> บาท</span>
  <div id="barcodeTarget<?php echo $i ?>" class="barcodeTarget<?php echo $i ?>"></div>
  </div>
  <?php } ?>

 
  
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> 
</page>
<!--<page size="A3"></page>
<page size="A3" layout="portrait"></page>-->
</body>
</html>