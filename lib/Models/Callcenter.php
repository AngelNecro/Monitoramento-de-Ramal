<?php
include_once("./Config/ConexaoDB.php");

class Callcenter
{
    private $statusRamal;
    private $id;

    public function __construct($statusRamal,)
    {
        $this->statusRamal = $statusRamal;
        $this->id = $this->get_id($statusRamal);
    }

    function get_statusRamal()
    {
        return $this->statusRamal;
    }
    function set_statusRamal($statusRamal)
    {
        $this->statusRamal = $statusRamal;
    }

    public function get_id()
    {
        $db = new MYSQL();
        $stm = $db->returnConnection();
        $row = $stm->query("SELECT id FROM callcenter WHERE statusRamal='$this->statusRamal')");
        return $row;
    }
}
