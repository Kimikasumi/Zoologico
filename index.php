<html>
    <head>
        <title>Página Principal</title>
    </head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="estiloINDEX.css"/>

<body>
<button class="tablink" onclick="openPage('Home', this, '#e40713')" id="defaultOpen">Home</button>
<button class="tablink" onclick="openPage('Animales', this, 'royalblue')">Animales</button>
<button class="tablink" onclick="openPage('Familias', this, 'limegreen')">Especie</button>
<button class="tablink" onclick="openPage('Alimentos', this, 'orange')" >Alimentos</button>
<button class="tablink" onclick="openPage('Empleados', this, 'mediumpurple')">Empleados</button>

<div id="Home" class="tabcontent">
</div>

<div id="Animales" class="tabcontent">
  <h1>Animales</h1>
  <iframe src="Animal/formAnimal.php"  height="1200" width="100%" style=" scrolling=no" ></iframe>
</div>
    
<div id="Familias" class="tabcontent">
  <h1>Especie</h1>
  <iframe src="Familia/formFamilia.php"  height="1200" width="1200" style="border:none;    overflow:hidden;"></iframe>
</div>

<div id="Alimentos" class="tabcontent">
  <h1>Alimentos</h1>
  <iframe src="Alimento/formAlimento.php"  height="1200" width="1200" style="border:none;    overflow:hidden;"></iframe>
</div>
    
<div id="Empleados" class="tabcontent">
  <h1>Empleados</h1>
  <iframe src="Empleado/formEmpleado.php"  height="1200" width="1200" style="border:none;    overflow:hidden;"></iframe>
</div>

<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
    

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>



</html>
