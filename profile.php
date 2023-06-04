

<html>
    <body style=" background-image: url(images/breadcumb.jpg)">
        
        <?php
	 include 'lib/User.php';
	 include 'inc/header.php';
	Session::checkSession();
	$user = new User();
?>
<?php
$connection = mysqli_connect("localhost", "root", "", "nit_angola");
if (Session::get("role") == 'admin') {
	$sql = "SELECT * FROM db_reservation";
	$results = mysqli_query($connection, $sql); 
} else {
	$sql = "SELECT * FROM db_reservation WHERE id =2";
	$results = mysqli_query($connection, $sql);
}  ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>الرحلات الحاليه<span class="pull-right"><a class="btn btn-primary" href="profile.php">Back</a></span></h2>		
		</div>

		<div class="panel-body">
			<div style="max-width:600px; margin: 0 auto">
				<form action="" method="POST">

				<table class="table table-primary">
						<tr>
						<th>من   </th>
							<th>الى</th>
							<th>تاريخ بدية الرجلة  </th>
							<th>تاريج المغادرة  </th>
							<th>سعر المقعد </th>
							<th>ساعة المغادرة </th>
							<th>رقم سائق الحافلة </th>
							<th>عدد مقاعد الرحلة </th>
							<th>الاعدادات  </th>
						</tr>
<!-- 
			<?php
				$email = Session::get("email");
				if (isset($email)) {
					echo $pickup;
				}
			?> -->
<?php
$email = Session::get("email");
				if (isset($email)) {

if (mysqli_num_rows($results)>0) {

while ($row=mysqli_fetch_array($results)) {
	
	echo "<tr>";
	echo "<td>".$row['pickup']."</td>";
	echo "<td>".$row['destination']."</td>";
	echo "<td>".$row['bookingdate']."</td>";
	echo "<td>".$row['returndate']."</td>";
	echo "<td>".$row['carnumber']."</td>";
	echo "<td>".$row['bookingtime']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['passengers']."</td>";
	echo "<td> <a  class='btn btn-success' href='journey.php?id=".$row['id']."'>عرض المقاعد </a></td>";
	echo "</tr>";
}
}
}
?>
					</table>



					<!-- <button type="submit" name="log
					" class="btn btn-success">Update</button> -->
				</form>
			</div>

		</div>
	</div>

<?php
	include 'inc/footer.php';
?>
        
    </body></html>