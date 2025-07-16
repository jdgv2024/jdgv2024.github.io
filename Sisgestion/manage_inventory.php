<?php
include('db_connect.php');
if(isset($_GET['id'])){
    $inv = $conn->query("SELECT * FROM inventorio where id =".$_GET['id']);
    foreach($inv->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }

    if(inv){
        echo "Si";
    } else {
        echo "No";
    }
}
?>
<div class="container-fluid">

    <form action="" id="manage-user">
        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['nombre']) ? $meta['nombre']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Identificación:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['cantidad']) ? $meta['cantidad']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($meta['lugar']) ? $meta['lugar']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="curso">Curso:</label>
            <select name="curso" id="curso" class="custom-select">
                <option value="1A">1°A</option>
                <option value="1B">1°B</option>
                <option value="2A">2°A</option>
                <option value="2B">2°B</option>
                <option value="3A">3°A</option>
                <option value="3B">3°B</option>
                <option value="4A">4°A</option>
                <option value="4B">4°B</option>
                <option value="5A">5°A</option>
                <option value="5B">5°B</option>
                <option value="6A">6°A</option>
                <option value="6B">6°B</option>
                <option value="7A">7°A</option>
                <option value="7B">7°B</option>
                <option value="8A">8°A</option>
                <option value="8B">8°B</option>
                <option value="9A">9°A</option>
                <option value="9B">9°B</option>
                <option value="10A">10°A</option>
                <option value="10B">10°B</option>
                <option value="11A">11°A</option>
                <option value="11B">11°B</option>
                <option value="NA">No Aplica</option>
            </select>
        </div>
        <div class="form-group">
            <label for="type">Tipo Usuario:</label>
            <select name="type" id="type" class="custom-select">
                <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option>
                <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>>User</option>
            </select>
        </div>
    </form>
</div>
<script>
    $('#manage-user').submit(function(e){
        e.preventDefault();
        start_load()
        $.ajax({
            url:'ajax.php?action=save_user',
            method:'POST',
            data:$(this).serialize(),
            success:function(resp){
                if(resp ==1){
                    alert_toast("Información Guardada",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)
                }
            }
        })
    })
</script>

