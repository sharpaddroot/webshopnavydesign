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
?>
<?php

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user'])) {
  $loginUsername=$_POST['user'];
  $password= base64_encode($_POST['pass']);
  $MM_fldUserAuthorization = "";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_myconnect, $myconnect);

  $LoginRS__query=sprintf("SELECT u_name, p_word FROM user_profile WHERE u_name=%s AND p_word=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysql_query($LoginRS__query, $myconnect) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";

	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && false) {
    }
		mysql_select_db($database_myconnect, $myconnect);
		$query_Recordset1 = sprintf("SELECT * FROM user_profile WHERE u_name = %s", GetSQLValueString($loginUsername, "text"));
		$Recordset1 = mysql_query($query_Recordset1, $myconnect) or die(mysql_error());
		$row_Recordset1 = mysql_fetch_assoc($Recordset1);
		$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	if ($row_Recordset1['status'] == 'blocker') {
		echo "<script type=\"text/javascript\">";
		echo "swal({title: \"บัญชีคุณถูกบล็อคการใช้งาน\",
				text: \"ระบบกำลังพาท่านไป...\",
				icon: \"warning\",
				buttons: false,
			  })\n";
		echo "setTimeout(function(){ window.location.href=\"index.php\"; }, 4500);";
		echo "</script>";		
		
	} else {
		if ($row_Recordset1['status'] == 'banner') {
		echo "<script type=\"text/javascript\">";
		echo "swal({title: \"บัญชีคุณถูกแบนการใช้งาน\",
				text: \"กรุณาติดต่อผู้ดูและระบบ\",
				icon: \"error\",
				buttons: \"OK\",
			  })\n";
		echo "</script>";		
		
	} else {
				echo "<script type=\"text/javascript\">";
				echo "swal({title: \"เข้าสู่ระบบสำเร็จ\",
						text: \"ระบบกำลังพาท่านไป...\",
						icon: \"success\",
						buttons: false,
					  })\n";
				echo "setTimeout(function(){ window.location.href=\"home.php\"; }, 2500);";
				echo "</script>";
		}
	}

  } 
	else {
	echo "<script type=\"text/javascript\">";
	echo "swal({title: \"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง\",
            text: \"กรุณาลองใหม่อีกครั้ง...\",
            icon: \"error\",
            buttons: false,
          })\n";
	echo "setTimeout(function(){window.location.href=\"index.php\";}, 1500);";
	echo "</script>";
  }
}
?>
	</body>
</html> 
