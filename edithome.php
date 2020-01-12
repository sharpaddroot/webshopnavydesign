<!doctype html>
<html><!-- InstanceBegin template="/Templates/actor_page.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>DEVWEB Site</title>
<!-- InstanceBeginEditable name="head" -->

<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/animate.css" rel="stylesheet">
	<script src="assets/js/sweetalert.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
	<?php include('Connections/show.php'); ?>
	<?php include 'Connections/webconfig.php'; ?>
	<?php
	mysql_select_db($database_myconnect, $myconnect);
	$event_post = "SELECT * FROM event_post Order By post_id1 DESC";
	$event_post = mysql_query($event_post, $myconnect) or die(mysql_error());
	$row_event_post = mysql_fetch_assoc($event_post);	
	?>
<?php 	$update_post = "SELECT * FROM update_post Order By post_id DESC";
	$update_post = mysql_query($update_post, $myconnect) or die(mysql_error());
	$row_update_post = mysql_fetch_assoc($update_post); ?>	

	<style>
	#userimg {width:50%; height: auto; border-radius: 100%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.5);border: 1px solid black;animation: heartBeat 2.25s infinite;no-repeat center center fixed; min-height: 118px; min-width: 118px; max-width: 228px; max-height: 228px;}
		body {background:url("assets/img/websettingimg/<?php echo $row_config['background_img'] ?>") no-repeat center center fixed;margin: 0;}
	.colsig1{  border: 2px solid black;border-radius: 10px;background-color: rgba(251,251,251,0.8);}
		}
	</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="">' <?php echo $row_config['webname'] ?> '</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="edithome.php"><i class="fas fa-home"></i> จัดการหน้าแรก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="editshop.php"><i class="fas fa-shopping-cart"></i> จัดการร้านค้า</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="edittrade.php"><i class="fas fa-star"></i> จัดการแลกรางวัล</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus"></i> เพิ่มเติม
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="edituser.php"><i class="fas fa-credit-card"></i> จัดการผู้ใช้งาน</a>
		  <a class="dropdown-item" href="addpoint.php"><i class="fas fa-exchange-alt"></i> เพิ่มPoints</a>
          <a class="dropdown-item" href="addcode.php"><i class="fas fa-gift"></i> เพิ่มReward Code</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="websetting.php"><i class="fas fa-cogs"></i> ตั้งค่าWEBSITE</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
		<div class="input-group mr-2">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
		  </div>
		  <input type="text" class="form-control" placeholder="<?php echo $row_Recordset1['u_name']; ?>" disabled>
		</div>
        <a href="<?php echo $logoutAction ?>"><button class="btn btn-danger my-2 my-sm-0" type="button">ออกจากระบบ</button></a>
    </form>
  </div>
</nav>
	
<div class="container-fluid pt-4">
	<div class="row no-gutters h-100">
	  <div class="col-lg-2 colsig1">
		<div class="container pt-4" style="text-align: center;width: 100%;padding: 2px 5px;">
		<form ACTION="<?php echo $uploadimgFormAction; ?>" id="form1" name="form1" method="POST" enctype="multipart/form-data">
			<img id="userimg" src="assets/img/profile_user/<?php echo $row_Recordset1['user_img']; ?>.jpg"/>
			<h5 class="pt-5"><b><div class="badge badge-danger text-wrap">Lv.<?php echo $row_Recordset1['level']; ?></div></b> '<?php echo $row_Recordset1['u_name']; ?>'</h5>
			<h5 class="pt-2">มีPOINTS <b><div class="badge badge-success text-wrap"><?php echo $row_Recordset1['pay_point']; ?></div></b> <i class="fas fa-money-bill"></i></h5>
			<h5 class="pt-2">มีแต้ม <b><div class="badge badge-primary text-wrap"><?php echo $row_Recordset1['reward_point']; ?></div></b> <i class="fas fa-star"></i></h5>
			<button type="button" onclick="myFunction()" class="btn btn-success btn-sm w-75"><i class="fas fa-gift"></i> รับรหัส SID ของฉัน</button>
			<section class="pt-2"></section>
			<input type="file" style="display:none;" id="img" name="img" onchange="readURL(this);" accept=".jpg,.png"/>
			<button  id="uploadTrigger" type="button" class="btn btn-primary btn-sm w-75"><i class="fas fa-images"></i> เปลี่ยนรูปโปรไฟล์</button>
			<section class="pt-2"></section>
			<button  type="submit" class="btn btn-info btn-sm w-75">ยืนยันการเปลี่ยนรูปโปรไฟล์</button>
			<input type="hidden" name="MM_insert" value="form1">
			<input type="hidden" name="name_img" value="<?php echo 'tmp_img'.$row_Recordset1['SID'].$row_Recordset1['id'] ?>">
		</form>
			<section class="pt-2"></section>
			<div class="progress" style="height: 5px;width:100%;">
			  <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($row_Recordset1['user_exp']/$row_Recordset1['max_exp'])*100; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
			</div><section class="pt-1"></section>
			<p class="font-weight-light" style="float:right;font-size: 10px;"><?php echo $row_Recordset1['user_exp']; ?>/<?php echo $row_Recordset1['max_exp']; ?> exp. </p>
		</div>
	  </div>
		
		
	  <div class="col-lg-10 colsig1">
		  <div style="padding-top:1%;"></div>
		  	<div style="width: 95%;background-color: #333; color:azure;padding: 3px 3px;border-radius: 30px;margin:auto;">
				<marquee direction="left" style="width: 100%;z-index: -1;"><?php echo $row_config['text_run'] ?></marquee>
			</div>
		  <div style="padding-top:1%;"></div>
