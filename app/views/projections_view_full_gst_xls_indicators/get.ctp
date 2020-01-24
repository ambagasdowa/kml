<?php
		/**
		*
		* PHP versions 4 and 5
		*
		* kml : Kamila Software
		* Licensed under The MIT License
		* Redistributions of files must retain the above copyright notice.
		*
		* @copyright     Jesus Baizabal
		* @link          http://baizabal.xyz
		* @mail	     baizabal.jesus@gmail.com
		* @package       PerformanceReferences
		* @subpackage    Get
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/
?>
		<?php
		    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
		    // $evaluate = false;
		    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
		    // blog
		    $evaluate = true;
		    // $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				// $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/rentabilidad/rentabilidad')) : e($this->element('requiere/norequiere') );
				// var_dump($rendViewFullGstCoreIndicators);exit();

		?>

<style media="screen">
html {
box-sizing: border-box;
font-family: 'Open Sans', sans-serif;
}

*, *:before, *:after {
box-sizing: inherit;
}

.background {
padding: 0 25px 25px;
position: relative;
width: 100%;
}

.background::after {
content: '';
background: #60a9ff;
background: -moz-linear-gradient(top, #60a9ff 0%, #4394f4 100%);
background: -webkit-linear-gradient(top, #60a9ff 0%,#4394f4 100%);
background: linear-gradient(to bottom, #60a9ff 0%,#4394f4 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#60a9ff', endColorstr='#4394f4',GradientType=0 );
height: 350px;
left: 0;
position: absolute;
top: 0;
width: 100%;
z-index: 1;
}

@media (min-width: 900px) {
.background {
	padding: 0 0 25px;
}
}

.container {
margin: 0 auto;
padding: 50px 0 0;
/* max-width: 960px; */
max-width: 96%;
width: 100%;
}

.panel {
background-color: #fff;
border-radius: 10px;
padding: 15px 25px;
position: relative;
width: 100%;
z-index: 10;
}

.pricing-table {
box-shadow: 0px 10px 13px -6px rgba(0, 0, 0, 0.08), 0px 20px 31px 3px rgba(0, 0, 0, 0.09), 0px 8px 20px 7px rgba(0, 0, 0, 0.02);
display: flex;
flex-direction: column;
}

@media (min-width: 900px) {
.pricing-table {
	flex-direction: row;
}
}

.pricing-table * {
/* text-align: center; */
text-transform: uppercase;
}

.pricing-plan {
border-bottom: 1px solid #e1f1ff;
padding: 25px;
}

.pricing-plan:last-child {
border-bottom: none;
}

@media (min-width: 900px) {
.pricing-plan {
	border-bottom: none;
	border-right: 1px solid #e1f1ff;
	flex-basis: 100%;
	padding: 25px 50px;
}

.pricing-plan:last-child {
	border-right: none;
}
}

.pricing-img {
margin-bottom: 25px;
max-width: 100%;
}

.pricing-header {
color: #888;
font-weight: 600;
letter-spacing: 1px;
}

.pricing-features {
color: #016FF9;
font-weight: 600;
letter-spacing: 1px;
margin: 50px 0 25px;
}

.pricing-features-item {
border-top: 1px solid #e1f1ff;
font-size: 12px;
line-height: 1.5;
padding: 15px 0;
}

.pricing-features-item:last-child {
border-bottom: 1px solid #e1f1ff;
}

.pricing-price {
color: #016FF9;
display: inline-block;
font-size: 16px;
font-weight: 700;
}

.pricing-button {
border: 1px solid #9dd1ff;
border-radius: 10px;
color: #348EFE;
display: inline-block;
margin: 25px 0;
padding: 15px 35px;
text-decoration: none;
transition: all 150ms ease-in-out;
}

.pricing-button:hover,
.pricing-button:focus {
background-color: #e1f1ff;
}

.pricing-button.is-featured {
background-color: #48aaff;
color: #fff;
}

.pricing-button.is-featured:hover,
.pricing-button.is-featured:active {
background-color: #269aff;
}
</style>
<div style="display:none;">
		<div id="json_one">
			<?php print($json_parsing_level_one) ?>
		</div>
		<div id="json_two">
			<?php print($json_parsing_level_two) ?>
		</div>
