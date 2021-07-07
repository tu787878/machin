<?php
/**
 * Plugin Name: Mach In Plugin
 * Description: bao gia tu dong mach in By Tudc
 * Version: 1.0
 * License: GPLv2 or later
 */


require plugin_dir_path( __FILE__ ) . '/inc/uploadfile.php';
require plugin_dir_path( __FILE__ ) . '/inc/licheche.php';


function themeslug_enqueue_style() {
    wp_enqueue_style( 'animatestyle', plugin_dir_url( __FILE__ ) . 'assets/animate.css', false );
    wp_enqueue_style( 'bsstyle', plugin_dir_url( __FILE__ ) . 'assets/bootstrap.min.css', false );
    wp_enqueue_style( 'font', plugin_dir_url( __FILE__ ) . 'assets/font-awesome.css', false );
    wp_enqueue_style( 'slickstyle', plugin_dir_url( __FILE__ ) . 'assets/slick.css', false );
    wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . 'assets/style.css', false );
    wp_enqueue_style( 'menu', plugin_dir_url( __FILE__ ) . 'assets/menu.css', false );
    wp_enqueue_style( 'mobile', plugin_dir_url( __FILE__ ) . 'assets/mobile.css', false );
    wp_enqueue_style( 'noti', plugin_dir_url( __FILE__ ) . 'assets/pnotify.custom.min.css', false );
}
 
function themeslug_enqueue_script() {
    wp_enqueue_script( 'jqueryx', plugin_dir_url( __FILE__ ) . 'assets/jquery.js', false );

    wp_register_script( "commonx", plugin_dir_url( __FILE__ ) . 'assets/common.js', false  );
    wp_enqueue_script( "svg", plugin_dir_url( __FILE__ ) . 'assets/svg-support.js', false  );

    wp_enqueue_script( 'gerberx', plugin_dir_url( __FILE__ ) . 'assets/gerber.js', false );
    wp_enqueue_script( 'stackup', plugin_dir_url( __FILE__ ) . 'assets/stackup.js', false );
    wp_enqueue_script( 'online_pcb_quote', plugin_dir_url( __FILE__ ) . 'assets/online_pcb_quote.js', false );

    wp_localize_script( 'commonx', 'ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));  
    wp_localize_script( 'commonx', 'machin', array( 'home' => get_home_url()));  
    wp_enqueue_script( 'commonx');

}
 
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );


add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_data', 10, 3 );
 
function add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
     // get product id & price
    $cart_item_data['data_id'] =  $_GET['data_id'];

    return $cart_item_data;
}

add_action( 'woocommerce_before_calculate_totals', 'before_calculate_totals', 10, 1 );
 
function before_calculate_totals( $cart_obj ) {
    
    // Iterate through each cart item
    foreach( $cart_obj->get_cart() as $key=>$value ) {
        if( isset( $value['data_id'] ) ) {
            global $wpdb;
            $table = "wp_machin_order_data";

            $order = $wpdb->get_row("SELECT * FROM $table WHERE order_id = '". $value['data_id'] ."'");
            //var_dump($order);
            if($order != null){
                $value['data']->set_price( $order->price );
            }else{
                $value['data']->set_price(0);
                //echo "<div style='color:red;'>Lỗi item! Vui lòng xóa sản phẩm 0 VND và thử lại.</div>";
            }
            
        }
    }
}


//new_mobile_code
add_action("wp_ajax_add_to_card", 'add_to_card');
add_action("wp_ajax_nopriv_add_to_card", 'add_to_card');

