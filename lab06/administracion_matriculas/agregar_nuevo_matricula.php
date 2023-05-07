
<?php 
    if(isset($_POST["id_curso"]) && isset($_POST["codigo"]) && isset($_POST["turno"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio10");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id_curso = $_POST["id_curso"];
        $codigo = $_POST["codigo"];
        $turno = $_POST["turno"];

        $sql ="INSERT INTO matriculas (id_alumno, id_curso, turno) VALUES ('$codigo','$id_curso','$turno')";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-Se ah agregado la nueva Matricula con exito.<br>-Puedes cerrar la ventana.<br>-Refresca la tabla.";

          } else {
            echo "Ha ocurrido un error al intentar eliminar la matricula.";
          }

          
        desconectar($xc);
    }
?>
