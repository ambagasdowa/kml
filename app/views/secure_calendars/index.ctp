<?php
// SecureCalendar index
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>

<?php
// // ${"myvar"} = 10;
// // echo $myvar;
// // echo "\n";
// // echo strlen('1\n2') * strlen("1\n2");
// // echo "\n";
// // echo strlen('1\n2');
// // echo "\n";
// // echo strlen("1\n2");
// echo "\n";
//
// $a = 10;
// $b = 20;
// $c = 4;
// $d = 8;
// $e = 1.0;
// $f = $c + $d * 2;
// $g = $f % 20;
// $h = $b - $a + $c + 2;
// pr($h);
// echo "\n";
// $i = $h << $c; // the explanation on this is $c steps to left  multipling $h by 2 each steps
// pr($i);
// echo "\n";
// $j = $i * $e;
//  pr($j);
//
//
// 	$string = "Hello, World!";
// 	$a = FALSE;
// 	$b = FALSE;
// 	$c = TRUE;
// 	if($a) {
// 		if($b && !$c) {
// 		echo "Goodbye Cruel World!";
// 		} else if(!$b && !$c) {
// 			echo "Nothing here";
// 		}
// 	} else {
// 		if(!$b) {
// 			if(!$a && (!$b && $c)) {
// 				echo "Hello, World!";
// 			} else {
// 				echo "Goodbye World!";
// 			}
// 		} else {
// 			echo "Not quite.";
// 		}
// 	}
//
// 		$array = '0123456789ABCDEFG';
// 		pr(strlen($array));
// 		$s = '';
// 		pr($array[rand(0,strlen ($array) - 1)]); // takes an aleatory number from 0 to 16 so is this a sort??
// 		for ($i = 1; $i < 50; $i++) {
// 		$s .= $array[rand(0,strlen ($array) - 1)];
// 		}
// 		var_dump($s);
//
// define("STOP_AT", 1024);
//  $result = array();
// /* Missing code */
// for($idx = 1; $idx < STOP_AT; $idx *= 2)
//  {
//  $result[] = $idx;
//  }
//
//  pr($result);
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

	/* unvisited link */
	.modded-link:link {
		display:block !important;
		background-color:#999;
		color: #444;
	}


/* 	.btn-success{ */
/* 		display: inline-block; !important; */
/* 		box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125); */
/* 	} */

	/* visited link */
/*	.modded-link:visited {
		color: green;
	}*/

	/* mouse over link */
	.modded-link:hover {
/* 		color: hotpink; */
		 font-weight: bold;
	}

	/* selected link */
/*	.modded-link:active {
		color: blue;
	}*/

	.panel-default {
		background-color: rgba(255, 255, 255, 0.3); /* Color white with alpha 0.9*/
	}

</style>

<!--  Start container -->

	<div class="row-fluid">

	<div id="dashboard_links" class="col-xs-6 col-sm-2 pull-right">
			<ul id="tabbed" class="nav nav-pills nav-stacked">
				<li role="presentation" class="active">
					<a href="#stats_secure_app" id="stats_secure_app_tab" data-toggle="tab">
						<i class="fa fa-home"></i>&nbsp;&nbsp;Inicio
					</a>
				</li>

				<li role="presentation" >
					<a href="#casa" id="casa-tab" data-toggle="tab">
						<i class="fa fa-clock-o"></i>&nbsp;&nbsp;Programar Curso
					</a>
				</li>
				<li role="presentation">
					<a href="#struct" id="struct-tab" data-toggle="tab">
						<i class="fa fa-list"></i>&nbsp;&nbsp;Cursos Disponibles
					</a>
				</li>
				<li role="presentation">
					<a href="#perfil" id="perfil-tab" data-toggle="tab">
						<i class="fa fa-cubes"></i>&nbsp;&nbsp;Configuraci&oacute;n de cursos
					</a>
				</li>
			</ul>
	</div>

		<div class="col-xs-6 col-sm-10">
			<div id="tabbedContent" class='tab-content'>


				<div class="tab-pane fade in active" id="stats_secure_app">
