$(document).ready(function(){
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
    var transportId = parseInt($("select#transportId").val());
    var phoneNumberPcb = $("input#phoneNumberPcb").val();
    var leadTime = parseInt($('input[name="LeadTime"]:checked').val());

    // var leadTime = replaceCost($("input#leadTime").val(), true);
    // var acreage = replaceCost($("input#acreage").val(), true);
    // var priceSmdStencil = replaceCost($("input#priceSmdStencil").val(), true);
    //======================================//
    var height = parseFloat($("input[name='Height']").val());
    var width = parseFloat($("input[name='Width']").val());
    var quantity = parseInt($("input[name='Quantity']").val());
    //======================================//
    var arrClass = [
        'productTypeId','layerId','orderTypeId','thicknessPcbId','finishedCopperId',
        'minSpacingId','minHoleSizeId','solderMaskId', 'silkscreenColorId', 'surfaceFinishId','testMethodId','stencilTypeId','electropolishingId','stencilSideId',
    'thicknessSmdId', 'vien'];

    $.each( arrClass, function( i, item ){
        $("body").on('click', 'li.'+item, function(){

            $('li.'+item).find('label').removeClass('choose');
            $('li.'+item).find('label').find('i').remove();
            $('li.'+item).find('label input').attr('checked',false);
            $(this).find('label input').attr('checked','checked');
            $(this).find('label').addClass('choose');
            $(this).find('label').append(`<i class="jp-ico subscript-ico"></i>`);
            var leadTime = parseInt($('input[name="LeadTime"]:checked').val());

            if($(this).attr('class') == 'd-inline-block productTypeId') {
                var productTypeId = parseInt($(this).find('label').find('input').val());
                changeDataTotal(productTypeId, height, width, price, price_2, quantity, leadTime, transportId);
            }


            return false;
        });
    });

    var productTypeId = parseInt($("input[name='ProductTypeId']:checked").val());
    
    // changeDataTotal(productTypeId, height, width, price, price_2, quantity, leadTime, transportId);

    totalPrice(price, feesPrice, price_1, price_2, feesPrice_2, price_3, feesPrice_3, height, width, quantity, leadTime, transportId,feesPrice_1,price_4,feesPrice_4,price_5,feesPrice_5,feesDhl,phoneNumberPcb);

    $("body").on('keyup', "input[name='Height']", function() {
        var height = replaceCost($(this).val());
        var width = replaceCost($("input[name='Width']").val(), true);
        var quantity = replaceCost($("input[name='Quantity']").val(), true);
        var productTypeId = parseInt($("input[name='ProductTypeId']:checked").val());
        // changeDataTotal(productTypeId, height, width, price, price_2, quantity, leadTime, transportId);
          var leadTime = parseInt($('input[name="LeadTime"]:checked').val());
    var transportId = parseInt($("select#transportId").val());
        totalPrice(price, feesPrice, price_1, price_2, feesPrice_2, price_3, feesPrice_3, height, width, quantity, leadTime, transportId,feesPrice_1,price_4,feesPrice_4,price_5,feesPrice_5,feesDhl,phoneNumberPcb);
        return false;
    }).on('keyup', "input[name='Width']", function() {
        var width = replaceCost($(this).val());
        var height = replaceCost($("input[name='Height']").val(), true);
        var quantity = replaceCost($("input[name='Quantity']").val(), true);
        var productTypeId = parseInt($("input[name='ProductTypeId']:checked").val());
        // changeDataTotal(productTypeId, height, width, price, price_2, quantity, leadTime, transportId);
        var transportId = parseInt($("select#transportId").val());
          var leadTime = parseInt($('input[name="LeadTime"]:checked').val());
        totalPrice(price, feesPrice, price_1, price_2, feesPrice_2, price_3, feesPrice_3, height, width, quantity, leadTime, transportId,feesPrice_1,price_4,feesPrice_4,price_5,feesPrice_5,feesDhl,phoneNumberPcb);
        return false;
    }).on('click', 'input[name="countNumer"]', function(){
        $('input[name="countNumer"]').attr('checked',false);
        $(this).attr('checked',true);
        var quantity = parseInt($('input[name="countNumer"]:checked').val());
        $("input[name='Quantity']").val(quantity);
        var height = replaceCost($("input[name='Height']").val(), true);
        var width = replaceCost($("input[name='Width']").val(), true);
        var productTypeId = parseInt($("input[name='ProductTypeId']:checked").val());
        var leadTime = parseInt($('input[name="LeadTime"]:checked').val());

        // changeDataTotal(productTypeId, height, width, price, price_2, quantity, leadTime, transportId);
        var transportId = parseInt($("select#transportId").val());
            var transportId = parseInt($("select#transportId").val());
        totalPrice(price, feesPrice, price_1, price_2, feesPrice_2, price_3, feesPrice_3, height, width, quantity, leadTime, transportId,feesPrice_1,price_4,feesPrice_4,price_5,feesPrice_5,feesDhl,phoneNumberPcb);
        // return false;
        if($('.ajax_switch_smt').is(':visible')){
            $("span#quantity1").html(quantity);
            boardQuantity = quantity;
            var SMDSolderJoints = replaceCost($("input[name='SMDSolderJoints']").val());
            var DIPSolderJoints = replaceCost($("input[name='DIPSolderJoints']").val());
            var componentsPaste = replaceCost($("input[name='ComponentsPaste']").val());
            totalPricePCBAssembly(SMDSolderJoints, DIPSolderJoints, componentsPaste,boardQuantity);
        }

    }).on('click', 'input[name="LeadTime"]', function(){
        $('input[name="LeadTime"]').attr('checked',false);
        $(this).attr('checked',true);
        $('span.timesx').removeClass('v1');
        $('#timesx'+$(this).val()).addClass('v1');
        var leadTime = parseInt($(this).val());
        var quantity = parseInt($("input[name='Quantity']").val());
        var productTypeId = parseInt($("select#sizeId").val());
        var height = replaceCost($("input[name='Height']").val(), true);
        var width = replaceCost($("input[name='Width']").val(), true);
        var quantity = replaceCost($("input[name='Quantity']").val(), true);
        var productTypeId = parseInt($("input[name='ProductTypeId']:checked").val());
        var transportId = parseInt($("select#transportId").val());
        totalPrice(price, feesPrice, price_1, price_2, feesPrice_2, price_3, feesPrice_3, height, width, quantity, leadTime, transportId,feesPrice_1,price_4,feesPrice_4,price_5,feesPrice_5,feesDhl,phoneNumberPcb);
        // return false;
    });

    $("body").on('click', '.submit', function(){
        var transportId = parseInt($("select#transportId").val());
        if(transportId == 0) {
            showNotification('Vui l??ng ch???n ph????ng th???c v???n chuy???n.');
            return false;
        }
        var transporterId = parseInt($("select#transporterId").val());
        if(transporterId == 0) {
            showNotification('Vui l??ng ch???n nh?? v???n chuy???n.');
            return false;
        }
        $('.submit').prop('disabled', true);
        var infoProduct = $('#infoProduct').val();
        var form = $("#orderForm");
        var data = form.serializeArray();
        data.push({ name: 'ProductCategoryId', value: 1});
        data.push({ name: 'Quantity', value: parseInt($("input[name='Quantity']").val())});
        data.push({ name: 'ProductTypeId', value: parseInt($("input[name='ProductTypeId']:checked").val())});
        data.push({ name: 'LayerId', value: parseInt($("input[name='LayerId']:checked").val())});
        data.push({ name: 'OrderTypeId', value: parseInt($("input[name='OrderTypeId']:checked").val()) }); 
        data.push({ name: 'ThicknessPcbId', value: parseInt($("input[name='ThicknessPcbId']:checked").val()) });
        data.push({ name: 'FinishedCopperId', value: parseInt($("input[name='FinishedCopperId']:checked").val()) });
        data.push({ name: 'MinSpacingId', value: parseInt($("input[name='MinSpacingId']:checked").val()) });
        data.push({ name: 'MinHoleSizeId', value: parseInt($("input[name='MinHoleSizeId']:checked").val()) }); 
        data.push({ name: 'SolderMaskId', value: parseInt($("input[name='SolderMaskId']:checked").val()) }); 
        data.push({ name: 'SilkscreenColorId', value: parseInt($("input[name='SilkscreenColorId']:checked").val()) });
        data.push({ name: 'SurfaceFinishId', value: parseInt($("input[name='SurfaceFinishId']:checked").val()) }); 
        data.push({ name: 'TestMethodId', value: parseInt($("input[name='TestMethodId']:checked").val()) });
        //SMT
        data.push({ name: 'BoardQuantity', value: parseInt($("input[name='BoardQuantity']").val())});
        data.push({ name: 'SMDSolderJoints', value: parseInt($("input[name='SMDSolderJoints']").val())});
        data.push({ name: 'DIPSolderJoints', value: parseInt($("input[name='DIPSolderJoints']").val()) });  
        data.push({ name: 'ComponentsPaste', value: parseInt($("input[name='ComponentsPaste']").val()) }); 
        data.push({ name: 'ComponentsPlug', value: parseInt($("input[name='ComponentsPlug']").val()) });
        // stenci
        data.push({ name: 'StencilTypeId', value: parseInt($("input[name='StencilTypeId']:checked").val())});
        data.push({ name: 'ElectropolishingId', value: parseInt($("input[name='ElectropolishingId']:checked").val())});
        data.push({ name: 'StencilSideId', value: parseInt($("input[name='StencilSideId']:checked").val()) }); 
        data.push({ name: 'ThicknessSmdId', value: parseInt($("input[name='ThicknessSmdId']:checked").val()) });
        data.push({ name: 'LeadTime', value: parseInt($("input[name='LeadTime']:checked").val()) });
        data.push({ name: 'ImageGerber', value: $("img#imageGerber").attr('src') });
        data.push({ name: 'ColorGerber', value: $("#app-change > select").val()});
        data.push({ name: 'SizeId', value: parseInt($("select#sizeId").val())});
        // th????ng tin file b????o gi????
        data.push({ name: 'InfoProduct', value: infoProduct});

        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: data,
            success: function (json) {
                $('.submit').prop('disabled', false);
                if(json.code != 1) showNotification(json.message, json.code);
                else {
                    redirect(true, '');
                    showNotification(json.message, json.code);
                }
            },
            error: function (response) {
                showNotification('C?? l???i x???y ra trong qu?? tr??nh th???c hi???n. Vui l??ng th??? l???i sau!', 0);
                $('.submit').prop('disabled', false);
            }
        });
        return false;
    });

    $("body").on('change', 'select#transporterId', function(){
        var transportId = parseInt($(this).val());
        var quantity = parseInt($("input[name='Quantity']").val());
        var productTypeId = parseInt($("select#sizeId").val());
        var height = replaceCost($("input[name='Height']").val(), true);
        var width = replaceCost($("input[name='Width']").val(), true);
        var quantity = replaceCost($("input[name='Quantity']").val(), true);
        var productTypeId = parseInt($("input[name='ProductTypeId']:checked").val());
        var leadTime = parseInt($('input[name="LeadTime"]:checked').val());
        totalPrice(price, feesPrice, price_1, price_2, feesPrice_2, price_3, feesPrice_3, height, width, quantity, leadTime, transportId,feesPrice_1,price_4,feesPrice_4,price_5,feesPrice_5,feesDhl,phoneNumberPcb);
        return false;
});
    $('.switch-box  .switch-btn').click(function(){
        // $('.switch-box  .switch-btn').removeClass('on');
        $(this).toggleClass('on');
        $(this).closest('.pbc-advanced').find('.switch-upload-box').toggle('200');
        var btn = $(this).attr('data-btn');
        var numberPcb = $('.option-number.rounding#quantity').val();
        if($(this).hasClass('on')){
            $(this).find('input').val(1);
            var $this = $(this);
            $('#shipPrice_'+btn).show();
            $.ajax({
                type: "POST",
                url: $('input#ajaxSwitchSmt').val(),
                dataType: 'html',
                data: {
                    Btn: btn,
                    NumberPcb:numberPcb,
                },
                success: function (html) {
                    $this.closest('.pbc-advanced').find('.switch-upload-box').html(html);

                    var quantity = replaceCost($("input[name='Quantity']").val(), true);
                    $("span#quantity1").html(quantity);
                    boardQuantity = quantity;
                    var SMDSolderJoints = replaceCost($("input[name='SMDSolderJoints']").val());
                    var DIPSolderJoints = replaceCost($("input[name='DIPSolderJoints']").val());
                    var componentsPaste = replaceCost($("input[name='ComponentsPaste']").val());
                    totalPricePCBAssembly(SMDSolderJoints, DIPSolderJoints, componentsPaste,boardQuantity);
                },
                error: function (response) {
                    showNotification('C?? l???i x???y ra trong qu?? tr??nh th???c hi???n', 0);
                }
            });
        }
        else{
            $('#shipPrice_'+btn).hide();
            $('#shipPrice_'+btn).find('span:nth-child(2)').html(1);
            $('#shipPrice_'+btn).find('span:nth-child(3)').html(0);
            $(this).find('input').val(0);
            $(this).closest('.pbc-advanced').find('switch-upload-box').empty();
            if($(this).closest('.pbc-advanced').find('.switch-upload-box').hasClass('ajax_switch_smt')) $('input#totalPricePCBAssembly').val(0);
            if($(this).closest('.pbc-advanced').find('.switch-upload-box').hasClass('ajax_switch_stencil')) $('input#changeDataTotalSize').val(0);
        }
        calPlus();
    })
    
});


