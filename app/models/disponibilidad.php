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
class Disponibilidad extends AppModel {
	var $name = 'Disponibilidad';
	var $useDbConfig = 'mssql_sistemas';
  var $useTable = 'disponibilidad_main_view_rpt_group_clasifications_indicators';

	var $virtualFields = array(
		     'Disponible' => 'sum(Disponibilidad.Disponible)'		
		    ,'Operando' => 'sum(Disponibilidad.Operando)'		
		    ,'Taller' => 'sum(Disponibilidad.Taller)'		
		    ,'Gestoria' => 'sum(Disponibilidad.Gestoria)'		
		    ,'Siniestrado' => 'sum(Disponibilidad.Siniestrado)'		
		    ,'Robo' => 'sum(Disponibilidad.Robo)'		
		    ,'Exhibicion' => 'sum(Disponibilidad.Exhibicion)'		
				,'Venta' => 'sum(Disponibilidad.Venta)'
		    ,'TotalDisponibilidad' => 'sum(Disponibilidad.TotalDisponibilidad)'		
		    ,'TotalFlota' => 'sum(Disponibilidad.TotalFlota)'		
		    ,'DisponibilidadFlota' => 'sum(Disponibilidad.DisponibilidadFlota)'		
		    ,'FlotaOperando' => 'sum(Disponibilidad.FlotaOperando)'		
		    ,'Disp_S_Viaje' => 'sum(Disponibilidad.Disp_S_Viaje)'		
		    ,'Op_FlotaGestoria_Siniestro' => 'sum(Disponibilidad.Op_FlotaGestoria_Siniestro)'		
				,'FlotaMtto' => 'sum(Disponibilidad.FlotaMtto)'
/*				
		    ,'' => 'sum(Disponibilidad.)'		
		    ,'' => 'sum(Disponibilidad.)'		
		    ,'' => 'sum(Disponibilidad.)'		
		    ,'' => 'sum(Disponibilidad.)'		
		    ,'' => 'sum(Disponibilidad.)'		
		    ,'' => 'sum(Disponibilidad.)'		
				,'' => 'sum(Disponibilidad.)'		
 */
	);








} // NOTE End Class
