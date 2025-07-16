function confirmLogOut() {
    Swal.fire({
        title: "Quieres cerrar tu sesión?",
        text: "Recuerda de deberas volver a ingresar",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Borrame idiota!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Cerrando sesion!",
                text: "Your file has been deleted.",
                icon: "success"
            }).then(() => {
                // Redirige después de la animación
                window.location.href = 'ajax.php?action=logout';
            });
        }


    });
}