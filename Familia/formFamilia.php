<html>
    <head>
        <title>Formulario Familias</title>
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
    
    <body>
    <div class = "regFa" style="scrollbar=no">    
        <h1>Registro</h1>
        <form action="formFamilia.php" method="POST">
        <table>
            <tr>
                <td><label>Código:</label></td>
                <td><input type="text" name="codigo" required></td>
            </tr>
            <tr>
                <td><label>Nombre:</label></td>
                <td><input type="text" name="nombre" required onchange="validar(event)" onkeypress="return check(event)" ></td>            
            </tr>
        </table>
        
        <input type="submit"  name="registrar"  value="Registrar">
        
            </form>
        </div>
     
        
        <div class = "listFa">
        <form action="formFamilia.php" method="POST" >
            <input type="submit"  name="listar"  value="Listar Especies">
            
           <?php
        if(isset($_POST['registrar']) ){
      
                include ("agregarFamilia.php");
                 $cBD = new Conectar();
                 $cBD->agregarFamilias();
             
            
    
        }elseif(isset($_POST['listar'])){
            
            include ("agregarFamilia.php");
 
            
        }


    ?>

            </form>
        </div>
         
    
    
    </body>


</html>

