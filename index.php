<?php

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "contacto";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);


// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqlcontactos = mysqli_query($conexionBD,"SELECT * FROM  contacto WHERE id=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlContacto) > 0){
        $contactos = mysqli_fetch_all($sqlContactos,MYSQLI_ASSOC);
        echo json_encode($contactos);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $sqlcintactoss = mysqli_query($conexionBD,"DELETE FROM empleados WHERE id=".$_GET["borrar"]);
    if($sqlcontactos){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos 
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre=$data->nombre;
    $correo=$data->correo;
        if(($correo!="")&&($nombre!="")){
            
    $sqlcontactos = mysqli_query($conexionBD,"INSERT INTO contacto(nombre,correo) VALUES('$nombre','$correo') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}
// Actualiza datos peara filtrar 
if(isset($_GET["actualizar"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombre=$data->nombre;
    $telefono=$data->telefono;
     $fecha=$data->fecha;
      $direccion=$data->direccion;
       $email=$data->email;
       
    $sqlcontacto = mysqli_query($conexionBD,"UPDATE contacto SET nombre='$nombre',correo='$correo' WHERE id='$id'");
    echo json_encode(["success"=>1]);
    exit();
}
// Consulta todos los registros de la tabla contactos
$sqlcontactos = mysqli_query($conexionBD,"SELECT * FROM  contactos ");
if(mysqli_num_rows($sqlContactos) > 0){
    $contactos = mysqli_fetch_all($sqlContactos,MYSQLI_ASSOC);
    echo json_encode($contactos);
}
else{ echo json_encode([["success"=>0]]); }


?>




























?>
