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
        $sql ="UPDATE matriculas SET estado=0 WHERE id_matri='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "La Matricula ha sido eliminado correctamente.";
          } else {
            echo "Ha ocurrido un error al intentar eliminar la Matricula.";
          }

          
        desconectar($xc);
    }
?>