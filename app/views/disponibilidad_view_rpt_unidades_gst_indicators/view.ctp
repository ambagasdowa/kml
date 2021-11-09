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



<!-- Activate Chart in Historical -->
 <div class="row">
	<div class="one column">&nbsp;</div>
	<div class="eleven columns">
		<!-- <div id="chart" class="chart" style="display:none;" > -->
		<div id="art" class="art" >
					<!-- <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto"> -->
					<div>
						<!-- graphics -->
						<h1>Historico de la  Unidad <?php print($hist_unit)?></h1>
					</div>
		</div>
	</div>
 </div>

<div class="con">
	<div id="cont" style="height: 10px; margin: 0 auto"></div>
</div>

<div id="first-datatable-output" class="table-responsive">


		<table id="table_hist" style="width:100%;" class="display order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
				<!-- <th>id</th> -->
				<th>Unidad</th>
				<th>Estatus</th>
				<th>Descripcion</th>
				<th>Fecha Cambio</th>
				<th>Fecha de Creacion</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($disponibilidadViewHistoricalGstIndicators as $key => $disponibilidadViewHistoricalGstIndicator) {
			// code...
		?>
		<tr>
			<!-- <td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['id']; ?></td> -->
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['unidad']; ?></td>
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['estatus']; ?></td>
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['descripcion']; ?></td>
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['creacion']; ?></td>
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['creacion']; ?></td>

		</tr>
	<?php } //endforeach; ?>
		</tbody>
		<!-- <tfoot>
	            <tr>
	                <th colspan="11" style="text-align:right">Total:</th>
	                <th></th>
	                <th></th>
	                <th></th>
	            </tr>
	  </tfoot> -->
		</table>
</div>

<!-- if clients -->
<script type="text/javascript">

$(document).ready(function(){

	// ================================================================================================================== //
	// Historical view mechanism
	// ================================================================================================================== //

			var table_x = $('#table_hist').DataTable(
				Object.assign( {}
					, options_datatable
//				  , calculate_row([1])
				)
			 );

});
</script>
