<?php
include_once "../model/Impressora.class.php";
session_start();


if(isset($_POST['indice'])){
    $verificador= $_POST['indice'];
}



if(empty($_POST['newIp'])){
    $_POST['newIp'] = 'N/A';
}


//deixando os dados como null caso nao estejam preenchido, para ocasionar a tela de
//  DADOS INVÁLIDOS!!!
if(empty($_POST['newModelo'])){
    $_POST['newModelo'] = null;
}

if(empty($_POST['newSerial'])){
    $_POST['newSerial'] = null;
}

if(empty($_POST['newSetor'])){
    $_POST['newSetor'] = null;
}

if(empty($_POST['newLoja'])){
    $_POST['newLoja'] = null;
}

if(empty($_POST['newConcerto'])){
    $_POST['newConcerto'] = null;
}

if(empty($_POST['newToner'])){
    $_POST['newToner'] = null;
}

if(empty($_POST['newSolicitacao'])){
    $_POST['newSolicitacao'] = null;
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
            
            if(isset($_POST['newModelo']) and isset($_POST['newSerial'])
            and isset($_POST['newIp']) and isset($_POST['newSetor'])
            and isset($_POST['newLoja'])and isset($_POST['newToner'])
            and isset($_POST['newConcerto']) and isset($_POST['newSolicitacao'])){
                 
                

                $_SESSION['impressoras'][$verificador]->setModelo($_POST['newModelo']);
                $_SESSION['impressoras'][$verificador]->setSerial($_POST['newSerial']);
                $_SESSION['impressoras'][$verificador]->setIp($_POST['newIp']);
                $_SESSION['impressoras'][$verificador]->setSetor($_POST['newSetor']);
                $_SESSION['impressoras'][$verificador]->setLoja($_POST['newLoja']);
                $_SESSION['impressoras'][$verificador]->setToner($_POST['newToner']);
                $_SESSION['impressoras'][$verificador]->setConcerto($_POST['newConcerto']);
                $_SESSION['impressoras'][$verificador]->setSolicitacao($_POST['newSolicitacao']);
                
                echo "<div class='cadastradoDiv'>".
                "<h2 style='color: green;'>Foi alterada com sucesso!</h2>".
                "<p>A impressora de dados:</p>".
                "<p>Modelo: ".$_SESSION['impressoras'][$verificador]->getModelo()."</p>".
                "<p>Serial: ".$_SESSION['impressoras'][$verificador]->getSerial()."</p>".
                "<p>IP: ".$_SESSION['impressoras'][$verificador]->getIP()."</p>".
                "<p>Loja: ".$_SESSION['impressoras'][$verificador]->getLoja()."</p>".
                "<p>Setor: ".$_SESSION['impressoras'][$verificador]->getSetor()."</p>".
                "<p>Ult. toner: ".$_SESSION['impressoras'][$verificador]->getToner()."</p>".
                "<p>Ult. concerto: ".$_SESSION['impressoras'][$verificador]->getConcerto()."</p>".
                "<p>Ult. a solicitar: ".$_SESSION['impressoras'][$verificador]->getSolicitacao()."</p>".
                "</div>";

                header("Refresh:8;../client/verificar.impressora.php");

            }else{
                echo "<h2 style='color: red;'>Dados inválidos!</h2>";
                header("Refresh:4;../client/verificar.impressora.php");
            }
            

            ?>

        </section>
    </main>
    <footer class="rodape">
        <p>developed by: Émerson Rodrigues da Silva</p>
    </footer>
</body>
</html>