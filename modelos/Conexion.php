<?php 
class Conexion
{
    public $con;
    function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'pellacani');
    }
}