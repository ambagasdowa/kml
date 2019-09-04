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

      $dom = new DOMDocument('1.0');
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;    //can be false
      $dom->loadXML($xml->asXML());
      $xport = $dom->saveXML();

      // $xport = $xml->asXML();
      $xport = str_replace("\x0A",'',$xport); // and can omit

      header("Content-Transfer-Encoding: binary");
      header("Expires: " . gmdate("D,d M YH:i:s") . " GMT");
      header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
      header("Cache-Control: no-cache, must-revalidate");
      header("Pragma: no-cache");
      header("Content-type: text/xml; charset=utf-8");
      header("Content-Disposition: attachment; filename=xml_addenda_".$name.".xml" );
      header('Content-Description: Exported as xml');
      echo $xport;




 ?>
