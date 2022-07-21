<?php

function db_connect()
{
   $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME.';charset=utf8', DB_USER, DB_PASS);
   
    return $PDO;
}

function teste_log(){

    $login = $_POST['username'];
    $senha = sha1($_POST['senha']);
    $consulta = db_connect();
    $verificacao = $consulta->query("SELECT * FROM tb_login WHERE username = '$login' AND senha = '$senha';");
    

    while($row = $verificacao->fetch()){
        $_SESSION['usuario']= $row['username'];
        $_SESSION['id']= $row['id_login'];
        $_SESSION['nome']= $row['nome'];

    }
}

function deslogar(){
    
    unset($_SESSION['usuario']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    header("0;index.php");

}
?>