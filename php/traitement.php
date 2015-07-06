<?php
session_start();
require_once('db.php');
include ('../class/user.php');


if(isset($_POST['login'])  && isset($_POST['pass'])){

	$user= new User($_POST);
	$login_sql=$user->connection();

	if(($login_sql['username'] == $_POST['login'] || $login_sql['email'] == $_POST['login'] )AND $login_sql['password'] == sha1($_POST['pass']) AND $login_sql['activation'] == 1){
 
		$_SESSION['login']= $_POST['login'];
		$_SESSION['id']=$login_sql['id_user'];
		header('Location: welcome.php');
		exit();
	}
	elseif (($login_sql['username'] == $_POST['login'] || $login_sql['email'] == $_POST['login'] )AND $login_sql['password'] == sha1($_POST['pass']) AND $login_sql['activation'] == 0){
		echo "Votre compte n'est pas activé ;)";
	}

	else {
		echo "Login ou mot de passe incorrect !";
	}
}
include ('../template/traitement.html');
?>