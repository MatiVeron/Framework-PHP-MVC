<?php 
//Clase para conectar a la BD y ejecutar consultas en PDO


	class Base{

		private $host = DB_HOST;
		private $usuario = DB_USUARIO;
		private $pass = DB_PASSWORD;
		private $nombre_base= DB_NOMBRE;


		private $dbh; 			//data base handler
		private $stmt;
		private $error;


		public function __construct(){


			//configurar la conexion

			$dsn='mysql:host='.$this->host.';dbname='.$this->nombre_base;

			$opciones = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);	



				//CREAR UNA INSTANCIA DE PDO

				try {
					$this->dbh = new PDO($dsn,$this->usuario,$this->pass,$opciones);

					$this->dbh->exec('set names utf8'); //Configuracion para caracteres especiales en latinoamerica

					
				} catch (PDOException $e) {
					

					$this->error= $e->getMessage();// Obtener errores de concexion

					echo $this->error;

				}}





				//Preparo la consulta
				public function query($sql){
					$this->stmt=$this->dbh->prepare($sql);

				}

				//Vinculamos la consulta con bind

				public function bind($parametro,$valor,$tipo=null){
					if (is_null($tipo)) {
						switch (true) {
							case is_int($valor):
								$tipo =PDO::PARAM_INT;
								
							break;
							case is_bool($valor):
								$tipo= PDO::PARAM_BOOL;
							break;
							case is_null($valor):
								$tipo= PDO::PARAM_NULL;
										
							break;		
							
							default:
								$tipo= PDO::PARAM_STR;
							break;
						}

					$this->stmt->bidnValue($paramtero,$valor,$tipo);
						
					}
				}


				//Ejecuta la cosulta 
				public function execute(){
						return $this->stmt->execute();


				} 			


				//Obtener los registros
				public function registros(){
					$this->execute();
					return $this->stmt->fetchAll(PDO::FETCH_OBJ);
				}

				//Obtener un solo registros
				public function registro(){
					$this->execute();
					return $this->stmt->fetch(PDO::FETCH_OBJ);
				}

				//Obtener cantidad de registros con rowCount
				public function rowCount(){
					return $this->stmt->rowCount();
				}


		}



	




 ?>