<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "site_noticia";
$conn = new mysqli($servername, $username, $password, $database) or die('erro');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Noticia</title>
</head>
<body> 
    <div class="row">
        <div class="col sid"></div>
        <div class="col mid">
            <div class="box">
                <div class="form_cad">
                    <h2>Criar uma notícia</h2>
                    <form name="noticia_log" method="POST" action="code.php" enctype="multipart/form-data"> 
                        <input type="text" name="titulo" required placeholder="Titulo"><br/><br/>
                        <input type="text" name="conteudo" required placeholder="Conteudo"><br/><br/>
                        <label for="tipo">Selecione o Tipo da noticia:</label>
                        <select type="text" id="tipo" name="tipo">
                            <option value="Politica">Política</option>
                            <option value="Artigo">Artigo</option>
                            <option value="Saude">Saúde</option>
                            <option value="Turismo">Turismo</option>
                            <option value="Economia">Economia</option>
                            <option value="Utilidades">Utilidades</option>
                        </select>
                        <label for="data">Data Atual:</label>
                        <input type="text" id="data" name="data" readonly>
                        <script>
                            // Obtém a data atual
                            var data = new Date();

                            // Formata a data como string (pode ajustar o formato conforme necessário)
                            var dataFormatada = data.toLocaleDateString('pt-BR');

                            // Define o valor do campo de entrada com a data atual
                            document.getElementById('data').value = dataFormatada;
                        </script>

                        <label style="margin-left:30%">Foto: </label>
                        <input type="file" name="arquivo" id="fileToUpload" required placeholder="Imagens:"><br /><br/>
                        <input type="submit" id="entr" name="submit" value="Prosseguir">
                        <input type="reset" value="Limpar">
                    </form>
                </div>
            </div>
            <div>
                <a href="noticia.php"><button>Página Principal</button></a>
            </div>
        </div>
        <div class="col sid"></div>
    </div>
</body>
</html>
