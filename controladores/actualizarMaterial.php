<?php
require_once '../modelos/Materiales.php';
$id = $_POST['idu'];
$nombre = $_POST['nombreu'];
$familia = $_POST['familiau'];
$espesor = $_POST['espesoru'];

$actualizar = new Materiales;
if ($actualizar) {
    $actualizar = $actualizar->actualizarMaterial($id, $nombre, $familia, $espesor);
}else{
    echo 'fallo al conectar';
}

?>