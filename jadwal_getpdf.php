<?php
require_once('connect.php');
$proyekid = $_REQUEST['uid'];

$query1 = "SELECT * FROM proyek WHERE id_proyek='$proyekid'";
$result1 = mysqli_query($conn, $query1) or die(mysql_error());
$row1 = mysqli_fetch_assoc($result1);
$pelangganid = $row1['id_pelanggan'];

$query1a = "SELECT * FROM pelanggan WHERE id_pelanggan='$pelangganid'";
$result1a = mysqli_query($conn, $query1a) or die(mysql_error());
$row1a = mysqli_fetch_assoc($result1a);

$query_kegiatan = "SELECT MAX(lastupdate_kegiatan) AS lastupdate_kegiatan FROM kegiatan WHERE id_proyek = '$proyekid'";
$result_kegiatan = mysqli_query($conn, $query_kegiatan) or die(mysqli_error($conn));
$row_kegiatan = mysqli_fetch_assoc($result_kegiatan);

$query_jadwalD = "SELECT MIN(stgl_kegiatan) AS stgl_kegiatan FROM kegiatan WHERE id_proyek = '$proyekid'";
$result_jadwalD = mysqli_query($conn, $query_jadwalD) or die(mysqli_error($conn));
$row_jadwalD = mysqli_fetch_assoc($result_jadwalD);

$query_jadwalT = "SELECT MIN(sjam_kegiatan) AS sjam_kegiatan FROM kegiatan WHERE id_proyek = '$proyekid'";
$result_jadwalT = mysqli_query($conn, $query_jadwalT) or die(mysqli_error($conn));
$row_jadwalT = mysqli_fetch_assoc($result_jadwalT);

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
<page backcolor="#FEFEFE" backtop="50mm" backbottom="10mm" style="font-size: 12pt">
    <page_header>
        <table cellspacing="0"
            style="width: 80%; text-align: center; font-size: 12px; margin: 25px 0 0 70px; border: 0px; color: #526484;">
            <tr>
                <td
                    style="width: 30%; color: #444444; vertical-align: text-top; padding: 0px 30px 0 0; border-width: 0px;">
                    <img style="width: 100%;" src="./images/img/ens_logo.jpg">
                </td>
                <td
                    style="width: 70%; height: 10px; text-align: center; font-size: 18px; vertical-align: middle; padding-right: 30px;">
                    <b>PT. Elektromedika Instrumen Tera Nusantara</b><br>
                    <small style="font-size: 18px;">Jl. Gunung Batukaru, Denbantas, Tabanan, Bali</small><br>
                    <small style="font-size: 18px;">www.pt-einsten.com</small><br>
                    <small style="font-size: 18px;">Telp : (0361) 8311810</small>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: left; width: 100%">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2"
                    style="width: 60%; height: 10px; text-align: center; font-size: 18px; vertical-align: text-top; ">
                    <br><strong>Pemberitahuan Jadwal Kalibrasi</strong>
                </td>
            </tr>
        </table>
        <!-- <table style="width: 80%; margin: 0px 25px 0 70px">
            <tr>
                <td style="text-align: left; width: 100%">
                    <hr>
                </td>
            </tr>

            <tr>
                <td style="width: 100px; height: 10px; text-align: center; font-size: 18px; vertical-align: text-top; ">
                    <strong>Surat Perintah Kerja Internal</strong>
                </td>
            </tr>
        </table> -->
    </page_header>
    <page_footer>
        <table style="width: 80%; margin-left: 70px;">
            <tr>
                <td style="text-align: left; width: 77%">
                    <hr>
                </td>
                <td style="text-align: right; width: 23%; font-size: 10px;">
                    <?php
                    $timezone = time() + (60 * 60 * 8);
                    echo gmdate('d/m/Y - H:i:s', $timezone) . ' WITA';
                    ?>
                </td>
            </tr>
        </table>
    </page_footer>


    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484;">
        <tr>
            <td colspan="3" style="width: 100%; text-align: right; padding-bottom: 5px;">
                Tabanan,
                <?= date_format(date_create($row_kegiatan['lastupdate_kegiatan']), 'd F Y'); ?>
                <br>
            </td>
        </tr>

        <tr>
            <td style="width: 14%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                Nomor
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                <?= 'ENS10/JK/' . $row1['no_proyek']; ?>
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 14%; text-align: left;  padding-bottom: 5px; font-weight: bold;">
                Lampiran
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                -
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 14%; text-align: left;  padding-bottom: 5px; font-weight: bold;">
                Perihal
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                Pemberitahuan Jadwal Kalibrasi
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 0 0px 0 0; margin-left: 70px; vertical-align: middle; color: #526484;">
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Yth.
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Di <?= $row1a['alamat_pelanggan']; ?>
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484;">
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Dengan hormat,
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Sehubungan dengan pekeerjaan kalibrasi alat kesehatan di lingkungan
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['nama_pelanggan'] . ','; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                dengan ini kami menyampaikan bahwa kegiatan Kalibrasi Alat Kesehatan akan
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                dilaksanakan pada:
            </td>
        </tr>
    </table>

    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484;">

        <tr>
            <td style="width: 14%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                Hari
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                <?= fhari(date('w', strtotime($row_jadwalD['stgl_kegiatan'])));  ?>
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 14%; text-align: left;  padding-bottom: 5px; font-weight: bold;">
                Tanggal
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                <?= date('d F Y', strtotime($row_jadwalD['stgl_kegiatan']));  ?>
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 14%; text-align: left;  padding-bottom: 5px; font-weight: bold;">
                Pukul
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                <?= substr($row_jadwalT['sjam_kegiatan'], 0, 5) . ' WITA';  ?>
            </td>
        </tr>
    </table>

    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484;">
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Dimohon untuk megkondisikan alat-alat Kesehatan yang akan dikalibrasi
                serta
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                menyiapkan personil sebagai pendamping teknisi kami saat melakukan kalibrasi.
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Demikian surat ini kami sampaikan. Atas perhatian dan Kerjasamanya kami
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                ucapkan terima kasih.
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="width: 80%; text-align: left; font-size: 15px; color: #526484; padding-top: 15px; margin-left: 70px;">
            <tr>
                <td style="width: 60%;">
                    Hormat Kami,
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img style="width: 35%;" src="./images/img/ttd_putu.png">
                    <br>
                    <u>I Putu Cahya Gunawan, S.Tr.Kes</u>
                    <br>
                    Penanggung Jawab Teknis
                </td>
            </tr>
        </table>
    </div>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->
</page>

<?php 
function fhari($nday) {
    $hari = '';
    if ($nday == 0) {
        $hari = 'Minggu';
    }
    else if ($nday == 1) {
        $hari = 'Senin';
    }
    else if ($nday == 2) {
        $hari = 'Selasa';
    }
    else if ($nday == 3) {
        $hari = 'Rabu';
    }
    else if ($nday == 4) {
        $hari = 'Kamis';
    }
    else if ($nday == 5) {
        $hari = 'Jumat';
    }
    else if ($nday == 6) {
        $hari = 'Sabtu';
    }
    return $hari;
}
?>