<? require('conexao.php'); ?>

<table cellspacing='0' cellpadding='0' border='0' width='700'>
<tr>
<td colspan='7'>
<form name='busca' id='busca' action='veiculo.php' method='GET'><br>
<center>Veículo:&nbsp;<select id='buscaVeiculo' name="buscaVeiculo">
<option value="" SELECTED>Selecione o Tipo</option>
<?php
$sql = "SELECT * FROM tipo order by nome_tipo ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['nome_tipo']."'>".$dados['nome_tipo']."</option>");
}
?>
</select>&nbsp;&nbsp;&nbsp;
Placa:&nbsp;<input size=6 type='text' name='buscaPlaca' id='buscaPlaca' value='' />&nbsp;&nbsp;&nbsp;
Cor:&nbsp;
<select id='buscaCor' name="buscaCor">
<option value="" SELECTED>Selecione o Tipo</option>
<?php
$sql = "SELECT * FROM cor order by nome_cor ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['nome_cor']."'>".$dados['nome_cor']."</option>");
}
?>
</select>
<br><br><center><input type='submit' name='buscar' id='buscar' value='Buscar' />&nbsp;&nbsp;&nbsp;<form name='busca' id='busca' action='veiculo.php' method='GET'><input type='submit' value='Limpar' /></form>
<hr width=600>
</form>
</td>
</tr>
<tr>
<td><center> Tipo</td><td><center> Placa</td><td><center>Cor</td><td><center>Opções</td>
</tr>
<?

$buscaCor = $_GET['buscaCor'];
$buscaVeiculo = $_GET['buscaVeiculo'];
$buscaPlaca = $_GET['buscaPlaca'];

if ($_GET['buscaCor'] == ""){$buscaCor = " ";}
if ($_GET['buscaVeiculo'] == ""){$buscaVeiculo = " ";}
if ($_GET['buscaPlaca'] == ""){$buscaPlaca = " ";}

if ($_GET['buscar'] == 'Buscar') {

// busca apenas tudo
if ($buscaCor == " " AND $buscaVeiculo == " " AND $buscaPlaca == " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo, cor WHERE cor_veiculo = id_cor AND pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND pessoa_registro <> '' ORDER BY nome_pessoa ASC ";}

// busca apenas por nome
if ($buscaCor != " " AND $buscaVeiculo == " " AND $buscaPlaca == " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo, cor WHERE cor_veiculo = id_cor AND pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_cor LIKE '%".$buscaCor."%' ORDER BY nome_pessoa ASC ";}

// busca apenas por veiculo
else if ($buscaCor == " " AND $buscaVeiculo != " " AND $buscaPlaca == " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo, cor WHERE cor_veiculo = id_cor AND pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_tipo LIKE '%".$buscaVeiculo."%' ORDER BY nome_pessoa ASC ";}

// busca apenas por placa
else if ($buscaCor == " " AND $buscaVeiculo == " " AND $buscaPlaca != " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo, cor WHERE cor_veiculo = id_cor AND pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND placa_veiculo LIKE '%".$buscaPlaca."%' ORDER BY nome_pessoa ASC ";}

// busca nome e veiculo
else if ($buscaCor != " " AND $buscaVeiculo != " " AND $buscaPlaca == " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo, cor WHERE cor_veiculo = id_cor AND pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_pessoa LIKE '%".$buscaCor."%' AND nome_tipo LIKE '%".$buscaVeiculo."%' ORDER BY nome_pessoa ASC ";}

// busca nome e placa
else if ($buscaCor != " " AND $buscaVeiculo == " " AND $buscaPlaca != " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo, cor WHERE cor_veiculo = id_cor AND pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_pessoa LIKE '%".$buscaCor."%' AND placa_veiculo LIKE '%".$buscaPlaca."%' ORDER BY nome_pessoa ASC ";}

// busca veiculo e placa
else if ($buscaCor == " " AND $buscaVeiculo != " " AND buscaPlaca != " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo, cor WHERE cor_veiculo = id_cor AND pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_tipo LIKE '%".$buscaVeiculo."%' AND placa_veiculo LIKE '%".$buscaPlaca."%' ORDER BY nome_pessoa ASC ";}

// busca nome, veiculo e placa
else if ($buscaCor != " " AND $buscaVeiculo != " " AND $buscaPlaca != " ") {
$sqlClientes .= "SELECT * FROM registro, pessoa, veiculo, tipo, cor WHERE cor_veiculo = id_cor AND pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND nome_pessoa LIKE '%".$buscaCor."%' AND nome_tipo LIKE '%".$buscaVeiculo."%' AND placa_veiculo LIKE '%".$buscaPlaca."%' ORDER BY nome_pessoa ASC ";}

 // fim do get_buscar
$queryClientes = mysql_query($sqlClientes) or die(mysql_error());
while ($rowCliente = mysql_fetch_array($queryClientes)) {
?>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rowCliente['nome_tipo']; ?> </td>
<td><center>  <? echo $rowCliente['placa_veiculo']; ?> </td>
<td><center>  <? echo $rowCliente['nome_cor']; ?> </td>
<td><center><a href="veiculo_alt.php?registro=<? echo $rowCliente['id_veiculo']; ?>"><img src=imagem/editar.gif border=0></a>&nbsp;&nbsp;&nbsp;<a href="veiculo_exc.php?registro=<? echo $rowCliente['id_veiculo']; ?>"><img src=imagem/deletar.gif border=0></a></td>
</tr>
<? } }  ?>
</table>
