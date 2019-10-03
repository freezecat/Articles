<?php

$info="";





if(isset($_POST["mail"],$_POST["password"])){
	if(!empty($_POST["mail"]) && !empty($_POST["password"])){
		
		$mail = htmlentities($_POST["mail"]);
	    $password = htmlentities($_POST["password"]);
		
		$sql = "SELECT * FROM register WHERE mail=:mail and passe=:password";
		$req = $pdo->prepare($sql);
		$req->execute(array(
		":mail"=>$mail,
		":password" =>sha1($password)
		));
		$get = $req->fetch();

		
		//echo $mail." ".sha1($password)."<br/>";
		//echo $get["mail"]." ".$get["passe"]."";
		
		
		if($mail == $get["mail"]){
			
			if(sha1($password) == $get["passe"]){ 
			   $_SESSION["pseudo"] = $get["nom"];
			   $_SESSION["statut"] = $get["statut"];
			   header("Location:index.php");
			  
			}else{
				$info = " mauvais mot de passe";
			}
		}
		else
		{
			$info = " adresse mail inconnu";
		}
		
		
	}
}
?>