<?php
session_start();
require_once('php/db.php');

if(isset($_SESSION['login'])){

	header('Location:php/welcome.php');
	exit();

}

else {


	if (isset($_POST['submit'])){
		if (isset($_POST['username'])&&isset($_POST['prenom'])&&isset($_POST['nom'])&&isset($_POST['cp'])&&isset($_POST['pays'])&&isset($_POST['ville'])&&isset($_POST['departement'])&&isset($_POST['sexe'])&&isset($_POST['age'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])){

			if($_POST['username']<= 4) {
				if(($_POST['age']) != preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST['age'])){

					if(is_numeric($_POST['cp'])) {
						if($_POST['sexe'] != "Sélectionner"){
							if($_POST['password'] == $_POST['confirm_password']){


								include ('class/user.php');
								$user = new User($_POST);
								$age_sql=$user->age($_POST['age']);
								$existe_sql=$user->existe($_POST['username'],$_POST['email']);

								if($age_sql['age'] < 18) {
									echo "vous devez avoir 18 ans !";

								}
								elseif ($existe_sql['username'] == $_POST['username'] || $existe_sql['email'] == $_POST['email']){
									echo "Login ou email deja existant !";
								}




								else {
						
									$tok=rand();

									$user->setToken($tok);
									$user->inscription();							

									$message='Bonjour ' . $_POST['username'] . ' voici votre token pour activer votre compte : ' . $tok;

									$pour = $_POST['email'];
									$sujet = 'Activation de votre compte My_meetic';


									mail($pour, $sujet, $message);
									header('location:php/email.php');
									exit();
								
								}

							}
							else {
								echo "Mot de passe non identique !";
							}

						}
						else {
							echo "Vous etes ?";
						}
					}
					else {
						echo "Entrer un code postal valide";
					}
				}
				else {
					echo "Entrer un age correct !";
				}
			}
			else {
				echo "Pseudo trop court !";
			}
		}
		else {
			echo "veuillez remplir tous les champs !" ;
		}
	}

	if (isset($_POST['sub'])) {
		if(!empty($_POST['login'])  && !empty($_POST['pass'])){
			header('Location:php/traitement.php');
			exit();
		}


	}
	include ('template/index.html');
}



?>