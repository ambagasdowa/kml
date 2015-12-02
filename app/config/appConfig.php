<?php
	/**
	 * @package name <removeString> this must change
	 * @congif extract areas from lis-db
	 * @extract areas,flotas and tipo de Operacion
	 * @use isql model connection with mssql
	 * @param=>arrayString <array | string>
	 * @param=>string <array | string>
	 * @param=>$model <name of the model|1stlevet array>
	 * @param=>field <name of the table|2nd level array>
	 * @param=>unset <bool if you want remove the first pointer>
	 * NOTE  array('model'=>array('field','value'));
	 */

	/**
	 * @package name <setNameDefinitions> set languaje of the app
	 * @use edit as you need
	 * 
	 */
	// some title in root modal alert 
		
		function languaje($langChart=null) {
			$lang = array('en','es','jp','ru','it','fr');//examples
				// set the default Languaje
				if(empty($langChart) OR !isset($langChart)){
					$langChart = 'en';
				}
				if($langChart === 'es') {
					$languaje = array (
									'landingPage'=>'Inicio',
									'landingPageTitleA'=>'Grupo Servicios de Transporte',
									'landingPageBodyA'=>'Politicas',
									'landingPageLinkA'=>'Mas ...',
									'landingPageTitleB'=>'Transportes Bonampak',
									'landingPageBodyB'=>'Politicas',
									'landingPageLinkB'=>'Mas ...',
									'landingPageTitleC'=>'Transportadora Especializada Industrial',
									'landingPageBodyC'=>'Politicas',
									'landingPageLinkC'=>'Mas ...',
									'landingPageTitleD'=>'Autotransporte Macuspana',
									'landingPageBodyD'=>'Politicas',
									'landingPageLinkD'=>'Mas ...',
									'welcomeMsg' => array('M'=>'Bienvenido'."\x20",'F'=>'Bienvenida'."\x20",'R'=>'Hola Sr Robot'."\x20"), // hex=42 69 65 6e 76 65 6e 69 64 6f //01000010 01101001 01100101 01101110 01110110 01100101 01101110 01101001 01100100 01101111
									'guestWelcomeMsg'=>'Hola'."\x20",
									'guestUser' => 'Invitado',
									'appName'=>'Portal GST',
									'rootModalTitle' => 'Titulo',
									'rootModalMessage' => 'Mensaje',
									'rootModalButton' => 'Cerrar',
									'loginTitle' => 'Inicio de Sesi&oacute;n',
									'loginUser'=> 'Numero de Trabajador',
									'loginPassword'=>'Contraseña',
									'loginButton'=>'Ingresar',
									'navMenuA'=>'Usuarios',
									'navMenuB'=>'Grupos',
									'navMenuC'=>'Politicas',
									'navMenuD'=>'Descargas',
									'navMenuE'=>'Salir',
									'navMenuF'=>'Anexos de las Politicas',
									'navMenuG'=>'Manuales'
					);

				} else if($langChart === 'en') {
					$languaje = array (
									'landingPage'=>'Home',
									'landingPageTitleA'=>'IT Department',
									'landingPageBodyA'=>'Policies',
									'landingPageLinkA'=>'More ...',
									'landingPageTitleB'=>'R.R.H.H',
									'landingPageBodyB'=>'Policies',
									'landingPageLinkB'=>'More ...',
									'landingPageTitleC'=>'Finance',
									'landingPageBodyC'=>'Policies',
									'landingPageLinkC'=>'More ...',
									'landingPageTitleD'=>'Logistic',
									'landingPageBodyD'=>'Policies',
									'landingPageLinkD'=>'More ...',
									'welcomeMsg' => array('M'=>'Welcome'."\x20",'F'=>'Welcome'."\x20",'R'=>'Hello Mr Roboto'."\x20"),
									'guestWelcomeMsg'=>'Hello'."\x20",
									'guestUser' => 'Guest',
									'appName'=>'Home',
									'rootModalTitle' => 'Title',
									'rootModalMessage' => 'Message',
									'rootModalButton' => 'Close',
									'loginTitle' => 'Sig in',
									'loginUser' => 'Username or e-mail',
									'loginPassword' => 'Password',
									'loginButton'=>'Login',
									'navMenuA'=>'Users',
									'navMenuB'=>'Groups',
									'navMenuC'=>'Policies',
									'navMenuD'=>'Downloads',
									'navMenuE'=>'Logout',
									'navMenuF'=>'PoliciesAnexos',
									'navMenuG'=>'Manuals'
						);
				}
			
			return $languaje;
		}
	/**
	 * @package name <removeString> this must change
	 * @congif extract areas from lis-db
	 * @extract areas,flotas and tipo de Operacion
	 * @use isql model connection with mssql
	 * @param=>arrayString <array | string>
	 * @param=>string <array | string>
	 * @param=>$model <name of the model|1stlevet array>
	 * @param=>field <name of the table|2nd level array>
	 * @param=>unset <bool if you want remove the first pointer>
	 * NOTE  array('model'=>array('field','value'));
	 */
	
	function imgPaths($appName=null) {
		$apps = array('gst','kml','portal','radiobases');//examples
		if ($appName === 'gst') {
			$imgPaths = array(
								'landingImgBg'=> $appName.DS.'bg.png',
								'landingImgA' => $appName.DS.'gst.png',
								'landingImgB' => $appName.DS.'tbk.png',
								'landingImgC' => $appName.DS.'tei.png',
								'landingImgD' => $appName.DS.'atm.png',
								'landingHeaderIcon' => $appName.DS.'backup'.DS.'gst.png'
			);
		} else if ($appName === 'portal') {
			$imgPaths = array(
								'landingImgBg'=> $appName.DS.'bg.jpg',
								'landingImgA' => $appName.DS.'cool-wood.jpg',
								'landingImgB' => $appName.DS.'dice-black.jpg',
								'landingImgC' => $appName.DS.'black-&-red.jpg',
								'landingImgD' => $appName.DS.'background_div_2.png',
								'landingHeaderIcon' => $appName.DS.'backup'.DS.'gst.png'
			);
		}
		return $imgPaths;
	}
	/**
	 * @package name <checkAdmin>
	 * @definition checks the level-group of the user 
	 * @usage isql model connection with mssql
	 * @param=>arrayString <array | string>
	 * @param=>string <array | string>
	 * @param=>$model <name of the model|1stlevet array>
	 * @param=>field <name of the table|2nd level array>
	 * @param=>unset <bool if you want remove the first pointer>
	 * NOTE  array('model'=>array('field','value'));
	 */
	function checkAdmin ($id_group=null) {
		
		  if($id_group === '1' OR $id_group === '7' ) {
			return true;
		} else {
			return false;
		}
	}
	


	/**
	 * @package name <checkUser>
	 * @definition checks the level-group of the user 
	 * @usage isql model connection with mssql
	 * @param=>arrayString <array | string>
	 * @param=>string <array | string>
	 * @param=>$model <name of the model|1stlevet array>
	 * @param=>field <name of the table|2nd level array>
	 * @param=>unset <bool if you want remove the first pointer>
	 * NOTE  array('model'=>array('field','value'));
	 */
	function checkUser ($id_group=null,$group=null) {
		
		if ( ((int)$id_group === 6 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'Casetas') {
			return true;
		} else if (( (int)$id_group === 5 OR (int)$id_group === 1  OR (int)$id_group === 7) and $group === 'PoliciesAnexos') {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * @package name <checkSuperUser>
	 * @definition checks the level-group of the user 
	 * @usage isql model connection with mssql
	 * @param=>arrayString <array | string>
	 * @param=>string <array | string>
	 * @param=>$model <name of the model|1stlevet array>
	 * @param=>field <name of the table|2nd level array>
	 * @param=>unset <bool if you want remove the first pointer>
	 * NOTE  array('model'=>array('field','value'));
	 */
	function checkSuperUser ($id_group=null,$number_id=null,$superUser=null) {
		
		$root=array('9000000','9000002','4000003');
// 		var_dump(in_array($number_id,$root));
// 		var_dump((int)$id_group);
// 		var_dump((bool)$superUser);
		  if(((int)$id_group === 1 OR (int)$id_group === 7) and (bool)$superUser === true  and in_array($number_id,$root) === true ) {
			return true;
		} else {
			return false;
		}
	}
	
	 /**
	 * @package name <checkBrowser> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | set the string of "HTTP_USER_AGENT" >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */
		
	function checkBrowser($userAgent=null,$userAgentHaystack=null,$crop=null){
		
		if($userAgentHaystack === true){
			$userAgentHaystack = array('Firefox','Trident','konqueror','Presto','Chrome','Apple','Webkit','w3m');
		}else{
			$userAgentHaystack = array('Firefox','Trident','konqueror');
		}
// 		var_dump($_SERVER['HTTP_USER_AGENT']);
// 	  $browser = null;
		foreach($userAgentHaystack as $idx => $stack){
		  $agentFound = strpos($userAgent, $stack);
		  if(strpos($userAgent, $stack) !== false){

			if (!empty($crop)) {
				return $stack;
				break;
			}else {
				return true;
				break;
			}

		  }
		}
		
		return false;
	}//End of checkBrowser
	
	 /**
	 * @package name <htmlMotor> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | set the string of "HTTP_USER_AGENT" >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */
		
	function htmlMotor () {
		$htmlMotor = array(
							'fa fa-chrome'=>'Chrome',
							'fa fa-firefox'=>'Firefox',
							'fa fa-internet-explorer'=>'Trident',
							'fa fa-opera'=>'Presto',
							'fa fa-terminal'=>'w3m',
							'fa fa-safari'=>'Safari'
		);
		return $htmlMotor;
	}
	
	/**
	* Replace language-specific characters by ASCII-equivalents.
	* @param string $s
	* @return string
	*/
	function normalizeChars($string) {
		$replace = array(
			'ъ'=>'-', 'Ь'=>'-', 'Ъ'=>'-', 'ь'=>'-',
			'Ă'=>'A', 'Ą'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'A', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'Ae',
			'Þ'=>'B',
			'Ć'=>'C', 'ץ'=>'C', 'Ç'=>'C',
			'È'=>'E', 'Ę'=>'E', 'É'=>'E', 'Ë'=>'E', 'Ê'=>'E',
			'Ğ'=>'G',
			'İ'=>'I', 'Ï'=>'I', 'Î'=>'I', 'Í'=>'I', 'Ì'=>'I',
			'Ł'=>'L',
			'Ñ'=>'N', 'Ń'=>'N',
			'Ø'=>'O', 'Ó'=>'O', 'Ò'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'Oe',
			'Ş'=>'S', 'Ś'=>'S', 'Ș'=>'S', 'Š'=>'S',
			'Ț'=>'T',
			'Ù'=>'U', 'Û'=>'U', 'Ú'=>'U', 'Ü'=>'Ue',
			'Ý'=>'Y',
			'Ź'=>'Z', 'Ž'=>'Z', 'Ż'=>'Z',
			'â'=>'a', 'ǎ'=>'a', 'ą'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'a', 'а'=>'a', 'А'=>'a', 'å'=>'a', 'à'=>'a', 'א'=>'a', 'Ǻ'=>'a', 'Ā'=>'a', 'ǻ'=>'a', 'ā'=>'a', 'ä'=>'ae', 'æ'=>'ae', 'Ǽ'=>'ae', 'ǽ'=>'ae',
			'б'=>'b', 'ב'=>'b', 'Б'=>'b', 'þ'=>'b',
			'ĉ'=>'c', 'Ĉ'=>'c', 'Ċ'=>'c', 'ć'=>'c', 'ç'=>'c', 'ц'=>'c', 'צ'=>'c', 'ċ'=>'c', 'Ц'=>'c', 'Č'=>'c', 'č'=>'c', 'Ч'=>'ch', 'ч'=>'ch',
			'ד'=>'d', 'ď'=>'d', 'Đ'=>'d', 'Ď'=>'d', 'đ'=>'d', 'д'=>'d', 'Д'=>'d', 'ð'=>'d',
			'є'=>'e', 'ע'=>'e', 'е'=>'e', 'Е'=>'e', 'Ə'=>'e', 'ę'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'e', 'Ė'=>'e', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'e', 'Є'=>'e', 'Ĕ'=>'e', 'ê'=>'e', 'ə'=>'e', 'è'=>'e', 'ë'=>'e', 'é'=>'e',
			'ф'=>'f', 'ƒ'=>'f', 'Ф'=>'f',
			'ġ'=>'g', 'Ģ'=>'g', 'Ġ'=>'g', 'Ĝ'=>'g', 'Г'=>'g', 'г'=>'g', 'ĝ'=>'g', 'ğ'=>'g', 'ג'=>'g', 'Ґ'=>'g', 'ґ'=>'g', 'ģ'=>'g',
			'ח'=>'h', 'ħ'=>'h', 'Х'=>'h', 'Ħ'=>'h', 'Ĥ'=>'h', 'ĥ'=>'h', 'х'=>'h', 'ה'=>'h',
			'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'į'=>'i', 'ĭ'=>'i', 'ı'=>'i', 'Ĭ'=>'i', 'И'=>'i', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'i', 'Ǐ'=>'i', 'и'=>'i', 'Į'=>'i', 'י'=>'i', 'Ї'=>'i', 'Ī'=>'i', 'І'=>'i', 'ї'=>'i', 'і'=>'i', 'ī'=>'i', 'ĳ'=>'ij', 'Ĳ'=>'ij',
			'й'=>'j', 'Й'=>'j', 'Ĵ'=>'j', 'ĵ'=>'j', 'я'=>'ja', 'Я'=>'ja', 'Э'=>'je', 'э'=>'je', 'ё'=>'jo', 'Ё'=>'jo', 'ю'=>'ju', 'Ю'=>'ju',
			'ĸ'=>'k', 'כ'=>'k', 'Ķ'=>'k', 'К'=>'k', 'к'=>'k', 'ķ'=>'k', 'ך'=>'k',
			'Ŀ'=>'l', 'ŀ'=>'l', 'Л'=>'l', 'ł'=>'l', 'ļ'=>'l', 'ĺ'=>'l', 'Ĺ'=>'l', 'Ļ'=>'l', 'л'=>'l', 'Ľ'=>'l', 'ľ'=>'l', 'ל'=>'l',
			'מ'=>'m', 'М'=>'m', 'ם'=>'m', 'м'=>'m',
			'ñ'=>'n', 'н'=>'n', 'Ņ'=>'n', 'ן'=>'n', 'ŋ'=>'n', 'נ'=>'n', 'Н'=>'n', 'ń'=>'n', 'Ŋ'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 'Ň'=>'n', 'ň'=>'n',
			'о'=>'o', 'О'=>'o', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'o', 'ŏ'=>'o', 'Ŏ'=>'o', 'Ō'=>'o', 'ō'=>'o', 'ø'=>'o', 'ǿ'=>'o', 'ǒ'=>'o', 'ò'=>'o', 'Ǿ'=>'o', 'Ǒ'=>'o', 'ơ'=>'o', 'ó'=>'o', 'Ơ'=>'o', 'œ'=>'oe', 'Œ'=>'oe', 'ö'=>'oe',
			'פ'=>'p', 'ף'=>'p', 'п'=>'p', 'П'=>'p',
			'ק'=>'q',
			'ŕ'=>'r', 'ř'=>'r', 'Ř'=>'r', 'ŗ'=>'r', 'Ŗ'=>'r', 'ר'=>'r', 'Ŕ'=>'r', 'Р'=>'r', 'р'=>'r',
			'ș'=>'s', 'с'=>'s', 'Ŝ'=>'s', 'š'=>'s', 'ś'=>'s', 'ס'=>'s', 'ş'=>'s', 'С'=>'s', 'ŝ'=>'s', 'Щ'=>'sch', 'щ'=>'sch', 'ш'=>'sh', 'Ш'=>'sh', 'ß'=>'ss',
			'т'=>'t', 'ט'=>'t', 'ŧ'=>'t', 'ת'=>'t', 'ť'=>'t', 'ţ'=>'t', 'Ţ'=>'t', 'Т'=>'t', 'ț'=>'t', 'Ŧ'=>'t', 'Ť'=>'t', '™'=>'tm',
			'ū'=>'u', 'у'=>'u', 'Ũ'=>'u', 'ũ'=>'u', 'Ư'=>'u', 'ư'=>'u', 'Ū'=>'u', 'Ǔ'=>'u', 'ų'=>'u', 'Ų'=>'u', 'ŭ'=>'u', 'Ŭ'=>'u', 'Ů'=>'u', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'u', 'Ǖ'=>'u', 'ǔ'=>'u', 'Ǜ'=>'u', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'У'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'ue',
			'в'=>'v', 'ו'=>'v', 'В'=>'v',
			'ש'=>'w', 'ŵ'=>'w', 'Ŵ'=>'w',
			'ы'=>'y', 'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
			'Ы'=>'y', 'ž'=>'z', 'З'=>'z', 'з'=>'z', 'ź'=>'z', 'ז'=>'z', 'ż'=>'z', 'ſ'=>'z', 'Ж'=>'zh', 'ж'=>'zh'
		);
    return strtr($string, $replace);
	}
	
	
	function replace ($string) {
		$_convertTable = array(
			'&amp;' => 'and',   '@' => 'at',    '©' => 'c', '®' => 'r', 'À' => 'a',
			'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'Å' => 'a', 'Æ' => 'ae','Ç' => 'c',
			'È' => 'e', 'É' => 'e', 'Ë' => 'e', 'Ì' => 'i', 'Í' => 'i', 'Î' => 'i',
			'Ï' => 'i', 'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Õ' => 'o', 'Ö' => 'o',
			'Ø' => 'o', 'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'Ý' => 'y',
			'ß' => 'ss','à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', 'å' => 'a',
			'æ' => 'ae','ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
			'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ò' => 'o', 'ó' => 'o',
			'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u',
			'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'þ' => 'p', 'ÿ' => 'y', 'Ā' => 'a',
			'ā' => 'a', 'Ă' => 'a', 'ă' => 'a', 'Ą' => 'a', 'ą' => 'a', 'Ć' => 'c',
			'ć' => 'c', 'Ĉ' => 'c', 'ĉ' => 'c', 'Ċ' => 'c', 'ċ' => 'c', 'Č' => 'c',
			'č' => 'c', 'Ď' => 'd', 'ď' => 'd', 'Đ' => 'd', 'đ' => 'd', 'Ē' => 'e',
			'ē' => 'e', 'Ĕ' => 'e', 'ĕ' => 'e', 'Ė' => 'e', 'ė' => 'e', 'Ę' => 'e',
			'ę' => 'e', 'Ě' => 'e', 'ě' => 'e', 'Ĝ' => 'g', 'ĝ' => 'g', 'Ğ' => 'g',
			'ğ' => 'g', 'Ġ' => 'g', 'ġ' => 'g', 'Ģ' => 'g', 'ģ' => 'g', 'Ĥ' => 'h',
			'ĥ' => 'h', 'Ħ' => 'h', 'ħ' => 'h', 'Ĩ' => 'i', 'ĩ' => 'i', 'Ī' => 'i',
			'ī' => 'i', 'Ĭ' => 'i', 'ĭ' => 'i', 'Į' => 'i', 'į' => 'i', 'İ' => 'i',
			'ı' => 'i', 'Ĳ' => 'ij','ĳ' => 'ij','Ĵ' => 'j', 'ĵ' => 'j', 'Ķ' => 'k',
			'ķ' => 'k', 'ĸ' => 'k', 'Ĺ' => 'l', 'ĺ' => 'l', 'Ļ' => 'l', 'ļ' => 'l',
			'Ľ' => 'l', 'ľ' => 'l', 'Ŀ' => 'l', 'ŀ' => 'l', 'Ł' => 'l', 'ł' => 'l',
			'Ń' => 'n', 'ń' => 'n', 'Ņ' => 'n', 'ņ' => 'n', 'Ň' => 'n', 'ň' => 'n',
			'ŉ' => 'n', 'Ŋ' => 'n', 'ŋ' => 'n', 'Ō' => 'o', 'ō' => 'o', 'Ŏ' => 'o',
			'ŏ' => 'o', 'Ő' => 'o', 'ő' => 'o', 'Œ' => 'oe','œ' => 'oe','Ŕ' => 'r',
			'ŕ' => 'r', 'Ŗ' => 'r', 'ŗ' => 'r', 'Ř' => 'r', 'ř' => 'r', 'Ś' => 's',
			'ś' => 's', 'Ŝ' => 's', 'ŝ' => 's', 'Ş' => 's', 'ş' => 's', 'Š' => 's',
			'š' => 's', 'Ţ' => 't', 'ţ' => 't', 'Ť' => 't', 'ť' => 't', 'Ŧ' => 't',
			'ŧ' => 't', 'Ũ' => 'u', 'ũ' => 'u', 'Ū' => 'u', 'ū' => 'u', 'Ŭ' => 'u',
			'ŭ' => 'u', 'Ů' => 'u', 'ů' => 'u', 'Ű' => 'u', 'ű' => 'u', 'Ų' => 'u',
			'ų' => 'u', 'Ŵ' => 'w', 'ŵ' => 'w', 'Ŷ' => 'y', 'ŷ' => 'y', 'Ÿ' => 'y',
			'Ź' => 'z', 'ź' => 'z', 'Ż' => 'z', 'ż' => 'z', 'Ž' => 'z', 'ž' => 'z',
			'ſ' => 'z', 'Ə' => 'e', 'ƒ' => 'f', 'Ơ' => 'o', 'ơ' => 'o', 'Ư' => 'u',
			'ư' => 'u', 'Ǎ' => 'a', 'ǎ' => 'a', 'Ǐ' => 'i', 'ǐ' => 'i', 'Ǒ' => 'o',
			'ǒ' => 'o', 'Ǔ' => 'u', 'ǔ' => 'u', 'Ǖ' => 'u', 'ǖ' => 'u', 'Ǘ' => 'u',
			'ǘ' => 'u', 'Ǚ' => 'u', 'ǚ' => 'u', 'Ǜ' => 'u', 'ǜ' => 'u', 'Ǻ' => 'a',
			'ǻ' => 'a', 'Ǽ' => 'ae','ǽ' => 'ae','Ǿ' => 'o', 'ǿ' => 'o', 'ə' => 'e',
			'Ё' => 'jo','Є' => 'e', 'І' => 'i', 'Ї' => 'i', 'А' => 'a', 'Б' => 'b',
			'В' => 'v', 'Г' => 'g', 'Д' => 'd', 'Е' => 'e', 'Ж' => 'zh','З' => 'z',
			'И' => 'i', 'Й' => 'j', 'К' => 'k', 'Л' => 'l', 'М' => 'm', 'Н' => 'n',
			'О' => 'o', 'П' => 'p', 'Р' => 'r', 'С' => 's', 'Т' => 't', 'У' => 'u',
			'Ф' => 'f', 'Х' => 'h', 'Ц' => 'c', 'Ч' => 'ch','Ш' => 'sh','Щ' => 'sch',
			'Ъ' => '-', 'Ы' => 'y', 'Ь' => '-', 'Э' => 'je','Ю' => 'ju','Я' => 'ja',
			'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
			'ж' => 'zh','з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l',
			'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's',
			'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
			'ш' => 'sh','щ' => 'sch','ъ' => '-','ы' => 'y', 'ь' => '-', 'э' => 'je',
			'ю' => 'ju','я' => 'ja','ё' => 'jo','є' => 'e', 'і' => 'i', 'ї' => 'i',
			'Ґ' => 'g', 'ґ' => 'g', 'א' => 'a', 'ב' => 'b', 'ג' => 'g', 'ד' => 'd',
'ה' => 'h', 'ו' => 'v', 'ז' => 'z', 'ח' => 'h', 'ט' => 't', 'י' => 'i',
'ך' => 'k', 'כ' => 'k', 'ל' => 'l', 'ם' => 'm', 'מ' => 'm', 'ן' => 'n',
'נ' => 'n', 'ס' => 's', 'ע' => 'e', 'ף' => 'p', 'פ' => 'p', 'ץ' => 'C',
'צ' => 'c', 'ק' => 'q', 'ר' => 'r', 'ש' => 'w', 'ת' => 't', '™' => 'tm',
		);
		return strtr($string, $_convertTable);
	}
	
	

?>