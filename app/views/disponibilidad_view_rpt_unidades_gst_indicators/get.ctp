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
		* @package       PerformanceReferences
		* @subpackage    Get
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
				// var_dump($rendViewFullGstCoreIndicators);exit();

		?>

<style>
	.xts{
		/*visibility:hidden;*/
		display:none; 
	}
</style>


<div style="display:none;">
		<div id="json_one">
			<?php print($json_parsing_level_one) ?>
		</div>
		<div id="json_two">
			<?php print($json_parsing_level_two) ?>
		</div>
</div>

	<div class="row head_datetime">
		<div>&nbsp;</div>

			<div class="six columns"></div>

			<div class="one columns dash_datetime">
				Periodo
			</div>
			<div class="one columns dash_datetime">
				del
			</div>
			<div id="date-ini" class="one columns dash_datetime">
				<?php echo $dashboard['inicio'] ?>
			</div>
			<div class="one columns dash_datetime">
				al
			</div>
			<div id="date-end" class="one columns dash_datetime">
				<?php echo $dashboard['fin'] ?>
			</div>

			<div class="one columns dash_datetime pull-right">
				Unidad de Negocio <?php echo $dashboard['bsu'] ?>
			</div>

		<div>&nbsp;</div>
	</div>



	<div class="row noprint">
		<?php	echo $this->Session->flash();?>
	</div>

	<div class="row noprint">

		<div class="two colums">

		</div>

		<div class="ten colums">
			<!-- <input type="text" id="kwd_search" value="" placeholder="Buscar"/> -->

			<!-- <a id="details" class="button button-primary" href="#">Totales</a>

			<a id="charting" class="button button-primary" href="#">Graficas</a>

			<a id="upd_checkboxes" class="button button-primary" href="#">Guardar</a> -->

			<div <?php $user_mod ? print 'id="noprint" style="display:none;"' : print 'id="print"' ; ?> class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>


	<div class="row">
 	 <div class="twelve columns">
 		 <div id="chart" class="chart" >
 					 <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">
 						 <!-- graphics -->
 					 </div>
 		 </div>
 	 </div>
  </div>

<div class="con">
<div id="cont" style="height: 20px; margin: 0 auto"></div>
</div>


<div class="row">
<?php
echo '<div class="two columns"><i class="fa fa-barcode"></i></div>';
echo '<div class="two columns"></div>';
echo
			$this->Form->input
												(
													'searchbox',
													 array
																(
																	'type'=>'text',
																	'class'=>'search_udn u-full-width form-control',
																	'id'=>'FilterAll',
																	'placeholder' => 'Filtro General',
																	// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																	// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																	'div'=>FALSE,
																	'label'=>FALSE,
																	// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
																	'tabindex'=>'2'
																)
												);
	echo '</div>';
 ?>
 </div>






<div id="first-datatable-output" class="table-responsive">

		<?php echo $this->element('kml/Disponibilidad/table_one');?>

		<?php echo $this->element('kml/Disponibilidad/table_2nd_section');?>

		<?php echo $this->element('kml/Disponibilidad/table_three');?>

</div>

