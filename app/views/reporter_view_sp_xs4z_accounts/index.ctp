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
            $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
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
	height    : 98%;
  width     : 100%;
	margin    : 0 auto;
	overflow  : auto;
	position  : relative;

	overflow:hidden;
}

/*.fixed-zoom {
  height: 90vh;
  width: 90vh;
}*/

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
	min-width: 90px !important;

}
._xls_cell {
	empty-cells: show;
	padding: 1px 0.5em;
}
._cell_header{
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	font-weight:  normal;
	background-color: #EEE;
}
._cell_Default{
	background-color: #FFF;
	/*text-align: left;*/
}

.firts_column {
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	font-weight:  normal;
	background-color: #EEE;
	min-width: 325px;
	text-align: left !important;
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

/*https://stackoverflow.com/questions/34701057/making-table-data-appear-on-hover-javascript-jquery-or-css*/
tr .icon{
  transition:all 0.5s;
  opacity:0;
}
tr .link_external:hover .icon{
  opacity:1;
}

.inner_panel {
  /*background-color: white;*/
  color:#333;
}

.print_thuis:hover {
  border  : collapse;
  display : inline-block;
  color : #eee;
  background-color   : #3398d6;
  cursor  : pointer;
}

/*.break_line {
  padding-bottom: 15px;
  display:block;
}*/

</style>

<?php //NOTE this must come from AppConfig or from this controller at least?>

<?php
    $mod_inx = $mod_inxd = $mod_index;
        $charting = $chart;
?>


<div id="newIngressStructure" class="newIngressStructure"></div>
<!--  Start container -->

	<div class="row-fluid">

	<div id="dashboard_links" class="col-xs-6 col-sm-2 pull-right">

            <ul id="tabbed" class="nav nav-pills nav-stacked">

                <?php foreach ($bsu as $idx_bsu => $bsu_names) {
    ?>
                    <?php $bsu_name = str_replace(' ', '_', $bsu_names); ?>
                    <li role="presentation" <?php $idx_bsu === $ui_bsu_index ? e('class="active"'): ' '; ?> >
                        <a href="<?php echo '#_'.$bsu_name.'_' ?>" id="<?php echo '_'.$bsu_name.'_'.$idx_bsu ?>_tab" data-toggle="tab" data-name="<?php echo "$bsu_name"?>">
                            <i class="fa fa-truck"></i>&nbsp;&nbsp;<?php e($bsu_label[$idx_bsu]); ?>
                        </a>
                    </li>
                <?php
}?>

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

        <?php foreach ($bsu as $in => $sbunames) { // NOTE $sbunma is a control for the model?>
            <?php $sbuname = str_replace(' ', '_', $sbunames); // NOTE this act as a control for UI?>
            <div class="tab-pane fade in <?php $in === $ui_bsu_index ? e('active'): ' '; ?>" id="<?php echo '_'.$sbuname.'_' ?>">
                <div class="panel panel-default">
			<!-- Default panel contents -->
                    <div class="panel-heading">
											 	Panel de Indicadores de <?php e(ucwords(strtolower($bsu_label[$in]))); ?>
										</div>

                  <div id="start_tabs_nav">

										<div class="panel-body">
								          <ul class="nav nav-tabs nav-justified" role="tablist">
								              <?php foreach ($mod_inxd as $nxm => $mod_nxm_name) { ?>
								                      <li role="presentation" class="<?php e($nxm == $ui_mod_index ? 'active':''); ?> modded-link">
																					<a class="modded-link" href="<?php e('#nav_'.$mod_nxm_name.'_'.strtolower($sbuname).'_')?>" role="tab" data-toggle="tab" data-name="<?php echo $mod_nxm_name ?>" >
																						<!-- <?php e(ucwords(strtolower($mod_nxm_name))); ?> -->
																						<?php e(ucwords(strtolower($mod_index_one[$nxm]))); ?>
																					</a>
								                      </li>
								              <?php
} ?>
								          </ul>
								    </div>

			              <div class="tab-content">

			                  <?php foreach ($mod_index as $mod_inx => $mod_name) { ?>

                        <?php //NOTE fetch the name of the module tons, kms etc ?>
			                  <div role="tabpanel" class="tab-pane fade in <?php e($mod_inx == $ui_mod_index ? 'active' : ''); ?>" id="<?php e('nav_'.$mod_name.'_'.strtolower($sbuname).'_')?>">

                          <div id="<?php e('print_chart_'.$mod_name.'_'.strtolower($sbuname).'_')?>">
														<div id="<?php e('chart_'.$mod_name.'_'.strtolower($sbuname).'_')?>" style="min-width:78.7%; min-height: 400px; margin: 0 auto" >
															<?php e('chart_'.$mod_name.'_'.strtolower($sbuname).'_')?>
														</div>
                          </div>

                            <!-- <div class="space_break">
                              &nbsp;
                            </div> -->

														<div class="inner_panel list-group-horizontal">

                              <div class="pull-right">


                                <!-- <div id="<?php e('link_panels_table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" data-name="<?php e('panels_table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" class="print_thuis list-group-item">
                                  <i class="fa fa-columns" aria-hidden="true"></i>
                                </div> -->

                                <div id="<?php e('link_expand_table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" data-name="<?php e('expand_table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" class="print_thuis list-group-item">
                                  <i class="fa fa-expand" aria-hidden="true"></i>
                                </div>

                                <div id="<?php e('link_modal_table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" data-name="<?php e('modal_table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" class="print_thuis list-group-item">
                                  <i class="fa fa-print" aria-hidden="true"></i>
                                </div>

                              </div>

														</div>

                            <!-- <div class="space_break">
                              &nbsp;
                            </div> -->

                            <div class="ContenedorTabla" id="<?php e('modal_table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" >

                            	<div class="scrollable" id="<?php e('scroll_'.$mod_name.'_'.strtolower($sbuname).'_')?>" >
																<!-- <div class="filler ContenedorTabla"> -->


																	<!-- /*wuicho => 921-1984184*/ -->

<!-- =============================================================== FIX ========================================================================= -->

			                             <!-- <table id="<?php e('table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" class="order-table table table-bordered table-hover table-striped responstable <?php e('table_'.$mod_name.'_'.strtolower($sbuname).'_')?>"> -->
																	 <table id="<?php e('table_'.$mod_name.'_'.strtolower($sbuname).'_')?>" class="fht-table">
			                                  <?php //NOTE build the matrix with the header then months as titles and at last the fractions as a Y axis and inside this the data?>
																			<thead>
		                                      <tr>
		                                          <!-- <th colspan="25" class="excel_cell _cell_header"><?php e(str_replace('_', ' ', $mod_name))?></th> -->
																							<th class="_cell_header _xls_cell firts_column">
																									&nbsp;
																							</th>
																					<?php foreach ($months as $inx_val_month => $valei) {
        ?>
																							<th colspan="2" class="">

																								<div class="<?php $inx_val_month == date('n') ? e('grid_current') : e('grid_td') ; ?> _cell_header _xls_cell">
																										<!-- <div id="<?php $inx_val_month == date('n') ? e('focus_search_'.$mod_name.'_'.strtolower($sbuname).'_') : e('grid'); ?>"> -->
																												<?php e(ucwords($valei)); ?>
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
																					<?php
    } ?>
		                                      </tr>

																				</thead>


																				<tbody>

			                                      <?php foreach ($fraction[$mod_inx] as $idx_name => $fract_arr) { // fetch accounts?>

																						<tr>

	                                            <td class="_cell_header _xls_cell firts_column" title="<?php e($idx_name)?>" alt="<?php e($idx_name)?>">
																								<?php e($fract_arr); ?> &nbsp;&nbsp; <?php e(ucfirst(strtolower(utf8_encode($idx_name)))); ?>
																							</td> <!--  hir must to get the changes  -->

																							<?php foreach ($months as $idxm => $mth) {
        ?>

                                                <?php
                                                                                                        //NOTE working from hir due to sql development
                                                                                                        //@params
                                                    $query = array(
                                                                    'cyear'     =>  $cyear,
                                                                    'mes'       =>  ucwords($mth),
                                                                    'area'      =>  $sbunames,
                                                                                                                                        'account'        =>  $fract_arr,
                                                                                                                                        'type'            =>    $mod_inx
                                                                  );
        $search_data = (isset($chart_index[$cyear][ucwords($mth)][$mod_inx][$sbunames][$fract_arr]) ? $chart_index[$cyear][ucwords($mth)][$mod_inx][$sbunames][$fract_arr] : null) ?: null ; ?>
                                                    <?php
                                                                                                                if (is_array($search_data) && !empty($search_data)) {
                                                                                                                    if (count(array_diff($query, $search_data)) == 0) {
                                                                                                                        //                                                           e(number_format(money_format('%i',$model_chart_value[$mod_inx]), 2, '.', ',')); with dec
                                                                                                                                // debug($query);
                                                                                                                                // debug(number_format(round($search_data['Real'])));
                                                                    if (number_format(round($search_data['Real'])) > 0) {
                                                                        echo '<td class="excel_cell _cell_Default _xls_cell link_external">'.number_format(round($search_data['Real'])).'&nbsp; <a id="this_link_'.
                                                                                                                                        $query["cyear"].'_'.$query["mes"].'_'.$query["area"].'_'.$query["account"].'_'.$query["type"].'_'.number_format(round($search_data['Real'])).'_'.
                                                                                                                                        (number_format(round($search_data['Presupuesto']))?:'0').
                                                                                                                                        '" href="#" class="link_search_ icon"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>'; // without decimal s
                                                                    } else {
                                                                        echo('<td class="excel_cell _cell_Default _xls_cell"></td>');
                                                                    }
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    echo('<td class="excel_cell _cell_Default _xls_cell"></td>');
                                                                                                                } ?>
																										<?php
                                                                                                                if (is_array($search_data) && !empty($search_data)) {
                                                                                                                    if (count(array_diff($query, $search_data)) == 0) {
                                                                                                                        //                                                           e(number_format(money_format('%i',$model_chart_value[$mod_inx]), 2, '.', ',')); with dec
                                                                                                                                if (number_format(round($search_data['Presupuesto'])) > 0) {
                                                                                                                                    echo '<td class="excel_cell _cell_Default _xls_cell">'.number_format(round($search_data['Presupuesto'])).'</td>'; // without decimal s
                                                                                                                                } else {
                                                                                                                                    echo('<td class="excel_cell _cell_Default _xls_cell"></td>');
                                                                                                                                }
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    echo('<td class="excel_cell _cell_Default _xls_cell"></td>');
                                                                                                                } ?>
                                              <?php
    } ?>
	                                          </tr>
			                                      <?php
    } ?>
																			</tbody>
			                             </table>

<!-- =============================================================== FIX ========================================================================= -->
																</div> <!-- ContenedorTabla -->
                                <!-- <div class="break_line"></div> -->
															</div> <!-- scrollable -->

			                  </div><!--end role-->
			                  <?php
} ?>
			              </div> <!--end tabbedContent-->
                  </div> <!-- start_tabs_nav -->
                </div> <!-- class="panel panel-default" -->
            </div>  <!--tab-pane -->
        <?php
}?>

			</div> <!-- end tabbedContent-->
		</div> <!--end col-xs-6 col-sm-10-->
	<!-- Optional: clear the XS cols if their content doesn't match in height -->
<!-- 	<div class="clearfix visible-xs-block"></div> -->
	<!--   <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div> -->

	<!-- <p>&nbsp;</p> -->
<!-- TEST -->
<!-- <div id="result">
	...
</div> -->

<!-- TEST -->
	<!-- <label><input type="checkbox" id="activate-g2p" checked> Activate Grab to Pan</label> -->

	</div><!--  end row-fluid-->
<!--End Container-->


<script type="text/javascript">

// <!&#91;CDATA&#91;

$(document).ready(function (){



	// $( "#result" ).load( "http://development/kml/ReporterViewSpXs4zAccounts/get/data:dGhpc19saW5rXzIwMTdfRW5lcm9fTUVYSUNBTElfMDUwMTAxMDMwM19PRl85NDVfMSwxMTE=", function() {
	//   alert( "Load was performed." );
	// });



				// var a = $("table[id^='table_']");
				//   $.each( a, function( i, val ) {
				// 	   console.log($(this).attr('id'));
				// 	var string_id = '#' + $(this).attr('id');
				// 		console.log(typeof(string_id));
				// 	// $(string_id).CongelarFilaColumna({Columnas:1});
				// 	// $(string_id).CongelarFilaColumna({lboHoverTr:true});
				// 	// $(string_id).CongelarFilaColumna({soloThead : true});
				// });

        // [NOTE] can be this the approach
                //
                //
        				// var find_target = function findTarget () {
        				// 		var bsu = $('body').find('li.active').find('a').attr('data-name') ;
        				// 		console.log(bsu) ;
        				// 		var typo = $('body').find('div#_' + bsu + '_').find('li.active').find('a.modded-link');
        				// 		console.log(typo.attr('data-name')) ;
        				// 		console.log('table_' + typo.attr('data-name') + '_' + bsu.toLowerCase() + '_');
                //
        				// 		target_point = 'table_' + typo.attr('data-name') + '_' + bsu.toLowerCase() + '_';
                //
        				// }
        				// console.log(find_target()); //set target_point
        				// console.log(target_point);
        				// $('#dashboard_links').find("a[id^='_']").on('click',function(){
        				// 	  console.log('call to rmenu');
        				// 		var bsu = $(this).attr('data-name');
        				// 		var typo = $('body').find('div#_' + bsu + '_').find('li.active').find('a.modded-link');
        				// 		target_point = 'table_' + typo.attr('data-name') + '_' + bsu.toLowerCase() + '_';
        				// 		console.log(target_point);
        				// 		return null;
        				// });
                //
                //
        				// // NOTE work with this approach
        				// // $("table[id^='table_Costos_']").each(function(column) {
        				// //    code ...
        				// // });
                //
        				// console.log('after');
        				// console.log("#" + target_point);
        				// console.log($("table[id^='table_Costos_']").find("a[id^='this_link_']"));
        				// console.log($("table[id^='"+target_point+"']").find("a[id^='this_link_']"));



        //

				//NOTE TODO Working from hir link detail
				// NOTE WORK FROM HIR
				// $("a[id^='this_link_']").on('click',function(event) {
				// $("a[id^='this_link_']").click(function(event) {
				// $(".link_search_").click(function(event) {
				// $('.fht-table').find('.link_search_').on('click','a' function(){

					// NOTE searching ...
					// var bsu = $('body').find('li.active').find('a').attr('data-name') ;
					// console.log(bsu) ;
					// var typo = $('body').find('div#_' + bsu + '_').find('li.active').find('a.modded-link');
					// console.log(typo.attr('data-name')) ;
					// console.log('table_' + typo.attr('data-name') + '_' + bsu.toLowerCase() + '_');
					// var target_point = '#table_' + typo.attr('data-name') + '_' + bsu.toLowerCase() + '_';
					// console.log(target_point);





						//
						// var tbl = document.getElementById(target_point);
						// if (tbl != null) {
						// 	 for (var i = 0; i < tbl.rows.length; i++) {
						// 			 for (var j = 0; j < tbl.rows[i].cells.length; j++)
						// 					 tbl.rows[i].cells[j].onclick = function () { getval(this); };
						// 	 }
						// }

						// function getval(cel) {
						//
						// 		console.log(cel.innerHTML);
						//
						// 		console.log(cel.childNodes);
						// 		//access some <ul> element
						// 			// var mylist=document.getElementById("mylist")
						// 				for (i=0; i<cel.childNodes.length; i++){
						// 					if (cel.childNodes[i].nodeName=="A") {
						// 						//do something
						// 						console.log(cel.childNodes[i].getAttribute('id'));
						//
						// 							data_cd = base64_encode(cel.childNodes[i].getAttribute('id'));
						// 							var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:" + data_cd;
						// 								console.log(urlStruct);
						//
						// 								// var request = $.ajax({
						// 								//   url: "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/",
						// 								//   // method: "POST",
						// 								// 	method: "GET",
						// 								//   data: { data : data_cd },
						// 								//   dataType: "html"
						// 								// });
						// 								$.colorbox({data:urlStruct});
						// 								// request.done(function( urlStruct ) {
						// 								//
						// 								// 	$.fancybox({
						// 								// 		'type': 'ajax',
						// 								// 		'href': urlStruct,
						// 								// 		'autoScale': false,
						// 								// 		'autoDimensions': false
						// 								// 	});
						// 									// return false;
						// 								// });
						//
						//
						// 								// $.ajax({
						// 								//       // type: "POST",
						// 								// 			type: "GET",
						// 								//       cache: false,
						// 								//       url: "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:" + data_cd, // preview.php
						// 								//       // data: $("#postp").serializeArray(), // all form fields
						// 								// 			data: { 'send' : data_cd },
						// 								//       success: function (data) {
						// 								// 				$(".ajax").colorbox();
						// 								//         // on success, post (preview) returned data in fancybox
						// 								//         // $.fancybox(data, {
						// 								//         //   // fancybox API options
						// 								//         //   fitToView: false,
						// 								//         //   width: 905,
						// 								//         //   height: 505,
						// 								//         //   autoSize: false,
						// 								//         //   closeClick: false,
						// 								//         //   openEffect: 'none',
						// 								//         //   closeEffect: 'none'
						// 								//         // }); // fancybox
						// 								//       } // success
						// 								//   }); // ajax
						//
						// 					}
						// 				}
						//
						// 		// alert(cel.innerHTML);
						//
						// }

				// console.log($("table#" + target_point).find("a[id^='this_link_']"));

					// $('body').find("table[id^='table_Costos_Operativos_Fijos_orizaba_']").find("a[id^='this_link_']").on('click',function(event) {


          // NOTE Working exmple NOTE ALERT
          //
  				// var selector = '.fht-table';
  				// $(selector).on('click', function(){
  				// 		// console.log($(this).attr('id'));
  				// 		// console.log($(this).hasClass('active'));
  				// 		theid = '#' + $(this).attr('id');
          //     console.log('theid');
          //     console.log(theid);
          //
  				// 		var el = document.querySelector(theid);
          //     console.log('elementr');
  				// 		console.log(el);                    // get the element
  				// 		// alert('whooa');
  				// 		var stickytable = new Stickytable(el, {
  				// 			width: "100%",
  				// 			height: "90vh"
  				// 		});
  				// });


          // NOTE firts encounter ...
          // NOTE searching ...
					var bsu = $('body').find('li.active').find('a').attr('data-name') ;
					var typo = $('body').find('div#_' + bsu + '_').find('li.active').find('a.modded-link');
					var target_point = '#scroll_' + typo.attr('data-name') + '_' + bsu.toLowerCase() + '_';
          // the firts time is this
          defined_arr = [typo.attr('data-name') + '_' + bsu.toLowerCase() + '_'];
          console.log('array.length');
          console.log(defined_arr.length);

          if (typeof defined_arr != 'undefined' && Array.isArray(defined_arr)) {
            console.log('1st Array is defined');
            defined_arr.forEach(function(item, index, array){
                console.log(item,index);
            });
          }

          var el = document.querySelector(target_point);
          var stickytable = new Stickytable(el, {
            width: "100%",
            height: "90vh"
          });


          $('#dashboard_links').find("a[id^='_']").on('click',function(){
          	  console.log('call to rmenu');
          		var bsu = $(this).attr('data-name');
          		var typo = $('body').find('div#_' + bsu + '_').find('li.active').find('a.modded-link');
          		target_point = '#scroll_' + typo.attr('data-name') + '_' + bsu.toLowerCase() + '_';
              // defined_arr = typo.attr('data-name') + '_' + bsu.toLowerCase() + '_';
              console.log('new_target_point');
          		console.log(target_point);
              // the firts time is this
              console.log('2nd array.length');
              console.log(defined_arr.length);

              // when thew click is end then . so resolv this crap!
              $(target_point).promise().done(function () {
                // NOTE add a counter control
                // control_click = ( typeof control_click != 'undefined' && control_click instanceof Array ) ? control_click : []
                // set the current id value
                var current = typo.attr('data-name') + '_' + bsu.toLowerCase() + '_';
                var count = 0;
                if (typeof defined_arr != 'undefined' && Array.isArray(defined_arr)) {
                  console.log('Array is defined');
                  defined_arr.forEach(function(item, index, array){
                      console.log(item,index);
                      if (current == item) {
                        console.log('found one set a status');
                        count++;
                      }
                  });

                  console.log('add this if status is zero : ', count);
                  if ( count == 0 ) {
                    console.log(current);
                    defined_arr.push(current);
                    // start the counterpart
                    setTimeout(function(){
                      var el = document.querySelector(target_point);
                      var stickytable = new Stickytable(el, {
                        width: "100%",
                        height: "90vh"
                      });
                      // how to callback
                      $("table[id^='table_Costos_']").find("a[id^='this_link_']").on('click', function(event) {
                          event.stopPropagation();
                          event.preventDefault();
                          console.log($(this));
                          console.log( $(this).attr('id') );
                          var str_to_pass = $(this).attr('id');
                          data_code = base64_encode(str_to_pass);
                          var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:" + data_code;
                          console.log(urlStruct);
                          $.colorbox({
                              // 'iframe':true,
                              'href' : urlStruct,
                              'scrolling' : false,
                              'trapFocus' :	true
                          });
                      });
                      // how to callback
                    }, 500);

                  }

                } else {
                  console.log('array is not defined ... until ...');
                }
                console.log(defined_arr.length);
              });

              // NOTE working
              // setTimeout(function(){
              //   var el = document.querySelector(target_point);
              //   var stickytable = new Stickytable(el, {
              //     width: "100%",
              //     height: "90vh"
              //   });
              // }, 2000);


              // document.addEventListener('DOMContentLoaded', function() {
              //    // your code here
              // }, false);

              // $(document).ready(function(){
              // // your code
              // });

              // setTimeout(function(){
              //  //your code here
              // }, 3000);

              //
              // $(document).on('load',target_point,function(){
              //     alert('started');
              //     var el = document.querySelector(target_point);
              //     var stickytable = new Stickytable(el, {
              //       width: "100%",
              //       height: "90vh"
              //     });
              // });

          });


          // NOTE next ... based on promises

          $('body').find("a[data-name^='Costos_']").on('click',function(){

            console.log($(this));
            console.log($(this).attr('data-name'));
            console.log('lenght',defined_arr.length);

            var bsun = $('body').find('li.active').find('a').attr('data-name') ;
            // var typo = $('body').find('div#_' + bsu + '_').find('li.active').find('a.modded-link');
            var target_id = '#scroll_' + $(this).attr('data-name') + '_' + bsun.toLowerCase() + '_';

            console.log(target_id);
            // alert(target_id);

            $(target_id).promise().done(function () {
              // NOTE add a counter control
              // control_click = ( typeof control_click != 'undefined' && control_click instanceof Array ) ? control_click : []
              // set the current id value
              // var current = $(this).attr('data-name') + '_' + bsu.toLowerCase() + '_';
              console.log(target_id);
              var current = target_id.replace(/#scroll_/i, '');

              console.log(current);

              var count = 0;
              if (typeof defined_arr != 'undefined' && Array.isArray(defined_arr)) {
                console.log('Array is defined as type');
                defined_arr.forEach(function(item, index, array){
                    console.log('item,index : ',item,index);
                    if (current == item) {
                      console.log('found one set a status of type');
                      count++;
                    }
                });

                console.log('add this if status in type is zero : ', count);
                if ( count == 0 ) {
                  console.log(current);
                  defined_arr.push(current);
                  // start the counterpart
                  setTimeout(function(){
                    var el = document.querySelector(target_id);
                    var stickytable = new Stickytable(el, {
                      width: "100%",
                      height: "90vh"
                    });
                    // how to callback
                    $("table[id^='table_Costos_']").find("a[id^='this_link_']").on('click', function(event) {
                        event.stopPropagation();
                        event.preventDefault();
                        console.log($(this));
                        console.log( $(this).attr('id') );
                        var str_to_pass = $(this).attr('id');
                        data_code = base64_encode(str_to_pass);
                        var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:" + data_code;
                        console.log(urlStruct);
                        $.colorbox({
                            // 'iframe':true,
                            'href' : urlStruct,
                            'scrolling' : false,
                            'trapFocus' :	true
                        });
                    });
                    // how to callback
                  }, 500);

                }

              } else {
                console.log('array is not defined ... until ...');
              }
              console.log(defined_arr.length);
            });


          });

          // // NOTE work with this approach
          // $("div[id^='scroll_Costos_']").each(function(column) {
          //   //  code ...
          //   console.log($(this));
          //   // NOTE working
          //     var str = "#" + $(this).attr('id');
          //     console.log(str);
          //     // var newStrId = '#' + str.replace(/panels_table_/i, 'scroll_');
          //     var el = document.querySelector(str);
          //     var stickytable = new Stickytable(el, {
          //       width: "100%",
          //       height: "90vh"
          //     });
          //
          // });

          // ALERT drop this when done
          // $("div[id^='link_panels_table_Costos_']").on('click', function(et) {
          //   et.stopPropagation();
          //   et.preventDefault();
          //   var str = $(this).attr('data-name');
          //   var newStrId = '#' + str.replace(/panels_table_/i, 'scroll_');
          //   var el = document.querySelector(newStrId);
          //   // alert('whooa');
          //   var stickytable = new Stickytable(el, {
          //     width: "100%",
          //     height: "90vh"
          //     // height: "700px"
          //   });
          // //
          //   $("table[id^='table_Costos_']").find("a[id^='this_link_']").on('click', function(event) {
          //       event.stopPropagation();
          //       event.preventDefault();
          //       console.log($(this));
          //       console.log( $(this).attr('id') );
          //       var str_to_pass = $(this).attr('id');
          //       data_code = base64_encode(str_to_pass);
          //       var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:" + data_code;
          //       console.log(urlStruct);
          //
          //       $.colorbox({
          //           // 'iframe':true,
          //           'href' : urlStruct,
          //           'scrolling' : false,
          //           'trapFocus' :	true
          //       });
          //
          //   });
          // });


          $("div[id^='link_expand_table_Costos_']").on('click', function(ev) {
            ev.stopPropagation();
            ev.preventDefault();
            console.log($(this).attr('id'));
            console.log($(this).attr('data-name'));
            var str = $(this).attr('data-name');
            var newstr = str.replace(/expand_table_/i, 'modal_table_');
            var modstr = str.replace(/expand_table_/i, 'scroll_');
            console.log(newstr);
            console.log(modstr);
          // NOTE modal executuinbs
            $.colorbox(
                {
                   inline:true,
                  //  iframe:true,
                   scrolling : false,
                  //  className : "fixed-zoom",
                   href:"#"+newstr,
                   trapFocus :	true,
                   width:"96%",
                   height:"100%"
                }
            );
          });



          $("div[id^='link_modal_table_Costos_']").on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();

            console.log($(this).attr('id'));
            console.log($(this).attr('data-name'));

            var str = $(this).attr('data-name');
            var newstr = str.replace(/modal_table_/i, 'print_chart_');
            console.log(newstr);  // Twas the night before Christmas...

            var ids = "#"+newstr + ',' + "#"+$(this).attr('data-name') ;

                $( ids ).printThis({
                    debug: false,               // show the iframe for debugging
                    importCSS: false,            // import page CSS
                    importStyle: false,         // import style tags
                    printContainer: true,       // grab outer container as well as the contents of the selector
                    loadCSS: "<?php echo Dispatcher::baseUrl();?>/css/kml/print.css",  // path to additional css file - use an array [] for multiple
                    pageTitle: "&#8203;", // add title to print page
                    removeInline: true,        // remove all inline styles from print elements
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


					$("table[id^='table_Costos_']").find("a[id^='this_link_']").on('click', function(event) {
							event.stopPropagation();
							event.preventDefault();
							console.log($(this));
							console.log( $(this).attr('id') );
							var str_to_pass = $(this).attr('id');
							data_code = base64_encode(str_to_pass);
							var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:" + data_code;
							console.log(urlStruct);

							$.colorbox({
                  // 'iframe':true,
                  'href' : urlStruct,
                  'scrolling' : false,
                  'trapFocus' :	true
              });

					});




					// NOTE ALERT working
					// @params => this is working in a limited way
				// $("a[id^='this_link_']").on('click',function(event) {
				// 		event.preventDefault();
				//
				// 	console.log($(this));
				// 		console.log($(this).attr('id'));
				// 		data = base64_encode($(this).attr('id'));
				//
				// 		console.log(data);
				//
				// 		// set the url to feed
				// 		var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:"+data;
				// 			console.log(urlStruct);
				// 		$.fancybox({
				// 			'type': 'ajax',
				// 			'href': urlStruct,
				// 			'autoScale': false,
				// 			'autoDimensions': false
				// 		});
				// 		return false;
				// 	});





				// $(target_point).on('click',function(event) {
				// 		event.preventDefault();
				//
				// 		console.log($(this));
				// 		console.log($(this).attr('id'));
				// 		data = base64_encode($(this).attr('id'));
				//
				// 		console.log(data);
				//
				// 		// set the url to feed
				// 		var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:"+data;
				// 			console.log(urlStruct);
				// 		$.fancybox({
				// 			'type': 'ajax',
				// 			'href': urlStruct,
				// 			'autoScale': false,
				// 			'autoDimensions': false
				// 		});
				// 		return false;
				// });

				// NOTE WORK TO HIR

				// NOTE hide method , overcharge ??



					$('tr').filter(
							function(){
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
				// 		var focus_id = 'focus_' + $(this).attr('id');s
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
        <?php foreach ($chart as $inx_year => $inx_chart) {
    ?>
						<?php foreach ($inx_chart as $inx_key => $inx_chart_area) {
        ?>
            	<?php foreach ($inx_chart_area as $inx_area => $inx_chart_type) {
            ?>

											// set the scroll
											// p2g_('scroll_<?php e("{$mod_index[$inx_key]}")?>_<?php e(strtolower(str_replace(' ', '_', $inx_area)))?>_');
											// set the focus in
											// cursorFocus(document.getElementById('search_<?php e("{$mod_index[$inx_key]}")?>_<?php e(strtolower(str_replace(' ', '_', $inx_area)))?>_'));

                        //header section
                       Highcharts.chart('chart_<?php e("{$mod_index[$inx_key]}")?>_<?php e(strtolower(str_replace(' ', '_', $inx_area)))?>_', {
                            chart: {
                                type: 'column',
                                zoomType: 'x'
                            },
                            title: {
                                text: 'Indicadores de <?php e(ucwords($mod_index_one[$inx_key]))?> para <?php e($inx_area)?>'
                            },
														// colors: ['blue', 'green', 'orange', 'red', 'purple', 'brown'], // uncomment with the color parser
                            credits:{enabled:false},
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
                                                        } ?>
                                    {
                                        name: <?php e("'Real'")?>,
                                        data: [null, <?php e(implode(',', $json_data_[$inx_year][$inx_area][$inx_key])); ?>]
                                    },
																		{
                                        name: <?php e("'Presupuesto'")?>,
                                        data: [null, <?php e(implode(',', $json_data_prep[$inx_year][$inx_area][$inx_key])); ?>]
                                    }
                            ]
                    });
            <?php
        } ?>
					<?php
    } ?>
			<?php
} ?>
});
	// &#93;&#93;>
</script>
