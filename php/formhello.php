
<?php
	if($_SESSION['role']==1){
		echo '<li><a href="'.$url_host.'Upload.html" class="button shadow-radial" >UPLOAD</a></li>';
		echo '<li><a href="'.$url_host.'Dang-Xuat.html"class="button shadow-radial" >THOÁT</a></li>';
	}
	else echo '<li style="margin-left: 200px;"><a href="'.$url_host.'Dang-Xuat.html" class="button shadow-radial" >THOÁT</a></li>';
?>

