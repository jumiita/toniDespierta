<?php


include_once 'conexion.php';
include_once 'llegadas.php';

class IndexModelo
{

    private conexion $bd;

    public function __construct()
    {
        $this->bd = new conexion();
    }

    public function listado(){
        $sql = "SELECT * FROM llegadas_toni";
        $this->bd->default();
        $query = $this->bd->query($sql);
        $this->bd->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new \llegadas($resultado['id'],$resultado['nombre'],$resultado['hora_llegada']);
        }
        return $return;
    }


}