<?php


    header("Access-Control-Allow-Origin: *");

    class Conexao{

        public static function LigarConexao(){

            $connect = new PDO("mysql:host=localhost;dbname=bdouradosdb","root","");
            return $connect;

        }

    }


?>