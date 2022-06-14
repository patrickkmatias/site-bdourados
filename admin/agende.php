<?php


require_once("conexao.php");

$conexao = Conexao::LigarConexao(); // agora a variavel $conexao recebe o metodo LigarConexao() da classe Conexao

$conexao->exec("SET NAMES utf8"); // exec executa um comando dentro do banco de dados

if(!$conexao){ // verifica a conexão
    echo "Não foi possível conectar-se com o banco de dados!";
}

$query = $conexao->prepare("SELECT *, replace(valorServico,'.',',') valorComma FROM `servico` WHERE statusServico = 'ATIVO' ORDER BY nomeServico ASC"); // prepara uma ação do sql e armazena em $query

$query->execute();

$json = array();

while ($r = $query->fetch(PDO::FETCH_ASSOC)) { // o $r é o nosso contador, cada vez que roda acrescenta em 1 - fetch() percorre toda a matriz
    array_push($json , $r);
}

echo json_encode($json, JSON_UNESCAPED_UNICODE);
/* até aqui, foi escrito na tela o que tem no banco */

?>