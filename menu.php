<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "site_noticia";
$conn = new mysqli($servername, $username, $password, $database) or die('erro');
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notícias em Rede</title> 

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header class="header">
            <a  class="logo">  <i class="fa-solid fa-newspaper fa-beat" style="color: #ffffff;"></i> Noticias em Rede </a> 
           
            <nav class="navbar">
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="menu.php">Home</a>
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="artigos.php">Artigos</a>
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="saude.php">Saúde</a>
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="turismo.php">Turismo</a>
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="economia.php">Economia</a>
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="utilidades.php">Utilidades</a>
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="contato.html">Contato</a>
            </nav>

        </header>
        <?php  
             
            
             $query = "SELECT * FROM noticia";
             $query_run = mysqli_query($conn, $query);
 
             if(mysqli_num_rows($query_run) > 0)
             {
             foreach($query_run as $noticia)
             {
                
             ?>
            <div class="card">
                    <a href="noticiapog.php?id=<?= $noticia['id']; ?>">
                    <img src="php/<?php echo $noticia['img']; ?>">
                    <h2><?php echo $noticia['tipo'];?></h2> 
                    <a href="noticiapog.php?id=<?= $noticia['id']; ?>">
                    <p> <?php echo $noticia['titulo']; ?> </p>
                </a>
            </div>

      <?php
        }
    }
    ?> 
    </body>