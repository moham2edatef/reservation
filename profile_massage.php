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
	$sql = "SELECT * FROM db_contact";
	$results = mysqli_query($connection, $sql); 

} 

?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>User Profile<span class="pull-right"><a class="btn btn-primary" href="home.php">Back</a></span></h2>		
		</div>

		<div class="panel-body">
			<div style="max-width:600px; margin: 0 auto">
				<form action="" method="POST">

					<table class="table table-primary">
						<tr>
						<th>الرقم    </th>
							<th>  اسم صاحب الرسالة   </th>
							<th> التواصل  </th>
							<th>نص الرسالة  </th>
						</tr>
<!-- 
			<?php
				$email = Session::get("email");
				if (isset($email)) {
					echo $pickup;
				}
			?> -->
<?php

if (mysqli_num_rows($results)>0) {

while ($row=mysqli_fetch_array($results)) {
	
	echo "<tr>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['subject']."</td>";
	echo "<td>".$row['message']."</td>";
	echo "</tr>";
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