</div>

	<div class="row head_datetime">
		<div>&nbsp;</div>

			<div class="six columns"></div>

			<div class="one columns dash_datetime">
				Periodo
			</div>
			<div class="one columns dash_datetime">
				del
			</div>
			<div id="date-ini" class="one columns dash_datetime">
				<?php echo $dashboard['inicio'] ?>
			</div>
			<div class="one columns dash_datetime">
				al
			</div>
			<div id="date-end" class="one columns dash_datetime">
				<?php echo $dashboard['fin'] ?>
			</div>

			<div class="one columns dash_datetime pull-right">
				Unidad de Negocio <?php echo $dashboard['bsu'] ?>
			</div>

		<div>&nbsp;</div>

	</div>



	<div class="row noprint">
		<?php	echo $this->Session->flash();?>
	</div>

	<div class="row noprint">

		<div class="two colums">

		</div>

		<div class="ten colums">
			<!-- <input type="text" id="kwd_search" value="" placeholder="Buscar"/> -->

			<!-- <a id="details" class="button button-primary" href="#">Totales</a>

			<a id="charting" class="button button-primary" href="#">Graficas</a>

			<a id="upd_checkboxes" class="button button-primary" href="#">Guardar</a> -->

			<!-- <div id="print" class="pull-right"> -->
				<!-- <i class="fa fa-print" aria-hidden="true"></i> -->
			<!-- </div> -->
		</div>

	</div>
<!--
	<div class="row">
 	 <div class="twelve columns">
 		 <div id="chart" class="chart" >
 					 <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">

 					 </div>
 		 </div>
 	 </div>
  </div> -->

<div class="con">
<div id="cont" style="height: 10px; margin: 0 auto"></div>
</div>


<div class="row">

 </div>



