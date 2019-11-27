<? require('conexao.php'); ?>
<table cellspacing='0' cellpadding='0' border='0' width='700'>
<tr>
<td colspan='7'>
<form name='busca' id='busca' action='militar.php' method='GET'><br><center>
Nome: <input size=50 type='text' name='buscaNome' id='buscaNome' value='' />
<br><br><center><input type='submit' name='buscar' id='buscar' value='Buscar' />&nbsp;&nbsp;&nbsp;<form name='busca' id='busca' action='militar.php' method='GET'><input type='submit' value='Limpar' /></form>
<hr width=600>
</form>
<form action='militar_add.php'><input type='submit' value='Adicionar' /></form>
</td>
</tr>
<tr>
<td>Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center>Posto</td><td><center>Esp</td><td><center>Guerra</td><td><center>SIC</td><td><center>Admin</td><td><center>Opções</td>
</tr>

<?
$buscaNome = $_GET['buscaNome'];

if ($_GET['buscaNome'] == ""){$buscaNome = " ";}

if ($_GET['buscar'] == 'Buscar'){

// busca apenas tudo
if ($buscaNome == " "){$sqlClientes .= "SELECT * FROM militar ORDER BY nome_militar ASC ";}

// busca apenas por nome
if ($buscaNome != " "){$sqlClientes .= "SELECT * FROM militar WHERE nome_militar LIKE '%".$buscaNome."%' ORDER BY nome_militar ASC ";}

 // fim do get_buscar

$queryClientes = mysql_query($sqlClientes) or die(mysql_error());
while ($rowCliente = mysql_fetch_array($queryClientes)) {

?>
<tr>
<td> <? echo $rowCliente['nome_militar']; ?> </td>
<td><center> <? echo $rowCliente['pstgrd_militar']; ?> </td>
<td><center> <? echo $rowCliente['esp_militar']; ?> </td>
<td><center> <? echo $rowCliente['guerra_militar']; ?> </td>
<td><center>  <? if ($rowCliente['secao_militar'] == 1){echo "Sim";}else{echo "Não";}?> </td>
<td><center>  <? if ($rowCliente['admin_militar'] == 1){echo "Sim";}else{echo "Não";}?> </td>
<td><center>
<? if ($rowCliente['id_militar']!=1){ ?>
<a href="militar_alt.php?registro=<? echo $rowCliente['id_militar']; ?>"><img src=imagem/editar.gif border=0></a>&nbsp;&nbsp;&nbsp;<a href="militar_exc.php?registro=<? echo $rowCliente['id_militar']; ?>"><img src=imagem/deletar.gif border=0></a>
<?}?>
<? if (($_SESSION["id_militar"]==1) and ($rowCliente['id_militar']==1)){ ?>
<a href="militar_alt.php?registro=<? echo $rowCliente['id_militar']; ?>"><img src=imagem/editar.gif border=0></a>
<?}?>
</td>
</tr>
<? } }  ?>
</table>
