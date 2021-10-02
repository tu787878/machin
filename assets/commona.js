
function test() {


}
window.onbeforeunload = function () {
    console.log("hi");
};

// ***************

function togleShowmore() {
    console.log("hihi");
}

var layers;
var all;

function beautifulName(name) {
    name = name.replace(all.file_folder + "/", "");
    return name;
}

function convertToVND(x){
    x = x.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
    console.log(x);
    return x;
}



function changeLayers() {
    let outline = false;
    // $('.preview2').html(all.top);
    // var z = svgPanZoom('#tudc_top');
    $('.choose_color').val("green");
    $('.my-preview').show();
    // $('.preview22').show();
    $('.my-preview .ct .right .options').html("");
    for (let index = 0; index < layers.length; index++) {
        console.log();
        const layer = layers[index];
        if (layer.type == "outline") {
            outline = true;
            $('#width_upload_board').val(layer.converter.width.toFixed(2));
            $('#width').val((layer.converter.width * 25.4).toFixed(2));
            $('#height_upload_board').val(layer.converter.height.toFixed(2));
            $('#height').val((layer.converter.height * 25.4).toFixed(2));
            $('#units_upload_board').val(layer.converter.units);
            $('#chieu_cao_mach').html(layer.converter.height.toFixed(2));
            $('#chieu_rong_mach').html(layer.converter.width.toFixed(2));
            vantuUpdate();
        }
        if (layer.side != null && layer.type != null && (layer.side == "all" || layer.side == "top") && layer.type != "outline") {
            $('.my-preview .ct .right .options').append(`<div class="option"><input type="checkbox" class="input_file_layer" value="` + index + `" checked name="file_layer" id="file_` + layer.filename + `"><label for="name">"` + beautifulName(layer.filename) + `"</label></div>`);
        }
        if (layer.type == "outline") {
            $('.my-preview .ct .right .options').append(`<div class="option"><input type="checkbox" class="input_file_layer" value="` + index + `" name="file_layer" checked id="file_` + layer.filename + `"><label for="name">` + 'Outline' + `</label></div>`);
        }
    }

    if(!outline){
        showNotification('Thiếu file outline, vui lòng thử lại', 0);
        return;
    }
    // layers.forEach((layer) => {
    //     console.log(layer);

    // });
    var DEFAULT_COLOR = {

        fr4: '#666',
        cu: '#ccc',
        cf: '#c93',
        sm: 'rgba(0, 66, 0, 0.75)',
        ss: '#fff',
        sp: '#999',
        out: '#000',
    }

    let new_layers = [];
    let checkeds = $('input[name="file_layer"]:checked');

    for (let index = 0; index < checkeds.length; index++) {
        const checked = checkeds.get(index);
        new_layers.push(layers[checked.value]);
    }

    // var stackup = pcbStackupCore(new_layers, { id: 'tudc', color: DEFAULT_COLOR, useOutline: true });
    // $('.preview1').html(stackup.top.svg);
    // var panZoomTiger = svgPanZoom('#tudc_top');

    pcbStackup(new_layers, {id: 'tudc', color: DEFAULT_COLOR, outlineGapFill: 3.6, useOutline: true}).then(stackup => {
        $('.preview1').html(stackup.top.svg);
        var panZoomTiger = svgPanZoom('#tudc_top');
    })

    // $('.preview22').hide();
    $('.input_file_layer').change(function (e) {
        toggleLayer();
    });

    $('input[type=radio][name=choose_side]').change(function () {

        let side = $('input[type=radio][name=choose_side]:checked').val();

        $('.my-preview .ct .right .options').html("");
        for (let index = 0; index < layers.length; index++) {
            const layer = layers[index];
            if (layer.side != null && layer.type != null && (layer.side == "all" || layer.side == side) && layer.type != "outline") {
                $('.my-preview .ct .right .options').append(`<div class="option"><input type="checkbox" class="input_file_layer" value="` + index + `" checked name="file_layer" id="file_` + layer.filename + `"><label for="name">"` + beautifulName(layer.filename) + `"</label></div>`);
            }
            if (layer.type == "outline") {
                $('.my-preview .ct .right .options').append(`<div class="option"><input type="checkbox" checked class="input_file_layer" value="` + index + `" name="file_layer" id="file_` + layer.filename + `"><label for="name">` + 'Outline' + `</label></div>`);
            }
        }

        toggleLayer();

        $('.input_file_layer').change(function (e) {
            toggleLayer();
        });
    });

    $('.choose_color').on('change', function () {
        toggleLayer();
    });

    vantuUpdate();
}

function toggleLayer() {

    let side = $('input[type=radio][name=choose_side]:checked').val();


    let new_layers = [];
    let checkeds = $('input[name="file_layer"]:checked');

    for (let index = 0; index < checkeds.length; index++) {
        const checked = checkeds.get(index);
        new_layers.push(layers[checked.value]);
    }

    let new_color;
    let color = $('.choose_color option').filter(':selected').val();
    switch (color) {
        case "black":
            new_color = {
                fr4: '#666',
                cu: '#ccc',
                cf: '#c93',
                sm: 'rgba(16, 16, 9, 0.75)',
                ss: '#fff',
                sp: '#999',
                out: '#000',
            };
            break;

        case "red":
            new_color = {
                fr4: '#666',
                cu: '#ccc',
                cf: '#c93',
                sm: 'rgba(251, 15, 9, 0.75)',
                ss: '#fff',
                sp: '#999',
                out: '#000',
            }
            break;
        case "blue":
            new_color = {
                fr4: '#666',
                cu: '#ccc',
                cf: '#c93',
                sm: 'rgba(16, 16, 245, 0.75)',
                ss: '#fff',
                sp: '#999',
                out: '#000',
            }
            break;
        case "green":
            new_color = {
                fr4: '#666',
                cu: '#ccc',
                cf: '#c93',
                sm: 'rgba(15, 103, 11, 0.75)',
                ss: '#fff',
                sp: '#999',
                out: '#000',
            }
            break;
        case "white":
            new_color = {
                fr4: '#666',
                cu: '#ccc',
                cf: '#c93',
                sm: 'rgba(255,255,255, 0.75)',
                ss: '#fff',
                sp: '#999',
                out: '#000',
            }
            break;
        case "yellow":
            new_color = {
                fr4: '#666',
                cu: '#ccc',
                cf: '#c93',
                sm: 'rgba(223, 233, 14, 0.75)',
                ss: '#fff',
                sp: '#999',
                out: '#000',
            }
            break;
    }

    // var stackup = pcbStackupCore(new_layers, { id: 'tudc', color: new_color, useOutline: true });

    pcbStackup(new_layers, {id: 'tudc', color: new_color, outlineGapFill: 3.6, useOutline: true}).then(stackup => {
       console.log(stackup);
        if (side == "top") {
            $('.preview1').html(stackup.top.svg);
            var panZoomTiger = svgPanZoom('#tudc_top');
        } else {
            $('.preview1').html(stackup.bottom.svg);
            var panZoomTiger2 = svgPanZoom('#tudc_bottom');
        }
    })



}

