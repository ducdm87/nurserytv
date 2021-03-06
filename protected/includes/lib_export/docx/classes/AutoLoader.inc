<?php
class AutoLoader {
	public static function load() {
		spl_autoload_register ( array (
				'AutoLoader',
				'autoloadGenericClasses' 
		) );
		spl_autoload_register ( array (
				'AutoLoader',
				'autoloadPhpdocx' 
		) );
		spl_autoload_register ( array (
				'AutoLoader',
				'autoloadLog4php' 
		) );
		spl_autoload_register ( array (
				'AutoLoader',
				'autoloadZetaComponents' 
		) );
		spl_autoload_register ( array (
				'AutoLoader',
				'autoloadTcpdf' 
		) );
		spl_autoload_register ( array (
				'AutoLoader',
				'autoloadPdf' 
		) );
		spl_autoload_register ( array (
				'AutoLoader',
				'autoloadDompdf' 
		) );
		spl_autoload_register ( array (
				'AutoLoader',
				'autoloadMht' 
		) );
		require_once dirname ( __FILE__ ) . '/Helpers.inc';
	}
	public static function autoloadDompdf($className) {
		$pathDompdf = dirname ( __FILE__ ) . '/../pdf/dompdf_config.inc.php';
		if (file_exists ( $pathDompdf )) {
			require_once $pathDompdf;
		}
	}
	public static function autoloadGenericClasses($className) {
		$pathPhpdocx = dirname ( __FILE__ ) . '/' . $className . '.inc';
		if (file_exists ( $pathPhpdocx )) {
			$arrayClassesEnc = array (
					'CreateDocx',
					'AutoLoader',
					'Phpdocx_config',
					'CreateElement',
					'Helpers' 
			);
			require_once $pathPhpdocx;
			/* if (in_array ( $className, $arrayClassesEnc )) {
				require_once $pathPhpdocx;
			} else {
				if($pathPhpdocx) {
					 $code = gzinflate ( base64_decode ( file_get_contents ( $pathPhpdocx ) ) );
					$arr = explode('/', $pathPhpdocx);
					$filename = 'D:/xampp/htdocs/phpdoc/code/'.$arr[count($arr) - 1];
					$fpt = fopen($filename, 'w+');
					fwrite($fpt, '<?php '.$code.' ?>');
					fclose($fpt); 
					eval ( gzinflate ( base64_decode ( file_get_contents ( $pathPhpdocx ) ) ) );
				}
			}*/ 
		}
	}
	public static function autoloadLog4php($className) {
		$pathLogphp = dirname ( __FILE__ ) . '/../lib/log4php/' . $className . '.php';
		if (file_exists ( $pathLogphp )) {
			require_once $pathLogphp;
		}
	}
	public static function autoloadMht($className) {
		$pathMht = dirname ( __FILE__ ) . '/../lib/' . $className . '.php';
		if (file_exists ( $pathMht )) {
			require_once $pathMht;
		}
	}
	public static function autoloadPdf($className) {
		$pathPDF = dirname ( __FILE__ ) . '/pdf/' . $className . '.inc';
		if (file_exists ( $pathPDF )) {
			require_once $pathPDF;
		}
		$pathTCPDF = dirname ( __FILE__ ) . '/../pdf/tcpdf/tcpdf.php';
		if (file_exists ( $pathTCPDF )) {
			require_once $pathTCPDF;
		}
		$pathFPDI = dirname ( __FILE__ ) . '/../lib/fpdi/fpdi.php';
		if (file_exists ( $pathFPDI )) {
			require_once $pathFPDI;
		}
	}
	public static function autoloadPhpdocx($className) {
		$pathPhpdocx = dirname ( __FILE__ ) . '/docx/' . $className . '.inc';
		if (file_exists ( $pathPhpdocx )) {
			require_once $pathPhpdocx;
		}
	}
	public static function autoloadTcpdf($className) {
		$pathTcpdf = dirname ( __FILE__ ) . '/../pdf/class.tcpdf.php';
		if (file_exists ( $pathTcpdf )) {
			require_once $pathTcpdf;
		}
	}
	public static function autoloadZetaComponents($className) {
		if (preg_match ( '/^ezcBase/', $className )) {
			$ezcBaseClasses = require dirname ( __FILE__ ) . '/../lib/zetacomponents/Base/src/base_autoload.php';
			if (array_key_exists ( $className, $ezcBaseClasses )) {
				$classPath = $ezcBaseClasses [$className];
				$classPathFix = this . zetaComponentsFileName ( $classPath );
				$pathZetaComp = dirname ( __FILE__ ) . '/../lib/zetacomponents/' . $classPathFix;
				if (file_exists ( $pathZetaComp )) {
					require_once $pathZetaComp;
				}
			}
		}
		if (preg_match ( '/^ezcGraph/', $className )) {
			$ezcGraphClasses = require dirname ( __FILE__ ) . '/../lib/zetacomponents/Graph/src/graph_autoload.php';
			if (array_key_exists ( $className, $ezcGraphClasses )) {
				$classPath = $ezcGraphClasses [$className];
				$classPathFix = this . zetaComponentsFileName ( $classPath );
				$pathZetaComp = dirname ( __FILE__ ) . '/../lib/zetacomponents/' . $classPathFix;
				if (file_exists ( $pathZetaComp )) {
					require_once $pathZetaComp;
				}
			}
		}
	}
	private function zetaComponentsFileName($file) {
		list ( $first, $second, $third ) = explode ( '/', $file, 3 );
		if (! empty ( $third )) {
			return $file = $first . "/src/" . $second . '/' . $third;
		} else {
			list ( $first, $second ) = explode ( '/', $file, 2 );
			return $file = $first . "/src/" . $second;
		}
	}
} 