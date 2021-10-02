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
    $phonex = get_option('phonex', "");

    if (isset($_POST['phonex']) && $_POST['phonex'] != '') {
        $phonex = $_POST['phonex'];
        update_option('phonex', $phonex, 'yes');
    }

    $so_luong_setup = get_option('so_luong_setup', "");

    if (isset($_POST['so_luong_setup']) && $_POST['so_luong_setup'] != '') {
        $so_luong_setup = $_POST['so_luong_setup'];
        update_option('so_luong_setup', $so_luong_setup, 'yes');
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
                    Phone:
                    <input type="text" name="phonex" value="<?php echo $phonex ?>" />
                </label>
                <label>
                    Số lượng (cách nhau bởi dấu ","):
                    <input type="text" name="so_luong_setup" value="<?php echo $so_luong_setup ?>" />
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