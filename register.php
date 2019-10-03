<?php
 require "header.php";
 require "register_traitement.php";
 ?>

    <?php if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=""){?>
	       <h1>You are already connected as <?= $_SESSION["pseudo"];?>! </h1>
		   <a href="index.php">HOME</a>
	<?php }else{?>
    <div><h1>BECOME A MEMBER!</h1></div>
	<div class="content">
        <?php  ;?>
	  <form action="register.php" method="post">
		<fieldset>
		  <legend>NOM</legend>
		  <input type="text" name="nom" style="width:250px;background:<?= $inf1;?>"/>
		</fieldset>
		 <fieldset>
		  <legend>PRENOM</legend>
		  <input type="text" name="prenom" style="width:250px;background:<?= $inf2;?>"/>
		</fieldset>
		 <fieldset>
		  <legend>PAYS</legend>
		  <select id="pays" name="pays">
			<option class="pays" selected="selected" id="0">FRANCE</option>
			<option class="pays"  id="1">USA</option>
			<option class="pays"  id="2">JAPON</option>
			<option class="pays"  id="3">CHINE</option>
		  </select>
		</fieldset>
		<fieldset>
		  <legend>VILLE</legend>
		  <!-- javascript!-->
		  <select id="city" name="ville">
		    <option>Paris</option>
			<option>Marseille </option>
			<option>Toulouse</option>
			<option>Nice</option>
		  </select>
		</fieldset>
		<fieldset>
		  <input type="radio" name="gender" value="homme">homme
		  <input type="radio" name="gender" value="femme">femme
		</fieldset>
		<fieldset>
		  <legend>DATE DE NAISSANCE</legend>
		  <select name="jour">
		   
			  <script>
			    for(var i=1;i<32;i++){
					document.write("<option>"+i+"</option>");
				}
			  </script>
			
		  </select>
		  <select name="mois">
		     
			    <script>
			    for(var i=1;i<13;i++){
					document.write("<option>"+i+"</option>");
				}
			  </script>
			  
		  </select>
		  <select name="annee">
		    
			   <script>
			    for(var i=1940;i<2004;i++){
					document.write("<option>"+i+"</option>");
				}
			  </script>
			  
		  </select>
		 
		</fieldset>
		<fieldset>
		  <legend>ADRESSE MAIL</legend>
		  <input type="text" name="mail" style="background:<?= $inf3;?>"/>
		</fieldset>
		
		<fieldset>
		  <legend>MOT DE PASSE</legend>
		  <input type="text" name="password" style="background:<?= $inf4;?>"/>
		</fieldset>
		
		<fieldset>
		  <legend>CONFIRMATION MOT DE PASSE</legend>
		  <input type="text" name="repassword" style="background:<?= $inf5;?>"/>
		</fieldset>
		
		<input type="submit" value="register"/>
	  </form>
	
	</div>
	
	<div id="td"></div>
 

	<?php } 
	require "footer.php";
	?>
	