<!-- 					<ul class="list-group list-inline"> -->
<!-- 						<li> -->
<!-- 							<input type="search" class="form-control " data-table="order-table" placeholder="Filter"> -->
<!-- 						</li> -->
<!-- 					</ul> -->
						<div id="load_stats_secure_app">

							<div class="panel panel-default">
							<!-- Default panel contents -->
								<div class="panel-heading">Panel de Estadisticas</div>

<!-- 								<div class="panel-body"> -->
<!-- 									<p>Stats</p> -->
<!-- 								</div> -->

							<!-- Table -->
								<table class="table " width="100%">
									<tr>
										<td width="50%">
											<div id="container_charts" ></div>
										</td>
										<td width="50%">
											<div id="container_charting" ></div>
										</td>
									</tr>
									<tr>
										<td width="50%">
											<div id="container_courses_stats" ></div>
										</td>
										<td width="50%">
											<div id="container_courses_acomplished" ></div>
										</td>
									</tr>
									<tr>
                                        <td colspan="2">
                                            <div id="container_chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                        </td>
									</tr>
								</table>
							</div>


							<!--<div id="container_charts" style="width:100%; height:400px;"></div>
							<p>&nbsp;</p>
							<div id="container_charting" style="width:100%; height:400px;"></div>
							<p>&nbsp;</p>
							<div id="container_courses_stats" style="width:100%; height:400px;"></div>
							<p>&nbsp;</p>
							<div id="container_courses_acomplished" style="width:100%; height:400px;"></div>
							<p>&nbsp;</p>-->

							<!--<div id="container_courses_operators" style="width:100%; height:400px;"></div>
							<p>&nbsp;</p>-->
							<!--<div id="container_courses_operators" style="width:100%; height:400px;"></div>
							<p>&nbsp;</p>-->
						</div>

				</div>

				<div class="tab-pane fade in" id="casa">
					<p>
<!-- 						<div id="calendars_update">DAta inb hir</div> -->
						<div id="calendar"></div>
					</p>
				</div>

				<div class="tab-pane fade in" id="struct">
					<ul class="list-group list-inline">
						<li>
							<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
						</li>
					</ul>
						<div id="loadStructMenu"></div>

				</div>


				<div  class="tab-pane fade in" id="perfil">
<!-- 				TABS -->
				<div id="start_tabs_nav">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li role="presentation" class="active modded-link">
						<a href="#loadSecureTopics" aria-controls="loadSecureTopics" role="tab" data-toggle="tab" class="modded-link">Temas</a>
					</li>

					<li role="presentation">
						<a href="#loadSecureTopicsTypes" aria-controls="loadSecureTopicsTypes" role="tab" data-toggle="tab" class="modded-link">Tipos de Documento</a>
					</li>

					<li role="presentation">
						<a href="#loadSecureGpoChiefs" aria-controls="loadSecureGpoChiefs" role="tab" data-toggle="tab" class="modded-link">Responsable</a>
					</li>

					<li role="presentation">
						<a href="#loadSecureGos" aria-controls="loadSecureGos" role="tab" data-toggle="tab" class="modded-link">Dirigido a</a>
					</li>

					<li role="presentation">
						<a href="#loadSecurePresenters" aria-controls="loadSecurePresenters" role="tab" data-toggle="tab" class="modded-link">Presentadores</a>
					</li>

					<li role="presentation">
						<a href="#settings_tab" aria-controls="settings" role="tab" data-toggle="tab" class="modded-link">loadSecurePresenters</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="loadSecureTopics">loadSecureTopics</div>

					<div role="tabpanel" class="tab-pane fade" id="loadSecureTopicsTypes">loadSecureTopicsTypes</div>

					<div role="tabpanel" class="tab-pane fade" id="loadSecureGpoChiefs">loadSecureGpoChiefs</div>

					<div role="tabpanel" class="tab-pane fade" id="loadSecureGos">loadSecureGoes</div>

					<div role="tabpanel" class="tab-pane fade" id="loadSecurePresenters">loadSecurePresenters</div>

					<div role="tabpanel" class="tab-pane fade" id="settings_tab">
						<p>
							<div class="calendars index" id="calendars_index">
								<h2><?php __('SecureCalendars');?></h2>
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
									<td><?php echo $calendar['SecureCalendar']['id']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['title']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['allday']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['editable']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['start']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['end']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['url']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['constraint']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['color']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['rendering']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['overlap']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['description']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['create']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['modified']; ?>&nbsp;</td>
									<td><?php echo $calendar['SecureCalendar']['status']; ?>&nbsp;</td>
									<td class="actions">
										<?php echo $this->Html->link(__('View', true), array('action' => 'view', $calendar['SecureCalendar']['id'])); ?>
										<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $calendar['SecureCalendar']['id'])); ?>
										<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $calendar['SecureCalendar']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $calendar['SecureCalendar']['id'])); ?>
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
									<li><?php echo $this->Html->link(__('New SecureCalendar', true), array('action' => 'add')); ?></li>
								</ul>
							</div>
						</p>
					</div>
				</div> <!--ends tab content-->

				</div> <!--ends_tabs_nav-->