function changeDataTotal(productTypeId = null, height = 0, width = 0, price = 0, price_2 = 0, quantity = 0, leadTime = 0, transportId = 0){

    // if(productTypeId == null || productTypeId < 0) {
    //     var S = calculateTheArea(width, height);
    //     var lastPrice = price;
    //     if(S > acreage) lastPrice = price_2;
       
    //     totalPrice(lastPrice, height, width, quantity, leadTime, transportId);
    // } else {
        
    //     $.ajax({
    //         type: "POST",
    //         url: $('input#getDetailProductType').val(),
    //         data: {
    //             ProductTypeId: productTypeId,
    //         },
    //         success: function (response) {
    //             var json = $.parseJSON(response);
    //             if (json.code == 1){
    //                 totalPrice(json.data.Price, height, width, quantity, leadTime, transportId);
    //             } else showNotification(json.message, json.code);
    //         },
    //         error: function (response) {
    //             showNotification($('input#errorCommonMessage').val(), 0);
    //         }
    //     });
    // }
    return false;
}

function totalPrice(price = 0, feesPrice = 0, price_1 = 0, price_2 = 0, feesPrice_2 = 0, price_3 = 0, feesPrice_3 = 0, height = 0, width = 0, quantity = 0, leadTime = 0, transportId = 0,feesPrice_1 = 0,price_4 = 0,feesPrice_4 = 0,price_5 = 0,feesPrice_5 = 0,feesDhl = 0,phoneNumberPcb =''){
    
}


