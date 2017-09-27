<?php
// Calendar index
	$evaluate = true;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>

<style>

	body {
		margin: 40px 10px;
		padding: 0;
/* 		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif; */
/* 		font-size: 14px; */
	}

	#calendar {
		max-width: 800px;
/* 		max-height: 900px; */
		margin: 0 auto;
	}

</style>
<!--				<b>Successful Response (should be blank):</b>
				<div id="success"></div>
				<b>Error Response:</b>
				<div id="error"></div>-->


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
		?>
	</p>


		<div id="eventdata"></div>


	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?> <?php echo Dispatcher::baseUrl();?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Calendar', true), array('action' => 'add')); ?></li>
	</ul>
</div>



<script type="text/javascript">
	// <!&#91;CDATA&#91;
require(['jquery','moment','bootstrap','fullcalendar','fancybox'], function($) {
	$(document).ready(function () {

// 		$('#calendar').fullCalendar('render');

		$('#calendar').fullCalendar({
// 			aspectRatio: 3.55,
// 			defaultView: 'agendaWeek',
// 			loading: $('#calendar').fullCalendar('render');

			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			eventLimit: true, // allow "more" link when too many events
// 			businessHours: true, // display business hours
// 			editable: true,
			slotDuration: '00:30:00',
			droppable: true, // this allows things to be dropped onto the calendar
			events: "<?php echo Dispatcher::baseUrl();?>/Calendars/feed",
			dayClick: function(date,jsEvent,view) {

				urlData = "<?php echo Dispatcher::baseUrl();?>/Calendars/add/false/"+ moment(date.format()).format('DD/MM/YYYY/HH/m');

// 				$("#eventdata").show(); //for the animation
// 				$("#eventdata").load(urlData);

// 					function( response, status, xhr ) {
// 						if ( status == "error" ) {
// 							var msg = "Sorry but there was an error: ";
// 							$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
// 						} else {
// 							var msg = "success ";
// 							$( "#success" ).html( msg + xhr.status + " " + xhr.statusText );
// 						}
// 					}
				if (urlData) {
					$.fancybox({
						'type': 'ajax',
						'href': urlData,
						'autoScale': false,
						'autoDimensions': false
					})
					return false;
				}

				// change the day's background color just for fun
// 				$(this).css('background-color', '#29AAB1');
			},

			/* Fire the edit stuff*/
			eventClick: function(calEvent, jsEvent, view) {
// 				$("#eventdata").show();
// 				$("#eventdata").load( "<?php echo Dispatcher::baseUrl();?>/Calendars/edit/" + calEvent.id);
				urlData = "<?php echo Dispatcher::baseUrl();?>/Calendars/edit/" + calEvent.id;
				if (urlData) {
					$.fancybox({
						'type': 'ajax',
						'href': urlData,
						'autoScale': true,
						'autoDimensions': false
					})
					return false;
				}
			},

			eventDrop: function(event,delta,revertFunc,jsEvent,ui,view) {
				console.log(delta);
				var data_ = base64_encode(JSON.stringify([{id:event.id,days:delta._days,months:delta._months,milisecs:delta._milliseconds,view_type:view.type}]));
				$.post("<?php echo Dispatcher::baseUrl();?>/Calendars/dropsize/id:" + event.id + "/" + data_ + "/");
			},

			eventResize: function(event,delta,revertFunc,jsEvent,ui,view) {
				console.log(delta);
				var data_ = base64_encode(JSON.stringify([{id:event.id,days:delta._days,months:delta._months,milisecs:delta._milliseconds,view_type:view.type,resize:true}]));
				$.post("<?php echo Dispatcher::baseUrl();?>/Calendars/dropsize/id:" + event.id + "/" + data_ + "/");
			},

			render: true
		});

		$("#calendar").fullCalendar('render');

		$('#eventdata').hide();
	});
});
	// &#93;&#93;>
</script>



<script>
// 	require(['jquery','bootstrap','fancybox'], function($) {
// 		$(document).ready(function() {
// 			$.fancybox.open([{
// 				href: '#inline1',
// 				title:'Formula'
// 			}],{
// 				padding : 0,
// 				openEffect  : 'elastic',
// 				closeBtn: true
// 			});
// 		});
// 	});//end require
</script>


<!--Hola , buena tarde , acabo de enviar el detalle de la transferencia en un archivo pdf en el enlace que usted me proporciono.
si el deposito no se encuentra en su base de datos es porque aun lo tiene el banco ?
sin embargo en el detalle del movimiento se refleja la orden como liquidada y entiendo que es cuando la transferencia ya se ha realizado ? le envio el detalle como le menciono anteriormente , si requiere mas datos hagamelo saber
Saludos.-->
