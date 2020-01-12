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
	<?php include('Connections/product_update.php'); ?>
	<?php include 'Connections/webconfig.php'; ?>
	<?php
	mysql_select_db($database_myconnect, $myconnect);
	$rewardcode_data = "SELECT * FROM rewardcode_data Order By id DESC";
	$rewardcode_data = mysql_query($rewardcode_data, $myconnect) or die(mysql_error());
	$row_rewardcode_data = mysql_fetch_assoc($rewardcode_data);	
	?>
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
      <li class="nav-item">
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
          <a class="dropdown-item  active" href="addcode.php"><i class="fas fa-gift"></i> เพิ่มReward Code</a>
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
	<div class="card-header text-white text-left bg-dark" style="font-size: 20px;"><i class="fas fa-cogs"></i> ตั้งค่า Website</div>
	<div class="card-body">
<form ACTION="<?php echo $updatetext; ?>" id="updatetext" name="updatetext" method="POST" enctype="multipart/form-paycard">
	<div class="row">
	<div class="col-md-8">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">ชื่อเว็บไซต์</span>
		  </div>
		  <input type="text" class="form-control" name="name" value="<?php echo $row_config['webname'] ?>" required>
		</div>
   </div>
	<div class="col-md-4">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">สถานะเว็บไซต์</span>
		  </div>
		  <input type="text" class="form-control" name="status" value="<?php echo $row_config['webstatus'] ?>" required>
		</div>
	</div>
	</div>
		
	<div class="row">
	<div class="col-lg-3">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">IP</span>
		  </div>
		  <input type="text" class="form-control" name="ip" value="<?php echo $row_config['ip'] ?>" required>
		</div>
   </div>
	<div class="col-lg-3">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Version</span>
		  </div>
		  <input type="text" class="form-control" name="version" value="<?php echo $row_config['version'] ?>" required>
		</div>
   </div>
	<div class="col-lg-3">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Facebook</span>
		  </div>
		  <input type="text" class="form-control" name="fbpage" value="<?php echo $row_config['fbpage'] ?>" required>
		</div>
   </div>
	<div class="col-lg-3">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Youtube</span>
		  </div>
		  <input type="text" class="form-control" name="youtube" value="<?php echo $row_config['video_link'] ?>" required>
		</div>
   </div>
	</div>
	<div class="row">
	<div class="col">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">ตัวหนังสือวิ่ง</span>
		  </div>
		  <textarea class="form-control" name="textrun" required style="height:50px;min-height: 50px;max-height: 50px;" ><?php echo $row_config['text_run'] ?></textarea>
		</div>
   </div>
	</div>
	<div class="row">
	<div class="col">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Linkโหลดตัวเกม</span>
		  </div>
		  <textarea class="form-control" name="gamelink" required style="height:35px;min-height: 35px;max-height: 35px;" ><?php echo $row_config['install_gamelink'] ?></textarea>
		</div>
   </div>
	</div>
		<div class="row"><div class="col"><button type="submit" class="btn btn-success w-100">อัพเดทข้อมูลเว็บไซต์</button><input type="hidden" name="MM_insert" value="updatetext"></div></div>
		</form>
