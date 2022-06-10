<?php
session_start();
require_once(__DIR__ ."/../mdb/mdbUsuario.php");
$idUsuario=filter_input(INPUT_POST,'IdUsuario');


$estado=$idUsuario;
eliminarUsuario($idUsuario);
$msg="Usuario Eliminado exitosamente";

$result=[
    'estado'=>$estado,
    'msg'=>$msg
];

echo json_encode($result);

