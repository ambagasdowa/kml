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
		* @mail	     		 baizabal.jesus@gmail.com
		* @package       cake
		* @subpackage    cake.cake.console.libs.templates.views
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/
		?>

		<?php
		// SecureCalendar index
			// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
			$evaluate = false;
			$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
		?>

<?php
    /** =============================================  NOTE ALERT ==> start the making     =============================================   */
?>

<style>

	body {
		margin: 40px 10px;
		padding: 0;
/* 		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif; */
/* 		font-size: 14px; */
	}

	#calendar {
		max-width: 800px;
/* 		max-height: 900px; */
		margin: 0 auto;
	}

	/* unvisited link */
	.modded-link:link {
		display:block !important;
		background-color:#999 !important;
		color: #444 !important;
	}


/* 	.btn-success{ */
/* 		display: inline-block; !important; */
/* 		box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125); */
/* 	} */

	/* visited link */
/*	.modded-link:visited {
		color: green;
	}*/

	/* visited link */
	/*.modded-link:visited {
		background-color:#999;
		color: #444;
	}*/

	/* mouse over link */
	.modded-link:hover {
/* 		color: hotpink; */
		 font-weight: bold;
	}

	/* selected link */
	.modded-link:active {
		/*background-color:#999;
		color: #444;*/
	}

	.panel-default {
		background-color: rgba(255, 255, 255, 0.3) !important; /* Color white with alpha 0.9*/
	}


	/*GRID*/

		.grid_current {
				background-color: #b4c973 ;
		}

	/*ninja scroll XD*/

	/* Copyright 2013 Rob Wu <gwnRob@gmail.com>
	 * https://github.com/Rob--W/grab-to-pan.js
	 *
	 * grab.cur and grabbing.cur are taken from Firefox's repository.
	 **/
	/*.grab-to-pan-grab {
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
	}*/

	.scrollable {

		/*margin-left:1px;
		margin-right:1px;
	  overflow: hidden;
	  width: 99.9%;
	  height: 100%;*/


	/* 	inner box */
	    /*max-width: auto;*/
	    /*max-height: 6%;*/
		/* 	inner box */
	    /*background-color: #EEE;*/
	}
	.filler {

			/*width: 250%;*/

			 /* I don't want to type a huge wall of Lorem ipsum */
	    /*font-size: 34px;*/
	}


/*EXCEL SROLLER*/
/*

.fht-table,
.fht-table thead,
.fht-table tfoot,
.fht-table tbody,
.fht-table tr,
.fht-table th,
.fht-table td {
	margin: 0;
}*/
/*
.fht-table{
	border: 0 none;
	height: auto;
	width: auto;
	border-collapse: collapse;
	border-spacing: 0;*/
	/*table-layout: fixed;  Algoritmo de distribucion fijo */
  /*white-space:nowrap;   Impide los saltos de línea automáticos*/
/*}

.fht-table th,.fht-table td {
    overflow: hidden;
}

.fht-table-wrapper,
.fht-table-wrapper .fht-thead,
.fht-table-wrapper .fht-tfoot,
.fht-table-wrapper .fht-fixed-column .fht-tbody,
.fht-table-wrapper .fht-fixed-body .fht-tbody,
.fht-table-wrapper .fht-tbody {
	overflow: hidden;
	position: relative;
}

.fht-table-wrapper .fht-fixed-body .fht-tbody,
.fht-table-wrapper .fht-tbody {
	overflow: auto;
}

.fht-table-wrapper .fht-table .fht-cell {
	overflow: hidden;
	height: 1px;
}

.fht-table-wrapper .fht-fixed-column,
.fht-table-wrapper .fht-fixed-body {
	top: 0;
	left: 0;
	position: absolute;
}

.fht-table-wrapper .fht-fixed-column {
	z-index: 1;
}

.fht-fixed-body .fht-thead table {
	margin-right: 20px;
	border: 0 none;
}*/

/*For Examples*/

.ContenedorTabla {
	height: 600px;
	margin: 0 auto;
	overflow: auto;
	width: 100%;
	position: relative;
	overflow:hidden;
}

/*.header, .main {
    display: inline-block;
    height: auto;
    width: 100%;
}*/

