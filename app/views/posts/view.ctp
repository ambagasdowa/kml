<?php
// blog
$evaluate = true;
$requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );

?>

	<div class="container">

		<h1><?php echo $post['Post']['title']; ?></h1>

		<h6>Por: <?php echo $this->Html->link($post['User']['full_name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				<span><?php echo $post['Post']['created']; ?></span>
		</h6>

		<div class="docs-section" id="intro">
			<p>
				<?php echo $post['Post']['body']; ?>
			</p>
		</div>

	</div>


<div class="container">

	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Post', true), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Post', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>

</div> <!--center-->
