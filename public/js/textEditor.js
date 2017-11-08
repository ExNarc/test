var editor_config = { 
                selector : "textarea", 
                plugins: "textcolor",
                toolbar1: "undo redo | styleselect | bold italic | fontsizeselect | hilitecolor forecolor backcolor",
                toolbar2: "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
                preview_styles: 'font-size color',
                menubar:false,
                statusbar: false
            }
function userEditor(){
    tinymce.init(editor_config); 
}