<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
    <div class="container-fluid mt-2 mb-2">
        <div class="col-lg-12">
            <div class="col-md-1 float-left" style="display: flex;">
                <div class="logo">
                    <img width="35px" src="./fotos/logo-circular.png">
                </div>
            </div>
            <div class="col-md-2 float-right text-white">
                <a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['name'] ?> <i class="fa fa-power-off"></i></a>
            </div>
        </div>
    </div>

</nav>

<nav id="sidebar" class='mx-lt-5 bg-dark' >

    <div class="sidebar-list">

        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
        <a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Categorías</a>
        <a href="index.php?page=voting_list" class="nav-item nav-voting_list nav-manage_voting"><span class='icon-field'><i class="fa fa-poll-h"></i></span> Votaciones</a>
        <?php if($_SESSION['login_type'] == 1): ?>
            <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Usuarios</a>
        <?php endif; ?>
    </div>

</nav>





