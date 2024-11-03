<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leila Noivas - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script>
        function validarLogin(event) {
            event.preventDefault(); // Impede o envio do formulário

            // Obtém os valores dos campos
            const matricula = document.getElementById('matricula').value;
            const senha = document.getElementById('password').value;

            // Credenciais corretas
            const matriculaCorreta = '01700933';
            const senhaCorreta = '123';

            // Verifica se as credenciais estão corretas
            if (matricula === matriculaCorreta && senha === senhaCorreta) {
                alert("Login bem-sucedido!");
                window.location.href = "menu.php"; // Redireciona para a página estoque.php
            } else {
                alert("Matrícula ou senha incorretas. Tente novamente.");
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <img src="img/logo leila_noiva.png" alt="logo">
        <div class="login-box">
            <h2>Login</h2>
            <form onsubmit="validarLogin(event)"> <!-- Chamando a função de validação -->
                <div class="input-group">
                    <label for="matricula">
                        <i class="fas fa-user"></i> 
                    </label>
                    <input type="text" id="matricula" placeholder="Digite sua matrícula" required> <!-- Alterado para matrícula -->
                </div>
                <div class="input-group">
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" id="password" placeholder="Digite a sua senha" required>
                </div>
                <button type="submit">Entrar</button> <!-- Botão de envio -->
            </form>
        </div>
    </div>
</body>
</html>
