<?php

namespace toniDespierta;
include_once 'IndexController.php';

class conexion extends mysqli
{

    private $hostname = 'sldi699.piensasolutions.com';
    private $username = "root";
    private $password = 'Columpio1234';
    private $database = 'qaja615';

    public function local()
    {
        //lo que inicia sesion viene extendido de mysqli
        parent::__construct($this->hostname, $this->username, $this->password, $this->database);

        //Por si hay algun error
        if (mysqli_connect_error()) {
            die("ERROR DATABASE" . mysqli_connect_error());
        }
    }



    public function default()
    {
        $this->local();
    }

}