<!-- 				TABS -->





				</div> <!--end perfil-->

			</div>
		</div>
	<!-- Optional: clear the XS cols if their content doesn't match in height -->
	<div class="clearfix visible-xs-block">div</div>
	<!--   <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div> -->
	</div>
<!--End Container-->

<!--				<b>Successful Response (should be blank):</b>
				<div id="success"></div>
				<b>Error Response:</b>
				<div id="error"></div>-->



<?php
// 	for($i=0;$i=3;++$i){
// 		echo "<button id=\"$i\" onClick=\"reply_click(this.id)\">B$i</button>";
// 	}
?>

<?php
// 	echo $this->Form->create('SecureCalendars',array('enctype' => 'multipart/form-data','class'=>'form'));
// 	echo $this->Form->input('group_id',array('placeholder'=>'group_id','class'=>'input'));
// 	echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));
?>

<!--<form action="<?php //echo Dispatcher::baseUrl();?>/SecureCalendars/add/" id="searchForm">
  <input type="text" name="s" placeholder="Search..." class="input">
  <input type="submit" value="Search" class="btn btn-success">
</form>-->
<!-- the result of the search will be rendered inside this div -->
<!-- <div id="result"></div> -->

<script>
// 	$(document).ready(function () {
// 		// Attach a submit handler to the form
// 		$( "#searchForm" ).submit(function( event ) {
//
// 			// Stop form from submitting normally
// 			event.preventDefault();
//
// 			// Get some values from elements on the page:
// 			var $form = $( this ),
// 			term = $form.find( "input[name='s']" ).val(),
// 			url = $form.attr( "action" );
// 			console.log(url);
// 			console.log(term);
// 			// Send the data using post
// 			var posting = $.post( url, { s: term } );
//
// 			// Put the results in a div
// 			posting.done(function( data ) {
// 				var content = $( data ).find( "#content" );
// // 				$( "#result" ).empty().append( content );
// // 				$( "#result" ).empty().show( content );
// 				$( "#result" ).empty().load( content );
// 			});
// 		});
// 	});
</script>

<!-- <div id="some_link">DATA</div> -->
<script type="text/javascript">
// function reply_click(clicked_id)
// {
// //     alert(clicked_id);
// //     var x = document.getElementById("myBtn").getAttribute("onclick");
// }
</script>


<?php

// $this->Js->get('#some_link');
// $this->Js->event('click', $this->Js->alert('hey you!'));
?>



<script type="text/javascript">

	// <!&#91;CDATA&#91;
// 	if("undefined"==typeof requiere)throw new Error("JavaScript requiere is undefined");

// require(['jquery','moment','bootstrap','fullcalendar','fancybox'], function($) {
$(document).ready(function (){


      $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=usdeur.json&callback=?', function (data) {

            Highcharts.chart('container_chart', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'USD to EUR exchange rate over time'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                            'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: 'Exchange rate'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },

                series: [{
                    type: 'area',
                    name: 'USD to EUR',
                    data: data
                }]
            });
        });


