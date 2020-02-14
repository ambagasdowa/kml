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
		?>

		<?php
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

		.twos.columns{
	 						/* width: 4.66666666667%;  */
	 						width: 7.66666666667% !important;
		}

		.two.columns {
									width: 10.3333333333%;
		}

		</style>


		<div class="container-mod">

					<div class="row">
							<div class="twelve columns ">
								<h6 class="docs-header">Logistica</h6>
						</div>
					</div>

		</div>


		<div class="container-mod">
<!-- ['BalanzaViewUdnsRpt']['Empleado'] -->
					<div class="row">
						<?php echo $this->Form->create('LogisticaViewGstDatesheet',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>

						<?php

						echo '<div class="twos columns input-group">';
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
																							'placeholder' => 'Fecha Inicial',
																							'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'tabindex'=>'1'
																						)
																		);
						echo '</div>';

						echo '<div class="twos columns input-group">';
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
																							'placeholder' => 'Fecha Final',
																							'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'tabindex'=>'1'
																						)
																		);
						echo '</div>';

						?>

						<?php
						echo '<div class="twos columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'id_area',
																			 array
																						(
																							'type'=>'select',
																							'class'=>'search_udn u-full-width form-control',
																							'id'=>'to',
																							'placeholder' => 'Unidad de Negocio',
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'empty'=>'Unidad de Negocio',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'options'=>$bssus,
																							'tabindex'=>'2'
																						)
																		);
							echo '</div>';

						?>
						<?php
						/*
						echo '<div class="twos columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'IsEmptyTrip',
																			 array
																						(
																							'type'=>'select',
																							'class'=>'search_udn u-full-width form-control',
																							'id'=>'to',
																							'placeholder' => 'Clase del Viaje',
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'empty'=>'Tipo de Viaje',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'options'=>$IsEmptyTrip,
																							'tabindex'=>'2'
																						)
																		);
							echo '</div>';
						*/
						?>


												<?php
												echo '<div class="twos columns input-group">';
												echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
												echo
															$this->Form->input
																								(
																									'id_cliente',
																									 array
																												(
																													'type'=>'select',
																													'class'=>'search_udn u-full-width form-control',
																													'id'=>'to',
																													'placeholder' => 'Cliente',
																													// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
														                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																													'empty'=>'Clientes',
																													'div'=>FALSE,
																													'label'=>FALSE,
																													'options'=>$client,
																													'tabindex'=>'2'
																												)
																								);
													echo '</div>';

												?>

						<?php
						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'Origen',
																			 array
																						(
																							'type'=>'select',
																							'class'=>'search_udn u-full-width form-control',
																							'id'=>'to',
																							'placeholder' => 'Origen del Viaje',
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'empty'=>'Origen',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'options'=>$plazas,
																							'tabindex'=>'2'
																						)
																		);
							echo '</div>';

						?>
						<?php
						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'Destino',
																			 array
																						(
																							'type'=>'select',
																							'class'=>'search_udn u-full-width form-control',
																							'id'=>'to',
																							'placeholder' => 'Destino del Viaje',
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'empty'=>'Destino',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'options'=>$plazas,
																							'tabindex'=>'2'
																						)
																		);
							echo '</div>';

						?>

						<?php
						echo '<div class="twos columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'projections_rp_definition',
																			 array
																						(
																							'type'=>'select',
																							'class'=>'search_udn u-full-width form-control',
																							'id'=>'to',
																							'placeholder' => 'Operacion',
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'empty'=>'Operacion',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'options'=>$projections_rp_definition,
																							'tabindex'=>'2'
																						)
																		);
							echo '</div>';

						?>

						<!-- <div class="row"> -->
							<div class="label one columns input-group">
								<?php
											echo
													$this->Html->link(
																							__('Buscar ...', true),
																							array('action' => 'get', null),
																							array('id'=>'send_query','div'=>false,'class'=>'btn btn-primary btn-sm pull-right','tabindex'=>'6')
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


		  $(document).ready(function () {

				$('[data-toggle="datepicker"]').datepicker(options_datepicker);

				$(".search_udn").select2();

					$("#send_query").on('click', function(event) {

								// $('[data-toggle="datepicker"]').datepicker(options_datepicker);

								event.stopPropagation();
								event.preventDefault();

								var data_code = $(this).attr('id');
								var serial = JSON.stringify($("#pform").serializeArray());
								console.log(serial);
								data_code = base64_encode(serial);
								console.log(data_code);
								var urlStruct = "<?php echo Dispatcher::baseUrl();?>/LogisticaViewGstDatesheets/get/data:"+data_code;
								console.log(urlStruct);
								console.log("loaded...");

								$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');

								// $( ".updateSearchResult" ).load(urlStruct);
								$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {


									// Add Table UIX
									var table_a = $('#table_response').DataTable(
										Object.assign( {}, options_datatable, calculate_row([],[]) )
									 );
									// End table

									// ALERT check this behavior
									// NOTE add the file dispatcher inside send_query

// 									table_a.$("input[id^='update_']").on('keydown', function(e) {
// 									// Ensure 'value' binding is fired on enter in IE
// 					        if ((e.keyCode || e.which) === 13 || e.which === 9) {
// 										console.log('....');
// 												var posted_data = {
// 																					'batnbr':$(this).attr('data-id'),
// 																					'name':$(this).attr('data-name'),
// 																					'type':$(this).attr('data-type'),
// 																					'RefNbr':$(this).attr('data-refnbr'),
// 																					'noguia':$(this).attr('data-noguia'),
// 																					'guia':$(this).attr('data-guia'),
// 																					'idx':$(this).attr('data-idx'),
// 																					'data':$(this).val()
// 																				};
//
// 												var string_to_pass = JSON.stringify(posted_data);
// 												console.log(string_to_pass);
// 												data_code = base64_encode(string_to_pass);
//
// 												batnbr = $(this).attr('data-id');
// 												remision = $(this).attr('data-remision');
// 												if ($(this).val()) {
// 													$.post("<?php //echo Dispatcher::baseUrl();?>/LogisticaViewGstDatesheets/update/data:"+data_code,function(data){
// // NOTE
// 													  }).done(function(data){
// 																// alert('response is : ' + data );
// 															if ( $("#update_pedido_"+batnbr).val() && $("#update_albaran_"+batnbr).val() ) {
// 																	$('#link_'+batnbr).html('<a href="<?php //echo Dispatcher::baseUrl();?>/LogisticaViewGstDatesheets/link/id:'+batnbr+'" id="get_'+batnbr+'" data-id="'+batnbr+'" data-name="'+batnbr+'_'+remision+'">Descargar</a>');
// 															}
// 													});
// 												} else {
// 													console.log('data is null');
// 												}
// 											} // End key
// 										}); //End on keydown


		}); //NOTE end file dispatch


					});
			});


	</script>
