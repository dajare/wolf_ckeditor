<h1><?php echo __('CKEditor plugin - Preferences');?></h1>
<div style="padding: 1em 0">
<form action="<?php echo get_url('plugin/ckeditor/save'); ?>" method="post">
    <!-- TODO: IMPLEMENT THIS! -->

    <fieldset style="padding: 0.5em;margin-bottom: 1em;display:none">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('Pages URL Browser'); ?></legend>
        <div class="fieldset" style="padding: .5em 0">
            <input name="urlBrowserEnable" type="checkbox" <?php echo ($urlBrowserEnable ? 'checked="true"' : ''); ?>/>
            <label for="urlBrowserEnable" style="padding-left: .4em;"><?php echo __('Enable Url Browser:'); ?></label>
            <p class="help" style="font-size:93%;padding-top:2px;margin-top:0;color: #666;font-style:italic"><?php echo __('Enable/Disable Url Browser Functionality.'); ?></p>
        </div>
        <div class="fieldset" style="padding: .5em 0">
            <input name="urlBrowserListHidden" type="checkbox" <?php echo ($urlBrowserListHidden ? 'checked="true"' : ''); ?>/>
            <label for="urlBrowserListHidden" style="padding-left: .4em;"><?php echo __('List <strong>hidden</strong> pages:'); ?></label>
            <p class="help" style="font-size:93%;padding-top:2px;margin-top:0;color: #666;font-style:italic"><?php echo __('Also lists non-protected hidden pages.'); ?></p>
        </div>
    </fieldset>


    <fieldset style="padding: 0.5em;margin-bottom: 1em;">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('file browser'); ?></legend>
        <div class="fieldset" style="padding: .5em 0">
            <input name="fileBrowserEnable" type="checkbox" <?php echo ($fileBrowserEnable ? 'checked="true"' : ''); ?>/>
            <label for="fileBrowserEnable" style="padding-left: .4em;"><?php echo __('Enable file browser integration:');?> </label>
            <p class="help" style="font-size:93%;padding-top:2px;margin-top:0;color: #666;font-style:italic"><?php echo __('Enable/disable <strong>File Browser</strong> integration.'); ?></p>
        </div>
        <div class="fieldset" style="padding: .5em 0;display: none;">
            <label for="fileBrowserRootDir" style="display:block"><?php echo __('Root files directory:');?> </label>
            <input name="fileBrowserRootDir" type="text" size="35" maxsize="255" value="<?php echo $fileBrowserRootDir;?>" style="padding: 4px 8px;"/>
            <p class="help" style="font-size:93%;padding-top:2px;margin-top:0;color: #666;font-style:italic">
                <?php echo __('Absolute path to images on disk, eg. <code>/home/user/www/public/images</code>');?>
            </p>
        </div>
        <div class="fieldset" style="padding: .5em 0">
            <label for="fileBrowserRootUri"  style="display:block"><?php echo __('File browser root directory:');?> </label>
            <input name="fileBrowserRootUri" type="text" size="35" maxsize="255" value="<?php echo $fileBrowserRootUri;?>" style="padding: 4px 8px;"/>
            <p class="help" style="font-size:93%;padding-top:2px;margin-top:0;color: #666;font-style:italic">
            <?php echo __('Relative directory URL to browse (without trailing slash!), e.g. <code>/public/images</code>');?>
            </p>
        </div>
    </fieldset>

    <fieldset style="padding: 0.5em;margin-bottom: 1em;">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('Editor Options');?></legend>
        <div class="fieldset" style="padding: .5em 0">
            <label for="editorToolbarSet"><?php echo __('Toolbar Set:');?> </label>
            <select name="editorToolbarSet">
                <?php  $toolbars = array('Full Toolbar' => 'Full', 'Basic Toolbar' => 'Basic');
                foreach($toolbars as $name=>$val):?>
                    <option value="<?php echo $val;?>" <?php echo ($editorToolbarSet == $val ? 'selected="selected" ' : null);?>>
                        <?php echo $name;?>
                    </option>
                <?php endforeach;?>
            </select>
            <p class="help" style="font-size:93%;padding-top:2px;margin-top:0;color: #666;font-style:italic"><?php echo __('Editor toolbar set');?></p>
        </div>
        <div class="fieldset" style="padding: .5em 0">
            <label for="editorContentsCss"  style="display:block"><?php echo __('Content css url:');?> </label>
            <input name="editorContentsCss" type="text" size="35" maxsize="255" value="<?php echo $editorContentsCss;?>" style="padding: 4px 8px;"/>
            <p class="help" style="font-size:93%;padding-top:2px;margin-top:0;color: #666;font-style:italic"><?php echo __('Optional, relative URL to your css file, e.g <code>/public/theme/wolf/style.css</code>, you can leave it blank to use default style');?></p>
        </div>
        <div class="fieldset" style="padding: .5em 0">
            <label for="editorStylesSet"  style="display:block"><?php echo __('Styles set url:');?> </label>
            <input name="editorStylesSet" type="text" size="35" maxsize="255" value="<?php echo $editorStylesSet;?>" style="padding: 4px 8px;"/>
            <p class="help" style="font-size:93%;padding-top:2px;margin-top:0;color: #666;font-style:italic"><?php echo __('Optional, relative URL to your js file, e.g <code>/public/theme/wolf/js/styles_set.js</code>, you can leave it blank to use default styles set');?></p>
        </div>
    </fieldset>
    <p class="buttons">
        <input class="button" name="commit" type="submit" accesskey="s" value="<?php echo __('Save');?>" />
    </p>
</form>
</div>
