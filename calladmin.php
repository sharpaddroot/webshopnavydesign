<!doctype html>
<html><!-- InstanceBegin template="/Templates/guest_page.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>DEVWEB Site</title>

<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/animate.css" rel="stylesheet">
	<script src="assets/js/sweetalert.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
	<?php include('Connections/show.php'); ?>
<!-- InstanceBeginEditable name="head" -->
<?php include 'Connections/webconfig.php'; ?>
	
<!-- InstanceEndEditable -->

	<style>
	#userimg {width:50%; height: auto; border-radius: 100%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.5);border: 1px solid black;animation: heartBeat 2.25s infinite;no-repeat center center fixed; min-height: 118px; min-width: 118px; max-width: 228px; max-height: 228px;}
		body {background:url("assets/img/websettingimg/<?php echo $row_config['background_img'] ?>") no-repeat center center fixed;margin: 0;}
	.colsig1{  border: 2px solid black;border-radius: 10px;background-color: rgba(251,251,251,0.8);}
		}
	</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="">' <?php echo $row_config['webname'] ?>
 '</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php"><i class="fas fa-home"></i> หน้าแรก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shop.php"><i class="fas fa-shopping-cart"></i> ร้านค้า</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="trade.php"><i class="fas fa-star"></i> แลกรางวัล</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus"></i> เพิ่มเติม
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="pay.php"><i class="fas fa-credit-card"></i> เติมเงิน</a>
		  <a class="dropdown-item" href="usecode.php"><i class="fas fa-exchange-alt"></i> สะสมแต้ม</a>
          <a class="dropdown-item" href="sentstar.php"><i class="fas fa-gift"></i> โอนแต้มให้เพื่อน</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item active" href="calladmin.php"><i class="fas fa-user-shield"></i> ติดต่อทีมงาน</a>
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
				<marquee direction="left" style="width: 100%;z-index: -1;"><?php echo $row_config['text_run'] ?>
</marquee>
			</div>
		  <div style="padding-top:1%;"></div>
<!-- InstanceBeginEditable name="content" -->		  
<center>
			<div class="card" style="width: 95%;border: 2px solid black;">
			  <div class="card-header text-white text-left bg-secondary" style="font-size: 20px;"><i class="fas fa-phone-alt"></i> ติดต่อทีมงาน</div>
			  <div class="card-body" style="max-height: 630px;overflow: scroll;">

			<div class="container">
			  <div class="row">
				<div class="col-lg-4">
				  <div style="padding-top:3%;"></div>
				  <div class="card" style="width: 100%;border: 0px;">
					  <a href="https://www.facebook.com/NOX.NAVY" target="_blank"><img class="card-img-top" style="width: 60%;animation: tada 1.5s infinite;" src="assets/img/facebook.png" alt="Card image cap"></a>
					  <div class="card-body">
						<h2 class="card-title" style="color:#3b5998;"><b>FACEBOOK</b></h2>
					  </div>
					</div>
				</div>
				<div class="col-lg-4">
				  <div style="padding-top:3%;"></div>
				  <div class="card" style="width: 100%;border: 0px;">
					  <a href="https://discord.gg/2XPANRC" target="_blank"><img class="card-img-top" style="width: 60%;animation: tada 2s infinite;" src="assets/img/discord.png" alt="Card image cap"></a>
					  <div class="card-body">
						<h2 class="card-title" style="color:#7289DA;"><b>DISCORD</b></h2>
					  </div>
					</div>
				</div>
				<div class="col-lg-4">
				  <div style="padding-top:3%;"></div>
				  <div class="card" style="width: 100%;border: 0px;">
					  <a href="https://www.youtube.com/channel/UCKxpCwMEj8qNC-3_A5gGd9w" target="_blank"><img class="card-img-top" style="width: 60%;animation: tada 2.5s infinite;" src="assets/img/youtube.png" alt="Card image cap"></a>
					  <div class="card-body">
						<h2 class="card-title" style="color:#FF0000;"><b>YOUTUBE</b></h2>
					  </div>
					</div>
				</div>
			  </div>
			</div>
				  
					  
				</div>
				</div>
	<div style="padding-bottom:2%;"></div>
</center>
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
