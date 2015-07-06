<?php 
session_start();
require_once('db.php');
if(isset($_SESSION['login'])){
	include ('../class/user.php');
	$user= new User();
	$profil_sql=$user->profil($_SESSION['login']);
	
	include ('../class/message.php');
	$msg= new Message();
	$envoyer_sql=$msg->send();
	
	



	


	include ('../template/send.html');

}

else {
	header('Location:../index.php');
}
?>