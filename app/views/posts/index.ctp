<style>
@import url(http://fonts.googleapis.com/css?family=Oswald|Roboto:400);
@import url(http://weloveiconfonts.com/api/?family=brandico);

@font-face {
font-family: 'MyWebFont';
src: url("webfont.eot"); /* IE9 Compat Modes */ /*this must be eot*/
src: url('webfont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
     url('webfont.woff') format('woff'), /* Modern Browsers */
     url('<?php e($this->webroot.'fonts/google/Oswald/Oswald-Regular')?>')  format('truetype'), /* Safari, Android, iOS */
     url('webfont.svg#svgFontName') format('svg'); /* Legacy iOS */
}
</style>
<!--MariaDB [projections]> select id,username,email,id_empresa,level,status,id_theme,last_access from users where year(`last_access`)=year(now()) and month(`last_access`)=month(now()) and day(`last_access`) = day(now());-->

<div id="_postCenter">
	<article>
	
		<div id="_postHeader">
			<h1><?php __('Posts');?></h1>
		</div>
		
		<div class="filter">
			<?php
				echo $this->Form->create('Post', array(
														'url' => array_merge(array('action' => 'index'), $this->params['pass'])
													   )
										);
				echo $this->Form->input('title', array('div' => false, 'empty' => true)); // empty creates blank option.
	// 			echo $this->Form->input('status', array('div' => false, 'empty' => true)); // disable div output.
				echo $this->Form->submit(__('Search', true), array('div' => false));
				echo $this->Form->end();
			?>
		</div>

		<div id="_postContent">
			<table  cellpadding="0" cellspacing="0">
			<tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('user_id');?></th>
					<th><?php echo $this->Paginator->sort('title');?></th>
					<th><?php echo $this->Paginator->sort('body');?></th>
					<th><?php echo $this->Paginator->sort('created');?></th>
					<th><?php echo $this->Paginator->sort('modified');?></th>
					<th><?php echo $this->Paginator->sort('status');?></th>
					<th><?php echo $this->Paginator->sort('current_date_time');?></th>
					<th class="actions"><?php __('Actions');?></th>
			</tr>
			<?php
			$i = 0;
			foreach ($posts as $post):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $post['Post']['id']; ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				</td>
				<td><?php echo $post['Post']['title']; ?>&nbsp;</td>
				<td><?php echo $post['Post']['body']; ?>&nbsp;</td>
				<td><?php echo $post['Post']['created']; ?>&nbsp;</td>
				<td><?php echo $post['Post']['modified']; ?>&nbsp;</td>
				<td><?php echo $post['Post']['status']; ?>&nbsp;</td>
				<td><?php echo $post['Post']['current_date_time']; ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View', true), array('action' => 'view', $post['Post']['id'])); ?>
					<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $post['Post']['id'])); ?>
					<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id'])); ?>
				</td>
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
	</article>
		<div id="_postShare">
			<h3><?php __('Actions'); ?></h3>
			<ul>
				<li><?php echo $this->Html->link(__('New Post', true), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul>
		</div>
</div> <!--center-->