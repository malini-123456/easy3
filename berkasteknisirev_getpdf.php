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

$query_berkasteknisi = "SELECT * FROM berkasteknisi WHERE id_proyek = '$proyekid'";
$result_berkasteknisi = mysqli_query($conn, $query_berkasteknisi) or die(mysqli_error($conn));
$row_berkasteknisi = mysqli_fetch_assoc($result_berkasteknisi);
$row_jml_berkasteknisi = mysqli_num_rows($result_berkasteknisi);

$query_berkasteknisiD = "SELECT MIN(lastupdate_berkasteknisi) AS lastupdate_berkasteknisi FROM berkasteknisi WHERE id_proyek = '$proyekid'";
$result_berkasteknisiD = mysqli_query($conn, $query_berkasteknisiD) or die(mysqli_error($conn));
$row_berkasteknisiD = mysqli_fetch_assoc($result_berkasteknisiD);

$query_spk = "SELECT * FROM spk WHERE id_proyek = '$proyekid'";
$result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
$row_spk = mysqli_fetch_assoc($result_spk);
$idtekkoor = $row_spk['koordinator_spk'];

$query_tekkoor = "SELECT * FROM user WHERE id_user='$idtekkoor'";
$result_tekkoor = mysqli_query($conn, $query_tekkoor) or die(mysqli_error($conn));
$row_tekkoor = mysqli_fetch_assoc($result_tekkoor);
?>

<!-- 0e509e -->

