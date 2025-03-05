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

// $query_spk = "SELECT MAX(lastupdate_spk) AS lastupdate_spk FROM spk WHERE id_proyek = '$proyekid'";
// $result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
// $row_spk = mysqli_fetch_assoc($result_spk);

// $query_jadwalD = "SELECT MIN(stgl_spk) AS stgl_spk FROM spk WHERE id_proyek = '$proyekid'";
// $result_jadwalD = mysqli_query($conn, $query_jadwalD) or die(mysqli_error($conn));
// $row_jadwalD = mysqli_fetch_assoc($result_jadwalD);

// $query_jadwalT = "SELECT MIN(sjam_spk) AS sjam_spk FROM spk WHERE id_proyek = '$proyekid'";
// $result_jadwalT = mysqli_query($conn, $query_jadwalT) or die(mysqli_error($conn));
// $row_jadwalT = mysqli_fetch_assoc($result_jadwalT);

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
                    <?= 'ENS/SJ/' . $row1['no_proyek'] . '/' . date_format(date_create($row_spk['lastupdate_spk']), 'd.m.Y'); ?>
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
                    Pemberitahuan Jadwal Kalibrasi
                </td>
            </tr>

            <!-- <tr>
                <td colspan="3" style="width: 60%; height: 10px; text-align: center; font-size: 18px; vertical-align: text-top; ">
                    <br><strong>Pemberitahuan Jadwal Kalibrasi</strong>
                </td>
            </tr> -->
            <tr>
                <td colspan="4" style="text-align: center; width: 60%">
                    <hr style="padding: 0; margin: 0;">
                    <hr style="padding: 0; margin: -13px 0 0 0; border: 0.5px;">
                </td>
            </tr>
        </table>

    </page_header>
    <page_footer>
        <table style="width: 90%; margin-left: 40px; ">
            <tr>
                <td style="text-align: left; font-size: 10px; width: 80%">
                    <!-- ENS10/MT/FRM/KUP22 : 02 -->
                </td>
                <td style="text-align: right; width: 20%; font-size: 10px; ">
                    <!-- <?php
                            $timezone = time() + (60 * 60 * 8);
                            echo gmdate('d/m/Y - H:i:s', $timezone);
                            ?> -->
                </td>
            </tr>
        </table>
    </page_footer>


    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 80%; font-size: 14px; padding: 25 0px 0 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                Kepada Yth,
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

    <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Dengan hormat,
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Sehubungan dengan permohonan kalibrasi alat kesehatan, dengan ini kami menyampaikan bahwa kegiatan
            </td>
        </tr>
        <!-- <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= $row1a['nama_pelanggan'] . ','; ?>
            </td>
        </tr> -->
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                pengambilan data kalibrasi alat kesehatan akan dilaksanakan pada:
            </td>
        </tr>
    </table>

    <table cellspacing="0" style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 24%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Hari
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                <?php
                    if ($row_spk['stgl_spk'] === $row_spk['etgl_spk']) {
                        echo fhari(date('w', strtotime($row_spk['stgl_spk'])));
                    } else {
                        echo fhari(date('w', strtotime($row_spk['stgl_spk']))) . ' - ' . fhari(date('w', strtotime($row_spk['etgl_spk'])));
                    }
                ?>
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 24%; text-align: left;  padding-bottom: 5px; font-weight: bold;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Tanggal
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                <?php
                if ($row_spk['stgl_spk'] === $row_spk['etgl_spk']) {
                    echo date('d F Y', strtotime($row_spk['stgl_spk']));
                } else {
                    echo date('d F', strtotime($row_spk['stgl_spk'])) . ' - ' . date('d F Y', strtotime($row_spk['etgl_spk']));
                }
                ?>
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 24%; text-align: left;  padding-bottom: 5px; font-weight: bold;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Waktu
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                <?= substr($row_spk['sjam_spk'], 0, 5) . ' - Selesai';  ?>
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 24%; text-align: left;  padding-bottom: 5px; font-weight: bold;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Tempat
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
    </table>

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Demi kelancaran proses pengambilan data diharapkan memperhatikan beberapa hal berikut,
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 15px;">
                    diantaranya:
                </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    1. &nbsp;&nbsp;&nbsp;Pengondisian peralatan medis yang akan dikalibrasi dan kebutuhan untuk masing-masing
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    peralatan sesuai standar operasinya (contoh : Gas Medis, Gel, Paper, dll)
                </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    2. &nbsp;&nbsp;&nbsp;Pengondisian peralatan dalam proses pengerjaan, dalam hal ini peralatan dapat dikerjakan
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    dalam satu tempat (Lebih Efektif) atau dikerjakan diruangan masing-masing
                </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    3. &nbsp;&nbsp;&nbsp;Pengondisian petugas pendamping (PIC) selama proses pengambilan data kalibrasi
                </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    4. &nbsp;&nbsp;&nbsp;Untuk pengerjaan kalibrasi dengan alat yang banyak, pelanggan dapat mengajukan
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i>Technical Meeting (TM)</i> kepada laboratorium dalam penentuan teknis pekerjaan
                </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    5. &nbsp;&nbsp;&nbsp;Untuk setiap pekerjaan kalibrasi laboratorium menunjuk 1 orang personil teknis sebagai
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    koordinator dan akan berkoordinasi dengan pelanggan selama proses pekerjaan kalibrasi
                </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    6. &nbsp;&nbsp;&nbsp;Segala bentuk penyesuaian dalam proses pengerjaan dapat diinformasikan ke personil
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 15px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    penanggung jawab pekerjaan kalibrasi ditempat tersebut (Koordinator dan Marketing)
                </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Demikian surat ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan Terimakasih.
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; text-align: left; font-size: 15px; color: #000000; padding-top: 15px; margin-left: 400px;">
            <tr>
                <td style="width: 75%;">
                    PT Elektromedika Instrumen Tera Nusantara
                    <br>
                    &nbsp;&nbsp;&nbsp;
                    <img style="width: 30%;" src="./images/img/ttd_putu_new.jpg">
                    <br>
                    (Dewa Gde Ardha Putra, S.T.)
                    <br>
                    <b>Penanggung Jawab Lab</b>
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