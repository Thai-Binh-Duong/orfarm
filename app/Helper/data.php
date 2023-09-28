<?php

function has_child($data , $id){
    foreach( $data as $v ){
        if( $v['parent_cat_id'] == $id ){
            return true;
        }
    }
    return false;
}

/* giải thích
    $data là dữ liệu của tất cả các category bao gồm cả cha và con. $id là dữ liệu id truyền vào.
    foreach $data lấy dữ liệu từng bản ghi , nếu bản ghi có id = $id truyền vào thì trả về true.
    nếu không trả về false.
*/ 
function data_tree( $data , $parent_cat_id = 0 ){
    $datas = json_decode($data,true);
    $result = array();

    foreach( $datas as $v ){
        if( $v['parent_cat_id'] == $parent_cat_id ){
            $result[] = $v ;

            $result_child = array();
            if( has_child( $datas, $v['id'] ) ){
                    $result_child[] = data_tree( $data , $v['id'] );
                    $result = array_merge( $result ,  $result_child );
            }
        }
    }

    return json_encode($result) ;
    // return json_encode($datas) ;
}

/* giải thích
$data là dữ liệu của tất cả các category bao gồm cả cha và con. Bước đầu ta tạo 1 array có tên $result
lặp foreach $data ta nhận về các bản ghi riêng lẻ , kiểm tra xem ID của bản ghi riêng lẻ
có bằng $parent_cat_id = 0 ta đã cho mặc định ở trên không. Nếu có thì nó là cha và 
lưu giá trị level vào bản ghi con = $level=0 như mặc định. Tiếp theo lưu cả bản ghi vào trong mảng $result.
Lúc này trong bản ghi con đã có tất cả các giá trị như name,parent_cat_id,level mà ta cần để lưu vào đatabase.
Tiếp theo tạo $result_child là 1 mảng. Kiểm tra hàm has_child xem trả về true hay false.
Nếu trả về true thì gán giá trị $result_child = data_tree() ... 


Product::whereIn('cat_id', $category )->get();
*/ 

function get_id_data_tree( $data , $parent_cat_id = 0 ){
    $datas = json_decode($data,true);
    $result = array();

    foreach( $datas as $v ){
        if( $v['parent_cat_id'] == $parent_cat_id ){
            $result[] = $v['id'] ;

            $result_child = array();
            if( has_child( $datas, $v['id'] ) ){
                    $result_child[] = data_tree( $data , $v['id'] );
                    $result = array_merge( $result ,  $result_child );
            }
        }
    }

    return $result ;
    // return json_encode($datas) ;
}

function get_child_category( $data , $id ){
    $datas = json_decode($data,true);
    $result = array();

    foreach($datas as $v){

        if($v['id'] == $id ){

            if(has_child( $datas , $id )){
                $datass = json_encode($datas);
                $result[] = get_id_data_tree( $datass , $id);
            }
        }
    }
    return json_encode( $result);
}


function currency( $data = 'đ' ){
    return $data;
}

function weight( $data = 'gram' ){
    return $data;
}

function expiry( $data = 'ngày' ){
    return $data;
}

function money_format($number){
    return number_format($number,0,',','.');
}