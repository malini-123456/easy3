<?php
require_once('connect.php');
$proyekid = $_REQUEST['uid'];

$query1 = "SELECT * FROM proyek WHERE id_proyek='$proyekid'";
$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
$row1 = mysqli_fetch_assoc($result1);
$pelangganid = $row1['id_pelanggan'];

$query1a = "SELECT * FROM pelanggan WHERE id_pelanggan='$pelangganid'";
$result1a = mysqli_query($conn, $query1a) or die(mysqli_error($conn));
$row1a = mysqli_fetch_assoc($result1a);

$query_spk = "SELECT * FROM spk WHERE id_proyek = '$proyekid'";
$result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
$row_spk = mysqli_fetch_assoc($result_spk);
$idtekkoor = $row_spk['koordinator_spk'];

$query_tekkoor = "SELECT * FROM user WHERE id_user='$idtekkoor'";
$result_tekkoor = mysqli_query($conn, $query_tekkoor) or die(mysqli_error($conn));
$row_tekkoor = mysqli_fetch_assoc($result_tekkoor);
?>


<style type="text/css">
    /* * {
    border: 1px;
} */

    th {
        height: 30px;
        color: #277ABE;
        font-size: 12px;
    }

    /* top right bottom left  */
</style>
<page backcolor="#FFFFFF" backtop="50mm" backbottom="10mm" style="font-size: 12pt"> <!-- #FEFEFE -->
    <page_header>
        <table cellspacing="0" style="width: 80%; text-align: center; font-size: 14px; margin: 25px 0 0 45px; border: 0px; color: #000000;">
            <tr>
                <td colspan="4" style="width: 100%; color: #444444; vertical-align: text-top; padding: 0px 20px 20px 0; border-width: 0px;">
                    <img style="width: 110%;" src="./images/img/header_new.png">
                </td>
            </tr>


            <tr>
                <td style="width: 10%; text-align: left; padding: 0 0 5px 0; font-weight: bold;">
                    Nomor
                </td>
                <td style="width: 2%; text-align: left; padding: 0 0 5px 0;">
                    :
                </td>
                <td style="width: 51%; text-align: left; padding: 0 0 5px 0;">
                    <?= 'ENS/SPK/' . $row1['no_proyek'] . '/' . date_format(date_create($row_spk['lastupdate_spk']), 'd.m.Y'); ?>
                </td>
                <td style="width: 37%; text-align: right; padding: 0 0 5px 0;">
                    Tabanan,
                    <?= date_format(date_create($row_spk['lastupdate_spk']), 'd F Y'); ?>
                </td>
            </tr>

            <tr style="padding: 15px 0;">
                <td style="width: 10%; text-align: left;  padding: 0 0 5px 0; font-weight: bold;">
                    Perihal
                </td>
                <td style="width: 2%; text-align: left; padding: 0 0 5px 0;">
                    :
                </td>
                <td style="width: 51%; text-align: left; padding: 0 0 5px 0;">
                    Pengambilan Data Kalibrasi
                </td>
            </tr>

            <tr>
                <td colspan="4" style="text-align: center; width: 60%">
                    <hr style="padding: 0; margin: 0;">
                    <hr style="padding: 0; margin: -13px 0 0 0; border: 0.5px;">
                </td>
            </tr>

            <tr>
                <td colspan="4" style="width: 100%; height: 10px; text-align: center; font-size: 20px; vertical-align: text-top; padding-top: -8px;">
                    <br><strong>SURAT PERINTAH KERJA (SPK)</strong>
                </td>
            </tr>
        </table>

    </page_header>
    <page_footer>
        <table style="width: 90%; margin-left: 40px; ">
            <tr>
                <td style="text-align: left; font-size: 10px; width: 80%">
                    ENS10/MM/FRM/70SPK : 01
                </td>
                <td style="text-align: right; width: 20%; font-size: 10px; ">
                    <?php
                    $timezone = time() + (60 * 60 * 8);
                    echo gmdate('d/m/Y - H:i:s', $timezone);
                    ?>
                </td>
            </tr>
        </table>
    </page_footer>


    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 80%; font-size: 14px; padding: 75px 0px 0 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td colspan="3" style="width: 100%; text-align: left; padding-bottom: 5px; ">
                Yang bertanda tangan dibawah ini saya,
            </td>
        </tr>
        <tr>
            <td style="width: 35%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Nama
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 63%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                Made Agus Yudiastana, S.T.
            </td>
        </tr>
        <tr>
            <td style="width: 35%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Jabatan
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 63%; text-align: left; padding-bottom: 5px;">
                Direktur
            </td>
        </tr>
        <tr>
            <td style="width: 35%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Nama Laboratorium
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 63%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                PT Elektromedika Instrumen Tera Nusantara (Einsten)
            </td>
        </tr>
        <tr>
            <td style="width: 35%; text-align: left; padding-bottom: 10px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Alamat Laboratorium
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :
            </td>
            <td style="width: 63%; text-align: left; padding-bottom: 10px;">
                Jalan Batukaru, Tuakilang, Tabanan, Bali
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td colspan="2" style="width: 100%; text-align: left; padding-bottom: 10px;">
                Dengan ini menunjuk / memberikan tugas kepada :
            </td>
        </tr>

        <tr>
            <td style="width: 55%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                1. <?= $row_tekkoor['nama_user']; ?><br>
            </td>
            <td style="width: 40%; text-align: left; padding-bottom: 5px;">
                Koordinator Teknis<br>
            </td>
        </tr>

        <!-- <tr style="padding: 15px 0;">
            <td style="width: 50%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                2. Pelaksana Teknis<br>
            </td>
            <td style="width: 40%; text-align: left; padding-bottom: 10px;">
                <br>
            </td>
        </tr> -->

        <?php
        $dataTek = $row_spk['pelaksana_spk'];
        $dataTekArr = explode(';', $dataTek);

        $j = count($dataTekArr);
        if ($j > 0) {
            for ($i = 0; $i < $j - 1; $i++) {
                $idTekPel = $dataTekArr[$i];

                $query_tekpel = "SELECT * FROM user WHERE id_user='$idTekPel'";
                $result_tekpel = mysqli_query($conn, $query_tekpel) or die(mysqli_error($conn));
                $row_tekpel = mysqli_fetch_assoc($result_tekpel);
        ?>
                <tr style="padding: 5px 0;">
                    <td style="width: 55%; text-align: left;  padding-bottom: 5px; font-weight: bold;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?= $i + 2 . '. ' . $row_tekpel['nama_user']; ?><br>
                    </td>
                    <td style="width: 40%; text-align: left; padding-bottom: 5px;">
                        Petugas Kalibrasi<br>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>


    <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Untuk melakukan pengambilan data kalibrasi peralatan medis di <b><?= $row1a['nama_pelanggan'] . ','; ?></b>
            </td>
        </tr>

        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                yang beralamat di <i><?= $row1a['alamat_pelanggan'] . ','; ?></i>
            </td>
        </tr>

        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Terhitung mulai pada tanggal
                <b>
                    <?php
                    if ($row_spk['stgl_spk'] === $row_spk['etgl_spk']) {
                        echo date('d F Y', strtotime($row_spk['stgl_spk']));
                    } else {
                        echo date('d F', strtotime($row_spk['stgl_spk'])) . ' - ' . date('d F Y', strtotime($row_spk['etgl_spk']));
                    }
                    ?>
                </b>
            </td>
        </tr>
    </table>

    <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Demikian Surat Perintah Kerja ini diberikan agar dapat dilaksanakan dengan penuh tanggungjawab.
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; text-align: left; font-size: 15px; color: #000000; padding-top: 35px; margin-left: 400px;">
            <tr>
                <td style="width: 75%;">
                    PT Elektromedika Instrumen Tera Nusantara
                    <br>
                    &nbsp;&nbsp;&nbsp;
                    <img style="width: 30%;" src="./images/img/ttd_putu_new.jpg">
                    <br>
                    (Made Agus Yudiastana, S.T.)
                    <br>
                    <b>Direktur</b>
                </td>
            </tr>
        </table>
    </div>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->
</page>

<?php
function fhari($nday)
{
    $hari = '';
    if ($nday == 0) {
        $hari = 'Minggu';
    } else if ($nday == 1) {
        $hari = 'Senin';
    } else if ($nday == 2) {
        $hari = 'Selasa';
    } else if ($nday == 3) {
        $hari = 'Rabu';
    } else if ($nday == 4) {
        $hari = 'Kamis';
    } else if ($nday == 5) {
        $hari = 'Jumat';
    } else if ($nday == 6) {
        $hari = 'Sabtu';
    }
    return $hari;
}
?>