<?php //users?>
    <div class="container-fluid">
      <div class="row">
      
        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
            <li class="list-group-item">
				<?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?>
			</li>
            <li class="list-group-item">
				<?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?>
			</li>
            <li class="list-group-item">
				<?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?>
			</li>
            <li class="list-group-item">
				<?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?>
			</li>
            <li class="list-group-item">
				<?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?>
			</li>
			<li >
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Users');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
            <table class="order-table table table-bordered table-hover table-striped responstable">
              <thead>
                <tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('username');?></th>
					<th><?php echo $this->Paginator->sort('password');?></th>
					<th><?php echo $this->Paginator->sort('group_id');?></th>
					<th><?php echo $this->Paginator->sort('created');?></th>
					<th><?php echo $this->Paginator->sort('company_id');?></th>
<!-- 					<th><?php echo $this->Paginator->sort('modified');?></th> -->
<!-- 					<th><?php echo $this->Paginator->sort('status');?></th> -->
<!-- 					<th><?php echo $this->Paginator->sort('current_date_time');?></th> -->
					<?php if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
						
						<th><?php echo $this->Paginator->sort('last_access');?></th>
						<th><?php echo $this->Paginator->sort('last_ip');?></th>
						<th><?php echo $this->Paginator->sort('last_user_agent');?></th>
						
					<?php }?>
					
					<th class="actions" colspan="3"><?php __('Actions');?></th>
                </tr>
              </thead>
              <tbody>
					<?php
					$i = 0;
					foreach ($users as $user):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="altrow"';
						}
					?>
					<tr<?php echo $class;?>>
						
						<td><?php echo $user['User']['id']; ?>&nbsp;</td>
						<td><?php echo $user['User']['username']; ?>&nbsp;</td>
						<td><?php echo $user['User']['password']; ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
						</td>
						<td>
							<?php echo $user['User']['created']; ?>&nbsp;
						</td>
						
						<?php if (isset($company[$user['User']['company_id']])) {?>
							
						<td>
							<?php echo $company[$user['User']['company_id']]; ?>&nbsp;
						</td>
						
						<?php } else {?>
						
						<td>
							<?php echo $user['User']['company_id']; ?>&nbsp;
						</td>
						
						<?php }?>

						<?php if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>

						<td>
							<?php 
								echo $user['User']['last_access'];
							?>&nbsp;
						</td>

						<td>
							<?php 
								if (empty($user['User']['last_ip']) or !isset($user['User']['last_ip'])) {
									echo '';
								} else {
									echo $user['User']['last_ip'];
								}
							?>&nbsp;
						</td>

						<td>
							<?php
							$htmlRender = checkBrowser($user['User']['last_user_agent'],true,true);
							if ($htmlRender !== false) {
								$motor = array_search($htmlRender,$htmlMotor);
								if ($motor) {

									echo "&nbsp;<kbd><i class=\"$motor\"></i></kbd>&nbsp;{$htmlRender}";
								} else {
									echo "&nbsp;<i class=\"fa fa-cloud\"></i>&nbsp;{$htmlRender}";
								}
							}
							?>

						</td>
						
						<?php }?>
						
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
						</td>

					</tr>
					<?php endforeach; ?>
              </tbody>
            </table>
			</span >
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