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
		$requiere = $evaluate ? e($this->element('kml/Disponibilidad/disponibilidad')) : e($this->element('requiere/norequiere') );
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
								<h6 class="docs-header">Indicador de Disponibilidad de Unidades</h6>
						</div>
					</div>

		</div>




		<div class="container-mod">
<!-- ['BalanzaViewUdnsRpt']['Empleado'] -->
					<div class="row">
						<?php echo $this->Form->create('DisponibilidadViewRptUnidadesGstIndicator',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>
						<?php
						// echo '<div class="two columns input-group">';
						// echo '<div class="input-group-addon"><i class="fa fa-user"></i></div>';
						// echo
						// 			$this->Form->input
						// 												(
						// 													'units_type',
						// 													 array
						// 																(
						// 																	'type'=>'hidden',
						// 																	'class'=>'search_udn u-full-width form-control init-focus',
						// 																	'id'=>'units_type',
						// 																	'placeholder' => 'Periodo',
						// 																	'alt'=>'Puede teclear la fecha en Formato yyyymm',
						// 		                              'title'=>'Puede teclear la fecha en Formato yyyymm',
						// 																	'div'=>FALSE,
						// 																	'label'=>FALSE,
						// 																	'value'=>$units_type,
						// 																	// 'options'=> array('201901'=>'Enero','201902'=>'Febrero','201903'=>'Marzo'),
						// 																	'tabindex'=>'1'
						// 																)
						// 												);
						// echo '</div>';

						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-truck"></i></div>';
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
																							'empty' => 'TODO',
																							'options'=>$bssus,
																							'tabindex'=>'2'
																						)
																		);
							echo '</div>';
