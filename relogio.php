<? require('verificar.php'); ?>
<script type="text/javascript">

var digital = new Date(); // crio um objeto date do javascript
digital.setHours(<?php echo date("H,i,s"); ?>); // seto a hora usando a hora do servidor
<!--
function clock() {
var hours = digital.getHours();
var minutes = digital.getMinutes();
var seconds = digital.getSeconds();
digital.setSeconds( seconds+1 ); // aqui que faz a mágica

// acrescento zero
if (minutes <= 9) minutes = "0" + minutes;
if (seconds <= 9) seconds = "0" + seconds;

dispTime = hours + ":" + minutes + ":" + seconds;
document.getElementById("clock").innerHTML = dispTime; 
setTimeout("clock()", 1000); // chamo a função a cada 1 segundo
}
window.onload = clock;
</script>
