<?php
    include_once './config/conexion.php';
    $setencia_select=$con->prepare('SELECT * FROM penaltis');
    $setencia_select->execute();
    $fila=$setencia_select->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <h2>EJERCICIO CRUD</h2>
        <div class="barra_buscador">
            <form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar" value="<?php if(isset($buscar_text)) echo $buscar_text ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
        </div>    
         <table>
            <tr class="head">
                <td>id</td>
                <td>goles/td>
                <td>camiseta</td>
                <td>jugador</td>
                <td>equipo</td>
                <td Colspan ="2">Acción</td>
            </tr>

            <?php foreach ($fila as $fila):?>
            <tr>
                <td><?php echo $fila['id'];?></td>;
                <td><?php echo $fila['goles'];?></td>;
                <td><?php echo $fila['camiseta'];?></td>;
                <td><?php echo $fila['jugador'];?></td>;
                <td><?php echo $fila['equipo'];?></td>;
                <td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
				<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>    
            </tr>
            <?php endforeach ?>
         </table>
    </div>


  

   
</body>
</html>