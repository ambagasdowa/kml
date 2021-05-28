<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<?php
	$this->Session->activate();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php //echo $this->Html->charset(); ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->

<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<script type="text/javascript">
	var webroot = '<?php echo $this->webroot; ?>';
// 	var wr = '<?=$this->webroot?>';
</script>
<?php echo $scripts_for_layout ?>
<?php //var_dump($scripts_for_layout);?>

<?php setlocale(LC_MONETARY, 'es_MX'); ?>

<?php /** NOTE amybe this can be replaced */
/** @theme->path */
?>

<?php
  /** @php.js*/
  e($this->Html->script("root/php.js/base64_encode"));
  e($this->Html->script("root/php.js/base64_decode"));


/** NOTE @begin->devoops */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;



/* NOTE Add menu_editor libs
 * @begin css  for menu_editor
 */


//e($this->Html->css($theme.'menuEditor/lib/smartmenus/css/sm-blue/sm-blue', 'stylesheet'));
//e($this->Html->css($theme.'menuEditor/lib/smartmenus/css/sm-clean/sm-clean', 'stylesheet'));
//e($this->Html->css($theme.'menuEditor/lib/smartmenus/css/sm-core-css', 'stylesheet'));
e($this->Html->css($theme.'menuEditor/lib/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap', 'stylesheet'));

		// NOTE Add branch menu_editor
		// MENU EDITOR
e($this->Html->script($theme.'menuEditor/lib/smartmenus/jquery.smartmenus.min'));		
e($this->Html->script($theme.'menuEditor/lib/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap'));		
e($this->Html->script($theme.'menuEditor/lib/smartmenus/renderMenu'));	




// e($this->Html->css($theme.'fancybox/jquery.fancybox', 'stylesheet'));
e($this->Html->css($theme.'justified-gallery/justifiedGallery', 'stylesheet'));
// e($this->Html->css($theme.'xcharts/xcharts.min', 'stylesheet'));
// e($this->Html->css($theme.'select2/select2-bootstrap', 'stylesheet'));
// e($this->Html->css($theme.'devoops/righteous', 'stylesheet'));
e($this->Html->css($theme.'devoops/font-awesome.min.css', 'stylesheet'));//font-awesome

	// NOTE Add Menu Maker Libs
			//
//			e($this->Html->css($theme.'menuEditor/css/bootstrap.min', 'stylesheet', array('inline'=>false)));
e($this->Html->css($theme.'menuEditor/css/all', 'stylesheet', array('inline'=>false)));
			e($this->Html->css($theme.'menuEditor/bootstrap-iconpicker/css/bootstrap-iconpicker', 'stylesheet', array('inline'=>false)));
						
			e($this->Html->script($theme.'menuEditor/js/jquery.min',false));
			e($this->Html->script($theme.'menuEditor/js/bootstrap.bundle.min',false));
			e($this->Html->script($theme.'menuEditor/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min',false));
			e($this->Html->script($theme.'menuEditor/bootstrap-iconpicker/js/iconset/ionicon2-0-1',false));
			e($this->Html->script($theme.'menuEditor/bootstrap-iconpicker/js/iconset/materialdesign2-2-0',false));
			e($this->Html->script($theme.'menuEditor/bootstrap-iconpicker/js/bootstrap-iconpicker.min',false));
			e($this->Html->script($theme.'menuEditor/jquery-menu-editor',false));












//NOTE jquery colorbox pluging
//NOTE colorbox in favor to fancybox
// e($this->Html->css($theme.'colorbox/colorbox', 'stylesheet', array('inline'=>false)));
// e($this->Html->script($theme.'colorbox/jquery.colorbox',false));


// e($this->Html->css($theme.'devoops/style_v2', 'stylesheet')); // devoops_theme
// e($this->Html->css($theme.'chartist/chartist.min', 'stylesheet'));
// e($this->Html->css($theme.'morris/morris', 'stylesheet'));
//carousel OWL
// e($this->Html->css($theme.'owl/owl.carousel', 'stylesheet'));




