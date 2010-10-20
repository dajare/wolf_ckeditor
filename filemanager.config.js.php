<?php
require_once(dirname(__FILE__) . '/config.php');
$CKEditorConfigs = CKEditorGetConfigs();
?>
var lang = 'php';
var fileRoot = '<?php echo $CKEditorConfigs['fileBrowserRootUri'];?>/';
var showThumbs = true;
