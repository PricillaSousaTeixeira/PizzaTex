<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/d5eb4a6803.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/estilo.css">
  <title>PizzaTex</title>
</head>

<body>
  <header>
    <div class="contato">
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
    <div id="img">
      <img src="pizzatex.png" alt="pizzatex">
    </div>
    <nav class="topnav" id="myTopnav">
      <a href="./index.html" class="active">Home</a>
      <a href="./sobrenos.html">Sobre nós</a>
      <a href="#about">Contato</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </nav>
    <div id="cabecalho">
      <h1 id="cardapio">Confira o nosso cardápio!</h1>
      <h2> Nossos sabores que dão agua na boca! :D</h2>
    </div>
  </header>

  <?//=$_GET["msg"]?>
  <?php
//conectar ao servidor de banco de dados
$con = mysqli_connect("localhost", "id16053551_pritex", "Pri_pizza301269@") or die(mysqli_error($con));
//selecionar o banco de dados
mysqli_select_db($con, "id16053551_pizzatex");
//executar o comando sql select
 $sql = "SELECT id,  imagem, titulo, texto, tmp_name, nome, tipo, tamanho, destino FROM pizza ";
$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
//fechar a conexão com o servidor de banco de dados
mysqli_close($con);
//formatar a saida pra tela
?>
  <div class="container">
    <?php
  while($dados = mysqli_fetch_array($resultado)){
  ?>
    <div class="box">
      <h2>
        <div id="title">
          <p>
            <?=$dados["titulo"]?>
          </p>
        </div>
      </h2>
      <p>
        <?=$dados["texto"]?>
      </p>
      <img src="<?=$dados[" destino"]?>" alt="
      <?=$dados["nome"]?>" width="40%" height="40%">

    </div>
    <?php
}
?>
  </div>
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
</body>

</html>