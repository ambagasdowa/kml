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
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php echo $scripts_for_layout ?>

<?php setlocale(LC_MONETARY, 'es_MX'); ?>

<?php /** NOTE amybe this can be replaced */
/** @theme->path */
?>

<?php
/** TEST for @pdf.js minimal */
// 	e($this->Html->css('pdf.js/viewer'));

  e($this->Html->script("pdf.js/src/shared/util"));
  e($this->Html->script("pdf.js/src/display/api"));
  e($this->Html->script("pdf.js/src/display/metadata"));
  e($this->Html->script("pdf.js/src/display/canvas"));
  e($this->Html->script("pdf.js/src/display/webgl"));
  e($this->Html->script("pdf.js/src/display/pattern_helper"));
  e($this->Html->script("pdf.js/src/display/font_loader"));
  e($this->Html->script("pdf.js/src/display/annotation_helper"));
//   Needed for handgrab
  /** NOTE for @pdf.js */
  e($this->Html->script("pdf.js/grab_to_pan"));

/** NOTE @from full pdf.js viewer */
// 	e($this->Html->script("pdf.js/compatibility"));
// 	e($this->Html->script("pdf.js/external/webL10n/l10n"));

// 	e($this->Html->script("pdf.js/ui_utils"));
//     e($this->Html->script("pdf.js/default_preferences"));
//     e($this->Html->script("pdf.js/preferences"));
//     e($this->Html->script("pdf.js/download_manager"));
//     e($this->Html->script("pdf.js/view_history"));
//     e($this->Html->script("pdf.js/pdf_rendering_queue"));
//     e($this->Html->script("pdf.js/pdf_page_view"));
//     e($this->Html->script("pdf.js/text_layer_builder"));
//     e($this->Html->script("pdf.js/annotations_layer_builder"));
//     e($this->Html->script("pdf.js/pdf_viewer"));
//     e($this->Html->script("pdf.js/thumbnail_view"));
//     e($this->Html->script("pdf.js/document_outline_view"));
//     e($this->Html->script("pdf.js/document_attachments_view"));
//     e($this->Html->script("pdf.js/pdf_find_bar"));
//     e($this->Html->script("pdf.js/pdf_find_controller"));
//     e($this->Html->script("pdf.js/pdf_history"));
//     e($this->Html->script("pdf.js/secondary_toolbar"));
//     e($this->Html->script("pdf.js/presentation_mode"));
//     e($this->Html->script("pdf.js/grab_to_pan"));
//     e($this->Html->script("pdf.js/hand_tool"));
//     e($this->Html->script("pdf.js/overlay_manager"));
//     e($this->Html->script("pdf.js/password_prompt"));
//     e($this->Html->script("pdf.js/document_properties"));

//     e($this->Html->script("pdf.js/debugger"));
//     e($this->Html->script("pdf.js/viewer"));



  /** TEST render pdf for embed **/
     e($this->Html->script("gst/pdfRender"));
     e($this->Html->script("gst/pan2grab"));
     e($this->Html->script("gst/pdfFullScreen"));
     
  /** @php.js*/
  e($this->Html->script("root/php.js/base64_encode"));
  e($this->Html->script("root/php.js/base64_decode"));

      
/** NOTE @begin->devoops */
$theme = 'devoops/';
$default = 'kml/';

/** NOTE prototype **/
e($this->Html->script($theme.'prototype/prototype'));
e($this->Html->script($theme.'scriptaculous/scriptaculous.js?load=effects'));


/** @css */
e($this->Html->css($theme.'bootstrap/bootstrap', 'stylesheet'));
e($this->Html->css($theme.'bootstrap/carousel', 'stylesheet'));
e($this->Html->css($theme.'bootstrap/dashboard', 'stylesheet'));
e($this->Html->css($theme.'bootstrap/sticky-footer-navbar', 'stylesheet'));
e($this->Html->css($theme.'jquery/jquery-ui', 'stylesheet'));
e($this->Html->css($theme.'fancybox/jquery.fancybox', 'stylesheet'));
e($this->Html->css($theme.'justified-gallery/justifiedGallery', 'stylesheet'));
e($this->Html->css($theme.'fullcalendar/fullcalendar', 'stylesheet'));
e($this->Html->css($theme.'xcharts/xcharts.min', 'stylesheet'));
e($this->Html->css($theme.'select2/select2', 'stylesheet'));
e($this->Html->css($theme.'devoops/righteous', 'stylesheet'));
e($this->Html->css($theme.'devoops/font-awesome.min.css', 'stylesheet'));//font-awesome
// e($this->Html->css($theme.'devoops/style_v2', 'stylesheet')); // devoops_theme
e($this->Html->css($theme.'chartist/chartist.min', 'stylesheet'));
e($this->Html->css($theme.'morris/morris', 'stylesheet'));
//carousel OWL
e($this->Html->css($theme.'owl/owl.carousel', 'stylesheet'));



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

