 var search = document.getElementById("searching");
	   var search_post = document.getElementById("search_post");
	    var res = document.getElementById("result");
	   search.onkeyup = function(){
		  
	
		
		  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     
	
	  var obj = JSON.parse(this.responseText);
	  
	  var length = obj.length;
	
	
	  res.innerHTML = "<ul style='list-style:none;'>";
	  for(i=0;i<length;i++){
		 res.innerHTML += "<li class='elt'  id='elt"+(i)+"' style='cursor:pointer;line-height:2rem;text-align:center;'>"+obj[i].title+"</li>";
	  }
	  res.innerHTML += "</ul>";
	    var elt = document.getElementsByClassName("elt");
	      var l = elt.length;
		//alert(l);
		
		for(var i=0;i<l;i++)
		{
		elt[i].onclick = function(){
			var index = this.getAttribute("id").slice(3,4);
			search.value = obj[index].title;
			
			
		 //alert(index);
		}
	    
		}
    }
  };
  
  xhttp.open("POST", "search.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("s="+search.value);
       
	   
		
		
       if(search.value=="")
	   {
		 
		   res.style.display="none";
	   }
	   if(search.value!="")
	   {
		   res.style.display="block";
	   }
 
       
	   };
	   
	    search_post.onclick = function(){
			//alert(search.value);
			window.location.href = "article.php?page="+search.value+".php";
		}