<?php
session_start();

require_once(__DIR__."/../mdb/mdb/mdbUsuario.php");
require_once(__DIR__."/../../Vista/js/librerias/PHPMailer/PHPMalerAutoload.php");

$Email = filter_input(INPUT_POST,'Email');
$user = VerUsuario_Por_email(INPUT_POST,'Email');
$msg= "El email no es valido verifique el campo.";
$type_msg="ERROR";
if($user != null){
    $msg=" El email se a encontrado en la base de datos.";

    $mail=new PHPMailer();
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
            $mail->Encoding = "base64";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = "colombia.h.ackintohs.01@gmail.com"; // Usuario servidor de correo
            $mail->Password = "Unimagdalena01";      // Contraseña del usuario
            $mail->setFrom('colombia.h.ackintohs.01@gmail.com', 'Administrador de Hackintosh');
            $mail->addReplyTo('usuario@servidor.com', 'Administrador de Hackintosh');
            $mail->AddAddress($Email);
            $mail->Subject  = "Cambio de contraseña en su cuenta";
            $mail->IsHTML(true);
            $body= file_get_contents("/../../Vista/paginas/datos_admin/msj_Emil.html");
            $body = str_replace('%usuario%', $user->getNombre(), $body);
            $body = str_replace('%password%', $user->getPassword(), $body);
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