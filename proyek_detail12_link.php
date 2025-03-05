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

    if (($row0['status_proyek'] == 9) || ($row0['status_proyek'] == 10)) {
        header("location:home");
    } else {

        $idpelanggan = $row0['id_pelanggan'];
        $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
        $row1 = mysqli_fetch_assoc($result1);

        $status_proyek = $row0['status_proyek'];
        $query2 = "SELECT * FROM status_proyek WHERE id_status = '$status_proyek'";
        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
        $row2 = mysqli_fetch_assoc($result2);

        $status1_proyek = $row0['status1_proyek'];
        $query_s1 = "SELECT * FROM status1_proyek WHERE id_status1 = '$status1_proyek'";
        $result_s1 = mysqli_query($conn, $query_s1) or die(mysqli_error($conn));
        $row_s1 = mysqli_fetch_assoc($result_s1);

        $status2_proyek = $row0['status2_proyek'];
        $query_s2 = "SELECT * FROM status2_proyek WHERE id_status2 = '$status2_proyek'";
        $result_s2 = mysqli_query($conn, $query_s2) or die(mysqli_error($conn));
        $row_s2 = mysqli_fetch_assoc($result_s2);

        $status3_proyek = $row0['status3_proyek'];
        $query_s3 = "SELECT * FROM status3_proyek WHERE id_status3 = '$status3_proyek'";
        $result_s3 = mysqli_query($conn, $query_s3) or die(mysqli_error($conn));
        $row_s3 = mysqli_fetch_assoc($result_s3);

        // =================================== timeline awal ===================================

        // cek isi data permintaan/order
        $query_jml_po = "SELECT id_proyek FROM permintaan_order WHERE id_proyek='$proyekid'";
        $result_jml_po = mysqli_query($conn, $query_jml_po) or die(mysqli_error($conn));
        $row_jml_po = mysqli_num_rows($result_jml_po);

        // cek isi data kajiulang permintaan
        $query_jml_kj = "SELECT id_proyek FROM kajiulang WHERE id_proyek='$proyekid'";
        $result_jml_kj = mysqli_query($conn, $query_jml_kj) or die(mysqli_error($conn));
        $row_jml_kj = mysqli_num_rows($result_jml_kj);

        // cek isi data kajiulang main
        $query_jml_kjmain = "SELECT id_proyek FROM kajiulangmain WHERE id_proyek='$proyekid'";
        $result_jml_kjmain = mysqli_query($conn, $query_jml_kjmain) or die(mysqli_error($conn));
        $row_jml_kjmain = mysqli_num_rows($result_jml_kjmain);

        // cek isi data penawaran harga
        $query_jml_ph = "SELECT id_proyek FROM penawaranharga WHERE id_proyek='$proyekid'";
        $result_jml_ph = mysqli_query($conn, $query_jml_ph) or die(mysqli_error($conn));
        $row_jml_ph = mysqli_num_rows($result_jml_ph);

        // cek isi data negosiasi dan kontrak
        $query_jml_nego = "SELECT id_proyek FROM negosiasi WHERE id_proyek='$proyekid'";
        $result_jml_nego = mysqli_query($conn, $query_jml_nego) or die(mysqli_error($conn));
        $row_jml_nego = mysqli_num_rows($result_jml_nego);

        // cek isi data penyusunan jadwal
        $query_jml_kegiatan = "SELECT id_proyek FROM kegiatan WHERE id_proyek='$proyekid'";
        $result_jml_kegiatan = mysqli_query($conn, $query_jml_kegiatan) or die(mysqli_error($conn));
        $row_jml_kegiatan = mysqli_num_rows($result_jml_kegiatan);

        // cek isi data spk dan akomodasi
        $query_jml_spk = "SELECT id_proyek FROM spk WHERE id_proyek='$proyekid'";
        $result_jml_spk = mysqli_query($conn, $query_jml_spk) or die(mysqli_error($conn));
        $row_jml_spk = mysqli_num_rows($result_jml_spk);

        $query_jml_detailspk = "SELECT id_proyek FROM detailspk WHERE id_proyek='$proyekid'";
        $result_jml_detailspk = mysqli_query($conn, $query_jml_detailspk) or die(mysqli_error($conn));
        $row_jml_detailspk = mysqli_num_rows($result_jml_detailspk);

        // cek isi data berkas teknisi
        $query_jml_berkasteknisi = "SELECT id_proyek FROM berkasteknisi WHERE id_proyek='$proyekid'";
        $result_jml_berkasteknisi = mysqli_query($conn, $query_jml_berkasteknisi) or die(mysqli_error($conn));
        $row_jml_berkasteknisi = mysqli_num_rows($result_jml_berkasteknisi);

        // cek isi data laporan pekerjaan
        $query_jml_lappekerjaan = "SELECT id_proyek FROM lappekerjaan WHERE id_proyek='$proyekid'";
        $result_jml_lappekerjaan = mysqli_query($conn, $query_jml_lappekerjaan) or die(mysqli_error($conn));
        $row_jml_lappekerjaan = mysqli_num_rows($result_jml_lappekerjaan);

        // =============================== timeline A ===============================

        // cek isi data penyeliaanlk
        $query_jml_penyeliaanlk = "SELECT id_proyek FROM sertifikat WHERE id_proyek='$proyekid'";
        $result_jml_penyeliaanlk = mysqli_query($conn, $query_jml_penyeliaanlk) or die(mysqli_error($conn));
        $row_jml_penyeliaanlk = mysqli_num_rows($result_jml_penyeliaanlk);

        // cek isi data cetaksertifikat
        $query_jml_cetaksertifikat = "SELECT id_proyek FROM cetaksertifikat WHERE id_proyek='$proyekid'";
        $result_jml_cetaksertifikat = mysqli_query($conn, $query_jml_cetaksertifikat) or die(mysqli_error($conn));
        $row_jml_cetaksertifikat = mysqli_num_rows($result_jml_cetaksertifikat);

        // cek isi data salinansertifikat
        $query_jml_salinansertifikat = "SELECT id_proyek FROM sertifikat WHERE id_proyek='$proyekid'";
        $result_jml_salinansertifikat = mysqli_query($conn, $query_jml_salinansertifikat) or die(mysqli_error($conn));
        $row_jml_salinansertifikat = mysqli_num_rows($result_jml_salinansertifikat);

        // cek isi data bastsertifikat
        $query_jml_bastsertifikat = "SELECT id_proyek FROM bastsertifikat WHERE id_proyek='$proyekid'";
        $result_jml_bastsertifikat = mysqli_query($conn, $query_jml_bastsertifikat) or die(mysqli_error($conn));
        $row_jml_bastsertifikat = mysqli_num_rows($result_jml_bastsertifikat);

        // =============================== timeline B ===============================

        // cek isi data inputdo
        $query_jml_inputdo = "SELECT id_proyek FROM inputdo WHERE id_proyek='$proyekid'";
        $result_jml_inputdo = mysqli_query($conn, $query_jml_inputdo) or die(mysqli_error($conn));
        $row_jml_inputdo = mysqli_num_rows($result_jml_inputdo);

        // cek isi data invoicepajak
        $query_jml_invoicepajak = "SELECT id_proyek FROM invoicepajak WHERE id_proyek='$proyekid'";
        $result_jml_invoicepajak = mysqli_query($conn, $query_jml_invoicepajak) or die(mysqli_error($conn));
        $row_jml_invoicepajak = mysqli_num_rows($result_jml_invoicepajak);

        // cek isi data spj
        $query_jml_spj = "SELECT id_proyek FROM spj WHERE id_proyek='$proyekid'";
        $result_jml_spj = mysqli_query($conn, $query_jml_spj) or die(mysqli_error($conn));
        $row_jml_spj = mysqli_num_rows($result_jml_spj);

        // cek isi data buktitransfer
        $query_jml_buktitransfer = "SELECT id_proyek FROM buktitransfer WHERE id_proyek='$proyekid'";
        $result_jml_buktitransfer = mysqli_query($conn, $query_jml_buktitransfer) or die(mysqli_error($conn));
        $row_jml_buktitransfer = mysqli_num_rows($result_jml_buktitransfer);

        // cek isi data sppbuktipotong
        $query_jml_sppbuktipotong = "SELECT id_proyek FROM sppbuktipotong WHERE id_proyek='$proyekid'";
        $result_jml_sppbuktipotong = mysqli_query($conn, $query_jml_sppbuktipotong) or die(mysqli_error($conn));
        $row_jml_sppbuktipotong = mysqli_num_rows($result_jml_sppbuktipotong);

        // =============================== timeline C ===============================

        // cek isi data posubkontrak
        $query_jml_posubkontrak = "SELECT id_proyek FROM posubkontrak WHERE id_proyek='$proyekid'";
        $result_jml_posubkontrak = mysqli_query($conn, $query_jml_posubkontrak) or die(mysqli_error($conn));
        $row_jml_posubkontrak = mysqli_num_rows($result_jml_posubkontrak);

        // cek isi data kirimsubkontrak
        $query_jml_kirimsubkontrak = "SELECT id_proyek FROM kirimsubkontrak WHERE id_proyek='$proyekid'";
        $result_jml_kirimsubkontrak = mysqli_query($conn, $query_jml_kirimsubkontrak) or die(mysqli_error($conn));
        $row_jml_kirimsubkontrak = mysqli_num_rows($result_jml_kirimsubkontrak);

        // cek isi data uangsubkontrak
        $query_jml_uangsubkontrak = "SELECT id_proyek FROM uangsubkontrak WHERE id_proyek='$proyekid'";
        $result_jml_uangsubkontrak = mysqli_query($conn, $query_jml_uangsubkontrak) or die(mysqli_error($conn));
        $row_jml_uangsubkontrak = mysqli_num_rows($result_jml_uangsubkontrak);

        // cek isi data invoicepajaksubkontrak
        $query_jml_invoicepajaksubkontrak = "SELECT id_proyek FROM invoicepajaksubkontrak WHERE id_proyek='$proyekid'";
        $result_jml_invoicepajaksubkontrak = mysqli_query($conn, $query_jml_invoicepajaksubkontrak) or die(mysqli_error($conn));
        $row_jml_invoicepajaksubkontrak = mysqli_num_rows($result_jml_invoicepajaksubkontrak);

        // cek isi data verifikasibelisubkontrak
        $query_jml_verifikasibelisubkontrak = "SELECT id_proyek FROM verifikasibelisubkontrak WHERE id_proyek='$proyekid'";
        $result_jml_verifikasibelisubkontrak = mysqli_query($conn, $query_jml_verifikasibelisubkontrak) or die(mysqli_error($conn));
        $row_jml_verifikasibelisubkontrak = mysqli_num_rows($result_jml_verifikasibelisubkontrak);

        // cek isi data bastalat
        $query_jml_bastalat = "SELECT id_proyek FROM bastalat WHERE id_proyek='$proyekid'";
        $result_jml_bastalat = mysqli_query($conn, $query_jml_bastalat) or die(mysqli_error($conn));
        $row_jml_bastalat = mysqli_num_rows($result_jml_bastalat);


        //////////////////////////////////////////////////////////////////////////////////


        if ($row_jml_po != 0) {
            $query_order = "SELECT * FROM permintaan_order WHERE id_proyek = '$proyekid'";
            $result_order = mysqli_query($conn, $query_order) or die(mysqli_error($conn));
            $row_order = mysqli_fetch_assoc($result_order);
        }

        if ($row2['tingkat_status'] > 1) {
            $query_kajiulang = "SELECT MAX(lastupdate_kajiulang) AS lastupdate_kajiulang FROM kajiulang WHERE id_proyek = '$proyekid'";
            $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
            $row_kajiulang = mysqli_fetch_assoc($result_kajiulang);
        }

        if ($row_jml_kjmain != 0) {
            $query_kjmain = "SELECT * FROM kajiulangmain WHERE id_proyek='$proyekid'";
            $result_kjmain = mysqli_query($conn, $query_kjmain) or die(mysqli_error($conn));
            $row_kjmain = mysqli_fetch_assoc($result_kjmain);
        }

        if ($row_jml_ph != 0) {
            $query_penawaranharga = "SELECT * FROM penawaranharga WHERE id_proyek='$proyekid'";
            $result_penawaranharga = mysqli_query($conn, $query_penawaranharga) or die(mysqli_error($conn));
            $row_penawaranharga = mysqli_fetch_assoc($result_penawaranharga);
        }

        if ($row_jml_nego != 0) {
            $query_negosiasi = "SELECT * FROM negosiasi WHERE id_proyek='$proyekid'";
            $result_negosiasi = mysqli_query($conn, $query_negosiasi) or die(mysqli_error($conn));
            $row_negosiasi = mysqli_fetch_assoc($result_negosiasi);
        }

        if ($row2['tingkat_status'] > 5) {
            $query_kegiatan = "SELECT MAX(lastupdate_kegiatan) AS lastupdate_kegiatan FROM kegiatan WHERE id_proyek = '$proyekid'";
            $result_kegiatan = mysqli_query($conn, $query_kegiatan) or die(mysqli_error($conn));
            $row_kegiatan = mysqli_fetch_assoc($result_kegiatan);

            ////////////////////////////// JADWAL AWAL - AKHIR //////////////////////////////

            $query_jadwal1 = "SELECT MIN(stgl_kegiatan) AS stgl_kegiatan FROM kegiatan WHERE id_proyek = '$proyekid'";
            $result_jadwal1 = mysqli_query($conn, $query_jadwal1) or die(mysqli_error($conn));
            $row_jadwal1 = mysqli_fetch_assoc($result_jadwal1);

            $query_jadwal2 = "SELECT MAX(etgl_kegiatan) AS etgl_kegiatan FROM kegiatan WHERE id_proyek = '$proyekid'";
            $result_jadwal2 = mysqli_query($conn, $query_jadwal2) or die(mysqli_error($conn));
            $row_jadwal2 = mysqli_fetch_assoc($result_jadwal2);
        }

        if ($row_jml_spk != 0) {
            $query_spk = "SELECT * FROM spk WHERE id_proyek='$proyekid'";
            $result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
            $row_spk = mysqli_fetch_assoc($result_spk);
        }

        if ($row_jml_berkasteknisi != 0) {
            $query_berkasteknisi = "SELECT * FROM berkasteknisi WHERE id_proyek='$proyekid'";
            $result_berkasteknisi = mysqli_query($conn, $query_berkasteknisi) or die(mysqli_error($conn));
            $row_berkasteknisi = mysqli_fetch_assoc($result_berkasteknisi);
        }

        if ($row_jml_lappekerjaan != 0) {
            $query_lappekerjaan = "SELECT * FROM lappekerjaan WHERE id_proyek='$proyekid'";
            $result_lappekerjaan = mysqli_query($conn, $query_lappekerjaan) or die(mysqli_error($conn));
            $row_lappekerjaan = mysqli_fetch_assoc($result_lappekerjaan);
        }

        // =============================== timeline A ===============================

        // if ($row_jml_penyeliaanlk != 0) {
        // $query_penyeliaanlk = "SELECT * FROM penyeliaanlk WHERE id_proyek='$proyekid'";
        // $result_penyeliaanlk = mysqli_query($conn, $query_penyeliaanlk) or die(mysqli_error($conn));
        // $row_penyeliaanlk = mysqli_fetch_assoc($result_penyeliaanlk);
        // }

        if ($row_s1['tingkat_status1'] > 9) {
            $query_penyeliaansertifikat = "SELECT MAX(lastupdate_penyeliaan) AS lastupdate_penyeliaan FROM sertifikat WHERE
id_proyek ='$proyekid'";
            $result_penyeliaansertifikat = mysqli_query($conn, $query_penyeliaansertifikat) or die(mysqli_error($conn));
            $row_penyeliaansertifikat = mysqli_fetch_assoc($result_penyeliaansertifikat);
        }

        if ($row_jml_cetaksertifikat != 0) {
            $query_cetaksertifikat = "SELECT * FROM cetaksertifikat WHERE id_proyek='$proyekid'";
            $result_cetaksertifikat = mysqli_query($conn, $query_cetaksertifikat) or die(mysqli_error($conn));
            $row_cetaksertifikat = mysqli_fetch_assoc($result_cetaksertifikat);
        }

        $linkNull = 1;
        if ($row_jml_salinansertifikat != 0) {
            // $query_salinansertifikat = "SELECT * FROM salinansertifikat WHERE id_proyek='$proyekid'";
            // $result_salinansertifikat = mysqli_query($conn, $query_salinansertifikat) or die(mysqli_error($conn));
            // $row_salinansertifikat = mysqli_fetch_assoc($result_salinansertifikat);

            $query_linksertifikat = "SELECT * FROM sertifikat WHERE id_proyek='$proyekid'";
            $result_linksertifikat = mysqli_query($conn, $query_linksertifikat) or die(mysql_error($conn));
            while ($row_linksertifikat = $result_linksertifikat->fetch_assoc()) {
                if ($row_linksertifikat['link_sertifikat'] == '') $linkNull = 0;
            }
        }

        if ($row_s1['tingkat_status1'] > 11) {
            $query_salinansertifikat = "SELECT MAX(lastupdate_sertifikat) AS lastupdate_sertifikat FROM sertifikat WHERE id_proyek
='$proyekid'";
            $result_salinansertifikat = mysqli_query($conn, $query_salinansertifikat) or die(mysqli_error($conn));
            $row_salinansertifikat = mysqli_fetch_assoc($result_salinansertifikat);
        }

        if ($row_jml_bastsertifikat != 0) {
            $query_bastsertifikat = "SELECT * FROM bastsertifikat WHERE id_proyek='$proyekid'";
            $result_bastsertifikat = mysqli_query($conn, $query_bastsertifikat) or die(mysqli_error($conn));
            $row_bastsertifikat = mysqli_fetch_assoc($result_bastsertifikat);
        }

        // =============================== timeline B ===============================

        if ($row_jml_inputdo != 0) {
            $query_inputdo = "SELECT * FROM inputdo WHERE id_proyek='$proyekid'";
            $result_inputdo = mysqli_query($conn, $query_inputdo) or die(mysqli_error($conn));
            $row_inputdo = mysqli_fetch_assoc($result_inputdo);
        }

        if ($row_jml_invoicepajak != 0) {
            $query_invoicepajak = "SELECT * FROM invoicepajak WHERE id_proyek='$proyekid'";
            $result_invoicepajak = mysqli_query($conn, $query_invoicepajak) or die(mysqli_error($conn));
            $row_invoicepajak = mysqli_fetch_assoc($result_invoicepajak);
        }

        if ($row_jml_spj != 0) {
            $query_spj = "SELECT * FROM spj WHERE id_proyek='$proyekid'";
            $result_spj = mysqli_query($conn, $query_spj) or die(mysqli_error($conn));
            $row_spj = mysqli_fetch_assoc($result_spj);
        }

        if ($row_jml_buktitransfer != 0) {
            $query_buktitransfer = "SELECT * FROM buktitransfer WHERE id_proyek='$proyekid'";
            $result_buktitransfer = mysqli_query($conn, $query_buktitransfer) or die(mysqli_error($conn));
            $row_buktitransfer = mysqli_fetch_assoc($result_buktitransfer);
        }

        if ($row_jml_sppbuktipotong != 0) {
            $query_sppbuktipotong = "SELECT * FROM sppbuktipotong WHERE id_proyek='$proyekid'";
            $result_sppbuktipotong = mysqli_query($conn, $query_sppbuktipotong) or die(mysqli_error($conn));
            $row_sppbuktipotong = mysqli_fetch_assoc($result_sppbuktipotong);
        }
        
        // =============================== timeline C ===============================

        if ($row_jml_posubkontrak != 0) {
            $query_posubkontrak = "SELECT * FROM posubkontrak WHERE id_proyek='$proyekid'";
            $result_posubkontrak = mysqli_query($conn, $query_posubkontrak) or die(mysqli_error($conn));
            $row_posubkontrak = mysqli_fetch_assoc($result_posubkontrak);
        }

        if ($row_jml_kirimsubkontrak != 0) {
            $query_kirimsubkontrak = "SELECT * FROM kirimsubkontrak WHERE id_proyek='$proyekid'";
            $result_kirimsubkontrak = mysqli_query($conn, $query_kirimsubkontrak) or die(mysqli_error($conn));
            $row_kirimsubkontrak = mysqli_fetch_assoc($result_kirimsubkontrak);
        }

        if ($row_jml_uangsubkontrak != 0) {
            $query_uangsubkontrak = "SELECT * FROM uangsubkontrak WHERE id_proyek='$proyekid'";
            $result_uangsubkontrak = mysqli_query($conn, $query_uangsubkontrak) or die(mysqli_error($conn));
            $row_uangsubkontrak = mysqli_fetch_assoc($result_uangsubkontrak);
        }

        if ($row_jml_invoicepajaksubkontrak != 0) {
            $query_invoicepajaksubkontrak = "SELECT * FROM invoicepajaksubkontrak WHERE id_proyek='$proyekid'";
            $result_invoicepajaksubkontrak = mysqli_query($conn, $query_invoicepajaksubkontrak) or die(mysqli_error($conn));
            $row_invoicepajaksubkontrak = mysqli_fetch_assoc($result_invoicepajaksubkontrak);
        }

        // if ($row_jml_verifikasibelisubkontrak != 0) {
        // $query_verifikasibelisubkontrak = "SELECT * FROM verifikasibelisubkontrak WHERE id_proyek='$proyekid'";
        // $result_verifikasibelisubkontrak = mysqli_query($conn, $query_verifikasibelisubkontrak) or die(mysqli_error($conn));
        // $row_verifikasibelisubkontrak = mysqli_fetch_assoc($result_verifikasibelisubkontrak);
        // }
        if ($row_s3['tingkat_status3'] > 11) {
            $query_verifikasibelisubkontrak = "SELECT MAX(lastupdate_verifikasibelisubkontrak) AS
lastupdate_verifikasibelisubkontrak FROM verifikasibelisubkontrak WHERE id_proyek = '$proyekid'";
            $result_verifikasibelisubkontrak = mysqli_query($conn, $query_verifikasibelisubkontrak) or die(mysqli_error($conn));
            $row_verifikasibelisubkontrak = mysqli_fetch_assoc($result_verifikasibelisubkontrak);
        }


        if ($row_jml_bastalat != 0) {
            $query_bastalat = "SELECT * FROM bastalat WHERE id_proyek='$proyekid'";
            $result_bastalat = mysqli_query($conn, $query_bastalat) or die(mysqli_error($conn));
            $row_bastalat = mysqli_fetch_assoc($result_bastalat);
        }
    }
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
                                <!-- <div class="components-preview wide-md mx-auto"> -->
                                <div class="components-preview">
                                    <!-- <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title fw-normal">Dashboard</h2>
                                        </div>
                                    </div>.nk-block-head -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="row g-gs">
                                            <div class="col-md-6 col-lg-8 col-xxl-8">
                                                <div class="card">
                                                    <div class="team">
                                                        <div class="user-card user-card-s2">
                                                            <?php if($row1['logo_pelanggan'] != '') { ?>
                                                            <div class="user-avatar sq lg bg-white">
                                                                <span><img src="<?= $row1['logo_pelanggan']; ?>"></span>
                                                            </div>
                                                            <?php } else { ?>
                                                            <div class="user-avatar sq lg">
                                                                <span><img src="<?= $row1['logo_pelanggan']; ?>"></span>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="user-info">
                                                                <h6><?= $row1['nama_pelanggan']; ?></h6>
                                                                <span
                                                                    class="sub-text"><?= $row1['kategori_pelanggan']; ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="nk-tb-list is-compact">
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col"><span>Marketing</span></div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span><?= $row0['marketing_proyek']; ?></span>
                                                                </div>
                                                            </div><!-- .nk-tb-head -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Sumber Dana</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['sumberdana_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>PAGU</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= 'Rp. ' . number_format($row0['pagu_proyek'], 0); ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Contact</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row1['kontak_pelanggan']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Deadline Proyek</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= date_format(date_create($row0['deadline_proyek']), 'd F Y'); ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>NPWP</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row1['npwp_pelanggan']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Nama NPWP</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row1['namanpwp_pelanggan']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Alat Tidak Laik</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['alatlaik_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Jenis Alat</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['jenisalat_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Jumlah Alat</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['jmlalat_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->


                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Jumlah Dana</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['jmldana_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Request Jadwal
                                                                            Pekerjaan</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['jadwalkerja_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Daftar
                                                                            inventaris</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['daftarinventaris_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Deadline Kirim
                                                                            Sertifikat</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['deadlinesertifikat_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Catatan</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?= $row0['catatan_proyek']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Permintaan tanggal
                                                                            kalibrasi</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span class=" tb-amount"><span>
                                                                            <?php if ($row2['tingkat_status'] > 1) {  ?>
                                                                            <?php if ( ($row_order['tgl1_permintaan_order'] != '') && ($row_order['tgl1_permintaan_order'] != '0000-00-00') ) {  ?>
                                                                            <?= date_format(date_create($row_order['tgl1_permintaan_order']), 'd F Y'); ?>
                                                                            <?php } } ?>
                                                                        </span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Permintaan tanggal
                                                                            berakhir</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span class=" tb-amount"><span>
                                                                            <?php if ($row2['tingkat_status'] > 1) {  ?>
                                                                            <?php if ( ($row_order['tgl2_permintaan_order'] != '') && ($row_order['tgl2_permintaan_order'] != '0000-00-00') ) {  ?>
                                                                            <?= date_format(date_create($row_order['tgl2_permintaan_order']), 'd F Y'); ?>
                                                                            <?php } } ?>
                                                                        </span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Nomor Penawaran</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?php if ($row_jml_ph != 0) echo $row_penawaranharga['no_penawaranharga']; ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Nilai Penawaran</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?php if ($row_jml_ph != 0) echo 'Rp. ' . number_format($row_penawaranharga['nilai_penawaranharga'], 0); ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Nilai Negosiasi</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span
                                                                        class=" tb-amount"><span><?php if ($row_jml_nego != 0) echo 'Rp. ' . number_format($row_negosiasi['nilai_negosiasi'], 0); ?></span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Pekerjaan dijadwalkan
                                                                            dimulai</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span class=" tb-amount"><span>
                                                                            <?php if ($row2['tingkat_status'] > 5) {  ?>
                                                                            <?= date_format(date_create($row_jadwal1['stgl_kegiatan']), 'd F Y'); ?>
                                                                            <?php } ?>
                                                                        </span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Pekerjaan dijadwalkan
                                                                            berakhir</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span class=" tb-amount"><span>
                                                                            <?php if ($row2['tingkat_status'] > 5) {  ?>
                                                                            <?= date_format(date_create($row_jadwal2['etgl_kegiatan']), 'd F Y'); ?>
                                                                            <?php } ?>
                                                                        </span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Total Invoice</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span class=" tb-amount"><span>
                                                                            <?php if ($row_s2['tingkat_status2'] > 10) {  ?>
                                                                            <?= 'Rp. ' . number_format($row_invoicepajak['nilai_invoicepajak'], 0); ?>
                                                                            <?php } ?>
                                                                        </span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class=""><span>Status akhir</span></span>
                                                                </div>
                                                                <div class="nk-tb-col text-right">
                                                                    <span class=" tb-amount"><span>
                                                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing')) {
                                                                            if ($row2['tingkat_status'] > 4) {
                                                                                if ($row_negosiasi['subkontrak_negosiasi'] == 'Ada') {
                                                                                    if (
                                                                                        $row_s1['tingkat_status1'] == 13 && $row_s2['tingkat_status2'] == 14 && $row_s3['tingkat_status3'] == 15
                                                                                    ) { ?>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-dim btn-outline-success btn-ok-proyekdetail">Selesai
                                                                            </button>
                                                                            <?php }
                                                                                } else {
                                                                                    if ($row_s1['tingkat_status1'] == 13 && $row_s2['tingkat_status2'] == 14) { ?>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-dim btn-outline-success btn-ok-proyekdetail">Selesai
                                                                            </button>
                                                                            <?php }
                                                                                } ?>
                                                                            <?php }
                                                                            if ($row2['tingkat_status'] < 5) { ?>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-dim btn-outline-danger btn-not-proyekdetail">Dibatalkan
                                                                            </button>
                                                                            <?php }
                                                                        } ?>
                                                                        </span></span>
                                                                </div>
                                                            </div><!-- .nk-tb-item -->

                                                        </div><!-- .nk-tb-list -->


                                                    </div><!-- .team -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-md-6 col-lg-4 col-xxl-4">
                                                <div class="card h-100">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title text-muted"><?= $row0['no_proyek']; ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="timeline">
                                                            <h6 class="timeline-head">Timeline Awal</h6>
                                                            <ul class="timeline-list">
                                                                <li class="timeline-item">
                                                                    <?php if ($row2['tingkat_status'] > 1) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row2['tingkat_status'] > 1) { ?>
                                                                        <?= substr($row_order['lastupdate_permintaan_order'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_order['lastupdate_permintaan_order'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_order['lastupdate_permintaan_order'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row2['tingkat_status'] > 1) { ?>
                                                                        <strong
                                                                            class="tb-status text-success">Permintaan/Order</strong>
                                                                        <?php } else { ?>
                                                                        <strong
                                                                            class="tb-status text-muted">Permintaan/Order</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row2['tingkat_status'] > 1) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_order['link_permintaan_order']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis')) {
                                                                                if ($row2['tingkat_status'] == 1) {
                                                                                    if ($row_jml_po == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-order">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <br>
                                                                            <button
                                                                                id="<?= $row_order['id_permintaan_order']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-order">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-order">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row2['tingkat_status'] > 2) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row2['tingkat_status'] > 2) { ?>
                                                                        <?= substr($row_kajiulang['lastupdate_kajiulang'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_kajiulang['lastupdate_kajiulang'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_kajiulang['lastupdate_kajiulang'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row2['tingkat_status'] > 2) { ?>
                                                                        <strong class="tb-status text-success">Kaji
                                                                            Ulang Permintaan</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Kaji Ulang
                                                                            Permintaan</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php
                                                                            if ($row2['tingkat_status'] > 2) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="kajiulang_pdf(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis')) {
                                                                                if ($row2['tingkat_status'] == 2) { 
                                                                                    if ($row_jml_kjmain == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-kajiulang">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_kjmain['id_kajiulangmain']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-kajiulang">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-kajiulang">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-kajiulang">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row2['tingkat_status'] > 3) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row2['tingkat_status'] > 3) { ?>
                                                                        <?= substr($row_penawaranharga['lastupdate_penawaranharga'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_penawaranharga['lastupdate_penawaranharga'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_penawaranharga['lastupdate_penawaranharga'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row2['tingkat_status'] > 3) { ?>
                                                                        <strong class="tb-status text-success">Penawaran
                                                                            Harga</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Penawaran
                                                                            Harga</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row2['tingkat_status'] > 3) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_penawaranharga['link_penawaranharga']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum')) {
                                                                                if ($row2['tingkat_status'] == 3) {
                                                                                    if ($row_jml_ph == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-tawar">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_penawaranharga['id_penawaranharga']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-penawaranharga">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-penawaranharga">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-penawaranharga">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row2['tingkat_status'] > 4) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row2['tingkat_status'] > 4) { ?>
                                                                        <?= substr($row_negosiasi['lastupdate_negosiasi'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_penawaranharga['lastupdate_penawaranharga'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_negosiasi['lastupdate_negosiasi'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row2['tingkat_status'] > 4) { ?>
                                                                        <strong class="tb-status text-success">Negosiasi
                                                                            dan Kontrak</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Negosiasi
                                                                            dan Kontrak</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row2['tingkat_status'] > 4) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_negosiasi['link_negosiasi']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing')) {
                                                                                if ($row2['tingkat_status'] == 4) {
                                                                                    if ($row_jml_nego == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-nego">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_negosiasi['id_negosiasi']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-negosiasi">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-negosiasi">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-negosiasi">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row2['tingkat_status'] > 5) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row2['tingkat_status'] > 5) { ?>
                                                                        <?= substr($row_kegiatan['lastupdate_kegiatan'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_kegiatan['lastupdate_kegiatan'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_kegiatan['lastupdate_kegiatan'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row2['tingkat_status'] > 5) { ?>
                                                                        <strong
                                                                            class="tb-status text-success">Penyusunan
                                                                            Jadwal</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Penyusunan
                                                                            Jadwal</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row2['tingkat_status'] > 5) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="jadwal_pdf(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </button>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis')) {
                                                                                if ($row2['tingkat_status'] == 5) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="jadwal_page(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-jadwal">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-jadwal">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row2['tingkat_status'] > 6) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row2['tingkat_status'] > 6) { ?>
                                                                        <?= substr($row_spk['lastupdate_spk'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_penawaranharga['lastupdate_penawaranharga'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_spk['lastupdate_spk'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row2['tingkat_status'] > 6) { ?>
                                                                        <strong class="tb-status text-success">SPK dan
                                                                            Akomodasi</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">SPK dan
                                                                            Akomodasi</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row2['tingkat_status'] > 6) { ?>
                                                                            <br>
                                                                            <button onclick="spk_pdf(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </button>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis')) {
                                                                                if ($row2['tingkat_status'] == 6) {
                                                                                    if ($row_jml_spk == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-spk">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button id="<?= $row_spk['id_spk']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-spk">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-spk">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-spk">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row2['tingkat_status'] > 7) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row2['tingkat_status'] > 7) { ?>
                                                                        <?= substr($row_berkasteknisi['lastupdate_berkasteknisi'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_penawaranharga['lastupdate_penawaranharga'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_berkasteknisi['lastupdate_berkasteknisi'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row2['tingkat_status'] > 7) { ?>
                                                                        <strong class="tb-status text-success">Berkas
                                                                            Teknisi</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Berkas
                                                                            Teknisi</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php
                                                                            if ($row2['tingkat_status'] > 7) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="berkasteknisi_pdf(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis')) {
                                                                                if ($row2['tingkat_status'] == 7) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="berkasteknisi_page(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-berkasteknisi">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-berkasteknisi">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s1['tingkat_status1'] > 0 || $row_s2['tingkat_status2'] > 0 || $row_s3['tingkat_status3'] > 0) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s1['tingkat_status1'] > 0 || $row_s2['tingkat_status2'] > 0 || $row_s3['tingkat_status3'] > 0) { ?>
                                                                        <?= substr($row_lappekerjaan['lastupdate_lappekerjaan'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_penawaranharga['lastupdate_penawaranharga'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_lappekerjaan['lastupdate_lappekerjaan'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s1['tingkat_status1'] > 0 || $row_s2['tingkat_status2'] > 0 || $row_s3['tingkat_status3'] > 0) { ?>
                                                                        <strong class="tb-status text-success">Laporan
                                                                            Pekerjaan</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Laporan
                                                                            Pekerjaan</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s1['tingkat_status1'] > 0 || $row_s2['tingkat_status2'] > 0 || $row_s3['tingkat_status3'] > 0) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_lappekerjaan['link_lappekerjaan']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Teknisi')) {
                                                                                if ($row2['tingkat_status'] == 8 && $row_s1['tingkat_status1'] == 0 && $row_s2['tingkat_status2'] == 0 && $row_s3['tingkat_status3'] == 0) {
                                                                                    if ($row_jml_lappekerjaan == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-lappekerjaan">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_lappekerjaan['id_lappekerjaan']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-lappekerjaan">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-lappekerjaan">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-lappekerjaan">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div>
                                            <div class="col-lg-4 col-xxl-4">
                                                <div class="card h-100">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title text-muted"><?= $row0['no_proyek']; ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="timeline">
                                                            <h6 class="timeline-head">Timeline Sertifikat</h6>
                                                            <ul class="timeline-list">
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s1['tingkat_status1'] > 9) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s1['tingkat_status1'] > 9) { ?>
                                                                        <?= substr($row_penyeliaansertifikat['lastupdate_penyeliaan'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_penyeliaansertifikat['lastupdate_penyeliaan'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_penyeliaansertifikat['lastupdate_penyeliaan'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s1['tingkat_status1'] > 9) { ?>
                                                                        <strong
                                                                            class="tb-status text-success">Penyeliaan
                                                                            LK</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Penyeliaan
                                                                            LK</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s1['tingkat_status1'] > 9) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="penyeliaansertifikat_page(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </button>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Penyelia')) {
                                                                                if ($row_s1['tingkat_status1'] == 9) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="penyeliaansertifikat_page(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-penyeliaanlk">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-penyeliaanlk">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s1['tingkat_status1'] > 10) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s1['tingkat_status1'] > 10) { ?>
                                                                        <?= substr($row_cetaksertifikat['lastupdate_cetaksertifikat'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_cetaksertifikat['lastupdate_cetaksertifikat'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_cetaksertifikat['lastupdate_cetaksertifikat'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s1['tingkat_status1'] > 10) { ?>
                                                                        <strong class="tb-status text-success">Cetak
                                                                            Sertifikat</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Cetak
                                                                            Sertifikat</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Penyelia')) {
                                                                                if ($row_s1['tingkat_status1'] == 10) { ?>
                                                                            <br>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-cetaksertifikat">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-cetaksertifikat">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s1['tingkat_status1'] > 11) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s1['tingkat_status1'] > 11) { ?>
                                                                        <?= substr($row_salinansertifikat['lastupdate_sertifikat'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_salinansertifikat['lastupdate_sertifikat'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_salinansertifikat['lastupdate_sertifikat'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s1['tingkat_status1'] > 11) { ?>
                                                                        <strong class="tb-status text-success">Salinan
                                                                            Sertifikat</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Salinan
                                                                            Sertifikat</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php
                                                                            if ($row_s1['tingkat_status1'] > 11) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="salinansertifikat_page(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum')) {
                                                                                if ($row_s1['tingkat_status1'] == 11) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="salinansertifikat_page(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-salinansertifikat">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-salinansertifikat">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s1['tingkat_status1'] > 12) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s1['tingkat_status1'] > 12) { ?>
                                                                        <?= substr($row_bastsertifikat['lastupdate_bastsertifikat'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_bastsertifikat['lastupdate_bastsertifikat'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_bastsertifikat['lastupdate_bastsertifikat'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s1['tingkat_status1'] > 12) { ?>
                                                                        <strong class="tb-status text-success">BAST
                                                                            Sertifikat</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">BAST
                                                                            Sertifikat</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s1['tingkat_status1'] > 12) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_bastsertifikat['link_bastsertifikat']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Penyelia')) {
                                                                                if ($row_s1['tingkat_status1'] == 12) {
                                                                                    if ($row_jml_bastsertifikat == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-bastsertifikat">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_bastsertifikat['id_bastsertifikat']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-bastsertifikat">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php } ?>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-bastsertifikat">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-bastsertifikat">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <?php if ($row_s1['tingkat_status1'] == 13) { ?>
                                                        <div class="text-center">
                                                            <button id="<?= $proyekid; ?>"
                                                                class="btn btn-dim btn-outline-danger btn-back-tla">Batal
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div><!-- .card -->
                                            </div>
                                            <div class="col-lg-4 col-xxl-4">
                                                <div class="card h-100">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title text-muted"><?= $row0['no_proyek']; ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="timeline">
                                                            <h6 class="timeline-head">Timeline Penagihan</h6>
                                                            <ul class="timeline-list">
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s2['tingkat_status2'] > 9) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s2['tingkat_status2'] > 9) { ?>
                                                                        <?= substr($row_inputdo['lastupdate_inputdo'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_inputdo['lastupdate_inputdo'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_inputdo['lastupdate_inputdo'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s2['tingkat_status2'] > 9) { ?>
                                                                        <strong class="tb-status text-success">Input
                                                                            DO</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Input
                                                                            DO</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s2['tingkat_status2'] > 9) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_inputdo['link_inputdo']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum')) {
                                                                                if ($row_s2['tingkat_status2'] == 9) {
                                                                                    if ($row_jml_inputdo == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-inputdo">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <br>
                                                                            <button
                                                                                id="<?= $row_inputdo['id_inputdo']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-inputdo">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-inputdo">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-inputdo">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s2['tingkat_status2'] > 10) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s2['tingkat_status2'] > 10) { ?>
                                                                        <?= substr($row_invoicepajak['lastupdate_invoicepajak'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_invoicepajak['lastupdate_invoicepajak'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_invoicepajak['lastupdate_invoicepajak'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s2['tingkat_status2'] > 10) { ?>
                                                                        <strong class="tb-status text-success">Invoice
                                                                            dan Pajak</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Invoice
                                                                            dan Pajak</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s2['tingkat_status2'] > 10) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_invoicepajak['link_invoicepajak']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Finance')) {
                                                                                if ($row_s2['tingkat_status2'] == 10) {
                                                                                    if ($row_jml_invoicepajak == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-invoicepajak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_invoicepajak['id_invoicepajak']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-invoicepajak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-invoicepajak">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-invoicepajak">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s2['tingkat_status2'] > 11) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s2['tingkat_status2'] > 11) { ?>
                                                                        <?= substr($row_spj['lastupdate_spj'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_spj['lastupdate_spj'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_spj['lastupdate_spj'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s2['tingkat_status2'] > 11) { ?>
                                                                        <strong
                                                                            class="tb-status text-success">SPJ</strong>
                                                                        <?php } else { ?>
                                                                        <strong
                                                                            class="tb-status text-muted">SPJ</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Finance')) {
                                                                                if ($row_s2['tingkat_status2'] == 11) { ?>
                                                                            <br>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-spj">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-spj">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s2['tingkat_status2'] > 12) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s2['tingkat_status2'] > 12) { ?>
                                                                        <?= substr($row_buktitransfer['lastupdate_buktitransfer'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_buktitransfer['lastupdate_buktitransfer'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_buktitransfer['lastupdate_buktitransfer'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s2['tingkat_status2'] > 12) { ?>
                                                                        <strong class="tb-status text-success">Bukti
                                                                            Transfer</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Bukti
                                                                            Transfer</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s2['tingkat_status2'] > 12) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_buktitransfer['link_buktitransfer']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Finance')) {
                                                                                if ($row_s2['tingkat_status2'] == 12) {
                                                                                    if ($row_jml_buktitransfer == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-buktitransfer">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_buktitransfer['id_buktitransfer']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-buktitransfer">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php } ?>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-buktitransfer">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-buktitransfer">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s2['tingkat_status2'] > 13) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s2['tingkat_status2'] > 13) { ?>
                                                                        <?= substr($row_sppbuktipotong['lastupdate_sppbuktipotong'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_sppbuktipotong['lastupdate_sppbuktipotong'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_sppbuktipotong['lastupdate_sppbuktipotong'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s2['tingkat_status2'] > 13) { ?>
                                                                        <strong class="tb-status text-success">SSP
                                                                            dan Bukti Potong</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">SSP dan
                                                                            Bukti Potong</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s2['tingkat_status2'] > 13) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_sppbuktipotong['link_sppbuktipotong']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Finance')) {
                                                                                if ($row_s2['tingkat_status2'] == 13) {
                                                                                    if ($row_jml_sppbuktipotong == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-sppbuktipotong">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_sppbuktipotong['id_sppbuktipotong']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-sppbuktipotong">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php } ?>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-sppbuktipotong">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-sppbuktipotong">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <?php if ($row_s2['tingkat_status2'] == 14) { ?>
                                                        <div class="text-center">
                                                            <button id="<?= $proyekid; ?>"
                                                                class="btn btn-dim btn-outline-danger btn-back-tlb">Batal
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div><!-- .card -->
                                            </div>
                                            <div class="col-lg-4 col-xxl-4">
                                                <div class="card h-100">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title text-muted"><?= $row0['no_proyek']; ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="timeline">
                                                            <h6 class="timeline-head">Timeline Subkontrak</h6>
                                                            <ul class="timeline-list">
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s3['tingkat_status3'] > 9) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s3['tingkat_status3'] > 9) { ?>
                                                                        <?= substr($row_posubkontrak['lastupdate_posubkontrak'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_posubkontrak['lastupdate_posubkontrak'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_posubkontrak['lastupdate_posubkontrak'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s3['tingkat_status3'] > 9) { ?>
                                                                        <strong class="tb-status text-success">PO
                                                                            Subkontrak</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">PO
                                                                            Subkontrak</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s3['tingkat_status3'] > 9) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_posubkontrak['link_posubkontrak']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum')) {
                                                                                if ($row_s3['tingkat_status3'] == 9) {
                                                                                    if ($row_jml_posubkontrak == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-posubkontrak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <br>
                                                                            <button
                                                                                id="<?= $row_posubkontrak['id_posubkontrak']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-posubkontrak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-posubkontrak">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-posubkontrak">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- //////////////////////// KIRIM  -->
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s3['tingkat_status3'] > 10) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s3['tingkat_status3'] > 10) { ?>
                                                                        <?= substr($row_kirimsubkontrak['lastupdate_kirimsubkontrak'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_kirimsubkontrak['lastupdate_kirimsubkontrak'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_kirimsubkontrak['lastupdate_kirimsubkontrak'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s3['tingkat_status3'] > 10) { ?>
                                                                        <strong class="tb-status text-success">Kirim
                                                                            Subkontrak</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Kirim
                                                                            Subkontrak</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s3['tingkat_status3'] > 10) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_kirimsubkontrak['link_kirimsubkontrak']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis')) {
                                                                                if ($row_s3['tingkat_status3'] == 10) {
                                                                                    if ($row_jml_kirimsubkontrak == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-kirimsubkontrak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_kirimsubkontrak['id_kirimsubkontrak']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-kirimsubkontrak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-kirimsubkontrak">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-kirimsubkontrak">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- //////////////////////////// UANG -->
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s3['tingkat_status3'] > 11) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s3['tingkat_status3'] > 11) { ?>
                                                                        <?= substr($row_uangsubkontrak['lastupdate_uangsubkontrak'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_uangsubkontrak['lastupdate_uangsubkontrak'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_uangsubkontrak['lastupdate_uangsubkontrak'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s3['tingkat_status3'] > 11) { ?>
                                                                        <strong class="tb-status text-success">Pelunasan
                                                                            / Uang Muka</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Pelunasan /
                                                                            Uang Muka</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s3['tingkat_status3'] > 11) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_uangsubkontrak['link_uangsubkontrak']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Finance')) {
                                                                                if ($row_s3['tingkat_status3'] == 11) {
                                                                                    if ($row_jml_uangsubkontrak == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-uangsubkontrak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_uangsubkontrak['id_uangsubkontrak']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-uangsubkontrak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-uangsubkontrak">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-uangsubkontrak">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s3['tingkat_status3'] > 12) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s3['tingkat_status3'] > 12) { ?>
                                                                        <?= substr($row_invoicepajaksubkontrak['lastupdate_invoicepajaksubkontrak'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_invoicepajaksubkontrak['lastupdate_invoicepajaksubkontrak'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_invoicepajaksubkontrak['lastupdate_invoicepajaksubkontrak'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s3['tingkat_status3'] > 12) { ?>
                                                                        <strong class="tb-status text-success">Invoice
                                                                            dan Pajak Subkontrak</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Invoice
                                                                            dan Pajak Subkontrak</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s3['tingkat_status3'] > 12) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_invoicepajaksubkontrak['link_invoicepajaksubkontrak']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Finance')) {
                                                                                if ($row_s3['tingkat_status3'] == 12) {
                                                                                    if ($row_jml_invoicepajaksubkontrak == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-invoicepajaksubkontrak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_invoicepajaksubkontrak['id_invoicepajaksubkontrak']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-invoicepajaksubkontrak">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <?php } ?>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-invoicepajaksubkontrak">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-invoicepajaksubkontrak">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s3['tingkat_status3'] > 13) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s3['tingkat_status3'] > 13) { ?>
                                                                        <?= substr($row_verifikasibelisubkontrak['lastupdate_verifikasibelisubkontrak'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_verifikasibelisubkontrak['lastupdate_verifikasibelisubkontrak'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_verifikasibelisubkontrak['lastupdate_verifikasibelisubkontrak'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s3['tingkat_status3'] > 13) { ?>
                                                                        <strong
                                                                            class="tb-status text-success">Verifikasi
                                                                            Pembelian Subkontrak</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">Verifikasi
                                                                            Pembelian Subkontrak</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s3['tingkat_status3'] > 13) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="verifikasibelisubkontrak_pdf(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum')) {
                                                                                if ($row_s3['tingkat_status3'] == 13) { ?>
                                                                            <br>
                                                                            <button
                                                                                onclick="verifikasibelisubkontrak_page(<?= $proyekid; ?>)"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-verifikasibelisubkontrak">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-verifikasibelisubkontrak">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <?php if ($row_s3['tingkat_status3'] > 14) { ?>
                                                                    <div class="timeline-status bg-success"></div>
                                                                    <?php } else { ?>
                                                                    <div class="timeline-status bg-light is-outline">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="timeline-date">
                                                                        <?php if ($row_s3['tingkat_status3'] > 14) { ?>
                                                                        <?= substr($row_bastalat['lastupdate_bastalat'], 8, -8) . ' ' . date('M', mktime(0, 0, 0, substr($row_bastalat['lastupdate_bastalat'], 5, -12), 10)); ?>
                                                                        <br>
                                                                        <?= substr($row_bastalat['lastupdate_bastalat'], 10, -3); ?>
                                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross-circle"></em>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <?php if ($row_s3['tingkat_status3'] > 14) { ?>
                                                                        <strong class="tb-status text-success">BAST
                                                                            Alat</strong>
                                                                        <?php } else { ?>
                                                                        <strong class="tb-status text-muted">BAST
                                                                            Alat</strong>
                                                                        <?php } ?>
                                                                        <div class="timeline-des">
                                                                            <?php if ($row_s3['tingkat_status3'] > 14) { ?>
                                                                            <br>
                                                                            <a href="<?= $row_bastalat['link_bastalat']; ?>"
                                                                                target="_blank"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-info">
                                                                                <em class="icon ni ni-info-i"></em>
                                                                            </a>
                                                                            <?php }
                                                                            if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Penyelia')) {
                                                                                if ($row_s3['tingkat_status3'] == 14) {
                                                                                    if ($row_jml_bastalat == 0) { ?>
                                                                            <br>
                                                                            <button data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-bastalat">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php } else { ?>
                                                                            <button
                                                                                id="<?= $row_bastalat['id_bastalat']; ?>"
                                                                                data-toggle="modal"
                                                                                data-target="#addProyekDetail"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-primary btn-edit-bastalat">
                                                                                <em class="icon ni ni-pen-fill"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <?php } ?>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-success btn-ok-bastalat">
                                                                                <em class="icon ni ni-check-thick"></em>
                                                                            </button>
                                                                            <span>&nbsp;</span>
                                                                            <button id="<?= $proyekid; ?>"
                                                                                class="btn btn-round btn-icon btn-sm btn-dim btn-outline-danger btn-not-bastalat">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </button>
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <?php if ($row_s3['tingkat_status3'] == 15) { ?>
                                                        <div class="text-center">
                                                            <button id="<?= $proyekid; ?>"
                                                                class="btn btn-dim btn-outline-danger btn-back-tlc">Batal
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .components-preview -->
                        </div>
                    </div>
                </div>


                <!-- Modal Form -->
                <div class="modal fade" id="addProyekDetail">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-head">Permintaan / Order</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                    novalidate="novalidate">

                                    <!-- ============================== id hidden ============================== -->

                                    <input type="hidden" id="id_proyek" name="id_proyek"
                                        value="<?= $row0['id_proyek']; ?>" />
                                    <input type="hidden" id="form_name" name="form_name" value="add_permintaan_order" />
                                    <input type="hidden" id="id_permintaan_order" name="id_permintaan_order"
                                        value="0" />
                                    <input type="hidden" id="id_kajiulangmain" name="id_kajiulangmain" value="0" />
                                    <input type="hidden" id="id_penawaranharga" name="id_penawaranharga" value="0" />
                                    <input type="hidden" id="id_negosiasi" name="id_negosiasi" value="0" />
                                    <input type="hidden" id="id_spk" name="id_spk" value="0" />
                                    <input type="hidden" id="id_lappekerjaan" name="id_lappekerjaan" value="0" />
                                    <input type="hidden" id="id_bastsertifikat" name="id_bastsertifikat" value="0" />
                                    <input type="hidden" id="id_inputdo" name="id_inputdo" value="0" />
                                    <input type="hidden" id="id_invoicepajak" name="id_invoicepajak" value="0" />
                                    <input type="hidden" id="id_buktitransfer" name="id_buktitransfer" value="0" />
                                    <input type="hidden" id="id_sppbuktipotong" name="id_sppbuktipotong" value="0" />
                                    <input type="hidden" id="id_posubkontrak" name="id_posubkontrak" value="0" />
                                    <input type="hidden" id="id_kirimsubkontrak" name="id_kirimsubkontrak" value="0" />
                                    <input type="hidden" id="id_uangsubkontrak" name="id_uangsubkontrak" value="0" />
                                    <input type="hidden" id="id_invoicepajaksubkontrak" name="id_invoicepajaksubkontrak"
                                        value="0" />
                                    <!-- <input type="hidden" id="id_verifikasibelisubkontrak" name="id_verifikasibelisubkontrak" value="0" /> -->
                                    <input type="hidden" id="id_bastalat" name="id_bastalat" value="0" />

                                    <!-- ============================== permintaan order ============================== -->

                                    <div class="form-group" id="tgl1_permintaan_order_form">
                                        <label class="form-label" for="tgl1_permintaan_order">Permintaan tanggal
                                            dimulai</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-calendar-alt"></em>
                                            </div>
                                            <input type="text" class="form-control date-picker invalid"
                                                data-date-format="yyyy-mm-dd" id="tgl1_permintaan_order"
                                                name="tgl1_permintaan_order">
                                        </div>
                                        <div class="form-note">Date format
                                            <code>yyyy-mm-dd</code>
                                        </div>
                                    </div>

                                    <div class="form-group" id="tgl2_permintaan_order_form">
                                        <label class="form-label" for="tgl2_permintaan_order">Permintaan
                                            tanggal
                                            berakhir</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-calendar-alt"></em>
                                            </div>
                                            <input type="text" class="form-control date-picker invalid"
                                                data-date-format="yyyy-mm-dd" id="tgl2_permintaan_order"
                                                name="tgl2_permintaan_order">
                                        </div>
                                        <div class="form-note">
                                            Date
                                            format
                                            <code>yyyy-mm-dd</code>
                                        </div>
                                    </div>

                                    <div class="form-group" id="link_permintaan_order_form">
                                        <label class="form-label" for="link_permintaan_order">Link Order</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_permintaan_order"
                                                name="link_permintaan_order" placeholder="Link Order" required
                                                data-msg="Mohon isi link order">
                                        </div>
                                    </div>

                                    <!-- ============================== kajiulang ============================== -->

                                    <div class="form-group" id="akomodasi_kajiulangmain_form">
                                        <label class="form-label" for="akomodasi_kajiulangmain">Akomodasi
                                            kajiulang</label>
                                        <div class="form-control-wrap"><input type="number" min="0"
                                                class="form-control invalid" id="akomodasi_kajiulangmain"
                                                name="akomodasi_kajiulangmain" required
                                                data-msg="Mohon isi akomodasi kajiulang"
                                                placeholder="Akomodasi kajiulang">
                                        </div>
                                    </div>

                                    <!-- ============================== penawaran harga ============================== -->

                                    <div class="form-group" id="no_penawaranharga_form">
                                        <label class="form-label" for="no_penawaranharga">Nomor
                                            Penawaran</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="no_penawaranharga"
                                                name="no_penawaranharga" placeholder="Nomor Penawaran" required
                                                data-msg="Mohon isi nomor penawaran">
                                        </div>
                                    </div>

                                    <div class="form-group" id="nilai_penawaranharga_form">
                                        <label class="form-label" for="nilai_penawaranharga">Nilai
                                            Penawaran</label>
                                        <div class="form-control-wrap"><input type="number" min="0"
                                                class="form-control invalid" id="nilai_penawaranharga"
                                                name="nilai_penawaranharga" required
                                                data-msg="Mohon isi nilai penawaran" placeholder="Nilai Penawaran">
                                        </div>
                                    </div>

                                    <div class="form-group" id="link_penawaranharga_form">
                                        <label class="form-label" for="link_penawaranharga">Link Order</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_penawaranharga"
                                                name="link_penawaranharga" placeholder="Link Order" required
                                                data-msg="Mohon isi link order">
                                        </div>
                                    </div>

                                    <!-- ============================== negosiasi ============================== -->

                                    <div class="form-group" id="nilai_negosiasi_form">
                                        <label class="form-label" for="nilai_negosiasi">Nilai Negosiasi</label>
                                        <div class="form-control-wrap"><input type="number" min="0"
                                                class="form-control invalid" id="nilai_negosiasi" name="nilai_negosiasi"
                                                required data-msg="Mohon isi nilai negosiasi"
                                                placeholder="Nilai Negosiasi">
                                        </div>
                                    </div>

                                    <div class="form-group" id="subkontrak_negosiasi_form">
                                        <label class="form-label">Subkontrak</label>
                                        <div class="form-control-wrap">
                                            <div class="form-control-select">
                                                <select class="form-control" required data-msg="Mohon isi subkontrak"
                                                    name="subkontrak_negosiasi" id="subkontrak_negosiasi">
                                                    <option value="Ada">Ada</option>
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" id="link_negosiasi_form">
                                        <label class="form-label" for="link_negosiasi">Link Negosiasi</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_negosiasi"
                                                name="link_negosiasi" placeholder="Link Negosiasi" required
                                                data-msg="Mohon isi link negosiasi">
                                        </div>
                                    </div>

                                    <!-- ============================== spk ============================== -->

                                    <div class="form-group" id="koordinator_spk_form">
                                        <label class="form-label" for="koordinator_spk">Koordinator</label>
                                        <div class="form-control-wrap">
                                            <div class="form-control-select">
                                                <select id="koordinator_spk" name="koordinator_spk" class="form-control"
                                                    required data-msg="Mohon pilih Koordinator">
                                                    <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE posisi_user = 'Teknisi' ORDER BY nama_user ASC");
                                                    while ($row = $sql->fetch_assoc()) {
                                                        echo "<option value=" . $row['id_user'] . ">" . $row['nama_user'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" id="pelaksana_spk_form">
                                        <label class="form-label">Pelaksana</label>
                                        <ul class="custom-control-group align-left row gy-2">
                                            <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM teknisi ORDER BY id_teknisi ASC");
                                            while ($row_teknisi = $sql->fetch_assoc()) {
                                            ?>
                                            <li class="col-12">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="teknisi<?= $row_teknisi['id_teknisi']; ?>_spk"
                                                        name="teknisi<?= $row_teknisi['id_teknisi']; ?>_spk"
                                                        value="<?= $row_teknisi['id_teknisi']; ?>">
                                                    <label class="custom-control-label"
                                                        for="teknisi<?= $row_teknisi['id_teknisi']; ?>_spk"><?= $row_teknisi['nama_teknisi']; ?></label>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>

                                    <div class="row g-3" id="akomodasi_spk_form">
                                        <div class="col-3">
                                            <label class="form-label">Akomodasi</label>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_tek_akomodasi_spk" name="jml_tek_akomodasi_spk"
                                                        type="number" min="0" class="form-control invalid"
                                                        placeholder="Jml Teknisi" required
                                                        data-msg="Mohon isi jumlah teknisi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_hari_akomodasi_spk" name="jml_hari_akomodasi_spk"
                                                        type="number" min="0" class="form-control invalid"
                                                        placeholder="Jml Hari" required
                                                        data-msg="Mohon isi jumlah hari">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_nominal_akomodasi_spk"
                                                        name="jml_nominal_akomodasi_spk" type="number" min="0"
                                                        class="form-control invalid" placeholder="Nominal" required
                                                        data-msg="Mohon isi nominal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3" id="bbm_spk_form">
                                        <div class="col-3">
                                            <label class="form-label">BBM</label>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_tek_bbm_spk" name="jml_tek_bbm_spk" type="number"
                                                        min="0" class="form-control invalid" placeholder="Jml Teknisi"
                                                        required data-msg="Mohon isi jumlah teknisi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_hari_bbm_spk" name="jml_hari_bbm_spk" type="number"
                                                        min="0" class="form-control invalid" placeholder="Jml Hari"
                                                        required data-msg="Mohon isi jumlah hari">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_nominal_bbm_spk" name="jml_nominal_bbm_spk"
                                                        type="number" min="0" class="form-control invalid"
                                                        placeholder="Nominal" required data-msg="Mohon isi nominal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3" id="penginapan_spk_form">
                                        <div class="col-3">
                                            <label class="form-label">Penginapan</label>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_tek_penginapan_spk" name="jml_tek_penginapan_spk"
                                                        type="number" min="0" class="form-control invalid"
                                                        placeholder="Jml Teknisi" required
                                                        data-msg="Mohon isi jumlah teknisi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_hari_penginapan_spk" name="jml_hari_penginapan_spk"
                                                        type="number" min="0" class="form-control invalid"
                                                        placeholder="Jml Hari" required
                                                        data-msg="Mohon isi jumlah hari">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_nominal_penginapan_spk"
                                                        name="jml_nominal_penginapan_spk" type="number" min="0"
                                                        class="form-control invalid" placeholder="Nominal" required
                                                        data-msg="Mohon isi nominal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3" id="supir_spk_form">
                                        <div class="col-3">
                                            <label class="form-label">Uang Supir</label>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_tek_supir_spk" name="jml_tek_supir_spk" type="number"
                                                        min="0" class="form-control invalid" placeholder="Jml Teknisi"
                                                        required data-msg="Mohon isi jumlah teknisi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_hari_supir_spk" name="jml_hari_supir_spk"
                                                        type="number" min="0" class="form-control invalid"
                                                        placeholder="Jml Hari" required
                                                        data-msg="Mohon isi jumlah hari">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input id="jml_nominal_supir_spk" name="jml_nominal_supir_spk"
                                                        type="number" min="0" class="form-control invalid"
                                                        placeholder="Nominal" required data-msg="Mohon isi nominal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================== lappekerjaan ============================== -->

                                    <div class="form-group" id="link_lappekerjaan_form">
                                        <label class="form-label" for="link_lappekerjaan">Link Laporan Pekerjaan</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_lappekerjaan"
                                                name="link_lappekerjaan" placeholder="Link Laporan Pekerjaan" required
                                                data-msg="Mohon isi link laporan pekerjaan">
                                        </div>
                                    </div>

                                    <!-- ============================== bastsertifikat ============================== -->

                                    <div class="form-group" id="link_bastsertifikat_form">
                                        <label class="form-label" for="link_bastsertifikat">Link BAST
                                            Sertifikat</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_bastsertifikat"
                                                name="link_bastsertifikat" placeholder="Link bastsertifikat" required
                                                data-msg="Mohon isi link bastsertifikat">
                                        </div>
                                    </div>

                                    <!-- ============================== inputdo ============================== -->

                                    <div class="form-group" id="link_inputdo_form">
                                        <label class="form-label" for="link_inputdo">Link
                                            Input DO</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_inputdo"
                                                name="link_inputdo" placeholder="Link inputdo" required
                                                data-msg="Mohon isi link inputdo">
                                        </div>
                                    </div>

                                    <!-- ============================== invoicepajak ============================== -->

                                    <div class="form-group" id="nilai_invoicepajak_form">
                                        <label class="form-label" for="nilai_invoicepajak">Nilai Invoice</label>
                                        <div class="form-control-wrap"><input type="number" min="0"
                                                class="form-control invalid" id="nilai_invoicepajak"
                                                name="nilai_invoicepajak" required
                                                data-msg="Mohon isi nilai invoice pajak"
                                                placeholder="Nilai invoice pajak">
                                        </div>
                                    </div>

                                    <div class="form-group" id="link_invoicepajak_form">
                                        <label class="form-label" for="link_invoicepajak">Link Invoice Pajak</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_invoicepajak"
                                                name="link_invoicepajak" placeholder="Link invoicepajak" required
                                                data-msg="Mohon isi link invoicepajak">
                                        </div>
                                    </div>

                                    <!-- ============================== buktitransfer ============================== -->

                                    <div class="form-group" id="link_buktitransfer_form">
                                        <label class="form-label" for="link_buktitransfer">Link Bukti Transfer</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_buktitransfer"
                                                name="link_buktitransfer" placeholder="Link buktitransfer" required
                                                data-msg="Mohon isi link buktitransfer">
                                        </div>
                                    </div>

                                    <!-- ============================== sppbuktipotong ============================== -->

                                    <div class="form-group" id="link_sppbuktipotong_form">
                                        <label class="form-label" for="link_sppbuktipotong">Link
                                            SPP dan Bukti Potong</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_sppbuktipotong"
                                                name="link_sppbuktipotong" placeholder="Link sppbuktipotong" required
                                                data-msg="Mohon isi link sppbuktipotong">
                                        </div>
                                    </div>


                                    <!-- ============================== posubkontrak ============================== -->

                                    <div class="form-group" id="link_posubkontrak_form">
                                        <label class="form-label" for="link_posubkontrak">Link
                                            PO Subkontrak</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_posubkontrak"
                                                name="link_posubkontrak" placeholder="Link posubkontrak" required
                                                data-msg="Mohon isi link posubkontrak">
                                        </div>
                                    </div>

                                    <!-- ============================== kirimsubkontrak ============================== -->

                                    <div class="form-group" id="link_kirimsubkontrak_form">
                                        <label class="form-label" for="link_kirimsubkontrak">Link
                                            Kirim Subkontrak</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_kirimsubkontrak"
                                                name="link_kirimsubkontrak" placeholder="Link kirimsubkontrak" required
                                                data-msg="Mohon isi link kirimsubkontrak">
                                        </div>
                                    </div>

                                    <!-- ============================== uangsubkontrak ============================== -->

                                    <div class="form-group" id="link_uangsubkontrak_form">
                                        <label class="form-label" for="link_uangsubkontrak">Link Pelunasan / Uang
                                            Muka</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_uangsubkontrak"
                                                name="link_uangsubkontrak" placeholder="Link uangsubkontrak" required
                                                data-msg="Mohon isi link uangsubkontrak">
                                        </div>
                                    </div>

                                    <!-- ============================== invoicepajaksubkontrak ============================== -->

                                    <div class="form-group" id="link_invoicepajaksubkontrak_form">
                                        <label class="form-label" for="link_invoicepajaksubkontrak">Link Invoice dan
                                            Pajak
                                            Subkontrak</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid"
                                                id="link_invoicepajaksubkontrak" name="link_invoicepajaksubkontrak"
                                                placeholder="Link invoicepajaksubkontrak" required
                                                data-msg="Mohon isi link invoicepajaksubkontrak">
                                        </div>
                                    </div>

                                    <!-- ============================== verifikasibelisubkontrak ============================== -->
                                    <!-- 
                                    <div class="form-group" id="link_verifikasibelisubkontrak_form">
                                        <label class="form-label" for="link_verifikasibelisubkontrak">Link
                                            Verifikasi Pembelian Subkontrak</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid"
                                                id="link_verifikasibelisubkontrak" name="link_verifikasibelisubkontrak"
                                                placeholder="Link verifikasibelisubkontrak" required
                                                data-msg="Mohon isi link verifikasibelisubkontrak">
                                        </div>
                                    </div> -->

                                    <!-- 
                                    <div class="row g-3" id="verifikasibelisubkontrak_form">
                                        <div class="col-6">
                                            <div class="form-group" id="nopo_verifikasibelisubkontrak_form">
                                                <label class="form-label" for="nopo_verifikasibelisubkontrak">No.
                                                    PO</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control invalid"
                                                        id="nopo_verifikasibelisubkontrak"
                                                        name="nopo_verifikasibelisubkontrak"
                                                        placeholder="nopo verifikasibelisubkontrak" required
                                                        data-msg="Mohon isi nopo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group" id="noinvoice_verifikasibelisubkontrak_form">
                                                <label class="form-label" for="noinvoice_verifikasibelisubkontrak">No.
                                                    Invoice</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control invalid"
                                                        id="noinvoice_verifikasibelisubkontrak"
                                                        name="noinvoice_verifikasibelisubkontrak"
                                                        placeholder="noinvoice" required data-msg="Mohon isi noinvoice">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" id="jumlah_verifikasibelisubkontrak_form">
                                                <label class="form-label">Jumlah</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" required
                                                            data-msg="Mohon isi jumlah"
                                                            name="jumlah_verifikasibelisubkontrak"
                                                            id="jumlah_verifikasibelisubkontrak">
                                                            <option value="Memenuhi">Memenuhi</option>
                                                            <option value="Tidak Memenuhi">Tidak Memenuhi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" id="spesifikasi_verifikasibelisubkontrak_form">
                                                <label class="form-label">Spesifikasi</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" required
                                                            data-msg="Mohon isi spesifikasi"
                                                            name="spesifikasi_verifikasibelisubkontrak"
                                                            id="spesifikasi_verifikasibelisubkontrak">
                                                            <option value="Memenuhi">Memenuhi</option>
                                                            <option value="Tidak Memenuhi">Tidak Memenuhi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" id="kondisi_verifikasibelisubkontrak_form">
                                                <label class="form-label">Kondisi</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" required
                                                            data-msg="Mohon isi kondisi"
                                                            name="kondisi_verifikasibelisubkontrak"
                                                            id="kondisi_verifikasibelisubkontrak">
                                                            <option value="Baik">Baik</option>
                                                            <option value="Tidak Baik">Tidak Baik</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" id="invoice_verifikasibelisubkontrak_form">
                                                <label class="form-label">Invoice</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" required
                                                            data-msg="Mohon isi invoice"
                                                            name="invoice_verifikasibelisubkontrak"
                                                            id="invoice_verifikasibelisubkontrak">
                                                            <option value="Ada">Ada</option>
                                                            <option value="Tidak Ada">Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" id="fakturpajak_verifikasibelisubkontrak_form">
                                                <label class="form-label">Faktur Pajak</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" required
                                                            data-msg="Mohon isi fakturpajak"
                                                            name="fakturpajak_verifikasibelisubkontrak"
                                                            id="fakturpajak_verifikasibelisubkontrak">
                                                            <option value="Ada">Ada</option>
                                                            <option value="Tidak Ada">Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" id="garansi_verifikasibelisubkontrak_form">
                                                <label class="form-label">Garansi</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" required
                                                            data-msg="Mohon isi garansi"
                                                            name="garansi_verifikasibelisubkontrak"
                                                            id="garansi_verifikasibelisubkontrak">
                                                            <option value="Ada">Ada</option>
                                                            <option value="Tidak Ada">Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group" id="catatan_verifikasibelisubkontrak_form">
                                                <label class="form-label"
                                                    for="catatan_verifikasibelisubkontrak">Catatan</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control" id="catatan_verifikasibelisubkontrak"
                                                        name="catatan_verifikasibelisubkontrak" required
                                                        data-msg="Mohon isi catatan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group" id="keputusan_verifikasibelisubkontrak_form">
                                                <label class="form-label">Keputusan</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" required
                                                            data-msg="Mohon isi keputusan"
                                                            name="keputusan_verifikasibelisubkontrak"
                                                            id="keputusan_verifikasibelisubkontrak">
                                                            <option value="Diterima">Diterima</option>
                                                            <option value="Ditolak">Ditolak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- ============================== bastalat ============================== -->

                                    <div class="form-group" id="link_bastalat_form">
                                        <label class="form-label" for="link_bastalat">Link BAST Alat</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="link_bastalat"
                                                name="link_bastalat" placeholder="Link bastalat" required
                                                data-msg="Mohon isi link bastalat">
                                        </div>
                                    </div>


                                    <!-- ============================== button ============================== -->

                                    <br>

                                    <div class="form-group" id="btn_permintaan_order_form">
                                        <button type="submit" class="btn btn-lg btn-primary btn-submit-order">Simpan
                                            Order</button>
                                    </div>
                                    <div class="row g-3" id="btn_kajiulang_form">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-lg btn-primary btn-submit-kajiulang">Simpan
                                                    Akomodasi</button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group text-right">
                                                <a href="#" onclick="kajiulang_page(<?= $proyekid; ?>)"
                                                    class="btn btn-lg btn-info">Input Data Alat</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="btn_penawaranharga_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-penawaranharga">Simpan
                                            Penawaran</button>
                                    </div>
                                    <div class="form-group" id="btn_negosiasi_form">
                                        <button type="submit" class="btn btn-lg btn-primary btn-submit-negosiasi">Simpan
                                            Negosiasi</button>
                                    </div>
                                    <div class="row g-3" id="btn_spk_form">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-lg btn-primary btn-submit-spk">Simpan
                                                    SPK</button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group text-right">
                                                <a href="#" onclick="spk_page(<?= $proyekid; ?>)"
                                                    class="btn btn-lg btn-info">Lihat
                                                    Data Alat</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="btn_lappekerjaan_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-lappekerjaan">Simpan
                                            Laporan Pekerjaan</button>
                                    </div>
                                    <div class="form-group" id="btn_bastsertifikat_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-bastsertifikat">Simpan
                                            BAST Sertifikat</button>
                                    </div>

                                    <div class="form-group" id="btn_inputdo_form">
                                        <button type="submit" class="btn btn-lg btn-primary btn-submit-inputdo">Simpan
                                            Input DO</button>
                                    </div>
                                    <div class="form-group" id="btn_invoicepajak_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-invoicepajak">Simpan
                                            Invoice dan Pajak</button>
                                    </div>
                                    <div class="form-group" id="btn_buktitransfer_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-buktitransfer">Simpan Bukti
                                            Transfer</button>
                                    </div>
                                    <div class="form-group" id="btn_sppbuktipotong_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-sppbuktipotong">Simpan
                                            SPP Bukti Potong</button>
                                    </div>

                                    <div class="form-group" id="btn_posubkontrak_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-posubkontrak">Simpan
                                            PO Subkontrak</button>
                                    </div>
                                    <div class="form-group" id="btn_kirimsubkontrak_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-kirimsubkontrak">Simpan
                                            Kirim Subkontrak</button>
                                    </div>
                                    <div class="form-group" id="btn_uangsubkontrak_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-uangsubkontrak">Simpan
                                            Uang Muka / Pelunasan</button>
                                    </div>
                                    <div class="form-group" id="btn_invoicepajaksubkontrak_form">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-submit-invoicepajaksubkontrak">Simpan
                                            Invoice dan Pajak Subkontrak</button>
                                    </div>
                                    <div class="form-group" id="btn_bastalat_form">
                                        <button type="submit" class="btn btn-lg btn-primary btn-submit-bastalat">Simpan
                                            BAST Alat</button>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer bg-light">
                                <span class="sub-text" id="modal-foot">Diisi oleh marketing</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ////////////////////////////////////////////////////////////////////// -->

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
        document.title = 'Detail Proyek ' + '<?= $row0['no_proyek']; ?>';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });


        // ================================ PERMINTAAN / ORDER ================================

        $(document).on('click', '.btn-order', function(ev) {
            ev.preventDefault();
            allOff();
            permintaanOrder();
        });

        $(document).on('click', '.btn-submit-order', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan Order</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-order', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            permintaanOrder();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_permintaan_order_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_permintaan_order");
                    $("#id_permintaan_order").val(result['id_permintaan_order']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#tgl1_permintaan_order").val(result['tgl1_permintaan_order']);
                    $("#tgl2_permintaan_order").val(result['tgl2_permintaan_order']);
                    $("#link_permintaan_order").val(result['link_permintaan_order']);
                    // $("#lastupdate_permintaan_order").val(result['lastupdate_permintaan_order']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-order', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_po ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data permintaan / order.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_permintaan_order",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });


        // ========================================= kajiulang ======================================

        $(document).on('click', '.btn-kajiulang', function(ev) {
            ev.preventDefault();
            allOff();
            kajiulang();
        });

        $(document).on('click', '.btn-submit-kajiulang', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                // console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan kajiulang</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-kajiulang', function(ev) {
            ev.preventDefault();
            allOff();
            kajiulang();

            var tbl_id = $(this).attr("id");

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_kajiulangmain_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_kajiulangmain");
                    $("#id_kajiulangmain").val(result['id_kajiulangmain']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#akomodasi_kajiulangmain").val(result['akomodasi_kajiulangmain']);
                    // $("#lastupdate_permintaan_order").val(result['lastupdate_permintaan_order']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-kajiulang', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if ((<?= $row_jml_kj ?> == 0) || (<?= $row_jml_kjmain ?> == 0)) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data Estimasi Akomodasi dan Detail Alat.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_kajiulang",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-kajiulang', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_kajiulang",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ PENAWARAN HARGA ================================

        $(document).on('click', '.btn-tawar', function(ev) {
            ev.preventDefault();
            allOff();
            penawaranHarga();
        });

        $(document).on('click', '.btn-submit-penawaranharga', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan Penawaran</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-penawaranharga', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            penawaranHarga();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_penawaranharga_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_penawaranharga");
                    $("#id_penawaranharga").val(result['id_penawaranharga']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#no_penawaranharga").val(result['no_penawaranharga']);
                    $("#nilai_penawaranharga").val(result['nilai_penawaranharga']);
                    $("#link_penawaranharga").val(result['link_penawaranharga']);
                    // $("#lastupdate_permintaan_order").val(result['lastupdate_permintaan_order']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-penawaranharga', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_ph ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data penawaran harga.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_penawaranharga",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-penawaranharga', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_penawaranharga",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ NEGOSIASI ================================

        $(document).on('click', '.btn-nego', function(ev) {
            ev.preventDefault();
            allOff();
            negosiasi();
        });

        $(document).on('click', '.btn-submit-negosiasi', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        // console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan Negosiasi</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-negosiasi', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            negosiasi();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_negosiasi_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_negosiasi");
                    $("#id_negosiasi").val(result['id_negosiasi']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#nilai_negosiasi").val(result['nilai_negosiasi']);
                    $("#subkontrak_negosiasi").val(result['subkontrak_negosiasi']);
                    $("#link_negosiasi").val(result['link_negosiasi']);
                    // $("#lastupdate_permintaan_order").val(result['lastupdate_permintaan_order']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-negosiasi', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_nego ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data negosiasi dan kontrak.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_negosiasi",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-negosiasi', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_negosiasi",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ JADWAL ================================

        $(document).on('click', '.btn-ok-jadwal', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_kegiatan ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data penyusunan jadwal.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_jadwal",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-jadwal', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_jadwal",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ SPK ================================

        $(document).on('click', '.btn-spk', function(ev) {
            ev.preventDefault();
            allOff();
            spk();
        });

        $(document).on('click', '.btn-submit-spk', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                // console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan SPK</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-spk', function(ev) {
            ev.preventDefault();
            allOff();
            spk();

            var tbl_id = $(this).attr("id");

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_spk_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_spk");
                    $("#id_spk").val(result['id_spk']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#koordinator_spk").val(result['koordinator_spk']);

                    $("#jml_tek_akomodasi_spk").val(result['jml_tek_akomodasi_spk']);
                    $("#jml_hari_akomodasi_spk").val(result['jml_hari_akomodasi_spk']);
                    $("#jml_nominal_akomodasi_spk").val(result[
                        'jml_nominal_akomodasi_spk']);

                    $("#jml_tek_bbm_spk").val(result['jml_tek_bbm_spk']);
                    $("#jml_hari_bbm_spk").val(result['jml_hari_bbm_spk']);
                    $("#jml_nominal_bbm_spk").val(result['jml_nominal_bbm_spk']);

                    $("#jml_tek_penginapan_spk").val(result['jml_tek_penginapan_spk']);
                    $("#jml_hari_penginapan_spk").val(result['jml_hari_penginapan_spk']);
                    $("#jml_nominal_penginapan_spk").val(result[
                        'jml_nominal_penginapan_spk']);

                    $("#jml_tek_supir_spk").val(result['jml_tek_supir_spk']);
                    $("#jml_hari_supir_spk").val(result['jml_hari_supir_spk']);
                    $("#jml_nominal_supir_spk").val(result['jml_nominal_supir_spk']);

                    let dataTek = result['pelaksana_spk'];
                    let dataTekArr = dataTek.split(';');
                    if (dataTekArr.length > 0) {
                        for (let i = 0; i < dataTekArr.length - 1; i++) {
                            let idPelaksana = '#teknisi' + dataTekArr[i] + '_spk';
                            $(idPelaksana).prop('checked', true);
                        }
                    }
                    // $("#lastupdate_permintaan_order").val(result['lastupdate_permintaan_order']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-spk', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if ((<?= $row_jml_spk ?> == 0) || (<?= $row_jml_detailspk ?> == 0)) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data SPK Akomodasi dan Detail Alat.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_spk",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-spk', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_spk",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ BERKAS TEKNISI ================================

        $(document).on('click', '.btn-ok-berkasteknisi', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_berkasteknisi ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data Berkas Teknisi.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_berkasteknisi",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-berkasteknisi', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_berkasteknisi",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ LAP.PEKERJAAN ================================

        $(document).on('click', '.btn-lappekerjaan', function(ev) {
            ev.preventDefault();
            allOff();
            lappekerjaan();
        });

        $(document).on('click', '.btn-submit-lappekerjaan', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan Laporan Pekerjaan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-lappekerjaan', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            lappekerjaan();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_lappekerjaan_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_lappekerjaan");
                    $("#id_lappekerjaan").val(result['id_lappekerjaan']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_lappekerjaan").val(result['link_lappekerjaan']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-lappekerjaan', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_lappekerjaan ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data Laporan Pekerjaan.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_lappekerjaan",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-lappekerjaan', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_lappekerjaan",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ PENYELIAAN LK ================================

        $(document).on('click', '.btn-ok-penyeliaanlk', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_penyeliaanlk ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data pemilik sertifikat.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_penyeliaanlk",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-penyeliaanlk', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_penyeliaanlk",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ CETAK SERTIFIKAT ================================

        $(document).on('click', '.btn-ok-cetaksertifikat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan menuju ke status berikutnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "ok_cetaksertifikat",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status berikutnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status berikutnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status berikutnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.btn-not-cetaksertifikat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_cetaksertifikat",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ SALINAN SERTIFIKAT ================================

        $(document).on('click', '.btn-ok-salinansertifikat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if ((<?= $row_jml_salinansertifikat ?> == 0) || (<?= $linkNull ?> == 0)) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data link sertifikat.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_salinansertifikat",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-salinansertifikat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_salinansertifikat",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ BAST SERTIFIKAT ================================

        $(document).on('click', '.btn-bastsertifikat', function(ev) {
            ev.preventDefault();
            allOff();
            bastsertifikat();
        });

        $(document).on('click', '.btn-submit-bastsertifikat', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan BAST Sertifikat</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-bastsertifikat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            bastsertifikat();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_bastsertifikat_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_bastsertifikat");
                    $("#id_bastsertifikat").val(result['id_bastsertifikat']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_bastsertifikat").val(result['link_bastsertifikat']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-bastsertifikat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_bastsertifikat ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data bast sertifikat.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_bastsertifikat",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-bastsertifikat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_bastsertifikat",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ back tla ==============================
        $(document).on('click', '.btn-back-tla', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "back_tla",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ INPUT DO ================================

        $(document).on('click', '.btn-inputdo', function(ev) {
            ev.preventDefault();
            allOff();
            inputdo();
        });

        $(document).on('click', '.btn-submit-inputdo', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan </span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-inputdo', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            inputdo();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_inputdo_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_inputdo");
                    $("#id_inputdo").val(result['id_inputdo']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_inputdo").val(result['link_inputdo']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-inputdo', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_inputdo ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data input do.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_inputdo",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-inputdo', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_inputdo",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ INVOICE dan PAJAK ================================

        $(document).on('click', '.btn-invoicepajak', function(ev) {
            ev.preventDefault();
            allOff();
            invoicepajak();
        });

        $(document).on('click', '.btn-submit-invoicepajak', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan </span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-invoicepajak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            invoicepajak();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_invoicepajak_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_invoicepajak");
                    $("#id_invoicepajak").val(result['id_invoicepajak']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#nilai_invoicepajak").val(result['nilai_invoicepajak']);
                    $("#link_invoicepajak").val(result['link_invoicepajak']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-invoicepajak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_invoicepajak ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data invoice dan pajak.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_invoicepajak",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-invoicepajak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_invoicepajak",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ SPJ ================================

        $(document).on('click', '.btn-ok-spj', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan menuju ke status berikutnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "ok_spj",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status berikutnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status berikutnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status berikutnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.btn-not-spj', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_spj",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ Bukti Transfer ================================

        $(document).on('click', '.btn-buktitransfer', function(ev) {
            ev.preventDefault();
            allOff();
            buktitransfer();
        });

        $(document).on('click', '.btn-submit-buktitransfer', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-buktitransfer', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            buktitransfer();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_buktitransfer_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_buktitransfer");
                    $("#id_buktitransfer").val(result['id_buktitransfer']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_buktitransfer").val(result['link_buktitransfer']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-buktitransfer', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_buktitransfer ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data bukti transfer.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_buktitransfer",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-buktitransfer', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_buktitransfer",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ SPP dan Bukti Potong ================================

        $(document).on('click', '.btn-sppbuktipotong', function(ev) {
            ev.preventDefault();
            allOff();
            sppbuktipotong();
        });

        $(document).on('click', '.btn-submit-sppbuktipotong', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-sppbuktipotong', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            sppbuktipotong();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_sppbuktipotong_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_sppbuktipotong");
                    $("#id_sppbuktipotong").val(result['id_sppbuktipotong']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_sppbuktipotong").val(result['link_sppbuktipotong']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-sppbuktipotong', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_sppbuktipotong ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data spp dan bukti potong.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_sppbuktipotong",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-sppbuktipotong', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_sppbuktipotong",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ back tlb ==============================
        $(document).on('click', '.btn-back-tlb', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "back_tlb",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });



        // ================================ PO Subkontrak ================================

        $(document).on('click', '.btn-posubkontrak', function(ev) {
            ev.preventDefault();
            allOff();
            posubkontrak();
        });

        $(document).on('click', '.btn-submit-posubkontrak', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-posubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            posubkontrak();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_posubkontrak_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_posubkontrak");
                    $("#id_posubkontrak").val(result['id_posubkontrak']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_posubkontrak").val(result['link_posubkontrak']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-posubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_posubkontrak ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data PO Subkontrak.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_posubkontrak",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-posubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_posubkontrak",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ kirimsubkontrak ================================

        $(document).on('click', '.btn-kirimsubkontrak', function(ev) {
            ev.preventDefault();
            allOff();
            kirimsubkontrak();
        });

        $(document).on('click', '.btn-submit-kirimsubkontrak', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-kirimsubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            kirimsubkontrak();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_kirimsubkontrak_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_kirimsubkontrak");
                    $("#id_kirimsubkontrak").val(result['id_kirimsubkontrak']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_kirimsubkontrak").val(result['link_kirimsubkontrak']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-kirimsubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_kirimsubkontrak ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data PO Subkontrak.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_kirimsubkontrak",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-kirimsubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_kirimsubkontrak",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ Uang Subkontrak ================================

        $(document).on('click', '.btn-uangsubkontrak', function(ev) {
            ev.preventDefault();
            allOff();
            uangsubkontrak();
        });

        $(document).on('click', '.btn-submit-uangsubkontrak', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-uangsubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            uangsubkontrak();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_uangsubkontrak_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_uangsubkontrak");
                    $("#id_uangsubkontrak").val(result['id_uangsubkontrak']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_uangsubkontrak").val(result['link_uangsubkontrak']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-uangsubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_uangsubkontrak ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data Uang Muka/Pelunasan.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_uangsubkontrak",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-uangsubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_uangsubkontrak",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ INVOICE dan PAJAK SUBKONTRAK ================================

        $(document).on('click', '.btn-invoicepajaksubkontrak', function(ev) {
            ev.preventDefault();
            allOff();
            invoicepajaksubkontrak();
        });

        $(document).on('click', '.btn-submit-invoicepajaksubkontrak', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-invoicepajaksubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            invoicepajaksubkontrak();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_invoicepajaksubkontrak_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_invoicepajaksubkontrak");
                    $("#id_invoicepajaksubkontrak").val(result[
                        'id_invoicepajaksubkontrak']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_invoicepajaksubkontrak").val(result[
                        'link_invoicepajaksubkontrak']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-invoicepajaksubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_invoicepajaksubkontrak ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data Invoice dan Pajak Subkontrak.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_invoicepajaksubkontrak",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-invoicepajaksubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_invoicepajaksubkontrak",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });


        // ================================ VERIFIKASI PEMBELIAN SUBKONTRAK ================================

        // $(document).on('click', '.btn-verifikasibelisubkontrak', function(ev) {
        //     ev.preventDefault();
        //     allOff();
        //     verifikasibelisubkontrak();
        // });

        // $(document).on('click', '.btn-submit-verifikasibelisubkontrak', function(ev) {
        //     ev.preventDefault();
        //     var btn_button = $(this);

        //     if ($("#hl_form").valid() == true) {
        //         btn_button.attr("disabled", true);

        //         var form_data = new FormData($('#hl_form')[0]);
        //         console.log(form_data);
        //         $.ajax({
        //             type: 'POST',
        //             url: 'save_details.php',
        //             data: form_data,
        //             cache: false,
        //             contentType: false,
        //             processData: false,
        //             success: function(data, status) {
        //                 console.log(data);
        //                 if (data == '1') {
        //                     btn_button.html(
        //                         '<span>Simpan</span>'
        //                     );
        //                     Swal.fire({
        //                         icon: "success",
        //                         title: "Data telah tersimpan.",
        //                         showConfirmButton: false,
        //                         timer: 1500,
        //                     });
        //                     setTimeout(function() {
        //                         location.reload();
        //                     }, 2000);
        //                 } else {
        //                     Swal.fire({
        //                         icon: "error",
        //                         title: "Data gagal tersimpan.",
        //                         showConfirmButton: false,
        //                         timer: 1500,
        //                     });
        //                 }
        //             },
        //             error: function(xhr, resp, text) {
        //                 console.log(xhr, resp, text);
        //             }
        //         });
        //     }
        // });

        // $(document).on('click', '.btn-edit-verifikasibelisubkontrak', function(ev) {
        //     ev.preventDefault();
        //     var tbl_id = $(this).attr("id");

        //     allOff();
        //     verifikasibelisubkontrak();

        //     $.ajax({
        //         cache: false,
        //         url: 'get_ajax_details.php', // url where to submit the request
        //         type: "GET", // type of action POST || GET
        //         dataType: 'json', // data type
        //         data: {
        //             cmd: "get_verifikasibelisubkontrak_details",
        //             tbl_id: tbl_id
        //         }, // post data || get data
        //         success: function(result) {
        //             // console.log(result);
        //             $("#form_name").val("edit_verifikasibelisubkontrak");
        //             $("#id_verifikasibelisubkontrak").val(result[
        //                 'id_verifikasibelisubkontrak']);
        //             $("#id_proyek").val(result['id_proyek']);
        //             $("#link_verifikasibelisubkontrak").val(result[
        //                 'link_verifikasibelisubkontrak']);
        //         },
        //         error: function(xhr, resp, text) {
        //             console.log(xhr, resp, text);
        //         }
        //     });
        // });

        $(document).on('click', '.btn-ok-verifikasibelisubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_verifikasibelisubkontrak ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data Verifikasi Pembelian Subkontrak.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_verifikasibelisubkontrak",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-verifikasibelisubkontrak', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_verifikasibelisubkontrak",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ BAST ALAT ================================

        $(document).on('click', '.btn-bastalat', function(ev) {
            ev.preventDefault();
            allOff();
            bastalat();
        });

        $(document).on('click', '.btn-submit-bastalat', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<span>Simpan BAST Alat</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit-bastalat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            allOff();
            bastalat();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_bastalat_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_bastalat");
                    $("#id_bastalat").val(result['id_bastalat']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#link_bastalat").val(result['link_bastalat']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $(document).on('click', '.btn-ok-bastalat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            if (<?= $row_jml_bastalat ?> == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Mohon isi data Bast Alat.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan menuju ke status berikutnya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "ok_bastalat",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Proyek pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Proyek gagal pindah ke status berikutnya.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.btn-not-bastalat', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_bastalat",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // ================================ back tlc ==============================
        $(document).on('click', '.btn-back-tlc', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan kembali ke status sebelumnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "back_tlc",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal pindah ke status sebelumnya.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        // =================================== DONE PROYEK ===================================

        $(document).on('click', '.btn-ok-proyekdetail', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan diselesaikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "ok_proyekdetail",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek diselesaikan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                let link = 'proyek_finish?uid=' +
                                    '<?= $proyekid; ?>';
                                window.open(link, '_self');
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal diselesaikan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal diselesaikan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.btn-not-proyekdetail', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proyek akan dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "not_proyekdetail",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Proyek dibatalkan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                let link = 'proyek_cancel?uid=' +
                                    '<?= $proyekid; ?>';
                                window.open(link, '_self');
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal dibatalkan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Proyek gagal dibatalkan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        cekDark();
    });

    function allOff() {
        // button
        $('#btn_permintaan_order_form').hide();
        $('#btn_kajiulang_form').hide();
        $('#btn_penawaranharga_form').hide();
        $('#btn_negosiasi_form').hide();
        $('#btn_spk_form').hide();
        $('#btn_lappekerjaan_form').hide();
        $('#btn_bastsertifikat_form').hide();
        $('#btn_inputdo_form').hide();
        $('#btn_invoicepajak_form').hide();
        $('#btn_buktitransfer_form').hide();
        $('#btn_sppbuktipotong_form').hide();
        $('#btn_posubkontrak_form').hide();
        $('#btn_kirimsubkontrak_form').hide();
        $('#btn_uangsubkontrak_form').hide();
        $('#btn_invoicepajaksubkontrak_form').hide();
        // $('#btn_verifikasibelisubkontrak_form').hide();
        $('#btn_bastalat_form').hide();
        // permintaan order
        $('#tgl1_permintaan_order_form').hide();
        $('#tgl2_permintaan_order_form').hide();
        $('#link_permintaan_order_form').hide();
        // kajiulang
        $('#akomodasi_kajiulangmain_form').hide();
        // penawaran harga
        $('#no_penawaranharga_form').hide();
        $('#nilai_penawaranharga_form').hide();
        $('#link_penawaranharga_form').hide();
        // negosiasi
        $('#nilai_negosiasi_form').hide();
        $('#subkontrak_negosiasi_form').hide();
        $('#link_negosiasi_form').hide();
        // spk
        $('#koordinator_spk_form').hide();
        $('#pelaksana_spk_form').hide();
        $('#akomodasi_spk_form').hide();
        $('#bbm_spk_form').hide();
        $('#penginapan_spk_form').hide();
        $('#supir_spk_form').hide();
        // lappekerjaan
        $('#link_lappekerjaan_form').hide();
        // bastsertifikat
        $('#link_bastsertifikat_form').hide();
        // inputdo
        $('#link_inputdo_form').hide();
        // invoicepajak
        $('#link_invoicepajak_form').hide();
        $('#nilai_invoicepajak_form').hide();
        // buktitransfer
        $('#link_buktitransfer_form').hide();
        // sppbuktipotong
        $('#link_sppbuktipotong_form').hide();
        // posubkontrak
        $('#link_posubkontrak_form').hide();
        // kirimsubkontrak
        $('#link_kirimsubkontrak_form').hide();
        // uangsubkontrak
        $('#link_uangsubkontrak_form').hide();
        // invoicepajaksubkontrak
        $('#link_invoicepajaksubkontrak_form').hide();
        // verifikasibelisubkontrak
        // $('#link_verifikasibelisubkontrak_form').hide();
        // bastalat
        $('#link_bastalat_form').hide();
    }

    function permintaanOrder() {
        // modal title
        $('#modal-head').text('Permintaan / Order');
        $('#modal-foot').text('Diisi oleh Admin Umum');
        // form name 
        $('#form_name').val('add_permintaan_order');
        // button
        $('#btn_permintaan_order_form').show();
        // permintaan order
        $('#tgl1_permintaan_order_form').show();
        $('#tgl2_permintaan_order_form').show();
        $('#link_permintaan_order_form').show();
    }

    function kajiulang() {
        // modal title
        $('#modal-head').text('Kaji Ulang');
        $('#modal-foot').text('Diisi oleh Admin Teknis');
        // form name 
        $('#form_name').val('add_kajiulangmain');
        // button
        $('#btn_kajiulang_form').show();
        // permintaan order
        $('#akomodasi_kajiulangmain_form').show();
    }

    function penawaranHarga() {
        // modal title
        $('#modal-head').text('Penawaran Harga');
        $('#modal-foot').text('Diisi oleh Admin Umum');
        // form name 
        $('#form_name').val('add_penawaranharga');
        // button
        $('#btn_penawaranharga_form').show();
        // penawaran harga
        $('#no_penawaranharga_form').show();
        $('#nilai_penawaranharga_form').show();
        $('#link_penawaranharga_form').show();
    }

    function negosiasi() {
        // modal title
        $('#modal-head').text('Negosiasi');
        $('#modal-foot').text('Diisi oleh Marketing');
        // form name 
        $('#form_name').val('add_negosiasi');
        // button
        $('#btn_negosiasi_form').show();
        // negosiasi
        $('#nilai_negosiasi_form').show();
        $('#subkontrak_negosiasi_form').show();
        $('#link_negosiasi_form').show();
    }

    function spk() {
        // modal title
        $('#modal-head').text('SPK dan Akomodasi');
        $('#modal-foot').text('Diisi oleh PJ Teknis');
        // form name 
        $('#form_name').val('add_spk');
        // button
        $('#btn_spk_form').show();
        // spk
        $('#koordinator_spk_form').show();
        $('#pelaksana_spk_form').show();
        $('#akomodasi_spk_form').show();
        $('#bbm_spk_form').show();
        $('#penginapan_spk_form').show();
        $('#supir_spk_form').show();
    }

    function lappekerjaan() {
        // modal title
        $('#modal-head').text('Laporan Pekerjaan');
        $('#modal-foot').text('Diisi oleh Teknisi');
        // form name 
        $('#form_name').val('add_lappekerjaan');
        // button
        $('#btn_lappekerjaan_form').show();
        // lappekerjaan
        $('#link_lappekerjaan_form').show();
    }

    function bastsertifikat() {
        // modal title
        $('#modal-head').text('Bast Sertifikat');
        $('#modal-foot').text('Diisi oleh Penyelia');
        // form name 
        $('#form_name').val('add_bastsertifikat');
        // button
        $('#btn_bastsertifikat_form').show();
        // bastsertifikat
        $('#link_bastsertifikat_form').show();
    }

    function inputdo() {
        // modal title
        $('#modal-head').text('Input DO');
        $('#modal-foot').text('Diisi oleh Admin Umum');
        // form name 
        $('#form_name').val('add_inputdo');
        // button
        $('#btn_inputdo_form').show();
        // inputdo
        $('#link_inputdo_form').show();
    }

    function invoicepajak() {
        // modal title
        $('#modal-head').text('Invoice dan Pajak');
        $('#modal-foot').text('Diisi oleh Finance');
        // form name 
        $('#form_name').val('add_invoicepajak');
        // button
        $('#btn_invoicepajak_form').show();
        // invoicepajak
        $('#nilai_invoicepajak_form').show();
        $('#link_invoicepajak_form').show();
    }

    function buktitransfer() {
        // modal title
        $('#modal-head').text('Bukti Transfer');
        $('#modal-foot').text('Diisi oleh Finance');
        // form name 
        $('#form_name').val('add_buktitransfer');
        // button
        $('#btn_buktitransfer_form').show();
        // buktitransfer
        $('#link_buktitransfer_form').show();
    }

    function sppbuktipotong() {
        // modal title
        $('#modal-head').text('SPP Bukti Potong');
        $('#modal-foot').text('Diisi oleh Finance');
        // form name 
        $('#form_name').val('add_sppbuktipotong');
        // button
        $('#btn_sppbuktipotong_form').show();
        // sppbuktipotong
        $('#link_sppbuktipotong_form').show();
    }

    function posubkontrak() {
        // modal title
        $('#modal-head').text('PO Subkontrak');
        $('#modal-foot').text('Diisi oleh Admin Umum');
        // form name 
        $('#form_name').val('add_posubkontrak');
        // button
        $('#btn_posubkontrak_form').show();
        // posubkontrak
        $('#link_posubkontrak_form').show();
    }

    function kirimsubkontrak() {
        // modal title
        $('#modal-head').text('Kirim Subkontrak');
        $('#modal-foot').text('Diisi oleh Admin Teknis');
        // form name 
        $('#form_name').val('add_kirimsubkontrak');
        // button
        $('#btn_kirimsubkontrak_form').show();
        // kirimsubkontrak
        $('#link_kirimsubkontrak_form').show();
    }

    function uangsubkontrak() {
        // modal title
        $('#modal-head').text('Uang Muka / Pelunasan');
        $('#modal-foot').text('Diisi oleh Finance');
        // form name 
        $('#form_name').val('add_uangsubkontrak');
        // button
        $('#btn_uangsubkontrak_form').show();
        // uangsubkontrak
        $('#link_uangsubkontrak_form').show();
    }

    function invoicepajaksubkontrak() {
        // modal title
        $('#modal-head').text('Invoice dan Pajak Subkontrak');
        $('#modal-foot').text('Diisi oleh Finance');
        // form name 
        $('#form_name').val('add_invoicepajaksubkontrak');
        // button
        $('#btn_invoicepajaksubkontrak_form').show();
        // invoicepajaksubkontrak
        $('#link_invoicepajaksubkontrak_form').show();
    }

    // function verifikasibelisubkontrak() {
    //     // modal title
    //     $('#modal-head').text('Verifikasi Pembelian Subkontrak');
    //     $('#modal-foot').text('Diisi oleh marketing');
    //     // form name 
    //     $('#form_name').val('add_verifikasibelisubkontrak');
    //     // button
    //     $('#btn_verifikasibelisubkontrak_form').show();
    //     // verifikasibelisubkontrak
    //     $('#link_verifikasibelisubkontrak_form').show();
    // }

    function bastalat() {
        // modal title
        $('#modal-head').text('BAST Alat');
        $('#modal-foot').text('Diisi oleh Penyelia');
        // form name 
        $('#form_name').val('add_bastalat');
        // button
        $('#btn_bastalat_form').show();
        // bastalat
        $('#link_bastalat_form').show();
    }

    function kajiulang_page(uid) {
        let link = 'kajiulang?uid=' + uid;
        window.open(link, '_self');
    }

    function kajiulang_pdf(uid) {
        let link = 'kajiulang_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function jadwal_page(uid) {
        let link = 'jadwal?uid=' + uid;
        window.open(link, '_self');
    }

    function jadwal_pdf(uid) {
        let link = 'jadwal_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function spk_page(uid) {
        let link = 'spk?uid=' + uid;
        window.open(link, '_self');
    }

    function spk_pdf(uid) {
        let link = 'spk_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function berkasteknisi_page(uid) {
        let link = 'berkasteknisi?uid=' + uid;
        window.open(link, '_self');
    }

    function berkasteknisi_pdf(uid) {
        let link = 'berkasteknisi_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function verifikasibelisubkontrak_page(uid) {
        let link = 'verifikasibelisubkontrak?uid=' + uid;
        window.open(link, '_self');
    }

    function verifikasibelisubkontrak_pdf(uid) {
        let link = 'verifikasibelisubkontrak_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function salinansertifikat_page(uid) {
        let link = 'salinansertifikat?uid=' + uid;
        window.open(link, '_self');
    }

    function penyeliaansertifikat_page(uid) {
        let link = 'penyeliaansertifikat?uid=' + uid;
        window.open(link, '_self');
    }
    </script>

</body>

</html>