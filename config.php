<?php
$servername = "localhost";
$username = "root"; // Altere se necessário
$password = ""; // Altere se necessário
$dbname = "estoque";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
