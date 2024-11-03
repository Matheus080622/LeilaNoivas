<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Item</title>
    <link rel="stylesheet" href="estoque.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Item</h1>
        <form action="insert_item.php" method="POST">
            <input type="text" name="nome" placeholder="Nome do Item" required>
            <input type="text" name="tamanho" placeholder="Tamanho" required>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <input type="number" step="0.01" name="preco" placeholder="Preço" required>
            <button type="submit">Adicionar Item</button>
        </form>
        <a href="view_items.php">Ver Itens Adicionados</a>
    </div>
</body>
</html>
