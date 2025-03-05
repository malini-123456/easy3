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

<page backcolor="#FEFEFE" backtop="45mm" backbottom="10mm" style="font-size: 12pt">
    <page_header>
        <table cellspacing="0"
            style="width: 95%; text-align: center; font-size: 14px; margin: 25px 0 0 25px; border: 1px; color: #526484;">
            <tr>
                <td rowspan="6"
                    style="width: 20%; color: #444444; vertical-align: text-top; padding: 5px 8px 0 5px; border-width: 0px;">
                    <img style="width: 100%;" src="./images/img/ens_logo.jpg"><br>
                </td>
            </tr>
            <tr>
                <td colspan="3"
                    style="width: 80%; height: 30px; text-align: center; font-size: 16px; vertical-align: middle; border: 1px; ">
                    <b>PT. ELEKTROMEDIKA INSTRUMEN TERA NUSANTARA</b><br>
                </td>
            </tr>
            <tr>
                <td colspan="3"
                    style="width: 80%; height: 20px; text-align: center; vertical-align: middle; border: 1px;  ">
                    <strong>Penerimaan dan Verifikasi Produk atau Jasa Eksternal</strong><br>
                </td>
            </tr>
            <tr>
                <td style="width: 13%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; ">
                    Nomor<br>
                </td>
                <td style="width: 32%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; ">
                    : ENS10/MA/FRM/30PEX<br>
                </td>
                <td style="width: 35%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; ">
                    No. Revisi : 01<br>
                </td>
            </tr>
            <tr>
                <td style="width: 13%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px; ">
                    No. Terbit<br>
                </td>
                <td style="width: 32%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    : 1<br>
                </td>
                <td rowspan="2"
                    style="width: 35%; height: 30px; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    Halaman [[page_cu]] dari [[page_nb]]<br>
                </td>
            </tr>
            <tr>
                <td style="width: 13%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    Tgl. Terbit<br>
                </td>
                <td style="width: 32%; text-align: left; vertical-align: middle; padding-left: 5px; border: 1px;  ">
                    : 5 Desember 2018<br>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 95%; margin-left: 25px;">
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

    <table id="myTable" cellspacing="0"
        style="width: 95%; text-align: center; font-size: 14px; padding-top: 10px; margin-left: 25px; color: #526484;">
        <colgroup>
            <col style="width: 19%;">
            <col style="width: 15%">
            <col style="width: 10%">
            <col style="width: 10%;">
            <col style="width: 5%">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 10%;">
            <col style="width: 6%;">
        </colgroup>
        <thead>
            <tr>
                <th rowspan="2">NAMA PRODUK/JASA</th>
                <th rowspan="2">PENYEDIA</th>
                <th rowspan="2">NO.PO</th>
                <th rowspan="2">NO.INVOICE</th>
                <th colspan="7">VERIFIKASI</th>
                <th rowspan="2">DITERIMA/ DITOLAK</th>
            </tr>
            <tr>
                <th>JML</th>
                <th>SPEK</th>
                <th>KOND</th>
                <th>INV</th>
                <th>FPJK</th>
                <th>GRS</th>
                <th>LAIN-LAIN</th>
            </tr>
        </thead>


        <?php
            require_once('connect.php');
            
            $sno=0;
            $query = "SELECT * FROM verifikasibelisubkontrak WHERE id_proyek='$proyekid'";
            $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
            while($row = mysqli_fetch_array($result)) {


                $sno++;
                if (($sno % 2) == 0) {
        ?>
        <tr>
            <td style="text-align: left; padding: 10px 5px;"><?= $row['namaproduk_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: left; padding: 10px;"><?= $row['penyedia_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: left; padding: 10px 5px;"><?= $row['nopo_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: left; padding: 10px 5px;"><?= $row['noinvoice_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if($row['jumlah_verifikasibelisubkontrak'] == 'Memenuhi') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if($row['spesifikasi_verifikasibelisubkontrak'] == 'Memenuhi') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if($row['kondisi_verifikasibelisubkontrak'] == 'Memenuhi') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if($row['invoice_verifikasibelisubkontrak'] == 'Ada') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if($row['fakturpajak_verifikasibelisubkontrak'] == 'Ada') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; padding: 10px 0;">
                <?php if($row['garansi_verifikasibelisubkontrak'] == 'Ada') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: left; padding: 10px 5px;"><?= $row['catatan_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: left; padding: 10px 5px;"><?= $row['keputusan_verifikasibelisubkontrak']; ?></td>
        </tr>
        <?php
                } else {
        ?>
        <tr>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row['namaproduk_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px;">
                <?= $row['penyedia_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row['nopo_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row['noinvoice_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if($row['jumlah_verifikasibelisubkontrak'] == 'Memenuhi') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if($row['spesifikasi_verifikasibelisubkontrak'] == 'Memenuhi') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if($row['kondisi_verifikasibelisubkontrak'] == 'Memenuhi') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if($row['invoice_verifikasibelisubkontrak'] == 'Ada') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if($row['fakturpajak_verifikasibelisubkontrak'] == 'Ada') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: center; background-color: #f5f6fa; padding: 10px 0;">
                <?php if($row['garansi_verifikasibelisubkontrak'] == 'Ada') { ?>
                <img style="width:15px;" src="./images/img/check-mark.png">
                <?php } else { ?>
                <img style="width:15px;" src="./images/img/close.png">
                <?php } ?>
            </td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row['catatan_verifikasibelisubkontrak']; ?></td>
            <td style="text-align: left; background-color: #f5f6fa; padding: 10px 5px;">
                <?= $row['keputusan_verifikasibelisubkontrak']; ?></td>
        </tr>
        <?php
                }
            }
        ?>
    </table>
    <br>

    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 95%; text-align: left; font-size: 14px; color: #526484; padding-top: 25px; margin-left: 25px;">
            <tr>
                <td style="width: 10%; "></td>
                <td style="width: 20%; ">
                    <!-- Tabanan,
                    <?php
                        $timezone = time() + (60 * 60 * 8);
                        echo gmdate('d F Y', $timezone); 
                    ?> -->
                    <br>
                    <br>
                    Diterima Oleh,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <!-- (....................................................) -->
                    <hr style="width: 50%; ">
                    Tgl.
                </td>
                <td style="width: 40%; "></td>
                <td style="width: 20%; ">
                    <br>
                    <br>
                    Diverifikasi Oleh,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <!-- (....................................................) -->
                    <hr style="width: 50%; ">
                    Tgl.
                </td>
            </tr>
        </table>
    </div>


    <!-- /////////////////////////////////////////////////////////////////// -->


</page>