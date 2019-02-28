<?php

/** NOTE @begin->devoops  */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;


// Datatables

			// Add datatables
			e($this->Html->script($theme.'datatables/jquery-3.3.1',false));
			e($this->Html->script($theme.'datatables/jquery.dataTables.min',false));
			e($this->Html->script($theme.'datatables/jQuery-1.12.4/jquery-1.12.4',false));
			e($this->Html->script($theme.'datatables/JSZip-2.5.0/jszip',false));
			e($this->Html->script($theme.'datatables/pdfmake-0.1.36/pdfmake',false));
			e($this->Html->script($theme.'datatables/pdfmake-0.1.36/vfs_fonts',false));
			e($this->Html->script($theme.'datatables/DataTables-1.10.18/js/jquery.dataTables',false));
			e($this->Html->script($theme.'datatables/DataTables-1.10.18/js/dataTables.bootstrap',false));
			e($this->Html->script($theme.'datatables/AutoFill-2.3.2/js/dataTables.autoFill',false));
			e($this->Html->script($theme.'datatables/AutoFill-2.3.2/js/autoFill.bootstrap',false));
			e($this->Html->script($theme.'datatables/Buttons-1.5.4/js/dataTables.buttons',false));
			e($this->Html->script($theme.'datatables/Buttons-1.5.4/js/buttons.bootstrap',false));
			e($this->Html->script($theme.'datatables/Buttons-1.5.4/js/buttons.colVis',false));
			e($this->Html->script($theme.'datatables/Buttons-1.5.4/js/buttons.flash',false));
			e($this->Html->script($theme.'datatables/Buttons-1.5.4/js/buttons.html5',false));
			e($this->Html->script($theme.'datatables/Buttons-1.5.4/js/buttons.print',false));
			e($this->Html->script($theme.'datatables/ColReorder-1.5.0/js/dataTables.colReorder',false));
			e($this->Html->script($theme.'datatables/FixedColumns-3.2.5/js/dataTables.fixedColumns',false));
			e($this->Html->script($theme.'datatables/FixedHeader-3.1.4/js/dataTables.fixedHeader',false));
			e($this->Html->script($theme.'datatables/KeyTable-2.5.0/js/dataTables.keyTable',false));
			e($this->Html->script($theme.'datatables/Responsive-2.2.2/js/dataTables.responsive',false));
			e($this->Html->script($theme.'datatables/RowGroup-1.1.0/js/dataTables.rowGroup',false));
			e($this->Html->script($theme.'datatables/RowReorder-1.2.4/js/dataTables.rowReorder',false));
			e($this->Html->script($theme.'datatables/Scroller-1.5.0/js/dataTables.scroller',false));
			e($this->Html->script($theme.'datatables/Select-1.2.6/js/dataTables.select',false));

			// e($this->Html->script($theme.'datatables/datatables.min',false));
			e($this->Html->css($theme.'datatables/DataTables-1.10.18/css/dataTables.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/AutoFill-2.3.2/css/autoFill.bootstrap.min', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/Buttons-1.5.4/css/buttons.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/ColReorder-1.5.0/css/colReorder.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/FixedColumns-3.2.5/css/fixedColumns.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/FixedHeader-3.1.4/css/fixedHeader.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/KeyTable-2.5.0/css/keyTable.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/Responsive-2.2.2/css/responsive.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/RowGroup-1.1.0/css/rowGroup.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/RowReorder-1.2.4/css/rowReorder.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/Scroller-1.5.0/css/scroller.bootstrap', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'datatables/Select-1.2.6/css/select.bootstrap', 'stylesheet',array('inline'=>false)));




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
			// e($this->Html->script($theme.'jquery/jquery.min',false));
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


?>
