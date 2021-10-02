jQuery(document).ready(function ($) {
  jQuery("#choose_soluong").click(function (e) {
    e.preventDefault();
    jQuery("#chon_so_luong").toggle();
  });

  jQuery("input[name='type_product']").change(function (e) {
    
    if(jQuery("input[name='type_product']:checked").val() === "alu_type"){
        var lops = document.getElementsByName("so_lop");
        lops.forEach(element => {
            if(element.value === ""){
                element.checked = true;
            }else{
                element.disabled = true;
            }
        });
        
    }else{
        var lops = document.getElementsByName("so_lop");
        lops.forEach(element => {
            element.disabled = false;
            if(element.value === "_2lop"){
                element.checked = true;
            }
        });
    }
  });

  jQuery("input[name='so_luong']").change(function (e) {
    e.preventDefault();
    jQuery("#chon_so_luong").hide();
    $('#choose_soluong').html(jQuery("input[name='so_luong']:checked").val());
  });

  jQuery(".show_more_text").click(function (e) {
    if (!jQuery(".hide_text").is(":visible")) {
      jQuery(".hide_text").show();
      jQuery(this).html("Show less");
    } else {
      jQuery(".hide_text").hide();
      jQuery(this).html("Show more");
    }
  });

  $("#fileMachIn").on("change", function (e) {
    var size = (this.files[0].size / 1024 / 1024).toFixed(4);
    if (size > 25) {
      alert("File is too big!");
      this.value = "";
    }
  });

  $("#smtSwitch").click(function () {
    $("#isSmtSwitch").toggle();
    smtUpdate();
    if (this.checked) {
      console.log("true");
    } else {
      console.log("false");
    }
  });

  $("#stencilSwitch").click(function () {
    $("#isStencilSwitch").toggle();
    stencilUpdate();
    if (this.checked) {
      console.log("true");
    } else {
      console.log("false");
    }
  });

  $("#so_luong").on("change", function () {
    
    checkPanel();
    if (this.value >= 50) {
      $("#panel").removeAttr("disabled");
    } else {
      $("#don_chiec").prop("checked", true);
      $(".isPanel").hide();
      $("#panel").attr("disabled", "disabled");
    }
  });

  $("input[name='width']").on("change", function () {
    checkPanel();
  });

  //   $("input[name='type_product']").on("change", function () {

  //   });

  $("input[name='height']").on("change", function () {
    checkPanel();
  });

  $(".obverser").on("change", function () {
    vantuUpdate();
  });

  $(".obverser_smt").on("change", function () {
    smtUpdate();
  });

  $(".obverser_stencil").on("change", function () {
    stencilUpdate();
  });

  $("input[name='order_type']").on("change", function () {
    $(".isPanel").toggle();
  });

  $("input[name='san_xuat']").change(function (e) {
    if ($("input[name='san_xuat']:checked").val() === "nhanh") {
      $("#nhanh_text").show();
    } else {
      $("#nhanh_text").hide();
    }
    toTotalPrice();
  });

  $("#them_vao_gio_hang").click(function (e) {
    var myFile = $("#fileMachIn").prop("files")[0];
    var dataFile = new FormData();
    dataFile.append("file", myFile);

    $.ajax({
      type: "POST",
      url: "https://machinlocal.imaker.vn/upload-file",
      data: dataFile,
      processData: false, // tell jQuery not to process the data
      contentType: false,
      success: function (response) {
        console.log(response);
        let parameter = "";

        let order_id =
          "Order" +
          (
            Date.now().toString(36) + Math.random().toString(36).substr(2)
          ).substr(10);

        let data = new Object();

        data.order_id = order_id;
        data.type_pcb = $("input[name='type_product']:checked")
          .next("label")
          .text();
        data.width = $("input[name='width']").val();
        data.height = $("input[name='height']").val();
        data.quantity = $("input[name='so_luong']:checked").val();
        data.layers = $("input[name='so_lop']:checked").next("label").text();
        data.type_order = $("input[name='order_type']:checked")
          .next("label")
          .text();
        data.dichte = $("input[name='do_day']:checked").val();
        data.dichte_done = $("input[name='do_day_dong']:checked").val();
        data.distant = "";
        data.size_khoan = "";
        data.color = $("input[name='phu_trong_han']:checked")
          .next("label")
          .text();
        data.text_color = "";
        data.interface = $("input[name='be_mat_hoan_thien']:checked")
          .next("label")
          .text();
        data.test = $("input[name='phuong_phap_test']:checked").next("label").text();
        data.note = $("textarea[name='note']").val();
        data.price = Math.floor(Math.random() * 999);
        // data.file = $("#file_upload_id").val();
        data.file = response.link;

        if ($("#smtSwitch").is(":checked")) {
          data.isAssembly = 1;
          let assembly = new Object();
          assembly.so_luong_smt = $("input[name='so_luong_mach']").val();
          assembly.side = $("select[name='so_mat'] option:selected").text();
          assembly.diem_han_smd = $("input[name='so_diem_hang_smd']").val();
          assembly.diem_han_dip = $("input[name='so_diem_hang_dip']").val();
          assembly.linh_kien_dan = $("input[name='linh_kien_dan']").val();
          assembly.linh_kien_gan = $("input[name='linh_kien_cam']").val();
          assembly.dong_goi = $(
            "select[name=phuong_thuc_dong_goi] option:selected"
          ).text();
          assembly.xac_nhan = $("select[name=xac_nhan_smt] option")
            .filter(":selected")
            .text();
          assembly.height_2 = $("input[name='height_2']").val();
          assembly.width_2 = $("input[name='width_2']").val();
          data.assembly = assembly;
        } else {
          data.isAssembly = 0;
        }

        if ($("#stencilSwitch").is(":checked")) {
          data.isStencil = 1;
          let stencil = new Object();
          stencil.loai_stencil = $("input[name='loai_stencil']:checked")
            .next("label")
            .text();
          stencil.danh_bong = "";
          stencil.mat_stencil = $("input[name='mat_stencil']:checked")
            .next("label")
            .text();
          stencil.kich_thuoc = $("select[name='kich_thuoc_stencil'] option")
            .filter(":selected")
            .text();
          stencil.quantity_2 = $("input[name='so_luong_stencil']").val();
          stencil.do_day = "";
          stencil.note_2 = $("textarea[name='note_2']").val();
          data.stencil = stencil;
        } else {
          data.isStencil = 0;
        }

        if (
          $("input[name='order_type']:checked").val() === "panel" &&
          $("#so_cot_panel").val() != "" &&
          $("#so_dong_panel").val() != ""
        ) {
          data.panel = 1;
          data.col_panel = $("#so_cot_panel").val();
          data.row_panel = $("#so_dong_panel").val();
          data.vien = $("input[name='vien_panel']:checked").text();
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
              window.location.href =
                machin.home +
                // "/gio-hang/?add-to-cart=" +
                "/cart/?add-to-cart=" +
                res.id +
                "&data_id=" +
                parameter;
            } else {
              console.log("not ok");
            }
          },
        });
      },
      error: function (response) {
        console.log(response);
      },
    });
  });
});

