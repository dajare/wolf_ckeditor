<h1><?php echo __('CKEditor Plugin Documentation');?></h1>

<h3 style="margin-bottom:0;"><?php echo __('Components');?></h3>
<p style="margin-top:.5em;"><?php echo __(' The CKEditor editor plugin for Wolf consists of a following components:');?>
<ul style="list-style-type:square;padding-left:1.5em">
    <li>
        <a target="_blank" href="http://ckeditor.com/">CKEditor</a>, <?php echo __('maintained at most recent version, unmodified (excluding  source and example files)');?>
    </li>
    <li>
        <a target="_blank" href="http://labs.corefive.com/2009/10/30/an-open-file-manager-for-ckeditor-3-0/">Open File Manager for CKEditor</a>, <?php echo __('svn rev16 (slightly modified to make it work/fix some bugs)');?>
    </li>
</ul>

</p>
<h3 style="margin-bottom:0;"><?php echo __('Advanced Configuration');?></h3>
<p style="margin-top:0;padding-top:0">
<?php echo sprintf(__('For further customization, you can modify and/or set your own config parameters by editing <code style="font-weight:bold;">ckconfig.js.php</code> (can be found in the root folder of this plugin). Please refer to %s for full list of possible configuration options.'),
    '<a href="http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html">CKEditor documentation</a>'
);?>.
</p>

<h3 style="margin-bottom:0;"><?php echo __('Notes');?></h3>
<ul style="list-style-type:square;padding-left:1.5em">
<li>Some code inspired and/or stolen from <a href="http://www.wolfcms.org/wiki/tutorial:plugin_anatomy">Skeleton</a> and <a href="https://github.com/mvdkleijn/tinymce">TinyMCE</a> plugin: thanks <a href="http://vanderkleijn.net/wolf-cms.html">mvdkleijn</a>!</li>
<li>There is no official maintainer for the CKEditor plugin at this time. For questions/feedback, use the <a href="http://www.wolfcms.org/forum/topic898.html">CKEditor discussion thread</a> in the Wolf CMS Forums. Issues may be logged in the <a href="https://github.com/dajare/wolf_ckeditor/issues">Github repository</a>.</li> 
<li>Thanks to <a href="http://www.goroworks.com/"><strong>rombeh[AT]gmail.com</strong></a> for creating this plugin for Wolf CMS.</li>
</ul>