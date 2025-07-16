<?php
include 'sidebar1.php';
include 'modals.php';

date_default_timezone_set('America/Bogota');

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$dashboard = "active";

session_start();

// Si no hay sesión de login, redirige a login
if (!isset($_SESSION['login_id'])) {
    header('location:login.php');
    exit;
}

// Verificamos si es la primera vez en esta sesión que entra al index
if (!isset($_SESSION['correo_enviado'])) {
    // Incluimos el archivo que contiene la función
    require_once 'api.php';

    // Llamamos la función con los datos de sesión
    enviarCorreoInicioSesion($_SESSION['login_name'], $_SESSION['login_email']);

    // Marcamos que ya enviamos el correo
    $_SESSION['correo_enviado'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISGESTIÓN 2 - <?php echo $page ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for tables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">
            <?php include 'topbar.php'; ?>

            <?php include $page.'.php' ?>
        </div>



    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



</body>

</html>