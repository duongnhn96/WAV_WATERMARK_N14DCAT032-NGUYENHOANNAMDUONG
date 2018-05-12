<?php 
include_once('classmusic.php');
$t = new MyMusic;
if(isset($_POST['usr'])&&isset($_POST['pwd'])){
	$kn= mysqli_connect("localhost","root","","musicbyduong");
	$user = mysqli_real_escape_string($kn,$_POST['usr']);
	$pass =sha1(md5(md5(addslashes($_POST['pwd']))));
	$resultuser= $t->checkuser($user,$pass);
	$n=mysqli_num_rows($resultuser);
	if($n==0){
		?>
		<script>
			alert('Tên đăng nhập hoặc mật khẩu chưa đúng!');
		</script>
		<?php	
	}
	else {

		$rowuser=mysqli_fetch_array($resultuser);
		$_SESSION['user']=$rowuser['user'];
		$_SESSION['role']=$rowuser['role'];


		?>
		<script>
			alert('Đăng nhập thành công!');
			location.href='index.php';
		</script>
		<?php
	}

}

?> 

<li style="margin-left: 90px;">
	<div class="login-pop">
		<div id="loginpop"><a rel="shadow-radial" id="loginButton" href="#" class="button shadow-radial scroll" ><span>ĐĂNG KÍ/ĐĂNG NHẬP</span></a>
			<div id="loginBox">                
				<form id="loginForm" name="form1" method="post" action="">
					<fieldset id="body">
						<fieldset>
							<label for="usr">Tên tài khoản</label>
							<input type="text" name="usr" id="usr">
						</fieldset>
						<fieldset>
							<label for="pwd">Mật khẩu</label>
							<input type="password" name="pwd" id="pwd">
						</fieldset>
						<input type="submit" name="dangnhap" id="login" value="Đăng nhập">
						<label > <i>Bạn chưa có tài khoản</i></label>
						<a class="signup" href="<?php echo $url_host;?>Dang-ky.html">Đăng kí ngay</a>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<script src="js/menu_jquery.js"></script>
</li>