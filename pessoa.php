<? require('conexao.php'); ?>
<table cellspacing='0' cellpadding='0' border='0' width='700'>
<tr>
<td colspan='7'>
<form name='busca' id='busca' action='pessoa.php' method='GET'><br><center>
Nome: <input size=50 type='text' name='buscaNome' id='buscaNome' value='' /><br>
CNH/RG/CPF: <input size=10 type='text' name='buscaDocumento' id='buscaDocumento' value='' />
<br><br><center><input type='submit' name='buscar' id='buscar' value='Buscar' />&nbsp;&nbsp;&nbsp;<form name='busca' id='busca' action='pessoa.php' method='GET'><input type='submit' value='Limpar' /></form>
<hr width=600>
</form>
</td>
</tr>
<tr>
<td>Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>CNH</td><td><center>UF</td><td><center>RG</td><td><center>UF</td><td><center>CPF</td><td><center>Opções</td>
</tr>

<?
$buscaNome = $_GET['buscaNome'];
$buscaDocumento = $_GET['buscaDocumento'];

if ($_GET['buscaNome'] == ""){$buscaNome = " ";}
if ($_GET['buscaDocumento'] == ""){$buscaDocumento = " ";}

if ($_GET['buscar'] == 'Buscar') {
// busca apenas tudo
if ($buscaNome == " " and $buscaDocumento == " ") {$sqlClientes .= "SELECT * FROM pessoa ORDER BY nome_pessoa ASC ";}

// busca apenas por nome
if ($buscaNome != " " and $buscaDocumento == " ") {$sqlClientes .= "SELECT * FROM pessoa WHERE nome_pessoa LIKE '%".$buscaNome."%' ORDER BY nome_pessoa ASC ";}

// busca apenas por CNH/RG/CPF
if ($buscaNome == " " and $buscaDocumento != " ") {$sqlClientes .= "SELECT * FROM pessoa WHERE cnh_pessoa LIKE '%".$buscaDocumento."%' OR rg_pessoa LIKE '%".$buscaDocumento."%' OR cpf_pessoa LIKE '%".$buscaDocumento."%' ORDER BY nome_pessoa ASC ";}

// busca apenas por nome e CNH/RG/CPF
if ($buscaNome != " " and $buscaDocumento != " ") {$sqlClientes .= "SELECT * FROM pessoa WHERE (nome_pessoa LIKE '%".$buscaNome."%' OR cnh_pessoa LIKE '%".$buscaDocumento."%' OR rg_pessoa LIKE '%".$buscaDocumento."%') AND cpf_pessoa LIKE '%".$buscaDocumento."%' ORDER BY nome_pessoa ASC ";}

// fim do get_buscar

$queryClientes = mysql_query($sqlClientes) or die(mysql_error());
while ($rowCliente = mysql_fetch_array($queryClientes)) {
?>
<tr>
<td> <? echo $rowCliente['nome_pessoa']; ?> </td>
<td> <? echo $rowCliente['cnh_pessoa']; ?> </td>
<td><center>  <? echo $rowCliente['cnh_uf_pessoa']; ?> </td>
<td> <? echo $rowCliente['rg_pessoa']; ?> </td>
<td><center>  <? echo $rowCliente['rg_uf_pessoa']; ?> </td>
<td> <? echo $rowCliente['cpf_pessoa']; ?> </td>
<td><center><a href="pessoa_alt.php?registro=<? echo $rowCliente['id_pessoa']; ?>"><img src=imagem/editar.gif border=0></a>&nbsp;&nbsp;&nbsp;<a href="pessoa_exc.php?registro=<? echo $rowCliente['id_pessoa']; ?>"><img src=imagem/deletar.gif border=0></a></td>
</tr>
<? } } ?>
</table>
