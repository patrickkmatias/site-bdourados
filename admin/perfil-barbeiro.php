<?php


require_once("conexao.php");

$conexao = Conexao::LigarConexao(); // agora a variavel $conexao recebe o metodo LigarConexao() da classe Conexao

$conexao->exec("SET NAMES utf8"); // exec executa um comando dentro do banco de dados

if(!$conexao){ // verifica a conexão
    echo "Não foi possível conectar-se com o banco de dados!";
}

if(isset($_GET['idBarbeiro'])) {

    $idBarbeiro = $_GET['idBarbeiro'];

    $query = $conexao->prepare("SELECT * FROM `funcionario` WHERE nivelFuncionario = 'BARBEIRO'"); // prepara uma ação do sql e armazena em $query

    $query->execute();

    $json = $query->fetch(PDO::FETCH_ASSOC);

    array_push($json, $dados);

    echo json_encode($json, JSON_UNESCAPED_UNICODE);
    /* até aqui, foi escrito na tela o que tem no banco */
}

?>