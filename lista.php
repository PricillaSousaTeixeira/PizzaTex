<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link href="/css/estilo.css" type="text/css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/d5eb4a6803.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Pizzatex</title>
</head>

<body>
  <!--codigos aqui-->
  <script>

    function myFunction() {

      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("minhaPesquisa");
      filter = input.value.toUpperCase();
      table = document.getElementById("minhaTabela");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; //alterar o numero aqui para controlar a tabela
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

  </script>

  <div class="footer">
    <div class="social-field">
      <a href="#">
        <i class="fab fa-facebook-f"></i>
      </a>
    </div>
    <div class="social-field">
      <a href="#">
        <i class="fab fa-instagram"></i>
      </a>
    </div>

    <div class="social-field">
      <a href="#">
        <i class="fab fa-whatsapp"></i>
      </a>
    </div>
  </div>

  <header>
    <h1> PizzaTex</h1>
    <h2>A melhor pizza de Planaltina Goías! </h2>
  </header>


  <div class="cabecalho">
    <ul>
      <li><a href="Incluir.php">Incluir</a></li>
    </ul>
  </div>
  <?//=$_GET["msg"]?>

  <?php

//conectar ao servidor de banco de dados
$con = mysqli_connect("localhost", "id16053551_pritex", "Pri_pizza301269@")
or die("Erro ao conectar ao banco:".mysqli_error());
//selecionar o banco de dados
mysqli_select_db($con, "id16053551_pizzatex");
//executar o comando sql select
$sql = "SELECT id,  imagem, titulo, texto, tmp_name, nome, tipo, tamanho, destino FROM pizza "; 
$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
//fechar a conexão com o servidor de banco de dados
mysqli_close($con);
//formatar a saida pra tela
?>
  <legend>Lista</legend>
  <div class="container">
    <?php
while($dados = mysqli_fetch_array($resultado)){
?>

    <!--<input type="text" id="minhaPesquisa" onkeyup="myFunction()" placeholder="Digite um nome ..." title="Type in a name">

<table id="minhaTabela" class="minhaTabela" border="1">

    <tr class="cabecalhoTabela">-->

    <div class="box">
      <p>
        <?=$dados["id"]?>
      </p>
      <p><img src="<?=$dados[" destino"]?>" alt="
        <?=$dados["nome"]?>" width="40%" height="40%">
      </p><br>
      <div id="title">
        <h2>
          <?=$dados["titulo"]?>
        </h2>
      </div>
      <p>
        <?=$dados["texto"]?>
      </p><br>
      <div id="botao"><a href="deletar.php?id=<?=$dados[" id"]?>">Apagar</a></div>
      <div id="botao"><a href="editar.php?id=<?=$dados[" id"]?>">Alterar</a></div>
    </div>
    <?php
}
?>
  </div>
</body>

</html>