<div style="padding-bottom:2%;"></div>		
		<form ACTION="<?php echo $proimgFormAction; ?>" id="form81" name="form81" method="POST" enctype="multipart/form-data">	
		 <div class="row">
			<div class="col-xl-6">
				<div style="padding-top:2%;"></div>
			 <div class="input-group mb-3">
			  <div class="input-group-append">
				<span class="input-group-text" id="">Logo</span>
			  </div>
			  <div class="custom-file">
				<input type="file" id="proimg" name="proimg" accept=".jpg,.png" required/>
				<label class="custom-file-label" for="proimg">เลือกไฟล์ที่ต้องการ</label>
			  </div>
			  <div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit">อัพโหลด</button>
				<input type="hidden" name="getid" value="<?php echo $row_config['config_id'] ?>">
				<input type="hidden" name="MM_insert" value="form81">
				<input type="hidden" name="type" value="web_logo">
				<input type="hidden" name="name_proimg" value="logo.png">
			  </div>
			</div>

				</div>
			</div></form>
		
		<form ACTION="<?php echo $proimgFormAction; ?>" id="form81" name="form81" method="POST" enctype="multipart/form-data">	
		 <div class="row">
			<div class="col-xl-6">
				<div style="padding-top:2%;"></div>
			 <div class="input-group mb-3">
			  <div class="input-group-append">
				<span class="input-group-text" id="">Background</span>
			  </div>
			  <div class="custom-file">
				<input type="file" id="proimg1" name="proimg" accept=".jpg,.png" required/>
				<label class="custom-file-label" for="proimg1">เลือกไฟล์ที่ต้องการ</label>
			  </div>
			  <div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit">อัพโหลด</button>
				<input type="hidden" name="getid" value="<?php echo $row_config['config_id'] ?>">
				<input type="hidden" name="MM_insert" value="form81">
				<input type="hidden" name="type" value="background_img">
				<input type="hidden" name="name_proimg" value="background.jpg">
			  </div>
			</div>

				</div>
			</div></form>
		
		<form ACTION="<?php echo $proimgFormAction; ?>" id="form81" name="form81" method="POST" enctype="multipart/form-data">	
		 <div class="row">
			<div class="col-xl-6">
				<div style="padding-top:2%;"></div>
			 <div class="input-group mb-3">
			  <div class="input-group-append">
				<span class="input-group-text" id="">รูปโปรโมทที่1</span>
			  </div>
			  <div class="custom-file">
				<input type="file" id="proimg2" name="proimg" accept=".jpg,.png" required/>
				<label class="custom-file-label" for="proimg2">เลือกไฟล์ที่ต้องการ</label>
			  </div>
			  <div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit">อัพโหลด</button>
				<input type="hidden" name="getid" value="<?php echo $row_config['config_id'] ?>">
				<input type="hidden" name="MM_insert" value="form81">
				<input type="hidden" name="type" value="slide1_img">
				<input type="hidden" name="name_proimg" value="slide1.jpg">
			  </div>
			</div>

				</div>
			</div></form>
		
		<form ACTION="<?php echo $proimgFormAction; ?>" id="form81" name="form81" method="POST" enctype="multipart/form-data">	
		 <div class="row">
			<div class="col-xl-6">
				<div style="padding-top:2%;"></div>
			 <div class="input-group mb-3">
			  <div class="input-group-append">
				<span class="input-group-text" id="">รูปโปรโมทที่2</span>
			  </div>
			  <div class="custom-file">
				<input type="file" id="proimg3" name="proimg" accept=".jpg,.png" required/>
				<label class="custom-file-label" for="proimg3">เลือกไฟล์ที่ต้องการ</label>
			  </div>
			  <div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit">อัพโหลด</button>
				<input type="hidden" name="getid" value="<?php echo $row_config['config_id'] ?>">
				<input type="hidden" name="MM_insert" value="form81">
				<input type="hidden" name="type" value="slide2_img">
				<input type="hidden" name="name_proimg" value="slide2.jpg">
			  </div>
			</div>

				</div>
			</div></form>

		<form ACTION="<?php echo $proimgFormAction; ?>" id="form81" name="form81" method="POST" enctype="multipart/form-data">	
		 <div class="row">
			<div class="col-xl-6">
				<div style="padding-top:2%;"></div>
			 <div class="input-group mb-3">
			  <div class="input-group-append">
				<span class="input-group-text" id="">รูปโปรโมทที่3</span>
			  </div>
			  <div class="custom-file">
				<input type="file" id="proimg4" name="proimg" accept=".jpg,.png" required/>
				<label class="custom-file-label" for="proimg4">เลือกไฟล์ที่ต้องการ</label>
			  </div>
			  <div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit">อัพโหลด</button>
				<input type="hidden" name="getid" value="<?php echo $row_config['config_id'] ?>">
				<input type="hidden" name="MM_insert" value="form81">
				<input type="hidden" name="type" value="slide3_img">
				<input type="hidden" name="name_proimg" value="slide3.jpg">
			  </div>
			</div>

				</div>
			</div></form>

	


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
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "updatetext")) {
$updatetext = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $updatetext .= "UpdateTextConfig" . htmlentities($_SERVER['QUERY_STRING']);
}	

		
  $updateSQL = sprintf("UPDATE web_setting SET webname=%s, webstatus=%s, version=%s, ip=%s, fbpage=%s, video_link=%s, text_run=%s, install_gamelink=%s",
		GetSQLValueString($_POST['name'], "text"),
	    GetSQLValueString($_POST['status'], "text"),
		GetSQLValueString($_POST['version'], "text"),
	    GetSQLValueString($_POST['ip'], "text"),
		GetSQLValueString($_POST['fbpage'], "text"),
	    GetSQLValueString($_POST['youtube'], "text"),
	    GetSQLValueString($_POST['textrun'], "text"),
        GetSQLValueString($_POST['gamelink'], "text"));
 	
  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($updateSQL, $myconnect) or die(mysql_error());

    echo "<script type=\"text/javascript\">";
	echo "swal({title: \"อัพเดทหน้าเว็บไซต์เรียบร้อย\",
            text: \"ระบบกำลังอัพเดท...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./websetting.php\"; }, 2500);";
	echo "</script>";
}
?>
<?php
$proimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $proimgFormAction .= "?UpdateImgId=".$_POST['getid'] . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form81")) {
	
  function Upload($file,$path="./assets/img/websettingimg/"){
	$namea = $_POST["name_proimg"];
	$newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
	if(@copy($file['tmp_name'],$path.$newfilename)){
		@chmod($path.$file,0777);
		return $newfilename;
	}else{
		return false;
	}
}
  $type = $_POST['type'];
    $updateSQL = sprintf("UPDATE web_setting SET $type=%s WHERE config_id=%s ",
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
	echo "setTimeout(function(){ window.location.href=\"./websetting.php\"; }, 2500);";
	echo "</script>";
}
?>
<script type="text/javascript">
$(function(){
 
    $("#proimg").on("change",function(){
        var _fileName = $(this).val();
        $(this).next("label").text(_fileName);
    });
 
});
</script>
<script type="text/javascript">
$(function(){
 
    $("#proimg1").on("change",function(){
        var _fileName = $(this).val();
        $(this).next("label").text(_fileName);
    });
 
});
</script>
<script type="text/javascript">
$(function(){
 
    $("#proimg2").on("change",function(){
        var _fileName = $(this).val();
        $(this).next("label").text(_fileName);
    });
 
});
</script>
<script type="text/javascript">
$(function(){
 
    $("#proimg3").on("change",function(){
        var _fileName = $(this).val();
        $(this).next("label").text(_fileName);
    });
 
});
</script>
<script type="text/javascript">
$(function(){
 
    $("#proimg4").on("change",function(){
        var _fileName = $(this).val();
        $(this).next("label").text(_fileName);
    });
 
});
</script>
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
