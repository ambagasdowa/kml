<?php
/** NOTE @begin->devoops */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;
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


/** @filemanager */
// e($this->Html->script($theme.'filemanager/js/unifiedfm'));


/** @css @pdf*/
// e($this->Html->css('pdf.js/viewer'));


/** @css you shut put hir your config files for login tables boxes comboxes etc  **/

// e($this->Html->css($default.'style'));


/** @js */
e($this->Html->script($theme.'jquery/jquery.min',false));
e($this->Html->script($theme.'jquery-ui/jquery-ui.min',false));
e($this->Html->script($theme.'bootstrap/bootstrap',false));
e($this->Html->script($theme.'moment/moment.min',false));
e($this->Html->script($theme.'fullcalendar/fullcalendar',false));

// e($this->Html->script($theme.'fancybox/jquery.fancybox.pack',false));

e($this->Html->script($theme.'filter/quick_filter',false));
e($this->Html->script($theme.'filterTable/jquery.filtertable',false));
// e($this->Html->script($theme.'highCharts/charts/highcharts',false));
e($this->Html->script($theme.'highCharts/stock/highstock',false));
e($this->Html->script($theme.'highCharts/charts/highcharts-more',false));
e($this->Html->script($theme.'highCharts/stock/modules/exporting',false));

// e($this->Html->script($theme.'highCharts/stock/themes/dark-blue',false));
// e($this->Html->script($theme.'highCharts/stock/themes/dark-green',false));
// e($this->Html->script($theme.'highCharts/stock/themes/dark-unica',false));
// e($this->Html->script($theme.'highCharts/stock/themes/gray',false));
// e($this->Html->script($theme.'highCharts/stock/themes/grid',false));
// e($this->Html->script($theme.'highCharts/stock/themes/grid-light',false));
e($this->Html->script($theme.'highCharts/stock/themes/sand-signika',false));
// e($this->Html->script($theme.'highCharts/stock/themes/skies',false));

e($this->Html->script($theme.'highCharts/plugin/export-csv',false));
e($this->Html->script($theme.'stickyTableHeaders/sticky',false));
e($this->Html->script($theme.'jquery.sortable/jquery-sortable',false));

// @location https://github.com/nitsugario/jQuery-Freeze-Table-Column-and-Rows
// e($this->Html->script($theme.'freeze_table/jquery.CongelarFilaColumna',false));

// @location https://github.com/amized/Stickytable
e($this->Html->script($theme.'Stickytable/Stickytable',false));

e($this->Html->script($theme.'observe/jquery.observe_field',false));

// e($this->Html->script($theme.'highCharts/stock/themes/dark-unica',false));

// e($this->Html->script($theme.'twbs/jquery.twbsPagination',false));
// e($this->Html->script($theme.'fastLiveFilter/jquery.fastLiveFilter',false));


// select2
// e($this->Html->css($theme.'select2/select2-bootstrap', 'stylesheet'));
// e($this->Html->css($theme.'select2/select2', 'stylesheet'));
e($this->Html->script($theme.'select2/select2.min',false));

// print options
// e($this->Html->script($theme.'jquery_print/jQuery.print',false));
e($this->Html->script($theme.'print_this/printThis',false));

// jquery colorbox pluging
e($this->Html->script($theme.'colorbox/jquery.colorbox',false));




?>
