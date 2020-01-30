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
		// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
		// $evaluate = false;
		// $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
		// blog
		$evaluate = true;
		// $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
		// $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
		$requiere = $evaluate ? e($this->element('kml/rentabilidad/rentabilidad')) : e($this->element('requiere/norequiere') );
		?>

		<!-- temporal style  -->

		<style media="screen">

		.ninja-scroll {
			scroll-behavior: smooth;
			overflow-x: auto;
			/*overflow-y: auto;*/
		}
		.avg {
			font-style: italic;
			text-decoration: overline;
		}

		select::-ms-expand {
			display: none;
		}

		.detail_header {
			display: none;
		}

		.head_datetime{
			display: none;
		}

		.container-mod{
			position: relative;
			width: 100%;
			max-width: 95%;
			margin: 0 auto;
			padding: 0 20px;
			box-sizing: border-box;
		}

		.colorbax {
			position: relative;
			width: 100%;
			min-width: 95%;
			margin: 0 auto;
			padding: 0 20px;
			box-sizing: border-box;
		}

		.current {
			display: inline-block;  /* For IE11/ MS Edge bug */
			pointer-events: none;
			cursor: default;
			color:gray !important;
			text-decoration: none;
		}

		.current > a {
		  color: gray !important;
		  display: inline-block;  /* For IE11/ MS Edge bug */
		  pointer-events: none;
		  text-decoration: none;
		}

		/**PAGINATOR STYLE*/
		.easyPaginateNav{
			position: fixed;
			bottom: 1%;
			left: 35%;
			cursor: pointer;
			z-index:150;
		}

		.icon{
		  transition:all 0.5s;
		  opacity:0;
		}

		.link_external:hover .icon{
		  opacity:1;
		}


		</style>


		<div class="container-mod">

					<div class="row">
							<div class="twelve columns ">
								<h6 class="docs-header">StorageUsers</h6>
						</div>
					</div>

		</div>

<?php 	echo $this->Session->flash();?>

<div id="first-datatable-output" class="table-responsive">

				<table id="table_res" class="table table-striped table-bordered">
					<thead>
						<tr>
								<th>id</th>
								<th>user_id</th>
								<th>username</th>
								<th>storage</th>
								<th>clear_key</th>
								<th>description</th>
								<th>status</th>
								<th>created</th>
								<th>modified</th>
								<th>Actions</th>

						</tr>
					</thead>
						<?php
						$i = 0;
						foreach ($controlDeskUserControls as $controlDeskUserControl):
							$class = null;
							if ($i++ % 2 == 0) {
								$class = ' class="altrow"';
							}
						?>
			<tr<?php echo $class;?>>
				<td><?php echo $controlDeskUserControl['ControlDeskUserControl']['id']; ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($controlDeskUserControl['User']['full_name'], array('controller' => 'users', 'action' => 'view', $controlDeskUserControl['User']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($controlDeskUserControl['User']['username'], array('controller' => 'users', 'action' => 'view', $controlDeskUserControl['User']['id'])); ?>
				</td>
				<td><?php echo $controlDeskUserControl['ControlDeskUserControl']['storage']; ?>&nbsp;</td>
				<td><?php echo $controlDeskUserControl['ControlDeskUserControl']['clear_key']; ?>&nbsp;</td>
				<td><?php echo $controlDeskUserControl['ControlDeskUserControl']['description']; ?>&nbsp;</td>
				<td><?php echo $controlDeskUserControl['ControlDeskUserControl']['status']; ?>&nbsp;</td>
				<td><?php echo $controlDeskUserControl['ControlDeskUserControl']['created']; ?>&nbsp;</td>
				<td><?php echo $controlDeskUserControl['ControlDeskUserControl']['modified']; ?>&nbsp;</td>


				<td class="actions">
					<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $controlDeskUserControl['ControlDeskUserControl']['id']),array('div'=>false)); ?>
				</td>

			</tr>
		<?php endforeach; ?>
						</table>

</div>

<script type="text/javascript">


		$(document).ready(function () {

			var table_a = $('#table_res').DataTable(
				Object.assign( {}, options_datatable, calculate_row([],[]) )
			 );

		});


</script>