<!-- InstanceBeginEditable name="content" -->		  
<center>
			<div class="card" style="width: 95%;border: 2px solid black;">
			  <div class="card-header text-white text-left bg-success" style="font-size: 20px;"><i class="fas fa-calendar-alt"></i> กิจกรรมของเซิฟเวอร์</div>
			  <div class="card-body" style="max-height: 500px;overflow: scroll;">
				  
				  <div class="row" style="border-bottom: 1px solid black;">
					 <div style="width: 20%; padding: 10px;float: left;">
						 <img src="assets/img/update_post/unimg.jpg" width="100%"style="float:right;">
					 </div>
					 <div style="width: 80%;float: left;padding-left: 10px;"><div style="padding-top:1%;"></div>
						 <font class="text-left">
							 <h2><b>								
						<form ACTION="<?php echo $inpostFormAction; ?>" id="form93" name="form93" method="POST" enctype="multipart/form-data">
							<div class="input-group mb-3" style="width:90%;">
							  <input type="text" class="form-control" name="eventhead" value="หัวข้อเรื่อง" required>
								<div class="input-group-prepend" id="button-addon3">
								<button class="btn btn-outline-success" type="submit">สร้างรายการ</button>
							  </div>
							</div></b></h2>
							 <p><textarea class="form-control"style="width:90%;" name="eventdetail" rows="3" required>รายละเอียดต่าง	</textarea></p>
							 <div class="input-group" style="width:90%;">
								<input type="file" id="proimg" name="proimg" accept=".jpg,.png" required/>
								 <input type="hidden" name="MM_insert" value="form93">
							</div>
							 <div style="padding-bottom:3%;"></div>	
						 </font>
					 </form></div>
				 </div>	
