<?
echo "<meta http-equiv='content-type' content='text/html;charset=utf-8'>";
require('style.php');
?>
<center>
<img src=imagem/logo.jpg>
</center>
<center>
<form action="auth.php" method="GET">
   <table style="width:200; height:200; border:0px; text-align:center">
      <tr>
         <td>
	    <table width="200" border="0" align="center">
               <tr>
                  <td width="200" colspan="2"><center>Autenticação</td>                 
              </tr>
               <tr>
                  <td width="50" align="right">Login:</td>
                  <td width="140"><input type="text" name="login" size="20" maxlength="20" /></td>
              </tr>
              <tr>
                  <td align="right">Senha:</td>
                  <td><input type="password" name="senha" size="20" maxlength="8" /></td>
              </tr>
           </table><br>
	<input type="submit" value="Entrar" />
        </td>
     </tr>
   </table>
</form>
<? require('rodape.php'); ?>
