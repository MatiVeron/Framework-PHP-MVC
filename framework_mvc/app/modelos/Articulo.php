<?php 

	
	class Articulo{

		private $db;
		
		function __construct(){
			

			$this->db = new Base;
		}


		public function obtener_articulos(){
			$this->db->query("SELECT * FROM articulos");

			return $this->db->registros();
		}




	}





 ?>