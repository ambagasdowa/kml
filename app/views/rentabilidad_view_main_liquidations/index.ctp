<?php
		/**
		*
		* PHP versions 4 and 5
		*
		* kml : Kamila Software
		* Licensed under The MIT License
		* Redistributions of files must retain the above copyright notice.
		*
		* @copyright     Jesus Baizabal
		* @link          http://baizabal.xyz
		* @mail	     baizabal.jesus@gmail.com
		* @package       cake
		* @subpackage    cake.cake.console.libs.templates.views
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/

		// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
		// $evaluate = false;
		// $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
		// blog
		$evaluate = true;
		// $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
		// $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
		$requiere = $evaluate ? e($this->element('kml/rentabilidad/rentabilidad')) : e($this->element('requiere/norequiere') );
		?>

		<!-- temporal style  -->

		<style media="screen">

		.ninja-scroll {
			scroll-behavior: smooth;
			overflow-x: auto;
			/*overflow-y: auto;*/
		}
		.avg {
			font-style: italic;
			text-decoration: overline;
		}

		select::-ms-expand {
			display: none;
		}

		.detail_header {
			display: none;
		}

		.head_datetime{
			display: none;
		}

		.container-mod{
			position: relative;
			width: 100%;
			max-width: 95%;
			margin: 0 auto;
			padding: 0 20px;
			box-sizing: border-box;
		}

		.colorbax {
			position: relative;
			width: 100%;
			min-width: 95%;
			margin: 0 auto;
			padding: 0 20px;
			box-sizing: border-box;
		}

		.current {
			display: inline-block;  /* For IE11/ MS Edge bug */
			pointer-events: none;
			cursor: default;
			color:gray !important;
			text-decoration: none;
		}

		.current > a {
		  color: gray !important;
		  display: inline-block;  /* For IE11/ MS Edge bug */
		  pointer-events: none;
		  text-decoration: none;
		}

		/**PAGINATOR STYLE*/
		.easyPaginateNav{
			position: fixed;
			bottom: 1%;
			left: 35%;
			cursor: pointer;
			z-index:150;
		}

		.icon{
		  transition:all 0.5s;
		  opacity:0;
		}

		.link_external:hover .icon{
		  opacity:1;
		}

/* INPUT FILE */
		.fileContainer {
			overflow: hidden;
			position: relative;
		}

		.fileContainer [type=file] {
			cursor: inherit;
			display: block;
			font-size: 999px;
			filter: alpha(opacity=0);
			min-height: 100%;
			min-width: 100%;
			opacity: 0;
			position: absolute;
			right: 0;
			text-align: right;
			top: 0;
		}

.wrap {
	display: flex;
/*	display:inline-block; */
  align-items: center;
/*  justify-content: center;*/
	overflow:auto;
}

.main_table {
/*  border: 1px solid #555;*/
		border: 1px solid #000;
		display:flex;
}

.main{
	white-space:nowrap;
}

.sum {
	width:90px;
}


/*
table{
		border-collapse: collapse; 
}
*/

.test{
	border: 1px solid #000;
}

#innerbox {
   width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


/*style excel*/
.excel_cell{
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	/*font-size: 13px;*/
	font-weight:  normal;
	/*padding: 4px;*/
/*	white-space: pre-line;*/
	white-space: nowrap;
	min-width: 130px !important;
}

._xls_cell {
	empty-cells: show;
	white-space: nowrap;
  min-width: 130px;
	padding: 1px 0.5em;
}

._cell_header{
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	font-weight:  normal;
	background-color: #EEE;
}

._celll_first_row{
	text-align:left!important;
}

._cell_fix_lenght{ 
	width:20px !important;
  min-width:5px !important;
 }

._cell_Default{
	background-color: #FFF;
	/*text-align: left;*/
}

._cell_view {
	font-weight:bold;
}

.firts_column {
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	font-weight:  normal;
	background-color: #EEE;
	min-width: 325px;
	text-align: left !important;
}
._table {
  display: table                /* <table>     */;
	border-collapse:	collapse									   ;
	width : 100%;
}
._row {
  display: table-row            /* <tr>        */;
	width : 100%;
}
._cell {
  display: table-cell           /* <td>        */;
	/*width: 100%;*/
}

		</style>




<!-- ================================================================================================= -->
<!-- @NOTE  =====   Get the Files ====  -->
<div id="msg">
	<?php echo $this->Session->flash();?>
	<br />
