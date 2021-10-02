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
    $setup_1 = get_option('setup_1', "");
    $setup_2 = get_option('setup_2', "");
    $setup_3 = get_option('setup_3', "");
    $setup_4 = get_option('setup_4', "");
    $tien_smd = get_option('tien_smd', "");
    $tien_dip = get_option('tien_dip', "");

    if (isset($_POST['setup_1']) && $_POST['setup_1'] != '') {
        $setup_1 = $_POST['setup_1'];
        update_option('setup_1', $setup_1, 'yes');
    }
    if (isset($_POST['setup_2']) && $_POST['setup_2'] != '') {
        $setup_2 = $_POST['setup_2'];
        update_option('setup_2', $setup_2, 'yes');
    }
    if (isset($_POST['setup_3']) && $_POST['setup_3'] != '') {
        $setup_3 = $_POST['setup_3'];
        update_option('setup_3', $setup_3, 'yes');
    }
    if (isset($_POST['setup_4']) && $_POST['setup_4'] != '') {
        $setup_4 = $_POST['setup_4'];
        update_option('setup_4', $setup_4, 'yes');
    }
    if (isset($_POST['tien_smd']) && $_POST['tien_smd'] != '') {
        $tien_smd = $_POST['tien_smd'];
        update_option('tien_smd', $tien_smd, 'yes');
    }
    if (isset($_POST['tien_dip']) && $_POST['tien_dip'] != '') {
        $tien_dip = $_POST['tien_dip'];
        update_option('tien_dip', $tien_dip, 'yes');
    }

    ?>


    <h2>Cài đặt báo giá SMT Assembly</h2>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">Cài đặt chung</button>
    </div>

    <div id="London" class="tabcontent">
        <form action="#" method="post">
            <div class="content">
                <h3>Cài đặt chung (nghìn đồng)</h3>
                <label>
                    Phí setup 1 (nghìn đồng):
                    <input type="text" name="setup_1" value="<?php echo $setup_1 ?>" />
                </label>
                <label>
                    Phí setup 2 (nghìn đồng):
                    <input type="text" name="setup_2" value="<?php echo $setup_2 ?>" />
                </label>
                <label>
                    Phí setup 3 (nghìn đồng):
                    <input type="text" name="setup_3" value="<?php echo $setup_3 ?>" />
                </label>
                <label>
                    Phí setup 4 (nghìn đồng):
                    <input type="text" name="setup_4" value="<?php echo $setup_4 ?>" />
                </label>
                <label>
                    Tiền 1 điểm hàng SMD (nghìn đồng):
                    <input type="text" name="tien_smd" value="<?php echo $tien_smd ?>" />
                </label>
                <label>
                    Tiền 1 điểm hàng DIP (nghìn đồng):
                    <input type="text" name="tien_dip" value="<?php echo $tien_dip ?>" />
                </label>
                <label>
                    Công thức khối lượng ():
                    <textarea style="width: 400px;" disabled type="text">PT1 =  Nếu ô Tổng linh kiện dán < 15
PT1 = Phí setup 1
PT1 =  Nếu ô Tổng linh kiện dán >= 15
PT1 = Phí setup 2
PT1 =  Nếu ô Tổng linh kiện dán >=30
PT1 = Phí setup 3
PT1 =  Nếu ô Tổng linh kiện dán > = 50
PT1 = Phí setup 4
/////////
PT2 = Số điểm hàng SMD * Tiền 1 điểm hàng SMD * Số lượng mạch
////////
PT3= Số điểm hàng DIP* Tiền 1 điểm hàng DIP * Số lượng mạch
//////
Gía hiển thị = PT1+PT2+PT3
</textarea>
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