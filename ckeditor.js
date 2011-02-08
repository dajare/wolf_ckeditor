$(document).ready(function() {
    $('.filter-selector').bind('wolfSwitchFilterOut', function(event, filtername, elem) {
        if (filtername == 'ckeditor') {
            var cked = CKEDITOR.instances[elem.attr('id')];
            if (cked) {
                elem[0].value = cked.getData();
                cked.destroy(true);
            }
        }
    });
    
    $('.filter-selector').bind('wolfSwitchFilterIn', function(event, filtername, elem) {
        if (filtername == 'ckeditor') {
            try {
                CKEDITOR.replace(elem.attr('id'), {
                    customConfig : CKEDITOR_CONFIG_FILE,
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