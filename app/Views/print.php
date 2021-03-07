<!-- DEBUG-VIEW START 1 APPPATH/Config/../Views/invoice.php -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <script type="text/javascript" id="debugbar_loader" data-time="1615085714" src="http://localhost:8080/?debugbar"></script>
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <style type="text/css" id="debugbar_dynamic_style"></style>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Print Invoice</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 14px/1.4 Helvetica, Arial, sans-serif;
        }

        #page-wrap {
            width: 800px;
            margin: 0 auto;
        }

        textarea {
            border: 0;
            font: 14px Helvetica, Arial, sans-serif;
            overflow: hidden;
            resize: none;
        }

        table {
            border-collapse: collapse;
        }

        table td,
        table th {
            border: 1px solid black;
            padding: 5px;
        }

        #header {
            height: 15px;
            width: 100%;
            margin: 20px 0;
            background: #222;
            text-align: center;
            color: white;
            font: bold 15px Helvetica, Sans-Serif;
            text-decoration: uppercase;
            letter-spacing: 20px;
            padding: 8px 0px;
        }

        #address {
            width: 250px;
            height: 150px;
            float: left;
        }

        #customer {
            overflow: hidden;
        }

        #logo {
            text-align: right;
            float: right;
            position: relative;
            margin-top: 25px;
            border: 1px solid #fff;
            max-width: 540px;
            overflow: hidden;
        }

        #customer-title {
            font-size: 20px;
            font-weight: bold;
            float: left;
        }

        #meta {
            margin-top: 1px;
            width: 100%;
            float: right;
        }

        #meta td {
            text-align: right;
        }

        #meta td.meta-head {
            text-align: left;
            background: #eee;
        }

        #meta td textarea {
            width: 100%;
            height: 20px;
            text-align: right;
        }

        #items {
            clear: both;
            width: 100%;
            margin: 30px 0 0 0;
            border: 1px solid black;
        }

        #items th {
            background: #eee;
        }

        #items textarea {
            width: 80px;
            height: 50px;
        }

        #items tr.item-row td {
            vertical-align: top;
        }

        #items td.description {
            width: 300px;
        }

        #items td.item-name {
            width: 175px;
        }

        #items td.description textarea,
        #items td.item-name textarea {
            width: 100%;
        }

        #items td.total-line {
            border-right: 0;
            text-align: right;
        }

        #items td.total-value {
            border-left: 0;
            padding: 10px;
        }

        #items td.total-value textarea {
            height: 20px;
            background: none;
        }

        #items td.balance {
            background: #eee;
        }

        #items td.blank {
            border: 0;
        }

        #terms {
            text-align: center;
            margin: 20px 0 0 0;
        }

        #terms h5 {
            text-transform: uppercase;
            font: 13px Helvetica, Sans-Serif;
            letter-spacing: 10px;
            border-bottom: 1px solid black;
            padding: 0 0 8px 0;
            margin: 0 0 8px 0;
        }

        #terms textarea {
            width: 100%;
            text-align: center;
        }



        .delete-wpr {
            position: relative;
        }

        .delete {
            display: block;
            color: #000;
            text-decoration: none;
            position: absolute;
            background: #EEEEEE;
            font-weight: bold;
            padding: 0px 3px;
            border: 1px solid;
            top: -6px;
            left: -22px;
            font-family: Verdana;
            font-size: 12px;
        }

        /* Extra CSS for Print Button*/
        .button {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            overflow: hidden;
            margin-top: 20px;
            padding: 12px 12px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: all 60ms ease-in-out;
            transition: all 60ms ease-in-out;
            text-align: center;
            white-space: nowrap;
            text-decoration: none !important;

            color: #fff;
            border: 0 none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.3;
            -webkit-appearance: none;
            -moz-appearance: none;

            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 160px;
            -ms-flex: 0 0 160px;
            flex: 0 0 160px;
        }

        .button:hover {
            -webkit-transition: all 60ms ease;
            transition: all 60ms ease;
            opacity: .85;
        }

        .button:active {
            -webkit-transition: all 60ms ease;
            transition: all 60ms ease;
            opacity: .75;
        }

        .button:focus {
            outline: 1px dotted #959595;
            outline-offset: -4px;
        }

        .button.-regular {
            color: #202129;
            background-color: #edeeee;
        }

        .button.-regular:hover {
            color: #202129;
            background-color: #e1e2e2;
            opacity: 1;
        }

        .button.-regular:active {
            background-color: #d5d6d6;
            opacity: 1;
        }

        .button.-dark {
            color: #FFFFFF;
            background: #333030;
        }

        .button.-dark:focus {
            outline: 1px dotted white;
            outline-offset: -4px;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }
    </style>

</head>

