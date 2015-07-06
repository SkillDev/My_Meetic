<?php
require_once('db.php');


if(isset($_POST['submit'])){
	if(!empty ($_POST['token'])) {

	
		include ('../class/user.php');
		$user= new User($_POST);
		$token_sql=$user->token();

		
		if(($token_sql['username'] ==  htmlspecialchars(trim($_POST['login'])) || $token_sql['email'] == htmlspecialchars(trim($_POST['login'])) ) AND $token_sql['token'] == htmlspecialchars(trim($_POST['token']))){
			$user->activation();
			header('Location:../index.php');
		}


		else {
		echo "Token ou login invalide !";
		}

	}
	else {
			echo "Veuiller remplir tous les champs !";
	}

}




include ('../template/email.html');


?>