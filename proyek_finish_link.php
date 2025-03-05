<?php require_once('session.php'); 
    if ($username) {
        $query_session = "SELECT * FROM user WHERE username = '$username'";
        $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_assoc($result_session);
    }

if (isset($_REQUEST['uid'])) {
    $proyekid = $_REQUEST['uid'];

    $query0 = "SELECT * FROM proyek WHERE id_proyek = '$proyekid'";
    $result0 = mysqli_query($conn, $query0) or die(mysqli_error($conn));
    $row0 = mysqli_fetch_assoc($result0);

    if ($row0['status_proyek'] == 9) {

        $query_order = "SELECT * FROM permintaan_order WHERE id_proyek = '$proyekid'";
        $result_order = mysqli_query($conn, $query_order) or die(mysqli_error($conn));
        $row_order = mysqli_fetch_assoc($result_order);

        $query_kajiulang = "SELECT MAX(lastupdate_kajiulang) AS lastupdate_kajiulang FROM kajiulang WHERE id_proyek =  '$proyekid'";
        $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
        $row_kajiulang = mysqli_fetch_assoc($result_kajiulang);

        $query_penawaranharga = "SELECT * FROM penawaranharga WHERE id_proyek='$proyekid'";
        $result_penawaranharga = mysqli_query($conn, $query_penawaranharga) or die(mysqli_error($conn));
        $row_penawaranharga = mysqli_fetch_assoc($result_penawaranharga);

        $query_negosiasi = "SELECT * FROM negosiasi WHERE id_proyek='$proyekid'";
        $result_negosiasi = mysqli_query($conn, $query_negosiasi) or die(mysqli_error($conn));
        $row_negosiasi = mysqli_fetch_assoc($result_negosiasi);

        $query_kegiatan = "SELECT MAX(lastupdate_kegiatan) AS lastupdate_kegiatan FROM kegiatan WHERE id_proyek =  '$proyekid'";
        $result_kegiatan = mysqli_query($conn, $query_kegiatan) or die(mysqli_error($conn));
        $row_kegiatan = mysqli_fetch_assoc($result_kegiatan);

        $query_spk = "SELECT * FROM spk WHERE id_proyek='$proyekid'";
        $result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
        $row_spk = mysqli_fetch_assoc($result_spk);

        $query_berkasteknisi = "SELECT * FROM berkasteknisi WHERE id_proyek='$proyekid'";
        $result_berkasteknisi = mysqli_query($conn, $query_berkasteknisi) or die(mysqli_error($conn));
        $row_berkasteknisi = mysqli_fetch_assoc($result_berkasteknisi);

        $query_lappekerjaan = "SELECT * FROM lappekerjaan WHERE id_proyek='$proyekid'";
        $result_lappekerjaan = mysqli_query($conn, $query_lappekerjaan) or die(mysqli_error($conn));
        $row_lappekerjaan = mysqli_fetch_assoc($result_lappekerjaan);

        $query_salinansertifikat = "SELECT MAX(lastupdate_sertifikat) AS lastupdate_sertifikat FROM sertifikat WHERE id_proyek ='$proyekid'";
        $result_salinansertifikat = mysqli_query($conn, $query_salinansertifikat) or die(mysqli_error($conn));
        $row_salinansertifikat = mysqli_fetch_assoc($result_salinansertifikat);
        
        $query_bastsertifikat = "SELECT * FROM bastsertifikat WHERE id_proyek='$proyekid'";
        $result_bastsertifikat = mysqli_query($conn, $query_bastsertifikat) or die(mysqli_error($conn));
        $row_bastsertifikat = mysqli_fetch_assoc($result_bastsertifikat);

        $query_inputdo = "SELECT * FROM inputdo WHERE id_proyek='$proyekid'";
        $result_inputdo = mysqli_query($conn, $query_inputdo) or die(mysqli_error($conn));
        $row_inputdo = mysqli_fetch_assoc($result_inputdo);
        
        $query_invoicepajak = "SELECT * FROM invoicepajak WHERE id_proyek='$proyekid'";
        $result_invoicepajak = mysqli_query($conn, $query_invoicepajak) or die(mysqli_error($conn));
        $row_invoicepajak = mysqli_fetch_assoc($result_invoicepajak);
        
        $query_buktitransfer = "SELECT * FROM buktitransfer WHERE id_proyek='$proyekid'";
        $result_buktitransfer = mysqli_query($conn, $query_buktitransfer) or die(mysqli_error($conn));
        $row_buktitransfer = mysqli_fetch_assoc($result_buktitransfer);
        
        $query_sppbuktipotong = "SELECT * FROM sppbuktipotong WHERE id_proyek='$proyekid'";
        $result_sppbuktipotong = mysqli_query($conn, $query_sppbuktipotong) or die(mysqli_error($conn));
        $row_sppbuktipotong = mysqli_fetch_assoc($result_sppbuktipotong);

        if ($row0['status3_proyek'] == 8) {

            $query_posubkontrak = "SELECT * FROM posubkontrak WHERE id_proyek='$proyekid'";
            $result_posubkontrak = mysqli_query($conn, $query_posubkontrak) or die(mysqli_error($conn));
            $row_posubkontrak = mysqli_fetch_assoc($result_posubkontrak);

            $query_uangsubkontrak = "SELECT * FROM uangsubkontrak WHERE id_proyek='$proyekid'";
            $result_uangsubkontrak = mysqli_query($conn, $query_uangsubkontrak) or die(mysqli_error($conn));
            $row_uangsubkontrak = mysqli_fetch_assoc($result_uangsubkontrak);
            
            $query_invoicepajaksubkontrak = "SELECT * FROM invoicepajaksubkontrak WHERE id_proyek='$proyekid'";
            $result_invoicepajaksubkontrak = mysqli_query($conn, $query_invoicepajaksubkontrak) or die(mysqli_error($conn));
            $row_invoicepajaksubkontrak = mysqli_fetch_assoc($result_invoicepajaksubkontrak);
            
            $query_verifikasibelisubkontrak = "SELECT MAX(lastupdate_verifikasibelisubkontrak) AS lastupdate_verifikasibelisubkontrak FROM verifikasibelisubkontrak WHERE id_proyek = '$proyekid'";
            $result_verifikasibelisubkontrak = mysqli_query($conn, $query_verifikasibelisubkontrak) or die(mysqli_error($conn));
            $row_verifikasibelisubkontrak = mysqli_fetch_assoc($result_verifikasibelisubkontrak);
            
            $query_bastalat = "SELECT * FROM bastalat WHERE id_proyek='$proyekid'";
            $result_bastalat = mysqli_query($conn, $query_bastalat) or die(mysqli_error($conn));
            $row_bastalat = mysqli_fetch_assoc($result_bastalat);
        }
    } else header("location:home");
} else header("location:home");
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php include "./head.html" ?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php include "./aside.php" ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php include "./header.php" ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3>Rekaman Teknis Proyek</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="proyek"
                                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="proyek"
                                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                                    class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <table class="table table-hover nowrap">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Rekaman</th>
                                                    <th>Tgl Update</th>
                                                    <th>Link Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>Spesimen Pelanggan</td>
                                                    <td><strong>-</strong></td>
                                                    <td>
                                                        <a href="#" onclick="proyek_pdf(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>Permintaan/Order</td>
                                                    <td><?= date_format(date_create($row_order['lastupdate_permintaan_order']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_order['link_permintaan_order']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Kaji Ulang Permintaan</td>
                                                    <td><?= date_format(date_create($row_kajiulang['lastupdate_kajiulang']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" onclick="kajiulang_pdf(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>Penawaran Harga</td>
                                                    <td><?= date_format(date_create($row_penawaranharga['lastupdate_penawaranharga']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_penawaranharga['link_penawaranharga']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td>Negosiasi dan Kontak</td>
                                                    <td><?= date_format(date_create($row_negosiasi['lastupdate_negosiasi']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_negosiasi['link_negosiasi']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6.</td>
                                                    <td>Penyusunan Jadwal</td>
                                                    <td><?= date_format(date_create($row_kegiatan['lastupdate_kegiatan']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" onclick="jadwal_pdf(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7.</td>
                                                    <td>SPK dan Akomodasi</td>
                                                    <td><?= date_format(date_create($row_spk['lastupdate_spk']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" onclick="spk_pdf(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8.</td>
                                                    <td>Peminjaman Alat</td>
                                                    <td><?= date_format(date_create($row_berkasteknisi['lastupdate_berkasteknisi']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" onclick="berkasteknisi_pdf(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9.</td>
                                                    <td>Laporan Ketidaksesuaian Pekerjaan dan Laporan Pekerjaan</td>
                                                    <td><?= date_format(date_create($row_lappekerjaan['lastupdate_lappekerjaan']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_lappekerjaan['link_lappekerjaan']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10.</td>
                                                    <td>Salinan Sertifikat</td>
                                                    <td><?= date_format(date_create($row_salinansertifikat['lastupdate_sertifikat']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" onclick="sertifikatfinish_page(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11.</td>
                                                    <td>Berita Acara Serah Terima Sertifikat</td>
                                                    <td><?= date_format(date_create($row_bastsertifikat['lastupdate_bastsertifikat']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_bastsertifikat['link_bastsertifikat']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>12.</td>
                                                    <td>Input DO</td>
                                                    <td><?= date_format(date_create($row_inputdo['lastupdate_inputdo']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_inputdo['link_inputdo']; ?>" target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>13.</td>
                                                    <td>Invoice dan Pajak</td>
                                                    <td><?= date_format(date_create($row_invoicepajak['lastupdate_invoicepajak']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_invoicepajak['link_invoicepajak']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>14.</td>
                                                    <td>Bukti Transfer</td>
                                                    <td><?= date_format(date_create($row_buktitransfer['lastupdate_buktitransfer']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_buktitransfer['link_buktitransfer']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>15.</td>
                                                    <td>SSP dan Bukti Potong</td>
                                                    <td><?= date_format(date_create($row_sppbuktipotong['lastupdate_sppbuktipotong']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_sppbuktipotong['link_sppbuktipotong']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <?php if ($row0['status3_proyek'] == 8) { ?>
                                                <tr>
                                                    <td>16.</td>
                                                    <td>PO Subkontrak</td>
                                                    <td><?= date_format(date_create($row_posubkontrak['lastupdate_posubkontrak']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_posubkontrak['link_posubkontrak']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>17.</td>
                                                    <td>Pelunasan / Uang Muka</td>
                                                    <td><?= date_format(date_create($row_uangsubkontrak['lastupdate_uangsubkontrak']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_uangsubkontrak['link_uangsubkontrak']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>18.</td>
                                                    <td>Invoice dan Pajak Subkontrak</td>
                                                    <td><?= date_format(date_create($row_invoicepajaksubkontrak['lastupdate_invoicepajaksubkontrak']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_invoicepajaksubkontrak['link_invoicepajaksubkontrak']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>19.</td>
                                                    <td>Verifikasi Pembelian Subkontrak</td>
                                                    <td><?= date_format(date_create($row_verifikasibelisubkontrak['lastupdate_verifikasibelisubkontrak']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            onclick="verifikasibelisubkontrak_pdf(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>20.</td>
                                                    <td>Berita Acara Serah Terima Alat</td>
                                                    <td><?= date_format(date_create($row_bastalat['lastupdate_bastalat']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_bastalat['link_bastalat']; ?>" target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div><!-- .card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php include "./footer.html" ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <?php include "./scripts.html" ?>
    <!-- JavaScript -->
    <script>
    $(document).ready(function(e) {
        cekDark();
    });

    function proyek_pdf(uid) {
        let link = 'proyek_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function kajiulang_pdf(uid) {
        let link = 'kajiulang_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function jadwal_pdf(uid) {
        let link = 'jadwal_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function spk_pdf(uid) {
        let link = 'spk_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function berkasteknisi_pdf(uid) {
        let link = 'berkasteknisi_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function verifikasibelisubkontrak_pdf(uid) {
        let link = 'verifikasibelisubkontrak_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function sertifikatfinish_page(uid) {
        let link = 'sertifikat_finish?uid=' + uid;
        window.open(link, '_self');
    }
    </script>

</body>

</html>