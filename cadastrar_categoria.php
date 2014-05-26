<?php

    //verifica se foi passada a variável 'nome' pelo $_POST
    if (isset($_POST["nome"])) {
	//inclui o arquivo de conexão com o BD
	include "inc/conexao.php";
	//recebe as variáveis
	$nome	    = $_POST['nome'];
	$descricao  = $_POST['descricao'];
	//monta o comando de inserção no BD
	$comando = "INSERT INTO categoria (nome, descricao) VALUES ('$nome', '$descricao')";
	//executa e verifica se o comando foi realizado com sucesso
	if (mysql_query($comando)) {
	    //se foi cadastrado com sucesso
	    header("Location:categoria.php");	    
	} else {
	    //se deu erro
	    echo '<p>Erro ao cadastrar.</p>';
	    echo '<a href="javascript:history.back()">Voltar</a>';
	    die();
	}
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Novo categoria</title>
    </head>
    <body>
	
	<?php  include "inc/menu.php"; ?>
	
	
	<h1>Novo categoria</h1>
	
	<form action="cadastrar_categoria.php" method="post">
	    
	    <label for="nome">Nome</label>
	    <input type="text" name="nome" id="nome" />
	    
	    <br />
	    
	    <label for="descricao">Descrição</label>
	    <textarea name="descricao" id="descricao" ></textarea>
	    
	    <br />
	    
	    <input type="submit" value="Salvar" />
		
	</form>
	
	<a href="categoria.php">Voltar</a>
	
    </body>
</html>
