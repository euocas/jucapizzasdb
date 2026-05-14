<?php

if (!function_exists('http_response_code')) {
    function http_response_code($code = null)
    {
        static $current = 200;
        if ($code === null) {
            return $current;
        }
        $code = (int) $code;
        $current = $code;
        $phrases = array(
            200 => 'OK',
            201 => 'Created',
            400 => 'Bad Request',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        $phrase = isset($phrases[$code]) ? $phrases[$code] : 'Unknown';
        $proto = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0';
        header($proto . ' ' . $code . ' ' . $phrase, true);
        return $code;
    }
}

class Database {
    private $host = 'localhost';
    private $db_name = 'jucapizzasdb';
    private $username = 'root';
    private $password = 'usbw';
    private $port = '3307';
    
    public $conn;
    public function getConnection()
    {
        $this->conn = null;

     try {
        //tenta executar um código potencialmente perigoso
        //DSN (Data Source Name) é uma string que contém as informações necessárias para se conectar a um banco de dados

        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db_name . ';charset=utf8';
        //Cria uma nova conexão PDO usando o DSN, nome de usuário e senha fornecidos
        $this->conn = new PDO($dsn, $this->username, $this->password);

        //Define o modo de erro do PDO para exceção
        //Isso faz com que o PDO lance exceções em caso de erros, facilitando o tratamento de erros
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     } catch (PDOException $e) {
        //Em caso de erro na conexão, exibe a mensagem de erro
        echo "Connection error: " . $e->getMessage();

     } catch (Exception $e) {
            //Em caso de erro geral, exibe a mensagem de erro
            echo "General error: " . $e->getMessage();
         }
         return $this->conn;
    }
    }