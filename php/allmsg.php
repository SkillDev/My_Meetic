<?php 
session_start();
require_once('db.php');
if(isset($_SESSION['login'])){
	include ('../class/user.php');
	$user= new User();
	$profil_sql=$user->profil($_SESSION['login']);



	



	


	include ('../template/allmsg.html');

}

else {
	header('Location:../index.php');
}
?>