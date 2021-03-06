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
		* @subpackage    PerformanceTrips,Index
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*
		*/
		?>

		<?php
		    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
		    // $evaluate = false;
		    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
		    // blog
		    $evaluate = true;
		    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
				// $requiere = $evaluate ? e($this->element('kml/performance/main')) : e($this->element('requiere/norequiere') );
				// TODO : Build a Paginator mech with Scroll
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
		/*font-size: 12px;*/
		white-space:nowrap;
	}
	td {
		font-family: "Arial", monospace, sans-serif;
		font-size: 12px;
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
						<h6 class="docs-header">Indicadores Viajes</h6>
				</div>
			</div>

</div>

<div class="container-mod">

			<div class="row">
				<?php echo $this->Form->create('PerformanceTrips',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>
				<?php

				echo '<div class="two columns input-group">';
				echo '<div class="input-group-addon"><i id="focus-this" class="fa fa-calendar"></i></div>';
				echo
							$this->Form->input
																(
																	'performance_dateini',
																	 array
																				(
																					'type'=>'text',
																					'class'=>'performance_dateini u-full-width form-control init-focus',
																					'id'=>'from',
																					'placeholder' => 'Fecha Inicio',
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
																	'performance_dateend',
																	 array
																				(
																					'type'=>'text',
																					'class'=>'performance_dateend datepicker ll-skin-melon u-full-width form-control',
																					'id'=>'to',
																					'placeholder' => 'Fecha Fin',
																					'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
						                              'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																					'div'=>FALSE,
																					'label'=>FALSE,
																					'tabindex'=>'2'
																				)
																);
				echo '</div>';

				echo '<div class="two columns input-group">';
				// echo '<div class="input-group-addon"><i class="fa fa-truck"></i></div>';
				echo
							$this->Form->input
																(
																	'performance_fraccion',
																	 array
																				(
																					'type'=>'select',
																					'class'=>'u-full-width form-control',
																					'id'=>'fraction',
																					'placeholder' => 'Fraccion',
																					'div'=>FALSE,
																					'label'=>FALSE,
																					'empty'=>'Todo',
																					'options'=> array('1' => 'Granel','2' => 'Terceros'),
																					'tabindex'=>'3'
																				)
																);
				echo '</div>';

				echo '<div class="three columns input-group">';
				echo
								$this->Form->input
																	(
																		'performance_bsu',
																		 array
																					(
																						'type'=>'select',
																						'options'=>$performance_bsus,
																						'class'=>'performance_bsu search_value u-full-width form-control',
																						'label'=>false,
																						'div'=>false,
																						'multiple'=>true,
																						'tabindex'=>'4'
																						// 'empty'=>'Unidad de Negocio'

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


<!-- =======================
				start old crud
		 ======================= -->


		<script type="text/javascript">

    // <!&#91;CDATA&#91;
        $(document).ready(function (){
					// NOTE set the focus firts
					$("#from").focus();

				// NOTE send the post/get data
					$("#send_query").on('click', function(event) {

						event.stopPropagation();
						event.preventDefault();
						var data_code = $(this).attr('id');
						var serial = JSON.stringify($("#pform").serializeArray());
						console.log(serial);
						data_code = base64_encode(serial);
						console.log(data_code);
						var urlStruct = "<?php echo Dispatcher::baseUrl();?>/PerformanceTrips/get/data:"+data_code;
						console.log(urlStruct);

						// NOTE update live
						// $(".updateSearchResult").load(urlStruct);

						console.log("loaded...");
						$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');
						$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {

							if(statusText == "error"){
											 alert("An error occurred: Inicie Session Nuevamente " + xhr.status + " - " + xhr.statusText);
							}

						// NOTE clone and clean the header
						var headder = $("#tableFilter thead").clone().removeClass("detail_header").addClass("header_row");
						heather = $("#tableFilter thead th").clone();

						// NOTE calculate the pages per rows
						var tds = $("#tableFilter").children('tbody').children('tr').length;

						// console.log(tds);

						// if (tds > 60 ) {
							tdper = parseInt(60) ;
						// } else {
							// tdper = parseInt(59);
							if($(".cache-header").is(':visible') == false) {
									// Code
								$("#tableFilter").prepend(headder);
							} else {
								$(".cache-header").remove();
								$("#tableFilter").prepend(headder);
							}
						// }

						// console.log(tdper);
// NOTE Start EasyPagination
							$('#tableFilter').easyPaginate({
									paginateElement: 'tr',
									elementsPerPage: tdper,
									effect: 'default',
									headerTable:heather,
									complete: function() {

										console.log($(".cache-header").is(':visible'));
											// NOTE clone the header
											if($(".cache-header").is(':visible') == false) {
											    // Code
												$("#tableFilter").prepend(headder);
											} else {
												$(".cache-header").remove();
												$("#tableFilter").prepend(headder);
											}

										// //NOTE ==== Wotking UI behavior ===== //
											// NOTE call to add update
											$("a[id^='get_factura_']").on('click', function(event) {
													event.stopPropagation();
													event.preventDefault();

													console.log($(this));
													console.log( $(this).attr('id') );
													var post_data = {
																						'performance_num_guia_id':$(this).attr('id'),
																						'performance_num_guia_id':$(this).attr('data-numguia'),
																						'performance_no_guia_id':$(this).attr('data-guia'),
																						'performance_no_viaje_id':$(this).attr('data-viaje'),
																						'projections_corporations_id':$(this).attr('data-empresa'),
																						'id_area':$(this).attr('data-area')
																					};

													var str_to_pass = JSON.stringify(post_data);

												  console.log(str_to_pass);

													data_code = base64_encode(str_to_pass);

													var urlStruct = "<?php echo Dispatcher::baseUrl();?>/PerformanceViajes/add/data:" + data_code;
													console.log(urlStruct);

													// NOTE for a update behavior we need a workaround with $.ajax
													$.colorbox({
															// 'iframe':true,
															'href' : urlStruct,
															'scrolling' : false,
															'trapFocus' :	true,
															 onComplete : function () {

																 console.log($("#add_update"));

																 // NOTE Datepicker Define the Spanish languaje
											 							$.datepicker.regional['es'] = {
											 							closeText: 'Cerrar',
											 							prevText: '<Ant',
											 							nextText: 'Sig>',
											 							currentText: 'Hoy',
											 							monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
											 							monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
											 							dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
											 							dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
											 							dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
											 							weekHeader: 'Sm',
											 							dateFormat: 'yy/mm/dd',
											 							firstDay: 1,
											 			//				numberOfMonths: 2,
											 							isRTL: false,
											 							showMonthAfterYear: false,
											 							yearSuffix: ''
											 							};
											 							$.datepicker.setDefaults($.datepicker.regional['es']);
																 $( function() {
																		$( "input[id^='datepicker_']" ).datepicker();
																 } );
																 var count = 0;
																 $("#add_update").on('click',function(){

																	event.stopPropagation();
																	event.preventDefault();
																	count += 1;
																	if (count > 1) {
																			$(this).prop('disabled',true);
																	} else {

																		console.log($(this).attr('data-update'));
																	 	var post_serial = JSON.stringify($("#post_form").serializeArray());
																		console.log(post_serial);
																		post_data_code = base64_encode(post_serial);
																		console.log(post_data_code);
																		console.log($('.page current'));

														 				$.post("<?php echo Dispatcher::baseUrl();?>/PerformanceViajes/add/save:"+ post_data_code)
																		.done(function(data){
																			$.colorbox.close();
																			document.getElementById("send_query").click();
																			console.log('loaded_table_table');
																		});
																		// $.colorbox();
																	}
																 });
															 }
													});
											}); // NOTE Edit add etc stuff

											// NOTE add Filter in table
											// $("#kwd_search").keyup(function(){
											// 	// When value of the input is not blank
											// 	if( $(this).val() != "") {
											// 		// Show only matching TR, hide rest of them
											// 		$("#tableFilter tbody>tr").hide();
											// 		$("#tableFilter td:contains-ci('" + $(this).val() + "')").parent("tr").show();
											// 	} else {
											// 		// When there is no input or clean again, show everything back
											// 		$("#tableFilter tbody>tr").show();
											// 	}
											// });
											//
											// $.extend($.expr[":"],
											// {
											//     "contains-ci": function(elem, i, match, array)
											// 	{
											// 		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
											// 	}
											// });

									} // NOTE End Complete Callback

							}); //NOTE End EasyPagination

							$('#charting').on('click',function(evento){
								evento.stopPropagation();
								evento.preventDefault();

								$.colorbox({
											inline: true,
											href: function () {
							          // var elementID = $(this).attr('id');
							          // return "#" + elementID;
												return "#chart";
							       },
										 onClosed:function(){
											 $('#chart').hide();
										 },
										 onLoad:function(){
											 $('#chart').css('width','100%').show();
										 }
						      });
							});
							// // NOTE call to add update
							$("a[id^='get_factura_']").on('click', function(event) {
									event.stopPropagation();
									event.preventDefault();

									console.log($(this));
									console.log( $(this).attr('id') );
									var post_data = {
																		'performance_num_guia_id':$(this).attr('id'),
																		'performance_num_guia_id':$(this).attr('data-numguia'),
																		'performance_no_guia_id':$(this).attr('data-guia'),
																		'performance_no_viaje_id':$(this).attr('data-viaje'),
																		'projections_corporations_id':$(this).attr('data-empresa'),
																		'id_area':$(this).attr('data-area')
																	};

									var str_to_pass = JSON.stringify(post_data);

								  console.log(str_to_pass);

									data_code = base64_encode(str_to_pass);

									var urlStruct = "<?php echo Dispatcher::baseUrl();?>/PerformanceViajes/add/data:" + data_code;
									console.log(urlStruct);

									// NOTE for a update behavior we need a workaround with $.ajax
									$.colorbox({
											// 'iframe':true,
											'href' : urlStruct,
											'scrolling' : false,
											'trapFocus' :	true,
											 onComplete : function () {

												 console.log($("#add_update"));

												 // NOTE Datepicker Define the Spanish languaje
							 							$.datepicker.regional['es'] = {
							 							closeText: 'Cerrar',
							 							prevText: '<Ant',
							 							nextText: 'Sig>',
							 							currentText: 'Hoy',
							 							monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
							 							monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
							 							dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
							 							dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
							 							dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
							 							weekHeader: 'Sm',
							 							dateFormat: 'yy/mm/dd',
							 							firstDay: 1,
							 			//				numberOfMonths: 2,
							 							isRTL: false,
							 							showMonthAfterYear: false,
							 							yearSuffix: ''
							 							};
							 							$.datepicker.setDefaults($.datepicker.regional['es']);
												 $( function() {
														$( "input[id^='datepicker_']" ).datepicker();
												 } );

												 var count = 0;
												 $("#add_update").on('click',function(){

													event.stopPropagation();
													event.preventDefault();
													count += 1;
															if (count > 1) {
																$(this).prop('disabled',true);
															} else {
																console.log($(this).attr('data-update'));
															 	var post_serial = JSON.stringify($("#post_form").serializeArray());
																console.log(post_serial);
																post_data_code = base64_encode(post_serial);
																console.log(post_data_code);

												 				$.post("<?php echo Dispatcher::baseUrl();?>/PerformanceViajes/add/save:"+ post_data_code)
																.done(function(data){
																	$.colorbox.close();
																	document.getElementById("send_query").click();
																	console.log('loaded_table');
																});
														}
												 });
											 }
									});
							}); // NOTE Edit add etc stuff

							// NOTE add Filter in table

							// $("#kwd_search").keyup(function(){
							// 	// When value of the input is not blank
							// 	if( $(this).val() != "") {
							// 		// Show only matching TR, hide rest of them
							// 		$("#tableFilter tbody>tr").hide();
							// 		$("#tableFilter td:contains-ci('" + $(this).val() + "')").parent("tr").show();
								// 	} else {
							// 		// When there is no input or clean again, show everything back
							// 		$("#tableFilter tbody>tr").show();
							// 	}
							// });
							//
							// $.extend($.expr[":"],
							// {
							// 		"contains-ci": function(elem, i, match, array)
							// 	{
							// 		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
							// 	}
							// });

							// NOTE PRINT
							$("#print").on('click',function(e){

								$(".row").find(".head_datetime").removeClass("head_datetime").addClass("dash_datetime");

								var ids = "#printThis";

										$( ids ).printThis({
												debug: false,               // show the iframe for debugging
												importCSS: false,            // import page CSS
												importStyle: true,         // import style tags
												printContainer: true,       // grab outer container as well as the contents of the selector
												loadCSS: "<?php echo Dispatcher::baseUrl();?>/css/kml/performance_print.css",  // path to additional css file - use an array [] for multiple
												pageTitle: "&#8203;", // add title to print page
												removeInline: false,        // remove all inline styles from print elements
												printDelay: 333,            // variable print delay; depending on complexity a higher value may be necessary
												header: '<img src="<?php echo Dispatcher::baseUrl();?>/img/logotipos/gst/header_gs.png" width="100%">',               // prefix to html
												footer: '', // postfix to html <div class="footer_legend">© GST Software Development Department</div>
												base: false ,               // preserve the BASE tag, or accept a string for the URL
												formValues: false,           // preserve input/form values
												canvas: false,              // copy canvas elements (experimental)
												doctypeString: "",       // enter a different doctype for older markup
												removeScripts: false,       // remove script tags from print content
												copyTagClasses: false       // copy classes from the html & body tag
										});
							});

						}); //NOTE End load(updateSearchResult)

					});//NOTE End send

				// filter results the firts optionbox
					// $(".search_value").select2({
					// 	'placeholder': 'UnidadNegocio',
					// 	'height': '10px',
					// 	'font-size':'9px',
					// 	'allowClear': true
					// });

					$('.search_value').multiselect({
						enableFiltering: true,
						enableCaseInsensitiveFiltering: true,
						filterPlaceholder: 'Filtrar',
						nonSelectedText: 'Unidad de Negocio',
						onDropdownHide: true,
						buttonWidth: '300px'
					});

					// NOTE Datepicker Define the Spanish languaje
							$.datepicker.regional['es'] = {
							closeText: 'Cerrar',
							prevText: '<Ant',
							nextText: 'Sig>',
							currentText: 'Hoy',
							monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
							monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
							dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
							dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
							dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
							weekHeader: 'Sm',
							dateFormat: 'yy/mm/dd',
							firstDay: 1,
			//				numberOfMonths: 2,
							isRTL: false,
							showMonthAfterYear: false,
							yearSuffix: ''
							};
							$.datepicker.setDefaults($.datepicker.regional['es']);

					$( function() {
				    // var dateFormat = "mm/dd/yy",
				      from = $( "#from" )
				        .datepicker({
				          // defaultDate: "+1w"
				          // changeMonth: true
				          numberOfMonths: 2,
									showCurrentAtPos: 1
				        })
				        .on( "change", function() {
				          to.datepicker( "option", "minDate", getDate( this ) );
				        }).datepicker('widget').wrap('<div class="ll-skin-skeleton"/>'), // NOTE Apparently just need call ones
				      to = $( "#to" ).datepicker({
				        // defaultDate: "+1w",
				        // changeMonth: true,
				        numberOfMonths: 2,
								showCurrentAtPos: 1
				      })
				      .on( "change", function() {
				        from.datepicker( "option", "maxDate", getDate( this ) );
				      });

				    function getDate( element ) {
				      var date;
				      try {
				        date = $.datepicker.parseDate( dateFormat, element.value );
				      } catch( error ) {
				        date = null;
				      }

				      return date;
				    }
				  } );

				});
		// &#93;&#93;>
    </script>
