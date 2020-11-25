<?php

	class Paginas extends Controlador{

		public function __construct(){
			$this->articuloModelo = $this->modelo('Articulo');

			//echo 'holis perro';
		}

		

		public function index(){


			$articulos = $this->articuloModelo->obtener_articulos();

			$datos = array(
				"titulo"=>"Bienvenidos a mi primer framework",
				"articulos"=>$articulos
			);
			
			$this->vista('paginas/inicio',$datos);


		}

	



		public function actualizar($num_registro){

			echo $num_registro;

		}


	}





?>