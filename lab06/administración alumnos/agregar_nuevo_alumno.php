
<?php 
    if(isset($_POST["apellidos"]) && isset($_POST["nombres"]) && isset($_POST["dni"]) && isset($_POST["direcc"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio10");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $apellidos = $_POST["apellidos"];
        $nombres = $_POST["nombres"];
        $dni = $_POST["dni"];
        $direccion = $_POST["direcc"];

        $sql ="INSERT INTO alumnos (nombres, apellidos, dni, direccion) VALUES ('$nombres','$apellidos','$dni', '$direccion')";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-Se ah agregado el nuevo Alumno con exito.<br>-Puedes cerrar la ventana.<br>-Refresca la tabla.";

          } else {
            echo "Ha ocurrido un error al intentar eliminar el usuario.";
          }

          
        desconectar($xc);
    }
?>
