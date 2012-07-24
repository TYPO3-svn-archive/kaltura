<?php
if (!defined('TYPO3_MODE'))
	die('Access denied.');

// register plugin for the frontend
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'VideoBox',
	'LLL:EXT:kaltura/Resources/Private/Language/locallang_db.xml:videobox'
);
// remove not needed fields
$TCA['tt_content']['types']['list']['subtypes_excludelist']['kaltura_videobox'] = 'layout,select_key';

if (TYPO3_MODE == 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL))
{
	// Register a backend module
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY, 
		'user',
		'kaltura',
		'before:setup',
		array(
			'Backend' => 'index'
		), 
		array(
			'access' => 'user,group', 
			'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/moduleicon.gif', 
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml:kaltura', 
			'navigationComponentId' => ''
		)
	);
}

// add flexform definition
$TCA['tt_content']['types']['list']['subtypes_addlist']['kaltura_videobox'] = 'pi_flexform';
if (is_array($TCA['tt_content']['columns']) && is_array($TCA['tt_content']['columns']['pi_flexform']['config']['ds']))
{
	$TCA['tt_content']['columns']['pi_flexform']['config']['ds']['kaltura_videobox'] = 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/VideoBox.xml';
}
?>
