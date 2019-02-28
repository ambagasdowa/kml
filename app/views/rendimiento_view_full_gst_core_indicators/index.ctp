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
			$evaluate = false;
			$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
		?>




<!-- REPLACE Builder -->


<?php
    /** =============================================  NOTE ALERT ==> start the making     =============================================   */
?>

<style>

	body {
		margin: 40px 10px;
		padding: 0;
/* 		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif; */
/* 		font-size: 14px; */
	}

	#calendar {
		max-width: 800px;
/* 		max-height: 900px; */
		margin: 0 auto;
	}

	/* unvisited link */
	.modded-link:link {
		display:block !important;
		background-color:#999 !important;
		color: #444 !important;
	}


/* 	.btn-success{ */
/* 		display: inline-block; !important; */
/* 		box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125); */
/* 	} */

	/* visited link */
/*	.modded-link:visited {
		color: green;
	}*/

	/* visited link */
	/*.modded-link:visited {
		background-color:#999;
		color: #444;
	}*/

	/* mouse over link */
	.modded-link:hover {
/* 		color: hotpink; */
		 font-weight: bold;
	}

	/* selected link */
	.modded-link:active {
		/*background-color:#999;
		color: #444;*/
	}

	.panel-default {
		background-color: rgba(255, 255, 255, 0.3) !important; /* Color white with alpha 0.9*/
	}


	/*GRID*/

		.grid_current {
				background-color: #b4c973 ;
		}

	/*ninja scroll XD*/

	/* Copyright 2013 Rob Wu <gwnRob@gmail.com>
	 * https://github.com/Rob--W/grab-to-pan.js
	 *
	 * grab.cur and grabbing.cur are taken from Firefox's repository.
	 **/
	/*.grab-to-pan-grab {
	    cursor: url("grab.cur"), move !important;
	    cursor: -webkit-grab !important;
	    cursor: -moz-grab !important;
	    cursor: grab !important;
	}
	.grab-to-pan-grab *:not(input):not(textarea):not(button):not(select):not(:link) {
	    cursor: inherit !important;
	}
	.grab-to-pan-grab:active,
	.grab-to-pan-grabbing {
	    cursor: url("grabbing.cur"), move !important;
	    cursor: -webkit-grabbing !important;
	    cursor: -moz-grabbing !important;
	    cursor: grabbing !important;
	}*/

	.scrollable {

		/*margin-left:1px;
		margin-right:1px;
	  overflow: hidden;
	  width: 99.9%;
	  height: 100%;*/


	/* 	inner box */
	    /*max-width: auto;*/
	    /*max-height: 6%;*/
		/* 	inner box */
	    /*background-color: #EEE;*/
	}
	.filler {

			/*width: 250%;*/

			 /* I don't want to type a huge wall of Lorem ipsum */
	    /*font-size: 34px;*/
	}


/*EXCEL SROLLER*/
/*

.fht-table,
.fht-table thead,
.fht-table tfoot,
.fht-table tbody,
.fht-table tr,
.fht-table th,
.fht-table td {
	margin: 0;
}*/
/*
.fht-table{
	border: 0 none;
	height: auto;
	width: auto;
	border-collapse: collapse;
	border-spacing: 0;*/
	/*table-layout: fixed;  Algoritmo de distribucion fijo */
  /*white-space:nowrap;   Impide los saltos de línea automáticos*/
/*}

.fht-table th,.fht-table td {
    overflow: hidden;
}

.fht-table-wrapper,
.fht-table-wrapper .fht-thead,
.fht-table-wrapper .fht-tfoot,
.fht-table-wrapper .fht-fixed-column .fht-tbody,
.fht-table-wrapper .fht-fixed-body .fht-tbody,
.fht-table-wrapper .fht-tbody {
	overflow: hidden;
	position: relative;
}

.fht-table-wrapper .fht-fixed-body .fht-tbody,
.fht-table-wrapper .fht-tbody {
	overflow: auto;
}

.fht-table-wrapper .fht-table .fht-cell {
	overflow: hidden;
	height: 1px;
}

.fht-table-wrapper .fht-fixed-column,
.fht-table-wrapper .fht-fixed-body {
	top: 0;
	left: 0;
	position: absolute;
}

.fht-table-wrapper .fht-fixed-column {
	z-index: 1;
}

.fht-fixed-body .fht-thead table {
	margin-right: 20px;
	border: 0 none;
}*/

/*For Examples*/

.ContenedorTabla {
	height    : 98%;
  width     : 100%;
	margin    : 0 auto;
	overflow  : auto;
	position  : relative;

	overflow:hidden;
}

/*.fixed-zoom {
  height: 90vh;
  width: 90vh;
}*/

/*.header, .main {
    display: inline-block;
    height: auto;
    width: 100%;
}*/

/*style excel*/
.excel_cell{
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	/*font-size: 13px;*/
	font-weight:  normal;
	/*padding: 4px;*/
	/*white-space: pre-line;*/
	min-width: 90px !important;

}
._xls_cell {
	empty-cells: show;
	padding: 1px 0.5em;
}
._cell_header{
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	font-weight:  normal;
	background-color: #EEE;
}
._cell_Default{
	background-color: #FFF;
	/*text-align: left;*/
}

.firts_column {
	border: 1px solid #CCC;
	color: #222;
	text-align: center;
	font-weight:  normal;
	background-color: #EEE;
	min-width: 325px;
	text-align: left !important;
}
._table {
  display: table                /* <table>     */;
	border-collapse:	collapse									   ;
	width : 100%;
}
._row {
  display: table-row            /* <tr>        */;
	width : 100%;
}
._cell {
  display: table-cell           /* <td>        */;
	/*width: 100%;*/
}

.real {
	width: 50%	;
}
.prep {
	width: 50%	;
}

/*https://stackoverflow.com/questions/34701057/making-table-data-appear-on-hover-javascript-jquery-or-css*/
tr .icon{
  transition:all 0.5s;
  opacity:0;
}

tr .link_external:hover .icon{
  opacity:1;
}


.inner_panel {
  /*background-color: white;*/
  color:#333;
}

.print_thuis:hover {
  border  : collapse;
  display : inline-block;
  color : #eee;
  background-color   : #3398d6;
  cursor  : pointer;
}

/*.break_line {
  padding-bottom: 15px;
  display:block;
}*/

</style>

<?php //NOTE this must come from AppConfig or from this controller at least?>

<?php
    $mod_inx = $mod_inxd = $mod_index;
        $charting = $chart;
?>


<div id="newIngressStructure" class="newIngressStructure"></div>
<!--  Start container -->

	<div class="row-fluid">

	<div id="dashboard_links" class="col-xs-6 col-sm-2 pull-right">

            <ul id="tabbed" class="nav nav-pills nav-stacked">

                <?php foreach ($bsu as $idx_bsu => $bsu_names) {
    ?>
                    <?php $bsu_name = str_replace(' ', '_', $bsu_names); ?>
                    <li role="presentation" <?php $idx_bsu === $ui_bsu_index ? e('class="active"'): ' '; ?> >
                        <a href="<?php echo '#_'.$bsu_name.'_' ?>" id="<?php echo '_'.$bsu_name.'_'.$idx_bsu ?>_tab" data-toggle="tab" data-name="<?php echo "$bsu_name"?>">
                            <i class="fa fa-truck"></i>&nbsp;&nbsp;<?php e($bsu_label[$idx_bsu]); ?>
                        </a>
                    </li>
                <?php
}?>

			</ul>
	</div>


<!--
	