function toTotalPrice() {
  if ($("input[name='san_xuat']:checked").val() === "nhanh") {
    var totalPrice = 0;

    $("input[name='total_price_input']").val(totalPrice);
    $("#tong_cong").html(convertToVND(totalPrice));

    console.log(totalPrice);
  } else if ($("input[name='san_xuat']:checked").val() === "dhl") {
    var data = new Object();

    data.width = parseFloat(jQuery("input[name='width']").val());
    data.height = parseFloat(jQuery("input[name='height']").val());
    data.quantity = parseInt(jQuery("input[name='so_luong']:checked").val());

    data.gia_pcb = parseInt(jQuery("input[name='gia_truoc_input']").val());
    data.gia_stencil = parseInt(
      jQuery("input[name='gia_stencil_input']").val()
    );

    console.log(data);

    jQuery.ajax({
      type: "POST",
      url: ajax.ajaxurl,
      data: { action: "calculate_dhl", data: data },
      success: function (res) {
        if (res != "") res = JSON.parse(res);
        else {
          res.status = 0;
        }
        console.log(res);

        if (res.status === 1) {
          console.log("ok");

          $("input[name='gia_pcb_dhl']").val(res.price_pcb);
          $("input[name='gia_stencil_dhl']").val(parseFloat(res.price_stencil));
          var totalPrice =
            parseFloat($("input[name='gia_pcb_dhl']").val()) +
            parseFloat($("input[name='gia_smt_input']").val()) +
            parseFloat($("input[name='gia_stencil_dhl']").val());
          // parseFloat($("input[name='gia_san_xuat_input']").val());

          $("input[name='total_price_input']").val(totalPrice);
          $("#tong_cong").html(convertToVND(totalPrice));

          console.log(totalPrice);
        } else {
          console.log("not ok");
        }
        //   toTotalPrice();
      },
    });
  } else {
    var totalPrice =
      parseFloat($("input[name='gia_truoc_input']").val()) +
      parseFloat($("input[name='gia_smt_input']").val()) +
      parseFloat($("input[name='gia_stencil_input']").val());
    //   parseFloat($("input[name='gia_san_xuat_input']").val());

    $("input[name='total_price_input']").val(totalPrice);
    $("#tong_cong").html(convertToVND(totalPrice));

    console.log(totalPrice);
  }
}

