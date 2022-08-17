<?php

require_once("conexao.php");

$conexao = Conexao::LigarConexao(); 

$conexao->exec("SET NAMES utf8"); 

if(!$conexao){ 
    echo "Não foi possível conectar-se com o banco de dados!";
}



$query = $conexao->prepare("SELECT * FROM banner_app");

$query->execute();

$json = array();

while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
    array_push($json, $r);
};


echo json_encode($json, JSON_UNESCAPED_UNICODE); 

?>