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

valor_cnh = document.form.cnh.value;
tamanho_cnh = document.form.cnh.value.length-20;
cnh = valor_cnh.substring(0,tamanho_cnh)
document.form.cnh.value=cnh;

valor_rg = document.form.rg.value;
tamanho_rg = document.form.rg.value.length-20;
rg = valor_rg.substring(0,tamanho_rg)
document.form.rg.value=rg;

valor_cpf = document.form.cpf.value;
tamanho_cpf = document.form.cpf.value.length-20;
cpf = valor_cpf.substring(0,tamanho_cpf)
document.form.cpf.value=cpf;

valor_cracha = document.form.cracha.value;
tamanho_cracha = document.form.cracha.value.length-20;
cracha = valor_cracha.substring(0,tamanho_cracha)
document.form.cracha.value=cracha;

return false;
}}
</script>

<center>
<form name="form" action='1acesso_add.php' method='POST'>

<!-- Cadastro da Pessoa -->

<table width=600>
 <tr><td colspan=4 align=center>Dados Pessoais</td></tr>
 <tr><td width=100>Nome:<font size=2 color=#FF4500>*</font></td><td width=500 colspan=3><input size='35' type='text' name='nome'></td></tr>
 <tr><td width=100>CNH:<font size=2 color=#FF4500>**</font></td><td width=200><input size='12' type='text' name='cnh' value="" onKeyup="digitado(event)"></td>
     <td width=100>UF:</td><td width=200>
<SELECT name='cnh_uf'>
	<option value="" SELECTED>Selecione o Estado</option>
	<option value="AC">Acre</option>
	<option value="AL">Alagoas</option>
	<option value="AP">Amapá</option>
	<option value="AM">Amazonas</option>
	<option value="BA">Bahia</option>
	<option value="CE">Ceará</option>
	<option value="DF">Distrito Federal</option>
	<option value="ES">Espirito Santo</option>
	<option value="GO">Goiás</option>
	<option value="MA">Maranhão</option>
	<option value="MS">Mato Grosso do Sul</option>
	<option value="MT">Mato Grosso</option>
	<option value="MG">Minas Gerais</option>
	<option value="PA">Pará</option>
	<option value="PB">Paraíba</option>
	<option value="PR">Paraná</option>
	<option value="PE">Pernambuco</option>
	<option value="PI">Piauí</option>
	<option value="RJ">Rio de Janeiro</option>
	<option value="RN">Rio Grande do Norte</option>
	<option value="RS">Rio Grande do Sul</option>
	<option value="RO">Rondônia</option>
	<option value="RR">Roraima</option>
	<option value="SC">Santa Catarina</option>
	<option value="SP">São Paulo</option>
	<option value="SE">Sergipe</option>
	<option value="TO">Tocantins</option>
</SELECT>
	</td>
 </tr>
 <tr><td width=100>RG:<font size=2 color=#FF4500>**</font></td><td width=200><input size='12' type='text' name='rg' value="" onKeyup="digitado(event)"></td>
     <td width=100>UF:</td><td width=200>
<SELECT name='rg_uf'>
	<option value="" SELECTED>Selecione o Estado</option>
	<option value="AC">Acre</option>
	<option value="AL">Alagoas</option>
	<option value="AP">Amapá</option>
	<option value="AM">Amazonas</option>
	<option value="BA">Bahia</option>
	<option value="CE">Ceará</option>
	<option value="DF">Distrito Federal</option>
	<option value="ES">Espirito Santo</option>
	<option value="GO">Goiás</option>
	<option value="MA">Maranhão</option>
	<option value="MS">Mato Grosso do Sul</option>
	<option value="MT">Mato Grosso</option>
	<option value="MG">Minas Gerais</option>
	<option value="PA">Pará</option>
	<option value="PB">Paraíba</option>
	<option value="PR">Paraná</option>
	<option value="PE">Pernambuco</option>
	<option value="PI">Piauí</option>
	<option value="RJ">Rio de Janeiro</option>
	<option value="RN">Rio Grande do Norte</option>
	<option value="RS">Rio Grande do Sul</option>
	<option value="RO">Rondônia</option>
	<option value="RR">Roraima</option>
	<option value="SC">Santa Catarina</option>
	<option value="SP">São Paulo</option>
	<option value="SE">Sergipe</option>
	<option value="TO">Tocantins</option>
</SELECT>
	</td>
 </tr>
 <tr><td width=100>CPF:<font size=2 color=#FF4500>**</font></td><td width=500 colspan=3><input size='12' type='text' name='cpf' value="" onKeyup="digitado(event)" maxlength="11"></td></tr>
</table><br>

<!-- Cadastro do Veículo -->

<table width=600>
 <tr><td colspan=4 align=center>Dados do Veículo</td></tr>
 <tr><td width=100>Tipo:<font size=2 color=#FF4500>***</font></td><td width=200>

<select name="tipo">
<option value="" SELECTED>Selecione o Tipo</option>
<?php

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
echo("<option value='".$dados['id_cor']."'>".$dados['nome_cor']."</option>");
}
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
<?php

$sql = "SELECT * FROM militar order by nome_militar ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_militar']."'>".$dados['pstgrd_militar'].'&nbsp;'.$dados['guerra_militar']."</option>");
}
?>
</select>
	</td>
 </tr>
 <tr><td width=100>Esquadrão:<font size=2 color=#FF4500>*</font></td><td width=200>

<select name="esquadrao">
<option value="" SELECTED>Selecione Destino</option>
<?php

$sql = "SELECT * FROM esquadrao order by nome_esquadrao ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_esquadrao']."'>".$dados['nome_esquadrao']."</option>");
}
?>
</select>
	</td>
     <td width=100>Seção:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td width=200>

<select name="secao">
<option value="0" SELECTED>Selecione Destino</option>
<?php

$sql = "SELECT * FROM secao order by nome_secao ASC";
$consulta=mysql_query($sql, $con); 
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['id_secao']."'>".$dados['nome_secao']."</option>");
}
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
<br>
<font size=2>***</font>&nbsp;&nbsp;Se for selecionado tipo 'A PÉ', deixa de ser obrigatório os campos 'COR' e 'PLACA'.
</font>
</td></tr></table>
</form>
