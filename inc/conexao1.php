<?php

//se conecta ao servidor MySQL
$link = mysql_connect('localhost', 'root', '');

//define o charset da conexão como UTF-8
mysql_set_charset('utf8',$link);

//verifica se a conexão falhou
if (!$link) {
    //se falhou, exibe o erro
    die('Not connected : ' . mysql_error());
}

//Seleciona o banco de dados
$db_selected = mysql_select_db('crud', $link);

//verifica se a conexão com o banco falhou
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
?>