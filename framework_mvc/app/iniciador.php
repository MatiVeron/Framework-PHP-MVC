<?php
//cargando librerias


require_once 'config/Configurar.php';


//Autoload de las clases para evitar el acumulamiento de carga de archivos con require_once


//----> Registrar las funciones dadas como implementación de __autoload() Dicha función debe estar explícitamente registrada en la cola de __autoload.
spl_autoload_register(function($nombre_clase){

	require_once 'librerias/'.$nombre_clase.'.php';


});

//require_once 'librerias/Base.php';

//require_once 'librerias/Controlador.php';
//require_once 'librerias/Core.php';






?>