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


// debug($addenum);
// exit();
    // $xml = new SimpleXMLElement($addenum);
      header ("Expires: " . gmdate("D,d M YH:i:s") . " GMT");
      header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
      header ("Cache-Control: no-cache, must-revalidate");
      header ("Pragma: no-cache");
      // header ("Content-type: application/vnd.ms-excel");
      header('Content-type: "text/xml"; charset="utf8"');
      header ("Content-Disposition: attachment; filename=xml_addenda_".$name.".xml" );
      header ("Content-Description: Exported as xml" );
      // header('Content-disposition: attachment; filename="example.xml"');
      // echo $xml->asXML();

      // print "<pre><textarea style=\"width:1600px;height:1600px;\">";
      			echo $xml->asXML();
      // print "</textarea></pre>";

 ?>
