<?php
require_once('connect.php');
$proyekid = $_REQUEST['uid'];

$query1a = "SELECT * FROM proyek WHERE id_proyek='$proyekid'";
$result1a = mysqli_query($conn, $query1a) or die(mysqli_error($conn));
$row1a = mysqli_fetch_assoc($result1a);
$pelangganid = $row1a['id_pelanggan'];

$query1 = "SELECT * FROM pelanggan WHERE id_pelanggan='$pelangganid'";
$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
$row1 = mysqli_fetch_assoc($result1);

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
                    PT ELEKTROMEDIKA INSTRUMEN TERA NUSANTARA - <?= $row1a['no_proyek']; ?>
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

        <!-- <tr>
            <td style="width: 90%; height: 10px; text-align: center; font-size: 20px; vertical-align: text-top; padding-top: -77px; padding-bottom: 0px;">
                <br><strong><i>ACCOUNT ACCESS</i></strong>
                <br>SERTIFIKAT KALIBRASI <i>(E-CERTIFICATE)</i>
            </td>
        </tr>
        <tr>
            <td style="width: 90%; height: 10px; text-align: center; font-size: 16px; vertical-align: text-top; padding-top: -50px; padding-bottom: 0px;">
                <br><i>CALIBRATION E-CERTIFICATE</i>
            </td>
        </tr> -->

        <!-- #2f5496 -->

        <tr>
            <td style="width: 90%; height: 10px; text-align: left; font-size: 20px; vertical-align: text-top; padding-top: -67px; padding-bottom: 0px; color: #2f5496">
                <br><strong><i>ACCOUNT ACCESS</i></strong>
            </td>
        </tr>
        <tr>
            <td style="width: 90%; height: 10px; text-align: left; font-size: 20px; vertical-align: text-top; padding-top: -40px; padding-bottom: 0px;">
                <br><i>CALIBRATION E-CERTIFICATE</i>
            </td>
        </tr>
        <tr>
            <td style="width: 90%; height: 10px; text-align: center; vertical-align: text-top; padding-top: 0px; padding-bottom: 0px;">
                <hr style="border: 0.5px;">
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 90%; font-size: 12px; padding: 15px 0px 0 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 67%; text-align: left; font-size: 14px; padding: 5px; font-weight: bold;">
                Kepada :
            </td>
            <td style="width: 12%; text-align: left; padding: 5px; font-weight: bold; background-color: #0e509e; color: #ffffff; border: 0.05px;">
                TANGGAL
            </td>
            <td style="width: 21%; text-align: left; padding: 5px; border: 0.05px;">
                <?= gmdate('d F Y', $timezone); ?>
            </td>
        </tr>
        <tr>
            <td style="width: 67%; text-align: left; font-size: 14px; padding: 5px;">
                <?= 'Yth. ' . $row1['nama_pelanggan']; ?>
            </td>
            <td style="width: 12%; text-align: left; padding: 5px; font-weight: bold; background-color: #0e509e; color: #ffffff; border: 0.05px;">
                PERIHAL
            </td>
            <td style="width: 21%; text-align: left; padding: 5px; border: 0.05px;">
                <i>Surat Account Access</i>
            </td>
        </tr>
        <tr>
            <td style="width: 67%; text-align: left; font-size: 14px; padding: 5px;">
                Di <?= $row1['alamat_pelanggan']; ?>
            </td>
            <td style="width: 12%; text-align: left; padding: 5px; font-weight: bold; background-color: #0e509e; color: #ffffff; border: 0.05px;">
                SIFAT
            </td>
            <td style="width: 21%; text-align: left; padding: 5px; font-weight: bold; border: 0.05px;">
                SANGAT RAHASIA
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->


    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 25px 0; margin-left: 45px; margin-top: 10px; vertical-align: middle; color: #000000;">
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Dengan Hormat,
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    <b>Sertifikat Pengujian dan/atau Kalibrasi Elektronik (E-Certificate)</b> merupakan layanan penerbitan sertifikat
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    secara digital yang diterbitkan oleh Laboratorium Kalibrasi PT Elektromedika Instrumen Tera Nusantara
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    (LK-288-IDN). Layanan ini diterbitkan dalam upaya meningkatkan efisiensi penerbitan hasil Pengujian
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    dan/atau Kalibrasi Alat Kesehatan.
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 0; margin-left: 45px; vertical-align: middle; color: #000000;">
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Melalui surat ini memberitahukan bahwa anda telah terdaftar pada layanan <b>E-Certificate</b> dengan akun
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    sebagai berikut :
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0px 0 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 10%;">
            </td>
            <td style="width: 18%; text-align: center; padding: 2px; font-weight: bold; background-color: #0e509e; color: #ffffff; border: 0.05px;">
                USERNAME
            </td>
            <td style="width: 40%; text-align: left; padding: 0px 8px; border: 0.05px;">
                <?= $row1['username_pelanggan']; ?>
            </td>
            <td rowspan="4" style="width: 32%; text-align: center; padding: 1px;">
                <img style="width: 80%;" src="./images/img/index_user.jpg">
            </td>
        </tr>
        <tr>
            <td style="width: 10%;">
            </td>
            <td style=" width: 18%; text-align: center; padding: 2px; font-weight: bold; background-color: #0e509e; color: #ffffff; border: 0.05px;">
                PASSWORD
            </td>
            <td style="width: 40%; text-align: left; padding: 0px 8px; border: 0.05px;">
                <?= $row1['pass_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 48%; text-align: left; padding: 10px 7px 0px 7px; margin-top: -50px;">
                Gunakan informasi diatas untuk login diportal berikut :
            </td>
        </tr>
        <tr>
            <td style="width: 10%;">
            </td>
            <td style="width: 18%; text-align: center; padding: 2px; font-weight: bold; background-color: #0e509e; color: #ffffff; border: 0.05px;">
                WEBSITE
            </td>
            <td style="width: 40%; text-align: left; padding: 0px 8px; border: 0.05px;">
                https://pt-einsten.com/easy3/index_user
            </td>
        </tr>
    </table>


    <!-- /////////////////////////////////////////////////////////////////// -->


    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 25px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Jika terdapat kendala dalam aplikasi anda dapat menghubungi Customer Service kami di E-mail :
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    info@pt-einsten.com atau WhatsApp : 0851-7545-0310 Telp : (0361) 8311810
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; text-align: left; font-size: 14px; color: #000000; padding-top: 50px; margin-left: 45px;">
            <tr>
                <td style="width: 70%;">
                    <b>Terlampir :</b>
                    <br>
                    1. Panduan E-Certificate
                    <br>
                    2. Berita Acara Serah Terima Sertifikat
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <!-- <b>Pelanggan</b> -->
                </td>
                <td style="width: 30%;">
                    Tabanan, <?= gmdate('d F Y', $timezone); ?>
                    <br>
                    Hormat kami,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    Nyoman Mira Oktariani, S.T
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