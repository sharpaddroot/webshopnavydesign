<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/animate.css" rel="stylesheet">
	<script src="../assets/js/sweetalert.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
	</head>
<body>

<?php require_once('Connections/myconnect.php'); ?>
<?php require_once('Connections/show.php'); ?>
<?php
mysql_select_db($database_myconnect, $myconnect);
$reward_data = "SELECT * FROM reward_data Order By reward_id DESC";
$reward_data = mysql_query($reward_data, $myconnect) or die(mysql_error());
$row_reward_data = mysql_fetch_assoc($reward_data);

$updateproimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $updateproimgFormAction .= "?UpdaterewardId=".$_POST['proimgid'] . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form79")) {
	
	$updateSQL = sprintf("UPDATE reward_data SET reward_name=%s, reward_type=%s, reward_detail=%s, reward_price=%s  WHERE reward_id=%s ",
					   GetSQLValueString($_POST['name'], "text"),
					   GetSQLValueString($_POST['type'], "text"),
					   GetSQLValueString($_POST['detail'], "text"),
					   GetSQLValueString($_POST['price'], "text"),
                       GetSQLValueString($_POST['proimgid'], "text"));
 	
  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($updateSQL, $myconnect) or die(mysql_error());


  function Upload($file,$path="./assets/img/reward_img/"){
	$namea = $_POST["name_proimg"].".jpg";
	$newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
	if(@copy($file['tmp_name'],$path.$newfilename)){
		@chmod($path.$file,0777);
		return $newfilename;
	}else{
		return false;
	}
}
  
    $updateSQL = sprintf("UPDATE reward_data SET reward_img=%s WHERE reward_id=%s ",
		GetSQLValueString(Upload($_FILES['proimg']), "text"),
        GetSQLValueString($_POST['proimgid'], "text"));
 	
  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($updateSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทรางวัล\",
            text: \"ระบบกำลังอัพเดทรางวัล...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edittrade.php\"; }, 2500);";
	echo "</script>";
}
?>
<?php
	$insertproimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $insertproimgFormAction .= "?Insertreward" . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form78")) {

  function Upload($file,$path="./assets/img/reward_img/"){
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
  	$insertSQL = sprintf("INSERT INTO reward_data (reward_name, reward_type, reward_detail, reward_price, reward_img)  VALUES (%s,%s,%s,%s,%s) ",
					   GetSQLValueString($_POST['name'], "text"),
					   GetSQLValueString($_POST['type'], "text"),
					   GetSQLValueString($_POST['detail'], "text"),
					   GetSQLValueString($_POST['price'], "text"),
					   GetSQLValueString(Upload($_FILES['proimg']), "text"));
 	

  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($insertSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทรางวัล\",
            text: \"ระบบกำลังเพิ่มรางวัล...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edittrade.php\"; }, 2500);";
	echo "</script>";
}
	?>

<?php
$delproimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $delproimgFormAction .= "?delreward" . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form80")) {


	$delSQL = sprintf("DELETE FROM reward_data WHERE reward_id=%s",
						GetSQLValueString($_POST['proimgid1'], "text"));
	
	  mysql_select_db($database_myconnect, $myconnect);
	 $Result1 = mysql_query($delSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังอัพเดทรางวัล\",
            text: \"ระบบกำลังลบรางวัล...\",
            icon: \"error\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./edittrade.php\"; }, 1500);";
	echo "</script>";
}
	?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
	</html>
