<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'conexion.php';
    $sql="select * from penalty_gk";
    $result=mysql_query($sql);
    ?>
    
    <h1>DATA BASE </h1>
    <input type="text" placeholder="team_id">
    <input type="text" placeholder="match_no">
    <input type="text" placeholder="player_gk">
    <button>CREATE</button>
    <button>READ</button>
    <button>UPDATE</button>
    <button>DELETE</button>

   
</body>
</html>