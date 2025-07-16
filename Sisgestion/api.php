<?php

    function enviarCorreoInicioSesion($usuario, $correo){

        require __DIR__ . '/vendor/autoload.php';

        $resend = Resend::client('re_QExQSadP_EqVfoRZ7QeN6ZLjaKHSKgzhp');

        $fecha = date("j \e F \e Y, g:i a");
        $ip = $_SERVER['REMOTE_ADDR'];

        $html = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Inicio de sesión exitoso</title>
</head>
<body style="font-family:Segoe UI, sans-serif; margin:0; padding:0; background-color:#f4f4f4;">
  <table align="center" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding: 20px 0;">
    <tr>
      <td>
        <table align="center" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border:1px solid #dddddd;">
          <tr style="background-color:#0078D7;">
            <td style="padding: 20px; text-align: center; color: white; font-size: 20px;">
              Inicio de sesión exitoso
            </td>
          </tr>
          <tr>
            <td style="padding: 30px;">
              <p>Hola,</p>
              <p>Te informamos que tu cuenta ha iniciado sesión correctamente en la plataforma <strong>SISGESTIÓN2</strong>.</p>
              <p><strong>Fecha y hora:</strong> $fecha</p>
              <p><strong>Usuario:</strong> $usuario</p>
              <p><strong>IP:</strong> $ip</p>
              <p>Si no reconoces esta actividad, por favor comunícate con el administrador de la plataforma inmediatamente.</p>
              <br>
              <p>Atentamente,</p>
              <p><em>Equipo de soporte SISGESTIÓN2</em></p>
            </td>
          </tr>
          <tr>
            <td style="padding: 20px; font-size: 12px; color: #888888; text-align: center; border-top: 1px solid #dddddd;">
              Este mensaje fue enviado automáticamente desde una dirección de correo no supervisada. No respondas a este mensaje.
              <br><br>
              <a href="#" style="color: #888888; text-decoration: none;">Política de privacidad</a> | 
              <a href="#" style="color: #888888; text-decoration: none;">Términos legales</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;

        $resend->emails->send([
            'from' => 'Mail <mail@email.sisgestion.me>',
            'to' => [$correo],
            'subject' => 'INICIO DE SESIÓN EXITOSO',
            'html' => $html,
        ]);
    }
?>
