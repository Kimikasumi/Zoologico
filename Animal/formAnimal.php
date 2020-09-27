<html>
    <head>
        <title>Actividad</title>
            <link rel="stylesheet" type="text/css" href="../css/estiloFormulario.css"/>
        
        <script type="text/javascript">
function validar(e) {
 if (e.target.value.trim() == "")
  alert("Ingrese un valor en el campo");
}
 function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
    </head>
    <body style="scrollbar=no">
        <div class = "primero" style="scrollbar=no">       
        <form action="formAnimal.php" method="POST" class="reg" >
            <h1>Registro</h1>
            <table >
                <tr>
                        <td><label>Código:</label></td>
                        <td><input type="text" name="codigo" required></td>
                </tr>
                <tr>
                        <td><label>Nombre:</label></td>
                        <td><input type="text" name="nombre" required onchange="validar(event)" onkeypress="return check(event)" ></td>            
                </tr>
                <tr>
                        <td><label>Familia:</label></td>
                        <td>
                            <select name="familia"  id="soflow-color">
                                <option value="0">Seleccione:</option>
                                <?php
                                $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
                                $sql = "SELECT * FROM FAMILIA";
                                $resultado = pg_Exec($conexion,$sql);
                                while($row = pg_fetch_array ($resultado)){
                                echo '<option value="'.$row["cod_familia"].'">'.$row["nom_familia"].'</option>';
                                }
                                ?>
                                </select>
                        </td>            
                </tr>
                <tr>
                        <td><label>Alimento:</label></td>
                        <td><select name="alimento" id="soflow-color">
                                <option value="0">Seleccione:</option>
                                <?php
                                $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
                                $sql = "SELECT * FROM ALIMENTO";
                                $resultado = pg_Exec($conexion,$sql);
                                while($row = pg_fetch_array ($resultado)){
                                echo '<option value="'.$row["cod_alimento"].'">'.$row["nom_alimento"].'</option>';
                                }
                                ?>
                            </select></td>            
                </tr>
                <tr>
                        <td><label>Empleado:</label></td>
                        <td><select name="empleado" id="soflow-color">
                                <option value="0">Seleccione:</option>
                                <?php
                                    $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
                                    $sql = "SELECT * FROM EMPLEADO";
                                    $resultado = pg_Exec($conexion,$sql);
                                    while($row = pg_fetch_array ($resultado)){
                                    echo '<option value="'.$row["cod_empleado"].'">'.$row["nom_empleado"].'</option>';
                                    }
                                ?>
                            </select></td>            
                </tr>
            </table >
        
        <input type="submit"  name="registrar"  value="Registrar">
        </form >
            </div>

 
<div class = "segundo">
        <form action="formAnimal.php" method="POST"  >
             <input type="submit"  name="listar"  value="Listado De Animales">
           <?php
        if(isset($_POST['registrar']) ){
      
                include ("agregarAnimal.php");
                 $cBD = new Conectar();
                 $cBD->agregarAnimales();
             
            
    
        }elseif(isset($_POST['listar'])){
            
            include ("agregarAnimal.php");
 
            
        }


    ?>

            </form>
        </div>
         
    
    </body>

</html>

