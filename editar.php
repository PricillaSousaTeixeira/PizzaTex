<?php

session_start();

if(!empty($_SESSION['id'])){

}else{

	$_SESSION['msg'] = "Área restrita";

	header("Location: ./sis/login.php");	

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>PizzaTex</title>
    <link href="/css/estilo.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function () {
            new nicEditor({ maxHeight: 200 }).panelInstance('texto');
        });
  //]]>
    </script>

</head>

<body>

    <!--codigos aqui-->

    <header>
        <h1> PizzaTex</h1>
    </header>

    <nav class="cabecalho">
        <ul>
            <a href="incluir.php">
                <li>Incluir</li>
            </a>
            <a href="lista.php">
                <li>Listar</li>
            </a>
        </ul>
    </nav>

    <?php
//editar.php
//recuperar o id(chave da tabela)
$id = $_REQUEST['id'];

//conectar ao servidor de banco
$con = mysqli_connect("localhost", "id14926856_quezia", "Qst_enid180798")
        or die("Erro ao conectar ao banco:".mysqli_error($con));
    //selecionar o database
	//selecionar o banco de dados
    mysqli_select_db($con, "id14926856_usuario")
        or die("Erro ao selecionar o database: ".mysqli_error($con));
     //criar comando de select   
$sql = "select id,  imagem, titulo, texto  FROM quezia where id ='$id' ";

$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
//fechar a conexão com o servidor de banco de dados

mysqli_close($con);
//formatar a saida pra tela
while($dados = mysqli_fetch_array($resultado)){

$id = $dados['id'];
$imagem = $dados['imagem'];
$titulo = $dados['titulo'];
$texto = $dados['texto'];


//mostrar resgistros no formulario
?>
    <legend>Editar Cardápio</legend>

    <form method="POST" action="salvar_action.php">

        <label for="id">Identificador: </label>
        <?=$dados["id"]?><input type="hidden" value="<?=$dados[" id"]?>" name="id" />
        <label for="imagem">Selecione uma imagem</label>
        <input type="file" id="imagem" name="imagem" onchange="previewImagem()"><img
            style="width: 100px; height: 100px;">

        <label for="titulo">Titulo</label><br>
        ><input type="text" name="titulo" value="<?php echo $titulo ?>" /></div>

        <!-- lembrar -->
        <label for="texto">Texto</label></div>

        <textarea id="texto" name="texto" value="<?php echo $texto ?>" rows="10" cols="40"
            onkeyup="mostrarResultado(this.value,2000,'spcontando');contarCaracteres(this.value,2000,'sprestante')">
	<?php echo $texto ?></textarea>

        <input type="submit" value="Alterar" href="lista.php" /></td><br>
    </form>
    <?php
}
?>

    <footer>
        <h2>PizzaTex</h2>
        <Footer>
            <!--codigos aqui-->
            <!--<script type="text/javascript" language="javascript">

function mostrarResultado(box,num_max,campospan){
	var contagem_carac = box.length;
	if (contagem_carac != 0){
		document.getElementById(campospan).innerHTML = contagem_carac + " caracteres digitados";
		if (contagem_carac == 1){
			document.getElementById(campospan).innerHTML = contagem_carac + " caractere digitado";
		}
		if (contagem_carac >= num_max){
			document.getElementById(campospan).innerHTML = "Limite de caracteres excedido!";
		}
	}else{
		document.getElementById(campospan).innerHTML = "Ainda não há nada digitado..";
	}
}

function contarCaracteres(box,valor,campospan){
	var conta = valor - box.length;
	document.getElementById(campospan).innerHTML = "Você ainda pode digitar " + conta + " caracteres";
	if(box.length >= valor){
		document.getElementById(campospan).innerHTML = "Atençao! ..você não pode mais digitar..";
		document.getElementById("textomensagem").value = document.getElementById("textomensagem").value.substr(0,valor);
	}	
}-->
            <script>
                function previewImagem() {
                    var imagem = document.querySelector('input[name=imagem]').files[0];
                    var preview = document.querySelector('img');
                    var reader = new FileReader();
                    reader.onloadend = function () {
                        preview.src = reader.result;
                    }
                    if (imagem) {
                        reader.readAsDataURL(imagem);
                    } else {
                        preview.src = "";
                    }
                }

            </script>
            <script type="text/javascript">
                bkLib.onDomLoaded(function () { nicEditors.allTextAreas() }); // convert all text areas to rich text editor on that page

                bkLib.onDomLoaded(function () {
                    new nicEditor().panelInstance('texto');
                }); // convert text area with id area1 to rich text editor.

            </script>
            <!--codigos aqui-->
</body>
</html>