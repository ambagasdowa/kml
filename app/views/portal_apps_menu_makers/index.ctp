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
		// SecureCalendar index
			// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
//			$evaluate = false;
//      $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );

		// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
		// $evaluate = false;
		// $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
		// blog
		$evaluate = true;
		// $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
		// $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
		$requiere = $evaluate ? e($this->element('kml/mk_menu_makers/mk_menu')) : e($this->element('requiere/norequiere') );

?>

<!--
<div class="container-mod">
</div>
-->

<!--
<ul id="sortableListsBase" style="position: absolute; top: 0px; left: 0px; margin: 0px; padding: 0px; z-index: 2500;" class="pl-0"></ul>

        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="https://www.linkedin.com/in/david-ticona-saravia/" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
            </li>
        </ul>
        <a class="btn btn-success my-2 my-sm-0" href="https://github.com/davicotico/jQuery-Menu-Editor" target="_blank"><i class="fab fa-github"></i> View on Github</a>
        </div>
        </nav>

        <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading" style="padding-top: 50px;">jQuery Menu Editor 1.1.0</h1>
          <h4>by Davicotico</h4>
          <p class="lead text-muted">Lightweight and Powerful Menu Editor.</p>
          <p>
            </p><div class="btn-group buttons-menu-container">
                <a class="btn btn-light border-secondary" href="https://github.com/davicotico/jQuery-Menu-Editor/stargazers" target="_blank" role="button"><i class="fas fa-star"></i> Github Stars</a>
                <a id="btnStars" class="btn bg-white border border-secondary" href="https://github.com/davicotico/jQuery-Menu-Editor/stargazers" target="_blank" role="button">140</a>
            </div>

            <div class="btn-group buttons-menu-container">
                <a class="btn btn-light border-secondary" href="https://github.com/davicotico/jQuery-Menu-Editor/fork" target="_blank" role="button">
                    <i class="fas fa-code-branch"></i> Forks
                </a>
                <a id="btnForks" class="btn bg-white border-secondary" href="https://github.com/davicotico/jQuery-Menu-Editor/network/members" target="_blank" role="button">68</a>
            </div>:
            <a class="btn btn-success my-2 my-sm-0" href="https://github.com/davicotico/jQuery-Menu-Editor" target="_blank"><i class="fab fa-github"></i> View on Github</a>
          <p></p>
        </div>
        </section>
-->



        <div class="container">
            <div class="row">
                <div class="col-md-12"><h2>GST Menu Editor</h2>
        <!--        <p>Click the Load Button to execute the method <code>setData(Array data)</code></p>   -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header"><h5 class="float-left">Menu</h5>
                            <div class="float-right">
          <!--                      <button id="btnReload" type="button" class="btn btn-outline-secondary">
                                    <i class="fa fa-play"></i> Load Data</button> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <ul id="myEditor" class="sortableLists list-group">
                            </ul>
                        </div>
                    </div>
<!--                    <p>Click the Output button to execute the function <code>getString();</code></p> -->
                    <div class="card">
                    <div class="card-header"> <!-- Guardar Menu -->
                    <div class="float-right">
                    <button id="btnOutput" type="button" class="btn btn-success"><i class="fas fa-check-square"></i> Guardar</button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group"> <!--<textarea id="out" class="form-control" cols="50" rows="10"></textarea>-->
                    </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-primary mb-3">
<!--                        <div class="card-header bg-primary text-white">Edit item</div>   -->
                        <div class="card-body">
                            <form id="frmEdit" class="form-horizontal">
                                <div class="form-group">
                                    <label for="text">Texto</label>
                                    <div class="input-group left" >
                                        <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                                    <label>Imagen</label>
                                        <div class="input-group-append">
                                            <button type="button" id="myEditor_icon" class="btn btn-outline-secondary iconpicker dropdown-toggle"><i class="empty"></i><input type="hidden" value="empty"><span class="caret"></span></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="icon" class="item-menu">
                                </div>
                                <div class="form-group">
                                    <label for="href">URL</label>
                                   <!-- <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL"> -->
<?php

    echo 
                $this->Form->input(
                                    'href',
                                    array(
                                         'type'=>'select'
                                         ,'class'=>'search_udn u-full-width form-controli item-menu'
                                         ,'placeholder'=> 'Url'
                                         ,'id'=>'href'
                                         ,'name'=>'href'
                                         ,'div'=>FALSE
                                         ,'label'=>FALSE
                                         ,'empty'=>'Selecionar Documento'
                                         ,'options'=>$docs
                                         ,'tabindex'=>'5'
                                    )
                );

