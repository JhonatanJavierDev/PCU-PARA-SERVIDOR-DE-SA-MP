<?php
//Aca cambias la conexion a la tuya, sea un host o entorno local, 
//Host, usuario, contraseña y Nombre de la base de datos
$conexion = mysqli_connect("localhost", "root", "", "Database");

// Preparamos la conexión para usar sentencias preparadas
$conexion->set_charset("utf8");
$conexion->prepare = true;

// Aqui ejecutamos las consultas preparadas
function ejecutar_consulta($conexion, $query, $parametros) {
    // Preparar la consulta
    $stmt = $conexion->prepare($query);
    // Vinculamos los parámetros
    call_user_func_array(array($stmt, 'bind_param'), refValues($parametros));
    // Se hace un execute de la consulta
    $stmt->execute();
    return $stmt;
}

// Esta Función es  auxiliar el vinculo de parámetros
function refValues($arr) {
    if (strnatcmp(phpversion(), '5.3') >= 0) {
        $refs = array();
        foreach ($arr as $key => $value) {
            $refs[$key] = & $arr[$key];
        }
        return $refs;
    }
    return $arr;
