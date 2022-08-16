<?php


require_once("conexao.php");
header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Method: POST');

$data = file_get_contents("php://input");
$objData = json_decode($data);

$nome = $objData->nome;
$email = $objData->email;
$senha = $objData->senha;

$dataCad = date('Y-m-d');
$status = 'ATIVO';
$fotoUser = 'cliente/user.png';

$nome = stripcslashes($nome);
$email = stripcslashes($email);
$senha = stripcslashes($senha);


$nome = trim($nome);
$email = trim($email);

$conexao = Conexao::LigarConexao(); // agora a variavel $conexao recebe o metodo LigarConexao() da classe Conexao

$conexao->exec("SET NAMES utf8"); // exec executa um comando dentro do banco de dados

if(!$conexao){ // verifica a conexão

    $dadosCadastro = array('mens' => 'Não foi possível realizar seu cadastro.');

    echo json_encode($dadosCadastro);

}else{

    $query = $conexao->prepare("
    INSERT INTO cliente (nomeCliente,emailCliente,senhaCliente,statusCliente,dataCadCliente,fotoCliente)VALUES('$nome','$email','$senha','$status','$dataCad','$fotoUser');
    ");

    $query->execute();

    $dadosCadastro = array('mens' => 'Dados cadastrado com sucesso.');

    echo json_encode($dadosCadastro);
    
}
?>