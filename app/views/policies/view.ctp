<?php
	// policies
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
	// load pdf
	e($this->element('policies/load'));
?>

<!--<style>
@media print {
  html, body {
    display: none!important; /* hide whole page */
  }
}
</style>-->

<!-- <div id="show"><?php //e(date('Y-m-d H:m:s'));?></div> -->
<!--<script language="JavaScript" type="text/javascript">
		x = window.innerWidth;
		document.getElementById("show").innerHTML = x;
</script>-->

<?php //debug($anexos);?>

<script language="JavaScript" type="text/javascript">

	function pdf_size(type) {

		if (type == '2') { /*means landscape*/

			if (window.innerWidth < 400) {
				return 0.3;
			} else if (window.innerWidth < 1400) {
				return 0.95;
			} else {
				return 1.125;
			}
		} else {

			if ( window.innerWidth < 400 ) {
				return 0.4;
			} else if ( window.innerWidth < 640 ) {
				return 0.6;
			} else if ( window.innerWidth < 800 ) {
				return 0.8;
			} else if ( window.innerWidth < 1024 ) {
				return 1.0;
			} else if ( window.innerWidth < 1280 ) {
				return 1.2;
			} else if ( window.innerWidth < 2048 ) {
				return 1.4;
			} else {
				return 2.0;
			}
		}

	} // end funciton

</script>


<style>
/* Copyright 2013 Rob Wu <gwnRob@gmail.com>
 * https://github.com/Rob--W/grab-to-pan.js
 *
 * grab.cur and grabbing.cur are taken from Firefox's repository.
 **/
.grab-to-pan-grab {
    cursor: url("grab.cur"), move !important;
    cursor: -webkit-grab !important;
    cursor: -moz-grab !important;
    cursor: grab !important;
}
.grab-to-pan-grab *:not(input):not(textarea):not(button):not(select):not(:link) {
    cursor: inherit !important;
}
.grab-to-pan-grab:active,
.grab-to-pan-grabbing {
    cursor: url("grabbing.cur"), move !important;
    cursor: -webkit-grabbing !important;
    cursor: -moz-grabbing !important;
    cursor: grabbing !important;
}
</style>

<style>
.scrollable{
    overflow: hidden;
    width: 100%;
    height: 100%;
		/*min-height: 320;*/
		/*min-width: 640;*/
    max-width: 1440px;
    /*max-width: auto;*/
    /*max-height: 800px;*/
    max-height: 130vh;
}
</style>
<!--<br />
Width: <span id="width"></span><br />
Height <span id="height"></span>
<br />-->


<?php

		$anx = $this->Html->url('/files/anexos/', true);
		$app = basename(ROOT);
		$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/";
// 		var_dump($type);
// 		var_dump($anexos);
// 		var_dump($anexos_type);
//
// // 		$directory = '../webroot/files/policies'.DS;
// 		$directory = WWW_ROOT.'files'.DS.'policies'.DS;
// // 		var_dump($directory);
//
// 		$scanned_directory = array_diff(scandir($directory), array('..', '.'));
// 		// pr($scanned_directory);
// 		$dir_paths = array_values($scanned_directory);
//
// 		pr($dir_paths);

// 			foreach($dir_paths as $id_dir => $dir) {
// 				$files[$id_dir] = base64_encode($path.$dir);
// 			}
// 		// pr($dir_paths);
// 		pr($files);
		// echo $html->link('pdf', '/files/policies');

		// e("\n");

		// echo WWW_ROOT . DS . 'files' . DS;

		// echo $this->Html->url('/app/webroot/files/policies', true);
		// echo $this->Html->url('/files/policies', true);
// 		pr($files);
// 		pr($first_key);
?>

		<style>
