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
		    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
		?>

<!-- temporal style  -->
<style media="screen">
	.ninja-scroll {
		scroll-behavior: smooth;
		overflow-x: auto;
		overflow-y: auto;
	}
	.avg {
		font-style: italic;
		text-decoration: overline;
	}


	select.flt {
	  appearance: none;
		-moz-appearance: none;
		-webkit-appearance: none;
	  background-color: white;
	  background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjxzdmcKICAgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIgogICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIgogICB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiCiAgIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIKICAgdmVyc2lvbj0iMS4xIgogICBpZD0ic3ZnMiIKICAgdmlld0JveD0iMCAwIDM1Ljk3MDk4MyAyMy4wOTE1MTgiCiAgIGhlaWdodD0iNi41MTY5Mzk2bW0iCiAgIHdpZHRoPSIxMC4xNTE4MTFtbSI+CiAgPGRlZnMKICAgICBpZD0iZGVmczQiIC8+CiAgPG1ldGFkYXRhCiAgICAgaWQ9Im1ldGFkYXRhNyI+CiAgICA8cmRmOlJERj4KICAgICAgPGNjOldvcmsKICAgICAgICAgcmRmOmFib3V0PSIiPgogICAgICAgIDxkYzpmb3JtYXQ+aW1hZ2Uvc3ZnK3htbDwvZGM6Zm9ybWF0PgogICAgICAgIDxkYzp0eXBlCiAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4KICAgICAgICA8ZGM6dGl0bGU+PC9kYzp0aXRsZT4KICAgICAgPC9jYzpXb3JrPgogICAgPC9yZGY6UkRGPgogIDwvbWV0YWRhdGE+CiAgPGcKICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMjAyLjAxNDUxLC00MDcuMTIyMjUpIgogICAgIGlkPSJsYXllcjEiPgogICAgPHRleHQKICAgICAgIGlkPSJ0ZXh0MzMzNiIKICAgICAgIHk9IjYyOS41MDUwNyIKICAgICAgIHg9IjI5MS40Mjg1NiIKICAgICAgIHN0eWxlPSJmb250LXN0eWxlOm5vcm1hbDtmb250LXdlaWdodDpub3JtYWw7Zm9udC1zaXplOjQwcHg7bGluZS1oZWlnaHQ6MTI1JTtmb250LWZhbWlseTpzYW5zLXNlcmlmO2xldHRlci1zcGFjaW5nOjBweDt3b3JkLXNwYWNpbmc6MHB4O2ZpbGw6IzAwMDAwMDtmaWxsLW9wYWNpdHk6MTtzdHJva2U6bm9uZTtzdHJva2Utd2lkdGg6MXB4O3N0cm9rZS1saW5lY2FwOmJ1dHQ7c3Ryb2tlLWxpbmVqb2luOm1pdGVyO3N0cm9rZS1vcGFjaXR5OjEiCiAgICAgICB4bWw6c3BhY2U9InByZXNlcnZlIj48dHNwYW4KICAgICAgICAgeT0iNjI5LjUwNTA3IgogICAgICAgICB4PSIyOTEuNDI4NTYiCiAgICAgICAgIGlkPSJ0c3BhbjMzMzgiPjwvdHNwYW4+PC90ZXh0PgogICAgPGcKICAgICAgIGlkPSJ0ZXh0MzM0MCIKICAgICAgIHN0eWxlPSJmb250LXN0eWxlOm5vcm1hbDtmb250LXZhcmlhbnQ6bm9ybWFsO2ZvbnQtd2VpZ2h0Om5vcm1hbDtmb250LXN0cmV0Y2g6bm9ybWFsO2ZvbnQtc2l6ZTo0MHB4O2xpbmUtaGVpZ2h0OjEyNSU7Zm9udC1mYW1pbHk6Rm9udEF3ZXNvbWU7LWlua3NjYXBlLWZvbnQtc3BlY2lmaWNhdGlvbjpGb250QXdlc29tZTtsZXR0ZXItc3BhY2luZzowcHg7d29yZC1zcGFjaW5nOjBweDtmaWxsOiMwMDAwMDA7ZmlsbC1vcGFjaXR5OjE7c3Ryb2tlOm5vbmU7c3Ryb2tlLXdpZHRoOjFweDtzdHJva2UtbGluZWNhcDpidXR0O3N0cm9rZS1saW5lam9pbjptaXRlcjtzdHJva2Utb3BhY2l0eToxIj4KICAgICAgPHBhdGgKICAgICAgICAgaWQ9InBhdGgzMzQ1IgogICAgICAgICBzdHlsZT0iZmlsbDojMzMzMzMzO2ZpbGwtb3BhY2l0eToxIgogICAgICAgICBkPSJtIDIzNy41NjY5Niw0MTMuMjU1MDcgYyAwLjU1ODA0LC0wLjU1ODA0IDAuNTU4MDQsLTEuNDczMjIgMCwtMi4wMzEyNSBsIC0zLjcwNTM1LC0zLjY4MzA0IGMgLTAuNTU4MDQsLTAuNTU4MDQgLTEuNDUwOSwtMC41NTgwNCAtMi4wMDg5MywwIEwgMjIwLDQxOS4zOTM0NiAyMDguMTQ3MzIsNDA3LjU0MDc4IGMgLTAuNTU4MDMsLTAuNTU4MDQgLTEuNDUwODksLTAuNTU4MDQgLTIuMDA4OTMsMCBsIC0zLjcwNTM1LDMuNjgzMDQgYyAtMC41NTgwNCwwLjU1ODAzIC0wLjU1ODA0LDEuNDczMjEgMCwyLjAzMTI1IGwgMTYuNTYyNSwxNi41NDAxNyBjIDAuNTU4MDMsMC41NTgwNCAxLjQ1MDg5LDAuNTU4MDQgMi4wMDg5MiwwIGwgMTYuNTYyNSwtMTYuNTQwMTcgeiIgLz4KICAgIDwvZz4KICA8L2c+Cjwvc3ZnPgo=");
	  background-position: right center;
	  background-repeat: no-repeat;
		background-size: 1ex;
		background-origin: content-box;
	  border-color: #cccccc;
	  border-radius: .2em;
	  border-style: solid;
	  border-width: 1px;
	  border-right-color: #999999;
	  border-bottom-color: #999999;
	  color: black;
	  padding: .33em .5em;
	  width: 100%;
	}

	select::-ms-expand {
	  display: none;
	}

	#tableFilter {
		font-size: 1em !important; /* currently ems cause chrome bug misinterpreting rems on body element */
		line-height: 1.2!important;
		font-weight: normal!important;
	}
	#tableFilter > td {
		min-width: 120px;
	}


