<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "site_noticia";
$conn = new mysqli($servername, $username, $password, $database) or die('erro');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $celular = mysqli_real_escape_string($conn, $_POST['celular']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);

    // Insere os dados no banco de dados
    $query = "INSERT INTO user (nome, sobrenome, email, celular, senha, genero) VALUES ('$nome', '$sobrenome', '$email', '$celular', '$senha', '$genero')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../menu.php");

    } else {
        echo "Erro ao cadastrar o usuário: " . mysqli_error($conn);
    }
}
?>
