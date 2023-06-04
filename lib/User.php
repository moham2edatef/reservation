<?php
	include_once 'Session.php';
	include 'Database.php';

class User
{   private $db;
	public function __construct()
	{
		$this->db = new Database();
	}
	public function userRegistration($data)
	{
		$name     = $data['name'];
		$email    = $data['email'];
		$phone = $data['phone'];
		$chk_email = $this->emailCheck($email);
		$pass = $data['pass'];
		if (strlen($pass)<6) {
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Password must be more than 6 digit</div>";
			return $msg;
		}
		$pass= md5($data['pass']);
		if ($name == "" OR $phone == "" OR $email  == "" OR $pass == "") {
			$msg= "<div class='alert alert-danger'>
			<strong>Error  !</strong> Field must not be Empty </div>";
			return $msg;
		}
		if (strlen($phone)<8) {
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>phone is too Short</div>";
			return $msg;
		}
		if (filter_var($email, FILTER_VALIDATE_EMAIL)=== false) {
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Email address is not valid</div>";
			return $msg;
		}
		if ($chk_email== true) {
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Email address already exist</div>";
			return $msg;
		}
		$sql = "INSERT INTO users(name,phone, email, pass) VALUES(:name, :phone, :email, :pass)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name', $name);
		$query->bindValue(':phone', $phone);
		$query->bindValue(':email', $email);
		$query->bindValue(':pass', $pass);
		$result = $query->execute();


		$result = $this->getLoginUser($email, $pass);
		if ($result) {
			Session::init();
			Session::set("login", true);
			Session::set("id", $result->id);
			Session::set("name", $result->name);
			Session::set("role", $result->role);
			Session::set("loginmsg", "<div class='alert alert-success'>
			<strong>Success !</strong>You are logged in</div>");
			header("Location: home.php");
		}else{
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Data not found</div>";
			return $msg;
		}
		if ($result) {
			$msg= "<div class='alert alert-success'>
			<strong>Success !</strong>تم اضافة المستخدم بنجاح</div>";
			return $msg;
		}
		else{
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Sorry, there have been problem in inserting data</div>";
			return $msg;
		}

	}
	public function emailCheck($email)
	{
		$sql= "SELECT email FROM users WHERE email = :email";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email', $email);
		$query->execute();
		if ($query->rowCount()>0) {
			return true;
		}else{
			return false;
		}
	}
	public function getLoginUser($email, $password)
	{
		$sql= "SELECT * FROM users WHERE email = :email AND pass = :password LIMIT 1 " ;
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email', $email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}
	public function userLogin($data)
	{	
		$email= $data['email'];
		$password = md5($data['password']);

		$chk_email = $this->emailCheck($email);

		if ($email  == "" OR $password == ""){
			$msg= "<div class='alert alert-danger'>
			<strong>Error  !</strong> الايميل وكلمة السر فارغة   </div>";
			return $msg;
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL)=== false) {
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>اسم المستخدم  خطأ</div>";
			return $msg;
		}

		if ($chk_email== false) {
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Email address not </div>";
			return $msg;
		}

		$result = $this->getLoginUser($email, $password);
		if ($result) {
			Session::init();
			Session::set("login", true);
			Session::set("id", $result->id);
			Session::set("name", $result->name);
			Session::set("role", $result->role);
			Session::set("loginmsg", "<div class='alert alert-success'>
			<strong>Success !</strong>You are logged in</div>");

			header("Location: home.php");
		}else{
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Data not found</div>";
			return $msg;
		}

	}
	public function userReservation($data)
	{

		$pickup    				= $data['pickup'];
		$bookingdate      		= $data['bookingdate'];
		$returndate     		= $data['returndate'];
		$carnumber     			= $data['carnumber'];
		$destination     		= $data['destination'];
		$bookingtime     		= $data['bookingtime'];
		$email     				= $data['email'];
		$passengers    			= $data['passengers'];


		$clash = $this -> clashCheck($carnumber, $bookingdate, $bookingtime);

		if ($clash == true) {
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Reservation already exist</div>";
			return $msg;
		}



		$sql = "INSERT INTO db_reservation (pickup, bookingdate, returndate, carnumber, destination, bookingtime, email, passengers) 
				VALUES(:pickup, :bookingdate, :returndate, :carnumber, :destination, :bookingtime, :email, :passengers)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':pickup', $pickup);
		$query->bindValue(':bookingdate', $bookingdate);
		$query->bindValue(':returndate', $returndate);
		$query->bindValue(':carnumber', $carnumber);
		$query->bindValue(':destination', $destination);
		$query->bindValue(':bookingtime', $bookingtime);
		$query->bindValue(':email', $email);
		$query->bindValue(':passengers', $passengers);
		$result = $query->execute();
		
		

		if ($result) {
			$msg= "<div class='alert alert-success'>
			<strong>Success !</strong>تم ادخال بينات بشكل صحيح</div>";
			return $msg;
		}
		
		else{
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>هنالك خطأ ما تاكد من ادخال البينات بشكل صحيح  </div>";
			return $msg;
		}
	}

	public function clashCheck($carnumber, $bookingdate)
	{
		$sql= "SELECT * FROM users WHERE (carnumber = :carnumber) AND (bookingdate = :bookingdate)" ;
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':carnumber', $carnumber);
		$query->bindValue(':bookingdate', $bookingdate);
		// $query->bindValue(':bookingtime', $bookingtime);
		 // $query->execute();
		 $result=  $query->fetch(PDO::FETCH_OBJ);
		if ($query->rowCount()>0) {
			return true;
		}else{
			return false;
		}
	}
	public function userContact($data)
	{
		$name     		= $data['name'];
		$email     		= $data['email'];
		$subject     	= $data['subject'];
		$message     	= $data['message'];

		$sql = "INSERT INTO db_contact (name, email, subject, message) VALUES(:name, :email, :subject, :message)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name', $name);
		$query->bindValue(':email', $email);
		$query->bindValue(':subject', $subject);
		$query->bindValue(':message', $message);
		$result = $query->execute();
		if ($result) {
			$msg= "<div class='alert alert-success'>
			<strong>Success !</strong>Thank you. You have been successfully </div>";
			return $msg;
		}
		else{
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>Sorry, there have been problem in inserting data</div>";
			return $msg;
		}
	}
	
