<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<style type="text/css">
body {
	color:#fff;
	background-color: #000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<div align="center"><img src="<?php echo base_url()?>images/logo.png" width="330"></div>
<div align="center"><h1>Bhuvarat Fishing Net.</h1></div>
<p>&nbsp;</p>
<?php if($this->uri->segment(3)=="error"){ ?>
<div align="center"><strong style="color:red;">ไม่สามารถเข้าสู่ระบบได้ ตรวจสอบ Username และ Password อีกครั้ง!</strong></div>
<?php } ?>
<?php echo form_open('login/login_check')?>
<center>
<div style="border: 1px solid #FFF; width:40%; padding:4%;">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td width="32%" height="50">ผู้ใช้งาน</td>
    <td width="68%" height="50"><input type="text" name="username" id="username" class="form-control" style="width:80%;" required="required" placeholder="Username" /></td>
  </tr>
  <tr>
    <td height="50">รหัสผ่าน</td>
    <td height="50"><input type="password" name="password" id="password" class="form-control" style="width:80%;" required="required" placeholder="Password" /></td>
  </tr>
  <tr>
    <td height="50">&nbsp;</td>
    <td height="50">
    <input type="submit" name="button" id="button" value="เข้าสู่ระบบ" class="btn btn-success" />
    <input type="reset" name="Reset" id="button" value="ยกเลิก" class="btn btn-danger" />
    </td>
  </tr>
</table>
</div>
</center>
<?php echo form_close()?>
</body>
</html>