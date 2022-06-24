<?php

/**
 * Você deverá transformar em uma classe

 */
header("Content-type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

class cliente
{

    function status_ramal()
    {
        $status_ramais = array();
        $filas = file('filas');
        foreach ($filas as $linhas) {
            if (strpos($linhas, 'SIP/')) {
                if (strpos($linhas, '(Ring)')) {
                    $linha = explode(' ', trim($linhas));
                    list($tech, $ramal) = explode('/', $linha[0]);
                    $status_ramais[$ramal] = array('status' => 'chamando');
                }
                if (strpos($linhas, '(In use)')) {
                    $linha = explode(' ', trim($linhas));
                    list($tech, $ramal) = explode('/', $linha[0]);
                    $status_ramais[$ramal] = array('status' => 'ocupado');
                }
                if (strpos($linhas, '(Not in use)')) {
                    $linha = explode(' ', trim($linhas));
                    list($tech, $ramal)  = explode('/', $linha[0]);
                    $status_ramais[$ramal] = array('status' => 'disponivel');
                }
                if (strpos($linhas, '(Unavailable)')) {
                    $linha = explode(' ', trim($linhas));
                    list($tech, $ramal)  = explode('/', $linha[0]);
                    $status_ramais[$ramal] = array('status' => 'indisponivel');
                }
                if (strpos($linhas, '(paused)') and strpos($linhas, '(Not in use)')) {
                    $linha = explode(' ', trim($linhas));
                    list($tech, $ramal)  = explode('/', $linha[0]);
                    $status_ramais[$ramal] = array('status' => 'pausado');
                }
            }
        }
        return ($status_ramais);
    }


    function nome_ramal()
    {
        $nomes_ramais = array();
        $filas2 = file('filas');
        foreach ($filas2 as $linhas2) {
            if (strpos($linhas2, 'SIP/')) {
                $linha2 = explode(' ', trim($linhas2));
                list($tech, $ramal2) = explode('/', $linha2[0]);
                $nomes_ramais[$ramal2] = array('usuario' => end($linha2));
            }
        }

        return ($nomes_ramais);
    }
    function info_ramal()
    {
        $status_ramais2 = $this->status_ramal();
        $usuario = $this->nome_ramal();
        $ramais = file('ramais');
        $info_ramais = array();

        foreach ($ramais as $linhas) {
            $linha = array_filter(explode(' ', $linhas));
            $arr = array_values($linha);
            array_push($arr, "controle");

            if (trim($arr[1]) == '(Unspecified)' and trim($arr[4]) == 'UNKNOWN') {
                list($name, $username) = explode('/', $arr[0]);
                $info_ramais[$name] = array(
                    'nome' => $name,
                    'ramal' => $username,
                    'online' => false,
                    'status' => $status_ramais2[$name]['status'],
                    'usuario' => $usuario[$name]['usuario']


                );
            }


            if (trim($arr[5]) == "OK") {
                list($name, $username) = explode('/', $arr[0]);
                $info_ramais[$name] = array(
                    'nome' => $name,
                    'ramal' => $username,
                    'online' => true,
                    'status' => $status_ramais2[$name]['status'],
                    'usuario' => $usuario[$name]['usuario']


                );
            }
        }

        echo json_encode($info_ramais);
    }
}
$minhaClasse = new cliente();
$minhaClasse->info_ramal();

/*

include("./Config/ConexaoDB.php");
$db = new MYSQL();
$db->returnConnection();


include("./Models/Ramal.php");
$ramal = new Ramal(7002, '7004', 1812191257, 4, 5);
echo $ramal->readAll($ramal);
*/