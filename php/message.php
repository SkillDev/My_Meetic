<?php 
session_start();
require_once('db.php');
if(isset($_SESSION['login'])){

	include ('../class/user.php');
	$user= new User();
	$profil_sql=$user->profil($_SESSION['login']);

	if(isset($_GET['id'])){
		$membres_profil_requete_sql=$user->membre_profil($_GET['id']);

			include ('../class/message.php');
			$msg= new Message();
			$affiche_sql=$msg->affiche();
		if(isset($_POST['send']) && $_POST['message'] != ""){
			$msg->envoie(addslashes(htmlspecialchars(trim($_POST['message']))));
		}
			$info_sql=$msg->info();
	}

	else {
		header('Location:allmsg.php');
	}



	


	include ('../template/message.html');

}
else {
	header('Location:../index.php');
}
?>