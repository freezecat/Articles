<?php

// echo var_dump(pathinfo($_GET["page"]))."<br/>";
//echo pathinfo(htmlentities($_GET["page"]))["filename"];
include "header.php";
$background="";
$display="none";
$message="";
$comment = "";
$user_ip = $_SERVER["REMOTE_ADDR"];
$date = strtotime(date("Y-m-d H:i:s"));
$jour = 24*60*60;
//php.ini date_default_timezone_set('Europe/Paris');
$date_comment = date("Y-m-d H:i:s" ,strtotime("+2 hours"));

	
	if(isset($_GET["page"])){
		$sql = "SELECT * FROM article WHERE title=:title";
		$req = $pdo->prepare($sql);
		$req->execute(array(
		":title"=>str_replace(".php","",htmlentities($_GET["page"]))
		));
		$article= $req->fetch();
		//echo var_dump($article)."<br/>";
			
	  $sql1 = "SELECT AVG(vote) FROM vote WHERE article_id=:article_id";
		 $req1 = $pdo->prepare($sql1);
		 $req1->execute(array(
		 ":article_id"=>$article["id"]
		 ));
		 $moyenne = $req1->fetch();
		// echo $moyenne[0];
		 
		 $sql2 = "UPDATE article SET vote=:vote WHERE title=:title";
		 $req2 = $pdo->prepare($sql2);
		 $req2->execute(array(
		 ":title"=>str_replace(".php","",htmlentities($_GET["page"])),
		 ":vote"=>$moyenne[0]
		 ));
	
	 

	if(isset($_POST["slide"])){
	//echo $_POST["slide"]." ".$_SESSION["pseudo"]." ".$article["id"]."<br/>";
	
	
	if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]))
	{
		$sql3 = "SELECT COUNT(*) FROM vote WHERE nom=:nom and article_id=:article_id";
		$req3 = $pdo->prepare($sql3);
		$req3->execute(array(
		":article_id"=>$article["id"],
		":nom"=>$_SESSION["pseudo"]
		));
		$deja_vote = $req3->fetch();
		//echo $deja_vote[0];
		
		if($deja_vote[0] == 0)
		{
			$sql4 = "INSERT INTO vote(article_id,nom,vote) VALUES(:article_id,:nom,:vote)";
			$req4 = $pdo->prepare($sql4);
			$req4->execute(array(
			":article_id"=>$article["id"],
			":nom"=>$_SESSION["pseudo"],
			":vote" => $_POST["slide"]
			));
			$message= "Merci d'avoir voté";
			$background="#5f5";
			$display="block";
			
		}
		else
		{
			$message= "vous avez déjà voté!";
			$background="#f55";
			$display="block";
		}
	}
	else{
		    $message= "Pour voter ,identifiez-vous <a href='sign_in.php'>ici</a>";
			$background="#6cf";
			$display="block";
	}
	

	
	
	//$article= $req->fetch();
	
	
     }
	 
	 
	
	
	   
	    
	  
	   
	   
		  // echo "cookie named :".$cookie_name." adn its value is:".$_COOKIE[$cookie_name]."!";
		   
			
		   $sql6 = "SELECT * from views WHERE user_ip=:user_ip and article_id=:article_id";
		   $req6 = $pdo->prepare($sql6);
		   $req6->execute(array(
		   ":user_ip"=>$user_ip,
		   ":article_id"=>$article["id"]
		   ));
		   $visit = $req6->fetch();
		   
		   //$cookie = 1;
		   //$article_id = $article["id"];
		   //echo $cookie." ".$article["id"];
		   //check if $cookie=1  in ddb
		 
		   
		   if(isset($visit) && $visit!=[]){
			   //l'utilisateur à déjà visité la page.
			   
			   
			   
			  
			   
			   if($date >= ($visit["date"]+$jour))
			   {
				  // echo "visit counted";
				   //incremente nombre de vue
				      $sql = "UPDATE views SET view=:view , date=:date WHERE user_ip=:user_ip and article_id=:article_id";
			       $req = $pdo->prepare($sql);
				   $req->execute(array(
				   
				   ":user_ip"=>$visit["user_ip"],
				   ":article_id"=>$visit["article_id"],
				   ":date"=>$date,
			       ":view"=>$visit["view"]+1
				   ));
			   }
			 
			   
			   
			
			   
		   }
		   else{
			   //insert data quand c'est la première visite.
			   $message ="WELCOME! THIS IS YOUR FIRST VISIT!";
			   $display="block";
			   $background = "#6cf";
			  
			  
			   $sql = "INSERT INTO views(article_id,user_ip,date,view) VALUES(:article_id,:user_ip,:date,:view)";
			       $req = $pdo->prepare($sql);
				   $req->execute(array(
				   ":user_ip"=>$user_ip,
				   ":article_id"=>$article["id"],
				   ":date"=>$date,
				   ":view"=>1
				   ));
				  
				    
		   }
		      //COMMENTAIRES;
		   
	    if(isset($_POST["comment"]))
		{
			if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]))
			{
				if(empty($_POST["comment"]))
				{
					$background="#f55";
					$message="remplissez le champ commentaire!";
					$display="block";
				}
			else
				{
				
					$background="#5f5";
					$message="votre commentaire a été posté";
					$display="block";
					$comment = htmlentities($_POST["comment"]);
					
					//echo $date_comment." ".$_SESSION["pseudo"]." ".$comment." ".$article["id"];
					$sql = "INSERT INTO comments(article_id,nom,comments,date_comment) VALUES(:article_id,:nom,:comments,:date_comment)";
					$req = $pdo->prepare($sql);
					$req->execute(array(
					":article_id"=>$article["id"],
					":nom"=>$_SESSION["pseudo"],
					":comments"=>$comment,
					":date_comment"=>$date_comment
					));
					
					
				}
			}
			else{
		    $message= "Pour poster un commentaire ,identifiez-vous <a href='sign_in.php'>ici</a>";
			$background="#6cf";
			$display="block";
			}
		}
	 
	 }
	if(isset($article)){
	$sql1 = "SELECT * FROM comments WHERE article_id=:article_id";
					$req1 = $pdo->prepare($sql1);
					$req1->execute(array(
					":article_id"=>$article["id"]
					));
					$comments=[];
					while($get = $req1->fetch()){
						$comments[] = $get;
					}
	}
					//echo var_dump($comments);
	 
	 //incremente le nombre de vue:
	 
	
