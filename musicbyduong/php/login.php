<?php 
include_once('classmusic.php');
$t = new MyMusic;
if(isset($_POST['user'])&&isset($_POST['pass'])){
	$kn= mysqli_connect("localhost","root","","musicbyduong");
	$user = mysqli_real_escape_string($kn,$_POST['user']);
	$pass =sha1(md5(md5(addslashes($_POST['pass']))));
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


<div class="container-fluid ">
	<div class="row">
		<div class="col-sm-5 col-sm-push-3 dangky">
			<div class="row text-center main">		
				<div class="main-login main-center">
					<p class="text-center" style="color:#ffffff; font-size: 35px; padding: 15px;">Đăng nhập</p>
					<h5 style="color:#ffffff; padding: 15px;">Nếu bạn chưa có tài khoản, vui lòng <a href="<?php echo $url_host ?>Dang-ky.html">Đăng kí </a> . </h5>
					
					<form class="login-form" name="form1" method="post" action="">

						<div class="form-group">

							<div class="cols-sm-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									
									<input type="text" class="form-control" placeholder="Tên Đăng Nhập" name='user' value=""  />
								</div>

							</div>
							
						</div>
						<div class="form-group">

							<div class="cols-sm-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" placeholder="Mật Khẩu" name='pass' />
									
								</div>

							</div>
							
						</div>
						
						<div class="form-group ">
							
							<input class="btn btn-success btn-lg btn-block login-button" type="submit" name="dangnhap" value="Đăng nhập" id="reg" />
						</div>
						

					</form>
					
				</div><!-- /.main-login -->
			</div><!-- /.row -->
		</div>
	</div>
</div><!-- /.container-fluid -->
