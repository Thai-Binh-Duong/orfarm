$(document).ready(function(e){
    // e.preventDefault();
    $('#show-form-search').click(function(){
        $('.background-dialog').css('display','block');
        $('.modal-search').css('display','block');
            $('.close-search-form').click(function(){
                $('.background-dialog').css('display','none');
                $('.modal-search').css('display','none');
                
            });
            $(('.background-dialog')).click(function(){
                $('.background-dialog').css('display','none');
                $('.modal-search').css('display','none');    
            })
        
    })
})