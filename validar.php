<?php
  /*V2 Se aplicarón correciones de seguridad en el código*/
  //Conexion a nuestra base de datos
  session_start();
  include('./config/db_config.php');

  //Se aplico una correción para mejorar la seguridad sanando las vulnerabilidades
  $name = mysqli_real_escape_string($conexion, $_POST['name']);
  $password = mysqli_real_escape_string($conexion, $_POST['password']);

   
  $_SESSION['name'] = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  
 if(isset($name) && isset($password)){
    $stmt = mysqli_prepare($conexion, "SELECT salt FROM player WHERE name = ?");
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $salt);
    if(mysqli_stmt_fetch($stmt)){
        $hash = "$password$salt";
        $password = hash('sha256', $hash);
        $stmt = mysqli_prepare($conexion, "SELECT * FROM player WHERE name = ? AND pass = ?");
        mysqli_stmt_bind_param($stmt, "ss", htmlspecialchars($name), $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) > 0) {
            header("location: home.php");
        } else {
            include("index.html");
        }
    } else {
        include("index.html");
    }
    mysqli_stmt_close($stmt);
} else {
    include("index.html");
}

mysqli_close($conexion);
