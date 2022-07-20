<?php 
  require_once '../autoload.php';
  session_start();
  $primery_key = array_key_exists("id", $_GET) ? $_GET['id'] : 0;
  $user = $user_repository->getByPk($primery_key);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Usuarios</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Administrador</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="../dashboard.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <li class="nav-item">
        <a class="nav-link" href="users/index.php">
          <i class="bi bi-person"></i>
          <span>Usuarios</span>
        </a>
      </li>
      <!-- End User Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo ($primery_key == 0) ? 'Crear Usuario' : 'Actualizar Usuario'; ?></h5>
              <!-- Multi Columns Form -->
              <form class="row g-3" action="../Controllers/User.php" method="post">
                <input type="hidden" name="action" value="store">
                <input type="hidden" name="id" value="<?php echo $primery_key; ?>">
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Identificacion</label>
                  <input type="text" class="form-control" name="identification" value="<?php echo ($primery_key != 0) ? $user['user']['identification'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("identification", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['identification']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Nombres</label>
                  <input type="text" class="form-control" name="name" value="<?php echo ($primery_key != 0) ? $user['user']['name'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("name", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['name']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" name="last_name" value="<?php echo ($primery_key != 0) ? $user['user']['last_name'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("last_name", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['last_name']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Correo Electronico</label>
                  <input type="email" class="form-control" name="email" value="<?php echo ($primery_key != 0) ? $user['user']['email'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("email", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['email']}</p>" : '' ?>
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Tipo Usuario</label>
                  <select class="form-select" name="type">
                    <option value="" selected>Seleccione una opcion</option>
                    <option value="1">Administrador</option>
                    <option value="2">Profesor</option>
                  </select>

                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("type", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['type']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Usuario</label>
                  <input type="text" class="form-control" name="username" value="<?php echo ($primery_key != 0) ? $user['user']['username'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("username", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['username']}</p>" : '' ?>
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="password">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("password", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['password']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Dependencia/Programa</label>
                  <select class="form-select" name="dep_prog">
                    <option value="" selected>Seleccione una opcion</option>
                    <option value="1">Administración y Administración Pública</option>
                    <option value="2">Ciencias Biológicas</option>
                    <option value="3">Ciencias Políticas</option>
                    <option value="4">Ciencias Sociales y Humanidades</option>
                    <option value="5">Deportes y Educación Física</option>
                    <option value="6">Derecho y Leyes</option>
                    <option value="7">Educación y Pedagogía</option>
                    <option value="8">Física y Química</option>
                    <option value="9">Historia y Geografía</option>
                    <option value="10">Idiomas</option>
                    <option value="11">Informática e Información</option>
                    <option value="12">Ingeniería y Tecnología</option>
                    <option value="13">Lengua y Literatura</option>
                    <option value="14">Matemática, Economía y Finanzas</option>
                    <option value="15">Salud y Medicina</option>
                    <option value="16">Veterinaria</option>
                  </select>

                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("dep_prog", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['dep_prog']}</p>" : '' ?>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><?php echo ($primery_key == 0) ? 'Registrar' : 'Actualizar'?></button>
                  <a href="index.php" type="button" class="btn btn btn-secondary">Cancelar</a>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>