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
		    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );

		?>
<?php 	echo $this->Session->flash();?>
		    <div class="container-fluid">
		      <div class="row">

		       <div class="col-md-offset-1 col-sm-11 col-md-11">
		          <ul class="list-group list-inline">
					<li class="list-group-item">
						<?php echo $this->Html->link(__('New Control Desk User Control', true), array('action' => 'add')); ?>
					</li>
					<li class="list-group-item">
						<?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?>
					</li>
					<li class="list-group-item">
						<?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?>
					</li>
					<li>
						<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
					</li>
		          </ul>
		        </div>

		        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
		          <h1 class="page-header"><?php __('Control Desk User Controls');?></h1>
		          <div class="table-responsive">
					<span class="filter-container">
						<table class="order-table table table-bordered table-hover table-striped responstable">
						<thead>
							<tr>
															<th><?php echo $this->Paginator->sort('id');?></th>
															<th><?php echo $this->Paginator->sort('user_id');?></th>
															<th><?php echo $this->Paginator->sort('username','user_id');?></th>
															<th><?php echo $this->Paginator->sort('storage');?></th>
															<th><?php echo $this->Paginator->sort('clear_key');?></th>
															<th><?php echo $this->Paginator->sort('description');?></th>
															<th><?php echo $this->Paginator->sort('status');?></th>
															<th><?php echo $this->Paginator->sort('created');?></th>
															<th><?php echo $this->Paginator->sort('modified');?></th>
															<th class="actions" colspan="3"><?php __('Actions');?></th>

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
					<?php echo $this->Html->link(__('View', true), array('action' => 'view', $controlDeskUserControl['ControlDeskUserControl']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $controlDeskUserControl['ControlDeskUserControl']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $controlDeskUserControl['ControlDeskUserControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $controlDeskUserControl['ControlDeskUserControl']['id'])); ?>
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
