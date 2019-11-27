<? require('conexao.php'); ?>
<ul class='menu01'>
<li><a href="home.php" TARGET=MAIN>Home</a></li>
<li><a href="sair.php" TARGET="_top">Logoff</a></li>
<? if ($_SESSION["secao_militar"]==1){ ?>
Entrada
<li><a href="1acesso.php" TARGET=MAIN>1º Acesso</a></li>
<li><a href="nacesso.php" TARGET=MAIN>nº Acesso</a></li>
Saída
<li><a href="fechar.php" TARGET=MAIN>Fechar</a></li>
<li><a href="hoje.php" TARGET=MAIN>Hoje</a></li>
<?}?>
Pesquisar
<li><a href="por_dt_entrada.php" TARGET=MAIN>Data Entrada</a></li>
<li><a href="por_dt_saida.php" TARGET=MAIN>Data Saída</a></li>
<li><a href="filtrada.php" TARGET=MAIN>Filtrada</a></li>
<? if (($_SESSION["admin_militar"]==1) or ($_SESSION["secao_militar"]==1)){?>
Administração
<? if ($_SESSION["admin_militar"]==1){echo "<li><a href='militar.php' TARGET=MAIN>Militares</a></li>";} ?>
<li><a href="pessoa.php" TARGET=MAIN>Pessoas</a></li>
<li><a href="veiculo.php" TARGET=MAIN>Veículos</a></li>
<li><a href="registro.php" TARGET=MAIN>Registros</a></li>
<?}?>
</ul> 
