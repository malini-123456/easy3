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

$query0 = "SELECT * FROM proyek WHERE id_proyek = '$proyekid'";
$result0 = mysqli_query($conn, $query0) or die(mysqli_error($conn));
$row0 = mysqli_fetch_assoc($result0);


// cek isi data permintaan/order
$query_jml_po = "SELECT id_proyek FROM permintaan_order WHERE id_proyek='$proyekid'";
$result_jml_po = mysqli_query($conn, $query_jml_po) or die(mysqli_error($conn));
$row_jml_po = mysqli_num_rows($result_jml_po);

// cek isi data penawaran harga
$query_jml_ph = "SELECT id_proyek FROM penawaranharga WHERE id_proyek='$proyekid'";
$result_jml_ph = mysqli_query($conn, $query_jml_ph) or die(mysqli_error($conn));
$row_jml_ph = mysqli_num_rows($result_jml_ph);

if ($row_jml_po != 0) {
    $query_order = "SELECT * FROM permintaan_order WHERE id_proyek = '$proyekid'";
    $result_order = mysqli_query($conn, $query_order) or die(mysqli_error($conn));
    $row_order = mysqli_fetch_assoc($result_order);
}

if ($row_jml_ph != 0) {
    $query_penawaranharga = "SELECT * FROM penawaranharga WHERE id_proyek='$proyekid'";
    $result_penawaranharga = mysqli_query($conn, $query_penawaranharga) or die(mysqli_error($conn));
    $row_penawaranharga = mysqli_fetch_assoc($result_penawaranharga);
}

