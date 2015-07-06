<?php 
session_start();
require_once('db.php');
if(isset($_SESSION['login'])){



	include ('../class/user.php');
	$user= new User();
	$profil_sql=$user->profil($_SESSION['login']);

	if(isset($_POST['submit'])){
		$user->byebye();
		session_destroy();
		header('Location:../index.php');
	}


}
else {
	header('Location:../index.php');
}
include ('../template/byebye.html');
?>