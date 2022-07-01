<?php
include_once "../model/Impressora.class.php";
session_start();

if(isset($_SESSION['impressoras'])){

}else{
    $_SESSION['impressoras'] = array();
}

//dando um valor para o ip caso esteja vazio
if(empty($_POST['ip'])){
    $_POST['ip'] = 'N/A';
}


//deixando os dados como null caso nao estejam preenchido, para ocasionar a tela de
//  DADOS INVÁLIDOS!!!
if(empty($_POST['modelo'])){
    $_POST['modelo'] = null;
}

if(empty($_POST['serial'])){
    $_POST['serial'] = null;
}

if(empty($_POST['setor'])){
    $_POST['setor'] = null;
}

if(empty($_POST['loja'])){
    $_POST['loja'] = null;
}






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
                <a href="../index.php">
                    <li>Página inicial</li>
                </a>
                <a href="../client/verificar.impressora.php">
                    <li>Visualizar impressoras</li>
                </a>
            </ul>
        </nav>
    </header>
    <main class="indexDados">
        <section class="cadLista">
            <?php
            
            if(isset($_POST['modelo']) and isset($_POST['serial'])
            and isset($_POST['ip']) and isset($_POST['setor'])
            and isset($_POST['loja'])){
                //colocando os dados numa variável
                $tempImpressora = new Impressora($_POST['modelo'], $_POST['serial'],
                $_POST['ip'], $_POST['setor'], $_POST['loja']);
                //jogando a variavel para o array
                $_SESSION['impressoras'][]= $tempImpressora;
                
                echo "<div class='cadastradoDiv'>".
                "<h2 style='color: green;'>Foi cadastrada com sucesso!</h2>".
                "<p>A impressora de dados:</p>".
                "<p>Modelo: ".$tempImpressora->getModelo()."</p>".
                "<p>Serial: ".$tempImpressora->getSerial()."</p>".
                "<p>IP: ".$tempImpressora->getIP()."</p>".
                "<p>Loja: ".$tempImpressora->getLoja()."</p>".
                "<p>Setor: ".$tempImpressora->getSetor()."</p>".
                "<p>Ult. toner: ".$tempImpressora->getToner()."</p>".
                "<p>Ult. concerto: ".$tempImpressora->getConcerto()."</p>".
                "<p>Ult. a solicitar: ".$tempImpressora->getSolicitacao()."</p>".
                "</div>";

                header("Refresh:8;../client/cadastro.impressora.php");

            }else{
                echo "<h2 style='color: red;'>Dados inválidos!</h2>";
                header("Refresh:4;../client/cadastro.impressora.php");
            }
            

            ?>

        </section>
    </main>
    <footer class="rodape">
        <p>developed by: Émerson Rodrigues da Silva</p>
    </footer>
</body>
</html>