function vantuUpdate() {
    let data = new Object();

    if($('#height').val() == "" || $('#width').val() == "") return;

    data.width = parseFloat($('#height').val());
    data.height = parseFloat($('#width').val());


    if ($("input[name='LayerId']:checked").val() == "1") {
        data.lop = "";
    } else {
        data.lop = "_" + $("input[name='LayerId']:checked").val() + "lop";
    }

    let old_width = data.width;
    let old_height = data.height;

    data.quantity = parseInt($("input[name='Quantity']").val());

    if ($("input[name='ProductTypeId']:checked").val() == 1 && $('#so_cot_panel').val() != '' && $('#so_dong_panel').val() != '') {
        data.panel = true;
        data.height = parseInt($('#so_cot_panel').val()) * data.height;
        let xx = "";
        if ($("input[name='vien']:checked").val() == 2) {
            data.width = parseInt($('#so_dong_panel').val()) * data.width + 10;
            xx = " + 2 x 5";
        } else {
            data.width = parseInt($('#so_dong_panel').val()) * data.width;
        }

        data.quantity = Math.ceil(data.quantity / 4);

        $('.panel_size').html(`Column: (${old_width} x ${parseInt($('#so_dong_panel').val())}${xx})=${data.width}mm, Row: (${old_height} x ${parseInt($('#so_dong_panel').val())}) = ${data.height}mm, Số tấm: ${data.quantity}`);
    }else{
        data.panel = false;
    }
    console.log(data);

    jQuery.ajax({
        type: "POST",
        url: ajax.ajaxurl,
        data: { action: "calculate", data: data },
        success: function (res) {
            if(res != '') res = JSON.parse(res);
            else{
                res.status = 0;
            }
            console.log(res);
            
            if (res.status === 1) {
                console.log("ok");
                $('#total_price_text').html(convertToVND(res.price));

            } else {
                console.log("not ok");
                $('#total_price_text').html(convertToVND(0));
            }
        }
    });

}



