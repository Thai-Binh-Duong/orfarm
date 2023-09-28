$(document).ready(function(){
    // tab product image 
            // B3 (ẩn tất cả các phần tử nội dung trên trang)
            $('.library-product-image-tab-content').hide();
            // hiển thị cái đầu tiên
            $('.library-product-image-tab-content:first()').show();
            
        $(".library-product-image-tab>a").click(function(){
        // B1 (click tạo .active hiện tại và remove .active cái trước)
            // bỏ tất cả các class active trước khi thêm active vào cái mình click
            $('.library-product-image-tab>a').removeClass('active');
            // thêm class active vào cái mình click
            $(this).addClass('active');
        // B2 (lấy thuộc tính href của a để biết giá trị mình đang click)
            var link_click_tab = $(this).attr('href');
            console.log(link_click_tab);
        // B4 (hiển thị các tab_content khi click)
            $('.library-product-image-tab-content').hide();
            $(link_click_tab).show();
            // return false;
        })
    // tab content description product
        // ẩn hết nội dung
        $('.tab-description-detail-content>div').hide();
        // hiển thị phẩn tử đầu tiên
        $('.tab-description-detail-content>div:first()').show();
        $('.tab-description-detail-title>ul>li').click(function(){
            // B1 click tạo class active hiện tại và remove class active trước đó
            // (đầu tiên remove hết tất cả class active rồi mới thêm class active vào click hiện tại)
            $('.tab-description-detail-title>ul>li').removeClass('active');
            $(this).addClass('active');
            // B2 lấy thuộc tính href mình đang click để cho content được show ra
            // trước đó phải ra ngoài ẩn hết tất cả content, chỉ hiển thị phần tử đầu tiên
            var t = $(this).children('a').attr('id');
            console.log(t+'-content');
            // B3 hiển thị content tương ứng khi mình click
            // trước đó phải ẩn hết tất cả phần tử đi trước 
            $('.tab-description-detail-content>div').hide();
            $('#'+t+'-content').fadeIn(1000);
        });

    // change quantity by button plus and minus in cart show
    $(".list-items-cart").each(function(){
        var number = $(this).find('.quantity-input').attr('value');

        $(this).find('.minus-quantity').click(function(){
            if( number >= 2){
                var prev_number = --number;
                $(this).next().attr('value',prev_number);
                $(this).next().val(prev_number);
                $(this).next().change();
            }else{
                $(this).next().val('1');
            }
        })
        $(this).find('.plus-quantity').click(function(){
            if( number < $(this).prev().attr('max') ){
            var next_number = ++number;
                $(this).prev().attr('value',next_number);
                $(this).prev().val(next_number);
                $(this).prev().change();
            }else{
                $(this).prev().attr('value',$(this).prev().attr('max'));
                $(this).prev().val($(this).prev().attr('max'));
                $(this).prev().change();
            }
        })
    })

    // change quantity by button plus and minus in product detail
    var number = $('.product-detail .product-detail-infomation .qty-input').attr('value');

    $('.product-detail .product-detail-infomation .minus-quantity').click(function(){
        if( number >= 2){
            var prev_number = --number;
            $(this).next().attr('value',prev_number);
            $(this).next().val(prev_number);
            $(this).next().change();
        }else{
            $(this).next().val('1');
        }
    })
    $('.product-detail .product-detail-infomation .plus-quantity').click(function(){
        if( number < $(this).prev().attr('max') ){
        var next_number = ++number;
            $(this).prev().attr('value',next_number);
            $(this).prev().val(next_number);
            $(this).prev().change();
        }else{
            $(this).prev().attr('value',$(this).prev().attr('max'));
            $(this).prev().val($(this).prev().attr('max'));
            $(this).prev().change();
        }
    })
})