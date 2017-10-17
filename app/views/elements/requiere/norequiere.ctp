<?php
/** NOTE @begin->devoops */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;

// NOTE Bootstrap

/** @css */
e($this->Html->css($theme.'jquery/jquery-ui', 'stylesheet',array('inline'=>false)));
e($this->Html->css($theme.'bootstrap/bootstrap', 'stylesheet',array('inline'=>false)));
e($this->Html->css($core.'bootstrap_addons', 'stylesheet',array('inline'=>false)));
e($this->Html->css($theme.'bootstrap/carousel', 'stylesheet',array('inline'=>false)));
e($this->Html->css($theme.'bootstrap/dashboard', 'stylesheet',array('inline'=>false)));
e($this->Html->css($theme.'bootstrap/sticky-footer-navbar', 'stylesheet',array('inline'=>false)));

/** @js */
e($this->Html->script($theme.'jquery/jquery.min',false));
e($this->Html->script($theme.'jquery-ui/jquery-ui.min',false));
e($this->Html->script($theme.'bootstrap/bootstrap',false));
e($this->Html->script($theme.'moment/moment.min',false));

// fullcalendar
e($this->Html->css($theme.'fullcalendar/fullcalendar', 'stylesheet',array('inline'=>false)));
e($this->Html->script($theme.'fullcalendar/fullcalendar',false));


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

e($this->Html->css($theme.'select2/select2', 'stylesheet', array('inline'=>false)));
e($this->Html->script($theme.'select2/select2.min',false));
// print options
// e($this->Html->script($theme.'jquery_print/jQuery.print',false));
e($this->Html->script($theme.'print_this/printThis',false));


// jquery colorbox pluging
//NOTE colorbox in favor to fancybox
e($this->Html->css($theme.'colorbox/colorbox', 'stylesheet', array('inline'=>false)));
e($this->Html->script($theme.'colorbox/jquery.colorbox',false));


// general css
/** @css you shut put hir your config files for login tables boxes comboxes etc  **/

e($this->Html->css($default.'style','stylesheet', array('inline'=>false)));

?>
