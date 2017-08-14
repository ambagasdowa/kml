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
				<?php echo $this->Html->link(__('New Casetas Corporation', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add')); ?> 
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Casetas Corporations');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('casetas_companies_name');?></th>
													<th><?php echo $this->Paginator->sort('casetas_companies_desc');?></th>
													<th><?php echo $this->Paginator->sort('created');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('casetas_standings_id');?></th>
													<th><?php echo $this->Paginator->sort('casetas_parents_id');?></th>
													<th><?php echo $this->Paginator->sort('_status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($casetasCorporations as $casetasCorporation):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $casetasCorporation['CasetasCorporation']['id']; ?>&nbsp;</td>
		<td><?php echo $casetasCorporation['CasetasCorporation']['casetas_companies_name']; ?>&nbsp;</td>
		<td><?php echo $casetasCorporation['CasetasCorporation']['casetas_companies_desc']; ?>&nbsp;</td>
		<td><?php echo $casetasCorporation['CasetasCorporation']['created']; ?>&nbsp;</td>
		<td><?php echo $casetasCorporation['CasetasCorporation']['modified']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($casetasCorporation['User']['name'], array('controller' => 'users', 'action' => 'view', $casetasCorporation['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($casetasCorporation['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasCorporation['CasetasStandings']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($casetasCorporation['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasCorporation['CasetasParents']['id'])); ?>
		</td>
		<td><?php echo $casetasCorporation['CasetasCorporation']['_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $casetasCorporation['CasetasCorporation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $casetasCorporation['CasetasCorporation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $casetasCorporation['CasetasCorporation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasCorporation['CasetasCorporation']['id'])); ?>
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





