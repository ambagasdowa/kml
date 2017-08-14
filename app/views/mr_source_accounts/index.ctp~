<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">
				<li class="list-group-item">
					<?php echo $this->Html->link(__('New Mr Source Account', true), array('action' => 'add')); ?>
				</li>
				<li>
					<input type="search" class="light-table-filter" data-table="order-table" placeholder="Quick Filter">
				</li>
				<li>
					<div class="filter">
						<?php
							echo $this->Form->create('MrSourceAccount', array(
								'url' => array_merge(array('action' => 'index'), $this->params['pass'])
								));
							echo $this->Form->input('company', array('div' => false, 'empty' => true)); // empty creates blank option.
				// 			echo $this->Form->input('status', array('div' => false, 'empty' => true)); // disable div output.
							echo $this->Form->submit(__('Search', true), array('div' => false));
							echo $this->Form->end();
						?>
					</div>
				</li>
			</ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Mr Source Accounts');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('SubAccount');?></th>
													<th><?php echo $this->Paginator->sort('source_company');?></th>
													<th><?php echo $this->Paginator->sort('company');?></th>
													<th><?php echo $this->Paginator->sort('_key');?></th>
													<th><?php echo $this->Paginator->sort('_status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($mrSourceAccounts as $mrSourceAccount):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $mrSourceAccount['MrSourceAccount']['id']; ?>&nbsp;</td>
		<td><?php echo $mrSourceAccount['MrSourceAccount']['SubAccount']; ?>&nbsp;</td>
		<td><?php echo $mrSourceAccount['MrSourceAccount']['source_company']; ?>&nbsp;</td>
		<td><?php echo $mrSourceAccount['MrSourceAccount']['company']; ?>&nbsp;</td>
		<td><?php echo $mrSourceAccount['MrSourceAccount']['_key']; ?>&nbsp;</td>
		<td><?php echo $mrSourceAccount['MrSourceAccount']['_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mrSourceAccount['MrSourceAccount']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mrSourceAccount['MrSourceAccount']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mrSourceAccount['MrSourceAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceAccount['MrSourceAccount']['id'])); ?>
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





