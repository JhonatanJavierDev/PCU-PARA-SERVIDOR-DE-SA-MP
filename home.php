<?php
session_start();
include('./config/db_config.php');
$datos= mysqli_query($conexion, "SELECT * FROM player WHERE name = '".$_SESSION['name']."' ");
$datos=mysqli_fetch_array($datos);
$nombre=$datos['name'];
$coins=$datos['coins'];
$dinero=$datos['cash'];
$playerlevel=$datos['level'];
$email=$datos['email'];
$register=$datos['reg_date'];
$timeplay=$datos['time_playing'];
$gender=$datos['gender'];
$dinerobanco=$datos['bank_money'];
$skinid = $datos['skin'];
$telefono = $datos['phone_number'];
$vip = $datos['vip'];
$hambre = $datos['hungry'];
$sed = $datos['thirst'];
$vida = $datos['health'];
$armadura = $datos['armour'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>PCU del usuario</title>
    
  </head>
  <body>
    <h1>PCU del usuario</h1>
    <div class="container">
      <hr>
      <div class="left">
        <h2>Nombre del Jugador: <?php if(isset($nombre)) { ?> <?=$nombre ?? ""?> <?php } ?></h2>
        <h2>Fecha de registro:<?php if(isset($register)) { ?> <?=$register ?? ""?> <?php } ?></h2>

<h2>Tiempo Jugado:<?php if(isset($timeplay)) { ?> <?=$timeplay ?? ""?> <?php } ?></h2>
        <h2>VIP: <?php if($vip == 0){ echo "No tienes vip";} else { echo "Tienes VIP";} ?></h2>
        <h2>Monedas:<?php if(isset($coins)) { ?> <?=$coins ?? ""?> <?php } ?></h2>
      </div>
      <div class="right">
        <h2>Dinero en Mano:<?php if(isset($dinero)) { ?> <?=$dinero ?? ""?> <?php } ?></h2>
        <h2>Dinero en Banco:<?php if(isset($dinerobanco)) { ?> <?=$dinerobanco ?? ""?> <?php } ?></h2>
        <h2>Numero de telefono:<?php if(isset($telefono)) { ?> <?=$telefono ?? ""?> <?php } ?></h2>
        <h2>Nivel:<?php if(isset($playerlevel)) { ?> <?=$playerlevel ?? ""?> <?php } ?></h2>
        <h2><?php if ($gender == 0){echo "<h2>Genero: Masculino</h2>";}else {echo "<h2>Genero: Femenino</h2>";}?> </h2>
    </div>
    <div class="progress-container">
  <div class="progress-bar" id="hambre">
    <div class="progress-label">Hambre</div>
    <progress value="<?php echo $hambre; ?>" max="100"></progress>
  </div>
  <div class="progress-bar" id="sed">
    <div class="progress-label">Sed</div>
    <progress value="<?php echo $sed; ?>" max="100"></progress>
  </div>
  <div class="progress-bar" id="vida">
    <div class="progress-label">Vida</div>
    <progress value="<?php echo $vida; ?>" max="100"></progress>
  </div>
  <div class="progress-bar" id="armadura">
    <div class="progress-label">Armadura</div>
    <progress value="<?php echo $armadura; ?>" max="100"></progress>
  </div>
</div>

  </body>
</html>