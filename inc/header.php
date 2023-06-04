<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/Session.php';
	Session::init();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reservation</title>
	     <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">
</head>

<?php
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		Session::destroy();
	}
?>

<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">نظام حجز سفريات</a>
				</div>
				<ul class="nav navbar-nav main-nav  clear navbar-right ">

				<?php
					$id = Session::get("id");
					$userlogin = Session::get("login");
					if ($userlogin == true) {
						if (Session::get("role")== 'admin') {	?>
				 
				
				<li><a class="color_animation" href="profile_massage.php">  الرسائل و الاستعلامات   </a></li>
				<li><a class="color_animation" href="profile.php"> الرحلات </a></li>
						<?php } else{ ?>
							<li><a class="color_animation" href="journey.php"> رحلاتي  </a></li>
						<?php  } ?>
					<li><a class="color_animation" href="?action=logout">تسجيل الخروج</a></li>	
					<li><a class="color_animation" href="#"><?php echo Session::get("name"); ?> </a></li>
					
					
				<?php
					}else{
				?>

					<li><a class="color_animation" href="login.php">تسجيل الدخول</a></li>
					<li><a class="color_animation" href="register.php">التسجيل في الموقع</a></li>
				
				<?php
					}
				?>

				</ul>
			</div>
		</nav>