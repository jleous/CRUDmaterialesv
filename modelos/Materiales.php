<?php
require_once 'conexion.php';

class Materiales extends Conexion
{
    function mostrarMateriales()
    {
        $sql = "SELECT * FROM materiales WHERE eliminado='0'";
        $materiales = ($this->con->query($sql))->fetch_all();
        return $materiales;
    }

    function insertarMaterial($nombre, $familia, $espesor)
    {
        $sqlveri = "SELECT * FROM materiales WHERE (nombre = '$nombre' AND familia = '$familia' AND espesor = '$espesor')";
        $veri = $this->con->query($sqlveri);
        if ($veri->num_rows > 0) {
            echo 'Material Ya existe';
        } else {

            $sql = "INSERT INTO materiales (nombre,familia,espesor,eliminado) VALUES ('$nombre','$familia','$espesor','0')";
            $insertar = $this->con->query($sql);
            if ($insertar) {
                echo 'insertado con exito';
            } else {
                echo 'fallo al insertar';
            }
        }
    }
    function eliminarMaterial($id)
    {
        $sql = "UPDATE materiales SET eliminado='1' WHERE id='$id'";
        $eliminar = $this->con->query($sql);
        if ($eliminar) {
            echo 1;
        }
    }
    function mostrarMaterial($id)
    {
        $sql = "SELECT * FROM materiales WHERE id='$id'";
        $material = $this->con->query($sql);
        if ($material->num_rows > 0) {
            $material = $material->fetch_row();
            return $material;
        }
    }
    function actualizarMaterial($id, $nombre, $familia, $espesor)
    {
        $sqlveri = "SELECT * FROM materiales WHERE (nombre = '$nombre' AND familia = '$familia' AND espesor = '$espesor')";
        $veri = $this->con->query($sqlveri);
        if ($veri->num_rows > 0) {
            echo 'Material Ya existe';
        } else {

            $sql = "UPDATE materiales SET nombre='$nombre',familia='$familia',espesor='$espesor' WHERE id='$id'";
            $actualizar = $this->con->query($sql);
            if ($actualizar) {
                echo 'Actualizado con exito';
            } else {
                echo 'fallo al actualizar';
            }
        }
    }
}




