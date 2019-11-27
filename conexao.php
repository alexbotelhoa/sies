<?

//Configuro os dados para conexão ao BD
$endereco = "localhost";
$banco = "sies";
$usuario = "root";
$senha = "3N1@C26";

//Estabelece Conexão com a Base de Dados
$con=mysql_connect($endereco, $usuario, $senha) or die ('Servidor não encontrado');
mysql_select_db($banco) or die ('Banco não encontrado');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

//Habilitar caracter especiais
echo "<meta http-equiv='content-type' content='text/html;charset=utf-8'>";

//Buscar DATA e HORA
$hr = date("H:i:s", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$dia = date("d", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$mes = date("n", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$ano = date("Y", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

$meses0 = array( 1=> "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");

//Chama outros arquivos
require('function.php');
require('style.php');
require('relogio.php');
require('verificar.php');
?>

<!-- Habilitar o POPUP com os detalhes -->
<script language=javascript> 
function popup(REGISTRO)
{
window.open("popup_registro.php?registro="+REGISTRO,"janela","width=530,height=350,menubar=no,toolbar=no,scrollbars=yes,resizable=no,top=50,left=100")
}
</script>
