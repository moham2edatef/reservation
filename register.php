
<html>
    <body style=" background-image: url(images/breadcumb.jpg)">


<?php
	include 'inc/header.php';
	include 'lib/User.php';
	Session::checkLogin();
?>
<?php
	$user = new User();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
		$usrLogin = $user->userRegistration($_POST);
	}
?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>واجة تسجيل الدخول</h2>
		</div>
		<div class="panel-body">
			<div style="max-width:600px; margin: 0 auto">

<?php
	if (isset($usrLogin)) {
		echo $usrLogin;
	}
?>
<form action="" method="POST">
					<div class="form-group" style="direction:rtl;">
						<label for="name"> اسم </label>
						<input type="text" id="name" name="name" class="form-control" >
					</div>
					<div class="form-group">
						<label for="email"> الايميل  </label>
						<input type="text" id="email" name="email" class="form-control" >
					</div>
					<div class="form-group">
						<label for="phone">  التلفون </label>
						<input type="text" id="phone" name="phone" class="form-control" >
					</div>
					<div class="form-group">
						<label for="pass">كلمة المرور </label>
						<input type="password" id="pass" name="pass" class="form-control" >
					</div>
					<div class="form-group">
						<label for="pass">تاكيد كلمة  المرور </label>
						<input type="password" id="password_con" name="password_con" class="form-control" >
					</div>
					<button type="submit" name="register"
					 class="btn btn-success"> انشاء حساب جديد </button>
				</form>
			</div>

		</div>
	</div>

<?php
	include 'inc/footer.php';
?>
        
    </body></html>