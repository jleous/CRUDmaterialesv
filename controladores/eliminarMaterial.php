<?php

require_once '../modelos/Materiales.php';
$id = $_POST['id'];
$eliminar = new Materiales;
$eliminar = $eliminar->eliminarMaterial($id);