<?php
header('Content-type: text/plain; charset=utf-8');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



$request = $_POST;
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

try {
    //Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.server.com.br';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;
    $mail->Username = 'contato@server.com.br';                 // SMTP username
    $mail->Password = '*****';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('contato@server.com.br', 'E-email de teste');
    $mail->addAddress($request['email'], 'E-email de teste');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Assunto de teste';
    $mail->Body = 'Esse é o corpo da menssagem';
    $mail->AltBody = 'Esse é o alt body da menssagem';

    $mail->send();
    echo 'Menssagem enviado para: '.$request['email'];
} catch (Exception $e) {
    echo 'Não foi possivel enviar o email! Error: ', $mail->ErrorInfo;
}
