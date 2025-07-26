<?php
$dir = __DIR__ . "/server/";
$bin = $dir . "samp03svr";

$action = $_POST['action'] ?? '';

if ($action === 'start') {
  shell_exec("cd $dir && screen -dmS samp ./samp03svr");
  echo "Servidor SA-MP iniciado!";
} elseif ($action === 'stop') {
  shell_exec("pkill -f samp03svr");
  echo "Servidor SA-MP parado.";
} else {
  echo "Ação inválida.";
}
?>