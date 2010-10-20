<?php
$ckeditorPluginURL =  str_replace(basename(__FILE__),'',$_SERVER['PHP_SELF']);
$ckeditorBasePath =  'http://' . $_SERVER['HTTP_HOST'] . '/' . preg_replace('/^\//','',$ckeditorPluginURL) . 'ckeditor/';
?>
var CKEDITOR_BASEPATH = '<?php echo $ckeditorBasePath;?>';