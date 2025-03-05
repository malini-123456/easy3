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

$query_jadwal = "SELECT MIN(stgl_kegiatan) AS stgl_kegiatan FROM kegiatan WHERE id_proyek =  '$proyekid' AND jenis_kegiatan='event-primary'";
$result_jadwal = mysqli_query($conn, $query_jadwal) or die(mysqli_error($conn));
$row_jadwal = mysqli_fetch_assoc($result_jadwal);

$query_spk = "SELECT * FROM spk WHERE id_proyek='$proyekid'";
$result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
$row_spk = mysqli_fetch_assoc($result_spk);
$idtekkoor = $row_spk['koordinator_spk'];

// $query_tekkoor = "SELECT * FROM teknisi WHERE id_teknisi='$idtekkoor'";
// $result_tekkoor = mysqli_query($conn, $query_tekkoor) or die(mysql_error());
// $row_tekkoor = mysqli_fetch_assoc($result_tekkoor);

$query_tekkoor = "SELECT * FROM user WHERE id_user='$idtekkoor'";
$result_tekkoor = mysqli_query($conn, $query_tekkoor) or die(mysqli_error($conn));
$row_tekkoor = mysqli_fetch_assoc($result_tekkoor);

$query_kegiatan = "SELECT MAX(lastupdate_kegiatan) AS lastupdate_kegiatan FROM kegiatan WHERE id_proyek =  '$proyekid'";
$result_kegiatan = mysqli_query($conn, $query_kegiatan) or die(mysqli_error($conn));
$row_kegiatan = mysqli_fetch_assoc($result_kegiatan);

$query_berkasteknisiD = "SELECT MAX(lastupdate_berkasteknisi) AS lastupdate_berkasteknisi FROM berkasteknisi WHERE id_proyek =  '$proyekid'";
$result_berkasteknisiD = mysqli_query($conn, $query_berkasteknisiD) or die(mysqli_error($conn));
$row_berkasteknisiD = mysqli_fetch_assoc($result_berkasteknisiD);
?>
<style type="text/css">
/* * {
    border:
        1px;
} */

