<html>
    <body style=" background-image: url(images/breadcumb.jpg)">

<?php
	// include 'lib/Database.php';
	 include 'lib/User.php';
	 include 'inc/header.php';
	Session::checkSession();
	$user = new User();
?>
<?php
$connection = mysqli_connect("localhost", "root", "", "nit_angola");

if (Session::get("role") == 'admin') {
// if(isset($_GET['id'])){
// 	}
$id=$_GET['id'];
	$sql = "SELECT * FROM db_journey JOIN users ON users.id = db_journey.id_user  
	 JOIN db_reservation ON db_reservation.id = db_journey.id_reservation  
	 WHERE id_reservation='$id'";
	$results = mysqli_query($connection, $sql); 


} else {

$id=Session::get("id");


$sql = "SELECT * FROM db_journey JOIN users ON users.id = db_journey.id_user  
JOIN db_reservation ON db_reservation.id = db_journey.id_reservation  
WHERE id_user='$id'";
$results = mysqli_query($connection, $sql); 
	// $sql = "SELECT * FROM db_journey WHERE id_user='$id'";
	// $results = mysqli_query($connection, $sql);
}
?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>رحلات المستخدم<span class="pull-right"><a class="btn btn-primary" href="home.php">Back</a></span></h2>		
		</div>

		<div class="panel-body">
			<div style="max-width:600px; margin: 0 auto">
				<form action="" method="POST">

					<table class="table table-primary " >
						<tr>
							<th>من   </th>
							<th>الى</th>
							<th>تاريخ بدية الرجلة  </th>
							<th>تاريج المغادرة  </th>
							<th>سعر المقعد </th>
							<th>ساعة المغادرة </th>
							<th>عدد مقاعد الرحلة</th>
							<th >الاعدادات </th>
						</tr> 
<?php
 if (Session::get("role") == 'admin') {
if (mysqli_num_rows($results)>0) {
	while ($row=mysqli_fetch_array($results)) {
	echo "<tr>";
	echo "<td>".$row['pickup']."</td>";
	echo "<td>".$row['destination']."</td>";
	echo "<td>".$row['returndate']."</td>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo "<td>".$row['pay']."</td>";
	if ($row['pay'] == 1) {
	echo "<td> <a  class='btn btn-success' id='users_".$row['id_jou']."' onclick='update_item(".$row['id_jou'].")'> ارجاع الحجز </a></td>";
	} else {
		echo "<td> <a  class='btn btn-primary' id='users_".$row['id_jou']."' onclick='update_item(".$row['id_jou'].")'>  دفع الحجز </a></td>";

	}
	
	echo "</tr>";

// }
}
}
}
else{
	if (mysqli_num_rows($results)>0) {
			 

			while ($row=mysqli_fetch_array($results)) {
				echo "<tr>";
				echo "<td>".$row['pickup']."</td>";
				echo "<td>".$row['destination']."</td>";
				echo "<td>".$row['returndate']."</td>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['phone']."</td>";
				echo "<td>".$row['pay']."</td>";
				if ($row['pay'] == 1) {
				echo "<td  id='users_".$row['id_jou']."'> <a  class='btn btn-success' onclick='update_item(".$row['id_jou'].")'>  الغاء الحجز </a></td>";
				} else {
					echo "<td> <a  class='btn btn-warning'>  تم الغاء الحجز   </a></td>";
			
				}
				
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