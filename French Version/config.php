<?php
$db1 = 'XXXX';
// Informations d'identification
define('DB_SERVER', 'XXXX');
define('DB_USERNAME', 'XXXX');
define('DB_PASSWORD', 'XXXX');
define('DB_NAME', 'XXXX');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