// 		if("undefined"==typeof jQuery)throw new Error("JavaScript jQuery is undefined");
// 		if("undefined"==typeof $)throw new Error("JavaScript $ is undefined");
// 		if("undefined"==typeof $.fullCalendar)throw new Error("JavaScript $.fullCalendar is undefined");
// 		if("undefined"==typeof $.fancybox)throw new Error("JavaScript $.fancybox is undefined");

// 		console.log(typeof jQuery);
// 		console.log(typeof $);
// 		console.log(typeof $.fullCalendar);
// 		console.log(typeof $.fancybox);
		//NOTE laod calendar under tabs
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			$('#calendar').fullCalendar('render');
		});
// 		$('#casa-tab a:first').tab('show');

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
			// NOTE The GET parameter names will be determined by the startParam and endParam options. ("start" and "end" by default).
			/*NOTE //SecureCalendars/feed.php?start=2013-12-01&end=2014-01-12&_=1386054751381*/
			events: "<?php echo Dispatcher::baseUrl();?>/SecureCalendars/feed",
			dayClick: function(date,jsEvent,view) {

				urlData = "<?php echo Dispatcher::baseUrl();?>/SecureCalendars/add/false/"+ moment(date.format()).format('DD/MM/YYYY/HH/m');

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
// 					return $('#calendar').fullCalendar('render');$("#calendars_index").show();$("#calendars_index").load(location.href + " #calendars_index");
					return false;
				}

				// change the day's background color just for fun
// 				$(this).css('background-color', '#29AAB1');
			},

			/* Fire the edit stuff*/
			eventClick: function(calEvent, jsEvent, view) {
// 				$("#eventdata").show();
// 				$("#eventdata").load( "<?php echo Dispatcher::baseUrl();?>/Calendars/edit/" + calEvent.id);
// 				$("#calendars_index").show();
// 				$("#calendars_index").load(location.href + " #calendars_index");
				urlData = "<?php echo Dispatcher::baseUrl();?>/SecureCalendars/edit/" + calEvent.id;
				if (urlData) {
					$.fancybox({
						'type': 'ajax',
						'href': urlData,
						'autoScale': true,
						'autoDimensions': false
					})
// 					return $('#calendar').fullCalendar('render');$("#calendars_index").show();$("#calendars_index").load(location.href + " #calendars_index");
					return false;
				}
			},

			eventDrop: function(event,delta,revertFunc,jsEvent,ui,view) {
				console.log(delta);
				var data_ = base64_encode(JSON.stringify([{id:event.id,days:delta._days,months:delta._months,milisecs:delta._milliseconds,view_type:view.type}]));
				$.post("<?php echo Dispatcher::baseUrl();?>/SecureCalendars/dropsize/id:" + event.id + "/" + data_ + "/");
// 				$("#calendars_index").show();
				$("#calendars_index").load(location.href + " #calendars_index");
			},

			eventResize: function(event,delta,revertFunc,jsEvent,ui,view) {
				console.log(delta);
				var data_ = base64_encode(JSON.stringify([{id:event.id,days:delta._days,months:delta._months,milisecs:delta._milliseconds,view_type:view.type,resize:true}]));
				$.post("<?php echo Dispatcher::baseUrl();?>/SecureCalendars/dropsize/id:" + event.id + "/" + data_ + "/");
// 				$("#calendars_index").show();
				$("#calendars_index").load(location.href + " #calendars_index");
			},

			render: true
		});

// 		$("#calendar").fullCalendar('render');

		$('#eventdata').hide();




		var urlStruct = "<?php echo Dispatcher::baseUrl();?>/SecureStructures/add/";
		var urlStructE = "<?php echo Dispatcher::baseUrl();?>/SecureStructures/edit/";

			$('#calendar_create').datepicker({showButtonPanel: true});

			$('#newSecureStructure').fancybox({
				'type': 'ajax',
				'href': urlStruct,
				'autoScale': false,
				'autoDimensions': false
			});

