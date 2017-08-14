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
				<?php echo $this->Html->link(__('New Policies Anexo', true), array('action' => 'add')); ?>			</li>
				          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Policies Anexos');?></h1>
          <div class="table-responsive">
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('policies_id');?></th>
											<?php if (isset($_SESSION['Auth']['User'])) {?>
											<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
													<th><?php echo $this->Paginator->sort('anexo_path');?></th>
											<?php 	}?>
											<?php }?>
													<th><?php echo $this->Paginator->sort('name');?></th>
													<th><?php echo $this->Paginator->sort('description');?></th>
											<?php if (isset($_SESSION['Auth']['User'])) {?>
											<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
											<?php 	}?>
											<?php }?>
											<?php if (isset($_SESSION['Auth']['User'])) {?>
											<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id']) or checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesAnexos')) {
														$span = 'colspan="3"';
													} else {
														$span = '';
													}
											 ?>
											<?php }?>
													<th class="actions" <?php e($span);?>><?php __('Actions');?></th>

					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($policiesAnexos as $policiesAnexo):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $policiesAnexo['PoliciesAnexo']['id']; ?>&nbsp;</td>
<!-- 		<td><?php echo $policiesAnexo['PoliciesAnexo']['policies_id']; ?>&nbsp;</td> -->
		<td><?php echo $this->Html->link($policiesAnexo['Policies']['name'], array('controller' => 'Policies', 'action' => 'view', $policiesAnexo['PoliciesAnexo']['policies_id'])); ?></td>
	<?php if (isset($_SESSION['Auth']['User'])) {?>
	<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
		<td><?php echo $policiesAnexo['PoliciesAnexo']['anexo_path']; ?>&nbsp;</td>
	<?php 	}?>
	<?php }?>
		<td><?php echo $policiesAnexo['PoliciesAnexo']['name']; ?>&nbsp;</td>
		<td><?php echo $policiesAnexo['PoliciesAnexo']['description']; ?>&nbsp;</td>
	<?php if (isset($_SESSION['Auth']['User'])) {?>
	<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
		<td><?php echo $policiesAnexo['PoliciesAnexo']['create']; ?>&nbsp;</td>
		<td><?php echo $policiesAnexo['PoliciesAnexo']['modified']; ?>&nbsp;</td>
		<td><?php echo $policiesAnexo['PoliciesAnexo']['status']; ?>&nbsp;</td>
	<?php 	}?>
	<?php }?>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $policiesAnexo['PoliciesAnexo']['id'])); ?>
		</td>

		<?php if (isset($_SESSION['Auth']['User'])) {?>
		<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id']) or checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesAnexos')) {?>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $policiesAnexo['PoliciesAnexo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $policiesAnexo['PoliciesAnexo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesAnexo['PoliciesAnexo']['id'])); ?>
		</td>
		<?php 	}?>
		<?php }?>
	</tr>
<?php endforeach; ?>
				</table>
				<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
						));
					?>
				</p>

				<ul class="pagination">
						<?php
							echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
						?>
						<?php
							echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));
						?>
						<?php
							echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
						?>
				</ul>
          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->
