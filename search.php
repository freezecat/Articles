 <?php 
  try
	{
	$pdo = new PDO("mysql:host=localhost;dbname=projet1","root","");
	}catch(PDOException $e){
		echo $e->getMessage();
	}
 //echo "bijour";
 $s="";
 //echo $_POST["s"]; 
 $data = [];
 if(isset($_POST["s"])){
	 //echo $_POST["s"]; 
	 
	 $s = htmlentities($_POST["s"]);
	
	
	 $sql = "SELECT * FROM article WHERE title LIKE '".$s."%'";
	 
	 
	 $req = $pdo->prepare($sql);
	 $req->execute();
	 while($fetch = $req->fetch())
	 {
		 $data[] = $fetch;
	 }
	 
	 echo json_encode($data);
	
	 
 }
 ?>