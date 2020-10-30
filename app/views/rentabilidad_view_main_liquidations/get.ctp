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
.wrap {
	display: flex;
/*	display:inline-block; */
  align-items: center;
/*  justify-content: center;*/
	overflow:auto;
}

.main_table {
/*  border: 1px solid #555;*/
		border: 1px solid #000;
		display:flex;
}

.sum {
	width:90px;
	
}



#innerbox {
   width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
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

	<div class="row">
		<?php (!isset($message) || empty($message)) ? : e($message); ?>
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

			<!-- <div id="print" class="pull-right"> -->
				<!-- <i class="fa fa-print" aria-hidden="true"></i> -->
			<!-- </div> -->
		</div>

	</div>
<!--
	<div class="row">
 	 <div class="twelve columns">
 		 <div id="chart" class="chart" >
 					 <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">

 					 </div>
 		 </div>
 	 </div>
  </div> -->

<div class="con">
<div id="cont" style="height: 10px; margin: 0 auto"></div>
</div>


<div class="row">

 </div>

 <?php
			 echo $this->Form->create(
																 'ProvidersControlsFile'
																 ,array(
																				 'enctype' => 'multipart/form-data'
																				 ,'class'=>'form'
																				 ,'id'=>'tform'
																			 )
																 );
 ?>

		<div class="label one columns input-group">
		<p>
			<?php
						echo
								$this->Html->link(
																		__('ExportIcon', true),
																		array('action' => 'export', null),
																		array('id'=>'export','div'=>false,'class'=>'btn btn-primary btn-sm pull-right','tabindex'=>'6')
																	);
			?>
		</p>
		</div>

<div id="first-datatable-output" class="wrap">

<!-- NOTE  Start the Dashboard -->

	<?php foreach ($rentabilidadViewMainLiquidations as $unidad => $liquidacion): ?>
 
<table id="main_container_<?php echo $unidad ?>" class="main_table">

				<tr>	
					<td colspan="<?php echo $tds+2 ?>">
							<b><?php echo $unidad; ?></b>
					</td>
				</tr>

		<!--insert by Bsu-->
				<td>
					<table id="left_menu">
						<!--	<tr><td>Unidad</td></tr> -->
							<tr><td>Unidad de Negocio</td></tr>
							<tr><td>Liquidacion</td></tr>
							<tr><td>Viajes</td></tr>
							<tr><td>Dias de Viaje</td></tr>
							<tr><td>Duracion en d&iacute;as</td></tr>
							<tr><td>Kms Camion Lleno</td></tr>
							<tr><td>Kms Camion Vacio</td></tr>
							<tr><td>QtyCombustible</td></tr>
							<tr><td>Rendimiento Reseteo</td></tr>
							<tr><td>Rendimiento Calculado</td></tr>
							<tr><td>Ingreso Total Ruta</td></tr>
							<tr><td>Combustible</td></tr>
							<tr><td>Casetas</td></tr>
							<tr><td>ConceptosSueldo</td></tr>
							<tr><td>Otros</td></tr>
							<tr><td>Costo Directo del Viaje</td></tr>			
						</table>
				</td>



		<?php foreach ($liquidacion as $no_liquidacion => $rentabilidadViewMainLiquidation): ?>

				<td id="main_content_<?php echo $no_liquidacion ?>">

					<table id="<?php echo $no_liquidacion?>" width="100%">

				<!--			<tr><td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Unidad']; ?>&nbsp;</td></tr> -->
							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['UnidadNegocio']; ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['liquidacion']; ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['viajes']; ?>&nbsp;</td></tr>
							<tr>
									<td>
										<?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['del']; ?>
									</td>
									<td>
										<?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['al'];?>
									</td>
							</tr>

							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['DuracionViaje']; ?>&nbsp;</td></tr> 

							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCaminoLleno']; ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCamionVacio']; ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCombustible'] ,2 ,'.' ,',' ); ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['rendimiento_reseteo'] ,2 ,'.' ,',' ); ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['RendViaje'] ,2 ,'.' ,',' ); ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta'] ,2 ,'.' ,',' ); ?>&nbsp;</td></tr>

							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE'] ,2 ,'.' ,',' ); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_combustible'] ,2 ,'.' ,',' ) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CASETAS'],2,'.',','); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_casetas'],2,'.',',') . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CONCEPTOS_SUELDO'],2,'.',','); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_conceptos_sueldo'],2,'.',',') . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['OTROS'],2,'.',','); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_otros'],2,'.',',') . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CostoDirectoViaje'],2,'.',','); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_CostoDirectoViaje'],2,'.',',') . ' %'; ?>
								</td>
							</tr>				
