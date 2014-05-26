<?php
    
    //inclui o arquivo de conexão com o BD
    include "inc/conexao.php";
    
    //Comando para selecionar todos os produtos do BD
    $comando = "SELECT * FROM fabricante";
    //Executa o comando no BD
    $fabricantes = mysql_query($comando);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem de fabricantes</title>
    </head>
    <body>
	
	<?php  include "inc/menu.php"; ?>
	
	<h1>Fabricantes</h1>
	<a href="cadastrar_fabricante.php">Novo fabricante</a>
	<table id="fabricantes" width="100%" border="1">
	    <tr>
		<th>Nome do fabricante</th>
		<th>Descrição do fabricante</th>
		<th>Ações</th>
	    </tr>
	    
	    <?php while($fabricante = mysql_fetch_assoc($fabricantes)){ ?>
	    <tr>
		<td><?php echo $fabricante['nome']; ?></td>
		<td><?php echo $fabricante['descricao']; ?></td>
		<td>
		    <a href="editar_fabricante.php?id=<?php echo $fabricante['id']; ?>">Editar</a>
		    <a href="excluir_fabricante.php?id=<?php echo $fabricante['id']; ?>">Excluir</a>
		</td>
	    </tr>
	    <?php } ?>
	    
	</table>
	
    </body>
</html>
