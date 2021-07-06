<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        .content {
            display: flex;
            flex-direction: column;

        }


        label {
            margin-bottom: 20px;

        }


        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: block;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<body>

    <?php
    $ship_qt = get_option('ship_qt', "");
    $dung_sai_so_luong = get_option('dung_sai_so_luong', "");
    $phi_quan_ly = get_option('phi_quan_ly', "");
    $ship_huyen_xa = get_option('ship_huyen_xa', "");
    $sau_3kg = get_option('sau_3kg', "");

    if (isset($_POST['ship_qt']) && $_POST['ship_qt'] != '') {
        $ship_qt = $_POST['ship_qt'];
        update_option('ship_qt', $ship_qt, 'yes');
    }
    if (isset($_POST['dung_sai_so_luong']) && $_POST['dung_sai_so_luong'] != '') {
        $dung_sai_so_luong = $_POST['dung_sai_so_luong'];
        update_option('dung_sai_so_luong', $dung_sai_so_luong, 'yes');
    }
    if (isset($_POST['phi_quan_ly']) && $_POST['phi_quan_ly'] != '') {
        $phi_quan_ly = $_POST['phi_quan_ly'];
        update_option('phi_quan_ly', $phi_quan_ly, 'yes');
    }
    if (isset($_POST['ship_huyen_xa']) && $_POST['ship_huyen_xa'] != '') {
        $ship_huyen_xa = $_POST['ship_huyen_xa'];
        update_option('ship_huyen_xa', $ship_huyen_xa, 'yes');
    }
    if (isset($_POST['sau_3kg']) && $_POST['sau_3kg'] != '') {
        $sau_3kg = $_POST['sau_3kg'];
        update_option('sau_3kg', $sau_3kg, 'yes');
    }

    ?>


    <h2>Cài đặt báo giá mạch in</h2>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">Cài đặt chung</button>
    </div>

    <div id="London" class="tabcontent">
        <form action="#" method="post">
            <div class="content">
                <h3>Cài đặt chung (nghìn đồng)</h3>
                <label>
                    Vận chuyển quốc tế (nghìn đồng):
                    <input type="text" name="ship_qt" value="<?php echo $ship_qt ?>" />
                </label>
                <label>
                    Dung sai khối lượng (gram):
                    <input type="text" name="dung_sai_so_luong" value="<?php echo $dung_sai_so_luong ?>" />
                </label>
                <label>
                    Phí quản lý cho sale (nghìn đồng):
                    <input type="text" name="phi_quan_ly" value="<?php echo $phi_quan_ly ?>" />
                </label>
                <label>
                    Ship huyện xã (nghìn đồng):
                    <input type="text" name="ship_huyen_xa" value="<?php echo $ship_huyen_xa ?>" />
                </label>
                <label>
                    Sau 3kg (nghìn đồng):
                    <input type="text" name="sau_3kg" value="<?php echo $sau_3kg ?>" />
                </label>
                <label>
                    Công thức khối lượng ():
                    <textarea style="width: 400px;" disabled type="text">(((((Chiều dài x Chiều rộng x Số lượng) -1500)*(0.666-0.5)/(500))+0.5)+0.3)</textarea>
                </label>
                <label>
                    Tiền ship về vn:
                    <input disabled style="width: 400px;" type="text" value="Vận chuyển quốc tế * khối lượng" />
                </label>
                <label>
                    Tiền ship nội địa:
                    <textarea disabled style="width: 400px;" type="text">IF  Khối lượng < 3 KG thì  bằng Ship huyện xã
ELSE > 3KG = Ship huyện xã + (Khối lượng * Sau 3KG)

                </textarea>
                </label>
                <label>
                    Tổng ship:
                    <input disabled style="width: 400px;" type="text" name="name" value="Tiền ship nối địa + Tiền ship về VN" />
                </label>
            </div>

            <button type="submit">Lưu</button>
        </form>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

</body>

</html>