function add_to_card(){

    $data = $_POST['data'];
    global $wpdb;

    $table = "wp_machin_order_data";
    $status = $wpdb->query("INSERT INTO $table (order_id, price, type_pcb, width, height, quantity, layers, type_order, dichte, dichte_done, distant, size_khoan, color, text_color, interface, test, note, file) VALUES ('". $data['order_id'] ."', ". $data['price'] .", '". $data['type_pcb'] ."', '". $data['width'] ."', '". $data['height'] ."', '". $data['quantity'] ."', '". $data['layers'] ."', '". $data['type_order'] ."', '". $data['dichte'] ."', '". $data['dichte_done'] ."', '". $data['distant'] ."', '". $data['size_khoan'] ."', '". $data['color'] ."', '". $data['text_color'] ."', '". $data['interface'] ."', '". $data['test'] ."', '". $data['note'] ."', '". $data['file'] ."')");
    if($data['isStencil'] == 1){
        $wpdb->query("UPDATE $table SET loai_stencil = '". $data['stencil']['loai_stencil'] ."', danh_bong = '". $data['stencil']['danh_bong'] ."', mat_stencil = '". $data['stencil']['mat_stencil'] ."', kich_thuoc = '". $data['stencil']['kich_thuoc'] ."', quantity_2 = '".  $data['stencil']['quantity_2'] ."', do_day = '". $data['stencil']['do_day']  ."', note_2 = '".  $data['stencil']['note_2'] ."', isStencil = 1 WHERE order_id = '". $data['order_id']  ."'");
    }

    if($data['isAssembly'] == 1){
        $wpdb->query("UPDATE $table SET side = '". $data['assembly']['side'] ."', diem_han_smd = '". $data['assembly']['diem_han_smd'] ."', diem_han_dip = '". $data['assembly']['diem_han_dip'] ."', linh_kien_dan = '". $data['assembly']['linh_kien_dan'] ."', linh_kien_gan = '". $data['assembly']['linh_kien_gan'] ."', dong_goi = '". $data['assembly']['dong_goi'] ."', xac_nhan = '". $data['assembly']['xac_nhan'] ."', height_2 = '". $data['assembly']['height_2'] ."', width_2 = '". $data['assembly']['width_2'] ."', isAssembly = 1 WHERE order_id = '". $data['order_id'] ."'");
    }

    if($data['panel'] == 1){
        $wpdb->query("UPDATE $table SET panel = 1, col_panel = '". $data['col_panel'] ."', row_panel = '". $data['row_panel'] ."', vien = '". $data['vien'] ."' WHERE order_id = '". $data['order_id'] ."'");
    }
    echo json_encode($status);
    die();
}


add_filter( 'woocommerce_checkout_create_order', 'mbm_alter_shipping', 10, 1 );
function mbm_alter_shipping ($order) {
    $note = __("This is my note's text…");

    // Add the note
    $order->add_order_note( $note );

  return $order;

}

//new_mobile_code
add_action("wp_ajax_calculate", 'calculate');
add_action("wp_ajax_nopriv_calculate", 'calculate');

function calculate(){
    $data = $_POST['data'];

    $lop = $data['lop'];
    $price = 0;

    $khoi_luong = ((((($data['width'] * $data['height'] * $data['quantity']) -1500)*(0.666-0.5)/(500))+0.5)+0.3);
    $ship_quoc_te = (int) get_option('ship_qt') * $khoi_luong;
    $ship_noi_dia = $khoi_luong < 3 ? (int) get_option('ship_huyen_xa') : (int) get_option('ship_huyen_xa') + ($khoi_luong * (int) get_option('sau_3kg'));
    $tong_ship = $ship_noi_dia + $ship_quoc_te;
    $gia_out = 0;

    if($data['width'] <= 10 && $data['height'] <= 10 && $data['quantity'] == 5){
        $gia_out = (int) get_option('duoi_10_sl5' . $lop);
        
    }else if($data['width'] < 10 && $data['height'] < 10 && $data['quantity'] == 10){
        $gia_out = (int) get_option('duoi_10_sl10' . $lop);

    }else{

        $pt1 = (int) ( (( $data['quantity'] - (int) get_option('so_luong_1' . $lop)[0] ) * ( (int) get_option('rong_1' . $lop)[1] - (int) get_option('rong_1' . $lop)[0] )) / ((int) get_option('so_luong_1' . $lop)[1] - (int) get_option('so_luong_1' . $lop)[0])) + (int) get_option('gia_1' . $lop)[0];

        $pt2 = (int) ( (( $data['quantity'] - (int) get_option('so_luong_1' . $lop)[2] ) * ( (int) get_option('rong_1' . $lop)[3] - (int) get_option('rong_1' . $lop)[2] )) / ((int) get_option('so_luong_1' . $lop)[3] - (int) get_option('so_luong_1' . $lop)[2])) + (int) get_option('gia_1' . $lop)[2];

        $gia_out =  (int) ((($data['width']*$data['height']-((int) get_option('dai_1' . $lop)[0]*(int) get_option('gia_1' . $lop)[0]))*($pt2-$pt1))/((int) get_option('gia_1' . $lop)[2]*(int) get_option('dai_1' . $lop)[2]-(int) get_option('gia_1' . $lop)[0]*(int) get_option('dai_1' . $lop)[0]))+$pt1;
       
    }
    
     $price = (int) (((( $gia_out * 1.003 * (int) get_option('ty_gia') ) + (int) get_option('phi_quan_ly') ) + $tong_ship ) * (int) get_option('ti_le_loi_nhuan' . $lop) );

    $result = [
        "price" => $price,
        "status" => 1,
        "gia_out" => $gia_out
    ];

    echo json_encode($result);
    die();
    
}

