		<style>
			.outer_customize{
				background: #000;
				height: 70px;
				width: 100%;
	/* 			position:absolute; */
				position:fixed;
				z-index:110;
				bottom: 0px;
				left: 0px;
				padding: 12px 0 25px 23px;
				-webkit-transition-duration: 300ms;
				-webkit-transition-property: height;
				-webkit-transition-timing-function: ease;
				-moz-transition-duration: 300ms;
				-moz-transition-property: height;
				-moz-transition-timing-function: ease;
				-o-transition-duration: 300ms;
				-o-transition-property: height;
				-o-transition-timing-function: ease;

			}
			.outer_customize .h2{
				color: #fff;
				font-size: 11px;
				line-height: 25px;
			}
			.outer_customize .h2 .a_link{
				color: #fff;
			}
			.outer_customize .dispview{
				background-repeat: no-repeat;
				background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAAASCAYAAAD4+JjWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAdxJREFUeNrsmE9EBFEcx2c3YhiWJZbotERERETpGktElIhO0Sm6RmyX7dIpOkWnJSKW2FPEdInYFVFKdBqWEqWUzev71ntM0+zMmz/vvUtfPsf3+z5fs7/f722GEGLEUB94Bt+GHpngS4G/mY14wAJl8ACuQElTQEXmPyOpfg5UQM2gX5AAPWAVtMhfnYExwTppMezyt1P07wVr4InXFjk0D+5IuA5BUUNAXEdgMEHNJfDoqRkY0BS4INH0CfZAXkNAVG3mX4hQaxo0utTzDWgInJBkegUbwFIckNu/HOI/Ak5D6vwKqB/sk3TlgBXWw1QGxNVivdPtT9tAVfB8JyATVMA7kadrUNIQEBftoYtgl7UBUdkZasZGpmydg8mUaim7c9b4V6DiBHQLFsA2+NB073uwBd4kejQ7HhF+z45Pw4vS2G0J06zAxno7xX5Jd6Fl7iE6MjdDRiZdDWoaAuLQBfE4YTAvYJ0NLUMkoDhL30TAcmkT+Rv2eIzllk7vHZDzq9ktoGrCZ8Ocz/NERUCcWXAjEM4BGAiq5Q2IbpajKV3S+8BVGZDb3/EJps426dA6PKAGe5PIuKjFelhdcUBef9pLL9kbU/g8XRRNRePa1LgWUOXZn3yR9CPAAAOve6golfz8AAAAAElFTkSuQmCC);
				background-position: right top;
				height: 24px;
				width: 29px;
				display: block;
				float: left;
				margin-right: 10px;
				cursor: pointer;
				-webkit-transition-duration: 200ms;
				-webkit-transition-property: background-position;
				-webkit-transition-timing-function: ease;
				-moz-transition-duration: 200ms;
				-moz-transition-property: background-position;
				-moz-transition-timing-function: ease;
				-o-transition-duration: 200ms;
				-o-transition-property: background-position;
				-o-transition-timing-function: ease;
			}
			.outer_customize .up{
				background-position: left top;
			}

	/* 		this link is fixed againts the lenght of the content */
/*			.fixed-link {
				position: fixed;
				bottom: 15px;
				right: 20px;
				cursor: pointer;
				z-index:150;
			}*/

	/* 		footer content */
			.footer_app{
				/*margin-top:20px;*/
			}
		</style>

<!-- 		<a class="fixed-link btn btn-primary" href="<?php e($this->webroot)?>">Inicio</a> -->

		<!-- <footer class="footer"> -->
		<footer>
			<div class="container_footer">
				<div id="customize" class="outer_customize">

					<div class="h2">
						<a class="a_link" onclick="opend()" href="javascript:void(0);">
							<span id="icodir" class="dispview up"></span>
							<span class="footer_legend">&copy; GST Software Development Department</span>
<!-- 								<span id="label"></span> -->
						</a>
					</div>
	<!--     testing -->
					<div class="label">
						<div class="running-text">

							<?php //echo date('Y-m-s');?>
							<?php //var_dump($_SESSION['Auth']['User']['alert']);?>
							<?php //if(!empty($_SESSION['Auth']['User']['alert'])) {?>
<!-- 								<span> -->
<!-- 									<div class="alert alert-default"> -->
									<div id="file_anexos">
											<?php //e(date('Y-m-d H:m:s'));?>
											<?php //echo $this->element('policies/anexos'); ?>
											<?php //e($_SESSION['Auth']['User']['alert']);?>
									</div>
<!-- 									</div> -->
<!-- 								</span> -->
							<?php //}?>

<!--							<ul class="date-top">
								<li class="entypo-calendar" style="margin-right:5px"></li>
								<li >Wed,  24 June 2015</li>
							</ul>-->
<!--							<ul class="digital">
								<li class="entypo-clock" style="margin-right:5px"></li>
								<li class="hour">22</li>
								<li>:</li>
								<li class="min">16</li>
								<li>:</li>
								<li class="sec">45</li>
								<li class="meridiem">PM</li>
							</ul>-->

						</div>
					</div>
	<!--         testing -->

				</div>
			</div>
		</footer>

		<!-- <div class="help">
			<a href="#" class="btn btn-danger helplink" data-toggle="modal" data-target="#myModal"><i class="fa fa-question"></i></a>
		</div> -->

		<script>
			var el = document.getElementById("customize");
			var ic = document.getElementById('icodir');
			var lb = document.getElementById('label');
			lb.innerHTML = 'Open panel';
			setTimeout('opend()',500);
			function opend(){
				var b = '';
				var max = 200;
				var a = el.clientHeight;
				if(a>=max){
					b = '70px';
					setTimeout('addCla("dispview up","Open panel")',100);
				}else{
					b = '200px';
					setTimeout('addCla("dispview","Close panel")',100);
				}

				el.style.height = b;
			}
			function addCla(pass1,pass2){
				ic.className = pass1;
				lb.innerHTML = pass2;
			}
		</script>
