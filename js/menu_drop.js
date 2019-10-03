 /*script pour les écrans dont la largeur est inférieur à 650px*/
	   var menu_icon = document.getElementById("menu_logo");
	   var nav_menu = document.getElementById("nav_menu");
	   var icon = document.getElementById("icon_menu");
	   var liste = document.getElementById("list_elt");
	   
	   menu_logo.onclick = function(){
		   
		   if(icon.getAttribute("class")=="icon-reorder")
		   {
		    //icon[0].removeAttribute("class","icon-reorder");
		   icon.setAttribute("class","icon-remove");
		   icon.style.color = "white";
		     icon.style.cursor = "pointer";
			   icon.style.position = "relative";
			     icon.style.top = "16px";
				   icon.style.left = "16px";
				
				nav_menu.style.transition = "height 0.5s";
				nav_menu.style.height  = "250px";
				
				liste.style.transition = "display 1s";
				liste.style.display = "block";
				
				
		   }
		   else if(icon.getAttribute("class")=="icon-remove")
		   {
			   icon.setAttribute("class","icon-reorder");
			   	nav_menu.style.transition = "height 0.5s";
				nav_menu.style.height  = "0px";
				liste.style.transition = "display 1s";
				
				liste.style.display = "none";
				
				//alert(window.innerWidth);
		   }
		      
	   };