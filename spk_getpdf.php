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

$query1b = "SELECT * FROM kajiulang WHERE id_proyek='$proyekid'";
$result1b = mysqli_query($conn, $query1b) or die(mysql_error());
$row1b = mysqli_fetch_assoc($result1b);

// $query_jadwal = "SELECT MIN(stgl_kegiatan) AS stgl_kegiatan FROM kegiatan WHERE id_proyek =  '$proyekid' AND jenis_kegiatan='event-primary'";
$query_jadwal = "SELECT MIN(stgl_kegiatan) AS stgl_kegiatan FROM kegiatan WHERE id_proyek =  '$proyekid'";
$result_jadwal = mysqli_query($conn, $query_jadwal) or die(mysqli_error($conn));
$row_jadwal = mysqli_fetch_assoc($result_jadwal);

$query_spk = "SELECT * FROM spk WHERE id_proyek='$proyekid'";
$result_spk = mysqli_query($conn, $query_spk) or die(mysql_error());
$row_spk = mysqli_fetch_assoc($result_spk);
$idtekkoor = $row_spk['koordinator_spk'];

$query_tekkoor = "SELECT * FROM user WHERE id_user='$idtekkoor'";
$result_tekkoor = mysqli_query($conn, $query_tekkoor) or die(mysql_error());
$row_tekkoor = mysqli_fetch_assoc($result_tekkoor);


