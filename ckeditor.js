$(document).ready(function() {
    $('.filter-selector').bind('wolfSwitchFilterOut', function(event, filtername, elem) {
        if (filtername == 'ckeditor') {
            var cked = CKEDITOR.instances[elem.attr('id')];
            if (cked) {
                var unsavedData = cked.getData();
                cked.destroy(true);
                var plainTextarea = elem;
                if (plainTextarea) {
                    plainTextarea.value = unsavedData;
                }
            }
        }
    });
    
    $('.filter-selector').bind('wolfSwitchFilterIn', function(event, filtername, elem) {
        if (filtername == 'ckeditor') {
            try {
                CKEDITOR.replace(elem.attr('id'), {
                    customConfig : 'wolf/plugins/ckeditor/ckconfig.js.php',
                    on: {
                        instanceReady: function(evt) {
                            var editor = evt.editor, body = editor.document.getBody();
                            body.setAttribute( 'class', 'CKEditorWolf' );
                        }
                    }
                });
            } catch(err) {
                if (typeof(console) !== 'undefined') {
                    console.log(err.message);
                }
            }
        }
    });
});