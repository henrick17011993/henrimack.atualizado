<?php
require '../padrao/class/funcoes.php';
// require 'conf/inc.php';
SetHeaders();
VerificaAcesso();
// $_SESSION['ARRPERFIL'] = array('hgv_grc_gestor_agencia', 'hgv_credito_gestor_agencia', 'hgv_monitoria_gestor_agencia', '');

$arrUsuarios = BuscaArrayUsuariosHGV();

$arrSistemas = array('metas'=>array(
                        'NMSISTEMA'=>'Sistema de Metas', 
                        'IMG-FRENTE'=>'images/SistemaMetas.jpg', 
                        'IMG-COSTAS'=>'images/metas-costas.jpg',
                        'URL'=>'hgv.inf.br/metassicoob',
                        'FLACESSO'=>'',
                        'COOP'=>[''],
                    ),
                    'PGD'=>array(
                        'NMSISTEMA'=>'PGD ', 
                        'IMG-FRENTE'=>'images/sistemaPGD.jpg', 
                        'IMG-COSTAS'=>'images/metas-costas.jpg',
                        'URL'=>'hgv.inf.br/metassicoob',
                        'FLACESSO'=>'',
                        'COOP'=>[''],
                    ),
                    'Monitore'=>array(
                        'NMSISTEMA'=>'Monitore', 
                        'IMG-FRENTE'=>'images/sistemamonitore.jpg', 
                        'IMG-COSTAS'=>'images/metas-costas.jpg',
                        'URL'=>'hgv.inf.br/metassicoob',
                        'FLACESSO'=>'',
                        'COOP'=>[''],
                    ),
                    'Gerencie'=>array(
                        'NMSISTEMA'=>'Gerencie', 
                        'IMG-FRENTE'=>'images/sistemagerencie.jpg', 
                        'IMG-COSTAS'=>'images/metas-costas.jpg',
                        'URL'=>'hgv.inf.br/metassicoob',
                        'FLACESSO'=>'',
                        'COOP'=>[''],
                    ),
                );

foreach ((array)$_SESSION['ARRPERFIL'] as $key => $perfil) {
    $arrPerfil = explode('_', $perfil);
    $sistema = $arrPerfil[1];
    if ($sistema == 'age')
        $sistema .= '_'.$arrPerfil[2];

    if (array_key_exists($sistema, $arrSistemas))
        $arrSistemas[$sistema]['FLACESSO'] = '11';
}

foreach ($arrSistemas as $sistema => &$arr) {
    if ( in_array($_SESSION['SGUSUARIO'], $arrUsuarios))
        $arr['FLACESSO'] = '11';
    elseif (in_array($_SESSION['IDCOOPERATIVA'], $arrSistemas[$sistema]['COOP']) && $arr['FLACESSO'] != '11')
        $arr['FLACESSO'] = '01';
}

function cmp($a, $b) {
    return $a['FLACESSO'] < $b['FLACESSO'];
}

uasort($arrSistemas, 'cmp');

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="images/ico.png">
    <script src="../padrao/cliente/modelo/plugins/jquery/jquery-3.1.1.min.js"></script>

    <script src="../padrao/cliente/modelo/plugins/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../padrao/cliente/modelo/plugins/sweetalert/sweetalert.css">

    <link rel="stylesheet" type="text/css" href="../padrao/cliente/modelo/css/fonts.css">
    <link rel="stylesheet" href="/padrao/fonts/font-awesome/css/font-awesome.min.css" />
    <title>HGV - Sistemas</title>

    <style>
        :root {
            --corPrincipal: #64c832;
            --corSecundaria: #55b127;
            --corTerciaria: #025328;
        }
        body {
            height: 100%;
            width: 100%;
            margin: 0px;
            font-family: 'Exo 2';
        }
        a {
            text-decoration: none;
        }
        .container {
            display: flex;
            font-family: "Exo 2";
            margin-top: 44px;
        }
        .container-texto {
            color: #686b6d;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -3px;
            height: 280px;
            padding: 0 20px;
            border-left: 10px solid var(--corSecundaria);
            -webkit-transform: skew(-15deg);
            -ms-transform: skew(-15deg);
            transform: skew(-15deg);
            margin: 0px;
            height: 372px;
            padding-right: 0px;
            width: 774px;

        }
        #header {
          background:#003641;
          padding: 1px 0;
          height: auto;
          transition: all 0.5s;
        }

        .container-cabecalho {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            height: 57px;
        }
        .login {
            color: #fff;
            margin-bottom: 22px;
            margin-right: 15px;
        }

        .sistemas {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            width: 100%;
            padding: 10px;
        }

        /*EFEITO NA IMAGEM*/
        .card {
            width: 300px;
            height: 260px;
            perspective: 1000px;
            cursor: pointer;
            transition: all 0.5s;
        }
        .card:hover{
            transform: scale(1.05);
            z-index: 2;

        }
        .card > a > .flipper img {
            width: 300px;
            height: 210px;
        }

        .flipper {
            position: relative;
            width: 99%;
            height: 80%;
            transition: transform 0.8s;
            transform-style: preserve-3d;
            border: 0px;
        }

        .card:hover .flipper {
            transform: rotateY(180deg);
        }

        .front, .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }
        .front img, .back img {
            border-radius: 15px 15px 15px 15px;
        }
        .back {
            transform: rotateY(180deg);
        }
        .preto-branco {
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
            filter: gray; /* IE */
        }
        .opacidade {
            opacity: 0.5;
            filter: alpha(opacity=50); /* For IE8 and earlier */
        }
    </style>
</head>
<body>

    <input type="hidden" id="custId" name="custId" value="<?= json_encode($_SESSION) ?>">
    <header id="header">
        <div class="container-cabecalho">
            <div id="logo" style="padding: 5px 11px 7px 50px ">
                <a href="https:/hgv.inf.br/metassicoob"><img src="images/logosicoob.png" width="125px" ></a>
            </div>
            <div class='login'>
            </div>
        </div>
    </header>
    <section class='container'>
        <div class='sistemas'>

            <?php foreach ($arrSistemas as $codSistema => $dados): 

                $classImagens = '';
                $classFliper = '';
                $mensagem = $dados['NMSISTEMA'];
                $onclick = '';
                
                if ($dados['FLACESSO'] !== '11') {
                    if ($dados['FLACESSO'] === '01') {
                        $mensagem = 'Sua Cooperativa possui o '.$dados['NMSISTEMA'].'. Mas você não tem acesso!';
                        $classImagens = '';
                    } else {
                        $mensagem = 'Sua cooperativa não possui o '.$dados['NMSISTEMA'].'!';
                        $classImagens = 'preto-branco';
                    }
                    $classFliper = '';
                    $dados['URL'] = '#';
                    $onclick = "onclick='ExibeMensagemSemAcesso(\"".$mensagem."\")'";
                }


            ?>

                <div class="card">
                    <a href="<?=$dados['URL']?>" <?= $onclick ?> title='<?=$mensagem?>'>
                        <div class="flipper <?=$classFliper?>">
                            <div class="front <?=$classImagens?>">
                                <img src="<?=$dados['IMG-FRENTE']?>" />
                            </div>
                            <div class="back <?=$classImagens?>">
                                <img src="<?=$dados['IMG-COSTAS']?>" />
                            </div>
                        </div>
                        <?php if (substr($dados['FLACESSO'], -1) == '1'): ?>
                            <div style='right: 0px; position: absolute; top: 0px; opacity: 0.9'>
                                <img src=''>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
</body>


</html>