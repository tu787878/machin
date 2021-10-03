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
    $dai_1_2lop = get_option('dai_1_2lop', []);
    $rong_1_2lop = get_option('rong_1_2lop', []);
    $so_luong_1_2lop = get_option('so_luong_1_2lop', []);
    $gia_1_2lop = get_option('gia_1_2lop', []);
    $dai_2_2lop = get_option('dai_2_2lop', []);
    $rong_2_2lop = get_option('rong_2_2lop', []);
    $so_luong_2_2lop = get_option('so_luong_2_2lop', []);
    $gia_2_2lop = get_option('gia_2_2lop', []);
    $dai_3_2lop = get_option('dai_3_2lop', []);
    $rong_3_2lop = get_option('rong_3_2lop', []);
    $so_luong_3_2lop = get_option('so_luong_3_2lop', []);
    $gia_3_2lop = get_option('gia_3_2lop', []);
    $ti_le_loi_nhuan_2lop = get_option('ti_le_loi_nhuan_2lop', "");
    $duoi_10_sl5_2lop = get_option('duoi_10_sl5_2lop', "");
    $duoi_10_sl10_2lop = get_option('duoi_10_sl10_2lop', "");

    if (isset($_POST['ti_le_loi_nhuan_2lop']) && $_POST['ti_le_loi_nhuan_2lop'] != '') {
        $ti_le_loi_nhuan_2lop = $_POST['ti_le_loi_nhuan_2lop'];
        update_option('ti_le_loi_nhuan_2lop', $ti_le_loi_nhuan_2lop, 'yes');
    }

    if (isset($_POST['duoi_10_sl5_2lop']) && $_POST['duoi_10_sl5_2lop'] != '') {
        $duoi_10_sl5_2lop = $_POST['duoi_10_sl5_2lop'];
        update_option('duoi_10_sl5_2lop', $duoi_10_sl5_2lop, 'yes');
    }

    if (isset($_POST['duoi_10_sl10_2lop']) && $_POST['duoi_10_sl10_2lop'] != '') {
        $duoi_10_sl10_2lop = $_POST['duoi_10_sl10_2lop'];
        update_option('duoi_10_sl10_2lop', $duoi_10_sl10_2lop, 'yes');
    }

    if (count($dai_1_2lop) == 0) {
        $dai_1_2lop = [0, 0, 0, 0];
    }
    if (count($rong_1_2lop) == 0) {
        $rong_1_2lop = [0, 0, 0, 0];
    }
    if (count($so_luong_1_2lop) == 0) {
        $so_luong_1_2lop = [0, 0, 0, 0];
    }
    if (count($gia_1_2lop) == 0) {
        $gia_1_2lop = [0, 0, 0, 0];
    }

    if (count($dai_2_2lop) == 0) {
        $dai_2_2lop = [0, 0, 0, 0];
    }
    if (count($rong_2_2lop) == 0) {
        $rong_2_2lop = [0, 0, 0, 0];
    }
    if (count($so_luong_2_2lop) == 0) {
        $so_luong_2_2lop = [0, 0, 0, 0];
    }
    if (count($gia_2_2lop) == 0) {
        $gia_2_2lop = [0, 0, 0, 0];
    }

    if (count($dai_3_2lop) == 0) {
        $dai_3_2lop = [0, 0, 0, 0];
    }
    if (count($rong_3_2lop) == 0) {
        $rong_3_2lop = [0, 0, 0, 0];
    }
    if (count($so_luong_3_2lop) == 0) {
        $so_luong_3_2lop = [0, 0, 0, 0];
    }
    if (count($gia_3_2lop) == 0) {
        $gia_3_2lop = [0, 0, 0, 0];
    }

    if (isset($_POST['dai_1_2lop']) && $_POST['dai_1_2lop'] != '') {
        $dai_1_2lop = $_POST['dai_1_2lop'];
        update_option('dai_1_2lop', $dai_1_2lop, 'yes');
    }

    if (isset($_POST['rong_1_2lop']) && $_POST['rong_1_2lop'] != '') {
        $rong_1_2lop = $_POST['rong_1_2lop'];
        update_option('rong_1_2lop', $rong_1_2lop, 'yes');
    }

    if (isset($_POST['so_luong_1_2lop']) && $_POST['so_luong_1_2lop'] != '') {
        $so_luong_1_2lop = $_POST['so_luong_1_2lop'];
        update_option('so_luong_1_2lop', $so_luong_1_2lop, 'yes');
    }

    if (isset($_POST['gia_1_2lop']) && $_POST['gia_1_2lop'] != '') {
        $gia_1_2lop = $_POST['gia_1_2lop'];
        update_option('gia_1_2lop', $gia_1_2lop, 'yes');
    }

    if (isset($_POST['dai_2_2lop']) && $_POST['dai_2_2lop'] != '') {
        $dai_2_2lop = $_POST['dai_2_2lop'];
        update_option('dai_2_2lop', $dai_1_2lop, 'yes');
    }

    if (isset($_POST['rong_2_2lop']) && $_POST['rong_2_2lop'] != '') {
        $rong_2_2lop = $_POST['rong_2_2lop'];
        update_option('rong_2_2lop', $rong_2_2lop, 'yes');
    }

    if (isset($_POST['so_luong_2_2lop']) && $_POST['so_luong_2_2lop'] != '') {
        $so_luong_2_2lop = $_POST['so_luong_2_2lop'];
        update_option('so_luong_2_2lop', $so_luong_2_2lop, 'yes');
    }

    if (isset($_POST['gia_2_2lop']) && $_POST['gia_2_2lop'] != '') {
        $gia_2_2lop = $_POST['gia_2_2lop'];
        update_option('gia_2_2lop', $gia_2_2lop, 'yes');
    }

    if (isset($_POST['dai_3_2lop']) && $_POST['dai_3_2lop'] != '') {
        $dai_3_2lop = $_POST['dai_3_2lop'];
        update_option('dai_3_2lop', $dai_3_2lop, 'yes');
    }

    if (isset($_POST['rong_3_2lop']) && $_POST['rong_3_2lop'] != '') {
        $rong_3_2lop = $_POST['rong_3_2lop'];
        update_option('rong_3_2lop', $rong_3_2lop, 'yes');
    }

    if (isset($_POST['so_luong_3_2lop']) && $_POST['so_luong_3_2lop'] != '') {
        $so_luong_3_2lop = $_POST['so_luong_3_2lop'];
        update_option('so_luong_3_2lop', $so_luong_3_2lop, 'yes');
    }

    if (isset($_POST['gia_3_2lop']) && $_POST['gia_3_2lop'] != '') {
        $gia_3_2lop = $_POST['gia_3_2lop'];
        update_option('gia_3_2lop', $gia_3_2lop, 'yes');
    }
    ?>


    <h2>Cài đặt báo giá mạch in</h2>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Paris')">Cài đặt riêng</button>
    </div>

    <div id="Paris" class="tabcontent">
        <h3>Cài đặt riêng</h3>
        <form action="#" method="post">
            <label>
                Tỉ lệ lợi nhuận (đồng):
                <input type="text" name="ti_le_loi_nhuan_2lop" value="<?php echo $ti_le_loi_nhuan_2lop ?>" />
            </label>
            <br>
            <label>
             Giá mặc định hai cạnh dài rộng dưới 10cm - SL5 (đồng):
                <input type="text" name="duoi_10_sl5_2lop" value="<?php echo $duoi_10_sl5_2lop ?>" />
            </label>
            <br>
            <label>
             Giá mặc định hai cạnh dài rộng dưới 10cm - SL10 (đồng):
                <input type="text" name="duoi_10_sl10_2lop" value="<?php echo $duoi_10_sl10_2lop ?>" />
            </label>

            <h4>Số lượng >= 100</h4>
            <table>
                <tr>
                    <th>Dài</th>
                    <th>Rộng</th>
                    <th>Khối lượng</th>
                    <th>Giá</th>
                </tr>
                <?php
                foreach ($dai_1_2lop as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_1_2lop[]" value="<?php echo $dai_1_2lop[$key] ?>"></td>
                        <td><input type="text" name="rong_1_2lop[]" value="<?php echo $rong_1_2lop[$key] ?>"></td>
                        <td><input type="text" name="so_luong_1_2lop[]" value="<?php echo $so_luong_1_2lop[$key] ?>"></td>
                        <td><input type="text" name="gia_1_2lop[]" value="<?php echo $gia_1_2lop[$key] ?>"></td>
                    </tr>

                <?php
                }
                ?>
            </table>
            <h4>Số lượng 50 - 100</h4>
            <table>
                <tr>
                    <th>Dài</th>
                    <th>Rộng</th>
                    <th>Khối lượng</th>
                    <th>Giá</th>
                </tr>
                <?php
                foreach ($dai_1_2lop as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_2_2lop[]" value="<?php echo $dai_2_2lop[$key] ?>"></td>
                        <td><input type="text" name="rong_2_2lop[]" value="<?php echo $rong_2_2lop[$key] ?>"></td>
                        <td><input type="text" name="so_luong_2_2lop[]" value="<?php echo $so_luong_2_2lop[$key] ?>"></td>
                        <td><input type="text" name="gia_2_2lop[]" value="<?php echo $gia_2_2lop[$key] ?>"></td>
                    </tr>

                <?php
                }
                ?>
            </table>
            
        
        <h4>Số lượng 5 - 30</h4>
        <table>
                <tr>
                    <th>Dài</th>
                    <th>Rộng</th>
                    <th>Khối lượng</th>
                    <th>Giá</th>
                </tr>
                <?php
                foreach ($dai_1_2lop as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_3_2lop[]" value="<?php echo $dai_3_2lop[$key] ?>"></td>
                        <td><input type="text" name="rong_3_2lop[]" value="<?php echo $rong_3_2lop[$key] ?>"></td>
                        <td><input type="text" name="so_luong_3_2lop[]" value="<?php echo $so_luong_3_2lop[$key] ?>"></td>
                        <td><input type="text" name="gia_3_2lop[]" value="<?php echo $gia_3_2lop[$key] ?>"></td>
                    </tr>

                <?php
                }
                ?>
            </table>
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