<?php 
    if(isset($_POST["id_curso"]) && isset($_POST["nombre_curso"]) && isset($_POST["costo_curso"]) && isset($_POST["nombre_profesor"]) && isset($_POST["nivel"]) && isset($_POST["horas_x_semana"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio10");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["id_curso"];
        $nombre_curso = $_POST["nombre_curso"];
        $costo_curso = $_POST["costo_curso"];
        $nombre_profesor = $_POST["nombre_profesor"];
        $nivel = $_POST["nivel"];
        $horas_x_semana = $_POST["horas_x_semana"];

        $sql ="UPDATE cursos SET nombre_curso='$nombre_curso',costo_curso='$costo_curso',nombre_profesor='$nombre_profesor',nivel='$nivel',horas_x_semana='$horas_x_semana' WHERE id_curso='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-El Curso ha sido editado correctamente.<br>-Puedes cerrar la ventana estimado usuario.<br>-Puedes recargar la Tabla";
          } else {
            echo "Ha ocurrido un error al intentar editado el usuario.";
          }

          
        desconectar($xc);
    }
?>