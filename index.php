<?php
//including the database connection file
include_once("conexion.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM persona ORDER BY idPersona DESC"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Casa</title>
</head>
 
<body>
    <a href="add.html">Añadir nuevos Datos</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Fecha Nacimiento</td>
            <td>Actualizar</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['nombre']."</td>";
            echo "<td>".$res['edad']."</td>";
            echo "<td>".$res['correo']."</td>";  
            echo "<td>".$res['fecha_na']."</td>";  
            echo "<td><a href=\"edit.php?id=$res[idPersona]\">Edit</a> | <a href=\"delete.php?id=$res[idPersona]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</body>
</html>