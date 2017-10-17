<?php
    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
    // $evaluate = false;
    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
    // blog
    $evaluate = true;
    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
?>

<!--MariaDB [projections]> select id,username,email,id_empresa,level,status,id_theme,last_access from users where year(`last_access`)=year(now()) and month(`last_access`)=month(now()) and day(`last_access`) = day(now());-->
<div class="container">

<div><?php echo $this->element('kml/blog/search');?></div>

</div>
<?php foreach ($posts as $post): ?>
<div class="container">
  <div class="container post">
    <div class="row docs-section">
        <div class="col-md-6 post-title">
            <h2>
              <?php echo $this->Html->link(__($post['Post']['title'], true), array('action' => 'view', $post['Post']['id']),array('div'=>false,'class'=>'title')); ?>
            </h2>
            <p class="author">
                <strong><?php echo $this->Html->link($post['User']['full_name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?></strong>
                  <span class="text-muted">
                    <?php echo $post['Post']['created'];?>
                  </span>
            </p>
        </div>
        <div class="col-md-6 col-md-offset-0 post-body docs-section" id="grid">
            <?php echo $post['Post']['body'];?>

              <div class="label">
                <?php echo $this->Html->link(__('mas...', true), array('action' => 'view', $post['Post']['id']),array('div'=>false,'class'=>'btn btn-primary btn-sm pull-right') ); ?>
              </div>


        </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<div class="container">
  <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
    ));
    ?>
  </p>


  <ul class="pagination pull-right">
      <?php
        echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
      ?>
      <?php
        echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));
      ?>
      <?php
        echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
      ?>
  </ul>

  <h3><?php __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('New Post', true), array('action' => 'add')); ?></li>
    <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
  </ul>
</div>
