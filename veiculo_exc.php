<? require('conexao.php');

$id_veiculo = $_GET['registro'];

if ($_GET['buscar'] == 'Excluir') 
{

$id_veiculo = $_GET['id_veiculo'];
	$sql = "SELECT pessoa_registro FROM registro WHERE pessoa_registro='$id_pessoa'";
	$consulta = mysql_query($sql, $con); 
	$dados = mysql_fetch_array($consulta);

	if ($dados['pessoa_registro'] == $id_pessoa)
	{
	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial size=3 color=red>O visitante selecionado contém registro(s) de entrada na BAPV.</font><br>";
	echo "<center><font style=Arial size=3 color=red>Por esse motivo não será possível deletar esse visitante.</font><br><br>";
	echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador<br> para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
	}					
	else
	{
	$sql = "DELETE FROM veiculo WHERE id_veiculo='$id_veiculo'";

	mysql_query($sql, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
	mysql_close();

	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial color=green>Exclusão efetuada com sucesso!</font></center>";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=veiculo.php'>";
	}
}else{

$sql = "SELECT * FROM veiculo, tipo, cor WHERE tipo_veiculo = id_tipo AND cor_veiculo = id_cor AND id_veiculo='$id_veiculo'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

?>
<center>
<form name='busca' id='busca' action='veiculo_exc.php' method='GET'>
<input type='hidden' name='id_veiculo' value="<? print_r($dados['id_veiculo']); ?>">
<table width=600>
 <tr><td colspan=4 align=center>Dados do Ve&iacute;culo</td></tr>
 <tr><td width=100>Tipo:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['nome_tipo']); ?>"></td>
     <td width=100>Cor:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['nome_cor']); ?>"></td>
 </tr>
 <tr><td width=100>Placa:</td><td width=500 colspan=3><input size='12' type='text' readonly value="<? print_r($dados['placa_veiculo']); ?>"></td></tr>
</table>
<input type='submit' name='buscar' id='buscar' value='Excluir' /></form><form action='veiculo.php' method='GET'><input type='submit' value='Voltar' /></form>
<?}?>