$(document).ready(function () {

    $('#height').keydown(e => {
        console.log("ok con de");
        vantuUpdate();
    });

    $('#width').keydown(e => {
        console.log("ok con de");
        vantuUpdate();
    }); 

    $('.panel_detail').hide();

    $('.aluu').click(e => {
        $('.ko_alu').hide();
        $('#lop_cho_alu').click();
        $('#input_cho_alu').val("_alu");
        vantuUpdate();
    })
    $('.ko_phai_alu').click(e => {
        $('.ko_alu').show();
        $('#input_cho_alu').val("1");
        vantuUpdate();
    })

    $(".so_lop").click(e => {
        $(e.currentTarget).children().get(0).checked = true
        vantuUpdate();
    })

    $('#ko_vien').click(e => {
        $('#ko_vien_dau').prop("checked", true);
        $('#vien_do_nha').prop("checked", false);
        vantuUpdate();
    })

    $('#vien_nha').click(e => {
        $('#vien_do_nha').prop("checked", true);
        $('#ko_vien_dau').prop("checked", false);
        vantuUpdate();
    })

    $("#quantity").change(function () {
        vantuUpdate();
    });

    $("#so_dong_panel").change(function () {
        vantuUpdate();
    });

    $("#so_cot_panel").change(function () {
        vantuUpdate();
    });

    $('.of_orderTypeId').click(e => {
        $('.panel_detail').hide();
        vantuUpdate();
    });

    $('.on_orderTypeId').click(e => {
        if (parseInt($("#quantity").val()) >= 50) {
            $('.panel_detail').show();
            vantuUpdate();
        } else {
            showNotification('Panel cho ít nhất 50 PCB', 0);
        }

    });

    jQuery('.show_more_text').click(function (e) {
        if (!jQuery(this).parent().children('.show_more_content').is(":visible")) {
            jQuery(this).parent().children('.show_more_content').show();
            jQuery(this).html("Show less");
        } else {
            jQuery(this).parent().children('.show_more_content').hide();
            jQuery(this).html("Show more");
        }
    });



    if ($('input.profileGender').length > 0) {
        $('input.profileGender').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
            increaseArea: '20%' // optional
        });
    }
    if ($('.datepicker').length > 0) {
        $(function () {
            $(".datepicker").datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true
            });
        });
    }


    $('#them_vao_gio_hang').click(function (e) {
        let parameter = "";

        let order_id = "O" + (Date.now().toString(36) + Math.random().toString(36).substr(2)).substr(10);

        let data = new Object();

        data.order_id = order_id;
        data.type_pcb = $("input[name='ProductTypeId']:checked").attr('data-product-type');
        data.width = $("input[name='Width']").val();
        data.height = $("input[name='Height']").val();
        data.quantity = $("input[name='Quantity']").val();
        data.layers = $.trim($("input[name='LayerId']:checked").parent().text())
        data.type_order = $("input[name='OrderTypeId']:checked").attr('data-text');
        data.dichte = $("input[name='ThicknessPcbId']:checked").attr('data-value');
        data.dichte_done = $("input[name='FinishedCopperId']:checked").attr('data-value');
        data.distant = $("input[name='MinSpacingId']:checked").attr('data-value');
        data.size_khoan = $("input[name='MinHoleSizeId']:checked").attr('data-product-type');
        data.color = $("input[name='SolderMaskId']:checked").attr('data-value');
        data.text_color = $("input[name='SilkscreenColorId']:checked").attr('data-value');
        data.interface = $("input[name='SurfaceFinishId']:checked").attr('data-value');
        data.test = $("input[name='TestMethodId']:checked").attr('data-value');
        data.note = $("textarea[name='Note']").val();
        data.price = Math.floor(Math.random() * 999);
        data.file = $("#file_upload_id").val();

        if ($("input[name='Assembly']").val() === '1') {
            data.isAssembly = 1;
            let assembly = new Object();
            assembly.side = $('select[name=AssemblySideId] option').filter(':selected').html();
            assembly.diem_han_smd = $("input[name='SMDSolderJoints']").val();
            assembly.diem_han_dip = $("input[name='DIPSolderJoints']").val();
            assembly.linh_kien_dan = $("input[name='ComponentsPaste']").val();
            assembly.linh_kien_gan = $("input[name='ComponentsPlug']").val();
            assembly.dong_goi = $('select[name=PCBAShippingPackageId] option').filter(':selected').html();
            assembly.xac_nhan = $('select[name=PCBAConfirmationId] option').filter(':selected').html();
            assembly.height_2 = $("input[name='Height2']").val();
            assembly.width_2 = $("input[name='Width2']").val();
            data.assembly = assembly;
        } else {
            data.isAssembly = 0;
        }

        if ($("input[name='Stencil']").val() === '1') {
            data.isStencil = 1;
            let stencil = new Object();
            stencil.loai_stencil = $.trim($("input[name='StencilTypeId']:checked").parent().text());
            stencil.danh_bong = $.trim($("input[name='ElectropolishingId']:checked").parent().text())
            stencil.mat_stencil = $.trim($("input[name='StencilSideId']:checked").parent().text())
            stencil.kich_thuoc = $("select[name='SizeId'] option").filter(':selected').html();
            stencil.quantity_2 = $("input[name='Quantity2']").val();
            stencil.do_day = $.trim($("input[name='ThicknessSmdId']:checked").parent().text())
            stencil.note_2 = $("textarea[name='Note2']").val();
            data.stencil = stencil;
        } else {
            data.isStencil = 0;
        }

        if ($("input[name='ProductTypeId']:checked").val() == 1 && $('#so_cot_panel').val() != '' && $('#so_dong_panel').val() != '') {
            data.panel = 1;
            data.col_panel = $('#so_cot_panel').val();
            data.row_panel = $('#so_dong_panel').val()
            data.vien = $("input[name='vien']:checked").val() == 2 ? "Viền" : "Không";
        }

        console.log(data);
        jQuery.ajax({
            type: "POST",
            url: ajax.ajaxurl,
            data: { action: "add_to_card", data: data },
            success: function (res) {
                res = JSON.parse(res);
                console.log(res);
                if (res.status === 1) {
                    parameter = order_id;
                    window.location.href = machin.home + "/gio-hang/?add-to-cart="+ res.id +"&data_id=" + parameter;
                } else {
                    console.log("not ok");
                }
            }
        });
    });
});
var code;
function createCaptcha() {
    //clear the contents of captcha div first 
    document.getElementById('captcha').innerHTML = "";
    var charsArray =
        "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {
        //below code will not allow Repetition of Characters
        var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
        if (captcha.indexOf(charsArray[index]) == -1)
            captcha.push(charsArray[index]);
        else i--;
    }
    var canv = document.createElement("canvas");
    canv.id = "captcha";
    canv.width = 100;
    canv.height = 50;
    var ctx = canv.getContext("2d");
    ctx.font = "25px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);
    //storing captcha so that can validate you can save it somewhere else according to your specific requirements
    code = captcha.join("");
    document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
}

