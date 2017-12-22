<?php //users?>
<?php
    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
    // $evaluate = false;
    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
    // blog
    $evaluate = true;
    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
    $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">

			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Group', true), array('action' => 'add')); ?>
			</li>
			<li class="list-group-item">
				<?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?>
			</li>
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?>
			</li>

          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Groups');?></h1>
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped responstable">
              <thead>
                <tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('name');?></th>
					<th><?php echo $this->Paginator->sort('created');?></th>
					<th><?php echo $this->Paginator->sort('modified');?></th>
					<th><?php echo $this->Paginator->sort('status');?></th>
					<th><?php echo $this->Paginator->sort('current_date_time');?></th>
					<th><?php echo $this->Paginator->sort('description');?></th>
					<th><?php echo $this->Paginator->sort('key');?></th>
<!-- 					<th><?php echo $this->Paginator->sort('last_access');?></th> -->
					<th class="actions" colspan="3"><?php __('Actions');?></th>
                </tr>
              </thead>
              <tbody>
					<?php
					$i = 0;
					foreach ($groups as $group):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="altrow"';
						}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo $group['Group']['id']; ?>&nbsp;</td>
						<td><?php echo $group['Group']['name']; ?>&nbsp;</td>
						<td><?php echo $group['Group']['created']; ?>&nbsp;</td>
						<td><?php echo $group['Group']['modified']; ?>&nbsp;</td>
						<td><?php echo $group['Group']['status']; ?>&nbsp;</td>
						<td><?php echo $group['Group']['current_date_time']; ?>&nbsp;</td>
						<td><?php echo $group['Group']['description']; ?>&nbsp;</td>
						<td><?php echo $group['Group']['key']; ?>&nbsp;</td>
<!-- 						<td><?php echo $group['Group']['last_access']; ?>&nbsp;</td> -->
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('action' => 'view', $group['Group']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $group['Group']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?>
						</td>
					</tr>
					<?php endforeach; ?>
              </tbody>
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
