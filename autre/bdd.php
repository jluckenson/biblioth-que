<?php
	$bdd = new PDO('mysql:host=localhost;dbname=mon site', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$rep= $bdd->query("SET NAMES UTF8");
?>