<html>
    <head>
        <style>

        .tab td{
	       text-align:center;
	       border:1px solid #000000;
            padding: 8px;
	       width:300px;
            overflow-y:hidden;
	     }

           .tab tr:nth-child(even){background-color: #f2f2f2}

           .tab th {
                background-color: #4CAF50;
                color: white;
            }
            
            .titulo {font-weight: 900;}
        </style>
    
    
    </head>
    <body>
    
        <table class="tab" >
            <tr class = "titulo">
                <td>Nombre</td>
                <td>Familia</td>
                <td>Alimento</td>
                <td>Encargado</td>
            </tr>
            <?php
            $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
            $sql1 = "SELECT nom_animal, nom_familia, nom_alimento, nom_empleado FROM ANIMAL, FAMILIA, ALIMENTO, EMPLEADO
            where ANIMAL.cod_alimento = ALIMENTO.cod_alimento
            AND ANIMAL.cod_empleado = EMPLEADO.cod_empleado
            AND ANIMAL.cod_familia = FAMILIA.cod_familia
            ORDER BY cod_animal";

            $resultado1 = pg_Exec($conexion,$sql1);
        
            while($row = pg_fetch_array ($resultado1)){
                ?>
                <tr>
                <td><?php echo $row["nom_animal"]?></td>
                <td><?php echo $row["nom_familia"]?></td>
                <td><?php echo $row["nom_alimento"] ?></td>
                <td><?php echo $row["nom_empleado"] ?></td>
            </tr>
        
            <?php
             }
            pg_close($conexion);
               
            
            ?>
            
            
        </table>
    <?php
      
   
        class Conectar{
           
        function agregarAnimales(){
            
            $pCodigo = $_POST["codigo"];
            $pNombre = $_POST["nombre"];
            $pFamilia = $_POST["familia"];
            $pAlimentacion = $_POST["alimento"];
            $pEmpleado = $_POST["empleado"];
            
            if($pAlimentacion == 0 || $pFamilia == 0 || $pEmpleado == 0 || !is_numeric($pCodigo)){
                echo "<script>alert('Información Digitada Errónea');</script>";   
            }else{
                $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
                $verificar = "SELECT cod_animal FROM ANIMAL";
                $resultado = pg_Exec($conexion,$verificar);           
                $repetido=false;
                while($codigos =pg_fetch_array ($resultado)){
                    if($codigos["cod_animal"]==$pCodigo){ 
                        $repetido = true;
                    } 
                }
                if($repetido==true){
                    echo "<script>alert('Ya existe ese código');</script>"; 
                }else{
                    $sql = "INSERT INTO ANIMAL VALUES ($pCodigo,'$pNombre',$pFamilia,$pAlimentacion,$pEmpleado)";
                    $resultado = pg_Exec($conexion,$sql);
                     echo "<script>alert('Se ha agregado un nuevo animal');</script>";
                }
                pg_close($conexion);
            }
        }
          
    
        }
        ?>
    
    
    </body>



</html>        
