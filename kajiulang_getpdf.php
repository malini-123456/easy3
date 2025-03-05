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
    
    // $query1d = "SELECT * FROM user WHERE id_user='$userid'";
    // $result1d = mysqli_query($conn, $query1d) or die(mysql_error());
    // $row1d = mysqli_fetch_assoc($result1d);

    // $query1e = "SELECT * FROM user WHERE id_user='$appid'";
    // $result1e = mysqli_query($conn, $query1e) or die(mysql_error());
    // $row1e = mysqli_fetch_assoc($result1e);

    $query1b = "SELECT * FROM kajiulang WHERE id_proyek='$proyekid'";
    $result1b = mysqli_query($conn, $query1b) or die(mysql_error());
    $row1b = mysqli_fetch_assoc($result1b);

    $query1c = "SELECT * FROM kajiulangmain WHERE id_proyek='$proyekid'";
    $result1c = mysqli_query($conn, $query1c) or die(mysql_error());
    $row1c = mysqli_fetch_assoc($result1c);

    // $query1c = "SELECT * FROM barang WHERE id_barang='$barangid'";
    // $result1c= mysqli_query($conn, $query1c) or die(mysql_error());
    // $row1c = mysqli_fetch_assoc($result1c);
        
    // $penyedia = $row1c['id_penyedia'];
    // $query1f = "SELECT * FROM penyedia WHERE id_penyedia = '$penyedia'";
    // $result1f = mysqli_query($conn, $query1f) or die(mysql_error());
    // $row1f = mysqli_fetch_assoc($result1f);

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
    /* background: #0f77ad; */
    color: #277ABE;
    font-weight: bold;
    font-size: 12px;
}
</style>
<page backcolor="#FEFEFE" backtop="35mm" backbottom="10mm" style="font-size: 12pt">
    <page_header>
        <table cellspacing="0"
            style="width: 95%; text-align: center; font-size: 12px; margin: 25px 0 0 25px; border: 0px; color: #526484;">
            <tr>
                <td rowspan="3"
                    style="width: 30%; color: #444444; text-align: right; vertical-align: middle; padding: 0px 10px 0 0; border-width: 0px;">
                    <img style="width: 45%;" src="./images/img/ens_logo.jpg"><br>
                </td>
                <td style="width: 45%; height: 10px; text-align: center; font-size: 20px; vertical-align: middle; ">
                    <b>PT. Elektromedika Instrumen Tera Nusantara</b><br>
                </td>
            </tr>
            <tr>
                <td style="width: 45%; height: 10px; text-align: center; font-size: 18px; vertical-align: text-top; ">
                    <small>Kaji Ulang Permintaan, Tender dan Kontrak</small>
                </td>
            </tr>
            <tr>
                <td style="width: 45%; height: 10px; text-align: center; font-size: 18px; vertical-align: text-top; ">
                    <small>ENS10/MT/FRM/22KUPTK</small>
                </td>
            </tr>
        </table>
        <table style="width: 95%; margin: 10px 25px 0 25px">
            <tr>
                <td style="text-align: left; width: 100%">
                    <hr>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 95%; margin-left: 25px;">
            <tr>
                <td colspan="2" style="text-align: left; font-size: 10px; width: 100%; color: #526484;">
                    Keterangan : Kesiapan Personel (KP), Kondisi Akomodasi dan Lingkungan (KAL), Beban Pekerjaan
                    Laboratorium
                    (BPL), Kondisi Peralatan Kalibrasi (KPK), Kesesuaian Metode Kalibrasi (KMK)
                </td>
            </tr>
            <tr>
                <td style="text-align: left; width: 85%">
                    <hr>
                </td>
                <td style="text-align: right; width: 15%; font-size: 10px;">
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
        style="width: 95%; font-size: 14px; padding: 15px 0; margin-left: 25px; vertical-align: middle; color: #526484;">
        <tr>
            <td style="width: 20%; text-align: left; padding-bottom: 10px; font-weight: bold;">
                Nama Pelanggan<br>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :<br>
            </td>
            <td style="width: 41%; text-align: left; padding-bottom: 10px;">
                <?= $row1a['nama_pelanggan']; ?><br>
            </td>
            <td style="width: 14%; text-align: left; padding-bottom: 10px; font-weight: bold;">
                No. Proyek<br>
            </td>
            <td style="width: 3%; text-align: left; padding-bottom: 10px;">
                :<br>
            </td>
            <td style="width: 20%; text-align: left; padding-bottom: 10px;">
                <?= $row1['no_proyek']; ?><br>
                <!-- <?= date("d / M / Y", strtotime($row1['create_proyek'])); ?><br> -->
            </td>
        </tr>

        <tr style="padding: 15px 0;">
            <td style="width: 20%; text-align: left;  padding-bottom: 10px; font-weight: bold;">
                Alamat<br>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :<br>
            </td>
            <td style="width: 41%; text-align: left; padding-bottom: 10px;">
                <?= $row1a['alamat_pelanggan']; ?><br>
            </td>
            <td style="width: 14%; text-align: left; padding-bottom: 10px; font-weight: bold;">
                Marketing<br>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :<br>
            </td>
            <td style="width: 20%; text-align: left; padding-bottom: 10px;">
                <?= $row1['marketing_proyek']; ?>
            </td>
        </tr>

        <tr>
            <td style="width: 20%; text-align: left; padding-bottom: 10px;  font-weight: bold;">
                No.Telp<br>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :<br>
            </td>
            <td style="width: 41%; text-align: left; padding-bottom: 10px;">
                <?= $row1a['kontak_pelanggan']; ?><br>
            </td>
            <td style="width: 14%; text-align: left; padding-bottom: 10px; font-weight: bold;">
                Estimasi Akomodasi<br>
            </td>
            <td style="width: 2%; text-align: left; padding-bottom: 10px;">
                :<br>
            </td>
            <td style="width: 20%; text-align: left; padding-bottom: 10px;">
                <?= 'Rp. ' . number_format($row1c['akomodasi_kajiulangmain'], 0); ?>
            </td>
        </tr>
    </table>
    <br>

    <!-- /////////////////////////////////////////////////////////////////// -->


    <table id="myTable" cellspacing="0"
        style="width: 95%; text-align: center; font-size: 14px; padding-top: 10px; margin-left: 25px; color: #526484;">
        <colgroup>
            <col style="width: 18%;">
            <col style="width: 20%">
            <col style="width: 8%">
            <col style="width: 14%">
            <col style="width: 15%;">
            <col style="width: 5%">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 5%;">
        </colgroup>
        <thead>
            <tr>
                <th>NAMA SESUAI SP</th>
                <th>NAMA SESUAI PRICE LIST</th>
                <th>JUMLAH</th>
                <th>PENYEDIA</th>
                <th>AKREDITASI</th>
                <th>KP</th>
                <th>KAL</th>
                <th>BPL</th>
                <th>KPK</th>
                <th>KMK</th>
            </tr>
        </thead>


        <?php
            require_once('connect.php');
            
            $sno=0; $totalMampu=0; $totalTidakMampu=0;
            $query = "SELECT * FROM kajiulang WHERE id_proyek='$proyekid' ORDER BY id_layanan ASC";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            while($row = mysqli_fetch_array($result)) {

                $layananid = $row['id_layanan'];
                $query1c = "SELECT * FROM layanan WHERE id_layanan='$layananid'";
                $result1c= mysqli_query($conn, $query1c) or die(mysql_error());
                $row1c = mysqli_fetch_assoc($result1c);

                if ($row['catatan_kajiulang'] === 'Tidak Mampu') {
                    $totalTidakMampu = $totalTidakMampu + $row['jumlah_barang_kajiulang'];
                } else {
                    $totalMampu = $totalMampu + $row['jumlah_barang_kajiulang'];

                    if (array_search($row1c['nama_layanan'], $layanan_arr) != '') {
                        $layanan_jml[array_search($row1c['nama_layanan'], $layanan_arr)] = $layanan_jml[array_search($row1c['nama_layanan'], $layanan_arr)] + $row['jumlah_barang_kajiulang'];
                    } else {
                        array_push($layanan_arr, $row1c['nama_layanan']);
                        array_push($layanan_jml, $row['jumlah_barang_kajiulang']);
                    }
                }
                $sno++;
                if (($sno % 2) == 0) {
        ?>
        <tr>
            <td style="text-align: left; padding: 10px;"><?= $row['nama_barang_kajiulang']; ?></td>
            <td style="text-align: left; padding: 10px;"><?= $row1c['nama_layanan']; ?></td>
            <td style="text-align: center; padding: 10px 0;"><?= $row['jumlah_barang_kajiulang']; ?></td>
            <td style="text-align: center; padding: 10px 0;"><?= $row['penyedia_kajiulang']; ?></td>
            <td style="text-align: center; padding: 10px 0;"><?= $row['catatan_kajiulang']; ?></td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if ($row['kp_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if ($row['kal_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if ($row['bpl_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if ($row['kpk_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if ($row['kmk_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
        </tr>
        <?php
                } else {
        ?>
        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;">
                <?= $row['nama_barang_kajiulang']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;"><?= $row1c['nama_layanan']; ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?= $row['jumlah_barang_kajiulang']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?= $row['penyedia_kajiulang']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?= $row['catatan_kajiulang']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if ($row['kp_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if ($row['kal_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if ($row['bpl_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if ($row['kpk_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if ($row['kmk_kajiulang'] == 'Ya') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
        </tr>
        <?php
                }
            }
        ?>
        <tr style="">
            <td colspan='10' style="text-align: right; padding: 5px; color: #277ABE; font-weight: bold;">
                Total Tidak Mampu : <?= $totalTidakMampu; ?>
            </td>
        </tr>
        <tr style="">
            <td colspan='10' style="text-align: right; padding: 5px; color: #277ABE; font-weight: bold;">
                Total Mampu : <?= $totalMampu; ?>
            </td>
        </tr>
    </table>
    <br>
    <!-- 
    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 95%; text-align: left; font-size: 14px; color: #526484; padding-top: 25px; margin-left: 25px;">
            <tr>
                <td>
                    <b>Markteting : </b>nama_marketing
                </td>
            </tr>
            <tr>
                <td>
                    <b>Approver : </b>nama_approver
                </td>
            </tr>
        </table>
    </div> -->


    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 95%; text-align: center; font-size: 14px; color: #526484; padding-top: 25px; margin-left: 25px;">
            <tr>
                <td style="width: 50%; ">
                    Tabanan,
                    <?php
                        $timezone = time() + (60 * 60 * 8);
                        echo gmdate('d F Y', $timezone); 
                    ?>
                    <br>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img style="width: 35%;" src="./images/img/ttd_putu.png">
                    <br>
                    <u>I Putu Cahya Gunawan, S.Tr.Kes</u>
                    <br>
                    Penanggung Jawab Teknis
                    <!-- <hr style="width: 15px; "> -->
                </td>
                <td style="width: 50%; ">
                    <br>
                    Dibuat oleh,
                    <br>
                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img style="width: 35%;" src="./images/img/ttd_putu.png"> -->
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    ( ................................................... )
                    <br>
                    Admin Teknis
                </td>
            </tr>
        </table>
    </div>


    <!-- /////////////////////////////////////////////////////////////////// -->

</page>



<page backcolor="#FEFEFE" backtop="35mm" backbottom="10mm" style="font-size: 12pt">
    <page_header>
        <table cellspacing="0"
            style="width: 95%; text-align: center; font-size: 12px; margin: 25px 0 0 25px; border: 0px; color: #526484;">
            <tr>
                <td rowspan="3"
                    style="width: 30%; color: #444444; text-align: right; vertical-align: middle; padding: 0px 10px 0 0; border-width: 0px;">
                    <img style="width: 45%;" src="./images/img/ens_logo.jpg"><br>
                </td>
                <td style="width: 45%; height: 10px; text-align: center; font-size: 20px; vertical-align: middle; ">
                    <b>PT. Elektromedika Instrumen Tera Nusantara</b><br>
                </td>
            </tr>
            <tr>
                <td style="width: 45%; height: 10px; text-align: center; font-size: 18px; vertical-align: text-top; ">
                    <small>Kaji Ulang Permintaan, Tender dan Kontrak</small>
                </td>
            </tr>
            <tr>
                <td style="width: 45%; height: 10px; text-align: center; font-size: 18px; vertical-align: text-top; ">
                    <small>ENS10/MT/FRM/22KUPTK</small>
                </td>
            </tr>
        </table>
        <table style="width: 95%; margin: 10px 25px 0 25px">
            <tr>
                <td style="text-align: left; width: 100%">
                    <hr>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 95%; margin-left: 25px;">
            <tr>
                <td colspan="2" style="text-align: left; font-size: 10px; width: 100%; color: #526484;">
                    Keterangan : Kesiapan Personel (KP), Kondisi Akomodasi dan Lingkungan (KAL), Beban Pekerjaan
                    Laboratorium
                    (BPL), Kondisi Peralatan Kalibrasi (KPK), Kesesuaian Metode Kalibrasi (KMK)
                </td>
            </tr>
            <tr>
                <td style="text-align: left; width: 85%">
                    <hr>
                </td>
                <td style="text-align: right; width: 15%; font-size: 10px;">
                    <?php
                    $timezone = time() + (60 * 60 * 8);
                    echo gmdate('d/m/Y - H:i:s', $timezone) . ' WITA'; 
                ?>
                </td>
            </tr>
        </table>
    </page_footer>


    <table id="myTable2" cellspacing="0"
        style="width: 50%; text-align: center; font-size: 14px; padding-top: 10px; margin-left: 250px; color: #526484;">
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
        $totalLayanan = 0;
        for ($i=0; $i<sizeof($layanan_arr); $i++) {

            $totalLayanan = $totalLayanan + $layanan_jml[$i];

            if (($i % 2) == 0) {
        ?>
        <tr>
            <td style="text-align: right; padding: 10px;"><?= $i+1; ?></td>
            <td style="text-align: left; padding: 10px;"><?= $layanan_arr[$i]; ?></td>
            <td style="text-align: right; padding: 10px;"><?= $layanan_jml[$i]; ?></td>
        </tr>
        <?php
                } else {
        ?>
        <tr>
            <td style="text-align: right; background-color: #f5f6fa; padding: 10px;"><?= $i+1; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;"><?= $layanan_arr[$i]; ?></td>
            <td style="text-align: right; background-color: #f5f6fa; padding: 10px;"><?= $layanan_jml[$i]; ?></td>
        </tr>
        <?php
                }
            }
        ?>
        <tr style="">
            <td colspan='3' style="text-align: right; padding: 5px; color: #277ABE; font-weight: bold;">
                Total Mampu : <?= $totalLayanan; ?>
            </td>
        </tr>
    </table>
    <br>

</page>