//t????nh ti??????n SMT
$(document).ready(function(){

    $("body").on('keyup', "input[name='SMDSolderJoints']", function() {
        var SMDSolderJoints = replaceCost($(this).val());
        var DIPSolderJoints = replaceCost($("input[name='DIPSolderJoints']").val());
        var componentsPaste = replaceCost($("input[name='ComponentsPaste']").val());
        var boardQuantity = replaceCost($("input[name='BoardQuantity']").val());
        totalPricePCBAssembly(SMDSolderJoints, DIPSolderJoints, componentsPaste,boardQuantity);
    }).on('keyup', "input[name='DIPSolderJoints']", function() {
        var SMDSolderJoints = replaceCost($("input[name='SMDSolderJoints']").val());
        var DIPSolderJoints = replaceCost($(this).val());
        var componentsPaste = replaceCost($("input[name='ComponentsPaste']").val());
        var boardQuantity = replaceCost($("input[name='BoardQuantity']").val());
        totalPricePCBAssembly(SMDSolderJoints, DIPSolderJoints, componentsPaste,boardQuantity);
    }).on('keyup', "input[name='ComponentsPaste']", function() {
        var SMDSolderJoints = replaceCost($("input[name='SMDSolderJoints']").val());
        var DIPSolderJoints = replaceCost($("input[name='DIPSolderJoints']").val());
        var componentsPaste = replaceCost($(this).val());
        var boardQuantity = replaceCost($("input[name='BoardQuantity']").val());
        totalPricePCBAssembly(SMDSolderJoints, DIPSolderJoints, componentsPaste,boardQuantity);
    });
});