// Display as order meta
function my_field_order_meta_handler( $item_id, $values, $cart_item_key ) {
    var_dump($values);
    if( isset( $values['data_id'] ) ) {
        wc_add_order_item_meta( $item_id, "data_id", $values['data_id'] );
    }
}
add_action( 'woocommerce_add_order_item_meta', 'my_field_order_meta_handler', 1, 3 );


add_filter( 'woocommerce_hidden_order_itemmeta', 'hide_order_item_meta_fields' );
 
function hide_order_item_meta_fields( $fields ) {
$fields[] = 'current_view';
$fields[] = 'custom_image';//Add all meta keys to this array,so that it will not be displayed in order meta box
return $fields;
}

 
function my_enqueue($hook) {
    wp_enqueue_script('my_custom_script', plugin_dir_url( __FILE__ ) . 'assets/admin.js');
}

add_action('admin_enqueue_scripts', 'my_enqueue');
 

add_action( 'admin_enqueue_scripts', 'my_admin_style');

function my_admin_style() {
  wp_enqueue_style( 'admin-style', plugin_dir_url( __FILE__ ) . 'assets/admin.css' );
}

// add_action( 'init', 'woocommerce_clear_cart_url' );
// function woocommerce_clear_cart_url() {
//   global $woocommerce;

//         $woocommerce->cart->empty_cart(); 
// }

function my_admin_menu() {
    add_menu_page(
        'Mạch in',
        'Mạch in',
        'manage_options',
        'machin-page',
        'my_admin_page_contents',
        'dashicons-schedule',
        3
    );

    // add_menu_page('Mạch 1 lớp', 'Mạch 1 lớp', 'manage_options', 'machin-page', 'mach_1_lop');

    add_submenu_page( 'machin-page', 'Mạch 1 lớp', 'Mạch 1 lớp',
    'manage_options', 'mach-1-lop', 'mach_1_lop');

    add_submenu_page( 'machin-page', 'Mạch 2 lớp', 'Mạch 2 lớp',
    'manage_options', 'mach-2-lop', 'mach_2_lop');

    add_submenu_page( 'machin-page', 'Mạch 4 lớp', 'Mạch 4 lớp',
    'manage_options', 'mach-4-lop', 'mach_4_lop');

    add_submenu_page( 'machin-page', 'Mạch 6 lớp', 'Mạch 6 lớp',
    'manage_options', 'mach-6-lop', 'mach_6_lop');

    add_submenu_page( 'machin-page', 'Mạch ALU', 'Mạch ALU',
    'manage_options', 'mach-alu', 'mach_alu');

}

add_action( 'admin_menu', 'my_admin_menu' );


function my_admin_page_contents() {
    include plugin_dir_path(__FILE__) . "/inc/setting.php";
}


function mach_1_lop(){
    include plugin_dir_path(__FILE__) . "/inc/1lop.php";
}

function mach_2_lop(){
    include plugin_dir_path(__FILE__) . "/inc/2lop.php";
}

function mach_4_lop(){
    include plugin_dir_path(__FILE__) . "/inc/4lop.php";
}

function mach_6_lop(){
    include plugin_dir_path(__FILE__) . "/inc/6lop.php";
}

function mach_alu(){
    include plugin_dir_path(__FILE__) . "/inc/alu.php";
}

// add_submenu_page( 'my-top-level-slug', 'My Custom Submenu Page', 'My Custom Submenu Page',
//     'manage_options', 'my-secondary-slug');
