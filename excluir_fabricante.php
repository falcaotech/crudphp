<?php

    header('Content-Type: text/html; charset=utf-8');
    
    //verifica se foi passada a variável 'id' pelo $_GET
    if (isset($_GET["id"])) {
	//recebe a variável id vinda por GET
	$id = $_GET["id"];	
	//inclui o arquivo de conexão com o BD
	include "inc/conexao.php";	
	//monta o comando de remoção no BD
	$comando = "DELETE FROM fabricante WHERE id = '$id'";	
	//executa e verifica se o comando foi realizado com sucesso
	if (mysql_query($comando)) {
	    //se foi cadastrado com sucesso
	    header("Location:fabricante.php");	    
	} else {
	    //se deu erro
	    echo '<p>Erro ao excluir.</p>';
	    echo '<a href="javascript:history.back()">Voltar</a>';
	    die();
	}
    } else {
	echo '<p>Id não fornecida.</p>';
	echo '<a href="fabricante.php">Voltar</a>';
	die();
	
    }

?>
