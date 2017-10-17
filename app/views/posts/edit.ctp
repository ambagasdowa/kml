<?php
// blog
$evaluate = true;
$requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
?>

<div class="container">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id',array('class'=>'u-full-width'));
		echo $this->Form->input('title',array('class'=>'u-full-width'));
	?>


<div id="toolbar" style="display: none;" >
	<ul class="wysihtml5-toolbar" style="">
		<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-white">
								<i class="fa fa-font"></i>&nbsp;<span class="current-font">Normal text</span>&nbsp;<b class="caret"></b>
						</a>

			<ul class="dropdown-menu">
				<li>
					<a data-wysihtml-command-value="div" data-wysihtml-command="formatBlock" href="javascript:;" unselectable="on">Normal text</a>
				</li>
				<li>
					<a data-wysihtml-command-value="h1" data-wysihtml-command="formatBlock" href="javascript:;" unselectable="on">Heading 1</a></li>
				<li><a data-wysihtml-command-value="h2" data-wysihtml-command="formatBlock" href="javascript:;" unselectable="on">Heading 2</a></li>
				<li><a data-wysihtml-command-value="h3" data-wysihtml-command="formatBlock" href="javascript:;" unselectable="on">Heading 3</a></li>
				<li><a data-wysihtml-command-value="h4" data-wysihtml-command="formatBlock" href="javascript:;" unselectable="on">Heading 4</a></li>
				<li><a data-wysihtml-command-value="h5" data-wysihtml-command="formatBlock" href="javascript:;" unselectable="on">Heading 5</a></li>
				<li><a data-wysihtml-command-value="h6" data-wysihtml-command="formatBlock" href="javascript:;" unselectable="on">Heading 6</a></li>
			</ul>
		</li>

		<li>
			<div class="btn-group ">
				<a title="CTRL+B" data-wysihtml-command="bold" class="btn btn-white" href="javascript:;" unselectable="on">Bold</a>
				<a title="CTRL+I" data-wysihtml-command="italic" class="btn btn-white" href="javascript:;" unselectable="on">Italic</a>
				<a title="CTRL+U" data-wysihtml-command="underline" class="btn btn-white" href="javascript:;" unselectable="on">Underline</a>
				<a title="Ctrl-X" data-wysihtml-action="change_view" class="btn btn-white">switch to html view</a>
			</div>
		</li>
		<li>
			<div class="btn-group">
					<a title="Unordered list" data-wysihtml-command="insertUnorderedList" class="btn btn-white" href="javascript:;" unselectable="on">
						<i class="fa fa-list"></i>
					</a>
					<a title="Ordered list" data-wysihtml-command="insertOrderedList" class="btn btn-white" href="javascript:;" unselectable="on">
						<i class="fa fa-th-list"></i>
					</a>
					<a title="Outdent" data-wysihtml-command="Outdent" class="btn btn-white" href="javascript:;" unselectable="on">
						<i class="fa fa-align-right"></i>
					</a>
					<a title="Indent" data-wysihtml-command="Indent" class="btn btn-white" href="javascript:;" unselectable="on">
						<i class="fa fa-align-left"></i>
					</a>
			</div>
		</li>

		<li>

			<div data-wysihtml-dialog="createLink" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="linkmodal" class="bootstrap-wysihtml5-insert-link-modal modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header"><a data-dismiss="modal" class="close"></a>
							<h3>Insert link</h3></div>

						<div class="modal-body"><input type="text" class="bootstrap-wysihtml5-insert-link-url m-wrap large" value="http://"></div>
						<div class="modal-footer"><a data-dismiss="modal" class="btn" href="#">Cancel</a><a data-dismiss="modal" class="btn green  btn-primary" href="#">Insert link</a></div>
					</div>
				</div>
			</div>
			<a data-target="#linkmodal" data-toggle="modal" title="Insert link" data-wysihtml-command="createLink" class="btn btn-white" href="javascript:;" unselectable="on">
				<i class="fa fa-share"></i>
			</a>
		</li>
		<li>
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="imgmodal" class="bootstrap-wysihtml5-insert-image-modal modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header"><a data-dismiss="modal" class="close"></a>
							<h3>Insert image</h3></div>
						<div class="modal-body"><input type="text" class="bootstrap-wysihtml5-insert-image-url m-wrap large" value="http://"></div>
						<div class="modal-footer"><a data-dismiss="modal" class="btn" href="#">Cancel</a><a data-dismiss="modal" class="btn  green btn-primary" href="#">Insert image</a></div>
					</div>
				</div>
			</div><a data-target="#imgmodal" data-toggle="modal" title="Insert image" data-wysihtml-command="insertImage" class="btn btn-white" href="javascript:;" unselectable="on"><i class="fa fa-picture-o"></i></a></li>
	</ul>


	<?php
		echo $this->Form->input('body',array('type'=>'textarea','div'=>false,'id'=>'text-editor','placeholder'=>"Enter text ...",'class'=>'u-full-width'));
	?>
			<br><input type="reset" value="Reset form!">
	<?php
		echo $this->Form->input('status');
		echo $this->Form->input('current_date_time');
	?>
	</fieldset>
<?php
 		// 	echo $this->Form->end(__('Submit', true));
			echo $this->Form->submit(__('Editar', true), array('div' => false,'class'=>"button button-primary"));
?>
</div>

<!-- <div class="container">
	<div class="row-fluid ">
		<h2>New Message </h2>
		<div class="row">
			<div class="form-group col-md-12">
				<label class="form-label">Sender</label>
				<span class="help">e.g. "someone@example.com"</span>
				<div class="controls">
					<input type="text" class="form-control ">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label class="form-label">Subject</label>
				<span class="help">e.g. "Meeting Agenda"</span>
				<div class="controls">
					<input type="text" class="form-control ">
				</div>
			</div>
		</div> -->


<div class="container">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Post.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Post.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>


<script>
var editor = new wysihtml.Editor("text-editor", {
	toolbar:        "toolbar",
	// parserRules:    wysihtmlParserRules,
	useLineBreaks:  false
});
</script>
