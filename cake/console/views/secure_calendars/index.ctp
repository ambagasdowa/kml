
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Secure Calendar', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Secure Calendars');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('title');?></th>
													<th><?php echo $this->Paginator->sort('allday');?></th>
													<th><?php echo $this->Paginator->sort('editable');?></th>
													<th><?php echo $this->Paginator->sort('start');?></th>
													<th><?php echo $this->Paginator->sort('end');?></th>
													<th><?php echo $this->Paginator->sort('url');?></th>
													<th><?php echo $this->Paginator->sort('constraint');?></th>
													<th><?php echo $this->Paginator->sort('color');?></th>
													<th><?php echo $this->Paginator->sort('rendering');?></th>
													<th><?php echo $this->Paginator->sort('overlap');?></th>
													<th><?php echo $this->Paginator->sort('description');?></th>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($secureCalendars as $secureCalendar):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $secureCalendar['SecureCalendar']['id']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['title']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['allday']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['editable']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['start']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['end']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['url']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['constraint']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['color']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['rendering']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['overlap']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['description']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['create']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['modified']; ?>&nbsp;</td>
		<td><?php echo $secureCalendar['SecureCalendar']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $secureCalendar['SecureCalendar']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $secureCalendar['SecureCalendar']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $secureCalendar['SecureCalendar']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureCalendar['SecureCalendar']['id'])); ?>
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





