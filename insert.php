<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Registro</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php 
	include_once './config/conexion.php';
	
	if(isset($_POST['guardar'])){
        $goles=$_POST['goles'];
		$camiseta=$_POST['camiseta'];
		$jugador=filter_var($_POST['jugador'], FILTER_SANITIZE_STRING);
        $equipo=filter_var($_POST['equipo'], FILTER_SANITIZE_STRING);
        
		if (!empty($goles) && !empty($camiseta) && !empty($jugador) && !empty($equipo)) {
			$consulta_insert=$con->prepare('INSERT INTO penaltis(goles, camiseta, jugador, equipo) VALUES (:goles, :camiseta, :jugador, :equipo)');
			$consulta_insert->execute(array(
				':goles' => $goles,
				':camiseta' => $camiseta,
                ':jugador' => $jugador,
                ':equipo' => $equipo
			));

			header('Location: index.php');
		} else {
			echo "<script> alert('No se guardo la información);</script>";
		}
	}
?>
	<div class="contenedor">
		<h2>EJERCICIO CRUD EN PHP </h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="goles" placeholder="goles" class="input__text">
                <input type="text" name="camiseta" placeholder="camiseta" class="input__text">
                <input type="text" name="jugador" placeholder="jugador" class="input__text">
                <input type="text" name="equipo" placeholder="equipo" class="input__text">
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
