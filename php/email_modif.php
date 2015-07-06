<?php 
session_start();
require_once('db.php');
if(isset($_SESSION['login'])){



	include ('../class/user.php');
	$user= new User();
	$profil_sql=$user->profil($_SESSION['login']);

	if(isset($_POST['submit'])){

			
		if(!empty($_POST['new_email'])){

			$user->newEmail();


		}
		else {
			echo "Entrer une address mail !!!!";
		}	
				
			
	}

		
}



else {
	header('Location:../index.php');
}
include ('../template/email_modif.html');
?>