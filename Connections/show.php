<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<body>
<?php require_once('Connections/myconnect.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  setcookie('PHPSESSID', '', time()-60*60*24*365);
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../devweb/index.php";
  if ($logoutGoTo) {
    echo "<script type=\"text/javascript\">";
	echo "swal({title: \"ออกจากระบบสำเร็จ\",
            text: \"ระบบกำลังพาท่านไป...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){window.location.href=\"./index.php\";}, 1500);";
	echo "</script>";
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

	
$uploadimgFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $uploadimgFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}	
	

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

	
  function Upload($file,$path="./assets/img/profile_user/"){
	date_default_timezone_set('UTC');
	$namea = $_POST["name_img"].".jpg";
	$newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
	if(@copy($file['tmp_name'],$path.$newfilename)){
		@chmod($path.$file,0777);
		return $newfilename;
	}else{
		return false;
	}
}
  
    $updateSQL = sprintf("UPDATE user_profile SET user_img=%s WHERE SID=%s ",
		GetSQLValueString(Upload($_FILES['img']), "text"),
        GetSQLValueString($row_Recordset1['SID'], "text"));
 


  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($updateSQL, $myconnect) or die(mysql_error());


	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"อัพรูปโปรไฟล์สำเร็จ\",
            text: \"ระบบกำลังพาท่านไป...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"imgupdate.php\"; }, 2500);";
	echo "</script>";
}

	

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_myconnect, $myconnect);
$query_Recordset1 = sprintf("SELECT * FROM user_profile WHERE u_name = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $myconnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

	
?>
<?php 
	if ($row_Recordset1['u_name'] == ""){
	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กรุณา LOGIN ด้วยครับ\",
            text: \"ระบบกำลังพาท่านไป...\",
            icon: \"error\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./index.php\"; }, 2500);";
	echo "</script>";
} else {
	
	if ($row_Recordset1['user_exp'] >= $row_Recordset1['max_exp']){
		
		$updateSQL = sprintf("UPDATE user_profile SET user_exp=%s , max_exp=%s , level=%s  WHERE SID=%s ",
					   GetSQLValueString($row_Recordset1['user_exp'] - $row_Recordset1['max_exp'], "int"),
					   GetSQLValueString($row_Recordset1['max_exp'] + 200, "int"),
					   GetSQLValueString($row_Recordset1['level'] + 1, "int"),
                       GetSQLValueString($row_Recordset1['SID'], "text"));

     mysql_select_db($database_myconnect, $myconnect);
     $Result1 = mysql_query($updateSQL, $myconnect) or die(mysql_error());

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"กำลังประมวลผลบัญชีผู้ใช้\",
            text: \"ระบบกำลังพาท่านไป...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.reload(); }, 1500);";
	echo "</script>";
}
	}
?>
</body>
</html>