let image = null;
$(document).ready(function () {
    province();
    $('.fogot-pass').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#fogotPass').modal('show');
        $('#modalLogin').modal('hide');
    })
    $('#send-token').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var form = $('#sendToken');
        var data = form.serialize();
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: data,
            success: function (response) {
                var json = $.parseJSON(response);
                showNotification(json.message, json.code);
                if (json.code == 1) {
                    $('#fogotPass').modal('hide');
                }
            },
            error: function () {
                showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n!', 0);
            }
        });
    })
    $('#imgAvatar').click(function (e) {
        e.preventDefault();
        $('#avatar').trigger('click');
    })
    chooseFile($('#avatar'), $('#fileProgress'), 3, function (fileUrl) {
        $('img#imgAvatar').attr('src', fileUrl).show();
    });
    $("body").on('click', '.btnShowModalLogin', function () {
        $("#modalLogin").modal('show');
    });
    $('body').on('keydown', '#phoneNumber', function (e) {
        if (checkKeyCodeNumber(e)) e.preventDefault();
    });
    $("body").on('click', '.submit-login', function () {
        if (validateEmpty('#userForm')) {
            var form = $('#userForm');
            var data = form.serialize();
            form.find('input, button').prop("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "json",
                url: form.attr('action'),
                data: data,
                success: function (response) {
                    var json = response;// $.parseJSON(response);
                    showNotification(json.message, json.code);
                    if (json.code == 1) {
                        redirect(true, "");
                        // var data = json.data;
                        // $("span#fullNameLogin").html(data.FullName);
                        // $("span#spanDetails").html(`
                        //     <img class="img-menu1" src="assets/front/images/onejian.png">
                        //     <img class="img-menu2" src="assets/front/images/hoveronejian.png">
                        // `);

                        // $(".login-info").append(`
                        //     <div class="link_info_login">
                        //         <a href="${data.urlDetailOrder}">ThÃ´ng tin Ä‘Æ¡n hÃ ng</a>
                        //     </div>`
                        // );

                        // $("li#li_logout").html(`
                        //     <a href="${data.urlLogOut}">
                        //         <img src="assets/front/images/Suggestions.png" >
                        //         <span>ÄÄƒng xuáº¥t</span>
                        //     </a>
                        // `);
                        $("#modalLogin").modal('hide');
                    }
                    else {
                        form.find('input, button').prop("disabled", false);
                    }
                },
                error: function (response) {
                    showNotification($('input#errorCommonMessage').val(), 0);
                    form.find('input, button').prop("disabled", false);
                }
            });
        }
        return false;
    });

    $("body").on('click', '.submit-create-account', function () {
        if (validateEmpty('#customerSaveForm')) {
            if (document.getElementById("cpatchaTextBox").value == code) {
                // alert("Valid Captcha")
            } else {
                showNotification('MÃ£ captcha khÃ´ng chÃ­nh xÃ¡c', 0);
                createCaptcha();
                return false;
            }
            if ($("#customerSaveForm input[name=Password]").val() != $("#customerSaveForm input[name=RePass]").val()) {
                showNotification('Máº­t kháº©u khÃ´ng trÃ¹ng', 0);
                return false;
            }
            if ($("#customerSaveForm input[name=Password]").val().length < 6) {
                showNotification('Máº­t kháº©u Ã­t nháº¥t 6 kÃ½ tá»±.', 0);
                return false;
            }

            if (!checkSpecialChar($('input[name="FullName"]'))) {
                showNotification("Há» tÃªn khÃ´ng Ä‘Æ°á»£c chá»©a kÃ½ tá»± Ä‘áº·c biá»‡t", 0);
                $('input[name="FullName"]').focus();
                return false;
            }

            if ($('input[name="FullName"]').val().trim() < 4) {
                showNotification('Há» tÃªn Ã­t nháº¥t 4 kÃ½ tá»±.', 0);
                $('input[name="FullName"]').focus();
                return false;
            }
            if (!checkPhoneNumber($('#phone_number')) && $('#phone_number').val().trim() != '') {
                showNotification("Sá»‘ Ä‘iá»‡n thoáº¡i khÃ´ng Ä‘Ãºng", 0);
                $('#phone_number').focus();
                return false;
            }

            if (!isEmail($('#email').val()) && $('#email').val().trim() != '') {
                showNotification("Email khÃ´ng Ä‘Ãºng", 0);
                $('#email').focus();
                return false;
            }

            var form = $('#customerSaveForm');
            var data = form.serialize();
            form.find('input, button').prop("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "json",
                url: form.attr('action'),
                data: data,
                success: function (response) {
                    var json = response;// $.parseJSON(response);
                    showNotification(json.message, json.code);
                    if (json.code == 1) {
                        var data = json.data;
                        $("span#fullNameLogin").html(data.FullName);
                        $("li#li_logout").html(`
                            <a href="${data.urlLogOut}">
                                <img src="assets/front/images/Suggestions.png" >
                                <span>ÄÄƒng xuáº¥t</span>
                            </a>
                        `);
                        $("#modalRegister").modal('hide');
                    }
                    else {
                        form.find('input, button').prop("disabled", false);
                    }
                },
                error: function (response) {
                    showNotification($('input#errorCommonMessage').val(), 0);
                    form.find('input, button').prop("disabled", false);
                }
            });
        }
        return false;
    });

    // Load file gerber
    $("body").on('click', '#btnUpdateFileGerber', function (e) {
        $(".preview").html('');
        $('#inputFileGerber').val('');
        $('#inputFileGerber').trigger('click');
    });

    $("body").on('change', '#inputFileGerber', function (e) {
        var file = this.files[0];
        if (parseInt(file.size) >= 5000000) {
            showNotification("File vÆ°á»£t quÃ¡ 5mb", 0);
            return false;
        }
        var typeFile = file.name.split(".").pop();
        var whiteList = ['zip', 'rar'];
        if (whiteList.indexOf(typeFile) === -1) {
            showNotification('Tá»‡p tin pháº£i lÃ  file excel cÃ³ Ä‘á»‹nh dáº¡ng zip/rar', 0);
            return;
        }
        var data = new FormData();
        data.append('file', file);
        //(file);
        $.ajax({
            type: 'POST',
            url: 'https://machinlocal.imaker.vn/api/v1.0/uploadFile',
            data: data,
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            success: function (response) {
                //var json = $.parseJSON(response);
                // console.log(response.top);
                // data.reset();
                // $('.my-preview').show();
                // $('.preview1').html(response.top);
                // $('.preview2').html(response.bottom);
                // var panZoomTiger = svgPanZoom('#tudc_top');
                // var panZoomTiger2 = svgPanZoom('#tudc_bottom');
                if (response.status == 1) {
                    layers = response.layers;
                    all = response;
                    //folder = response.file_folder;
                    //file_id = response.id_file;
                    $('#file_upload_id').val(response.id_file);
                    changeLayers();
                    console.log(response);
                    

                } else {
                    showNotification(response.message, 0);
                }

            },
            error: function (response) {
                showNotification('Có lỗi xảy ra!', 0);
            }
        });

        return;
        $.ajax({
            type: 'POST',
            url: $('input#uploadFileNormalUrl').val(),
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            data: data,
            success: function (response) {
                var json = $.parseJSON(response);
                if (json.code == 1) {

                    $(".preview").html(`
                        <img style="display:none;" id="imageGerber">
                        <canvas id="viewerX"></canvas>
                        <div id="app-change"></div>
                        <div id="app-c"></div>
                    `);
                    generateFileGerber(file);
                    $("input#fileGerberUrl").val(json.data);
                    $("input#fileTextName").val(file.name);
                } else showNotification(json.message, json.code);
                // data.reset();
            },
            error: function (response) {
                showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n', 0);
            }
        });
        return false;
    });

    // cáº­p nháº­t thÃ´ng bÃ¡o Ä‘Æ¡n hÃ ng Ä‘Ã£ Ä‘á»c khi khÃ¡ch hÃ ng click vÃ o
    $("body").on('click', '.readOrderCustomer', function () {
        var $this = $(this);
        if ($this.hasClass("active")) {
            var orderId = parseInt($(this).attr('order-id'));
            if (orderId > 0) {
                $.ajax({
                    type: "POST",
                    url: $("input#urlReadNotificationOrder").val(),
                    data: {
                        OrderId: orderId
                    },
                    success: function (json) {
                        if (json.code == 1) {
                            $this.removeClass('active');
                            $("span.countNoti").html(json.countNoti);
                        } else {
                            showNotification(json.message, json.code);
                        }
                    },
                    error: function (response) {
                        showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n', 0);
                    }
                });
            } else showNotification('ÄÆ¡n hÃ ng khÃ´ng tá»“n táº¡i.', 0);
        }

        return false;
    });

    // lÃ m trÃ²n sá»‘ lÃªn 5
    $(window).click(function (e) {
        var rounding = $('input.rounding');
        if (rounding.length > 0) {
            var value = rounding.val();
            if (rounding.has(e.target).length == 0 && !rounding.is(e.target) && value.length > 0) {
                rounding.val(decimalAdjust(value));
            }
        }
    });
    $('.updateProfile').click(function () {
        var form = $('#profileForm');
        var datas = form.serializeArray();
        datas.push({ name: "Avatar", value: $('img#imgAvatar').attr('src') });
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: datas,
            success: function (response) {
                var json = response;
                showNotification(json.message, json.code);
            },
            error: function (response) {
                showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n', 0);
                $('.submit').prop('disabled', false);
            }
        });
    })
    $('#changePassModal .changePass').click(function () {
        var form = $('#changePassForm');
        var datas = form.serializeArray();
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: datas,
            success: function (response) {
                var json = response;
                showNotification(json.message, json.code);
                if (json.code == 1) {
                    $('#changePassModal').modal('hide');
                    form.find('input').val('');
                }
            },
            error: function (response) {
                showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n', 0);
                $('.submit').prop('disabled', false);
            }
        });
    })
});

