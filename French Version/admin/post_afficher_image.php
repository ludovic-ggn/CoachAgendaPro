<?php
  session_start();
  if(!isset($_SESSION["coach"])){
    header("Location: login.php");
    exit(); 
  }

require '../config.php';
// Récupération de l'ID de l'image à afficher
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $image_id = $_GET["id"];
}

// Récupération des données de l'image à partir de la base de données
$sql = "SELECT image_type, image_data FROM post WHERE id = $image_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $image_type = $row["image_type"];
    $image_data = $row["image_data"];

    // Affichage de l'image
    header("Content-type: $image_type");
    echo $image_data;
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>