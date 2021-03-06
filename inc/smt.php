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


    <h2>C??i ?????t b??o gi?? SMT Assembly</h2>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">C??i ?????t chung</button>
    </div>

    <div id="London" class="tabcontent">
        <form action="#" method="post">
            <div class="content">
                <h3>C??i ?????t chung (?????ng)</h3>
                <label>
                    Ph?? setup 1 (?????ng):
                    <input type="text" name="setup_1" value="<?php echo $setup_1 ?>" />
                </label>
                <label>
                    Ph?? setup 2 (?????ng):
                    <input type="text" name="setup_2" value="<?php echo $setup_2 ?>" />
                </label>
                <label>
                    Ph?? setup 3 (?????ng):
                    <input type="text" name="setup_3" value="<?php echo $setup_3 ?>" />
                </label>
                <label>
                    Ph?? setup 4 (?????ng):
                    <input type="text" name="setup_4" value="<?php echo $setup_4 ?>" />
                </label>
                <label>
                    Ti???n 1 ??i???m h??ng SMD (?????ng):
                    <input type="text" name="tien_smd" value="<?php echo $tien_smd ?>" />
                </label>
                <label>
                    Ti???n 1 ??i???m h??ng DIP (?????ng):
                    <input type="text" name="tien_dip" value="<?php echo $tien_dip ?>" />
                </label>
                <label>
                    C??ng th???c kh???i l?????ng ():
                    <textarea style="width: 400px;" disabled type="text">PT1 =  N???u ?? T???ng linh ki???n d??n < 15
PT1 = Ph?? setup 1
PT1 =  N???u ?? T???ng linh ki???n d??n >= 15
PT1 = Ph?? setup 2
PT1 =  N???u ?? T???ng linh ki???n d??n >=30
PT1 = Ph?? setup 3
PT1 =  N???u ?? T???ng linh ki???n d??n > = 50
PT1 = Ph?? setup 4
/////////
PT2 = S??? ??i???m h??ng SMD * Ti???n 1 ??i???m h??ng SMD * S??? l?????ng m???ch
////////
PT3= S??? ??i???m h??ng DIP* Ti???n 1 ??i???m h??ng DIP * S??? l?????ng m???ch
//////
G??a hi???n th??? = PT1+PT2+PT3
</textarea>
                </label>

            </div>

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