<?php
    
    //inclui o arquivo de conexão com o BD
    include "inc/conexao.php";
    
    //Comando para selecionar todos os produtos do BD
    $comando = "SELECT
		    p.*, c.nome AS categoria_nome, f.nome AS fabricante_nome
		FROM produto p
		    LEFT JOIN categoria AS c ON p.categoria_id = c.id
   
		    LEFT JOIN fabricante AS f ON p.fabricante_id = f.id";
    //Executa o comando no BD
    $produtos = mysql_query($comando);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem de produtos</title>
        <!--favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    </head>
    <body>
	
	<?php  include "inc/menu.php"; ?>
	
	<h1>Produtos</h1>
	<a href="cadastrar.php">Novo produto</a>
	<table id="produtos" width="100%" border="1">
	    <tr>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Categoria</th>
		<th>Fabricante</th>
		<th>Ações</th>
	    </tr>
	    
	    <?php while($produto = mysql_fetch_assoc($produtos)){ ?>
	    <tr>
		<td><?php echo $produto['nome']; ?></td>
		<td><?php echo $produto['descricao']; ?></td>
		<td><?php echo $produto['categoria_nome']; ?></td>
		<td><?php echo $produto['fabricante_nome']; ?></td>
		<td>
		    <a href="editar.php?id=<?php echo $produto['id']; ?>">Editar</a>
		    <a href="excluir.php?id=<?php echo $produto['id']; ?>">Excluir</a>
		</td>
	    </tr>
	    <?php } ?>
	    
	</table>
	
    </body>
</html>
