<?php

add_shortcode('machin', 'machin');

function machin()
{

?>



    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
    </head>

    <body>
        <div class="pluginx">
            <div class="quote-box" style="background: url('theme/frontend/images/topbanner.jpg') no-repeat center center;">
                <div class="container">
                    <ul class="tab-quote clearfix">
                        <li class="active checkClassActive" data-id="li_1"><a href="http://qttechvn.com/online_pcb_quote.html"><i class="i-ico ico-pcb"></i>Báo giá PCB</a></li>
                        <li class="" data-id="li_1"><a href="http://qttechvn.com/pcba_quote.html"><i class="i-ico ico-pcba"></i>Báo giá SMT</a></li>
                        <li class="" data-id="li_1"><a href="http://qttechvn.com/smt_stencil_quote.html"><i class="i-ico ico-stencil"></i>Báo giá Stencil</a></li>
                        <li class="" data-id="li_1"><a href="http://qttechvn.com/accessories.html"><i class="i-ico ico-stencil"></i>Báo giá linh kiện</a></li>
                    </ul>
                </div>
            </div>
            <div class="cart pcba_instant_quote pcba_quote">
                <form action="http://qttechvn.com/api/order/" id="orderForm" method="post" accept-charset="utf-8">
                    <div class="container">
                        <div class="row col-mar-10">
                            <div class="col-lg-8">
                                <div class="bg-white">
                                    <div class="text-center py-4 d-flex justify-content-center align-content-center">
                                        <label>
                                            <button type="button" class="cart-file btn btn-lg btn-primary" id="btnUpdateFileGerber">Tải file gerber</button>
                                        </label>
                                        <input type="file" style="display: none;" id="inputFileGerber">
                                        <input type="hidden" hidden="hidden" id="fileGerberUrl" name="FileZipUrl">
                                        <input type="hidden" hidden="hidden" id="fileTextName" name="FileName">
                                        <input type="hidden" hidden="hidden" name="GerBerFileId">

                                        <!-- <p class="font12 color9 mt-3">Only accept zip or rar,Max 10 M</p> -->
                                        <!-- <p class="font12 color9 mt-3">
        <a class="cl-blue" target="_blank" href="">Instructions for ordering</a>
    </p> -->
                                        <!-- <p class="font12 color9 mt-3"><a class="cl-blue" href="">Log in </a>to view your upload history</p> -->
                                        <!-- <a style="display:none" href="http://qttechvn.com/assets/front/css/PickPlaceSample.csv" class="download-button ml-4" download>Tải file Pick and place</a>   -->
                                        <div class="input-file">
                                            <input type="file" name="file" id="inputfile" required="">
                                            <label for="file" class="smooth">Tải file Pick and place</label>
                                        </div>
                                        <input type="text" hidden="hidden" id="uploadFileQ" value="http://qttechvn.com/site/uploadFile">
                                        <input type="text" hidden="hidden" name="linkUploadFile" id="linkUploadFile" value="">
                                    </div>
                                    <div id="hackergrousrlpprsc-loader">Đang tải</div>
                                    <div class="my-preview">
                                        <select class="choose_color" name="choose_color" id="">
                                            <option selected value="green">Xanh lá cây</option>
                                            <option value="blue">Xanh dương</option>
                                            <option value="black">Đen</option>
                                            <option value="red">Đỏ</option>
                                            <option value="white">Trắng</option>
                                            <option value="yellow">Vàng</option>
                                        </select>

                                        <div class="choose_side">
                                            <label for="side_top">Top</label>
                                            <input type="radio" value="top" checked name="choose_side" id="side_top">
                                            <label for="side_bottom">Bottom</label>
                                            <input type="radio" value="bottom" name="choose_side" id="side_bottom">
                                        </div>
                                        <div class="ct">
                                            <div class="left">
                                                <div class="preview11">
                                                    <div class="preview1">

                                                    </div>
                                                </div>
                                                <div class="preview22">
                                                    <div class="preview2">

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="right">

                                            </div>
                                        </div>

                                    </div>

                                    <div id="loadDataFileGerBer"></div>

                                    <!-- <div class="genber_tutorial">
                                        <p>Hướng dẫn di chuyển/phóng to</p>
                                        <p>Di chuyển - Bấm chuột trái + Di chuyển chuột</p>
                                        <p>Phóng to - Con lăn chuột</p>
                                    </div> -->


                                    <div class="product-option">
                                        <h3 onclick="test()" class="pcba_instant_quote_title mb-3 bold">Loại sản phẩm</h3>


                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" fill-rule="evenodd" clip-rule="evenodd" id="UN1eVxriCi7z_top" viewBox="0 0 0 0" width="0" height="0">
                                            <defs>
                                                <style>
                                                    .UN1eVxriCi7z_fr4 {
                                                        color: #666666;
                                                    }

                                                    .UN1eVxriCi7z_cu {
                                                        color: #cccccc;
                                                    }

                                                    .UN1eVxriCi7z_cf {
                                                        color: #cc9933;
                                                    }

                                                    .UN1eVxriCi7z_sm {
                                                        color: #004200;
                                                        opacity: 0.7490196078431373;
                                                    }

                                                    .UN1eVxriCi7z_ss {
                                                        color: #ffffff;
                                                    }

                                                    .UN1eVxriCi7z_sp {
                                                        color: #999999;
                                                    }

                                                    .UN1eVxriCi7z_out {
                                                        color: #000000;
                                                    }
                                                </style>
                                                <mask id="UN1eVxriCi7z_top_mech-mask">
                                                    <g fill="#000" stroke="#000">
                                                        <rect x="0" y="0" width="0" height="0" fill="#fff" />
                                                    </g>
                                                </mask>
                                            </defs>
                                            <g transform="translate(0,0) scale(1,-1)">
                                                <g mask="url(#UN1eVxriCi7z_top_mech-mask)">
                                                    <rect x="0" y="0" width="0" height="0" fill="currentColor" class="UN1eVxriCi7z_fr4" />
                                                </g>
                                            </g>
                                        </svg>
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" fill-rule="evenodd" clip-rule="evenodd" id="UN1eVxriCi7z_bottom" viewBox="0 0 0 0" width="0in" height="0in">
                                            <defs>
                                                <style>
                                                    .UN1eVxriCi7z_fr4 {
                                                        color: #666666;
                                                    }

                                                    .UN1eVxriCi7z_cu {
                                                        color: #cccccc;
                                                    }

                                                    .UN1eVxriCi7z_cf {
                                                        color: #cc9933;
                                                    }

                                                    .UN1eVxriCi7z_sm {
                                                        color: #004200;
                                                        opacity: 0.7490196078431373;
                                                    }

                                                    .UN1eVxriCi7z_ss {
                                                        color: #ffffff;
                                                    }

                                                    .UN1eVxriCi7z_sp {
                                                        color: #999999;
                                                    }

                                                    .UN1eVxriCi7z_out {
                                                        color: #000000;
                                                    }
                                                </style>
                                                <circle cx="0" cy="0" r="NaN" id="ZRRMgPRuKZqW_pad-10" />
                                                <circle cx="0" cy="0" r="NaN" id="ZRRMgPRuKZqW_pad-11" />
                                                <circle cx="0" cy="0" r="NaN" id="ZRRMgPRuKZqW_pad-12" />
                                                <circle cx="0" cy="0" r="NaN" id="ZRRMgPRuKZqW_pad-13" />
                                                <circle cx="0" cy="0" r="NaN" id="ZRRMgPRuKZqW_pad-14" />
                                                <circle cx="0" cy="0" r="NaN" id="ZRRMgPRuKZqW_pad-17" />
                                                <circle cx="0" cy="0" r="NaN" id="ZRRMgPRuKZqW_pad-18" />
                                                <circle cx="0" cy="0" r="NaN" id="cCT_RTymz57x_pad-10" />
                                                <circle cx="0" cy="0" r="NaN" id="cCT_RTymz57x_pad-11" />
                                                <circle cx="0" cy="0" r="NaN" id="cCT_RTymz57x_pad-12" />
                                                <circle cx="0" cy="0" r="NaN" id="cCT_RTymz57x_pad-13" />
                                                <circle cx="0" cy="0" r="NaN" id="cCT_RTymz57x_pad-14" />
                                                <circle cx="0" cy="0" r="NaN" id="cCT_RTymz57x_pad-15" />
                                                <circle cx="0" cy="0" r="NaN" id="cCT_RTymz57x_pad-16" />
                                                <g id="UN1eVxriCi7z_bottom_copper" transform="scale(0.03937007874015748,0.03937007874015748)">
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-10" x="14319.2" y="-25082.4" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-10" x="10826.8" y="-25082.4" />
                                                    <path d="M 8961.5 -39957.5 10961.5 -39957.5 10961.5 -41957.5 8961.5 -41957.5 8961.5 -39957.5" />
                                                    <path d="M 11501.5 -39957.5 13501.5 -39957.5 13501.5 -41957.5 11501.5 -41957.5 11501.5 -39957.5" />
                                                    <path d="M 14041.5 -39957.5 16041.5 -39957.5 16041.5 -41957.5 14041.5 -41957.5 14041.5 -39957.5" />
                                                    <path d="M 16581.5 -39957.5 18581.5 -39957.5 18581.5 -41957.5 16581.5 -41957.5 16581.5 -39957.5" />
                                                    <path d="M 7572.5 -13872.5 8157.5 -13287.5 8987.5 -13287.5 9572.5 -13872.5 9572.5 -14702.5 8987.5 -15287.5 8157.5 -15287.5 7572.5 -14702.5 7572.5 -13872.5" />
                                                    <path d="M 7572.5 -16412.5 8157.5 -15827.5 8987.5 -15827.5 9572.5 -16412.5 9572.5 -17242.5 8987.5 -17827.5 8157.5 -17827.5 7572.5 -17242.5 7572.5 -16412.5" />
                                                    <path d="M 7572.5 -18952.5 8157.5 -18367.5 8987.5 -18367.5 9572.5 -18952.5 9572.5 -19782.5 8987.5 -20367.5 8157.5 -20367.5 7572.5 -19782.5 7572.5 -18952.5" />
                                                    <path d="M 7572.5 -21492.5 8157.5 -20907.5 8987.5 -20907.5 9572.5 -21492.5 9572.5 -22322.5 8987.5 -22907.5 8157.5 -22907.5 7572.5 -22322.5 7572.5 -21492.5" />
                                                    <path d="M 15192.5 -13872.5 15777.5 -13287.5 16607.5 -13287.5 17192.5 -13872.5 17192.5 -14702.5 16607.5 -15287.5 15777.5 -15287.5 15192.5 -14702.5 15192.5 -13872.5" />
                                                    <path d="M 15192.5 -16412.5 15777.5 -15827.5 16607.5 -15827.5 17192.5 -16412.5 17192.5 -17242.5 16607.5 -17827.5 15777.5 -17827.5 15192.5 -17242.5 15192.5 -16412.5" />
                                                    <path d="M 15192.5 -18952.5 15777.5 -18367.5 16607.5 -18367.5 17192.5 -18952.5 17192.5 -19782.5 16607.5 -20367.5 15777.5 -20367.5 15192.5 -19782.5 15192.5 -18952.5" />
                                                    <path d="M 15192.5 -21492.5 15777.5 -20907.5 16607.5 -20907.5 17192.5 -21492.5 17192.5 -22322.5 16607.5 -22907.5 15777.5 -22907.5 15192.5 -22322.5 15192.5 -21492.5" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="4386.4" y="-14487.6" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="4386.4" y="-17027.6" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="15852.9" y="-27748.3" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="9304.4" y="-27748.3" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="4373.8" y="-25932.4" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="4373.8" y="-19383.9" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-12" x="4393.6" y="-28253.6" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-12" x="4393.6" y="-30793.6" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="18661.3" y="-21804.8" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="18661.3" y="-15256.4" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="20687.4" y="-20619.4" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="20687.4" y="-27167.8" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-13" x="7659.8" y="-5119.8" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-13" x="10199.8" y="-5119.8" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-14" x="20687.4" y="-12334.2" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-14" x="20687.4" y="-18882.6" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-10" x="14001.8" y="-11112.4" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-10" x="10509.2" y="-11112.4" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="3159.7" y="-35718.9" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-11" x="5699.8" y="-35718.9" />
                                                    <path d="M 8572.5 -14287.5 4762.5 -14287.5 4445 -14605" fill="none" stroke-width="NaN" />
                                                    <path d="M 4445 -14605 2540 -14605 1587.5 -15557.5 1587.5 -40640 4127.5 -43180 11945.9 -43180 12700 -42425.9 12700 -40798.8" fill="none" stroke-width="NaN" />
                                                    <path d="M 4286.2 -17105.3 6508.8 -17105.3 6865.9 -16748.1 8612.2 -16748.1" fill="none" stroke-width="NaN" />
                                                    <path d="M 8691.6 -19327.8 4405.3 -19327.8 4325.9 -19407.2 4325.9 -21709.1 7659.7 -25042.8 7659.7 -26868.4 8572.5 -27781.2 9366.2 -27781.2" fill="none" stroke-width="NaN" />
                                                    <path d="M 15954.4 -27741.6 14803.4 -27741.6 13930.3 -28614.7 13930.3 -30440.3 13890.6 -30480" fill="none" stroke-width="NaN" />
                                                    <path d="M 4325.9 -25955.6 4325.9 -28257.5" fill="none" stroke-width="NaN" />
                                                    <path d="M 16113.1 -21867.8 16113.1 -23375.9 14406.6 -25082.5" fill="none" stroke-width="NaN" />
                                                    <path d="M 10675.9 -25122.2 10914.1 -25122.2 11707.8 -25915.9 11707.8 -28694.1 11271.2 -29130.6 11271.2 -30321.2" fill="none" stroke-width="NaN" />
                                                    <path d="M 8612.2 -16827.5 11310.9 -16827.5 13890.6 -19407.2 15994.1 -19407.2" fill="none" stroke-width="NaN" />
                                                    <path d="M 16033.8 -14287.5 17859.4 -14287.5 18613.4 -15041.6" fill="none" stroke-width="NaN" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-13" x="18812" y="-5119.8" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-13" x="21352" y="-5119.8" />
                                                    <path d="M 18732.5 -5159.4 18732.5 -3492.5 19486.6 -2738.4 23098.1 -2738.4 24288.8 -3929.1 24288.8 -25082.5 22185.3 -27185.9 20796.2 -27185.9" fill="none" stroke-width="NaN" />
                                                    <path d="M 16232.2 -19367.5 20716.9 -19367.5 20716.9 -18811.9 20716.9 -20677.2 20677.2 -20716.9" fill="none" stroke-width="NaN" />
                                                    <path d="M 21351.9 -5119.7 21351.9 -11787.2 20756.6 -12382.5 20756.6 -16271.9 19526.2 -17502.2 17581.6 -17502.2 16986.2 -16906.9 16311.6 -16906.9" fill="none" stroke-width="NaN" />
                                                    <path d="M 14049.4 -11072.8 15835.3 -11072.8 16232.2 -11469.7 16232.2 -14168.4" fill="none" stroke-width="NaN" />
                                                    <path d="M 10437.8 -11191.9 8890 -11191.9 8572.5 -11509.4 8572.5 -14089.1 8770.9 -14287.5" fill="none" stroke-width="NaN" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-17" x="8397.5" y="-38652.5" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-17" x="8397.5" y="-32104" />
                                                    <path d="M 3175 -35758.4 1785.9 -35758.4" fill="none" stroke-width="NaN" />
                                                    <path d="M 8374.1 -38576.2 8374.1 -39528.8 9842.5 -40997.2" fill="none" stroke-width="NaN" />
                                                    <path d="M 8334.4 -32186.6 8334.4 -34567.8 7183.4 -35718.8 5794.4 -35718.8 5754.7 -35679.1" fill="none" stroke-width="NaN" />
                                                    <path d="M 11231.6 -30360.9 11152.2 -30360.9 10477.5 -29686.2 6667.5 -29686.2 5556.2 -30797.5 1666.9 -30797.5" fill="none" stroke-width="NaN" />
                                                    <path d="M 10199.7 -5080 12461.9 -5080 14168.4 -6786.6 14168.4 -11152.2 15835.3 -11152.2 16152.8 -11469.7 16152.8 -14168.4" fill="none" stroke-width="NaN" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-18" x="13938.1" y="-30792.7" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-18" x="13938.1" y="-33332.7" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-18" x="21558.1" y="-33332.7" />
                                                    <use xlink:href="#ZRRMgPRuKZqW_pad-18" x="21558.1" y="-30792.7" />
                                                    <path d="M 11271.2 -30400.6 11271.2 -32504.1 12025.3 -33258.1 13731.9 -33258.1 13850.9 -33377.2" fill="none" stroke-width="NaN" />
                                                    <path d="M 21590 -33416.9 17899.1 -33416.9 15041.6 -36274.4 15041.6 -40798.8 15120.9 -40878.1" fill="none" stroke-width="NaN" />
                                                    <path d="M 21510.6 -30757.8 23336.2 -30757.8 24169.7 -31591.2 24169.7 -35758.4 23217.2 -36710.9 19050 -36710.9 17581.6 -38179.4" fill="none" stroke-width="NaN" />
                                                    <path d="M 17502.2 -41076.6 17502.2 -38258.8 18057.8 -37703.1" fill="none" stroke-width="NaN" />
                                                    <path d="M 18573.8 -21828.1 18573.8 -23058.4 19764.4 -24249.1 21232.8 -24249.1 22661.6 -22820.3 22661.6 -17581.6 20915.3 -15835.3" fill="none" stroke-width="NaN" />
                                                </g>
                                                <g id="UN1eVxriCi7z_bottom_copper" transform="scale(0.03937007874015748,0.03937007874015748)">
                                                    <use xlink:href="#cCT_RTymz57x_pad-10" x="14319.2" y="-25082.4" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-10" x="10826.8" y="-25082.4" />
                                                    <path d="M 8661.5 -39657.5 11261.5 -39657.5 11261.5 -42257.5 8661.5 -42257.5 8661.5 -39657.5" />
                                                    <path d="M 11201.5 -39657.5 13801.5 -39657.5 13801.5 -42257.5 11201.5 -42257.5 11201.5 -39657.5" />
                                                    <path d="M 13741.5 -39657.5 16341.5 -39657.5 16341.5 -42257.5 13741.5 -42257.5 13741.5 -39657.5" />
                                                    <path d="M 16281.5 -39657.5 18881.5 -39657.5 18881.5 -42257.5 16281.5 -42257.5 16281.5 -39657.5" />
                                                    <path d="M 7272.5 -13748 8033 -12987.5 9112 -12987.5 9872.5 -13748 9872.5 -14827 9112 -15587.5 8033 -15587.5 7272.5 -14827 7272.5 -13748" />
                                                    <path d="M 7272.5 -16288 8033 -15527.5 9112 -15527.5 9872.5 -16288 9872.5 -17367 9112 -18127.5 8033 -18127.5 7272.5 -17367 7272.5 -16288" />
                                                    <path d="M 7272.5 -18828 8033 -18067.5 9112 -18067.5 9872.5 -18828 9872.5 -19907 9112 -20667.5 8033 -20667.5 7272.5 -19907 7272.5 -18828" />
                                                    <path d="M 7272.5 -21368 8033 -20607.5 9112 -20607.5 9872.5 -21368 9872.5 -22447 9112 -23207.5 8033 -23207.5 7272.5 -22447 7272.5 -21368" />
                                                    <path d="M 14892.5 -13748 15653 -12987.5 16732 -12987.5 17492.5 -13748 17492.5 -14827 16732 -15587.5 15653 -15587.5 14892.5 -14827 14892.5 -13748" />
                                                    <path d="M 14892.5 -16288 15653 -15527.5 16732 -15527.5 17492.5 -16288 17492.5 -17367 16732 -18127.5 15653 -18127.5 14892.5 -17367 14892.5 -16288" />
                                                    <path d="M 14892.5 -18828 15653 -18067.5 16732 -18067.5 17492.5 -18828 17492.5 -19907 16732 -20667.5 15653 -20667.5 14892.5 -19907 14892.5 -18828" />
                                                    <path d="M 14892.5 -21368 15653 -20607.5 16732 -20607.5 17492.5 -21368 17492.5 -22447 16732 -23207.5 15653 -23207.5 14892.5 -22447 14892.5 -21368" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="4386.4" y="-14487.6" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="4386.4" y="-17027.6" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="15852.9" y="-27748.3" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="9304.4" y="-27748.3" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="4373.8" y="-25932.4" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="4373.8" y="-19383.9" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-12" x="4393.6" y="-28253.6" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-12" x="4393.6" y="-30793.6" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="18661.3" y="-21804.8" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="18661.3" y="-15256.4" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="20687.4" y="-20619.4" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="20687.4" y="-27167.8" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-13" x="7659.8" y="-5119.8" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-13" x="10199.8" y="-5119.8" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-14" x="20687.4" y="-12334.2" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-14" x="20687.4" y="-18882.6" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-10" x="14001.8" y="-11112.4" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-10" x="10509.2" y="-11112.4" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="3159.7" y="-35718.9" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-11" x="5699.8" y="-35718.9" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-13" x="18812" y="-5119.8" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-13" x="21352" y="-5119.8" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-15" x="8397.5" y="-38652.5" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-15" x="8397.5" y="-32104" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-16" x="13938.1" y="-30792.7" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-16" x="13938.1" y="-33332.7" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-16" x="21558.1" y="-33332.7" />
                                                    <use xlink:href="#cCT_RTymz57x_pad-16" x="21558.1" y="-30792.7" />
                                                </g>
                                                <mask id="UN1eVxriCi7z_bottom_mech-mask">
                                                    <g fill="#000" stroke="#000">
                                                        <rect x="0" y="0" width="0" height="0" fill="#fff" />
                                                    </g>
                                                </mask>
                                                <mask id="UN1eVxriCi7z_bottom_cf-mask">
                                                    <g fill="#fff" stroke="#fff">
                                                        <rect x="0" y="0" width="0" height="0" />
                                                    </g>
                                                </mask>
                                            </defs>
                                            <g transform="translate(0,0) scale(1,-1)">
                                                <g mask="url(#UN1eVxriCi7z_bottom_mech-mask)" transform="translate(0,0) scale(-1,1)">
                                                    <rect x="0" y="0" width="0" height="0" fill="currentColor" class="UN1eVxriCi7z_fr4" />
                                                    <use xlink:href="#UN1eVxriCi7z_bottom_copper" fill="currentColor" stroke="currentColor" class="UN1eVxriCi7z_cu" />
                                                    <use xlink:href="#UN1eVxriCi7z_bottom_copper" fill="currentColor" stroke="currentColor" class="UN1eVxriCi7z_cf" mask="url(#UN1eVxriCi7z_bottom_cf-mask)" />
                                                </g>
                                            </g>
                                        </svg>
                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <span>Loại sản phẩm :</span> <!-- Product Type -->
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block productTypeId">
                                                            <label class="rel item choose ">
                                                                <i class="jp-ico subscript-ico"></i>
                                                                <input type="radio" name="ProductTypeId" value="1" checked="checked" data-product-type="1. FR-4">
                                                                1. FR-4 </label>
                                                        </li>

                                                        <li class="d-inline-block productTypeId">
                                                            <label class="rel item">
                                                                <input type="radio" name="ProductTypeId" value="2" data-product-type="2. Aluminum Board">
                                                                2. Aluminum Board </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 d-flex align-items-center">
                                            <div class="col-sm-2">
                                                <span>Kích thước:</span> <!-- Dimensions -->
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="row col-mar-0 d-flex align-items-center justify-content-center">
                                                    <div class="col-sm-4">
                                                        <div class="row col-mar-0">
                                                            <div class="col-sm-6">
                                                                <div class="title">
                                                                    <div class="option-con mt-2">
                                                                        <input type="number" placeholder="Height" name="Height" id='height' min="1" value="0"><b>X</b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="title">
                                                                    <div class="option-con mt-2">
                                                                        <input type="number" placeholder="Width" name="Width" id="width" min="1" value="0"><b>mm</b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="cl-b16a00 text-center t-3">*Kích thước của pcb</p>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <!-- <input value="inch'↔mm" type="button" style="" id="dvConvertSize"> -->
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="xy-sizepanelpic">
                                                            <img src="http://qttechvn.com/assets/front/images/demo03.png" alt="Size Example" class="otherban_pic" style="display: inline;">
                                                            <img src="http://qttechvn.com/assets/front/images/demo04.png" alt="Size Example" class="lvjiban undis" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <span>Số lượng:</span>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="option-con">
                                                    <div class="option-number-hover d-inline-block">
                                                        <input type="number" class="form-control option-number rounding" id="quantity" name="Quantity" type="number" value="5" placeholder=" ">
                                                        <div class="boardnumber">
                                                            <ul>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="5" checked>5
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="10">10
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="15">15
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="20">20
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="25">25
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="30">30
                                                                    </label>
                                                                </li>

                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="50">
                                                                        50
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="75">
                                                                        75
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="100">
                                                                        100
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="125">
                                                                        125
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="150">
                                                                        150
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="200">
                                                                        200
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="250">
                                                                        250
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="300">
                                                                        300
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="350">
                                                                        350
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="400">
                                                                        400
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="450">
                                                                        450
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="500">
                                                                        500
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="600">
                                                                        600
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="700">
                                                                        700
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="800">
                                                                        800
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="900">
                                                                        900
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="1000">
                                                                        1000
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="1500">
                                                                        1500
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="2000">
                                                                        2000
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="2500">
                                                                        2500
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="3000">
                                                                        3000
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="3500">
                                                                        3500
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="4000">
                                                                        4000
                                                                    </label>
                                                                </li>

                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="4500">
                                                                        4500
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="5000">
                                                                        5000
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="5500">
                                                                        5500
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="6000">
                                                                        6000
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="6500">
                                                                        6500
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="7000">
                                                                        7000
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="7500">
                                                                        7500
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="8000">
                                                                        8000
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="9000">
                                                                        9000
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label>
                                                                        <input type="radio" name="countNumer" value="10000">
                                                                        10000
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <span class="cl-b16a00 ml5" id="unit">*pcs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white">
                                    <div class="product-option">
                                        <h3 class="pcba_instant_quote_title mb-3 bold">Thông số PCB</h3>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Số lớp </span>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block layerId">
                                                            <label class="rel item">
                                                                <input type="radio" name="LayerId" value="4">
                                                                1 </label>
                                                        </li>
                                                        <li class="d-inline-block layerId">
                                                            <label class="rel item choose ">
                                                                <i class="jp-ico subscript-ico"></i>
                                                                <input type="radio" name="LayerId" value="5" checked="checked">
                                                                2 </label>
                                                        </li>
                                                        <li class="d-inline-block layerId">
                                                            <label class="rel item">
                                                                <input type="radio" name="LayerId" value="6">
                                                                4 </label>
                                                        </li>
                                                        <li class="d-inline-block layerId">
                                                            <label class="rel item">
                                                                <input type="radio" name="LayerId" value="7">
                                                                6 </label>
                                                        </li>
                                                        <li class="d-inline-block layerId">
                                                            <label class="rel item">
                                                                <input type="radio" name="LayerId" value="8">
                                                                8 </label>
                                                        </li>
                                                        <li class="d-inline-block layerId">
                                                            <label class="rel item">
                                                                <input type="radio" name="LayerId" value="9">
                                                                10 </label>
                                                        </li>
                                                        <li class="d-inline-block layerId">
                                                            <label class="rel item">
                                                                <input type="radio" name="LayerId" value="10">
                                                                12 </label>
                                                        </li>
                                                        <li class="d-inline-block layerId">
                                                            <label class="rel item">
                                                                <input type="radio" name="LayerId" value="11">
                                                                14 </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Kiểu đơn hàng:</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block orderTypeId">
                                                            <label class="rel item choose">
                                                                <i class="jp-ico subscript-ico"></i><input type="radio" name="OrderTypeId" class="" value="1" checked="checked" data-text="Đơn chiếc">
                                                                Đơn chiếc </label>
                                                        </li>
                                                        <li class="d-inline-block orderTypeId">
                                                            <label class="rel item">
                                                                <input type="radio" name="OrderTypeId" class="" value="2" data-text="Panel">
                                                                Panel </label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Độ dày: </span>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block thicknessPcbId">
                                                            <label class="rel item">
                                                                <input type="radio" name="ThicknessPcbId" class="" value="21" data-value="0.4">
                                                                0.4 </label>
                                                        </li>
                                                        <li class="d-inline-block thicknessPcbId">
                                                            <label class="rel item">
                                                                <input type="radio" name="ThicknessPcbId" class="" value="22" data-value="0.6">
                                                                0.6 </label>
                                                        </li>
                                                        <li class="d-inline-block thicknessPcbId">
                                                            <label class="rel item">
                                                                <input type="radio" name="ThicknessPcbId" class="" value="23" data-value="0.8">
                                                                0.8 </label>
                                                        </li>
                                                        <li class="d-inline-block thicknessPcbId">
                                                            <label class="rel item">
                                                                <input type="radio" name="ThicknessPcbId" class="" value="24" data-value="1.0">
                                                                1.0 </label>
                                                        </li>
                                                        <li class="d-inline-block thicknessPcbId">
                                                            <label class="rel item">
                                                                <input type="radio" name="ThicknessPcbId" class="" value="25" data-value="1.2">
                                                                1.2 </label>
                                                        </li>
                                                        <li class="d-inline-block thicknessPcbId">
                                                            <label class="rel item choose ">
                                                                <i class="jp-ico subscript-ico"></i>
                                                                <input type="radio" name="ThicknessPcbId" value="26" checked="checked" data-value="1.6">
                                                                1.6 </label>
                                                        </li>
                                                        <li class="d-inline-block thicknessPcbId">
                                                            <label class="rel item">
                                                                <input type="radio" name="ThicknessPcbId" class="" value="27" data-value="2.0">
                                                                2.0 </label>
                                                        </li>
                                                        <li class="d-inline-block thicknessPcbId">
                                                            <label class="rel item">
                                                                <input type="radio" name="ThicknessPcbId" class="" value="28" data-value="2.4">
                                                                2.4 </label>
                                                        </li>
                                                        <li class="d-inline-block">
                                                            <img src="theme/frontend/images/pic_thickness.png" alt="">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Độ dày đồng hoàn thiện:</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block finishedCopperId">
                                                            <label class="rel item choose">
                                                                <i class="jp-ico subscript-ico"></i><input type="radio" name="FinishedCopperId" class="" value="29" checked="checked" data-value="1oz">
                                                                1oz </label>
                                                        </li>
                                                        <li class="d-inline-block finishedCopperId">
                                                            <label class="rel item">
                                                                <input type="radio" name="FinishedCopperId" class="" value="30" data-value="2oz">
                                                                2oz </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Khoảng cách nhỏ nhất:</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block minSpacingId">
                                                            <label class="rel item">
                                                                <input type="radio" name="MinSpacingId" class="" value="31" data-value="4/4mil">
                                                                4/4mil </label>
                                                        </li>
                                                        <li class="d-inline-block minSpacingId">
                                                            <label class="rel item">
                                                                <input type="radio" name="MinSpacingId" class="" value="32" data-value="5/5mil">
                                                                5/5mil </label>
                                                        </li>
                                                        <li class="d-inline-block minSpacingId">
                                                            <label class="rel item">
                                                                <input type="radio" name="MinSpacingId" class="" value="33" data-value="6/6mil">
                                                                6/6mil </label>
                                                        </li>
                                                        <li class="d-inline-block minSpacingId">
                                                            <label class="rel item choose">
                                                                <i class="jp-ico subscript-ico"></i><input type="radio" name="MinSpacingId" class="" value="34" checked="checked" data-value="7/8mil">
                                                                8/8mil </label>
                                                        </li>
                                                        <li class="d-inline-block">
                                                            <img src="theme/frontend/images/pic_spacing.png" alt="">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Kích thước lỗ khoan nhỏ nhất: </span>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block minHoleSizeId">
                                                            <label class="rel item">
                                                                <input type="radio" name="MinHoleSizeId" class="" value="35" data-product-type="0.2mm">
                                                                0.2mm </label>
                                                        </li>
                                                        <li class="d-inline-block minHoleSizeId">
                                                            <label class="rel item">
                                                                <input type="radio" name="MinHoleSizeId" class="" value="36" data-product-type="0.25mm">
                                                                0.25mm </label>
                                                        </li>
                                                        <li class="d-inline-block minHoleSizeId">
                                                            <label class="rel item choose">
                                                                <i class="jp-ico subscript-ico"></i><input type="radio" name="MinHoleSizeId" class="" value="37" checked="checked" data-product-type="0.3mm">
                                                                0.3mm </label>
                                                        </li>
                                                        <li class="d-inline-block minHoleSizeId">
                                                            <label class="rel item">
                                                                <input type="radio" name="MinHoleSizeId" class="" value="38" data-product-type="0.35mm">
                                                                0.35mm </label>
                                                        </li>
                                                        <li class="d-inline-block minHoleSizeId">
                                                            <label class="rel item">
                                                                <input type="radio" name="MinHoleSizeId" class="" value="39" data-product-type="0.4mm">
                                                                0.4mm </label>
                                                        </li>
                                                        <li class="d-inline-block">
                                                            <img src="theme/frontend/images/pic_hole.png" alt="">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Phủ trống hàn:</span> <!-- Solder Mask -->
                                                <div class="hover_question position-relative d-inline-block ml-2">
                                                    <i class="fa fa-question-circle" aria-hidden="true">
                                                        <div class="absQuestionNotice color0">
                                                            <p>Màu xanh lá cây và màu trắng là miễn phí và mặc định. Phụ phí sẽ được tính cho các màu khác.</p>
                                                        </div>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block solderMaskId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SolderMaskId" class="" value="40" data-value="Không">
                                                                Không </label>
                                                        </li>
                                                        <li class="d-inline-block solderMaskId">
                                                            <label class="rel item choose">
                                                                <i class="jp-ico subscript-ico"></i><input type="radio" name="SolderMaskId" class="" value="41" checked="checked" data-value="Xanh lá">
                                                                Xanh lá </label>
                                                        </li>
                                                        <li class="d-inline-block solderMaskId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SolderMaskId" class="" value="42" data-value="Đen">
                                                                Đen </label>
                                                        </li>
                                                        <li class="d-inline-block solderMaskId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SolderMaskId" class="" value="43" data-value="Trắng">
                                                                Trắng </label>
                                                        </li>
                                                        <li class="d-inline-block solderMaskId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SolderMaskId" class="" value="44" data-value="Vàng">
                                                                Vàng </label>
                                                        </li>
                                                        <li class="d-inline-block solderMaskId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SolderMaskId" class="" value="45" data-value="Đỏ">
                                                                Đỏ </label>
                                                        </li>
                                                        <li class="d-inline-block solderMaskId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SolderMaskId" class="" value="46" data-value="Xanh Dương">
                                                                Xanh dương </label>
                                                        </li>
                                                        <li class="d-inline-block solderMaskId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SolderMaskId" class="" value="47" data-value="Đen mờ">
                                                                Đen mờ </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Màu chữ:</span> <!-- Silkscreen Color -->
                                                <div class="hover_question position-relative d-inline-block ml-2">
                                                    <i class="fa fa-question-circle" aria-hidden="true">
                                                        <div class="absQuestionNotice color0">
                                                            <p>Trắng và Đen miễn phí. Các màu khác sẽ được tính thêm phí , Màu chữ và màu sơn phỉ trống hàn không thể cùng màu.</p>
                                                        </div>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block silkscreenColorId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SilkscreenColorId" class="" value="49" data-value="Không">
                                                                <i class="choose-color không"></i>
                                                                Không </label>
                                                        </li>
                                                        <li class="d-inline-block silkscreenColorId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SilkscreenColorId" class="" value="50" data-value="Đen">
                                                                <i class="choose-color Đen"></i>
                                                                Đen </label>
                                                        </li>
                                                        <li class="d-inline-block silkscreenColorId">
                                                            <label class="rel item choose">
                                                                <input type="radio" name="SilkscreenColorId" class="" value="51" checked="checked" data-value="Trắng">
                                                                <i class="choose-color trắng"></i>
                                                                Trắng </label>
                                                        </li>
                                                        <li class="d-inline-block silkscreenColorId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SilkscreenColorId" class="" value="52" data-value="Vàng">
                                                                <i class="choose-color vàng"></i>
                                                                Vàng </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Bề mặt hoàn thiện:</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block surfaceFinishId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SurfaceFinishId" class="" value="58" data-value="None">
                                                                None </label>
                                                        </li>
                                                        <li class="d-inline-block surfaceFinishId">
                                                            <label class="rel item choose">
                                                                <i class="jp-ico subscript-ico"></i><input type="radio" name="SurfaceFinishId" class="" value="59" checked="checked" data-value="HASL Lead Free">
                                                                HASL Lead Free </label>
                                                        </li>
                                                        <li class="d-inline-block surfaceFinishId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SurfaceFinishId" class="" value="60" data-value="Immersion Gold">
                                                                Immersion Gold </label>
                                                        </li>
                                                        <li class="d-inline-block surfaceFinishId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SurfaceFinishId" class="" value="61" data-value="Immersion Tin">
                                                                Immersion Tin </label>
                                                        </li>
                                                        <li class="d-inline-block surfaceFinishId">
                                                            <label class="rel item">
                                                                <input type="radio" name="SurfaceFinishId" class="" value="62" data-value="OSP">
                                                                OSP </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Phương pháp test:</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="option">
                                                    <ul class="option-choose">
                                                        <li class="d-inline-block testMethodId">
                                                            <label class="rel item choose">
                                                                <i class="jp-ico subscript-ico"></i><input type="radio" name="TestMethodId" class="" value="74" checked="checked" data-value="Kiểm tra bằng mắt thường">
                                                                Kiểm tra bằng mắt thường </label>
                                                        </li>
                                                        <li class="d-inline-block testMethodId">
                                                            <label class="rel item">
                                                                <input type="radio" name="TestMethodId" class="" value="113" data-value="Full test">
                                                                Full test </label>
                                                        </li>
                                                        <li class="d-inline-block testMethodId">
                                                            <label class="rel item">
                                                                <input type="radio" name="TestMethodId" class="" value="114" data-value="JIG Test">
                                                                JIG test </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <span>Yêu cầu đặc biệt:</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea class="form-control " rows="3" maxlength="200" name="Note" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="pbc-advanced">
                                            <div class="switch-box d-flex align-items-center justify-content-between">
                                                <div class="switch-left">
                                                    <i class="switch-box-icon smt-icon"></i>
                                                    <h6>SMT Assembly</h6>
                                                </div>
                                                <div class="switch-right d-flex">
                                                    <span class="ng-scope">
                                                        <span class="mx-2">Đặt gia công SMT</span>
                                                    </span>
                                                    <div class="switch-btn ng-scope" data-btn="1">
                                                        <i></i>
                                                        <input type="hidden" name="Assembly" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="switch-upload-box ng-scope ajax_switch_smt">

                                            </div>
                                        </div>
                                        <div class="pbc-advanced">
                                            <div class="switch-box d-flex align-items-center justify-content-between">
                                                <div class="switch-left">
                                                    <i class="switch-box-icon"></i>
                                                    <h6>Stencil</h6>
                                                </div>
                                                <div class="switch-right d-flex">
                                                    <span class="ng-scope">
                                                        <span class="mx-2">Đặt hàng cùng PCB</span>
                                                    </span>
                                                    <div class="switch-btn ng-scope" data-btn="2">
                                                        <i></i>
                                                        <input type="hidden" name="Stencil" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="switch-upload-box ng-scope ajax_switch_stencil">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="bg-white mb-3">
                                    <div class="product-option">
                                        <div class="d-flex align-items-center justify-content-between border-bot pb-3">
                                            <strong class="font16">Tổng:</strong>
                                            <div class="bold font20"><span class="font20 totalPrice">0</span></div>
                                        </div>
                                        <dl class="price-delivery-list">
                                            <dt>
                                                <span id="xxx" class="ww w3 text-center normal bg-f90 float-left">Thời gian sản xuất</span>
                                                <!-- <span class="ww w2 text-center normal float-left bg-8a8a8a">Số lượng</span> -->
                                                <!-- <span class="ww w3 text-center normal float-left bg-8a8a8a">Giá/dm<sup>2</sup></span> -->
                                            </dt>
                                            <dd class="pointer rel clearfix py-3">

                                                <span class="ww w1 tudc text-center normal bg-f90 float-left">
                                                    <input type="radio" name="LeadTime" value="3" checked> Bình thường </span>
                                                <span class="ww w1 tudc text-center normal bg-f90 float-left">
                                                    <input type="radio" name="LeadTime" value="2"> DHL </span>
                                                <span class="ww w1 tudc text-center normal bg-f90 float-left">
                                                    <input type="radio" name="LeadTime" value="1"> Nhanh VN </span>

                                            </dd>
                                            <p>Thời gian : <span class="timesx v1" id="timesx3">20 ngày</span><span class="timesx" id="timesx2">7-10 ngày</span><span class="timesx" id="timesx1">2-3 ngày</span>
                                            </p>
                                            <div class="courier-company mt-3">
                                                <h3 class="pcba_quote-title mt-3">Phí ship: </h3>
                                                <dt>
                                                    <span class="ww w1 text-center normal bg-f90 float-left">Loại</span>
                                                    <span class="ww w2 text-center normal float-left bg-8a8a8a">Số lượng</span>
                                                    <span class="ww w3 text-center normal float-left bg-8a8a8a">Giá tiền</span>
                                                </dt>
                                                <dd class="pointer rel clearfix my-1">
                                                    <span class="ww w1 text-center normal bg-f90 float-left">PCB</span>
                                                    <span class="ww w2 text-center normal float-left bg-8a8a8a" id="quantity">0</span>
                                                    <span class="ww w3 text-center normal float-left bg-8a8a8a" id="price">0</span>
                                                </dd>
                                                <dd class="pointer rel clearfix my-1" id="shipPrice_1" style="display:none">
                                                    <span class="ww w1 text-center normal bg-f90 float-left">SMT</span>
                                                    <span class="ww w2 text-center normal float-left bg-8a8a8a" id="quantity1">1</span>
                                                    <span class="ww w3 text-center normal float-left bg-8a8a8a" id="price1">0</span>
                                                </dd>
                                                <dd class="pointer rel clearfix my-1" id="shipPrice_2" style="display:none">
                                                    <span class="ww w1 text-center normal bg-f90 float-left">Stencil</span>
                                                    <span class="ww w2 text-center normal float-left bg-8a8a8a" id="quantity2">1</span>
                                                    <span class="ww w3 text-center normal float-left bg-8a8a8a" id="price2">0</span>
                                                </dd>
                                                <div class="Country mb-3 clearfix d-flex">
                                                    <select class="form-control select-default b-bradius4" name="TransportId" id="transportId" data-id="">
                                                        <option value="0">-- Phương thức vận chuyển --</option>
                                                        <option value="1">Vận chuyển nội thành Hà Nội</option>
                                                        <option value="2">Vận chuyển liên tỉnh</option>
                                                    </select> <select class="form-control select2 select-default b-bradius4" name="TransporterId" id="transporterId">
                                                        <option value="0">--Nhà vận chuyển--</option>
                                                        <option value="1">Viettelpost</option>
                                                        <option value="2">GHTK</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="pcb-time">
                                                <div class="clearfix">
                                                    <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                        <span>PCB Assembly Cost:</span> 
                        <span id="pcbAssemblyCos">0 VNĐ</span>
                    </div> -->
                                                    <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                        <span>Phí vận chuyển:</span> 
                        <span id="transporterPrice">0 VNĐ</span>
                    </div> -->
                                                    <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="bold">Tổng:</span> 
                        <span class="font20 yellow subTotal">0 VNĐ</span>
                    </div> -->
                                                    <div class="remarks my-3 clearfix">
                                                        <!-- <div class="remark-email mb-3">
                            <span class="color-red">*</span> Your email:
                            <input class="input-default" name="" id="" type="text">
                        </div> -->

                                                        <button class=" btn btn-yellow font18 bold" id="them_vao_gio_hang" type=button><i class="jp-ico bigcart-ico"></i>Thêm vào giỏ hàng</button>
                                                    </div>
                                                    <!-- <p class="color-999 font12">Tips:</p>
                    <p class="color-999 font12">      1. Please notice that the final amount is determined by the engineering review, and 5%-10% orders may need extra charge.</p>
                    <p class="color-999 font12">    2. We will follow your files to make the PCB boards&nbsp;and we are not responsible for finding all the issues in the Gerber file.&nbsp;</p>
                    <p class="color-999 font12">  3. The Manufacturing No. will be printed on your boards by default!</p> -->
                                                </div>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <input type="hidden" hidden="hidden" id="urlGetPriceTransporters" value="http://qttechvn.com/order/getPriceTransporters">

                                <input type="text" hidden="hidden" id="price" value="250000">
                                <input type="text" hidden="hidden" id="feesPrice" value="0">

                                <input type="text" hidden="hidden" id="price_1" value="180000">
                                <input type="text" hidden="hidden" id="feesPrice_1" value="0">

                                <input type="text" hidden="hidden" id="price_2" value="25000">
                                <input type="text" hidden="hidden" id="feesPrice_2" value="180000">

                                <input type="text" hidden="hidden" id="price_3" value="25000">
                                <input type="text" hidden="hidden" id="feesPrice_3" value="180000">

                                <input type="text" hidden="hidden" id="price_4" value="25000">
                                <input type="text" hidden="hidden" id="feesPrice_4" value="50000">

                                <input type="text" hidden="hidden" id="price_5" value="20000">
                                <input type="text" hidden="hidden" id="feesPrice_5" value="180000">

                                <input type="text" hidden="hidden" id="feesDhl" value="500000">
                                <input type="text" hidden="hidden" id="phoneNumberPcb" value="0978.302.994">
                                <input type="text" hidden="hidden" id="acreage" value="300000">
                                <input type="text" hidden="hidden" id="priceSmdSolderPoint" value="60">
                                <input type="text" hidden="hidden" id="priceDipSolderPoint" value="150">
                                <input type="text" hidden="hidden" id="feesPriceSmt_1" value="50000">
                                <input type="text" hidden="hidden" id="feesPriceSmt_2" value="500000">
                                <input type="text" hidden="hidden" id="feesPriceSmt_3" value="1000000">
                                <input type="text" hidden="hidden" id="price_dk" value="500000">
                                <input type="text" hidden="hidden" id="price_smt1" value="">
                                <input type="text" hidden="hidden" id="feesPriceSmt_4" value="1500000">
                                <input type="text" hidden="hidden" id="feesPriceSmt_5" value="">

                                <input type="text" hidden="hidden" id="priceSmdStencil" value="">
                                <input type="text" hidden="hidden" id="changeTransportId" value="0">
                                <input type="text" hidden="hidden" id="changeLeadTime" value="3">
                                <input type="text" hidden="hidden" id="totalPricePCB" value="0">
                                <input type="text" hidden="hidden" id="totalPricePCBAssembly" value="0">
                                <input type="text" hidden="hidden" id="changeDataTotalSize" value="0">
                                <input type="text" hidden="hidden" id="priceShip" value="0"> <input type="hidden" hidden="hidden" id="getDetailProductType" value="http://qttechvn.com/producttype/detail">
                                <input type="hidden" hidden="hidden" id="ajaxSwitchSmt" value="http://qttechvn.com/site/ajaxSwitchSmt">
                                <input type="hidden" hidden="hidden" id="checkPage" value="1">
                                <input type="hidden" hidden="hidden" id="infoProduct" value="">
                            </div>
                </form>
            </div>
        </div>
        </div>





        <input type="text" hidden="hidden" id="getListWardUrl" value="http://qttechvn.com/api/config/getListWard">
        <input type="text" hidden="hidden" id="uploadFileNormalUrl" value="http://qttechvn.com/file/uploadNormal">
        <input type="hidden" hidden="hidden" id="urlReadNotificationOrder" value="http://qttechvn.com/api/order/changeStatusReadOrder">
        <input type="hidden" hidden="hidden" id="HOST_API_GERBER_UPLOAD" value="http://gerber.hoanmuada.com/api/upload">
        <input type="hidden" hidden="hidden" id="HOST_API_GERBER_FILE" value="http://gerber.hoanmuada.com/api/file">
        <script src="http://qttechvn.com/assets/front/js/jquery-2.2.1.min.js"></script>
        <script src="http://qttechvn.com/assets/front/js/bootstrap.min.js"></script>
        <script src="http://qttechvn.com/assets/front/js/slick.min.js"></script>
        <script src="http://qttechvn.com/assets/front/js/wow.js"></script>
        <script src="http://qttechvn.com/assets/front/js/menu.js"></script>
        <script src="http://qttechvn.com/assets/front/js/script.js"></script>
        <script src="http://qttechvn.com/assets/vendor/plugins/pnotify/pnotify.custom.min.js"></script>
        <script src="https://unpkg.com/gerber-to-svg@^4.0.0/dist/gerber-to-svg.min.js"></script>
        <!--<script src=""></script>-->
        </div>

    </body>

    </html>
    <style>
        #customerSaveForm .position-relative .fa {
            position: absolute;
            top: 0;
            left: 0;
            width: 50px;
            display: flex;
            height: 37px;
            background: #ccc;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #484848;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px;
        }

        #customerSaveForm .position-relative span {
            position: absolute;
            top: 9px;
            right: 15px;
            font-size: 18px;
            color: #ff0000;
        }

        #customerSaveForm .position-relative input {
            padding: 0 0 0 60px;
        }

        .form-capcha #captcha {
            background: #ccc url('assets/front/images/1.jpg');
            padding: 0 20px;
            display: flex;
            height: 37px;
            align-items: center;
        }

        .form-capcha input {
            border: 1px solid #ccc;
            margin-left: 20px;
            border-radius: 4px;
            height: 37px;
        }

        .form-capcha {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal .modal-body .submit-create-account {
            width: 200px !important;
        }

        .contact-footer ul li a {
            color: #ff9900;
        }
    </style>
    <style>
        .download-button {
            display: inline-block !important;
            background-color: #008000;
            border-color: #008000;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            height: 34px;
            line-height: 1;
            margin-top: 5px;
            border-radius: .3rem;
            color: #fff;
        }

        .input-file #inputfile {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            max-width: 100%;
            bottom: 0;
            opacity: 0;
        }

        .input-file {
            display: none;
            cursor: pointer;
            position: relative;
            background-color: #008000;
            border-color: #008000;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            line-height: 1;
            margin-top: 5px;
            border-radius: .3rem;
            color: #fff;
            margin-left: 15px;

        }
    </style>


<?php


}
