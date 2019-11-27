<? require('conexao.php');

$id_veiculo = $_GET['registro'];

if ($_GET['buscar'] == 'Salvar') 
{
$id_veiculo = $_GET['id_veiculo'];

	if ($_GET['tipo'] <> "8")
	{
		if ($_GET['tipo'] == "6" and $_GET['cor'] == "1")
		{
		echo "<br><br><br><br><br>";
		echo "<center><font style=Arial size=3 color=red>Você escolheu tipo 'BICICLETA', deve ser selecionado uma opção de cor no campo 'COR'.</font><br>";
		echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
		}
		else
		{
			if ($_GET['tipo'] <> "6" and ($_GET['cor'] == "1" or $_GET['placa'] == "" or $_GET['placa'] == " - "))
			{
			echo "<br><br><br><br><br>";
			echo "<center><font style=Arial size=3 color=red>Você deve selecionar uma opção no campo 'COR' e digital o número da 'PLACA'.</font><br>";	
			echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
			}
			else
			{
$id_veiculo = $_GET['id_veiculo'];
$tipo = $_GET['tipo'];
if ($_GET['tipo'] == "6"){$placa = " - ";}else{$placa = $_GET['placa'];}
$cor = $_GET['cor'];

$sql = "UPDATE veiculo SET tipo_veiculo='$tipo', placa_veiculo='$placa', cor_veiculo='$cor' WHERE id_veiculo='$id_veiculo'";

mysql_query($sql, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

echo "<br><br><br><br><br>";
echo "<center><font style=Arial color=green>Alteração efetuada com sucesso!</font></center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=veiculo.php'>";
			}
		}
	}
	else
	{

$id_veiculo = $_GET['id_veiculo'];
$tipo = $_GET['tipo'];
$placa = " - ";
$cor = 1;

$sql = "UPDATE veiculo SET tipo_veiculo='$tipo', placa_veiculo='$placa', cor_veiculo='$cor' WHERE id_veiculo='$id_veiculo'";

mysql_query($sql, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

echo "<br><br><br><br><br>";
echo "<center><font style=Arial color=green>Alteração efetuada com sucesso!</font></center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=veiculo.php'>";

	}
}
else
{

$sql = "SELECT * FROM veiculo, tipo, cor WHERE tipo_veiculo = id_tipo AND cor_veiculo = id_cor AND id_veiculo='$id_veiculo'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

?>
<center>
<form name='busca' id='busca' action='veiculo_alt.php' method='GET'>
<input type='hidden' name='id_veiculo' value="<? print_r($dados['id_veiculo']); ?>">
<table width=600>
 <tr><td colspan=4 align=center>Dados do Ve&iacute;culo</td></tr>
 <tr><td width=100>Tipo:</td><td width=200>
	<select name="tipo">
	<?php
	$sql2 = "SELECT * FROM tipo";
	$consulta2=mysql_query($sql2, $con);
	while ($dados2 = mysql_fetch_array($consulta2)) {?>
	<option value="<? print_r($dados2['id_tipo']); ?>"<? if ($dados2['id_tipo'] == $dados['id_tipo']){echo " SELECTED";}?>><? print_r($dados2['nome_tipo']); ?></option>
	<?}?>
	</select>
   </td>
     <td width=100>Cor:</td><td width=200>
	<select name="cor">
	<?
	$sql3 = "SELECT * FROM cor order by nome_cor ASC";
	$consulta3=mysql_query($sql3, $con); 
	while ($dados3 = mysql_fetch_array($consulta3)) {?>
	<option value="<? print_r($dados3['id_cor']); ?>"<? if ($dados3['id_cor'] == $dados['id_cor']){echo " SELECTED";}?>><? print_r($dados3['nome_cor']); ?></option>
	<?}?>
	</select>
</td>
 </tr>
 <tr><td width=100>Placa:</td><td width=500 colspan=3><input size='12' type='text' name="placa" value="<? print_r($dados['placa_veiculo']); ?>"></td></tr>
</table>
<input type='submit' name='buscar' id='buscar' value='Salvar' /></form><form action='veiculo.php' method='GET'><input type='submit' value='Voltar' /></form>
<?}?>
