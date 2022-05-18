<?php
session_start();
require_once(__DIR__.'/../../mdb/mdbUsuario');
$usuario = VerUsuarios();

echo json_encode($usuario);

?>