$layanan_arr = [];
$layanan_jml = [];
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
                    <br><strong>Surat Perintah Kerja Internal</strong>
                </td>
            </tr>
        </table>
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
                <?= date_format(date_create($row_spk['lastupdate_spk']), 'd F Y'); ?>
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
                <?= 'ENS10/SPK/' . $row1['no_proyek']; ?>
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
                1 lembar
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
                1. Surat Perintah Kerja Internal
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 14%; text-align: left;  padding-bottom: 5px; font-weight: bold;">

            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 5px;">

            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 5px;">
                2. Estimasi Jadwal Pelaksanaan Kalibrasi
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 0 0px 0 0; margin-left: 70px; vertical-align: middle; color: #526484;">
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                Kepada Yth.
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                <?= $row1a['alamat_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                UP: <?= $row_spk['up_spk']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                HP: <?= $row_spk['hp_spk']; ?>
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
                Kami PT. Elektromedika Instrumen Tera Nusantara memberitahukan estimasi jadwal
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                pelaksanaan kalibrasi peralatan kesehatan di <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                sebagai berikut (terlampir). Adapun pelaksanaan kalibrasi peralatan kesehatan dilaksanakan
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; padding-bottom: 5px;">
                pada tanggal
                <b><?= date('d F Y', strtotime($row_jadwal['stgl_kegiatan']));  ?></b>. Terima kasih untuk perhatian dan
                kerjasamanya.
            </td>
        </tr>
    </table>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 80%; text-align: left; font-size: 15px; color: #526484; padding-top: 15px; margin-left: 70px;">
            <tr>
                <td style="width: 60%;">
                    Hormat kami,
                    <br>
                    PT. Elektromedika Instrumen Tera Nusantara
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <img style="width: 35%;" src="./images/img/ttd_bos.png"> -->
                    <br>
                    <u>Made Agus Yudiastana, ST</u>
                    <br>
                    Direktur
                </td>
            </tr>
        </table>
    </div>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->


</page>

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
                    <br><strong>Daftar Rincian Alat</strong>
                </td>
            </tr>
        </table>
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

    <!-- //////////////////////////////////////////////////////// -->


    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484;">
        <tr style="padding: 15px 0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                Nama Institusi
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 10px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
    </table>


    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 0; margin-left: 70px; vertical-align: middle; color: #526484;">
        <tr style="padding:0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 0px; font-weight: bold;">
                Rincian Alat
            </td>
        </tr>
    </table>


    <table id="myTable" cellspacing="0"
        style="width: 80%; text-align: center; font-size: 14px; padding-top: 10px; margin-left: 70px; color: #526484;">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 40%">
            <col style="width: 40%">
            <col style="width: 15%">
        </colgroup>
        <thead>
            <tr>
                <th>NO</th>
                <th style="text-align: left; padding-left: 10px;">NAMA SESUAI SP</th>
                <th style="text-align: left; padding-left: 10px;">NAMA LAYANAN</th>
                <th>JUMLAH</th>
            </tr>
        </thead>


        <?php
        require_once('connect.php');

        $sno = 0;
        $jml = 0;
        $query = "SELECT * FROM detailspk WHERE id_proyek='$proyekid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {

            $layananid = $row['id_layanan'];
            $query1c = "SELECT * FROM layanan WHERE id_layanan='$layananid'";
            $result1c = mysqli_query($conn, $query1c) or die(mysql_error());
            $row1c = mysqli_fetch_assoc($result1c);

            $sno++;
            $jml = $jml + $row['jumlahbarang_detailspk'];
            if (array_search($row1c['nama_layanan'], $layanan_arr) != '') {
                $layanan_jml[array_search($row1c['nama_layanan'], $layanan_arr)] = $layanan_jml[array_search($row1c['nama_layanan'], $layanan_arr)] + $row['jumlahbarang_detailspk'];
            } else {
                array_push($layanan_arr, $row1c['nama_layanan']);
                array_push($layanan_jml, $row['jumlahbarang_detailspk']);
            }
            
            if (($sno % 2) == 0) {
        ?>
        <tr>
            <td style="text-align: left; padding: 10px;"><?= $sno; ?></td>
            <td style="text-align: left; padding: 10px;"><?= $row['namabarang_detailspk']; ?></td>
            <td style="text-align: left; padding: 10px;"><?= $row1c['nama_layanan']; ?></td>
            <td style="text-align: center; padding: 10px 0;"><?= $row['jumlahbarang_detailspk']; ?></td>
        </tr>
        <?php
            } else {
            ?>
        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;">
                <?= $sno; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;">
                <?= $row['namabarang_detailspk']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;">
                <?= $row1c['nama_layanan']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?= $row['jumlahbarang_detailspk']; ?></td>
        </tr>
        <?php
            }
        }
        if (($sno % 2) != 0) {
            ?>
        <tr>
            <td colspan="3"
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; padding: 10px; height: 12px;">
                TOTAL JUMLAH BARANG</td>
            <td style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; padding: 10px 0;">
                <?= $jml; ?></td>
        </tr>
        <?php } else { ?>
        <tr>
            <td colspan="3"
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; height: 12px; background-color: #f5f6fa; padding: 10px;">
                TOTAL JUMLAH BARANG</td>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?= $jml; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <br>


    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484;">
            <tr>
                <td colspan="3" style="width: 73%; text-align: left; padding-bottom: 10px;">
                    Catatan: <br>
                </td>
            </tr>

            <tr>
                <td style="width: 35%; text-align: left; padding-bottom: 10px; font-weight: bold;">
                    1. Koordinator Lapangan<br>
                </td>
                <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                    :<br>
                </td>
                <td style="width: 63%; text-align: left; padding-bottom: 10px;">
                    <?= $row_tekkoor['nama_user']; ?><br>
                </td>
            </tr>

            <tr style="padding: 15px 0;">
                <td style="width: 35%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                    2. Pelaksana Teknis<br>
                </td>
                <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                    :<br>
                </td>
                <td style="width: 63%; text-align: left; padding-bottom: 10px;">
                    <br>
                </td>
            </tr>

            <?php
            $dataTek = $row_spk['pelaksana_spk'];
            $dataTekArr = explode(';', $dataTek);

            $j = count($dataTekArr);
            if ($j > 0) {
                for ($i = 0; $i < $j - 1; $i++) {
                    $idTekPel = $dataTekArr[$i];

                    $query_tekpel = "SELECT * FROM teknisi WHERE id_teknisi='$idTekPel'";
                    $result_tekpel = mysqli_query($conn, $query_tekpel) or die(mysql_error());
                    $row_tekpel = mysqli_fetch_assoc($result_tekpel);
            ?>
            <tr style="padding: 15px 0;">
                <td style="width: 14%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                    <br>
                </td>
                <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                    <br>
                </td>
                <td style="width: 51%; text-align: left; padding-bottom: 10px;">
                    <?= $row_tekpel['nama_teknisi']; ?><br>
                </td>
            </tr>
            <?php
                }
            }
            ?>

        </table>
    </div>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="width: 80%; text-align: left; font-size: 15px; color: #526484; padding-top: 15px; margin-left: 70px;">
            <tr>
                <td style="width: 60%;">
                    Pembuat Jadwal,
                    <br>
                    PT. Elektromedika Instrumen Tera Nusantara
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <img style="width: 35%;" src="./images/img/ttd_putu.png"> -->
                    <br>
                    <u>I Putu Cahya Gunawan, S.Tr.Kes</u>
                    <br>
                    Penanggung Jawab Teknis
                </td>
            </tr>
        </table>
    </div>
    <br>
</page>


<!-- /////////////////////////////////////////////////////////////////// -->


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
                    <br><strong>Daftar Rincian Alat</strong>
                </td>
            </tr>
        </table>
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

    <!-- //////////////////////////////////////////////////////// -->

    <table cellspacing="0"
        style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484;">
        <tr style="padding: 15px 0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                Nama Institusi
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 10px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
    </table>

    <table id="myTable" cellspacing="0"
        style="width: 80%; text-align: center; font-size: 14px; padding-top: 10px; margin-left: 70px; color: #526484;">
        <colgroup>
            <col style="width: 10%;">
            <col style="width: 70%">
            <col style="width: 20%">
        </colgroup>
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA SESUAI PRICE LIST</th>
                <th>JUMLAH</th>
            </tr>
        </thead>


        <?php
        $totalLayanan = 0; $sno = 0;
        for ($i=0; $i<sizeof($layanan_arr); $i++) {

            $sno++;
            $totalLayanan = $totalLayanan + $layanan_jml[$i];

            if (($sno % 2) == 0) {
        ?>
        <tr>
            <td style="text-align: left; padding: 10px;"><?= $i+1; ?></td>
            <td style="text-align: left; padding: 10px;"><?= $layanan_arr[$i]; ?></td>
            <td style="text-align: center; padding: 10px;"><?= $layanan_jml[$i]; ?></td>
        </tr>
        <?php
                } else {
        ?>
        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;"><?= $i+1; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;"><?= $layanan_arr[$i]; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px;"><?= $layanan_jml[$i]; ?></td>
        </tr>
        <?php
                }
            }
            if (($sno % 2) != 0) {
                ?>
        <tr style="">
            <!-- <td colspan='3'
                style="text-align: center; padding: 5px; color: #277ABE; font-weight: bold; font-size: 12px; height: 12px; ">
                TOTAL JUMLAH BARANG : <?= $totalLayanan; ?>
            </td> -->
            <td colspan="2"
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; height: 12px; padding: 10px;">
                TOTAL JUMLAH BARANG</td>
            <td style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; padding: 10px 0;">
                <?= $totalLayanan; ?></td>
        </tr>
        <?php } else { ?>
        <tr style="">
            <!-- <td colspan='3'
                style="text-align: center; padding: 5px; background-color: #f5f6fa; color: #277ABE; font-weight: bold; font-size: 12px; height: 12px; ">
                TOTAL JUMLAH BARANG : <?= $totalLayanan; ?>
            </td> -->
            <td colspan="2"
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; height: 12px; background-color: #f5f6fa; padding: 10px;">
                TOTAL JUMLAH BARANG</td>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?= $totalLayanan; ?></td>
        </tr>
        <?php
            }
        ?>
    </table>

    <br>


    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484;">
            <tr>
                <td colspan="3" style="width: 73%; text-align: left; padding-bottom: 10px;">
                    Catatan: <br>
                </td>
            </tr>

            <tr>
                <td style="width: 35%; text-align: left; padding-bottom: 10px; font-weight: bold;">
                    1. Koordinator Lapangan<br>
                </td>
                <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                    :<br>
                </td>
                <td style="width: 63%; text-align: left; padding-bottom: 10px;">
                    <?= $row_tekkoor['nama_user']; ?><br>
                </td>
            </tr>

            <tr style="padding: 15px 0;">
                <td style="width: 35%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                    2. Pelaksana Teknis<br>
                </td>
                <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                    :<br>
                </td>
                <td style="width: 63%; text-align: left; padding-bottom: 10px;">
                    <br>
                </td>
            </tr>

            <?php
            $dataTek = $row_spk['pelaksana_spk'];
            $dataTekArr = explode(';', $dataTek);

            $j = count($dataTekArr);
            if ($j > 0) {
                for ($i = 0; $i < $j - 1; $i++) {
                    $idTekPel = $dataTekArr[$i];

                    $query_tekpel = "SELECT * FROM teknisi WHERE id_teknisi='$idTekPel'";
                    $result_tekpel = mysqli_query($conn, $query_tekpel) or die(mysql_error());
                    $row_tekpel = mysqli_fetch_assoc($result_tekpel);
            ?>
            <tr style="padding: 15px 0;">
                <td style="width: 14%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                    <br>
                </td>
                <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                    <br>
                </td>
                <td style="width: 51%; text-align: left; padding-bottom: 10px;">
                    <?= $row_tekpel['nama_teknisi']; ?><br>
                </td>
            </tr>
            <?php
                }
            }
            ?>

        </table>
    </div>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="width: 80%; text-align: left; font-size: 15px; color: #526484; padding-top: 15px; margin-left: 70px;">
            <tr>
                <td style="width: 60%;">
                    Pembuat Jadwal,
                    <br>
                    PT. Elektromedika Instrumen Tera Nusantara
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <img style="width: 35%;" src="./images/img/ttd_putu.png"> -->
                    <br>
                    <u>I Putu Cahya Gunawan, S.Tr.Kes</u>
                    <br>
                    Penanggung Jawab Teknis
                </td>
            </tr>
        </table>
    </div>
    <br>

</page>


<!-- /////////////////////////////////////////////////////////////////// -->


<page backcolor="#FEFEFE" backtop="45mm" backbottom="10mm" style="font-size: 12pt">
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
                    style="width: 60%; height: 10px; text-align: center; font-size: 14px; padding-top: 5px; vertical-align: text-top; ">
                    <strong>Pengajuan Dana Akomodasi</strong>
                </td>
            </tr>
        </table>
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
        style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484; font-size:12px; ">
        <tr style="padding: 15px 0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 0px; font-weight: bold;">
                Nama Institusi
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 0px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 0px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
        <tr style="padding: 15px 0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 0px; font-weight: bold;">
                Jumlah alat
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 0px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 0px;">
                <?= $totalLayanan; ?>
            </td>
        </tr>
        <tr style="padding: 15px 0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                Tanggal Kerja
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 10px;">
                <?= date('d F Y', strtotime($row_jadwal['stgl_kegiatan']));  ?>
            </td>
        </tr>
    </table>


    <table id="myTable" cellspacing="0"
        style="width: 80%; text-align: center; font-size: 12px; padding-top: 0px; margin-left: 70px; color: #526484;">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 33%">
            <col style="width: 14%">
            <col style="width: 11%;">
            <col style="width: 14%">
            <col style="width: 23%">
        </colgroup>
        <thead>
            <tr>
                <th rowspan="2" style="height: 15px;">NO</th>
                <th rowspan="2" style="height: 15px;">ITEM</th>
                <th colspan="3" style="height: 15px;">NOMINAL PENGELUARAN</th>
                <th rowspan="2" style="height: 15px;">SUBTOTAL</th>
            </tr>
            <tr>
                <th style="height: 15px;">JML TEKNISI</th>
                <th style="height: 15px;">JML HARI</th>
                <th style="height: 15px;">NOMINAL</th>
            </tr>
        </thead>

        <?php
        require_once('connect.php');

        $sno = 0;
        $total = 0;
        $sub1 = 0;
        $sub2 = 0;
        $sub3 = 0;
        $sub4 = 0;
        $query = "SELECT * FROM spk WHERE id_proyek='$proyekid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {

            $sub1 = $row['jml_tek_akomodasi_spk'] * $row['jml_hari_akomodasi_spk'] * $row['jml_nominal_akomodasi_spk'];
            $sub2 = $row['jml_tek_bbm_spk'] * $row['jml_hari_bbm_spk'] * $row['jml_nominal_bbm_spk'];
            $sub3 = $row['jml_tek_penginapan_spk'] * $row['jml_hari_penginapan_spk'] * $row['jml_nominal_penginapan_spk'];
            $sub4 = $row['jml_tek_supir_spk'] * $row['jml_hari_supir_spk'] * $row['jml_nominal_supir_spk'];
            $total = $sub1 + $sub2 + $sub3 + $sub4;
        ?>
        <!-- data akomodasi -->
        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;">
                <?= '1' ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;">
                <?= 'Akomodasi'; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 5px 0;">
                <?= $row['jml_tek_akomodasi_spk']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 5px 0;">
                <?= $row['jml_hari_akomodasi_spk']; ?></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;">
                <?= number_format($row['jml_nominal_akomodasi_spk'], 0); ?></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;">
                <?= number_format($sub1, 0); ?></td>
        </tr>
        <!-- data bbm -->
        <tr>
            <td style="text-align: left; padding: 5px;"><?= '2'; ?></td>
            <td style="text-align: left; padding: 5px;"><?= 'BBM' ?></td>
            <td style="text-align: center; padding: 5px 0;"><?= $row['jml_tek_bbm_spk']; ?></td>
            <td style="text-align: center; padding: 5px 0;"><?= $row['jml_hari_bbm_spk']; ?></td>
            <td style="text-align: right; padding: 5px 0;">
                <?= number_format($row['jml_nominal_bbm_spk'], 0); ?></td>
            <td style="text-align: right; padding: 5px 0;"><?= number_format($sub2, 0); ?></td>
        </tr>
        <!-- data penginapan -->
        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;">
                <?= '3' ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;">
                <?= 'Penginapan'; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 5px 0;">
                <?= $row['jml_tek_penginapan_spk']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 5px 0;">
                <?= $row['jml_hari_penginapan_spk']; ?></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;">
                <?= number_format($row['jml_nominal_penginapan_spk'], 0); ?></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;">
                <?= number_format($sub3, 0); ?></td>
        </tr>
        <!-- data supir -->
        <tr>
            <td style="text-align: left; padding: 5px;"><?= '4'; ?></td>
            <td style="text-align: left; padding: 5px;"><?= 'Supir' ?></td>
            <td style="text-align: center; padding: 5px 0;"><?= $row['jml_tek_supir_spk']; ?></td>
            <td style="text-align: center; padding: 5px 0;"><?= $row['jml_hari_supir_spk']; ?></td>
            <td style="text-align: right; padding: 5px 0;">
                <?= number_format($row['jml_nominal_supir_spk'], 0); ?></td>
            <td style="text-align: right; padding: 5px 0;"><?= number_format($sub4, 0); ?></td>
        </tr>

        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;">.</td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;"></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px;">.</td>
            <td style="text-align: left; padding: 5px;"></td>
            <td style="text-align: center; padding: 5px 0;"></td>
            <td style="text-align: center; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>

        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;">.</td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;"></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px;">.</td>
            <td style="text-align: left; padding: 5px;"></td>
            <td style="text-align: center; padding: 5px 0;"></td>
            <td style="text-align: center; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>

        <!-- <tr>
            <td colspan="6"
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: feft; height: 1px; padding-bottom: 50px; padding-top: 0px; padding-left: 5px; border: 0.3px; ">
                KETERANGAN / UANG CADANGAN:</td>
        </tr> -->

        <tr>
            <td colspan="5"
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; height: 5px; background-color: #f5f6fa; padding: 5px;">
                TOTAL</td>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; background-color: #f5f6fa; padding: 5px 0;">
                <?= 'Rp ' . number_format($total, 0); ?></td>
        </tr>

        <tr>
            <td colspan="2" style="height: 12px; padding: 0px;"></td><br>
            <td colspan="4" style="height: 12px; padding: 0px;"></td><br>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 12px; font-weight: bold; text-align: left; height: 12px;">
                Keterangan : <?= $row['jml_hari_akomodasi_spk']; ?> Hari, <?= $row['jml_tek_akomodasi_spk']; ?> Orang
            </td>
            <td colspan="3" style="font-size: 12px; font-weight: bold; text-align: left; height: 12px;">
                <!-- Diajukan Oleh : -->
            </td>
            <td colspan="1" style="font-size: 12px; font-weight: bold; text-align: center; height: 12px;">
                <!-- Paraf : -->
            </td>
        </tr>

        <?php } ?>
    </table>

    <table cellspacing="0"
        style="width: 95%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484; font-size:12px;">
        <tr>
            <td
                style="width: 84%; color: #277ABE; font-size: 12px; font-weight: bold; text-align: feft; height: 1px; padding-bottom: 15px; padding-top: 0px; padding-left: 5px; ">
                KETERANGAN:</td>
        </tr>
    </table>


    <table id="myTable" cellspacing="0" border="0px"
        style="width: 80%; text-align: center; font-size: 12px; padding-top: 0px; margin-left: 70px; color: #526484;">
        <colgroup>
            <col style="width: 65%">
            <col style="width: 35%">
        </colgroup>
        <thead>
            <tr>
                <th style="padding: 1px 0;">Diajukan Oleh</th>
                <th style="padding: 1px 0;">Paraf</th>
            </tr>
        </thead>

        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 7px; height: 10px;">
                <?= $row_tekkoor['nama_user']; ?></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 7px; height: 10px;"></td>
        </tr>

        <?php require_once('connect.php');        
        $dataTek = $row_spk['pelaksana_spk'];
        $dataTekArr = explode(';', $dataTek);

        $j = count($dataTekArr);
        if ($j > 0) {
            for ($i = 0; $i < $j - 1; $i++) {
                $idTekPel = $dataTekArr[$i];

                $query_tekpel = "SELECT * FROM teknisi WHERE id_teknisi='$idTekPel'";
                $result_tekpel = mysqli_query($conn, $query_tekpel) or die(mysql_error());
                $row_tekpel = mysqli_fetch_assoc($result_tekpel);

                if (($i % 2) == 0) {
        ?>

        <tr>
            <td style="text-align: left; padding: 7px; height: 10px;">
                <?= $row_tekpel['nama_teknisi']; ?></td>
            <td style="text-align: right; padding: 7px; height: 10px;"></td>
        </tr>

        <?php  } else { ?>

        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 7px; height: 10px;">
                <?= $row_tekpel['nama_teknisi']; ?></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 7px; height: 10px;"></td>
        </tr>

        <?php } } } ?>
    </table>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->


    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 80%; text-align: center; font-size: 12px; color: #526484; padding-top: 5px; margin-left: 70px;">
            <tr>
                <td style="width: 50%; ">
                    Mengetahui,
                    <br>
                    <br>
                    <br>
                    ( .......................... )
                </td>
                <td style="width: 50%; ">
                    Menyetujui,
                    <br>
                    <br>
                    <br>
                    ( .......................... )
                </td>
            </tr>
        </table>
    </div>

