jQuery(document).ready(function (jQuery) {
  jQuery("#choose_soluong").click(function (e) {
    e.preventDefault();
    jQuery("#chon_so_luong").toggle();
  });

  jQuery("input[name='type_product']").change(function (e) {
    if (jQuery("input[name='type_product']:checked").val() === "alu_type") {
      var lops = document.getElementsByName("so_lop");
      lops.forEach((element) => {
        if (element.value === "") {
          element.checked = true;
        } else {
          element.disabled = true;
        }
      });
      var do_day = document.getElementsByName("do_day");
      do_day.forEach(element => {
        if (element.value === "0.4" || element.value === "0.6" || element.value === "0.8" || element.value === "2.0" ) {
          element.disabled = true;
        } 
      });
      var dong = document.getElementsByName("do_day_dong");
      dong.forEach(element => {
        if (element.value === "2oz" ) {
          element.disabled = true;
        } 
      });
      var phu_trong_han = document.getElementsByName("phu_trong_han");
      phu_trong_han.forEach(element => {
        if (element.value === "vang" || element.value === "do" || element.value === "xanhduong" || element.value === "tim" ) {
          element.disabled = true;
        } 
      });
    } else {
      var lops = document.getElementsByName("so_lop");
      lops.forEach((element) => {
        element.disabled = false;
        if (element.value === "_2lop") {
          element.checked = true;
        }
      });
      var do_day = document.getElementsByName("do_day");
      do_day.forEach(element => {
        if (element.value === "0.4" || element.value === "0.6" || element.value === "0.8" || element.value === "2.0" ) {
          element.disabled = false;
        } 
      });
      var dong = document.getElementsByName("do_day_dong");
      dong.forEach(element => {
        if (element.value === "2oz" ) {
          element.disabled = false;
        } 
      });
      var phu_trong_han = document.getElementsByName("phu_trong_han");
      phu_trong_han.forEach(element => {
        if (element.value === "vang" || element.value === "do" || element.value === "xanhduong" || element.value === "tim" ) {
          element.disabled = false;
        } 
      });
    }
  });

  jQuery("input[name='so_luong']").change(function (e) {
    e.preventDefault();
    jQuery("#chon_so_luong").hide();
    jQuery("#choose_soluong").html(
      jQuery("input[name='so_luong']:checked").val()
    );
    // checkPanel();
    calculatorPanel();
    if (this.value >= 50) {
      jQuery("#panel").removeAttr("disabled");
    } else {
      jQuery("#don_chiec").prop("checked", true);
      jQuery(".isPanel").hide();
      jQuery("#panel").attr("disabled", "disabled");
    }
  });

  jQuery("input[name='so_cot_panel']").on("change", function (e) {
    calculatorPanel();
    vantuUpdate();
  });
  jQuery("input[name='so_dong_panel']").on("change", function (e) {
    calculatorPanel();
    vantuUpdate();
  });
  jQuery("input[name='vien_panel']").on("change", function (e) {
    calculatorPanel();
    vantuUpdate();
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

  jQuery("#fileMachIn").on("change", function (e) {
    var size = (this.files[0].size / 1024 / 1024).toFixed(4);
    if (size > 25) {
      alert("File is too big!");
      this.value = "";
    }
  });

  jQuery("#smtSwitch").click(function () {
    jQuery("#isSmtSwitch").toggle();
    smtUpdate();
    if (this.checked) {
      console.log("true");
    } else {
      console.log("false");
    }
  });

  jQuery(".obverser_panel").on("change", function () {
    console.log(
      jQuery(this).attr("id"),
      $("input[name='optionPanel']:checked").val(),
      "#" + jQuery(this).attr("id")
    );
    if (jQuery(this).attr("id") != "khongghepnua") {
      jQuery("input[name='isPanel']").val(1);
      jQuery("input[name='soTamPanel']").val(
        $("input[name='optionPanel']:checked").val()
      );
      vantuUpdate();
    } else {
      jQuery("input[name='isPanel']").val(0);
      vantuUpdate();
    }
  });

  jQuery("#stencilSwitch").click(function () {
    jQuery("#isStencilSwitch").toggle();
    stencilUpdate();
    if (this.checked) {
      console.log("true");
    } else {
      console.log("false");
    }
  });

  jQuery("input[name='width']").on("change", function () {
    // checkPanel();
    calculatorPanel();
  });

  //   jQuery("input[name='type_product']").on("change", function () {

  //   });

  jQuery("input[name='height']").on("change", function () {
    // checkPanel();
    calculatorPanel();
  });

  jQuery(".obverser").on("change", function () {
    calculatorPanel();
    vantuUpdate();
  });

  jQuery(".obverser_smt").on("change", function () {
    smtUpdate();
  });

  jQuery(".obverser_stencil").on("change", function () {
    stencilUpdate();
  });

  jQuery("input[name='order_type']").on("change", function () {
    jQuery(".isPanel").toggle();
  });

  jQuery("input[name='san_xuat']").change(function (e) {
    if (jQuery("input[name='san_xuat']:checked").val() === "nhanh") {
      jQuery("#nhanh_text").show();
    } else {
      jQuery("#nhanh_text").hide();
    }
    toTotalPrice();
  });

  jQuery("#them_vao_gio_hang").click(function (e) {
    var myFile = jQuery("#fileMachIn").prop("files")[0];
    console.log(myFile);
    if (myFile === undefined) {
      jQuery("#show_error").html("Vui lòng tải file mạch in!");
      return;
    }
    if (jQuery("input[name='gia_truoc_input']").val() === "0") {
      jQuery("#show_error").html("Vui lòng nhập chiều dài, chiều rộng!");
      return;
    }
    var dataFile = new FormData();
    dataFile.append("file", myFile);

    jQuery.ajax({
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
        data.thoi_gian_san_xuat = jQuery("input[name='san_xuat']:checked")
          .next("label")
          .html();
        data.order_id = order_id;
        data.type_pcb = jQuery("input[name='type_product']:checked")
          .next("label")
          .text();
        data.width = jQuery("input[name='width']").val();
        data.height = jQuery("input[name='height']").val();
        data.quantity = jQuery("input[name='so_luong']:checked").val();
        data.layers = jQuery("input[name='so_lop']:checked")
          .next("label")
          .text();
        data.type_order = jQuery("input[name='order_type']:checked")
          .next("label")
          .text();
        data.dichte = jQuery("input[name='do_day']:checked").val();
        data.dichte_done = jQuery("input[name='do_day_dong']:checked").val();
        data.distant = "";
        data.size_khoan = "";
        data.color = jQuery("input[name='phu_trong_han']:checked")
          .next("label")
          .text();
        data.text_color = "";
        data.interface = jQuery("input[name='be_mat_hoan_thien']:checked")
          .next("label")
          .text();
        data.test = jQuery("input[name='phuong_phap_test']:checked")
          .next("label")
          .text();
        data.note = jQuery("textarea[name='note']").val();
        data.price = parseFloat(
          jQuery("input[name='total_price_input']").val()
        );
        // data.file = jQuery("#file_upload_id").val();
        data.file = response.link;

        if (jQuery("#smtSwitch").is(":checked")) {
          data.isAssembly = 1;
          let assembly = new Object();
          assembly.so_luong_smt = jQuery("input[name='so_luong_mach']").val();
          assembly.side = jQuery(
            "select[name='so_mat'] option:selected"
          ).text();
          assembly.diem_han_smd = jQuery(
            "input[name='so_diem_hang_smd']"
          ).val();
          assembly.diem_han_dip = jQuery(
            "input[name='so_diem_hang_dip']"
          ).val();
          assembly.linh_kien_dan = jQuery("input[name='linh_kien_dan']").val();
          assembly.linh_kien_gan = jQuery("input[name='linh_kien_cam']").val();
          assembly.dong_goi = jQuery(
            "select[name=phuong_thuc_dong_goi] option:selected"
          ).text();
          assembly.xac_nhan = jQuery("select[name=xac_nhan_smt] option")
            .filter(":selected")
            .text();
          assembly.height_2 = jQuery("input[name='height_2']").val();
          assembly.width_2 = jQuery("input[name='width_2']").val();
          data.assembly = assembly;
        } else {
          data.isAssembly = 0;
        }

        if (jQuery("#stencilSwitch").is(":checked")) {
          data.isStencil = 1;
          let stencil = new Object();
          stencil.loai_stencil = jQuery("input[name='loai_stencil']:checked")
            .next("label")
            .text();
          stencil.danh_bong = "";
          stencil.mat_stencil = jQuery("input[name='mat_stencil']:checked")
            .next("label")
            .text();
          stencil.kich_thuoc = jQuery(
            "select[name='kich_thuoc_stencil'] option"
          )
            .filter(":selected")
            .text();
          stencil.quantity_2 = jQuery("input[name='so_luong_stencil']").val();
          stencil.do_day = "";
          stencil.note_2 = jQuery("textarea[name='note_2']").val();
          data.stencil = stencil;
        } else {
          data.isStencil = 0;
        }

        if (jQuery("input[name='isPanel']").val() == 1) {
          var chieu_rong = parseFloat(jQuery("input[name='width']").val());
          var chieu_dai = parseFloat(jQuery("input[name='height']").val());
          var so_dong_panel = parseInt(jQuery("#so_dong_panel").val());
          var so_cot_panel = parseInt(jQuery("#so_cot_panel").val());
          var vien_panel = jQuery("input[name='vien_panel']:checked").val();

          var new_chieu_dai = chieu_dai * so_dong_panel;
          var new_chieu_rong = chieu_rong * so_cot_panel;
          if (vien_panel == 2) {
            new_chieu_rong = new_chieu_rong + 10;
          }

          data.panel = 1;
          data.vien = jQuery("input[name='vien_panel']:checked").text();
          data.col_panel =
            "Chiều dài：" +
            chieu_dai +
            " x " +
            so_dong_panel +
            " = " +
            Math.round(new_chieu_dai * 10) / 10;
          data.row_panel =
            "Chiều Rộng：" +
            chieu_rong +
            " x " +
            so_cot_panel +
            (vien_panel == 2 ? " + 2 x 5 " : "") +
            " = " +
            Math.round(new_chieu_rong * 10) / 10;

          var so_mach_mot_tam = so_cot_panel * so_dong_panel;

          data.quantity =
            parseInt($("input[name='soTamPanel']")) * so_mach_mot_tam;

          data.panel_quantity =
            "Số lượng panel sau ghép: " +
            data.quantity +
            "/" +
            so_mach_mot_tam +
            " = " +
            $("input[name='soTamPanel']");
        } else {
          data.panel = 0;
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
                "/gio-hang/?add-to-cart=" +
                // "/cart/?add-to-cart=" +
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
  if (jQuery("input[name='san_xuat']:checked").val() === "nhanh") {
    var totalPrice = 0;

    jQuery("input[name='total_price_input']").val(totalPrice);
    jQuery("#tong_cong").html(convertToVND(totalPrice));

    console.log(totalPrice);
  } else if (jQuery("input[name='san_xuat']:checked").val() === "dhl") {
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

          jQuery("input[name='gia_pcb_dhl']").val(res.price_pcb);
          jQuery("input[name='gia_stencil_dhl']").val(
            parseFloat(res.price_stencil)
          );
          jQuery("#tinh_truoc").html(convertToVND(res.price_pcb));
          jQuery("#gia_stencil").html(
            convertToVND(parseFloat(res.price_stencil))
          );

          var totalPrice =
            parseFloat(jQuery("input[name='gia_pcb_dhl']").val()) +
            parseFloat(jQuery("input[name='gia_smt_input']").val()) +
            parseFloat(jQuery("input[name='gia_stencil_dhl']").val());
          // parseFloat(jQuery("input[name='gia_san_xuat_input']").val());

          jQuery("input[name='total_price_input']").val(totalPrice);
          jQuery("#tong_cong").html(convertToVND(totalPrice));

          console.log(totalPrice);
        } else {
          console.log("not ok");
        }
        //   toTotalPrice();
      },
    });
  } else {
    var totalPrice =
      parseFloat(jQuery("input[name='gia_truoc_input']").val()) +
      parseFloat(jQuery("input[name='gia_smt_input']").val()) +
      parseFloat(jQuery("input[name='gia_stencil_input']").val());
    //   parseFloat(jQuery("input[name='gia_san_xuat_input']").val());
    jQuery("#tinh_truoc").html(
      convertToVND(parseFloat(jQuery("input[name='gia_truoc_input']").val()))
    );
    jQuery("#gia_stencil").html(
      convertToVND(parseFloat(jQuery("input[name='gia_stencil_input']").val()))
    );
    jQuery("input[name='total_price_input']").val(totalPrice);
    jQuery("#tong_cong").html(convertToVND(totalPrice));

    console.log(totalPrice);
  }
}

function stencilUpdate() {
  if (jQuery("#stencilSwitch").is(":checked")) {
    let price = parseFloat(
      jQuery("select[name='kich_thuoc_stencil']")
        .find(":selected")
        .data("price")
    );
    console.log(price);
    if (jQuery("input[name='mat_stencil']:checked").val() === "top_bottom2") {
      price *= 2;
    }
    jQuery("#gia_stencil").html(convertToVND(price));
    jQuery("input[name='gia_stencil_input']").val(price);
  } else {
    jQuery("#gia_stencil").html(convertToVND(0));
    jQuery("input[name='gia_stencil_input']").val(0);
  }

  toTotalPrice();
}

function checkPanel() {
  let maxCols = Math.ceil(
    50 / parseFloat(jQuery("input[name='height']").val())
  );
  let maxRows = Math.ceil(50 / parseFloat(jQuery("input[name='width']").val()));
  jQuery("#so_cot_panel").attr({
    max: maxCols,
    placeholder: "max " + maxCols, // substitute your own
  });

  jQuery("#so_dong_panel").attr({
    max: maxRows,
    placeholder: "max " + maxRows,
    // substitute your own
  });
}

function smtUpdate() {
  if (jQuery("#smtSwitch").is(":checked")) {
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
          jQuery("#gia_smt").html(convertToVND(res.price));
          jQuery("input[name='gia_smt_input']").val(res.price);

          jQuery(".smtPrice").show();
        } else {
          console.log("not ok");
          jQuery("#gia_smt").html(convertToVND(0));
          jQuery("input[name='gia_smt_input']").val(0);
          toTotalPrice();
        }
      },
    });
  } else {
    jQuery("#gia_smt").html(convertToVND(0));
    jQuery("input[name='gia_smt_input']").val(0);
    toTotalPrice();
  }
}

