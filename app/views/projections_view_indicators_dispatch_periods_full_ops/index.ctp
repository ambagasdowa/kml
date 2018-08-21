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
		// SecureCalendar index
			// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
			$evaluate = false;
			$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
		?>

		<style>
			/* unvisited link */
			.modded-link:link {
				display:block !important;
				background-color:#999;
				color: #444;
			}
			/* mouse over link */
			.modded-link:hover {
				font-weight: bold;
			}
			.panel-default {
				background-color: rgba(255, 255, 255, 0.3); /* Color white with alpha 0.9*/
			}

		</style>





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
		background-color:#999;
		color: #444;
	}


/* 	.btn-success{ */
/* 		display: inline-block; !important; */
/* 		box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125); */
/* 	} */

	/* visited link */
/*	.modded-link:visited {
		color: green;
	}*/

	/* mouse over link */
	.modded-link:hover {
/* 		color: hotpink; */
		 font-weight: bold;
	}

	/* selected link */
/*	.modded-link:active {
		color: blue;
	}*/

	.panel-default {
		background-color: rgba(255, 255, 255, 0.3); /* Color white with alpha 0.9*/
	}

</style>

<?php //NOTE this must come from AppConfig or from this controller at least ?>

<?php
    $mod_inx = $mod_inxd = $mod_index;
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

		<div class="col-xs-6 col-sm-10">
			<div id="tabbedContent" class='tab-content'>

                <?php foreach($bsu as $in => $sbunames) { // NOTE $sbunma is a control for the model ?>
                    <?php $sbuname = str_replace(' ','_',$sbunames); // NOTE this act as a control for UI ?>
                    <div class="tab-pane fade in <?php $in === $ui_bsu_index ? e('active'): ' '; ?>" id="<?php echo '_'.$sbuname.'_'.$in ?>">
                        <div class="panel panel-default">
							<!-- Default panel contents -->
                            <div class="panel-heading">Panel de Indicadores de <?php e(ucwords(strtolower($bsu_label[$in])))?></div>
                                <div id="start_tabs_nav">

  								<div class="panel-body">
                                    <ul class="nav nav-tabs nav-justified" role="tablist">
                                        <?php foreach($mod_inxd as $nxm => $mod_nxm_name) {?>
                                                <li role="presentation" class="<?php $nxm == $ui_mod_index ? e('active'):e('')?> modded-link">
                                                    <a href="<?php e('#nav_'.$mod_nxm_name.'_'.strtolower($sbuname).'_')?>" aria-controls="<?php e('nav_'.$mod_nxm_name.'_'.strtolower($sbuname).'_')?>" role="tab" data-toggle="tab" class="modded-link"><?php e(ucwords(strtolower($mod_nxm_name)))?></a>
                                                </li>
                                        <?php }?>
                                    </ul>
                                </div>
                                    <div class="tab-content">
                                        <?php foreach ($mod_index as $mod_inx => $mod_name) { ?> <?php //NOTE fetch the name of the module tons, kms etc ?>

                                        <div role="tabpanel" class="tab-pane fade in <?php e($mod_inx == $ui_mod_index ? e('active'): e(''))?>" id="<?php e('nav_'.$mod_name.'_'.strtolower($sbuname).'_')?>">
                                            <table class="table " width="100%">
                                                <tr>
                                                    <td width="100%">
                                                        <div id="<?php e('chart_'.$mod_name.'_'.strtolower($sbuname).'_')?>" style="min-width:78.7%; min-height: 400px; margin: 0 auto" ><?php e('chart_'.$mod_name.'_'.strtolower($sbuname).'_')?></div> <!--img-->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="80%">
                                                        <table class="order-table table table-bordered table-hover table-striped responstable">
                                                        <?php //NOTE build the matrix with the header then months as titles and at last the fractions as a Y axis and inside this the data ?>
                                                            <tr>
                                                                <td colspan="13"><?php e($mod_name)?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Fraccion / Mes</td>
                                                                <?php foreach ($months as $valei) {?>
                                                                    <td><?php e(ucwords($valei))?></td>
                                                                <?php }?>
                                                            </tr>

                                                            <?php foreach ($fraction as $idx_name => $fract_arr) { ?>
                                                                <tr>
                                                                    <td><?php e($idx_name)?></td>
                                                                    <?php foreach($months as $idxm => $mth) { ?>

                                                                    <td id="test_<?php __(ucwords($mth).'_'.$idx_name.'_'.$sbunames)?>"> <?php //__('month,fraccion,area_name')?>
                                                                        <?php
                                                                            $query = array(
                                                                                            'cyear'     =>  $cyear,
                                                                                            'mes'       =>  ucwords($mth),
                                                                                            'area'      =>  $sbunames,
                                                                                            'fraccion'  =>  $idx_name
                                                                                        );
                                                                        ?>
                                                                        <?php foreach ($chart_index as $model_chart) { ?>
                                                                            <?php foreach ($model_chart as $ind_chart_field => $model_chart_value) { ?>
                                                                                <?php
                                                                                    if ( count(array_diff($query, $model_chart_value)) == 0  ) {
//                                                                                      e(number_format(money_format('%i',$model_chart_value[$mod_inx]), 2, '.', ',')); with dec
                                                                                        if (number_format(round($model_chart_value[$mod_inx])) > 0) {
                                                                                            e(number_format(round($model_chart_value[$mod_inx]))); // without decimals
//                                                                                          debug($model_chart_value[$mod_inx]);
//                                                                                          debug($model_chart_value);
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                    </td>

                                                                    <?php }?>
                                                                </tr>
                                                            <?php }?>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div><!--end role-->
                                        <?php }?>
                                    </div> <!--end tabbedContent-->
                                </div>
                        </div>
                    </div>
                <?php }?>

			</div> <!--end col-xs-6 col-sm-10-->
		</div> <!-- end tabbedContent-->
	<!-- Optional: clear the XS cols if their content doesn't match in height -->
<!-- 	<div class="clearfix visible-xs-block"></div> -->
	<!--   <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div> -->

	<p></p>
	</div><!--  end row-fluid-->
<!--End Container-->


<script type="text/javascript">

// <!&#91;CDATA&#91;

$(document).ready(function (){


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

        // from hir use the loop-force luke

        <?php foreach ($chart as $inx_year => $inx_chart) { ?>
            <?php foreach ($inx_chart as $inx_area => $inx_chart_type) { ?>
                <?php foreach ($inx_chart_type as $inx_type => $inx_chart_fraction) { ?>
                        //header section

                       Highcharts.chart('chart_<?php e("{$inx_type}")?>_<?php e(strtolower(str_replace(' ','_',$inx_area)))?>_', {
                            chart: {
                                type: 'column',
                                zoomType: 'x'
                            },
                            title: {
                                text: 'Indicadores con Estatus Despachado de <?php e(ucwords($inx_type))?> para <?php e($inx_area)?>'
                            },
                            subtitle: {
                                text: 'GST <?php e($inx_year)?>'
                            },
                            xAxis: {
                                allowDecimals: false,
                                categories: <?php e($json_months); ?>,
                            },
                            yAxis: {
                                title: {
                                    text: '<?php e("{$inx_type}")?>'
                                },
                            },
                            tooltip: {
                                pointFormat: '<b>{point.y:,.0f}</b> <?php e("{$inx_type}")?> en {series.name} <br/>'
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
                    <?php foreach ($inx_chart_fraction as $inx_fraction => $inx_chart_month) { ?>
                        <?php foreach ($months as $index_month => $month_namae) {?>
                            <?php
                                // in series array section
                                if (($inx_chart_month[ucwords($month_namae)]) !== null) {
                                    $json_data_[$inx_year][$inx_area][$inx_type][$inx_fraction][] =  $inx_chart_month[ucwords($month_namae)];
                                } else {

                                    if ($index_month < date('n')) {
                                        $json_data_[$inx_year][$inx_area][$inx_type][$inx_fraction][] =  0 ;
                                    } else {
                                        $json_data_[$inx_year][$inx_area][$inx_type][$inx_fraction][] =  'null' ;
                                    }

                                }
                            ?>
                        <?php } ?>
                                    {
                                        name: <?php e("'".$inx_fraction."'")?>,
                                        data: [null, <?php e(implode(',',$json_data_[$inx_year][$inx_area][$inx_type][$inx_fraction]));?>]
                                    },
                    <?php } ?>
                            ]
                    });
                <?php } ?>
            <?php } ?>
        <?php } ?>

});


	// &#93;&#93;>
</script>
