<?php
/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * VideoBox controller.
 *
 * @author Jozef Spisiak <jozef@pixelant.se>
 * @package Kaltura
 * @subpackage Controller
 * @version $Id:$
 */

class Tx_Kaltura_Controller_VideoBoxController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Render box
	 *
	 * @return string
	 */
	public function indexAction() {
		$conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['kaltura']);

		if ($conf['partnerID'] == 0 || $conf['adminSecret'] == '' || $conf['userID'] == '')
		{
			$this->view->assign('error', Tx_Extbase_Utility_Localization::translate('bad_configuration', 'kaltura'));
			return $this->view->render();
		}

		if ($this->settings['type'] == 1) $this->view->assign('playlist',1);

		$data = $this->request->getContentObjectData();
		$this->view->assign('uid', $data['uid']);
		$this->view->assign('cacheTime', $data['tstamp']);

		$this->view->assign('partnerID', $conf['partnerID']);
		$this->view->assign('subPartnerID', $conf['subPartnerID']);
		$this->view->assign('playerUI', $this->settings['skin']);
		
		$configuration = t3lib_div::makeInstance('KalturaConfiguration', $conf['partnerID']);
		/**
		 * @var KalturaClient
		 */
		$client = t3lib_div::makeInstance('KalturaClient', $configuration);
		$ks = $client->session->start($conf['adminSecret'], $conf['userID'], KalturaSessionType::ADMIN);
		$client->setKs($ks);
		
		$ui = $client->uiConf->get($this->settings['skin']);
		$this->view->assign('height', intval($this->settings['width']) * intval($ui->height) / intval($ui->width));
		
		if ($this->settings['type'] == 0)
		{
			$entry = $client->media->get($this->settings['kalturaContent']);
	
			if ($this->checkEntryStatus($entry->status))
				$this->view->assign("entry", $entry);
		} else {
			$entry = $client->playlist->get($this->settings['kalturaPlaylist']);
			$this->view->assign("entry", $entry);
		}
	}

	private function checkEntryStatus($status) {
		switch ($status)
		{
			case KalturaEntryStatus::READY :
				$return = TRUE;
				break;
			case KalturaEntryStatus::BLOCKED :
				$message = Tx_Extbase_Utility_Localization::translate('status_blocked', 'kaltura');
			case KalturaEntryStatus::DELETED :
				$message = Tx_Extbase_Utility_Localization::translate('status_deleted', 'kaltura');
			case KalturaEntryStatus::ERROR_CONVERTING :
				$message = Tx_Extbase_Utility_Localization::translate('status_error_converting', 'kaltura');
			case KalturaEntryStatus::ERROR_IMPORTING :
				$message = Tx_Extbase_Utility_Localization::translate('status_error_importing', 'kaltura');
			case KalturaEntryStatus::IMPORT :
				$message = Tx_Extbase_Utility_Localization::translate('status_import', 'kaltura');
			case KalturaEntryStatus::INFECTED :
				$message = Tx_Extbase_Utility_Localization::translate('status_infected', 'kaltura');
			case KalturaEntryStatus::MODERATE :
				$message = Tx_Extbase_Utility_Localization::translate('status_moderate', 'kaltura');
			case KalturaEntryStatus::NO_CONTENT :
				$message = Tx_Extbase_Utility_Localization::translate('status_no_content', 'kaltura');
			case KalturaEntryStatus::PENDING :
				$message = Tx_Extbase_Utility_Localization::translate('status_pending', 'kaltura');
			case KalturaEntryStatus::PRECONVERT :
				$message = Tx_Extbase_Utility_Localization::translate('status_preconvert', 'kaltura');
			default :
				$return = FALSE;
				if (!isset($message))
					$message = Tx_Extbase_Utility_Localization::translate('status_unknown', 'kaltura');
				break;
		}
		if (isset($message))
			$this->view->assign('error', $message);
		return $return;
	}

	/**
	 * Function to list video players
	 *
	 * @return array
	 */
	function user_listPlayersAction($config) {
		$conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['kaltura']);

		if ($conf['partnerID'] == 0 || $conf['adminSecret'] == '' || $conf['userID'] == '')
		{
			$this->view->assign('error', Tx_Extbase_Utility_Localization::translate('bad_configuration', 'kaltura'));
			return $this->view->render();
		}

		$configuration = t3lib_div::makeInstance('KalturaConfiguration', $conf['partnerID']);
		/**
		 * @var KalturaClient
		 */
		$client = t3lib_div::makeInstance('KalturaClient', $configuration);
		$ks = $client->session->start($conf['adminSecret'], $conf['userID'], KalturaSessionType::ADMIN);
		$client->setKs($ks);

		$playerss = $client->uiConf->listAction();
		$add = array();
		foreach ($playerss as $players) 
			if (is_array($players))
				foreach ($players as $player)
					$add[] = array((string)$player->name,intval($player->id));
		$config['items'] = array_merge($config['items'],$add);
		return $config;
	}

	/**
	 * Function to list videos
	 *
	 * @return array (player key => title)
	 */
	function user_listVideosAction($config) {
		$conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['kaltura']);

		if ($conf['partnerID'] == 0 || $conf['adminSecret'] == '' || $conf['userID'] == '')
		{
			echo Tx_Extbase_Utility_Localization::translate('bad_configuration', 'kaltura');
			die();
		}

		$configuration = t3lib_div::makeInstance('KalturaConfiguration', $conf['partnerID']);
		/**
		 * @var KalturaClient
		 */
		$client = t3lib_div::makeInstance('KalturaClient', $configuration);
		$ks = $client->session->start($conf['adminSecret'], $conf['userID'], KalturaSessionType::ADMIN);
		$client->setKs($ks);

		/**
		 * @var KalturaMediaEntryFilter
		 */
		$filter = t3lib_div::makeInstance('KalturaMediaEntryFilter');
		$filter->statusEqual = KalturaEntryStatus::READY;
		$filter->mediaTypeEqual = KalturaMediaType::VIDEO;
		$mediass = $client->media->listAction($filter);
		$add = array();
		foreach ($mediass as $medias) 
			if (is_array($medias))
				foreach ($medias as $entry)
					$add[] = array((string)$entry->name,(string)$entry->id);
		$config['items'] = array_merge($config['items'],$add);
		return $config;
	}

	/**
	 * Function to list playlists
	 *
	 * @return array (player key => title)
	 */
	function user_listPlaylistsAction($config) {
		$conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['kaltura']);

		if ($conf['partnerID'] == 0 || $conf['adminSecret'] == '' || $conf['userID'] == '')
		{
			echo Tx_Extbase_Utility_Localization::translate('bad_configuration', 'kaltura');
			die();
		}

		$configuration = t3lib_div::makeInstance('KalturaConfiguration', $conf['partnerID']);
		/**
		 * @var KalturaClient
		 */
		$client = t3lib_div::makeInstance('KalturaClient', $configuration);
		$ks = $client->session->start($conf['adminSecret'], $conf['userID'], KalturaSessionType::ADMIN);
		$client->setKs($ks);

		$playlistss = $client->playlist->listAction();
		$add = array();
		foreach ($playlistss as $playlists) 
			if (is_array($playlists))
				foreach ($playlists as $playlist)
					$add[] = array((string)$playlist->name,(string)$playlist->id);
		$config['items'] = array_merge($config['items'],$add);
		return $config;
	}
}
?>
