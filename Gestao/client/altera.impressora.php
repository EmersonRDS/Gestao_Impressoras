<?php
    include_once "../model/Impressora.class.php";
    session_start();
   
    $i = $_GET["i"];
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de impressora</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <header class="topo">
        <nav class="menu">
            <ul>
                <a href="../">
                    <li>Página inicial</li>
                </a>
                <a href="verificar.impressora.php">
                    <li>Visualizar impressoras</li>
                </a>
            </ul>
        </nav>
    </header>
    <main class="alteraMain">
        <form id="alteraImpressoraForm" action="../controller/altera.cadastro.php" method="POST" >
            <input type="hidden" value="<?php echo $i;?>" name="indice">
            <h1>Cadastro de impressoras</h1>

            <p>Digite o MODELO da impressora:<br>
            <input readonly name="newModelo" value="<?php echo $_SESSION['impressoras'][$i]->getModelo();?>"></p> 

            <p>Digite o Serial da impressora:<br>
            <input readonly name="newSerial" value="<?php echo $_SESSION['impressoras'][$i]->getSerial();?>"></p> 

            <p>Qual o IP da impressora?<br>
            <input name="newIp" value="<?php echo $_SESSION['impressoras'][$i]->getIp();?>"></p> 

            <p>Digite o SETOR que a impressora pertence:</br>
            <input name="newSetor" value="<?php echo $_SESSION['impressoras'][$i]->getSetor();?>"></p>

            <p>Digite a LOJA que está a impressora:</br>
            <input name="newLoja" value="<?php echo $_SESSION['impressoras'][$i]->getLoja();?>"></p>

            <p>Data do último concerto:</br>
            <input name="newConcerto" value="<?php echo $_SESSION['impressoras'][$i]->getConcerto();?>"></p>

            <p>Data da última troca de toner:</br>
            <input name="newToner" value="<?php echo $_SESSION['impressoras'][$i]->getToner();?>"></p>

            <p>Quem fez a solicitação:</br>
            <input name="newSolicitacao" value="<?php echo $_SESSION['impressoras'][$i]->getSolicitacao();?>"></p>

            <div><button>Cadastrar</button></div>
            
        </form>

    </main>
    <footer class="rodape">
        <p>developed by: Émerson Rodrigues da Silva</p>
    </footer>
</body>
<script type="text/javascript" src="../js/funcoes.js"></script>
</html>