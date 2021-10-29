<?php


include_once("config.php");

	if(isset($_POST['register']))
{
	$con = config::connect();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if(!checkEmailExist($con, $email))
	{
		$_SESSION['name'] = $name;
		header("Location: fail2.html");
	}
	
	if(insertDetails($con,$name,$email,$password))
	{
		$_SESSION['name'] = $name;
		header("Location: index.php");
		
	}
}

if(isset($_POST['login']))
{
	$con = config::connect();
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if(checkLogin($con,$email,$password))
	{
		$_SESSION['name'] = $name;
		header("Location: main.html");
	}
	else{
		header("Location: fail.html");
	}
}

function insertDetails($con,$name,$password,$email)
{
	$query = $con->prepare("INSERT INTO users (name,password,email) VALUES(:name,:email,:password)");
	
	$query->bindParam(":name",$name);
	$query->bindParam(":password",$password);
	$query->bindParam(":email",$email);
	return $query->execute();
}

function checkLogin($con,$email,$password)
{
	$query = $con->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
	
	$query->bindParam(":password",$password);
	$query->bindParam(":email",$email);
	$query->execute();
	
	if($query->rowCount() == 1)
	{
		return true;
	}
	else{
		return false;
	}
}

function checkEmailExist($con,$email)
{
	$query = $con->prepare("SELECT * FROM users WHERE email=:email");
	
	$query->bindParam(":email",$email);
	$query->execute();
	
	if($query->rowCount() == 1)
	{
		return false;
	}
	else{
		return true;
	}
}
?>