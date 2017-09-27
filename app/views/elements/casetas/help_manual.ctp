<style>
/*	header{
	margin:50px 0 20px;
	text-align:center;
	padding:0 10px;
	}

	header h1{
	font-weight:bold;
	margin-bottom:12px;
	font-size:28px;
	margin-top:30px;
	}

	.content{
	max-width:500px;
	margin:0 auto;
	}

	.content h2{
	font-size:18px;
	font-weight:bold;
	margin:40px 0 30px;
	}

	.content figure{
	text-align:center;
	margin:20px 0;
	}

	.content figcaption{
	font-size:12px;
	padding-top:10px;
	}

	.content div.dropdown{
	margin:20px auto;
	width:100px;
	}

	.content blockquote p{
	font-size:14px;
	}*/

	.help_manual {
		position: fixed;
		bottom: 15px;
/* 		top:13%; */
		right: 5%;
		cursor: pointer;
		z-index:150;
		color:#ccc;
	}

	 figure {
		display: block;
		text-align: center;
	}


</style>

<!--Conceptos NO conciliados
1.- Tarjeta IAVE no registrada en LIS (I-D)
2.-Tarjeta IAVE no actualizada en LIS ya no
3.-Fecha de Cruce no encontrada en LIS (I-D)
6-Cruce de vehículos Utilitarios (I-D)

4.-Fecha de Cruce diferentes en i+d  (LIS)
5.-Importe de cruces diferentes a LIS (LIS)
7.-cruces no encontrados en lis (I-D)
8.-cruces no encontrados en I+D (LIS)-->
    <div class="container" id="inline_manual" style="display:none;">

        <header class="text-center">
        <?php e($this->Html->image('gst/help_manual/gst.png'),array('alt' => 'Manual'))?>
