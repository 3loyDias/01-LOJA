<?php

namespace core\classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EnviarEmail
{
    public function enviar_email_confirmacao_novo_cliente($email_cliente, $purl)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = EMAIL_HOST;//Set the SMTP server to send through                                 //Enable SMTP authentication
            $mail->Username = EMAIL_FROM;                //SMTP username
            $mail->Password = EMAIL_PASS;                    //SMTP password         //Enable implicit TLS encryption
            $mail->Port = EMAIL_PORT;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL_FROM, APP_NAME);
            $mail->addAddress($email_cliente, "Registro conta");     //Add a recipient
            $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            /*Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
*/
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = APP_NAME . ' Confirmação de conta';
            // Corpo do texto do nosso email e mensagem
            $html = '<p>Seja bem vindo á nossa loja ' . APP_NAME . ' </p>';
            $html .= '<p>Para poder acessar a sua conta, por favor clique no link abaixo para confirmar o seu email</p>';
            $html .= '<p><a href=">Confirmar email</a></p>';
            $mail->Body = $html;





            $mail->Body = 'Testando o Envio - Teste <strong>BOLD!!!</strong>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}