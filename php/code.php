<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "site_noticia";
$conn = new mysqli($servername, $username, $password, $database) or die('erro');
/* FILE UPLOAD */
$currentDirectory = getcwd(); //pega o diretório atual
$uploadDirectory = "\imagens\\"; //pasta onde será carregado os arquivos
$uploadDirectory2 = "imagens/"; //pasta onde será carregado os arquivos



$errors = []; // erros de armazenamento

$fileExtensionsAllowed = ['jpeg','jpg','png']; // extensões permitidas

$fileName = $_FILES['arquivo']['name'];
$fileSize = $_FILES['arquivo']['size'];
$fileTmpName  = $_FILES['arquivo']['tmp_name'];
$fileType = $_FILES['arquivo']['type'];
$fileExtension1 = explode('.',$fileName);
$fileExtension = strtolower(end($fileExtension1));


echo $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

echo $caminho = $uploadDirectory2 . basename($fileName); //caminho da imagem

if (isset($_POST['submit'])) {

  if (! in_array($fileExtension,$fileExtensionsAllowed)) {
    $errors[] = " | A extensão desse arquivo não é aceita. Carregue um arquivo JPEG, JPG ou PNG.";
  }

  if ($fileSize > 4000000) {
    $errors[] = " | O arquivo excede o tamanho máximo de 4MB";
  }

  if (empty($errors)) {
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if ($didUpload) {
      echo " | O arquivo " . basename($fileName) . " foi carregado com sucesso!";
    } else {
      echo " | Erro no carregamento do arquivo.";
    }
  } else {
    foreach ($errors as $error) {
      echo $error . "\n";
    }
  }

}
/* Restante do código... */

if(isset($_POST['update_noticia']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $conteudo= mysqli_real_escape_string($conn, $_POST['conteudo']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $data = mysqli_real_escape_string($conn, $_POST['data']);

    $query = "UPDATE noticia SET titulo='$titulo', conteudo='$conteudo', tipo='$tipo', img='$caminho', data='$data' WHERE id='$id' ";
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
/*produto*/
if(isset($_POST['submit']))
    {
        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $conteudo = mysqli_real_escape_string($conn, $_POST['conteudo']);
        $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
        $data = mysqli_real_escape_string($conn, $_POST['data']);
    
        $query = "INSERT INTO noticia (titulo,conteudo,tipo,data,img) VALUES ('$titulo','$conteudo','$tipo','$data','$caminho')";
    
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            $_SESSION['msg'] = "Produto cadastrado👍";
            header("Location: noticia.php");
            exit(0);
        }
        else
        {
            $_SESSION['msg'] = "Produto não cadastrado👎";
            header("Location: noticia.php");
            exit(0);
        }
    }
    
    /*produto*/
?>
?>
