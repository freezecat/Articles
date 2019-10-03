<?php
 require "header.php";
 require "sign_in_traitement.php";?>


     
	 <?php if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=""){?>
	       <h1>You are already connected as <?= $_SESSION["pseudo"];?>! </h1>
		   <a href="index.php">HOME</a>
	<?php }else{?>
    <div><h1>LOGIN </h1></div>
	<div class="content">
        <?= $info;?><br/>
	  <form action="sign_in.php" method="post">

		<fieldset>
		  <legend>ADRESSE MAIL</legend>
		  <input type="text" name="mail"/>
		</fieldset>
		
		<fieldset>
		  <legend>MOT DE PASSE</legend>
		  <input type="text" name="password"/>
		</fieldset>
		<div style="padding-top:20px;"></div>
		<a href="#">Mot de passe oublié</a><br/>
		
		
		<input type="submit" value="sign_in"/>
	  </form>
	</div>
	 
 
	<?php }
	require "footer.php";
	?>