<?php do { ?>			  
				<div class="row" style="border-bottom: 1px solid black;">
					 <div style="width: 20%; padding: 10px;float: left;">
						 <img src="assets/img/event_post/<?php echo $row_event_post['post_img1'] ?>" width="100%"style="float:right;">
					 </div>
					 <div style="width: 80%;float: left;padding-left: 10px;"><div style="padding-top:1%;"></div>
						 <font class="text-left">
							 <h2><b>								
						<form ACTION="<?php echo $eventuppostFormAction; ?>" id="form90" name="form90" method="POST" enctype="multipart/form-data">
							<div class="input-group mb-3" style="width:90%;">
							  <input type="text" class="form-control" name="eventhead" value="<?php echo $row_event_post['post_head1'] ?>">
								<div class="input-group-prepend" id="button-addon3">
								<button class="btn btn-outline-success" type="submit">บันทึก</button><input type="hidden" name="MM_insert" value="form90">
								  <input type="hidden" name="getid" value="<?php echo $row_event_post['post_id1'] ?>">
							  </div>
							</div></b></h2>
							 <p><textarea class="form-control"style="width:90%;" name="eventdetail" rows="3"><?php echo $row_event_post['post_detail1'] ?></textarea></p></form>
							 <div class="input-group" style="width:90%;float:right;">
					<form ACTION="<?php echo $delproimgFormAction; ?>" id="form91" name="form91" method="POST" enctype="multipart/form-data">
							 <button class="btn btn-outline-danger" style="width:100%;" type="submit">ลบ</button>
							<input type="hidden" name="getid" value="<?php echo $row_event_post['post_id1'] ?>">
								 <input type="hidden" name="MM_insert" value="form91">
					</form>
								 
					<form ACTION="<?php echo $proimgFormAction; ?>" id="form92" name="form92" method="POST" enctype="multipart/form-data">
								<input type="file" class="pl-3" id="proimg" name="proimg" accept=".jpg,.png" required/>
								<button class="btn btn-outline-success" type="submit">อัพรูปภาพ</button>
								<input type="hidden" name="getid" value="<?php echo $row_event_post['post_id1'] ?>">
								 <input type="hidden" name="MM_insert" value="form92">
								<input type="hidden" name="name_proimg" value="<?php echo 'post_imgId='.$row_event_post['post_id1'] ?>">
					</form>
							</div>
							 <div style="padding-bottom:7%;"></div>	
						 </font>
					 </div>
				 </div>	
<?php } while($row_event_post = mysql_fetch_assoc($event_post)); ?>			  

				  
			  </div>
			</div>
	        <div style="padding-top:1%;"></div>
			<div class="card" style="width: 95%;border: 2px solid black;">
			  <div class="card-header text-white text-left bg-primary" style="font-size: 20px;"><i class="fas fa-wrench"></i> อัพเดทต่างๆ</div>
			  <div class="card-body" style="max-height: 500px;overflow: scroll;">

				  <div class="row" style="border-bottom: 1px solid black;">
					 <div style="width: 20%; padding: 10px;float: left;">
						 <img src="assets/img/update_post/unimg.jpg" width="100%"style="float:right;">
					 </div>
					 <div style="width: 80%;float: left;padding-left: 10px;"><div style="padding-top:1%;"></div>
						 <font class="text-left">
							 <h2><b>								
						<form ACTION="<?php echo $inpostFormAction; ?>" id="form82" name="form82" method="POST" enctype="multipart/form-data">
							<div class="input-group mb-3" style="width:90%;">
							  <input type="text" class="form-control" name="updatehead" value="หัวข้อเรื่อง" required>
								<div class="input-group-prepend" id="button-addon3">
								<button class="btn btn-outline-success" type="submit">สร้างรายการ</button>
							  </div>
							</div></b></h2>
							 <p><textarea class="form-control"style="width:90%;" name="updatedetail" rows="3" required>รายละเอียดต่าง	</textarea></p>
							 <div class="input-group" style="width:90%;">
								<input type="file" id="proimg" name="proimg" accept=".jpg,.png" required/>
								 <input type="hidden" name="MM_insert" value="form82">
							</div>
							 <div style="padding-bottom:3%;"></div>	
						 </font>
					 </form></div>
				 </div>				  
