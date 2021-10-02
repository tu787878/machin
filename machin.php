<?php

/**
 * Plugin Name: Mach In Plugin
 * Description: bao gia tu dong mach in By Tudc
 * Version: 1.0
 * License: GPLv2 or later
 */


require plugin_dir_path(__FILE__) . '/inc/uploadfile.php';
require plugin_dir_path(__FILE__) . '/inc/licheche.php';


function themeslug_enqueue_style()
{
    wp_enqueue_style('font', plugin_dir_url(__FILE__) . 'assets/font-awesome.css', false);
    wp_enqueue_style('bootstrapStyle', plugin_dir_url(__FILE__) . 'assets/bootstrap.min.css');
    wp_enqueue_style('newStyle', plugin_dir_url(__FILE__) . 'assets/newStyle.css');
    wp_enqueue_style('formValidation', plugin_dir_url(__FILE__) . 'assets/form-validation.css');
}

function themeslug_enqueue_script()
{
    wp_enqueue_script('jqueryx', plugin_dir_url(__FILE__) . 'assets/jquery.js', false);
    wp_enqueue_script("bootstrapJs", plugin_dir_url(__FILE__) . 'assets/bootstrap.min.js', false);
    wp_enqueue_script("formValidationJs", plugin_dir_url(__FILE__) . 'assets/form-validation.js', false);
    wp_enqueue_script("bootstrapBundle", plugin_dir_url(__FILE__) . 'assets/bootstrap.bundle.min.js', false);

    $so_luong_setup = get_option('so_luong_setup');

    $myArray = explode(',', $so_luong_setup);

    wp_register_script("newScript", plugin_dir_url(__FILE__) . 'assets/newScript.js', false);
    wp_localize_script('newScript', 'ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_localize_script('newScript', 'machin', array('home' => get_home_url()));
    wp_localize_script('newScript', 'extra', array('phone' => get_option("phonex", ""), 'so_luong_setup' => $myArray));



    wp_enqueue_script('newScript');
}

add_action('wp_enqueue_scripts', 'themeslug_enqueue_style');
add_action('wp_enqueue_scripts', 'themeslug_enqueue_script');


add_filter('woocommerce_add_cart_item_data', 'add_cart_item_data', 10, 3);

function add_cart_item_data($cart_item_data, $product_id, $variation_id)
{
    // get product id & price
    $cart_item_data['data_id'] =  $_GET['data_id'];

    return $cart_item_data;
}

add_action('woocommerce_before_calculate_totals', 'before_calculate_totals', 10, 1);

function before_calculate_totals($cart_obj)
{

    // Iterate through each cart item
    foreach ($cart_obj->get_cart() as $key => $value) {
        if (isset($value['data_id'])) {
            global $wpdb;
            $table = "wp_machin_order_data";

            $order = $wpdb->get_row("SELECT * FROM $table WHERE order_id = '" . $value['data_id'] . "'");
            //var_dump($order);
            if ($order != null) {
                $value['data']->set_price($order->price);
            } else {
                $value['data']->set_price(0);
                //echo "<div style='color:red;'>Lỗi item! Vui lòng xóa sản phẩm 0 VND và thử lại.</div>";
            }
        }
    }
}


//new_mobile_code
add_action("wp_ajax_add_to_card", 'add_to_card');
add_action("wp_ajax_nopriv_add_to_card", 'add_to_card');

function add_to_card()
{

    $data = $_POST['data'];
    global $wpdb;

    $table = "wp_machin_order_data";
    $status = $wpdb->query("INSERT INTO $table (order_id, price, type_pcb, width, height, quantity, layers, type_order, dichte, dichte_done, distant, size_khoan, color, text_color, interface, test, note, file) VALUES ('" . $data['order_id'] . "', " . $data['price'] . ", '" . $data['type_pcb'] . "', '" . $data['width'] . "', '" . $data['height'] . "', '" . $data['quantity'] . "', '" . $data['layers'] . "', '" . $data['type_order'] . "', '" . $data['dichte'] . "', '" . $data['dichte_done'] . "', '" . $data['distant'] . "', '" . $data['size_khoan'] . "', '" . $data['color'] . "', '" . $data['text_color'] . "', '" . $data['interface'] . "', '" . $data['test'] . "', '" . $data['note'] . "', '" . $data['file'] . "')");

    if ($data['isStencil'] == 1) {
        $wpdb->query("UPDATE $table SET loai_stencil = '" . $data['stencil']['loai_stencil'] . "', danh_bong = '" . $data['stencil']['danh_bong'] . "', mat_stencil = '" . $data['stencil']['mat_stencil'] . "', kich_thuoc = '" . $data['stencil']['kich_thuoc'] . "', quantity_2 = '" .  $data['stencil']['quantity_2'] . "', do_day = '" . $data['stencil']['do_day']  . "', note_2 = '" .  $data['stencil']['note_2'] . "', isStencil = 1 WHERE order_id = '" . $data['order_id']  . "'");
    }

    if ($data['isAssembly'] == 1) {
        $wpdb->query("UPDATE $table SET side = '" . $data['assembly']['side'] . "', diem_han_smd = '" . $data['assembly']['diem_han_smd'] . "', diem_han_dip = '" . $data['assembly']['diem_han_dip'] . "', linh_kien_dan = '" . $data['assembly']['linh_kien_dan'] . "', linh_kien_gan = '" . $data['assembly']['linh_kien_gan'] . "', dong_goi = '" . $data['assembly']['dong_goi'] . "', xac_nhan = '" . $data['assembly']['xac_nhan'] . "', height_2 = '" . $data['assembly']['height_2'] . "', width_2 = '" . $data['assembly']['width_2'] . "', isAssembly = 1 WHERE order_id = '" . $data['order_id'] . "'");
    }

    if ($data['panel'] == 1) {
        $wpdb->query("UPDATE $table SET panel = 1, col_panel = '" . $data['col_panel'] . "', row_panel = '" . $data['row_panel'] . "', vien = '" . $data['vien'] . "' WHERE order_id = '" . $data['order_id'] . "'");
    }
    // echo json_encode("INSERT INTO $table (order_id, price, type_pcb, width, height, quantity, layers, type_order, dichte, dichte_done, distant, size_khoan, color, text_color, interface, test, note, file) VALUES ('" . $data['order_id'] . "', " . $data['price'] . ", '" . $data['type_pcb'] . "', '" . $data['width'] . "', '" . $data['height'] . "', '" . $data['quantity'] . "', '" . $data['layers'] . "', '" . $data['type_order'] . "', '" . $data['dichte'] . "', '" . $data['dichte_done'] . "', '" . $data['distant'] . "', '" . $data['size_khoan'] . "', '" . $data['color'] . "', '" . $data['text_color'] . "', '" . $data['floaterface'] . "', '" . $data['test'] . "', '" . $data['note'] . "', '" . $data['file'] . "')");
    $product_id = wc_get_product_id_by_sku('#offical');
    $result = [
        "status" => $status,
        "id" => $product_id
    ];
    echo json_encode($result);
    die();
}


add_filter('woocommerce_checkout_create_order', 'mbm_alter_shipping', 10, 1);
function mbm_alter_shipping($order)
{
    $note = __("This is my note's text…");

    // Add the note
    $order->add_order_note($note);

    return $order;
}

//new_mobile_code
add_action("wp_ajax_calculate_dhl", 'calculate_dhl');
add_action("wp_ajax_nopriv_calculate_dhl", 'calculate_dhl');

function calculate_dhl()
{
    $data = $_POST['data'];
    $width = $data['width'];
    $height = $data['height'];
    $quantity = $data['quantity'];
    $gia_pcb = $data['gia_pcb'];
    $gia_stencil = $data['gia_stencil'];

    if ($width < 10 && $height < 10 && ($quantity == 5 || $quantity == 10)) {
        $new_pcb =  (float) get_option('gia_mac_dinh');
        $new_stencil =  $gia_stencil;
    } else {
        $new_pcb = $gia_pcb * (float) get_option('ty_le_pcb');
        $new_stencil = $gia_stencil * (float) get_option('ty_le_stencil');
    }

    $result = [
        "price_pcb" => $new_pcb,
        "price_stencil" => $new_stencil,
        "status" => 1,
    ];

    echo json_encode($result);
    die();
}

//new_mobile_code
add_action("wp_ajax_calculate_smt", 'calculate_smt');
add_action("wp_ajax_nopriv_calculate_smt", 'calculate_smt');

function calculate_smt()
{
    $data = $_POST['data'];
    $so_luong_mach = $data['so_luong_mach'];
    $smd = $data['smd'];
    $dip = $data['dip'];
    $linh_kien_dan = $data['linh_kien_dan'];

    $pt1 = 0;

    if ($linh_kien_dan >= 50) {
        $pt1 = (float) get_option('setup_4');
    } else if ($linh_kien_dan >= 30) {
        $pt1 = (float) get_option('setup_3');
    } else if ($linh_kien_dan >= 15) {
        $pt1 = (float) get_option('setup_2');
    } else {
        $pt1 = (float) get_option('setup_1');
    }

    $pt2 =  $smd * (float) get_option('tien_smd') * $so_luong_mach;
    $pt3 = $dip * (float) get_option('tien_dip') * $so_luong_mach;

    $price = $pt1 + $pt2 + $pt3;

    $result = [
        "price" => $price,
        "status" => 1,
    ];

    echo json_encode($result);
    die();
}

//new_mobile_code
add_action("wp_ajax_calculate", 'calculate');
add_action("wp_ajax_nopriv_calculate", 'calculate');

function calculate()
{
    $data = $_POST['data'];

    $lop = $data['lop'];
    $price = 0;

    $khoi_luong = (float)((((($data['width'] * $data['height'] * $data['quantity']) - 1500) * (0.666 - 0.5) / (500)) + 0.5) + 0.3);


    $ship_quoc_te = (float) get_option('ship_qt') * $khoi_luong;


    $ship_noi_dia = $khoi_luong < 3 ? (float) get_option('ship_huyen_xa') : (float) get_option('ship_huyen_xa') + ($khoi_luong * (float) get_option('sau_3kg'));

    $tong_ship = (float)$ship_noi_dia + (float)$ship_quoc_te;


    if ($data['width'] <= 10 && $data['height'] <= 10 && $data['quantity'] == 5) {
        $price = (float) get_option('duoi_10_sl5' . $lop);
    } else if ($data['width'] < 10 && $data['height'] < 10 && $data['quantity'] == 10) {
        $price = (float) get_option('duoi_10_sl10' . $lop);
    } else {
        $ss = "";
        if ($data['quantity'] >= 100) {
            $ss = "1";
        } else if ($data['quantity'] >= 50) {
            $ss = "2";
        } else {
            $ss = "3";
        }

        $pt1 = (float) ((($data['quantity'] - (float) get_option('so_luong_' . $ss . $lop)[0]) * ((float) get_option('gia_' . $ss . $lop)[1] - (float) get_option('gia_' . $ss . $lop)[0])) / ((float) get_option('so_luong_' . $ss . $lop)[1] - (float) get_option('so_luong_' . $ss . $lop)[0])) + (float) get_option('gia_' . $ss . $lop)[0];

        $pt2 = (float) ((($data['quantity'] - (float) get_option('so_luong_' . $ss . $lop)[2]) * ((float) get_option('gia_' . $ss . $lop)[3] - (float) get_option('gia_' . $ss . $lop)[2])) / ((float) get_option('so_luong_' . $ss . $lop)[3] - (float) get_option('so_luong_' . $ss . $lop)[2])) + (float) get_option('gia_' . $ss . $lop)[2];

        $gia_out =  (float) ((($data['width'] * $data['height'] - ((float) get_option('dai_' . $ss . $lop)[0] * (float) get_option('rong_' . $ss . $lop)[0])) * ($pt2 - $pt1)) / ((float) get_option('rong_' . $ss . $lop)[2] * (float) get_option('dai_' . $ss . $lop)[2] - (float) get_option('rong_' . $ss . $lop)[0] * (float) get_option('dai_' . $ss . $lop)[0])) + $pt1;

        //     echo json_encode($gia_out);
        // die();
        $price = (float) (((($gia_out * 1.003 * (float) get_option('ty_gia')) + (float) get_option('phi_quan_ly')) + $tong_ship) * (float) get_option('ti_le_loi_nhuan' . $lop));
    }



    // echo json_encode($price);
    //     die();

    $result = [
        "price" => $price,
        "status" => 1,
        "gia_out" => $gia_out
    ];

    echo json_encode($result);
    die();
}

// Display as order meta
function my_field_order_meta_handler($item_id, $values, $cart_item_key)
{
    var_dump($values);
    if (isset($values['data_id'])) {
        wc_add_order_item_meta($item_id, "data_id", $values['data_id']);
    }
}
add_action('woocommerce_add_order_item_meta', 'my_field_order_meta_handler', 1, 3);


add_filter('woocommerce_hidden_order_itemmeta', 'hide_order_item_meta_fields');

function hide_order_item_meta_fields($fields)
{
    $fields[] = 'current_view';
    $fields[] = 'custom_image'; //Add all meta keys to this array,so that it will not be displayed in order meta box
    return $fields;
}


function my_enqueue($hook)
{
    wp_enqueue_script('my_custom_script', plugin_dir_url(__FILE__) . 'assets/admin.js');
}

add_action('admin_enqueue_scripts', 'my_enqueue');


add_action('admin_enqueue_scripts', 'my_admin_style');

function my_admin_style()
{
    wp_enqueue_style('admin-style', plugin_dir_url(__FILE__) . 'assets/admin.css');
}

// add_action( 'init', 'woocommerce_clear_cart_url' );
// function woocommerce_clear_cart_url() {
//   global $woocommerce;

//         $woocommerce->cart->empty_cart(); 
// }

function my_admin_menu()
{
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

    add_submenu_page(
        'machin-page',
        'Mạch 1 lớp',
        'Mạch 1 lớp',
        'manage_options',
        'mach-1-lop',
        'mach_1_lop'
    );

    add_submenu_page(
        'machin-page',
        'Mạch 2 lớp',
        'Mạch 2 lớp',
        'manage_options',
        'mach-2-lop',
        'mach_2_lop'
    );

    add_submenu_page(
        'machin-page',
        'Mạch 4 lớp',
        'Mạch 4 lớp',
        'manage_options',
        'mach-4-lop',
        'mach_4_lop'
    );

    add_submenu_page(
        'machin-page',
        'Mạch 6 lớp',
        'Mạch 6 lớp',
        'manage_options',
        'mach-6-lop',
        'mach_6_lop'
    );

    add_submenu_page(
        'machin-page',
        'Mạch ALU',
        'Mạch ALU',
        'manage_options',
        'mach-alu',
        'mach_alu'
    );

    add_submenu_page(
        'machin-page',
        'SMT Assembly',
        'SMT Assembly',
        'manage_options',
        'smt-assembly',
        'smtAssembler'
    );

    add_submenu_page(
        'machin-page',
        'Stencil',
        'Stencil',
        'manage_options',
        'stencil',
        'stencil'
    );

    add_submenu_page(
        'machin-page',
        'DHL',
        'DHL',
        'manage_options',
        'dhl',
        'dhl'
    );

    add_submenu_page(
        'machin-page',
        'Khác',
        'Khác',
        'manage_options',
        'other',
        'other'
    );
}

add_action('admin_menu', 'my_admin_menu');

function other()
{
    include plugin_dir_path(__FILE__) . "/inc/other.php";
}

function my_admin_page_contents()
{
    include plugin_dir_path(__FILE__) . "/inc/setting.php";
}

function dhl()
{
    include plugin_dir_path(__FILE__) . "/inc/dhl.php";
}

function smtAssembler()
{
    include plugin_dir_path(__FILE__) . "/inc/smt.php";
}

function stencil()
{
    include plugin_dir_path(__FILE__) . "/inc/stencil.php";
}


function mach_1_lop()
{
    include plugin_dir_path(__FILE__) . "/inc/1lop.php";
}

function mach_2_lop()
{
    include plugin_dir_path(__FILE__) . "/inc/2lop.php";
}

function mach_4_lop()
{
    include plugin_dir_path(__FILE__) . "/inc/4lop.php";
}

function mach_6_lop()
{
    include plugin_dir_path(__FILE__) . "/inc/6lop.php";
}

function mach_alu()
{
    include plugin_dir_path(__FILE__) . "/inc/alu.php";
}

// add_submenu_page( 'my-top-level-slug', 'My Custom Submenu Page', 'My Custom Submenu Page',
//     'manage_options', 'my-secondary-slug');


add_action('init', 'create_tables');

function create_tables()
{
    $sql = "-- Adminer 4.7.8 MySQL dump

    SET NAMES utf8;
    SET time_zone = '+00:00';
    SET foreign_key_checks = 0;
    SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
    
    DROP TABLE IF EXISTS `wp_machin_order_data`;
    CREATE TABLE `wp_machin_order_data` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `order_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `price` int(11) NOT NULL,
      `file` varchar(200) NOT NULL,
      `type_pcb` varchar(30) NOT NULL,
      `width` varchar(30) NOT NULL,
      `height` varchar(30) NOT NULL,
      `quantity` varchar(30) NOT NULL,
      `layers` varchar(30) NOT NULL,
      `type_order` varchar(20) NOT NULL,
      `dichte` varchar(30) NOT NULL,
      `dichte_done` varchar(30) NOT NULL,
      `distant` varchar(30) NOT NULL,
      `size_khoan` varchar(30) NOT NULL,
      `color` varchar(20) NOT NULL,
      `text_color` varchar(20) NOT NULL,
      `interface` varchar(30) NOT NULL,
      `test` varchar(30) NOT NULL,
      `side` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `diem_han_smd` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `diem_han_dip` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `linh_kien_dan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `linh_kien_gan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `dong_goi` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `xac_nhan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `height_2` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `width_2` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `loai_stencil` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `danh_bong` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `mat_stencil` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `kich_thuoc` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `quantity_2` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `do_day` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `note_2` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `note` text NOT NULL,
      `isAssembly` tinyint(2) NOT NULL,
      `isStencil` tinyint(2) NOT NULL,
      `panel` tinyint(2) NOT NULL,
      `col_panel` varchar(20) NOT NULL,
      `row_panel` varchar(20) NOT NULL,
      `vien` varchar(20) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
    INSERT INTO `wp_machin_order_data` (`id`, `order_id`, `price`, `file`, `type_pcb`, `width`, `height`, `quantity`, `layers`, `type_order`, `dichte`, `dichte_done`, `distant`, `size_khoan`, `color`, `text_color`, `interface`, `test`, `side`, `diem_han_smd`, `diem_han_dip`, `linh_kien_dan`, `linh_kien_gan`, `dong_goi`, `xac_nhan`, `height_2`, `width_2`, `loai_stencil`, `danh_bong`, `mat_stencil`, `kich_thuoc`, `quantity_2`, `do_day`, `note_2`, `note`, `isAssembly`, `isStencil`, `panel`, `col_panel`, `row_panel`, `vien`) VALUES
    (41,	'Oq6qxfiyye',	187,	'',	'1. FR-4',	'0',	'0',	'5',	'2',	'Đơn chiếc',	'1.6',	'1oz',	'7/8mil',	'0.3mm',	'Xanh lá',	'Trắng',	'HASL Lead Free',	'Kiểm tra bằng mắt thường',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0,	0,	'',	'',	''),
    (47,	'O8uw4w0pam',	525,	'',	'1. FR-4',	'0',	'0',	'5',	'2',	'Đơn chiếc',	'1.6',	'1oz',	'7/8mil',	'0.3mm',	'Xanh lá',	'Trắng',	'HASL Lead Free',	'Kiểm tra bằng mắt thường',	'Một mặt',	'1',	'1',	'1',	'1',	'Quấn xốp chung',	'Chụp ảnh để xác nhận trước khi',	'1',	'1',	'Có khung',	'YES',	'Top',	'--Chọn kích thước--',	'1',	'0.12mm',	'',	'',	1,	1,	0,	'',	'',	''),
    (48,	'O7iruffzbf',	783,	'',	'1. FR-4',	'0',	'0',	'5',	'1',	'Panel',	'1.6',	'1oz',	'7/8mil',	'0.3mm',	'Xanh lá',	'Trắng',	'HASL Lead Free',	'Kiểm tra bằng mắt thường',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0,	0,	'',	'',	''),
    (49,	'Omk1o0ifz3',	539,	'2b6b7fcb-50f9-4926-a601-96d32786dad7-Led_40mm',	'1. FR-4',	'0',	'0',	'125',	'2',	'Panel',	'1.6',	'1oz',	'7/8mil',	'0.3mm',	'Xanh lá',	'Trắng',	'HASL Lead Free',	'Kiểm tra bằng mắt thường',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0,	0,	1,	'1',	'1',	'Viền');
    
    -- 2021-07-08 19:42:35";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
