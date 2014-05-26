<?php
//Conexão com o banco de dados
$link = mysqli_connect("localhost", "root", "", "crud");

//Define o charset da conexão como UTF-8
$link->set_charset("utf8");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 