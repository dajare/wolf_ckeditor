<?php
/*
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * The CKEditor plugin for Wolf cms
 *
 * @package wolf
 * @subpackage plugin.ckeditor
 *
 * @author Andri Kusumah <rombeh@gmail.com>
 * @version 1.0
 * @since Wolf version 0.5.5
 * @license http://www.gnu.org/licenses/gpl.html GPL License
 * @copyright Andri Kusumah, 2009
 */

class CkeditorController extends PluginController {
    public function __construct() {
        AuthUser::load();
        if ( ! AuthUser::isLoggedIn()) {
            redirect(get_url('login'));
        }
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/ckeditor/views/sidebar'));
    }

    public function index() {
        $this->documentation();
    }

    public function documentation() {
        $this->display('ckeditor/views/documentation');
    }

    function settings() {
        $this->display('ckeditor/views/settings', Plugin::getAllSettings('ckeditor'));
    }

    public function save() {
        $tablename = TABLE_PREFIX.'ckeditor';

        if (!array_key_exists('urlBrowserEnable', $_POST)){
            $urlBrowserEnable = '0';
        }else{
            $urlBrowserEnable = '1';
        }

        if (!array_key_exists('urlBrowserListHidden', $_POST)){
            $urlBrowserListHidden = '0';
        }else{
            $urlBrowserListHidden = '1';
        }

        if (!array_key_exists('fileBrowserEnable', $_POST)){
            $fileBrowserEnable = '0';
        }else{
            $fileBrowserEnable = '1';
        }

        if (!array_key_exists('fileBrowserRootDir', $_POST) ||
            !array_key_exists('fileBrowserRootUri', $_POST) ||
            !array_key_exists('editorContentsCss', $_POST) ||
            !array_key_exists('editorStylesSet', $_POST) ||
            !array_key_exists('editorToolbarSet', $_POST)
        ){
            Flash::set('error', 'CKEditor - '.__('form was not posted.'));
            redirect(get_url('plugin/ckeditor/settings'));
        } else {
            $fileBrowserRootDir = $_POST['fileBrowserRootDir'];
            $fileBrowserRootUri = $_POST['fileBrowserRootUri'];
            $editorContentsCss = $_POST['editorContentsCss'];
            $editorStylesSet = $_POST['editorStylesSet'];
            $editorToolbarSet = $_POST['editorToolbarSet'];
            if ($fileBrowserRootDir[strlen($fileBrowserRootDir)-1] == '/' || $fileBrowserRootDir[strlen($fileBrowserRootDir)-1] == '\\'){
                $fileBrowserRootDir = substr($fileBrowserRootDir, 0, strlen($fileBrowserRootDir)-1);
            }

            if ($fileBrowserRootUri[strlen($fileBrowserRootUri)-1] == '/' || $fileBrowserRootUri[strlen($fileBrowserRootUri)-1] == '\\'){
                $fileBrowserRootUri = substr($fileBrowserRootUri, 0, strlen($fileBrowserRootUri)-1);
            }
        }

        if(empty($fileBrowserRootDir) || empty($fileBrowserRootUri) ) {
            Flash::set('error', 'CKEditor - '.__('one of the fields was empty, please try again!'));
            redirect(get_url('plugin/ckeditor/settings'));
        }else {
            $settings = array('urlBrowserEnable' => $urlBrowserEnable,
                              'urlBrowserListHidden' => $urlBrowserListHidden,
                              'fileBrowserEnable' => $fileBrowserEnable,
                              'fileBrowserRootDir' => $fileBrowserRootDir,
                              'fileBrowserRootUri' => $fileBrowserRootUri,
                              'editorContentsCss'=> $editorContentsCss,
                              'editorStylesSet'=> $editorStylesSet,
                              'editorToolbarSet' => $editorToolbarSet
            );

            if (Plugin::setAllSettings($settings, 'ckeditor')){
                Flash::set('success', 'CKEditor - '.__('plugin settings saved.'));
            }else{
                Flash::set('error', 'CKEditor - '.__('plugin settings not saved!'));
            }
            redirect(get_url('plugin/ckeditor/settings'));
        }
    }
}
