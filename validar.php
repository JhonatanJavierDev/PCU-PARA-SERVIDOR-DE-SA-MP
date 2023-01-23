<?php
//Conexion a nuestra base de datos
  session_start();
  include('./config/db_config.php');

  $name = $_POST['name'];
  $password = $_POST['password'];
  
  $_SESSION['name']=$name;


  
  if(isset($name) && isset($password)){
    $cache = mysqli_query($conexion, "SELECT salt FROM player WHERE name = '$name';");
    if(mysqli_num_rows($cache)>0){
        $result = mysqli_fetch_array($cache);
        $salt = $result['salt'];
        $hash = "$password$salt";
        $password = hash('sha256', $hash);
        $consulta="SELECT*FROM player where name='$name' and pass='$password'";
        $resultado=mysqli_query($conexion,$consulta);
        $rows=mysqli_num_rows($resultado);
        if($rows){
            header("location:home.php");
        }else{
            include("index.html");
        }
    }else{
        include("index.html");
    }
}else{
    include("index.html");
}

if (isset($resultado)) {
    mysqli_free_result($resultado);
}
if (isset($resultado)) {
    mysqli_free_result($resultado);
}
mysqli_close($conexion);