<?php do { ?>			  
				<div class="row" style="border-bottom: 1px solid black;">
					 <div style="width: 20%; padding: 10px;float: left;">
						 <img src="assets/img/update_post/<?php echo $row_update_post['post_img'] ?>" width="100%"style="float:right;">
					 </div>
					 <div style="width: 80%;float: left;padding-left: 10px;"><div style="padding-top:1%;"></div>
						 <font class="text-left">
							 <h2><b>								
						<form ACTION="<?php echo $updateuppostFormAction; ?>" id="form79" name="form79" method="POST" enctype="multipart/form-data">
							<div class="input-group mb-3" style="width:90%;">
							  <input type="text" class="form-control" name="updatehead" value="<?php echo $row_update_post['post_head'] ?>">
								<div class="input-group-prepend" id="button-addon3">
								<button class="btn btn-outline-success" type="submit">บันทึก</button><input type="hidden" name="MM_insert" value="form79">
								  <input type="hidden" name="getid" value="<?php echo $row_update_post['post_id'] ?>">
							  </div>
							</div></b></h2>
							 <p><textarea class="form-control"style="width:90%;" name="updatedetail" rows="3"><?php echo $row_update_post['post_detail'] ?></textarea></p></form>
							 <div class="input-group" style="width:90%;float:right;">
					<form ACTION="<?php echo $delproimgFormAction; ?>" id="form80" name="form80" method="POST" enctype="multipart/form-data">
							 <button class="btn btn-outline-danger" style="width:100%;" type="submit">ลบ</button>
							<input type="hidden" name="getid" value="<?php echo $row_update_post['post_id'] ?>">
								 <input type="hidden" name="MM_insert" value="form80">
					</form>
								 
					<form ACTION="<?php echo $proimgFormAction; ?>" id="form81" name="form81" method="POST" enctype="multipart/form-data">
								<input type="file" class="pl-3" id="proimg" name="proimg" accept=".jpg,.png" required/>
								<button class="btn btn-outline-success" type="submit">อัพรูปภาพ</button>
								<input type="hidden" name="getid" value="<?php echo $row_update_post['post_id'] ?>">
								 <input type="hidden" name="MM_insert" value="form81">
								<input type="hidden" name="name_proimg" value="<?php echo 'post_imgId='.$row_update_post['post_id'] ?>">
					</form>
							</div>
							 <div style="padding-bottom:7%;"></div>	
						 </font>
					 </div>
				 </div>	
<?php } while($row_update_post = mysql_fetch_assoc($update_post)); ?>						  				
				  
			  </div>
			</div>
	<div style="padding-bottom:2%;"></div>			
</center>
<?php
		if ($row_Recordset1['user_level'] != "actor"){
		echo "<script type=\"text/javascript\">";
		echo "swal({title: \"คุณไม่ใช่ ผู้ดูแลระบบ\",
				text: \"ระบบกำลังพาท่านไป...\",
				icon: \"error\",
				buttons: false,
			  })\n";
		echo "setTimeout(function(){ window.location.href=\"index.php\"; }, 2500);";
		echo "</script>";
	}
?>
<?php

$updateuppostFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $updateuppostFormAction .= "?UpdatePostId=".$_POST['getid'] . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form79")) {
	
	$updateSQL = sprintf("UPDATE update_post SET post_head=%s, post_detail=%s  WHERE post_id=%s ",
					   GetSQLValueString($_POST['updatehead'], "text"),
					   GetSQLValueString($_POST['updatedetail'], "text"),
                       GetSQLValueString($_POST['getid'], "text"));
 	
  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($updateSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทข้อความ\",
            text: \"ระบบกำลังอัพเดท...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edithome.php\"; }, 2500);";
	echo "</script>";
}
?>
<?php
$delproimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $delproimgFormAction .= "?delPost" . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form80")) {


	$delSQL = sprintf("DELETE FROM update_post WHERE post_id=%s",
						GetSQLValueString($_POST['getid'], "text"));
	
	  mysql_select_db($database_myconnect, $myconnect);
	 $Result1 = mysql_query($delSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทระบบ\",
            text: \"ระบบกำลังลบ...\",
            icon: \"error\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edithome.php\"; }, 1500);";
	echo "</script>";
}
	?>
<?php
$proimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $proimgFormAction .= "?UpdateImgId=".$_POST['getid'] . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form81")) {
	
  function Upload($file,$path="./assets/img/update_post/"){
	$namea = $_POST["name_proimg"].".jpg";
	$newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
	if(@copy($file['tmp_name'],$path.$newfilename)){
		@chmod($path.$file,0777);
		return $newfilename;
	}else{
		return false;
	}
}
  
    $updateSQL = sprintf("UPDATE update_post SET post_img=%s WHERE post_id=%s ",
		GetSQLValueString(Upload($_FILES['proimg']), "text"),
        GetSQLValueString($_POST['getid'], "text"));
 	
  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($updateSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทรูปภาพ\",
            text: \"ระบบกำลังอัพเดท...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edithome.php\"; }, 2500);";
	echo "</script>";
}
?>
<?php
	$inpostFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $inpostFormAction .= "?InsertPost" . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form82")) {

  function Upload($file,$path="./assets/img/update_post/"){
	date_default_timezone_set("Asia/Bangkok");
	$namea = date(Ymdhs).".jpg";
	$newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
	if(@copy($file['tmp_name'],$path.$newfilename)){
		@chmod($path.$file,0777);
		return $newfilename;
	}else{
		return false;
	}
}
  	$insertSQL = sprintf("INSERT INTO update_post (post_head, post_detail, post_img)  VALUES (%s,%s,%s) ",
					   GetSQLValueString($_POST['updatehead'], "text"),
					   GetSQLValueString($_POST['updatedetail'], "text"),
					   GetSQLValueString(Upload($_FILES['proimg']), "text"));
 	

  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($insertSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทระบบ\",
            text: \"ระบบกำลังเพิ่มรายการ...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edithome.php\"; }, 2500);";
	echo "</script>";
}
	?>
		  
		  
		  
