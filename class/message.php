<?php
class Message extends Db{

	private $_sender;
	private $_receiver;
	private $_message;
	private $_date;
	private $_open;

	public function getSender(){
		return $this->_sender;
	}
	public function setSender($sender){
		$this->_sender=$sender;
	}
	public function getReceiver(){
		return $this->_receiver;
	}
	public function setReceiver($receiver){
		$this->_receiver=$receiver;
	}
	public function getMessage(){
		return $this->_message;
	}
	public function setMessage($message){
		$this->_message->$message;
	}
	public function getDate(){
		return $this->_date;
	}
	public function setDate($date){
		$this->_date=$date;
	}
	public function getOpen(){
		return $this->_open;
	}
	public function setOpen($open){
		$this->_open=$open;
	}

	public function envoie($msg){
		$connect= new Db();
		$base=$connect->getDb();
		$message = "INSERT INTO messages (id_sender,id_receiver,date,time,message) VALUES(:id_sender,:id_receiver,NOW(),NOW(),:message)";
		$message_requete=$base->prepare($message);
		$message_requete->execute(array(
			':id_sender' => $_SESSION['id'],
			'id_receiver' => $_GET['id'],
			':message' => $msg
			));
	}

	public function affiche(){
		$connect= new Db();
		$base=$connect->getDb();
		$affiche="SELECT * FROM messages WHERE (id_sender = :sender AND id_receiver = :receiver) || (id_sender = :receiver AND id_receiver = :sender) ";
		$affiche_requete =$base->prepare($affiche);
		$affiche_requete->execute(array(
			':sender' => $_SESSION['id'],
			':receiver' => $_GET['id']
			));
		$affiche_sql=$affiche_requete->fetchAll();
		return $affiche_sql;
	}
	public function info(){
		$connect= new Db();
		$base=$connect->getDb();
		$info="SELECT * from fiche_personne INNER JOIN messages on fiche_personne.id_user = messages.id_sender WHERE (id_sender = :sender AND id_receiver = :receiver) || (id_sender = :receiver AND id_receiver = :sender)";
		$info_requete=$base->prepare($info);
		$info_requete->execute(array(
			':sender' => $_SESSION['id'],
			':receiver' => $_GET['id']
			));
		$info_sql=$info_requete->fetchAll();
		return $info_sql;
	}
	public function send(){
		$connect= new Db();
		$base=$connect->getDb();
		$envoyer="SELECT * from messages INNER JOIN fiche_personne on messages.id_receiver = fiche_personne.id_user  WHERE messages.id_sender = :send GROUP BY fiche_personne.username ORDER BY messages.time desc";
		$envoyer_requete=$base->prepare($envoyer);
		$envoyer_requete->execute(array(
			':send' => $_SESSION['id']
			));
		$envoyer_sql=$envoyer_requete->fetchAll();
		return $envoyer_sql;
	}
	public function recu(){
		$connect= new Db();
		$base=$connect->getDb();
		$recu="SELECT * FROM messages INNER JOIN fiche_personne ON messages.id_sender = fiche_personne.id_user  WHERE messages.id_receiver = :send GROUP BY fiche_personne.username ORDER BY messages.time desc";
		$recu_requete=$base->prepare($recu);
		$recu_requete->execute(array(
			':send' => $_SESSION['id']
			));
		$recu_sql=$recu_requete->fetchAll();
		return $recu_sql;
	}














}
?>