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
            <tr class="titulo">
                <td>Código</td>
                <td>Nombre</td>
                <td>Salario</td>

            </tr>
            <?php
            $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
            $sql1 = "SELECT * FROM EMPLEADO";
            $resultado1 = pg_Exec($conexion,$sql1);
        
            while($row = pg_fetch_array ($resultado1)){
                ?>
                <tr>
                <td><?php echo $row["cod_empleado"]?></td>
                <td><?php echo $row["nom_empleado"]?></td>
                <td><?php echo $row["salario"]?></td>

            </tr>
        
            <?php
             }
            pg_close($conexion);
               
            
            ?>   
        </table>

<?php 
        
         class Conectar{
             function agregarEmpleados(){
            
                $pCodigo = $_POST["codigo"];
                $pNombre = $_POST["nombre"];
                $pSalario = $_POST["salario"];
                if(!is_numeric($pCodigo) || !is_numeric($pSalario)){
                    echo "<script>alert('Información Digitada Errónea');</script>";   
                }else{
                     $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
                    $verificar = "SELECT cod_empleado FROM EMPLEADO";
                    $resultado = pg_Exec($conexion,$verificar);           
                    $repetido=false;
                    while($codigos =pg_fetch_array ($resultado)){
                        if($codigos["cod_empleado"]==$pCodigo){ 
                            $repetido = true;
                        } 
                    }
                if($repetido==true){
                    echo "<script>alert('Ya existe ese código');</script>"; 
                }else{
                    $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
                    $sql = "INSERT INTO EMPLEADO VALUES ($pCodigo,'$pNombre',$pSalario)";
                    echo "<script>alert('Se ha agregado un nuevo empleado');</script>";
                    $resultado = pg_Exec($conexion,$sql);
                    pg_close($conexion);
            }
             }
         }
         }
?>
        
    </body>
</html>