</style>


<div class="container">

			<div class="row">
					<div class="twelve columns ">
						<h6 class="docs-header">facturas</h6>
				</div>
			</div>

</div>

<div class="container">

			<div class="row">
				<?php echo $this->Form->create('PerformanceReference',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>
				<?php
				echo '<div class="three columns input-group">';
				echo '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
				echo
							$this->Form->input
																(
																	'performance_dateini',
																	 array
																				(
																					'type'=>'text',
																					'class'=>'performance_dateini u-full-width form-control',
																					'id'=>'from',
																					'placeholder' => 'Fecha Inicio',
																					'div'=>FALSE,
																					'label'=>FALSE
																				)
																);
				echo '</div>';
				echo '<div class="three columns input-group">';
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
																					'div'=>FALSE,
																					'label'=>FALSE
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
																						'empty'=>'Unidad de Negocio'

																					)
																	);
					echo '</div>';
				?>


				<?php
						// echo $this->Form->input('PerformanceReference.status',array('type'=>'hidden','class'=>'form-control','value'=>'1'))
				?>

				<!-- <div class="pull-right"> -->
					<!-- <?php echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));?> -->
				<!-- </div> -->

				<div class="label">
					<?php
								echo
										$this->Html->link(
																				__('Buscar ...', true),
										 										array('action' => 'get', null),
																				array('id'=>'send_query','div'=>false,'class'=>'btn btn-primary btn-sm pull-right')
																			);
					?>
				</div>

			</div>

		</div>
		<!--container-->

		<div class="">
			&nbsp;
		</div>


		<div id="printThis" class="container ninja-scroll">
			<div id="updateSearchResult" class="updateSearchResult"></div>
		</div>