if ($row0['status_proyek'] == 9) {
    $query_negosiasi = "SELECT * FROM negosiasi WHERE id_proyek='$proyekid'";
    $result_negosiasi = mysqli_query($conn, $query_negosiasi) or die(mysqli_error($conn));
    $row_negosiasi = mysqli_fetch_assoc($result_negosiasi);

    $query_jadwal1 = "SELECT MIN(stgl_kegiatan) AS stgl_kegiatan FROM kegiatan WHERE id_proyek = '$proyekid' AND jenis_kegiatan='event-primary'";
    $result_jadwal1 = mysqli_query($conn, $query_jadwal1) or die(mysqli_error($conn));
    $row_jadwal1 = mysqli_fetch_assoc($result_jadwal1);

    $query_jadwal2 = "SELECT MAX(etgl_kegiatan) AS etgl_kegiatan FROM kegiatan WHERE id_proyek = '$proyekid' AND jenis_kegiatan='event-primary'";
    $result_jadwal2 = mysqli_query($conn, $query_jadwal2) or die(mysqli_error($conn));
    $row_jadwal2 = mysqli_fetch_assoc($result_jadwal2);

    $query_invoicepajak = "SELECT * FROM invoicepajak WHERE id_proyek='$proyekid'";
    $result_invoicepajak = mysqli_query($conn, $query_invoicepajak) or die(mysqli_error($conn));
    $row_invoicepajak = mysqli_fetch_assoc($result_invoicepajak);
}
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
<page backcolor="#FEFEFE" backtop="15mm" backbottom="10mm" style="font-size: 12pt">
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
        </table>
    </page_footer>


    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0"
        style="width: 95%; text-align: center; font-size: 12px; margin: 25px 0 0 25px; border: 0px; color: white; background: #4472c4; ">
        <tr>
            <td
                style="width: 100%; height: 30px; text-align: center; font-size: 20px; vertical-align: middle; border: 2px; ">
                <b>DATA SPESIMEN PELANGGAN</b><br>
            </td>
        </tr>
    </table>

    <table cellspacing="0" style="width: 95%; font-size: 16px; margin: 25px 0 0 25px; border: 0px; color: #526484; ">
        <tr>
            <td rowspan="12" style="width: 25%; color: #444444; vertical-align: center; padding: 12px 10px 0 0; ">
                <?php if ($row1a['logo_pelanggan'] != '') { ?>
                <img style="width: 150px;" src="<?= $row1a['logo_pelanggan']; ?>">
                <?php } ?>
                <br>
            </td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Nama Pelanggan</td>
            <td style="width: 50%; text-align: center; font-weight: bold; padding-bottom: 5px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Kategori Fasyankes</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;">
                <?php if ($row1a['kategori_pelanggan'] != '') {
                    echo $row1a['kategori_pelanggan'];
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Sumber Dana</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;"><?= $row1['sumberdana_proyek']; ?></td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Jumlah Dana/Pagu</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;">
                <?= 'Rp. ' . number_format($row1['pagu_proyek'], 0); ?></td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Deadline Kontrak</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;">
                <?= date_format(date_create($row1['deadline_proyek']), 'd F Y'); ?></td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Marketing</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;"><?= $row1['marketing_proyek']; ?></td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">NPWP</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;">
                <?php if ($row1a['npwp_pelanggan'] != '') {
                    echo $row1a['npwp_pelanggan'];
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Nama NPWP</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;">
                <?php if ($row1a['namanpwp_pelanggan'] != '') {
                    echo $row1a['namanpwp_pelanggan'];
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Alamat Fasyakes</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;">
                <?php if ($row1a['alamat_pelanggan'] != '') {
                    echo $row1a['alamat_pelanggan'];
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Kontak</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;">
                <?php if ($row1a['kontak_pelanggan'] != '') {
                    echo $row1a['kontak_pelanggan'];
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td style="width: 25%; font-weight: bold; padding-bottom: 5px;">Catatan</td>
            <td style="width: 50%; text-align: center; padding-bottom: 5px;"><?= $row1['catatan_proyek']; ?></td>
        </tr>
    </table>

    <!-- ///////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 95%; font-size: 16px; margin: 25px 0 0 25px; color: #526484; ">
        <tr>
            <td rowspan="9" style="width: 23%; font-size: 12px; vertical-align: text-top; padding: 5px 10px 0 0; ">
                <b>Persyaratan Teknis*</b> <br><br>
                <i>*Mohon disepakati dengan pelanggan sebelum pengerjaan teknis dimulai </i><br><br>
                <i>*Segala Sesuatu yang berkaitan ataupun berpotensi berpengaruh ke kegiatan teknis mohon dicantumkan di
                    kolom keterangan</i>
            </td>
            <td rowspan="9" style="width: 2%; vertical-align: center; font-weight: bold; padding: 0px 10px 0 0; ">
                <strong>:</strong>
            </td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; text-align: center; font-weight: bold; padding-bottom: 5px; color: white; background: #4472c4; border: 1px; border-bottom: 0px;">
                Prasyarat Khusus</td>
            <td
                style="width: 38%; height:10px; text-align: center; font-weight: bold; padding-bottom: 5px; color: white; background: #4472c4; border: 1px; border-bottom: 0px; border-left: 0px;">
                Keterangan</td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                Alat
                <b>Tidak Laik Pakai</b>
            </td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?= $row1['alatlaik_proyek']; ?></td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                <b>Jenis</b> Alat yang
                Dikalibrasi
            </td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?= $row1['jenisalat_proyek']; ?></td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                <b>Jumlah</b> Alat yang
                Dikalibrasi
            </td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?= $row1['jmlalat_proyek']; ?></td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                Jumlah
                <b>Dana/Pagu</b>
            </td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?= $row1['jmldana_proyek']; ?>
            </td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                <b>Jadwal</b> Pengerjaan
            </td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?= $row1['jadwalkerja_proyek']; ?></td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                <b>Daftar
                    Inventaris</b> Alat
            </td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?= $row1['daftarinventaris_proyek']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 37%; height:10px; padding-bottom: 5px; padding-left: 5px; border: 1px;">Deadline
                Pengiriman
                <b>Sertifikat</b>
            </td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-left: 0px;">
                <?= $row1['deadlinesertifikat_proyek']; ?>
            </td>
        </tr>
    </table>

    <!-- ///////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 95%; font-size: 16px; margin: 25px 0 0 25px; border: 0px; color: #526484; ">
        <tr>
            <td rowspan="9" style="width: 25%; "></td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; text-align: center; font-weight: bold; padding-bottom: 5px; padding-left: 5px; color: white; background: #4472c4; border: 1px; border-bottom: 0px;">
                Detail Proyek</td>
            <td
                style="width: 38%; height:10px; text-align: center; font-weight: bold; padding-bottom: 5px; color: white; background: #4472c4; border: 1px; border-bottom: 0px; border-left: 0px;">
                Keterangan</td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; padding-bottom: 5px; padding-left: 5px; font-weight: bold; border: 1px; border-bottom: 0px;">
                Permintaan kalibrasi dimulai</td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?php if ($row_jml_po != 0) {
                    if ( ($row_order['tgl1_permintaan_order'] != '') && ($row_order['tgl1_permintaan_order'] != '0000-00-00') ) {
                        echo date_format(date_create($row_order['tgl1_permintaan_order']), 'd F Y');
                    } else {
                    echo '-';
                    }
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; font-weight: bold; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                Permintaan
                kalibrasi
                berakhir</td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?php if ($row_jml_po != 0) {
                    if ( ($row_order['tgl2_permintaan_order'] != '') && ($row_order['tgl2_permintaan_order'] != '0000-00-00') ) {
                        echo date_format(date_create($row_order['tgl2_permintaan_order']), 'd F Y');
                    } else {
                    echo '-';
                    }
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; font-weight: bold; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                Nomor
                Penawaran</td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?php if ($row_jml_ph != 0) {
                    echo $row_penawaranharga['no_penawaranharga'];
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; font-weight: bold; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                Nilai
                Negosiasi</td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?php if ($row0['status_proyek'] == 9) {
                    echo 'Rp. ' . number_format($row_negosiasi['nilai_negosiasi'], 0);
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; font-weight: bold; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                Pekerjaan
                Dimulai</td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?php if ($row0['status_proyek'] == 9) {
                    echo date_format(date_create($row_jadwal1['stgl_kegiatan']), 'd F Y');
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; font-weight: bold; padding-bottom: 5px; padding-left: 5px; border: 1px; border-bottom: 0px;">
                Pekerjaan
                Berakhir</td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-bottom: 0px; border-left: 0px;">
                <?php if ($row0['status_proyek'] == 9) {
                    echo date_format(date_create($row_jadwal2['etgl_kegiatan']), 'd F Y');
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
        <tr>
            <td
                style="width: 37%; height:10px; font-weight: bold; padding-bottom: 5px; padding-left: 5px; border: 1px;">
                Total
                Invoice</td>
            <td
                style="width: 38%; height:10px; text-align: center; padding-bottom: 5px; border: 1px; border-left: 0px;">
                <?php if ($row0['status_proyek'] == 9) {
                    echo 'Rp. ' . number_format($row_invoicepajak['nilai_invoicepajak'], 0);
                } else {
                    echo '-';
                } ?>
            </td>
        </tr>
    </table>
    <br>


    <table cellspacing="0" style="width: 95%; font-size: 12px; margin: 25px 0 0 25px; border: 0px; color: #526484; ">
        <tr>
            <td style="width: 100%; padding-bottom: 5px; font-weight: bold;">Catatan : </td>
        </tr>
        <tr>
            <td style="width: 100%; padding-bottom: 5px;">1. Bundle diserahkan beserta <b>data alat / inventaris</b>
                fasyankes yang akan dikerjakan.</td>
        </tr>
        <tr>
            <td style="width: 100%; padding-bottom: 5px;">2. <b>Perubahan data</b> agar diinfokan sesegera mungkin ke
                tim teknis yang bertugas.</td>
        </tr>
        <tr>
            <td style="width: 100%; padding-bottom: 5px;">3. Data telah diisi berdasarkan <b>informasi valid</b> dari
                pelanggan sehingga dapat dipertanggung jawabkan di lapangan.</td>
        </tr>
    </table>

</page>