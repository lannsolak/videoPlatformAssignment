$(function collapseWithCheckBox(){
    $('#new_upload').change(function(){
        if(this.checked){
            $('#uploadNew').slideDown('slow');
        }else{
            $('#uploadNew').slideUp('slow');
        }
    });
});
