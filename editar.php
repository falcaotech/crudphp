<?php

    header('Content-Type: text/html; charset=utf-8');
  
    //verifica se foi passada a variável 'nome' pelo $_POST
    if (isset($_POST["nome"])) {
	//inclui o arquivo de conexão com o BD
	include "inc/conexao.php";
	//recebe as variáveis
	$id		= $_POST['id'];
	$nome		= $_POST['nome'];
	$descricao	= $_POST['descricao'];
	$categoria_id	= $_POST['categoria_id'];
	$fabricante_id	= $_POST['fabricante_id'];
	
	//monta o comando de atualização no BD
	$comando = "UPDATE
			produto
		    SET
			nome='$nome',
			descricao='$descricao', 
			categoria_id='$categoria_id'
			fabricante_id='$fabricante_id'
		    WHERE
			id='$id'";
	
	//executa e verifica se o comando foi realizado com sucesso
	if (mysql_query($comando)) {
	    //se foi cadastrado com sucesso
	    header("Location:index.php");	    
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
	//seleciona os produtos do BD
	$comando = "SELECT * FROM produto WHERE id='$id'";
	//executa a consulta
	$consulta = mysql_query($comando);
	//verifica quando produtos foram encontrados
	$quantidade = mysql_num_rows($consulta);
	
	//verifica se foi encontrado algum produto
	if (count($quantidade) > 0) {
	    
	    //seleciona as categorias cadastradas no banco
	    $comando = "SELECT * FROM categoria";
	    //executa a consulta
	    $categorias = mysql_query($comando);
	    //seleciona as categorias cadastradas no banco
	    $comando = "SELECT * FROM fabricante";
	    //executa a consulta
	    $fabricantes = mysql_query($comando);
	    
	    //associa o resultado da consulta a um array
	    $produto = mysql_fetch_assoc($consulta);
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
        <title>Edição de produto</title>
    </head>
    <body>
	
	<?php  include "inc/menu.php"; ?>
	
	<h1>Edição de produto</h1>
	
	<form action="editar.php" method="post">
	    
	    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>" />
	    
	    
	    <label for="nome">Nome</label>
	    <input type="text" name="nome" id="nome" value="<?php echo $produto['nome']; ?>" />
	    
	    <br />
	    
	    
	    <label for="categoria_id">Categoria</label>
	    <select name="categoria_id" id="categoria_id">
		<option></option>
		<?php while($categoria = mysql_fetch_assoc($categorias)){ ?>
		<option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['id'] == $produto['categoria_id']) echo "selected"; ?> ><?php echo $categoria['nome']; ?></option>
		<?php } ?>
	    </select>
	    
	    
	    <br />
	    
	    <label for="fabricante_id">Fabricante</label>
	    <select name="fabricante_id" id="fabricante_id">
		<option></option>
		<?php while($fabricante = mysql_fetch_assoc($fabricantes)){ ?>
		<option value="<?php echo $fabricante['id']; ?>" <?php if ($fabricante['id'] == $produto['fabricante_id']) echo "selected"; ?> ><?php echo $fabricante['nome']; ?></option>
		<?php } ?>
	    </select>
	    
	    
	    <br />
	    
	    <label for="descricao">Descrição</label>
	    <textarea name="descricao" id="descricao" ><?php echo $produto['descricao']; ?></textarea>
	    
	    <br />
	    
	    <input type="submit" value="Salvar" />
		
		
	    
	</form>
	
	<a href="index.php">Voltar</a>
	
    </body>
</html>
