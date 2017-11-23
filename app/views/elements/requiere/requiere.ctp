<?php
/** NOTE @begin->devoops */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;

/** @css */
e($this->Html->css($theme.'jquery/jquery-ui', 'stylesheet',array('inline'=>false)));
e($this->Html->css($theme.'bootstrap/bootstrap', 'stylesheet',array('inline'=>false)));
e($this->Html->css($core.'bootstrap_addons', 'stylesheet',array('inline'=>false)));
e($this->Html->css($theme.'bootstrap/carousel', 'stylesheet',array('inline'=>false)));
e($this->Html->css($theme.'bootstrap/dashboard', 'stylesheet',array('inline'=>false)));
e($this->Html->css($theme.'bootstrap/sticky-footer-navbar', 'stylesheet',array('inline'=>false)));

//NOTE general css
/** @css you shut put hir your config files for login tables boxes comboxes etc  **/

e($this->Html->css($default.'style','stylesheet', array('inline'=>false)));



e($this->Html->script($theme.'prototype/prototype',false));
e($this->Html->script($theme.'scriptaculous/scriptaculous.js?load=effects',false));
/** @quick_filter js*/
e($this->Html->script($theme.'filter/quick_filter',false));
e($this->Html->script($theme.'require/require',false));
e($this->Html->script($theme.'require/require_config',false));
// $javascript->link($theme.'require/require', false);
// $javascript->link($theme.'require/require_config', false);
?>
