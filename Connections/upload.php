<?php
function Upload($file,$path="../assets/img/profile_user/"){
	if(@copy($file['tmp_name'],$path.$file['name'])){
		@chmod($path.$file,0777);
		return $file['name'];
	}else{
		return false;
	}
}
?>