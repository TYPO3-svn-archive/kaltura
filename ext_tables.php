<?php
if (!defined('TYPO3_MODE'))
	die('Access denied.');

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'kaltura');

Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, // The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
'VideoBox', // A unique name of the plugin in UpperCamelCase
'LLL:EXT:kaltura/Resources/Private/Language/locallang_db.xml:videobox'	// A title shown in the backend dropdown field
);

$TCA['tt_content']['types']['list']['subtypes_excludelist']['kaltura_videobox'] = 'layout,select_key';
$TCA['tt_content']['types']['list']['subtypes_addlist']['kaltura_videobox'] = 'pi_flexform';

require_once(PATH_site.'typo3conf/ext/kaltura/Classes/Controller/VideoBoxController.php');
require_once(PATH_site.'typo3conf/ext/kaltura/Classes/Kaltura/KalturaClient.php');

if (TYPO3_MODE == 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL))
{
	/**
	 * Registers a Backend Module
	 */
	Tx_Extbase_Utility_Extension::registerModule($_EXTKEY, 'user', // Make module a submodule of 'web'
	'kaltura', // Submodule key
	'before:setup', // Position
	array(
	// An array holding the controller-action-combinations that are accessible
	'Backend' => 'index'), array('access' => 'user,group', 'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/moduleicon.gif', 'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml:kaltura', 'navigationComponentId' => '', ));

}

// add flexform definition
if (is_array($TCA['tt_content']['columns']) && is_array($TCA['tt_content']['columns']['pi_flexform']['config']['ds']))
{
	$TCA['tt_content']['columns']['pi_flexform']['config']['ds']['kaltura_videobox'] = 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/VideoBox.xml';
}
?>
