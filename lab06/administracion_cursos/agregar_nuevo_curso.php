
<?php 
    if(isset($_POST["nombre_curso"]) && isset($_POST["costo_curso"]) && isset($_POST["nombre_profesor"]) && isset($_POST["nivel"]) && isset($_POST["horas_x_semana"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio10");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $nombre_curso = $_POST["nombre_curso"];
        $costo_curso = $_POST["costo_curso"];
        $nombre_profesor = $_POST["nombre_profesor"];
        $nivel = $_POST["nivel"];
        $horas_x_semana = $_POST["horas_x_semana"];

        $sql ="INSERT INTO cursos (nombre_curso, costo_curso, nombre_profesor, nivel,horas_x_semana) VALUES ('$nombre_curso','$costo_curso','$nombre_profesor', '$nivel', '$horas_x_semana')";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-Se ah agregado el nuevo Curso con exito.<br>-Puedes cerrar la ventana.<br>-Refresca la tabla.";

          } else {
            echo "Ha ocurrido un error al intentar eliminar el curso.";
          }

          
        desconectar($xc);
    }
?>
