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
								<h6 class="docs-header">Indicador de Rendimiento</h6>
						</div>
					</div>

		</div>




		<div class="container-mod">
<!-- ['BalanzaViewUdnsRpt']['Empleado'] -->
					<div class="row">
						<?php echo $this->Form->create('RendViewFullGstCoreIndicator',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>
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
							echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
							echo
										$this->Form->input
																			(
																				'id_tipo_operacion',
																				 array
																							(
																								'type'=>'select',
																								'class'=>'search_udn u-full-width form-control',
																								'id'=>'operacion',
																								'placeholder' => 'Operacion',
																								'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
									                              'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																								'empty'=>'TODO',
																								'selected'=>1,
																								'div'=>FALSE,
																								'label'=>FALSE,
																								'options'=>$operacion,
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
								var urlStruct = "<?php echo Dispatcher::baseUrl();?>/RendViewFullGstCoreIndicators/get/data:"+data_code;
								console.log(urlStruct);
								console.log("loaded...");

								$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');

								// $( ".updateSearchResult" ).load(urlStruct);
								$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {
									// Add Table UIX
									// $('#indTable').DataTable();


									// var table = $('#indTable').DataTable();
									//
									// table.columns( '.sum' ).every( function (row, data, start, end, display) {
									//
									// 		var intVal = function ( i ) {
									// 							 // console.log(i);
									// 								 return typeof i === 'string' ?
									// 										 i.replace(/[\$,]/g, '')*1 :
									// 										 typeof i === 'number' ?
									// 												 i : 0;
									// 		};
									//
									// 		function isVisible(e) {
									// 		    return !!( e.offsetWidth || e.offsetHeight || e.getClientRects().length );
									// 		}
									//     var sum = this
									//         .data()
									//         .reduce( function (a,b) {
									//             return intVal(a) + intVal(b);
									//         },0 );
									//
									// 				// var sumc = this
									// 		    //     .data()
									// 		    //     .reduce( function (a,b) {
									// 		    //         return intVal(a) + intVal(b);
									// 		    //     },0 );
									//     $( this.footer() ).html( ''+(Math.round(sumc * 100) / 100) );
									// } );

									//
									var table_a = $('#table_res').DataTable( {

												 "footerCallback": function ( row, data, start, end, display ) {
														 var api = this.api(), data;
														 // Remove the formatting to get integer data for summation
														 var intVal = function ( i ) {
															 // console.log(i);
																 return typeof i === 'string' ?
																		 i.replace(/[\$,]/g, '')*1 :
																		 typeof i === 'number' ?
																				 i : 0;
														 };

														 // KMS
														 // Total over all pages
														 kvtotal = api
																 .column( 1 )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Total over this page
														 kvpageTotal = api
																 .column( 1, { page: 'current'} )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Update footer
														 $( api.column( 1 ).footer() ).html(
																 ''+ (Math.round(kvpageTotal * 100) / 100)  +' ( '+ (Math.round(kvtotal * 100) / 100) +' total)'
														 );

														 // Viajes
														 // Total over all pages
														 kvxtotal = api
																 .column( 2 )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Total over this page
														 kvxpageTotal = api
																 .column( 2, { page: 'current'} )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Update footer
														 $( api.column( 2 ).footer() ).html(
																 ''+ (Math.round(kvxpageTotal * 100) / 100)  +' ( '+ (Math.round(kvxtotal * 100) / 100) +' total)'
														 );

														 //diesel
														 // Total over all pages
														 kvytotal = api
																 .column( 3 )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Total over this page
														 kvypageTotal = api
																 .column( 3, { page: 'current'} )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Update footer
														 $( api.column( 3 ).footer() ).html(
																 ''+ (Math.round(kvypageTotal * 100) / 100)  +' ( '+ (Math.round(kvytotal * 100) / 100) +' total)'
														 );

														//Rendiemiento
														// Total over all pages
														kvmtotal = api
																.column( 4 )
																.data()
																.reduce( function (a, b) {
																		return intVal(a) + intVal(b);
																}, 0 );
														// Total over this page
														kvmpageTotal = api
																.column( 4, { page: 'current'} )
																.data()
																.reduce( function (a, b) {
																		return intVal(a) + intVal(b);
																}, 0 );
														// Update footer
														var rendCPage = kvpageTotal / kvypageTotal;
														var rendTPage = kvtotal / kvytotal ;
														$( api.column( 4 ).footer() ).html(
																// ''+ (Math.round(kvmpageTotal * 100) / 100)  +' ( '+ (Math.round(kvmtotal * 100) / 100) +' total)'
																''+ (Math.round(rendCPage * 100) / 100) +' ( '+ (Math.round(rendTPage * 100) / 100) +' total)'
														);


												 }
										 });
									// End table

									//
									var table_b = $('#table_det').DataTable( {

												 "footerCallback": function ( row, data, start, end, display ) {
														 var api = this.api(), data;
														 // Remove the formatting to get integer data for summation
														 var intVal = function ( i ) {
															 // console.log(i);
																 return typeof i === 'string' ?
																		 i.replace(/[\$,]/g, '')*1 :
																		 typeof i === 'number' ?
																				 i : 0;
														 };

														 // KMS
														 // Total over all pages
														 ktotal = api
																 .column( 7 )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Total over this page
														 kpageTotal = api
																 .column( 7, { page: 'current'} )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Update footer
														 $( api.column( 7 ).footer() ).html(
																 ''+ (Math.round(kpageTotal * 100) / 100)  +' ( '+ (Math.round(ktotal * 100) / 100) +' total)'
														 );

														 // Diesel
														 // Total over all pages
														 dtotal = api
																 .column( 8 )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Total over this page
														 dpageTotal = api
																 .column( 8, { page: 'current'} )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Update footer
														 $( api.column( 8 ).footer() ).html(
																 ''+ (Math.round(dpageTotal * 100) / 100)  +' ( '+ (Math.round(dtotal * 100) / 100) +' total)'
														 );

														 // Rendimiento
														 // Total over all pages
														 rtotal = api
																 .column( 9 )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Total over this page
														 rpageTotal = api
																 .column( 9, { page: 'current'} )
																 .data()
																 .reduce( function (a, b) {
																		 return intVal(a) + intVal(b);
																 }, 0 );
														 // Update footer
														 var rendCurrentPage = kpageTotal / dpageTotal;
														 var rendTotalPage = ktotal / dtotal ;

														 $( api.column( 9 ).footer() ).html(
																 ''+ (Math.round(rendCurrentPage * 100) / 100) +' ( '+ (Math.round(rendTotalPage * 100) / 100) +' total)'

														 );
												 }
										 });
									// End table

									$('#myInput').on( 'keyup', function () {
									    table_a.search( this.value ).draw();
									    table_b.search( this.value ).draw();
									} );

									console.log(statusText);
									if(statusText == "error"){
												 thisUrl = "<?php echo Dispatcher::baseUrl();?>/users/login";
													 console.log(thisUrl);
													 window.location.href(thisUrl);
									}
									// $( ".updateSearchResult" ).html('<p>Test</p>');
								});



//
// $('#indTable').DataTable( {
//
// 			 "footerCallback": function ( row, data, start, end, display ) {
// 					 var api = this.api(), data;
//
// 					 // Remove the formatting to get integer data for summation
// 					 var intVal = function ( i ) {
// 							 return typeof i === 'string' ?
// 									 i.replace(/[\$,]/g, '')*1 :
// 									 typeof i === 'number' ?
// 											 i : 0;
// 					 };
// 					 // Total over all pages
// 					 total = api
// 							 .column( 9 )
// 							 .data()
// 							 .reduce( function (a, b) {
// 									 return intVal(a) + intVal(b);
// 							 }, 0 );
// 					 // Total over this page
// 					 pageTotal = api
// 							 .column( 9, { page: 'current'} )
// 							 .data()
// 							 .reduce( function (a, b) {
// 									 return intVal(a) + intVal(b);
// 							 }, 0 );
// 					 // Update footer
// 					 $( api.column( 9 ).footer() ).html(
// 							 '$'+pageTotal +' ( $'+ total +' total)'
// 					 );
// 			 }
// 	 });
// End table

					});
			});


	</script>
