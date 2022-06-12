<?php
session_start();

require_once(__DIR__.'/../mdb/mdbUsuario.php');
require_once(__DIR__.'/../../Vista/js/librerias/PHPMailer/PHPMailerAutoload.php');

$Email = filter_input(INPUT_POST,'Email');
//$Email = "deimer2001@hotmail.com";

$usuario = VerUsuario_Por_email($Email);
$msg= "El Email no es valido verifique el campo.";
$type_msg="ERROR";
if($usuario != null){
    $msg=" El email se a encontrado en la base de datos.";

    $mail=new PHPMailer();
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
            $mail->Encoding = "base64";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = "colombia.h.ackintohs.01@gmail.com"; // Usuario servidor de correo
            $mail->Password = "racatlzwwhyrqnbn";      // Contraseña del usuario
            $mail->setFrom('colombia.h.ackintohs.01@gmail.com', 'Administrador de Hackintosh');
            $mail->addReplyTo('usuario@servidor.com', 'Administrador de Hackintosh');
            $mail->AddAddress($Email);
            $mail->Subject  = "Cambio de contraseña en su cuenta";
            $mail->IsHTML(true);
            $body= file_get_contents("../../Vista/paginas/datos_admin/msj_Email.html");
            $body = str_replace('%usuario%', $usuario->getNombre(), $body);
            $body = str_replace('%password%', $usuario->getPassword(), $body);
            $mail->MsgHTML($body);
            $mail->WordWrap = 50;
            $type_msg="success"; //Con éxito

            if($mail->Send()){
                $msg="Puede realizar la recuperación de la contraseña ingresando a  su correo: ".$Email;
            }else{
                $msg="No se pudo enviar el correo a ".$Email;
                $type_msg="ERROR";
                
            }



        }

        $resultado = [
            'msg' => $msg,
            "type" => $type_msg
        ]; //Vector PHP
        
        echo json_encode($resultado); // Convirtiendo en jSon
        


?>