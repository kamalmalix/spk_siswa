<?php
session_start();
include "../models/koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

//Validasi Login
if ($_POST){
	$asd =  $password;
	$queryuser = mysqli_query($connect,"SELECT * FROM tb_user WHERE username= '$username' AND password='$asd'");
	
	$user = mysqli_fetch_array($queryuser);
						
	if(mysqli_num_rows($queryuser) > 0){		
				$_SESSION["username"] 			= $user["username"];
				$_SESSION["password"] 			= $user["password"];
				$_SESSION["level"]				= $user["level"];
				$_SESSION["id_user"] 			= $user["id_user"];
				$_SESSION["id_guru"] 			= $user["id_guru"];
				$_SESSION["id_siswa"] 			= $user["id_siswa"];
				$_SESSION["kelas"]				= $user["kelas"];
				$_SESSION['nama_user']			= $user["nama_user"];
				$_SESSION["Login"] 				= true;
				
				if ($_SESSION["level"] == "0"){
					header ("Location: home.php");
					exit();
				}
				else if($_SESSION["level"] == "1"){
					header ("Location: home.php");
					exit();
				}
				else if($_SESSION["level"] == "2"){
					header ("Location: home.php");
					exit();
				}
				else {header ("Location: index.php?Err=1");}
	}
	else if (empty ($username) && empty ($password)){
		header ("Location: index.php?Err=1");
		exit();
	}
	else if(empty ($username)){
		header ("Location: index.php?Err=2");
		exit();
	}
	else if(empty ($password)){
		header ("Location: index.php?Err=3");
		exit();
	}
	else{
		header ("Location: index.php?Err=5");
		exit();
	}
}
	
?>