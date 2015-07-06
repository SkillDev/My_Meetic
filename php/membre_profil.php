<?php 
session_start();
require_once('db.php');
if(isset($_SESSION['login'])){

	include ('../class/user.php');
	$user= new User();
	$profil_sql=$user->profil($_SESSION['login']);
	if(isset($_GET['id'])){
		$membres_profil_requete_sql=$user->membre_profil($_GET['id']);
	}
	else {
		header('Location:welcome.php');
	}


	


include ('../template/membre_profil.html');

}
else {
	header('Location:../index.php');
}
?>