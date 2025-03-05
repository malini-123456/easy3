<?php
require_once('connect.php');
$code = $_REQUEST['kode'];
$code_huruf = substr($code, 0, 1);
$code_angka = (int) substr($code, 1, 5);
$status = 'merah';

if ($code_huruf == 'H' || $code_huruf == 'h') {
        $status = 'hijau';
}
?>

<style type="text/css">
        th {
                height: 10px;
                color: #0e509e;
                font-size: 9px;
        }

        td {
                height: 10px;
                padding: 0px;
                margin: 0px;
        }

        /* top right bottom left  */
</style>
<page backcolor="#FFFFFF" backtop="9mm" backbottom="6mm" style="font-size: 9px;">
        <!-- #FEFEFE -->

        <?php
        for ($i = 0; $i < 7; $i++) {
        ?>

                <table id="myTable" border="0.0px" cellspacing="0"
                        style="width: 80%; text-align: center; font-size: 9px; padding-top: 0px; margin-left: 20px; color: #000000; ">
                        <colgroup>
                                <!-- ============================ 1 ========================== -->
                                <col style="width: 12%; padding: 2px 0px; margin-left: 43px;">
                                <col style="width: 5%; padding: 2px 0px;">
                                <col style="width: 1%;">
                                <col style="width: 2%; padding: 2px 0px; padding-right: 40px;">
                                <!-- ============================ 2 ========================== -->
                                <col style="width: 12%; padding: 2px 0px; margin-left: 43px;">
                                <col style="width: 5%; padding: 2px 0px;">
                                <col style="width: 1%;">
                                <col style="width: 2%; padding: 2px 0px; padding-right: 40px;">
                                <!-- ============================ 3 ========================== -->
                                <col style="width: 12%; padding: 2px 0px; margin-left: 43px;">
                                <col style="width: 5%; padding: 2px 0px;">
                                <col style="width: 1%;">
                                <col style="width: 2%; padding: 2px 0px; padding-right: 40px;">
                                <!-- ============================ 4 ========================== -->
                                <col style="width: 12%; padding: 2px 0px; margin-left: 43px;">
                                <col style="width: 5%; padding: 2px 0px;">
                                <col style="width: 1%;">
                                <col style="width: 2%; padding: 2px 0px; padding-right: 40px;">
                                <!-- ============================ 5 ========================== -->
                                <col style="width: 12%; padding: 2px 0px; margin-left: 43px;">
                                <col style="width: 5%; padding: 2px 0px;">
                                <col style="width: 1%;">
                                <col style="width: 2%; padding: 2px 0px; padding-right: 40px;">
                                <!-- ============================ 6 ========================== -->
                                <col style="width: 12%; padding: 2px 0px; margin-left: 43px;">
                                <col style="width: 5%; padding: 2px 0px;">
                                <col style="width: 1%;">
                                <col style="width: 2%; padding: 2px 0px; padding-right: 40px;">
                        </colgroup>

                        <?php
                        $angka1 = sprintf("%'.05d", $code_angka++);
                        $angka2 = sprintf("%'.05d", $code_angka++);
                        $angka3 = sprintf("%'.05d", $code_angka++);
                        $angka4 = sprintf("%'.05d", $code_angka++);
                        $angka5 = sprintf("%'.05d", $code_angka++);
                        $angka6 = sprintf("%'.05d", $code_angka++);
                        ?>


                        <?php
                        if ($status == 'hijau') {
                        ?>

                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #009944; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #009944; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #009944; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #009944; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #009944; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #009944; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                </tr>
                        <?php
                        } else {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #d42225; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #d42225; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #d42225; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #d42225; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #d42225; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 1px 0.5px 0px 0.5px; border-top-left-radius: 10px; border-top-right-radius: 10px; width: 17%; background-color: #d42225; color: #ffffff;">
                                                <b>PT
                                                        ELEKTROMEDIKA INSTRUMEN
                                                        TERA NUSANTARA</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;"></td>
                                </tr>
                        <?php
                        }
                        ?>

                        <?php
                        if ($status == 'hijau') {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/H/H<?= $angka1; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/H/H<?= $angka2; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/H/H<?= $angka3; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/H/H<?= $angka4; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/H/H<?= $angka5; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/H/H<?= $angka6; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                </tr>
                        <?php
                        } else {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/M/M<?= $angka1; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/M/M<?= $angka2; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/M/M<?= $angka3; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/M/M<?= $angka4; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/M/M<?= $angka5; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td rowspan="4" style="border-left: 0.5px; border-right: 0px; width: 12%; margin: 0; padding: 0;">
                                                <img style="width: 95%;" src="./images/img/cek_isi_3.png">
                                        </td>
                                        <td
                                                style="margin: 0; padding: 0; padding-top: 1px; border-left: 0px; border-right: 0px; border-top: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; width: 5%;">
                                                <img style=" width: 100%;" src="./images/img/stiker/M/M<?= $angka6; ?>.png">
                                        </td>
                                        <td style="width: 1%; border-right: 0.5px;"></td>
                                        <td style="width: 2%; border: 0px; padding-right: 10px;"></td>
                                </tr>
                        <?php
                        }
                        ?>


                        <?php
                        if ($status == 'hijau') {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>H<?= $angka1; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>H<?= $angka2; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>H<?= $angka3; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>H<?= $angka4; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>H<?= $angka5; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>H<?= $angka6; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                </tr>
                        <?php
                        } else {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>M<?= $angka1; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>M<?= $angka2; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>M<?= $angka3; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>M<?= $angka4; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>M<?= $angka5; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px; margin: 0; padding: 0; border: 0.05px; border-left: 0px; border-right: 0px; width: 5%; height: 5px;">
                                                <b>M<?= $angka6; ?></b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                </tr>
                        <?php
                        }
                        ?>


                        <?php
                        if ($status == 'hijau') {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #009944; color: #ffffff;">
                                                <b>LAIK PAKAI</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #009944; color: #ffffff;">
                                                <b>LAIK PAKAI</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #009944; color: #ffffff;">
                                                <b>LAIK PAKAI</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #009944; color: #ffffff;">
                                                <b>LAIK PAKAI</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #009944; color: #ffffff;">
                                                <b>LAIK PAKAI</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #009944; color: #ffffff;">
                                                <b>LAIK PAKAI</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                </tr>
                        <?php
                        } else {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #d42225; color: #ffffff;">
                                                <b>TIDAK LAIK</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #d42225; color: #ffffff;">
                                                <b>TIDAK LAIK</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #d42225; color: #ffffff;">
                                                <b>TIDAK LAIK</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #d42225; color: #ffffff;">
                                                <b>TIDAK LAIK</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #d42225; color: #ffffff;">
                                                <b>TIDAK LAIK</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td
                                                style="margin: 0; padding: 0; font-size: 7px; height: 5px;  border: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; width: 5%; height: 5px; background-color: #d42225; color: #ffffff;">
                                                <b>TIDAK LAIK</b>
                                        </td>
                                        <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                        <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                </tr>
                        <?php
                        }
                        ?>

                        <tr style="margin: 0; padding: 0;">
                                <!-- ============================ 1 ========================== -->
                                <td style="margin: 0; padding: 0; width: 5%; height: 5px; border-right: 0px;"></td>
                                <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                <!-- ============================ 2 ========================== -->
                                <td style="margin: 0; padding: 0; width: 5%; height: 5px; border-right: 0px;"></td>
                                <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                <!-- ============================ 3 ========================== -->
                                <td style="margin: 0; padding: 0; width: 5%; height: 5px; border-right: 0px;"></td>
                                <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                <!-- ============================ 4 ========================== -->
                                <td style="margin: 0; padding: 0; width: 5%; height: 5px; border-right: 0px;"></td>
                                <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                <!-- ============================ 5 ========================== -->
                                <td style="margin: 0; padding: 0; width: 5%; height: 5px; border-right: 0px;"></td>
                                <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                                <!-- ============================ 6 ========================== -->
                                <td style="margin: 0; padding: 0; width: 5%; height: 5px; border-right: 0px;"></td>
                                <td style="margin: 0; padding: 0; width: 1%; border-right: 0.5px;"></td>
                                <td style="margin: 0; padding: 0; width: 2%; border: 0px; padding-right: 10px;"></td>
                        </tr>

                        <?php
                        if ($status == 'hijau') {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 7px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 7px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 7px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 7px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 7px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 7px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                </tr>
                        <?php
                        } else {
                        ?>
                                <tr style="margin: 0; padding: 0;">
                                        <!-- ============================ 1 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 6px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN TIDAK AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 2 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 6px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN TIDAK AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 3 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 6px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN TIDAK AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 4 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 6px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN TIDAK AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 5 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 6px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN TIDAK AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                        <!-- ============================ 6 ========================== -->
                                        <td colspan="3"
                                                style="margin: 0; padding: 0; border: 0.05px; font-size: 6px; border-left: 0.5px; border-bottom: 0.5px; border-right: 0.5px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 17%;">
                                                <b>DINYATAKAN TIDAK AMAN
                                                        BAGI PEKERJA,
                                                        PENDERITA, DAN LINGKUNGAN</b>
                                        </td>
                                        <td style="width: 2%; border: 0px;  padding-right: 10px;"></td>
                                </tr>
                        <?php
                        }
                        ?>
                </table>


                <?php
                if ($i < 6) {
                ?>
                        <p style="margin: 13px 0px;"></p>
                <?php
                }
                ?>
        <?php
        }
        ?>

        <!-- /////////////////////////////////////////////////////////////////// -->

</page>