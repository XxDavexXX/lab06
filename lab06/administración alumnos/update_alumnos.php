<?php 
    if(isset($_POST["cod"]) && isset($_POST["apellidos"]) && isset($_POST["nombres"]) && isset($_POST["dni"]) && isset($_POST["direcc"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio10");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["cod"];
        $apellidos = $_POST["apellidos"];
        $nombres = $_POST["nombres"];
        $dni = $_POST["dni"];
        $direccion = $_POST["direcc"];

        $sql ="UPDATE alumnos SET apellidos='$apellidos',nombres='$nombres',dni='$dni',direccion='$direccion' WHERE codigo='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-El usuario ha sido editado correctamente.<br>-Puedes cerrar la ventana estimado usuario.<br>-Puedes recargar la Tabla";
          } else {
            echo "Ha ocurrido un error al intentar editado el usuario.";
          }

          
        desconectar($xc);
    }
?>