$(function(){

    // categorias	
    var addCheckboxCat = function(id){
        
        if($('#categorias input:checkbox[value="'+id+'"]').length || id == 0){
            return false;
        }
        
        var nome = $('#categorias select option.cat'+ id).attr('nome_completo');
        var idpai = $('#categorias select option.cat'+ id).attr('idpai');
        var html = '<div class="campo block"><span><input type="checkbox" name="dados[categorias][]" idpai="'+idpai+'" value="'+id+'" checked="cheched" /></span><span class="input">'+ nome +'</span><br class="clearfix"/></div>';
       
        addCheckboxCat(idpai);
        $('#categorias').append(html);
    };

    $('#categorias a.add').click(function(){
        var id = $('#categorias select').val();
        addCheckboxCat(id);
    });  
});
