<?php

if (!isset($_SESSION['login_id']))
    header('location:login.php');



?>

<!-- Begin Page Content -->

<script src="test.js"></script>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario</h6>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">Crear Nuevo</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Piso</th>
                                            <th>Locación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Piso</th>
                                            <th>Locación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        include 'db_connect.php';
                                        $consulta = "SELECT * FROM inventario";
                                        $inv = $conn->query($consulta);
                                        if (!$inv) {
                                            die("Error en la consulta: " . $conn->error);
                                        }

                                        while($row= $inv->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nombre'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['cantidad'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['piso'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['locacion'] ?>
                                        </td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary">Acción</button>
                                                    <button type="button" class="btn btn-primary" aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id']; ?>'>Editar</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id']; ?>'>Eliminar</a>
                                                    </div>
                                                </div>
                                            </center>
                                        </td>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>