<?php 
include "conexion.php";
error_reporting(0);
session_start();


if(isset($_SESSION["Nombre_Usuario"]))
{

    header("Location: index.php");
}

if(isset($_POST["submit"])){
    $Foto_Usuario=$_POST["Foto_Usuario"];
    $Nombre_Usuario=$_POST["Nombre_Usuario"];
    $NomPatr_Usuario=$_POST["NomPatr_Usuario"];
    $NomMatr_Usuario=$_POST["NomMatr_Usuario"];
    $Rol_Usuario=$_POST["Rol_Usuario"];
    $Genero_Usuario=$_POST["Genero_Usuario"];
    $Nacimiento_Usuario=$_POST["Nacimiento_Usuario"];
    $Correo_Usuario=$_POST["Correo_Usuario"];
    $Contrasena_Usuario=$_POST["Contrasena_Usuario"];
    $cContrasena_Usuario=$_POST["cContrasena_Usuario"];
    $Nombre_usuario_Usuario=$_POST["Nombre_usuario_Usuario"];

    if($Contrasena_Usuario==$cContrasena_Usuario){
        $sql="SELECT * FROM `proyecto_bdm`.`usuario` WHERE 
        Correo_Usuario='$Correo_Usuario'";
        $result=mysqli_query($conn,$sql);
        if(!$result->num_rows > 0){

            $sql="INSERT INTO `proyecto_bdm`.`usuario`
            (Foto_Usuario,Nombre_Usuario,NomPatr_Usuario,NomMatr_Usuario,Rol_Usuario,Genero_Usuario,Nacimiento_Usuario,Correo_Usuario,Contrasena_Usuario,Nombre_usuario_Usuario)
            VALUE ('$Foto_Usuario','$Nombre_Usuario','$NomPatr_Usuario','$NomMatr_Usuario','$Rol_Usuario',' $Genero_Usuario','$Nacimiento_Usuario','$Correo_Usuario',' $Contrasena_Usuario','$Nombre_usuario_Usuario')";
            $result=mysqli_query($conn,$sql);

            if($result){
                echo "<script>alert('Usuario 
                registrado')</script>";
                $Foto_Usuario="";
                $$Nombre_Usuario="";
                $NomPatr_Usuario="";
                $NomMatr_Usuario="";
                $Rol_Usuario="";
                $Genero_Usuario="";
                $Nacimiento_Usuario="";
                $Correo_Usuario="";
                $_POST["Contrasena_Usuario"]="";
                $_POST["cContrasena_Usuario"]="";
                $Nombre_usuario_Usuario="";
            }else{
                echo "<script>alert('Hubo un error')
                </script>";
            }
        }else{
            echo "<script>alert('El correo ya existe')
            </script>";
        }
    }else{
        echo "<script>alert('Las contraseñas no se coinciden')
        </script>";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/estilo-registrer-login.css" />

    <style>



    </style>
</head>
<body style="background-image: url('img/PLanetsBackground.webp'); background-repeat: no-repeat; background-size: cover;">
    <form class="formulario" action="" method="POST" id="form">

        <h1>Registrar</h1>
       
        <div class="contenedor">
            <div class="input-contenedor">
                <input type="file" name="Foto_Usuario" id="Foto_Usuario" class="foto" required  accept="image/png, image/jpeg">
                
                
                <div id="preview" class="styleImage">
                
                </div>


            </div>

       
       
       
       
       
        <div class="contenedor">
            <div class="input-contenedor">
                <input type="text" name="Nombre_Usuario" id="Nombre_Usuario" placeholder="Nombre de usuario">
                <input type="text" name="NomPatr_Usuario" id="NomPatr_Usuario" placeholder="Nombre de usuario Paterno">
                <input type="text" name="NomMatr_Usuario" id="NomMatr_Usuario" placeholder="Nombre de usuario Materno">
            </div>


            <div class="contenedor">
                <div class="input-contenedor">
                    
                    <select name="Rol_Usuario" id="Rol_Usuario" required>
                        <option value="0">¿Cual es su Rol?</option>
                        <option value="1">Maestro</option>
                        <option value="2">Estudiante</option>

                    </select>

                </div>
            
            
            
            
            
            <div class="contenedor">
                <div class="input-contenedor">
                    
                    <select name="Genero_Usuario" id="Genero_Usuario" required>
                        <option value="0">Selecciona su genero..</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>

                    </select>

                </div>


            




    
               
           
           
           
           
            <div class="contenedor">
                <div class="input-contenedor">
                    <input type="date" id="Nacimiento_Usuario" name="Nacimiento_Usuario">
    
                </div>

            

            <div class="contenedor">
                <div class="input-contenedor">
                    <input type="text" name="Correo_Usuario" id="Correo_Usuario" placeholder="Correo Electronico">
    
                </div>


                <div class="contenedor">
                    <div class="input-contenedor">
                        <input type="password" name="Contrasena_Usuario" id="Contrasena_Usuario" placeholder="Contraseña">
        
                    </div>



                    <div class="contenedor">
                    <div class="input-contenedor">
                        <input type="password" name="cContrasena_Usuario" id="cContrasena_Usuario" placeholder="Contraseña">
        
                    </div>


                    
            <div class="contenedor">
            <div class="input-contenedor">
                <input type="text" name="Nombre_usuario_Usuario" id="Nombre_usuario_Usuario" placeholder="Nickname">
      
            </div>


              <input type="submit" value="Registrarse"  name="submit"  class="button">
              <p class="warnings" id="warnings"></p>
              <p>Al registrarse aceptas nuestras condiciones de uso y politica de privacidad.</p>
              <p>¿Ya tienes cuenta?<a class="link" href="login.php">Iniciar Sesion</a></p>

        </div>
    </form>
   
</body>
</html>