<div class="background">
  <div class="container">
    <div class="panel pricing-table">

      <div class="pricing-plan">
        <!-- <img src="https://s22.postimg.cc/8mv5gn7w1/paper-plane.png" alt="" class="pricing-img"> -->
        <h2 class="pricing-header">Real</h2>
				<div class="">
					Despachado
				</div>
        <ul class="pricing-features">
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['despachado']['peso'] ?></span></li>

          <li class="pricing-features-item">Kms <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['despachado']['kms'] ?></span></li>
          <li class="pricing-features-item">Viajes  <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['despachado']['viajes'] ?></span></li>
          <li class="pricing-features-item">Ingresos <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['despachado']['subtotal'] ?></span></li>
        </ul>
				<div class="">
					Tendencias
				</div>
				<ul class="pricing-features">
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['peso']/$projectionsViewFullGstXlsIndicators['despachado']['labDays'])*$projectionsViewFullGstXlsIndicators['despachado']['labFullDays'] ?></span></li>

          <li class="pricing-features-item">Kms <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['kms']/$projectionsViewFullGstXlsIndicators['despachado']['labDays'])*$projectionsViewFullGstXlsIndicators['despachado']['labFullDays'] ?></span></li>
          <li class="pricing-features-item">Viajes  <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['viajes']/$projectionsViewFullGstXlsIndicators['despachado']['labDays'])*$projectionsViewFullGstXlsIndicators['despachado']['labFullDays'] ?></span></li>
          <li class="pricing-features-item">Ingresos <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['subtotal']/$projectionsViewFullGstXlsIndicators['despachado']['labDays'])*$projectionsViewFullGstXlsIndicators['despachado']['labFullDays'] ?></span></li>
        </ul>

				<div class="">
					Aceptado
				</div>
        <ul class="pricing-features">
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['aceptado']['peso'] ?></span></li>

          <li class="pricing-features-item">Kms <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['aceptado']['kms'] ?></span></li>
          <li class="pricing-features-item">Viajes  <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['aceptado']['viajes'] ?></span></li>
          <li class="pricing-features-item">Ingresos <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['aceptado']['subtotal'] ?></span></li>
        </ul>
        <!-- <a href="#/" class="pricing-button">Sign up</a> -->
      </div>

      <div class="pricing-plan">
        <!-- <img src="https://s28.postimg.cc/ju5bnc3x9/plane.png" alt="" class="pricing-img"> -->
        <h2 class="pricing-header">Presupuesto</h2>
				<div class="">
					Dias Transcurridos&nbsp;<?php echo $projectionsViewFullGstXlsIndicators['aceptado']['labDays'] ?>
				</div>
				<ul class="pricing-features">
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo $h = ($projectionsViewFullGstXlsIndicators['despachado']['PresupuestoTon'] /$projectionsViewFullGstXlsIndicators['despachado']['labDays'])*$projectionsViewFullGstXlsIndicators['despachado']['labFullDays'] ?></span></li>

          <li class="pricing-features-item">Kms <span class="pricing-price"><?php echo $i = ($projectionsViewFullGstXlsIndicators['despachado']['PresupuestoKms']/$projectionsViewFullGstXlsIndicators['despachado']['labDays'])*$projectionsViewFullGstXlsIndicators['despachado']['labFullDays'] ?></span></li>
          <li class="pricing-features-item">Viajes  <span class="pricing-price"><?php echo $j = ($projectionsViewFullGstXlsIndicators['despachado']['PresupuestoViajes']/$projectionsViewFullGstXlsIndicators['despachado']['labDays'])*$projectionsViewFullGstXlsIndicators['despachado']['labFullDays'] ?></span></li>
          <li class="pricing-features-item">Ingresos <span class="pricing-price"><?php echo $k = ($projectionsViewFullGstXlsIndicators['despachado']['PresupuestoIngresos']/$projectionsViewFullGstXlsIndicators['despachado']['labDays'])*$projectionsViewFullGstXlsIndicators['despachado']['labFullDays'] ?></span></li>
        </ul>


				<div class="">
					&nbsp;
				</div>
				<ul class="pricing-features">
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoTon']?></span></li>

          <li class="pricing-features-item">Kms <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoKms']?></span></li>
          <li class="pricing-features-item">Viajes  <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoViajes']?></span></li>
          <li class="pricing-features-item">Ingresos <span class="pricing-price"><?php echo $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoIngresos']?></span></li>
        </ul>
        <!-- <span class="pricing-price">$150</span> -->
        <!-- <a href="#/" class="pricing-button is-featured">Free trial</a> -->
      </div>

      <div class="pricing-plan">
        <!-- <img src="https://s21.postimg.cc/tpm0cge4n/space-ship.png" alt="" class="pricing-img"> -->
        <h2 class="pricing-header">Desviacion</h2>
				<div class="">
					Dias del Mes&nbsp;<?php echo $projectionsViewFullGstXlsIndicators['aceptado']['labFullDays'] ?>
				</div>
				<ul class="pricing-features">
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['peso'] - $h) ?></span> <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['peso'] - $h)/$projectionsViewFullGstXlsIndicators['despachado']['PresupuestoTon'] ?></span></li>
          <li class="pricing-features-item">Kilometros <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['kms'] - $h) ?></span> <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['kms'] - $h)/$projectionsViewFullGstXlsIndicators['despachado']['PresupuestoKms'] ?></span></li>
          <li class="pricing-features-item">Viajes <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['viajes'] - $h) ?></span> <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['viajes'] - $h)/$projectionsViewFullGstXlsIndicators['despachado']['PresupuestoViajes'] ?></span></li>
          <li class="pricing-features-item">Ingresos <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['subtotal'] - $h) ?></span> <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['subtotal'] - $h)/$projectionsViewFullGstXlsIndicators['despachado']['PresupuestoIngresos'] ?></span></li>

        </ul>
        <!-- <span class="pricing-price">$400</span> -->
        <!-- <a href="#/" class="pricing-button">Free trial</a> -->
				<div class="">
					&nbsp;
				</div>
				<ul class="pricing-features">
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['peso'] - $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoTon']) ?></span>&nbsp;<span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['peso'] - $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoTon']) /$projectionsViewFullGstXlsIndicators['despachado']['PresupuestoTon'] ?></span>
					</li>
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['kms'] - $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoKms']) ?></span>&nbsp;<span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['kms'] - $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoKms']) /$projectionsViewFullGstXlsIndicators['despachado']['PresupuestoKms'] ?></span>
					</li>
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['viajes'] - $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoViajes']) ?></span>&nbsp;<span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['viajes'] - $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoViajes']) /$projectionsViewFullGstXlsIndicators['despachado']['PresupuestoViajes'] ?></span>
					</li>
          <li class="pricing-features-item">Toneladas <span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['subtotal'] - $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoIngresos']) ?></span>&nbsp;<span class="pricing-price"><?php echo ($projectionsViewFullGstXlsIndicators['despachado']['subtotal'] - $projectionsViewFullGstXlsIndicators['despachado']['PresupuestoIngresos']) /$projectionsViewFullGstXlsIndicators['despachado']['PresupuestoIngresos'] ?></span>
					</li>

        </ul>
      </div>

    </div>
  </div>
</div>
