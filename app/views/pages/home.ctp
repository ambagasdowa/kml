<?php $public === true ? ($user_id = $_SESSION['Auth']['User']['id']) : ($user_id = null) ; ?>

<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>

	<!-- Carousel
    ================================================== -->
    <div id="carouselKml" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carouselKml" data-slide-to="0" class="active"></li>
        <li data-target="#carouselKml" data-slide-to="1"></li>
        <li data-target="#carouselKml" data-slide-to="2"></li>
        <li data-target="#carouselKml" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img class="first-slide img-responsive" src="img/backgrounds/<?php e(imgPaths($portalUrl)['landingImgBg']);?>" alt="first-slide">
          <div class="container">
            <div class="carousel-caption">
              <?php
					echo $this->Html->link(
				      $this->Html->image('logotipos/'.imgPaths($portalUrl)['landingImgA'],
							array(
									"alt" => "Ver politicas",
									'class'=>'fourth-slide',
									'title' => 'Ver politicas',
									'style'=>'border-radius: 40px;',
									'width' => '820',
									'height' => '210'
							)
					  ),
							array(
									'controller'=>'Policies',
									'action'=>'view',
									'type:1/subtype:1'
// 							  		$user_id
							) ,
							array('escape' => false),
							null
					);
              ?>
              <h1><?php e(languaje($languaje)['landingPageTitleA']);?></h1>
              <p>&nbsp;</p>
<!--               <p><?php e(languaje($languaje)['landingPageBodyA']);?></p> -->
<!--               <p><a class="btn btn-lg btn-primary" href="#" role="button"><?php e(languaje($languaje)['landingPageLinkA']);?></a></p> -->
            </div>
          </div>
        </div>

        <div class="item">
          <img class="second-slide img-responsive" src="img/backgrounds/<?php e(imgPaths($portalUrl)['landingImgBg']);?>" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <?php
					echo $this->Html->link(
				      $this->Html->image('logotipos/'.imgPaths($portalUrl)['landingImgB'],
							array(
									"alt" => "Ver politicas",
									'class'=>'fourth-slide',
									'title' => 'Ver politicas',
									'style'=>'border-radius: 40px;',
									'width' => '820',
									'height' => '210'
							)
					  ),
							array(
									'controller'=>'Policies',
									'action'=>'view',
									'type:1/subtype:1'
// 							  		$user_id
							) ,
							array('escape' => false),
							null
					);
              ?>
              <h1><?php e(languaje($languaje)['landingPageTitleB']);?></h1>
              <p>&nbsp;</p>
<!--               <p><?php e(languaje($languaje)['landingPageBodyB']);?></p> -->
<!--               <p><a class="btn btn-lg btn-primary" href="#" role="button"><?php e(languaje($languaje)['landingPageLinkB']);?></a></p> -->
            </div>
          </div>
        </div>

        <div class="item">
          <img class="third-slide img-responsive" src="img/backgrounds/<?php e(imgPaths($portalUrl)['landingImgBg']);?>" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <?php
					echo $this->Html->link(
				      $this->Html->image('logotipos/'.imgPaths($portalUrl)['landingImgC'],
							array(
									"alt" => "Ver politicas",
									'class'=>'fourth-slide',
									'title' => 'Ver politicas',
									'style'=>'border-radius: 40px;',
									'width' => '820',
									'height' => '210'
							)
					  ),
							array(
									'controller'=>'Policies',
									'action'=>'view',
									'type:1/subtype:1'
// 							  		$user_id
							) ,
							array('escape' => false),
							null
					);
              ?>
              <h1><?php e(languaje($languaje)['landingPageTitleC']);?></h1>
              <p>&nbsp;</p>
<!--               <p><?php e(languaje($languaje)['landingPageBodyC']);?></p> -->
<!--               <p><a class="btn btn-lg btn-primary" href="#" role="button"><?php e(languaje($languaje)['landingPageLinkC']);?></a></p> -->
            </div>
          </div>
        </div>

        <div class="item">
          <img class="fourth-slide img-responsive" src="img/backgrounds/<?php e(imgPaths($portalUrl)['landingImgBg']);?>" alt="Fourth slide">
          <div class="container">
            <div class="carousel-caption">
              <?php
					echo $this->Html->link(
				      $this->Html->image('logotipos/'.imgPaths($portalUrl)['landingImgD'],
							array(
									"alt" => "Ver politicas",
									'class'=>'fourth-slide',
									'title' => 'Ver politicas',
									'width' => '820',
									'style'=>'border-radius: 40px;',
									'height' => '210'
							)
					  ),
							array(
									'controller'=>'Policies',
									'action'=>'view',
// 							  		$user_id
									'type:1/subtype:1'
							) ,
							array('escape' => false),
							null
					);
              ?>
              <h1><?php e(languaje($languaje)['landingPageTitleD']);?></h1>
              <p>&nbsp;</p>
<!--               <p><?php e(languaje($languaje)['landingPageBodyD']);?></p> -->
<!--               <p><a class="btn btn-lg btn-primary" href="#" role="button"><?php e(languaje($languaje)['landingPageLinkD']);?></a></p> -->
            </div>
          </div>
        </div>
      </div>

      <a class="left carousel-control" href="#carouselKml" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carouselKml" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

<span><?php echo $this->element('helpdesk/help');?></span>