/* 		Navigation buttons section */
		/* 		this link is fixed againts the lenght of the content */

			.minuslink , .pluslink , .resetlink ,.fslink{
				padding-top:9px;
				padding-bottom:9px;
			}

			.fslink {
				position: fixed;
				bottom: 15px;
				left: 21%;
				cursor: pointer;
				z-index:150;
			}

			.nextlink {
				position: fixed;
				bottom: 15px;
				right: 25%;
				cursor: pointer;
				z-index:150;
			}

			.minuslink {
				position: fixed;
				bottom: 15px;
				left: 12%;
				cursor: pointer;
				z-index:150;
			}

			.pluslink {
				position: fixed;
				bottom: 15px;
				left: 18%;
				cursor: pointer;
				z-index:150;
			}

			.handlink {
				position: fixed;
				bottom: 15px;
				right: 30%;
				cursor: pointer;
				z-index:150;
			}

		/* 		this link is fixed againts the lenght of the content */
			.backlink {
				position: fixed;
				bottom: 15px;
				left: 5%;
				cursor: pointer;
				z-index:150;
			}

			.resetlink{
				position: fixed;
				bottom: 15px;
				left: 15%;
				cursor: pointer;
				z-index:150;
			}

			.pager{
				position: fixed;
				bottom: 0.5%;
				left: 40%;
				cursor: pointer;
				z-index:150;
			}

			.hand{
				position: fixed;
				bottom: 3%;
				left: 24%;
				cursor: pointer;
				z-index:150;
			}

			.footer_legend{
/* 				display:none; */
				position: fixed;
				bottom: 3%;
				right: 5%;
				cursor: pointer;
				z-index:100;
			}
		</style>

  <style>
