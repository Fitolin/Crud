<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php

include_once("conexion.php");
 
if(isset($_POST['Submit'])) { 

    $name = $_POST['nombre'];
    $age = $_POST['edad'];
    $email = $_POST['email'];
    $fecha_na = $_POST['fecha_na'];
        
    // checking empty fields
    if(empty($name) || empty($age) || empty($email) || empty($fecha_na)) {                
        if(empty($name)) {
            echo "<font color='red'>Nombre.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Edad.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email.</font><br/>";
        }
        if(empty($fecha_na)) {
            echo "<font color='red'>Fecha Nacimiento.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO persona(nombre,edad,correo,fecha_na) VALUES('$name','$age'
        ,'$email','$fecha_na')");
        
        //display success message
        echo "<font color='green'>Dato ingresado correctamente.";
        echo "<br/><a href='index.php'>Ver Resultados</a>";
    }
}
?>
</body>
</html>