/*
							echo '<div class="two columns input-group">';
							echo '<div class="input-group-addon"><i class="fa fa-object-ungroup" aria-hidden="true"></i></div>';
							echo
										$this->Form->input
																			(
																				'id_flota',
																				 array
																							(
																								'type'=>'select',
																								'class'=>'search_udn u-full-width form-control init-focus',
																								'id'=>'from',
																								'placeholder' => 'Flota',
																								// 'alt'=>'Puede teclear la fecha en Formato yyyymm',
									                              // 'title'=>'Puede teclear la fecha en Formato yyyymm',
																								'div'=>FALSE,
																								'label'=>FALSE,
																								'options'=> array('1'=>'GRANEL','2'=>'TERCEROS'),
																								'empty' => 'TODO',
																								// 'options'=> $operacion,
																								'tabindex'=>'1'
																							)
																			);
							echo '</div>';
 */
							echo '<div class="two columns input-group">';
							echo '<div class="input-group-addon"><i class="fa fa-object-ungroup" aria-hidden="true"></i></div>';
							echo
										$this->Form->input
																			(
																				'id_tipo_operacion',
																				 array
																							(
																								'type'=>'select',
																								'class'=>'search_udn u-full-width form-control init-focus',
																								'id'=>'operation',
																								'placeholder' => 'Operacion',
																								// 'alt'=>'Puede teclear la fecha en Formato yyyymm',
									                              // 'title'=>'Puede teclear la fecha en Formato yyyymm',
																								'div'=>false,
																								'label'=>false,
																							//	'multiple'=>'multiple',
																						//	'style'=>'width:45%',
																								//
																								'options'=>$tipoOperacion,
																							//	'empty' => 'TODO',
																								'tabindex'=>'1'
																							)
																			);
 						echo '</div>';


							echo '<div class="two columns input-group">';
							echo '<div class="input-group-addon"><i class="fa fa-object-ungroup" aria-hidden="true"></i></div>';
							echo
										$this->Form->input
																			(
																				'units_types',
																				 array
																							(
																								'type'=>'select',
																								'class'=>'search_udn u-full-width form-control init-focus',
																								'id'=>'unit_type',
																								'placeholder' => 'Tipo de Unidad',
																								// 'alt'=>'Puede teclear la fecha en Formato yyyymm',
									                              // 'title'=>'Puede teclear la fecha en Formato yyyymm',
																								'div'=>false,
																								'label'=>false,
																							//	'multiple'=>'multiple',
																						//	'style'=>'width:45%',
																								//
																								'options'=>array(1=>'TRATOCAMIONES',2=>'REMOLQUES',4=>'DOLLYS'),
																								'empty' => 'TODO',
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

<!--							<div class="row"> -->
<!--							 <div class="twelve columns">-->

										<!-- NOTE Start Carrousell -->
<!--									  <div style="margin:25px;"> -->
													<?php echo $this->element('kml/Disponibilidad/carrousel');?>
										<!-- NOTE End Of the Carrousell -->
<!--										</div> -->
<!--								 </div>-->
<!--							 </div> -->

					</div>
				</div>



				<div id="breakspace" class="">
					&nbsp;
				</div>



	<script type="text/javascript">
		  $(document).ready(function () {

// NOTE Tractocamiones
Highcharts.chart('lineChart1', {

	credits:{enabled:false},
 //	colors:['#1a1334','#26294a',' #01545a','#017351','#03c383','#aad962','#fbbf45','#ef6a32','#ed0345','#a12a5e','#710162','#110141'], // darks theme
  chart: {
				type: 'column',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
            minWidth: 600
        }
  },
  title: {
    text: 'Indicadores de Disponibilidad de Unidades'
  },
	subtitle: {
   text: 'Tractocamiones'
	},
  xAxis: {
	categories: [<?php print("'".implode("','",$bssus)."'") ?>],
    tickmarkPlacement: 'on',
    title: {
      enabled: false
    }
  },
  yAxis: {
    labels: {
      format: '{value}%'
    },
    min:0,
		max:100,
    title: {
      text: 'Porcentaje'
		},
		plotLines: [{
				color: 'red',
				width: 2.5,
				value: 90,
				label: {
						text: 'Limite',
						style: {
								color: 'blue',
								fontWeight: 'bold'
						}
				}
		}]
  },
  tooltip: {
    pointFormat: '<span style="color:black;">{series.name}</span>: ({point.y:,.0f}%)<br/>',
    split: true
	},
  plotOptions: {
		column: {
      dataLabels: {
            enabled: true,
//            rotation: -30,
            color: '#FFFFFF',
            align: 'right',
//            format: '{point.percentage:.1f} % ({point.y:,.0f} {series.name})', // one decimal
            format: '{point.y:,.0f} %', // one decimal
						y: 10, // 10 pixels down from the top
            shape: 'callout',
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
      },
			pointWidth: 50,
			borderRadius: 5 ,
      stacking: 'normal',
			lineColor: '#ffffff',
// Add to try points
/*			states: {
								hover: {
											  lineWidthPlus: 0
											 }
							},
*/
      lineWidth: 1,
			marker: {
/*				enabled: true,
				radius: 2
*/
        lineWidth: 1,
				lineColor: '#ffffff'
      },
      accessibility: {
        pointDescriptionFormatter: function (point) {
          function round(x) {
            return Math.round(x * 100) / 100;
          }
          return (point.index + 1) + ', ' + point.category + ', ' +
            point.y + ' unidades, ' + round(point.percentage) + '%, ' +
            point.series.name;
        }
      }
    }
  },
  series: [ <?php print($json_parsing_level_index[1]) ?> ]
});


// NOTE Remolques
Highcharts.chart('lineChart2', {

	credits:{enabled:false},
 //	colors:['#1a1334','#26294a',' #01545a','#017351','#03c383','#aad962','#fbbf45','#ef6a32','#ed0345','#a12a5e','#710162','#110141'], // darks theme
  chart: {
				type: 'column',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
            minWidth: 600
        }
  },
  title: {
    text: 'Indicadores de Disponibilidad de Unidades'
  },
	subtitle: {
   text: 'Remolques'
	},
  xAxis: {
	categories: [<?php print("'".implode("','",$bssus)."'") ?>],
    tickmarkPlacement: 'on',
    title: {
      enabled: false
    }
  },
  yAxis: {
    labels: {
      format: '{value}%'
    },
    min:0,
		max:100,
    title: {
      text: 'Porcentaje'
		},
		plotLines: [{
				color: 'red',
				width: 2.5,
				value: 90,
				label: {
						text: 'Limite',
						style: {
								color: 'blue',
								fontWeight: 'bold'
						}
				}
		}]
  },
  tooltip: {
    pointFormat: '<span style="color:black;">{series.name}</span>: ({point.y:,.0f}%)<br/>',
    split: true
	},
  plotOptions: {
		column: {
      dataLabels: {
            enabled: true,
//            rotation: -30,
            color: '#FFFFFF',
            align: 'right',
//            format: '{point.percentage:.1f} % ({point.y:,.0f} {series.name})', // one decimal
            format: '{point.y:,.0f} %', // one decimal
						y: 10, // 10 pixels down from the top
            shape: 'callout',
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
      },
			pointWidth: 50,
			borderRadius: 5 ,
      stacking: 'normal',
			lineColor: '#ffffff',
// Add to try points
/*			states: {
								hover: {
											  lineWidthPlus: 0
											 }
							},
*/
      lineWidth: 1,
			marker: {
/*				enabled: true,
				radius: 2
*/
        lineWidth: 1,
				lineColor: '#ffffff'
      },
      accessibility: {
        pointDescriptionFormatter: function (point) {
          function round(x) {
            return Math.round(x * 100) / 100;
          }
          return (point.index + 1) + ', ' + point.category + ', ' +
            point.y + ' unidades, ' + round(point.percentage) + '%, ' +
            point.series.name;
        }
      }
    }
  },
  series: [ <?php print($json_parsing_level_index[2]) ?> ]
});

// NOTE Dollys
Highcharts.chart('lineChart3', {

	credits:{enabled:false},
 //	colors:['#1a1334','#26294a',' #01545a','#017351','#03c383','#aad962','#fbbf45','#ef6a32','#ed0345','#a12a5e','#710162','#110141'], // darks theme
  chart: {
				type: 'column',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
            minWidth: 600
        }
  },
  title: {
    text: 'Indicadores de Disponibilidad de Unidades'
  },
	subtitle: {
   text: 'Dollys'
	},
  xAxis: {
	categories: [<?php print("'".implode("','",$bssus)."'") ?>],
    tickmarkPlacement: 'on',
    title: {
      enabled: false
    }
  },
  yAxis: {
    labels: {
      format: '{value}%'
    },
    min:0,
		max:100,
    title: {
      text: 'Porcentaje'
		},
		plotLines: [{
				color: 'red',
				width: 2.5,
				value: 90,
				label: {
						text: 'Limite',
						style: {
								color: 'blue',
								fontWeight: 'bold'
						}
				}
		}]
  },
  tooltip: {
    pointFormat: '<span style="color:black;">{series.name}</span>: ({point.y:,.0f}%)<br/>',
    split: true
	},
  plotOptions: {
		column: {
      dataLabels: {
            enabled: true,
//            rotation: -30,
            color: '#FFFFFF',
            align: 'right',
//            format: '{point.percentage:.1f} % ({point.y:,.0f} {series.name})', // one decimal
            format: '{point.y:,.0f} %', // one decimal
						y: 10, // 10 pixels down from the top
            shape: 'callout',
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
      },
			pointWidth: 50,
			borderRadius: 5 ,
      stacking: 'normal',
			lineColor: '#ffffff',
// Add to try points
/*			states: {
								hover: {
											  lineWidthPlus: 0
											 }
							},
*/
      lineWidth: 1,
			marker: {
/*				enabled: true,
				radius: 2
*/
        lineWidth: 1,
				lineColor: '#ffffff'
      },
      accessibility: {
        pointDescriptionFormatter: function (point) {
          function round(x) {
            return Math.round(x * 100) / 100;
          }
          return (point.index + 1) + ', ' + point.category + ', ' +
            point.y + ' unidades, ' + round(point.percentage) + '%, ' +
            point.series.name;
        }
      }
    }
  },
  series: [ <?php print($json_parsing_level_index[4]) ?> ]
});


// NOTE ALL
Highcharts.chart('lineChart4', {

	credits:{enabled:false},
 //	colors:['#1a1334','#26294a',' #01545a','#017351','#03c383','#aad962','#fbbf45','#ef6a32','#ed0345','#a12a5e','#710162','#110141'], // darks theme
  chart: {
				type: 'column',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
            minWidth: 600
        }
  },
  title: {
    text: 'Indicadores de Disponibilidad de Unidades'
  },
	subtitle: {
   text: 'Todo'
	},
  xAxis: {
	categories: [<?php print("'".implode("','",$bssus)."'") ?>],
    tickmarkPlacement: 'on',
    title: {
      enabled: false
    }
  },
  yAxis: {
    labels: {
      format: '{value}%'
    },
    min:0,
		max:100,
    title: {
      text: 'Porcentaje'
		},
		plotLines: [{
				color: 'red',
				width: 2.5,
				value: 90,
				label: {
						text: 'Limite',
						style: {
								color: 'blue',
								fontWeight: 'bold'
						}
				}
		}]
  },
  tooltip: {
    pointFormat: '<span style="color:black;">{series.name}</span>: ({point.y:,.0f}%)<br/>',
    split: true
	},
  plotOptions: {
		column: {
      dataLabels: {
            enabled: true,
//            rotation: -30,
            color: '#FFFFFF',
            align: 'right',
//            format: '{point.percentage:.1f} % ({point.y:,.0f} {series.name})', // one decimal
            format: '{point.y:,.0f} %', // one decimal
						y: 10, // 10 pixels down from the top
            shape: 'callout',
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
      },
			pointWidth: 50,
			borderRadius: 5 ,
      stacking: 'normal',
			lineColor: '#ffffff',
// Add to try points
/*			states: {
								hover: {
											  lineWidthPlus: 0
											 }
							},
*/
      lineWidth: 1,
			marker: {
/*				enabled: true,
				radius: 2
*/
        lineWidth: 1,
				lineColor: '#ffffff'
      },
      accessibility: {
        pointDescriptionFormatter: function (point) {
          function round(x) {
            return Math.round(x * 100) / 100;
          }
          return (point.index + 1) + ', ' + point.category + ', ' +
            point.y + ' unidades, ' + round(point.percentage) + '%, ' +
            point.series.name;
        }
      }
    }
  },
  series: [ <?php print($json_parsing_level_index[1]) ?> ]
});

