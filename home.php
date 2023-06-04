
<html>
    <body style=" background-image: url(images/breadcumb.jpg)">

<?php
include 'inc/header.php';
include 'lib/user.php';
Session::checkSession();
$user = new User();

?>

<?php
$loginmsg = Session::get("loginmsg");
if (isset($loginmsg)) {
	echo $loginmsg;
}
Session::set("loginmsg", NULL);
?>
<?php
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	$usrReserv = $user->userReservation($_POST);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['journey'])) {
	$usrReserv = $user->userjourney($_POST);
}
?>


<div class="panel panel-default "style=" background-color: aqua;">
	<div class="panel-heading">
		<h2>المستخدم  <span class="pull-right"><strong></strong>
			<?php
				$name = Session::get("name");
				if (isset($name)) {
					echo $name;
				}
			?>

		</span></h2>
	</div>
	
<div class="text-content container" style="direction:rtl;"> 
            <div class="inner contact">
                <div class="contact-form">

<?php
$msg = Session::get("msg");
if (isset($usrReserv)) {
	echo $usrReserv;
}
Session::set("msg", NULL);
if (Session::get("role")== 'admin') {

?>

                    <form id="contact-us" method="POST" action="">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-xs-6">
                                            <!-- <input type="text" name="first_name" id="first_name" required="required" class="form" placeholder="First Name" /> -->
                                            <label>الى المنطقة </label>
                                            <input  class="form" name="pickup" list="pickup" required="required" >
												<datalist id="pickup">
													<option value="صنعاء">
													<option value="الحديدة  ">
													<option value="ريمة  ">
													<option value="المحويت   ">
													<option value="صعدة   ">
													<option value="حجة ">
													<option value="عمران ">
													<option value="مارب  ">
													<option value="عدن ">
													<option value="الضالع ">
													<option value="سيؤن ">
												</datalist> 
                                            <label>تاريخ بدية الرحلة  </label>
                                            <input type="date" name="bookingdate" id="bookingdate" required="required" class="form"/>
											<label>تاريخ المغادرة  </label>
                                            <input type="date" name="returndate" id="returndate" required="required" class="form"/>
                                            <label>تكلقة المقعد   </label>
                                            <input   class="form" type="text" id="carnumber" name="carnumber" required="required" >
												                                      
										</div>

                                        <div class="col-lg-6 col-md-6 col-xs-6">
                                        <label>من   المنطقة  </label>
                                       <input type="text" class="form" name="destination" list="destination">
												<datalist id="destination">
												<option value="صنعاء">
													<option value="الحديدة  ">
													<option value="ريمة  ">
													<option value="المحويت   ">
													<option value="صعدة   ">
													<option value="حجة ">
													<option value="عمران ">
													<option value="مارب  ">
													<option value="عدن ">
													<option value="الضالع ">
													<option value="سيؤن ">
												</datalist>
											<label>ساعة المغادرة </label>
                                            <input type="time" name="bookingtime" id="bookingtime" required="required" class="form"/>                                            
											
                                            <label>عدد المقاعد المتاحة  </label>
                                            <input type="text" name="passengers" id="passengers" required="required" class="form"/>
                                            </div>

                                        <div class="col-xs-6 ">
                                            <button type="submit"  name="register" class="text-center form-btn form-btn">اضافة</button> 

                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <!--    <div class="clear"></div> -->
                    </form>
<?php 

} else {
 
include 'journey_user.php';
}
?>
                </div>
            </div>
        </div>
                    
</div>

<?php
include 'inc/footer.php';
?>
    </body></html>