function totalPricePCBAssembly(SMDSolderJoints = 0, DIPSolderJoints = 0, componentsPaste = 0, boardQuantity = 0){
    var priceSmdSolderPoint = replaceCost($("input#priceSmdSolderPoint").val());
    var priceDipSolderPoint = replaceCost($("input#priceDipSolderPoint").val());
    var feesPriceSmt_1 = replaceCost($("input#feesPriceSmt_1").val());
    var feesPriceSmt_2 = replaceCost($("input#feesPriceSmt_2").val());
    var feesPriceSmt_3 = replaceCost($("input#feesPriceSmt_3").val());
    var price_dk = replaceCost($("input#price_dk").val());
    var price_smt1 = replaceCost($("input#price_smt1").val());
    var feesPriceSmt_4 = replaceCost($("input#feesPriceSmt_4").val());
    var feesPriceSmt_5 = replaceCost($("input#feesPriceSmt_5").val());
    var price = ((SMDSolderJoints * priceSmdSolderPoint) + (DIPSolderJoints * priceDipSolderPoint)) * parseInt(boardQuantity);
    var subTotal = 0;
    var totalPrice = 0;

    if(componentsPaste < 15 && componentsPaste > 0) {
        setupPrice = feesPriceSmt_1;
        if(price <= price_dk) {
            subTotal = totalPrice = price_dk + setupPrice;
        }
        else if(price > price_dk) {
            subTotal = totalPrice = price + setupPrice;
        }
    } else if (componentsPaste >= 15 && componentsPaste < 30){
        setupPrice = feesPriceSmt_2;
        if(price <= price_dk) {
            subTotal = totalPrice = price_dk + setupPrice;
        }
        else if(price > price_dk) {
            subTotal = totalPrice = price + setupPrice;
        }
    } else if (componentsPaste >= 30 && componentsPaste < 50) {
        setupPrice =  feesPriceSmt_3;
        if(price <= price_dk) {
            subTotal = totalPrice = price_dk + setupPrice;
        }
        else if(price > price_dk) {
            subTotal = totalPrice = price + setupPrice;
        }
    } else if (componentsPaste >= 50) {
        setupPrice =  feesPriceSmt_4;
        if(price <= price_dk) {
            subTotal = totalPrice = price_dk + setupPrice;
        }
        else if(price > price_dk) {
            subTotal = totalPrice = price + setupPrice;
        }
    }
    else{
        subTotal = 0;
        totalPrice = 0;
    }
    $("span#price1").html(formatDecimal(subTotal.toString())+' VN????');
    $("input#totalPricePCBAssembly").val(subTotal);   
    calPlus(); 
}
// t????nh ti??????n stencil
$(document).ready(function(){
    var arrClass = [ 'stencilTypeId','electropolishingId','stencilSideId','thicknessSmdId' ];
   
    $("body").on('keyup', "input[name='Quantity2']", function() {
        var quantity = replaceCost($(this).val());
        var productTypeId = parseInt($("select#sizeId").val());
        changeDataTotalSize(productTypeId, quantity);
        return false;
    });

    // var productTypeId = parseInt($("select#sizeId").val());
    // var quantity = parseInt($("input[name='Quantity2']").val());
    // changeDataTotalSize(productTypeId, quantity);

    // $("body").on('change', 'select#transporterId', function(){
    //     var quantity = parseInt($("input[name='Quantity2']").val());
    //     var productTypeId = parseInt($("select#sizeId").val());
    //     changeDataTotalSize(productTypeId, quantity);
    // });
    $("body").on('change', 'select#sizeId', function(){
        var productTypeId = parseInt($(this).val());
        var quantity = parseInt($("input[name='Quantity2']").val());
        changeDataTotalSize(productTypeId, quantity);
    });
    
});

