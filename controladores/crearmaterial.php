<?php
require_once '../modelos/Materiales.php';

$nombre = $_POST['nombre'];
$familia = $_POST['familia'];
$espesor = $_POST['espesor'];

$insertar = new Materiales;
if ($insertar) {
    $insertar = $insertar->insertarMaterial($nombre, $familia, $espesor);
}else{
    echo 'fallo al conectar';
}

?>