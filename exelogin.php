<?php 
	// include 'koneksi.php';
	try
	{
		$conn=new PDO("mysql:host=localhost; dbname=perpustakaan", "grez", "password");
		echo "Connection Success!" . "</br>";
	}
	catch (PDOException $ex)
	{
		echo "Error: $ex";
	}
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$md_pass=md5($pass);
	
	$query = $conn->query("select * from admin where username='$user' and password='$pass'");
	// print_r($query->fetchAll());
	$result = $query->fetch();
	// echo "it's : " . $result["username"];
	// $sqlAdmin=mysql_query("select * from admin where username='$user' and password='$md_pass'");
	// $row=mysql_fetch_array($sqlAdmin);
	// $count=mysql_num_rows($sqlAdmin);
		
	if(!$result){
		echo "Username atau password salah";
	} else if($result["type"]='ADM'){
		session_start();
		$_SESSION["username"] = $result["username"];
		$_SESSION["password"] = $result["password"];
		// session_register($result["username"]);
		// session_register($result["pasword"]);
		//session_register(administrator);
		echo "Login Sucess!!";
		$id=1;
		header("location:index.php?pg=profile&admin=" . $result["id"]);
	} else if($result["type"]=='ANG'){
		$_SESSION["username"] = $result["username"];
		$_SESSION["password"] = $result["password"];
		// session_register($result["username"]);
		// session_register($result["password"]);
		//session_register(member);
		$id=2;
		header("location:index.php?pg=profile&admin=" . $result["id"]);
	}
	ob_end_flush();
	
?>