function changeDataTotalSize(productTypeId = null, quantity = 0, priceSmdStencil = 0) {
    if(productTypeId == 0) {
        
    }
    else{
        $.ajax({
            type: "POST",
            url: $('input#getDetailProductType').val(),
            data: {
                ProductTypeId: productTypeId,
            },
            success: function (response) {
                var json = $.parseJSON(response);
                if (json.code == 1){
                    var subTotal = (quantity * json.data.Price);
                    var totalPrice = quantity * json.data.Price;
                    $("span#price2").html(formatDecimal((parseFloat(subTotal).toFixed(2)).toString())+' VN????');
                    $("input#changeDataTotalSize").val(subTotal);    
                    calPlus();
                } else showNotification(json.message, json.code);
            },
            error: function (response) {
                showNotification('C?? l???i x???y ra vui l??ng th??? l???i.', 0);
            }
        });
    }
    $("span#quantity2").html(quantity);
}

function calPlus(){
    totalPricePCB = replaceCost($('input#totalPricePCB').val(), true);
    totalSMT = replaceCost($('input#totalPricePCBAssembly').val(), true);
    totalStencil = replaceCost($('input#changeDataTotalSize').val(), true);
    cal = parseFloat(totalPricePCB) + parseFloat(totalSMT) + parseFloat(totalStencil);
    cal = formatDecimal((parseFloat(cal).toFixed(2)).toString())+' VN????';
    if(totalPricePCB == 1234567890){
        let phoneNumber = $(phoneNumberPcb).val()
        $("span.totalPrice").html('Xin vui l????ng li????n h??????? s??????? ?????i???????n tho??????i '+ phoneNumber +' ??????????? ???????????????c h??????? tr?????? t???????t nh??????t');
    }
    else{
        $("span.totalPrice").html(cal);
    }

}