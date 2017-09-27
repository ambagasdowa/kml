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

      hr {
          -moz-border-bottom-colors: none;
          -moz-border-image: none;
          -moz-border-left-colors: none;
          -moz-border-right-colors: none;
          -moz-border-top-colors: none;
          border-color: #EEEEEE -moz-use-text-color #FFFFFF;
          border-style: solid none;
          border-width: 1px 0;
          margin: 18px 0;
        }

      .dash_detail {
        width:30%;

      }

			.print-link:hover {
				/*font-size:12px;*/
				color: #781351;
				cursor:pointer;
			}

			.container-fluid {
		    padding-right: 15px !important;
		    padding-left: 15px !important;
		    margin-right: 20px !important;
		    margin-left: 20px !important;
			}

			.subtitle{
			  color: #333 !important;
			}
		</style>

    <div class="container-fluid">

      <div id="print_report" class="row">

  		    <!-- <input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter"> -->
          <!-- <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main"> -->

          <div class="page-header">

						<h2 class="semi-bold text-primary weather-widget-big-text no-margin p-t-35 p-b-10">

							<?php echo "{$header_string_data['area']}"?>
							<small class="pull-right">
								<?php echo "{$header_string_data['Mes']}"?>
								&nbsp;
								<?php echo "{$header_string_data['cyear']}"?>
								&nbsp;
								<a class="print-link avoid-this"><i class="fa fa-print" aria-hidden="true"></i></a>
							</small>

						</h2>


						<!-- <div > -->

						<!-- </div> -->
						<!-- <button class="print-link avoid-this"> -->
						<!-- Print this in a new window, without this button and the title -->
						<!-- Print -->
						<!-- </button> -->
          </div>

          <table class="tableHeader" width="100%">

            <tr class="trHeader">
                <td class="tiles white text-center dash_detail">
                    <h2 class="semi-bold text-primary weather-widget-big-text no-margin p-t-35 p-b-10"><?php echo "{$header_string_data['account']}"?></h2>
                        <div class="tiles-title blend p-b-25 subtitle">Cuenta</div>
                            <div class="clearfix"></div>
                </td>

                <td class="tiles white text-center dash_detail">
                    <h2 class="semi-bold text-primary weather-widget-big-text no-margin p-t-35 p-b-10"><?php echo "{$header_string_data['real']}"?></h2>
                        <div class="tiles-title blend p-b-25 subtitle">Real</div>
                            <div class="clearfix"></div>
                </td>

                <td class="tiles white text-center dash_detail">
                    <h2 class="semi-bold text-primary weather-widget-big-text no-margin p-t-35 p-b-10"><?php echo "{$header_string_data['presupuesto']}"?></h2>
                        <div class="tiles-title blend p-b-25 subtitle">Presupuesto</div>
                            <div class="clearfix"></div>
                </td>
              </tr>

          </table>

          <hr />

              <div class="table-responsive">
    			         <span class="filter-container">
    				             <table class="tableDetail order-table table table-bordered table-hover table-striped responstable">
    				                   <thead>
    					                        <tr>
              													<!-- <th><?php e('id');?></th> -->
              													<!-- <th><?php e('_source_company');?></th> -->
              													<!-- <th><?php e('area');?></th> -->

                                        <th><?php e('Nombre de Cuenta');?></th>
              													<th><?php e('U.N.');?></th>
              													<!-- <th><?php e('mes');?></th> -->
              													<!-- <th><?php e('account');?></th> -->


              													<!-- <th><?php e('_period');?></th> -->
              													<th><?php e('Descripcion');?></th>
              													<th><?php e('Nombre de Entidad');?></th>
              													<th><?php e('Transac.');?></th>
              													<th><?php e('Referencia');?></th>
              													<th><?php e('Referencia Externa');?></th>
                                        <th><?php e('Real');?></th>
              													<th><?php e('Presupuesto');?></th>
  					                          </tr>
    				                    </thead>

    				<?php
    				    foreach ($reporterPortalCostosDetailsAccounts['ReporterPortalCostosDetailsAccount'] as $reporterPortalCostosDetailsAccount):
    				?>
                                    	<tr>
                                    		<!-- <td><?php echo $reporterPortalCostosDetailsAccount['id']; ?>&nbsp;</td> -->
                                    		<!-- <td><?php echo $reporterPortalCostosDetailsAccount['_source_company']; ?>&nbsp;</td> -->
                                    		<!-- <td><?php echo $reporterPortalCostosDetailsAccount['area']; ?>&nbsp;</td> -->
                                        <td><?php echo $reporterPortalCostosDetailsAccount['name']; ?>&nbsp;</td>
                                    		<td><?php echo $reporterPortalCostosDetailsAccount['UnidadNegocio']; ?>&nbsp;</td>
                                    		<!-- <td><?php echo $reporterPortalCostosDetailsAccount['mes']; ?>&nbsp;</td> -->
                                    		<!-- <td><?php echo $reporterPortalCostosDetailsAccount['account']; ?>&nbsp;</td> -->
                                    		<!-- <td><?php echo $reporterPortalCostosDetailsAccount['_period']; ?>&nbsp;</td> -->
                                    		<td><?php echo $reporterPortalCostosDetailsAccount['Descripcion']; ?>&nbsp;</td>
                                    		<td><?php echo $reporterPortalCostosDetailsAccount['NombreEntidad']; ?>&nbsp;</td>
                                    		<td><?php echo $reporterPortalCostosDetailsAccount['TipoTransaccion']; ?>&nbsp;</td>
                                    		<td><?php echo $reporterPortalCostosDetailsAccount['Referencia']; ?>&nbsp;</td>
                                    		<td><?php echo $reporterPortalCostosDetailsAccount['ReferenciaExterna']; ?>&nbsp;</td>
                                    		<!-- <td><?php echo $reporterPortalCostosDetailsAccount['type']; ?>&nbsp;</td> -->
                                    		<!-- <td><?php echo $reporterPortalCostosDetailsAccount['cyear']; ?>&nbsp;</td> -->
                                        <td><?php echo $reporterPortalCostosDetailsAccount['Real']; ?>&nbsp;</td>
                                    		<td><?php echo $reporterPortalCostosDetailsAccount['Presupuesto']; ?>&nbsp;</td>

                                    	</tr>
           <?php endforeach; ?>
    				              </table>
    			         </span> <!--class="filter-container"-->
              </div>
            <!-- </div>  -->





          </div> <!--row-->
        </div> <!--container fluid-->

        <script>
    	$(document).ready(function () {
    		// $(function () {
    		// 	$("table").stickyTableHeaders({fixedOffset: 22,marginTop: 22});
    		// });
    		/*! Copyright (c) 2011 by Jonas Mosbech - https://github.com/jmosbech/StickyTableHeaders
    			MIT license info: https://github.com/jmosbech/StickyTableHeaders/blob/master/license.txt */

					$("#print_report").find('.print-link').on('click', function() {
							// evt.preventDefault();
							$('#print_report').printThis({
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

    	});
        </script>