th {
    height: 30px;
    color: #277ABE;
    font-size: 12px;
    /* background: #0f77ad;
    color: white; */
}
</style>
<page backcolor="#FEFEFE" backtop="45mm" backbottom="10mm" style="font-size: 12pt">
    <page_header>
        <table cellspacing="0"
            style="width: 95%; text-align: center; font-size: 12px; margin: 25px 0 0 25px; border: 1px; color: #526484;">
            <tr>
                <td rowspan="6"
                    style="width: 25%; color: #444444; vertical-align: text-top; padding: 6px 10px 0 0; border-width: 0px;">
                    <img style="width: 90%;" src="./images/img/ens_logo.jpg"><br>
                </td>
            </tr>
            <tr>
                <td colspan="3"
                    style="width: 75%; height: 30px; text-align: center; font-size: 16px; vertical-align: middle; border: 1px; border-bottom:0;">
                    <b>PT. ELEKTROMEDIKA INSTRUMEN TERA NUSANTARA</b><br>
                </td>
            </tr>
            <tr>
                <td colspan="3"
                    style="width: 75%; height: 20px; text-align: center; vertical-align: middle; border: 1px; border-bottom:0;  ">
                    <strong>Peminjaman dan Pengembalian Alat</strong><br>
                </td>
            </tr>
            <tr>
                <td
                    style="width: 13%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; border-bottom:0; border-right:0;">
                    Nomor<br>
                </td>
                <td
                    style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; border-bottom:0; border-right:0; ">
                    : ENS10/MT/FRM/29PLT<br>
                </td>
                <td
                    style="width: 35%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; border-bottom:0;">
                    No. Revisi : 00<br>
                </td>
            </tr>
            <tr>
                <td
                    style="width: 13%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; border-right:0; ">
                    Tgl. Terbit<br>
                </td>
                <td
                    style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; border-right:0;  ">
                    : 5 Desember 2018<br>
                </td>
                <td style="width: 35%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    Halaman [[page_cu]] dari [[page_nb]]<br>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 95%; margin-left: 25px;">
            <tr>
                <td style="text-align: left; width: 80%">
                    <hr>
                </td>
                <td style="text-align: right; width: 20%; font-size: 10px;">
                    <?php
                    $timezone = time() + (60 * 60 * 8);
                    echo gmdate('d/m/Y - H:i:s', $timezone) . ' WITA';
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 10px; text-align:center">Dilarang menggandakan atau menyebarkan
                    dokumen ini baik
                    keseluruhan atau sebagian tanpa izin
                    PT.Elektromedika Instrumen Tera Nusantara</td>
            </tr>
        </table>
    </page_footer>


    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 95%; padding: 10px 0; margin-left: 25px; color: #526484;">
        <tr>
            <td style="width: 28%; text-align: left; font-size: 12px; vertical-align: text-top; font-weight: bold; ">
                Nama Pelanggan<br>
            </td>
            <td style="width: 2%; text-align: left; font-size: 12px; vertical-align: text-top;">
                :<br>
            </td>
            <td style="width: 70%; text-align: left; font-size: 12px; vertical-align: text-top;">
                <?= $row1a['nama_pelanggan']; ?><br>
            </td>
        </tr>
        <tr>
            <td style="width: 28%; text-align: left; font-size: 12px; vertical-align: text-top; font-weight: bold; ">
                Tanggal Peminjaman<br>
            </td>
            <td style="width: 2%; text-align: left; font-size: 12px; vertical-align: text-top;">
                :<br>
            </td>
            <td style="width: 70%; text-align: left; font-size: 12px; vertical-align: text-top;">
                <?= date("d F Y", strtotime($row_berkasteknisiD['lastupdate_berkasteknisi'])); ?><br>
            </td>
        </tr>
        <tr>
            <td style="width: 28%; text-align: left; font-size: 12px; vertical-align: text-top; font-weight: bold; ">
                Tanggal Kalibrasi<br>
            </td>
            <td style="width: 2%; text-align: left; font-size: 12px; vertical-align: text-top;">
                :<br>
            </td>
            <td style="width: 70%; text-align: left; font-size: 12px; vertical-align: text-top;">
                <?= date("d F Y", strtotime($row_jadwal['stgl_kegiatan'])); ?><br>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top; ">
                <br>Dengan ini mengajukan permohonan untuk peminjaman alat kalibrasi/pengujian dengan rincian sebagai
                berikut.<br>
            </td>
        </tr>
    </table>

    <table cellspacing="0"
        style="width: 95%; padding: 10px 5px; margin-left: 25px; color: #526484; background-color: #f5f6fa">
        <tr>
            <td style="width: 100%; text-align: center; font-size: 12px; vertical-align: text-top; font-weight: bold;">
                Peminjaman Alat<br></td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table id="myTable" cellspacing="0"
        style="width: 95%; text-align: center; font-size: 12px; padding-top: 10px; margin-left: 25px; color: #526484;">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 30%">
            <col style="width: 15%;">
            <col style="width: 18%">
            <col style="width: 20%;">
            <col style="width: 12%;">
        </colgroup>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Alat</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>No. Seri</th>
                <th>Kondisi</th>
            </tr>
        </thead>

        <?php
        require_once('connect.php');
        $sno = 0;

        $query = "SELECT * FROM berkasteknisi WHERE id_proyek='$proyekid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {

            $alatid = $row['id_alat'];
            $query1c = "SELECT * FROM alatkalibrasi WHERE id_alat='$alatid'";
            $result1c = mysqli_query($conn, $query1c) or die(mysqli_error($conn));
            $row1c = mysqli_fetch_assoc($result1c);

            $sno++;
            if (($sno % 2) == 0) {
        ?>
        <tr>
            <td style="text-align: left; padding: 10px 5px;"><?= $sno; ?></td>
            <td style="text-align: left; padding: 10px 5px;"><?= $row1c['nama_alat']; ?></td>
            <td style="text-align: left; padding: 10px 5px;"><?= $row1c['merek']; ?></td>
            <td style="text-align: left; padding: 10px 5px;"><?= $row1c['tipe']; ?></td>
            <td style="text-align: left; padding: 10px 5px;"><?= $row1c['no_seri']; ?></td>
            <td style="text-align: center; padding: 10px 0;"><?= $row['kondisi']; ?></td>
        </tr>
        <?php
            } else {
            ?>
        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $sno; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row1c['nama_alat']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row1c['merek']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row1c['tipe']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row1c['no_seri']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?= $row['kondisi']; ?></td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
    <br>
    <br>

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <table cellspacing="0"
        style="width: 95%; padding: 10px 5px; margin-left: 25px; color: #526484; background-color: #f5f6fa">
        <tr>
            <td style="width: 100%; text-align: center; font-size: 12px; vertical-align: text-top; font-weight: bold;">
                Pengembalian Alat<br></td>
        </tr>
    </table>


    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <table cellspacing="0" style="width: 95%; padding: 10px 5px; margin-left: 25px; color: #526484">
        <!-- <tr>
            <td colspan="3"
                style="width: 100%; text-align: center; font-size: 12px; vertical-align: text-top; font-weight: bold; background-color: #f5f6fa;">
                Pengembalian Alat</td>
        </tr> -->
        <tr>
            <td rowspan="2"
                style="width: 4%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; "></td>
            <td
                style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; font-size: 12px; font-weight: bold">
                Kelengkapan<br>
            </td>
            <td
                style="width: 35%; text-align: left; vertical-align: middle; padding-left: 5px; font-size: 12px; font-weight: bold">
                Catatan Ketidaksesuaian<br>
            </td>
        </tr>
        <tr>
            <td style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; font-size: 10px;">
                Jumlah dan Aksesoris<br>
            </td>
            <td rowspan="3"
                style="width: 69%; text-align: left; vertical-align: middle; padding-left: 5px; font-size: 12px; border: 1px">
                <br>
            </td>
        </tr>

        <tr>
            <td rowspan="2"
                style="width: 4%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; border-top: 0">
            </td>
            <td
                style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; font-size: 12px; font-weight: bold">
                Kondisi Peralatan<br>
            </td>
        </tr>
        <tr>
            <td style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; font-size: 10px;">
                Baik / Buruk<br>
            </td>
        </tr>

    </table>
    <table colspan="3" cellspacing="0" style="width: 95%; padding: 10px 0; margin-left: 25px; color: #526484;">
        <tr>
            <td style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top; font-weight: bold;">
                <br>Keterangan<br>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top;">1. Pemohon
                bertanggung jawab atas alat-alat yang dipinjam selama proses peminjaman dilakukan</td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top;">2.
                Pengembalian peralatan kalibrator diverifikasi kelengkapan dan kondisinya oleh admin teknik dan disertai
                keterangan apabila terjadi kerusakan / malfungsi / tidak lengkap</td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top;">3.
                Kelengkapan peralatan ( Main unit dan aksesoris) dapat dilihat pada tabel kelengkapan peralatan dengan
                scan QR Code informasi peralatan pada masing-masing alat</td>
        </tr>
    </table>

    <!-- ///////////////////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 95%; text-align: center; font-size: 12px; padding-top: 25px; margin-left: 25px; color: #526484;">
            <tr>
                <td colspan="3" style="width: 100%; text-align: right">
                    Tabanan, <?= date("d F Y", strtotime($row_kegiatan['lastupdate_kegiatan'])); ?><br><br>
                </td>
            </tr>
            <tr>
                <td style="width: 40%; ">
                    Pemohon Peminjaman,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= '( ' . $row_tekkoor['nama_user'] . ' )'; ?>
                    <!-- <hr style="width: 15px; "> -->
                </td>
                <td style="width: 30%; ">
                    Verifikasi Pengembalian,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= '( Admin Teknik )'; ?>
                    <!-- <hr style="width: 15px; "> -->
                </td>

                <td style="width: 30%; ">
                    Mengetahui,
                    <br>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img style="width: 55%;" src="./images/img/ttd_putu.png">
                    <br>
                    <?= '( I Putu Cahya Gunawan, S.Tr.Kes )'; ?><br><br>
                    <!-- <hr style="width: 10%; text-align:left;margin-left:0"> -->
                </td>
            </tr>
        </table>
    </div>

</page>