<?php
    include_once "../model/Impressora.class.php";
    include_once "../controller/conecta.php";
    session_start();
    $conexao = db_connect();
   
    $i = $_GET["codImp"];

    $consulta = $conexao->query("SELECT * FROM tb_impressora WHERE id = '$i'");

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
        <form id="alteraImpressoraForm" action="../controller/registrar.php" method="POST" >
            <?php
                while ($row = $consulta->fetch()) {
                    echo "
                    <input type='hidden' value=' $i' name='indice'>
                    <h1>Cadastro de impressoras</h1>
        
                    <p>Digite o MODELO da impressora:<br>
                    <input readonly name='newModelo' value='".$row['modelo']."'></p>
        
                    <p>Digite o Serial da impressora:<br>
                    <input readonly name='newSerial' value='".$row['serial']."'></p> 
        
                    <p>Qual o IP da impressora?<br>
                    <input name='newIp' value='".$row['ip']."'></p> 
        
                    <p>Digite o SETOR que a impressora pertence:</br>
                    <input name='newSetor' value='".$row['setor']."'></p>
        
                    <p>Digite a LOJA que está a impressora:</br>
                    <input name='newLoja' value='".$row['loja']."'></p>
        
                    <p>Data do último concerto:</br>
                    <input name='newConcerto' type='date' value='".$row['D_concerto']."'></p>
        
                    <p>Data da última troca de toner:</br>
                    <input name='newToner' type='date' value='".$row['T_toner']."'></p>
        
                    <p>Quem fez a solicitação:</br>
                    <input name='newSolicitacao' value='".$row['U_solicitacao']."'></p>
        
                    <div><button name='editaImpressora' value='0'>Cadastrar</button></div>";
                    
                }
            
            ?>
            
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
