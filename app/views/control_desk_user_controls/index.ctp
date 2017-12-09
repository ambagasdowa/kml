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
		* @package       cake
		* @subpackage    cake.cake.console.libs.templates.views
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
		    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );

		?>



<div class="container">

	<ul>
		<li><a id="browse_server" href="#" data-user="<?php echo $username?>"><i class="fa fa-database" aria-hidden="true"></i> &nbsp; Vendor Call</a></li>
	</ul>
</div>

		<script type="text/javascript">
    // <!&#91;CDATA&#91;
        $(document).ready(function (){

					// $("#browse_server").colorbox({iframe:true, innerWidth:"80%", innerHeight:"80%" });
					// $("#browse_server").on('click',function(event){
					// 	event.stopPropagation();
					// 	event.preventDefault();
					// 	var data_code = 1;
					// 	var rulr = "<?php //echo 'http://'.$_SERVER['HTTP_HOST'].DS.Dispatcher::baseUrl().DS.'app/webroot/vendors/RichFilemanager?exclusiveFolder='.$username; ?>"
					//
					// 	console.log($(this).attr('data-user'));
					// 		$.colorbox({
					// 			iframe:true,
					// 			href:rulr,
					// 			innerWidth:"90%",
					// 			innerHeight:"90%",
					// 			'scrolling' : false,
					// 			'trapFocus' :	true
					// 		});
					// });
				});
		// &#93;&#93;>
		</script>
