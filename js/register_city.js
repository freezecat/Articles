var country = document.getElementById("pays");
var city = document.getElementById("city");

var pays = ["FRANCE","USA","JAPON","CHINE"];



var france = ["Paris","Marseille","Toulouse","Nice"];

var usa = ["New York","Texas","Los Angeles","San Francisco","Washington"];
var japon = ["Tokyo","Kyoto","Osaka"];
var chine = ["Pekin","Shangai","Whenzhou"];
var villesde = [france,usa,japon,chine];



country.onchange = function(){
	/*alert(this.selectedIndex);*/
	var options = [];
	var txt = [];
	
	while(city.hasChildNodes()){
		city.removeChild(city.firstChild);
	}
	for(var i=0;i<villesde[this.selectedIndex].length;i++){
		//alert(villesde[this.selectedIndex][i]);
		options[i] = document.createElement("option");
		txt[i] = document.createTextNode(villesde[this.selectedIndex][i]);
		options[i].appendChild(txt[i]);
		city.appendChild(options[i]);
		
	}
	
};
