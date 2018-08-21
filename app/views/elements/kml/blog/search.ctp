<div class="filter pull-right">
    <?php
      echo $this->Form->create('Post', array(
                          'url' => array_merge(array('action' => 'index'), $this->params['pass']))
                  );
    ?>
    <?php
      echo $this->Form->input('title', array('div' => false,'empty' => true,'label' => false,'class'=>'pull-right','placeholder'=>'Buscar...')); // empty creates blank option.
    ?>
    <button class="button button-primary" type="submit"><span><i class="fa fa-search fa-1x"></i></span>&nbsp;</button>
    <?php
      echo $this->Form->end();
    ?>
</div>
