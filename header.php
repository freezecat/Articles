<?php
session_start();
$_SESSION["titre"]="";

require "database.php";
  $month="";
$year="";
if(isset($_POST["year"],$_POST["month"])){
	$year =htmlentities($_POST["year"]);
	$month= htmlentities($_POST["month"]);
	
	header("Location:index.php?year=".$year."&month=".$month);
}



 ?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
	<meta charset="UTF-8"/>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	 <script src="js/search.js"></script>
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css/layout.css"/>
	<link rel="stylesheet" href="css/home1.css"/>
	<link rel="stylesheet" href="css/article.css"/>
	<link rel="stylesheet" href="css/register_login.css"/>
	
	<link rel="stylesheet" href="css/home1_ipad.css"/>
	<link rel="stylesheet" href="css/article_ipad.css"/>
	
	
	<link rel="stylesheet" href="css/article_mobile.css"/>
		<link rel="stylesheet" href="css/home2_mobile.css"/>
	
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

	<style>

	</style>

  </head>
  <body>
    <div id="header">
	
	   <div id="header_fixed">
	   <nav>
	     <div id="nav_menu">
	     <ul id="list_elt">
		   <?php if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=""){?>
	       <li  class="elt_menu" id="account" ><?= $_SESSION["pseudo"];?>
		      <div id="account_dropdown">
			   <ul>
			     <li class="ss_elt_menu"><a href="account.php">My account</a></li>
				 <li class="ss_elt_menu"><a href="comments.php">My comments</a></li>
				 <li class="ss_elt_menu"><a href="favorites.php">My favorites</a></li>
				 <?php if(isset($_SESSION["statut"]) && $_SESSION["statut"]=="admin"){?>
				 <li class="ss_elt_menu"><a href="article_post.php">Poster un article</a></li>
				 <?php }?>
			   </ul>
			 </div>
			 
		   </li>
		   
		   <li  class="elt_menu"><a href="logout.php">LOGOUT</a></li>
           <?php }else{ ?>
		   <li class="elt_menu"><a href="register.php">REGISTER</a></li>
		   <li class="elt_menu"><a href="sign_in.php">SIGN IN</a></li>
		   <?php } ?>
		   <li class="elt_menu"><a href="#">FAQ</a></li>
		   <li class="elt_menu"><a href="#">CONTACT US</a></li>
		 </ul>
		 </div>
		 
		 <div id="search">
		 
		     
			   
			   <div>
			       <div id="menu_logo"><i id="icon_menu" class="icon-reorder"></i></div>
				   <div id="input_search">
				   <input type="text" placeholder="search..." id="searching">
				   <button id="search_post"><i class="icon-search"></i></button>
				   </div>
			   </div>
			   
			 
		  
		 </div>
		 <!-- dropdown-->
	     <div id="result"></div>
	   </nav>
	   <div style="clear:both;"></div>
	   </div>
	      <div id="header_mobile"/>
		   <div id="logo" style="">
			  <div id="logo_img"><img src="images/logo.png" width="100" height="100" alt="logo"/></div>
			  <div id="logo_txt"><i>FREELOGODESIGN.COM</i></div>
		   </div>
	   </div>
	   </div>
	  