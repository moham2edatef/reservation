
<?php
  //  include 'inc/header.php';
    include 'lib/user.php';


    $user = new User();

?>

<?php
    $loginmsg = Session::get("loginmsg");
    if (isset($loginmsg)) {
        echo $loginmsg;
    }
    Session::set("loginmsg", NULL);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Booking.com</title>
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- <link rel="icon" href="favicon-1.ico" type="image/x-icon"> -->
    </head>

    <body style=" background-color:teal;">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
               
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"> نظام حجز سفريات</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="navactive color_animation" href="#top">الصفحة الرئيسية</a></li>
                            <li><a class="color_animation" href="#story">من نحن</a></li>
                            <li><a class="color_animation" href="login.php"  >طلب حجز</a></li>
                            
                            <li><a class="color_animation" href="#contact">التواصل معنا</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
         
        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="top-title"> نظام حجز  </h2>
                    <h2 class="white second-title">" سفريات "</h2>
                    <hr>
                </div>
            </div>
        </div>

        <!--About Us-->

        <section id="story" class="description_content">
            <div class="text-content container">
                <div class="col-md-6">
                    <h1>من نحن</h1>
                    <div class="fa fa-cutlery fa-2x"></div>
                    <p class="desc-text">هي الشركة الاولى على المستوى المحلي التي تقدم خدمات النقل البري وتوفر جميع متطلبات الراحة وهي متميزة في نظامها التكنلوجي والفني
					<br/>	
						
            كما نقدم خدمات الحجز الالكتروني من موقعك وبسهولة للمزيد من المعلومات يرجى زياره موقعنا

                    .</p>
                    
                </div>
            
                <div class="col-md-6">
                    <ul class="image_box_story2">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!--  slide -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="images/slide11.jpg"  alt="...">
                                    <div class="carousel-caption">
                                        
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/slide22.jpg" alt="...">
                                    <div class="carousel-caption">
                                        
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/slide33.JPG" alt="...">
                                    <div class="carousel-caption">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

                </div>
            </div>
            <br>
            <br>
            <br>
        </section>

       
       
        <section class="social_connect">
            <div class="text-content container"> 
                <div class="col-md-6">
                    <span class="social_heading"> تابعني على</span>
                    <ul class="social_icons">
                        <li><a class="icon-twitter color_animation" href="#" target="_blank"></a></li>
                        <li><a class="icon-github color_animation" href="#" target="_blank"></a></li>
                        <li><a class="icon-linkedin color_animation" href="#" target="_blank"></a></li>
                        <li><a class="icon-mail color_animation" href="#"></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <span class="social_heading">او اتصل بي</span>
                    <span class="social_info"><a class="color_animation" href="tel:777777777">(967) 7777777777</a></span>
                </div>
            </div>
        </section>
 
        </section>
        
        <!--  Contact -->


<?php
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $usrContact = $user->userContact($_POST);
    }
?>

        <section id="contact" class="description_content">
            <br><h1>التواصل معنا</h1> <br><br>
           <!--  <div class="map">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.664063989472!2d91.8316103150038!3d24.909437984030877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37505558dd0be6a1%3A0x65c7e47c94b6dc45!2sTechnext!5e0!3m2!1sen!2sbd!4v1444461079802" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner contact">
                            <div class="contact-form">
                                <form id="contact-us" method="post">
                                    <div class="col-md-6 ">                            
                                        <input type="text" name="name" id="name" required="required" class="form" placeholder="الاسم" />
                                     
                                        <input type="email" name="email" id="email" required="required" class="form" placeholder="الايميل" />
           
                                        <input type="text" name="subject" id="subject" required="required" class="form" placeholder="الموضوع" />
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="message" id="message" class="form textarea"  placeholder="الرسالة"></textarea>
                                    </div>
                                    <div class="relative fullwidth col-xs-12">
                                     
                                        <button type="submit" id="submit" name="submit" class="form-btn">ارسال </button> 
                                    </div>
                      
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->

        <footer class="sub_footer">
            <div class="container">
                <div class="col-md-4"><p class="sub-footer-text text-center">All Right Reserved <a href="#top">AGB</a></p>
                </div>
            </div>
        </footer>


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>

    </body>
</html>