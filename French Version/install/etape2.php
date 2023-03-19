<?php
  require '../config.php';
  $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE '$db1';";
  if ($result = mysqli_query($conn, $sql)) {
$rowcount = mysqli_num_rows( $result );
}
if ($rowcount==10) {
  header("location: etape3.php");
}else{
  $sql="CREATE TABLE club (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  nomclub VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE coach (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  nom VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE contact (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    infotel VARCHAR(255) NOT NULL,
    infomail VARCHAR(255) NOT NULL,
    infocourrier VARCHAR(255) NOT NULL,
    infoapp VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE entrainements (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    equipe VARCHAR(255) NOT NULL,
    jour VARCHAR(255) NOT NULL,
    heure VARCHAR(255) NOT NULL,
    stade VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE equipe (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  nomequipe VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE informations (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    le VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    couleur VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE matchs (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  date VARCHAR(255) NOT NULL,
  adomicile VARCHAR(255) NOT NULL,
  alexterieur VARCHAR(255) NOT NULL,
  equipe VARCHAR(255) NOT NULL,
  stade VARCHAR(255) NOT NULL,
  score VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE membres (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  nom VARCHAR(255) NOT NULL,
  equipe VARCHAR(255) NOT NULL,
  poste VARCHAR(255) NOT NULL,
  njoueurs VARCHAR(255) NOT NULL,
  tel VARCHAR(255) NOT NULL,
  derniereutilisation VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE post (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  par VARCHAR(255) NOT NULL,
  le VARCHAR(255) NOT NULL,
  titre VARCHAR(255) NOT NULL,
  description VARCHAR(130) NOT NULL,
  image_name VARCHAR(255) NOT NULL,
  image_type VARCHAR(255) NOT NULL,
  image_data LONGBLOB NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
  $sql="CREATE TABLE stades (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  nomstade VARCHAR(255) NOT NULL,
  adresse VARCHAR(255) NOT NULL,
  ville VARCHAR(255) NOT NULL,
  gps VARCHAR(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }
}

if (isset($_POST['submit'])) {
  $nomclub=mysqli_real_escape_string($conn, $_POST['nomclub']);
  $email=mysqli_real_escape_string($conn, $_POST['email']);
  $pass=mysqli_real_escape_string($conn, $_POST['pass']);
  $subject="Bienveue Coach ! - CoachAgendaPro";
  $message="Merci d'avoir choisi CoachAgendaPro,
  Pour rappel vos identifiants de connexion à l'espace coach sont votre adresse mail et votre mot de passe : $pass";

  $sql="INSERT INTO club (nomclub) VALUES ('$nomclub')";
  $result=mysqli_query($conn, $sql);
  $passhash=hash('sha256', $pass);  
  $sql="INSERT INTO coach (email,password,nom) VALUES ('$email','$passhash','A modifier')";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    if (mail($email, $subject, $message)) {
      header("location: etape3.php");
    }
  }
}
?>
<!DOCTYPE html>

<html
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Installation - CoachAgendaPro</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <img src="../logo.png">
              <span class="app-brand-text menu-text fw-bolder ms-2">CoachAgendaPro</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-circle"></i>
                <div>Etape 1</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="etape2.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-circle"></i>
                <div>Etape 2</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-circle"></i>
                <div>Etape 3</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Installation - CoachAgendaPro/</span> Etape 2</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Etape 2</h5>
                    </div>
                    <div class="card-body">
                      <form method="post">
                        <div class="mb-3">
                          <label class="form-label">Nom du club</label>
                          <input type="text" class="form-control" name="nomclub" required />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Adresse mail du premier coach admin</label>
                          <input type="email" class="form-control" name="email" required />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Mot de passe du premier coach admin</label>
                          <input type="password" class="form-control" name="pass" required />
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Installer</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made by
                  <a href="https://github.com/ludovic-ggn" target="_blank" class="footer-link fw-bolder">Ludovic GOUGEON</a>
                  with 
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                  theme
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
