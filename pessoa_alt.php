<?
require('conexao.php');

$id_pessoa = $_GET['registro']; 

if ($_GET['buscar'] == 'Salvar') 
{

$id_pessoa = $_GET['id_pessoa'];

if ($_GET['nome'] == "") 
{
echo "<br><br><br><br><br>";
echo "<center><font style=Arial size=3 color=red>Existe um ou mais 'campos obrigatórios' a ser preenchido ou em branco!</font><br>";
echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
}
else 
	if ($_GET['cnh'] == "" and $_GET['rg'] == "" and $_GET['cpf'] == "")
	{
	echo "<br><br><br><br><br>";
	echo "<center><font style=Arial size=3 color=red>Tem que ser preenchido pelo menos um dos campos: CNH, RG ou CPF!</font><br>";
	echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
	}
	else 
		if (($_GET['cnh'] <> "" and $_GET['cnh_uf'] == "") or ($_GET['rg'] <> "" and $_GET['rg_uf'] == ""))
		{
		echo "<br><br><br><br><br>";
		echo "<center><font style=Arial size=3 color=red>Faltou selecionar a UF da CNH ou do RG!</font><br>";
		echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
		}
		else
		{
			$nome = $_GET['nome'];
			
			$sql = "SELECT id_pessoa FROM pessoa WHERE nome_pessoa='$nome'";
			$consulta = mysql_query($sql, $con); 
			$dados = mysql_fetch_array($consulta);

			if ($dados['id_pessoa'] <> $id_pessoa)
			{
			echo "<br><br><br><br><br>";
			echo "<center><font style=Arial size=3 color=red>Nome do visitante já está cadastrado!</font><br>";
			echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
			}					
			else
			{
				$cnh = $_GET['cnh'];
			
				$sql = "SELECT id_pessoa FROM pessoa WHERE cnh_pessoa='$cnh'";
				$consulta = mysql_query($sql, $con); 
				$dados = mysql_fetch_array($consulta);

				if ($dados['id_pessoa'] <> $id_pessoa)
				{
				echo "<br><br><br><br><br>";
				echo "<center><font style=Arial size=3 color=red>CNH do visitante já está cadastrado!</font><br>";
				echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";
				}
				else
				{
					$rg = $_GET['rg'];
			
					$sql = "SELECT id_pessoa FROM pessoa WHERE rg_pessoa='$rg'";
					$consulta = mysql_query($sql, $con); 
					$dados = mysql_fetch_array($consulta);

					if ($dados['id_pessoa'] <> $id_pessoa)
					{
					echo "<br><br><br><br><br>";
					echo "<center><font style=Arial size=3 color=red>RG do visitante já está cadastrado!</font><br>";
					echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";			
					}
					else
					{
						$cpf = $_GET['cpf'];
			
						$sql = "SELECT id_pessoa FROM pessoa WHERE cpf_pessoa='$cpf'";
						$consulta = mysql_query($sql, $con); 
						$dados = mysql_fetch_array($consulta);

						if ($dados['id_pessoa'] <> $id_pessoa)
						{
						echo "<br><br><br><br><br>";
						echo "<center><font style=Arial size=3 color=red>CPF do visitante já está cadastrado!</font><br>";
						echo "<center'><font color='#000000' size='3'>Use o botão de retornar do navegador para corrigir o erro ou <a href='javascript:history.go(-1)'><font color='#0000ff' size='3'><b>clique aqui</b></a>!</center>";			
						}
						else
						{

// DADOS PESSOAIS
$nome = $_GET['nome'];

if ($_GET['cnh'] <> "" and $_GET['cnh_uf'] <> "")
{
$cnh = $_GET['cnh'];
$cnh_uf = $_GET['cnh_uf'];
}
else
{
$cnh = 0;
$cnh_uf = 0;
}

if ($_GET['rg'] <> "" and $_GET['rg_uf'] <> "")
{
$rg = $_GET['rg'];
$rg_uf = $_GET['rg_uf'];
}
else
{
$rg = 0;
$rg_uf = 0;
}

$cpf = $_GET['cpf'];

$sql = "UPDATE pessoa SET nome_pessoa='$nome', cnh_pessoa='$cnh', cnh_uf_pessoa='$cnh_uf', rg_pessoa='$rg', rg_uf_pessoa='$rg_uf', cpf_pessoa='$cpf' WHERE id_pessoa='$id_pessoa'";

mysql_query($sql, $con) or die ("<font style=Arial color=red>Houve um erro na gravação dos dados</font>");
mysql_close();

echo "<br><br><br><br><br>";
echo "<center><font style=Arial color=green>Alteração efetuada com sucesso!</font></center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=pessoa.php'>";
						}
					}
				}
			}
		}
}else{

$sql = "SELECT * FROM pessoa WHERE id_pessoa='$id_pessoa'";
$consulta = mysql_query($sql, $con); 
$dados = mysql_fetch_array($consulta);

?>
<center>
<form name='busca' id='busca' action='pessoa_alt.php' method='GET'>
<input type='hidden' name='id_pessoa' value="<? print_r($dados['id_pessoa']); ?>">
<table width=600>
 <tr><td colspan=4 align=center>Dados Pessoais</td></tr>
 <tr><td width=100>Nome:</td><td width=500 colspan=3><input size='35' type='text' name='nome' value="<? print_r($dados['nome_pessoa']); ?>"></td></tr>
 <tr><td width=100>CNH:</td><td width=200><input size='12' type='text' name='cnh' value="<? print_r($dados['cnh_pessoa']); ?>"></td>
     <td width=100>UF:</td><td width=200>
<SELECT name='cnh_uf'>
	<option value="AC"<? if ($dados['cnh_uf_pessoa'] == "AC"){echo " SELECTED";}?>>Acre</option>
	<option value="AL"<? if ($dados['cnh_uf_pessoa'] == "AL"){echo " SELECTED";}?>>Alagoas</option>
	<option value="AP"<? if ($dados['cnh_uf_pessoa'] == "AP"){echo " SELECTED";}?>>Amapá</option>
	<option value="AM"<? if ($dados['cnh_uf_pessoa'] == "AM"){echo " SELECTED";}?>>Amazonas</option>
	<option value="BA"<? if ($dados['cnh_uf_pessoa'] == "BA"){echo " SELECTED";}?>>Bahia</option>
	<option value="CE"<? if ($dados['cnh_uf_pessoa'] == "CE"){echo " SELECTED";}?>>Ceará</option>
	<option value="DF"<? if ($dados['cnh_uf_pessoa'] == "DF"){echo " SELECTED";}?>>Distrito Federal</option>
	<option value="ES"<? if ($dados['cnh_uf_pessoa'] == "ES"){echo " SELECTED";}?>>Espirito Santo</option>
	<option value="GO"<? if ($dados['cnh_uf_pessoa'] == "GO"){echo " SELECTED";}?>>Goiás</option>
	<option value="MA"<? if ($dados['cnh_uf_pessoa'] == "MA"){echo " SELECTED";}?>>Maranhão</option>
	<option value="MS"<? if ($dados['cnh_uf_pessoa'] == "MS"){echo " SELECTED";}?>>Mato Grosso do Sul</option>
	<option value="MT"<? if ($dados['cnh_uf_pessoa'] == "MT"){echo " SELECTED";}?>>Mato Grosso</option>
	<option value="MG"<? if ($dados['cnh_uf_pessoa'] == "MG"){echo " SELECTED";}?>>Minas Gerais</option>
	<option value="PA"<? if ($dados['cnh_uf_pessoa'] == "PA"){echo " SELECTED";}?>>Pará</option>
	<option value="PB"<? if ($dados['cnh_uf_pessoa'] == "PB"){echo " SELECTED";}?>>Paraíba</option>
	<option value="PR"<? if ($dados['cnh_uf_pessoa'] == "PR"){echo " SELECTED";}?>>Paraná</option>
	<option value="PE"<? if ($dados['cnh_uf_pessoa'] == "PE"){echo " SELECTED";}?>>Pernambuco</option>
	<option value="PI"<? if ($dados['cnh_uf_pessoa'] == "PI"){echo " SELECTED";}?>>Piauí</option>
	<option value="RJ"<? if ($dados['cnh_uf_pessoa'] == "RJ"){echo " SELECTED";}?>>Rio de Janeiro</option>
	<option value="RN"<? if ($dados['cnh_uf_pessoa'] == "RN"){echo " SELECTED";}?>>Rio Grande do Norte</option>
	<option value="RS"<? if ($dados['cnh_uf_pessoa'] == "RS"){echo " SELECTED";}?>>Rio Grande do Sul</option>
	<option value="RO"<? if ($dados['cnh_uf_pessoa'] == "RO"){echo " SELECTED";}?>>Rondônia</option>
	<option value="RR"<? if ($dados['cnh_uf_pessoa'] == "RR"){echo " SELECTED";}?>>Roraima</option>
	<option value="SC"<? if ($dados['cnh_uf_pessoa'] == "SC"){echo " SELECTED";}?>>Santa Catarina</option>
	<option value="SP"<? if ($dados['cnh_uf_pessoa'] == "SP"){echo " SELECTED";}?>>São Paulo</option>
	<option value="SE"<? if ($dados['cnh_uf_pessoa'] == "SE"){echo " SELECTED";}?>>Sergipe</option>
	<option value="TO"<? if ($dados['cnh_uf_pessoa'] == "TO"){echo " SELECTED";}?>>Tocantins</option>
</SELECT>
	</td>
 </tr>
 <tr><td width=100>RG:</td><td width=200><input size='12' type='text' name='rg' value="<? print_r($dados['rg_pessoa']); ?>"></td>
     <td width=100>UF:</td><td width=200>
<SELECT name='rg_uf'>
	<option value="AC"<? if ($dados['rg_uf_pessoa'] == "AC"){echo " SELECTED";}?>>Acre</option>
	<option value="AL"<? if ($dados['rg_uf_pessoa'] == "AL"){echo " SELECTED";}?>>Alagoas</option>
	<option value="AP"<? if ($dados['rg_uf_pessoa'] == "AP"){echo " SELECTED";}?>>Amapá</option>
	<option value="AM"<? if ($dados['rg_uf_pessoa'] == "AM"){echo " SELECTED";}?>>Amazonas</option>
	<option value="BA"<? if ($dados['rg_uf_pessoa'] == "BA"){echo " SELECTED";}?>>Bahia</option>
	<option value="CE"<? if ($dados['rg_uf_pessoa'] == "CE"){echo " SELECTED";}?>>Ceará</option>
	<option value="DF"<? if ($dados['rg_uf_pessoa'] == "DF"){echo " SELECTED";}?>>Distrito Federal</option>
	<option value="ES"<? if ($dados['rg_uf_pessoa'] == "ES"){echo " SELECTED";}?>>Espirito Santo</option>
	<option value="GO"<? if ($dados['rg_uf_pessoa'] == "GO"){echo " SELECTED";}?>>Goiás</option>
	<option value="MA"<? if ($dados['rg_uf_pessoa'] == "MA"){echo " SELECTED";}?>>Maranhão</option>
	<option value="MS"<? if ($dados['rg_uf_pessoa'] == "MS"){echo " SELECTED";}?>>Mato Grosso do Sul</option>
	<option value="MT"<? if ($dados['rg_uf_pessoa'] == "MT"){echo " SELECTED";}?>>Mato Grosso</option>
	<option value="MG"<? if ($dados['rg_uf_pessoa'] == "MG"){echo " SELECTED";}?>>Minas Gerais</option>
	<option value="PA"<? if ($dados['rg_uf_pessoa'] == "PA"){echo " SELECTED";}?>>Pará</option>
	<option value="PB"<? if ($dados['rg_uf_pessoa'] == "PB"){echo " SELECTED";}?>>Paraíba</option>
	<option value="PR"<? if ($dados['rg_uf_pessoa'] == "PR"){echo " SELECTED";}?>>Paraná</option>
	<option value="PE"<? if ($dados['rg_uf_pessoa'] == "PE"){echo " SELECTED";}?>>Pernambuco</option>
	<option value="PI"<? if ($dados['rg_uf_pessoa'] == "PI"){echo " SELECTED";}?>>Piauí</option>
	<option value="RJ"<? if ($dados['rg_uf_pessoa'] == "RJ"){echo " SELECTED";}?>>Rio de Janeiro</option>
	<option value="RN"<? if ($dados['rg_uf_pessoa'] == "RN"){echo " SELECTED";}?>>Rio Grande do Norte</option>
	<option value="RS"<? if ($dados['rg_uf_pessoa'] == "RS"){echo " SELECTED";}?>>Rio Grande do Sul</option>
	<option value="RO"<? if ($dados['rg_uf_pessoa'] == "RO"){echo " SELECTED";}?>>Rondônia</option>
	<option value="RR"<? if ($dados['rg_uf_pessoa'] == "RR"){echo " SELECTED";}?>>Roraima</option>
	<option value="SC"<? if ($dados['rg_uf_pessoa'] == "SC"){echo " SELECTED";}?>>Santa Catarina</option>
	<option value="SP"<? if ($dados['rg_uf_pessoa'] == "SP"){echo " SELECTED";}?>>São Paulo</option>
	<option value="SE"<? if ($dados['rg_uf_pessoa'] == "SE"){echo " SELECTED";}?>>Sergipe</option>
	<option value="TO"<? if ($dados['rg_uf_pessoa'] == "TO"){echo " SELECTED";}?>>Tocantins</option>
</SELECT>
	</td>
 </tr>
 <tr><td width=100>CPF:</td><td width=500 colspan=3><input size='12' type='text' name='cpf' value="<? print_r($dados['cpf_pessoa']); ?>"></td></tr>
</table>
<input type='submit' name='buscar' id='buscar' value='Salvar' /></form><form action='pessoa.php' method='GET'><input type='submit' value='Voltar' /></form>
<?}?>
