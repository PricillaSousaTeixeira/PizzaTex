<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaTex</title>
    <link href="/css/estilo.css" type="text/css" rel="stylesheet">
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
    <header>
        <p>PizzaTex</p>
    </header>
    <div class="cabecalho">
        <ul>
            <li><a href="lista.php">Listar Cardápio</a></li>
        </ul>
    </div>
    <div class="container">
    </div>
    <form action="incluir_action.php" method="post">
        <label for="imagem">Incluir imagem</label>
        <input type="file" id="imagem" name="imagem">
        <label for="texto">Título</label>
        <input type="text" id="titulo" name="titulo">
        <label for="texto">Texto</label>
        <textarea id="texto" name="texto" rows="4" cols="50"></textarea>
        <input type="submit" value="incluir">
    </form>
    <div id="footer">
        <script type="text/javascript">
            bkLib.onDomLoaded(function () { nicEditors.allTextAreas() }); // convert all text areas to rich text editor on that page
            bkLib.onDomLoaded(function () {
                new nicEditor().panelInstance('texto');
            }); // convert text area with id area1 to rich text editor.
        </script>
</body>

</html>