</div>


		<div class="container-mod">
					<div class="row">
							<div class="twelve columns ">
								<h6 class="docs-header">Gerencia</h6>
						</div>
					</div>
		</div>




		<div class="container-mod">
<!-- ['BalanzaViewUdnsRpt']['Empleado'] -->
					<div class="row">
						<?php echo $this->Form->create('RentabilidadViewMainLiquidations',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>

						<?php

						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
						echo
									$this->Form->input
																		(
																			'dateini',
																			 array
																						(
																							'type'=>'text',
																							// 'class'=>'performance_dateini u-full-width form-control init-focus',
																							'class'=>'performance_dateini datepicker ll-skin-melon u-full-width form-control',
																							'id'=>'inserted',
																							'data-toggle'=>'datepicker',
																							'placeholder' => 'Fecha',
																							'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'tabindex'=>'1'
																						)
																		);
						echo '</div>';

						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
						echo
									$this->Form->input
																		(
																			'dateend',
																			 array
																						(
																							'type'=>'text',
																							// 'class'=>'performance_dateini u-full-width form-control init-focus',
																							'class'=>'performance_dateend datepicker ll-skin-melon u-full-width form-control',
																							'id'=>'inserted',
																							'data-toggle'=>'datepicker',
																							'placeholder' => 'Fecha',
																							'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'tabindex'=>'2'
																						)
																		);
						echo '</div>';

						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'Unidad',
																			 array
																						(
																							'type'=>'text',
																							'class'=>'u-full-width form-control',
																							'id'=>'to',
																							'placeholder' => 'TractoCamion',
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							// 'options'=>$bssus,
																							'tabindex'=>'3'
																						)
																		);
							echo '</div>';


					
						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'bsu',
																			 array
																						(
																							'type'=>'select',
																							'options'=>$bsu,
																							'class'=>'search_udn search_value u-full-width form-control',
																							'label'=>false,
																							'div'=>false,
																							// 'multiple' => true,
																							'tabindex'=>'4',
																							'empty'=>'Unidad de Negocio'

																						)
									);
						echo '</div>';
					?>

					<?php
					/*
						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'liquidacion',
																			 array
																						(
																							'type'=>'text',
																							'class'=>'u-full-width form-control',
																							'id'=>'to',
																							'placeholder' => 'No de Liquidacion',
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							// 'options'=>$bssus,
																							'tabindex'=>'4'
																						)
																		);
						echo '</div>';
					*/
					 ?>

						<!-- <div class="row"> -->
							<div class="label one columns input-group">
								<?php
											echo
													$this->Html->link(
																							__('Buscar ...', true),
																							array('action' => 'get', null),
																							array('id'=>'send_query','div'=>false,'class'=>'btn btn-primary btn-sm pull-right','tabindex'=>'5')
																						);
								?>
							</div>
						<!-- </div> -->
					</div>

				</div>
				<!--container-->

				<div id="breakspace" class="">
					&nbsp;
				</div>

				<div id="printThis" class="container-mod ninja-scroll">

							<div id="updateSearchResult" class="updateSearchResult"></div>

				</div>


				<div id="breakspace" class="">
					&nbsp;
				</div>

	<script type="text/javascript">

// NOTE Add extra check for file type upload only admit xml && pdf in his own input module ProvidersPortal::checkFile


		  $(document).ready(function () {

				$('[data-toggle="datepicker"]').datepicker(options_datepicker);

					$(".search_udn").select2();

					$("#send_query").on('click', function(event) {

								event.stopPropagation();
								event.preventDefault();

								var data_code = $(this).attr('id');
								var serial = JSON.stringify($("#pform").serializeArray());
								console.log(serial);
								data_code = base64_encode(serial);
								console.log(data_code);
								var urlStruct = "<?php echo Dispatcher::baseUrl();?>/RentabilidadViewMainLiquidations/get/data:"+data_code;
								console.log(urlStruct);
								console.log("loaded...");

								$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');

								// $( ".updateSearchResult" ).load(urlStruct);
								$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {

									// Add Table UIX
						//			var table_a = $('#table_res').DataTable(
						//				Object.assign( {}, options_datatable, calculate_row([],[]) )
						//			 );

								  $('#static_frame').DataTable(
									//	object.assign( {}, options_datatable
									//		, calculate_row([0])
									//	 )
									 );

								}); //NOTE end file dispatch
					});
}); // End Document

	</script>
