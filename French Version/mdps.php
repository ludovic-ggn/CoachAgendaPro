<?php
  session_start();
  if(!isset($_SESSION["membres"])){
    header("Location: login.php");
    exit(); 
  }
include 'config.php';
  $sql="Select * from club where id=1";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $nomclub=$row['nomclub'];


  $usermail=$_SESSION["membres"];
  $usermail= mysqli_real_escape_string($conn, $usermail);
  $sql="SELECT * FROM `membres` WHERE `email` = '$usermail'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $nom=$row['nom'];
  $poste=$row['poste'];

  if(isset($_POST['submit'])){

  $mdpsactuel= mysqli_real_escape_string($conn, $_POST['mdpsactuel']);
  $mdpsactuel= hash('sha256', $mdpsactuel);
  $nouveaumdps= mysqli_real_escape_string($conn, $_POST['nouveaumdps']);
  $nouveaumdps= hash('sha256', $nouveaumdps);

  $sql="SELECT * FROM `membres` WHERE `email` = '$usermail'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $password=$row['password'];
  if ($password == $mdpsactuel) {
  $sql="update membres set password='$nouveaumdps' WHERE `email` = '$usermail'";
    $result=mysqli_query($conn,$sql);
    if ($result) {
      $heure = date( "d/m/Y H:i:s");
      $subject = 'Mot de passe modifié - '.$nomclub.'';
      $message = 'Votre mot de passe a bien été modifié à '.$heure.', si vous n êtes pas à l origine de cette action veuillez vous rapprocher de votre club ';
      mail($usermail, $subject, $message);
      echo '<script>alert("Mot de passe modifié");</script>';
    }
  }else{
    echo '<script>alert("Mot de passe incorrect");</script>';
  }
  }
?>

<!DOCTYPE html>

<html
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Sécurité - <?php echo $nomclub;?> - CoachAgendaPro</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
        <?php
  $sql="SELECT * FROM `membres` WHERE `email` = '$usermail'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $derniereutilisation=$row['derniereutilisation'];
  $sql = "SELECT * FROM informations";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $le = $row["le"];
      $message= $row["message"];
      $couleur = $row["couleur"];
      if ($derniereutilisation <= $le) {
        echo '<div
                        class="bs-toast toast toast-placement-ex m-2 fade bg-'.$couleur.' top-0 end-0 show"
                        role="alert"
                        aria-live="assertive"
                        aria-atomic="true"
                      >
                        <div class="toast-header">
                          <i class="bx bx-bell me-2"></i>
                          <div class="me-auto fw-semibold">Information</div>
                          <small>'.$le.'</small>
                          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                          '.$message.'
                        </div>
                      </div>';
      }
    }
  }
  $temps= date("Y-m-d H:i:s");
  $sql="update membres set derniereutilisation='$temps' WHERE `email` = '$usermail'";
  $result=mysqli_query($conn,$sql);
    ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <img src="logo.png">
              <span class="app-brand-text menu-text fw-bolder ms-2">CoachAgendaPro</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Menu latteral gauche -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Accueil</div>
              </a>
            </li>

            <!-- Menu Principal latteral gauche -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-football"></i>
                <div>Les Matchs</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="matchsavenir.php" class="menu-link">
                    <div>A Venir</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="matchspasses.php" class="menu-link">
                    <div>Passés</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="entrainements.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-run"></i>
                <div>Les Entrainements</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="monequipe.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>Mon Equipe</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="lesstades.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-pin"></i>
                <div>Les Stades</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-mail-send"></i>
                <div>Messagerie</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="informations.php" class="menu-link">
                    <div>Informations</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="contact.php" class="menu-link">
                    <div>Contact</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="echanges.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-camera"></i>
                <div>Espace d'échanges</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">CoachAgendaPro</span></li>
            <li class="menu-item">
              <a
                href="https://github.com/ludovic-ggn/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-info-circle"></i>
                <div>Ludovic GOUGEON</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="moncompte.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $nom; ?></span>
                            <small class="text-muted"><?php echo $poste; ?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="moncompte.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Mon Compte</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="informations.php">
                        <i class="bx bx-envelope me-2"></i>
                        <span class="align-middle">Informations</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Se Deconnecter</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Paramètre du compte /</span> Sécurité</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="moncompte.php"><i class="bx bx-user me-1"></i> Mon compte</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="mdps.php"
                        ><i class="bx bx-lock-open-alt me-1"></i> Sécurité</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Modifier le mot de passe</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Mot de passe actuel</label>
                            <input
                              class="form-control"
                              type="password"
                              name="mdpsactuel"
                              autocomplete="off"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input
                              class="form-control"
                              type="password"
                              name="nouveaumdps"
                              autocomplete="off"
                            />
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="submit" class="btn btn-primary me-2">Modifier</button>
                          <a href="moncompte.php">
                          <button type="reset" name="reset" class="btn btn-outline-secondary">Annuler</button>
                          </a>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
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
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <!-- Page JS -->
    <script src="assets/js/pages-account-settings-account.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
