<?

//Conexão com o Bando de Dados
$endereco = "localhost";
$banco = "sies";
$usuario = "root";
$senha = "3N1@C26";

$con=mysql_connect($endereco, $usuario, $senha) or die ('Servidor não encontrado');
mysql_select_db($banco) or die ('Banco não encontrado');

// Recebemos os dados digitados pelo usuário
      $login = $_GET['login'];
      $senha = $_GET['senha'];

//Criamos o comando que efetua a busca do banco
      $sql = "SELECT * FROM militar WHERE login_militar='$login' AND senha_militar='$senha'";

      //Executamos o comando
      $consulta = mysql_query($sql, $con);

      //Retornamos o numero de linhas afetadas
      $num = mysql_num_rows($consulta);

      //Verificams se alguma linha foi afetada, caso sim retornamos suas informações
      if($num > 0)
      {
      //Retorna os dados do banco
      $dados = mysql_fetch_array($consulta);

      //Inicia a sessão
      session_start();

      //Registra os dados do usuário na sessão
      $_SESSION["id_militar"] = $dados["id_militar"];
      $_SESSION["nome_militar"] = $dados["nome_militar"];
      $_SESSION["pstgrd_militar"] = $dados["pstgrd_militar"];
      $_SESSION["esp_militar"] = $dados["esp_militar"];
      $_SESSION["guerra_militar"] = $dados["guerra_militar"];
      $_SESSION["secao_militar"] = $dados["secao_militar"];
      $_SESSION["admin_militar"] = $dados["admin_militar"];

      //Encerra a conexão com o banco
      mysql_close($con);

      //Redireciona para o index
      header("Location:index.php");
      }
      else
      {
      //Encerra a conexão com o banco
      mysql_close($con);

      //Caso nenhuma linha seja retornada emite o alerta e retorna
      echo "<meta http-equiv='content-type' content='text/html;charset=utf-8'>";
      echo "<b>Nenhum usuário foi encontrado com os dados informados... retornando</b>";
      echo "<meta http-equiv='refresh' content='3;URL=index.php'>";
      }
?>
