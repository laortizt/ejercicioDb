<?php
	include_once './config/conexion.php';
    
	if(isset($_GET['id'])){
        $id=(int) $_GET['id'];
        
		$buscar_id=$con->prepare('SELECT * FROM penaltis WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
            ':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	} else {
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$goles=$_POST['goles'];
		$camiseta=$_POST['camiseta'];
		$jugador=filter_var($_POST['jugador'], FILTER_SANITIZE_STRING);
        $equipo=filter_var($_POST['equipo'], FILTER_SANITIZE_STRING);
		$id=(int) $_GET['id'];

		if(!empty($goles) && !empty($camiseta) && !empty($jugador) && !empty($equipo)) {
            $consulta_update=$con->prepare('UPDATE penaltis SET  
                goles=:goles,
                camiseta=:camiseta,
                jugador=:jugador,
                equipo=:equipo
                WHERE id=:id;'
            );

            $consulta_update->execute(array(
                ':goles'=>$goles,
                ':camiseta' =>$camiseta,
                ':jugador' =>$jugador,
                ':equipo' =>$equipo,
                ':id' =>$id
            ));

            header('Location: index.php');
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Registro</title>
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<div class="contenedor">
		<h2>Editar</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id" value="<?php if($resultado) echo $resultado['id']; ?>" class="input__text">
				<input type="text" name="goles" value="<?php if($resultado) echo $resultado['goles']; ?>" class="input__text">
                <input type="text" name="camiseta" value="<?php if($resultado) echo $resultado['camiseta']; ?>" class="input__text">
                <input type="text" name="jugador" value="<?php if($resultado) echo $resultado['jugador']; ?>" class="input__text">
                <input type="text" name="equipo" value="<?php if($resultado) echo $resultado['equipo']; ?>" class="input__text">
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>