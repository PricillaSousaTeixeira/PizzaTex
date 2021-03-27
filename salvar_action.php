<?php

//recupera os registro

$id = $_POST["id"];

$imagem = $_POST["imagem"];

$titulo = $_POST["titulo"];

$texto = $_POST["texto"];



//verificar os registros

if(empty($imagem)){

  $erro .= "imagem NAO INFORMADO!";

}

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

    $con = mysqli_connect("localhost", "id14926856_quezia", "Qst_enid180798")

        or die("Erro ao conectar ao banco:".mysqli_error());

    //selecionar o database

    mysqli_select_db($con, "id14926856_usuario")

        or die("Erro ao selecionar o database: ".mysqli_error($con));

        

    //executar comando

    $sql = "UPDATE quezia SET imagem='$imagem', titulo='$titulo', texto='$texto' WHERE id='$id'";

    mysqli_query($con, $sql)

        or die("Erro no SQL: ".mysqli_error($con));



    mysqli_close();

    header("Location:lista.php");

    exit();

}else{

    //caso registro errado

    //redireciona para incluir.php

    header("Location:editar.php?erro=$erro&id=$id");

    exit();



}



?>

