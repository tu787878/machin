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
    $dai_1 = get_option('dai_1', []);
    $rong_1 = get_option('rong_1', []);
    $so_luong_1 = get_option('so_luong_1', []);
    $gia_1 = get_option('gia_1', []);
    $dai_2 = get_option('dai_2', []);
    $rong_2 = get_option('rong_2', []);
    $so_luong_2 = get_option('so_luong_2', []);
    $gia_2 = get_option('gia_2', []);
    $dai_3 = get_option('dai_3', []);
    $rong_3 = get_option('rong_3', []);
    $so_luong_3 = get_option('so_luong_3', []);
    $gia_3 = get_option('gia_3', []);
    $ti_le_loi_nhuan = get_option('ti_le_loi_nhuan', "");
    $duoi_10_sl5 = get_option('duoi_10_sl5', "");
    $duoi_10_sl10 = get_option('duoi_10_sl10', "");

    if (isset($_POST['ti_le_loi_nhuan']) && $_POST['ti_le_loi_nhuan'] != '') {
        $ti_le_loi_nhuan = $_POST['ti_le_loi_nhuan'];
        update_option('ti_le_loi_nhuan', $ti_le_loi_nhuan, 'yes');
    }

    if (isset($_POST['duoi_10_sl5']) && $_POST['duoi_10_sl5'] != '') {
        $duoi_10_sl5 = $_POST['duoi_10_sl5'];
        update_option('duoi_10_sl5', $duoi_10_sl5, 'yes');
    }

    if (isset($_POST['duoi_10_sl10']) && $_POST['duoi_10_sl10'] != '') {
        $duoi_10_sl10 = $_POST['duoi_10_sl10'];
        update_option('duoi_10_sl10', $duoi_10_sl10, 'yes');
    }

    if (count($dai_1) == 0) {
        $dai_1 = [0, 0, 0, 0];
    }
    if (count($rong_1) == 0) {
        $rong_1 = [0, 0, 0, 0];
    }
    if (count($so_luong_1) == 0) {
        $so_luong_1 = [0, 0, 0, 0];
    }
    if (count($gia_1) == 0) {
        $gia_1 = [0, 0, 0, 0];
    }

    if (count($dai_2) == 0) {
        $dai_2 = [0, 0, 0, 0];
    }
    if (count($rong_2) == 0) {
        $rong_2 = [0, 0, 0, 0];
    }
    if (count($so_luong_2) == 0) {
        $so_luong_2 = [0, 0, 0, 0];
    }
    if (count($gia_2) == 0) {
        $gia_2 = [0, 0, 0, 0];
    }

    if (count($dai_3) == 0) {
        $dai_3 = [0, 0, 0, 0];
    }
    if (count($rong_3) == 0) {
        $rong_3 = [0, 0, 0, 0];
    }
    if (count($so_luong_3) == 0) {
        $so_luong_3 = [0, 0, 0, 0];
    }
    if (count($gia_3) == 0) {
        $gia_3 = [0, 0, 0, 0];
    }

    if (isset($_POST['dai_1']) && $_POST['dai_1'] != '') {
        $dai_1 = $_POST['dai_1'];
        update_option('dai_1', $dai_1, 'yes');
    }

    if (isset($_POST['rong_1']) && $_POST['rong_1'] != '') {
        $rong_1 = $_POST['rong_1'];
        update_option('rong_1', $rong_1, 'yes');
    }

    if (isset($_POST['so_luong_1']) && $_POST['so_luong_1'] != '') {
        $so_luong_1 = $_POST['so_luong_1'];
        update_option('so_luong_1', $so_luong_1, 'yes');
    }

    if (isset($_POST['gia_1']) && $_POST['gia_1'] != '') {
        $gia_1 = $_POST['gia_1'];
        update_option('gia_1', $gia_1, 'yes');
    }

    if (isset($_POST['dai_2']) && $_POST['dai_2'] != '') {
        $dai_2 = $_POST['dai_2'];
        update_option('dai_2', $dai_1, 'yes');
    }

    if (isset($_POST['rong_2']) && $_POST['rong_2'] != '') {
        $rong_2 = $_POST['rong_2'];
        update_option('rong_2', $rong_2, 'yes');
    }

    if (isset($_POST['so_luong_2']) && $_POST['so_luong_2'] != '') {
        $so_luong_2 = $_POST['so_luong_2'];
        update_option('so_luong_2', $so_luong_2, 'yes');
    }

    if (isset($_POST['gia_2']) && $_POST['gia_2'] != '') {
        $gia_2 = $_POST['gia_2'];
        update_option('gia_2', $gia_2, 'yes');
    }

    if (isset($_POST['dai_3']) && $_POST['dai_3'] != '') {
        $dai_3 = $_POST['dai_3'];
        update_option('dai_3', $dai_3, 'yes');
    }

    if (isset($_POST['rong_3']) && $_POST['rong_3'] != '') {
        $rong_3 = $_POST['rong_3'];
        update_option('rong_3', $rong_3, 'yes');
    }

    if (isset($_POST['so_luong_3']) && $_POST['so_luong_3'] != '') {
        $so_luong_3 = $_POST['so_luong_3'];
        update_option('so_luong_3', $so_luong_3, 'yes');
    }

    if (isset($_POST['gia_3']) && $_POST['gia_3'] != '') {
        $gia_3 = $_POST['gia_3'];
        update_option('gia_3', $gia_3, 'yes');
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
                <input type="text" name="ti_le_loi_nhuan" value="<?php echo $ti_le_loi_nhuan ?>" />
            </label>
            <br>
            <label>
             Giá mặc định hai cạnh dài rộng dưới 10cm - SL5 (đồng):
                <input type="text" name="duoi_10_sl5" value="<?php echo $duoi_10_sl5 ?>" />
            </label>
            <br>
            <label>
             Giá mặc định hai cạnh dài rộng dưới 10cm - SL10 (đồng):
                <input type="text" name="duoi_10_sl10" value="<?php echo $duoi_10_sl10 ?>" />
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
                foreach ($dai_1 as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_1[]" value="<?php echo $dai_1[$key] ?>"></td>
                        <td><input type="text" name="rong_1[]" value="<?php echo $rong_1[$key] ?>"></td>
                        <td><input type="text" name="so_luong_1[]" value="<?php echo $so_luong_1[$key] ?>"></td>
                        <td><input type="text" name="gia_1[]" value="<?php echo $gia_1[$key] ?>"></td>
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
                foreach ($dai_1 as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_2[]" value="<?php echo $dai_2[$key] ?>"></td>
                        <td><input type="text" name="rong_2[]" value="<?php echo $rong_2[$key] ?>"></td>
                        <td><input type="text" name="so_luong_2[]" value="<?php echo $so_luong_2[$key] ?>"></td>
                        <td><input type="text" name="gia_2[]" value="<?php echo $gia_2[$key] ?>"></td>
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
                foreach ($dai_1 as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_3[]" value="<?php echo $dai_3[$key] ?>"></td>
                        <td><input type="text" name="rong_3[]" value="<?php echo $rong_3[$key] ?>"></td>
                        <td><input type="text" name="so_luong_3[]" value="<?php echo $so_luong_3[$key] ?>"></td>
                        <td><input type="text" name="gia_3[]" value="<?php echo $gia_3[$key] ?>"></td>
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