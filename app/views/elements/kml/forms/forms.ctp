<?php
/** NOTE @begin->devoops */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;

// NOTE Bootstrap
			/** @css */

      e($this->Html->css($theme.'select2/select2', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery-ui/jquery-ui', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/nigran.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/lugo.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/latoja.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/melon.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/siena.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/skeleton.datepicker', 'stylesheet', array('inline'=>false)));

      // e($this->Html->css($theme.'datatable/css/datatable-bootstrap', 'stylesheet', array('inline'=>false)));

      e($this->Html->css($theme.'table_filter/tablefilter', 'stylesheet', array('inline'=>false)));


      /** @js */
      e($this->Html->script($theme.'jquery-ui/jquery-ui.min',false));
      e($this->Html->script($theme.'select2/select2.min',false));

      // e($this->Html->script($theme.'datatable/js/datatable',false));
      // e($this->Html->script($theme.'datatable/js/datatable.jquery',false));

      e($this->Html->script($theme.'table_filter/dist/tablefilter/tablefilter',false));


      // jquery colorbox pluging
      //NOTE colorbox in favor to fancybox
      e($this->Html->css($theme.'colorbox/colorbox', 'stylesheet', array('inline'=>false)));
      e($this->Html->script($theme.'colorbox/jquery.colorbox',false));


      //NOTE Impression pluging
      e($this->Html->script($theme.'print_this/printThis',false));
?>