/*body { background: #333; height: 2000px }*/
/* Anexos section */

	ul {
		list-style-type: none;
	}

	.social {
/* 	width: 90px; */
	left:0.5%;
/* 	height: 180px; */
	position: fixed;
	margin-top: 1%;
	z-index:120;
	perspective: 1000px

	}

	.social li a {
	display: block;
	height: 40px;
	width: 40px;
	background: #222;
	border-bottom: 1px solid #333;
	font: normal normal normal
	16px/20px
	'FontAwesome', 'Source Sans Pro', Helvetica, Arial, sans-serif;
	color: #fff;
	-webkit-font-smoothing: antialiased;
	padding: 10px;
	text-decoration: none;
	text-align: center;
	transition: background .5s ease .300ms
	}

	.social li a:hover { background: #00acee }
/*	.social li:first-child a:hover { background: #3b5998 }
	.social li:nth-child(2) a:hover { background: #00acee }
	.social li:nth-child(3) a:hover { background: #ea4c89 }
	.social li:nth-child(4) a:hover { background: #dd4b39 }*/

	.social li:first-child a { border-radius: 0 5px 0 0 }
	.social li:last-child a { border-radius: 0 0 5px 0 }

	.social li a span {
	/*width: 400px;*/ /* lenght of the hover title*/
	width: 400px;
	float: left;
	/*float: right;*/ /*change the orientation of the hover title*/
	text-align: center;
	background: #222;
	color: #fff;
	margin: -25px 74px;
	padding: 8px;
	transform-origin: 0;
	visibility: hidden;
	opacity: 0;
	transform: rotateY(45deg);
	border-radius: 5px;
	transition: all .5s ease .300ms
	}

	.social li span:after {
	content: '';
	display: block;
	width: 0;
	height: 0;
	position: absolute;
/* 	right: -20px; */
/*	left: -20px;
	top: 7px;*/

	left: -5%;
	top: 7px;

/* 	border-right: 10px solid transparent; */
/* 	border-left: 10px solid #222; */
	border-left: 10px solid transparent;
	border-right: 10px solid #222;
	border-bottom: 10px solid transparent;
	border-top: 10px solid transparent;
	}

	.social li a:hover span {
	visibility: visible;
	opacity: 1;
	transform: rotateY(0)
	}

  </style>




  <!-- In production, only one script (pdf.js) is necessary -->
  <!-- In production, change the content of PDFJS.workerSrc below -->
<script language=JavaScript>

// 		function p2g(checkboxId,scrollId){
// 			document.getElementById(checkboxId).onchange = function() {
// 				if (this.checked) {
// 					g2p.activate();
// 				} else {
// 					g2p.deactivate();
// 				}
// 			};
//
// 			var scrollableContainer = document.getElementById(scrollId);
// 			var g2p = new GrabToPan({
// 				element: scrollableContainer,         // required
// 				onActiveChanged: function(isActive) { // optional
// 					if (window.console) { // IE doesn't define console unless the devtools are open
// 						console.log('Grab-to-pan is ' + (isActive ? 'activated' : 'deactivated'));
// 					}
// 				}
// 			});
// 			g2p.activate();
// 		}

//  <!--
//Disable right mouse click Script
//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
//For full source code, visit http://www.dynamicdrive.com
var message="No se Autoriza la Impresion de este Documento";

///////////////////////////////////
	function clickIE4(){
		if (event.button==2){
		alert(message);
		return false;
		}
	}

	function clickNS4(e){
		if (document.layers||document.getElementById&&!document.all){
			if (e.which==2||e.which==3){
			alert(message);
			return false;
			}
		}
	}

	if (document.layers){
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown=clickNS4;
	}else if (document.all&&!document.getElementById){
	document.onmousedown=clickIE4;
	}
	document.oncontextmenu=new Function("alert(message);return false")
//  -->
</script>

<script>
//     PDFJS.workerSrc = '../js/pdf.js/src/worker_loader.js';
    PDFJS.workerSrc = '<?php e($this->Html->url('/js/pdf.js/src/worker_loader.js', true));?>';
	'use strict';
</script>


<?php
	if (is_int(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident')) === false) {
		$classAnexos = 'social';
		$classAnexosList = null;
		$classAnexosicon = null;
		$classAnexosiconLink = 'class="fa fa-file-excel-o"';
	} else  {
		$classAnexos = 'list-group list-group-horizontal';
		$classAnexosList = ' class="list-group-item" ';
		$classAnexosicon ='<i class="fa fa-file-excel-o"></i>';
		$classAnexosiconLink = null;
	}
?>


<div id="dashboard-header" class="row">
	<div class="col-xs-12 col-sm-4 col-md-3">
<!-- 		<ol class="breadcrumb"> -->
<!-- 			<li><a href="#">Home</a></li> -->
<!-- 			<li><a href="#">Library</a></li> -->
<!-- 			<li class="active">Data</li> -->
			<?php echo $this->element('policies/search_policie');?>
<!-- 		</ol> -->
<!-- 		<h4>Documento / <?php e(ucfirst($type));?></h4> -->
	</div>
</div>

<div class="row-fluid hidden-print">
<!-- <div class="row"> -->
	<div id="dashboard_links" class="col-xs-6 col-sm-2 pull-right">
			<ul id="tabbed" class="nav nav-pills nav-stacked">
				<?php if(isset($files)) {?>
				<?php foreach ($files as $id => $filename) {?>
					<?php $nameDecodeNav = str_replace('.pdf','',basename(base64_decode($filename)));?>
					<?php if($id === $first_key) {?>
					<li role="presentation" class="active">
					<?php } else {?>
					<li role="presentation">
					<?php }?>
						<a href="#<?php e($nameDecodeNav);?>" id="<?php e($nameDecodeNav);?>-tab" data-toggle="tab">
							<?php e($filenames[$id]);?>
						</a>
					</li>
				<?php } ?>
				<?php } ?>
			</ul>
	</div>

	<div id="dashboard_tabs" class="col-xs-6 col-sm-10">
		<div id="tabbedContent" class='tab-content'>
		<?php if(isset($files)) {?>
		<?php foreach ($files as $id_file => $file_name) {?>
			<?php $nameDecodeContent = str_replace('.pdf','',basename(base64_decode($file_name)));?>
			<?php if($id_file === $first_key) {?>
			<div class="tab-pane fade in active" id="<?php e($nameDecodeContent);?>">
			<?php } else {?>
			<div class="tab-pane fade" id="<?php e($nameDecodeContent);?>">
			<?php }?>

				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->element('policies/gst_aviso'); ?>
				</div>

				<div id="menu_anexos">
					<?php if(isset($anexos)) {?>
						<ul class="<?php e($classAnexos);?>">
							<?php foreach ($anexos as $id_anexo => $anexo_path) {?>
								<?php if($id_file === $id_anexo) {?>
									<?php foreach ($anexo_path as $id_path => $_path) {?>
										<li <?php e($classAnexosList);?>>
											<?php e($classAnexosicon);?>
											<?php if ( $anexos_type[$id_path] === '1' ) {?>
											<a <?php e($classAnexosiconLink);?> target="_blank" href="<?php e($anx.$_path);?>" download>
											<?php } else {?>
												<a <?php e($classAnexosiconLink);?> target="_blank" href="<?php e($path.$_path);?>" >
											<?php }?>
												<span><?php e($anexos_names[$id_path]);?></span>
											</a>
										</li>
									<?php }?>
								<?php }?>
							<?php }?>
						</ul>
					<?php }?>
				</div>


					<div class="hand"><input type="checkbox" id="activate_g2p_<?php e($nameDecodeContent);?>" checked><i class="fa fa-hand-rock-o"></i></div>

					<a class="fslink btn btn-success" href="javascript:" id="listen_fs_<?php e($nameDecodeContent);?>" >
						<i class="fa fa-arrows-alt"></i>
					</a>
					<div class="modal-body" id="activate_fs_<?php e($nameDecodeContent);?>">

									<div class="scrollable" id="scrollable_container_<?php e($nameDecodeContent);?>" style="text-align:center;">
										<canvas id="canvas_<?php e($nameDecodeContent);?>" style="border:1px solid black"></canvas>
									</div>

								<div class="pager" style="text-align:center;">
									<span>Page:
										<span id="page_num_<?php e($nameDecodeContent);?>"></span>
										/
										<span id="page_count_<?php e($nameDecodeContent);?>"></span>
									</span>
								</div>

								<div>

									<a class="nextlink btn btn-primary" href="javascript:" id="next_<?php e($nameDecodeContent);?>"  rel="next" style="float: right">
										Siguiente &rsaquo;
									</a>

									<a class="minuslink btn btn-success" href="javascript:" id="zoomOut_<?php e($nameDecodeContent);?>" style="float: right">
										<i class="fa fa-search-minus"></i>
									</a>
									<a class="resetlink btn btn-success" href="javascript:" id="resetZoom_<?php e($nameDecodeContent);?>" >
										<i class="fa fa-refresh"></i>
									</a>
									<a class="pluslink btn btn-success" href="javascript:" id="zoomIn_<?php e($nameDecodeContent);?>" >
										<i class="fa fa-search-plus"></i>
									</a>

									<a class="backlink btn btn-primary" href="javascript:" id="prev_<?php e($nameDecodeContent);?>"  rel="prev">
										&lsaquo; Anterior
									</a>

<!--									<a class="fslink btn btn-success" href="javascript:" id="listen_fs_<?php e($nameDecodeContent);?>" >
										<i class="fa fa-search-plus"></i>
									</a>-->

									&nbsp; &nbsp;
									<?php
// 											   $trace = debug_backtrace();
// 											   echo "calling file was ".$trace[0]['file'];
									?>
									<?php /**Next the links definitions of the anexos */?>
										<div>
<!--											<a class="a_link anxlnk btn btn-success" onclick="opend()" href="javascript:void(0);">
												Anexos
											</a>-->
										</div>


									</div>
					</div>
			</div>
			<?php }?>
			<?php }?>
		</div>
	</div>

	<?php //var_dump($type);?>
		<h3><?php __('Opciones'); ?></h3>
			<ul class="list-group list-inline">
<!-- 				<li class="list-group-item"><?php echo $this->Html->link(__('Listar '.$type, true), array('action' => 'index')); ?></li> -->
<!-- 				<button onclick="setFs()">Full Screen</button> -->

			</ul>
		</div>
</div>

		<!-- for legacy browsers add compatibility.js -->
		<!--<script src="../js/pdf.js/compatibility.js"></script>-->
		<!-- <script src="../js/pdf.js/src/pdf.js"></script> -->
	<script>

		<?php foreach($files as $index => $encPath) {?>
		"/*<?php e(base64_decode($encPath));?>*/";
		"/*zoomOut_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>*/";
		"/*zoomIn_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>*/";
		renderPdf(pdf_size(<?php e("'$format[$index]'");?>),'<?php e($encPath);?>','canvas_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','page_num_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','prev_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','next_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','page_count_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','zoomIn_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','zoomOut_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','resetZoom_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>'
					);

		p2g('activate_g2p_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','scrollable_container_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>');

		addEvent(document.getElementById('listen_fs_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>'), 'click', function () { fullScreen('activate_fs_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>') });

		<?php }?>


	</script>


	<div class="bg-danger visible-print-block">
		<div class="text-justified">
			<?php echo $this->element('policies/gst_aviso'); ?>
		</div>
	</div>
