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

$totalMampu = 0;
$totalTidakMampu = 0;
$query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid'";
$result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
while ($row_kajiulang = mysqli_fetch_array($result_kajiulang)) {
    if ($row_kajiulang['kategori_kajiulang'] === 'Tidak Bisa Dikalibrasi') {
        $totalTidakMampu = $totalTidakMampu + $row_kajiulang['jumlah_barang_kajiulang'];
    } else {
        $totalMampu = $totalMampu + $row_kajiulang['jumlah_barang_kajiulang'];
    }
}
?>


<style type="text/css">
    /* * {
    border: 1px;
} */

    th {
        height: 20px;
        color: #0e509e;
        font-size: 10px;
    }

    /* top right bottom left  */
</style>
<page backcolor="#FFFFFF" backtop="40mm" backbottom="10mm" style="font-size: 10px"> <!-- #FEFEFE -->
    <page_header>
        <table style="width: 80%; text-align: center; font-size: 10px; margin: 25px 0 0 45px; border: 0px; color: #000000;">
            <tr>
                <td style="width: 100%; color: #444444; vertical-align: text-top; padding: 0px 20px 20px 0; border-width: 0px;">
                    <img style="width: 110%;" src="./images/img/header_new.png">
                </td>
            </tr>
        </table>

    </page_header>
    <page_footer>
        <table style="width: 90%; margin-left: 40px; ">
            <tr>
                <td style="text-align: left; font-size: 10px; width: 80%">
                    <!-- ENS10/MM/FRM/70SPK : 01 -->
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

    <table cellspacing="0" style="width: 100%; font-size: 12px; padding: 5px 0px 10px 0; margin-left: 45px; vertical-align: middle; color: #000000;">

        <tr>
            <td colspan="6" style="width: 90%; height: 10px; text-align: center; font-size: 16px; vertical-align: text-top; padding-top: -45px; padding-bottom: 15px; padding-left: -30px;">
                <br><strong>AKOMODASI PERJALANAN DINAS</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 15%; text-align: left; padding-bottom: 5px; ">
                Kode Project
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 33%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= $row1['no_proyek']; ?>
            </td>
            <td style="width: 14%; text-align: left; padding-bottom: 5px; ">
                Tgl Pengerjaan
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 33%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?php
                if ($row_spk['stgl_spk'] === $row_spk['etgl_spk']) {
                    echo date('d F Y', strtotime($row_spk['stgl_spk']));
                } else {
                    echo date('d F', strtotime($row_spk['stgl_spk'])) . ' - ' . date('d F Y', strtotime($row_spk['etgl_spk']));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 15%; text-align: left; padding-bottom: 5px; ">
                Nama Pelanggan
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 33%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
            <td style="width: 14%; text-align: left; padding-bottom: 5px; ">
                Jumlah Alat
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 33%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= $totalMampu; ?>
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <!-- <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000; border: 1px;">
    </table> -->

    <table id="myTable" border="0.05px" cellspacing="0" style="width: 90%; text-align: center; font-size: 10px; padding-top: 0px; margin-left: 45px; color: #000000; ">
        <colgroup>
            <col style="width: 8%; padding: 3px 5px;">
            <col style="width: 25%; padding: 3px 5px;">
            <col style="width: 34%; padding: 3px 5px;">
            <col style="width: 33%; padding: 3px 5px;">
        </colgroup>
        <thead>
            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NO</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KOMPONEN BIAYA</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KETERANGAN</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NOMINAL PENGAJUAN</th>
            </tr>
        </thead>

        <tr>
            <td style="text-align: center; background-color: #f5f6fa;">
                <?= '1' ?></td>
            <td style="text-align: left; background-color: #f5f6fa;">
                <?= 'Akomodasi Teknis'; ?></td>
            <td style="text-align: left; background-color: #f5f6fa;">
                <?= $row_spk['ket_akomodasi_spk']; ?></td>
            <td style="text-align: right; background-color: #f5f6fa;">
                <?= number_format($row_spk['jml_akomodasi_spk'], 0); ?></td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <?= '2' ?></td>
            <td style="text-align: left;">
                <?= 'Uang Transportasi'; ?></td>
            <td style="text-align: left;">
                <?= $row_spk['ket_transportasi_spk']; ?></td>
            <td style="text-align: right;">
                <?= number_format($row_spk['jml_transportasi_spk'], 0); ?></td>
        </tr>
        <tr>
            <td style="text-align: center; background-color: #f5f6fa;">
                <?= '3' ?></td>
            <td style="text-align: left; background-color: #f5f6fa;">
                <?= 'Penginapan / Hotel'; ?></td>
            <td style="text-align: left; background-color: #f5f6fa;">
                <?= $row_spk['ket_penginapan_spk']; ?></td>
            <td style="text-align: right; background-color: #f5f6fa;">
                <?= number_format($row_spk['jml_penginapan_spk'], 0); ?></td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <?= '4' ?></td>
            <td style="text-align: left;">
                <?= 'Uang Lain-Lain'; ?></td>
            <td style="text-align: left;">
                <?= $row_spk['ket_cadangan_spk']; ?></td>
            <td style="text-align: right;">
                <?= number_format($row_spk['jml_cadangan_spk'], 0); ?></td>
        </tr>

        <tr>
            <th colspan="3" style="height: 5px; background-color: #0e509e; color: #ffffff;">JUMLAH PENGAJUAN</th>
            <th style="height: 5px; text-align: right; background-color: #f5f6fa;"><?= number_format($row_spk['jml_akomodasi_spk'] + $row_spk['jml_transportasi_spk'] + $row_spk['jml_penginapan_spk'] + $row_spk['jml_cadangan_spk'], 0); ?></th>
        </tr>

        <tr>
            <th colspan="3" style="height: 5px; background-color: #0e509e; color: #ffffff;">AKOMODASI AWAL YANG DISERAHKAN</th>
            <th style="height: 5px; text-align: right;"><?= number_format($row_spk['jml_akomodasi_spk']/2 + $row_spk['jml_transportasi_spk'] + $row_spk['jml_penginapan_spk'] + $row_spk['jml_cadangan_spk'], 0); ?></th>
        </tr>

        <tr>
            <td colspan="2" style="width: 33%; ">
                Menyetujui,
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                (W Sri Anggraeni)
				<br>
                <b>Finance Accounting</b>
            </td>
            <td style="width: 34%; ">
                Mengetahui,
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                (.................................................................)
				<br>
                <b>Manager Teknik</b>
            </td>
            <td style="width: 33%; ">
                Diterima Oleh,
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= '(' . $row_tekkoor['nama_user'] . ')'; ?><br>
                <b>Koordinator Lapangan</b>
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table id="myTable" cellspacing="0" style="width: 90%; text-align: center; font-size: 10px; padding-top: 0px; margin-left: 45px; color: #000000;">
        <tr>
            <td style="width: 100%; height: 10px; text-align: center; font-size: 16px; vertical-align: text-top; padding-bottom: 20px;">
                <br><strong>LAPORAN PERTANGGUNGJAWABAN AKOMODASI</strong>
            </td>
        </tr>
    </table>

    <div style="page-break-inside: avoid;">
        <table id="myTable" border="0.05px" cellspacing="0" style="width: 90%; text-align: center; font-size: 10px; padding-top: 0px; margin-left: 45px; color: #000000; ">
            <colgroup>
                <col style="width: 32%; padding: 3px 5px;">
                <col style="width: 12%; padding: 3px 5px;">
                <col style="width: 13%; padding: 3px 5px;">
                <col style="width: 14%; padding: 3px 5px;">
                <col style="width: 11%; padding: 3px 5px;">
                <col style="width: 12%; padding: 3px 5px;">
                <col style="width: 6%; padding: 3px 5px;">
            </colgroup>
            <thead>
                <tr>
                    <td style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold;">TOTAL HARI PENGERJAAN</td>
                    <td colspan="2"></td>
                    <td colspan="2" style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold;">TOTAL MALAM MENGINAP</td>
                    <td></td>
                    <td rowspan="2" style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold; vertical-align: middle;">PARAF</td>
                </tr>
            </thead>
            <tr>
                <td style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold;">NAMA PERSONIL</td>
                <td style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold;">UANG SAKU</td>
                <td style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold;">UANG SOPIR</td>
                <td style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold;">UANG MAKAN</td>
                <td style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold;">PENGINAPAN</td>
                <td style="height: 5px; background-color: #0e509e; color: #ffffff; font-weight: bold;">TOTAL/ORG</td>
            </tr>

            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">
                    <?= $row_tekkoor['nama_user']; ?>
                </td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
            </tr>

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

                    if ($i % 2 != 0) {
            ?>
                        <tr>
                            <td style="text-align: left; background-color: #f5f6fa;">
                                <?= $row_tekpel['nama_user']; ?><br>
                            </td>
                            <td style="text-align: left; background-color: #f5f6fa;"></td>
                            <td style="text-align: left; background-color: #f5f6fa;"></td>
                            <td style="text-align: left; background-color: #f5f6fa;"></td>
                            <td style="text-align: left; background-color: #f5f6fa;"></td>
                            <td style="text-align: left; background-color: #f5f6fa;"></td>
                            <td style="text-align: left; background-color: #f5f6fa;"></td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr>
                            <td style="text-align: left;">
                                <?= $row_tekpel['nama_user']; ?><br>
                            </td>
                            <td style="text-align: left;"></td>
                            <td style="text-align: left;"></td>
                            <td style="text-align: left;"></td>
                            <td style="text-align: left;"></td>
                            <td style="text-align: left;"></td>
                            <td style="text-align: left;"></td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table id="myTable" border="0.05px" cellspacing="0" style="width: 90%; text-align: center; font-size: 10px; margin-top: 25px; margin-left: 45px; color: #000000; ">
            <colgroup>
                <col style="width: 30%; padding: 3px 5px;">
                <col style="width: 20%; padding: 3px 5px;">
                <col style="width: 30%; padding: 3px 5px;">
                <col style="width: 20%; padding: 3px 5px;">
            </colgroup>
            <thead>
                <tr>
                    <th style="height: 5px; background-color: #0e509e; color: #ffffff;">BIAYA PENGINAPAN</th>
                    <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NOMINAL</th>
                    <th style="height: 5px; background-color: #0e509e; color: #ffffff;">BIAYA TRANSPORTASI</th>
                    <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NOMINAL</th>
                </tr>
            </thead>

            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">1.</td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;">1. BBM Kendaraan</td>
                <td style="text-align: right; background-color: #f5f6fa;"></td>
            </tr>
            <tr>
                <td style="text-align: left; ">2.</td>
                <td style="text-align: left; "></td>
                <td style="text-align: left; ">2. Parkir Kendaraan</td>
                <td style="text-align: right; "></td>
            </tr>
            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">3.</td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;">3. Sewa Kendaraan</td>
                <td style="text-align: right; background-color: #f5f6fa;"></td>
            </tr>
            <tr>
                <td style="text-align: left; ">4.</td>
                <td style="text-align: left; "></td>
                <td style="text-align: left; ">4. Tiket Pesawat</td>
                <td style="text-align: right; "></td>
            </tr>
            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">5.</td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;">5. Bagasi</td>
                <td style="text-align: right; background-color: #f5f6fa;"></td>
            </tr>

            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">BIAYA LAIN-LAIN</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NOMINAL</th>
                <td style="height: 5px; text-align: left;">6.</td>
                <th style="height: 5px;"></th>
            </tr>
            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">1.</td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;">7.</td>
                <td style="text-align: right; background-color: #f5f6fa;"></td>
            </tr>
            <tr>
                <td style="text-align: left;">2.</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;">8.</td>
                <td style="text-align: right;"></td>
            </tr>
            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">3.</td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;">9.</td>
                <td style="text-align: right; background-color: #f5f6fa;"></td>
            </tr>
            <tr>
                <td style="text-align: left;">4.</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;">10.</td>
                <td style="text-align: right;"></td>
            </tr>
            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">5.</td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
                <td style="text-align: left; background-color: #f5f6fa;">11.</td>
                <td style="text-align: right; background-color: #f5f6fa;"></td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table id="myTable" border="0.05px" cellspacing="0" style="width: 90%; text-align: center; font-size: 10px; margin-top: 25px; padding-top: 0px; margin-left: 45px; color: #000000; ">
            <colgroup>
                <col style="width: 27%; padding: 3px 5px;">
                <col style="width: 23%; padding: 3px 5px;">
                <col style="width: 25%; padding: 3px 5px;">
                <col style="width: 25%; padding: 3px 5px;">
            </colgroup>
            <thead>
                <tr>
                    <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KOMPONEN BIAYA</th>
                    <th style="height: 5px; background-color: #0e509e; color: #ffffff;">SUBTOTAL</th>
                    <th rowspan="5" style="color: #000000;">
                        Mengetahui
                        <br>
						<br>
						<br>
						<br>
						<br>
						<br>
                        (.................................................)
						<br>
                        Manager Teknik
                    </th>
                    <th rowspan="5" style="color: #000000;">
                        Menyetujui
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        (W Sri Anggraeni)
						<br>
                        Finance Accounting
                    </th>
                </tr>
            </thead>

            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">Akomodasi Teknis</td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
            </tr>
            <tr>
                <td style="text-align: left;">Biaya Transportasi</td>
                <td style="text-align: left;"></td>
            </tr>
            <tr>
                <td style="text-align: left; background-color: #f5f6fa;">Biaya Penginapan</td>
                <td style="text-align: left; background-color: #f5f6fa;"></td>
            </tr>
            <tr>
                <td style="text-align: left;">Biaya Lain-lain</td>
                <td style="text-align: left;"></td>
            </tr>

            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff; text-align: left;">TOTAL PENGELUARAN</th>
                <th style="height: 5px; background-color: #f5f6fa;"></th>
                <td colspan="2" rowspan="3" style="height: 5px; text-align: left; vertical-align: top;">Catatan :</td>
            </tr>
            <tr>
                <th style="height: 5px; background-color: #0e509e; text-align: left; color: #ffffff;">TOTAL PENGAJUAN</th>
                <th style="height: 5px; "></th>
            </tr>
            <tr>
                <th style="height: 5px; background-color: #0e509e; text-align: left; color: #ffffff;">KEKURANGAN/KELEBIHAN*</th>
                <th style="height: 5px; background-color: #f5f6fa;"></th>
            </tr>
        </table>
    </div>

    <table id="myTable" cellspacing="0" style="width: 90%; text-align: left; font-size: 8px; margin-top: 3px; padding-top: 0px; margin-left: 45px; color: #000000; ">
        <tr>
            <td style="width: 100%; height: 10px;font-size: 10px; vertical-align: text-top; ">
                <i>*Coret yang tidak perlu</i>
            </td>
        </tr>
    </table>

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