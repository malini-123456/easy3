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
?>


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
<page backcolor="#FFFFFF" backtop="40mm" backbottom="10mm" style="font-size: 12pt"> <!-- #FEFEFE -->
    <page_header>
        <table style="width: 90%; text-align: center; font-size: 14px; margin: 0px 0 0 45px; border: 0px; color: #000000;">
            <tr>
                <td style="width: 100%; color: #444444; vertical-align: text-top; padding: 0px 20px 20px 25px; border-width: 0px;">
                    <img style=" text-align: center; width: 70%;" src="./images/img/header_new.png">
                </td>
            </tr>
        </table>

    </page_header>
    <page_footer>
        <table style="width: 90%; margin-left: 40px; ">
            <tr>
                <td style="text-align: left; font-size: 10px; width: 80%">
                    ENS10/MT/FRM/KUP22 : 02
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

    <table cellspacing="0" style="width: 100%; font-size: 14px; padding: 5px 0px 10px 0; margin-left: 45px; vertical-align: middle; color: #000000;">

        <tr>
            <td colspan="6" style="width: 90%; height: 10px; text-align: center; font-size: 20px; vertical-align: text-top; padding: -75px 0 15px -75px;">
                <br><strong>KAJIULANG PERMINTAAN, TENDER DAN KONTRAK</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; padding-bottom: 5px; ">
                Nama Pelanggan
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 47%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
            <td style="width: 9%; text-align: left; padding-bottom: 5px; ">
                Kode Project
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= $row1['no_proyek']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; padding-bottom: 5px; ">
                Nama Pemilik Alat
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 47%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= $row1['namapemilik_proyek']; ?>
            </td>
            <td style="width: 9%; text-align: left; padding-bottom: 5px; ">
                Tanggal Order
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= date('d F Y', strtotime($row1['tglorder_proyek'])); ?>
            </td>
        </tr>
        <tr>
            <td style="width: 12%; text-align: left; padding-bottom: 5px; ">
                Alamat Pemilik Alat
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 47%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= $row1['alamatpemilik_proyek']; ?>
            </td>
            <td style="width: 9%; text-align: left; padding-bottom: 5px; ">
                Marketing
            </td>
            <td style="width: 1%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 30%; text-align: left; padding-bottom: 5px; font-weight: bold;">
                <?= $row1['marketing_proyek']; ?>
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table id="myTable" border="0.05px" cellspacing="0" style="width: 95%; text-align: center; font-size: 10px; padding-top: 0px; margin-left: 45px; color: #000000; ">
        <colgroup>
            <col style="width: 4%; padding: 5px;">
            <col style="width: 20%; padding: 5px;">
            <col style="width: 20%; padding: 5px;">
            <col style="width: 14%; padding: 5px;">
            <col style="width: 16%; padding: 5px;">
            <col style="width: 6%; padding: 5px;">
            <col style="width: 4%; padding: 5px;">
            <col style="width: 4%; padding: 5px;">
            <col style="width: 4%; padding: 5px;">
            <col style="width: 4%; padding: 5px;">
            <col style="width: 4%; padding: 5px;">
        </colgroup>
        <thead>
            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NO</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NAMA ALAT SESUAI PESANAN</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NAMA ALAT SESUAI LAYANAN</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KATEGORI</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">PENYEDIA</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">JUMLAH</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KP</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KAL</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">BPL</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KPK</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">KMK</th>
            </tr>
        </thead>

        <?php

        if ($row_jml_kajiulang > 0) {
            $sno = 0;
            $totalMampu = 0;
            $totalTidakMampu = 0;
            $insitu = 0;
            $eksitu = 0;
            $subkon = 0;

            $query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid' ORDER BY id_kajiulang ASC";
            $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
            while ($row_kajiulang = mysqli_fetch_array($result_kajiulang)) {

                $id_layanan = $row_kajiulang['id_layanan'];
                $query_layanan = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                $result_layanan = mysqli_query($conn, $query_layanan) or die(mysqli_error($conn));
                $row_layanan = mysqli_fetch_assoc($result_layanan);

                if ($row_kajiulang['kategori_kajiulang'] === 'Tidak Bisa Dikalibrasi') {
                    $totalTidakMampu = $totalTidakMampu + $row_kajiulang['jumlah_barang_kajiulang'];
                } else {
                    $totalMampu = $totalMampu + $row_kajiulang['jumlah_barang_kajiulang'];
                }

                if ($row_kajiulang['kategori_kajiulang'] === 'Insitu') {
                    $insitu = $insitu + $row_kajiulang['jumlah_barang_kajiulang'];
                } else if ($row_kajiulang['kategori_kajiulang'] === 'Eksitu') {
                    $eksitu = $eksitu + $row_kajiulang['jumlah_barang_kajiulang'];
                } else if ($row_kajiulang['kategori_kajiulang'] === 'Subkontrak') {
                    $subkon = $subkon + $row_kajiulang['jumlah_barang_kajiulang'];
                }

                $sno++;
                if ($sno % 2 != 0) {
        ?>
                    <tr>
                        <td style="text-align: center; background-color: #f5f6fa;">
                            <?= $sno; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_kajiulang['nama_barang_kajiulang']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_layanan['nama_layanan']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_kajiulang['kategori_kajiulang']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_kajiulang['penyedia_kajiulang']; ?></td>
                        <td style="text-align: center; background-color: #f5f6fa;">
                            <?= $row_kajiulang['jumlah_barang_kajiulang']; ?></td>
                        <td style="text-align: center; background-color: #f5f6fa; ">
                            <?php if ($row_kajiulang['kp_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                        <td style="text-align: center; background-color: #f5f6fa; ">
                            <?php if ($row_kajiulang['kal_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                        <td style="text-align: center; background-color: #f5f6fa; ">
                            <?php if ($row_kajiulang['bpl_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                        <td style="text-align: center; background-color: #f5f6fa; ">
                            <?php if ($row_kajiulang['kpk_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                        <td style="text-align: center; background-color: #f5f6fa; ">
                            <?php if ($row_kajiulang['kmk_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td style="text-align: center;">
                            <?= $sno; ?></td>
                        <td style="text-align: left;">
                            <?= $row_kajiulang['nama_barang_kajiulang']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_layanan['nama_layanan']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_kajiulang['kategori_kajiulang']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_kajiulang['penyedia_kajiulang']; ?></td>
                        <td style="text-align: center;">
                            <?= $row_kajiulang['jumlah_barang_kajiulang']; ?></td>
                        <td style="text-align: center; ">
                            <?php if ($row_kajiulang['kp_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                        <td style="text-align: center; ">
                            <?php if ($row_kajiulang['kal_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                        <td style="text-align: center; ">
                            <?php if ($row_kajiulang['bpl_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                        <td style="text-align: center; ">
                            <?php if ($row_kajiulang['kpk_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                        <td style="text-align: center; ">
                            <?php if ($row_kajiulang['kmk_kajiulang'] == 'Ya') { ?>
                                <img style="width:15px;" src="./images/img/check2jpg.jpg">
                            <?php } else { ?>
                                <img style="width:15px;" src="./images/img/close2jpg.jpg">
                            <?php } ?>
                        </td>
                    </tr>
        <?php
                }
            }
        }
        ?>
        <!-- 
        <tr>
            <th colspan="3" style="height: 5px; background-color: #0e509e; color: #ffffff;">JUMLAH ALAT SESUAI PESANAN</th>
            <th style="height: 5px; text-align: right;"><?= number_format($totalMampu + $totalTidakMampu, 0); ?></th>
            <th style="height: 5px; background-color: #0e509e; color: #ffffff;"></th>
        </tr> -->
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table id="myTable" border="0.05px" cellspacing="0" style="width: 95%; text-align: center; font-size: 10px; padding-top: 0px; margin-left: 45px; color: #000000; ">
            <colgroup>
                <col style="width: 4%; padding: 5px;">
                <col style="width: 20%; padding: 5px;">
                <col style="width: 20%; padding: 5px;">
                <col style="width: 14%; padding: 5px;">
                <col style="width: 16%; padding: 5px;">
                <col style="width: 6%; padding: 5px;">
                <col style="width: 4%; padding: 5px;">
                <col style="width: 4%; padding: 5px;">
                <col style="width: 4%; padding: 5px;">
                <col style="width: 4%; padding: 5px;">
                <col style="width: 4%; padding: 5px;">
            </colgroup>
            <thead>
                <tr>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                    <th style="height: 0px; background-color: #0e509e; color: #ffffff;"></th>
                </tr>
            </thead>

            <tr>
                <td colspan="4" rowspan="5" style="text-align: left; vertical-align: top; padding: 15px; ">
                    <b>Keterangan :</b>
                    <br>
                    1. Hasil kaji ulang permintaan berdasarkan dengan nama alat pada Permohonan Kalibrasi yang diajukan
                    <br>
                    &nbsp;&nbsp;&nbsp; pelanggan kepada pihak laboratorium
                    <br>
                    2. Apabila terjadi kekeliruan dalam kaji ulang peralatan akan disesuaikan pada proses pengerjaan /
                    <br>
                    &nbsp;&nbsp;&nbsp; pengambilan data kalibrasi dan didokumentasikan pada Laporan Ketidaksesuaian Pekerjaan yang
                    <br>
                    &nbsp;&nbsp;&nbsp; disetujui antara pelanggan dan laboratorium
                </td>
                <td style="text-align: right; background-color: #f5f6fa;">JUMLAH ALAT MAMPU</td>
                <td style="text-align: center; background-color: #f5f6fa;"><?= $totalMampu; ?></td>
                <td style="text-align: left; background-color: #f5f6fa; ">KP</td>
                <td colspan="4" style="text-align: left; background-color: #f5f6fa; ">Kesiapan Personil</td>
            </tr>
            <tr>
                <td style="text-align: right; ">JUMLAH ALAT TIDAK MAMPU</td>
                <td style="text-align: center; "><?= $totalTidakMampu; ?></td>
                <td style="text-align: left;  ">KAL</td>
                <td colspan="4" style="text-align: left;  ">Kondisi Akomodasi Lingkungan</td>
            </tr>
            <tr>
                <td style="text-align: right; background-color: #f5f6fa;">JUMLAH INSITU</td>
                <td style="text-align: center; background-color: #f5f6fa;"><?= $insitu; ?></td>
                <td style="text-align: left; background-color: #f5f6fa; ">BPL</td>
                <td colspan="4" style="text-align: left; background-color: #f5f6fa; ">Beban Pekerjaan Laporatorium</td>
            </tr>
            <tr>
                <td style="text-align: right; ">JUMLAH EKSITU</td>
                <td style="text-align: center; "><?= $eksitu; ?></td>
                <td style="text-align: left;  ">KPK</td>
                <td colspan="4" style="text-align: left;  ">Kondisi Peralatan Kalibrasi</td>
            </tr>
            <tr>
                <td style="text-align: right; background-color: #f5f6fa;">JUMLAH SUBKON</td>
                <td style="text-align: center; background-color: #f5f6fa;"><?= $subkon; ?></td>
                <td style="text-align: left; background-color: #f5f6fa; ">KMK</td>
                <td colspan="4" style="text-align: left; background-color: #f5f6fa; ">Kesesuaian Metode Kerja</td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table id="myTable" cellspacing="0" style="width: 90%; text-align: center; font-size: 12px; padding-top: 20px; margin-left: 45px; color: #000000; ">
            <tr>
                <td style="width: 33%; ">
                    Persetujuan Pelanggan
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= '(' . $row1a['nama_pelanggan'] . ')'; ?><br>
                    <b>Pelanggan</b>
                </td>
                <td style="width: 34%; ">
                    Pelaksana Kaji Ulang Permintaan
                    <br>
					&nbsp;&nbsp;&nbsp;
					<img style="width: 30%;" src="./images/img/ttd_wagis02.jpeg">
					<br>
					(Ni Made Wagiswari Dwara)
					<br>
					<b>Admin Teknik</b>
                </td>
                <td style="width: 33%; ">
                    Mengetahui
                    <br>
					&nbsp;&nbsp;&nbsp;
					<img style="width: 30%;" src="./images/img/ttd_putu_new.jpg">
					<br>
                    (Dewa Gde Ardha Putra, S.T.)<br>
                    <b>Penanggung Jawab Lab</b>
                </td>
            </tr>
        </table>
    </div>

    <!-- /////////////////////////////////////////////////////////////////// -->

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