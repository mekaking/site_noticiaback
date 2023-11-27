<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "site_noticia";
$conn = new mysqli($servername, $username, $password, $database) or die('erro');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Editar noticia</title>
</head>
<body>
    <div class="container mt-5">
        <ul class="cabeçalho">  
            <li class="cab" id="bar"><a href="createnoticia.php">Adicionar Noticias</a></li>
            <li class="cab" id="bar"><a href="noticia.php">Ver Noticias</a></li>
        </ul>
        <div class="row">
            <div class="col sid"></div>
            <div class="col mid">
                <div class="box">
                    <h2>Editar noticia</h2><br>
                    <?php
                    if(isset($_GET['id']))
                    {
                        $id = mysqli_real_escape_string($conn, $_GET['id']);
                        $query = "SELECT * FROM noticia WHERE id='$id' ";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $noticia = mysqli_fetch_array($query_run);
                            ?>
                            <form name="noticia_log" method="POST" action="code.php" enctype="multipart/form-data"> 
                                <input type="hidden" name="id" value="<?= $noticia['id']; ?>">
                                <input type="text" name="titulo" required placeholder="Titulo" value="<?= $noticia['titulo']; ?>"><br/><br/>
                                <input type="text" name="conteudo" required placeholder="Conteudo" value="<?= $noticia['conteudo']; ?>"><br/><br/>
                                <label for="tipo">Selecione o Tipo da noticia:</label>
                                <select type="text" id="tipo" name="tipo">
                                    <option value="Politica" <?= ($noticia['tipo'] == 'Politica') ? 'selected' : ''; ?>>Política</option>
                                    <option value="Artigo" <?= ($noticia['tipo'] == 'Artigo') ? 'selected' : ''; ?>>Artigo</option>
                                    <option value="Saude" <?= ($noticia['tipo'] == 'Saude') ? 'selected' : ''; ?>>Saúde</option>
                                    <option value="Turismo" <?= ($noticia['tipo'] == 'Turismo') ? 'selected' : ''; ?>>Turismo</option>
                                    <option value="Economia" <?= ($noticia['tipo'] == 'Economia') ? 'selected' : ''; ?>>Economia</option>
                                    <option value="Utilidades" <?= ($noticia['tipo'] == 'Utilidades') ? 'selected' : ''; ?>>Utilidades</option>
                                </select>
                                <label for="data">Data Atual:</label>
                                <input type="text" id="data" name="data" readonly value="<?= $noticia['data']; ?>">
                                <script>
                                    // Obtém a data atual
                                    var data = new Date();
                                    // Formata a data como string (pode ajustar o formato conforme necessário)
                                    var dataFormatada = data.toLocaleDateString('pt-BR');
                                    // Define o valor do campo de entrada com a data atual
                                    document.getElementById('data').value = dataFormatada;
                                </script>

                                <label style="margin-left:30%">Foto: </label>
                                <input type="file" name="arquivo" id="fileToUpload">
                                <br /><br/>
                                <input type="submit" id="entr" name="update_noticia" value="Atualizar">
                                <input type="reset" value="Limpar">
                            </form>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div>
                <a href="noticia.php"><button>Página Principal</button></a>
            </div>
        </div>
    </div>
</body>
</html>
