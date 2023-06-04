<?php
$date = date("Y-m-d");
$connection = mysqli_connect("localhost", "root", "", "nit_angola");
	$sql = "SELECT * FROM db_reservation WHERE returndate < '$date'";
	$results = mysqli_query($connection, $sql);
?>
<form id="contact" method="POST" action="">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <div class="row">


									<div class="col-lg-2 col-md-2 col-xs-2">
									</div>
                                        <div class="col-lg-4 col-md-4 col-xs-4">
                                            <!-- <input type="text" name="first_name" id="first_name" required="required" class="form" placeholder="First Name" /> -->
                                            <label> المنطق المتاحة للسفر  </label>
									 <select class="form-control select2" name="id_reservation" id="id_reservation" tabindex="1">
								  <?php 
								 while( $values=mysqli_fetch_array($results)){
									 echo '<option value="'.$values['id'].'">  من '.$values['pickup'].'  الى  '.$values['destination'].'</option>';
								 } 
								  ?>
                                </select>                                      
										</div>

                                 <div class="col-lg-4 col-md-4 col-xs-4">
                                        <label>  عدد المقاعد  </label>
                                       <input type="text" class="form-control" name="number_sit"  >
									
                                    </div> 
										<div class="col-lg-2 col-md-2 col-xs-2">
										
                                        <label>   الموافقة  </label>
                                            <button type="submit" value="journey"  name="journey" class="form-control form-btn">طلب الحجز</button> 
											</div>

                                </div>
                                       <br> </div>
									
							
                        </div>
                     <!--    <div class="clear"></div> -->
                    </form>