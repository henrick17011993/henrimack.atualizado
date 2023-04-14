<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Henrimack.com</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./js/main.js"></script>

</head>

<body>
    <?php
    require "php/funcoes.php";
    if ($_GET['id']) {
        $dadosTabela = BuscaDados($_GET['id']);
    }
    ?>

    <header>
        <h1>Henrimack</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="sobrenos.php">Sobre Nós</a></li>
            <li><a href="contato.php">Contate-nos</a></li>
        </ul>
    </header>
    <main>
        <div class="show">
            <div class="card-head">
                <h3>Cadastro</h3>
                <a href="./" id="btnVoltar">voltar</a>
            </div>
            <hr>
            <fieldset>
                <legend>Tipos de cadeiras</legend>
                <form>
                    <label for="">Selecione :</label>
                    <select <?= $dadosTabela["TIPO"] ?> <?= $_GET["acao"] &&  $_GET["acao"] == "r" ? "readonly" : ""; ?>
                        name="Tipo" id="Tipo" required="True" >
                        <option value=""> Categoria </option>
                        <option value="Estofados">Estofados</option>
                        <option value="Escritorio">Escritório</option>
                        <option value="Decoracao">Decoração</option>
                        <option value="Gamers">Gamers</option>
                    </select>
                </form>

                <div class="div-input" id="divNome">
                    <label for="Modelos">Modelo :</label>
                    <input type="text" value="<?= $dadosTabela["MODELOS"] ?>"
                        <?= $_GET["acao"] &&  $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Modelos" id="Modelos"required="True" >
                </div>

                <div class="div-input" id="divNome">
                    <label for="Cor">Cor :</label>
                    <input type="text" value=" <?= $dadosTabela["COR"] ?>"
                        <?= $_GET["acao"] &&  $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Cor" id="Cor" required="True">
                </div>
                <div class="div-input" id="divNome">
                    <label for="Valor">Valor :</label>
                    <input type="number"value="<?= $dadosTabela["VALOR"] ?>"
                        <?= $_GET["acao"] &&  $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Valor" id="Valor"required="True">
                </div>
            </fieldset>

            <?php if ($_GET['acao'] != "r") : ?>
            <div class="buttons">
                <?php if ($_GET['acao'] == "u") : ?>
                <button id="btnAtualizar" type="submit" data-id="<?= $_GET['id'] ?>">atualizar</button>
                <?php else : ?>
                <button id="btnButton" type="submit">enviar</button>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>

    </main>
    <footer>
        <span>&copy; Feito por Henrique</span>

    </footer>


</body>

</html>