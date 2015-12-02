<?php //Downloads?>


  <script>
	function notifyMe() {
	// Let's check if the browser supports notifications
	if (!("Notification" in window)) {
		alert("This browser does not support desktop notification");
	}

	// Let's check if the user is okay to get some notification
	else if (Notification.permission === "granted") {
		// If it's okay let's create a notification
// 		var notification = new Notification("Hi there!");
		var notification = new Notification('Notification example', {
			icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
			body: "Hey there! You've been notified!",
			});

			notification.onclick = function () {
			window.open("http://stackoverflow.com/a/13328397/1269037");
			};
	}

	// Otherwise, we need to ask the user for permission
	// Note, Chrome does not implement the permission static property
	// So we have to check for NOT 'denied' instead of 'default'
	else if (Notification.permission !== 'denied') {
		Notification.requestPermission(function (permission) {

		// Whatever the user answers, we make sure we store the information
		if(!('permission' in Notification)) {
			Notification.permission = permission;
		}

		// If the user is okay, let's create a notification
		if (permission === "granted") {
			var notification = new Notification("Hi there!");
		}
		});
	}

	// At last, if the user already denied any notification, and you 
	// want to be respectful there is no need to bother him any more.
	}
  </script>

  
  
  <button onclick="notifyMe()" class="btn btn-default">Notify me!</button>

  
  
  <style>
/*body { background: #333; height: 2000px }*/

	ul {
		list-style-type: none;
	}

	.social {
	/*   width: 100px; */
	right:0%;
	height: 120px;
	position: fixed;
	margin-top: 10%;
	perspective: 1000px
	
	}

	.social li a {
	display: block;
	height: 40px;
	width: 40px;
	background: #222;
	border-bottom: 1px solid #333;
	font: normal normal normal
	16px/20px 
	'FontAwesome', 'Source Sans Pro', Helvetica, Arial, sans-serif;
	color: #fff;
	-webkit-font-smoothing: antialiased;
	padding: 10px;
	text-decoration: none;
	text-align: center;
	transition: background .5s ease .300ms
	}

	.social li:first-child a:hover { background: #3b5998 }
	.social li:nth-child(2) a:hover { background: #00acee }
	.social li:nth-child(3) a:hover { background: #ea4c89 }
	.social li:nth-child(4) a:hover { background: #dd4b39 }

	.social li:first-child a { border-radius: 0 5px 0 0 }
	.social li:last-child a { border-radius: 0 0 5px 0 }
		
	.social li a span {
	width: 100px;
	/*   float: left; */
	float: right; /*change the orientation of the hover title*/
	text-align: center;
	background: #222;
	color: #fff;
	margin: -25px 74px;
	padding: 8px;
	transform-origin: 0;
	visibility: hidden;
	opacity: 0;
	transform: rotateY(45deg);
	border-radius: 5px;
	transition: all .5s ease .300ms
	}

	.social li span:after {
	content: '';
	display: block;
	width: 0;
	height: 0;
	position: absolute;
	right: -20px;
	top: 7px;
	border-right: 10px solid transparent;
	border-left: 10px solid #222;
	border-bottom: 10px solid transparent;
	border-top: 10px solid transparent;
	}

	.social li a:hover span {
	visibility: visible;
	opacity: 1;
	transform: rotateY(0)
	}
  </style>

			
			<ul class='social'>
			<li>
				<a class="fa fa-file-excel-o" href="#">
				<span>excel</span>
				</a> 
			</li>
			
			<li>
				<a class="fa fa-file-word-o" href="#">
				<span>word</span>
				</a>
			</li>
			
			<li>
				<a class="fa fa-file-pdf-o" href="#">
				<span>pdf</span>
				</a>
			</li>
			
			<li>
				<a class="fa fa-bars" href="#">
				<span>Bars</span>
				</a> 
			</li>
			
			</ul>
  
<style>


/*.form-control {
display: block;
width: 100%;
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;
border: 1px solid #ccc;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}*/
</style>

<!--		<div class="form-group">
			<label for="date_example" class="col-sm-4 control-label">Concrete date</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="calendar2" placeholder="Date picker">
			</div>
		</div>-->

<?php 
		echo $this->Form->input('create',
					array(	
							'type' => 'text',
							'label'=>false,
							'class'=>'form-control',
							'placeholder'=>'Seleccione una fecha',
							'id'=>'calendar',
							'value'=>''
					)
			);

?>

<div id="show"><?php //e(date('Y-m-d H:m:s'));?></div>
	<script>
		x = window.innerWidth;
		document.getElementById("show").innerHTML = x;
	</script>

	<script>
	/*-------------------------------------------
		Function for jQuery-UI page (ui_jquery-ui.html)
	---------------------------------------------*/
	// Function for make all Date-Time pickers on page
	//
		require(['jquery','jquery-ui','bootstrap'], function($) {
			$(document).ready(function () {
					$('#calendar').datepicker({
								showButtonPanel: true
						
					});
					
	// Update the given div
// 			$(document).ready(
// 				function() {
// 					setInterval(function() {
// 						$('#show').load(location.href + " #show");
// 					}, 1000);
//             });

				setInterval(function() {
					$('#show').load(location.href + " #show");
				}, 1000);
					
			});
		});
	</script>
	
	
<!-- 	<div id="this_post"><?php e(date('Y-m-d H:m:s'));?></div> -->
	
	
	<?php e($this->Html->url('/files/anexos/', true));?>
	
	
	<?php
// 		echo $ajax->remoteTimer(
// 			array(
// // 				'url' => array( 'controller' => 'Downloads', 'action' => 'clock'),
// 				'update' => 'this_post',
// 	// 			'complete' => 'alert( "request completed" )',
// // 				'position' => 'bottom', 
// 				'frequency' => 1
// 			)
// 		);
	?>
	
	
	<div class="blue_cool_background">
		<h1>test text test text test text</h1>
	</div>
	
	<div class="green_cool_background">
		<h1>test text test text test text</h1>
	</div>
		
	<div class="row" style="padding-top:50px">
		
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">

            <div class="list-group list-group-horizontal">
                <a href="#" class="list-group-item active">Item One</a>
                <a href="#" class="list-group-item">Item Two</a>
                <a href="#" class="list-group-item">Item Three</a>
                <a href="#" class="list-group-item">Item Four</a>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">

            <div class="list-group list-group-horizontal">
                <a href="#" class="list-group-item">Item One</a>
                <a href="#" class="list-group-item active">Item Two</a>
                <a href="#" class="list-group-item">Item Three</a>
                <a href="#" class="list-group-item">Item Four</a>
            </div>

        </div>

	</div>
		
<h1>Lorem ipsum dolor sit</h1>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
		
		
		
		