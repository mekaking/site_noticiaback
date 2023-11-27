<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "site_noticia";
    $conn = new mysqli($servername, $username, $password, $database) or die('erro');
    
    //require_once "serverconnect.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_segura = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn ->prepare("INSERT INTO users (email, senha)VALUES(?,?)");
    $stmt ->bind_param("ss", $email, $senha_segura);
    $stmt ->execute();

    header("Location:../../../index.php?cad=ok");
?>