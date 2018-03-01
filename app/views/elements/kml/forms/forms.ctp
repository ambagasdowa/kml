<?php

/** NOTE @begin->devoops  */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;

// NOTE Bootstrap
			/** @css */

      e($this->Html->css($theme.'select2/select2', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'select2/select2-skeleton', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery-ui/jquery-ui', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/nigran.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/lugo.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/latoja.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/melon.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/siena.datepicker', 'stylesheet', array('inline'=>false)));
      e($this->Html->css($theme.'jquery_datepicker_skins/css/skeleton.datepicker', 'stylesheet', array('inline'=>false)));


      // e($this->Html->css($theme.'table_filter/tablefilter', 'stylesheet', array('inline'=>false)));

      /** @js */
      e($this->Html->script($theme.'jquery-ui/jquery-ui.min',false));
      e($this->Html->script($theme.'select2/select2.min',false));


      //NOTE datatable hol
      // e($this->Html->css($theme.'datatable/css/datatable-bootstrap', 'stylesheet', array('inline'=>false)));
      // e($this->Html->script($theme.'datatable/js/datatable',false));
      // e($this->Html->script($theme.'datatable/js/datatable.jquery',false));

      // e($this->Html->script($theme.'table_filter/dist/tablefilter/tablefilter',false));

      //NOTE jquery colorbox pluging
      //NOTE colorbox in favor to fancybox
      e($this->Html->css($theme.'colorbox/colorbox', 'stylesheet', array('inline'=>false)));
      e($this->Html->script($theme.'colorbox/jquery.colorbox',false));


      //NOTE Impression pluging
      e($this->Html->script($theme.'print_this/printThis',false));




      // NOTE easyPaginator
      // https://st3ph.github.io/jquery.easyPaginate/
      e($this->Html->script($theme.'easyPaginator/jquery.easyPaginate',false));


      // NOTE adding support for multiselection form
      /** @package css */
      e($this->Html->css($theme.'bootstrap-multiselect/bootstrap-multiselect', 'stylesheet', array('inline'=>false)));
      /** @package js*/
      e($this->Html->script($theme.'bootstrap-multiselect/bootstrap-multiselect',false));


      // NOTE highCharts
      // e($this->Html->script($theme.'highCharts/charts/highcharts',false));
      e($this->Html->script($theme.'highCharts/stock/highstock',false));
      e($this->Html->script($theme.'highCharts/charts/highcharts-more',false));
      e($this->Html->script($theme.'highCharts/stock/modules/exporting',false));
      e($this->Html->script($theme.'highCharts/stock/modules/data',false));
      e($this->Html->script($theme.'highCharts/stock/modules/drilldown',false));


      // e($this->Html->script($theme.'highCharts/stock/themes/dark-blue',false));
      // e($this->Html->script($theme.'highCharts/stock/themes/dark-green',false));
      // e($this->Html->script($theme.'highCharts/stock/themes/dark-unica',false));
      // e($this->Html->script($theme.'highCharts/stock/themes/gray',false));
      // e($this->Html->script($theme.'highCharts/stock/themes/grid',false));
      // e($this->Html->script($theme.'highCharts/stock/themes/grid-light',false));
      e($this->Html->script($theme.'highCharts/stock/themes/sand-signika',false));
      // e($this->Html->script($theme.'highCharts/stock/themes/skies',false));
      e($this->Html->script($theme.'highCharts/plugin/export-csv',false));

      // NOTE Datatables Pluging
      // @url https://datatables.net/
      // e($this->Html->css($theme.'DataTablesBootstrap/datatables.min', 'stylesheet', array('inline'=>false)));
      // e($this->Html->script($theme.'DataTablesBootstrap/datatables',false));

      // NOTE Dynatable
      // e($this->Html->css($theme.'dynatable/jquery.dynatable', 'stylesheet', array('inline'=>false)));
      // e($this->Html->script($theme.'dynatable/jquery.dynatable',false));

?>
