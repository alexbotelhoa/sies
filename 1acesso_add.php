<?
require('conexao.php');
require('relogio.php');

if ($_POST['nome'] == "" or $_POST['tipo'] == "" or $_POST['cracha'] == "" or $_POST['militar'] == "" or $_POST['esquadrao'] == "") 
{
echo "<br><br><br><br><br>";
echo "<center><font style=Arial size=3 color=red>Existe um ou mais 'campos obrigatórios' a ser preenchido ou em branco!</font><br>";
echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
}
else 
	if ($_POST['cnh'] == "" and $_POST['rg'] == "" and $_POST['cpf'] == "")
	{
	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial size=3 color=red>Tem que ser preenchido pelo menos um dos campos: CNH, RG ou CPF!</font><br>";
	echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
	}
	else 
		if (($_POST['cnh'] <> "" and $_POST['cnh_uf'] == "") or ($_POST['rg'] <> "" and $_POST['rg_uf'] == ""))
		{
		echo "<br><br><br><br><br>";
		echo "<center><font style=Arial size=3 color=red>Faltou selecionar a UF da CNH ou do RG!</font><br>";
		echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
		}
		else
		{
			$nome = $_POST['nome'];
			
			$sql = "SELECT nome_pessoa FROM pessoa WHERE nome_pessoa='$nome'";
			$consulta = mysql_query($sql, $con); 
			$dados = mysql_fetch_array($consulta);

			if ($dados['nome_pessoa']==$nome)
			{
			echo "<br><br><br><br><br>";
			echo "<center><font style=Arial size=3 color=red>Nome do visitante já está cadastrado!</font><br>";
			echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
			}					
			else
			{
				$cnh = $_POST['cnh'];
			
				$sql = "SELECT cnh_pessoa FROM pessoa WHERE cnh_pessoa='$cnh'";
				$consulta = mysql_query($sql, $con); 
				$dados = mysql_fetch_array($consulta);

				if ($dados['cnh_pessoa']==$cnh)
				{
				echo "<br><br><br><br><br>";
				echo "<center><font style=Arial size=3 color=red>CNH do visitante já está cadastrado!</font><br>";
				echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
				}
				else
				{
					$rg = $_POST['rg'];
			
					$sql = "SELECT rg_pessoa FROM pessoa WHERE rg_pessoa='$rg'";
					$consulta = mysql_query($sql, $con); 
					$dados = mysql_fetch_array($consulta);

					if ($dados['rg_pessoa']==$rg)
					{
					echo "<br><br><br><br><br>";
					echo "<center><font style=Arial size=3 color=red>RG do visitante já está cadastrado!</font><br>";
					echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";			
					}
					else
					{
						$cpf = $_POST['cpf'];
			
						$sql = "SELECT cpf_pessoa FROM pessoa WHERE cpf_pessoa='$cpf'";
						$consulta = mysql_query($sql, $con); 
						$dados = mysql_fetch_array($consulta);

						if ($dados['cpf_pessoa']==$cpf)
						{
						echo "<br><br><br><br><br>";
						echo "<center><font style=Arial size=3 color=red>CPF do visitante já está cadastrado!</font><br>";
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
// DADOS PESSOAIS
$nome = $_POST['nome'];

if ($_POST['cnh'] <> "" and $_POST['cnh_uf'] <> "")
{
$cnh = $_POST['cnh'];
$cnh_uf = $_POST['cnh_uf'];
}
else
{
$cnh = 0;
$cnh_uf = 0;
}

if ($_POST['rg'] <> "" and $_POST['rg_uf'] <> "")
{
$rg = $_POST['rg'];
$rg_uf = $_POST['rg_uf'];
}
else
{
$rg = 0;
$rg_uf = 0;
}

$cpf = $_POST['cpf'];

$sql1 = "INSERT INTO pessoa (
nome_pessoa, 
cnh_pessoa, 
cnh_uf_pessoa, 
rg_pessoa, 
rg_uf_pessoa, 
cpf_pessoa
) VALUES (
'$nome', 
'$cnh', 
'$cnh_uf', 
'$rg', 
'$rg_uf', 
'$cpf')";

mysql_query($sql1, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

$sql = "SELECT id_pessoa FROM pessoa WHERE nome_pessoa='$nome'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

$id_pessoa = $dados['id_pessoa'];

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
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=1acesso.php'>";
									}
								}
							}
							else
							{

// DADOS PESSOAIS
$nome = $_POST['nome'];

if ($_POST['cnh'] <> "" and $_POST['cnh_uf'] <> "")
{
$cnh = $_POST['cnh'];
$cnh_uf = $_POST['cnh_uf'];
}
else
{
$cnh = 0;
$cnh_uf = 0;
}

if ($_POST['rg'] <> "" and $_POST['rg_uf'] <> "")
{
$rg = $_POST['rg'];
$rg_uf = $_POST['rg_uf'];
}
else
{
$rg = 0;
$rg_uf = 0;
}

$cpf = $_POST['cpf'];

$sql1 = "INSERT INTO pessoa (
nome_pessoa, 
cnh_pessoa, 
cnh_uf_pessoa, 
rg_pessoa, 
rg_uf_pessoa, 
cpf_pessoa
) VALUES (
'$nome', 
'$cnh', 
'$cnh_uf', 
'$rg', 
'$rg_uf', 
'$cpf')";

mysql_query($sql1, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

$sql = "SELECT id_pessoa FROM pessoa WHERE nome_pessoa='$nome'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

$id_pessoa = $dados['id_pessoa'];

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
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=1acesso.php'>";
							}
						}
					}
				}
			}		
		}
?>
