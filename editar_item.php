<?php
include 'config.php'; // Inclui o arquivo de configuração do banco de dados

// Verifica se o ID do item foi passado na URL
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    // Validação do ID
    if (filter_var($item_id, FILTER_VALIDATE_INT) === false) {
        echo "<script>alert('ID inválido!');</script>";
        exit;
    }

    // Consulta para recuperar os dados do item
    $sql = "SELECT nome, tamanho, quantidade, preco FROM itens WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $item = $result->fetch_assoc();
    } else {
        echo "<script>alert('Item não encontrado!');</script>";
        exit;
    }

    // Processa o formulário de edição
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $tamanho = $_POST['tamanho'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];

        // Atualiza o item no banco de dados
        $updateSql = "UPDATE itens SET nome=?, tamanho=?, quantidade=?, preco=? WHERE id=?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ssddi", $nome, $tamanho, $quantidade, $preco, $item_id);

        if ($updateStmt->execute()) {
            echo "<script>alert('Item atualizado com sucesso!'); window.location.href='index.php';</script>"; // Redireciona após a atualização
            exit;
        } else {
            echo "<script>alert('Erro ao atualizar item: " . htmlspecialchars($updateStmt->error) . "');</script>";
        }
    }
} else {
    echo "<script>alert('ID não fornecido!');</script>";
    exit;
}

$conn->close(); // Fechar a conexão
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item - Leila Noivas</title>
</head>
<body>
    <div class="container">
        <h2>Editar Item</h2>
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($item['nome']); ?>" required><br>

            <label for="tamanho">Tamanho:</label>
            <input type="text" name="tamanho" value="<?php echo htmlspecialchars($item['tamanho']); ?>" required><br>

            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" value="<?php echo htmlspecialchars($item['quantidade']); ?>" required><br>

            <label for="preco">Preço:</label>
            <input type="number" step="0.01" name="preco" value="<?php echo htmlspecialchars($item['preco']); ?>" required><br>

            <button type="submit">Atualizar Item</button>
            <a href="menu.php">Cancelar</a> <!-- Link para voltar à lista -->
        </form>
    </div>
</body>
</html>
