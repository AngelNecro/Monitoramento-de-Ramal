<?php
class MYSQL
{

  private $_dbHostname = "localhost";
  private $_dbName = "ramais";
  private $_dbUsername = "root";
  private $_dbPassword = "";
  private $_con;

  public  function __construct()
  {
    try {
      $this->_con = new PDO("mysql:host=$this->_dbHostname;dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);
      $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "conectado com sucesso";
    } catch (PDOException  $e) {
      echo "Falha ao conectar: " . $e->getMessage();
    }
  }
  public function returnConnection()
  {
    return $this->_con;
  }
}
