<?php
session_start();
require_once(__DIR__.'/../../mdb/mdbUsuario');
$usuario = verUsuarios();

echo json_encode($usuarios);

?>