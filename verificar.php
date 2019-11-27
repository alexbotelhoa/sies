<?
//Inicia a sessão
session_start();

//Verifica se há dados ativos na sessão
if(empty($_SESSION["id_militar"]) || empty($_SESSION["nome_militar"]))
{header("Location:login.php");}
?>
