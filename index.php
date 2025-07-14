<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <link rel="stylesheet" href="lestilo.css">
</head>
<body>
    <center>
        <h1>Olá! Seja bem-vindo a <b><code>RSJNews</code></b>, porém é necessário que faça login ou registro!</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

            $user = "root";
            $password = "";
            $database = "RSJNews";
            $hostname = "localhost";

            $conexao = mysqli_connect($hostname, $user, $password, $database);
            if (!$conexao) {
                die("<p style='color:red;'>Erro na conexão: " . mysqli_connect_error() . "</p>");
            }

            $stmt = mysqli_prepare($conexao, "SELECT usuario, senha FROM User WHERE email = ?");
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                if ($senha === $row['senha']) {
                    echo "Seja bem-vindo " . $row['usuario'] . "!";
                    header("Location: principal.php");
                    exit;
                } else {
                    echo "<p style='color:red;'>Senha incorreta ou usuário não cadastrado! Tente novamente.</p>";
                }
            } else {
                echo "<p style='color:red;'>E-mail não encontrado! Tente novamente.</p>";
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conexao);
        }
        ?>

        <form action="index.php" method="post">
            <div class="container">
                <h1>Entrar</h1>
                <div class="input-group">
                    <input type="email" placeholder="E-mail" name="email" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Senha" name="senha" required>
                </div>
                <a href="registro.php">Não possui login? Cadastre-se agora!</a>
                <button>Login</button>
            </div>
        </form>
    </center>
</body>
</html>