<style type="text/css">
    /* * {
    border: 1px;
} */

    th {
        height: 30px;
        color: #0e509e;
        font-size: 10px;
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
                    ENS10/MT/FRM/29PLT : 02
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

    <table cellspacing="0" style="width: 100%; font-size: 14px; padding: 0px 0px 10px 0; margin-left: 45px; vertical-align: middle; color: #000000;  padding-right: 50px;">

        <tr>
            <td colspan="6" style="width: 90%; height: 10px; text-align: center; font-size: 20px; vertical-align: text-top; padding-top: -70px; padding-bottom: 30px; padding-left: -50px;">
                <br><strong>PEMINJAMAN DAN PENGEMBALIAN KALIBRATOR</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 15%; text-align: left;  padding-top: -10px;">
                Kode Project
            </td>
            <td style="width: 2%; text-align: left;  padding-top: -10px;">
                :
            </td>
            <td style="width: 31%; text-align: left;  padding-top: -10px;">
                <?= $row1['no_proyek']; ?>
            </td>
            <td style="width: 19%; text-align: left;  padding-top: -10px;">
                Tanggal Peminjaman
            </td>
            <td style="width: 2%; text-align: left;  padding-top: -10px;">
                :
            </td>
            <td style="width: 31%; text-align: left;  padding-top: -10px;">
                <?= date('d F Y', strtotime($row_berkasteknisiD['lastupdate_berkasteknisi'])); ?>
            </td>
        </tr>
        <tr>
            <td style="width: 15%; text-align: left; ">
                Nama Pelanggan
            </td>
            <td style="width: 2%; text-align: left; ">
                :
            </td>
            <td style="width: 31%; text-align: left; ">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
            <td style="width: 19%; text-align: left;  ">
                Koordinator Lapangan
            </td>
            <td style="width: 2%; text-align: left; ">
                :
            </td>
            <td style="width: 31%; text-align: left; ">
                <?= $row_tekkoor['nama_user']; ?>
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <!-- <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000; border: 1px;">
    </table> -->

    <table id="myTable" border="0.05px" cellspacing="0" style="width: 90%; text-align: center; font-size: 10px; margin-top: 10px; padding-top: 0px; margin-left: 45px; color: #000000; ">
        <colgroup>
            <col style="width: 7%; padding: 5px;">
            <col style="width: 30%; padding: 5px;">
            <col style="width: 17%; padding: 5px;">
            <col style="width: 17%; padding: 5px;">
            <col style="width: 19%; padding: 5px;">
            <!-- <col style="width: 11%; padding: 5px;"> -->
            <!-- <col style="width: 13%; padding: 5px;"> -->
            <col style="width: 10%; padding: 5px;">
        </colgroup>
        <thead>
            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NO</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NAMA ALAT</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">MERK</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">TYPE</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NO SERI</th>
                <!-- <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KONDISI</th> -->
                <!-- <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KELENGKAPAN</th> -->
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KEMBALI</th>
            </tr>
        </thead>

        <?php

        if ($row_jml_berkasteknisi > 0) {
            $sno = 0;
            $query_berkasteknisi = "SELECT * FROM berkasteknisi WHERE id_proyek = '$proyekid' ORDER BY id_berkasteknisi ASC";
            $result_berkasteknisi = mysqli_query($conn, $query_berkasteknisi) or die(mysqli_error($conn));
            while ($row_berkasteknisi = mysqli_fetch_array($result_berkasteknisi)) {

                $id_alat = $row_berkasteknisi['id_alat'];
                $query_alat = "SELECT * FROM alatkalibrasi WHERE id_alat = '$id_alat'";
                $result_alat = mysqli_query($conn, $query_alat) or die(mysqli_error($conn));
                $row_alat = mysqli_fetch_assoc($result_alat);

                $sno++;
                if ($sno % 2 != 0) {
        ?>
                    <tr>
                        <td style="text-align: center; background-color: #f5f6fa;">
                            <?= $sno; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_alat['nama_alat']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_alat['merek']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_alat['tipe']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_alat['no_seri']; ?></td>
                        <!-- <td style="text-align: left; background-color: #f5f6fa;"> -->
                        <!-- <?= $row_berkasteknisi['kondisi_berkasteknisi']; ?></td> -->
                        <!-- <td style="text-align: left; background-color: #f5f6fa;"> -->
                        <!-- <?= $row_berkasteknisi['kelengkapan_berkasteknisi']; ?></td> -->
                        <td style="text-align: center; background-color: #f5f6fa; ">
                            <!-- <?php if ($row_berkasteknisi['kembali_berkasteknisi'] == 'Y') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?> -->
                        </td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td style="text-align: center;">
                            <?= $sno; ?></td>
                        <td style="text-align: left;">
                            <?= $row_alat['nama_alat']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_alat['merek']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_alat['tipe']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_alat['no_seri']; ?></td>
                        <!-- <td style="text-align: left;"> -->
                        <!-- <?= $row_berkasteknisi['kondisi_berkasteknisi']; ?></td> -->
                        <!-- <td style="text-align: left;"> -->
                        <!-- <?= $row_berkasteknisi['kelengkapan_berkasteknisi']; ?></td> -->
                        <td style="text-align: center; ">
                            <!-- <?php if ($row_berkasteknisi['kembali_berkasteknisi'] == 'Y') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?> -->
                        </td>
                    </tr>
        <?php
                }
            }
        }
        ?>

    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table id="myTable" border="0.05px" cellspacing="0" style="width: 90%; text-align: left; font-size: 10x; margin-top: 25px; margin-left: 45px; color: #000000; ">
            <colgroup>
                <col style="width: 42%; padding: 7px;">
                <col style="width: 58%; padding: 7px;">
            </colgroup>
            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff; ">
                    <b style="font-size: 14px;">CATATAN PENGEMBALIAN</b>
                    <br>
                    <br>
                    Dicantumkan apabila terjadi kerusakan / malfungsi / kehilangan / kondisi lainnya pada unit / aksesoris peralatan kalibrator
                </th>
                <td style="height: 5px; text-align: left; "></td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 25px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Saya yang bertandatangan dibawah ini menyatakan memang benar telah mengajukan Permohonan
                </td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    Peminjaman Peralatan Kalibrator sesuai data diatas dan bersedia memenuhi persyaratan yang ditetapkan
                </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                    oleh laboratorium PT Elektromedika Instrumen Tera Nusantara
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; text-align: center; font-size: 14px; color: #000000; padding-top: 5px; margin-left: 30px;">
            <tr>
                <td style="width: 50%;">
                    Pemohon,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= '(' . $row_tekkoor['nama_user'] . ')'; ?>
                    <br>
                    <b>Koordinator Lapangan</b>
                </td>
                <td style="width: 50%;">
                    Diterima Oleh,
                    <br>
					&nbsp;&nbsp;&nbsp;
					<img style="width: 30%;" src="./images/img/ttd_wagis02.jpeg">
					<br>
                    (Ni Made Wagiswari Dwara)
                    <br>
                    <b>Admin Teknik</b>
                </td>
            </tr>
        </table>
    </div>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0" style="width: 90%; text-align: left; font-size: 10px; color: #000000; margin-top: 25px; margin-left: 45px; padding: 5px; border: 0.05px;">
            <tr>
                <td style="width: 100%;"><b>Keterangan :</b></td>
            </tr>
            <tr>
                <td>1. Koordinator lapangan bertanggung jawab terhadap peralatan kalibrator yang digunakan selama masa proses peminjaman kalibrator termasuk tahapan</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;pengangkutan, pengemasan (Packing Pengiriman), pengembalian kalibrator pada tempat penyimpanan</td>
            </tr>
            <tr>
                <td>2. Koordinator lapangan bertanggung jawab melaporkan pengembalian kalibrator kepada Admin Teknis setelah selesai peminjaman</td>
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