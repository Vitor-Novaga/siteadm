<?php
$servername = "localhost"; // Endereço do servidor
$username = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL
$dbname = "devmedia_db"; // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>