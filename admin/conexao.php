<?php


    header("Access-Control-Allow-Origin: *");

    class Conexao{

        public static function LigarConexao(){

            $connect = new PDO("mysql:host=localhost;dbname=id19036169_bdouradosdb","id19036169_pmattheew","#0Gl}^v|hZLI=4)U");
            return $connect;

        }

    }


?>