<?php
include_once "../model/Impressora.class.php";
include_once "conecta.php";
$conexao = db_connect();
session_start();

if(isset($_SESSION['impressoras'])){

}else{
    $_SESSION['impressoras'] = array();
}

//dando um valor para o ip caso esteja vazio


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
                //-------------------------------------------------------------
                //cadastrar os dados da impressora
                //-------------------------------------------------------------
            if(isset($_POST['cadImpressora'])){
                if(isset($_POST['modelo']) and isset($_POST['serial'])
                and isset($_POST['setor']) and isset($_POST['loja'])){
                    //colocando os dados numa variável
                    
                       
                    $tempImpressora = new Impressora($_POST['modelo'], $_POST['serial'],
                        $_POST['ip'], $_POST['setor'],$_POST['loja']);
                    
                    
                    
                    
                    //Gravando no BD

                    try {          
                        $modelo = $tempImpressora->getModelo();
                        $serial = $tempImpressora->getSerial();
                        $ip = $tempImpressora->getIP();
                        $loja = $tempImpressora->getLoja();
                        $setor = $tempImpressora->getSetor();
                        $toner = $tempImpressora->getToner();
                        $concerto = $tempImpressora->getConcerto();
                        $solicitacao = $tempImpressora->getSolicitacao();


                        $comandoSQL = "INSERT INTO tb_impressora (modelo,serial,loja,ip,setor,T_toner,D_concerto,U_solicitacao) 
                                        VALUES ('$modelo','$serial','$loja','$ip','$setor','$toner','$concerto','$solicitacao')";        
                        $grava = $conexao->prepare($comandoSQL); //testa o comando
                        $grava->execute(array());     
                        
                        
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

                        header("Refresh:4;../client/cadastro.impressora.php");
                       
                    }catch(PDOException $e) { // caso retorne erro
                        
                        echo '<h1>
                        Erro ' . $e->getMessage() .
                             '</h1>';
                        
                    }

                    

                }else{
                    echo "<h2 style='color: red;'>Dados inválidos!</h2>";
                    header("Refresh:2;../client/cadastro.impressora.php");
                }

            }
                //-------------------------------------------------------------
                //editar os dados da impressora
                //-------------------------------------------------------------
            else if(isset($_POST['editaImpressora'])){
                //-------------------------------------------------------------
                //deixando os dados como null caso nao estejam preenchido, para ocasionar a tela de
                //  DADOS INVÁLIDOS!!!
                //-------------------------------------------------------------
                if(empty($_POST['newModelo'])){
                    $_POST['newModelo'] = null;
                }
                
                if(empty($_POST['newSerial'])){
                    $_POST['newSerial'] = null;
                }

                //-------------------------------------------------------------
                //editar os dados da impressora
                //-------------------------------------------------------------

                if(isset($_POST['newModelo']) and isset($_POST['newSerial'])
                and isset($_POST['indice']) and isset($_POST['newIp']) 
                and isset($_POST['newSetor']) and isset($_POST['newLoja'])
                and isset($_POST['newToner']) and isset($_POST['newConcerto']) 
                and isset($_POST['newSolicitacao'])){

                    $i = ($_POST['indice']);
                    //$intermidiario = $conexao->query("SELECT * FROM tb_impressora WHERE id = '$i'");
                    
                    $modelo = $_POST['newModelo'];
                    $serial = $_POST['newSerial'];
                    $ip = $_POST['newIp'];
                    $setor =$_POST['newSetor'];
                    $loja = $_POST['newLoja'];
                    $toner = $_POST['newToner'];
                    $concerto = $_POST['newConcerto'];
                    $solicitacao = $_POST['newSolicitacao'];

                    $update = $conexao->query("UPDATE tb_impressora
                    SET  modelo = '$modelo' , serial = '$serial' , loja = '$loja' , ip = '$ip', setor = '$setor', T_toner = '$toner', D_concerto = '$concerto', U_solicitacao = '$solicitacao'
                    WHERE id = $i;");
                    
                    echo "<div class='cadastradoDiv'>".
                    "<h2 style='color: green;'>Foi alterada com sucesso!</h2>".
                    "<p>A impressora de dados:</p>";
                        $consulta = $conexao->query("SELECT * FROM tb_impressora WHERE id = '$i'");
                        while ($row = $consulta->fetch()) {
                            echo "<p>Modelo: ".$row['modelo']."</p>
                            <p>Serial: ".$row['serial']."</p>
                            <p>IP: ".$row['ip']."</p>
                            <p>Loja: ".$row['loja']."</p>
                            <p>Setor: ".$row['setor']."</p>
                            <p>Ult. toner: ".$row['T_toner']."</p>
                            <p>Ult. concerto: ".$row['D_concerto']."</p>
                            <p>Ult. a solicitar: ".$row['U_solicitacao']."</p>";
                        }
                    
                    "</div>";

                    header("Refresh:4;../client/verificar.impressora.php");

                }else{
                    echo "<h2 style='color: red;'>Dados inválidos!</h2>";
                    header("Refresh:2;../client/verificar.impressora.php");
                }
            }else{
                echo "ERRO!!!!";
                header("Refresh:2;../client/verificar.impressora.php");

            }
            
            

            ?>

        </section>
    </main>
    <footer class="rodape">
        <p>developed by: Émerson Rodrigues da Silva</p>
    </footer>
</body>
</html>
<?php

}else{
    echo "<h1>Usuário não conectado!</h1>";
    header("Refresh:2; ../index.php");
}

?>
