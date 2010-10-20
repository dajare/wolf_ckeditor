<?php

$version = Plugin::getSetting('version', 'ckeditor');
if (!$version || $version == null) {
    $upgrade = checkOld();
    if ($upgrade) {
        $PDO = Record::getConnection();
        $tablename = TABLE_PREFIX.'ckeditor';
        $sql_check = "SELECT COUNT(*) FROM $tablename";
        $sql = "SELECT * FROM $tablename";
        $result = $PDO->query($sql_check);
        if ($result && $result->fetchColumn() != 1) {
            $result->closeCursor();
            Flash::set('error', __('ckeditor - upgrade needed, but invalid upgrade scenario detected!'));
            return;
        }

        if (!$result) {
            Flash::set('error', __('ckeditor - upgrade need detected earlier, but unable to retrieve table information!'));
            return;
        }
        $result = $PDO->query($sql);
        if ($result && $row = $result->fetchObject()) {
            $settings = array('version' => '1.1',
                              'fileBrowserEnable' => $row->fileBrowserEnable,
                              'fileBrowserRootDir' => $row->fileBrowserRootDir,
                              'fileBrowserRootUri' => $row->fileBrowserRootUri,
                              'urlBrowserEnable' => $row->urlBrowserEnable,
                              'urlBrowserListHidden' => $row->urlBrowserListHidden,
                              'editorContentsCss'=> $row->editorContentsCss,
                              'editorToolbarSet' => $row->editorToolbarSet
                             );
            $result->closeCursor();
        }
        else {
            Flash::set('error', __('ckeditor - upgrade needed, but unable to retrieve old settings!'));
            return;
        }
    }else {
        $defaultFileBrowserImagesdir = dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images';
        $settings = array('version' => '1.1',
                          'fileBrowserEnable' => 1,
                          'fileBrowserRootDir' => $defaultFileBrowserImagesdir,
                          'fileBrowserRootUri' => '/public/images',
                          'urlBrowserEnable' => 1,
                          'urlBrowserListHidden' => 0,
                          'editorContentsCss'=> '',
                          'editorToolbarSet' => 'Full'
                         );
    }
    if (Plugin::setAllSettings($settings, 'ckeditor')) {
        if ($upgrade){
            Flash::set('success', __('ckeditor - plugin settings copied from old installation.'));
        }else{
            Flash::set('success', __('ckeditor - plugin settings initialized.'));
        }
    }else{
        Flash::set('error', __('ckeditor - unable to store plugin settings!'));
    }
}

function checkOld() {
    $tablename = TABLE_PREFIX.'ckeditor';
    $PDO = Record::getConnection();

    $sql = "SELECT COUNT(*) FROM $tablename";

    $result = $PDO->query($sql);

    if ($result != null) {
        $result->closeCursor();
        return true;
    }else{
        return false;
    }
}
