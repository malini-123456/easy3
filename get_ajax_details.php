<?php
require_once('connect.php');
$cmd = $_REQUEST['cmd'];

if ($cmd == "get_alat_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM alatkalibrasi WHERE id_alat='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_mikropipet_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM mikropipet WHERE id_mikropipet='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_proyek_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM proyek WHERE id_proyek='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_pelanggan_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM pelanggan WHERE id_pelanggan='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_layanan_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM layanan WHERE id_layanan='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_permintaan_order_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM permintaan_order WHERE id_permintaan_order='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_kajiulangmain_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM kajiulangmain WHERE id_kajiulangmain='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_kajiulang_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM kajiulang WHERE id_kajiulang='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_penawaranharga_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM penawaranharga WHERE id_penawaranharga='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_negosiasi_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM negosiasi WHERE id_negosiasi='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_spk_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM spk WHERE id_spk='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_detailspk_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM detailspk WHERE id_detailspk='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_lappekerjaan_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM lappekerjaan WHERE id_lappekerjaan='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_salinansertifikat_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM salinansertifikat WHERE id_salinansertifikat='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_bastsertifikat_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM bastsertifikat WHERE id_bastsertifikat='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_inputdo_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM inputdo WHERE id_inputdo='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_invoicepajak_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM invoicepajak WHERE id_invoicepajak='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_buktitransfer_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM buktitransfer WHERE id_buktitransfer='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_sppbuktipotong_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM sppbuktipotong WHERE id_sppbuktipotong='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}


if ($cmd == "get_posubkontrak_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM posubkontrak WHERE id_posubkontrak='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_kirimsubkontrak_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM kirimsubkontrak WHERE id_kirimsubkontrak='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_uangsubkontrak_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM uangsubkontrak WHERE id_uangsubkontrak='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_invoicepajaksubkontrak_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM invoicepajaksubkontrak WHERE id_invoicepajaksubkontrak='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_verifikasibelisubkontrak_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM verifikasibelisubkontrak WHERE id_verifikasibelisubkontrak='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_bastalat_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM bastalat WHERE id_bastalat='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_pemilik_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM pemilik WHERE id_pemilik='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}


if ($cmd == "get_peminjamanmikropipet_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM peminjamanmikropipet WHERE id_peminjaman='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_detailpeminjamanmikropipet_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM detailpeminjamanmikropipet WHERE id_detailpeminjaman='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_user_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM user WHERE id_user='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_sertifikat_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM sertifikat WHERE id_sertifikat='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if ($cmd == "get_stiker_details") {
	$tbl_id = $_REQUEST['tbl_id'];
	$out_put = array();
	$query = "SELECT * FROM stiker WHERE id_stiker='$tbl_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}