/** @quick_filter js*/
// e($this->Html->script($theme.'filter/quick_filter'));

// e($this->Html->script($theme.'raphael/raphael-min'));
// e($this->Html->script($theme.'morris/morris'));

// e($this->Html->script($theme.'justified-gallery/jquery.justifiedGallery.min'));
// e($this->Html->script($theme.'tinymce/tinymce.min'));
// e($this->Html->script($theme.'tinymce/jquery.tinymce.min'));
// e($this->Html->script($theme.'xcharts/xcharts'));

// e($this->Html->script($theme.'jQuery-Knob/jquery.knob'));
// e($this->Html->script($theme.'springy/springy'));
// e($this->Html->script($theme.'amcharts/amcharts'));
// e($this->Html->script($theme.'chartist/chartist'));
// e($this->Html->script($theme.'d3/d3'));
// e($this->Html->script($theme.'datatables/jquery.dataTables'));
// e($this->Html->script($theme.'flot/jquery.flot'));
// e($this->Html->script($theme.'fullcalendar/fullcalendar'));

/** @filemanager */
// e($this->Html->script($theme.'filemanager/js/unifiedfm'));


/** @css @pdf*/
// e($this->Html->css('pdf.js/viewer'));


/** @css you shut put hir your config files for login tables boxes comboxes etc  **/

// e($this->Html->css($default.'style'));


/** @js */
// e($this->Html->script($theme.'jquery/jquery.min'));
// e($this->Html->script($theme.'jquery-ui/jquery-ui.min'));
// e($this->Html->script($theme.'bootstrap/bootstrap'));



// e($this->Html->script($theme.'devoops/devoops'));
?>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->


<?php
	/** ALERT @build this function with php and set the libs with an array **/
?>
<script>
// require.config({
//     baseUrl: './',
//     paths: {
// 		'jquery': "<?php e($this->webroot.'js/devoops/jquery/jquery.min');?>",
// 		'bootstrap': "<?php e($this->webroot.'js/devoops/bootstrap/bootstrap.min');?>",
// 		'sparkline': "<?php e($this->webroot.'js/devoops/sparkline/jquery.sparkline.min');?>",
// 		'raphael': "<?php e($this->webroot.'js/devoops/raphael/raphael-min');?>",
// 		'morris': "<?php e($this->webroot.'js/devoops/morris/morris');?>",
// 		'fancybox': "<?php e($this->webroot.'js/devoops/fancybox/jquery.fancybox.pack');?>",
// 		'isotope':"<?php e($this->webroot.'js/devoops/isotope/isotope.pkgd');?>",
// 		'jquery-ui': "<?php e($this->webroot.'js/devoops/jquery-ui/jquery-ui');?>",
// 		'waypoints': "<?php e($this->webroot.'js/devoops/waypoints/jquery.waypoints.min');?>",
// 		'moment': "<?php e($this->webroot.'js/devoops/moment/moment.min');?>",
// 		'fullcalendar': "<?php e($this->webroot.'js/devoops/fullcalendar/fullcalendar.min');?>",
// 		'owl': "<?php e($this->webroot.'js/devoops/owl/owl.carousel.min');?>"
//
//     },
//     shim: {
//         'bootstrap': ['jquery']
//     },
//     map: {
//         '*': {
//             'jquery': 'jQueryNoConflict'
//         },
//         'jQueryNoConflict': {
//             'jquery': 'jquery'
//         }
//     }
// });
// define('jQueryNoConflict', ['jquery'], function ($) {
//     return $.noConflict();
// });
//
// // define('jQueryNoConflict',['jquery'], function (JQuery) {
// //     return JQuery.noConflict( true );
// // });
//
// if (Prototype.BrowserFeatures.ElementExtensions) {
//     require(['jquery', 'bootstrap'], function ($) {
//         // Fix incompatibilities between BootStrap and Prototype
//         var disablePrototypeJS = function (method, pluginsToDisable) {
//                 var handler = function (event) {
//                     event.target[method] = undefined;
//                     setTimeout(function () {
//                         delete event.target[method];
//                     }, 0);
//                 };
//                 pluginsToDisable.each(function (plugin) {
//                     $(window).on(method + '.bs.' + plugin, handler);
//                 });
//             },
//             pluginsToDisable = ['collapse', 'dropdown', 'modal', 'tooltip', 'popover', 'tab'];
//         disablePrototypeJS('show', pluginsToDisable);
//         disablePrototypeJS('hide', pluginsToDisable);
//     });
// }
</script>

