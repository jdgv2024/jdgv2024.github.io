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
                                                    <button type="button" class="btn btn-primary edit_inv" data-id="<?php echo $row['id']; ?>">Editar</button>
                                                    <button type="button" class="btn btn-danger delete_user" data-id="<?php echo $row['id']; ?>">Eliminar</button>
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
    <script src="js/custom.js"></script>


    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            // Funcionalidad botón Editar
            $('.edit_inv').click(function() {
                const id = $(this).data('id');
                console.log("Editar ID:", id); // Para verificar que lo captura

                uni_modal("Editar Inventario", 'manage_inventory.php?id=' + id);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.delete_user').click(function(){
                const id = $(this).attr('data-id');

                Swal.fire({
                    title: "¿Estás segur@?",
                    text: "¡Esto no se puede deshacer!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, bórralo!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'eliminar_inventario.php',
                            type: 'POST',
                            data: { id: id },
                            success: function(resp) {
                                if (resp == 1) {
                                    Swal.fire({
                                        title: "¡Eliminado!",
                                        text: "El inventario fue eliminado exitosamente.",
                                        icon: "success"
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        "Error",
                                        "No se pudo eliminar. Intenta de nuevo.",
                                        "error"
                                    );
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>