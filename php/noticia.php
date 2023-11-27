<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "site_noticia";
    $conn = new mysqli($servername, $username, $password, $database) or die('erro');

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gerenciamento de Notícias</title>
</head>
<body>
<div>
        <div>   
            <div>
            <li class="cab" id="bar"><a href="createnoticia.php">Adicionar Notícia</a></li>
            </ul>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Conteudo</th>
                        <th>Tipo</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM noticia";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $noticia)
                            {
                    ?>
                                <tr>
                                <td><img src="<?php echo $noticia['img']; ?>" alt="" width="250"></td>

                                    <td><?= $noticia['id']; ?></td>
                                    <td><?= $noticia['titulo']; ?></td>
                                    <td><?= $noticia['conteudo']; ?></td>
                                    <td><?= $noticia['tipo']; ?></td>
                                    <td><?= $noticia['data']; ?></td>    
                                <td>
                                    <a href="../../produto.php?p_id=<?= $prod['p_id']; ?>">Visualizar</a>
                                    <a href="editanoticia.php?id=<?= $noticia['id']; ?>">Editar</a>
                                    <form action="codenoticia.php" method="POST">
                                        <button type="submit" name="delete_noticia" value="<?=$noticia['id'];?>">Deletar</button>
                                    </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            }
                            else
                            {
                                echo "<h5> Nenhuma notícia cadastrada </h5>";
                            }
                            ?> 
                </tbody>
                </table>
</div>
</body>
</html>