<!-- Until hir is the work -->
						</table>
				  </td>

		<?php endforeach; ?>

					<td>
						<table>
							<tr><td colspan="2">SUMA</td></tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo $sum_data[$unidad]['viajes'] ?> </td></tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr><td colspan="2"> <?php echo $sum_data[$unidad]['DuracionViaje'] ?>   </td></tr>
							<tr><td colspan="2"> <?php echo $sum_data[$unidad]['KmsCaminoLleno'] ?> </td></tr>
							<tr><td colspan="2"> <?php echo $sum_data[$unidad]['KmsCamionVacio'] ?> </td></tr>
							<tr><td colspan="2"> <?php echo number_format ($sum_data[$unidad]['qtyCombustible'],2,'.',',') ?> </td></tr>
							<tr><td colspan="2"> <?php echo number_format ($sum_data[$unidad]['rendimiento_reseteo'],2,'.',',') ?> </td></tr>
							<tr><td colspan="2"> <?php echo number_format ($sum_data[$unidad]['RendViaje'],2,'.',',') ?> </td></tr>
							<tr><td colspan="2"> <?php echo number_format ($sum_data[$unidad]['IngresoTotalRuta'],2,'.',',') ?></td></tr>
							<tr>
								<td>
										<?php echo number_format($sum_data[$unidad]['Combustible'],2,'.',',') ?></td>
								<td class="sum">
										<?php echo number_format( ( ($sum_data[$unidad]['Combustible'] / $sum_data[$unidad]['IngresoTotalRuta']) * 100 ),2,'.',',') . ' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format( $sum_data[$unidad]['Casetas'],2,'.',',') ?>
								</td>
								<td class="sum">
										<?php echo number_format( ( ( $sum_data[$unidad]['Casetas'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ,2,'.',',') .' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($sum_data[$unidad]['ConceptosSueldo'],2,'.',',') ?>
								</td>
								<td class="sum">
										<?php echo number_format( ( ( $sum_data[$unidad]['ConceptosSueldo'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ,2,'.',',') . ' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($sum_data[$unidad]['Otros'],2,'.',',') ?>
								</td>
								<td class="sum">
										<?php echo number_format( ( ( $sum_data[$unidad]['Otros'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ,2,'.',',') . ' %'; ?> &nbsp;
								</td> 
							</tr>

							<tr>
								<td>
										<?php echo number_format($sum_data[$unidad]['CostoDirectoViaje'] ,2,'.',','); ?>
								</td>
								<td class="sum">
										<?php echo number_format( ( ( $sum_data[$unidad]['CostoDirectoViaje'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ,2,'.',',') . ' %'; ?>&nbsp;
								</td> 
							</tr>

						</table>
					</td>

</table>

<p>&nbsp;</p>

<?php endforeach; ?>

</div>


				<script type="text/javascript">

/*
		  $(document).ready(function () {

			//	$(".search_udn").select2();

					$("#export").on('click', function(event) {

								event.stoppropagation();
								event.preventdefault();

								var data_code = $(this).attr('id');

								var serial = json.stringify($("#pform").serializearray());
								console.log(serial);
								data_code = base64_encode(serial);
								console.log(data_code);
								var urlstruct = "<?php echo dispatcher::baseurl();?>/RentabilidadViewMainLiquidations/export/data:"+data_code;
								console.log(urlstruct);
								console.log("loaded...");

								$( ".updatesearchresult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">loading...</span><div>');

								// $( ".updatesearchresult" ).load(urlstruct);
								$( ".updatesearchresult" ).load(urlstruct,function(responsetext, statustext, xhr) {
									// add table uix
									//
									//note merge global options with unique datatable options for disponibilidad 

									options_module = {...options_datatable,...options_disponibilidad}	;	
									

									var table_a = $('#table_grp').datatable(
										object.assign( {}, options_datatable
											, calculate_row([0])
										 )
									 );

									var table_b = $('#table_det').datatable(
										object.assign( {}
											, options_module
											// ,calculate_row[0])
										)
									 );

									// var table_a = $('#table_grp').datatable(options_datatable);
									// var table_b = $('#table_det').datatable(options_datatable);
									// // end table
									$('#filterall').on( 'keyup', function () {
									    table_a.search( this.value ).draw();
									    table_b.search( this.value ).draw();
									} );

									// console.log(statustext);
									if(statustext == "error"){
												 thisurl = "<?php echo dispatcher::baseurl();?>/users/login";
													 console.log(thisurl);
													 window.location.href(thisurl);
									}

								});
					});
			});

*/
	</script>
