<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){
        
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '793cbe0f940f8d';
        $mail->Password = '86518a1fed4ff4';
        $mail->SMTPSecure='tls';

        $mail->setFrom('cualquiercosa@gmail.com');
        $mail->addAddress('blaister9@gmail.com', 'AppVenta.com');
        $mail->Subject = 'confirma tu cuenta';

        //Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        
        $contenido = "<html>";
        $contenido .="<p><strong> Hola ". $this->nombre . "</strong> Has creado tu cuenta en <strong>Pesquera Sampedro</strong>. Debes confirmarla presionando el siguiente enlace</p>";
        $contenido .="<p>Presiona Aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .="<p>Si tú no solicitaste esta cuenta, Puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();        
    }

    public function enviarInstrucciones(){
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '793cbe0f940f8d';
        $mail->Password = '86518a1fed4ff4';
        $mail->SMTPSecure='tls';

        $mail->setFrom('cualquiercosa@gmail.com');
        $mail->addAddress('blaister9@gmail.com', 'AppVenta.com');
        $mail->Subject = 'Restablece tú password';

        //Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        
        $contenido = "<html>";
        $contenido .="<p><strong> Hola ". $this->nombre . "</strong> Has solicitado restablecer tú password</strong>. Sigue el siguiente enlace para hacerlo</p>";
        $contenido .="<p>Presiona Aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer password</a></p>";
        $contenido .="<p>Si tú no solicitaste este cambio, Puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}

?>