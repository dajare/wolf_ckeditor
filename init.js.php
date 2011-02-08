<?php
$ckeditorPluginURL =  str_replace(basename(__FILE__),'',$_SERVER['PHP_SELF']);
$ckeditorBasePath =  'http://' . $_SERVER['HTTP_HOST'] . '/' . preg_replace('/^\//','',$ckeditorPluginURL) . 'ckeditor/';
$pathtoconfig = dirname($_SERVER['PHP_SELF']); 
$ckeditorConfigFile = $pathtoconfig.'/ckconfig.js.php';
?>
var CKEDITOR_BASEPATH = '<?php echo $ckeditorBasePath;?>';
var CKEDITOR_CONFIG_FILE = '<?php echo $ckeditorConfigFile;?>';