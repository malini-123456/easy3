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
    height: 20px;
    color: #0e509e;
    font-size: 10px;
}

td {
    height: 10px;
    padding: 0px;
}

/* top right bottom left  */
</style>
<page backcolor="#FFFFFF" backtop="0mm" backbottom="0mm" style="font-size: 10px;">
    <!-- #FEFEFE -->


    <?php
        for ($i = 0; $i < 6; $i++) {
        ?>
    <table id="myTable" border="0.0px" cellspacing="0"
        style="width: 100%; text-align: center; font-size: 10px; padding-top: 0px; margin-left: 2px; color: #000000; ">
        <colgroup>
            <col style="width: 15%; padding: 2px 0px;">
            <col style="width: 4%; padding: 2px 0px;">
            <col style="width: 1%; padding: 2px 0px;">

            <col style="width: 15%; padding: 2px 0px;">
            <col style="width: 4%; padding: 2px 0px;">
            <col style="width: 1%; padding: 2px 0px;">

            <col style="width: 15%; padding: 2px 0px;">
            <col style="width: 4%; padding: 2px 0px;">
            <col style="width: 1%; padding: 2px 0px;">

            <col style="width: 15%; padding: 2px 0px;">
            <col style="width: 4%; padding: 2px 0px;">
            <col style="width: 1%; padding: 2px 0px;">

            <col style="width: 15%; padding: 2px 0px;">
            <col style="width: 4%; padding: 2px 0px;">
            <col style="width: 1%; padding: 2px 0px;">
        </colgroup>

        <?php
                        $angka1 = sprintf("%'.05d", $code_angka++);
                        $angka2 = sprintf("%'.05d", $code_angka++);
                        $angka3 = sprintf("%'.05d", $code_angka++);
                        $angka4 = sprintf("%'.05d", $code_angka++);
                        $angka5 = sprintf("%'.05d", $code_angka++);
                        ?>

        <?php
                        if ($status == 'hijau') {
                        ?>
        <tr>
            <td colspan="2" style="border: 0.05px;width: 19%; background-color: #009944; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan=" 2" style="border: 0.05px;width: 19%; background-color: #009944; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA
                    INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; background-color: #009944; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; background-color: #009944; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; background-color: #009944; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        } else {
                        ?>
        <tr>
            <td colspan="2" style="border: 0.05px;width: 19%; background-color: #d42225; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan=" 2" style="border: 0.05px;width: 19%; background-color: #d42225; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA
                    INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; background-color: #d42225; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; background-color: #d42225; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; background-color: #d42225; color: #ffffff;"><b>PT
                    ELEKTROMEDIKA INSTRUMEN
                    TERA NUSANTARA</b></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        }
                        ?>

        <?php
                        if ($status == 'hijau') {
                        ?>
        <tr>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/H/H<?= $angka1; ?>.png">
            </td>
            <td style="width: 1%; border: 0px;"></td>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/H/H<?= $angka2; ?>.png"></td>
            <td style="width: 1%; border: 0px;"></td>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/H/H<?= $angka3; ?>.png"></td>
            <td style="width: 1%; border: 0px;"></td>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/H/H<?= $angka4; ?>.png"></td>
            <td style="width: 1%; border: 0px;"></td>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/H/H<?= $angka5; ?>.png"></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        } else {
                        ?>
        <tr>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/M/M<?= $angka1; ?>.png">
            </td>
            <td style="width: 1%; border: 0px;"></td>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/M/M<?= $angka2; ?>.png"></td>
            <td style="width: 1%; border: 0px;"></td>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/M/M<?= $angka3; ?>.png"></td>
            <td style="width: 1%; border: 0px;"></td>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/M/M<?= $angka4; ?>.png"></td>
            <td style="width: 1%; border: 0px;"></td>
            <td rowspan="3" style="border: 0.05px;width: 14%;"><img style="width: 90%;"
                    src="./images/img/cek_isi_3.png"></td>
            <td style="border: 0.05px;width: 5%;"><img style=" width: 99%;"
                    src="./images/img/stiker/M/M<?= $angka5; ?>.png"></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        }
                        ?>

        <?php
                        if ($status == 'hijau') {
                        ?>
        <tr>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>H<?= $angka1; ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>H<?= $angka2; ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>H<?= $angka3; ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>H<?= $angka4; ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>H<?= $angka5; ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        } else {
                        ?>
        <tr>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>M<?= $angka1 ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>M<?= $angka2 ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>M<?= $angka3 ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>M<?= $angka4 ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px;"><b>M<?= $angka5 ?></b></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        }
                        ?>

        <?php
                        if ($status == 'hijau') {
                        ?>
        <tr>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #009944; color: #ffffff;"><b>LAIK
                    PAKAI</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #009944; color: #ffffff;"><b>LAIK
                    PAKAI</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #009944; color: #ffffff;"><b>LAIK
                    PAKAI</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #009944; color: #ffffff;"><b>LAIK
                    PAKAI</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #009944; color: #ffffff;"><b>LAIK
                    PAKAI</b></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        } else {
                        ?>
        <tr>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #d42225; color: #ffffff;"><b>TIDAK
                    LAIK</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #d42225; color: #ffffff;"><b>TIDAK
                    LAIK</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #d42225; color: #ffffff;"><b>TIDAK
                    LAIK</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #d42225; color: #ffffff;"><b>TIDAK
                    LAIK</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td style="border: 0.05px;width: 5%; height: 5px; background-color: #d42225; color: #ffffff;"><b>TIDAK
                    LAIK</b></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        }
                        ?>

        <?php
                        if ($status == 'hijau') {
                        ?>
        <tr>
            <td colspan="2" style="border: 0.05px; width: 19%; font-size: 8px;"><b>DINYATAKAN AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; font-size: 8px;"><b>DINYATAKAN AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; font-size: 8px;"><b>DINYATAKAN AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; font-size: 8px;"><b>DINYATAKAN AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; font-size: 8px;"><b>DINYATAKAN AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        } else {
                        ?>
        <tr>
            <td colspan="2" style="border: 0.05px; width: 19%; font-size: 7.5px;"><b>DINYATAKAN TIDAK AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; font-size: 7.5px;"><b>DINYATAKAN TIDAK AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; font-size: 7.5px;"><b>DINYATAKAN TIDAK AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; font-size: 7.5px;"><b>DINYATAKAN TIDAK AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
            <td colspan="2" style="border: 0.05px;width: 19%; font-size: 7.5px;"><b>DINYATAKAN TIDAK AMAN
                    BAGI PEKERJA,
                    PENDERITA, DAN LINGKUNGAN</b></td>
            <td style="width: 1%; border: 0px;"></td>
        </tr>
        <?php
                        }
                        ?>


    </table>

    <?php
                if ($i < 5) {
                ?>
    <p></p>
    <?php
                }
                ?>
    <?php
        }
        ?>

    <!-- /////////////////////////////////////////////////////////////////// -->

</page>