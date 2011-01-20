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


Plugin::setInfos(array(
    'id'          => 'ckeditor',
    'title'       => __('CKEditor'),
    'description' => __('CKEditor Text Filter v. 3.5'),
    'version'     => '1.2',
    'license'     => 'GPLv3',
    'author'      => 'Andri Kusumah (Goroworks); updated by David Reimer',
    'website'     => 'http://www.goroworks.com/',
    'update_url'  => 'http://adajer.byethost5.com/public/plugins.xml',
    'require_wolf_version' => '0.7.3'
));
Plugin::addController('ckeditor', __('CKEditor'), 'administrator', false);
Filter::add('ckeditor', 'ckeditor/filter_ckeditor.php');
Plugin::addController('ckeditor', 'ckeditor', 'administrator,developer', false);
Plugin::addJavascript('ckeditor', 'init.js.php');
Plugin::addJavascript('ckeditor', 'ckeditor/ckeditor.js');