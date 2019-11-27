<?
require('conexao.php');
require('relogio.php');

if ($_POST['id_pessoa'] == "" or $_POST['tipo'] == "" or $_POST['cracha'] == "" or $_POST['militar'] == "" or $_POST['esquadrao'] == "") 
{
echo "<br><br><br><br><br>";
echo "<center><font style=Arial size=3 color=red>Existe um ou mais 'campos obrigatórios' a ser preenchido ou em branco!</font><br>";
echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
}
else 
{
	if ($_POST['tipo'] <> "8")
	{
		if ($_POST['tipo'] == "6" and $_POST['cor'] == "1")
		{
		echo "<br><br><br><br><br>";
		echo "<center><font style=Arial size=3 color=red>Você escolheu tipo 'BICICLETA', deve ser selecionado uma opção de cor no campo 'COR'.</font><br>";
		echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
		}
		else
		{
			if ($_POST['tipo'] <> "6" and ($_POST['cor'] == "1" or $_POST['placa'] == ""))
			{
			echo "<br><br><br><br><br>";
			echo "<center><font style=Arial size=3 color=red>Você deve selecionar uma opção no campo 'COR' e digital o número da 'PLACA'.</font><br>";	
			echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
			}
			else
			{

$id_pessoa = $_POST['id_pessoa'];

// DADOS VEÍCULOS
if ($_POST['tipo'] == "6"){$placa = " - ";}else{$placa = $_POST['placa'];}
$tipo = $_POST['tipo'];
$cor = $_POST['cor'];

$sql2 = "INSERT INTO veiculo (
placa_veiculo, 
tipo_veiculo, 
cor_veiculo
) VALUES (
'$placa', 
'$tipo', 
'$cor')";

mysql_query($sql2, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

$sql = "SELECT id_veiculo FROM veiculo WHERE placa_veiculo='$placa'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

$id_veiculo = $dados['id_veiculo'];

// DADOS DESTINOS
$cracha = $_POST['cracha'];
$militar = $_POST['militar'];
$esquadrao = $_POST['esquadrao'];
$secao = $_POST['secao'];
$dt_entrada = $dia.'/'.$meses0[$mes].'/'.$ano;
$hr_entrada = $hr;

$sql3 = "INSERT INTO registro (
pessoa_registro,
veiculo_registro,
cracha_registro, 
militar_registro, 
esquadrao_registro,
secao_registro,
dt_entrada_registro, 
hr_entrada_registro
) VALUES (
'$id_pessoa', 
'$id_veiculo',
'$cracha', 
'$militar',
'$esquadrao', 
'$secao',
'$dt_entrada', 
'$hr_entrada')";

mysql_query($sql3, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

echo "<br><br><br><br><br>";
echo "<center><font style=Arial color=green>Cadastro efetuado com sucesso!</font></center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=nacesso.php'>";

			}
		}
	}
	else
	{
							
$id_pessoa = $_POST['id_pessoa'];

// DADOS VEÍCULOS
$tipo = $_POST['tipo'];
$placa = " - ";
$cor = 1;

$sql2 = "INSERT INTO veiculo (
tipo_veiculo, 
placa_veiculo, 
cor_veiculo
) VALUES (
'$tipo', 
'$placa', 
'$cor')";

mysql_query($sql2, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

$sql = "SELECT id_veiculo FROM veiculo WHERE placa_veiculo='$placa'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

$id_veiculo = $dados['id_veiculo'];

// DADOS DESTINOS
$cracha = $_POST['cracha'];
$militar = $_POST['militar'];
$esquadrao = $_POST['esquadrao'];
$secao = $_POST['secao'];
$dt_entrada = $dia.'/'.$meses0[$mes].'/'.$ano;
$hr_entrada = $hr;

$sql3 = "INSERT INTO registro (
pessoa_registro,
veiculo_registro,
cracha_registro, 
militar_registro, 
esquadrao_registro,
secao_registro,
dt_entrada_registro, 
hr_entrada_registro
) VALUES (
'$id_pessoa', 
'$id_veiculo',
'$cracha', 
'$militar',
'$esquadrao', 
'$secao',
'$dt_entrada', 
'$hr_entrada')";

mysql_query($sql3, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

echo "<br><br><br><br><br>";
echo "<center><font style=Arial color=green>Cadastro efetuado com sucesso!</font></center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=nacesso.php'>";

	}
}
?>
