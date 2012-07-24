<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

// frontend plugin configuration
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'VideoBox',
	array(
		'VideoBox' => 'index',
	),
	array()
);
?>