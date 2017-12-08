<?php
/** NOTE @begin->devoops */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;


// <script type="text/javascript" src="scripts/jquery-1.11.3.min.js"></script>
// drag&drop + selectable build (includes customizations for RichFilemanager)
// <script type="text/javascript" src="scripts/jquery-ui/jquery-ui.min.js"></script>
// <script type="text/javascript" src="scripts/jquery-browser.js"></script>
// <script type="text/javascript" src="scripts/knockout-3.4.0.js"></script>
// <script type="text/javascript" src="scripts/jquery-mousewheel/jquery.mousewheel.min.js"></script>
// <script type="text/javascript" src="scripts/jquery.splitter/dist/jquery-splitter.js"></script>
// <script type="text/javascript" src="scripts/jquery.contextmenu/dist/jquery.contextMenu.min.js"></script>
// <script type="text/javascript" src="scripts/alertify.js/dist/js/alertify.js"></script>
// <script type="text/javascript" src="scripts/clipboard.js/dist/clipboard.min.js"></script>
// <script type="text/javascript" src="scripts/jquery.fileDownload/jquery.fileDownload.min.js"></script>
// <script type="text/javascript" src="scripts/javascript-templates/js/tmpl.min.js"></script>
// <script type="text/javascript" src="scripts/toast/lib/toast.min.js"></script>
// <script type="text/javascript" src="scripts/purl/purl.min.js"></script>
//  Load filemanager script
// <script type="text/javascript" src="scripts/filemanager.min.js"></script>
// <script type="text/javascript" src="config/filemanager.init.js"></script>
// css
// <link rel="stylesheet" type="text/css" href="styles/reset.css" />
// <link rel="stylesheet" type="text/css" href="styles/filemanager.css" />
// <link rel="stylesheet" type="text/css" href="scripts/jquery.contextmenu/dist/jquery.contextMenu.min.css" />
// <link rel="stylesheet" type="text/css" href="scripts/custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" />
// <link rel="stylesheet" type="text/css" href="scripts/alertify.js/dist/css/alertify.css">

      //NOTE jquery filemanager pluging
      /** @css */
      e($this->Html->css($theme.'RichFilemanager/styles/reset', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'RichFilemanager/styles/filemanager', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'RichFilemanager/styles/jquery.contextMenu.min', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'RichFilemanager/styles/jquery.mCustomScrollbar.min', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'RichFilemanager/styles/alertify', 'stylesheet', array('inline'=>false)));

      /** @js */
      e($this->Html->script($theme.'RichFilemanager/scripts/jquery-ui/jquery-ui.min',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/jquery-browser',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/knockout-3.4.0',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/jquery-mousewheel/jquery.mousewheel.min',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/jquery.splitter/dist/jquery-splitter',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/jquery.contextmenu/dist/jquery.contextMenu.min',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/alertify.js/dist/js/alertify',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/clipboard.js/dist/clipboard.min',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/jquery.fileDownload/jquery.fileDownload.min',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/javascript-templates/js/tmpl.min',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/toast/lib/toast.min',false));
      e($this->Html->script($theme.'RichFilemanager/scripts/purl/purl.min',false));


      e($this->Html->script($theme.'RichFilemanager/scripts/filemanager',false));
      e($this->Html->script($theme.'RichFilemanager/config/filemanager.init',false));
?>
