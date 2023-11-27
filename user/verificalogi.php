<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "site_noticia";

try {
    $conn = new mysqli($servername, $username, $password, $database);
} catch (mysqli_sql_exception $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $query = "SELECT id, email, senha FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($row = $result->fetch_assoc()) {
            // Verifica a senha
            if (password_verify($senha, $row['senha'])) {
                // Senha correta, cria a sessão de login
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                header("Location: ../menu.php"); // Redireciona para a página de dashboard ou outra após o login
                exit(); // Certifique-se de encerrar o script aqui
            } else {
                echo "Senha incorreta";
            }
        } else {
            echo "E-mail não encontrado";
        }
    } else {
        echo "Erro na consulta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
