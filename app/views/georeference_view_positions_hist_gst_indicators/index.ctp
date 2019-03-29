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
								<h6 class="docs-header">Historico Unidades sin Documentos</h6>
						</div>
					</div>

		</div>




		<div class="container-mod">
<!-- ['BalanzaViewUdnsRpt']['Empleado'] -->
					<div class="row">
						<?php echo $this->Form->create('GeoreferenceTblPositionsDocumentsGstIndicator',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>

						<?php
						// echo '<div class="two columns input-group">';
						// echo '<div class="input-group-addon"><i class="fa fa-user"></i></div>';
						// echo
						// 			$this->Form->input
						// 												(
						// 													'periodo',
						// 													 array
						// 																(
						// 																	'type'=>'select',
						// 																	'class'=>'search_udn u-full-width form-control init-focus',
						// 																	'id'=>'periodo',
						// 																	'placeholder' => 'Fecha',
						// 																	'alt'=>'Puede teclear la fecha en Formato yyyymm',
						// 		                              'title'=>'Puede teclear la fecha en Formato yyyymm',
						// 																	'div'=>FALSE,
						// 																	'label'=>FALSE,
						// 																	// 'empty'=>'Selecciona Dia',
						// 																	'options'=> array('201901'=>'Enero','201902'=>'Febrero','201903'=>'Marzo'),
						// 																	'tabindex'=>'1'
						// 																)
						// 												);
						// echo '</div>';

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
							echo '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
							echo
										$this->Form->input
																			(
																				'inserted',
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
					<div id="updateSearchResult" class="updateSearchResult">

						<!-- add table  -->
						  <div id="first-datatable-output" class="table-responsive">

						  		<table id="table_dash" class="display order-table table table-bordered table-hover table-striped responstable">
						  			<thead>
						  				<th>id</th>
						  				<th>Area</th>
						  				<th>Unidades</th>
						  				<th>Estado</th>
						  				<th>MesDespacho</th>
						  				<!-- <th>periodo</th> -->
						  			</thead>
						  			<tbody>
						  				<?php
						  					foreach ( $georeferenceViewPositionsDashMainGstIndicators as $key => $georeferenceViewPositionsDashMainGstIndicator) {
						  				?>
						  				<tr>
						  					<td><?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['id']; ?></td>
						  					<td><?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['Area']; ?></td>
						  					<td><?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['unidades']; ?></td>
						  					<td><?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['StatusDescription']; ?></td>
						  					<td><?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['despacho']; ?></td>
						  					<!-- <td><?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['periodo']; ?></td> -->
						  				</tr>
						  				<?php } ?>
						  			</tbody>
						  			<!-- <tfoot>
						  			</tfoot> -->
						  		</table>

						    </div>

					</div>
				</div>

				<div id="breakspace" class="">
					&nbsp;
				</div>

	<script type="text/javascript">
		  $(document).ready(function () {


					// var options = {
					// 								 language: 'es-ES'
					// 								,format: 'yyyy-mm-dd'
					// 							};

					$('[data-toggle="datepicker"]').datepicker(options_datepicker);


					// $( function() {
					// 	 $( "input[id^='inserted']" ).datepicker({
					// 		 // onClose: function( selectedDate ) {
					// 		 // 	jQuery( "#from" ).datepicker( "option", "maxDate", selectedDate );
					// 		 // }
					// 		 onClose: function(selectedDate) {
					// 			 console.log("onCompleteCalling Get Inside EasyPagination");
					// 			 // console.log($(this));
					// 			 console.log(selectedDate);
					// 		 }
					// 	 });
					// } );

					var table_a = $('#table_dash').DataTable(options_datatable);

				$(".search_udn").select2();

					$("#send_query").on('click', function(event) {

								event.stopPropagation();
								event.preventDefault();

								var data_code = $(this).attr('id');
								var serial = JSON.stringify($("#pform").serializeArray());
								console.log(serial);
								data_code = base64_encode(serial);
								console.log(data_code);
								var urlStruct = "<?php echo Dispatcher::baseUrl();?>/GeoreferenceViewPositionsHistGstIndicators/get/data:"+data_code;
								console.log(urlStruct);
								console.log("loaded...");

								$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');

								// $( ".updateSearchResult" ).load(urlStruct);
								$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {
									// Add Table UIX
									var table_a = $('#table_grp').DataTable(options_datatable);

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
