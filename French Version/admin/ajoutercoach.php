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


  $usermail=$_SESSION["coach"];
  $usermail= mysqli_real_escape_string($conn, $usermail);
  $sql="SELECT * FROM `coach` WHERE `email` = '$usermail'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $nom=$row['nom'];

  if (isset($_POST['submit'])) {
  	$nomcoach=mysqli_real_escape_string($conn, $_POST['nom']);
  	$email=mysqli_real_escape_string($conn, $_POST['email']);
  	$newpass = bin2hex(random_bytes(7));
  $subject = 'Votre compte coach - '.$nomclub.'';
  $message = "Bonjour, vous pouvez désormais vous rendre sur l'espace coach grâce à votre adresse mail et votre nouveau mot de passe: $newpass";
  if(mail($email, $subject, $message)){
  $newpass = hash('sha256', $newpass);  
  $sql="INSERT INTO coach (email,password,nom) VALUES ('$email','$newpass','$nomcoach')";
  $result=mysqli_query($conn,$sql);
	if ($result){
		header('location:coachs.php');
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

    <title>Ajouter un coach - <?php echo $nomclub;?> - CoachAgendaPro</title>

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
                <div>Gestion des matchs</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="matchs.php" class="menu-link">
                    <div>Liste des matchs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ajoutermatch.php" class="menu-link">
                    <div>Ajouter un match</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-run"></i>
                <div>Gestion des entrainements</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="entrainements.php" class="menu-link">
                    <div>Liste des entrainements</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ajouterentrainement.php" class="menu-link">
                    <div>Ajouter un entrainement</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>Gestion des equipes</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="equipe.php" class="menu-link">
                    <div>Liste des equipes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ajouterequipe.php" class="menu-link">
                    <div>Ajouter une equipe</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="gestionmembres.php" class="menu-link">
                    <div>Liste des membres</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ajoutermembre.php" class="menu-link">
                    <div>Ajouter un membre</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-map-pin"></i>
                <div>Gestion des stades</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="stades.php" class="menu-link">
                    <div>Liste des stades</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ajouterstade.php" class="menu-link">
                    <div>Ajouter un stade</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-mail-send"></i>
                <div>Gestion de la messagerie</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="informations.php" class="menu-link">
                    <div>Liste des informations</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ajouterinformation.php" class="menu-link">
                    <div>Envoyer une information</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="contact.php" class="menu-link">
                    <div>Contact</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div>Accès Coach</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="ajoutercoach.php" class="menu-link">
                    <div>Ajouter un accès</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="coachs.php" class="menu-link">
                    <div>Liste des coachs</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-camera"></i>
                <div>Espace d'échanges</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="echanges.php" class="menu-link">
                    <div>Voir</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="moderation.php" class="menu-link">
                    <div>Gérer</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">CoachAgendaPro</span></li>
            <li class="menu-item">
              <a
                href="https://github.com/ludovic-ggn"
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
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="moncompte.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $nom; ?></span>
                            <small class="text-muted">Coach</small>
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Espace Coach/</span> Ajout d'un coach</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Ajout d'un Coach</h5>
                    </div>
                    <div class="card-body">
                      <form method="post">
                        <div class="mb-3">
                          <label class="form-label">Nom Complet</label>
                          <input type="text" class="form-control" name="nom" required />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Adresse Mail</label>
                          <input type="email" class="form-control" name="email" required />
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
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