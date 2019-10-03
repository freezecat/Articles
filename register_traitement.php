<?php 
$inf1="white";
$inf2="white";
$inf3="white";
$inf4="white";
$inf5="white";



if(isset($_POST["nom"],$_POST["prenom"],$_POST["mail"],$_POST["password"],$_POST["repassword"])){
	if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["repassword"]))
	{
	$nom=htmlentities($_POST["nom"]); 
	$prenom = htmlentities($_POST["prenom"]);
	$mail = htmlentities($_POST["mail"]);
	
	$password = htmlentities(sha1($_POST["password"]));
	$repassword = htmlentities($_POST["repassword"]);
	$birthdate = htmlentities($_POST["annee"])."/".htmlentities($_POST["mois"])."/".htmlentities($_POST["jour"]);
	$ville = htmlentities($_POST["ville"]);
	$pays = htmlentities($_POST["pays"]);
	
	if(isset($_POST["gender"])){
		
		$gender = htmlentities($_POST["gender"]);
	}
	/*echo $_POST["nom"]." ".$_POST["prenom"]." ".$_POST["mail"]." ".$_POST["password"]." ".$_POST["repassword"]."<br/>";
	echo $_POST["pays"]." ".$_POST["ville"]." ".$_POST["gender"]." ".$_POST["day"]."/".$_POST["month"]."/".$_POST["year"]."<br/>" ;*/
   
    /*
	echo $nom."<br>";
	echo $prenom."<br>";
	echo $mail."<br>";
	echo $gender."<br>";
	echo $password."<br>";
	echo $repassword."<br>";
	echo $birthdate."<br>";
	echo $ville."<br>";
	echo $pays."<br>";
	*/
	
	$sql = "INSERT INTO register(nom,prenom,pays,ville,genre,naissance,mail,passe,statut) VALUES(:nom,:prenom,:pays,:ville,:genre,:naissance,:mail,:passe,:statut)";
	$req = $pdo->prepare($sql);
	$req->execute(array(
	":nom"=>$nom,
	":prenom"=>$prenom,
	":pays"=>$pays,
	":ville"=>$ville,
	":genre"=>$gender,
	":naissance"=>$birthdate,
	":mail"=>$mail,
	":passe"=>$password,
	":statut"=>"membre"
	));
	
	
	header("Location:index.php");
	}
	else
	{
		$tab1 = [];
		echo "remplissez toutes les cases suivantes!<br/>";
		//echo var_dump($_POST);
		$inf1 = "rgba(255,20,20,0.3)";
	    $inf2 = "rgba(255,20,20,0.3)";
        $inf3 = "rgba(255,20,20,0.3)";
	    $inf4 = "rgba(255,20,20,0.3)";
        $inf5 = "rgba(255,20,20,0.3)";
		foreach($_POST as $key=>$value){
			//echo $key." => ".$value."<br/>";
	
			
			if($value===""){
				
				array_push($tab1,$key);
				echo "<i>".$key."</i><br/>";
				
				
			}
		
		}
	
	
	}
}

?>