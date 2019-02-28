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

	<div class="row">
		<div class="twelve columns">
			<div id="chart" class="chart" style="display:none;" >
						<div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">
						</div>
			</div>
		</div>
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

			<div id="print" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>



<div id="first-datatable-output" class="table-responsive">


		<table id="indTable" class="order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
				<!-- <th><?php echo 'id';?></th> -->
				<th><?php echo 'Viaje';?></th>
				<!-- <th><?php echo 'Area';?></th> -->
				<th><?php echo 'Operador';?></th>
				<th><?php echo 'Tracto';?></th>
				<th><?php echo 'TipoOperacion';?></th>
				<th><?php echo 'Fecha';?></th>
				<th><?php echo 'Origen';?></th>
				<th><?php echo 'Destino';?></th>
				<!-- <th><?php echo 'route';?></th> -->
				<th><?php echo 'Modelo';?></th>
				<th><?php echo 'Kms';?></th>
				<th><?php echo 'Diesel';?></th>
				<th><?php echo 'Rendimiento';?></th>
				<!-- <th><?php echo 'Periodo';?></th> -->
				<!-- <th><?php echo 'cyear';?></th> -->
			</tr>
		</thead>
		<?php
		foreach ($rendViewFullGstCoreIndicators as $key => $rendViewFullGstCoreIndicator) {
			// code...
		?>
		<tr>
			<!-- <td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['id']; ?>&nbsp;</td> -->
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['viaje']; ?>&nbsp;</td>
			<!-- <td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['area']; ?>&nbsp;</td> -->
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['operador']; ?>&nbsp;</td>
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tracto']; ?>&nbsp;</td>
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']; ?>&nbsp;</td>
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['fecha']; ?>&nbsp;</td>
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['origen']; ?>&nbsp;</td>
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['destino']; ?>&nbsp;</td>
			<!-- <td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']; ?>&nbsp;</td> -->
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['modelo']; ?>&nbsp;</td>
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['kms']; ?>&nbsp;</td>
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['diesel']; ?>&nbsp;</td>
			<td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['rendimiento']; ?>&nbsp;</td>
			<!-- <td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['periodo']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['cyear']; ?>&nbsp;</td> -->
			<?php $totalkms += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['kms']; ?>
			<?php $totaldiesel += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['diesel']; ?>

		</tr>
	<?php }//endforeach; ?>
		<!-- <tr>
			<td>totalkms</td>
			<td><?php echo $totalkms ?></td>
			<td>totaldiesel</td>
			<td><?php echo $totaldiesel ?></td>
		</tr> -->
		</table>
</div>

<!-- if clients -->
<script type="text/javascript">
		$(document).ready(function(){

		});
</script>
