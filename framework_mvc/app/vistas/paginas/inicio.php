<?php require_once RUTA_APP.'/vistas/inc/header.php'; ?>
<p><?php echo $datos["titulo"];?></p>

<ul>
	<?php foreach ($datos["articulos"] as0 $articulo) {?>
		<li> <?php echo $articulo->titulo; ?></li>





	<?php } ?>




</ul> <!--.CODIGO DE PRUEBA DE LA VISTA ARTICULOS.-->




<?php require_once RUTA_APP.'/vistas/inc/footer.php'; ?>

