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
    $dai_1_4lop = get_option('dai_1_4lop', []);
    $rong_1_4lop = get_option('rong_1_4lop', []);
    $so_luong_1_4lop = get_option('so_luong_1_4lop', []);
    $gia_1_4lop = get_option('gia_1_4lop', []);
    $dai_2_4lop = get_option('dai_2_4lop', []);
    $rong_2_4lop = get_option('rong_2_4lop', []);
    $so_luong_2_4lop = get_option('so_luong_2_4lop', []);
    $gia_2_4lop = get_option('gia_2_4lop', []);
    $dai_3_4lop = get_option('dai_3_4lop', []);
    $rong_3_4lop = get_option('rong_3_4lop', []);
    $so_luong_3_4lop = get_option('so_luong_3_4lop', []);
    $gia_3_4lop = get_option('gia_3_4lop', []);
    $ti_le_loi_nhuan_4lop = get_option('ti_le_loi_nhuan_4lop', "");
    $duoi_10_sl5_4lop = get_option('duoi_10_sl5_4lop', "");
    $duoi_10_sl10_4lop = get_option('duoi_10_sl10_4lop', "");

    if (isset($_POST['ti_le_loi_nhuan_4lop']) && $_POST['ti_le_loi_nhuan_4lop'] != '') {
        $ti_le_loi_nhuan_4lop = $_POST['ti_le_loi_nhuan_4lop'];
        update_option('ti_le_loi_nhuan_4lop', $ti_le_loi_nhuan_4lop, 'yes');
    }

    if (isset($_POST['duoi_10_sl5_4lop']) && $_POST['duoi_10_sl5_4lop'] != '') {
        $duoi_10_sl5_4lop = $_POST['duoi_10_sl5_4lop'];
        update_option('duoi_10_sl5_4lop', $duoi_10_sl5_4lop, 'yes');
    }

    if (isset($_POST['duoi_10_sl10_4lop']) && $_POST['duoi_10_sl10_4lop'] != '') {
        $duoi_10_sl10_4lop = $_POST['duoi_10_sl10_4lop'];
        update_option('duoi_10_sl10_4lop', $duoi_10_sl10_4lop, 'yes');
    }

    if (count($dai_1_4lop) == 0) {
        $dai_1_4lop = [0, 0, 0, 0];
    }
    if (count($rong_1_4lop) == 0) {
        $rong_1_4lop = [0, 0, 0, 0];
    }
    if (count($so_luong_1_4lop) == 0) {
        $so_luong_1_4lop = [0, 0, 0, 0];
    }
    if (count($gia_1_4lop) == 0) {
        $gia_1_4lop = [0, 0, 0, 0];
    }

    if (count($dai_2_4lop) == 0) {
        $dai_2_4lop = [0, 0, 0, 0];
    }
    if (count($rong_2_4lop) == 0) {
        $rong_2_4lop = [0, 0, 0, 0];
    }
    if (count($so_luong_2_4lop) == 0) {
        $so_luong_2_4lop = [0, 0, 0, 0];
    }
    if (count($gia_2_4lop) == 0) {
        $gia_2_4lop = [0, 0, 0, 0];
    }

    if (count($dai_3_4lop) == 0) {
        $dai_3_4lop = [0, 0, 0, 0];
    }
    if (count($rong_3_4lop) == 0) {
        $rong_3_4lop = [0, 0, 0, 0];
    }
    if (count($so_luong_3_4lop) == 0) {
        $so_luong_3_4lop = [0, 0, 0, 0];
    }
    if (count($gia_3_4lop) == 0) {
        $gia_3_4lop = [0, 0, 0, 0];
    }

    if (isset($_POST['dai_1_4lop']) && $_POST['dai_1_4lop'] != '') {
        $dai_1_4lop = $_POST['dai_1_4lop'];
        update_option('dai_1_4lop', $dai_1_4lop, 'yes');
    }

    if (isset($_POST['rong_1_4lop']) && $_POST['rong_1_4lop'] != '') {
        $rong_1_4lop = $_POST['rong_1_4lop'];
        update_option('rong_1_4lop', $rong_1_4lop, 'yes');
    }

    if (isset($_POST['so_luong_1_4lop']) && $_POST['so_luong_1_4lop'] != '') {
        $so_luong_1_4lop = $_POST['so_luong_1_4lop'];
        update_option('so_luong_1_4lop', $so_luong_1_4lop, 'yes');
    }

    if (isset($_POST['gia_1_4lop']) && $_POST['gia_1_4lop'] != '') {
        $gia_1_4lop = $_POST['gia_1_4lop'];
        update_option('gia_1_4lop', $gia_1_4lop, 'yes');
    }

    if (isset($_POST['dai_2_4lop']) && $_POST['dai_2_4lop'] != '') {
        $dai_2_4lop = $_POST['dai_2_4lop'];
        update_option('dai_2_4lop', $dai_1_4lop, 'yes');
    }

    if (isset($_POST['rong_2_4lop']) && $_POST['rong_2_4lop'] != '') {
        $rong_2_4lop = $_POST['rong_2_4lop'];
        update_option('rong_2_4lop', $rong_2_4lop, 'yes');
    }

    if (isset($_POST['so_luong_2_4lop']) && $_POST['so_luong_2_4lop'] != '') {
        $so_luong_2_4lop = $_POST['so_luong_2_4lop'];
        update_option('so_luong_2_4lop', $so_luong_2_4lop, 'yes');
    }

    if (isset($_POST['gia_2_4lop']) && $_POST['gia_2_4lop'] != '') {
        $gia_2_4lop = $_POST['gia_2_4lop'];
        update_option('gia_2_4lop', $gia_2_4lop, 'yes');
    }

    if (isset($_POST['dai_3_4lop']) && $_POST['dai_3_4lop'] != '') {
        $dai_3_4lop = $_POST['dai_3_4lop'];
        update_option('dai_3_4lop', $dai_3_4lop, 'yes');
    }

    if (isset($_POST['rong_3_4lop']) && $_POST['rong_3_4lop'] != '') {
        $rong_3_4lop = $_POST['rong_3_4lop'];
        update_option('rong_3_4lop', $rong_3_4lop, 'yes');
    }

    if (isset($_POST['so_luong_3_4lop']) && $_POST['so_luong_3_4lop'] != '') {
        $so_luong_3_4lop = $_POST['so_luong_3_4lop'];
        update_option('so_luong_3_4lop', $so_luong_3_4lop, 'yes');
    }

    if (isset($_POST['gia_3_4lop']) && $_POST['gia_3_4lop'] != '') {
        $gia_3_4lop = $_POST['gia_3_4lop'];
        update_option('gia_3_4lop', $gia_3_4lop, 'yes');
    }
    ?>


    <h2>C??i ?????t b??o gi?? m???ch in</h2>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Paris')">C??i ?????t ri??ng</button>
    </div>

    <div id="Paris" class="tabcontent">
        <h3>C??i ?????t ri??ng</h3>
        <form action="#" method="post">
            <label>
                T??? l??? l???i nhu???n (?????ng):
                <input type="text" name="ti_le_loi_nhuan_4lop" value="<?php echo $ti_le_loi_nhuan_4lop ?>" />
            </label>
            <br>
            <label>
             Gi?? m???c ?????nh hai c???nh d??i r???ng d?????i 10cm - SL5 (?????ng):
                <input type="text" name="duoi_10_sl5_4lop" value="<?php echo $duoi_10_sl5_4lop ?>" />
            </label>
            <br>
            <label>
             Gi?? m???c ?????nh hai c???nh d??i r???ng d?????i 10cm - SL10 (?????ng):
                <input type="text" name="duoi_10_sl10_4lop" value="<?php echo $duoi_10_sl10_4lop ?>" />
            </label>

            <h4>S??? l?????ng >= 100</h4>
            <table>
                <tr>
                    <th>D??i</th>
                    <th>R???ng</th>
                    <th>Kh???i l?????ng</th>
                    <th>Gi??</th>
                </tr>
                <?php
                foreach ($dai_1_4lop as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_1_4lop[]" value="<?php echo $dai_1_4lop[$key] ?>"></td>
                        <td><input type="text" name="rong_1_4lop[]" value="<?php echo $rong_1_4lop[$key] ?>"></td>
                        <td><input type="text" name="so_luong_1_4lop[]" value="<?php echo $so_luong_1_4lop[$key] ?>"></td>
                        <td><input type="text" name="gia_1_4lop[]" value="<?php echo $gia_1_4lop[$key] ?>"></td>
                    </tr>

                <?php
                }
                ?>
            </table>
            <h4>S??? l?????ng 50 - 75</h4>
            <table>
                <tr>
                    <th>D??i</th>
                    <th>R???ng</th>
                    <th>Kh???i l?????ng</th>
                    <th>Gi??</th>
                </tr>
                <?php
                foreach ($dai_1_4lop as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_2_4lop[]" value="<?php echo $dai_2_4lop[$key] ?>"></td>
                        <td><input type="text" name="rong_2_4lop[]" value="<?php echo $rong_2_4lop[$key] ?>"></td>
                        <td><input type="text" name="so_luong_2_4lop[]" value="<?php echo $so_luong_2_4lop[$key] ?>"></td>
                        <td><input type="text" name="gia_2_4lop[]" value="<?php echo $gia_2_4lop[$key] ?>"></td>
                    </tr>

                <?php
                }
                ?>
            </table>
            
        
        <h4>S??? l?????ng 5 - 30</h4>
        <table>
                <tr>
                    <th>D??i</th>
                    <th>R???ng</th>
                    <th>Kh???i l?????ng</th>
                    <th>Gi??</th>
                </tr>
                <?php
                foreach ($dai_1_4lop as $key => $value) {
                    # code...

                ?>
                    <tr>
                        <td><input type="text" name="dai_3_4lop[]" value="<?php echo $dai_3_4lop[$key] ?>"></td>
                        <td><input type="text" name="rong_3_4lop[]" value="<?php echo $rong_3_4lop[$key] ?>"></td>
                        <td><input type="text" name="so_luong_3_4lop[]" value="<?php echo $so_luong_3_4lop[$key] ?>"></td>
                        <td><input type="text" name="gia_3_4lop[]" value="<?php echo $gia_3_4lop[$key] ?>"></td>
                    </tr>

                <?php
                }
                ?>
            </table>
        <button type="submit">L??u</button>
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