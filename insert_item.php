<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $tamanho = $_POST['tamanho'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    // Preparar a consulta SQL
    $stmt = $conn->prepare("INSERT INTO itens (nome, tamanho, quantidade, preco) VALUES (?, ?, ?, ?)");
    
    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Vincular os parâmetros
    $stmt->bind_param("ssis", $nome, $tamanho, $quantidade, $preco);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Novo item adicionado com sucesso!";
        echo "<br><a href='index.php'>Adicionar outro item</a>";
        echo "<br><a href='view_items.php'>Ver Itens Adicionados</a>";
    } else {
        echo "Erro ao adicionar item: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
}

$conn->close();
?>