function stencilUpdate() {
  if ($("#stencilSwitch").is(":checked")) {
    let price = parseFloat(
      jQuery("select[name='kich_thuoc_stencil']")
        .find(":selected")
        .data("price")
    );
    console.log(price);
    if ($("input[name='mat_stencil']:checked").val() === "top_bottom2") {
      price *= 2;
    }
    $("#gia_stencil").html(convertToVND(price));
    $("input[name='gia_stencil_input']").val(price);
  } else {
    $("#gia_stencil").html(convertToVND(0));
    $("input[name='gia_stencil_input']").val(0);
  }

  toTotalPrice();
}

function checkPanel() {
  let maxCols = Math.ceil(50 / parseFloat($("input[name='height']").val()));
  let maxRows = Math.ceil(50 / parseFloat($("input[name='width']").val()));
  $("#so_cot_panel").attr({
    max: maxCols,
    placeholder: "max " + maxCols, // substitute your own
  });

  $("#so_dong_panel").attr({
    max: maxRows,
    placeholder: "max " + maxRows,
    // substitute your own
  });
}

function smtUpdate() {
  if ($("#smtSwitch").is(":checked")) {
    let data = new Object();

    data.so_luong_mach = parseInt(jQuery("input[name='so_luong_mach']").val());
    data.smd = parseInt(jQuery("input[name='so_diem_hang_smd']").val());
    data.dip = parseInt(jQuery("input[name='so_diem_hang_dip']").val());
    data.linh_kien_dan = parseInt(jQuery("input[name='linh_kien_dan']").val());

    console.log(data);
    jQuery.ajax({
      type: "POST",
      url: ajax.ajaxurl,
      data: { action: "calculate_smt", data: data },
      success: function (res) {
        if (res != "") res = JSON.parse(res);
        else {
          res.status = 0;
        }
        console.log(res);

        if (res.status === 1) {
          console.log("ok");
          $("#gia_smt").html(convertToVND(res.price));
          $("input[name='gia_smt_input']").val(res.price);

          $(".smtPrice").show();
        } else {
          console.log("not ok");
          $("#gia_smt").html(convertToVND(0));
          $("input[name='gia_smt_input']").val(0);
          toTotalPrice();
        }
      },
    });
  } else {
    $("#gia_smt").html(convertToVND(0));
    $("input[name='gia_smt_input']").val(0);
    toTotalPrice();
  }
}

function vantuUpdate() {
  let data = new Object();

  if (
    jQuery("input[name='height']").val() == "" ||
    jQuery("input[name='width']").val() == ""
  )
    return;

  data.width = parseFloat(jQuery("input[name='width']").val());
  data.height = parseFloat(jQuery("input[name='height']").val());

  if ($("input[name='type_product']:checked").val() === "alu_type") {
    data.lop = "_alu";
  } else {
    data.lop = jQuery("input[name='so_lop']:checked").val();
  }
  let old_width = data.width;
  let old_height = data.height;

  data.quantity = parseInt(jQuery("input[name='so_luong']:checked").val());

  if (
    jQuery("input[name='order_type']:checked").val() == "panel" &&
    jQuery("#so_cot_panel").val() != "" &&
    jQuery("#so_dong_panel").val() != ""
  ) {
    data.panel = true;
    data.height = parseInt(jQuery("#so_dong_panel").val()) * data.height;
    let panel_detail = "";
    if ($("input[name='vien_panel']:checked").val() == 2) {
      data.width = parseInt(jQuery("#so_cot_panel").val()) * data.width + 10;
      panel_detail = " + 2 x 5";
    } else {
      data.width = parseInt(jQuery("#so_cot_panel").val()) * data.width;
    }
    data.width = Math.round(data.width * 100) / 100;
    data.height = Math.round(data.height * 100) / 100;

    data.quantity = Math.ceil(
      data.quantity /
        (parseInt(jQuery("#so_cot_panel").val()) *
          parseInt(jQuery("#so_dong_panel").val()))
    );

    $("#panel_detail").html(
      `Column: (${old_width} x ${parseInt(
        $("#so_cot_panel").val()
      )}${panel_detail})=${data.width}mm, Row: (${old_height} x ${parseInt(
        $("#so_dong_panel").val()
      )}) = ${data.height}mm, Số tấm: ${data.quantity}`
    );
  } else {
    data.panel = false;
  }
  console.log(data);
  jQuery.ajax({
    type: "POST",
    url: ajax.ajaxurl,
    data: { action: "calculate", data: data },
    success: function (res) {
      if (res != "") res = JSON.parse(res);
      else {
        res.status = 0;
      }
      console.log(res);

      if (res.status === 1) {
        console.log("ok");
        $("#tinh_truoc").html(convertToVND(res.price));
        $("input[name='gia_truoc_input']").val(res.price);
      } else {
        console.log("not ok");
        $("#tinh_truoc").html(convertToVND(0));
        $("input[name='gia_truoc_input']").val(0);
      }
      toTotalPrice();
    },
  });
}

function convertToVND(x) {
  x = x.toLocaleString("it-IT", {
    style: "currency",
    currency: "VND",
  });
  console.log(x);
  return x;
}
