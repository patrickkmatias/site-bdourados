<?php


require_once("conexao.php");

$conexao = Conexao::LigarConexao(); 

$conexao->exec("SET NAMES utf8"); 

if(!$conexao){ 
    echo "Não foi possível conectar-se com o banco de dados!";
}

$query = $conexao->prepare("
    SELECT
        funcionario.idFuncionario,
        nomeFuncionario,
        fotoFuncionario,
        descFuncionario,
        repFuncionario,
        GROUP_CONCAT(fotoPortfolio) 'fotosPortfolio'
    FROM
        funcionario
    LEFT JOIN portfolio 
    ON funcionario.idFuncionario = portfolio.idFuncionario
");

$query->execute();

$json = array();

while ($r = $query->fetch(PDO::FETCH_ASSOC)) { // o $r é o nosso contador, cada vez que roda acrescenta em 1 - fetch() percorre toda a matriz
    array_push($json , $r);
};

// segunda query para buscar o banner

$queryBanner = $conexao->prepare("SELECT * FROM banner_app");

$queryBanner->execute();

$jsonBanner = array();

while ($r = $queryBanner->fetch(PDO::FETCH_ASSOC)) {
    array_push($jsonBanner, $r);
};

echo json_encode($json, JSON_UNESCAPED_UNICODE);

echo json_encode($jsonBanner, JSON_UNESCAPED_UNICODE);
/* até aqui, foi escrito na tela o que tem no banco */

?>