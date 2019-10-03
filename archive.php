<?php 

if(isset($_POST["annee"],$_POST["mois"]))
{
	
	echo $_POST["annee"]." ".$_POST["mois"];
	$annee = htmlentities($_POST["annee"]);
	$mois = htmlentities($_POST["mois"]);
}

?>