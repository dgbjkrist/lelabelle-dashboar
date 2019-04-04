<?php
  session_start();

    //  voir si l'utilisateur est connecte
    if (!isset($_SESSION['logged_in'])) {
      // redirection de l'utilisateur
      echo '<script language="Javascript">';
      echo 'document.location.replace("login.php")'; // -->
      echo ' </script>';
    }

?>

<?php
  include '../module/config.php';

  // deconnexion
  if (isset($_GET['logout'])) {
    // destruction de la sesssion
    session_destroy();
    // destruction des variables
    unset($_SESSION['logged_in']);
    unset($_SESSION['logged_id']);
    unset($_SESSION['nom']);
    unset($_SESSION['prenom']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['email']);
    unset($_SESSION['telephone']);

    header('location: ../index.php');
  }
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>user_liste</title>
  <!-- Fontawesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <style>
.footer {
   position: fixed;
   left: 5;
   bottom: 0;
   width: 95%;

}
</style>
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand problème a gérer-->
      <a class="navbar-brand pt-0" href="../index.php">
        <img src="../assets/img/brand/lelabelle.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Autre action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Quelque chose d'autre ici
            </a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bienvenue!</h6>
            </div>
            <a href="./pages/profil.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Mon profil</span>
            </a>
            <a href="./pages/profil.php" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Paramètres</span>
            </a>
            <a href="./pages/profil.php" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activité</span>
            </a>
            <a href="./pages/profil.php" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Déconnexion</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../index.php">
                <img src="../assets/img/brand/lelabelle.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="ni ni-tv-2 text-primary"></i> Tableau de bord
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/generateur_code.php">
              <i class="ni ni-planet text-blue"></i>Générateur de bon
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/offres.php">
            <i class="ni ni-pin-3 text-orange"></i> Offres
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/profil.php">
              <i class="ni ni-single-02 text-yellow"></i>Profil utilisateur
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/user_liste.php">
              <i class="ni ni-bullet-list-67 text-red"></i>Listes des utilisateurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/verif_ticket.php">
            <i class="fa fa-ticket text-green"></i>Vérification de ticket
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/crediter_compte.php">
            <i class="fa fa-credit-card text-orange"></i>Créditer un compte
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./pages/message.php">
              <i class="ni ni-single-02 text-yellow"></i>Message
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/login.php">
              <i class="ni ni-key-25 text-info"></i> Connexion
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/register.php">
              <i class="ni ni-circle-08 text-pink"></i>Ajouter un utilisateur
            </a>
          </li>
        </ul>

        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->

        <!-- Navigation -->



  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.php">Tableau de bord</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <?php if(isset($_SESSION['logged_in'])): ?>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">
                    <?php echo "<strong>".$_SESSION['username']."</strong>"; ?>
                  </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Bienvenue!</h6>
              </div>
              <a href="./pages/profil.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mon profil</span>
              </a>
              <a href="./pages/profil.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Paramètres</span>
              </a>
              <a href="./pages/profil.php" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activité</span>
              </a>
              <a href="./pages/profil.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="?logout='true'" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Déconnexion</span>
              </a>
            </div>
          </li>
        </ul>
        <?php endif ?>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">

                      <span class="h2 font-weight-bold mb-0">User 1</span>
                    </div>

                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">

                      <span class="h2 font-weight-bold mb-0">User 2</span>
                    </div>

                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">

                      <span class="h2 font-weight-bold mb-0">User 3</span>
                    </div>

                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">

                      <span class="h2 font-weight-bold mb-0">User 4</span>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Liste des utilisateurs</h3>
            </div>
            <div class="card-body">
            <div class="row icon-examples">
                <div class="col-lg-12 col-md-12">

                <?php include('../module/users_liste.php'); ?>

                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-12">
            <div class="copyright text-center text-xl-left text-muted"> copyright
              &copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank">Labelle Group</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
</body>

</html>
