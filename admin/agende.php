<?php


require_once("conexao.php");

$conexao = Conexao::LigarConexao(); // agora a variavel $conexao recebe o metodo LigarConexao() da classe Conexao

$conexao->exec("SET NAMES utf8"); // exec executa um comando dentro do banco de dados

if(!$conexao){ // verifica a conexão
    echo "Não foi possível conectar-se com o banco de dados!";
}

$query = $conexao->prepare("SELECT * FROM `servico` WHERE statusServico = 'ATIVO' ORDER BY nomeServico ASC"); // prepara uma ação do sql e armazena em $query

$query->execute();

// [{"name":"John"}]

$json = "[";

while ($r = $query->fetch()) { // o $r é o nosso contador, cada vez que roda acrescenta em 1 - fetch() percorre toda a matriz
    
    if($json != "["){       // primeiro ele pergunta se é diferente de [, que é o seu primeiro estado. ao passar pela primeira vez no loop seu estado já é diferente de [ e então aplica-se a ","
        $json .= ",";       
    }

    $json .= '{"idServico":"' .$r["idServico"]. '",'; // PRIMEIRO 

        $json .= '"nomeServico":"' .$r["nomeServico"]. '",'; // NOME 

        $json .= '"descricaoServico":"' .$r["descricaoServico"]. '",';

        $json .= '"valorServico":"' .$r["valorServico"]. '",'; // VALOR  

        $json .= '"statusServico":"' .$r["statusServico"]. '",'; // VALOR  

        $json .= '"dataCadServico":"' .$r["dataCadServico"]. '",'; // VALOR  

        $json .= '"tempoExecServico":"' .$r["tempoExecServico"]. '",'; // VALOR  

    $json .= '"idEmpresa":"' .$r["idEmpresa"]. '"}'; // ULTIMO 

} // FIM DO LAÇO

$json .= "]";

echo $json
/* até aqui, foi escrito na tela o que tem no banco */

?>