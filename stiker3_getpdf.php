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
        td {
                height: 3mm;
                padding: 0px;
                margin: 0px;
        }

        /* top right bottom left  */
</style>
<page backcolor="#FFFFFF" backtop="4mm" backbottom="0mm" style="font-size: 1.6mm;">
        <!-- #FEFEFE -->

        <table id="myTable" border="0px" cellspacing="0"
                style="width: 100%; text-align: center; padding: 0px; margin: 0px; padding-left: 1.5mm; color: #000000;">
                <colgroup>
                        <!-- ============================ 1 ========================== -->
                        <col style="width: 43mm;">
                        <col style="width: 16mm;">
                        <col style="width: 1mm;">
                </colgroup>

                <?php
                $angka1 = sprintf("%'.05d", $code_angka++);
                ?>

                <tr>
                        <!-- ============================ 1 ========================== -->
                        <td colspan="3" style="width: 60mm; background-color: #d42225; color: #ffffff; font-size: 2mm;"><b>PT
                                        ELEKTROMEDIKA
                                        INSTRUMEN TERA NUSANTARA</b></td>
                </tr>

                <tr>
                        <!-- ============================ 1 ========================== -->
                        <td rowspan="4" style="width: 43mm; padding-left: 0.7mm;"><img style="width: 98%;"
                                        src="./images/img/cek_isi_3.png"></td>
                        <td style="width: 16mm; padding-top: 1.5mm;"><img style=" width: 16mm;"
                                        src="./images/img/stiker/M/M<?= $angka1; ?>.png"></td>
                        <td style="width: 1mm;"></td>
                </tr>

                <tr>
                        <!-- ============================ 1 ========================== -->
                        <td style="width: 16mm;"><b>M<?= $angka1; ?></b></td>
                        <td style="width: 1mm;"></td>
                </tr>

                <tr>
                        <!-- ============================ 1 ========================== -->
                        <td style="width: 16mm; background-color: #d42225; color: #ffffff;">
                                <b>TIDAK LAIK</b>
                        </td>
                        <td style="width: 1mm;"></td>
                </tr>

                <tr>
                        <!-- ============================ 1 ========================== -->
                        <td style="width: 16mm;"></td>
                        <td style="width: 1mm;"></td>
                </tr>

                <tr>
                        <!-- ============================ 1 ========================== -->
                        <td colspan="3" style="width: 60mm; border-top:0.015mm"><b>DINYATAKAN TIDAK AMAN BAGI PEKERJA, PENDERITA,
                                        DAN
                                        LINGKUNGAN</b></td>
                </tr>
        </table>


        <!-- /////////////////////////////////////////////////////////////////// -->

</page>