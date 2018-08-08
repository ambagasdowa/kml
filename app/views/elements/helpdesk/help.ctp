<style>
	.help_hesk {
		position: fixed;
		bottom: 15px;
/* 		top:13%; */
		right: 2%;
		cursor: pointer;
		z-index:150;
		color:#ccc;
	}
</style>
	<div>
		<?php
			if ($_SERVER['HTTP_HOST'] === 'development') {
				$path = 'http://development/app/hesk/mod/hesk';
			} else {
				$app = 'helpdesk';
				$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/";
			}
		?>
	</div>

	<span id="help_desktop">
		<a  id="help_hesk" class="help_hesk" href="<?php e($path)?>" class="iframe"><i class="fa fa-ticket fa-2x" aria-hidden="true"></i>&nbsp;</a>
	</span>

<script>
		$(document).ready(function () {
			/**HELP DESK Conecctor*/
			// var urlStruct = "<?php //echo Dispatcher::baseUrl();?>/ReporterViewSpXs4zAccounts/get/data:" + data_code;
			// console.log(urlStruct);

			// $('.help_hesk').on('click',function(event){
			// 	event.stopPropagation();
			// 	event.preventDefault();
			// 	alert("<?php echo $path ?>");
			// 	$.colorbox({
			// 			// 'iframe':true,
			// 			'href' : "<?php echo $path ?>",
			// 			'scrolling' : false,
			// 			'trapFocus' :	true
			// 	});
			});




// 			$(".help_hesk").fancybox({
// 				type: 'iframe',
// 				maxWidth	: 1200,
// 				maxHeight	: 780,
// 				fitToView	: false,
// 				width		: '90%',
// 				height	: '90%',
// 				scrolling   : false,
// 				autoSize	: false,
// 				closeClick	: false,
// 				openEffect	: 'fade',
// 				closeEffect	: 'fade',
// // 				beforeShow	: function(){
// // 							// added 50px to avoid scrollbars inside fancybox
// // 							this.width = ($('.fancybox-iframe').contents().find('html').width())+650;
// // 							this.height = ($('.fancybox-iframe').contents().find('html').height())+650;
// // 						  }
// 			});
		});
</script>
