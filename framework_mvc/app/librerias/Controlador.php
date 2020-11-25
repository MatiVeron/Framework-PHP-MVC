<?php

//Clase controlador principal
//Se encargara de poder cargar los modelos y las vistas
	class Controlador{
		//Cargar modelo

		public function modelo($modelo){

			//carga del modelo

			require_once '../app/modelos/'.$modelo.'.php';

			//instanciar el modelo

			return new $modelo();

		}



		public function vista($vista, $datos = []){ // tambien podemos pasarle parametros a la vista en forma de array, si le pasamos parametros simplemente cargara un array vacio.

			//chequear el archivo vista existas
			if(file_exists('../app/vistas/'.$vista.'.php')){
				require_once '../app/vistas/'.$vista.'.php';
			}else {
				//Si el archivo de la vista no existe

				die('La vista no existe');
			}


		}

}




?>