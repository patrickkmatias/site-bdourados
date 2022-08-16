<?php 



require_once("conexao.php");



$conexao = Conexao::LigarConexao(); 



$conexao->exec("SET NAMES utf8"); 



if(!$conexao){ 

    echo "Não foi possível conectar-se com o banco de dados!";

}



if(isset($_GET['email']) || isset($_GET['senha'])) {

    

    

$email = $_GET['email'];

$senha = $_GET['senha'];

if(is_numeric($email)) 
    $query = $conexao->prepare("
    SELECT
        numeroFoneCliente, senhaCliente, nomeCliente, emailCliente, statusCliente, dataCadCliente, fotoCliente
    FROM
        fonecliente
    JOIN cliente ON cliente.idCliente = fonecliente.idCliente
    WHERE
        numeroFoneCliente = $email && senhaCliente = '$senha'
        ");
    else 

    $query = $conexao->prepare("SELECT * FROM cliente WHERE emailCliente = '$email' and senhaCliente = '$senha'" );


$query->execute();



$json = array();



$dados = $query->fetch(PDO::FETCH_ASSOC);



if($dados) {

    $loginJson = array(

        'msg' => array(
            'logado'=>'Sim',
            'texto'=>'Logado com sucesso'
        ),
        'Dados' => $dados
    );

    array_push($json , $loginJson);
}else{

    $loginJson = array(
        "msg" => array(
            'logado'=>'Não',
            'texto'=>'Usuário inválido'
        ),
        "Dados" => $dados
    );

    array_push($json, $loginJson);
};



echo json_encode($json, JSON_UNESCAPED_UNICODE);



}

?>