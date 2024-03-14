<?php


class llegadas
{
    public  $id;
    public  $nombre;
    public  $hora_llegada;

    /**
     * @param $id
     * @param $nombre
     * @param $hora_llegada
     */
    public function __construct($id, $nombre, $hora_llegada)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->hora_llegada = $hora_llegada;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getHoraLlegada()
    {
        return $this->hora_llegada;
    }

    /**
     * @param mixed $hora_llegada
     */
    public function setHoraLlegada($hora_llegada): void
    {
        $this->hora_llegada = $hora_llegada;
    }

}