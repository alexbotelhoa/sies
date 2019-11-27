<?require('conexao.php');?>
<table cellspacing='0' cellpadding='0' border='0' width='700'>
<tr>
<td colspan='7'>
<form name='busca' id='busca' action='registro.php' method='GET'><br><center>
Nome: <input size=50 type='text' name='buscaNome' id='buscaNome' value='' /><br>
<center>Veículo:<select id='buscaVeiculo' name="buscaVeiculo">
<option value="" SELECTED>Selecione o Tipo</option>
<?php
$sql = "SELECT * FROM tipo order by nome_tipo ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['nome_tipo']."'>".$dados['nome_tipo']."</option>");}
?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Placa: <input size=10 type='text' name='buscaPlaca' id='buscaPlaca' value='' />
<br><br><center><input type='submit' name='buscar' id='buscar' value='Buscar' />&nbsp;&nbsp;&nbsp;<form name='busca' id='busca' action='registro.php' method='GET'><input type='submit' value='Limpar' /></form>
<hr width=600>
</form>
</td>
</tr>
<tr>
<td>Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Veículo</td><td><center>Placa</td><td><center>Status</td><td><center>Opções</td>
</tr>
<?
$buscaNome = $_GET['buscaNome'];
$buscaVeiculo = $_GET['buscaVeiculo'];
$buscaPlaca = $_GET['buscaPlaca'];

if ($_GET['buscaNome'] == "") {$buscaNome = " ";}
if ($_GET['buscaVeiculo'] == "") {$buscaVeiculo = " ";}
if ($_GET['buscaPlaca'] == "") {$buscaPlaca = " ";}

if ($_GET['buscar'] == 'Buscar') {

// busca apenas tudo
if ($buscaNome == " " AND $buscaVeiculo == " " AND $buscaPlaca == " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND pessoa_registro <> '' ORDER BY nome_pessoa ASC ";}

// busca apenas por nome
if ($buscaNome != " " AND $buscaVeiculo == " " AND $buscaPlaca == " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_pessoa LIKE '%".$buscaNome."%' ORDER BY nome_pessoa ASC ";}

// busca apenas por veiculo
else if ($buscaNome == " " AND $buscaVeiculo != " " AND $buscaPlaca == " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_tipo LIKE '%".$buscaVeiculo."%' ORDER BY nome_pessoa ASC ";}

// busca apenas por placa
else if ($buscaNome == " " AND $buscaVeiculo == " " AND $buscaPlaca != " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND placa_veiculo LIKE '%".$buscaPlaca."%' ORDER BY nome_pessoa ASC ";}

// busca nome e veiculo
else if ($buscaNome != " " AND $buscaVeiculo != " " AND $buscaPlaca == " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_pessoa LIKE '%".$buscaNome."%' AND nome_tipo LIKE '%".$buscaVeiculo."%' ORDER BY nome_pessoa ASC ";}

// busca nome e placa
else if ($buscaNome != " " AND $buscaVeiculo == " " AND $buscaPlaca != " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_pessoa LIKE '%".$buscaNome."%' AND placa_veiculo LIKE '%".$buscaPlaca."%' ORDER BY nome_pessoa ASC ";}

// busca veiculo e placa
else if ($buscaNome == " " AND $buscaVeiculo != " " AND buscaPlaca != " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_tipo LIKE '%".$buscaVeiculo."%' AND placa_veiculo LIKE '%".$buscaPlaca."%' ORDER BY nome_pessoa ASC ";}

// busca nome, veiculo e placa
else if ($buscaNome != " " AND $buscaVeiculo != " " AND $buscaPlaca != " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_pessoa LIKE '%".$buscaNome."%' AND nome_tipo LIKE '%".$buscaVeiculo."%' AND placa_veiculo LIKE '%".$buscaPlaca."%' ORDER BY nome_pessoa ASC ";}

// fim do get_buscar

$queryClientes = mysql_query($sqlClientes) or die(mysql_error());
while ($rowCliente = mysql_fetch_array($queryClientes)) {

if ($rowCliente['dt_saida_registro'] == ""){$status = "Aberto";}else{$status = "Fechado";}
?>
<tr>
<td> <? echo $rowCliente['nome_pessoa']; ?> </td>
<td> <? echo $rowCliente['nome_tipo']; ?> </td>
<td><center> <? echo $rowCliente['placa_veiculo']; ?> </td>
<td><center> <? echo $status; ?> </td>
<td><center><a href="registro_alt.php?registro=<? echo $rowCliente['id_registro']; ?>""<img src=imagem/editar.gif border=0></a>&nbsp;&nbsp;&nbsp;<a href="registro_exc.php?registro=<? echo $rowCliente['id_registro']; ?>""><img src=imagem/deletar.gif border=0></a></td>
</tr>
<? } } ?>
</table>
