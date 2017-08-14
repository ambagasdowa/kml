<?php ?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">
				<li class="list-group-item">
					<?php echo $this->Html->link(__('New Caseta', true), array('action' => 'add')); ?>
				</li>
			</ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Casetas');?></h1>
          <div class="table-responsive">

				<table class="table table-bordered table-hover table-striped responstable">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id');?></th>
							<th><?php echo $this->Paginator->sort('key_num');?></th>
							<th><?php echo $this->Paginator->sort('key_num_1');?></th>
							<th><?php echo $this->Paginator->sort('key_num_2');?></th>
							<th><?php echo $this->Paginator->sort('alpha_code');?></th>
							<th><?php echo $this->Paginator->sort('key_num_3');?></th>
							<th><?php echo $this->Paginator->sort('alpha_num_code');?></th>
							<th><?php echo $this->Paginator->sort('unit');?></th>
							<th><?php echo $this->Paginator->sort('fecha_a');?></th>
							<th><?php echo $this->Paginator->sort('time_a');?></th>
							<th><?php echo $this->Paginator->sort('key_num_4');?></th>
							<th><?php echo $this->Paginator->sort('alpha_location');?></th>
							<th><?php echo $this->Paginator->sort('alpha_location_1');?></th>
							<th><?php echo $this->Paginator->sort('float_data');?></th>
							<th><?php echo $this->Paginator->sort('float_data_1');?></th>
							<th><?php echo $this->Paginator->sort('float_data_2');?></th>
							<th><?php echo $this->Paginator->sort('float_data_3');?></th>
							<th><?php echo $this->Paginator->sort('float_data_4');?></th>
							<th><?php echo $this->Paginator->sort('float_data_5');?></th>
							<th><?php echo $this->Paginator->sort('float_data_6');?></th>
							<th class="actions" colspan="3"><?php __('Actions');?></th>
								
						</tr>
					</thead>
				<?php
				$i = 0;
				foreach ($casetas as $caseta):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
					<tr<?php echo $class;?>>
						<td><?php echo $caseta['Caseta']['id']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['key_num']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['key_num_1']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['key_num_2']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['alpha_code']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['key_num_3']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['alpha_num_code']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['unit']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['fecha_a']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['time_a']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['key_num_4']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['alpha_location']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['alpha_location_1']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['float_data']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['float_data_1']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['float_data_2']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['float_data_3']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['float_data_4']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['float_data_5']; ?>&nbsp;</td>
						<td><?php echo $caseta['Caseta']['float_data_6']; ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('action' => 'view', $caseta['Caseta']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $caseta['Caseta']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $caseta['Caseta']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $caseta['Caseta']['id'])); ?>
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
