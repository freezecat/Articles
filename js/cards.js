 var cards = document.getElementsByClassName("cards");
		   var pics =  document.getElementsByClassName("cards_pics");
		  
		  function order(a)
		  {
			  var cards = document.getElementsByClassName("cards");						
				  for(var j=1;j<cards.length+1;j++){
					  if(j!= a){
						   pics[j-1].style.background = "transparent";
						  if(j<a)
						  {
							 cards[j-1].style.zIndex = 500*(j-1);
							
						  }
						  if(j>a){
							 cards[j-1].style.zIndex = 1000 -500*(j-a);
						  }
					  }
				  }
		  }
		  
		  for(var i=0; i<cards.length;i++)
		  {
			  cards[i].onclick = function(){
				  
				 
				  
				  var index = this.getAttribute("id").slice(4,5);
				  this.style.zIndex = 1000;
				  pics[index-1].style.background = "white";
				  
				   //rabats les cartes "correctement"
						  //pour index  = 3 plus j est proche de 3 plus card[j-1] ont un zIndex élevé.
						order(index);
                }
		  }
		  
		 
		   for(var k=0; k<cards.length;k++)
		  {
			  pics[k].onclick = function(){
				 
				  var index = this.getAttribute("id").slice(8,9);
				  //alert(index);
				  pics[index-1].style.background = "white";
				  cards[index-1].style.zIndex = 1000;
				  order(index);
		     }
		  }
				  