function calculatorPanel() {
  if (
    jQuery("input[name='order_type']:checked").val() == "panel" &&
    jQuery("#so_cot_panel").val() != 0 &&
    jQuery("#so_dong_panel").val() != 0
  ) {
    var so_luong_mach = parseInt(
      jQuery("input[name='so_luong']:checked").val()
    );
    var chieu_rong = parseFloat(jQuery("input[name='width']").val());
    var chieu_dai = parseFloat(jQuery("input[name='height']").val());
    var so_dong_panel = parseInt(jQuery("#so_dong_panel").val());
    var so_cot_panel = parseInt(jQuery("#so_cot_panel").val());
    var vien_panel = jQuery("input[name='vien_panel']:checked").val();

    var new_chieu_dai = chieu_dai * so_dong_panel;
    var new_chieu_rong = chieu_rong * so_cot_panel;
    if (vien_panel == 2) {
      new_chieu_rong = new_chieu_rong + 1;
    }

    jQuery("input[name='widthPanel']").val(new_chieu_rong);
    jQuery("input[name='heightPanel']").val(new_chieu_dai);

    jQuery("#chieu_dai_panel_detail").html(
      "Chiều dài：" +
        chieu_dai +
        " x " +
        so_dong_panel +
        " = " +
        Math.round(new_chieu_dai * 10) / 10 +
        " cm"
    );
    jQuery("#chieu_rong_panel_detail").html(
      "Chiều Rộng：" +
        chieu_rong +
        " x " +
        so_cot_panel +
        (vien_panel == 2 ? " + 2 x 0.5 " : "") +
        " = " +
        Math.round(new_chieu_rong * 10) / 10 +
        " cm"
    );
    jQuery("#panel_detail").show();

    var so_mach_mot_tam = so_cot_panel * so_dong_panel;
    var so_tam_panel = so_luong_mach / so_mach_mot_tam;

    jQuery("#so_tam_panel_detail").html(
      "Số lượng panel sau ghép: " +
        so_luong_mach +
        "/" +
        so_mach_mot_tam +
        " = " +
        Math.round(so_tam_panel * 10) / 10
    );
    console.log("so_tam:" + so_tam_panel);

    var index_truoc = 0;
    var index_sau = 0;
    var array = extra.so_luong_setup;
    for (var i = 0; i < array.length; i++) {
      var value = array[i];
      var number = parseInt(value);
      console.log(so_tam_panel == number, so_tam_panel, number);
      if (so_tam_panel == number) {
        jQuery("input[name='isPanel']").val(1);
        $("input[name='soTamPanel']").val(so_tam_panel);
        jQuery("#option_panel").hide();
        break;
      } else if (so_tam_panel < number) {
        jQuery("#option_panel").show();
        index_truoc = i - 1;
        index_sau = i;
        console.log("kakak" + array[index_truoc] + " - " + array[index_sau]);
        if (index_truoc >= 0) {
          jQuery("#panelTruoc").data(
            "pcb_quantity",
            parseInt(array[index_truoc]) * so_mach_mot_tam
          );
          jQuery("#panelTruoc").data(
            "panel_quantity",
            parseInt(array[index_truoc])
          );
          jQuery("#panelTruoc").val(parseInt(array[index_truoc]));
          console.log("so luon kkk " + parseInt(array[index_truoc]));
          jQuery("#panelTruoc")
            .next("label")
            .html(
              "Ghép thành " +
                parseInt(array[index_truoc]) +
                " panel (Tổng PCB là " +
                parseInt(array[index_truoc]) * so_mach_mot_tam +
                ")"
            );
          $(".cl_truoc").show();
          console.log("test-data" + jQuery("#panelTruoc").data("quantity"));
        } else {
          $(".cl_truoc").hide();
        }
        if (index_sau < array.length) {
          jQuery("#panelSau").data(
            "pcb_quantity",
            parseInt(array[index_sau]) * so_mach_mot_tam
          );
          jQuery("#panelSau").data(
            "panel_quantity",
            parseInt(array[index_sau])
          );
          jQuery("#panelSau").val(parseInt(array[index_sau]));
          jQuery("#panelSau")
            .next("label")
            .html(
              "Ghép thành " +
                parseInt(array[index_sau]) +
                " panel (Tổng PCB là " +
                parseInt(array[index_sau]) * so_mach_mot_tam +
                ")"
            );
          $(".cl_sau").show();
          console.log("tututu " + jQuery("#panelSau").data("panel_quantity"));
        } else {
          $(".cl_sau").hide();
        }
        jQuery("#khongghepnua").get(0).checked = true;
        jQuery("input[name='isPanel']").val(0);
        break;
      }
    }
  } else {
    jQuery("#option_panel").hide();
    jQuery("input[name='isPanel']").val(0);
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

  if (jQuery("input[name='type_product']:checked").val() === "alu_type") {
    data.lop = "_alu";
  } else {
    data.lop = jQuery("input[name='so_lop']:checked").val();
  }

  data.quantity = parseInt(jQuery("input[name='so_luong']:checked").val());

  if (jQuery("input[name='isPanel']").val() == 1) {
    data.panel = true;
    data.width = parseFloat(jQuery("input[name='widthPanel']").val());
    data.height = parseFloat(jQuery("input[name='heightPanel']").val());
    data.quantity = parseInt(jQuery("input[name='soTamPanel']").val());
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
        jQuery("#tinh_truoc").html(convertToVND(res.price));
        jQuery("input[name='gia_truoc_input']").val(res.price);
      } else {
        console.log("not ok");
        jQuery("#tinh_truoc").html(convertToVND(0));
        jQuery("input[name='gia_truoc_input']").val(0);
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