// NOTE End Charts

//		var multiSelect = $(".search_udn").select2();
		
				$(".search_udn").select2();			
			

/*				function formatState (state) {
					if (!state.id) {
						console.log('state.text initialize ...')
						console.log(state.text)
						return state.text;
					}
					var baseUrl = "/user/pages/images/flags";
					var $state = $(
						'<span><img class="img-flag" /> <span></span></span>'
					);

				function set_all () {
						var ms = $("#operation").select2();
						ms.val(null).trigger("change");
						ms.val('A'); // Select the option with a value of '1'
						ms.trigger('change'); // Notify any JS components that the value changed
				}
				
				function search_all () {
//					var find_all = $("#operation").find(':selected');
					console.log( $("#operation").find(':selected').val() )
					console.log( $("#operation option[value='A']").attr('selected',true) )
//					console.log(find_all)
				}

					// Use .text() instead of HTML string concatenation to avoid script injection issues
					console.log('Who is $state ?')
					console.log($state)
					console.log('... and state.element ? ')
					console.log(state.element.value.toLowerCase()) // NOTE in value : element from options in select ex: G:GRANEL then to lowercase
*/

/*
					if (typeof state.element.value != 'number') {

										var alpha = state.element.value.toLowerCase();
										// NOTE check if the user as already select the ALL option
										if( alpha == 'a') {
											console.log('The user check all option then must clear the resti and set only All')
											set_all();

										} else {
									// NOTE after all check if all exits. 
											console.log('is not all ...')
											search_all();
											// FIRST check if All exists 
											if ( alpha == 'a' ) {
												
											}
									
											if ( alpha == 'g' ) {
													// NOTE search if exists the other granel and All options
											}
											
										} // NOTE end else ...
          }

					$state.find("span").text(state.text);
					$state.find("img").attr("src", baseUrl + "/" + state.element.value.toLowerCase() + ".png");

					console.log('find ... ?')
					console.log($state)

					return $state;
				};

				var operations = $("#operation").select2({
	//				  templateSelection: formatState
				});
*/

