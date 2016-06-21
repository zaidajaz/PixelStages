<?php
		if(!isset($_SESSION))
			session_start();
		
		if(isset($_SESSION['username'])){
			unset($_SESSION['username']);
			unset($_SESSION['profilepic']);
			unset($_SESSION['email']);
		}
		header('Location: index.php');
?>