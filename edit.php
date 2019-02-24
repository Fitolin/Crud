<?php
// including the database connection file
include_once("conexion.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email']; 
    $fecha_na=$_POST['fechanacimiento'];   
    


  

    // checking empty fields
    if(empty($name) || empty($age) || empty($email) || empty($fecha_na) || !empty((int)$fecha_na)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        } 
        if(empty($fecha_na)) {
            echo "<font color='red'>Debe completar Email .</font><br/>";
        } 
         
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE persona SET nombre='$name',edad='$age',correo='$email',fecha_na='$fecha_na' WHERE idPersona=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}

?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM persona WHERE idPersona=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name= $res['nombre'];
    $age= $res['edad'];
    $email = $res['correo'];
    $fecha_na = $res['fecha_na'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="name" value="<?php echo $name;?> "></td>
            </tr>
            <tr> 
                <td>Edad</td>
                <td><input type="text" name="age" value="<?php echo $age;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>Fecha Nacimiento</td>
                <td><input type="date" name="fechanacimiento" value="<?php echo $fecha_na;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>