function decimalAdjust(value) {
    if ((value % 5) == 0) return value;
    else if ((value % 5) == 1) return parseInt(value) + 4;
    else if ((value % 5) == 2) return parseInt(value) + 3;
    else if ((value % 5) == 3) return parseInt(value) + 2;
    else if ((value % 5) == 4) return parseInt(value) + 1;
}

function generateFileGerber(file) {
    var HOST_API_GERBER_UPLOAD = $("input#HOST_API_GERBER_UPLOAD").val();
    var HOST_API_GERBER_FILE = $("input#HOST_API_GERBER_FILE").val();
    // let file = file;
    let fileName = (file.name).replace(/.zip|.rar/, '');
    $('#infoProduct').val(fileName);
    let formData = new FormData();

    formData.append("file", file);

    var converter = gerberToSvg('http://imaker.local/wp-content/plugins/MachInPlugin/assets/MODULE555_copper_bottom.gbr');
    console.log(converter);

    // state.innerHTML = 'Äang táº£i lÃªn....';
    fetch(HOST_API_GERBER_UPLOAD, { method: "POST", body: formData }).then(res => res.json()).then(res => {
        // state.innerHTML = 'Äang xá»­ lÃ½....';
        // Khá»Ÿi táº¡o sau khi táº£i lÃªn
        $('#hackergrousrlpprsc-loader').fadeIn();
        $('#btnUpdateFileGerber').prop('disabled', true);
        if (res && res.success) {

            $("input[name='GerBerFileId']").val(res.data);
            console.log(res.data);
            HDGerber({
                domCanvas: '#viewerX',
                domSelect: '#app-c',
                domChangeColor: '#app-change',
                fileId: res.data,
                host: HOST_API_GERBER_FILE,
                size: {
                    width: 800,
                    height: 800
                },
                callback: (color) => {
                    viewImage();
                }
            }).then(res => {
                var checkPage = $('input#checkPage').val();
                if (checkPage == 1) {
                    var price = replaceCost($("input#price").val(), true);
                    var feesPrice = replaceCost($("input#feesPrice").val(), true);
                    var price_1 = replaceCost($("input#price_1").val(), true);
                    var feesPrice_1 = replaceCost($("input#feesPrice_1").val(), true);
                    var price_2 = replaceCost($("input#price_2").val(), true);
                    var feesPrice_2 = replaceCost($("input#feesPrice_2").val(), true);
                    var price_3 = replaceCost($("input#price_3").val(), true);
                    var feesPrice_3 = replaceCost($("input#feesPrice_3").val(), true);
                    var price_4 = replaceCost($("input#price_4").val(), true);
                    var feesPrice_4 = replaceCost($("input#feesPrice_4").val(), true);
                    var price_5 = replaceCost($("input#price_5").val(), true);
                    var feesPrice_5 = replaceCost($("input#feesPrice_5").val(), true);
                    var feesDhl = replaceCost($("input#feesDhl").val(), true);
                    var phoneNumberPcb = $("input#phoneNumberPcb").val();

                    var leadTime = parseInt($('input[name="LeadTime"]:checked').val());
                    var transportId = parseInt($('input#changeTransportId').val());
                    var quantity = parseInt($("input[name='Quantity']").val());
                    var height = parseFloat(res.height).toFixed(0);
                    var width = parseFloat(res.width).toFixed(0);
                    var quantity = replaceCost($("input[name='Quantity']").val(), true);
                    totalPrice(price, feesPrice, price_1, price_2, feesPrice_2, price_3, feesPrice_3, height, width, quantity, leadTime, transportId, feesPrice_1, price_4, feesPrice_4, price_5, feesPrice_5, feesDhl, phoneNumberPcb);
                }
                else if (checkPage == 2) {
                    var boardQuantity = replaceCost($("input[name='BoardQuantity']").val());
                    var transportId = parseInt($('input#changeTransportId').val());
                    var SMDSolderJoints = replaceCost($("input[name='SMDSolderJoints']").val());
                    var DIPSolderJoints = replaceCost($("input[name='DIPSolderJoints']").val());
                    var componentsPaste = replaceCost($("input[name='ComponentsPaste']").val());
                    totalPricePCBAssembly(SMDSolderJoints, DIPSolderJoints, transportId, componentsPaste, boardQuantity);
                }
                else if (checkPage == 3) {
                    var transportId = parseInt($('input#changeTransportId').val());
                    var quantity = parseInt($("input[name='Quantity']").val());
                    var productTypeId = parseInt($("select#sizeId").val());
                    changeDataTotalSize(productTypeId, transportId, quantity);

                }
                $('.bg-white .preview #app-change').addClass('show');
                $('.genber_tutorial').show();
                $('#hackergrousrlpprsc-loader').fadeOut();
                $('#btnUpdateFileGerber').prop('disabled', false);
                if (parseInt(res.layerLength) > 0) {

                    $('.bg-white .preview #viewerX').addClass('height300');
                    // $("#imageGerber").show();
                    updatePosition = res.updatePosition; // CHá»©c nÄƒng cáº­p nháº­t vá»‹ trÃ­ báº£ng VD: giáº£m tá»a Ä‘á» 10,10 updatePosition({x:-10,y:-10})
                    updateScale = res.updateScale; // Cáº­p nháº­t kÃ­ch thÆ°á»›c  VD tÄƒng gáº¥p 2 kÃ­ch thÆ°á»›c updateScale(2)
                    // $("#loadDataFileGerBer").html(JSON.stringify(res));
                    image = res.exportPng;
                    viewImage();
                    const isCheck = $(".checkClassActive").attr('data-id');
                    if (isCheck == 'li_1') {
                        var height = parseFloat(res.height).toFixed(0);
                        var width = parseFloat(res.width).toFixed(0);
                        $("input[name='Height']").val(height);
                        $("input[name='Width']").val(width);
                        var quantity = replaceCost($("input[name='Quantity']").val(), true);

                        var productTypeId = parseInt($("input[name='ProductTypeId']:checked").val());
                        var price = replaceCost($("input#price").val(), true);
                        var price_2 = replaceCost($("input#price_2").val(), true);
                        var leadTime = parseInt($('input[name="LeadTime1"]:checked').val());
                        var transportId = parseInt($("select#transportId").val());
                        changeDataTotal(productTypeId, height, width, price, price_2, quantity, leadTime, transportId);
                        return false;
                    } else if (isCheck == 'li_2') {
                        var height = parseFloat(res.height).toFixed(0);
                        var width = parseFloat(res.width).toFixed(0);
                        $("input[name='Height']").val(height);
                        $("input[name='Width']").val(width);
                    }
                } else {
                    $(".preview").html('');
                    $('#inputFileGerber').val('');
                    showNotification("File táº£i lÃªn khÃ´ng pháº£i lÃ  file gerber hoáº·c file gerber bá»‹ lá»—i.", 0);
                    return false;
                }

            });
        }
    });
    return false;
}

