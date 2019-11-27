<?
require('conexao.php');

$id_pessoa = $_GET['registro'];

if ($_GET['buscar'] == 'Excluir') 
{

$id_pessoa = $_GET['id_pessoa'];
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
	$sql = "DELETE FROM pessoa WHERE id_pessoa='$id_pessoa'";

	mysql_query($sql, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
	mysql_close();

	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial color=green>Exclusão efetuada com sucesso!</font></center>";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=pessoa.php'>";
	}
}else{

$sql = "SELECT * FROM pessoa WHERE id_pessoa='$id_pessoa'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

?>
<center>
<form name='busca' id='busca' action='pessoa_exc.php' method='GET'>
<input type='hidden' name='id_pessoa' value="<? print_r($dados['id_pessoa']); ?>">
<table width=600>
 <tr><td colspan=4 align=center>Dados Pessoais</td></tr>
 <tr><td width=100>Nome:</td><td width=500 colspan=3><input size='35' type='text' readonly value="<? print_r($dados['nome_pessoa']); ?>"></td></tr>
 <tr><td width=100>CNH:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['cnh_pessoa']); ?>"></td>
     <td width=100>UF:</td><td width=200><input size='5' type='text' readonly value="<? print_r($dados['cnh_uf_pessoa']); ?>"></td>
 </tr>
 <tr><td width=100>RG:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['rg_pessoa']); ?>"></td>
     <td width=100>UF:</td><td width=200><input size='5' type='text' readonly value="<? print_r($dados['rg_uf_pessoa']); ?>"></td>
 </tr>
 <tr><td width=100>CPF:</td><td width=500 colspan=3><input size='12' type='text' readonly value="<? print_r($dados['cpf_pessoa']); ?>"></td></tr>
</table>
<input type='submit' name='buscar' id='buscar' value='Excluir' /></form><form action='pessoa.php' method='GET'><input type='submit' value='Voltar' /></form>
<?}?>
