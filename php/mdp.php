<?php 
session_start();
require_once('db.php');
if(isset($_SESSION['login'])){



	include ('../class/user.php');
	$user= new User();
	$profil_sql=$user->profil($_SESSION['login']);

	if(isset($_POST['submit'])){

			
		if($_POST['new_pass'] == $_POST['confirm_pass']){

			$user->mdp();


		}	
				
			
	}

		
}



else {
	header('Location:../index.php');
}
include ('../template/mdp.html');
?>