function viewImage() {
    if (image) {
        document.querySelector('#imageGerber').setAttribute('src', image());
    }
}

function validateEmpty(container) {
    if (typeof (container) == 'undefined') container = 'body';
    var flag = true;
    $(container + ' .hmdrequired').each(function () {
        if ($(this).val().trim() == '') {
            showNotification($(this).attr('data-field') + ' khÃ´ng Ä‘Æ°á»£c bá» trá»‘ng', 0);
            $(this).focus();
            flag = false;
            return false;
        }
    });
    return flag;
}

function replaceCost(cost, isInt) {
    cost = cost.replace(/\,/g, '');
    if (cost == '') cost = 0;
    if (isInt) return parseInt(cost);
    else return parseFloat(cost);
}

function formatDecimal(value) {
    value = value.replace(/\,/g, '');
    while (value.length > 1 && value[0] == '0' && value[1] != '.') value = value.substring(1);
    if (value != '' && value != '0') {
        if (value[value.length - 1] != '.') {
            if (value.indexOf('.00') > 0) value = value.substring(0, value.length - 3);
            value = addCommas(value);
            return value;
        }
        else return value;
    }
    else return 0;
}

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function showNotification(msg, type) {
    var typeText = 'error';
    if (type == 1) typeText = 'success';
    var notice = new PNotify({
        title: 'Thông báo',
        text: msg,
        type: typeText,
        delay: 2000,
        addclass: 'stack-bottomright',
        stack: { "dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15 }
    });
}

function province(provinceIdStr, districtIdStr, wardIdStr) {
    if (typeof (provinceIdStr) == 'undefined') {
        provinceIdStr = 'provinceId';
        districtIdStr = 'districtId';
        wardIdStr = 'wardId';
    }
    var selPro = $('select#' + provinceIdStr);
    if (selPro.length > 0) {
        var selDistrict = $('select#' + districtIdStr);
        var selWard = $('select#' + wardIdStr);
        selDistrict.find('option').hide();
        selDistrict.find('option[value="0"]').show();
        var provinceId = selPro.val();
        if (provinceId != '0') selDistrict.find('option[data-id="' + provinceId + '"]').show();
        selPro.change(function () {
            selDistrict.find('option').hide();
            provinceId = $(this).val();
            if (provinceId != '0') selDistrict.find('option[data-id="' + provinceId + '"]').show();
            selDistrict.val('0');
            //selWard.val('0');
            selWard.html('<option value="0">--Chá»n--</option>');
        });
        var districtId = selDistrict.val();
        if (districtId != '0') getListWard(districtId, selWard, selWard.attr('data-id'));
        selDistrict.change(function () {
            districtId = $(this).val();
            if (districtId != '0') getListWard(districtId, selWard, 0);
        });
    }
}

function getListWard(districtId, selWard, wardId) {
    $.ajax({
        type: "POST",
        url: $('input#getListWardUrl').val(),
        data: {
            DistrictId: districtId
        },
        success: function (response) {
            var data = $.parseJSON(response);
            var html = '<option value="0">--Chá»n--</option>';
            for (var i = 0; i < data.length; i++) html += '<option value="' + data[i].WardId + '">' + data[i].WardName + '</option>';
            selWard.html(html).val(wardId);
        },
        error: function (response) {
            selWard.html('<option value="0">--Chá»n--</option>');
        }
    });
}

function redirect(reload, url) {
    if (reload) {
        window.setTimeout(function () {
            window.location.reload(true);
        }, 2000);
    }
    else {
        window.setTimeout(function () {
            window.location.href = url;
        }, 2000);
    }
}

function calculateTheArea(width = 0, height = 0) {
    // convert milimet to met
    width = width / 1000;
    height = height / 1000;
    return width * height;
}
function checkPhoneNumber() {
    var flag = false;
    var phone = $('input#phoneNumber').val().trim(); // ID cá»§a trÆ°á»ng Sá»‘ Ä‘iá»‡n thoáº¡i
    phone = phone.replace('(+84)', '0');
    phone = phone.replace('+84', '0');
    phone = phone.replace('0084', '0');
    phone = phone.replace(/ /g, '');
    if (phone != '') {
        var firstNumber = phone.substring(0, 2);
        if ((firstNumber == '09' || firstNumber == '08' || firstNumber == '03') && phone.length == 10) {
            if (phone.match(/^\d{10}/)) {
                flag = true;
            }
        } else if (firstNumber == '01' && phone.length == 11) {
            if (phone.match(/^\d{11}/)) {
                flag = true;
            }
        }
    }
    return flag;
}

function isEmail(email) {
    var isValid = false;
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (regex.test(email)) {
        isValid = true;
    }
    return isValid;
}
function checkKeyCodeNumber(e) {
    return !((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode == 8 || e.keyCode == 35 || e.keyCode == 36 || e.keyCode == 37 || e.keyCode == 39 || e.keyCode == 46);
}

function checkPhoneNumber($element) {
    var flag = false;
    var phone = $element.val().trim(); // ID cá»§a trÆ°á»ng Sá»‘ Ä‘iá»‡n thoáº¡i
    phone = phone.replace('(+84)', '0');
    phone = phone.replace('+84', '0');
    phone = phone.replace('0084', '0');
    phone = phone.replace(/ /g, '');
    if (phone != '') {
        var firstNumber = phone.substring(0, 2);
        if ((firstNumber == '09' || firstNumber == '08' || firstNumber == '03') && phone.length == 10) {
            if (phone.match(/^\d{10}/)) {
                flag = true;
            }
        } else if (firstNumber == '01' && phone.length == 11) {
            if (phone.match(/^\d{11}/)) {
                flag = true;
            }
        }
    }
    return flag;
}

function checkSpecialChar($element) {
    var flag = false;
    var string = $element.val();
    if (string.search(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\-|\_|\{|\[|\}|\]|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi) == -1) {
        flag = true;
    }
    return flag;
}



// function validateCaptcha() {
//     event.preventDefault();
//     // debugger
//     if (document.getElementById("cpatchaTextBox").value == code) {
//         // alert("Valid Captcha")
//     }else{
//         showNotification('MÃ£ captcha khÃ´ng chÃ­nh xÃ¡c', 0);
//         createCaptcha();

//     }
// }
$("body").on('click', '.payment_confirmation', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var save = $(this).data('save');
    $.ajax({
        type: "POST",
        url: $('input#confirmationCart').val(),
        data: {
            Id: id,
            Save: save,
        },
        success: function (response) {
            var json = $.parseJSON(response);
            if (json.code == 1) {
                showNotification(json.message, json.code);
                setTimeout(function () {
                    redirect(true, '');
                }, 1000);
            }
            else {
                showNotification(json.message, json.code);
                setTimeout(function () {
                    redirect(true, '');
                }, 1000);
            }
        },
        error: function (response) {
            showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n', 0);
        }
    });
});
$("body").on('click', '.delete_cart', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-delete');
    $('#confirm-delete').modal({
        backdrop: 'static',
        keyboard: false
    })
        .on('click', '#delete-delete', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $('input#deleteCart').val(),
                data: { Id: id },
                success: function (response) {
                    var json = $.parseJSON(response);
                    if (json.code == 1) {
                        showNotification(json.message, json.code);
                        setTimeout(function () {
                            redirect(true, '');
                        }, 1000);
                    }
                    else {
                        showNotification(json.message, json.code);
                        setTimeout(function () {
                            redirect(true, '');
                        }, 1000);
                    }
                },
                error: function (response) {
                    showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n', 0);
                }
            });
        });
    $("#cancel-delete").on('click', function (e) {
        e.preventDefault();
        $('#confirm-delete').modal('hide');
    });
});

