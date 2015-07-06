<?php

class User extends Db {

	private $_username;
	private $_prenom;
	private $_nom;
	private $_email;
	private $_password;
	private $_sexe;
	private $_age;
	private $_token;
	private $_pays;
	private $_departement;
	private $_ville;
	private $_cp;


	public function getUsername(){
		return $this->_username;
	}
	public function setUsername($username){
		$this->_username=$username;
	}
	public function getPrenom(){
		return $this->_prenom;
	}
	public function setPrenom($prenom){
		$this->_prenom=$prenom;
	}
	public function getNom(){
		return $this->_nom;
	}
	public function setNom($nom){
		$this->_nom=$nom;
	}
	public function getEmail(){
		return $this->_email;
	}
	public function setEmail($email){
		$this->_email=$email;
	}
	public function getPassword(){
		return $this->_password;
	}
	public function setPassword($password){
		$this->_password=$password;
	}
	public function getSexe(){
		return $this->_sexe;
	}
	public function setSexe($sexe){
		$this->_sexe=$sexe;
	}
	public function getAge(){
		return $this->_age;
	}
	public function setAge($age){
		$this->_age=$age;
	}
	public function getToken(){
		return $this->_token;
	}
	public function setToken($token){
		$this->_token=$token;
	}
	public function getPays(){
		return $this->_pays;
	}
	public function setPays($pays){
		$this->_pays=$pays;
	}
	public function getDepartement(){
		return $this->_departement;
	}
	public function setDepartement($departement){
		$this->_departement=$departement;
	}
	public function getVille(){
		return $this->_ville;
	}
	public function setVille($ville){
		$this->_ville=$ville;
	}
	public function getCp(){
		return $this->_cp;
	}
	public function setCp($cp){
		$this->_cp=$cp;
	}



	public function __construct($donnee = null){
		if(isset($donnee['username'])&&isset($donnee['prenom'])&&isset($donnee['nom'])&&isset($donnee['email'])&&isset($donnee['pays'])&&isset($donnee['ville'])&&isset($donnee['departement'])&&isset($donnee['cp'])&&isset($donnee['sexe'])&&isset($donnee['age'])&&isset($donnee['password'])){

			$this->setUsername(addslashes(htmlspecialchars(trim ($donnee['username']))));
			$this->setPrenom(addslashes(htmlspecialchars(trim ($donnee['prenom']))));
			$this->setNom(addslashes(htmlspecialchars(trim ($donnee['nom']))));
			$this->setEmail(addslashes(htmlspecialchars(trim ($donnee['email']))));
			$this->setSexe(addslashes(htmlspecialchars(trim ($donnee['sexe']))));
			$this->setAge(addslashes(htmlspecialchars(trim ($donnee['age']))));
			$this->setPassword(sha1(addslashes(htmlspecialchars(trim ($donnee['password'])))));
			$this->setPays(addslashes(htmlspecialchars(trim ($donnee['pays']))));
			$this->setDepartement(addslashes(htmlspecialchars(trim ($donnee['departement']))));
			$this->setVille(addslashes(htmlspecialchars(trim ($donnee['ville']))));
			$this->setCp(addslashes(htmlspecialchars(trim ($donnee['cp']))));
		}
		elseif (isset($donnee['login'])&&isset($donnee['pass'])) {
			$this->setUsername(addslashes(htmlspecialchars(trim ($donnee['login']))));
			$this->setPassword(sha1(addslashes(htmlspecialchars(trim ($donnee['pass'])))));
		}
		elseif (isset($donnee['login'])&&isset($donnee['token'])) {
			$this->setUsername(addslashes(htmlspecialchars(trim ($donnee['login']))));
			$this->setToken(addslashes(htmlspecialchars(trim ($donnee['token']))));
		}
		elseif (isset($donnee['username'])&&isset($donnee['email'])) {
			$this->setUsername(addslashes(htmlspecialchars(trim ($donnee['username']))));
			$this->setEmail(addslashes(htmlspecialchars(trim ($donnee['email']))));
		}
		else {

		}
	}

	public function inscription(){
		$connect= new Db();
		$base=$connect->getDb();
		$req="INSERT INTO fiche_personne(username, prenom , nom , email,password ,sexe ,age,token,pays,departement,ville,cp) VALUES (:username,:prenom,:nom,:email,:password,:sexe,:age,:token,:pays,:departement,:ville,:cp)";
		$register_requete = $base->prepare($req);
		$register_requete->execute(array(
			':username' => $this->_username,
			':prenom' =>$this->_prenom,
			':nom' => $this->_nom,
			':email' => $this->_email,
			':password' => $this->_password,
			':sexe' => $this->_sexe,
			':age' => $this->_age,
			':token' => $this->_token,
			':pays' => $this->_pays,
			':departement' => $this->_departement,
			':ville' => $this->_ville,
			':cp' => $this->_cp
			));
	}

	public function connection(){
		$connect= new Db();
		$base=$connect->getDb();
		$requete ="SELECT * FROM fiche_personne WHERE (username = :username OR email = :username) AND password = :password";
		$login_requete = $base->prepare($requete);
		$login_requete->execute(array(
			':username'=> $this->_username,
			':password'=>$this->_password

			));
		$login_sql=$login_requete->fetch();
		return $login_sql;
	}

	public function token() {
		$connect= new Db();
		$base=$connect->getDb();
		$requete ="SELECT * FROM fiche_personne WHERE  (username = :username OR email = :username) AND token =  :token";
		$token_requete = $base->prepare($requete);
		$token_requete->execute(array(
			':username'=> $this->_username,
			':token'=> $this->_token
			));
		$token_sql=$token_requete->fetch();
		return $token_sql;		
	}

