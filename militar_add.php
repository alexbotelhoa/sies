<? require('conexao.php');

if ($_GET['buscar'] == 'Salvar') 
{
	if ($_GET['nome'] == "" or $_GET['pstgrd'] == "0" or $_GET['esp'] == "" or $_GET['guerra'] == "")
	{
	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial size=3 color=red>Você esqueceu de preencher algum campo.</font><br>";
	echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
	}
	else
	{
$nome = $_GET['nome'];
$pstgrd = $_GET['pstgrd'];
$esp = $_GET['esp'];
$guerra = $_GET['guerra'];
if ($_GET['secao'] == ""){$secao = 0;}else{$secao = $_GET['secao'];}
if ($_GET['admin'] == ""){$admin = 0;}else{$admin = $_GET['admin'];}
$login = $_GET['login'];
$senha = $_GET['senha'];

$sql = "INSERT INTO militar (
nome_militar,
pstgrd_militar,
esp_militar, 
guerra_militar, 
secao_militar,
admin_militar,
login_militar, 
senha_militar
) VALUES (
'$nome', 
'$pstgrd',
'$esp', 
'$guerra',
'$secao', 
'$admin',
'$login', 
'$senha')";

mysql_query($sql, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

echo "<br><br><br><br><br>";
echo "<center><font style=Arial color=green>Militar adicionado com sucesso!</font></center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=militar.php'>";
	}
}
else
{
?>
<center>
<form name='busca' id='busca' action='militar_add.php' method='GET'>
<table width=600>
 <tr><td colspan=4 align=center>Dados do Militar</td></tr>
 <tr><td width=100>Nome:</td><td width=500 colspan=5><input size='30' type='text' name='nome'></td></tr>
 <tr><td width=100>Pst/Grd:</td><td width=200>
	<select name="pstgrd">
	<option value="0">Pst/Grd</option> 
	<?php
	$sql2 = "SELECT * FROM pstgrd";
	$consulta2=mysql_query($sql2, $con);
	while ($dados2 = mysql_fetch_array($consulta2)) {?>
	<option value="<? print_r($dados2['nome_pstgrd']); ?>"><? print_r($dados2['nome_pstgrd']); ?></option>
	<?}?>
	</select>
   </td>
     <td width=100>Esp:</td><td width=200><input size='6' type='text' name="esp"></td>
     <td width=100>Guerra:</td><td width=200><input size='12' type='text' name="guerra"></td>
 </tr>
 <tr><td width=100>Opção:</td><td width=500 colspan=5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Militar da SIC <input type="checkbox" value="1" name="secao"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Administrador<input type="checkbox" value="1" name="admin"></td></tr>
<tr><td width=100>Acesso:</td><td width=500 colspan=5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login <input type="text" size="10" name="login"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Senha <input type="text" size="10" name="senha"></td></tr>
</table>
<input type='submit' name='buscar' id='buscar' value='Salvar' /></form><form action='militar.php' method='GET'><input type='submit' value='Voltar' /></form>
<?}?>