?>

                                </div>
                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <select name="target" id="target" class="form-control item-menu search_udn">
                                        <option value="_self">Self</option>
                                        <option value="_blank">Blank</option>
                                        <option value="_top">Top</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Tooltip</label>
                                    <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="btnUpdate" class="btn btn-primary" disabled="disabled"><i class="fas fa-sync-alt"></i> Actualizar</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Agregar</button>
                        </div>
                    </div>
<!--
                    <h2>More Projects</h2>
                    <ul>
                        <li><a href="https://github.com/davicotico/jQuery-Menu-From-JSON" target="_blank">jQuery Menu from JSON</a></li>
                        <li><a href="https://github.com/davicotico/PHP-Quick-Menu" target="_blank">PHP Quick Menu</a></li>
                        <li><a href="https://github.com/davicotico/jQuery-formHelper" target="_blank">jQuery formHelper</a></li>
                    </ul>
-->
                </div>
            </div>





<!--
            <div class="row mt-3">
                <div class="col-md-12 ">
                    <h3>Changelog</h3>
                    <h5>v1.1.0</h5>
                    <ul>
                        <li>Added maximum level(maxLevel) option</li>
                    </ul>
                    <h5>v1.0.1</h5>
                    <ul>
                        <li>Fix an issue for mobile devices: Opener button on submenus.</li>
                    </ul>
                    <h5>v1.0.0</h5>
                    <ul>
                        <li>Update to Bootstrap 4.1.x</li>
                        <li>Update to SortableLists 1.4.0</li>
                        <li>Update to Bootstrap-Iconpicker 1.10.0</li>
                        <li>Default iconset: Font Awesome 5.3.1</li> 
                        <li>Support Mobile devices</li>
                        <li>The plugin SortableLists was adapted</li>
                    </ulg
                    <h5>v0.9.0</h5>
                    <ul>
                        <li>First release</li> 
                    </ul>
                </div>
            </div>
            <hr>
            <footer class="bg-light border" style="padding: 2rem;">
                <p>2020 David Ticona Saravia at <a href="https://twitter.com/davicodev" target="_blank"><i class="fab fa-twitter"></i> @davicodev</a></p>
            </footer>
				</div>
-->


<!--
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><span class="cleanslate TridactylStatusIndicator  TridactylModenormal">normal</span>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="jquery-menu-editor.min.js"></script>
				<script type="text/javascript" src="bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js"></script>
-->

        <script>
            jQuery(document).ready(function () {
                /* =============== DEMO =============== */
                // menu items
//console.log(window.location.hostname);
//console.log(window.location.pathname);
//console.log(window.location.href);
//str = window.location.href;
//              
//            alert('hey');      
//            console.log( str.substr(0,str.lastIndexOf('/'))  );
//            alert( window.location.href.substr(0,window.location.href.lastIndexOf('/')) );


//          alert(  str.slice(0,-21) )


                // NOTE Initialize the select menu 

                $(".search_udn").select2();

                var arrayjson = <?php echo $json_menu ?>

                // icon picker optionsi
                var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
                // sortable list options
                var sortableListOptions = {
                    placeholderCss: {'background-color': "#cccccc"}
                };

                var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
                editor.setForm($('#frmEdit'));
                editor.setUpdateButton($('#btnUpdate'));

//                $('#btnReload').on('click', function () {
//                NOTE set the current menu
                    editor.setData(arrayjson);
//                });

                $('#btnOutput').on('click', function (event) {
                    event.stopPropagation();
                    event.preventDefault();
                console.log('push the red button');
                    var str = editor.getString();
                    // NOTE pull str data[href]
 //                   $("#out").text(str);
                    alert(text(str));
                    encode_str = base64_encode(str); 
//                    alert(encode_str);
                    $.post("<?php echo Dispatcher::baseUrl();?>/PortalAppsMenuMakers/add/data:" + encode_str + "/",function(data){
  //                      alert(encode_str);
                    }).done(function(data){
                        location.reload(); 
                       // alert('Su Menu ha sido Guardado correctamente');
                    });
                });

                $("#btnUpdate").click(function(){
                    editor.update();

                });

                $('#btnAdd').click(function(){
                    editor.add();
                });
                /* ====================================== */

                /** PAGE ELEMENTS **/
/*                $('[data-toggle="tooltip"]').tooltip();
                $.getJSON( "https://api.github.com/repos/davicotico/jQuery-Menu-Editor", function( data ) {
                    $('#btnStars').html(data.stargazers_count);
                    $('#btnForks').html(data.forks_count);
                });
*/
						});

				</script>
<!--
<script type="text/javascript" src="bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
 -->       
    