// 			$('#username').val(userText)

// 			$('#txtTestValue').attr('value', testResult );

			$('#editSecureStructure').fancybox({
				'type': 'ajax',
				'href': urlStructE,
				'autoScale': false,
				'autoDimensions': false
			});


// 			$('#calendar_create').live('click', function (){
// 				$(this).datepicker({showButtonPanel: true});
// 			});



// 		get the SecureStructures add div portion
		var loadStructMenu = "<?php echo Dispatcher::baseUrl();?>" + '/SecureStructures/';

// 				$("#loadStructMenu").show(); //for the animation
				$("#loadStructMenu").load(loadStructMenu);
// 				alert(loadStructMenu);

// 		config Section
		// NOTE TODO re-build the struct of this as a function
		var loadSecureTopics = "<?php echo Dispatcher::baseUrl();?>" + '/SecureTopics/' + ' .secureTopics';

			$("#loadSecureTopics").load(loadSecureTopics, function(e) {
// 				alert( "Load was performed." );
				/** NOTE @add-section */
// 				if prefix equals to
				$('#newSecureTopics').on('click', function (e){
					e.preventDefault(); // prevent jajajaja !
					var url_name = $(this).attr("data-name");
					var secureTopicsAdd = "<?php echo Dispatcher::baseUrl();?>/" + url_name + '/add/' + ' .container';
					console.log($(this).attr("data-name"));
					$.fancybox({
						'type': 'ajax',
						'href': secureTopicsAdd,
						'autoScale': true,
						'autoDimensions': true
					});
					return false;
					console.log(secureTopicsAdd);
				});

				/** NOTE @edit-section */
				$('.actions a').on( 'click', function (e){
					e.preventDefault();
// 					console.log($("A[data-edit^='linkSecureTopics_']").is(':visible'));
					var name_data_edit = $(this).attr("data-edit");
					console.log(name_data_edit);
					console.log(name_data_edit.length);
					console.log(name_data_edit.split('_'));
					var name_data_edit_array = name_data_edit.split('_');
					console.log(name_data_edit_array['0']);
					console.log(name_data_edit_array['1']);
					var secureLinkEdit = "<?php echo Dispatcher::baseUrl();?>/" + name_data_edit_array['0'].substring('4') + '/edit/' + name_data_edit_array['1'] + ' .container';
					console.log(secureLinkEdit);
					$.fancybox({
						'type': 'ajax',
						'href': secureLinkEdit,
						'autoScale': true,
						'autoDimensions': true
					});
					return false;
				});
			});


