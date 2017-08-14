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
	

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Casetas View Resume', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Casetas View Resumes');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('monto_conciliado');?></th>
													<th><?php echo $this->Paginator->sort('cruces_conciliados');?></th>
													<th><?php echo $this->Paginator->sort('_montos');?></th>
													<th><?php echo $this->Paginator->sort('cruces');?></th>
													<th><?php echo $this->Paginator->sort('percent_montos');?></th>
													<th><?php echo $this->Paginator->sort('percent_cruces');?></th>
													<th><?php echo $this->Paginator->sort('counter');?></th>
													<th><?php echo $this->Paginator->sort('_filename');?></th>
													<th><?php echo $this->Paginator->sort('_area');?></th>
													<th><?php echo $this->Paginator->sort('casetas_units_id');?></th>
													<th><?php echo $this->Paginator->sort('casetas_event_name');?></th>
													<th><?php echo $this->Paginator->sort('casetas_parents_name');?></th>
													<th><?php echo $this->Paginator->sort('casetas_standings_name');?></th>
													<th><?php echo $this->Paginator->sort('historical_id');?></th>
													<th><?php echo $this->Paginator->sort('_ctime');?></th>
													<th><?php echo $this->Paginator->sort('fileStatId');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($casetasViewResumes as $casetasViewResume):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $casetasViewResume['CasetasViewResume']['id']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['monto_conciliado']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['cruces_conciliados']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['_montos']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['cruces']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['percent_montos']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['percent_cruces']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['counter']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['_filename']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['_area']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['casetas_units_id']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['casetas_event_name']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['casetas_parents_name']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['casetas_standings_name']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['historical_id']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['_ctime']; ?>&nbsp;</td>
		<td><?php echo $casetasViewResume['CasetasViewResume']['fileStatId']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $casetasViewResume['CasetasViewResume']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $casetasViewResume['CasetasViewResume']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $casetasViewResume['CasetasViewResume']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasViewResume['CasetasViewResume']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
				</table>
			</span> <!--class="filter-container"-->
				<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
						));
						?>				</p>

				<ul class="pagination">
							<?php 
	
							echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li')); 
						
	?>							<?php 
	
							echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));
						
	?>						<?php 
	
							echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
	?>				</ul>
          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->





