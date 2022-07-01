<?php
  include_once "../model/Impressora.class.php";
  session_start();


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

            if(isset($_SESSION['impressoras'])){
              for($i=0; $i<count($_SESSION['impressoras']); $i++){
                if($i % 2 == 0){
                  echo "<tr>".
                  "<td class='text-center1' id='indice'><a href='altera.impressora.php?i=$i'>".($i+1)."</a></td><td class='text-center1'>".$_SESSION['impressoras'][$i]->getModelo()."</td><td class='text-center1'>".$_SESSION['impressoras'][$i]->getSerial()."</td><td class='text-center1'>".$_SESSION['impressoras'][$i]->getLoja()."</td><td class='text-center1'>".$_SESSION['impressoras'][$i]->getSetor()."</td>".
                  "</tr>";
                }
                else{
                  echo "<tr>".
                  "<td class='text-center' id=='indice'><a href='altera.impressora.php?i=$i'>".($i+1)."</a></td><td class='text-center'>".$_SESSION['impressoras'][$i]->getModelo()."</td><td class='text-center'>".$_SESSION['impressoras'][$i]->getSerial()."</td><td class='text-center'>".$_SESSION['impressoras'][$i]->getLoja()."</td><td class='text-center'>".$_SESSION['impressoras'][$i]->getSetor()."</td>".
                  "</tr>";
                }
              }
            }

          ?>

        </tbody>
      </table>

    </section>

  </main>

  <footer class="rodape">
    <p>developed by: Émerson Rodrigues da Silva</p>
  </footer>

</body>
<script type="text/javascript" src="../js/funcoes.js"></script>
</html>