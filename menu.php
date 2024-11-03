<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Leila Noivas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura da tela */
            margin: 0;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Espaçamento entre os botões */
        }

        .menu button {
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background-color: #4CAF50; /* Cor do botão */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Transição suave */
        }

        .menu button:hover {
            background-color: #45a049; /* Cor do botão ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="menu">
        <button onclick="window.location.href='estoque.php'">Adicionar Novo Item</button>
        <button onclick="window.location.href='view_items.php'">Lista de Itens</button>
        <button onclick="window.location.href='editar_itens.php'">Editar Itens</button>
    </div>
</body>
</html>
