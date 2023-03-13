<?php  
include "conexion.php";
session_start();
error_reporting(0);

if(isset($_SESSION["Nombre_Usuario"]))
{
    header("Location: index.php");
}


if(isset($_POST["submit"])){
    $Correo_Usuario=$_POST["Correo_Usuario"];
    $Contrasena_Usuario=($_POST["Contrasena_Usuario"]);

    $sql="SELECT * FROM `proyecto_bdm`.`usuario` WHERE 
    Correo_Usuario='$Correo_Usuario' AND Contrasena_Usuario='$Contrasena_Usuario'";
    $result= mysqli_query($conn,$sql);
     

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['Nombre_Usuario'] = $row['Nombre_Usuario'];
        header("Location: index.php");
    }else{
        echo "<script>alert('La contraseña o el email son incorrectos')</script>";
       
    }



}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/estilo-registrer-login.css" />
</head>
<body style="background-image: url('img/PLanetsBackground.webp'); background-repeat: no-repeat; background-size: cover;">
    <form class="formulario"  action="" method="POST">

        <h1>Login</h1>
      

            <div class="contenedor">
                <div class="input-contenedor">
                    <input type="text" placeholder="Correo Electronico" name="Correo_Usuario" value="<?php echo $Correo_Usuario; ?>">
    
                </div>


                <div class="contenedor">
                    <div class="input-contenedor">
                        <input type="password" placeholder="Contraseña" name="Contrasena_Usuario" value="<?php echo $Contrasena_Usuario; ?>">
        
                    </div>

              <input type="submit" value="Iniciar Sesion" class="button" name="submit">
              <p>Al registrarse aceptas nuestras condiciones de uso y politica de privacidad.</p>
              <p>¿No tienes cuenta?<a class="link" href="register.php">Registrarse</a></p>

        </div>
    </form>
</body>
</html>