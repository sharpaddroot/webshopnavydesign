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

if($_POST['pass'] != $_POST['conpass']){
	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"รหัสผ่านไม่ตรงกัน\",
            text: \"กรุณาลองใหม่อีกครั้ง...\",
            icon: \"error\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){window.history.back();}, 1500);";
	echo "</script>";
}
else {
	mysql_select_db($database_myconnect, $myconnect);
	$uaa = $_POST['user'];
	$check = "SELECT * FROM user_profile WHERE u_name = '$uaa'";
	  $result2 = mysql_query($check) or die(mysql_error());
		$num=mysql_num_rows($result2); 
        if($num > 0)   		
        {

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"ชื่อผู้ใช้นี้มีในระบบแล้ว\",
            text: \"กรุณาลองใหม่อีกครั้ง...\",
            icon: \"error\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){window.history.back();}, 1500);";
	echo "</script>";
 
		}else{
	$uab = $_POST['mail'];
	$check1 = "SELECT * FROM user_profile WHERE e_mail = '$uab'";
	  $result3 = mysql_query($check1) or die(mysql_error());
		$num1=mysql_num_rows($result3); 		
	if($num1 > 0)   		
        {

	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"อีเมลนี้มีในระบบแล้ว\",
            text: \"กรุณาใช้อีเมลอื่น...\",
            icon: \"error\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){window.history.back();}, 1500);";
	echo "</script>";
	}else{
			
	
		
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

$regisFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}




if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO user_profile (u_name, p_word, e_mail, SID) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['user'], "text"),
                       GetSQLValueString(base64_encode($_POST['pass']), "text"),
                       GetSQLValueString($_POST['mail'], "text"),
					   GetSQLValueString(base64_encode(md5(base64_encode(md5($_POST['pass'],$_POST['user'])))), "text"));


  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($insertSQL, $myconnect) or die(mysql_error());


	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"ลงทะเบียนใช้งานสำเร็จ\",
            text: \"ระบบกำลังพาท่านไป...\",
            icon: \"success\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){ window.location.href=\"./index.php\"; }, 2500);";
	echo "</script>";
}
	}
}
		}

?>
		</body>
</html> 