<!-- =======================
				start old crud
		 ======================= -->


		<script type="text/javascript">

    // <!&#91;CDATA&#91;
        $(document).ready(function (){

				// NOTE send the post/get data
					$("#send_query").on('click', function(event) {

						event.stopPropagation();
						event.preventDefault();
						var data_code = $(this).attr('id');
						var serial = JSON.stringify($("#pform").serializeArray());
						console.log(serial);
						data_code = base64_encode(serial);
						console.log(data_code);
						var urlStruct = "<?php echo Dispatcher::baseUrl();?>/PerformanceReferences/get/data:"+data_code;
						console.log(urlStruct);
						// NOTE update live
						// $(".updateSearchResult").load(urlStruct);

						console.log("loaded...");

						$( ".updateSearchResult" ).load(urlStruct,function() {

							var id = function (id){
					        return document.getElementById(id);
					    };
					    var table = id('tableFilter');
					    var totRowIndex = table.getElementsByTagName('tr').length;
					    var tfConfig = {
					        base_path: '<?php e($this->webroot.'js/devoops/tablefilter/dist/tablefilter/');?>',
									// single_filter: true,
									col_0: 'select',
									rows_counter: {
			                text: 'Facturas: '
			            },
									// allows Bootstrap table styling
									themes: [{
											name: 'transparent'
									}],
									highlight_keywords: true,
									auto_filter: true,
									auto_filter_delay: 100, //milliseconds
									// popup_filters: true,
					        // filters_row_index: 1,
									help_instructions:false,
					        alternate_rows: false,
					        btn_reset: true,
									btn_reset_text: 'Limpiar',
									clear_filter_text: 'Limpiar',
					        loader: true,
					        // status_bar: true,
									paging: {
										length: 15,
					          results_per_page: ['Records: ', [ 25, 50, 100 , 200, 400]]
					        },
									loader: {
					          html: '<div id="lblMsg"></div>',
					          css_class: 'myLoader'
					        },
					        exclude_rows: [totRowIndex],
									extensions:[
											{
										             name: 'colsVisibility',
										             text: 'Hide',
																 at_start: [2,3,4],
										             enable_tick_all: true
										            //  btn_target_id: 'colsBtn'
											},
					            {
					                name: 'colOps',
					                id: ['mean1','mean2','mean3','mean4'],
					                col: [7,9,11,13],
					                operation: ['mean','mean','mean','mean'],
					                write_method: ['innerhtml', 'innerhtml'],
					                exclude_row: [totRowIndex],
					                decimal_precision: [2, 2],
					                tot_row_index: [totRowIndex],
					                format_result: [
					                  { prefix: '<span class="avg">x</span> ' },
														{ prefix: '<span class="avg">x</span> ' },
														{ prefix: '<span class="avg">x</span> ' },
														{ prefix: '<span class="avg">x</span> ' }
					                ]
					            }
					        ]
					    };
					    var tf = new TableFilter('tableFilter', tfConfig);
					    tf.init();

							// document.getElementsByClassName("helpCont").innerHTML = "New text!";

							// NOTE call to add update
							$("a[id^='get_factura_']").on('click', function(event) {
									event.stopPropagation();
									event.preventDefault();

									console.log($(this));
									console.log( $(this).attr('id') );
									var post_data = {
																		'performance_customers_id':$(this).attr('data-id'),
																		'performance_references_id':$(this).attr('data-reference'),
																		'performance_bsus_id':$(this).attr('data-empresa')
																	};

									var str_to_pass = JSON.stringify(post_data);

								  console.log(str_to_pass);

									data_code = base64_encode(str_to_pass);

									var urlStruct = "<?php echo Dispatcher::baseUrl();?>/PerformanceFacturas/add/data:" + data_code;
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

												 $("#add_update").on('click',function(){

													event.stopPropagation();
													event.preventDefault();

													console.log($(this).attr('data-update'));
												 	var post_serial = JSON.stringify($("#post_form").serializeArray());
													console.log(post_serial);
													post_data_code = base64_encode(post_serial);
													console.log(post_data_code);

									 				$.post("<?php echo Dispatcher::baseUrl();?>/PerformanceFacturas/add/save:"+ post_data_code)
													.done(function(data){
														$.colorbox.close();
														document.getElementById("send_query").click();
														console.log('loaded_table');
													});
													// $.colorbox();

												 });
											 }
									});

							}); // NOTE Edit add etc stuff

							// NOTE PRINT
							$("#print").on('click',function(e){
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

						});

					});//send

// https://mega.nz/#!y8knDKQb!M63J1wP0KrcVfBDQuDzJYr-cGdUMb8XqD04g4nJUZmw


				// filter results the firts optionbox
					$(".search_value").select2();

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
				          // numberOfMonths: 3
				        })
				        .on( "change", function() {
				          to.datepicker( "option", "minDate", getDate( this ) );
				        }).datepicker('widget').wrap('<div class="ll-skin-skeleton"/>'), // NOTE Apparently just need call ones
				      to = $( "#to" ).datepicker({
				        // defaultDate: "+1w",
				        // changeMonth: true,
				        numberOfMonths: 2
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
