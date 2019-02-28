<?php

/** NOTE @begin->devoops  */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;

// from blog


// NOTE Bootstrap
			// @fonts
			e($this->Html->css('//fonts.googleapis.com/css?family=Raleway:400,300,600', 'stylesheet',array('inline'=>false)));
			e($this->Html->css('https://fonts.googleapis.com/css?family=Varela+Round', 'stylesheet',array('inline'=>false)));
			e($this->Html->css('https://fonts.googleapis.com/css?family=Monoton', 'stylesheet',array('inline'=>false)));

			/** @css */
			// e($this->Html->css($theme.'jquery/jquery-ui', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'bootstrap/bootstrap', 'stylesheet',array('inline'=>false)));
			// e($this->Html->css($core.'bootstrap_addons', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($core.'bootstrap_switch', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($core.'bootstrap_navbar', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($core.'bootstrap_addon_navbar', 'stylesheet',array('inline'=>false)));

			// e($this->Html->css($core.'bootstrap_reset', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/normalize', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/skeleton', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/mods', 'stylesheet',array('inline'=>false)));
      // e($this->Html->css($theme.'skeleton/custom', 'stylesheet',array('inline'=>false)));
      // e($this->Html->css($theme.'skeleton/black', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/white', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/skeleton-checkboxes', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/skeleton-checkboxes-small', 'stylesheet',array('inline'=>false)));

      /** @js */
			e($this->Html->script($theme.'jquery/jquery.min',false));
			// e($this->Html->script($theme.'skeleton/site',false));
			// e($this->Html->script($theme.'jquery-ui/jquery-ui.min',false));
			e($this->Html->script($theme.'bootstrap/bootstrap',false));


			e($this->Html->css($theme.'wysihtml5/bootstrap-wysihtml5.css', 'stylesheet',array('inline'=>false)));
			// e($this->Html->script($theme.'bootstrap-wysihtml5/wysihtml5-0.3.0',false));
			// e($this->Html->script($theme.'bootstrap-wysihtml5/bootstrap-wysihtml5',false));
			e($this->Html->script($theme.'wysihtml/wysihtml',false));
			e($this->Html->script($theme.'wysihtml/wysihtml.all-commands',false));
			e($this->Html->script($theme.'wysihtml/wysihtml.toolbar',false));

// from form

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



// NOTE Bootstrap
			/** @css */

// Add datatables
// e($this->Html->script($theme.'datatables/datatables.min',false));
// e($this->Html->css($theme.'datatables/datatables.min', 'stylesheet',array('inline'=>false)));


?>
