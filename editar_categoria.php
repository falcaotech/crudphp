<?php

    header('Content-Type: text/html; charset=utf-8');
  
    //verifica se foi passada a variável 'nome' pelo $_POST
    if (isset($_POST["nome"])) {
	//inclui o arquivo de conexão com o BD
	include "inc/conexao.php";
	//recebe as variáveis
	$id	    = $_POST['id'];
	$nome	    = $_POST['nome'];
	$descricao  = $_POST['descricao'];
	//monta o comando de atualização no BD
	$comando = "UPDATE categoria SET nome='$nome', descricao='$descricao' WHERE id='$id'";
	//executa e verifica se o comando foi realizado com sucesso
	if (mysql_query($comando)) {
	    //se foi cadastrado com sucesso
	    header("Location:categoria.php");	    
	} else {
	    //se deu erro
	    echo '<p>Erro ao editar.</p>';
	    echo '<a href="javascript:history.back()">Voltar</a>';
	    die();
	}
    }

    //verifica se foi passada a variável 'id' pelo $_GET
    if (isset($_GET["id"])) {
	//inclui o arquivo de conexão com o BD
	include "inc/conexao.php";
	//recebe a variável id vinda por GET
	$id = $_GET["id"];	
	//monta o comando de inserção no BD
	$comando = "SELECT * FROM categoria WHERE id='$id'";
	//executa a consulta
	$consulta = mysql_query($comando);
	//verifica quando produtos foram encontrados
	$quantidade = mysql_num_rows($consulta);
	
	//verifica se foi encontrado algum produto
	if (count($quantidade) > 0) {
	    //associa o resultado da consulta a um array
	    $categoria = mysql_fetch_assoc($consulta);
	} else {
	    //se deu erro
	    echo '<p>Nenhum produto encontrado.</p>';
	    echo '<a href="javascript:history.back()">Voltar</a>';
	    die();
	}
    } else {
	echo '<p>Id não fornecida.</p>';
	echo '<a href="index.php">Voltar</a>';
	die();
	
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edição de categoria</title>
    </head>
    <body>
	
	<?php  include "inc/menu.php"; ?>
	
	<h1>Edição de categoria</h1>
	
	<form action="editar_categoria.php" method="post">
	    
	    <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>" />
	    
	    <label for="nome">Nome</label>
	    <input type="text" name="nome" id="nome" value="<?php echo $categoria['nome']; ?>" />
	    
	    <br />
	    
	    <label for="descricao">Descrição</label>
	    <textarea name="descricao" id="descricao" ><?php echo $categoria['descricao']; ?></textarea>
	    
	    <br />
	    
	    <input type="submit" value="Salvar" />
		
	</form>
	
	<a href="categoria.php">Voltar</a>
	
    </body>
</html>
