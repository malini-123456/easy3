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
    background: #0f77ad;
    color: white;
}
</style>
<page backcolor="#FEFEFE" backtop="45mm" backbottom="10mm" style="font-size: 12pt">
    <page_header>
        <table cellspacing="0"
            style="width: 95%; text-align: center; font-size: 14px; border: 2px; margin: 25px 0 0 25px;">
            <tr>
                <td
                    style="width: 17%; color: #444444; vertical-align: text-top; padding-right: 10px; border-right: 2px;">
                    <img style="width: 100%;" src="./images/img/ens_logo.jpg"><br>
                </td>
                <td
                    style="width: 17%; color: #444444; vertical-align: text-top; padding: 0 5px 5px 5px; border-right: 2px;">
                    <img style="width: 100%;" src="./images/img/kan_logo.png"><br>
                </td>
                <td
                    style="width: 33%; text-align: left; font-size: 10px; vertical-align: middle;  padding-left: 10px; border-right: 2px;">
                    PT Elektromedika Tera Instrumen Nusantara<br>
                    Jl. Gunung Batukaru, Denbantas, Tabanan, Bali<br>
                    www.pt-einsten.com<br>
                    Telp : (0361) 8311810<br>
                </td>
                <td style="width: 33%; text-align: center; vertical-align: middle; font-size: 12px;">
                    <b style="font-size: 20px; ">PENAWARAN HARGA</b><br>
                    SNI ISO/IEC 17025:2017<br>
                </td>
            </tr>
        </table>
        <table cellspacing="0" style="width: 95%; padding: 10px 0; margin-left: 25px;">
            <tr>
                <td rowspan="4" style="width: 12%; text-align: left; font-size: 12px; vertical-align: text-top; ">
                    Order by :<br>
                </td>
                <td rowspan="4"
                    style="width: 45%; text-align: left; font-size: 12px; vertical-align: text-top; padding-right: 5px;">
                    <?= $row1a['nama_pelanggan']; ?><br>
                    <?= $row1a['alamat_pelanggan']; ?><br>
                    <?= $row1a['npwp_pelanggan']; ?><br>
                    <?= $row1a['namanpwp_pelanggan']; ?><br>
                </td>
            </tr>
            <tr style="padding: 10px 0;">
                <td style="width: 14%; font-size: 12px;">
                    Page [[page_cu]] of [[page_nb]]<br>
                </td>
                <td style="width: 29%; text-align: center; font-size: 12px;">
                    Marketing:<br>
                    <?= 'nama_marketing'; ?><br>
                </td>
            </tr>
            <tr style="padding: 10px 0;">
                <td style="width: 14%; text-align: left; font-size: 12px;">
                    Quote Date<br>
                    <?php $timezone = time() + (60 * 60 * 8); ?>
                    <?= gmdate("d/m/Y", $timezone); ?><br>
                </td>
                <td style="width: 29%; text-align: center; font-size: 12px;">
                    Quote Number<br>
                    <?= 'no_penawaran'; ?><br>
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
        </table>
    </page_footer>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0"
        style="width: 95%; text-align: center; font-size: 12px; padding-top: 10px; margin-left: 25px;">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 23%">
            <col style="width: 24%">
            <col style="width: 7%;">
            <col style="width: 5%">
            <col style="width: 13%;">
            <col style="width: 5%;">
            <col style="width: 13%;">
            <col style="width: 5%">
        </colgroup>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Nama Layanan</th>
                <th>Jumlah</th>
                <th>Unit</th>
                <th>Harga</th>
                <th>Disc</th>
                <th>Sub Total</th>
                <th>Pajak</th>
            </tr>
        </thead>

        <?php
            $sno=0; $total=0; $subtotal=0; $barangTotal=0;
            $query = "SELECT * FROM negosiasi WHERE id_proyek='$proyekid'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            while($row = mysqli_fetch_array($result)) {

                $layananid = $row['id_layanan'];
                $query1c = "SELECT * FROM layanan WHERE id_layanan='$layananid'";
                $result1c= mysqli_query($conn, $query1c) or die(mysql_error());
                $row1c = mysqli_fetch_assoc($result1c);

                $subtotal = ( $row['harga_barang_negosiasi'] - ($row['harga_barang_negosiasi'] * $row['diskon_barang_negosiasi'] / 100) ) * $row['jumlah_barang_negosiasi'];
                $total = $total + $subtotal;                
                $barangTotal = $barangTotal + $row['jumlah_barang_negosiasi']; 

                $sno++;
                if(($sno % 2) == 0)
                {
        ?>
        <tr>
            <td style="text-align: right; padding: 5px 5px 5px 0;"><?= $sno . '.'; ?></td>
            <td style="text-align: left; padding: 5px 0;"><?= $row['nama_barang_negosiasi']; ?></td>
            <td style="text-align: left; padding: 5px;"><?= $row1c['nama_layanan']; ?></td>
            <td style="text-align: right; padding: 5px 0;"><?= $row['jumlah_barang_negosiasi']; ?></td>
            <td style="padding: 5px 0;"><?= $row['satuan_barang_negosiasi']; ?></td>
            <td style="text-align: right; padding: 5px 0;"><?= number_format($row['harga_barang_negosiasi'], 0); ?>
            </td>
            <td style="text-align: right; padding: 5px 0;"><?= $row['diskon_barang_negosiasi'] . '%'; ?></td>
            <td style="text-align: right; padding: 5px 0;"><?= number_format($subtotal, 0); ?></td>
            <td style="padding: 5px 0;">10%</td>
        </tr>
        <?php
                }
                else {
        ?>
        <tr>
            <td style="text-align: right; background-color: #ddedff; padding: 5px 5px 5px 0;"><?= $sno . '.'; ?></td>
            <td style="text-align: left; background-color: #ddedff; padding: 5px 0;">
                <?= $row['nama_barang_negosiasi']; ?></td>
            <td style="text-align: left; background-color: #ddedff; padding: 5px;"><?= $row1c['nama_layanan']; ?></td>
            <td style="text-align: right; background-color: #ddedff; padding: 5px 0;">
                <?= $row['jumlah_barang_negosiasi']; ?></td>
            <td style="background-color: #ddedff; padding: 5px 0;"><?= $row['satuan_barang_negosiasi']; ?></td>
            <td style="text-align: right; background-color: #ddedff; padding: 5px 0;">
                <?= number_format($row['harga_barang_negosiasi'], 0); ?>
            </td>
            <td style="text-align: right; background-color: #ddedff; padding: 5px 0;">
                <?= $row['diskon_barang_negosiasi'] . '%'; ?></td>
            <td style="text-align: right; background-color: #ddedff; padding: 5px 0;">
                <?= number_format($subtotal, 0); ?>
            </td>
            <td style="background-color: #ddedff; padding: 5px 0;">10%</td>
        </tr>
        <?php                
            }
        }
        ?>
        <tr style="background: #0f77ad; color: white;">
            <td colspan='9' style="text-align: center; height: 20px;">
                Total Qty : <?= $barangTotal; ?><br>
            </td>
        </tr>
    </table>
    <!-- </page> -->
    <!-- <page pageset="old"> -->
    <!-- /////////////////////////////////////////////////////////////////// -->

    <div style="page-break-inside: avoid;">
        <!-- <hr> -->
        <table cellspacing="0"
            style="width: 95%; text-align: center; font-size: 14px; padding: 25px 0 0 0; margin-left: 25px;">
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td rowspan="4" style="width: 15%; text-align: left; font-size: 12px; vertical-align: text-top; ">
                    Terbilang : <br>
                </td>
                <td rowspan="4" style="width: 45%; text-align: left; font-size: 12px; vertical-align: text-top;">
                    <?= ucwords(terbilang($total + ($total * 10 / 100)))." Rupiah"; ?><br>
                </td>
            </tr>
            <tr>
                <td style="width: 40%; text-align: left; font-size: 12px;">
                    Subtotal : <?= number_format($total, 0); ?><br>
                </td>
            </tr>
            <tr>
                <td style="width: 40%; text-align: left; font-size: 12px;">
                    PPN 10% : <?= number_format($total * 10 / 100, 0); ?><br>
                </td>
            </tr>
            <tr>
                <td style="width: 40%; text-align: left; font-size: 14px; font-weight: bold;">
                    Grand Total : <?= number_format($total + ($total * 10 / 100), 0); ?><br>
                </td>
            </tr>
        </table>
    </div>
    <div style="page-break-inside: avoid;">
        <!-- <hr> -->
        <table cellspacing="0"
            style=" width: 95%; text-align: left; font-size: 12px; padding: 25px 0 0 0; margin-left: 25px;">
            <tr>
                <td style="width: 100%;">
                    <hr>
                </td>
            </tr>
            <tr>
                <td style="width: 100%;">
                    Kondisi Penawaran :<br>
                    1. Tarif tersebut dapat berubah sewaktu-waktu tanpa pemeritahuan terlebih dahulu.<br>
                    2. Penawaran ini berlaku 30 hari.<br>
                    3. PT Elektromedika Instrumen Tera Nusantara tidak bertanggung jawab pada kerusakan semua alat yang
                    diuji atau dikalibrasi.<br>
                    4. Jadwal pelaksanaan kalibrasi akan diinfo lebih lanjut.<br>
                    5. Sertifikat kalibrasi terbit 7 hari setelah tanggal pengambilan data terakhir.<br>
                    6. Biaya pengiriman dan pengambilan alat menjadi tanggung jawab pelanggan.<br>
                    7. Untuk pengerjaan kegiatan kalibrasi eksitu, pembayaran dilakukan saat pengambilan alat.<br>
                    8. Tanda *) untuk subkon, hasil uji/kalibrasi subkontrak akan diinformasikan selanjutnya.<br>
                    9. Pembayaran ditransfer melalui rekening : 1450077887707 (Bank Mandiri).<br>
                    10. Dengan menandatangani penawaran harga ini, pelanggan menyetujui harga, pajak-pajak yang berlaku,
                    serta informasi mengenai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; interval kalibrasi pada sertifikat
                    kalibrasi.<br>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div style="page-break-inside: avoid;">
        <table cellspacing="0"
            style="page-break-inside: avoid; width: 95%; text-align: center; font-size: 12px; padding-top: 25px; margin-left: 25px;">
            <tr>
                <td style="width: 50%; ">
                    <?= $row1a['nama_pelanggan'] . ':'; ?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    (....................................................)
                    <!-- <hr style="width: 15px; "> -->
                </td>
                <td style="width: 50%; ">
                    Prepared by
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= '( ' . 'nama_marketing' . ' )' ?>
                    <!-- <hr style="width: 10%; text-align:left;margin-left:0"> -->
                </td>
            </tr>
        </table>
    </div>
</page>

<?php
function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}
?>