<?php
$extensionClassesPath = t3lib_extMgm::extPath('kaltura') . 'Classes/';

return array(
	'kalturaclient'								=> $extensionClassesPath . 'Kaltura/KalturaClient.php',
	'kalturaconfiguration'						=> $extensionClassesPath . 'Kaltura/KalturaClient.php',
	'tx_kaltura_controller_videoboxcontroller'	=> $extensionClassesPath . 'Controller/VideoBoxController.php'
);
?>