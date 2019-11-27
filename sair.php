<?
//Inicia a sessão
session_start();

//Elimina os dados da sessão
session_unregister($_SESSION["id_militar"]);
session_unregister($_SESSION["nome_militar"]);
session_unregister($_SESSION["pstgrd_militar"]);
session_unregister($_SESSION["esp_militar"]);
session_unregister($_SESSION["guerra_militar"]);
session_unregister($_SESSION["secao_militar"]);
session_unregister($_SESSION["admin_militar"]);

//Encerra a sessão
session_destroy();
//header("Location:index.php");
      echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
?>

