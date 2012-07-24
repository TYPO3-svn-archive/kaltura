<?php
/**
 * VideoBox controller.
 *
 * @author Jozef Spisiak <jozef@pixelant.se>
 * @package Kaltura
 * @subpackage Controller
 * @version $Id:$
 */

class Tx_Kaltura_Controller_BackendController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Render backend module for Kaltura
	 *
	 * @return string
	 */
	public function indexAction() {
		$conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['kaltura']);
		if ($conf['kalturaHost'] == '') $conf['kalturaHost'] = 'www.kaltura.com';
		header("Location: http://".$conf['kalturaHost']."/index.php/kmc");
		exit();
	}

}
?>
