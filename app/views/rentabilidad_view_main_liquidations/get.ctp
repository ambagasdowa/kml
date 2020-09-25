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

<div style="display:none;">
		<div id="json_one">
			<?php print($json_parsing_level_one) ?>
		</div>
		<div id="json_two">
			<?php print($json_parsing_level_two) ?>
		</div>
</div>

	<div class="row head_datetime">
		<div></div>

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

		<div></div>

	</div>

	<!-- <div class="row">
		<div class="twelve columns">
			<div id="chart" class="chart" style="display:none;" >
						<div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">
						</div>
			</div>
		</div>
	</div> -->

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

<div id="first-datatable-output" class="table-responsive">


<?php 
			/* 
?>

<table id="table_res">
		<thead>
			<tr>
					<th>id</th>
					<th>block</th>
			    <th>id_area</th>
			    <th>year</th>
			    <th>UnidadNegocio</th>
			    <th>liquidacion</th>
			    <th>fecha_liquidacion</th>
			    <th>Mes</th>
			    <th>Unidad</th>
			    <th>COMBUSTIBLE</th>
			    <th>CASETAS</th>
			    <th>CONCEPTOS_SUELDO</th>
			    <th>OTROS</th>
			    <th>qtyCombustible</th>
			    <th>qtyCasetas</th>
			    <th>qtySueldoLiquidacion</th>
			    <th>qtyOtros</th>
			    <th>IngresoTotalRuta</th>
			    <th>viajes</th>
			    <th>rendimiento_reseteo</th>
			    <th>del</th>
			    <th>al</th>
			    <th>KmsCaminoLleno</th>
			    <th>KmsCamionVacio</th>
			    <th>DuracionViaje</th>	
			</tr>
		</thead>
	<?php
		foreach ($rentabilidadViewMainLiquidations as $rentabilidadViewMainLiquidation):
	?>
	<tr>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['block']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id_area']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['year']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['UnidadNegocio']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['liquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['fecha_liquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Mes']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Unidad']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CASETAS']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CONCEPTOS_SUELDO']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['OTROS']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCombustible']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCasetas']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtySueldoLiquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyOtros']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['viajes']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['rendimiento_reseteo']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['del']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['al']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCaminoLleno']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCamionVacio']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['DuracionViaje']; ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>

i<?php */ ?>

<!-- NOTE  Start the Dashboard -->

<table>
	<?php foreach ($rentabilidadViewMainLiquidations as $unidad => $liquidacion): ?>
		<th colspan="10">
			<b><?php echo $unidad; ?></b>
		</th>
		<?php foreach ($liquidacion as $no_liquidacion => $rentabilidadViewMainLiquidation): ?>

			<tr>
				<td colspan="10"><?php echo $no_liquidacion; ?></td>
			</tr>

			<tr>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id_area']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['year']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['UnidadNegocio']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['liquidacion']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['fecha_liquidacion']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Mes']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Unidad']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CASETAS']; ?>&nbsp;</td>
			</tr>

			<tr>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CONCEPTOS_SUELDO']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['OTROS']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCombustible']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCasetas']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtySueldoLiquidacion']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyOtros']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['viajes']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['rendimiento_reseteo']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['del']; ?>&nbsp;</td>
			</tr>

			<tr>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['al']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCaminoLleno']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCamionVacio']; ?>&nbsp;</td>
				<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['DuracionViaje']; ?>&nbsp;</td>
			</tr>

			<tr>
				<td colspan="10">&nbsp;</td>
			</tr>

		<?php endforeach; ?>

	<?php endforeach; ?>
</table>



