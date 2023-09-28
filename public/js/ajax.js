$(document).ready( function(){
    $('.quantity-input').each( function(){
        $(this).change( function(){
            var rowId = $(this).attr('data-row-id');
            var id =  $(this).attr('data-id');
            var qty = $(this).attr('value');
            var _token = $('meta[name="csrf-token"]').attr('content'), 
            data = { id : id , rowId : rowId , qty : qty , _token : _token };
            // console.log(qty);
            $.ajax({
                url : $(this).parent().attr('data-url_process'),
                type: "POST",
                data: data,
                success: function(data ){
                    console.log(data);
                    $(".sub_total_price_"+data.id).html(data.subtotal);
                    $(".cart-page-sidebar .cart-page-sidebar-total-price .sidebar-total-price .total-price-cart").text(data.total_price);
                    $(".cart-inpage-footer .cart-check-out .total-price .total-price-cart").text(data.total_price);
                    $(".cart-inpage-content .cart-product-item .cart-product-"+data.id).text(data.qty);
                },
                error:function(xhr, ajaxOptions,thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
            
        } );
    } );

    $("input[name='categories[]']").each( function(){
        $(this).click(function(){
            // alert($(this).attr('value'));
        });
        
    });
    

    $("#register form ").submit(function(e){

        e.preventDefault();
        // var all = $(this).serialize();
        // console.log(all);
        // var email = $("input[name='email']").val();
        // var password = $("input[name='password']").val();
        // // var password_confirmation = $("input[name='password_confirmation']").val();
        // var _token = $('meta[name="csrf-token"]').attr('content'), 
        // data = { email : email , password : password , _token : _token };
        // console.log(email , password , password_confirmation);
        
        $.ajax({
            url  : $(this).attr('action'),
            method: "post",
            data: $(this).serialize(),
            dataType:'json',
            success: function(data){
                // console.log(typeof data);
                // console.log(data);
                // console.log( data.error.original.errors.email );
                
                if(data.error){

                    if(data.error.original.errors.email){
                        $('#register .error_email_register').text(data.error.original.errors.email);
                    }else{
                        $('#register .error_email_register').text('');
                    }

                    if(data.error.original.errors.password){
                        $('#register .error_password_register').text(data.error.original.errors.password);
                    }else{
                        $('#register .error_password_register').text('');
                    }
                }else{
                    $('#register .error_email_register').text('');
                    $('#register .error_password_register').text('');
                    
                    location.reload(true);
                }
                    
            },
            error:function(xhr, ajaxOptions,thrownError){
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    $("#login form").submit(function(e){

        e.preventDefault();

        // var email = $("input[name='email']").val();
        // var password = $("input[name='password']").val();
        
        // var _token = $('meta[name="csrf-token"]').attr('content'), 
        // data = { email : email , password : password , _token : _token };
        
        $.ajax({
            url  : $(this).attr('action'),
            method: "post",
            data: $(this).serialize(),
            dataType:'json',
            success: function(data){

                // console.log(typeof data);
                // console.log(data);
                // console.log( data.error.original.errors.email );

                if(data.error){

                    if(data.error.original.errors.email){
                        $('#login .error_email_login').text(data.error.original.errors.email);
                    }else{
                        $('#login .error_email_login').text('');
                    }

                    if(data.error.original.errors.password){
                        $('#login .error_password_login').text(data.error.original.errors.password);
                    }else{
                        $('#login .error_password_login').text('');

                    }

                }else{
                    $('#login .error_email_login').text('');
                    $('#login .error_password_login').text('');
                    
                    if(data.errors){
                        if(data.errors.checkLogin){
                            $('#login .error_check_login').text(data.errors.checkLogin);
                        }else{
                            $('#login .error_check_login').text('');
                        }
                        if(data.errors.checkEmail){
                            $('#login .error_email_login').text(data.errors.checkEmail);
                        }else{
                            $('#login .error_email_login').text('');
                        }
                    }else{
                        $('#login .error_check_login').text('');
                        location.reload(true);
                    }
                }

                
            },
            error:function(xhr, ajaxOptions,thrownError){
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    // AJAX CHECKBOX FILTER
    // var categories = [];
    // $('input[name="categories[]"]').on('change', function (e) {
    //     e.preventDefault();
        
    //     categories = []; // reset
    //     $('input[name="categories[]"]:checked').each(function(){
    //         categories.push($(this).val());
    //         console.log(categories);
    //         // console.log($(this).parent().attr('data-process'));
    //         $.ajax({
    //             url  : $(this).parent().attr('data-process'),
    //             method: 'get',
    //             data: { categories:categories },
    //             dataType:'text',
    //             success: function(data){
    //                 console.log(data);
    //             }
    //         });
    //     })
    // });

    // var categories = [];

    // $('input[name="categories[]"]').on('change', function (e) {
    //     e.preventDefault();
        
    //     categories = []; // reset
    //     $('input[name="categories[]"]:checked').each(function(){
    //         categories.push($(this).val());
    //         console.log(categories);
    //         // console.log($(this).parent().attr('data-process'));
    //         $.ajax({
    //             url  : $(this).parent().attr('data-process'),
    //             method: 'get',
    //             data: { categories:categories },
    //             dataType:'text',
    //             success: function(data){
    //                 console.log(data);
    //                 // console.log(window.location.href);
    //                 // $("#result_ajax").html(data);
    //                 // window.history.replaceState(null, null, 
    //                 //     "?category="+data 
    //                 // );
    //             }
    //         });
    //     })
    // });

    
    // Thầy Cuong
    // function filterByBrand() {
    //     let brands = [];
    //     let brandCheckboxes = document.getElementsByName("categories");
    //     // Duyệt qua từng checkbox đề lấy những thương hiệu đã được chọn
    //     for (let i = 0; i < brandCheckboxes.length; i++) {
    //       if (brandCheckboxes[i].checked) {
    //         brands.push(brandCheckboxes[i].value);
    //       }
    //     }
    //     console.log(brands);
    //     // Nối các thương hiệu được chọn với nhau bằng dấu phẩy ','
    //     let brandString = brands.join(",");
    //     // Cập nhật Url với các thương hiệu đã checked
    //     let queryParams = new URLSearchParams(window.location.search);
    //     queryParams.set("filter", brandString);
    //     window.history.replaceState(null, null, "?" + queryParams.toString());
    //     // Bạn có thể sử dụng AJAX để lấy danh sách sản phẩm tương ứng với thương hiệu đã được chọn ở đây
    //     // và cập nhật HTML và hiển thị danh sách sản phẩm đã lọc được.
    // }
} );