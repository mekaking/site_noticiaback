<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "site_noticia";
    $conn = new mysqli($servername, $username, $password, $database) or die('erro');
    
if(isset($_POST['cad_noticia']))
{
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);;
    $conteudo = mysqli_real_escape_string($conn, $_POST['conteudo']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $data = mysqli_real_escape_string($conn, $_POST['data']);

    $query = "INSERT INTO noticia (titulo,conteudo,tipo, data) VALUES ('$titulo','$conteudo','$tipo','$data')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        header("Location: noticia.php");
        exit(0);
    }
    else
    {
        header("Location: noticia.php");
        exit(0);
    }
}

if(isset($_POST['delete_noticia']))
{
    $id = mysqli_real_escape_string($conn, $_POST['delete_noticia']);

    $query = "DELETE FROM noticia WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['msg'] = "Notícia excluida com sucesso!";
        header("Location: noticia.php");
        exit(0);
    }
    else
    {
        $_SESSION['msg'] = "Não foi possível excluir a notícia";
        header("Location: noticia.php");
        exit(0);
    }
}

if(isset($_POST['update_noticia']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $conteudo= mysqli_real_escape_string($conn, $_POST['conteudo']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $data = mysqli_real_escape_string($conn, $_POST['data']);


    $query = "UPDATE noticia SET titulo='$titulo', conteudo='$conteudo', tipo='$tipo', data='$data' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['msg'] = "Notícia atualizada com sucesso";
        header("Location: noticia.php");
        exit(0);
    }
    else
    {
        $_SESSION['msg'] = "Notícia não atualizada";
        header("Location: noticia.php");
        exit(0);
    }

}

?>
