<?php

//recuperar o parametro

$id = trim($_GET["id"]);

//verificar se realmente foi recuperado um parametro

if(empty($id)){

  header("Location:listar.php?msg=Selecione um aluno!");

  exit();

}

//conectar ao servidor de banco

$con = mysqli_connect("localhost", "id14926856_quezia", "Qst_enid180798") or die(mysqli_error($con));

//selecionar o banco de dados

mysqli_select_db($con, "id14926856_usuario") or die(mysqli_error($con));

//criar comando sql

$sql = "DELETE FROM quezia WHERE id='$id'";

//executar comando sql

mysqli_query($con, $sql) or die(mysqli_error($con));

mysqli_close($con);

//redirecionar para listar

header("Location:listar.php?msg=Registro excluido com sucesso!");

exit();

?>



