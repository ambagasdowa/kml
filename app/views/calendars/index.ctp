<?php
		//try this 
// 		echo $this->Html->script('jquery/jquery.min'); // Include jQuery library
// 		echo $this->Html->script('bootstrap/bootstrap.min'); // Include bootstrap library
// 		echo $this->Html->script('devoops/fullcalendar/moment.min'); // Include fullcalendar library		
// 		echo $this->Html->script('devoops/fullcalendar/fullcalendar.min'); // Include fullcalendar library
		/** @php.js*/
// 		e($this->Html->script("php.js/base64_encode")); //php.js 
// 		e($this->Html->script("php.js/base64_decode")); //php.js 
		// Or this
// 		e( $javascript->link('jquery/jquery.min'));
// 		e( $javascript->link('bootstrap/bootstrap.min'));
// 		e( $javascript->link('fullcalendar/moment.min'));
// 		e( $javascript->link('fullcalendar/fullcalendar.min'));

// 		echo $this->Html->css('bootstrap/bootstrap');
		echo $this->Html->css('devoops/fullcalendar/fullcalendar');

// 		echo $this->Html->meta('icon');
// 		echo $this->Html->css('cake.generic');
?>

<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 800px;
/* 		max-height: 900px; */
		margin: 0 auto;
	}

</style>

<div id="calendar"></div>

<div class="calendars index">
	<h2><?php __('Calendars');?></h2>
	<table class="table table-bordered table-hover table-striped responstable">
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
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($calendars as $calendar):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $calendar['Calendar']['id']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['title']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['allday']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['editable']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['start']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['end']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['url']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['constraint']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['color']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['rendering']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['overlap']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['description']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['create']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['modified']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $calendar['Calendar']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $calendar['Calendar']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $calendar['Calendar']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $calendar['Calendar']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div id="eventdata"></div>
	
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Calendar', true), array('action' => 'add')); ?></li>
	</ul>
</div>

<script type="text/javascript">
	// <!&#91;CDATA&#91;
require(['jquery','bootstrap','moment','fullcalendar'], function($) {
	$(document).ready(function () {
		
		$('#calendar').fullCalendar({
// 			aspectRatio: 3.55,
// 			defaultView: 'agendaWeek',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			eventLimit: true, // allow "more" link when too many events
// 			businessHours: true, // display business hours
// 			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar
			events: "<?php echo Dispatcher::baseUrl();?>/Calendars/feed",
			dayClick: function(date,jsEvent,view) {
				$("#eventdata").show();
				$("#eventdata").load("<?php echo Dispatcher::baseUrl();?>/calendars/add/false/"+ moment(date.format()).format('DD/MM/YYYY/HH/m') );
				// change the day's background color just for fun
// 				$(this).css('background-color', '#29AAB1');
			},

			/* Fire the edit stuff*/
			eventClick: function(calEvent, jsEvent, view) {
				$("#eventdata").show();
				$("#eventdata").load( "<?php echo Dispatcher::baseUrl();?>/calendars/Edit/" + calEvent.id);
			},
			
			eventDrop: function(event,delta,revertFunc,jsEvent,ui,view) {
				console.log(delta);
				var data_ = base64_encode(JSON.stringify([{id:event.id,days:delta._days,months:delta._months,milisecs:delta._milliseconds,view_type:view.type}]));
				$.post("<?php echo Dispatcher::baseUrl();?>/calendars/dropsize/id:" + event.id + "/" + data_ + "/");
			},

			eventResize: function(event,delta,revertFunc,jsEvent,ui,view) {
				console.log(delta);
				var data_ = base64_encode(JSON.stringify([{id:event.id,days:delta._days,months:delta._months,milisecs:delta._milliseconds,view_type:view.type,resize:true}]));
				$.post("<?php echo Dispatcher::baseUrl();?>/calendars/dropsize/id:" + event.id + "/" + data_ + "/");
			}
		});
		
		$('#eventdata').hide();
	});
});
	// &#93;&#93;>
</script>



