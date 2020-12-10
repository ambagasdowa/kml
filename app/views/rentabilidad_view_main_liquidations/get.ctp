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

.main{
	white-space:nowrap;
}

.sum {
	width:90px;
}


/*
table{
		border-collapse: collapse; 
}
*/

.test{
	border: 1px solid #000;
}

#innerbox {
   width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


/*style excel*/
.excel_cell{
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	/*font-size: 13px;*/
	font-weight:  normal;
	/*padding: 4px;*/
/*	white-space: pre-line;*/
	white-space: nowrap;
	min-width: 130px !important;
}

._xls_cell {
	empty-cells: show;
	white-space: nowrap;
  min-width: 130px !important;
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

</style>



<div class="con">
<div id="cont" style="height: 10px; margin: 0 auto">

		<div class="nobreak">
		<p>
			<?php
						echo
								$this->Html->link(
																		__('Exportar', true),
																		array('action' => 'export', null),
																		array('id'=>'export','div'=>false,'class'=>'btn btn-primary btn-sm pull-right','tabindex'=>'6')
																	);
			?>
		</p>
		</div>

</div>
</div>


<div class="row">

 </div>

 <?php
/* 
				echo $this->Form->create(
																 'ProvidersControlsFile'
																 ,array(
																				 'enctype' => 'multipart/form-data'
																				 ,'class'=>'form'
																				 ,'id'=>'tform'
																			 )
				);
 */				
 ?>


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
							<tr><td class="_cell_header _xls_cell">Unidad de Negocio</td></tr>
							<tr><td class="_cell_header _xls_cell">Liquidacion</td></tr>
							<tr><td class="_cell_header _xls_cell">Viajes</td></tr>
							<tr><td class="_cell_header _xls_cell">Dias de Viaje</td></tr>
							<tr><td class="_cell_header _xls_cell">Duracion en d&iacute;as</td></tr>
							<tr><td class="_cell_header _xls_cell">Kms Camion Lleno</td></tr>
							<tr><td class="_cell_header _xls_cell">Kms Camion Vacio</td></tr>
							<tr><td class="_cell_header _xls_cell">QtyCombustible</td></tr>
							<tr><td class="_cell_header _xls_cell">Rendimiento Reseteo</td></tr>
							<tr><td class="_cell_header _xls_cell">Rendimiento Calculado</td></tr>
							<tr><td class="_cell_header _xls_cell">Ingreso Total Ruta</td></tr>
							<tr><td class="_cell_header _xls_cell">Combustible</td></tr>
							<tr><td class="_cell_header _xls_cell">Casetas</td></tr>
							<tr><td class="_cell_header _xls_cell">ConceptosSueldo</td></tr>
							<tr><td class="_cell_header _xls_cell">Otros</td></tr>
							<tr><td class="_cell_header _xls_cell">Costo Directo del Viaje</td></tr>			
						</table>
				</td>



		<?php foreach ($liquidacion as $no_liquidacion => $rentabilidadViewMainLiquidation): ?>

				<td id="main_content_<?php echo $no_liquidacion ?>">

					<table id="<?php echo $no_liquidacion?>" width="100%">

				<!--			<tr><td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Unidad']; ?>&nbsp;</td></tr> -->
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['UnidadNegocio']; ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['liquidacion']; ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['viajes']; ?>&nbsp;</td></tr>
							<tr>
									<td class="_cell_header _xls_cell">
										<?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['del']; ?>
									</td>
									<td class="_cell_header _xls_cell">
										<?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['al'];?>
									</td>
							</tr>

							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['DuracionViaje']; ?>&nbsp;</td></tr> 

							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCaminoLleno']; ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCamionVacio']; ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCombustible'] ,2 ,'.' ,',' ); ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['rendimiento_reseteo'] ,2 ,'.' ,',' ); ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['RendViaje'] ,2 ,'.' ,',' ); ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta'] ,2 ,'.' ,',' ); ?>&nbsp;</td></tr>

							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE'] ,2 ,'.' ,',' ); ?>
								</td>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_combustible'] ) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CASETAS'],2,'.',','); ?>
								</td>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_casetas']) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CONCEPTOS_SUELDO'],2,'.',','); ?>
								</td>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_conceptos_sueldo']) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['OTROS'],2,'.',','); ?>
								</td>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_otros']) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CostoDirectoViaje'],2,'.',','); ?>
								</td>
								<td class="_cell_header _xls_cell" >
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_CostoDirectoViaje']) . ' %'; ?>
								</td>
							</tr>				
<!-- Until hir is the work -->
						</table>
				  </td>

		<?php endforeach; ?>

					<td>
						<table>
							<tr><td colspan="2" class="_cell_header _xls_cell">SUMA</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $sum_data[$unidad]['viajes'] ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo $sum_data[$unidad]['DuracionViaje'] ?>   </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo $sum_data[$unidad]['KmsCaminoLleno'] ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo $sum_data[$unidad]['KmsCamionVacio'] ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo number_format ($sum_data[$unidad]['qtyCombustible'],2,'.',',') ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo number_format ($sum_data[$unidad]['rendimiento_reseteo'],2,'.',',') ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo number_format ($sum_data[$unidad]['RendViaje'],2,'.',',') ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo number_format ($sum_data[$unidad]['IngresoTotalRuta'],2,'.',',') ?></td></tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($sum_data[$unidad]['Combustible'],2,'.',',') ?></td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ($sum_data[$unidad]['Combustible'] / $sum_data[$unidad]['IngresoTotalRuta']) * 100 )) . ' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format( $sum_data[$unidad]['Casetas'],2,'.',',') ?>
								</td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ( $sum_data[$unidad]['Casetas'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ) .' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($sum_data[$unidad]['ConceptosSueldo'],2,'.',',') ?>
								</td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ( $sum_data[$unidad]['ConceptosSueldo'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ) . ' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($sum_data[$unidad]['Otros'],2,'.',',') ?>
								</td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ( $sum_data[$unidad]['Otros'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ) . ' %'; ?> &nbsp;
								</td> 
							</tr>

							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($sum_data[$unidad]['CostoDirectoViaje'] ,2,'.',','); ?>
								</td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ( $sum_data[$unidad]['CostoDirectoViaje'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ) . ' %'; ?>&nbsp;
								</td> 
							</tr>

						</table>
					</td>

</table>

<p>&nbsp;</p>
<?php endforeach; ?>
<!--end container-->
<!--end table static_frame-->

</div>