	public function userjourney($data)
	{
		$id_reservation= $data['id_reservation'];
	  $sql = "INSERT INTO db_journey (id_reservation, id_user) 
				VALUES(:id_reservation, :id_user)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id_reservation', $id_reservation);
		$query->bindValue(':id_user', Session::get("id"));
		$result = $query->execute();
		
		if ($result) {
			$msg= "<div class='alert alert-success'>
			<strong>Success !</strong>تم ادخال بينات بشكل صحيح</div>";
			return $msg;
		}
		
		else{
			$msg= "<div class='alert alert-danger'>
			<strong>Error !</strong>هنالك خطأ ما تاكد من ادخال البينات بشكل صحيح  </div>";
			return $msg;
		}
	} 
	public function journeyCheck($id)
	{
		$sql= "SELECT pay FROM db_journey WHERE id_jou = :id  ";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
	}
	public function usersjourney($id){
		if ($this->journeyCheck($id)->pay == true ) {
			$sql = "UPDATE `db_journey` SET `pay` = '0' WHERE `db_journey`.`id_jou` = $id";
			$query = $this->db->pdo->prepare($sql);
			$result = $query->execute();
			echo' تم الالغاء';
		} else {
			$sql = "UPDATE `db_journey` SET `pay` = '1' WHERE `db_journey`.`id_jou` = $id";
			$query = $this->db->pdo->prepare($sql);
			$result = $query->execute();
			echo ' تم استلام النقود';
		}
	} 
}
?>