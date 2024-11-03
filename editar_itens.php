<?php
include 'config.php'; // Inclui o arquivo de configuração do banco de dados

// Verifica se o ID foi enviado via POST para exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Prepara a consulta para excluir o item
    $deleteSql = "DELETE FROM itens WHERE id=?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $delete_id);

    if ($deleteStmt->execute()) {
        echo "<script>alert('Item excluído com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao excluir item: " . $deleteStmt->error . "');</script>";
    }
}

// Consulta para recuperar itens
$sql = "SELECT id, nome, tamanho, quantidade, preco FROM itens";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Itens - Leila Noivas</title>
    <link rel="stylesheet" href="style.css"> <!-- Inclua seu CSS aqui -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50; /* Cor de fundo do cabeçalho */
            color: white; /* Cor do texto do cabeçalho */
        }

        tr:hover {
            background-color: #f1f1f1; /* Cor de fundo ao passar o mouse */
        }

        .button {
            padding: 5px 10px;
            color: white;
            background-color: #007BFF; /* Azul */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-danger {
            background-color: #dc3545; /* Vermelho */
        }
        
        .button:hover {
            opacity: 0.9; /* Efeito ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Itens</h2>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tamanho</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["nome"]); ?></td>
                        <td><?php echo htmlspecialchars($row["tamanho"]); ?></td>
                        <td><?php echo htmlspecialchars($row["quantidade"]); ?></td>
                        <td>R$<?php echo number_format($row["preco"], 2, ',', '.'); ?></td>
                        <td>
                            <!-- Botão para editar -->
                            <button class="button" onclick="window.location.href='editar_item.php?id=<?php echo $row['id']; ?>'">Editar</button>

                            <!-- Formulário para excluir -->
                            <form action="" method="POST" style="display:inline;">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="button button-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>Nenhum item encontrado.</p>
        <?php endif; ?>

    </div>

    <?php $conn->close(); // Fechar a conexão ?>
</body>
</html>
