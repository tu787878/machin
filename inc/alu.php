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
    $dai_1_alu = get_option('dai_1_alu', []);
    $rong_1_alu = get_option('rong_1_alu', []);
    $so_luong_1_alu = get_option('so_luong_1_alu', []);
    $gia_1_alu = get_option('gia_1_alu', []);
    $dai_2_alu = get_option('dai_2_alu', []);
    $rong_2_alu = get_option('rong_2_alu', []);
    $so_luong_2_alu = get_option('so_luong_2_alu', []);
    $gia_2_alu = get_option('gia_2_alu', []);
    $dai_3_alu = get_option('dai_3_alu', []);
    $rong_3_alu = get_option('rong_3_alu', []);
    $so_luong_3_alu = get_option('so_luong_3_alu', []);
    $gia_3_alu = get_option('gia_3_alu', []);
    $ti_le_loi_nhuan_alu = get_option('ti_le_loi_nhuan_alu', "");
    $duoi_10_sl5_alu = get_option('duoi_10_sl5_alu', "");
    $duoi_10_sl10_alu = get_option('duoi_10_sl10_alu', "");

    if (isset($_POST['ti_le_loi_nhuan_alu']) && $_POST['ti_le_loi_nhuan_alu'] != '') {
        $ti_le_loi_nhuan_alu = $_POST['ti_le_loi_nhuan_alu'];
        update_option('ti_le_loi_nhuan_alu', $ti_le_loi_nhuan_alu, 'yes');
    }

    if (isset($_POST['duoi_10_sl5_alu']) && $_POST['duoi_10_sl5_alu'] != '') {
        $duoi_10_sl5_alu = $_POST['duoi_10_sl5_alu'];
        update_option('duoi_10_sl5_alu', $duoi_10_sl5_alu, 'yes');
    }

    if (isset($_POST['duoi_10_sl10_alu']) && $_POST['duoi_10_sl10_alu'] != '') {
        $duoi_10_sl10_alu = $_POST['duoi_10_sl10_alu'];
        update_option('duoi_10_sl10_alu', $duoi_10_sl10_alu, 'yes');
    }

    if (count($dai_1_alu) == 0) {
        $dai_1_alu = [0, 0, 0, 0];
    }
    if (count($rong_1_alu) == 0) {
        $rong_1_alu = [0, 0, 0, 0];
    }
    if (count($so_luong_1_alu) == 0) {
        $so_luong_1_alu = [0, 0, 0, 0];
    }
    if (count($gia_1_alu) == 0) {
        $gia_1_alu = [0, 0, 0, 0];
    }

    if (count($dai_2_alu) == 0) {
        $dai_2_alu = [0, 0, 0, 0];
    }
    if (count($rong_2_alu) == 0) {
        $rong_2_alu = [0, 0, 0, 0];
    }
    if (count($so_luong_2_alu) == 0) {
        $so_luong_2_alu = [0, 0, 0, 0];
    }
    if (count($gia_2_alu) == 0) {
        $gia_2_alu = [0, 0, 0, 0];
    }

    if (count($dai_3_alu) == 0) {
        $dai_3_alu = [0, 0, 0, 0];
    }
    if (count($rong_3_alu) == 0) {
        $rong_3_alu = [0, 0, 0, 0];
    }
    if (count($so_luong_3_alu) == 0) {
        $so_luong_3_alu = [0, 0, 0, 0];
    }
    if (count($gia_3_alu) == 0) {
        $gia_3_alu = [0, 0, 0, 0];
    }

    if (isset($_POST['dai_1_alu']) && $_POST['dai_1_alu'] != '') {
        $dai_1_alu = $_POST['dai_1_alu'];
        update_option('dai_1_alu', $dai_1_alu, 'yes');
    }

    if (isset($_POST['rong_1_alu']) && $_POST['rong_1_alu'] != '') {
        $rong_1_alu = $_POST['rong_1_alu'];
        update_option('rong_1_alu', $rong_1_alu, 'yes');
    }

    if (isset($_POST['so_luong_1_alu']) && $_POST['so_luong_1_alu'] != '') {
        $so_luong_1_alu = $_POST['so_luong_1_alu'];
        update_option('so_luong_1_alu', $so_luong_1_alu, 'yes');
    }

    if (isset($_POST['gia_1_alu']) && $_POST['gia_1_alu'] != '') {
        $gia_1_alu = $_POST['gia_1_alu'];
        update_option('gia_1_alu', $gia_1_alu, 'yes');
    }

    if (isset($_POST['dai_2_alu']) && $_POST['dai_2_alu'] != '') {
        $dai_2_alu = $_POST['dai_2_alu'];
        update_option('dai_2_alu', $dai_1_alu, 'yes');
    }

    if (isset($_POST['rong_2_alu']) && $_POST['rong_2_alu'] != '') {
        $rong_2_alu = $_POST['rong_2_alu'];
        update_option('rong_2_alu', $rong_2_alu, 'yes');
    }

    if (isset($_POST['so_luong_2_alu']) && $_POST['so_luong_2_alu'] != '') {
        $so_luong_2_alu = $_POST['so_luong_2_alu'];
        update_option('so_luong_2_alu', $so_luong_2_alu, 'yes');
    }

    if (isset($_POST['gia_2_alu']) && $_POST['gia_2_alu'] != '') {
        $gia_2_alu = $_POST['gia_2_alu'];
        update_option('gia_2_alu', $gia_2_alu, 'yes');
    }

    if (isset($_POST['dai_3_alu']) && $_POST['dai_3_alu'] != '') {
        $dai_3_alu = $_POST['dai_3_alu'];
        update_option('dai_3_alu', $dai_3_alu, 'yes');
    }

    if (isset($_POST['rong_3_alu']) && $_POST['rong_3_alu'] != '') {
        $rong_3_alu = $_POST['rong_3_alu'];
        update_option('rong_3_alu', $rong_3_alu, 'yes');
    }

    if (isset($_POST['so_luong_3_alu']) && $_POST['so_luong_3_alu'] != '') {
        $so_luong_3_alu = $_POST['so_luong_3_alu'];
        update_option('so_luong_3_alu', $so_luong_3_alu, 'yes');
    }

    if (isset($_POST['gia_3_alu']) && $_POST['gia_3_alu'] != '') {
        $gia_3_alu = $_POST['gia_3_alu'];
        update_option('gia_3_alu', $gia_3_alu, 'yes');
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
                <input type="text" name="ti_le_loi_nhuan_alu" value="<?php echo $ti_le_loi_nhuan_alu ?>" />
            </label>
            <br>
            <label>
             Giá mặc định hai cạnh dài rộng dưới 10cm - SL5 (đồng):
                <input type="text" name="duoi_10_sl5_alu" value="<?php echo $duoi_10_sl5_alu ?>" />
            </label>
            <br>
            <label>
             Giá mặc định hai cạnh dài rộng dưới 10cm - SL10 (đồng):
                <input type="text" name="duoi_10_sl10_alu" value="<?php echo $duoi_10_sl10_alu ?>" />
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
                foreach ($dai_1_alu as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_1_alu[]" value="<?php echo $dai_1_alu[$key] ?>"></td>
                        <td><input type="text" name="rong_1_alu[]" value="<?php echo $rong_1_alu[$key] ?>"></td>
                        <td><input type="text" name="so_luong_1_alu[]" value="<?php echo $so_luong_1_alu[$key] ?>"></td>
                        <td><input type="text" name="gia_1_alu[]" value="<?php echo $gia_1_alu[$key] ?>"></td>
                    </tr>

                <?php
                }
                ?>
            </table>
            <h4>Số lượng 50 - 75</h4>
            <table>
                <tr>
                    <th>Dài</th>
                    <th>Rộng</th>
                    <th>Khối lượng</th>
                    <th>Giá</th>
                </tr>
                <?php
                foreach ($dai_1_alu as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_2_alu[]" value="<?php echo $dai_2_alu[$key] ?>"></td>
                        <td><input type="text" name="rong_2_alu[]" value="<?php echo $rong_2_alu[$key] ?>"></td>
                        <td><input type="text" name="so_luong_2_alu[]" value="<?php echo $so_luong_2_alu[$key] ?>"></td>
                        <td><input type="text" name="gia_2_alu[]" value="<?php echo $gia_2_alu[$key] ?>"></td>
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
                foreach ($dai_1_alu as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_3_alu[]" value="<?php echo $dai_3_alu[$key] ?>"></td>
                        <td><input type="text" name="rong_3_alu[]" value="<?php echo $rong_3_alu[$key] ?>"></td>
                        <td><input type="text" name="so_luong_3_alu[]" value="<?php echo $so_luong_3_alu[$key] ?>"></td>
                        <td><input type="text" name="gia_3_alu[]" value="<?php echo $gia_3_alu[$key] ?>"></td>
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