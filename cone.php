<?php
//Archivo de Coneccion a la Base de Datos de Expediente obras
//Archivo creado por Raúl Carrasco Dachs, para el aplicativo.
function Conecta()
{
   if (!($link=mysql_connect("","",""))) 
   //primero parametro corresponde al equipo que me estoy conectando
   //Segundo Parametro corresponde a la BD a trabajar
   //Tercer parametro corresponde a la clave. Se debe Cambiar clave.
   {
      exit();
   }
   if (!mysql_select_db("obras",$link))
   {
      exit();
   } 
   return $link;
}
$link=Conecta();
mysql_close($link);
?>

