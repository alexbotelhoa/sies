<? require('conexao.php');

$id_militar = $_GET['registro'];

if ($id_militar==1){header("Location:index.php");}

if ($_GET['buscar'] == 'Excluir') 
{
$id_militar = $_GET['id_militar'];
	$sql = "SELECT militar_registro FROM registro WHERE militar_registro='$id_militar'";
	$consulta = mysql_query($sql, $con); 
	$dados = mysql_fetch_array($consulta);

	if ($dados['militar_registro'] == $id_militar)
	{
	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial size=3 color=red>O Militar selecionado está vinculado a registro(s) de entrada de visitante(s) na BAPV.</font><br>";
	echo "<center><font style=Arial size=3 color=red>Por esse motivo não será possível deletar esse Militar.</font><br><br>";
	echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador<br> para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
	}					
	else
	{
	$sql = "DELETE FROM militar WHERE id_militar='$id_militar'";

	mysql_query($sql, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
	mysql_close();

	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial color=green>Exclusão efetuada com sucesso!</font></center>";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=militar.php'>";
	}
}
else
{

$sql = "SELECT * FROM militar WHERE id_militar='$id_militar'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

?>
<center>
<form name='busca' id='busca' action='militar_exc.php' method='GET'>
<input type='hidden' name='id_militar' value="<? print_r($dados['id_militar']); ?>">
<table width=600>
 <tr><td colspan=4 align=center>Dados do Militar</td></tr>
 <tr><td width=100>Nome:</td><td width=500 colspan=5><input size='30' type='text' readonly name='nome' value="<? print_r($dados['nome_militar']); ?>"></td></tr>
 <tr><td width=100>Pst/Grd:</td><td width=200>
	<select name="pstgrd">
	<?php
	$sql2 = "SELECT * FROM pstgrd";
	$consulta2=mysql_query($sql2, $con);
	while ($dados2 = mysql_fetch_array($consulta2)) {?>
	<option value="<? print_r($dados2['nome_pstgrd']); ?>"<? if ($dados2['nome_pstgrd'] == $dados['pstgrd_militar']){echo " SELECTED";}?>><? print_r($dados2['nome_pstgrd']); ?></option>
	<?}?>
	</select>
   </td>
     <td width=100>Esp:</td><td width=200><input size='6' type='text' readonly name="esp" value="<? print_r($dados['esp_militar']); ?>"></td>
     <td width=100>Guerra:</td><td width=200><input size='12' type='text' readonly name="guerra" value="<? print_r($dados['guerra_militar']); ?>"></td>
 </tr>
 <tr><td width=100>Opção:</td><td width=500 colspan=5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Militar da SIC <input type="text" size='4' readonly value="<? if ($rowCliente['secao_militar'] == 1){echo 'Sim';}else{echo 'Não';} ?>" name="secao"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Administrador <input type="text" size='4' readonly value="<? if ($rowCliente['admin_militar'] == 1){echo 'Sim';}else{echo 'Não';} ?>" name="admin"></td></tr>
<tr><td width=100>Acesso:</td><td width=500 colspan=5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login <input type="text" readonly size="10" name="login" value="<? print_r($dados['login_militar']); ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Senha <input type="text" readonly size="10" name="senha" value="<? print_r($dados['senha_militar']); ?>"></td></tr>
</table>
<input type='submit' name='buscar' id='buscar' value='Excluir' /></form><form action='militar.php' method='GET'><input type='submit' value='Voltar' /></form>
<?}?>