<body>

    <div id="page-wrap">
        <table width="100%">
            <tbody>
                <tr>
                    <td style="border: 0;  text-align: left" width="62%">
                        <p>

                            <br><br><span style="font-size: 18px; color: #2f4f4f"><strong>No. Invoice : </strong>0091</span>
                        </p>
                    </td>
                    <!-- <td style="border: 0;  text-align: right" width="62%">
                        <div id="logo"><span style="font-weight: bolder;">PT. Yasmin Amanah Media</span><br>
                            <p>Website :&nbsp;<a href="https://yam.net.id/" style="color: rgb(0, 86, 179); text-decoration-line: underline; background-color: rgb(255, 255, 255);">https://yam.net.id</a><br>E-Mail : finance@yam.net.id</p>
                        </div>
                    </td> -->
                </tr>



            </tbody>
        </table>

        <hr>
        <br>

        <div style="clear:both"></div>

        <div id="customer">

            <table class="table">
                <tbody>
                    <tr>
                        <td colspan="3" style="border: 0px; font-weight:bold">Nama Perusahaan</td>
                        <td style="width:40%;border: 0px;">: INA</td>
                        <td style="border: 0px; font-weight:bold">No</td>
                        <td style="border: 0px;">2021</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border: 0px; font-weight:bold">Alamat</td>
                        <td style="border: 0px;">: Indonesia</td>
                        <td style="border: 0px;font-weight:bold">No. Polisi</td>
                        <td style="border: 0px;">Z2021</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border: 0px; font-weight:bold">Telephone /Fax</td>
                        <td style="border: 0px;">: 02831945</td>
                        <td style="border: 0px; font-weight:bold">Tanggal Kirim</td>
                        <td style="border: 0px;"><?= date('D M Y') ?></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <table id="items" style="1px solid black;">

            <tbody>
                <tr>
                    <th>No.</th>
                    <th>No. Meter</th>
                    <th>Meter Akhir</th>
                    <th>Jumlah dalam m<sup>3</sup></th>
                    <th>Keterangan</th>
                </tr>



                <tr class="item-row" style="text-align: center;">
                    <td>10</td>
                    <td>600021.0</td>
                    <td>600029.0</td>
                    <td>8</td>
                    <td>Air Bersih</td>
                </tr>


            </tbody>
        </table>
        <br>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="3" style="border: 0px; font-weight:bold">Tanggal Terima</td>
                    <td style="width:50%;border: 0px;">: INA</td>
                    <td style="border: 0px;"></td>
                    <td style="border: 0px; font-weight:bold">Nama Operator</td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 0px; font-weight:bold">Jam Terima</td>
                    <td style="border: 0px;">: Indonesia</td>
                    <td style="border: 0px;"></td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 0px; font-weight:bold">Tanda Terima</td>
                    <td style="border-top: 0px;border-bottom: 1px solid black;border-right: 0px;border-left: 0px;">:</td>
                    <td style="border: 0px; width:10%"></td>
                    <td style="border-top: 0px;border-bottom: 1px solid black;border-right: 0px;border-left: 0px;">:</td>
                </tr>
            </tbody>
        </table>

        <br><br>
        <p>Keterangan :</p>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="3" style="border: 0px; font-weight:bold; font-size:small; padding:0px;">Lembar 1 Warna Putih (Asli)</td>
                    <td style="width:40%;border: 0px; padding:0px; font-size:small;">&nbsp; : Finance (Taghinan)</td>
                    <td style="border: 0px;padding:0px;"></td>
                    <td style="border: 0px;padding:0px; font-weight:bold;font-size:small;">Meter Awal :</td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 0px; font-weight:bold; font-size:small; padding:0px;">Lembar 1 Warna Pink (Copy)</td>
                    <td style="border: 0px; padding:0px;font-size:small;">&nbsp; : Angkutan</td>
                    <td style="border: 0px;padding:0px;"></td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 0px; font-weight:bold; font-size:small; padding:0px;">Lembar 1 Warna Kuning (Copy)</td>
                    <td style="border: 0px; padding:0px;font-size:small;">&nbsp; : Customer</td>
                    <td style="border: 0px;padding:0px;"></td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 0px; font-weight:bold; font-size:small; padding:0px;">Lembar 1 Warna Hijau (Copy)</td>
                    <td style="border: 0px; padding:0px;font-size:small;">&nbsp; : Arsip</td>
                    <td style="border: 0px; padding:0px;width:10%"></td>
                    <td style="border: 0px;padding:0px; font-weight:bold;font-size:small;">Meter Akhir :</td>
                </tr>
            </tbody>
        </table>

        <button class="button -dark center no-print" onclick="window.print();">Click Here to Print</button>
    </div>



</body>

</html>
<!-- DEBUG-VIEW ENDED 1 APPPATH/Config/../Views/invoice.php -->