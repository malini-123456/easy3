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
                    ENS10/MM/FRM/04KUP : 02
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

    <table cellspacing="0" style="width: 100%; font-size: 14px; padding: 0px 0px 10px 0; margin-left: 45px; vertical-align: middle; color: #000000;">

        <tr>
            <td colspan="3" style="width: 90%; height: 10px; text-align: center; font-size: 20px; vertical-align: text-top; padding-top: -77px; padding-bottom: 0px;">
                <br><strong>BERITA ACARA PERMOHONAN KALIBRASI</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 20%; text-align: left; padding-bottom: 5px; padding-top: -10px;">
                Kode Project
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px; padding-top: -10px;">
                :
            </td>
            <td style="width: 73%; text-align: left; padding-bottom: 5px; padding-top: -10px;">
                <?= $row1['no_proyek']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%; text-align: left; padding-bottom: 5px; ">
                Nama Pelanggan
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 73%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>

        <tr>
            <td style="width: 20%; text-align: left; padding-bottom: 5px; ">
                Nama Pemilik Alat
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 73%; text-align: left; padding-bottom: 5px; ">
                <?= $row1['namapemilik_proyek']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%; text-align: left; padding-bottom: 5px; ">
                Alamat Pemilik Alat
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 73%; text-align: left; padding-bottom: 5px;">
                <?= $row1['alamatpemilik_proyek']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%; text-align: left; padding-bottom: 5px; ">
                No.Telp / Whatsapp
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 73%; text-align: left; padding-bottom: 5px; ">
                <?= $row1a['kontak_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%; text-align: left; padding-bottom: 5px; ">
                Nama PIC
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 73%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['teknis_pelanggan']; ?>
            </td>
        </tr>
		<tr>
            <td style="width: 20%; text-align: left; padding-bottom: 5px; ">
                Nama Marketing
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">
                :
            </td>
            <td style="width: 73%; text-align: left; padding-bottom: 5px;">
                <?= $row1['marketing_proyek']; ?>
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <!-- <table cellspacing="0" style="width: 90%; font-size: 14px; padding: 15px 0; margin-left: 45px; vertical-align: middle; color: #000000; border: 1px;">
    </table> -->

    <table id="myTable" border="0.05px" cellspacing="0" style="width: 90%; text-align: center; font-size: 12px; padding-top: 0px; margin-left: 45px; color: #000000; ">
        <colgroup>
            <col style="width: 8%; padding: 5px;">
            <col style="width: 30%; padding: 5px;">
            <col style="width: 30%; padding: 5px;">
            <col style="width: 10%; padding: 5px;">
            <col style="width: 22%; padding: 5px;">
        </colgroup>
        <thead>
            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NO</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NAMA ALAT SESUAI PESANAN</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NAMA ALAT SESUAI LAYANAN</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">JUMLAH</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">CATATAN</th>
            </tr>
        </thead>

        <?php

        if ($row_jml_kajiulang > 0) {
            $sno = 0;
            $totalMampu = 0;
            $totalTidakMampu = 0;
            $query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid' ORDER BY id_kajiulang ASC";
            $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
            while ($row_kajiulang = mysqli_fetch_array($result_kajiulang)) {

                $id_layanan = $row_kajiulang['id_layanan'];
                $query_layanan = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                $result_layanan = mysqli_query($conn, $query_layanan) or die(mysqli_error($conn));
                $row_layanan = mysqli_fetch_assoc($result_layanan);

                if ($row_kajiulang['catatan_kajiulang'] === 'Tidak Bisa Dikalibrasi') {
                    $totalTidakMampu = $totalTidakMampu + $row_kajiulang['jumlah_barang_kajiulang'];
                } else {
                    $totalMampu = $totalMampu + $row_kajiulang['jumlah_barang_kajiulang'];
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
                        <td style="text-align: center; background-color: #f5f6fa;">
                            <?= $row_kajiulang['jumlah_barang_kajiulang']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_kajiulang['catatan_kajiulang']; ?></td>
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
                        <td style="text-align: center;">
                            <?= $row_kajiulang['jumlah_barang_kajiulang']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_kajiulang['catatan_kajiulang']; ?></td>
                    </tr>
        <?php
                }
            }
        }
        ?>

        <tr>
            <th colspan="3" style="height: 5px; background-color: #0e509e; color: #ffffff;">JUMLAH ALAT SESUAI PESANAN</th>
            <th style="height: 5px; text-align: center;"><?= number_format($totalMampu + $totalTidakMampu, 0); ?></th>
            <th style="height: 5px; color: #ffffff;"></th>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table id="myTable" border="0.05px" cellspacing="0" style="width: 90%; text-align: left; font-size: 12px; margin-top: 25px; margin-left: 45px; color: #000000; ">
            <colgroup>
                <col style="width: 38%; padding: 5px;">
                <col style="width: 62%; padding: 5px;">
            </colgroup>
            <thead>
                <tr>
                    <th style="height: 5px; background-color: #0e509e; color: #ffffff; ">TANGGAL PERMOHONAN</th>
                    <td style="height: 5px; text-align: left; "><?= date('d F Y', strtotime($row1['tglorder_proyek'])); ?></td>
                </tr>
            </thead>
            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff; ">PERMOHONAN DITERIMA MELALUI</th>
                <td style="height: 5px; text-align: left; "><?= $row1['permohonan_proyek']; ?></td>
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
                        Kalibrasi sesuai data diatas dan bersedia memenuhi persyaratan yang ditetapkan oleh laboratorium
                    </td>
                </tr>

                <tr>
                    <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                        PT Elektromedika Instrumen Tera Nusantara
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
                        <?= '(' . $row1a['nama_pelanggan'] . ')'; ?>
                        <br>
                        <b>Pelanggan</b>
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
                    <td>1. Berita Acara Permohonan Kalibrasi dibuat untuk setiap pelanggan yang melakukan permitaan jasa kalibrasi ke PT. Elektromedika Instrumen Tera</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;Nusantara yang tidak mengajukan Permohonan secara resmi</td>
                </tr>
                <tr>
                    <td>2. Permohonan kalibrasi bisa dilakukan melalui media apapun secara langsung maupun tidak langsung</td>
                </tr>
                <tr>
                    <td>3. Permohonan kalibrasi dapat diproses apabila terdapat bukti bahwa permohonan telah dilakukan</td>
                </tr>
                <tr>
                    <td>4. Persetujuan Permohonan Kalibrasi dapat diinterpretasikan pada Persetujuan Surat Penawaran Harga</td>
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