/**
*
* javascript functions
*
* kml : Kamila Software
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Jesus Baizabal
* @link          http://baizabal.xyz
* @mail	         baizabal.jesus@gmail.com
* @package       main
* @subpackage    --
* @since
* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
*/



/**
 * @package name <main functions>
 * @definition checks the level-group of the user
 * @usage isql model connection with mssql
 * @param=>arrayString <array | string>
 * @param=>string <array | string>
 * @param=>$model <name of the model|1stlevet array>
 * @param=>field <name of the table|2nd level array>
 * @param=>unset <bool if you want remove the first pointer>
 * NOTE  array('model'=>array('field','value'));
 */

function p2g_(scrollId){
      var g2p = new GrabToPan({ element: document.getElementById(scrollId) });
      g2p.activate();
}


// set focus inside a scroller
//
// var cursorFocus = function(elem) {
// 	var x, y;
// 	// More sources for scroll x, y offset.
// 	if (typeof(window.pageXOffset) !== 'undefined') {
// 			x = window.pageXOffset;
// 			y = window.pageYOffset;
// 	} else if (typeof(window.scrollX) !== 'undefined') {
// 			x = window.scrollX;
// 			y = window.scrollY;
// 	} else if (document.documentElement && typeof(document.documentElement.scrollLeft) !== 'undefined') {
// 			x = document.documentElement.scrollLeft;
// 			y = document.documentElement.scrollTop;
// 	} else {
// 			x = document.body.scrollLeft;
// 			y = document.body.scrollTop;
// 	}
//
// 	// console.log(x);
// 	// console.log(y);
//   //
// 	// console.log(typeof(x));
// 	// console.log(typeof(y));
//
// 	elem.focus();
//
// 	if (typeof x !== 'undefined') {
// 			// In some cases IE9 does not seem to catch instant scrollTo request.
// 			setTimeout(function() { window.scrollTo(x, y); }, 100);
// 	}
// }
