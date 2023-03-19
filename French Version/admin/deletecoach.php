<?php
  session_start();
  if(!isset($_SESSION["coach"])){
    header("Location: login.php");
    exit(); 
  }

include '../config.php';
if(isset($_GET['id'])){
	$id= mysqli_real_escape_string($conn, $_GET['id']);
	if ($id == 1) {
		echo "Vous ne pouvez pas supprimer l'utilisateur n°1";
		echo '<a href="coachs.php">Retour</a>';
	}else{
	$sql="delete from coach where id=$id";
	$result=mysqli_query($conn,$sql);
	if ($result){
		header('location:coachs.php');
	}
}
}
?>