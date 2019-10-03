<?php 
include "header.php";

$articles = [];

//$year = date("Y");
//$month = date("m");
//echo $year." ".$month;

if(isset($_GET["year"]) && isset($_GET["month"]))
{
	 
	
	$sql = "SELECT * FROM article WHERE MONTH(date_post) = :month && YEAR(date_post) = :year ";
	
	$req = $pdo->prepare($sql);
	$req->execute(array(
	":month"=>$_GET["month"],
	":year"=>$_GET["year"]
	));
	while($get= $req->fetch()){
		$articles[] = $get;
	    
	}

	
}
else
{
$sql = "SELECT * FROM article ORDER BY id DESC LIMIT 3";
	$req = $pdo->prepare($sql);
	$req->execute();
	while($get= $req->fetch()){
		$articles[] = $get;
	}
}
/*
	$sql = "SELECT * FROM article ORDER BY id DESC LIMIT 3";
	$req = $pdo->prepare($sql);
	$req->execute();
	while($get= $req->fetch()){
		$articles[] = $get;
	}
	*/
?>
	   
	   
	   <div id="container">
	     <section>
		  <div id="articles">
		    <div id="cards_container">
			   <div class="cards" id="card1">
			     <img src="images/office1.jpg" alt="bureau"/>
			   </div>
			   <div class="cards" id="card2" style="">
			     <img src="images/patte.jpg" alt="patte de chat"/>
				
			   </div>
			   <div class="cards" id="card3">
			     <img src="images/team1.jpg" alt="equipe"/>
			   </div>
			   
			</div>
			<div id="cards_pics_container">
			  <div class="cards_pics" id="card_pic1">
			    <div class="cards_pics_border">
				  <img src="images/office1.jpg" width="150" height="110" alt="bureau"/>
				</div>
			  </div>
			  <div class="cards_pics" id="card_pic2">
			    <div class="cards_pics_border">
				  <img src="images/patte.jpg" width="150" height="110" alt="patte de chat"/>
				</div>
			  </div>
			  <div class="cards_pics" id="card_pic3">
			    <div class="cards_pics_border">
				  <img src="images/team1.jpg" width="150" height="110" alt="equipe"/>
				</div>
			  </div>
			</div>
			<div style="clear:both"></div>
			<hr>
			<ul>
			  <li>Image par<a href="https://pixabay.com/fr/users/bella67-887962/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=694730">bella67</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=694730">Pixabay</a></li>
			  <li>Image par<a href="https://pixabay.com/fr/users/889520-889520/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2284501">Malachi Witt</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2284501">Pixabay</a></li>
			  <li>Image par<a href="https://pixabay.com/fr/users/Free-Photos-242387/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=336377">Free-Photos</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=336377">Pixabay</a></li>
			 </ul>
		  </div>
		  
		  <script src="js/cards.js">
		 
		  </script>
		  
		  <div id="sidebar"></div>
		 </section>
		 <!--<div style="clear:both;"></div>-->
	     <section>
		   <?php
           // echo var_dump($articles);
			//echo $articles["title"]."rtrt";
			if(!empty($articles))
			{
		   foreach($articles as $a){
		 //  echo $a["title"];
		 
		 
		 $meter_bar = $a["vote"]*(317-182)/100;
		 $meter_bar1 = 168+ $meter_bar;
		 $meter_bar2 = 182+$meter_bar;
		 
		 //calcul du nbr de vues pour chaque article
         $sql7 = "SELECT SUM(view) as v FROM views WHERE article_id=:article_id";
		 $req7 = $pdo->prepare($sql7);
		 $req7->execute(array(
		 ":article_id"=>$a["id"]
		 ));
		 $view = $req7->fetch();
		// echo $view["v"];
         
		 //reporter le nbr de vue dans la table article.
	     $sql8 = "UPDATE article SET view=:view WHERE id=:id";
		 $req8 = $pdo->prepare($sql8);
		 $req8->execute(array(
		 ":id"=>$a["id"],
		 ":view"=>$view["v"]
		 ));
		  
			   ?>
			   
			 
			    <div class="pics">
		     
		     <a href="article.php?page=<?= $a["title"];?>.php"><img src="images/<?= $a["image"];?>" width="400" height="250" alt="no"/></a>
		      <p class="pics_txt">Article <?= $a["id"];?></p>
			 <div class="bande">
			
			   <div class="stuffs">
			      <i class="icon-eye-open" style=""> <span style=""><?= $a["view"];?></span></i>
			      <i class="icon-heart" style=""> <span style="">3</span></i>
				  <meter value="<?= number_format($a["vote"]/10,1);?>" min="0" max="10" style=""></meter><br>
				   <span id="avg_vote" style="left:<?= $meter_bar1;?>px;"><?= number_format($a["vote"],1);?>%</span>
				  <div id="triangle" style="left:<?= $meter_bar2;?>px;"></div>
			   </div>
			 </div>
		   </div>
			  
		   <?php 
		   }
		   }
		   else{
			   ?>
			   <div><?php require "error.php"; ?></div>
			   <?php
		   }
		   ?>
		 
		 </section>
		 
		 
	   </div>
	    <div>
		  <li>Image par<a href="https://pixabay.com/fr/users/Heidelbergerin-1425977/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4092265">Heidelbergerin</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4092265">Pixabay</a></li>
		  <li>Image par<a href="https://pixabay.com/fr/users/Three-shots-3936226/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=3065359">Three-shots</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=3065359">Pixabay</a></li>
		  <li>Image par<a href="https://pixabay.com/fr/users/stronytwoichmarzen-486447/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=904716">Michał Koper</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=904716">Pixabay</a></li>
		  <li>Image par<a href="https://pixabay.com/fr/users/DarkWorkX-1664300/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4320416">DarkWorkX</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4320416">Pixabay</a></li>
		</div>
	 <?php include "footer.php";?>