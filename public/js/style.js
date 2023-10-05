$(document).ready(function () {
    // slider
     // banner
    $('.slider-banner').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        navText:['<i class="fa-solid fa-angle-left"></i>','<i class="fa-solid fa-angle-right"></i>'],
        dots:true,
        responsive:{
            0:{
                items:1
            }
        }
    });
    // product
    $('#product-first').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        navText:['<i class="fa-solid fa-angle-left"></i>','<i class="fa-solid fa-angle-right"></i>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            300: {
                items: 1
            },
            400: {
                items: 2
            },
            500: {
                items: 2
            },
            630: {
                items: 3
            },
            768: {
                items: 3
            },
            900: {
                items: 4
            },
            1024: {
                items: 5
            },
            1241: {
                items: 5
            },
            1350: {
                items: 6,
            }
        }
    });
    $('#all-product').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        navText:['<i class="fa-solid fa-angle-left"></i>','<i class="fa-solid fa-angle-right"></i>'],
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            300: {
                items: 1
            },
            400: {
                items: 2
            },
            500: {
                items: 2
            },
            630: {
                items: 3
            },
            768: {
                items: 3
            },
            900: {
                items: 4
            },
            1024: {
                items: 5
            },
            1241: {
                items: 5
            },
            1350: {
                items: 6,
            }
        }
    });
    $('#fresh-meat').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        navText:['<i class="fa-solid fa-angle-left"></i>','<i class="fa-solid fa-angle-right"></i>'],
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            300: {
                items: 1
            },
            400: {
                items: 2
            },
            500: {
                items: 2
            },
            630: {
                items: 3
            },
            768: {
                items: 3
            },
            900: {
                items: 4
            },
            1024: {
                items: 5
            },
            1241: {
                items: 5
            },
            1350: {
                items: 6,
            }
        }
    });
    $('#fresh-vegetable').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        navText:['<i class="fa-solid fa-angle-left"></i>','<i class="fa-solid fa-angle-right"></i>'],
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            300: {
                items: 1
            },
            400: {
                items: 2
            },
            500: {
                items: 2
            },
            630: {
                items: 3
            },
            768: {
                items: 3
            },
            900: {
                items: 4
            },
            1024: {
                items: 5
            },
            1241: {
                items: 5
            },
            1350: {
                items: 6,
            }
        }
    });
    
    $('#blog-content').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        navText:['<i class="fa-solid fa-angle-left"></i>','<i class="fa-solid fa-angle-right"></i>'],
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            768: {
                items: 2
            },
            900: {
                items: 3
            },
            1025: {
                items: 4
            }
        }
    });
    // tab hot item setup 
    // B3 (ẩn tất cả các phần tử nội dung trên trang)
    $('.list-hot-product').hide();
    $('.list-hot-product:first').fadeIn();

    $(".list-hot-item ul li").click(function () {
        // B1 (click tạo .active hiện tại và remove .active cái trước)
        // bỏ tất cả các class active trước khi thêm active vào cái mình click
        $(".list-hot-item ul li").removeClass('active');
        // thêm class active vào cái mình click
        $(this).addClass('active');
        // B2 (lấy thuộc tính href của a để biết giá trị mình đang click)
        let id_tab_content = $(this).children('a').attr('href');
        // alert(id_tab_content);
        // B4 (hiển thị các tab_content khi click)
        $('.list-hot-product').hide();
        $(id_tab_content).fadeIn();
        return false;
    })

    // mobile menu 
    $('.mobile-menu-icon').click(function(){
        $('.background-dialog').css('display','block');
        $('.menu-mobile').css('display','block');
            $('.close-mobile-menu').click(function(){
                $('.background-dialog').css('display','none');
                $('.menu-mobile').css('display','none');
            });
            $('.background-dialog').click(function(){
                $('.background-dialog').css('display','none');
                $('.menu-mobile').css('display','none');    
            })
    })
    
    // mobibe menu content
    $('.menu-mobile-content>.main-sub-menu-mobile>.main-sub-menu-mobile-item>a>span>i:first-child').hide();
            $('.menu-mobile-content>.main-sub-menu-mobile>.main-sub-menu-mobile-item>a>span>i:last-child').show();
            $('.hide-main-sub-menu-mobile').hide();
            $('.menu-mobile-content>.main-sub-menu-mobile>.main-sub-menu-mobile-item>a').click(function(){
                $(this).next().slideToggle();
    })
    
});