<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "site_noticia";
$conn = new mysqli($servername, $username, $password, $database) or die('erro');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Site Noticias</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="img/undraw_newsletter_re_wrob.svg" alt="...">
        </div>
        <div class="form">
            <form action="user/verificalogi.php">
                <div class="form-header">
                    <div class="title">
                        <h1>Realizar login</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu Email" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
                  <div class="continue-button">
                     <button type="submit">Continuar</button>
                 </div>  
                </div>
            </form>
            
        </div>
    </div>    
</body>
</html>