<? require('conexao.php');

$id_registro = $_GET['registro'];

if ($_GET['buscar'] == 'Salvar') 
{
$id_registro = $_GET['id_registro'];

	if ($_GET['cracha'] == "" or $_GET['militar'] == "" or $_GET['esquadrao'] == "" or $_GET['secao'] == "")
	{
	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial size=3 color=red>Você esqueceu de preencher algum campo.</font><br>";
	echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
	}
	else
	{
$id_registro = $_GET['id_registro'];
$cracha = $_GET['cracha'];
$militar = $_GET['militar'];
$esquadrao = $_GET['esquadrao'];
$secao = $_GET['secao'];

$sql = "UPDATE registro SET cracha_registro='$cracha', militar_registro='$militar', esquadrao_registro='$esquadrao', secao_registro='$secao' WHERE id_registro='$id_registro'";

mysql_query($sql, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

echo "<br><br><br><br><br>";
echo "<center><font style=Arial color=green>Alteração efetuada com sucesso!</font></center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=registro.php'>";
	}
}
else
{

$sql = "SELECT * FROM registro, pessoa, veiculo, tipo, militar, esquadrao, secao, cor WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND cor_veiculo = id_cor AND secao_registro = id_secao AND esquadrao_registro = id_esquadrao AND militar_registro = id_militar AND id_registro='$id_registro'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

?>
<center>
<form name='busca' id='busca' action='registro_alt.php' method='GET'>
<input type='hidden' name='id_registro' value="<? print_r($dados['id_registro']); ?>">
<table width=600>
 <tr><td colspan=4 align=center>Dados Pessoais</td></tr>
 <tr><td width=100>Nome:</td><td width=500 colspan=3><input size='35' readonly type='text' value="<? print_r($dados['nome_pessoa']); ?>"></td></tr>
 <tr><td width=100>CNH:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['cnh_pessoa']); ?>"></td>
     <td width=100>UF:</td><td width=200><input size='5' type='text' readonly value="<? print_r($dados['cnh_uf_pessoa']); ?>"></td>
 </tr>
 <tr><td width=100>RG:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['rg_pessoa']); ?>"></td>
     <td width=100>UF:</td><td width=200><input size='5' type='text' readonly value="<? print_r($dados['rg_uf_pessoa']); ?>"></td>
 </tr>
 <tr><td width=100>CPF:</td><td width=500 colspan=3><input size='12' readonly type='text' value="<? print_r($dados['cpf_pessoa']); ?>"></td></tr>
</table>
<table width=600>
 <tr><td colspan=4 align=center>Dados do Ve&iacute;culo</td></tr>
 <tr><td width=100>Tipo:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['nome_tipo']); ?>"></td>
     <td width=100>Cor:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['nome_cor']); ?>"></td>
 </tr>
 <tr><td width=100>Placa:</td><td width=500 colspan=3><input size='12' readonly type='text' value="<? print_r($dados['placa_veiculo']); ?>"></td></tr>
</table>
<table width=600>
 <tr><td colspan=4 align=center>Dados do Destino</td></tr>
 <tr><td width=100>Crach&aacute;:</td><td width=200><input size='5' type='text' name="cracha" value="<? print_r($dados['cracha_registro']); ?>"></td>
     <td width=100>Militar:</td><td width=200>
	<select name="militar">
	<?
	$sql1 = "SELECT * FROM militar order by nome_militar ASC";
	$consulta1=mysql_query($sql1, $con); 
	while ($dados1 = mysql_fetch_array($consulta1)) {?>
	<option value="<? print_r($dados1['id_militar']); ?>"<? if ($dados1['id_militar'] == $dados['id_militar']){echo " SELECTED";}?>><? print_r($dados1['pstgrd_militar']); ?>&nbsp;<? print_r($dados1['guerra_militar']); ?></option>
	<?}?>
	</select>
     </td>
 </tr>
 <tr><td width=100>Esquadr&atilde;o:</td><td width=200>
	<select name="esquadrao">
	<?
	$sql2 = "SELECT * FROM esquadrao order by nome_esquadrao ASC";
	$consulta2=mysql_query($sql2, $con); 
	while ($dados2 = mysql_fetch_array($consulta2)) {?>
	<option value="<? print_r($dados2['id_esquadrao']); ?>"<? if ($dados2['id_esquadrao'] == $dados['id_esquadrao']){echo " SELECTED";}?>><? print_r($dados2['nome_esquadrao']); ?></option>
	<?}?>
	</select>
     </td>
     <td width=100>Se&ccedil;&atilde;o:</td><td width=200>
	<select name="secao">
	<?
	$sql3 = "SELECT * FROM secao order by nome_secao ASC";
	$consulta3=mysql_query($sql3, $con); 
	while ($dados3 = mysql_fetch_array($consulta3)) {?>
	<option value="<? print_r($dados3['id_secao']); ?>"<? if ($dados3['id_secao'] == $dados['id_secao']){echo " SELECTED";}?>><? print_r($dados3['nome_secao']); ?></option>
	<?}?>
	</select>
     </td>
 </tr>
 <tr><td width=100>Dt Entrada:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['dt_entrada_registro']); ?>"></td>
     <td width=100>Hr Entrada:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['hr_entrada_registro']); ?>"></td>
 </tr>
  </tr>
 <tr><td width=100>Dt Sa&iacute;da:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['dt_saida_registro']); ?>"></td>
     <td width=100>Hr Sa&iacute;da:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['hr_saida_registro']); ?>"></td>
 </tr>
</table>
<input type='submit' name='buscar' id='buscar' value='Salvar' /></form><form action='veiculo.php' method='GET'><input type='submit' value='Voltar' /></form>
<?}?>
