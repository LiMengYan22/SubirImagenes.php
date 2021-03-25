<?php
# definir carpeta destino
$carpetaDestino="imagenes/";
$carpetaDestino=$_SERVER["DOCUMENT_ROOT"]."/php/fotos/";

# si hay algun archivo que subir
if($_FILES["archivo"]["name"][0])
{
  
# recorre todos los arhivos que se han subido
for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
{
  
# si es un formato de imagen
if($_FILES["archivo"]["type"][$i]=="image/jpeg" ||
$_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"]
[$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
{
  
# si exsite la carpeta o se ha creado
if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
{
$origen=$_FILES["archivo"]["tmp_name"][$i];
$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
  
# mover el archivo
if(@move_uploaded_file($origen, $destino))
{
 echo "<br>".$_FILES["archivo"]["name"][$i]." movidocorrecto";
}else{
 echo "<br>No se ha podido mover el archivo: ".
$_FILES["archivo"]["name"][$i];
}
}else{
 echo "<br>No se ha podido crear la carpeta: up/".$user;
}
}else{
 echo "<br>".$_FILES["archivo"]["name"][$i]." - NO es imagen jpg";
}
}
}else{
 echo "<br>No se ha subido ninguna imagen";
}
?>

<!-- El Formulario para el html: -->
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" name="inscripcion">
   <input type="file" name="archivo[]" multiple="multiple">
   <input type="submit" value="Enviar" class="trig">
</form>