<!-- if clients -->
<script type="text/javascript">
$(document).ready(function(){


	// const isEmptyValue = (value) => {
	//     if (value === '' || value === null || value === undefined) {
	//         return true
	//     } else {
	//         return false
	//     }
	// }


// ================================================================================================================== //
// Historical view mechanism
// ================================================================================================================== //
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

// ================================================================================================================== //
// Historical view mechanism
// ================================================================================================================== //
						// NOTE add group by customer name update
						$("a[id^='historical_']").on('click',function(event){
							event.stopPropagation();
							event.preventDefault();
							// console.log($(this));
							console.log( $(this).attr('data-unidad') );
							var posted_data = {
																'unidad':$(this).attr('data-unidad')
															};
							var string_to_pass = JSON.stringify(posted_data);
							console.log(string_to_pass);
							datascode = base64_encode(string_to_pass);
							var urlStructure = "<?php echo Dispatcher::baseUrl();?>/DisponibilidadViewRptUnidadesGstIndicators/view/data:" + datascode;
							console.log(urlStructure);
							$.colorbox({
								'href' : urlStructure,
								'scrolling' : true ,
								'trapFocus' :	true ,
								'width' : "90%" ,
								'height' : "90%" ,
								'fixed' : true
							}); // end calling colorbox

						}); // grouping end
// ================================================================================================================== //
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
								dateFormat: 'yy-mm-dd',
								firstDay: 1,
				//				numberOfMonths: 2,
								isRTL: false,
								showMonthAfterYear: false,
								yearSuffix: ''
								};
								$.datepicker.setDefaults($.datepicker.regional['es']);

						$( function() {
					    // var dateFormat = "mm/dd/yy",
					      from = $( ".calendar" )
					        .datepicker({
					          // defaultDate: "+1w",
					          // changeMonth: true,
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
					  }
					);



		$(".update_status").select2(
			// width: 'resolve' // need to override the changed default
		);

		$(".update_status").on('select2:select', function (e) {
				// e.stopPropagation();
				// e.preventDefault();
		    var data = e.params.data;
		    // console.log(data);
				console.log(this);
				console.log($(this).attr('data-unidad'));
				console.log($(this).val());
				// console.log($(this).text());

				var description = "description_"+$(this).attr('data-unidad');
				var compromise = "compromise_"+$(this).attr('data-unidad');
				var user_id = $(this).attr('data-user');
				// alert(user_id);
// or ajax

				// desc = document.getElementById(description).innerText;
				// comp = document.getElementById(compromise).innerText;

				desc = document.getElementById(description).value;
				comp = document.getElementById(compromise).value;
				isval = $(this).val();

				if (isval == 6 ) {
					desc = '-';
					comp = "<?php echo date('Y-m-d H:i:s') ?>";
				}

				console.log('desc : ' + desc);
				console.log('comp : ' + comp);
				console.log('isval : ' + isval);

				if ( (desc === '' || desc === null || desc === undefined) || (comp === '' || comp === null || comp === undefined) ) {
						// return true
						console.log('void');
						alert('descripcion y compromiso son obligatorios');
						save = true
				} else {
						// return false
						console.log('notvoid');
						save = false
				var post_data = {
													'unidad':$(this).attr('data-unidad'),
													'id_status':$(this).val(),
													'user_id':user_id,
													'description':desc,
													'compromise':comp
												};

				var str_to_pass = JSON.stringify(post_data);
				console.log(str_to_pass);
				data_code = base64_encode(str_to_pass);
				var urlStruct = "<?php echo Dispatcher::baseUrl();?>/DisponibilidadViewRptUnidadesGstIndicators/add/save:" + data_code;
				console.log(urlStruct);

				// Assign handlers immediately after making the request,
// and remember the jqxhr object for this request
						var jqxhr = $.post( urlStruct, function() {
						  alert( "Registro Actualizado" );
							// document.body.inninnerHTML
						})
						  // .done(function() {
						  //   alert( "second success" );
						  // })
						  .fail(function() {
						    alert( "error" );
						  })
						  // .always(function() {
						  //   alert( "finished" );
						  // });
				}
		});

/*
			Highcharts.chart('the-chart', {
					chart: {
							type: 'column',
							// type: 'column',
							backgroundColor: {
							            linearGradient: [0, 0, 500, 500],
							            stops: [
							                [0, 'rgb(255, 255, 255)'],
							                [1, 'rgb(240, 240, 255)']
							            ]
							 }
					},
					width:1200,
					title: {
							text: 'Indicadores de Disponibilidad de Unidades'
					},
					credits:{enabled:false},
					// colors: ['#058DC7','#3398d6','#6c99bb','#50B432','#b4c973', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'], // orig
					colors: ['#00649f','#01aac1','#00dbe7','#97ecc5','#1fab89','#62d2a2','#9df3c4','#d7fbe8','#f67280','#c06c84','#6c5b7b','#355c7d','#ffb400','#fffbe0','#2994b2','#474744'], // theme colores
					// colors:['#1a1334','#26294a',' #01545a','#017351','#03c383','#aad962','#fbbf45','#ef6a32','#ed0345','#a12a5e','#710162','#110141'], // darks theme
					// colors:["#bfb7e6", "#7d86c1", "#403874", "#261c4e", "#1f0937", "#574331", "#9d9121", "#a49959", "#b6b37e", "#91a3f5"], //cold_water
					// colors:["#043227", "#097168", "#ffcc88", "#fa482e", "#f4a32e"], // oldPapers
					// theme trover
					// colors:["#51574a", "#447c69", "#74c493", "#8e8c6d", "#e4bf80", "#e9d78e", "#e2975d", "#f19670", "#e16552", "#c94a53", "#be5168", "#a34974", "#993767", "#65387d", "#4e2472", "#9163b6", "#e279a3", "#e0598b", "#7c9fb0", "#5698c4", "#9abf88"],
					subtitle: {
							// text: 'Click en las columnas para ver el detalle del porcentaje por Unidad.'
					},
//					xAxis: {
//							type: 'category'
//					},
				  xAxis: {
							allowDecimals: false,
							labels: {
									formatter: function () {
											return this.value; // clean, unformatted number for year
									}
							},
							accessibility: {
									rangeDescription: 'Range: 1940 to 2017.'
							}
					},
					yAxis: {
							title: {
									text: 'Numero de Unidades'
							}
					},
					legend: {
							enabled: false
					},


//				plotOptions: {
//						series: {
//								borderWidth: 0,
//								dataLabels: {
//										enabled: true,
//										format: '{point.y}'
//								}
//						}
//				},

					plotOptions: {
							area: {
									pointStart: 1940,
									marker: {
											enabled: false,
											symbol: 'circle',
											radius: 2,
											states: {
													hover: {
															enabled: true
													}
											}
									}
							}
					},
					tooltip: {
							headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
							pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Unidades <br/>'
					},

					series: [ <?php print($json_parsing_level_one) ?> ]
// NOTE PIE CHART
					series: [{
							name: 'Unidades',
							colorByPoint: true,
							data: [ <?php print($json_parsing_level_one) ?> ]
					}]  //,
					// drilldown: {
					// 		series: [ <?php //print($json_parsing_level_two) ?> ]
					// }
			}); // End the chart
			//NOTE A New Chart Approach 
			//
*/

Highcharts.chart('the-chart', {

	credits:{enabled:false},
  // colors: ['#00649f','#01aac1','#00dbe7','#97ecc5','#1fab89','#62d2a2','#9df3c4','#d7fbe8','#f67280','#c06c84','#6c5b7b','#355c7d','#ffb400','#fffbe0','#2994b2','#474744'], // theme colores
 	//colors: ['#058DC7','#3398d6','#6c99bb','#50B432','#b4c973', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'], // orig
 //	colors: ['#00649f','#01aac1','#00dbe7','#97ecc5','#1fab89','#62d2a2','#9df3c4','#d7fbe8','#f67280','#c06c84','#6c5b7b','#355c7d','#ffb400','#fffbe0','#2994b2','#474744'], // theme colores
 //	NOTE ADD Current Pallete
// 	 colors:['#1a1334','#26294a',' #01545a','#017351','#03c383','#aad962','#fbbf45','#ef6a32','#ed0345','#a12a5e','#710162','#110141'], // darks theme
 //	 colors:["#bfb7e6", "#7d86c1", "#403874", "#261c4e", "#1f0937", "#574331", "#9d9121", "#a49959", "#b6b37e", "#91a3f5"], //cold_water
 //	 colors:["#043227", "#097168", "#ffcc88", "#fa482e", "#f4a32e"], // oldPapers
 	// theme trover
 //	 colors:["#51574a", "#447c69", "#74c493", "#8e8c6d", "#e4bf80", "#e9d78e", "#e2975d", "#f19670", "#e16552", "#c94a53", "#be5168", "#a34974", "#993767", "#65387d", "#4e2472", "#9163b6", "#e279a3", "#e0598b", "#7c9fb0", "#5698c4", "#9abf88"],

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
   text: 'GST'
	},
  xAxis: {
		categories: ['Unidades'],
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
    title: {
      text: 'Porcentaje'
		},
		plotLines: [{
				color: 'red',
				width: 0.5,
				value: 90,
				label: {
						text: 'Limit',
						style: {
								color: 'blue',
								fontWeight: 'bold'
						}
				}
		}]
  },
  tooltip: {
    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} Unidades)<br/>',
    split: true
	},
  plotOptions: {
		column: {
      dataLabels: {
            enabled: true,
//            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.percentage:.1f} % ({point.y:,.0f} {series.name})', // one decimal
						y: 10, // 10 pixels down from the top
//            shape: 'callout',
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
      },
			pointWidth: 50,
			borderRadius: 5,
      stacking: 'percent',
      lineColor: '#ffffff',
      lineWidth: 1,
      marker: {
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
  series: [ <?php print($json_parsing_level_one) ?> ]
});


}); //NOTE End Of the Document
</script>
