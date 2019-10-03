<?php 
require "header.php";
$date_post=date("Y-m-d H:i:s",strtotime("+2 hours"));
//echo $date_post;
$name= "";
$extension= "";
$tmp_name = "";
$size = "";
$extension_array = ["jpg","jpeg","png","gif","svg"];
$error = "";
$message="";


if(isset($_FILES,$_POST["description"],$_POST["titre"]) && !empty($_FILES) && !empty($_POST["description"]) && !empty($_POST["titre"])){
	
    $name= $_FILES["image"]["name"];
	$extension= strtolower(pathinfo($_FILES["image"]["name"])["extension"]);
	$tmp_name = $_FILES["image"]["tmp_name"];
	$size = $_FILES["image"]["size"];
	$description= htmlentities($_POST["description"]);
    $title= htmlentities($_POST["titre"]);
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	$error=$_FILES["image"]["error"];
	
/*
	echo $name." ".$tmp_name." ".$size."<br/>".$description."<br/>";
	echo var_dump(pathinfo($_FILES["image"]["name"])["extension"]);
	echo var_dump($check);*/
	//verifie que c'est une image
	if($check!==false){
		//echo "image :".$check["mime"];
	//verifie la bonne extension
	if(in_array($extension,$extension_array)){
		
		//echo "ok => ".$extension;
		if($size<=100000){
			//echo "parfait";
			if(!empty($error))
			{
				$message = $error;
			}else{
				if(file_exists("images/".$name))
				{
					$message = $name." existe déjà!";
				}
			else 
				{
					if(move_uploaded_file($tmp_name,"images/".$name))
					{
					$message = basename($name)." uploadé";
					
					$sql="INSERT INTO article(title,description,vote,image,view,date_post) VALUES(:title,:description,:vote,:image,:view,:date_post)";
					$req = $pdo->prepare($sql);
					$req->execute(array(
					":title"=>$title,
					":description"=>$description,
					":vote"=>0,
					":image"=>$name,
					":view"=>0,
					":date_post"=>$date_post
					));
					
					}
				}
			}
			
		}else{
			$message = "fichier trop grand";
		}
	}else
	{
		
		 $message = "extension non autorisé";
	}
	}else {
		$message = "not a image";
	}
	//condition puis move_uploaded_file
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title></title>
	<meta charset="utf-8"/>
	<style>
	 
	body{
		margin:0 auto;
		width:100%;
	}
	fieldset{
		margin-top:2rem;
		width:600px;
		background:rgba(0,0,250,0.1);
	}
	input[type="submit"]{
		position:relative;
		top:50px;
		left:275px;
		padding:10px 25px;
		border:none;
		background:green;
		color:white;
		border-radius:5px;
		cursor:pointer;
		
	}
	</style>
  </head>
  <body>
    <div><h1><?= $message;?></h1></div>
    <div><h1>Poster un nouvel article</h1></div>
	<div>
        
	  <form action="article_post.php" method="post" enctype="multipart/form-data">
        <fieldset>
		  <legend>Titre</legend>
		  <input type="text" name="titre">
		</fieldset>
		
		<fieldset>
		  <legend>Description</legend>
		  <textarea cols="40" rows="10" name="description"></textarea>
		</fieldset>
		
		<fieldset>
		  <legend>Image</legend>
		  <input type="file" name="image">
		</fieldset>
		<div style="padding-top:20px;"></div>
		
		
		
		<input type="submit" value="poster"/>
	  </form>
	</div>
	<div style="height:20rem;width:100%;"></div>
  </body>
</html>

