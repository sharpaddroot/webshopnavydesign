<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ยินดีต้อนรับ</title>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/animate.css" rel="stylesheet">
	<script src="assets/js/sweetalert.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
	<?php include 'Connections/regis.php'; ?>
	<?php include 'Connections/webconfig.php'; ?>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
</head>

<body style="background-image: url(assets/img/websettingimg/<?php echo $row_config['background_img'] ?>);font-family: 'Kanit', sans-serif;height: 100%;no-repeat center center fixed;margin: 0;">


<div style="padding-top:3%;"></div>
<center><img src="assets/img/websettingimg/<?php echo $row_config['web_logo'] ?>" style="height: 150px;animation: heartBeat 2.25s infinite;"></center>
<div style="padding-top:1%;"></div>
<div class="container">
  <div class="row">
    <div class="col-lg-8">

		<div class="card">
		  <div class="card-header bg-primary text-white" style="font-size: 1.2rem;">
			<i class="fas fa-images"></i> รูปโปรโมทเว็บไซต์
		  </div>
		  <div class="card-img">
			<div id="demo" class="carousel slide" data-ride="carousel">

			  <!-- Indicators -->
			  <ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			  </ul>

			  <!-- The slideshow -->
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="assets/img/websettingimg/<?php echo $row_config['slide1_img'] ?>" alt="Los Angeles" width="1100" height="500">
				</div>
				<div class="carousel-item">
				  <img src="assets/img/websettingimg/<?php echo $row_config['slide2_img'] ?>" alt="Chicago" width="1100" height="500">
				</div>
				<div class="carousel-item">
				  <img src="assets/img/websettingimg/<?php echo $row_config['slide3_img'] ?>" alt="New York" width="1100" height="500">
				</div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			  </a>
			</div>
		  </div>
		</div>

<div style="padding-top:4%;"></div>
		
		<div class="card">
		  <div class="card-header bg-danger text-white" style="font-size: 1.2rem;">
			<i class="fab fa-youtube"></i> วิดีโอโปรโมทเว็บไซต์
		  </div>
		  <div class="card-img">
			<div class="embed-responsive embed-responsive-16by9">
			  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $row_config['video_link'] ?>" allowfullscreen></iframe>
			</div>
		</div>		
	</div><div style="padding-bottom:5%;"></div>
	</div>
    <div class="col-lg-4">
		
		<div class="card" style="margin: auto;">
 <div class="card-header text-white bg-dark text-center">ลงทะเบียนใช้งาน ' <?php echo $row_config['webname'] ?> '</div>
  <div class="card-body">
		<form ACTION="<?php echo $regisFormAction; ?>" id="form1" name="form1" method="POST">
		  <div class="form-group">
			  <div class="input-group mb-2">
				<div class="input-group-prepend">
				  <div class="input-group-text"><i class="fas fa-user"></i></div>
				</div>
				<input type="text" class="form-control" id="user" name="user" placeholder="ชื่อบัญชีผู้ใช้" pattern="[A-Za-z].{5,16}" title="ชื่อผู้ใช้ต้องเป็นภาษาอังกฤษและยาว 6-16 ตัวอักษร" required>
			  </div>
		  </div>
		  <div class="form-group">
			  <div class="input-group mb-2">
				<div class="input-group-prepend">
				  <div class="input-group-text"><i class="fas fa-lock"></i></div>
				</div>
				<input pattern=".{6,16}" title="รหัสผ่านต้องยาว 6-16 ตัวอักษร" type="password" class="form-control" id="pass" name="pass" placeholder="รหัสผ่าน" required>
			  </div>
		  </div>
		  <div class="form-group">
			  <div class="input-group mb-2">
				<div class="input-group-prepend">
				  <div class="input-group-text"><i class="fas fa-lock"></i></div>
				</div>
				<input pattern=".{6,16}" title="รหัสผ่านต้องยาว 6-16 ตัวอักษร" type="password" class="form-control" id="conpass" name="conpass" placeholder="ยืนยัน-รหัสผ่าน" required>
			  </div>
		  </div>
		  <div class="form-group">
			  <div class="input-group mb-2">
				<div class="input-group-prepend">
				  <div class="input-group-text"><i class="fas fa-at"></i></div>
				</div>
				<input type="email" class="form-control" id="mail" name="mail" placeholder="อีเมล" required>
			  </div>
		  </div>
		  <a href="index.php"><button type="button" class="btn btn-danger fa-pull-right"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button></a>
		  <button type="submit" class="btn btn-success fa-pull-right mr-2"><i class="fas fa-edit"></i> ลงทะเบียน</button>
		<input type="hidden" name="MM_insert" value="form1">
		</form>
  </div>
		</div>
	<div style="padding-bottom:3%;"></div>
		<div class="card">
		  <div class="card-header bg-success text-white"><i class="fas fa-server"></i> สถานะเซิฟเวอร์</div>
		  <div class="card-body">
			<p class="card-text">IP : <?php echo $row_config['ip'] ?></p>
			<p class="card-text">Version : <?php echo $row_config['version'] ?></p>
			<p class="card-text">Status : <?php echo $row_config['webstatus'] ?></p>
			<a href="<?php echo $row_config['install_gamelink'] ?>" target="_blank"><button type="button" class="btn btn-sm btn-success">โหลดตัวเกม</button></a>
			<a href="https://javadl.oracle.com/webapps/download/AutoDL?BundleId=240697_5b13a193868b4bf28bcb45c792fce896"><button type="button" class="btn btn-sm btn-danger">โหลดตัวJava</button></a>
		  </div>
		</div>
	<div style="padding-bottom:3%;"></div>
		<div class="card" style="max-width: 500px;">
		  <div class="card-header bg-primary text-white"><i class="fab fa-facebook-f"></i> Facebook</div>
			<div class="card-body p-0 m-0" style="height:130px;">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo $row_config['fbpage'] ?>&tabs&width=500&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" height="130" style="border:none;overflow:hidden;width:100%;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		  </div>
		</div>
	<div style="padding-bottom:3%;"></div>

	</div>
  </div>
</div>

	<script src="js/main.js"></script>
	<script src="js/sweetalert.min.js"></script>	
</body>
</html>