<!--         <img src="assets/img/logo.svg"> -->
            <h1>Manual de Usuario</h1>
            <p class="lead text-center text-muted text-uppercase">m&oacute;dulo conciliador de casetas</p>
        </header>
        <hr>
        <p class="text-center text-info">Esta guia rapida explica el uso del m&oacute;dulo conciliador de casetas. </p>
        <hr>

        <section class="content">
            <h2 class="text-uppercase text-center">1. Acceso al portal</h2>

            <p class="text-left">La dirección <strong>url</strong> de la aplicación es la siguiente:
				<span class="text-success"><strong>http://192.168.20.100/kml/users/login</strong></span>
				Donde el portal solicitara el usuario y contraseña
		</p>
			<figure>
				<?php e($this->Html->image('gst/help_manual/1Credenciales.jpg'),array('alt' => 'Manual','class'=>'img-thumbnail'))?>
				<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
			</figure>

            <p class="text-left">
			Una vez que registramos número de trabajador y contraseña se da un clic en <strong>ingresar</strong>.
		</p>
			<figure>
				<?php e($this->Html->image('gst/help_manual/2-Usuario.jpg'),array('alt' => 'Manual','class'=>'img-thumbnail'))?>
				<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
			</figure>

		<p class="text-left">
			Una vez dentro del portal en la parte superior derecha se encuentra el agrupador de menús &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp; asignados al usuario
			donde se encuentra el acceso al <strong>m&oacute;dulo conciliador de casetas</strong>.
		</p>

        </section>

        <section class="content">
            <h2 class="text-uppercase text-center">2. Importar archivo de I+D</h2>

		<p class="text-left">
			El enlace para acceder al m&oacute;dulo de importaci&oacute;n de archivo se encuentra
			en la siguiente ruta: <br />
			<i class="fa fa-truck" aria-hidden="true"></i>
			casetas / <i class="fa fa-upload" aria-hidden="true"></i>
			Importar Archivo:
		</p>

			<figure>
				<?php e($this->Html->image('gst/help_manual/3-Menu.jpg'),array('alt' => 'Manual','class'=>'img-thumbnail'))?>
				<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
			</figure>

            <p class="text-left">Dentro del menú <strong>Importar Archivo</strong> nos permitirá subir la información de creces al sistema conciliador mostrando la siguiente pantalla:.
            </p>

			<figure>
				<?php e($this->Html->image('gst/help_manual/4-Upload.jpg'),array('alt' => 'Manual','class'=>'img-thumbnail'))?>
				<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
			</figure>

		<blockquote>
			<p class="text-left"><strong>Nota:</strong> La unidad de negocio dependerá del área a la que pertenece el trabajador.</p>
            </blockquote>


            <p class="text-left">Damos clic en el botón <strong>Seleccionar archivo</strong> se abrirá una pantalla que usaremos para buscar el archivo Descargado del portal de I+D.
            </p>
			<figure>
				<?php e($this->Html->image('gst/help_manual/5-Archivo.jpg'),array('alt' => 'Manual','class'=>'img-thumbnail'))?>
				<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
			</figure>
		<blockquote>
			<p>
				<strong>Nota:</strong> La carpeta especifica así como su estructura es definida en el protocolo de conciliación.
			</p>
		</blockquote>

            <p class="text-left">
			Al tener el archivo seleccionado y se da clic al botón <strong>enviar</strong>  para importar la información de los cruces.
            </p>

            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/6-Enviar.jpg'),array('alt' => 'Manual','class'=>'img-thumbnail'))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

            <p class="text-left">
			Si el archivo se subió correctamente mostrara la siguiente leyenda:
            </p>

            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/7-Mensaje1.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

            <blockquote>
			<p class="text-left">
				<strong>Nota:</strong> se puede llegar al módulo de conciliación de casetas dando clic sobre la liga <strong><span class="bg-success">Módulo de conciliación de casetas</span></strong>.
			</p>
            </blockquote>

            <p class="text-left">
			Si el archivo que se pretende subir ya existe . se mostrara el siguiente mensaje indicando que el archivo ya a sido importado anteriormente
		</p>

            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/7-Mensaje2.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

            <p class="text-left">
			En el menú de <i class="fa fa-truck" aria-hidden="true"></i> Casetas >  / <i class="fa fa-list-alt" aria-hidden="true"></i> Inicio
            </p>

			<figure>
				<?php e($this->Html->image('gst/help_manual/3-Menu.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
				<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
			</figure>

            <p class="text-left">
			En la pantalla principal se mostraran los archivos que se hayan importado correctamente, mostrando su estatus: conciliado y por conciliar .
		</p>

<!--            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Dropdown <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li role="presentation"><a href="#">Conciliado</a></li>
                    <li role="presentation"><a href="#">Por Conciliar</a></li>
                </ul>
            </div>-->

            <p class="text-left">
			<strong>Conciliado :</strong>
		</p>

            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/8-conciliado.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

            <p class="text-left">
			<strong>Por Conciliar :</strong>
		</p>

            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/9-noconciliado.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

        </section>

        <section class="content">
            <h2 class="text-uppercase text-center">3. Conciliaci&oacute;n</h2>

            <p class="text-left">
			Para poder conciliar un archivo decenal de I+D
			Previamente se tuvo que hecho la importación (punto 2)
			Posteriormente en el menú principal se filtra por <strong>no conciliado.</strong>
            </p>

            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/10-conciliar.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

            <p class="text-left">
			Al terminar el proceso mostrara el siguiente mensaje:
            </p>

            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/11-Mensaje_conciliado.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

            <p class="text-left">
			Y se habilitara como una opci&oacute;n, el Res&uacute;men de Conciliaci&oacute;n
            </p>


            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/12-resumen_conciliado.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>


            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/12-1_Resumen_conciliacion.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

        </section>



        <section class="content">
            <h2 class="text-uppercase text-center">4. Detalle de la Conciliaci&oacute;n</h2>

            <p class="text-left">
			Siguiendo la Liga <strong>Conciliado</strong> en el Res&uacute;men de la conciliación el m&oacute;dulo mostrar&aacute; todos los cruces conciliados
            </p>
            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/13-Reporte_conciliado_detalle.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

<!--            <blockquote>
                <p><strong>Tip:</strong> You can drag from the <strong>Stage</strong> and drop components on the <strong>Overview</strong> panel for greater precision. </p>
            </blockquote>-->
        </section>


            <p class="text-left">
			Siguiendo la Liga <strong>No Conciliado</strong> en el Res&uacute;men de la conciliación el m&oacute;dulo mostrar&aacute; todos los cruces no conciliados.
            </p>
            <figure>
<!--             <img class="img-thumbnail" src="assets/img/text options.png"> -->
			<?php e($this->Html->image('gst/help_manual/14-Reporte_no_conciliado_detalle.jpg',array('alt' => 'Manual','class'=>'img-thumbnail')))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>

<!--            <figure>
			<?php e($this->Html->image('gst/help_manual/x-menu_busqueda.jpg',array('alt' => 'Manual','class'=>'img-thumbnail','height'=>"42", 'width'=>"42")))?>
			<figcaption>The <strong>Options</strong> panel displaying settings for the paragraph.</figcaption>
            </figure>-->



<!--        <section class="content">
            <h2 class="text-uppercase text-center">4. Drag and Drop</h2>

            <p class="text-left">Some elements like the <strong>HTML</strong> and <strong>Body</strong>
			are locked and can't be moved (you can recognize them by the small padlock in the <strong>Overview</strong> panel). This is done so that you don't break the page by mistake.
            </p>
            <figure>-->
			<?php //e($this->Html->image('gst/help_manual/overview pane locked.png'),array('alt' => 'Manual','class'=>'img-thumbnail'))?>

<!--		</figure>

            <blockquote>
                <p><strong>Tip:</strong> You can drag from the <strong>Stage</strong> and drop components on the <strong>Overview</strong> panel for greater precision. </p>
            </blockquote>
        </section>-->

        <hr>

    </div>


    	<span id="help_casetas">
		<a class="help_manual" href="#inline_manual"><i class="fa fa-question-circle fa-3x" aria-hidden="true"></i>&nbsp;</a>
	</span>

<script>
		$(document).ready(function () {
			/**HELP MANUAL*/
			// $(".help_manual").fancybox({
			// 	maxWidth	: 1200,
			// 	maxHeight	: 680,
			// 	fitToView	: false,
			// 	width		: '75%',
			// 	height	: '75%',
			// 	autoSize	: false,
			// 	closeClick	: false,
			// 	openEffect	: 'fade',
			// 	closeEffect	: 'fade'
			// });
		});
</script>
