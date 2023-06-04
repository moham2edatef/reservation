<?php
	 //include 'lib/Database.php';
	 include 'lib/User.php';
    $user = new User();    
		$usrLogin = $user->usersjourney($_GET['pay']);

?>