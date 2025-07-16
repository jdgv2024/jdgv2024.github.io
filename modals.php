<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Cerrar" en la parte inferior si desea salir.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="ajax.php?action=logout">Cerrar</a>
            </div>
        </div>
    </div>
</div>

<!-- New Item Modal-->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Item</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="login-form" class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                               id="Nombre del elemento" aria-describedby="emailHelp" name="username"
                               placeholder="Ingrese nombre del elemento...">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" name="cantidad"
                               id="exampleInputPassword" placeholder="Cantidad...">
                    </div>
                    <div class="form-group">
                        <label for="piso">Piso:</label>
                        <select name="piso" id="piso" class="custom-select">
                            <?php
                            include 'db_connect.php';
                            $consult = "SELECT * FROM pisos";
                            $pisos = $conn->query($consult);
                            if (!$pisos) {
                                die("Error en la consulta: " . $conn->error);
                            }

                            while($row= $pisos->fetch_assoc()):
                            ?>
                            <option value="<?php echo $row['cod'] ?>"><?php echo $row['cod'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="piso">Locación:</label>
                        <select name="piso" id="piso" class="custom-select">
                            <?php
                            include 'db_connect.php';
                            $consults = "SELECT * FROM local";
                            $local = $conn->query($consults);
                            if (!$pisos) {
                                die("Error en la consulta: " . $conn->error);
                            }

                            while($row= $local->fetch_assoc()):
                                ?>
                                <option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" ">Cerrar</a>
            </div>
        </div>
    </div>
</div>