function chooseFile(inputFileImage, fileProgress, fileTypeId, fnSuccess) {
    inputFileImage.change(function (e) {
        var file = this.files[0];
        if (!validateImage(file.name)) return;
        var reader = new FileReader();
        reader.addEventListener("load", function () {
            fileProgress.show();
            $.ajax({
                xhr: function () {
                    return progressBarUpload(fileProgress);
                },
                type: 'POST',
                url: $('input#uploadFileUrl').val(),
                data: {
                    FileBase64: reader.result,
                    FileTypeId: fileTypeId,
                    Customer: true,
                },
                success: function (response) {
                    var json = $.parseJSON(response);
                    if (json.code == 1) fnSuccess(json.data);
                    else showNotification(json.message, json.code);
                    fileProgress.hide();
                },
                error: function (response) {
                    fileProgress.hide();
                    showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n', 0);
                }
            });
        }, false);
        if (file) reader.readAsDataURL(file);
    });
}
function validateImage(fileName) {
    var typeFile = getFileExtension(fileName);
    var whiteList = ['jpeg', 'jpg', 'png', 'bmp', 'svg'];
    if (whiteList.indexOf(typeFile) === -1) {
        showNotification('Tá»‡p tin pháº£i lÃ  áº£nh cÃ³ Ä‘á»‹nh dáº¡ng , jpeg/jpg/png/bmp/svg', 0);
        return false;
    }
    return true;
}
function getFileExtension(fileName) {
    return fileName.split(".").pop().toLowerCase();
}

