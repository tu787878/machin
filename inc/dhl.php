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

    $ty_le_pcb = get_option('ty_le_pcb', "");
    $ty_le_stencil = get_option('ty_le_stencil', "");
    $gia_mac_dinh = get_option('gia_mac_dinh', "");

    if (isset($_POST['ty_le_pcb']) && $_POST['ty_le_pcb'] != '') {
        $ty_le_pcb = $_POST['ty_le_pcb'];
        update_option('ty_le_pcb', $ty_le_pcb, 'yes');
    }

    if (isset($_POST['ty_le_stencil']) && $_POST['ty_le_stencil'] != '') {
        $ty_le_stencil = $_POST['ty_le_stencil'];
        update_option('ty_le_stencil', $ty_le_stencil, 'yes');
    }

    if (isset($_POST['gia_mac_dinh']) && $_POST['gia_mac_dinh'] != '') {
        $gia_mac_dinh = $_POST['gia_mac_dinh'];
        update_option('gia_mac_dinh', $gia_mac_dinh, 'yes');
    }

    ?>


    <h2>Cài đặt báo giá SMT Assembly</h2>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">Cài đặt chung</button>
    </div>

    <div id="London" class="tabcontent">
        <form action="#" method="post">
            <div class="content">
                <h3>Cài đặt chung</h3>
                <label>
                Tỷ lệ PCB:
                    <input type="text" name="ty_le_pcb" value="<?php echo $ty_le_pcb ?>" />
                </label>
                <label>
                Tỷ lệ Stencil:
                    <input type="text" name="ty_le_stencil" value="<?php echo $ty_le_stencil ?>" />
                </label>
                <label>
                Gía mặc định:
                    <input type="text" name="gia_mac_dinh" value="<?php echo $gia_mac_dinh ?>" />
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