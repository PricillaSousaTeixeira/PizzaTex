<?php
//recupera os registro
$imagem = $_FILES["imagem"]["tmp_name"];
$nome = $_FILES["imagem"]["name"];
$tipo = $_FILES["imagem"]["type"];
$tamanho = $_FILES["imagem"]["size"];

$destino = "./image/".$nome;

$image = move_uploaded_file($imagem, $destino);
$imagem = $_POST["imagem"];
$titulo = $_POST["titulo"];
$texto = $_POST["texto"];
//verificar os registros
if(empty($titulo)){
  $erro .= "E-MAIL NAO INFORMADO!";
}
if(empty($texto)){
  $erro .= "texto NAO INFORMADA!";
}
//caso registro esteja ok
if(empty($erro)){
    //inclui dado no banco
    //conectar ao banco
    $con = mysqli_connect("localhost", "id16053551_pritex", "Pri_pizza301269@")
        or die("Erro ao conectar ao banco:".mysqli_error());
	//selecionar o database
    mysqli_select_db($con, "id16053551_pizzatex")
        or die("Erro ao selecionar o database: ".mysqli_error($con));
    //executar comando
 $sql = "INSERT INTO pizza (imagem, titulo, texto, tmp_name, nome, tipo, tamanho, destino ) ";       
 $sql .= "VALUES('$imagem', '$titulo', '$texto', '$tmp_name', '$nome', '$tipo', '$tamanho', '$destino')";  
    mysqli_query($con, $sql)
        or die("Erro no SQL: ".mysqli_error($con));
    mysqli_close();
    header("Location:lista.php");
    exit();
}else{
    //caso registro errado
    //redireciona para incluir.php
    header("Location:incluir.php?erro=$erro");
    exit();
}
?>