<?php


require_once("conexao.php");

$conexao = Conexao::LigarConexao(); // agora a variavel $conexao recebe o metodo LigarConexao() da classe Conexao

$conexao->exec("SET NAMES utf8"); // exec executa um comando dentro do banco de dados

if(!$conexao){ // verifica a conexão
    echo "Não foi possível conectar-se com o banco de dados!";
}

if(isset($_GET['idFuncionario'])) {

    $idFuncionario = $_GET['idFuncionario'];

    $query = $conexao->prepare("
    SELECT
        funcionario.idFuncionario,
        LOWER(nomeFuncionario) 'nomeFuncionario',
        fotoFuncionario,
        descFuncionario,
        repFuncionario,
        idAvaliacao,
        textoAvaliacao,
        repAvaliacao,
        dataEnvioAvaliacao,
        cliente.idCliente,
        nomeCliente,
        fotoCliente,
        idPortfolio,
        GROUP_CONCAT(fotoPortfolio) 'fotosPortfolio'
    FROM
        funcionario
    LEFT JOIN avaliacao ON avaliacao.idFuncionario = funcionario.idFuncionario
    LEFT JOIN cliente ON avaliacao.idCliente = cliente.idCliente
    LEFT JOIN portfolio ON portfolio.idFuncionario = funcionario.idFuncionario
    WHERE
        nivelFuncionario = 'BARBEIRO' && funcionario.idFuncionario = $idFuncionario
    "); // prepara uma ação do sql e armazena em $query

    $query->execute();

    $json = array();

    $dados = $query->fetch(PDO::FETCH_ASSOC);

    array_push($json, $dados);

    echo json_encode($json, JSON_UNESCAPED_UNICODE);
    /* até aqui, foi escrito na tela o que tem no banco */
}

?>