//	echo $article["title"]." ".$article["description"]." ".$article["vote"]."<br/>";
	
	?>
	<?php if(isset($article) && $article!=[]){?>

	
	<div id="alerte" style="background:<?= $background;?>;display:<?= $display;?>;"><?= $message;?></div>
	<div class="article_box">
  <div class="article_img">
    <div>
    <img src="images/<?= $article["image"];?>" alt="no"/>
	</div>
  </div>
    
   
   
  <div class="article_description">
    <div id="article_margin">
	  <div class="article_description_fond">
	    <p class="article_txt"><?= $article["description"];?></p>
	  </div>
	</div>
  </div>

  <div style="clear:both;"></div>
  <div id="vote_section">
    <div class="slide_vote">
	 
	  <form action="article.php?page=<?= htmlentities($_GET["page"]);?>" method="post">
	   
	    <input type="range" min="1" max="" value="50" id="slide" name="slide"/>
		<div id="val" style=""></div> 
		
		
		<input id="vote_submit" class="btn" type="submit" value="vote"/>
	     <div>vote moyenne : <?= number_format($moyenne[0],1);?></div>
		 
	 </form>
	</div>
  </div>
  <div id="comment_section" style="">
  
    <div style="">
	 <div><h1>Commentaires</h1></div>
	<?php if(isset($comments) && $comments!=[]){
		foreach($comments as $c)
		{
		?>
		
	     <div>Posté par <?= $c["nom"];?> le <?= $c["date_comment"];?></div>
		 <div><?= $c["comments"];?></div>
		 <hr>
	<?php
		}
	}else{
		?>
		pas de commentaires.
	<?php 
	}
	?>
	</div>
	 <div id="comment_post_section">
	   <form action="article.php?page=<?= htmlentities($_GET["page"]);?>" method="post">
	     <fieldset style="">
		 <legend>Poster un commentaire</legend>
	     <textarea name="comment" cols="50" rows="5"></textarea>
		 </fieldset>
		 <input class="btn" type="submit" id="comment_submit" value="post"/>
	   </form>
	 </div>
  </div>
	<?php }
else{
	require "error.php";
}	
?>
</div>
	
	<?php


	include "footer.php";
?>