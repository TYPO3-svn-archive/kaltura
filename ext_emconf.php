<?php

########################################################################
# Extension Manager/Repository config file for ext "kaltura".
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Kaltura Video',
	'description' => 'Pixelant Video module for Kaltura - Open source video',
	'category' => 'Mixed',
	'author' => 'Jozef Spisiak',
	'author_email' => 'jozef@pixelant.se',
	'author_company' => 'Pixelant AB',
	'shy' => 0,
	'dependencies' => 'extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.1.0',
	'constraints' => array(
		'depends' => array(
			'php' => '5.3.0-0.0.0',
			'typo3' => '4.5.0-0.0.0',
			'extbase' => '',
			'fluid' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:47:{s:16:"ext_autoload.php";s:4:"8e56";s:21:"ext_conf_template.txt";s:4:"888a";s:12:"ext_icon.gif";s:4:"743e";s:17:"ext_localconf.php";s:4:"f410";s:14:"ext_tables.php";s:4:"00ec";s:14:"ext_tables.sql";s:4:"d41d";s:40:"Classes/Controller/BackendController.php";s:4:"8c81";s:41:"Classes/Controller/VideoBoxController.php";s:4:"230d";s:33:"Classes/Kaltura/KalturaClient.php";s:4:"7bb5";s:37:"Classes/Kaltura/KalturaClientBase.php";s:4:"9486";s:32:"Classes/Kaltura/KalturaEnums.php";s:4:"4703";s:32:"Classes/Kaltura/KalturaTypes.php";s:4:"777a";s:64:"Classes/Kaltura/KalturaPlugins/KalturaAdCuePointClientPlugin.php";s:4:"ea36";s:64:"Classes/Kaltura/KalturaPlugins/KalturaAnnotationClientPlugin.php";s:4:"1caf";s:64:"Classes/Kaltura/KalturaPlugins/KalturaAttachmentClientPlugin.php";s:4:"cf2f";s:59:"Classes/Kaltura/KalturaPlugins/KalturaAuditClientPlugin.php";s:4:"e714";s:61:"Classes/Kaltura/KalturaPlugins/KalturaCaptionClientPlugin.php";s:4:"f9e2";s:67:"Classes/Kaltura/KalturaPlugins/KalturaCaptionSearchClientPlugin.php";s:4:"041b";s:66:"Classes/Kaltura/KalturaPlugins/KalturaCodeCuePointClientPlugin.php";s:4:"636e";s:73:"Classes/Kaltura/KalturaPlugins/KalturaContentDistributionClientPlugin.php";s:4:"caf3";s:62:"Classes/Kaltura/KalturaPlugins/KalturaCuePointClientPlugin.php";s:4:"56ac";s:77:"Classes/Kaltura/KalturaPlugins/KalturaDailymotionDistributionClientPlugin.php";s:4:"237c";s:62:"Classes/Kaltura/KalturaPlugins/KalturaDocumentClientPlugin.php";s:4:"6544";s:77:"Classes/Kaltura/KalturaPlugins/KalturaDoubleClickDistributionClientPlugin.php";s:4:"d119";s:64:"Classes/Kaltura/KalturaPlugins/KalturaDropFolderClientPlugin.php";s:4:"9129";s:77:"Classes/Kaltura/KalturaPlugins/KalturaDropFolderXmlBulkUploadClientPlugin.php";s:4:"d27f";s:62:"Classes/Kaltura/KalturaPlugins/KalturaFileSyncClientPlugin.php";s:4:"64af";s:75:"Classes/Kaltura/KalturaPlugins/KalturaFreewheelDistributionClientPlugin.php";s:4:"3015";s:82:"Classes/Kaltura/KalturaPlugins/KalturaFreewheelGenericDistributionClientPlugin.php";s:4:"b2f5";s:70:"Classes/Kaltura/KalturaPlugins/KalturaHuluDistributionClientPlugin.php";s:4:"c775";s:62:"Classes/Kaltura/KalturaPlugins/KalturaMetadataClientPlugin.php";s:4:"5f1b";s:73:"Classes/Kaltura/KalturaPlugins/KalturaPodcastDistributionClientPlugin.php";s:4:"6f61";s:63:"Classes/Kaltura/KalturaPlugins/KalturaShortLinkClientPlugin.php";s:4:"ca47";s:71:"Classes/Kaltura/KalturaPlugins/KalturaTvComDistributionClientPlugin.php";s:4:"bb82";s:63:"Classes/Kaltura/KalturaPlugins/KalturaVirusScanClientPlugin.php";s:4:"97db";s:73:"Classes/Kaltura/KalturaPlugins/KalturaYouTubeDistributionClientPlugin.php";s:4:"8552";s:76:"Classes/Kaltura/KalturaPlugins/KalturaYoutubeApiDistributionClientPlugin.php";s:4:"9162";s:36:"Configuration/FlexForms/VideoBox.xml";s:4:"812f";s:34:"Configuration/TypoScript/setup.txt";s:4:"b948";s:40:"Resources/Private/Language/locallang.xml";s:4:"efa9";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"d548";s:44:"Resources/Private/Language/locallang_mod.xml";s:4:"f3a8";s:46:"Resources/Private/Templates/Backend/index.html";s:4:"9f25";s:47:"Resources/Private/Templates/VideoBox/index.html";s:4:"e76f";s:54:"Resources/Private/Templates/VideoBox/index.html.backup";s:4:"16fb";s:51:"Resources/Private/Templates/VideoBox/index.html.cdn";s:4:"1276";s:37:"Resources/Public/Icons/moduleicon.gif";s:4:"743e";}',
);

?>