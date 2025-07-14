<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="restilo.css">
</head>
<body>
    <center>
        <h1>Registre-se para ter acesso a <code>RSJNews</code></h1>

        <?php
        function validarEmail($email) {
            $padrao = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            return preg_match($padrao, $email);
        }

        function validarDataNascimento($dataNascimento) {
            $dataNascimentoObj = new DateTime($dataNascimento);
            $dataAtual = new DateTime();
            
            $idadeMinima = 13;
            $idade = $dataNascimentoObj->diff($dataAtual)->y;

            if ($dataNascimentoObj->format("Y") < 1900 || $dataNascimentoObj > $dataAtual) {
                return false;
            }

            return $idade >= $idadeMinima;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
            $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
            $repetirsenha = isset($_POST['repetirsenha']) ? $_POST['repetirsenha'] : '';
            $idade = isset($_POST['nascimento']) ? $_POST['nascimento'] : '';

            if (!validarEmail($email)) {
                echo "<p style='color:red;'>Erro: O e-mail informado não é válido!</p>";
            } elseif (!validarDataNascimento($idade)) {
                echo "<p style='color:red;'>Erro: Data de nascimento inválida ou idade mínima não atendida!</p>";
            } elseif ($senha !== $repetirsenha) {
                echo "<p style='color:red;'>Erro: As senhas não coincidem!</p>";
            } elseif (strlen($senha) < 8) {
                echo "<p style='color:red;'>Erro: A senha deve ter pelo menos 8 caracteres!</p>";
            } else {
                $user = "root"; 
                $password = ""; 
                $database = "RSJNews"; 
                $hostname = "localhost";

                $conexao = mysqli_connect($hostname, $user, $password, $database);
                if (!$conexao) {
                    die("<p style='color:red;'>Erro na conexão: " . mysqli_connect_error() . "</p>");
                }

                $verf = mysqli_prepare($conexao, "SELECT * FROM User WHERE email = ?");
                mysqli_stmt_bind_param($verf, "s", $email);
                mysqli_stmt_execute($verf);
                $result = mysqli_stmt_get_result($verf);

                $uv = mysqli_prepare($conexao, "SELECT * FROM User WHERE usuario = ?");
                mysqli_stmt_bind_param($uv, "s", $usuario);
                mysqli_stmt_execute($uv);
                $executar = mysqli_stmt_get_result($uv);

                if (mysqli_num_rows($result) > 0) {
                    echo "<p style='color:red;'>Já existe um usuário cadastrado com esse e-mail. Tente novamente!</p>";
                } elseif (mysqli_num_rows($executar) > 0) {
                    echo "<p style='color:red;'>Já existe alguém cadastrado com esse usuário. Tente novamente!</p>";
                } else {
                    $stmt = mysqli_prepare($conexao, "INSERT INTO User (email, usuario, senha, nascimento) VALUES (?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt, "ssss", $email, $usuario, $senha, $idade);

                    if (mysqli_stmt_execute($stmt)) {
                        header("Location: principal.php");
                        exit;
                    } else {
                        echo "<p style='color:red;'>Erro ao registrar usuário!</p>";
                    }
                    mysqli_stmt_close($stmt);
                }

                mysqli_stmt_close($verf);
                mysqli_stmt_close($uv);
                mysqli_close($conexao);
            }
        }
        ?>

        <form action="registro.php" method="post">
            <div class="container">
                <h1>Registrar</h1>
                <div class="input-group">
                    <input type="text" placeholder="E-mail" name="email" required>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Usuário" name="usuario" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Senha" name="senha" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Repetir senha" name="repetirsenha" required>
                </div>
                <div class="input-group">
                    <input type="date" name="nascimento" required>
                </div>
                    <button>Registrar</button>
            </div>
        </form>
    </center>
</body>
</html>