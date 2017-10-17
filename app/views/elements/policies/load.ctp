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
/** NOTE @begin->devoops */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;

/** ALERT fix for load just wen needed*/
/** TEST for @pdf.js minimal */

e($this->Html->script("pdf.js/src/shared/util",false));
e($this->Html->script("pdf.js/src/display/api",false));
e($this->Html->script("pdf.js/src/display/metadata",false));
e($this->Html->script("pdf.js/src/display/canvas",false));
e($this->Html->script("pdf.js/src/display/webgl",false));
e($this->Html->script("pdf.js/src/display/pattern_helper",false));
e($this->Html->script("pdf.js/src/display/font_loader",false));
e($this->Html->script("pdf.js/src/display/annotation_helper",false));
//   Needed for handgrab
/** NOTE for @pdf.js */
e($this->Html->script("pdf.js/grab_to_pan",false));
/** TEST render pdf for embed **/
e($this->Html->script("gst/pdfRender",false));
e($this->Html->script("gst/pan2grab",false));
e($this->Html->script("gst/pdfFullScreen",false));
   /** @main inherit to pdf.js*/
e($this->Html->script("root/main/main",false));
?>