function progressBarUpload(progressBarId) {
    var xhr = new window.XMLHttpRequest();
    xhr.upload.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
            var prb = progressBarId.find('.progress-bar');
            prb.text(percentComplete + '%');
            prb.css({
                width: percentComplete + '%'
            });
            if (percentComplete === 100) {
                setTimeout(function () {
                    prb.text('Táº£i áº£nh lÃªn hoÃ n thÃ nh');
                }, 1000);
            }
        }
    }, false);
    return xhr;
}

// xuáº¥t file bÃ¡o giÃ¡
$("body").on('click', '.btnExport', function () {
    var $this = $(this);
    var orderId = parseInt($(this).attr('order-id'));
    if (orderId > 0) {
        $.ajax({
            type: "POST",
            url: $("input#exportFileQuote").val(),
            data: {
                OrderId: orderId
            },
            dataType: 'html',
            success: function (response) {
                var json = $.parseJSON(response);
                showNotification(json.message, json.code);
                if (json.code == 1) {
                    var html = '';
                    var list = json.data;
                    var i = 1;
                    var total = 0;
                    var vat = 0;
                    var sumToltal = 0;
                    $('#exportPdf .fullName').text(list['FullName']);
                    $('#exportPdf .address').text(list['Address']);
                    $('#exportPdf .ward').text(list['Ward']);
                    $('#exportPdf .district').text(list['District']);
                    $('#exportPdf .province').text(list['Province']);
                    $('#exportPdf .phoneNumber').text(list['PhoneNumber']);
                    $('#exportPdf .OrderCode').text(list['OrderCode']);
                    $('#exportPdf .dateNow').text(list['DateNow']);
                    $('#exportPdf .leadTime').text(list['LeadTime']);
                    html += '<tr><td style="text-align: center">' + i + '</td>';
                    html += '<td>' + list['nameProduct1'] + '</td>';
                    html += '<td style="text-align: center">' + list['origin1'] + '</td>';
                    html += '<td style="text-align: center">' + list['number1'] + '</td>';
                    html += '<td style="text-align: center">' + formatDecimal(list['price1']) + '</td>';
                    html += '<td style="text-align: center">' + formatDecimal(list['money1']) + '</td></tr>';
                    total += parseFloat(list['money1'])
                    if (list['nameProduct2'] != undefined) {
                        i++;
                        html += '<tr><td style="text-align: center">' + i + '</td>';
                        html += '<td>' + list['nameProduct2'] + '</td>';
                        html += '<td style="text-align: center">' + list['origin2'] + '</td>';
                        html += '<td style="text-align: center">' + list['number2'] + '</td>';
                        html += '<td style="text-align: center">' + formatDecimal(list['price2']) + '</td>';
                        html += '<td style="text-align: center">' + formatDecimal(list['money2']) + '</td></tr>';
                        total += parseFloat(list['money2'])
                    }
                    if (list['nameProduct3'] != undefined) {
                        i++;
                        html += '<tr><td style="text-align: center">' + i + '</td>';
                        html += '<td>' + list['nameProduct3'] + '</td>';
                        html += '<td style="text-align: center">' + list['origin3'] + '</td>';
                        html += '<td style="text-align: center">' + list['number3'] + '</td>';
                        html += '<td style="text-align: center">' + formatDecimal(list['price3']) + '</td>';
                        html += '<td style="text-align: center">' + formatDecimal(list['money3']) + '</td></tr>';
                        total += parseFloat(list['money3'])
                    }
                    vat = total * 10 / 100;
                    sumToltal = total + vat;
                    html += '<tr><th colspan="5">Tá»•ng cá»™ng (chÆ°a bao gá»“m VAT)</th><th style="text-align: center">' + formatDecimal(total.toString()) + '</th></tr>';
                    html += '<tr><th colspan="5">VAT(10%)</th><th style="text-align: center">' + formatDecimal(vat.toString()) + '</th></tr>';
                    html += '<tr><th colspan="5">Tá»•ng cá»™ng (bao gá»“m VAT)</th><th style="text-align: center">' + formatDecimal(sumToltal.toString()) + '</th></tr>';
                    $('#exportPdf table tbody').html(html)
                    createPDF($('#exportPdf'), list['OrderCode']);
                }
            },
            error: function () {
                showNotification('CÃ³ lá»—i xáº£y ra trong quÃ¡ trÃ¬nh thá»±c hiá»‡n', 0);
            }
        });
    } else showNotification('ÄÆ¡n hÃ ng khÃ´ng tá»“n táº¡i.', 0);

    return false;
});

function createPDF(area_print, fileName) {
    var cache_width = area_print.width();
    var a4 = [595.28, 841.89];
    // var a4 =[ 841.89, 595.28];
    getCanvas().then(function (canvas) {
        var
            img = canvas.toDataURL("image/png"),
            doc = new jsPDF({
                unit: 'px',
                format: 'a4'
            });
        doc.addImage(img, 'JPEG', 0, 0);
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        fileName = fileName + '_' + today + '.pdf';
        doc.save(fileName);
        area_print.width(cache_width);
    });
    // create canvas object
    function getCanvas() {
        area_print.width((a4[0] * 1.33333) - 0).css('max-width', 'none');
        return html2canvas(area_print, {
            imageTimeout: 2000,
            removeContainer: true
        });
    }
}