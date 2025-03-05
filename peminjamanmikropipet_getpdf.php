<?php
    require_once('connect.php');
    $idpeminjaman = $_REQUEST['uid'];
    
    $query1 = "SELECT * FROM peminjamanmikropipet WHERE id_peminjaman='$idpeminjaman'";
    $result1 = mysqli_query($conn, $query1) or die(mysql_error());
    $row1 = mysqli_fetch_assoc($result1);
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
                    style="width: 25%; color: #444444; vertical-align: text-top; padding: 12px 10px 0 0; border-width: 0px;">
                    <img style="width: 100%;" src="./images/img/ens_logo.jpg"><br>
                </td>
            </tr>
            <tr>
                <td colspan="3"
                    style="width: 75%; height: 30px; text-align: center; font-size: 16px; vertical-align: middle; border: 1px; ">
                    <b>PT. ELEKTROMEDIKA INSTRUMEN TERA NUSANTARA</b><br>
                </td>
            </tr>
            <tr>
                <td colspan="3"
                    style="width: 75%; height: 20px; text-align: center; vertical-align: middle; border: 1px;  ">
                    <strong>Peminjaman dan Pengembalian Alat</strong><br>
                </td>
            </tr>
            <tr>
                <td style="width: 13%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; ">
                    Nomor<br>
                </td>
                <td style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; ">
                    : ENS10/MT/FRM/29PLT<br>
                </td>
                <td style="width: 35%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; ">
                    No. Revisi : 00<br>
                </td>
            </tr>
            <tr>
                <td style="width: 13%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; ">
                    No. Terbit<br>
                </td>
                <td style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    : 1<br>
                </td>
                <td rowspan="2"
                    style="width: 35%; height: 26px; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    Halaman [[page_cu]] dari [[page_nb]]<br>
                </td>
            </tr>
            <tr>
                <td style="width: 13%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    Tgl. Terbit<br>
                </td>
                <td style="width: 27%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    : 5 Desember 2018<br>
                </td>
                <!-- <td style="width: 33%;"></td> -->
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
        </table>
    </page_footer>


    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 95%; padding: 10px 0; margin-left: 25px; color: #526484;">
        <tr>
            <td style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top; ">
                Kepada Yth.<br>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top; font-weight: bold; ">
                <?= $row1['nama_pelanggan']; ?><br>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top; ">
                Bersama ini kami serahkan barang pada tanggal :
                <b><?= date("d F Y", strtotime($row1['tgl_peminjaman'])); ?></b><br>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; text-align: left; font-size: 12px; vertical-align: text-top; ">
                Dengan rincian sebagai berikut.<br>
            </td>
        </tr>
    </table>



    <!-- /////////////////////////////////////////////////////////////////// -->

    <table id="myTable" cellspacing="0"
        style="width: 95%; text-align: center; font-size: 12px; padding-top: 10px; margin-left: 25px; color: #526484;">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 27%">
            <col style="width: 18%;">
            <col style="width: 15%">
            <col style="width: 20%;">
            <col style="width: 15%;">
        </colgroup>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>No. Seri</th>
                <th>Volume</th>
            </tr>
        </thead>

        <?php
            require_once('connect.php');
            $noso = $row1['no_proyek'];

            $sno = 0; $barangTotal = 0;
            $query = "SELECT * FROM detailpeminjamanmikropipet INNER JOIN mikropipet ON detailpeminjamanmikropipet.id_mikropipet = mikropipet.id_mikropipet 
                        WHERE detailpeminjamanmikropipet.no_proyek='$noso' ORDER BY mikropipet.merek ASC";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            while($row = mysqli_fetch_array($result)){
                    $sno++;
                    if (($sno % 2) == 0)
                    {
        ?>
        <tr>
            <td style="text-align: right; padding: 10px 5px;"><?= $sno . '.'; ?></td>
            <td style="text-align: left; padding: 10px 5px;">Mikropipet Backup PT EINSTEN</td>
            <td style="text-align: center; padding: 10px 5px;"><?= $row['merek']; ?></td>
            <td style="text-align: center; padding: 10px 5px;"><?= $row['tipe']; ?></td>
            <td style="text-align: center; padding: 10px 5px;"><?= $row['no_seri']; ?></td>
            <td style="text-align: center; padding: 10px 0;"><?= $row['volume']; ?></td>
        </tr>
        <?php
            } else {
            ?>
        <tr>
            <td style="text-align: right; background-color: #f5f6fa; padding: 10px 5px;"><?= $sno . '.'; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">Mikropipet Backup PT EINSTEN
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 5px;"><?= $row['merek']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 5px;"><?= $row['tipe']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 5px;"><?= $row['no_seri']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;"><?= $row['volume']; ?></td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
    <br>


    <!-- ///////////////////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 95%; text-align: center; font-size: 12px; padding-top: 25px; margin-left: 25px; color: #526484;">
            <tr>
                <td style="width: 50%; ">
                    Penerima,<br>
                    <?= $row1['nama_pelanggan']; ?>
                    <br>
                    <br>
                    <br><br><br>
                    <br>
                    <br>
                    ( ................................... )
                    <!-- <hr style="width: 15px; "> -->
                </td>
                <td style="width: 50%; ">
                    Diserahkan oleh,<br>
                    PT Elektromedika Instrumen Tera Nusantara
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= '( ' . $row1['nama_peminjam'] . ' )'; ?>
                    <!-- <hr style="width: 10%; text-align:left;margin-left:0"> -->
                </td>
            </tr>
        </table>
    </div>

</page>