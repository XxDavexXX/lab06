<?php 
    if(isset($_POST["id"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio10");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["id"];
        $sql ="UPDATE cursos SET estado=0 WHERE id_curso='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "El Curso ha sido eliminado correctamente.";
          } else {
            echo "Ha ocurrido un error al intentar eliminar el Curso.";
          }

          
        desconectar($xc);
    }
?>