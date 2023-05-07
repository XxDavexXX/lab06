<?php 
    if(isset($_POST["id_curso"]) && isset($_POST["codigo"]) && isset($_POST["turno"]) && isset($_POST["id_matri"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio10");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);  
        }
    
        $xc = conectar();
        $id = $_POST["id_matri"];
        $id_curso = $_POST["id_curso"];
        $codigo = $_POST["codigo"];
        $turno = $_POST["turno"];

        $sql ="UPDATE matriculas SET id_curso='$id_curso',id_alumno='$codigo',turno='$turno' WHERE id_matri='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-La Matricula ha sido editado correctamente.<br>-Puedes cerrar la ventana estimado usuario.<br>-Puedes recargar la Tabla";
          } else {
            echo "Ha ocurrido un error al intentar editar la Matricula.";
          }

          
        desconectar($xc);
    }
?>