 <?php 
 try
	{
	$pdo = new PDO("mysql:host=localhost;dbname=projet1","root","");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

 ?>