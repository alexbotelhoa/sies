<?,require('conexao.php');

$id_registro = $_GET['registro'];

$sql = "SELECT * FROM registro, veiculo WHERE veiculo_registro = id_veiculo AND id_registro='$id_registro'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

if ($dados['cor_veiculo'] == "")
{
$sql = "SELECT * FROM registro, pessoa, veiculo, tipo, militar, esquadrao, secao WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND secao_registro = id_secao AND esquadrao_registro = id_esquadrao AND militar_registro = id_militar AND id_registro='$id_registro'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);
}else{
$sql = "SELECT * FROM registro, pessoa, veiculo, tipo, militar, esquadrao, secao, cor WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND cor_veiculo = id_cor AND secao_registro = id_secao AND esquadrao_registro = id_esquadrao AND militar_registro = id_militar AND id_registro='$id_registro'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);
}
?>
<center>
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
<table width=600>
 <tr><td colspan=4 align=center>Dados do Ve&iacute;culo</td></tr>
 <tr><td width=100>Tipo:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['nome_tipo']); ?>"></td>
     <td width=100>Cor:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['nome_cor']); ?>"></td>
 </tr>
 <tr><td width=100>Placa:</td><td width=500 colspan=3><input size='12' type='text' readonly value="<? print_r($dados['placa_veiculo']); ?>"></td></tr>
</table>
<table width=600>
 <tr><td colspan=4 align=center>Dados do Destino</td></tr>
 <tr><td width=100>Crach&aacute;:</td><td width=200><input size='5' type='text' readonly value="<? print_r($dados['cracha_registro']); ?>"></td>
     <td width=100>Militar:</td><td width=200><input size='15' type='text' readonly value="<? print_r($dados['pstgrd_militar']); ?>&nbsp;<? print_r($dados['guerra_militar']); ?>"></td>
 </tr>
 <tr><td width=100>Esquadr&atilde;o:</td><td width=200><input size='15' type='text' readonly value="<? print_r($dados['nome_esquadrao']); ?>"></td>
     <td width=100>Se&ccedil;&atilde;o:</td><td width=200><input size='20' type='text' readonly value="<? print_r($dados['nome_secao']); ?>"></td>
 </tr>
 <tr><td width=100>Dt Entrada:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['dt_entrada_registro']); ?>"></td>
     <td width=100>Hr Entrada:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['hr_entrada_registro']); ?>"></td>
 </tr>
  </tr>
 <tr><td width=100>Dt Sa&iacute;da:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['dt_saida_registro']); ?>"></td>
     <td width=100>Hr Sa&iacute;da:</td><td width=200><input size='12' type='text' readonly value="<? print_r($dados['hr_saida_registro']); ?>"></td>
 </tr>
</table>
