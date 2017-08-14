<?php
$theme = 'devoops'.DS;
e($this->Html->script($theme.'prototype/prototype',false));
e($this->Html->script($theme.'scriptaculous/scriptaculous.js?load=effects',false));
/** @quick_filter js*/
e($this->Html->script($theme.'filter/quick_filter',false));
e($this->Html->script($theme.'require/require',false));
e($this->Html->script($theme.'require/require_config',false));
// $javascript->link($theme.'require/require', false);
// $javascript->link($theme.'require/require_config', false);
?>