//console.log(operations);

					//NOTE ADD clearing method 			
/*
					$("#clear").on("click", function (evt) {
							evt.stopPropagation();
							evt.preventDefault();
							multiSelect.val(null).trigger("change");
					});
*/


//					console.log(multiSelect);



					$("#send_query").on('click', function(event) {

								event.stopPropagation();
								event.preventDefault();

// First than nothing check if the option all exists
//
/*								var is_all = $("#operation").select2();
								if () {
										
								}								
*/

								var data_code = $(this).attr('id');
								var serial = JSON.stringify($("#pform").serializeArray());
								console.log(serial);
								data_code = base64_encode(serial);
								console.log(data_code);
								var urlStruct = "<?php echo Dispatcher::baseUrl();?>/DisponibilidadViewRptUnidadesGstIndicators/get/data:"+data_code;
								console.log(urlStruct);
								console.log("loaded...");

								$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');

								// $( ".updateSearchResult" ).load(urlStruct);
								$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {
									// Add Table UIX
									//
									//NOTE merge global options with unique datatable options for disponibilidad 

									options_module = {...options_datatable,...options_disponibilidad}	;	
									

									var table_a = $('#table_grp').DataTable(
										Object.assign( {}, options_datatable
											, calculate_row([0])
										 )
									 );

									var table_b = $('#table_det').DataTable(
										Object.assign( {}
											, options_module
//											,calculate_row([13])
										)
									 );

									// var table_a = $('#table_grp').DataTable(options_datatable);
									// var table_b = $('#table_det').DataTable(options_datatable);
									// // End table
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
