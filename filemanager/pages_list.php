<?php

require_once('../config.php');
require_once('../../../../config.php');

error_reporting(E_ALL);

function startsWith($Haystack, $Needle){
    return strpos($Haystack, $Needle) === 0;
}

function dumpChildren($listhidden = 1, $parent_title = '', $root = 1, $slug = '') {
    $tablename = TABLE_PREFIX.'page';
    if ($slug != '')
        $slug = $slug.'/';

    if ($parent_title != '')
        $parent_title = $parent_title.'/';

    $sql = "SELECT title,slug FROM $tablename WHERE id='$root' AND ".
           ($listhidden ? "(status_id='100' OR (status_id='101' AND is_protected='0'))" : "status_id='100'").
           ' ORDER BY title ASC';

    $PDO = Record::getConnection();
    $PDO->exec("set names 'utf8'");

    $settings = array();

    $stmt = $PDO->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchObject()) {
        if ($root > 1)
            echo ',';
        echo '["'.($result->title == '' ? '' : $parent_title.$result->title).'", "'.URL_PUBLIC.($result->slug == '' ? '' : $slug.$result->slug.URL_SUFFIX).'"]';
        $slug = $slug.$result->slug;
        $parent_title = $parent_title.$result->title;
    }

    $query = "SELECT id FROM $tablename WHERE parent_id='$root' AND ".
           ($listhidden ? "(status_id='100' OR (status_id='101' AND is_protected='0'))" : "status_id='100'").
           ' ORDER BY title ASC';

    $stmt = $PDO->prepare($query);
    $stmt->execute();

    while ($result = $stmt->fetchObject()) {
        dumpChildren($listhidden, $parent_title, $result->id, $slug);
    }
}

print 'var tinyMCELinkList = new Array(';
dumpChildren($listhidden);
print ');';

?>