	public function activation() {
		$connect= new Db();
		$base=$connect->getDb();
		$requete ="UPDATE fiche_personne SET activation = 1 WHERE (username = :username OR email = :username)";
		$token_requete =$base->prepare($requete);
		$token_requete->execute(array(
			':username'=>$this->_username
			));
	}

	public function age($age=null){
		$connect= new Db();
		$base=$connect->getDb();
		$requete ="SELECT TIMESTAMPDIFF(YEAR, :age, CURRENT_DATE()) AS age";
		$age_requete = $base->prepare($requete);
		$age_requete->execute(array(
			':age' => $age
			));
		$age_sql=$age_requete->fetch();
		return $age_sql;
	}

	public function existe($login,$email){
		$connect= new Db();
		$base=$connect->getDb();
		$existe="SELECT username,email FROM fiche_personne WHERE username = :username OR email = :email";
		$existe_requete=$base->prepare($existe);
		$existe_requete->execute(array(
			':username' => $login,
			':email' => $email
			));
		$existe_sql=$existe_requete->fetchAll();
		return $existe_sql;
	}

	public function profil($login) {
		$connect= new Db();
		$base=$connect->getDb();
		$profil = "SELECT * FROM fiche_personne WHERE username = :username OR email = :username";
		$profil_requete = $base->prepare($profil);
		$profil_requete->execute(array(
			':username'=> $login
			));
		$profil_sql=$profil_requete->fetchAll();
		return $profil_sql;
	}

	public function membres($login = null){
		$connect= new Db();
		$base=$connect->getDb();
		$membres = "SELECT * FROM fiche_personne WHERE activation = 1";
		if(isset($_GET['search']) && $_GET['genre'] == 0 && $_GET['age'] == 0){
			$membres = "SELECT * FROM fiche_personne WHERE  activation = 1 AND username like '%" . $_GET['search'] . "%' OR ville like '%" . $_GET['search'] . "%' OR prenom like '%" . $_GET['search'] . "%' OR nom like '%" . $_GET['search'] . "%'";
		}
		elseif(isset($_GET['genre']) && $_GET['genre'] != 0 && $_GET['genre'] == 1){
			$membres= $membres . " AND sexe = 3 OR sexe = 5 ";
		}
		elseif(isset($_GET['genre']) && $_GET['genre'] != 0 && $_GET['genre'] == 2){
			$membres= $membres . " AND sexe = 2 OR sexe = 4 ";
		}
		elseif(isset($_GET['genre']) && $_GET['genre'] != 0 && $_GET['genre'] == 3){
			$membres= $membres . " AND sexe = 4 OR sexe = 5 ";
		}
		elseif(isset($_GET['age']) && $_GET['age'] != 0 && $_GET['age'] == 1){
			$membres = $membres . " AND age BETWEEN '1990-01-01' AND '1997-01-01'";
		}
		elseif(isset($_GET['age']) && $_GET['age'] != 0 && $_GET['age'] == 2){
			$membres = $membres . " AND age BETWEEN '1980-01-01' AND '1990-01-01'";
		}
		elseif(isset($_GET['age']) && $_GET['age'] != 0 && $_GET['age'] == 3){
			$membres = $membres . " AND age BETWEEN '1970-01-01' AND '1980-01-01'";
		}
		elseif(isset($_GET['age']) && $_GET['age'] != 0 && $_GET['age'] == 4){
			$membres = $membres . " AND age BETWEEN '1915-01-01' AND '1970-01-01'";
		}

		else {
			$membres="SELECT * FROM fiche_personne WHERE username != :username AND email != :username AND activation = 1 ORDER BY RAND()";
		}
		$membres_requete= $base->prepare($membres);
		$membres_requete->execute(array(
			':username' => $login
			));
		$membres_sql=$membres_requete->fetchAll();
		return $membres_sql;
	}
	public function byebye(){
		$connect= new Db();
		$base=$connect->getDb();
		$byebye = "UPDATE fiche_personne set activation = 0 WHERE username = :username";
		$byebye_requete=$base->prepare($byebye);
		$byebye_requete->execute(array(
			':username' => $_SESSION['login']
			));
	}
	public function mdp(){
		$connect= new Db();
		$base=$connect->getDb();
		$mdp = "UPDATE fiche_personne set password = :password WHERE username = :username";
		$mdp_requete=$base->prepare($mdp);
		$mdp_requete->execute(array(
			':username' => $_SESSION['login'],
			':password' => sha1(addslashes(htmlspecialchars(trim ($_POST['new_pass']))))
		));
	}
	public function search($search){
		$connect= new Db();
		$base=$connect->getDb();
		$recherche="SELECT * FROM fiche_personne WHERE username like '%:search%'";
		$recherche_requete= $base->prepare($recherche);
		$recherche_requete->execute(array(
			':search' => $search
			));
		$recherche_sql=$recherche_requete->fetchAll();
		return $recherche_sql;
	}

	public function membre_profil($get){
		$connect= new Db();
		$base=$connect->getDb();
		$membres_profil= "SELECT * FROM fiche_personne WHERE id_user= :get";
		$membres_profil_requete = $base->prepare($membres_profil);
		$membres_profil_requete->execute(array(
			':get'=> $get
			));
		$membres_profil_requete_sql=$membres_profil_requete->fetchAll();
		return $membres_profil_requete_sql;
	}
	public function newEmail(){
		$connect= new Db();
		$base=$connect->getDb();
		$email = "UPDATE fiche_personne set email = :email WHERE username = :username";
		$email_requete=$base->prepare($email);
		$email_requete->execute(array(
			':username' => $_SESSION['login'],
			':email' => addslashes(htmlspecialchars(trim ($_POST['new_email'])))
		));
	}


}
?>