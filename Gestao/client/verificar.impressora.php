<?php
  include_once "../model/Impressora.class.php";
  include_once "../controller/conecta.php";
  session_start();
  $conexao = db_connect();
  
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
  <title>Gestão de hardware</title>
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
        <a href="cadastro.impressora.php">
          <li>Cadastrar impressoras</li>
        </a>
      </ul>
    </nav>
  </header>
    
  <main class="verificarMain">
    <section id="lista">

      <form method="GET" action="#" class="formFiltro">
        <h2>Pesquise a impressora por:</h2>
        <div id="divButton">
          <button onclick="filtroLoja()" id="buttonLoja" type="button">Loja</button>
          <button onclick="filtroSetor()" id="buttonSetor" type="button">Setor</button>
          <button onclick="filtroModelo()" id="buttonModelo" type="button">Modelo</button>
        </div>
        <div id="PesquisarFiltro">
        </div>
      </form>
      <form id="verificar_table" method="GET" action="altera.impressora.php">
        <table class="table">
          <caption><b>Listas de impressoras</b></caption>
          <thead>
            <tr>
              <th>Indice</th>
              <th>Modelo</th>
              <th>Serial</th>
              <th>Loja</th>
              <th>Setor</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $consulta = $conexao->query("SELECT * FROM tb_impressora");  
                                                            
            while ($row = $consulta->fetch()) {
              if($row['id'] % 2 ==0){
                echo "<tr>".
                "<td class='text-center1' id='indice'><button name='codImp' type='submit' value='".$row['id']."'>".$row['id'].
                "</button></td><td class='text-center1'>".$row['modelo'].
                "</td><td class='text-center1'>".$row['serial'].
                "</td><td class='text-center1'>".$row['loja'].
                "</td><td class='text-center1'>".$row['setor']."</td>".
                "</tr>";
              }else{
                echo "<tr>".
                "<td class='text-center' id='indice'><button name='codImp' type='submit' value='".$row['id']."'>".$row['id'].
                "</button></td><td class='text-center'>".$row['modelo'].
                "</td><td class='text-center'>".$row['serial'].
                "</td><td class='text-center'>".$row['loja'].
                "</td><td class='text-center'>".$row['setor']."</td>".
                "</tr>";
              }
              
            }



              /*if(isset($_SESSION['impressoras'])){
                for($i=0; $i<count($_SESSION['impressoras']); $i++){
                  if($i % 2 == 0){
                    echo "<tr>".
                    "<td class='text-center1' id='indice'><button name='codImp' type='submit' value='$i'>$i</button></td><td class='text-center1'>".$_SESSION['impressoras'][$i]->getModelo()."</td><td class='text-center1'>".$_SESSION['impressoras'][$i]->getSerial()."</td><td class='text-center1'>".$_SESSION['impressoras'][$i]->getLoja()."</td><td class='text-center1'>".$_SESSION['impressoras'][$i]->getSetor()."</td>".
                    "</tr>";
                  }
                  else{
                    echo "<tr>".
                    "<td class='text-center' id=='indice'><button name='codImp' type='submit' value='$i'>$i</button></td><td class='text-center'>".$_SESSION['impressoras'][$i]->getModelo()."</td><td class='text-center'>".$_SESSION['impressoras'][$i]->getSerial()."</td><td class='text-center'>".$_SESSION['impressoras'][$i]->getLoja()."</td><td class='text-center'>".$_SESSION['impressoras'][$i]->getSetor()."</td>".
                    "</tr>";
                  }
                }
              }*/

            ?>

          </tbody>
        </table>
      </form>
    </section>

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