/** @css @pdf*/
// e($this->Html->css('pdf.js/viewer'));


/** @css you shut put hir your config files for login tables boxes comboxes etc  **/

e($this->Html->css($default.'style'));


/** @js */
// e($this->Html->script($theme.'jquery/jquery.min'));
// e($this->Html->script($theme.'jquery-ui/jquery-ui.min'));
// e($this->Html->script($theme.'bootstrap/bootstrap'));


/** @require*/
e($this->Html->script($theme.'require/require'));
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
require.config({
    baseUrl: './',
    paths: {
		'jquery': "<?php e($this->webroot.'js/devoops/jquery/jquery.min');?>",
        'bootstrap': "<?php e($this->webroot.'js/devoops/bootstrap/bootstrap.min');?>",
		'sparkline': "<?php e($this->webroot.'js/devoops/sparkline/jquery.sparkline.min');?>",
		'raphael': "<?php e($this->webroot.'js/devoops/raphael/raphael-min');?>",
		'morris': "<?php e($this->webroot.'js/devoops/morris/morris');?>",
		'jquery-ui': "<?php e($this->webroot.'js/devoops/jquery-ui/jquery-ui');?>",
		'waypoints': "<?php e($this->webroot.'js/devoops/waypoints/jquery.waypoints.min');?>",
		'owl': "<?php e($this->webroot.'js/devoops/owl/owl.carousel.min');?>"
    },
    shim: {
        'bootstrap': ['jquery']
    },
    map: {
        '*': {
            'jquery': 'jQueryNoConflict'
        },
        'jQueryNoConflict': {
            'jquery': 'jquery'
        }
    }
});
define('jQueryNoConflict', ['jquery'], function ($) {
    return $.noConflict();
});
if (Prototype.BrowserFeatures.ElementExtensions) {
    require(['jquery', 'bootstrap'], function ($) {
        // Fix incompatibilities between BootStrap and Prototype
        var disablePrototypeJS = function (method, pluginsToDisable) {
                var handler = function (event) {  
                    event.target[method] = undefined;
                    setTimeout(function () {
                        delete event.target[method];
                    }, 0);
                };
                pluginsToDisable.each(function (plugin) { 
                    $(window).on(method + '.bs.' + plugin, handler); 
                });
            },
            pluginsToDisable = ['collapse', 'dropdown', 'modal', 'tooltip', 'popover', 'tab'];
        disablePrototypeJS('show', pluginsToDisable);
        disablePrototypeJS('hide', pluginsToDisable);
    });
}
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

		<div id="nav_menu">
			<?php e($this->element('nav_menu'));?>
		</div>

		<div id="header">
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



		<div id="footer">

			<?php echo $this->element('footer_app'); ?>


	
			<?php //echo $this->element('sql_dump'); ?>

			<!-- Modal the better way to call this is with a element -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel"><?php e(languaje($languaje)['rootModalTitle']);?></h4>
						</div>
						<div class="modal-body">
							<?php e(languaje($languaje)['rootModalMessage']);?>
							<?php isset($rfc) ? e($rfc) : null ; ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><?php e(languaje($languaje)['rootModalButton']);?></button>
					<!--         <button type="button" class="btn btn-primary">Save changes</button> -->
						</div>
					</div>
				</div>
			</div>
			<!-- end modal -->
			<!-- initialize tooltip -->
			<script>
					require(['jquery','owl' ,'bootstrap'], function($) {
						$(document).ready(function () {
							$('#home').tooltip()
						});//end document.ready
					});//end require

					
			</script>
			
		</div> <!--end footer-->
<?php e($this->Html->script($theme.'devoops/form')); // form workaround and select too?>
</body>
</html> 
