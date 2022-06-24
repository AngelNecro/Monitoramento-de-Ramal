<?php
include_once("./Config/ConexaoDB.php");

class Usuario
{
    private $nome;
    private $id;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->id = $this->get_id($nome);
    }

    function get_nome()
    {
        return $this->nome;
    }
    function set_nome($nome)
    {
        $this->nome = $nome;
    }

    public function get_id()
    {
        $db = new MYSQL();
        $stm = $db->returnConnection();
        $row = $stm->query("SELECT id FROM usuarios WHERE name = '$this->nome';");
        $result = $row->fetch();
        return intval($result['id']);
    }
    public function create(Usuario $usuario)
    {
        $db = new MYSQL();
        $stm = $db->returnConnection();
        $row = $stm->query("INSERT INTO usuarios(name) VALUES ('$usuario->nome')");
        var_dump($row ? "deu certo" : "deu ruim");
    }
}
