<?php
session_start();

require_once('db.php');
session_destroy();

header('Location:../index.php');

?>