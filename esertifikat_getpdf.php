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

$query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid'";
$result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
$row_kajiulang = mysqli_fetch_assoc($result_kajiulang);
$row_jml_kajiulang = mysqli_num_rows($result_kajiulang);

$query_sertifikat = "SELECT * FROM sertifikat WHERE id_proyek = '$proyekid'";
$result_sertifikat = mysqli_query($conn, $query_sertifikat) or die(mysqli_error($conn));
$row_sertifikat = mysqli_fetch_assoc($result_sertifikat);
$row_jml_sertifikat = mysqli_num_rows($result_sertifikat);
?>

<!-- 0e509e -->

<style type="text/css">
    /* * {
    border: 1px;
} */

    th {
        height: 30px;
        color: #0e509e;
        font-size: 12px;
    }

    /* top right bottom left  */
</style>
<page backcolor="#FFFFFF" backtop="50mm" backbottom="10mm" style="font-size: 12pt"> <!-- #FEFEFE -->
    <page_header>
        <table style="width: 80%; text-align: center; font-size: 14px; margin: 25px 0 0 45px; border: 0px; color: #000000;">
            <tr>
                <td style="width: 100%; color: #444444; vertical-align: text-top; padding: 0px 20px 0px 0; border-width: 0px;">
                    <img style="width: 110%;" src="./images/img/header_new.png">
                </td>
            </tr>
        </table>

    </page_header>
    <page_footer>
        <table style="width: 90%; margin-left: 40px; ">
            <tr>
                <td style="text-align: left; font-size: 10px; width: 80%">
                    PT ELEKTROMEDIKA INSTRUMEN TERA NUSANTARA - <?= $row1['no_proyek']; ?>
                </td>
                <td style="text-align: right; width: 20%; font-size: 10px; ">
                    <?php
                    $timezone = time() + (60 * 60 * 8);
                    // echo gmdate('d/m/Y - H:i:s', $timezone);
                    ?>
                </td>
            </tr>
        </table>
    </page_footer>


    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 100%; font-size: 14px; padding: 0px 0px 10px 0; margin-left: 45px; vertical-align: middle; color: #000000;">

        <tr>
            <td style="width: 90%; height: 10px; text-align: center; font-size: 20px; vertical-align: text-top; padding-top: -77px; padding-bottom: 0px;">
                <br><strong>BERITA ACARA SERAH TERIMA</strong>
                <!-- <br>SERTIFIKAT KALIBRASI <i>(E-CERTIFICATE)</i> -->
            </td>
        </tr>
        <tr>
            <td style="width: 90%; height: 10px; text-align: center; font-size: 16px; vertical-align: text-top; padding-top: -50px; padding-bottom: 0px;">
                <br>SERTIFIKAT KALIBRASI <i>(E-CERTIFICATE)</i>
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 10px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Sehubungan dengan pelaksanaan Kalibrasi Alat Kesehatan yang telah dilaksanakan oleh <b>Laboratorium</b>
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    <b>Kalibrasi PT Elektromedika Instrumen Tera Nusantara</b>, dengan ini menyerahkan Sertifikat Hasil
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Pengujian dan/atau Kalibrasi kepada :
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 10px 0px 0 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Nama Pelanggan</b>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 68%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Alamat Pelanggan</b>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 68%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['alamat_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Tanggal Serah Terima</b>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 68%; text-align: left; padding-bottom: 5px;">
                <?= gmdate('d F Y', $timezone); ?>
            </td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left; padding-bottom: 10px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Nomor Berita Acara</b>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :
            </td>
            <td style="width: 68%; text-align: left; padding-bottom: 10px;">
                <?= 'ENS/BAST/' . $row1['no_proyek']; ?>
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <?php
    if ($row_jml_sertifikat > 0) {
            $totalLaik = 0;
            $totalTidakLaik = 0;
            $query_sertifikat1 = "SELECT * FROM sertifikat WHERE id_proyek = '$proyekid'";
            $result_sertifikat1 = mysqli_query($conn, $query_sertifikat1) or die(mysqli_error($conn));
            while ($row_sertifikat1 = mysqli_fetch_array($result_sertifikat1)) {
                if ($row_sertifikat1['kode_stiker_sertifikat'][0] == 'H') { 
                    $totalLaik++;
                } else {
                    $totalTidakLaik++;
                }
            }
            $totalAlat = $totalLaik + $totalTidakLaik;
        }
    ?>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 10px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Adapun Jumlah Alat yang terkalibrasi sebagai berikut :
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 10px 0px 0 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Alat Terkalibrasi</b>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 68%; text-align: left; padding-bottom: 5px;">
                <?= $totalAlat; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Alat Laik Pakai</b>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 68%; text-align: left; padding-bottom: 5px;">
                <?= $totalLaik; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Alat Tidak Laik Pakai</b>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 68%; text-align: left; padding-bottom: 5px;">
                <?= $totalTidakLaik; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left; padding-bottom: 10px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Detail Alat Terkalibrasi</b>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :
            </td>
            <td style="width: 68%; text-align: left; padding-bottom: 10px;">
                Terlampir
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->


    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 25px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Demikian Berita Acara Serah Terima Sertifikat <i>(E-Certificate)</i> ini dibuat untuk dipergunakan sebagaimana
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    mestinya.
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; text-align: center; font-size: 14px; color: #000000; padding-top: 50px; margin-left: 30px;">
            <tr>
                <td style="width: 50%;">
                    Diterima Oleh,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= '( ................................... )'; ?>
                    <br>
                    <!-- <b>Pelanggan</b> -->
                </td>
                <td style="width: 50%;">
                    Diserahkan Oleh,
                    <br>
                    PT Elektromedika Instrumen Tera Nusantara
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    (Nyoman Mira Oktariani, S.T)
                    <br>
                    <b>Manager Mutu</b>
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