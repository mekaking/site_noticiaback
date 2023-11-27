<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "site_noticia";
$conn = new mysqli($servername, $username, $password, $database) or die('erro');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Site Noticias</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="img/undraw_newsletter_re_wrob.svg">
        </div>
        <div class="form">
       
        <form action="user/processa_cadastro.php" method="POST">

                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="login.php">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <!-- Corrigido o atributo 'name' do campo 'firstname' -->
                    <div class="input-box">
                        <label for="nome">Primeiro nome</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <!-- Corrigido o atributo 'name' do campo 'lastname' -->
                    <div class="input-box">
                        <label for="sobrenome">Sobrenome</label>
                        <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu Sobrenome" required>
                    </div>

                    <!-- Corrigido o atributo 'name' do campo 'email' -->
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu Email" required>
                    </div>

                    <!-- Corrigido o atributo 'name' do campo 'number' -->
                    <div class="input-box">
                        <label for="celular">Celular</label>
                        <input id="celular" type="tel" name="celular" placeholder="(xx) xxxx-xxxx" required>
                    </div>

                    <!-- Corrigido o atributo 'name' do campo 'password' -->
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>

                    <!-- Corrigido o atributo 'name' do campo 'Confirmpassword' -->
                    <div class="input-box">
                        <label for="Confirmpassword">Confirme sua senha</label>
                        <input id="Confirmpassword" type="password" name="Confirmpassword" placeholder="Digite sua senha" required>
                    </div>
                </div>

                <div class="input-box">
                        <label for="age">Idade</label>
                        <input id="age" type="age" name="age" placeholder="Data de nascimento" required>
                    </div>

                    
                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>
                    <div class="gender-group">
                        <!-- Corrigido o atributo 'name' dos campos de gênero -->
                        <div class="gender-input">
                            <input type="radio" id="feminino" name="genero">
                            <label for="feminino">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" id="masculino" name="genero">
                            <label for="masculino">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" id="others" name="genero">
                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" id="none" name="genero">
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit">Continuar</button>
                </div>
            </form>
        </div>
    </div>    
</body>
</html>
