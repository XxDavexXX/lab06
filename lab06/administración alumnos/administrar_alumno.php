
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-center">
                SIMULADOR EN PROCESO
            </a>
        </div>
    </nav>

    <hr>
    <div style='width:100%;display:flex;justify-content:center;align-items:center;margin-top:10px;'>
        <h5 style='width:90%;height:60px;'><div height='10' style='margin-right:10px;' class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div>Listado de Alumnos -> Puedes Administrarlos -> Puedes Matricularlos</h5>
    </div>

<?php 
    function conectar(){
        $xc = mysqli_connect('localhost',"root","","laboratorio10");
        return $xc;
    }

    function desconectar($xc){
        mysqli_close($xc);
    }


    $xc = conectar();
    $sql = "SELECT * FROM alumnos Where estado = 1";
    $res = mysqli_query($xc,$sql);
    desconectar($xc);
    $num = 1;
    echo "<div style='width:100%;display:flex;justify-content:center;'>";
    echo "<table style='width:90%;' class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Nombres</th>";
    echo "<th scope='col'>Apellidos</th>";
    echo "<th scope='col'>Dni</th>";
    echo "<th scope='col'>Dirección</th>";
    echo "<th scope='col'>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($filas=mysqli_fetch_array($res))
    {
        $nombres = $filas['nombres'];
        $apellidos = $filas['apellidos'];
        $dni = $filas['dni'];
        $direccion = $filas['direccion'];
        echo " <tr>";
        echo "<th scope='row'>".$num."</th>";
        echo "<td>".$nombres."</td>";
        echo "<td>".$apellidos."</td>";
        echo "<td>".$dni."</td>";
        echo "<td>".$direccion."</td>";
        echo "<td><button id='doc".$num."' style='margin-right:10px;' class='btn btn-success' onclick='abrirFormulario(".$num.")'>Editar</button><button id='doc".$num."' style='margin-right:10px;' class='btn btn-danger' onclick ='eliminar_alumno(".$num.")'>Eliminar</a></button>";
        echo "</tr>";
        $num++;
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
?>
    <div style='display:flex;'>
        <button style='margin-left:60px;' onclick='recargar_page()' type="button" class="btn btn-primary">Recargar Tabla</button>
        <button style='margin-left:10px;' class='btn btn-warning' onclick='abrirFormulario_agregar()'>+ Alumno</button>
    </div>

    <hr>
    
    
    
    <hr>
    <div style='width:100%;display:flex;justify-content:center;align-items:center;margin-top:10px;'>
        <h5 style='width:90%;height:60px;'><div height='10' style='margin-right:10px;' class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>Listado de Cursos -> Puedes Administrarlos</h5>
    </div>

<?php 

    $xc = conectar();
    $sql = "SELECT * FROM cursos Where estado = 1";
    $res = mysqli_query($xc,$sql);
    desconectar($xc);
    $num = 1;
    echo "<div style='width:100%;display:flex;justify-content:center;'>";
    echo "<table style='width:90%;' class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Curso</th>";
    echo "<th scope='col'>Costo S/.</th>";
    echo "<th scope='col'>Licenciado</th>";
    echo "<th scope='col'>Nivel Academico</th>";
    echo "<th scope='col'>Horas x Semana</th>";
    echo "<th scope='col'>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($filas=mysqli_fetch_array($res))
    {
        $id_curso = $filas['id_curso'];
        $nombre_curso = $filas['nombre_curso'];
        $costo_curso = $filas['costo_curso'];
        $nombre_profesor = $filas['nombre_profesor'];
        $nivel = $filas['nivel'];
        $horas_x_semana = $filas['horas_x_semana'];
        echo " <tr>";
        echo "<th scope='row'>".$num."</th>";
        echo "<th scope='row'>".$nombre_curso."</th>";
        echo "<td>".$costo_curso."</td>";
        echo "<td>".$nombre_profesor."</td>";
        echo "<td>".$nivel."</td>";
        echo "<td>".$horas_x_semana."</td>";
        echo "<td><button id='doc".$num."' style='margin-right:10px;' class='btn btn-success' onclick='abrirFormulario_curso(".$num.")'>Editar</button><button id='doc".$num."' style='margin-right:10px;' class='btn btn-danger' onclick ='eliminar_cursos(".$num.")'>Eliminar</a></button>";
        echo "</tr>";
        $num++;
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
?>
    <div style='display:flex;'>
        <button style='margin-left:60px;' onclick='recargar_page_curso()' type="button" class="btn btn-primary">Recargar Tabla</button>
        <button style='margin-left:10px;' class='btn btn-warning' onclick='abrirFormulario_agregar_curso()'>+ Curso</button>
    </div>

    <hr>

    <div style='width:100%;height:60px;background-color:#ccc;'></div>
    <div style='width:100%;display:flex;justify-content:center;align-items:center;margin-top:10px;'>
        <h5 style='width:90%;height:60px;'><div height='10' style='margin-right:10px;' class="spinner-border text-dark" role="status"><span class="visually-hidden">Loading...</span></div>Matriculas Vigentes -> Puedes Administrarlos</h5>
    </div>

    <?php 

    $xc = conectar();
    $sql = "SELECT * FROM matriculas
            INNER JOIN alumnos ON (alumnos.codigo=matriculas.id_alumno)
            INNER JOIN cursos ON (cursos.id_curso=matriculas.id_curso)
            WHERE matriculas.estado = 1";
    $res = mysqli_query($xc,$sql);
    desconectar($xc);
    $num = 1;
    echo "<div style='width:100%;display:flex;justify-content:center;'>";
    echo "<table style='width:90%;' class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Nombres</th>";
    echo "<th scope='col'>Apellidos</th>";
    echo "<th scope='col'>Dni</th>";
    echo "<th scope='col'>Curso</th>";
    echo "<th scope='col'>Turno-Estudio</th>";
    echo "<th scope='col'>Licenciado</th>";
    echo "<th scope='col'>Nivel Academico</th>";
    echo "<th scope='col'>Horas x Semana</th>";
    echo "<th scope='col'>Costo S/.</th>";
    echo "<th scope='col'>Dirección</th>";
    echo "<th scope='col'>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($filas=mysqli_fetch_array($res))
    {
        $nombres = $filas['nombres'];
        $apellidos = $filas['apellidos'];
        $dni = $filas['dni'];
        $direccion = $filas['direccion'];

        $id_curso = $filas['id_curso'];
        $turno = $filas['turno'];
        $nombre_curso = $filas['nombre_curso'];
        $costo_curso = $filas['costo_curso'];
        $nombre_profesor = $filas['nombre_profesor'];
        $nivel = $filas['nivel'];
        $horas_x_semana = $filas['horas_x_semana'];
        echo " <tr>";
        echo "<th scope='row'>".$num."</th>";
        echo "<td>".$nombres."</td>";
        echo "<td>".$apellidos."</td>";
        echo "<td>".$dni."</td>";
        echo "<td>".$nombre_curso."</td>";
        echo "<td>".$turno."</td>";
        echo "<td>".$nombre_profesor."</td>";
        echo "<td>".$nivel."</td>";
        echo "<td>".$horas_x_semana."</td>";
        echo "<td>".$costo_curso."</td>";
        echo "<td>".$direccion."</td>";
        echo "<td><button id='doc".$num."' style='margin-right:10px;' class='btn btn-success' onclick='abrirFormulario_matri(".$num.")'>Editar</button><button id='doc".$num."' style='margin-right:10px;' class='btn btn-danger' onclick ='eliminar_matri(".$num.")'>Eliminar</a></button>";
        echo "</tr>";
        $num++;
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
?>
    <div style='display:flex;'>
        <button style='margin-left:60px;' onclick='recargar_page_matri()' type="button" class="btn btn-primary">Recargar Tabla</button>
        <button style='margin-left:10px;' class='btn btn-info' onclick='abrirFormulario_agregar_matri()'>+ Matricula</button>
    </div>

    <hr>
</body>
<script>
    function eliminar_matri(x){
        var id = x;
        let xhr = new XMLHttpRequest();
        console.log(id);
        xhr.open("POST", "../administracion_matriculas/eliminar_matri.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        location.reload();
    }

    function abrirFormulario_matri(x) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../administracion_matriculas/form_editar_matri.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + x);
        var ventana = window.open("../administracion_matriculas/form_editar_matri.php?x=" + x, "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }
    
    function abrirFormulario_agregar_matri() {
        let xhr = new XMLHttpRequest();
        var ventana = window.open("../administracion_matriculas/form_new_matri.php", "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }
    
    function recargar_page_matri(){
        location.reload();
    }





    function eliminar_cursos(x){
        var id = x;
        let xhr = new XMLHttpRequest();
        console.log(id);
        xhr.open("POST", "../administracion_cursos/eliminar_curso.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        location.reload();
    }

    function abrirFormulario_curso(x) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../administracion_cursos/form_editar_cursos.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + x);
        var ventana = window.open("../administracion_cursos/form_editar_cursos.php?x=" + x, "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }
    
    function abrirFormulario_agregar_curso() {
        let xhr = new XMLHttpRequest();
        var ventana = window.open("../administracion_cursos/form_new_curso.php", "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }
    
    function recargar_page_curso(){
        location.reload();
    }
    
    function eliminar_alumno(x){
        var id = x;
        let xhr = new XMLHttpRequest();
        console.log(id);
        xhr.open("POST", "eliminar_alumno.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        location.reload();
    }

    function abrirFormulario(x) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "formulario_editar_alumnos.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + x);
        var ventana = window.open("formulario_editar_alumnos.php?x=" + x, "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }   
    
    function abrirFormulario_agregar() {
        let xhr = new XMLHttpRequest();
        var ventana = window.open("formulario_news_alumnos.php", "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }
    
    function recargar_page(){
        location.reload();
    }
</script>
<style>

</style>
</html>
