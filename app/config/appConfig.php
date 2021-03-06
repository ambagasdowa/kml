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
									'navMenuF'=>'Anexos',
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
									'navMenuF'=>'Anexos',
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
	 //NOTE which groups in that module gorup xx and module_name
	function checkUser ($id_group=null,$group=null) {

		if ( ( (int)$id_group === 8 OR (int)$id_group === 6 OR (int)$id_group === 1 OR (int)$id_group === 7) and ($group === 'Casetas')) {
			return true;
		} else if (( (int)$id_group === 5 OR (int)$id_group === 1  OR (int)$id_group === 7) and $group === 'PoliciesAnexos') {
			return true;
		} else if (( (int)$id_group === 4 OR (int)$id_group === 1  OR (int)$id_group === 7) and $group === 'Secure') {
			return true;
		} else if (((int)$id_group === 9 OR (int)$id_group === 1 OR (int)$id_group === 7 ) and $group === 'Providers') {
			return true;
		} else if (( (int)$id_group === 8 OR (int)$id_group === 10 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'Ingresos') {
			return true;
		} else if (( (int)$id_group === 8 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'Finanzas') {
			return true;
		} else if (( (int)$id_group === 8 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'Contraloria') {
			return true;
		} else if (( (int)$id_group === 11 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'Facturacion') {
			return true;
		} else if (( (int)$id_group === 12 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'CasetasIngresos') { //group for projections and casetas
			return true;
		} else if (( (int)$id_group === 13 OR (int)$id_group === 1 OR (int)$id_group === 7) and ($group === 'PoliciesIngresos' OR $group === 'Policies')) { //projections & pol
			return true;
		} else if (( (int)$id_group === 14 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'Addenum') { //projections & pol
			return true; //Addenum
		} else if (( (int)$id_group === 15 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'Logistica') { //projections & pol
			return true; //Logistica
		} else if (( (int)$id_group === 18 OR (int)$id_group === 1 OR (int)$id_group === 7) and $group === 'Contraloria') { //politicas & contraloria
			return true; //Contraloria
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

		$root=array('9000000','9000001','9000002','4000003','90000100','4000030');
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

	function cleanData(&$str) {
		if($str == 't') $str = 'TRUE';
		if($str == 'f') $str = 'FALSE';
		if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
			$str = "'$str";
		}
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}


	function csv( $data = null ) {
    // $data = array(
    //   array("firstname" => "Mary", "lastname" => "Johnson", "age" => 25),
    //   array("firstname" => "Amanda", "lastname" => "Miller", "age" => 18),
    //   array("firstname" => "James", "lastname" => "Brown", "age" => 31),
    //   array("firstname" => "Patricia", "lastname" => "Williams", "age" => 7),
    //   array("firstname" => "Michael", "lastname" => "Davis", "age" => 43),
    //   array("firstname" => "Sarah", "lastname" => "Miller", "age" => 24),
    //   array("firstname" => "Patrick", "lastname" => "Miller", "age" => 27)
    // );
		// filename for download
    $filename = "website_data_" . date('Ymd') . ".csv";
    $out = fopen("php://output", 'w');
    $flag = false;

		Configure::write('debug', 0);
		$this->autoRender = false;
		$this->autoLayout = false;
		$this->header('Content-Disposition: attachment; filename=\"$filename\"');
		$this->header('Content-Type: text/csv');

    foreach($data as $row) {
      if(!$flag) {
        // display field/column names as first row
        fputcsv($out, array_keys($row), ',', '"');
        $flag = true;
      }
      array_walk($row, __NAMESPACE__ . '\cleanData');
      fputcsv($out, array_values($row), ',', '"');
    }
    fclose($out);
    // exit();
	} // NOTE end csv


	function test() {
		return "hello cakephp";
	}


	function print_data () {
		print_r(test());
	}


	/**
	* @package name <htmlMotor> this must change
	* @congif build a script code to call datepicker
	* @usage
	* @param=>userAgent <string | set the string of "HTTP_USER_AGENT" >
	* TODO set a funciton of year maybe this can come from a db
	*/
	function setYear ($current = null ,$offset = null) {
		return null;
	}

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
	 * @package name <encrypt> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | set the string of "HTTP_USER_AGENT" >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */
	function dEncrypt($decrypted_encrypt, $password, $salt , $mode) {

		if ($mode === 'encrypt') {

			$decrypted = $decrypted_encrypt;
			// Build a 256-bit $key which is a SHA256 hash of $salt and $password.
			$key = hash('SHA256', $salt . $password, true);
			// Build $iv and $iv_base64.  We use a block size of 128 bits (AES compliant) and CBC mode.  (Note: ECB mode is inadequate as IV is not used.)
			srand(); $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
			if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22) return false;
			// Encrypt $decrypted and an MD5 of $decrypted using $key.  MD5 is fine to use here because it's just to verify successful decryption.
			$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
			// We're done!
			return $iv_base64 . $encrypted;
		} else if ($mode === 'decrypt'){

			$encrypted = $decrypted_encrypt;
			// Build a 256-bit $key which is a SHA256 hash of $salt and $password.
			$key = hash('SHA256', $salt . $password, true);
			// Retrieve $iv which is the first 22 characters plus ==, base64_decoded.
			$iv = base64_decode(substr($encrypted, 0, 22) . '==');
			// Remove $iv from $encrypted.
			$encrypted = substr($encrypted, 22);
			// Decrypt the data.  rtrim won't corrupt the data because the last 32 characters are the md5 hash; thus any \0 character has to be padding.
			$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0\4");
			// Retrieve $hash which is the last 32 characters of $decrypted.
			$hash = substr($decrypted, -32);
			// Remove the last 32 characters from $decrypted.
			$decrypted = substr($decrypted, 0, -32);
			// Integrity check.  If this fails, either the data is corrupted, or the password/salt was incorrect.
			if (md5($decrypted) != $hash) return false;
			// Yay!
			return $decrypted;
		} else {
			return null;
		}
	}

	 /**
	 * @package name <removeBOM> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | When you read the file back in using fopen, the BOM will also be there. To remove it, I also wrote the following function: >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */
	function removeBOM($str=""){
			if(substr($str, 0,3) == pack("CCC",0xef,0xbb,0xbf)) {
					$str=substr($str, 3);
			}
			return $str;
	}

	/**
	* @package name <negative> this must change
	* @congif build a script code to call datepicker
	* @usage
	* @param=>userAgent <integer | checks if a number is negative else return false: >
	* @return <BOOLEAN>
	* NOTE  this function is far away to be complete but for the purpose is ok
	*/
	function negative($data = null) {
		if(is_numeric($data)){
			return (min(1, max(-1, $data)) === -1) ?  TRUE : FALSE ;
		} else {
			return null;
		}
	}

	 /**
	 * @package name <map_utf8> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | convert an array to utf8  >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */
	function average($elem,$size = null ,$mode = null){

		if ($mode == null ) {
			return array_sum($elem)/sizeof($elem);
		} else {
			foreach ($elem as $key => $value) {
				# code...
				$result_array[$key] = $value / $size;
			}
		 return $result_array;
		}
	}

	 /**
	 * @package name <map_utf8> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | convert an array to utf8  >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */
	function map_utf8($results) {

		foreach ($results as $key => $value) {
				$result[utf8_encode($key)] = $value;
		}

		return $result;
	}

	 /**
	 * @package name <cp1252_to_utf8> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string |  Here's some code that addresses the issue that Steven describes in the previous comment; >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */

	function cp1252_to_utf8($str) {
		/* This structure encodes the difference between ISO-8859-1 and Windows-1252,
		as a map from the UTF-8 encoding of some ISO-8859-1 control characters to
		the UTF-8 encoding of the non-control characters that Windows-1252 places
		at the equivalent code points. */

		$cp1252_map = array(
			"\xc2\x80" => "\xe2\x82\xac", /* EURO SIGN */
			"\xc2\x82" => "\xe2\x80\x9a", /* SINGLE LOW-9 QUOTATION MARK */
			"\xc2\x83" => "\xc6\x92",     /* LATIN SMALL LETTER F WITH HOOK */
			"\xc2\x84" => "\xe2\x80\x9e", /* DOUBLE LOW-9 QUOTATION MARK */
			"\xc2\x85" => "\xe2\x80\xa6", /* HORIZONTAL ELLIPSIS */
			"\xc2\x86" => "\xe2\x80\xa0", /* DAGGER */
			"\xc2\x87" => "\xe2\x80\xa1", /* DOUBLE DAGGER */
			"\xc2\x88" => "\xcb\x86",     /* MODIFIER LETTER CIRCUMFLEX ACCENT */
			"\xc2\x89" => "\xe2\x80\xb0", /* PER MILLE SIGN */
			"\xc2\x8a" => "\xc5\xa0",     /* LATIN CAPITAL LETTER S WITH CARON */
			"\xc2\x8b" => "\xe2\x80\xb9", /* SINGLE LEFT-POINTING ANGLE QUOTATION */
			"\xc2\x8c" => "\xc5\x92",     /* LATIN CAPITAL LIGATURE OE */
			"\xc2\x8e" => "\xc5\xbd",     /* LATIN CAPITAL LETTER Z WITH CARON */
			"\xc2\x91" => "\xe2\x80\x98", /* LEFT SINGLE QUOTATION MARK */
			"\xc2\x92" => "\xe2\x80\x99", /* RIGHT SINGLE QUOTATION MARK */
			"\xc2\x93" => "\xe2\x80\x9c", /* LEFT DOUBLE QUOTATION MARK */
			"\xc2\x94" => "\xe2\x80\x9d", /* RIGHT DOUBLE QUOTATION MARK */
			"\xc2\x95" => "\xe2\x80\xa2", /* BULLET */
			"\xc2\x96" => "\xe2\x80\x93", /* EN DASH */
			"\xc2\x97" => "\xe2\x80\x94", /* EM DASH */

			"\xc2\x98" => "\xcb\x9c",     /* SMALL TILDE */
			"\xc2\x99" => "\xe2\x84\xa2", /* TRADE MARK SIGN */
			"\xc2\x9a" => "\xc5\xa1",     /* LATIN SMALL LETTER S WITH CARON */
			"\xc2\x9b" => "\xe2\x80\xba", /* SINGLE RIGHT-POINTING ANGLE QUOTATION*/
			"\xc2\x9c" => "\xc5\x93",     /* LATIN SMALL LIGATURE OE */
			"\xc2\x9e" => "\xc5\xbe",     /* LATIN SMALL LETTER Z WITH CARON */
			"\xc2\x9f" => "\xc5\xb8"      /* LATIN CAPITAL LETTER Y WITH DIAERESIS*/
		);

			return  strtr(utf8_encode($str), $cp1252_map);
	}

	/** NOTE <Define dirs>**/
	function createDirs() {
		return array(
						'1'=>'shares',
						'2'=>'Desktop',
						'3'=>'Documents'

		);
	}


	// ggarciaa at gmail dot com (04-July-2007 01:57)
	// I needed to empty a directory, but keeping it
	// so I slightly modified the contribution from
	// stefano at takys dot it (28-Dec-2005 11:57)
	// A short but powerfull recursive function
	// that works also if the dirs contain hidden files
	//
	// $dir = the target directory
	// $DeleteMe = if true delete also $dir, if false leave it alone

	function SureRemoveDir($dir, $DeleteMe) {
		if(!$dh = @opendir($dir)) return;
		while (false !== ($obj = readdir($dh))) {
			if($obj=='.' || $obj=='..') continue;
			if (!@unlink($dir.'/'.$obj)) SureRemoveDir($dir.'/'.$obj, true);
		}

		closedir($dh);
		if ($DeleteMe){
			@rmdir($dir);
		}
	}

	 /**
	 * @package name <GeraHash> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | set the string of "HTTP_USER_AGENT" >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */

	function GeraHash($qtd){
	//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
	$Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
	$QuantidadeCaracteres = strlen($Caracteres);
	$QuantidadeCaracteres--;

	$Hash=NULL;
		for($x=1;$x<=$qtd;$x++){
			$Posicao = rand(0,$QuantidadeCaracteres);
			$Hash .= substr($Caracteres,$Posicao,1);
		}

	return $Hash;
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



	 /**
	 * @package name <cp1252_to_utf8> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string |  Here's some code that addresses the issue that Steven describes in the previous comment; >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */


      function GetNationalMexicanHolidays($year=null){

		  $HolyMonth['sub']['AshesWednesday']= 'P46D';
		  $HolyMonth['sub']['PalmSunday']= 'P7D';
		  $HolyMonth['sub']['HolyThursday']= 'P3D';
		  $HolyMonth['sub']['GoodFriday']= 'P2D';
		  $HolyMonth['sub']['SaturdayOfGlory']= 'P1D';
		  $HolyMonth['add']['AscentionOfMigthyLord']= 'P39D';
		  $HolyMonth['add']['Pentecostes']= 'P49D';
		  $HolyMonth['add']['HolynessTrinity']= 'P56D';
		  $HolyMonth['add']['CorpusChristi']= 'P60D';

        if (is_array($year) == true) {

		  foreach ($year as $id_yr => $cyear) {

            $GetEaster[$cyear] = get_easter_datetime($cyear)->format('Y-m-d');

            foreach($HolyMonth['sub'] as $DayCeleb => $celebration ){
                $date = new DateTime($GetEaster[$cyear]);
                $date->sub(new DateInterval($celebration));
                $BeforeEaster[$cyear][$DayCeleb] = $date->format('Y-m-d');
            }

            foreach($HolyMonth['add'] as $DayCeleb => $celebration){
                $date = new DateTime($GetEaster[$cyear]);
                $date->add(new DateInterval($celebration));
                $AfterEaster[$cyear][$DayCeleb] = $date->format('Y-m-d');
            }

            $MxBankHolidays[$cyear] = array(
                        'NewYearsDay' => $cyear.'-01-01',
                        'BattleOfPuebla' => ''.date('Y-m-d',strtotime('first Monday of February'.$cyear)),
                        'JuarezBirthday' => ''.date('Y-m-d',strtotime('third Monday of March'.$cyear)),
                        'LabourDay' => $cyear.'-05-01',
                        'IndependenceDay' => $cyear.'-09-16',
                        'MexicanRevolution' => ''.date('Y-m-d',strtotime('third Monday of November'.$cyear)),
                        'Christmas' => $cyear.'-12-25'
            );

            $MxMexicanHolidays[$cyear] = array(
                        'HolyThursday' => $BeforeEaster[$cyear]['HolyThursday'],// Holy Thursday
                        'GoodFriday' => $BeforeEaster[$cyear]['GoodFriday'], // Good Friday
                        'HolySaturday' => $BeforeEaster[$cyear]['SaturdayOfGlory'], // Holy Saturday
                        'AllSoulsDay' => $cyear.'-11-02', // All Souls'Day
                        'OurLadyOfGuadalupe' => $cyear.'-12-12' // Our Lady of Guadalupe
            );

            $MexicanoHolidays[$cyear]['holiday'] = $MxBankHolidays[$cyear];
            $MexicanoHolidays[$cyear]['holiday']['GoodFriday'] = $BeforeEaster[$cyear]['GoodFriday'];
            $MexicanoHolidays[$cyear]['holiday']['SaturdayOfGlory'] = $BeforeEaster[$cyear]['SaturdayOfGlory'];
            $MexicanoHolidays[$cyear]['holiday']['AllSoulsDay'] = $MxMexicanHolidays[$cyear]['AllSoulsDay'];
            $MexicanoHolidays[$cyear]['mexican'] = $MxMexicanHolidays[$cyear];
            $MexicanoHolidays[$cyear]['easter'] = $GetEaster[$cyear];
            $MexicanoHolidays[$cyear]['holymonth'] = $HolyMonth;
            $MexicanoHolidays[$cyear]['beforeeaster'] = $BeforeEaster[$cyear];
            $MexicanoHolidays[$cyear]['aftereaster'] = $AfterEaster[$cyear];
		  }

		  return $MexicanoHolidays;

        } else {

		  $GetEaster = get_easter_datetime($year)->format('Y-m-d');

		  foreach($HolyMonth['sub'] as $DayCeleb => $celebration ){
			$date = new DateTime($GetEaster);
			$date->sub(new DateInterval($celebration));
			$BeforeEaster[$DayCeleb] = $date->format('Y-m-d');
		  }foreach($HolyMonth['add'] as $DayCeleb => $celebration){
			$date = new DateTime($GetEaster);
			$date->add(new DateInterval($celebration));
			$AfterEaster[$DayCeleb] = $date->format('Y-m-d');
		  }

		  $MxBankHolidays = array(
					'NewYearsDay' => $year.'-01-01',
					'BattleOfPuebla' => ''.date('Y-m-d',strtotime('first Monday of February'.$year)),
					'JuarezBirthday' => ''.date('Y-m-d',strtotime('third Monday of March'.$year)),
					'LabourDay' => $year.'-05-01',
					'IndependenceDay' => $year.'-09-16',
					'MexicanRevolution' => ''.date('Y-m-d',strtotime('third Monday of November'.$year)),
					'Christmas' => $year.'-12-25'
		  );


		  $MxMexicanHolidays = array(
					'HolyThursday' => $BeforeEaster['HolyThursday'],// Holy Thursday
					'GoodFriday' => $BeforeEaster['GoodFriday'], // Good Friday
					'HolySaturday' => $BeforeEaster['SaturdayOfGlory'], // Holy Saturday
					'AllSoulsDay' => $year.'-11-02', // All Souls'Day
					'OurLadyOfGuadalupe' => $year.'-12-12' // Our Lady of Guadalupe
		  );

		  $MexicanoHolidays['holiday'] = $MxBankHolidays;
		  $MexicanoHolidays['holiday']['GoodFriday'] = $BeforeEaster['GoodFriday'];
		  $MexicanoHolidays['holiday']['SaturdayOfGlory'] = $BeforeEaster['SaturdayOfGlory'];
		  $MexicanoHolidays['holiday']['AllSoulsDay'] = $MxMexicanHolidays['AllSoulsDay'];
		  $MexicanoHolidays['mexican'] = $MxMexicanHolidays;
		  $MexicanoHolidays['easter'] = $GetEaster;
		  $MexicanoHolidays['holymonth'] = $HolyMonth;
		  $MexicanoHolidays['beforeeaster'] = $BeforeEaster;
		  $MexicanoHolidays['aftereaster'] = $AfterEaster;

		  return $MexicanoHolidays;
        }

      } //end GetNationalMexicanHolidays

	 /**
	 * @package name <cp1252_to_utf8> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string |  Here's some code that addresses the issue that Steven describes in the previous comment; >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */

      function get_easter_datetime($year=null){
		  $base = new DateTime("$year-03-21");
		  $days = easter_days($year);
		return $base->add(new DateInterval("P{$days}D"));
      }

	 /**
	 * @package name <cp1252_to_utf8> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string |  Here's some code that addresses the issue that Steven describes in the previous comment; >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */

      function GetWorkingDays($MexicanoHolidays=null,$debug=null,$return=null,$saturday=null){

      $detailWorkingDays = array();

      foreach ($MexicanoHolidays as $cyear => $holiday) {

        if($debug){
            debug($cyear);
            debug($holiday['holiday']);
        }

		$holidays = $holiday['holiday'];
// 		$holidays = $MexicanoHolidays[$cyear]['holiday'];
		$work = 0;
		$nowork = 0;

		$startDate = $cyear.'-'.'01'.'-'.'01';
		$endDate = $cyear.'-'.'12'.'-'.'31';

		$dayx = strtotime($startDate);
		$endx = strtotime($endDate);

		if($debug){
            var_dump($startDate);
            var_dump($endDate);
            var_dump($return);
            var_dump($saturday);

            debug('daysx => '.$startDate.' => ' .$dayx);
            debug('endx => '.$endDate.' => ' .$endx);
        }
		if (!empty($saturday) and $saturday == true) {
			$daysOfWeekend = 5;
		} else {
			$daysOfWeekend = 6;
		}

		if($debug){
		  echo '<h1>get_working_days</h1>';
		  echo 'startDate: '.date('r',strtotime( $startDate)).'<br>';
		  echo 'endDate: '.date('r',strtotime( $endDate)).'<br>';
		  echo '<p>Go to work...'.$cyear.'</p>';
		}

		  while($dayx <= $endx){
			$day = date('N',$dayx);
			$date = date('Y-m-d',$dayx);
		  if($debug) {
			echo '<br />'.date('r',$dayx).' ';
		  }

            $new_month = new DateTime($date);
            $nmonth = date_format($new_month, 'm');

		  if($day > $daysOfWeekend || in_array($date,$holidays)){
			$detailWorkingDays[$cyear][$nmonth]['list'][$date] = false;
			$nowork++;
			/** ALERT add the logic for build the day */
			  if($debug){
				if($day > $daysOfWeekend) {
					echo '<span style="background-color:#34aa8d;display:inline;">weekend</span>';
					$detailWorkingDays[$cyear][$nmonth]['weekend'][$date] = false;
				} else {
					echo '<span style="background-color:#a66f55;display:inline;">holiday</span>';
					$detailWorkingDays[$cyear][$nmonth]['holiday'][$date] = false;
					if($date) {
						$get_holiday = array_keys($holidays,$date);
							foreach($get_holiday as $key => $desc) {
								echo '=><span style="background-color:#5a91a2;display:inline;">'.$desc.'</span>';
							}
					}
				}
			  }
		  } else {
			  /** ALERT add if no holiday or weekend*/
			  $work++;
			  $detailWorkingDays[$cyear][$nmonth]['laboral'][$date] = true;
			  $detailWorkingDays[$cyear][$nmonth]['list'][$date] = true;
		  }
			$dayx = strtotime($date.' +1 day');
		}

		  $working[$cyear]['nowork'] = $nowork;
		  $working[$cyear]['work'] = $work;

		if($debug) {
		  echo '<p>No work: '.$working[$cyear]['nowork'].'<br>';
		  echo 'Work: '.$working[$cyear]['work'].'<br>';
		  echo 'Work + no work: '.($working[$cyear]['nowork']+$working[$cyear]['work']).'<br>';
		  echo 'All seconds / seconds in a day: '.floatval(strtotime($endDate)-strtotime($startDate))/floatval(24*60*60);
		  echo '</p>';
		}

      }

		if( !empty($return) ) {
			return $detailWorkingDays;
		} else {
			return $working;
		}

	} // GetWorkingDays end's

    function months_es () {

            $months = array (
                                1   =>  'enero',
                                2   =>  'febrero',
                                3   =>  'marzo',
                                4   =>  'abril',
                                5   =>  'mayo',
                                6   =>  'junio',
                                7   =>  'julio',
                                8   =>  'agosto',
                                9   =>  'septiembre',
                                10  =>  'octubre',
                                11  =>  'noviembre',
                                12  =>  'diciembre'
                             ) ;

        return $months;
    }

?>
