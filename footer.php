<?php require "archive.php";?>
<script src="js/vote.js"></script> 
<script src="js/cards.js"></script>
<script src="js/search.js"></script>
<script src="js/register_city.js"></script>
<script src="js/menu_drop.js"></script>
	   <div id="footer">
	     <div style="padding:1rem;">
			 <div class="row">
				 <div class="colspan_3">
				   <h4 class="footer_titles">NATURE DU SITE</h4>
				   <p>Site vitrine pour enrichir un portfolio web</p>
				 </div>
				 <div class="colspan_3">
				   <h4 class="footer_titles">SUBSCRIBE</h4>
				   <p>Enter your email address to receive notifications of new posts by email.
                   Join other subscribers</p>
				     <form method="post" action="newsletter.php">
					   <input type="text" name="newsletter" placeholder="Email address"/>
					    <button id="subscribe_btn" style="">
					 SUBSCRIBE
					 </button>
					 </form>
				    
				 </div>
				 <div class="colspan_3">
				   <h4 class="footer_titles">ARCHIVE</h4>
				   <p>Selectionner une année et un mois pour afficher les articles publiées à cette date.</p>
				   <div id="archive_box">
				     <ul>
				       <li><a href="index.php?year=2019&month=08">08 - 2019</a></li>
				       <li><a href="index.php?year=2019&month=09">09 - 2019</a></li>
				     </ul>
				   </div>
				 
				 </div>
				 <div class="colspan_3">
				   <h4 class="footer_titles">LATEST COMMENT</h4>
				   <p></p>
				 </div>
		   </div>
		 </div>
		 <div id="footer_signature">
		   <p>2019 Yifon Hu</p>
		 </div>
	   </div>
	   
  </body>
  
</html>
 

