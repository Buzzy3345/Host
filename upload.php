<?php
ini_set('upload_max_filesize', '200M');
ini_set('post_max_size', '200M');

$uploadDir = 'uploads/';
$serverDir = 'server/';

if (!isset($_FILES['file'])) {
  die("Nenhum arquivo enviado.");
}

$file = $_FILES['file'];
$zipName = basename($file['name']);
$dest = $uploadDir . $zipName;

if (move_uploaded_file($file['tmp_name'], $dest)) {
  echo "Arquivo enviado com sucesso.<br>";

  // Se for .zip, extrair
  $zip = new ZipArchive;
  if ($zip->open($dest) === TRUE) {
    $zip->extractTo($serverDir);
    $zip->close();
    echo "GM extraído para o servidor!";
  } else {
    echo "Erro ao extrair o ZIP.";
  }
} else {
  echo "Erro ao enviar o arquivo.";
}
?>