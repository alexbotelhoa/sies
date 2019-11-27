<? require('conexao.php');

if ($_POST['dt_saida_dia'] == "0" and $_POST['dt_saida_mes'] == "0" and $_POST['dt_saida_ano'] == "0") 
{
$combinacao = "0";
}
else
{
	if ($_POST['dt_saida_dia'] <> "0" and $_POST['dt_saida_mes'] == "0" and $_POST['dt_saida_ano'] == "0") 
	{
	$combinacao = "1";
	}
	else
	{
		if ($_POST['dt_saida_dia'] == "0" and $_POST['dt_saida_mes'] <> "0" and $_POST['dt_saida_ano'] == "0") 
		{
		$combinacao = "2";
		}
		else
		{
			if ($_POST['dt_saida_dia'] == "0" and $_POST['dt_saida_mes'] == "0" and $_POST['dt_saida_ano'] <> "0") 
			{
			$combinacao = "3";
			}
			else
			{
				if ($_POST['dt_saida_dia'] <> "0" and $_POST['dt_saida_mes'] <> "0" and $_POST['dt_saida_ano'] == "0") 
				{
				$combinacao = "4";
				}
				else
				{
					if ($_POST['dt_saida_dia'] <> "0" and $_POST['dt_saida_mes'] == "0" and $_POST['dt_saida_ano'] <> "0") 
					{
					$combinacao = "5";
					}
					else
					{
						if ($_POST['dt_saida_dia'] == "0" and $_POST['dt_saida_mes'] <> "0" and $_POST['dt_saida_ano'] <> "0") 
						{
						$combinacao = "6";
						}
						else
						{
						$combinacao = "7";
						}
					}
				}
			}
		}
	}
}
if ($combinacao == "0" or ($_POST['dt_saida_dia'] == "" and $_POST['dt_saida_mes'] == "" and $_POST['dt_saida_ano'] == "")) 
{
?>
<center>
<form name="form" action='por_dt_saida.php' method='POST'>
<table width=600>
 <tr><td colspan=3 align=center>Escolha a data da SAÍDA para efetuar a pesquisa</td></tr>
 <tr>	<td width=200><center>Dia</td>
	<td width=200><center>Mês</td>
	<td width=200><center>Ano</td>
 <tr>
	<td width=200><center>
<select name="dt_saida_dia">
<option value="0" SELECTED>Dia</option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</SELECT>
	</td>
	<td width=200><center>
<select name="dt_saida_mes">
<option value="0" SELECTED>Mês</option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
</SELECT>
	</td>
	<td width=200><center>
		<select name="dt_saida_ano">
<? require('ano.php'); ?>
	</td>
</tr>
 <tr><td colspan=3 width=600><center><input type='Submit' value='Buscar'></td></tr>
</table>
</form>
</center>
<?
}else{
$dia = $_POST['dt_saida_dia'];
$mes = $_POST['dt_saida_mes'];
$ano = $_POST['dt_saida_ano'];
?>

<!-- Cadastro da Pessoa -->
<center>
<table width=600>
 <tr><td width=600 colspan=5 align=center>Visitantes</td></tr>
 <tr><td width=50><center>Crachá</td><td width=400 align=center>Nome</td><td width=100><center>Esquadrão</td><td width=100><center>Visualizar</td><td width=50><center>Fechar</td></tr>
<?
$sql = "SELECT * FROM registro, pessoa, veiculo, esquadrao, tipo WHERE pessoa_registro = id_pessoa AND veiculo_registro = id_veiculo AND tipo_veiculo = id_tipo AND esquadrao_registro = id_esquadrao AND dt_saida_registro <> '' ORDER BY cracha_registro ASC";

$i = "0";

$consulta=mysql_query($sql, $con);
while ($dados = mysql_fetch_array($consulta))
	{
$data = explode("/",$dados['dt_saida_registro']);

		if ($combinacao == "1") 
		{
if ($data[0]==$dia)
{
echo("<tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50>Fechado</td></tr>");
$i = "1";
}
		}
		else
		{
			if ($combinacao == "2") 
			{
if ($data[1]==$mes)
{
echo("<tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50>Fechado</td></tr>");
$i = "1";
}
			}
			else
			{
				if ($combinacao == "3") 
				{
if ($data[2]==$ano)
{
echo("<tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50>Fechado</td></tr>");
$i = "1";
}
				}
				else
				{
					if ($combinacao == "4") 
					{
if ($data[0]==$dia and $data[1]==$mes)
{
echo("<tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50>Fechado</td></tr>");
$i = "1";
}
					}
					else
					{
						if ($combinacao == "5") 
						{
if ($data[0]==$dia and $data[2]==$ano)
{
echo("<tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50>Fechado</td></tr>");
$i = "1";
}
						}
						else
						{
							if ($combinacao == "6") 
							{
if ($data[1]==$mes and $data[2]==$ano)
{
echo("<tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50>Fechado</td></tr>");
$i = "1";
}
							}
							else
							{
if ($data[0]==$dia and $data[1]==$mes and $data[2]==$ano)
{
echo("<tr><td width=50><center>".$dados['cracha_registro']."</td><td width=400>".$dados['nome_pessoa']."</td><td width=100>&nbsp;&nbsp;".$dados['nome_esquadrao']."</td><td><center><a href=javascript:popup('". $dados['id_registro'] ."')>Detalhes</a></td><td width=50>Fechado</td></tr>");
$i = "1";
}
							}
						}
					}
				}
			}
		}
	}
if ($i=="0"){echo("<tr><td colspan=4 width=600><center>Nenhum registro encontrado!</td></tr>");}
?>
</table>
<form name="form" action='por_dt_saida.php' method='POST'><input type='Submit' value='Voltar'></form>
</center>
<?}?>
