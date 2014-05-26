<?php

     //inclui o arquivo de conexão com o BD
    include "inc/conexao.php";

    //verifica se foi passada a variável 'nome' pelo $_POST
    if (isset($_POST["nome"])) {
	//recebe as variáveis
	$nome	    = $_POST['nome'];
	$descricao  = $_POST['descricao'];
	$categoria_id  = $_POST['categoria_id'];
	$fabricante_id = $_POST['fabricante_id'];
	//monta o comando de inserção no BD
	$comando = "INSERT INTO produto (nome, descricao, categoria_id, fabricante_id) VALUES ('$nome', '$descricao', '$categoria_id', '$fabricante_id', '3')";
	
	//executa e verifica se o comando foi realizado com sucesso
	if (mysql_query($comando)) {
	    //se foi cadastrado com sucesso
	    header("Location:index.php");	    
	} else {
	    //se deu erro
	    echo '<p>Erro ao cadastrar.</p>';
	    echo '<a href="javascript:history.back()">Voltar</a>';
	    die();
	}
    }
   
     //seleciona as categorias cadastradas no banco
    $comando = "SELECT * FROM categoria";
    //executa a consulta
    $categorias = mysql_query($comando);
    
    //seleciona os fabricantes cadastrados no banco
    $comando = "SELECT * FROM fabricante";
    //executa a consulta
    $fabricantes = mysql_query($comando);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Novo produto</title>
    </head>
    <body>
	
	<?php  include "inc/menu.php"; ?>
	
	
	<h1>Novo produto</h1>
	
	<form action="cadastrar.php" method="post">
	    
	    <label for="nome">Nome</label>
	    <input type="text" name="nome" id="nome" />
	      
	    <br />
	    
	    <label for="categoria_id">Categoria</label>
	    <select name="categoria_id" id="nome" value="<?php echo $produto['nome']; ?>">
		<option></option>
		<?php while($categoria = mysql_fetch_assoc($categorias)){ ?>
		<option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
		<?php } ?>
	    </select>
	    
	    <br />
	    
	    <label for="fabricante_id">Fabricante</label>
	    <select name="fabricante_id" id="nome" value="<?php echo $produto['nome']; ?>">
		<option></option>
		<?php while($fabricante = mysql_fetch_assoc($fabricantes)){ ?>
		<option value="<?php echo $fabricante['id']; ?>"><?php echo $fabricante['nome']; ?></option>
		<?php } ?>
	    </select>
	    
	    <br />
	    
	    <label for="descricao">Descrição</label>
	    <textarea name="descricao" id="descricao" ></textarea>
	    
	    <br />
	    
	    <input type="submit" value="Salvar" />
		
		
	    
	</form>
	
	<a href="index.php">Voltar</a>
	
    </body>
</html>
