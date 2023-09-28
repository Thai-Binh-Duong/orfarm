$(document).ready(function(){
    $('.lightbox-login').hide();
    $('#show-lightbox').click(function () {
        $('.lightbox-login').fadeIn();
        $('.background-dialog').css('display','block');
        $('.close-lightbox').click(function () {
            $('.lightbox-login').hide();
            $('.background-dialog').css('display','none');
        });
        $(('.background-dialog')).click(function(){
            $('.background-dialog').css('display','none');
            $('.lightbox-login').css('display','none');    
        })
    })
    // tab form login setup 
            // B3 (ẩn tất cả các phần tử nội dung trên trang)
            $('.login-form').hide();
            // hiển thị cái đầu tiên
            $('.login-form:first').fadeIn();
            
        $(".login-tab ul li").click(function(){
        // B1 (click tạo .active hiện tại và remove .active cái trước)
            // bỏ tất cả các class active trước khi thêm active vào cái mình click
            $(".login-tab ul li").removeClass('active');
            // thêm class active vào cái mình click
            $(this).addClass('active');
        // B2 (lấy thuộc tính href của a để biết giá trị mình đang click)
            let id_tab_content = $(this).children('a').attr('href');
            // alert(id_tab_content);
        // B4 (hiển thị các tab_content khi click)
            $('.login-form').hide();
            $(id_tab_content).fadeIn();
            return false;
        })
})