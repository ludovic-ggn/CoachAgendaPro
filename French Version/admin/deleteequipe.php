<?php
  session_start();
  if(!isset($_SESSION["coach"])){
    header("Location: login.php");
    exit(); 
  }
include '../config.php';
$id=mysqli_real_escape_string($conn, $_GET['id']);
$sql="DELETE from equipe WHERE id=$id";
$result=mysqli_query($conn, $sql);
if ($result) {
	header('location: equipe.php');
}
?>