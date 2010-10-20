function toggleEditor(id, filter) {
    if(filter == 'Ckeditor') {
        try{
            CKEDITOR.replace(id, 
		{
            	    customConfig : '../../../wolf/plugins/ckeditor/ckconfig.js.php',
		    on:{
			instanceReady: function ( evt ){
			    var editor = evt.editor, body = editor.document.getBody();
			    body.setAttribute( 'class', 'CKEditorWolf' );
			}
		    }
		}
	    );
        }catch(err){
            if(typeof(console) !== 'undefined'){
              console.log(err.message);
            }
        }
    } else {
        var cked = CKEDITOR.instances[id];
        if(cked){
            var unsavedData = cked.getData();
            cked.destroy(true);
            var plainTextarea = document.getElementById(id);
            if(plainTextarea){
                plainTextarea.value = unsavedData;
            }
        }
        
        if (Control.TextArea.ToolBar[filter] != null){
          var tb = new Control.TextArea.ToolBar[filter](id);
          var toolbar_name = id + '_toolbar';
          tb.toolbar.container.id = toolbar_name;
        }
    }
}

function setTextAreaToolbar(textarea, filter) {
  filter = ('-'+filter.dasherize()).camelize();
  
  var toolbar_name = textarea + '_toolbar';
  $(textarea).style.display = 'block';
  
  var ul_toolbar = document.getElementById(toolbar_name);
  if (ul_toolbar != null) ul_toolbar.parentNode.removeChild(ul_toolbar);
  
  toggleEditor(textarea, filter);
}
