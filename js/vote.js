 var slide = document.getElementById("slide");
  var val = document.getElementById("val");
  val.innerHTML = slide.value;
  
  slide.oninput = function(){
	  var val = document.getElementById("val");
	  val.innerHTML = this.value;
	  
  }