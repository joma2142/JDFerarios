<?php
$username = "root";
$password = "battlefield2142";
$servername = "http://18.221.230.14";

$dbname = "petest3";
$conn = new mysqli($servername, $username, $password, $dbname);
if($_";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo json_encode(mysqli_fetch_assoc($result));
    }else{
        echo "Error";
    }
}else if($_POST["metodo"] == "selectID"){
    $sql = "select * from usuarios where idusuarios =".$_POST["idusuarios"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo json_encode(mysqli_fetch_assoc($result));
    }else{
        echo "Error";
    }
}else if($_POST["metodo"] == "selectAll"){
    $sql = "select * from usuarios";
    $usuarios = array();
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($usuarios, $row);
        }
        echo json_encode($usuarios);
    }else{
        echo "Error";
    }
}else{
    if($_POST["metodo"] == "insert"){
        $sql = "insert into usuarios (nombre,apellidos,telefono,correo,
        provincia,genero,username,password,rol) values ('"
        .$_POST["nombre"]."', '"
        .$_POST["apellidos"]."', '"
        .$_POST["telefono"]."', '"
        .$_POST["correo"]."', '"
        .$_POST["provincia"]."', '"
        .$_POST["genero"]."', '"
        .$_POST["username"]."', '"
        .$_POST["password"]."', '"
        .$_POST["rol"]."')";
    }else if($_POST["metodo"] == "update"){
        $sql = "update usuarios set 
        nombre='".$_POST["nombre"]."',
        apellidos='".$_POST["apellidos"]."',
        telefono='".$_POST["telefono"]."',
        correo='".$_POST["correo"]."',
        provincia='".$_POST["provincia"]."',
        genero='".$_POST["genero"]."',
        username='".$_POST["username"]."',
        password='".$_POST["password"]."',
        rol='".$_POST["rol"]."' where idusuarios = ".$_POST["idusuarios"];
    }

    if($conn->query($sql) === TRUE){
        echo "Exito";
    }else{
        echo "Error";
    }

}

$conn->close();
?>