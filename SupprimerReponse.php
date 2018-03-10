<?php
session_start();
require '../inc/bdd.php';
if(isset($_SESSION["prof"]) && isset($_GET["id"])  && !empty($_GET["id"])){
	$id_reponse = intval($_GET["id"]);
	$del = $bdd->prepare("DELETE from reponses where id = ?");
	$del->execute([$id_reponse]);

}
header("Location:".$_SERVER['HTTP_REFERER']);
