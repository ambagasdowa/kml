<?php
    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
    // $evaluate = false;
    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
    // blog
    $evaluate = true;
    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
?>


<?php
echo $this->Html->css('/acl/css/acl.css');
?>
<div id="plugin_acl">

	<?php
	echo $this->Session->flash('plugin_acl');
	?>

	<h1><?php echo __d('acl', 'ACL plugin', true); ?></h1>

	<?php

	if(!isset($no_acl_links))
	{
	    $selected = isset($selected) ? $selected : $this->params['controller'];

        $links = array();
        $links[] = $this->Html->link(__d('acl', 'Permissions', true), '/admin/acl/aros/index', array('class' => ($selected == 'aros' )? 'selected' : null));
        $links[] = $this->Html->link(__d('acl', 'Actions', true), '/admin/acl/acos/index', array('class' => ($selected == 'acos' )? 'selected' : null));

        echo $this->Html->nestedList($links, array('class' => 'acl_links'));
	}
	?>
