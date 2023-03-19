<?php
  session_start();
  if(!isset($_SESSION["coach"])){
    header("Location: login.php");
    exit(); 
  }
include '../config.php';

  $sql="Select * from club where id=1";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $nomclub=$row['nomclub'];

  $id=mysqli_real_escape_string($conn, $_GET['id']);
  $sql="SELECT * FROM coach WHERE id='$id'";
  $result=mysqli_query($conn, $sql);
  $row=mysqli_fetch_assoc($result);
  $email=$row['email'];
  $newpass = bin2hex(random_bytes(7));
  $subject = 'Votre nouveau mot de passe - '.$nomclub.'';
  $message = "Bonjour, voici votre nouveau mot de passe: $newpass";
  if(mail($email, $subject, $message)){
  $newpass = hash('sha256', $newpass);  
  $sql="update coach set password='$newpass' where email='$email'";
  $result=mysqli_query($conn,$sql);
    if ($result) {
    header('location: coachs.php');    }
  }



?>