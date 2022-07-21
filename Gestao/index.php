<?php
include_once "controller/conecta.php";
include_once "controller/functions.php";
session_start();
$conexao=db_connect();
if(isset($_POST['btn_login'])){
    teste_log();
}

if(isset($_GET['btn_logout'])){
    deslogar();
}
?>


<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de hardware</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <header class="topo">
        <?php
            if(isset($_SESSION['usuario'])){
        
        ?>
            <form action="#" method="GET">
                <button type="submit" name="btn_logout" value="0">logout</button>
            </form>
            <nav class="menu">
                <ul>
                    <a href="client/cadastro.impressora.php">
                        <li>Cadastrar impressora</li>
                    </a>
                    <a href="client/verificar.impressora.php">
                        <li>Visualizar impressoras</li>
                    </a>
                </ul>
            </nav>
        <?php
            }
        
        ?>
    </header>
    <main class="indexMain">
        <form id="formLogin" action="#" method="POST" >
            <div>
                <h1>Login</h1>

                <p>*Digite o USERNAME:</p>
                <input type="text" name="username">

                <p>*Digite a SENHA:</p>
                <input type="password" name="senha">


                <button type="submit" name='btn_login'>Confirmar</button>
            
            </div>
        </form>
    </main>

    <footer class="rodape">
        <p>developed by: Émerson Rodrigues da Silva</p>
    </footer>

</body>

</html>