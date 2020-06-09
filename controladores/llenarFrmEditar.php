<?php
require_once '../modelos/Materiales.php';

$id = $_POST['id'];
$material = new Materiales;
$material = $material->mostrarMaterial($id);
$material = array(
    "id"=>$material[0],
    "nombre"=>$material[1],
    "familia"=>$material[2],
    "espesor"=>$material[3]
);
$material = json_encode($material);
echo $material;