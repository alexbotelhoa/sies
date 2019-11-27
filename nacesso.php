<? require('conexao.php'); 
if ($_SESSION["secao_militar"]==0){header("Location:index.php");}
?>

<script language="JavaScript">
function digitado(event){
var tecla = window.event ? event.keyCode : event.which;
if(tecla > 44 && tecla < 58 || tecla > 95 && tecla < 106 || tecla == 08) {
return false;
} else {
window.alert("Somente Números")

valor_cracha = document.form.cracha.value;
tamanho_cracha = document.form.cracha.value.length-20;
cracha = valor_cracha.substring(0,tamanho_cracha)
document.form.cracha.value=cracha;

return false;
}}
</script>

<center>

<!-- Cadastro da Pessoa -->
<?
if ($_POST['id_pessoa'] == ""){
?>

<center>
<form name="form" action='nacesso.php' method='POST'>
<table width=600>
 <tr><td colspan=3 align=center>Dados Pessoais</td></tr>
 <tr>	<td width=100>Nome:<font size=2 color=#FF4500>*</font></td>
	<td width=250>
<select name="id_pessoa">
<option value="" SELECTED>Selecione o Nome</option>
<?

$sql = "SELECT * FROM pessoa order by nome_pessoa ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_pessoa']."'>".$dados['nome_pessoa']."</option>");
}
?>
</select>
 	<td width=250><center><input type='Submit' value='Buscar dados'></td>
 </tr>
</table>
</form>
</center>
<?
}else{

$id_pessoa = $_POST['id_pessoa'];

$sql = "SELECT * FROM pessoa WHERE id_pessoa='$id_pessoa'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);
?>
<center>
<table width=600>
 <tr><td colspan=4 align=center>Dados Pessoais</td></tr>
 <tr><td width=100>Nome:<font size=2 color=#FF4500>*</font></td><td width=500 colspan=3><input size='35' readonly value="<? print_r($dados['nome_pessoa']); ?>" type='text' name='nome'></td></tr>
 <tr><td width=100>CNH:<font size=2 color=#FF4500>**</font></td><td width=200><input size='12' readonly value="<? print_r($dados['cnh_pessoa']); ?>" type='text' name='cnh'></td>
     <td width=100>UF:</td><td width=200><input size='6' readonly value="<? print_r($dados['cnh_uf_pessoa']); ?>" type='text' name='cnh_uf'></td>
 </tr>
 <tr><td width=100>RG:<font size=2 color=#FF4500>**</font></td><td width=200><input size='12' readonly value="<? print_r($dados['rg_pessoa']); ?>" type='text' name='rg'></td>
     <td width=100>UF:</td><td width=200><input size='6' readonly value="<? print_r($dados['rg_uf_pessoa']); ?>" type='text' name='rg_uf'></td>
 </tr>
 <tr><td width=100>CPF:<font size=2 color=#FF4500>**</font></td><td width=500 colspan=3><input size='12' readonly value="<? print_r($dados['cpf_pessoa']); ?>" type='text' name='cpf'></td></tr>
</table><br>
</center>


<!-- Cadastro do Veículo -->
<form name="form" action='nacesso_add.php' method='POST'>
<? echo("<input value='".$id_pessoa."' type='hidden' name='id_pessoa'>"); ?>
<table width=600>
 <tr><td colspan=4 align=center>Dados do Veículo</td></tr>
 <tr><td width=100>Tipo:<font size=2 color=#FF4500>***</font></td><td width=200>
<select name="tipo">
<option value="" SELECTED>Selecione o Tipo</option>
<?
$sql = "SELECT * FROM tipo order by nome_tipo ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_tipo']."'>".$dados['nome_tipo']."</option>");
}
?>
</select>

</td>
     <td width=100>Cor:<font size=2 color=#FF4500>*</font></td><td width=200>

<select name="cor">
<option value="" SELECTED>Selecione a Cor</option>
<?php

$sql = "SELECT * FROM cor order by nome_cor ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_cor']."'>".$dados['nome_cor']."</option>");}
?>
</select>
	</td>
 </tr>
 <tr><td width=100>Placa:<font size=2 color=#FF4500>*</font></td><td width=500 colspan=3><input size='10' type='text' name='placa' style="text-align:center" maxlength="7">&nbsp;&nbsp;Ex. XXX9999 Sem "-" </td></tr>
</table><br>

<!-- Cadastro do Destino -->
<table width=600>
 <tr><td colspan=4 align=center>Dados do Destino</td></tr>
 <tr><td width=100>Crachá:<font size=2 color=#FF4500>*</font></td><td width=200><input size='5' type='text' name='cracha' style="text-align:center" value="" onKeyup="digitado(event)" maxlength="3"></td>
     <td width=100>Militar:<font size=2 color=#FF4500>*</font></td><td width=200>

<select name="militar">
<option value="" SELECTED>Selecione o Militar</option>
<?
$sql = "SELECT * FROM militar order by nome_militar ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_militar']."'>".$dados['pstgrd_militar'].'&nbsp;'.$dados['guerra_militar']."</option>");}
?>
</select>
	</td>
 </tr>
 <tr><td width=100>Esquadrão:<font size=2 color=#FF4500>*</font></td><td width=200>
<select name="esquadrao">
<option value="" SELECTED>Selecione o Esquadrão</option>
<?
$sql = "SELECT * FROM esquadrao order by nome_esquadrao ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_esquadrao']."'>".$dados['nome_esquadrao']."</option>");}
?>
</select>
	</td>
     <td width=100>Seção:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td width=200>
<select name="secao">
<option value="" SELECTED>Selecione a Seção</option>
<?
$sql = "SELECT * FROM secao order by nome_secao ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_secao']."'>".$dados['nome_secao']."</option>");}
?>
</select>
	</td>
 </tr>
 <tr><td width=100>Dt Entrada:</td><td width=200><? echo $dia.'/'.$meses0[$mes].'/'.$ano; ?></td>
     <td width=100>Hr Entrada:</td><td width=200><div id=clock></div></td>
 </tr>
</table>
<br>
<input type='Submit' value='Enviar'>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Limpar">
<table width=600><tr><td>
<font color=#FF4500>
<font size=2>*</font>&nbsp;&nbsp;Campo Obrigatório
<br>
<font size=2>**</font>&nbsp;&nbsp;Pelo menos um campo tem que estar preenchido e somente números.
</font>
</td></tr></table>
</form>
<?}?>