// 				$('#newSecureTopics').on('click', function (e){
// 					e.preventDefault(); // prevent jajajaja !
// 					var tiexto = $('#newSecureTopics').val();
// 					alert(tiexto);
// 				});

		var loadSecureTopicsTypes = "<?php echo Dispatcher::baseUrl();?>" + '/SecureTopicsTypes/' + ' .secureTopicsTypes';
			$("#loadSecureTopicsTypes").load(loadSecureTopicsTypes,function(e){
				$('#newSecureTopicsTypes').on('click', function (e){
					e.preventDefault(); // prevent jajajaja !
					var secureTopicsTypesAdd = "<?php echo Dispatcher::baseUrl();?>" + '/SecureTopicsTypes/add/' + ' .container';
// 					console.log($('.fancySecureTopics').text());
					$.fancybox({
						'type': 'ajax',
						'href': secureTopicsTypesAdd,
						'autoScale': true,
						'autoDimensions': true
					});
					return false;
				console.log(secureTopicsTopicsAdd);
				});
			});
		var loadSecureGpoChiefs = "<?php echo Dispatcher::baseUrl();?>" + '/SecureGpoChiefs/' + ' .secureGpoChiefs';
				$("#loadSecureGpoChiefs").load(loadSecureGpoChiefs,function(e){
					$('#newSecureGpoChiefs').on('click', function (e){
						e.preventDefault(); // prevent jajajaja !
						var secureGpoChiefsAdd = "<?php echo Dispatcher::baseUrl();?>" + '/SecureGpoChiefs/add/' + ' .container';
	// 					console.log($('.fancySecureTopics').text());
						$.fancybox({
							'type': 'ajax',
							'href': secureGpoChiefsAdd,
							'autoScale': true,
							'autoDimensions': true
						});
						return false;
					console.log(secureGpoChiefsAdd);
					});
				});
		var loadSecureGos = "<?php echo Dispatcher::baseUrl();?>" + '/SecureGos/' + ' .secureGos';
				$("#loadSecureGos").load(loadSecureGos, function (e) {
					$('#newSecureGos').on('click', function (e){
						e.preventDefault(); // prevent jajajaja !
						var secureGosAdd = "<?php echo Dispatcher::baseUrl();?>" + '/SecureGos/add/' + ' .container';
	// 					console.log($('.fancySecureTopics').text());
						$.fancybox({
							'type': 'ajax',
							'href': secureGosAdd,
							'autoScale': true,
							'autoDimensions': true
						});
						return false;
					console.log(secureGosAdd);
					});
				});
		var loadSecurePresenters = "<?php echo Dispatcher::baseUrl();?>" + '/SecurePresenters/' + ' .securePresenters';
				$("#loadSecurePresenters").load(loadSecurePresenters, function (e) {
					$('#newSecurePresenters').on('click', function (e){
						e.preventDefault(); // prevent jajajaja !
						var securePresentersAdd = "<?php echo Dispatcher::baseUrl();?>" + '/SecurePresenters/add/' + ' .container';
	// 					console.log($('.fancySecureTopics').text());
						$.fancybox({
							'type': 'ajax',
							'href': securePresentersAdd,
							'autoScale': true,
							'autoDimensions': true
						});
						return false;
					console.log(securePresentersAdd);
					});
				});



		//NOTE charts section
		$('#container_charts').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: '<?php e($total_courses)?> Available Courses For <?php e(array_sum(json_decode($label_workers)))?> Operators of all Bussiness Unit of GST Group'
			},
			xAxis: {
				categories: <?php e("$label_bases")?>
			},
			yAxis: {
				title: {
					text: 'Charts'
				}
			},
			plotOptions: {
				series: {
					borderWidth: 0,
					dataLabels: {
						enabled: true,
	// 					format: '{point.y:.1f}'
					}
				}
			},
// 			style: {
// 				fontFamily: '"monaco", sans-serif', // default font
// 				fontSize: '14px'
// 			},
			tooltip: {
				headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
				pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}</b> Cursos<br/>'
			},
			series: [{
				name: '<?php e(array_sum(json_decode($label_workers))*$total_courses);?> Courses from all Bussiness Unit',
				data: <?php e("$label_courses_stats")?>
				}]
		});


	$('#container_charting').highcharts({
		title: {
			text: 'Operators By Bussiness Units of GST Group'
		},

		subtitle: {
			text: 'Detail Stats of Operators by Bussines Units in the GST Group'
		},


		xAxis: {
			categories: <?php e("$label_bases")?>
		},
		series: [{
			name: 'Operators',
			data: <?php e("$label_workers")?>
		}]
	});

	// Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });
	// Build the chart
    $('#container_courses_stats').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Percentage of total Courses Avaliable Againts Total Operators'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    },
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
            name: 'Capacitaciones',
            data: <?php e("$label_courses_stats")?>
        }]
    });

	$('#container_courses_acomplished').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Percentage of total Courses Avaliable Againts Total Operators'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
			allowPointSelect: true,
			cursor: 'pointer',
			dataLabels: {
				enabled: true,
				format: '<b>{point.name}</b>: {point.percentage:.1f} %',
				style: {
					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
				},
				connectorColor: 'silver'
			}
			}
		},
		series: [{
			name: 'Capacitaciones',
			data: <?php e("$label_courses_stats")?>
		}]
	});

});
	// &#93;&#93;>
</script>