</page>


<!-- /////////////////////////////////////////////////////////  -->


<page backcolor="#FEFEFE" backtop="45mm" backbottom="10mm" style="font-size: 12pt">
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
                    style="width: 60%; height: 10px; text-align: center; font-size: 14px; padding-top: 5px; vertical-align: text-top; ">
                    <strong>Laporan Pertanggungjawaban Teknisi</strong>
                </td>
            </tr>
        </table>
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
        style="width: 80%; font-size: 14px; padding: 15px 0; margin-left: 70px; vertical-align: middle; color: #526484; font-size:12px; ">
        <tr style="padding: 15px 0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 0px; font-weight: bold;">
                Nama Institusi
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 0px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 0px;">
                <?= $row1a['nama_pelanggan']; ?>
            </td>
        </tr>
        <tr style="padding: 15px 0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 0px; font-weight: bold;">
                Jumlah alat
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 0px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 0px;">
                <?= $totalLayanan; ?>
            </td>
        </tr>
        <tr style="padding: 15px 0;">
            <td style="width: 25%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                Tanggal Kerja
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :
            </td>
            <td style="width: 51%; text-align: left; padding-bottom: 10px;">
                <?= date('d F Y', strtotime($row_jadwal['stgl_kegiatan']));  ?>
            </td>
        </tr>
    </table>



    <!-- /////////////////////////////////////////////////////////////////// -->

    <!-- <div style="page-break-inside: avoid;"> -->
    <table id="myTable" cellspacing="0" border="0.05px"
        style="width: 95%; text-align: center; font-size: 12px; padding-top: 0px; margin-left: 25px; color: #526484;">
        <colgroup>
            <col style="width: 30%">
            <col style="width: 11%">
            <col style="width: 11%;">
            <col style="width: 11%">
            <col style="width: 11%">
            <col style="width: 16%">
            <col style="width: 10%">
        </colgroup>
        <thead>
            <tr>
                <th rowspan="2" style="height: 15px;">Nama</th>
                <th colspan="4" style="height: 15px;">Beban Perjalanan Teknisi</th>
                <th rowspan="2" style="height: 15px;">Total Per Teknisi</th>
                <th rowspan="2" style="height: 15px;">Paraf</th>
            </tr>
            <tr>
                <th style="height: 15px;">Uang Saku</th>
                <th style="height: 15px;">Uang Sopir</th>
                <th style="height: 15px;">Uang Makan</th>
                <th style="height: 15px;">Penginapan</th>
            </tr>
        </thead>

        <tr>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;">
                <?= $row_tekkoor['nama_user']; ?></td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
        </tr>

        <?php require_once('connect.php');        
        $dataTek = $row_spk['pelaksana_spk'];
        $dataTekArr = explode(';', $dataTek);

        $j = count($dataTekArr); $sno=0;
        if ($j > 0) {
            for ($i = 0; $i < $j - 1; $i++) {
                $sno++;
                $idTekPel = $dataTekArr[$i];

                $query_tekpel = "SELECT * FROM teknisi WHERE id_teknisi='$idTekPel'";
                $result_tekpel = mysqli_query($conn, $query_tekpel) or die(mysql_error());
                $row_tekpel = mysqli_fetch_assoc($result_tekpel);

                if (($i % 2) == 0) {
        ?>

        <tr>
            <td style="text-align: left; padding: 5px;">
                <?= $row_tekpel['nama_teknisi']; ?></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>

        <?php  } else { ?>

        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 5px;">
                <?= $row_tekpel['nama_teknisi']; ?></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 5px 0;"></td>
        </tr>

        <?php } } } ?>

        <?php 
        if (($sno % 2) != 0) {
        ?>
        <tr>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; height: 5px; padding: 5px; background-color: #f5f6fa;">
                Total Per Komponen</td>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0; background-color: #f5f6fa;">
            </td>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0; background-color: #f5f6fa;">
            </td>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0; background-color: #f5f6fa;">
            </td>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0; background-color: #f5f6fa;">
            </td>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0; background-color: #f5f6fa;">
            </td>
        </tr>

        <?php } else { ?>

        <tr>
            <td
                style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: center; height: 5px; padding: 5px;">
                Total Per Komponen</td>
            <td style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0;">
            </td>
            <td style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0;">
            </td>
            <td style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0;">
            </td>
            <td style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0;">
            </td>
            <td style="color: #277ABE; font-size: 12px; font-weight: bold; text-align: right; padding: 5px 0;">
            </td>
        </tr>

        <?php } ?>
    </table>
    <!-- </div> -->

    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->


    <table id="myTable" cellspacing="0" border="0.05px"
        style="width: 95%; text-align: center; font-size: 12px; padding-top: 0px; margin-left: 25px; color: #526484;">
        <colgroup>
            <col style="width: 30%">
            <col style="width: 20%">
            <col style="width: 30%;">
            <col style="width: 20%">
        </colgroup>
        <thead>
            <tr>
                <th style="height: 15px;">Biaya Penginapan</th>
                <th style="height: 15px;">Nominal</th>
                <th style="height: 15px;">Biaya Transport</th>
                <th style="height: 15px;">Nominal</th>
            </tr>
        </thead>

        <tr>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;">Klaim Invoice</td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;">Bensin</td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: left; padding: 5px;">Parkir</td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>

        <!-- 2 -->

        <tr>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;"></td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;">Biaya Mobil</td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px;"></td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: left; padding: 5px;">.</td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>

        <!-- 3 -->
        <tr>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;"></td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;">.</td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px; color: #277ABE; font-weight: bold;">Total Biaya Penginapan</td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: left; padding: 5px; color: #277ABE; font-weight: bold;">Total Biaya Transport</td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>

        <!-- 4 -->
        <tr>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa; color: #277ABE; font-weight: bold;">
                Uang Penginapan</td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa; color: #277ABE; font-weight: bold;">
                Uang Transport</td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px; color: #277ABE; font-weight: bold;">Kekurangan/Kelebihan*</td>
            <td style="text-align: right; padding: 5px 0;"></td>
            <td style="text-align: left; padding: 5px; color: #277ABE; font-weight: bold;">Kekurangan/Kelebihan*</td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>
    </table>
    <br>

    <!-- /////////////////////////////////////////////////////////////// -->


    <table id="myTable" cellspacing="0" border="0.05px"
        style="width: 95%; text-align: center; font-size: 12px; padding-top: 0px; margin-left: 25px; color: #526484;">
        <colgroup>
            <col style="width: 60%">
            <col style="width: 40%">
        </colgroup>
        <thead>
            <tr>
                <th style="height: 15px;">Biaya Lain-lain</th>
                <th style="height: 15px;">Nominal</th>
            </tr>
        </thead>

        <tr>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;">.</td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px;">.</td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px; background-color: #f5f6fa;">.</td>
            <td style="text-align: right; padding: 5px 0; background-color: #f5f6fa;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px; color: #277ABE; font-weight: bold;">Total Biaya Lain-lain</td>
            <td style="text-align: right; padding: 5px 0;"></td>
        </tr>
    </table>
    <br>


    <table id="myTable" cellspacing="0" border="0px"
        style="width: 95%; text-align: center; font-size: 12px; padding-top: 0px; margin-left: 25px; color: #526484;">
        <colgroup>
            <col style="width: 100%">
        </colgroup>
        <tr>
            <td style="text-align: left; padding: 5px; color: #277ABE; font-weight: bold;">Total Penggunaan Dana Cash
                Advance Saat Pengajuan:</td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px; color: #277ABE; font-weight: bold;">Total Kekurangan/Kelebihan*
                Cash Advance:</td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px;"></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 5px; font-size: 9px">Keterangan: * (coret yang tidak perlu)</td>
        </tr>
    </table>


    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 80%; text-align: center; font-size: 12px; color: #526484; padding-top: 15px; margin-left: 70px;">
            <tr>
                <td style="width: 50%; ">
                    Mengetahui,
                    <br>
                    <br>
                    <br>
                    ( .......................... )
                </td>
                <td style="width: 50%; ">
                    Menyetujui,
                    <br>
                    <br>
                    <br>
                    ( .......................... )
                </td>
            </tr>
        </table>
    </div>

</page>