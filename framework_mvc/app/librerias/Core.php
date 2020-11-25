<?php

/*
Mapear la url ingresada en el navegador,
1-controlador
2-metodo
3-parametro
*/

//LA VARIABLE URL LA ESTAMOS OBTENIENDO DESDE EL ARCHIVO HTACCESS EN DONDE SI EXISTE UNA URL LA OBTENEMOS SINO ENVIAMOS POR DEFECTO LA DEL INDEX. 

class Core{
	protected $controladorActual='paginas';
	protected $metodoActual='index';
	protected $parametros=[];


//Contruyo la url mapeandola
	public function __construct(){
		
		//print_r($this->getUrl());
		$url = $this->getUrl(); //Se utiliza self para señalar la clase actual no instaciada
//Buscar en controladores si el controlador existe 
		if (file_exists('../app/controladores/'.ucwords($url[0]).'.php')) { 
			//si existe se setea  como controlador por defecto 
			$this->controladorActual = ucwords($url[0]); //ucwords Setea la primera letra de un string en mayuscula


			//unset indice
			unset ($url[0]);// Unset destruye una variable, para destruir el controlador actual.
		

		}
		require_once '../app/controladores/'.$this->controladorActual.'.php';
		$this->controladorActual= new $this->controladorActual;

//Chequear la segunda parte de la url , osea el metodo:

		if (isset($url[1])){//Validamos si hay un metodo seteado
			if(method_exists($this->controladorActual,$url[1])){//Validamos si el metodo existe con 
			

				$this->metodoActual = $url[1];



				unset ($url[1]);
			}	
		}

		// prueba para traer el metodo ----> echo $this->metodoActual;
//Obtener la tercera parte de la url osea los parametros

		$this->parametros = $url ? array_values($url) : []; //if de si el, si el array url posee elementos los enlista con array_values sino devuelve le pasamos un mismo array vacio

		//Llamar callback con parametros array	

		call_user_func_array([$this->controladorActual, $this->metodoActual],$this->parametros); //Llama a una funcion y le pasa unos parametros devuelve lo que de la funcion o falso, call_user_func_array debe recibir 2 parametros array para poder call.
	}

//Obtengo la URL desde el navegador 
	
	public function getUrl(){
		//echo $_GET['url'];
//Obtengo la url y la manipulamos para dejarla en el formato que deseamos: controlador,metodo,parametro
		
		if(isset ($_GET['url'])){

			$url = rtrim($_GET['url'],'/'); //Quitamos los espacios de la url entre los '/'
			$url = filter_var($url,FILTER_SANITIZE_URL); //Metodo para filtrar la url donde se pasa el la variable a filtrar y el tipo de filtro.
			$url= explode ('/',$url); //Divide un string en varios y los delimita con el parametro enviado.

			return $url;
		}

	}






}





?>