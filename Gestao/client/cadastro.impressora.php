<?php
include_once "../controller/conecta.php";
session_start();



if(isset($_GET['btn_logout'])){
    deslogar();
}

if(isset($_SESSION['usuario'])){
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
        <form action="#" method="GET">
            <button type="submit" name="btn_logout" value="0">logout</button>
        </form>
        <nav class="menu">
            <ul>
                <a href="../index.php">
                    <li>Página inicial</li>
                </a>
                <a href="verificar.impressora.php">
                    <li>Visualizar impressoras</li>
                </a>
            </ul>
        </nav>
    </header>
    <main id="cadImpressoraMain">
        <form id="formCadImpressora" action="../controller/registrar.php" method="POST" >
            <h1>Cadastro de impressoras</h1>

            <p id="0">*Digite o MODELO da impressora:</p>
            <input type="text" id="modelo" name="modelo">

            <p id="1">*Digite o SERIAL da impressora:</p>
            <input type="text" id="serial" name="serial">

            <p>Qual o IP da impressora?</p>
            <input type="text" id="ip" name="ip" placeholder="Se não houver deixe o campo vazio!">

            <p id="2">*Digite o SETOR que a impressora pertence:</p>
            <input type="text" id="setor" name="setor">

            <p id="3">*Digite a LOJA que está a impressora:</p>
            <input type="text" id="loja" name="loja">

            <button type="button" onclick="validarCadastroImpressora()">Verificar</button>
            <p id="result"></p>
        </form>
    </main>
    <footer class="rodape">
        <p>developed by: Émerson Rodrigues da Silva</p>
    </footer>
</body>
<script type="text/javascript" src="../js/funcoes.js"></script>
</html>

<?php
  }else{
    echo "<h1>Usuário desconectado!</h1>";
    header("Refresh:2; ../index.php");
  }
?>