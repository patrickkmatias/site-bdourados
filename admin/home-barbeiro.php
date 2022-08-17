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
    GROUP_CONCAT(fotoPortfolio) 'fotosPorfolio'
FROM
    funcionario
LEFT JOIN portfolio ON funcionario.idFuncionario = portfolio.idFuncionario
WHERE
    statusFuncionario = 'ATIVO' && nivelFuncionario = 'BARBEIRO'
GROUP BY
    funcionario.idFuncionario
ORDER BY
    RAND()
LIMIT 1
");

$query->execute();

$json = array();

while ($r = $query->fetch(PDO::FETCH_ASSOC)) { // o $r é o nosso contador, cada vez que roda acrescenta em 1 - fetch() percorre toda a matriz
    array_push($json , $r);
};

echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>