$(document).ready(function(){
    $(document).on('click','.click-show-menu,.click-hide-menu',function(e){
        e.preventDefault(); // ngăn trang load lại
        if($(this).hasClass('click-show-menu')){
            $('.click-show-menu').css('display','block');
            $('.click-hide-menu').css('display','none');
            $('.child-filter').slideUp();
            $(this).parents('li:first').next().find('.child-filter').slideDown();
            $(this).css('display','none');
            $(this).next().css('display','block');
        }else if($(this).hasClass('click-hide-menu')){
            $(this).parents('li:first').next().find('.child-filter').slideUp();
            $(this).css('display','none');
            // console.log($(this).prev().html()); 
            $(this).prev().css('display','block');
    };
    
});
    $('.filter-icon').click(function(){
        $('.sidebar-left').css({'position':'fixed','top':'0%','left':'0%','display':'block','height':'100%','z-index':'2','overflow':'auto','border-radius':'0px'});
        $('.filter').css('border-radius','0px');
        $('.background-dialog').css('display','block');
        $('.background-dialog').click(function(){
            $('.sidebar-left').css('display','none');
            $('.background-dialog').css('display','none');
        })
        $('.close-lightbox').click(function(){
            $('.sidebar-left').css('display','none');
            $('.background-dialog').css('display','none');
            $('.close-lightbox').css('display','none');
        })
         
    })
})