<?php

/** NOTE @ends->devoops */




/** NOTE maybe this can be replaced */

/**NOTE */

?>

	<noscript>
		<p style="color: red">
			<b>You REALLY want to have Javascript turned ON to view this page!</b>
		</p>
	</noscript>
</head>
<body>

	<div id="container">
	<!-- If you'd like some sort of menu to
	show up on all of your views, include it here -->

		<div id="nav_menu" class="noprint">
			<?php e($this->element('nav_menu'));?>
		</div>

		<div id="header" class="noprint">
			<?php echo $this->Session->flash('auth');?>
		</div>

		<div id="content">
			<div class="body">
				<!-- Here's where I want my views to be displayed -->
				<?php echo $content_for_layout ?>
			</div>
		</div> <!--content-->
	<!-- Add a footer to each displayed page -->
	<!-- 	<div id="footer"><mark>before-Footer</mark></div> -->
	</div> <!--container-->

		<p>&nbsp;</p> <!--workaround footer-->

		<div id="footer" class="noprint">
			<?php echo $this->element('footer_app'); ?>
			<?php //echo $this->element('sql_dump'); ?>
			<!-- initialize tooltip -->
			<script>
					// require(['jquery','bootstrap'], function($) {
						// $(document).ready(function () {
							// $('#home').tooltip()
						// });//end document.ready
					// });//end require
			</script>
		</div> <!--end footer-->
		<?php //e($this->Html->script($theme.'devoops/form')); // form workaround and select too?>
</body>
</html>
<?php //echo $this->Js->writeBuffer(); ?>
<script type="text/javascript">
// <!&#91;CDATA&#91;
		$(document).ready(function (){

			$("#browse_server").on('click',function(event){
				event.stopPropagation();
				event.preventDefault();
				var data_code = 1;
				var rulr = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].Dispatcher::baseUrl().DS.'app/webroot/vendors/RichFilemanager?exclusiveFolder='.$_SESSION['Auth']['User']['username']; ?>"

				console.log($(this).attr('data-user'));
					$.colorbox({
						iframe:true,
						href:rulr,
						innerWidth:"90%",
						innerHeight:"90%",
						'scrolling' : false,
						'trapFocus' :	true
					});
			});

			$("#storage").on('click',function(event){
				event.stopPropagation();
				event.preventDefault();
				var data_code = 1;
				var rulr = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].Dispatcher::baseUrl().DS.'app/webroot/vendors/RichFilemanager'; ?>"

				console.log($(this).attr('data-user'));
					$.colorbox({
						iframe:true,
						href:rulr,
						innerWidth:"90%",
						innerHeight:"90%",
						'scrolling' : false,
						'trapFocus' :	true
					});
			});
		});
// &#93;&#93;>

//		 $(document).ready(function () {


                var items = <?php echo $menux; ?>

                $('#mk_menu').renderizeMenu(items, {
                        active: 'http://codeigniterturoriales.com',
                        rootClass: "nav navbar-nav",
                        menuClass: "dropdown-menu",
                        submenuClass: "dropdown-menu",
                        dropdownIcon: '<span class="caret"></span>' 
                });
                 jQuery.SmartMenus.Bootstrap.init();

		</script>

