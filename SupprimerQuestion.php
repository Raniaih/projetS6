<?php
session_start();
require '../inc/bdd.php';
if(isset($_SESSION["prof"]) && isset($_GET["id"]) && !empty($_GET["id"])){
	$id = intval($_GET["id"]);

	$deletereponse = $bdd->prepare("DELETE FROM reponses where id_question = ?");
	$deletereponse->execute([$id]);
	$deletequestion  = $bdd->prepare("DELETE FROM question where id = ?");
	$deletequestion->execute([$id]);
	
	header("Location:".$_SERVER['HTTP_REFERER']);
}
else{
	
	header("Location:".$_SERVER['HTTP_REFERER']);
}