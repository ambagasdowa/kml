<?php
// 	debug($this->params);
?>
<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>

<style>
	.policie_link{
		color:black;
	}
</style>
<?php echo $this->Session->flash();?>
    <div class="container-fluid">



    <div class="row">

	<?php if (isset($_SESSION['Auth']['User'])) {?>
	<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id']) or checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesAnexos')) {?>

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Policy', true), array('action' => 'add')); ?>
			</li>
			<!-- <li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('List Policies Anexos', true), array('controller' => 'policies_anexos', 'action' => 'index')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New Anexo', true), array('controller' => 'policies_anexos', 'action' => 'add')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('List Policies Filters', true), array('controller' => 'policies_filters', 'action' => 'index')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New Filter', true), array('controller' => 'policies_filters', 'action' => 'add')); ?> </li> -->
		</ul>
        </div>

	<?php }?>
	<?php 	}?>


       <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Políticas');?></h1>

          <div class="col-md-7"></div>
          <div class="col-md-5"><?php echo $this->element('policies/search_policie');?></div>
          <div class="col-md-12">&nbsp;</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>

										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('group_id');?></th>
													<th><?php echo $this->Paginator->sort('Documento','policies_type');?></th>
													<th><?php echo $this->Paginator->sort('policies_path');?></th>
										<?php 	}?>
										<?php }?>
													<th><?php echo $this->Paginator->sort('nombre de la política');?></th>
<!-- 													<th><?php echo $this->Paginator->sort('description');?></th> -->
										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
<!-- 													<th><?php echo $this->Paginator->sort('create');?></th> -->
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
										<?php 	}?>
										<?php }?>

											<?php if (isset($_SESSION['Auth']['User'])) {?>
											<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id']) or checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesAnexos')) {?>
													<th class="actions" colspan="2"><?php __('Actions');?></th>
											<?php }?>
											<?php }?>


					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($policies as $policy):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>

		<?php if (isset($_SESSION['Auth']['User'])) {?>
		<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
		<td><?php echo $policy['Policy']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($policy['User']['id'], array('controller' => 'users', 'action' => 'view', $policy['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($policy['Group']['name'], array('controller' => 'groups', 'action' => 'view', $policy['Group']['id'])); ?>
		</td>
		<td><?php echo $policies_type[$policy['Policy']['policies_type']]; ?>&nbsp;</td>
		<td><?php echo $policy['Policy']['policies_path']; ?>&nbsp;</td>
		<?php 	}?>
		<?php }?>
		<td>
			<?php echo $this->Html->link(__($policy['Policy']['name'], true), array('action' => 'view','id' => $policy['Policy']['id'],'type'=>$policy['Policy']['policies_type']),array('class'=>'policie_link','alt'=>__($policy['Policy']['name'], true),'title'=>__($policy['Policy']['name'], true))); ?>&nbsp;
		</td>
<!-- 		<td><?php echo $policy['Policy']['description']; ?>&nbsp;</td> -->
		<?php if (isset($_SESSION['Auth']['User'])) {?>
		<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
<!-- 		<td><?php echo $policy['Policy']['create']; ?>&nbsp;</td> -->
		<td><?php echo $policy['Policy']['modified']; ?>&nbsp;</td>
		<td><?php echo $policy['Policy']['status']; ?>&nbsp;</td>
		<?php 	}?>
		<?php }?>
		<?php if (isset($_SESSION['Auth']['User'])) {?>
		<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id']) or checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesAnexos')) {?>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit',$policy['Policy']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $policy['Policy']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policy['Policy']['id'])); ?>
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
						?>				</p>

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
