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
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Hooks', true), array('action' => 'add')); ?>			</li>
						<!-- <li class="list-group-item"><?php echo $this->Html->link(__('View Hooks', true), array('controller' => 'policies_types', 'action' => 'index')); ?> </li> -->
		<!-- <li class="list-group-item"><?php echo $this->Html->link(__('New Policies Hook', true), array('controller' => 'policies_types', 'action' => 'add')); ?> </li> -->
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Policy Hooks');?></h1>
          <div class="table-responsive">

				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
						<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
            <th><?php echo $this->Paginator->sort('ID &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','id',array('escape' => false));?></th>
						<!-- <th><?php echo $this->Paginator->sort('policies_type_id');?></th> -->
            <th><?php echo $this->Paginator->sort('Policy Hook &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','policies_type_id',array('escape' => false));?></th>
						<!-- <th><?php echo $this->Paginator->sort('name');?></th> -->
            <th><?php echo $this->Paginator->sort('Clasificador &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','name',array('escape' => false));?></th>
						<!-- <th><?php echo $this->Paginator->sort('description');?></th> -->
            <th><?php echo $this->Paginator->sort('SubMenu &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','description',array('escape' => false));?></th>
						<!-- <th><?php echo $this->Paginator->sort('create');?></th> -->
            <th><?php echo $this->Paginator->sort('Create &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','create',array('escape' => false));?></th>
						<!-- <th><?php echo $this->Paginator->sort('modified');?></th> -->
            <th><?php echo $this->Paginator->sort('Modified &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','modified',array('escape' => false));?></th>
						<!-- <th><?php echo $this->Paginator->sort('status');?></th> -->
            <th><?php echo $this->Paginator->sort('Status &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','status',array('escape' => false));?></th>
						<th class="actions" colspan="3"><?php __('Actions');?></th>

					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($policiesSubtypes as $policiesSubtype):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $policiesSubtype['PoliciesSubtype']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($policiesSubtype['PoliciesType']['name'], array('controller' => 'policies_types', 'action' => 'view', $policiesSubtype['PoliciesType']['id'])); ?>
		</td>
		<td><?php echo $policies_subtypes_definitions[$policiesSubtype['PoliciesSubtype']['policies_subtypes_definitions_id']]; ?>&nbsp;</td>
		<td><?php echo $policiesSubtype['PoliciesSubtype']['description']; ?>&nbsp;</td>
		<td><?php echo $policiesSubtype['PoliciesSubtype']['create']; ?>&nbsp;</td>
		<td><?php echo $policiesSubtype['PoliciesSubtype']['modified']; ?>&nbsp;</td>
		<td><?php echo $policiesSubtype['PoliciesSubtype']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $policiesSubtype['PoliciesSubtype']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $policiesSubtype['PoliciesSubtype']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $policiesSubtype['PoliciesSubtype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesSubtype['PoliciesSubtype']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
				</table>
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
