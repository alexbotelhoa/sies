<? require('conexao.php');
if ($_SESSION["secao_militar"]==0){header("Location:index.php");}
if ($_GET['id_registro']<>"")
{
$id_registro = $_GET['id_registro'];

// DADOS DESTINOS
$dt_saida = $dia.'/'.$meses0[$mes].'/'.$ano;
$hr_saida = $hr;

$sql2 = "UPDATE registro SET dt_saida_registro='$dt_saida', hr_saida_registro='$hr_saida' WHERE id_registro='$id_registro'";

mysql_query($sql2, $con) or die ("<font style=Arial color=red><h1>Houve um erro na gravação dos dados</h1></font>");

mysql_close($con);

echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=fechar.php'>";
}else{
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=fechar.php'>";
?>

<!-- Cadastro da Pessoa -->
<center>
<table width=600>
 <tr><td width=600 colspan=5 align=center>Fechar a entrada do visitante</td></tr>
 <tr><td width=50><center>Crachá</td><td width=400 align=center>Nome</td><td width=100><center>Esquadrão</td><td width=100><center>Visualizar</td><td width=50><center>Fechar</td></tr>
<?php
$sql = "SELECT * FROM registro, pessoa, veiculo, esquadrao, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND esquadrao_registro = id_esquadrao AND dt_saida_registro = '' ORDER BY cracha_registro ASC";

$consulta=mysql_query($sql, $con);

while ($dados = mysql_fetch_array($consulta)) {
echo("<form name='form' action='fechar.php' method='GET'><tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50><center><INPUT TYPE='hidden' NAME='id_registro' VALUE='".$dados['id_registro']."'><input type='Submit' value='Fechar'></td></tr></form>");
}
?>
</table>
</center>
<?
}
?>