<?php

$eventuppostFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $eventuppostFormAction .= "?UpdatePostId=".$_POST['getid'] . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form90")) {
	
	$eventSQL = sprintf("UPDATE event_post SET post_head1=%s, post_detail1=%s  WHERE post_id1=%s ",
					   GetSQLValueString($_POST['eventhead'], "text"),
					   GetSQLValueString($_POST['eventdetail'], "text"),
                       GetSQLValueString($_POST['getid'], "text"));
 	
  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($eventSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทข้อความ\",
            text: \"ระบบกำลังอัพเดท...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edithome.php\"; }, 2500);";
	echo "</script>";
}
?>
<?php
$delproimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $delproimgFormAction .= "?delPost" . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form91")) {


	$delSQL = sprintf("DELETE FROM event_post WHERE post_id1=%s",
						GetSQLValueString($_POST['getid'], "text"));
	
	  mysql_select_db($database_myconnect, $myconnect);
	 $Result1 = mysql_query($delSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทระบบ\",
            text: \"ระบบกำลังลบ...\",
            icon: \"error\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edithome.php\"; }, 1500);";
	echo "</script>";
}
	?>
<?php
$proimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $proimgFormAction .= "?UpdateImgId=".$_POST['getid'] . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form92")) {
	
  function Upload($file,$path="./assets/img/event_post/"){
	$namea = $_POST["name_proimg"].".jpg";
	$newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
	if(@copy($file['tmp_name'],$path.$newfilename)){
		@chmod($path.$file,0777);
		return $newfilename;
	}else{
		return false;
	}
}
  
    $eventSQL = sprintf("UPDATE event_post SET post_img1=%s WHERE post_id1=%s ",
		GetSQLValueString(Upload($_FILES['proimg']), "text"),
        GetSQLValueString($_POST['getid'], "text"));
 	
  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($eventSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทรูปภาพ\",
            text: \"ระบบกำลังอัพเดท...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edithome.php\"; }, 2500);";
	echo "</script>";
}
?>
<?php
	$inpostFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $inpostFormAction .= "?InsertPost" . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form93")) {

  function Upload($file,$path="./assets/img/event_post/"){
	date_default_timezone_set("Asia/Bangkok");
	$namea = date(Ymdhs).".jpg";
	$newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
	if(@copy($file['tmp_name'],$path.$newfilename)){
		@chmod($path.$file,0777);
		return $newfilename;
	}else{
		return false;
	}
}
  	$insertSQL = sprintf("INSERT INTO event_post (post_head1, post_detail1, post_img1)  VALUES (%s,%s,%s) ",
					   GetSQLValueString($_POST['eventhead'], "text"),
					   GetSQLValueString($_POST['eventdetail'], "text"),
					   GetSQLValueString(Upload($_FILES['proimg']), "text"));
 	

  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($insertSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทระบบ\",
            text: \"ระบบกำลังเพิ่มรายการ...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edithome.php\"; }, 2500);";
	echo "</script>";
}
	?>
<!-- InstanceEndEditable -->	
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#userimg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
$("#uploadTrigger").click(function(){
   $("#img").click();
});
</script>
<script>
function myFunction() {
swal({
  title: "รหัส SID ของคุณคือ",
  text: "<?php echo $row_Recordset1['SID']; ?>",
  icon: "success",
  button: "ปิด",
});
}
</script>

</body>
<!-- InstanceEnd --></html>
