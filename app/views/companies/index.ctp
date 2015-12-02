<script>
	// Let's check if the browser supports notifications
	if (!("Notification" in window)) {
// 		alert("Este Navegador no soporta Notificaciones en el Escritorio , le recomendamos use Google Chrome o Firefox para una mejor experiencia en la navegaci&oacute;n");
		document.open();
		document.write('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> Este Navegador <strong>no soporta</strong> Notificaciones en el Escritorio , le recomendamos usar <strong><a href="https://www.google.com/chrome/browser/desktop/" target="_blank" class="alert-link">Google Chrome</a></strong> o <strong><a href="https://www.mozilla.org/en-US/firefox/new/" target="_blank" class="alert-link">Firefox</a></strong> para una mejor experiencia en la navegaci&oacute;n<p>o puede descargar la siguiente <a href="http://ukot.github.io/ie_web_notifications/" target="_blank" class="alert-link">aplicaci&oacute;n</a> para emular el soporte en Internet Explorer de las <strong>notificaciones</strong> en el escritorio</p></div>');
		document.close();
	// Let's check if the user is okay to get some notification
	} else if (Notification.permission !== 'denied') {
// 		alert(Notification.permission);
		Notification.requestPermission()
	} else if (Notification.permission === 'denied') {
// 		Notification.permission = 'default';
		document.open();
		document.write('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Este sitio esta bloqueado para mostrar <strong >Notificaciones de Escritorio</strong> si desea activarlas nuevamente haga click en la siguiente <a href="https://support.google.com/chrome/answer/3220216?hl=es-Mx" target="_blank" class="alert-link">liga</a> para Chorme y &eacute;sta <a href="https://support.mozilla.org/en-US/questions/997362" target="_blank" class="alert-link">liga</a> para Firefox d&oacute;nde se describe como activarlas nuevamente</div>');
		document.close();
// 		alert(Notification.permission);
// 		<a href="javascript:void(0)" onclick="Notification.requestPermission()" class="alert-link">liga</a>
	}
</script>

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Company', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Companies');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('group_id');?></th>
													<th><?php echo $this->Paginator->sort('name');?></th>
													<th><?php echo $this->Paginator->sort('description');?></th>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($companies as $company):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $company['Company']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($company['User']['id'], array('controller' => 'users', 'action' => 'view', $company['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($company['Group']['name'], array('controller' => 'groups', 'action' => 'view', $company['Group']['id'])); ?>
		</td>
		<td><?php echo $company['Company']['name']; ?>&nbsp;</td>
		<td><?php echo $company['Company']['description']; ?>&nbsp;</td>
		<td><?php echo $company['Company']['create']; ?>&nbsp;</td>
		<td><?php echo $company['Company']['modified']; ?>&nbsp;</td>
		<td><?php echo $company['Company']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $company['Company']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $company['Company']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $company['Company']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $company['Company']['id'])); ?>
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





