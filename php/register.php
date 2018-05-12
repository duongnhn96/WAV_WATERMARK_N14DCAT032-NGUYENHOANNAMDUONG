<?php
include_once("classmusic.php");
$sp= new MyMusic;


$username=$_POST['username2'];

$password=sha1(md5(md5($_POST['password'])));
$confirm=$_POST['confirm'];

if (isset($_POST['dangky'])) {
	$resultreg=$sp->insertuser($username,$password);
	echo $resultreg;
	if($resultreg){
		?>		<script>
			alert('Đăng ký thành công!');
			location.href='index.php?act=dn';
		</script>
		<?php	
	} else { 
		?>  	<script>
			alert('Đăng ký không thành công!');
			location.href='index.php?act=dn';
		</script>
		<?php
	} 
}
?>

<div class="container-fluid ">
	
	
	<div class="row">
		<div class="col-sm-5 col-sm-push-3 dangky">
			<p class="text-center" style="color:#ffffff; font-size: 35px; padding: 15px;">Đăng kí thành viên</p>
			<form class="form-horizontal" method="post" name="dangki" id="dangki" action="">


				<div class="form-group">

					<div class="cols-sm-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="username2" id="username2"  maxlength="15" placeholder="Nhập tên tài khoản" required  onblur="checkUser(this.value)" value="<?php echo $_POST['username2'];    ?>"/>
						</div>

					</div>
					<div class="alert-danger text-center" id="user_error"></div>
				</div>

				<div class="form-group">

					<div class="cols-sm-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password" id="password2"  placeholder="Nhập mật khẩu" required/>
						</div>
						<div class="alert-danger text-center" id="pass_error"></div>
					</div>
				</div>

				<div class="form-group">

					<div class="cols-sm-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Xác nhận mật khẩu" required/>
						</div>
						<div class="alert-danger text-center" id="pass_error2"></div>
					</div>
				</div>

				<div class="form-group ">
					<input class="btn btn-success btn-lg btn-block login-button" type="submit" name="dangky" value="Đăng kí" id="reg2" />
				</div>
			</form>
		</div>
	</div><!-- /.row -->
</div>

<script type="text/javascript">
	
	function checkUser(username){
		$.post('php/checkuser.php', {'username': username}, function(data) {
				if(data=="true"){
				
				$("#user_error").text("Tên tài khoản đã tồn tại");
				$('#reg2').attr({
					"disabled": ''
				});
				

			}
			else{ $("#user_error").text("");
			$('#reg2').attr('disabled');
		}
	});
	}
	$('#username2').on('keyup change', function () {
		$("#username2").val($(this).val().split(' ').join(''));
	});
	$('#password2, #confirm').on('keyup', function () {
		if ($('#password2').val().length > 5) {
			$('#reg2').removeAttr('disabled');
			$('#pass_error').html('');
		} else {
			$('#pass_error').html('Mật khẩu quá yếu!');
			$('#reg2').attr({
				"disabled": ''
			});
		}
		if ($('#password2').val() == $('#confirm').val()) {
			$('#reg2').removeAttr('disabled');
			$('#pass_error2').html('');
		} else {
			$('#pass_error2').html('Không khớp!');
			$('#reg2').attr({
				"disabled": ''
			});
		}
	});
	
</script>
