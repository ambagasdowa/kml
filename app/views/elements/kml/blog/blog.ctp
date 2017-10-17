<?php
/** NOTE @begin->devoops */
$theme = 'devoops'.DS;
$default = 'kml'.DS;
$core = 'core'.DS;

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

			// e($this->Html->css($core.'bootstrap_reset', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/normalize', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/skeleton', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/mods', 'stylesheet',array('inline'=>false)));
      // e($this->Html->css($theme.'skeleton/custom', 'stylesheet',array('inline'=>false)));
      // e($this->Html->css($theme.'skeleton/black', 'stylesheet',array('inline'=>false)));
			e($this->Html->css($theme.'skeleton/white', 'stylesheet',array('inline'=>false)));

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

?>
