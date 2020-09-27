<html>
    <body>
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
        <table class="tab" >
            <tr class="titulo">
                <td>Código</td>
                <td>Nombre</td>

            </tr>
            <?php
            $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
            $sql1 = "SELECT * FROM FAMILIA";
            $resultado1 = pg_Exec($conexion,$sql1);
        
            while($row = pg_fetch_array ($resultado1)){
                ?>
                <tr>
                <td><?php echo $row["cod_familia"]?></td>
                <td><?php echo $row["nom_familia"]?></td>
            </tr>
        
            <?php
             }
            pg_close($conexion);
               
            
            ?>   
        </table>
<?php 
        
         class Conectar{
             function agregarFamilias(){
            
                $pCodigo = $_POST["codigo"];
                $pNombre = $_POST["nombre"];
                if(!is_numeric($pCodigo)){
                    echo "<script>alert('Información Digitada Errónea');</script>";   
                }else{
                    $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
                    $verificar = "SELECT cod_familia FROM FAMILIA";
                    $resultado = pg_Exec($conexion,$verificar);           
                    $repetido=false;
                    while($codigos =pg_fetch_array ($resultado)){
                        if($codigos["cod_familia"]==$pCodigo){ 
                            $repetido = true;
                        } 
                    }
                if($repetido==true){
                    echo "<script>alert('Ya existe ese código');</script>"; 
                }else{
                    $conexion = pg_connect("host=localhost port=5432 dbname =Zoologico user=postgres password=1234");
                    $sql = "INSERT INTO FAMILIA VALUES ($pCodigo,'$pNombre')";
                    echo "<script>alert('Se ha agregado un nuevo tipo');</script>";
                    $resultado = pg_Exec($conexion,$sql);
                    }
                    pg_close($conexion);
                }
         }
         }
         
?>
        
    </body>
</html>