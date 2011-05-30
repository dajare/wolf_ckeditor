<?php
$pluginDir = dirname($_SERVER['PHP_SELF']);
require_once(dirname(__FILE__) . '/config.php'); // took out leading / from config.php
$CKEditorConfigs = CKEditorGetConfigs();
?>
CKEDITOR.editorConfig = function( config )
{
<?php /** language **/?>
config.language = '<?php echo $CKEditorConfigs['editorLanguage']; ?>';

<?php /** filebrowser settings, if enabled **/?>
<?php if( $CKEditorConfigs['fileBrowserEnable'] == 1):?>
config.filebrowserBrowseUrl = '<?php echo $pluginDir;?>/filemanager/index.html';
<?php endif;?>

<?php /** toolbar **/?>
<?php if( $CKEditorConfigs['editorToolbarSet'] != 'Full' ):?>
config.toolbar = 'Basic';
config.toolbar_Basic = [ ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'], ['Image','Flash','-','About'] ];
<?php endif;?>

<?php /** content css, if defined **/?>
<?php if( !empty($CKEditorConfigs['editorContentsCss']) ):?>
config.contentsCss = '<?php echo $CKEditorConfigs['editorContentsCss'];?>';
<?php endif;?>

<?php /** styles set, if defined **/?>
<?php if( !empty($CKEditorConfigs['editorStylesSet']) ):?>
config.stylesSet = 'my_styles:<?php echo $CKEditorConfigs['editorStylesSet'];?>';
<?php endif;?>
};
