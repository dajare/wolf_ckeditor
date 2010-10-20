<?php
function substrtruncate($string, $needle) {
    return substr($string, 0, strrpos($string, $needle)+1);
}
require_once(substrtruncate($_SERVER['SCRIPT_FILENAME'], '/plugins').'../config.php'); // took out dots ../config.php
require_once(substrtruncate($_SERVER['SCRIPT_FILENAME'], '/plugins').'/Framework.php');

function CKEditorGetConfigs($key=null){
    $tablename = TABLE_PREFIX.'plugin_settings';
    try {
        $PDO = new PDO(DB_DSN, DB_USER, DB_PASS);
        if ($PDO->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql'){
            $PDO->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        }
    }catch (PDOException $error) {
        try {
            require_once(substrtruncate($_SERVER['SCRIPT_FILENAME'], '/plugins').'/libraries/DoLite.php');
            $PDO = new DoLite(DB_DSN, DB_USER, DB_PASS);
	}catch (PDOException $error) {
            die('DB Connection failed: '.$error->getMessage());
        }
    }
    Record::connection($PDO);
    $PDO = Record::getConnection();
    $PDO->exec("set names 'utf8'");
    $sql = "SELECT name,value FROM $tablename WHERE plugin_id='ckeditor'";

    $settings = array();

    $stmt = $PDO->prepare($sql);
    $stmt->execute();

    while ($obj = $stmt->fetchObject()) {
        $settings[$obj->name] = $obj->value;
    }

	// language setting
 /**/	AuthUser::load();
	$settings['editorLanguage'] = AuthUser::getRecord()->language; /**/
    if($settings){
        if($key && in_array($key, $settings)){
            return $settings[$key];
        }else{
            // return all
            return $settings;
        }
    }
    return false;
}
