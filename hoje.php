<? require('conexao.php');
if ($_SESSION["secao_militar"]==0){header("Location:index.php");}

$dt_saida = $dia.'/'.$meses0[$mes].'/'.$ano;
?>

<!-- Cadastro da Pessoa -->
<center>
<table width=600>
 <tr><td width=600 colspan=5 align=center>Visitantes que adentraram na BAPV no dia: <? print_r($dt_saida); ?></td></tr>
 <tr><td width=50><center>Crachá</td><td width=400 align=center>Nome</td><td width=100><center>Esquadrão</td><td width=100><center>Visualizar</td><td width=50><center>Fechar</td></tr>
<?
$sql = "SELECT * FROM registro, pessoa, veiculo, esquadrao, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND esquadrao_registro = id_esquadrao AND dt_saida_registro = '$dt_saida' ORDER BY cracha_registro ASC";

$consulta=mysql_query($sql, $con);
while ($dados = mysql_fetch_array($consulta)) {
echo("<tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50><center>Fechado</td></tr>");}
?>
</table>
</center>

