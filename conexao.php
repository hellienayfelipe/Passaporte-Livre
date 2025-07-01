<?php
$servidor = 'localhost';
  $bd = 'passaporte_livre';
  $usuario = 'root';
  $senha = '';
  $id = $GET['id'] ?? 0;

  $conexao = mysqli_connect($servidor, $usuario, $senha, $bd);
  if (!$conexao) {
    die("deu ruim" . mysqli_connect_error());
  }