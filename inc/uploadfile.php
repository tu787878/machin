<?php

add_shortcode('machin', 'machin');

function machin()
{

?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Checkout example · Bootstrap v5.0</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



        <!-- Bootstrap core CSS -->

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
    </head>

    <body class="bg-light">

        <input type="hidden" name="total_price_input" value=0>
        <input type="hidden" name="gia_truoc_input" value=0>
        <input type="hidden" name="gia_smt_input" value=0>
        <input type="hidden" name="gia_stencil_input" value=0>
        <input type="hidden" name="gia_pcb_dhl" value=0>
        <input type="hidden" name="gia_stencil_dhl" value=0>
        <input type="hidden" name="isPanel" value=0>
        <input type="hidden" name="widthPanel" value=0>
        <input type="hidden" name="heightPanel" value=0>
        <input type="hidden" name="soTamPanel" value=0>
        <!-- <input type="hidden" name="gia_san_xuat_input" value=0> -->

        <div class="container">
            <main>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h3 class="d-flex justify-content-between align-items-center mb-3">
                            <span style="font-weight:bold;margin-left:20px" class="text-primary">Báo giá</span>
                        </h3>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 style="font-weight: bold;opacity: 1 !important;" class="my-0">Giá PCB</h6>
                                </div>
                                <span id="tinh_truoc" class="text-muted">0 VND</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm smtPrice">
                                <div>
                                    <h6 style="font-weight: bold;opacity: 1 !important;" class="my-0">SMT Assembly</h6>
                                </div>
                                <span id="gia_smt" class="text-muted">0 VND</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm stencilPrice">
                                <div>
                                    <h6 style="font-weight: bold;opacity: 1 !important;" class="my-0">Stencil</h6>
                                </div>
                                <span id="gia_stencil" class="text-muted">0 VND</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div style="margin-bottom: 10px !important;">
                                    <h6 style="margin-bottom: 10px !important;" class="my-0">Thời gian sản xuất</h6>

                                    <div class="form-check">
                                        <input class="form-check-input" name="san_xuat" checked type="radio" value="binhthuong" id="binhthuong">
                                        <label class="form-check-label" for="binhthuong">
                                            15-20 ngày
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="san_xuat" type="radio" value="dhl" id="dhl">
                                        <label class="form-check-label" for="dhl">
                                            7-10 ngày
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="san_xuat" type="radio" value="nhanh" id="nhanh">
                                        <label class="form-check-label" for="nhanh">
                                            Nhanh VN
                                        </label>
                                        <div id="nhanh_text"> <small>Liên hệ Zalo để được tư vấn : </small><br>
                                            <small>SĐT <?php echo get_option('phonex', '') ?></small>
                                        </div>

                                    </div>


                                </div>
                                <!-- <span id="gia_san_xuat" class="text-muted">0 VND</span> -->
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span style="margin-bottom: 10px;opacity: 1 !important;">Tổng cộng</span>
                                <strong id="tong_cong">0 VND</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <button id="them_vao_gio_hang" type="button" class="btn btn-outline-primary">Thanh Toán</button>

                            </li>
                            <li class="d-flex justify-content-between">
                                <small id="show_error" style="color: red;font-size: 21px;background-color: yellow;"></small>
                            </li>
                            <small id="show_error" style="color: red;"></small>
                        </ul>

                        <!-- <form class="card p-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Promo code">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </form> -->
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h3 style="font-weight:bold;" class="mb-3">GIA CÔNG PCB</h3>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Tải lên file mạch in</label>
                            <input class="form-control" accept=".zip,.rar" type="file" id="fileMachIn">
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Loại sản phẩm</p>
                                </div>
                                <div class="value">
                                    <input type="radio" name="type_product" class="btn-check obverser" checked value="fr4_type" id="fr4_type">
                                    <label class="btn btn-outline-success" for="fr4_type">1. FR-4</label>
                                    <input type="radio" name="type_product" value="alu_type" class="btn-check obverser" id="alu_type">
                                    <label class="btn btn-outline-success" for="alu_type">2. Aluminum Board</label>
                                </div>
                            </div>
                            <div class="col-12 rowed">
                                <div class="key col-2">
                                    <p>Kích thước:</p>
                                </div>
                                <div class="value">
                                    <div class="input-group mb-3">
                                        <input type="number" step="0.1" name="width" class="form-control obverser" placeholder="Chiều rộng" aria-label="Chiều rộng">
                                        <span class="input-group-text">cm</span>
                                        <div class="middle">x</div>
                                        <input type="number" step="0.1" name="height" class="form-control obverser" placeholder="Chiều dài" aria-label="Chiều dài">
                                        <span class="input-group-text">cm</span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 rowed">
                                <div class="key col-2">
                                    <p>Số lượng:</p>
                                </div>
                                <div class="value">
                                    <button id="choose_soluong" type="button" class="btn btn-outline-success">5</button>




                                    <!-- <select name="so_luong" id="so_luong" class="form-select form-select-sm obverser" aria-label=".form-select-sm example">
                                        <option selected value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                        <option value="125">125</option>
                                        <option value="150">150</option>
                                        <option value="175">175</option>
                                        <option value="200">200</option>
                                        <option value="225">225</option>
                                        <option value="250">250</option>
                                        <option value="275">275</option>
                                        <option value="300">300</option>
                                        <option value="350">350</option>
                                        <option value="400">400</option>
                                        <option value="450">450</option>
                                        <option value="500">500</option>
                                    </select> -->

                                </div>
                                <div id="chon_so_luong" class="card col-8 hide">
                                    <div class="card-body">
                                        <?php
                                        $so_luong_setup = get_option('so_luong_setup');

                                        $myArray = explode(',', $so_luong_setup);
                                        $cols = 4;
                                        $count = 0;

                                        for ($i = 0; $i < count($myArray); $i++) {
                                            if ($i == 0) {
                                        ?>
                                                <div class="custom col-3">
                                                    <input type="radio" name="so_luong" checked class="btn-check obverser" value="<?php echo $myArray[$i] ?>" id="so_luong_<?php echo $i ?>">
                                                    <label class="btn btn-outline-success" for="so_luong_<?php echo $i ?>"><?php echo $myArray[$i] ?></label>
                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <div class="custom col-3">
                                                    <input type="radio" name="so_luong" class="btn-check obverser" value="<?php echo $myArray[$i] ?>" id="so_luong_<?php echo $i ?>">
                                                    <label class="btn btn-outline-success" for="so_luong_<?php echo $i ?>"><?php echo $myArray[$i] ?></label>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Thông số PCB</h4>
                            <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Số lớp:</p>
                                </div>
                                <div class="value">
                                    <input type="radio" name="so_lop" class="btn-check obverser" value="" id="1-lop">
                                    <label class="btn btn-outline-success" for="1-lop">1</label>
                                    <input checked value="_2lop" type="radio" name="so_lop" class="btn-check obverser" id="2-lop">
                                    <label class="btn btn-outline-success" for="2-lop">2</label>
                                    <input value="_4lop" type="radio" name="so_lop" class="btn-check obverser" id="4-lop">
                                    <label class="btn btn-outline-success" for="4-lop">4</label>
                                    <input value="_6lop" type="radio" name="so_lop" class="btn-check obverser" id="6-lop">
                                    <label class="btn btn-outline-success" for="6-lop">6</label>
                                </div>
                            </div>
                            <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Kiểu đơn hàng:</p>
                                </div>
                                <div class="value col-6">
                                    <input checked type="radio" name="order_type" class="btn-check obverser" value="don_chiec" id="don_chiec">
                                    <label class="btn btn-outline-success" for="don_chiec">Đơn chiếc</label>
                                    <input value="panel" disabled type="radio" name="order_type" class="btn-check obverser" id="panel">
                                    <label class="btn btn-outline-success" for="panel">Panel</label>
                                </div>
                            </div>
                            <div class="isPanel hide">
                                <hr class="my-4">
                                <div class="col-sm-12 rowed">
                                    <div class="key col-2">
                                        <p>Panel:</p>
                                    </div>
                                    <div class="value">
                                        <div class="input-group mb-3">
                                            <input id="so_cot_panel" type="number" name="so_cot_panel" class="form-control" placeholder="Cột">
                                            <span class="input-group-text">Cột</span>
                                            <div class="middle">x</div>
                                            <input type="number" id="so_dong_panel" name="so_dong_panel" class="form-control" placeholder="Dòng">
                                            <span class="input-group-text">Dòng</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 rowed">
                                    <div class="key col-2">
                                        <p>Viền:</p>
                                    </div>
                                    <div class="value col-6">
                                        <input checked type="radio" name="vien_panel" class="btn-check" value="0" id="khongvien">
                                        <label class="btn btn-outline-success" for="khongvien">Không</label>
                                        <input value="2" type="radio" name="vien_panel" class="btn-check" id="haiben">
                                        <label class="btn btn-outline-success" for="haiben">Hai bên</label>
                                    </div>
                                </div>
                                <div id="panel_detail" class="card hide">

                                    <div class="card-body">
                                        <h5 class="card-title">Thông số panel</h5>
                                        <div class="card-text" id="chieu_rong_panel_detail">Chiều rộng：10 x 2 = 20.00 cm</div>
                                        <div class="card-text" id="chieu_dai_panel_detail">Chiều dài： 8 x 3 = 24.00 cm </div>
                                        <div class="card-text" id="so_tam_panel_detail">Số lượng panel sau ghép: 75 / 6 = 13 Panel</div>
                                    </div>
                                </div>
                                <div id="option_panel" class="col-sm-12 rowed hide">
                                    <div class="key col-12">
                                        <div>Lựa chọn: <div style="color:red;margin-bottom:10px" class="red">Vì số panel bạn ghép hiện đang bị lẻ ảnh hưởng tới việc sản xuất của nhà máy nên vui lòng chọn lại theo yêu cầu bên dưới. Xin cảm ơn!</div></div>
                                    </div>
                                    <div class="value col-10">
                                        <div class="input-group mb-3">
                                            <input checked type="radio" name="optionPanel" class="btn-check obverser_panel" value="0" id="khongghepnua">
                                            <label class="btn btn-outline-success" for="khongghepnua">Không ghép nữa</label>

                                        </div>
                                        <div class="input-group mb-3 cl_truoc">
                                            <input type="radio" name="optionPanel" class="btn-check obverser_panel" value="0" id="panelTruoc">
                                            <label class="btn btn-outline-success" for="panelTruoc"></label>
                                        </div>
                                        <div class="input-group mb-3 cl_sau">
                                            <input type="radio" name="optionPanel" class="btn-check obverser_panel" value="0" id="panelSau">
                                            <label class="btn btn-outline-success" for="panelSau"></label>
                                        </div>


                                    </div>
                                </div>
                                <hr class="my-4">
                            </div>

                            <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Độ dày:</p>
                                </div>
                                <div class="value">
                                    <input type="radio" name="do_day" class="btn-check" value="0.4" id="day1">
                                    <label class="btn btn-outline-success" for="day1">0.4</label>
                                    <input value="0.6" type="radio" name="do_day" class="btn-check" id="day2">
                                    <label class="btn btn-outline-success" for="day2">0.6</label>
                                    <input checked type="radio" name="do_day" class="btn-check" value="0.8" id="day3">
                                    <label class="btn btn-outline-success" for="day3">0.8</label>
                                    <input value="1.0" type="radio" name="do_day" class="btn-check" id="day4">
                                    <label class="btn btn-outline-success" for="day4">1.0</label>
                                    <input type="radio" name="do_day" class="btn-check" value="1.2" id="day5">
                                    <label class="btn btn-outline-success" for="day5">1.2</label>
                                    <input checked value="1.6" type="radio" name="do_day" class="btn-check" id="day6">
                                    <label class="btn btn-outline-success" for="day6">1.6</label>
                                    <input type="radio" name="do_day" class="btn-check" value="2.0" id="day7">
                                    <label class="btn btn-outline-success" for="day7">2.0</label>
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Độ dày đồng hoàn thiện:</p>
                                </div>
                                <div class="value">
                                    <input type="radio" name="do_day_dong" class="btn-check" checked value="1oz" id="1oz">
                                    <label class="btn btn-outline-success" for="1oz">1oz</label>
                                    <input type="radio" name="do_day_dong" value="2oz" class="btn-check" id="2oz">
                                    <label class="btn btn-outline-success" for="2oz">2oz</label>
                                </div>
                            </div>
                            <!-- <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Khoảng cách nhỏ nhất:</p>
                                </div>
                                <div class="value">
                                    <input type="radio" name="khoang_cach_nho_nhat" class="btn-check" checked value="4/4mil" id="4/4mil">
                                    <label class="btn btn-outline-success" for="4/4mil">4/4mil</label>
                                    <input type="radio" name="khoang_cach_nho_nhat" value="5/5mil" class="btn-check" id="5/5mil">
                                    <label class="btn btn-outline-success" for="5/5mil">5/5mil</label>
                                    <input type="radio" name="khoang_cach_nho_nhat" value="8/8mil" class="btn-check" id="8/8mil">
                                    <label class="btn btn-outline-success" for="8/8mil">8/8mil</label>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Kích thước lỗ khoan nhỏ nhất:</p>
                                </div>
                                <div class="value">
                                    <input type="radio" name="kich_thuoc_lo_khoan" class="btn-check" value="0.2" id="0.2mm">
                                    <label class="btn btn-outline-success" for="0.2mm">0.2mm</label>
                                    <input type="radio" name="kich_thuoc_lo_khoan" value="0.25" class="btn-check" id="0.25mm">
                                    <label class="btn btn-outline-success" for="0.25mm">0.25mm</label>
                                    <input type="radio" name="kich_thuoc_lo_khoan" class="btn-check" value="0.3" id="0.3mm">
                                    <label class="btn btn-outline-success" for="0.3mm">0.3mm</label>
                                   
                                    <input type="radio" name="kich_thuoc_lo_khoan" value="0.4" class="btn-check" id="0.4mm">
                                    <label class="btn btn-outline-success" for="0.4mm">0.4mm</label>
                                </div>
                            </div> -->
                            <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Phủ trống hàn:</p>
                                </div>
                                <div class="value">
                                    <input checked type="radio" name="phu_trong_han" value="xanhla" class="btn-check" id="xanhla">
                                    <label class="btn btn-outline-success" for="xanhla">Xanh lá</label>
                                    <input type="radio" name="phu_trong_han" value="trang" class="btn-check" id="trang">
                                    <label class="btn btn-outline-success" for="trang">Trắng</label>
                                    <input type="radio" name="phu_trong_han" value="vang" class="btn-check" id="vang">
                                    <label class="btn btn-outline-success" for="vang">Vàng</label>
                                    <input type="radio" name="phu_trong_han" class="btn-check" value="do" id="do">
                                    <label class="btn btn-outline-success" for="do">Đỏ</label>
                                    <input type="radio" name="phu_trong_han" value="xanhduong" class="btn-check" id="xanhduong">
                                    <label class="btn btn-outline-success" for="xanhduong">Xanh dương</label>
                                    <input type="radio" name="phu_trong_han" value="0denmo" class="btn-check" id="denmo">
                                    <label class="btn btn-outline-success" for="denmo">Đen mờ</label>
                                    <input type="radio" name="phu_trong_han" class="btn-check" value="tim" id="tim">
                                    <label class="btn btn-outline-success" for="tim">Tím</label>
                                </div>
                            </div>
                            <!-- <div class="col-sm-12 rowed" style="margin-top: 30px;">
                                <div class="key col-2">
                                    <p>Màu chữ: </p>
                                </div>
                                <div class="value">
                                    <input type="radio" name="mau_chu" class="btn-check" checked value="none" id="chukhong">
                                    <label class="btn btn-outline-success" for="chukhong">Không</label>
                                    <input type="radio" name="mau_chu" value="den" class="btn-check" id="chuden">
                                    <label class="btn btn-outline-success" for="chuden">Đen</label>
                                    <input type="radio" name="mau_chu" class="btn-check" value="trang" id="chutrang">
                                    <label class="btn btn-outline-success" for="chutrang">Trắng</label>
                                    <input type="radio" name="mau_chu" value="vang" class="btn-check" id="chuvang">
                                    <label class="btn btn-outline-success" for="chuvang">Vàng</label>
                                </div>
                            </div> -->

                            <div class="col-sm-12 rowed">
                                <div class="key col-2">
                                    <p>Bề mặt hoàn thiện:</p>
                                </div>
                                <div class="value">
                                    <input type="radio" name="be_mat_hoan_thien" class="btn-check" checked value="none" id="bematnone">
                                    <label class="btn btn-outline-success" for="bematnone">None</label>
                                    <input type="radio" name="be_mat_hoan_thien" value="hasl" class="btn-check" id="hasl">
                                    <label class="btn btn-outline-success" for="hasl">HASL Lead Free</label>
                                    <input type="radio" name="be_mat_hoan_thien" class="btn-check" value="Immersion" id="Immersion">
                                    <label class="btn btn-outline-success" for="Immersion">Immersion Gold</label>
                                    <input type="radio" name="be_mat_hoan_thien" value="Immersion2" class="btn-check" id="Immersion2">
                                    <label class="btn btn-outline-success" for="Immersion2">Immersion Tin</label>
                                    <input type="radio" name="be_mat_hoan_thien" value="OSP" class="btn-check" id="OSP">
                                    <label class="btn btn-outline-success" for="OSP">OSP</label>
                                </div>
                            </div>
                            <div class="col-sm-12 rowed"">
                                <div class=" key col-2">
                                <p>Phương pháp test:</p>
                            </div>
                            <div class="value">
                                <input type="radio" name="phuong_phap_test" class="btn-check" checked value="mathuong" id="mathuong">
                                <label class="btn btn-outline-success" for="mathuong">Kiểm tra bằng mắt thường</label>
                                <input type="radio" name="phuong_phap_test" value="fulltest" class="btn-check" id="full">
                                <label class="btn btn-outline-success" for="full">Full test</label>
                                <input type="radio" name="phuong_phap_test" class="btn-check" value="jig" id="jig">
                                <label class="btn btn-outline-success" for="jig">JIG test</label>
                            </div>
                        </div>
                        <div class="col-sm-12 rowed" ">
                                <div class=" key col-2">
                            <p>Yêu cầu đặc biệt:</p>
                        </div>
                        <div class="value">
                            <div class="form-floating">
                                <textarea class="form-control" name="note" id="floatingTextarea2" style="height: 100px;width:400px"></textarea>
                                <label for="floatingTextarea2"></label>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">

                    <div class="col-sm-12 rowed" ">
                                <div class=" key col-2">
                        <h4 style="font-weight: bold;" class="mb-3">SMT ASSEMBLY</h4>
                    </div>
                    <div class="value">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="gia_cong_smt" type="checkbox" id="smtSwitch">
                            <label class="form-check-label" for="smtSwitch">Đặt gia công SMT</label>
                        </div>
                    </div>
                </div>

                <div class="hide" id="isSmtSwitch">
                    <div class="col-12 rowed">
                        <div class=" col-2 key">
                            <p class="mb-3">*Số lượng mạch:</p>
                        </div>
                        <div class="value">
                            <input type="number" value="1" name="so_luong_mach" class="form-control obverser_smt" aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col-12 rowed">
                        <div class="col-2 key ">
                            <p class="mb-3">*Số mặt gia công：</p>
                        </div>
                        <div class="value">
                            <select class="form-select" name="so_mat" aria-label="Default select example">
                                <option value="1">Một mặt</option>
                                <option value="2">Hai mặt</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 rowed">
                        <div class="key col-2">
                            <p>*Số điểm hàn SMD/ 1 mạch：</p>
                        </div>
                        <div class="value">
                            <div class="input-group mb-3">
                                <input value="1" type="number" name="so_diem_hang_smd" class="form-control obverser_smt" placeholder="Số điểm hàn SMD" aria-label="Chiều rộng">
                                <span class="input-group-text">Điểm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 rowed">
                        <div class="key col-2">
                            <p>*Số điển hàn DIP/ 1 mạch：</p>
                        </div>
                        <div class="value">
                            <div class="input-group mb-3">
                                <input value="1" type="number" name="so_diem_hang_dip" class="form-control obverser_smt" placeholder="Số điển hàn DIP" aria-label="Chiều rộng">
                                <span class="input-group-text">Điểm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 rowed">
                        <div class="key col-2">
                            <p>*Tổng số linh kiện dán</p>
                        </div>
                        <div class="value">
                            <div class="input-group mb-3">
                                <input value="1" type="number" name="linh_kien_dan" class="form-control">
                            </div>

                        </div>

                    </div>
                    <div class="col-12 rowed">
                        <div class="key col-2">
                            <p>*Tổng số linh kiện cắm:</p>
                        </div>
                        <div class="value">
                            <div class="input-group mb-3">
                                <input value="1" type="number" name="linh_kien_cam" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 rowed">
                        <div class="col-2 key ">
                            <p class="mb-3">*Phương thức đóng gói</p>
                        </div>
                        <div class="value">
                            <select class="form-select" name="phuong_thuc_dong_goi" aria-label="Default select example">
                                <option value="1">Quấn xốp chung</option>
                                <option value="2">Quấn xốp riêng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 rowed">
                        <div class="col-2 key ">
                            <p class="mb-3">*Xác nhận SMT：</p>
                        </div>
                        <div class="value">
                            <select class="form-select" name="xac_nhan_smt" aria-label="Default select example">
                                <option value="1">Chụp ảnh để xác nhận trước khi sản xuất tất cả</option>
                                <option value="2">Sản xuất theo tài liệu không cần xác nhận trước</option>
                                <option value="3">Khách hàng sang check kiểm tra xác nhận trực tiếp</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 rowed">
                        <div class="key col-2">
                            <p>*Kích thước PCB:</p>
                        </div>
                        <div class="value ">
                            <div class="input-group mb-3">
                                <input type="number" name="width_2" class="form-control col-1">
                                <span class="input-group-text">cm</span>
                                <input type="number" name="height_2" class="form-control">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <div class="col-sm-12 rowed">
                    <div class="key col-2">
                        <h4 style="font-weight: bold;" class="mb-3">STENCIL</h4>
                    </div>
                    <div class="value">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="dat_hang_stencil" type="checkbox" id="stencilSwitch">
                            <label class="form-check-label" for="stencilSwitch">Đặt hàng cùng PCB</label>
                        </div>
                    </div>
                </div>
                <div class="hide" id="isStencilSwitch">
                    <div class="col-sm-12 rowed">
                        <div class="key col-2">
                            <p>Loại Stencil:</p>
                        </div>
                        <div class="value">
                            <input type="radio" name="loai_stencil" class="btn-check" checked value="co_khung" id="co_khung">
                            <label class="btn btn-outline-success" for="co_khung">Có khung</label>
                            <input type="radio" name="loai_stencil" value="khong_khung" class="btn-check" id="khong_khung">
                            <label class="btn btn-outline-success" for="khong_khung">Không có khung</label>
                        </div>
                    </div>
                    <!-- `<div class="col-sm-12 rowed">
                        <div class="key col-2">
                            <p>Đánh bóng điện:</p>
                        </div>
                        <div class="value">
                            <input type="radio" name="danh_bong_dien" class="btn-check" checked value="yes" id="yes">
                            <label class="btn btn-outline-success" for="yes">Có</label>
                            <input type="radio" name="danh_bong_dien" value="no" class="btn-check" id="no">
                            <label class="btn btn-outline-success" for="no">Không</label>
                        </div>
                    </div>` -->
                    <div class="col-sm-12 rowed">
                        <div class="key col-2">
                            <p>Mặt stencil:</p>
                        </div>
                        <div class="value">
                            <input type="radio" name="mat_stencil" class="btn-check obverser_stencil" checked value="top" id="top">
                            <label class="btn btn-outline-success" for="top">Top</label>
                            <input type="radio" name="mat_stencil" value="bottom" class="btn-check obverser_stencil" id="bottom">
                            <label class="btn btn-outline-success" for="bottom">Bottom</label>
                            <input type="radio" name="mat_stencil" value="top_bottom" class="btn-check obverser_stencil" id="top_bottom">
                            <label class="btn btn-outline-success" for="top_bottom">Top và Bottom (Chung một Stencil)</label>
                            <input type="radio" name="mat_stencil" value="top_bottom2" class="btn-check obverser_stencil" id="top_bottom2">
                            <label class="btn btn-outline-success" for="top_bottom2">Top và Bottom( 2 khung Stencil)</label>
                        </div>
                    </div>
                    <div class="col-12 rowed" style="margin-top: 20px;">
                        <div class="col-2 key ">
                            <p class="mb-3">Kích thước (mm):</p>
                        </div>
                        <div class="value">


                            <select class="form-select obverser_stencil" name="kich_thuoc_stencil" aria-label="Default select example">
                                <?php
                                $prices = get_option('stencil_price', []);
                                $names = get_option('stencil_name', []);

                                for ($i = 0; $i < count($names); $i++) {
                                    if (strcmp($names[$i], "") != 0) {
                                ?>

                                        <option data-price="<?php echo $prices[$i] ?>" value="<?php echo $names[$i] ?>"><?php echo $names[$i] ?></option>

                                <?php
                                    }
                                }

                                ?>


                            </select>
                        </div>
                    </div>
                    <div class="col-12 rowed">
                        <div class="key col-2">
                            <p>Số lượng:</p>
                        </div>
                        <div class="value">
                            <div class="input-group mb-3">
                                <input value="1" type="number" name="so_luong_stencil" class="form-control">
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-sm-12 rowed">
                        <div class="key col-2">
                            <p>Độ dày:</p>
                        </div>
                        <div class="value">
                            <input disabled type="radio" name="do_day_stencil" class="btn-check" value="0.10" id="do_day_10">
                            <label class="btn btn-outline-success" for="do_day_10">0.10mm</label>
                            <input checked type="radio" name="do_day_stencil" value="0.12" class="btn-check" id="do_day_12">
                            <label class="btn btn-outline-success" for="do_day_12">0.12mm</label>
                            <input disabled type="radio" name="do_day_stencil" value="0.15" class="btn-check" id="do_day_15">
                            <label class="btn btn-outline-success" for="do_day_15">0.15mm</label>
                            <input disabled type="radio" name="do_day_stencil" value="0.20" class="btn-check" id="do_day_20">
                            <label class="btn btn-outline-success" for="do_day_20">0.2mm</label>
                        </div>
                    </div> -->
                    <div class="col-sm-12 rowed" ">
                                <div class=" key col-2">
                        <p>Yêu cầu đặc biệt:</p>
                    </div>
                    <div class="value">
                        <div class="form-floating">
                            <textarea class="form-control" name="note_2" id="floatingTextarea22" style="height: 100px;width:400px"></textarea>
                            <label for="floatingTextarea22"></label>
                        </div>
                    </div>


                </div>

        </div>
        </main>

       
        </div>

    </body>

    </html>


<?php


}
