<h1><?php echo __('CKEditor Plugin Documentation');?></h1>

<h3 style="margin-bottom:0;"><?php echo __('Components');?></h3>
<p style="margin-top:.5em;"><?php echo __(' The CKEditor editor plugin for Wolf consists of a following components:');?>
<ul>
    <li style="list-style:square;margin: 0 0 0 14px">
        <a target="_blank" href="http://ckeditor.com/">CKEditor</a>, <?php echo __('ver3.0.2 (vannila/unmodified, excluding uncompress sources and example files).');?>
    </li>
    <li style="list-style:square;margin: 0 0 0 14px">
        <a target="_blank" href="http://labs.corefive.com/2009/10/30/an-open-file-manager-for-ckeditor-3-0/">Open File Manager for CKEditor</a>, <?php echo __('svn rev16 (slightly modified to make it work/fix some bugs)');?>
    </li>
</ul>

</p>
<h3 style="margin-bottom:0;"><?php echo __('Advance Configuration');?></h3>
<p style="margin-top:0;padding-top:0">
<?php echo sprintf(__('For further customization, you can modify and/or set your own config parameters by editing <code style="font-weight:bold;">ckconfig.js.php</code> (can be found in the root folder of this plugin). Please refer to %s for full list of possible config'),
    '<a href="http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html">CKEditor documentation</a>'
);?>.
</p>

<h3 style="margin-bottom:0;"><?php echo __('Some Notes');?></h3>
<p style="font-size:smaller;margin-top:0;padding-top:0">
**Some code inspired and/or steal from skeleton and <a href="http://www.vanderkleijn.net/frog-cms/plugins/tinymce.html">TinyMCE</a> plugin<br />
**There is no dedicated support page for this time, for questions/feedback, please drop me a line at <strong>rombeh[AT]gmail.com</strong></p>
