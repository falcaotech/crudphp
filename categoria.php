<?php
    
    //inclui o arquivo de conexão com o BD
    include "inc/conexao.php";
    
    //Comando para selecionar todos os produtos do BD
    $comando = "SELECT * FROM categoria";
    //Executa o comando no BD
    $categorias = mysql_query($comando);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem de categorias</title>
    </head>
    <body>
	
	<?php  include "inc/menu.php"; ?>
	
	<h1>Categorias</h1>
	<a href="cadastrar_categoria.php">Novo categoria</a>
	<table id="categorias" width="100%" border="1">
	    <tr>
		<th>Nome da categoria</th>
		<th>Descrição da categoria</th>
		<th>Ações</th>
	    </tr>
	    
	    <?php while($categoria = mysql_fetch_assoc($categorias)){ ?>
	    <tr>
		<td><?php echo $categoria['nome']; ?></td>
		<td><?php echo $categoria['descricao']; ?></td>
		<td>
		    <a href="editar_categoria.php?id=<?php echo $categoria['id']; ?>">Editar</a>
		    <a href="excluir_categoria.php?id=<?php echo $categoria['id']; ?>">Excluir</a>
		</td>
	    </tr>
	    <?php } ?>
	    
	</table>
	
    </body>
</html>
