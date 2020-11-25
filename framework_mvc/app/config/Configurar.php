<?php
//Configuracion de acceso a la BD

define('DB_HOST', 'localhost');
define('DB_USUARIO', '_USUARIO');
define('DB_PASSWORD','_PASSWORD');
define('DB_NOMBRE', '_NOMBRE_BASE');



//Ruta de la app

//echo __FILE__;---> muestra la ruta exacta del archivo

//echo  dirname (dirname(__FILE__)); ---> Vuelve una carpeta hacia atras

define ('RUTA_APP',dirname(dirname(__FILE__)));// RUTA DE LA APP Y SUS CARPETA RAIZ

//Ruta de la URL Ejemplo : http://localhost/framework_mvc

define('RUTA_URL', '_RUTA_');

define('NOMBRESITIO', '_NOMBRE_SITIO');

?>