/*style excel*/
.excel_cell{
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	/*font-size: 13px;*/
	font-weight:  normal;
	/*padding: 4px;*/
	/*white-space: pre-line;*/

}
._xls_cell {
	empty-cells: show;
	padding: 1px 0.5em;
}
._cell_header{
	background-color: #EEE;
}
._cell_Default{
	background-color: #FFF;
	/*text-align: left;*/
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

.real {
	width: 50%	;
}
.prep {
	width: 50%	;
}

</style>

<?php //NOTE this must come from AppConfig or from this controller at least ?>

<?php
    $mod_inx = $mod_inxd = $mod_index;
		$charting = $chart;
?>

<!--  Start container -->

	<div class="row-fluid">

	<div id="dashboard_links" class="col-xs-6 col-sm-2 pull-right">

            <ul id="tabbed" class="nav nav-pills nav-stacked">

                <?php foreach ($bsu as $idx_bsu => $bsu_names) {?>
                    <?php $bsu_name = str_replace(' ','_',$bsu_names); ?>
                    <li role="presentation" <?php $idx_bsu === $ui_bsu_index ? e('class="active"'): ' '; ?> >
                        <a href="<?php echo '#_'.$bsu_name.'_'.$idx_bsu ?>" id="<?php echo '_'.$bsu_name.'_'.$idx_bsu ?>_tab" data-toggle="tab">
                            <i class="fa fa-truck"></i>&nbsp;&nbsp;<?php e($bsu_label[$idx_bsu]);?>
                        </a>
                    </li>
                <?php }?>

			</ul>
	</div>


<!--
	ヘスス => Jesús
	あるべると => Aruberuto
	ベイザボール = baizabal
	イエス -- iesu
	ジーサス・ベイザボール Jīsasu beizabōru
-->


		<div class="col-xs-6 col-sm-10">
			<div id="tabbedContent" class='tab-content'>

        <?php foreach($bsu as $in => $sbunames) { // NOTE $sbunma is a control for the model ?>
            <?php $sbuname = str_replace(' ','_',$sbunames); // NOTE this act as a control for UI ?>
            <div class="tab-pane fade in <?php $in === $ui_bsu_index ? e('active'): ' '; ?>" id="<?php echo '_'.$sbuname.'_'.$in ?>">
                <div class="panel panel-default">
			<!-- Default panel contents -->
                    <div class="panel-heading">
											 	Panel de Indicadores de <?php e(ucwords(strtolower($bsu_label[$in])));?>
										</div>

                  <div id="start_tabs_nav">

										<div class="panel-body">
								          <ul class="nav nav-tabs nav-justified" role="tablist">
								              <?php foreach($mod_inxd as $nxm => $mod_nxm_name) { ?>
								                      <li role="presentation" class="<?php e($nxm == $ui_mod_index ? 'active':'');?> modded-link">
																					<a class="modded-link" href="<?php e('#nav_'.$mod_nxm_name.'_'.strtolower($sbuname).'_')?>" role="tab" data-toggle="tab" >
																						<?php e(ucwords(strtolower($mod_nxm_name)));?>
																					</a>
								                      </li>
								              <?php }?>
								          </ul>
								    </div>

			              <div class="tab-content">
			                  <?php foreach ($mod_index as $mod_inx => $mod_name) { ?> <?php //NOTE fetch the name of the module tons, kms etc ?>

			                  <div role="tabpanel" class="tab-pane fade in <?php e($mod_inx == $ui_mod_index ? 'active' : '');?>" id="<?php e('nav_'.$mod_name.'_'.strtolower($sbuname).'_')?>">

														<div id="<?php e('chart_'.$mod_name.'_'.strtolower($sbuname).'_')?>" style="min-width:78.7%; min-height: 400px; margin: 0 auto" >
															<?php e('chart_'.$mod_name.'_'.strtolower($sbuname).'_')?>
														</div>

														<div class="">
															&nbsp;
														</div>

															<div class="scrollable" id="<?php e('scroll_'.$mod_name.'_'.strtolower($sbuname).'_')?>" >
																<!-- <div class="filler ContenedorTabla"> -->
																<div class="ContenedorTabla">

																	<!-- /*wuicho => 921-1984184*/ -->




<!-- =============================================================== FIX ========================================================================= -->

			                             <!-- <table id="<?php e('table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" class="order-table table table-bordered table-hover table-striped responstable <?php e('table_'.$mod_name.'_'.strtolower($sbuname).'_')?>"> -->
																	 <table id="<?php e('table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" class="fht-table">
			                                  <?php //NOTE build the matrix with the header then months as titles and at last the fractions as a Y axis and inside this the data ?>
																			<thead>
		                                      <tr>
		                                          <!-- <th colspan="25" class="excel_cell _cell_header"><?php e(str_replace('_', ' ', $mod_name))?></th> -->
																							<th class="excel_cell _cell_header _xls_cell">
																									&nbsp;
																							</th>
																					<?php foreach ($months as $inx_val_month => $valei) {?>
																							<th colspan="2" class="">

																								<div class="<?php $inx_val_month == date('n') ? e('grid_current') : e('grid_td') ;?> excel_cell _cell_header _xls_cell">
																										<!-- <div id="<?php $inx_val_month == date('n') ? e('focus_search_'.$mod_name.'_'.strtolower($sbuname).'_') : e('grid'); ?>"> -->
																												<?php e(ucwords($valei));?>
																										<!-- </div> -->
																								</div>

																									<section class="_table">
																					          <div class="_row">
																					            <div class="excel_cell _cell_header _cell _xls_cell real">Real</div>
																					            <div class="excel_cell _cell_header _cell _xls_cell prep">Presupuesto</div>
																					          </div>

																					          <div class="_row">
																					            <div class="excel_cell _cell_header _cell _xls_cell real">
																												<?php isset($charting[$cyear][$mod_inx][$sbunames][ucwords($valei)]['Real']) ? __($charting[$cyear][$mod_inx][$sbunames][ucwords($valei)]['Real']) : __('&nbsp;'); ?>
																											</div>
																					            <div class="excel_cell _cell_header _cell _xls_cell prep">
																												<?php isset($charting[$cyear][$mod_inx][$sbunames][ucwords($valei)]['Presupuesto']) ? __($charting[$cyear][$mod_inx][$sbunames][ucwords($valei)]['Presupuesto']): __('&nbsp;'); ?>
																											</div>
																					          </div>
																					        </section>

																							</th>
																					<?php } ?>
		                                      </tr>

																				</thead>


																				<tbody>

			                                      <?php foreach ($fraction[$mod_inx] as $idx_name => $fract_arr) { // fetch accounts ?>

																						<tr>

	                                            <td class="excel_cell _cell_header _xls_cell" title="<?php e($idx_name)?>" alt="<?php e($idx_name)?>">
																								<?php e($fract_arr);?>
																							</td> <!--  hir must to get the changes  -->

																							<?php foreach($months as $idxm => $mth) { ?>

                                                <?php
																										//NOTE working from hir due to sql development
																										//@params
                                                    $query = array(
                                                                    'cyear'     =>  $cyear,
                                                                    'mes'       =>  ucwords($mth),
                                                                    'area'      =>  $sbunames,
																																		'account'		=>  $fract_arr,
																																		'type'			=>	$mod_inx
                                                                  );
																										$search_data = ( isset($chart_index[$cyear][ucwords($mth)][$mod_inx][$sbunames][$fract_arr]) ? $chart_index[$cyear][ucwords($mth)][$mod_inx][$sbunames][$fract_arr] : null ) ?: null ;
                                                ?>
                                                    <?php
																												if (is_array($search_data) && !empty($search_data)) {

																														if ( count(array_diff($query, $search_data)) == 0  ) {
		//                                                           e(number_format(money_format('%i',$model_chart_value[$mod_inx]), 2, '.', ',')); with dec
																																debug($query);
																																debug(number_format(round($search_data['Real'])));
		                                                            if (number_format(round($search_data['Real'])) > 0) {
		                                                                echo '<td class="excel_cell _cell_Default _xls_cell">'.number_format(round($search_data['Real'])).'</td>'; // without decimal s
		                                                            } else {
																																	  echo('<td class="excel_cell _cell_Default _xls_cell"></td>');
																																}
	                                                          }

																												} else {
																													echo('<td class="excel_cell _cell_Default _xls_cell"></td>');
																												}
																										?>
																										<?php
																												if (is_array($search_data) && !empty($search_data)) {
																														if ( count(array_diff($query, $search_data)) == 0  ) {
			//                                                           e(number_format(money_format('%i',$model_chart_value[$mod_inx]), 2, '.', ',')); with dec
																																if (number_format(round($search_data['Presupuesto'])) > 0) {
																																		echo '<td class="excel_cell _cell_Default _xls_cell">'.number_format(round($search_data['Presupuesto'])).'</td>'; // without decimal s
																																} else {
																																		echo('<td class="excel_cell _cell_Default _xls_cell"></td>');
																																}
																														}
																												} else {
																														echo('<td class="excel_cell _cell_Default _xls_cell"></td>');
																												}
                                                    ?>
                                              <?php }?>
	                                          </tr>
			                                      <?php }?>
																			</tbody>
			                             </table>

<!-- =============================================================== FIX ========================================================================= -->


																</div> <!-- ContenedorTabla -->
															</div> <!-- scrollable -->
			                  </div><!--end role-->
			                  <?php }?>
			              </div> <!--end tabbedContent-->
                  </div> <!-- start_tabs_nav -->
                </div> <!-- class="panel panel-default" -->
            </div>  <!--tab-pane -->
        <?php }?>

			</div> <!-- end tabbedContent-->
		</div> <!--end col-xs-6 col-sm-10-->
	<!-- Optional: clear the XS cols if their content doesn't match in height -->
<!-- 	<div class="clearfix visible-xs-block"></div> -->
	<!--   <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div> -->

	<!-- <p>&nbsp;</p> -->
<!-- TEST -->


<!-- TEST -->
	<!-- <label><input type="checkbox" id="activate-g2p" checked> Activate Grab to Pan</label> -->

	</div><!--  end row-fluid-->
<!--End Container-->


<script type="text/javascript">

// <!&#91;CDATA&#91;

$(document).ready(function (){



				// var a = $("table[id^='table_']");
				//   $.each( a, function( i, val ) {
				// 	   console.log($(this).attr('id'));
				// 	var string_id = '#' + $(this).attr('id');
				// 		console.log(typeof(string_id));
				// 	// $(string_id).CongelarFilaColumna({Columnas:1});
				// 	// $(string_id).CongelarFilaColumna({lboHoverTr:true});
				// 	// $(string_id).CongelarFilaColumna({soloThead : true});
				// });

				// NOTE Working exmple
				var selector = '.fht-table';
				$(selector).on('click', function(){
						console.log($(this).attr('id'));
						console.log($(this).hasClass('active'));
						theid = '#' + $(this).attr('id');
						var el = document.querySelector(theid);
						console.log(el);                    // get the element
						var stickytable = new Stickytable(el, {
							width: "100%",
							height: "600px"
						});
				});

				// NOTE hide method , overcharge ??



					$('tr').filter(
							function(){
									console.log($(this).find('td:empty'));
									console.log($(this).find('td').length);
									console.log($(this).find('td:empty').length);
									return ($(this).find('td').length - 1) == $(this).find('td:empty').length;
							}).hide();





		// $("#table_Costos_Operativos_Fijos_cuautitlan_").CongelarFilaColumna({Columnas:1});


			// NOTE Autoscroll
				var cursorFocus = function(elem) {
					var x, y;
					console.log('inside a function ' + elem);
					// More sources for scroll x, y offset.
					if (typeof(window.pageXOffset) !== 'undefined') {
							x = window.pageXOffset;
							y = window.pageYOffset;
					} else if (typeof(window.scrollX) !== 'undefined') {
							x = window.scrollX;
							y = window.scrollY;
					} else if (document.documentElement && typeof(document.documentElement.scrollLeft) !== 'undefined') {
							x = document.documentElement.scrollLeft;
							y = document.documentElement.scrollTop;
					} else {
							x = document.body.scrollLeft;
							y = document.body.scrollTop;
					}
					elem.focus();
					elem.blur();
					if (typeof x !== 'undefined') {
							// In some cases IE9 does not seem to catch instant scrollTo request.
							setTimeout(function() { window.scrollTo(x, y); }, 100);
					}
				}


				//NOTE TODO Uncomment this for focus
				// $("A[id^='search_']").on('click',function(event) {
				// 		event.preventDefault();
				// 		console.log('focus_' + $(this).attr('id'));
				// 		var focus_id = 'focus_' + $(this).attr('id');
				//
				// 		cursorFocus( document.getElementById( 'focus_' + $(this).attr('id') ) );
				// 		console.log('exec the focus');
				// });


				// var a = $("A[id^='search_']");
				//   $.each( a, function( i, val ) {
				// 	   console.log($(this).attr('id'));
				//   // cursorFocus(document.getElementById($(this).attr('id')));
				//
				// });


				// NOTE StickHeaders
				// TODO change for a better method
				// ALERT uncomment this for Freeze columns

				// $("#table_Costos_Operativos_Variables_cuautitlan_").CongelarFilaColumna({Columnas:1});


				// $(function () {
				// 	var offset = $('.navbar').height();
				// 	console.log(offset);
				// 	var a = $("table[id^='table_']");
				// 	  $.each( a, function( i, val ) {
				// 			var this_id = $(this).attr('id');
				// 			console.log(typeof(this_id));
				// 			console.log(this_id);
				// 			$( "." + this_id ).stickyTableHeaders({fixedOffset: 22,marginTop: 22});
				// 	});
				// });


				// NOTE Charting
        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        });

				// Highcharts.Color.prototype.parsers.push({
				// 	regex: /^[a-z]+$/,
				//     parse: function (result) {
				//     	var rgb = new RGBColor(result[0]);
				//         if (rgb.ok) {
				//         	return [rgb.r, rgb.g, rgb.b, 1]; // returns rgba to Highcharts
				//         }
				//     }
				// });

			// // Make monochrome colors and set them as default for all pies
			// Highcharts.getOptions().plotOptions.pie.colors = (function () {
			//     var colors = [],
			//         base = Highcharts.getOptions().colors[0],
			//         i;
			//
			//     for (i = 0; i < 10; i += 1) {
			//         // Start out with a darkened base color (negative brighten), and end
			//         // up with a much brighter color
			//         colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
			//     }
			//     return colors;
			// }());


					// Highcharts.theme = {
					//     // colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572',
					//     //          '#FF9655', '#FFF263', '#6AF9C4'],
					// 		colors:['#3398d6','#b4c973','#6c99bb'],
					//     chart: {
					//         backgroundColor: {
					// 					radialGradient: {
					// 							cx: 0.5,
					// 							cy: 0.3,
					// 							r: 0.7
					// 					},
					//             stops: [
					//                 [0, 'rgb(255, 255, 255)'],
					//                 [1, 'rgb(240, 240, 255)']
					//             ]
					//         },
					//     },
					//     // title: {
					//     //     style: {
					//     //         color: '#000',
					//     //         font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
					//     //     }
					//     // },
					//     // subtitle: {
					//     //     style: {
					//     //         color: '#666666',
					//     //         font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
					//     //     }
					//     // },
					// 		//
					//     // legend: {
					//     //     itemStyle: {
					//     //         font: '9pt Trebuchet MS, Verdana, sans-serif',
					//     //         color: 'black'
					//     //     },
					//     //     itemHoverStyle:{
					//     //         color: 'gray'
					//     //     }
					//     // }
					// };

					// Apply the theme
					Highcharts.setOptions(Highcharts.theme);
        // from hir use the loop-force luke
        <?php foreach ($chart as $inx_year => $inx_chart) { ?>
						<?php foreach ($inx_chart as $inx_key => $inx_chart_area) { ?>
            	<?php foreach ($inx_chart_area as $inx_area => $inx_chart_type) { ?>

											// set the scroll
											// p2g_('scroll_<?php e("{$mod_index[$inx_key]}")?>_<?php e(strtolower(str_replace(' ','_',$inx_area)))?>_');
											// set the focus in
											// cursorFocus(document.getElementById('search_<?php e("{$mod_index[$inx_key]}")?>_<?php e(strtolower(str_replace(' ','_',$inx_area)))?>_'));

                        //header section
                       Highcharts.chart('chart_<?php e("{$mod_index[$inx_key]}")?>_<?php e(strtolower(str_replace(' ','_',$inx_area)))?>_', {
                            chart: {
                                type: 'column',
                                zoomType: 'x'
                            },
                            title: {
                                text: 'Indicadores de <?php e(ucwords($mod_index_one[$inx_key]))?> para <?php e($inx_area)?>'
                            },
														// colors: ['blue', 'green', 'orange', 'red', 'purple', 'brown'], // uncomment with the color parser
														colors:['#3398d6','#b4c973','#6c99bb'],
                            subtitle: {
                                text: 'GST <?php e($inx_year)?>'
                            },
                            xAxis: {
                                allowDecimals: false,
                                categories: <?php e($json_months); ?>,
                            },
                            yAxis: {
                                title: {
                                    text: '<?php e("{$mod_index_one[$inx_key]}")?>'
                                },
                            },
                            tooltip: {
                                pointFormat: '<b>{point.y:,.0f}</b> <?php e("{$mod_index_one[$inx_key]}")?> en {series.name} <br/>'
                            },
//
//                             tooltip: {
//                                     headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//                                     pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
//                                         '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
//                                     footerFormat: '</table>',
//                                     shared: true,
//                                     useHTML: true
//                                 },

                            plotOptions: {

                                    area: {
                                        dataLabels: {
                                            style: {
                                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                            },
                                        },
                                        lineWidth: 1,
                                        marker: {
                                            lineWidth: 2,
                                            enabled: false,
                                            symbol: 'circle',
                                            radius: 3,
                                            states: {
                                                hover: {
                                                    enabled: true
                                                }
                                            }
                                        }
                                    },
                                    spline: {
                                        lineWidth: 4,
                                        states: {
                                            hover: {
                                                lineWidth: 5
                                            }
                                        },
                                        marker: {
                                            enabled: false
                                        },
                                    },
                                    pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            dataLabels: {
                                                enabled: true,
                                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                style: {
                                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                },
                                                connectorColor: 'silver'
                                            }
                                        },
                                    column: {
																				dataLabels: {
																						// enabled: true,
																						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
																						style: {
																								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
																						},
																						connectorColor: 'silver'
																				},
                                        pointPadding: 0.2,
                                        borderWidth: 0,
                                        pointWidth:40,
                                        marker: {
                                            lineWidth: 2,
                                            enabled: false,
                                            symbol: 'circle',
                                            radius: 3,
                                            states: {
                                                hover: {
                                                    enabled: true
                                                }
                                            }
                                        }
                                    }
                                },
                            series: [                   //series section
                        <?php
														foreach ($months as $index_month => $month_namae) {
                                // in series array section
                                if (($inx_chart_type[ucwords($month_namae)]) !== null) {
                                    $json_data_[$inx_year][$inx_area][$inx_key][] =  $inx_chart_type[ucwords($month_namae)]['Real'];
																		$json_data_prep[$inx_year][$inx_area][$inx_key][] =  $inx_chart_type[ucwords($month_namae)]['Presupuesto'];
                                } else {

                                    if ($index_month < date('n')) {
                                        $json_data_[$inx_year][$inx_area][$inx_key][] =  0 ;
																				$json_data_prep[$inx_year][$inx_area][$inx_key][] =  0 ;
                                    } else {
                                        $json_data_[$inx_year][$inx_area][$inx_key][] =  'null' ;
																				$json_data_prep[$inx_year][$inx_area][$inx_key][] =  'null' ;
                                    }
                                }
                         		}
												?>
                                    {
                                        name: <?php e("'Real'")?>,
                                        data: [null, <?php e(implode(',',$json_data_[$inx_year][$inx_area][$inx_key]));?>]
                                    },
																		{
                                        name: <?php e("'Presupuesto'")?>,
                                        data: [null, <?php e(implode(',',$json_data_prep[$inx_year][$inx_area][$inx_key]));?>]
                                    }
                            ]
                    });
            <?php } ?>
					<?php } ?>
			<?php } ?>
});
	// &#93;&#93;>
</script>
