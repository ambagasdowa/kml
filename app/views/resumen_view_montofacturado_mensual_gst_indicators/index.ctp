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

		th {
			font-family: "Arial", monospace, sans-serif;
			font-size: 12px;
			font-weight: bold;
			white-space:nowrap;
		}
		td {
			font-family: "Arial", monospace, sans-serif;
			/*font-family: monospace;*/
			font-size: 10px;
			white-space:nowrap;
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

		</style>


		<div class="container-mod">

					<div class="row">
							<div class="twelve columns ">
								<h6 class="docs-header">Indicador</h6>
						</div>
					</div>

		</div>




		<div class="container-mod">
<!-- ['BalanzaViewUdnsRpt']['Empleado'] -->
					<div class="row">
						<?php echo $this->Form->create('ResumenViewMontofacturadoMensualGstIndicators',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>
						<?php
						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-user"></i></div>';
						echo
									$this->Form->input
																		(
																			'periodo',
																			 array
																						(
																							'type'=>'select',
																							'class'=>'search_udn u-full-width form-control init-focus',
																							'id'=>'from',
																							'placeholder' => 'Periodo',
																							'alt'=>'Puede teclear la fecha en Formato yyyymm',
								                              'title'=>'Puede teclear la fecha en Formato yyyymm',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'options'=> array('201901'=>'Enero','201902'=>'Febrero','201903'=>'Marzo'),
																							'tabindex'=>'1'
																						)
																		);
						echo '</div>';

						echo '<div class="two columns input-group">';
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
																							'style'=>'width:100%;',
																							'placeholder' => 'Unidad de Negocio',
																							'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'options'=>$bssus,
																							'tabindex'=>'2'
																						)
																		);
							echo '</div>';

							echo '<div class="two columns input-group">';
							echo '<div class="input-group-addon"><i class="fa fa-user"></i></div>';
							echo
										$this->Form->input
																			(
																				'model_id',
																				 array
																							(
																								'type'=>'select',
																								'class'=>'search_udn u-full-width form-control init-focus',
																								'id'=>'from',
																								'placeholder' => 'Periodo',
																								'alt'=>'Puede teclear la fecha en Formato yyyymm',
									                              'title'=>'Puede teclear la fecha en Formato yyyymm',
																								'div'=>FALSE,
																								'label'=>FALSE,
																								'options'=> array('0'=>'MontoFacturado','1'=>'Viajes'),
																								'tabindex'=>'1'
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

				$(".search_udn").select2();

					$("#send_query").on('click', function(event) {

								event.stopPropagation();
								event.preventDefault();

								var data_code = $(this).attr('id');
								var serial = JSON.stringify($("#pform").serializeArray());
								console.log(serial);
								data_code = base64_encode(serial);
								console.log(data_code);
								var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ResumenViewMontofacturadoMensualGstIndicators/get/data:"+data_code;
								console.log(urlStruct);
								console.log("loaded...");

								$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');

								// $( ".updateSearchResult" ).load(urlStruct);
								$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {
									// Add Table UIX
									var table_a = $('#table_grp').DataTable({
										dom: 'Bfrtip',
										language: {
								        buttons: {
								            pageLength: {
								                _: "Filtra %d lineas",
								                '-1': "Muestra Todo"
								            }
								        }
								    },
										lengthMenu: [
						            [ 10, 25, 50, -1 ],
						            [ '10 lineas', '25 lineas', '50 lineas', 'Mostrar Todo' ]
						        ],
										buttons: [
												 { extend: 'pageLength', text: '<i class="fa fa-filter" aria-hidden="true"></i>' }
												,{ extend: 'copy', text: '<i class="fa fa-clipboard" aria-hidden="true"></i>' }
												,{ extend: 'csv', text: '<i class="fa fa-file-text"></i>' }
												,{
															extend: 'excel'
														, text: '<i class="fa fa-file-excel-o"></i>'
														// , extension: '.xlsx'
														, autoFilter: true
														, messageTop:'Detalle'
														// , header:false
														, filename:"ExportData"
														, title:"<?php print($export)?>"
													}
												,{
															 extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i>'
															, messageTop:'Detalle'
															// , header:false
															, filename:"ExportData"
															, title:"<?php print($export)?>"
												 }
												,{ extend: 'print', text: '<i class="fa fa-print"></i>' }
										]}
									);
									// init: function(dt, node, config) {
									// 			$("#filename").on('change', function() {
									// 					config.title = this.value;
									// 			})
									// 	}
									var table_a = $('#table_det').DataTable({
										dom: 'Bfrtip',
										language: {
								        buttons: {
								            pageLength: {
								                _: "Filtra %d lineas",
								                '-1': "Muestra Todo"
								            }
								        }
								    },
										lengthMenu: [
						            [ 10, 25, 50, -1 ],
						            [ '10 lineas', '25 lineas', '50 lineas', 'Mostrar Todo' ]
						        ],
										buttons: [
												 { extend: 'pageLength', text: '<i class="fa fa-filter" aria-hidden="true"></i>' }
												,{ extend: 'copy', text: '<i class="fa fa-clipboard" aria-hidden="true"></i>' }
												,{ extend: 'csv', text: '<i class="fa fa-file-text"></i>' }
												,{
															extend: 'excel'
														, text: '<i class="fa fa-file-excel-o"></i>'
														// , extension: '.xlsx'
														, autoFilter: true
														, messageTop:'Detalle'
														// , header:false
														, filename:"ExportData"
														, title:"<?php print($export)?>"
													}
												// ,{
												// 			 extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i>'
												// 			, messageTop:'Detalle'
												// 			// , header:false
												// 			, filename:'ExportData'
												// 			, title:"<?php print($export)?>"
												//  }
												,{
		                          // extend: 'pdfHtml5',
														extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i>'
																	, messageTop:'Detalle'
														// 			// , header:false
																	, filename:"<?php print($export)?>"
																	, title:"<?php print($export)?>"
	                          ,customize: function ( doc ) {
	                                doc.content.splice( 0, 0, {
	                                    margin: [ 0, 0, 0, 12 ],
							                        alignment: 'left',
							                        image: 'data:image/png;base64,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'
											                                } );
											                            }
											   }
												,{ extend: 'print', text: '<i class="fa fa-print"></i>' }
										]}
									);

									$('#FilterAll').on( 'keyup', function () {
									    table_a.search( this.value ).draw();
									    table_b.search( this.value ).draw();
									} );

									// console.log(statusText);
									if(statusText == "error"){
												 thisUrl = "<?php echo Dispatcher::baseUrl();?>/users/login";
													 console.log(thisUrl);
													 window.location.href(thisUrl);
									}

								});
					});
			});


	</script>
