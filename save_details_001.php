<?php require_once('session.php');
if ($username) {
	$query_session = "SELECT * FROM user WHERE username = '$username'";
	$result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
	$row_session = mysqli_fetch_assoc($result_session);
}


$form_name = $_POST['form_name'];

/////////////////////////////// Proyek

if ($form_name == 'add_proyek') {
	// $productno = mysqli_real_escape_string($conn, trim($_POST['no_proyek']));
	$productnama = mysqli_real_escape_string($conn, trim($_POST['id_pelanggan']));
	$producttglorder = mysqli_real_escape_string($conn, trim($_POST['tglorder_proyek']));
	$productmarketing = mysqli_real_escape_string($conn, trim($_POST['marketing_proyek']));
	$productnamapemilik = mysqli_real_escape_string($conn, trim($_POST['namapemilik_proyek']));
	$productalamatpemilik = mysqli_real_escape_string($conn, trim($_POST['alamatpemilik_proyek']));
	$productpermohonan = mysqli_real_escape_string($conn, trim($_POST['permohonan_proyek']));
	$productcatatan = mysqli_real_escape_string($conn, trim($_POST['catatan_proyek']));
	$productinsitu = mysqli_real_escape_string($conn, trim($_POST['insitu_proyek']));
	$productinsituprogres = mysqli_real_escape_string($conn, trim($_POST['insitu_progres_proyek']));
	$producteksitu = mysqli_real_escape_string($conn, trim($_POST['eksitu_proyek']));
	$producteksituprogres = mysqli_real_escape_string($conn, trim($_POST['eksitu_progres_proyek']));
	$productsubkon = mysqli_real_escape_string($conn, trim($_POST['subkon_proyek']));
	$productsubkonprogres = mysqli_real_escape_string($conn, trim($_POST['subkon_progres_proyek']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$thn = gmdate('Y', time() + (60 * 60 * 8)) - 2000;
	$bln = gmdate('m', time() + (60 * 60 * 8));
	$noproyek = $thn . '.' . $productnama;
	
	$query2 = "SELECT no_proyek FROM proyek WHERE no_proyek LIKE '$noproyek%'";
	$query2 = "SELECT id_pelanggan FROM proyek WHERE id_pelanggan='$productnama'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	if ($row2 == 0) {
		$no = (int)$row2 + 1;
		$productno = $thn . '.' . $productnama . '.' . $no;
	} else {
		$query3 = "SELECT MAX(CAST(SUBSTRING(no_proyek, (5+length('$productnama')), length(no_proyek) - (4+length('$productnama'))) AS UNSIGNED)) AS no_proyek FROM proyek WHERE no_proyek LIKE '$noproyek%'";
		$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
		$row3 = mysqli_fetch_assoc($result3);
		$noProyekMax = explode('.', $row3['no_proyek']);
		$noProyekNow = $noProyekMax[count($noProyekMax) - 1] + 1;
		$productno = $thn . '.' . $productnama . '.' . $noProyekNow;
	}

	// echo 'HASIL:' . $productno;

	$query = "INSERT INTO proyek(no_proyek, id_pelanggan, marketing_proyek, catatan_proyek, status_proyek, tglorder_proyek, namapemilik_proyek, alamatpemilik_proyek, permohonan_proyek, insitu_proyek, insitu_progres_proyek, eksitu_proyek, eksitu_progres_proyek, subkon_proyek, subkon_progres_proyek, lastupdate_proyek) 
		VALUES('$productno', '$productnama', '$productmarketing', '$productcatatan', 'NEGOSIASI', '$producttglorder', '$productnamapemilik', '$productalamatpemilik', '$productpermohonan',  '$productinsitu', '$productinsituprogres', '$producteksitu', '$producteksituprogres', '$productsubkon', '$productsubkonprogres', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) echo "1";
	else echo "0";
}

if ($form_name == 'edit_proyek') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	// $productno = mysqli_real_escape_string($conn, trim($_POST['no_proyek']));
	$productnama = mysqli_real_escape_string($conn, trim($_POST['id_pelanggan']));
	$producttglorder = mysqli_real_escape_string($conn, trim($_POST['tglorder_proyek']));
	$productmarketing = mysqli_real_escape_string($conn, trim($_POST['marketing_proyek']));
	$productnamapemilik = mysqli_real_escape_string($conn, trim($_POST['namapemilik_proyek']));
	$productalamatpemilik = mysqli_real_escape_string($conn, trim($_POST['alamatpemilik_proyek']));
	$productpermohonan = mysqli_real_escape_string($conn, trim($_POST['permohonan_proyek']));
	$productcatatan = mysqli_real_escape_string($conn, trim($_POST['catatan_proyek']));
	$productinsitu = mysqli_real_escape_string($conn, trim($_POST['insitu_proyek']));
	$productinsituprogres = mysqli_real_escape_string($conn, trim($_POST['insitu_progres_proyek']));
	$producteksitu = mysqli_real_escape_string($conn, trim($_POST['eksitu_proyek']));
	$producteksituprogres = mysqli_real_escape_string($conn, trim($_POST['eksitu_progres_proyek']));
	$productsubkon = mysqli_real_escape_string($conn, trim($_POST['subkon_proyek']));
	$productsubkonprogres = mysqli_real_escape_string($conn, trim($_POST['subkon_progres_proyek']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));


	$query4 = "SELECT * FROM proyek WHERE id_proyek='$productid'";
	$result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
	$row4 = mysqli_fetch_assoc($result4);

	if ($row4['id_pelanggan'] == $productnama) {
		$query = "UPDATE proyek SET tglorder_proyek='$producttglorder', marketing_proyek='$productmarketing', namapemilik_proyek='$productnamapemilik', alamatpemilik_proyek='$productalamatpemilik', permohonan_proyek='$productpermohonan', insitu_proyek='$productinsitu', insitu_progres_proyek='$productinsituprogres', eksitu_proyek='$producteksitu', eksitu_progres_proyek='$producteksituprogres', subkon_proyek='$productsubkon', subkon_progres_proyek='$productsubkonprogres', catatan_proyek='$productcatatan' WHERE id_proyek='$productid'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	} else {
		$thn = gmdate('Y', time() + (60 * 60 * 8)) - 2000;
		$bln = gmdate('m', time() + (60 * 60 * 8));
		$noproyek = $thn . '.' . $productnama;

		$query2 = "SELECT no_proyek FROM proyek WHERE no_proyek LIKE '$noproyek%'";
		$query2 = "SELECT id_pelanggan FROM proyek WHERE id_pelanggan='$productnama'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_num_rows($result2);

		if ($row2 == 0) {
			$no = (int)$row2 + 1;
			$productno = $thn . '.' . $productnama . '.' . $no;
		} else {
			$query3 = "SELECT MAX(CAST(SUBSTRING(no_proyek, (5+length('$productnama')), length(no_proyek) - (4+length('$productnama'))) AS UNSIGNED)) AS no_proyek FROM proyek WHERE no_proyek LIKE '$noproyek%'";
			$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
			$row3 = mysqli_fetch_assoc($result3);
			$noProyekMax = explode('.', $row3['no_proyek']);
			$noProyekNow = $noProyekMax[count($noProyekMax) - 1] + 1;
			$productno = $thn . '.' . $productnama . '.' . $noProyekNow;
		}

		$query = "UPDATE proyek SET no_proyek='$productno', id_pelanggan='$productnama', tglorder_proyek='$producttglorder', marketing_proyek='$productmarketing', namapemilik_proyek='$productnamapemilik', alamatpemilik_proyek='$productalamatpemilik', permohonan_proyek='$productpermohonan', insitu_proyek='$productinsitu', insitu_progres_proyek='$productinsituprogres', eksitu_proyek='$producteksitu', eksitu_progres_proyek='$producteksituprogres', subkon_proyek='$productsubkon', subkon_progres_proyek='$productsubkonprogres', catatan_proyek='$productcatatan' WHERE id_proyek='$productid'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	}

	if ($result) echo "1";
	else echo "0";
}

if ($form_name == "del_proyek") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		$query = "DELETE FROM proyek WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	} else
		echo "404-del";
}


if ($form_name == "up_proyek") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "UPDATE proyek SET status_proyek='ON GOING' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	} else
	echo "404-del";
}

if ($form_name == "down_proyek") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "UPDATE proyek SET status_proyek='NEGOSIASI' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	} else
	echo "404-del";
}

if ($form_name == "finish_proyek") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "UPDATE proyek SET status_proyek='SELESAI' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	} else
	echo "404-del";
}

if ($form_name == "cancel_proyek") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "UPDATE proyek SET status_proyek='BATAL' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	} else
	echo "404-del";
}

if ($form_name == "back_proyek") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "UPDATE proyek SET status_proyek='ON GOING' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	} else
	echo "404-del";
}


/////////////////////////////// Pelanggan2

if ($form_name == 'add_pelanggan2') {
	$productnama_p = mysqli_real_escape_string($conn, trim($_POST['nama_pelanggan2']));

	$query2 = "SELECT nama_pelanggan FROM pelanggan WHERE nama_pelanggan='$productnama_p'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	if ($row2 == 0) {
		$query = "INSERT INTO pelanggan(nama_pelanggan) VALUES('$productnama_p')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

/////////////////////////////// Pelanggan

if ($form_name == 'add_pelanggan') {
	$productnama_p = mysqli_real_escape_string($conn, trim($_POST['nama_pelanggan']));
	$productalamat_p = mysqli_real_escape_string($conn, trim($_POST['alamat_pelanggan']));
	$productkontak_p = mysqli_real_escape_string($conn, trim($_POST['kontak_pelanggan']));
	$productkategori = mysqli_real_escape_string($conn, trim($_POST['kategori_pelanggan']));
	$productnpwp_p = mysqli_real_escape_string($conn, trim($_POST['npwp_pelanggan']));
	$productnamanpwp_p = mysqli_real_escape_string($conn, trim($_POST['namanpwp_pelanggan']));
	// $productlogo_p = mysqli_real_escape_string($conn, trim($_POST['logo_pelanggan']));
	$productcatatan_p = mysqli_real_escape_string($conn, trim($_POST['catatan_pelanggan']));
	$productusername_p = mysqli_real_escape_string($conn, trim($_POST['username_pelanggan']));
	$productpass_p = mysqli_real_escape_string($conn, trim($_POST['pass_pelanggan']));

	$query2 = "SELECT nama_pelanggan FROM pelanggan WHERE nama_pelanggan='$productnama_p'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	if ($row2 == 0) {
		$query = "INSERT INTO pelanggan(nama_pelanggan, alamat_pelanggan, kontak_pelanggan, kategori_pelanggan, npwp_pelanggan, namanpwp_pelanggan, catatan_pelanggan, username_pelanggan, pass_pelanggan) 
		VALUES('$productnama_p', '$productalamat_p', '$productkontak_p', '$productkategori', '$productnpwp_p', '$productnamanpwp_p', '$productcatatan_p', '$productusername_p', '$productpass_p')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == 'edit_pelanggan') {
	$productid_p = mysqli_real_escape_string($conn, trim($_POST['id_pelanggan']));
	$productnama_p = mysqli_real_escape_string($conn, trim($_POST['nama_pelanggan']));
	$productalamat_p = mysqli_real_escape_string($conn, trim($_POST['alamat_pelanggan']));
	$productkontak_p = mysqli_real_escape_string($conn, trim($_POST['kontak_pelanggan']));
	$productkategori = mysqli_real_escape_string($conn, trim($_POST['kategori_pelanggan']));
	$productnpwp_p = mysqli_real_escape_string($conn, trim($_POST['npwp_pelanggan']));
	$productnamanpwp_p = mysqli_real_escape_string($conn, trim($_POST['namanpwp_pelanggan']));
	$productkeuangan_p = mysqli_real_escape_string($conn, trim($_POST['keuangan_pelanggan']));
	$productteknis_p = mysqli_real_escape_string($conn, trim($_POST['teknis_pelanggan']));
	// $productlogo_p = mysqli_real_escape_string($conn, trim($_POST['logo_pelanggan']));
	$productcatatan_p = mysqli_real_escape_string($conn, trim($_POST['catatan_pelanggan']));
	$productusername_p = mysqli_real_escape_string($conn, trim($_POST['username_pelanggan']));
	$productpass_p = mysqli_real_escape_string($conn, trim($_POST['pass_pelanggan']));


	$query2 = "SELECT nama_pelanggan FROM pelanggan WHERE nama_pelanggan='$productnama_p'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	$query3 = "SELECT nama_pelanggan FROM pelanggan WHERE nama_pelanggan='$productnama_p' AND id_pelanggan='$productid_p'";
	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
	$row3 = mysqli_num_rows($result3);

	// echo 'A:' . $row2 . '-B:' . $row3 . '-C:' . $productid_p . '-D:' . $productnama_p;

	if ($row2 == 0 || $row3 == 1) {
		// $query = "UPDATE pelanggan SET nama_pelanggan='$productnama_p', alamat_pelanggan='$productalamat_p', kontak_pelanggan='$productkontak_p', kategori_pelanggan='$productkategori', npwp_pelanggan='$productnpwp_p', namanpwp_pelanggan='$productnamanpwp_p', logo_pelanggan='$productlogo_p', catatan_pelanggan='$productcatatan_p' WHERE id_pelanggan='$productid_p'";
		$query = "UPDATE pelanggan SET nama_pelanggan='$productnama_p', alamat_pelanggan='$productalamat_p', kontak_pelanggan='$productkontak_p', kategori_pelanggan='$productkategori', npwp_pelanggan='$productnpwp_p', namanpwp_pelanggan='$productnamanpwp_p', keuangan_pelanggan='$productkeuangan_p', teknis_pelanggan='$productteknis_p', catatan_pelanggan='$productcatatan_p', username_pelanggan='$productusername_p', pass_pelanggan='$productpass_p' WHERE id_pelanggan='$productid_p'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} 
	else
		echo "0";
}

if ($form_name == "del_pelanggan") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM pelanggan WHERE id_pelanggan='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}

/////////////////////////////// layanan

if ($form_name == 'add_layanan') {
	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_layanan']));
	$productwaktu = mysqli_real_escape_string($conn, trim($_POST['waktu_layanan']));
	$productharga = mysqli_real_escape_string($conn, trim($_POST['harga_layanan']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_layanan']));

	$query2 = "SELECT nama_layanan FROM layanan WHERE nama_layanan='$productnama'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	if ($row2 == 0) {
		$query = "INSERT INTO layanan(nama_layanan, waktu_layanan, harga_layanan, link_layanan) 
		VALUES('$productnama', '$productwaktu', '$productharga', '$productlayanan')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == 'edit_layanan') {
	$productid_p = mysqli_real_escape_string($conn, trim($_POST['id_layanan']));
	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_layanan']));
	$productwaktu = mysqli_real_escape_string($conn, trim($_POST['waktu_layanan']));
	$productharga = mysqli_real_escape_string($conn, trim($_POST['harga_layanan']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_layanan']));

	$query2 = "SELECT nama_layanan FROM layanan WHERE nama_layanan='$productnama'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	$query3 = "SELECT nama_layanan FROM layanan WHERE nama_layanan='$productnama' AND id_layanan='$productid_p'";
	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
	$row3 = mysqli_num_rows($result3);

	if ($row2 == 0 || $row3 == 1) {
		$query = "UPDATE layanan SET nama_layanan='$productnama', waktu_layanan='$productwaktu', harga_layanan='$productharga', link_layanan='$productlink' WHERE id_layanan='$productid_p'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "0";
}

if ($form_name == "del_layanan") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM layanan WHERE id_layanan='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}



/////////////////////////////// PERMINTAAN/ORDER

if ($form_name == 'add_permintaan_order') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$producttgl1 = mysqli_real_escape_string($conn, trim($_POST['tgl1_permintaan_order']));
	$producttgl2 = mysqli_real_escape_string($conn, trim($_POST['tgl2_permintaan_order']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_permintaan_order']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO permintaan_order (id_proyek, tgl1_permintaan_order, tgl2_permintaan_order, link_permintaan_order, lastupdate_permintaan_order) 
	VALUES('$productid', '$producttgl1', '$producttgl2', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) {
		echo "1";
	} else
		echo "0";
}

if ($form_name == 'edit_permintaan_order') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_permintaan_order']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$producttgl1 = mysqli_real_escape_string($conn, trim($_POST['tgl1_permintaan_order']));
	$producttgl2 = mysqli_real_escape_string($conn, trim($_POST['tgl2_permintaan_order']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_permintaan_order']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE permintaan_order SET id_proyek='$productidproyek', tgl1_permintaan_order='$producttgl1', tgl2_permintaan_order='$producttgl2', link_permintaan_order='$productlink', lastupdate_permintaan_order='$timezone' WHERE id_permintaan_order='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) {
		echo "1";
	} else
		echo "0";
}

if ($form_name == "ok_permintaan_order") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 2;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'permintaan order', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// KAJI ULANG MAIN


if ($form_name == 'add_kajiulangmain') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productakomodasi = mysqli_real_escape_string($conn, trim($_POST['akomodasi_kajiulangmain']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO kajiulangmain (id_proyek, akomodasi_kajiulangmain, lastupdate_kajiulangmain) 
	VALUES('$productid', '$productakomodasi', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) {
		echo "1";
	} else
		echo "0";
}

if ($form_name == 'edit_kajiulangmain') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_kajiulangmain']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productakomodasi = mysqli_real_escape_string($conn, trim($_POST['akomodasi_kajiulangmain']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE kajiulangmain SET id_proyek='$productidproyek', akomodasi_kajiulangmain='$productakomodasi', lastupdate_kajiulangmain='$timezone' WHERE id_kajiulangmain='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) {
		echo "1";
	} else
		echo "0";
}

/////////////////////////////// KAJI ULANG PERMINTAAN

if ($form_name == 'add_kajiulang') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_kajiulang']));
	$productid_proyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productnama_layanan = mysqli_real_escape_string($conn, trim($_POST['id_layanan']));
	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_barang_kajiulang']));
	$productjumlah = mysqli_real_escape_string($conn, trim($_POST['jumlah_barang_kajiulang']));
	$productpenyedia = mysqli_real_escape_string($conn, trim($_POST['penyedia_kajiulang']));
	$productkategori = mysqli_real_escape_string($conn, trim($_POST['kategori_kajiulang']));
	$productcatatan = mysqli_real_escape_string($conn, trim($_POST['catatan_kajiulang']));
	$productkp = 'Tidak';
	$productkal = 'Tidak';
	$productbpl = 'Tidak';
	$productkpk = 'Tidak';
	$productkmk = 'Tidak';
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if (isset($_POST['kp_kajiulang'])) {
		$productkp = mysqli_real_escape_string($conn, trim($_POST['kp_kajiulang']));
	}
	if (isset($_POST['kal_kajiulang'])) {
		$productkal = mysqli_real_escape_string($conn, trim($_POST['kal_kajiulang']));
	}
	if (isset($_POST['bpl_kajiulang'])) {
		$productbpl = mysqli_real_escape_string($conn, trim($_POST['bpl_kajiulang']));
	}
	if (isset($_POST['kpk_kajiulang'])) {
		$productkpk = mysqli_real_escape_string($conn, trim($_POST['kpk_kajiulang']));
	}
	if (isset($_POST['kmk_kajiulang'])) {
		$productkmk = mysqli_real_escape_string($conn, trim($_POST['kmk_kajiulang']));
	}


	$query2 = "SELECT nama_barang_kajiulang FROM kajiulang WHERE nama_barang_kajiulang='$productnama' AND id_proyek='$productid_proyek'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	if ($row2 == 0) {
		$query = "INSERT INTO kajiulang (id_proyek, id_layanan, nama_barang_kajiulang, jumlah_barang_kajiulang, penyedia_kajiulang, kategori_kajiulang, catatan_kajiulang, kp_kajiulang, kal_kajiulang, bpl_kajiulang, kpk_kajiulang, kmk_kajiulang, lastupdate_kajiulang) 
		VALUES('$productid_proyek', '$productnama_layanan',  '$productnama', '$productjumlah', '$productpenyedia', '$productkategori', '$productcatatan', '$productkp', '$productkal', '$productbpl', '$productkpk', '$productkmk', '$timezone')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "0";
}


if ($form_name == 'edit_kajiulang') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_kajiulang']));
	// $productid_proyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	// $productnama_layanan = mysqli_real_escape_string($conn, trim($_POST['id_layanan']));
	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_barang_kajiulang']));
	$productjumlah = mysqli_real_escape_string($conn, trim($_POST['jumlah_barang_kajiulang']));
	$productpenyedia = mysqli_real_escape_string($conn, trim($_POST['penyedia_kajiulang']));
	$productkategori = mysqli_real_escape_string($conn, trim($_POST['kategori_kajiulang']));
	$productcatatan = mysqli_real_escape_string($conn, trim($_POST['catatan_kajiulang']));
	// $productkp = 'Tidak';
	// $productkal = 'Tidak';
	// $productbpl = 'Tidak';
	// $productkpk = 'Tidak';
	// $productkmk = 'Tidak';
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE kajiulang SET nama_barang_kajiulang='$productnama', jumlah_barang_kajiulang='$productjumlah', penyedia_kajiulang='$productpenyedia', kategori_kajiulang='$productkategori', catatan_kajiulang='$productcatatan', lastupdate_kajiulang='$timezone' WHERE id_kajiulang='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) {
		echo "1";
	} else
		echo "0";
}



if ($form_name == "del_kajiulang") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM kajiulang WHERE id_kajiulang='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "del_kajiulangAll") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM kajiulang WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "ok_kajiulang") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 3;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'kaji ulang permintaan', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_kajiulang") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 1;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		// $query3 = "SELECT * FROM kajiulang WHERE id_proyek='$tbl_id'";
		// $result3 = mysqli_query($conn, $query3) or die(mysql_error());
		// while ($row3 = $result3->fetch_assoc()) {
		// 	$kajiulang_id = $row3['id_kajiulang'];
		// 	$query4 = "DELETE FROM kajiulang WHERE id_kajiulang='$kajiulang_id'";
		// 	$result4 = mysqli_query($conn, $query4) or die(mysql_error());
		// }
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'kaji ulang permintaan', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

/////////////////////////////// PENAWARAN HARGA

if ($form_name == 'add_penawaranharga') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productno = mysqli_real_escape_string($conn, trim($_POST['no_penawaranharga']));
	$productnilai = mysqli_real_escape_string($conn, trim($_POST['nilai_penawaranharga']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_penawaranharga']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO penawaranharga (id_proyek, no_penawaranharga, nilai_penawaranharga, link_penawaranharga, lastupdate_penawaranharga) 
	VALUES('$productid', '$productno', '$productnilai', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) {
		echo "1";
	} else
		echo "0";
}

if ($form_name == 'edit_penawaranharga') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_penawaranharga']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productno = mysqli_real_escape_string($conn, trim($_POST['no_penawaranharga']));
	$productnilai = mysqli_real_escape_string($conn, trim($_POST['nilai_penawaranharga']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_penawaranharga']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE penawaranharga SET id_proyek='$productidproyek', no_penawaranharga='$productno', nilai_penawaranharga='$productnilai', link_penawaranharga='$productlink', lastupdate_penawaranharga='$timezone' WHERE id_penawaranharga='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) {
		echo "1";
	} else
		echo "0";
}

if ($form_name == "ok_penawaranharga") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 4;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'penawaran harga', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_penawaranharga") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 2;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'penawaran harga', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// NEGOSIASI

if ($form_name == 'add_negosiasi') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_negosiasi']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productnilai = mysqli_real_escape_string($conn, trim($_POST['nilai_negosiasi']));
	$productsubkontrak = mysqli_real_escape_string($conn, trim($_POST['subkontrak_negosiasi']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_negosiasi']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO negosiasi (id_proyek, nilai_negosiasi, subkontrak_negosiasi, link_negosiasi, lastupdate_negosiasi) 
	VALUES('$productidproyek', '$productnilai',  '$productsubkontrak', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_negosiasi') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_negosiasi']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productnilai = mysqli_real_escape_string($conn, trim($_POST['nilai_negosiasi']));
	$productsubkontrak = mysqli_real_escape_string($conn, trim($_POST['subkontrak_negosiasi']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_negosiasi']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE negosiasi SET nilai_negosiasi='$productnilai', subkontrak_negosiasi='$productsubkontrak', link_negosiasi='$productlink', lastupdate_negosiasi='$timezone' WHERE id_negosiasi='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_negosiasi") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 5;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'negosiasi dan kontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_negosiasi") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 3;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'negosiasi dan kontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// KEGIATAN

if ($form_name == 'add_kegiatan') {
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productname = mysqli_real_escape_string($conn, trim($_POST['nama_kegiatan']));
	$productjenis = mysqli_real_escape_string($conn, trim($_POST['jenis_kegiatan']));
	$productisi = mysqli_real_escape_string($conn, trim($_POST['isi_kegiatan']));
	$productstgl = mysqli_real_escape_string($conn, trim($_POST['stgl_kegiatan']));
	$productetgl = mysqli_real_escape_string($conn, trim($_POST['etgl_kegiatan']));
	$productsjam = mysqli_real_escape_string($conn, trim($_POST['sjam_kegiatan']));
	$productejam = mysqli_real_escape_string($conn, trim($_POST['ejam_kegiatan']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));
	$kegiatantype = 'jadwal';

	if ($productjenis == 'event-primary') $kegiatantype = 'jadwal Kalibrasi Fix';
	else if ($productjenis == 'event-pink') $kegiatantype = 'jadwal Kalibrasi Sementara';
	else if ($productjenis == 'event-warning') $kegiatantype = 'jadwal Pemeliharaan';
	else if ($productjenis == 'event-info') $kegiatantype = 'jadwal Uji Banding';
	else if ($productjenis == 'event-success') $kegiatantype = 'jadwal Pelatihan';
	else if ($productjenis == 'event-danger') $kegiatantype = 'jadwal Lainnya';


	$query = "INSERT INTO kegiatan(id_proyek, nama_kegiatan, jenis_kegiatan, isi_kegiatan, stgl_kegiatan, etgl_kegiatan, sjam_kegiatan, ejam_kegiatan, lastupdate_kegiatan)
	VALUES('$productidproyek', '$productname', '$productjenis', '$productisi', '$productstgl', '$productetgl', '$productsjam', '$productejam', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysql_error());

	if ($result) {
		echo "1";
		/////////////// Data Notif ////////////////
		$last_id = mysqli_insert_id($conn);
		$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menambah', '$kegiatantype', '$last_id', '$productname', '$timezone')";
		$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

		if ($result_notif) {
			$last_notifid = mysqli_insert_id($conn);
			$query_user = "SELECT * FROM user";
			$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
			while ($row_user = $result_user->fetch_assoc()) {
				$userid = $row_user['id_user'];
				$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
				$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
			}
		}
	} else
		echo "0";
}

if ($form_name == 'edit_kegiatan') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_edit_kegiatan']));
	// $productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productname = mysqli_real_escape_string($conn, trim($_POST['nama_kegiatan']));
	$productjenis = mysqli_real_escape_string($conn, trim($_POST['jenis_kegiatan']));
	$productisi = mysqli_real_escape_string($conn, trim($_POST['isi_kegiatan']));
	$productstgl = mysqli_real_escape_string($conn, trim($_POST['stgl_kegiatan']));
	$productetgl = mysqli_real_escape_string($conn, trim($_POST['etgl_kegiatan']));
	$productsjam = mysqli_real_escape_string($conn, trim($_POST['sjam_kegiatan']));
	$productejam = mysqli_real_escape_string($conn, trim($_POST['ejam_kegiatan']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));
	$kegiatantype = 'jadwal';

	if ($productjenis == 'event-primary') $kegiatantype = 'jadwal Kalibrasi Fix';
	else if ($productjenis == 'event-pink') $kegiatantype = 'jadwal Kalibrasi Sementara';
	else if ($productjenis == 'event-warning') $kegiatantype = 'jadwal Pemeliharaan';
	else if ($productjenis == 'event-info') $kegiatantype = 'jadwal Uji Banding';
	else if ($productjenis == 'event-success') $kegiatantype = 'jadwal Pelatihan';
	else if ($productjenis == 'event-danger') $kegiatantype = 'jadwal Lainnya';

	$query = "UPDATE kegiatan SET nama_kegiatan='$productname', jenis_kegiatan='$productjenis', isi_kegiatan='$productisi', stgl_kegiatan='$productstgl', etgl_kegiatan='$productetgl', sjam_kegiatan='$productsjam', ejam_kegiatan='$productejam', lastupdate_kegiatan='$timezone' WHERE id_kegiatan='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result) {
		echo "1";
		/////////////// Data Notif ////////////////
		$last_id = mysqli_insert_id($conn);
		$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'mengubah', '$kegiatantype', '$productid', '$productname', '$timezone')";
		$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

		if ($result_notif) {
			$last_notifid = mysqli_insert_id($conn);
			$query_user = "SELECT * FROM user";
			$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
			while ($row_user = $result_user->fetch_assoc()) {
				$userid = $row_user['id_user'];
				$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
				$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
			}
		}
	} else
		echo "0";
}

if ($form_name == "del_kegiatan") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query2 = "SELECT * FROM kegiatan WHERE id_kegiatan='$tbl_id'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_fetch_assoc($result2);

	$kegiatantype = 'jadwal';

	if ($row2['jenis_kegiatan'] == 'event-primary') $kegiatantype = 'jadwal Kalibrasi';
	else if ($row2['jenis_kegiatan'] == 'event-warning') $kegiatantype = 'jadwal Pemeliharaan';
	else if ($row2['jenis_kegiatan'] == 'event-info') $kegiatantype = 'jadwal Uji Banding';
	else if ($row2['jenis_kegiatan'] == 'event-success') $kegiatantype = 'jadwal Pelatihan';
	else if ($row2['jenis_kegiatan'] == 'event-danger') $kegiatantype = 'jadwal Lainnya';

	if ($chk_val == 0) {
		$query = "DELETE FROM kegiatan WHERE id_kegiatan='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$last_id = mysqli_insert_id($conn);
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menghapus', '$kegiatantype', '$tbl_id', '$row2[nama_kegiatan]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// JADWAL

if ($form_name == "ok_jadwal") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 6;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'penyusunan jadwal', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}

			$query_kaji = "SELECT * FROM kajiulang WHERE id_proyek='$tbl_id' AND catatan_kajiulang!='Tidak Mampu'";
			$result_kaji = mysqli_query($conn, $query_kaji) or die(mysqli_error($conn));
			while ($row_kaji = $result_kaji->fetch_assoc()) {
				$layananid = $row_kaji['id_layanan'];
				$namabarang = $row_kaji['nama_barang_kajiulang'];
				$jumlahbarang = $row_kaji['jumlah_barang_kajiulang'];
				$query_spk = "INSERT INTO detailspk (id_proyek, id_layanan, namabarang_detailspk, jumlahbarang_detailspk) VALUES ('$tbl_id', '$layananid', '$namabarang', '$jumlahbarang')";
				$result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_jadwal") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 4;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'penyusunan jadwal', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// SPK

if ($form_name == 'add_spk') {
	// $productid = mysqli_real_escape_string($conn, trim($_POST['id_spk']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productkoordinator = mysqli_real_escape_string($conn, trim($_POST['koordinator_spk']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$productstgl = mysqli_real_escape_string($conn, trim($_POST['stgl_spk']));
	$productetgl = mysqli_real_escape_string($conn, trim($_POST['etgl_spk']));
	$productsjam = mysqli_real_escape_string($conn, trim($_POST['sjam_spk']));
	$productejam = mysqli_real_escape_string($conn, trim($_POST['ejam_spk']));

	$productjml_akomodasi = mysqli_real_escape_string($conn, trim($_POST['jml_akomodasi_spk']));
	$productjml_transportasi = mysqli_real_escape_string($conn, trim($_POST['jml_transportasi_spk']));
	$productjml_penginapan = mysqli_real_escape_string($conn, trim($_POST['jml_penginapan_spk']));
	$productjml_cadangan = mysqli_real_escape_string($conn, trim($_POST['jml_cadangan_spk']));

	$productket_akomodasi = mysqli_real_escape_string($conn, trim($_POST['ket_akomodasi_spk']));
	$productket_transportasi = mysqli_real_escape_string($conn, trim($_POST['ket_transportasi_spk']));
	$productket_penginapan = mysqli_real_escape_string($conn, trim($_POST['ket_penginapan_spk']));
	$productket_cadangan = mysqli_real_escape_string($conn, trim($_POST['ket_cadangan_spk']));

	// $productup = mysqli_real_escape_string($conn, trim($_POST['up_spk']));
	// $producthp = mysqli_real_escape_string($conn, trim($_POST['hp_spk']));

	$dataTek = '';

	if (isset($_POST['teknisi1_spk'])) {
		$productteknisi1 = mysqli_real_escape_string($conn, trim($_POST['teknisi1_spk']));
		$dataTek = $dataTek . $productteknisi1 . ';';
	}
	if (isset($_POST['teknisi2_spk'])) {
		$productteknisi2 = mysqli_real_escape_string($conn, trim($_POST['teknisi2_spk']));
		$dataTek = $dataTek . $productteknisi2 . ';';
	}
	if (isset($_POST['teknisi3_spk'])) {
		$productteknisi3 = mysqli_real_escape_string($conn, trim($_POST['teknisi3_spk']));
		$dataTek = $dataTek . $productteknisi3 . ';';
	}
	if (isset($_POST['teknisi4_spk'])) {
		$productteknisi4 = mysqli_real_escape_string($conn, trim($_POST['teknisi4_spk']));
		$dataTek = $dataTek . $productteknisi4 . ';';
	}
	if (isset($_POST['teknisi5_spk'])) {
		$productteknisi5 = mysqli_real_escape_string($conn, trim($_POST['teknisi5_spk']));
		$dataTek = $dataTek . $productteknisi5 . ';';
	}
	if (isset($_POST['teknisi6_spk'])) {
		$productteknisi6 = mysqli_real_escape_string($conn, trim($_POST['teknisi6_spk']));
		$dataTek = $dataTek . $productteknisi6 . ';';
	}
	if (isset($_POST['teknisi7_spk'])) {
		$productteknisi7 = mysqli_real_escape_string($conn, trim($_POST['teknisi7_spk']));
		$dataTek = $dataTek . $productteknisi7 . ';';
	}
	if (isset($_POST['teknisi8_spk'])) {
		$productteknisi8 = mysqli_real_escape_string($conn, trim($_POST['teknisi8_spk']));
		$dataTek = $dataTek . $productteknisi8 . ';';
	}
	if (isset($_POST['teknisi9_spk'])) {
		$productteknisi9 = mysqli_real_escape_string($conn, trim($_POST['teknisi9_spk']));
		$dataTek = $dataTek . $productteknisi9 . ';';
	}


	// echo $dataTek;

	$query = "INSERT INTO spk (id_proyek, koordinator_spk, pelaksana_spk, lastupdate_spk, jml_akomodasi_spk, jml_transportasi_spk, jml_penginapan_spk, jml_cadangan_spk, ket_akomodasi_spk, ket_transportasi_spk, ket_penginapan_spk, ket_cadangan_spk, stgl_spk, etgl_spk, sjam_spk, ejam_spk) 
	VALUES('$productidproyek', '$productkoordinator', '$dataTek', '$timezone', '$productjml_akomodasi', '$productjml_transportasi', '$productjml_penginapan', '$productjml_cadangan', '$productket_akomodasi', '$productket_transportasi', '$productket_penginapan', '$productket_cadangan', '$productstgl', '$productetgl', '$productsjam', '$productejam')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_spk') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_spk']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productkoordinator = mysqli_real_escape_string($conn, trim($_POST['koordinator_spk']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$productstgl = mysqli_real_escape_string($conn, trim($_POST['stgl_spk']));
	$productetgl = mysqli_real_escape_string($conn, trim($_POST['etgl_spk']));
	$productsjam = mysqli_real_escape_string($conn, trim($_POST['sjam_spk']));
	$productejam = mysqli_real_escape_string($conn, trim($_POST['ejam_spk']));

	$productjml_akomodasi = mysqli_real_escape_string($conn, trim($_POST['jml_akomodasi_spk']));
	$productjml_transportasi = mysqli_real_escape_string($conn, trim($_POST['jml_transportasi_spk']));
	$productjml_penginapan = mysqli_real_escape_string($conn, trim($_POST['jml_penginapan_spk']));
	$productjml_cadangan = mysqli_real_escape_string($conn, trim($_POST['jml_cadangan_spk']));

	$productket_akomodasi = mysqli_real_escape_string($conn, trim($_POST['ket_akomodasi_spk']));
	$productket_transportasi = mysqli_real_escape_string($conn, trim($_POST['ket_transportasi_spk']));
	$productket_penginapan = mysqli_real_escape_string($conn, trim($_POST['ket_penginapan_spk']));
	$productket_cadangan = mysqli_real_escape_string($conn, trim($_POST['ket_cadangan_spk']));

	// $productup = mysqli_real_escape_string($conn, trim($_POST['up_spk']));
	// $producthp = mysqli_real_escape_string($conn, trim($_POST['hp_spk']));


	$dataTek = '';

	// teknisi
	// if (isset($_POST['teknisi1_spk'])) {
	// 	$productteknisi1 = mysqli_real_escape_string($conn, trim($_POST['teknisi1_spk']));
	// 	$dataTek = $dataTek . $productteknisi1 . ';';
	// }
	// if (isset($_POST['teknisi2_spk'])) {
	// 	$productteknisi2 = mysqli_real_escape_string($conn, trim($_POST['teknisi2_spk']));
	// 	$dataTek = $dataTek . $productteknisi2 . ';';
	// }
	// if (isset($_POST['teknisi3_spk'])) {
	// 	$productteknisi3 = mysqli_real_escape_string($conn, trim($_POST['teknisi3_spk']));
	// 	$dataTek = $dataTek . $productteknisi3 . ';';
	// }
	// if (isset($_POST['teknisi4_spk'])) {
	// 	$productteknisi4 = mysqli_real_escape_string($conn, trim($_POST['teknisi4_spk']));
	// 	$dataTek = $dataTek . $productteknisi4 . ';';
	// }
	// if (isset($_POST['teknisi5_spk'])) {
	// 	$productteknisi5 = mysqli_real_escape_string($conn, trim($_POST['teknisi5_spk']));
	// 	$dataTek = $dataTek . $productteknisi5 . ';';
	// }
	// if (isset($_POST['teknisi6_spk'])) {
	// 	$productteknisi6 = mysqli_real_escape_string($conn, trim($_POST['teknisi6_spk']));
	// 	$dataTek = $dataTek . $productteknisi6 . ';';
	// }
	// if (isset($_POST['teknisi7_spk'])) {
	// 	$productteknisi7 = mysqli_real_escape_string($conn, trim($_POST['teknisi7_spk']));
	// 	$dataTek = $dataTek . $productteknisi7 . ';';
	// }
	// if (isset($_POST['teknisi8_spk'])) {
	// 	$productteknisi8 = mysqli_real_escape_string($conn, trim($_POST['teknisi8_spk']));
	// 	$dataTek = $dataTek . $productteknisi8 . ';';
	// }
	// if (isset($_POST['teknisi9_spk'])) {
	// 	$productteknisi9 = mysqli_real_escape_string($conn, trim($_POST['teknisi9_spk']));
	// 	$dataTek = $dataTek . $productteknisi9 . ';';
	// }

	// user
	if (isset($_POST['teknisi3_spk'])) {
		$productteknisi3 = mysqli_real_escape_string($conn, trim($_POST['teknisi3_spk']));
		$dataTek = $dataTek . $productteknisi3 . ';';
	}
	if (isset($_POST['teknisi4_spk'])) {
		$productteknisi4 = mysqli_real_escape_string($conn, trim($_POST['teknisi4_spk']));
		$dataTek = $dataTek . $productteknisi4 . ';';
	}
	if (isset($_POST['teknisi9_spk'])) {
		$productteknisi9 = mysqli_real_escape_string($conn, trim($_POST['teknisi9_spk']));
		$dataTek = $dataTek . $productteknisi9 . ';';
	}
	if (isset($_POST['teknisi10_spk'])) {
		$productteknisi10 = mysqli_real_escape_string($conn, trim($_POST['teknisi10_spk']));
		$dataTek = $dataTek . $productteknisi10 . ';';
	}
	if (isset($_POST['teknisi17_spk'])) {
		$productteknisi17 = mysqli_real_escape_string($conn, trim($_POST['teknisi17_spk']));
		$dataTek = $dataTek . $productteknisi17 . ';';
	}
	if (isset($_POST['teknisi19_spk'])) {
		$productteknisi19 = mysqli_real_escape_string($conn, trim($_POST['teknisi19_spk']));
		$dataTek = $dataTek . $productteknisi19 . ';';
	}


	$query = "UPDATE spk SET koordinator_spk='$productkoordinator', pelaksana_spk='$dataTek', lastupdate_spk='$timezone', jml_akomodasi_spk='$productjml_akomodasi', jml_transportasi_spk='$productjml_transportasi', jml_penginapan_spk='$productjml_penginapan', jml_cadangan_spk='$productjml_cadangan', ket_akomodasi_spk='$productket_akomodasi', ket_transportasi_spk='$productket_transportasi', ket_penginapan_spk='$productket_penginapan', ket_cadangan_spk='$productket_cadangan', stgl_spk='$productstgl', etgl_spk='$productetgl', sjam_spk='$productsjam', ejam_spk='$productejam' WHERE id_spk='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'add_detailspk') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_detailspk']));
	$productid_proyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productnama_layanan = mysqli_real_escape_string($conn, trim($_POST['id_layanan']));
	$productnama = mysqli_real_escape_string($conn, trim($_POST['namabarang_detailspk']));
	$productjumlah = mysqli_real_escape_string($conn, trim($_POST['jumlahbarang_detailspk']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query2 = "SELECT namabarang_detailspk FROM detailspk WHERE namabarang_detailspk='$productnama' AND id_proyek='$productid_proyek'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	if ($row2 == 0) {
		$query = "INSERT INTO detailspk (id_proyek, id_layanan, namabarang_detailspk, jumlahbarang_detailspk) 
		VALUES('$productid_proyek', '$productnama_layanan',  '$productnama', '$productjumlah')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "0";
}

if ($form_name == "edit_detailspk") {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_detailspk']));
	$productid_proyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productnama_layanan = mysqli_real_escape_string($conn, trim($_POST['id_layanan']));
	$productnama = mysqli_real_escape_string($conn, trim($_POST['namabarang_detailspk']));
	$productjumlah = mysqli_real_escape_string($conn, trim($_POST['jumlahbarang_detailspk']));

	// $query1 = "SELECT id_layanan FROM detailspk WHERE id_layanan='$productnama_layanan'";
	$query1 = "SELECT namabarang_detailspk FROM detailspk WHERE namabarang_detailspk='$productnama' AND id_proyek='$productid_proyek'";
	$result1 = mysqli_query($conn, $query1) or die(mysql_error());
	$row1 = mysqli_num_rows($result1);

	// $query2 = "SELECT id_layanan FROM detailspk WHERE id_layanan='$productnama_layanan' AND id_detailspk='$productid'";
	$query2 = "SELECT namabarang_detailspk FROM detailspk WHERE namabarang_detailspk='$productnama' AND id_proyek='$productid_proyek' AND id_detailspk='$productid'";
	$result2 = mysqli_query($conn, $query2) or die(mysql_error());
	$row2 = mysqli_num_rows($result2);

	if ($row1 == 0 || $row2 == 1) {
		$query = "UPDATE detailspk SET id_proyek='$productid_proyek', id_layanan='$productnama_layanan', namabarang_detailspk='$productnama', jumlahbarang_detailspk='$productjumlah' WHERE id_detailspk='$productid'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == "del_detailspk") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM detailspk WHERE id_detailspk='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "ok_spk") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 7;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'spk dan akomoadasi', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_spk") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 5;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'spk dan akomodasi', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}

			$query = "DELETE FROM detailspk WHERE id_proyek='$tbl_id'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// BERKAS TEKNISI

if ($form_name == 'add_berkasteknisi') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['berkasteknisi_id']));
	$productid_proyek = mysqli_real_escape_string($conn, trim($_POST['proyek_id']));
	$productid_alat = mysqli_real_escape_string($conn, trim($_POST['alat_id']));
	// $productkondisi = mysqli_real_escape_string($conn, trim($_POST['kondisi_berkasteknisi']));
	// $productkelengkapan = mysqli_real_escape_string($conn, trim($_POST['kelengkapan_berkasteknisi']));
	$productkondisi = '';
	$productkelengkapan = '';
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query2 = "SELECT id_berkasteknisi FROM berkasteknisi WHERE id_alat='$productid_alat' AND id_proyek='$productid_proyek'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	if ($row2 == 0) {
		$query = "INSERT INTO berkasteknisi (id_proyek, id_alat, kondisi_berkasteknisi, kelengkapan_berkasteknisi, kembali_berkasteknisi, lastupdate_berkasteknisi) 
		VALUES('$productid_proyek', '$productid_alat',  '$productkondisi', '$productkelengkapan', 'T', '$timezone')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_alat = "UPDATE alatkalibrasi SET kembali='Tidak' WHERE id_alat='$productid_alat'";
			$result_alat = mysqli_query($conn, $query_alat) or die(mysqli_error($conn));
		}
		else
			echo "0";
	} else
		echo "0";
}

if ($form_name == "del_berkasteknisi") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query2 = "SELECT * FROM berkasteknisi WHERE id_berkasteknisi='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);
		$idalat_kalibrasi = $row2['id_alat'];

		$query = "DELETE FROM berkasteknisi WHERE id_berkasteknisi='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
			$query1 = "UPDATE alatkalibrasi SET kembali='Ya' WHERE id_alat='$idalat_kalibrasi'";
			$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
		}
		else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "del_berkasteknisiAll") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query_proyek = "SELECT * FROM proyek WHERE id_proyek='$tbl_id'";
		$result_proyek = mysqli_query($conn, $query_proyek) or die(mysqli_error($conn));
		$row_proyek = mysqli_fetch_assoc($result_proyek);
		$proyekid = $row_proyek['id_proyek'];

		$query_berkasteknisi = "SELECT * FROM berkasteknisi WHERE id_proyek='$proyekid' AND kembali_berkasteknisi='T' ORDER BY id_berkasteknisi ASC";
		$result_berkasteknisi = mysqli_query($conn, $query_berkasteknisi) or die(mysqli_error($conn));
		$row_jml_berkasteknisi = mysqli_num_rows($result_berkasteknisi);
		while ($row_berkasteknisi = mysqli_fetch_array($result_berkasteknisi)) {

			$id_alatkalibrasi = $row_berkasteknisi['id_alat'];
			$id_berkasteknisi = $row_berkasteknisi['id_berkasteknisi'];

			$query = "DELETE FROM berkasteknisi WHERE id_berkasteknisi='$id_berkasteknisi'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			$query1 = "UPDATE alatkalibrasi SET kembali='Ya' WHERE id_alat='$id_alatkalibrasi'";
			$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
		}
		if ($row_jml_berkasteknisi > 0) echo "1";
		else echo "0";
	} else
	echo "404-del";
}

if ($form_name == "kembaliAll_berkasteknisi") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query_proyek = "SELECT * FROM proyek WHERE id_proyek='$tbl_id'";
		$result_proyek = mysqli_query($conn, $query_proyek) or die(mysqli_error($conn));
		$row_proyek = mysqli_fetch_assoc($result_proyek);
		$proyekid = $row_proyek['id_proyek'];

		$query_berkasteknisi = "SELECT * FROM berkasteknisi WHERE id_proyek='$proyekid' AND kembali_berkasteknisi='T' ORDER BY id_berkasteknisi ASC";
		$result_berkasteknisi = mysqli_query($conn, $query_berkasteknisi) or die(mysqli_error($conn));
		$row_jml_berkasteknisi = mysqli_num_rows($result_berkasteknisi);
		while ($row_berkasteknisi = mysqli_fetch_array($result_berkasteknisi)) {

			$id_alatkalibrasi = $row_berkasteknisi['id_alat'];
			$id_berkasteknisi = $row_berkasteknisi['id_berkasteknisi'];

			$query = "UPDATE berkasteknisi SET kembali_berkasteknisi='Y' WHERE id_berkasteknisi='$id_berkasteknisi'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			$query1 = "UPDATE alatkalibrasi SET kembali='Ya' WHERE id_alat='$id_alatkalibrasi'";
			$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
		}
		if ($row_jml_berkasteknisi > 0) echo "1";
		else echo "0";
	} else
	echo "404-del";
}

if ($form_name == "kembali_berkasteknisi") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query2 = "SELECT * FROM berkasteknisi WHERE id_berkasteknisi='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);
		$idalat_kalibrasi = $row2['id_alat'];

		$query1 = "UPDATE berkasteknisi SET kembali_berkasteknisi='Y' WHERE id_berkasteknisi='$tbl_id'";
		$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
			$query = "UPDATE alatkalibrasi SET kembali='Ya' WHERE id_alat='$idalat_kalibrasi'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		}
		else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "ok_berkasteknisi") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 8;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'berkas teknisi', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysqli_error($conn));
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_berkasteknisi") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 6;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'berkas teknisi', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// LAPORAN PEKERJAAN


if ($form_name == 'add_lappekerjaan') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_lappekerjaan']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_lappekerjaan']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO lappekerjaan (id_proyek, link_lappekerjaan, lastupdate_lappekerjaan) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_lappekerjaan') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_lappekerjaan']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_lappekerjaan']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE lappekerjaan SET link_lappekerjaan='$productlink', lastupdate_lappekerjaan='$timezone' WHERE id_lappekerjaan='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_lappekerjaan") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 1;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////

		$query0 = "SELECT subkontrak_negosiasi FROM negosiasi WHERE id_proyek='$tbl_id'";
		$result0 = mysqli_query($conn, $query0) or die(mysqli_error($conn));
		$row0 = mysqli_fetch_assoc($result0);

		$query_s1 = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result_s1 = mysqli_query($conn, $query_s1) or die(mysqli_error($conn));
		$query_s2 = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result_s2 = mysqli_query($conn, $query_s2) or die(mysqli_error($conn));
		if ($row0['subkontrak_negosiasi'] == 'Ada') {
			$query_s3 = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
			$result_s3 = mysqli_query($conn, $query_s3) or die(mysqli_error($conn));
		}

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'laporan pekerjaan', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_lappekerjaan") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 7;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'laporan pekerjaan', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// PENYELIAAN LK

if ($form_name == "ok_penyeliaanlk") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 2;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query4 = "INSERT INTO penyeliaanlk (id_proyek, lastupdate_penyeliaanlk) VALUES ('$tbl_id', '$timezone')";
		$result4 = mysqli_query($conn, $query4) or die(mysql_error());

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'penyeliaan lk', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_penyeliaanlk") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 5;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "DELETE FROM penyeliaanlk WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'penyeliaan lk', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// CETAK SERTIFIKAT

if ($form_name == "ok_cetaksertifikat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 3;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query4 = "INSERT INTO cetaksertifikat (id_proyek, lastupdate_cetaksertifikat) VALUES ('$tbl_id', '$timezone')";
		$result4 = mysqli_query($conn, $query4) or die(mysql_error());

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'cetak sertifikat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_cetaksertifikat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 1;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "DELETE FROM cetaksertifikat WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'cetak sertifikat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// SALINAN SERTIFIKAT

if ($form_name == "ok_salinansertifikat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 4;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		// $query4 = "INSERT INTO salinansertifikat (id_proyek, lastupdate_salinansertifikat) VALUES('$tbl_id', '$timezone')";
		// $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'salinan sertifikat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_salinansertifikat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 2;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		// $query4 = "DELETE FROM salinansertifikat WHERE id_proyek='$tbl_id'";
		// $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'salinan sertifikat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// BAST SERTIFIKAT

if ($form_name == 'add_bastsertifikat') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_bastsertifikat']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_bastsertifikat']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO bastsertifikat (id_proyek, link_bastsertifikat, lastupdate_bastsertifikat) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_bastsertifikat') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_bastsertifikat']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_bastsertifikat']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE bastsertifikat SET link_bastsertifikat='$productlink', lastupdate_bastsertifikat='$timezone' WHERE id_bastsertifikat='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_bastsertifikat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 6;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'bast sertifikat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_bastsertifikat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 3;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'bast sertifikat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

// =============================== back tla ============================
if ($form_name == "back_tla") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 4;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status1_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'timeline sertifikat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

/////////////////////////////// INPUT DO

if ($form_name == 'add_inputdo') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_inputdo']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_inputdo']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO inputdo (id_proyek, link_inputdo, lastupdate_inputdo) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_inputdo') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_inputdo']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_inputdo']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE inputdo SET link_inputdo='$productlink', lastupdate_inputdo='$timezone' WHERE id_inputdo='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_inputdo") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 2;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'input do', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_inputdo") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 6;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'input do', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// INVOICE dan PAJAK

if ($form_name == 'add_invoicepajak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_invoicepajak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productnilai = mysqli_real_escape_string($conn, trim($_POST['nilai_invoicepajak']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_invoicepajak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO invoicepajak (id_proyek, nilai_invoicepajak, link_invoicepajak, lastupdate_invoicepajak) 
	VALUES('$productidproyek', '$productnilai', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_invoicepajak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_invoicepajak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productnilai = mysqli_real_escape_string($conn, trim($_POST['nilai_invoicepajak']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_invoicepajak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE invoicepajak SET nilai_invoicepajak='$productnilai', link_invoicepajak='$productlink', lastupdate_invoicepajak='$timezone' WHERE id_invoicepajak='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_invoicepajak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 3;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'invoice dan pajak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_invoicepajak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 1;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'invoice dan pajak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

/////////////////////////////// SPJ

if ($form_name == "ok_spj") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 4;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query4 = "INSERT INTO spj (id_proyek, lastupdate_spj) VALUES ('$tbl_id', '$timezone')";
		$result4 = mysqli_query($conn, $query4) or die(mysql_error());

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'spj', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_spj") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 2;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "DELETE FROM spj WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'spj', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// BUKTI Transfer

if ($form_name == 'add_buktitransfer') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_buktitransfer']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_buktitransfer']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO buktitransfer (id_proyek, link_buktitransfer, lastupdate_buktitransfer) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_buktitransfer') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_buktitransfer']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_buktitransfer']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE buktitransfer SET link_buktitransfer='$productlink', lastupdate_buktitransfer='$timezone' WHERE id_buktitransfer='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_buktitransfer") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 5;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'bukti transfer', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_buktitransfer") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 3;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'bukti transfer', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}



/////////////////////////////// SPP dan BUKTI POTONG

if ($form_name == 'add_sppbuktipotong') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_sppbuktipotong']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_sppbuktipotong']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO sppbuktipotong (id_proyek, link_sppbuktipotong, lastupdate_sppbuktipotong) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_sppbuktipotong') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_sppbuktipotong']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_sppbuktipotong']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE sppbuktipotong SET link_sppbuktipotong='$productlink', lastupdate_sppbuktipotong='$timezone' WHERE id_sppbuktipotong='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_sppbuktipotong") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 7;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'ssp dan bukti potong', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_sppbuktipotong") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 4;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'ssp dan bukti potong', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

// =============================== back tlb ============================
if ($form_name == "back_tlb") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 5;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status2_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'timeline penagihan', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// PO Subkontrak

if ($form_name == 'add_posubkontrak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_posubkontrak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_posubkontrak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO posubkontrak (id_proyek, link_posubkontrak, lastupdate_posubkontrak) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_posubkontrak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_posubkontrak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_posubkontrak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE posubkontrak SET link_posubkontrak='$productlink', lastupdate_posubkontrak='$timezone' WHERE id_posubkontrak='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_posubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 2;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'po subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_posubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 7;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'po subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}



/////////////////////////////// kirimsubkontrak

if ($form_name == 'add_kirimsubkontrak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_kirimsubkontrak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_kirimsubkontrak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO kirimsubkontrak (id_proyek, link_kirimsubkontrak, lastupdate_kirimsubkontrak) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_kirimsubkontrak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_kirimsubkontrak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_kirimsubkontrak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE kirimsubkontrak SET link_kirimsubkontrak='$productlink', lastupdate_kirimsubkontrak='$timezone' WHERE id_kirimsubkontrak='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_kirimsubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 3;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query4 = "INSERT INTO kirimsubkontrak (id_proyek, lastupdate_kirimsubkontrak) VALUES ('$tbl_id', '$timezone')";
		$result4 = mysqli_query($conn, $query4) or die(mysql_error());

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'kirim subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_kirimsubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 1;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query = "DELETE FROM kirimsubkontrak WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'kirim subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// Uang Subkontrak

if ($form_name == 'add_uangsubkontrak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_uangsubkontrak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_uangsubkontrak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO uangsubkontrak (id_proyek, link_uangsubkontrak, lastupdate_uangsubkontrak) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_uangsubkontrak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_uangsubkontrak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_uangsubkontrak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE uangsubkontrak SET link_uangsubkontrak='$productlink', lastupdate_uangsubkontrak='$timezone' WHERE id_uangsubkontrak='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_uangsubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 4;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'pelunasan / uang muka', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_uangsubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 2;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'pelunasan / uang muka', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// INVOICE dan PAJAK SUBKONTRAK

if ($form_name == 'add_invoicepajaksubkontrak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_invoicepajaksubkontrak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_invoicepajaksubkontrak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO invoicepajaksubkontrak (id_proyek, link_invoicepajaksubkontrak, lastupdate_invoicepajaksubkontrak) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_invoicepajaksubkontrak') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_invoicepajaksubkontrak']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_invoicepajaksubkontrak']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE invoicepajaksubkontrak SET link_invoicepajaksubkontrak='$productlink', lastupdate_invoicepajaksubkontrak='$timezone' WHERE id_invoicepajaksubkontrak='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_invoicepajaksubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 5;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'invoice dan pajak subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_invoicepajaksubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 3;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'invoice dan pajak subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}



/////////////////////////////// VERIFIKASI PEMBELIAN SUBKONTRAK

if ($form_name == 'add_verifikasibelisubkontrak') {
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productnamaproduk = mysqli_real_escape_string($conn, trim($_POST['namaproduk_verifikasibelisubkontrak']));
	$productpenyedia = mysqli_real_escape_string($conn, trim($_POST['penyedia_verifikasibelisubkontrak']));
	$productnopo = mysqli_real_escape_string($conn, trim($_POST['nopo_verifikasibelisubkontrak']));
	$productnoinvoice = mysqli_real_escape_string($conn, trim($_POST['noinvoice_verifikasibelisubkontrak']));
	$productcatatan = mysqli_real_escape_string($conn, trim($_POST['catatan_verifikasibelisubkontrak']));
	$productjumlah = 'Tidak Memenuhi';
	$productspesifikasi = 'Tidak Memenuhi';
	$productkondisi = 'Tidak Memenuhi';
	$productinvoice = 'Tidak Ada';
	$productfakturpajak = 'Tidak Ada';
	$productgaransi = 'Tidak Ada';
	$productkeputusan = 'Ditolak';
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if (isset($_POST['jumlah_verifikasibelisubkontrak'])) {
		$productjumlah = mysqli_real_escape_string($conn, trim($_POST['jumlah_verifikasibelisubkontrak']));
	}
	if (isset($_POST['spesifikasi_verifikasibelisubkontrak'])) {
		$productspesifikasi = mysqli_real_escape_string($conn, trim($_POST['spesifikasi_verifikasibelisubkontrak']));
	}
	if (isset($_POST['kondisi_verifikasibelisubkontrak'])) {
		$productkondisi = mysqli_real_escape_string($conn, trim($_POST['kondisi_verifikasibelisubkontrak']));
	}
	if (isset($_POST['invoice_verifikasibelisubkontrak'])) {
		$productinvoice = mysqli_real_escape_string($conn, trim($_POST['invoice_verifikasibelisubkontrak']));
	}
	if (isset($_POST['fakturpajak_verifikasibelisubkontrak'])) {
		$productfakturpajak = mysqli_real_escape_string($conn, trim($_POST['fakturpajak_verifikasibelisubkontrak']));
	}
	if (isset($_POST['garansi_verifikasibelisubkontrak'])) {
		$productgaransi = mysqli_real_escape_string($conn, trim($_POST['garansi_verifikasibelisubkontrak']));
	}
	if (isset($_POST['keputusan_verifikasibelisubkontrak'])) {
		$productkeputusan = mysqli_real_escape_string($conn, trim($_POST['keputusan_verifikasibelisubkontrak']));
	}

	$query = "INSERT INTO verifikasibelisubkontrak (id_proyek, namaproduk_verifikasibelisubkontrak, 
	penyedia_verifikasibelisubkontrak, nopo_verifikasibelisubkontrak, noinvoice_verifikasibelisubkontrak, 
	jumlah_verifikasibelisubkontrak, spesifikasi_verifikasibelisubkontrak, kondisi_verifikasibelisubkontrak, 
	invoice_verifikasibelisubkontrak, fakturpajak_verifikasibelisubkontrak, garansi_verifikasibelisubkontrak, 
	catatan_verifikasibelisubkontrak, keputusan_verifikasibelisubkontrak, lastupdate_verifikasibelisubkontrak) 
	VALUES('$productidproyek', '$productnamaproduk', '$productpenyedia', '$productnopo', '$productnoinvoice',
	'$productjumlah', '$productspesifikasi', '$productkondisi', '$productinvoice', '$productfakturpajak',
	'$productgaransi', '$productcatatan', '$productkeputusan', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "del_verifikasibelisubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM verifikasibelisubkontrak WHERE id_verifikasibelisubkontrak='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "ok_verifikasibelisubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 6;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'verifikasi pembelian subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_verifikasibelisubkontrak") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 4;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'verifikasi dan pembelian subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

/////////////////////////////// BAST ALAT

if ($form_name == 'add_bastalat') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_bastalat']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_bastalat']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO bastalat (id_proyek, link_bastalat, lastupdate_bastalat) 
	VALUES('$productidproyek', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_bastalat') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_bastalat']));
	$productidproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_bastalat']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE bastalat SET link_bastalat='$productlink', lastupdate_bastalat='$timezone' WHERE id_bastalat='$productid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "ok_bastalat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 8;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'bast alat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_bastalat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 5;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'bast alat', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

// =============================== back tlc ============================
if ($form_name == "back_tlc") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 6;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status3_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'timeline subkontrak', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


// =============================== DONE PROYEK ============================
if ($form_name == "ok_proyekdetail") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 9;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menyelesaikan', 'proyek', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}

if ($form_name == "not_proyekdetail") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$status_proyek = 10;
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		/////////////// Status Proyek ////////////////
		$query = "UPDATE proyek SET status_proyek='$status_proyek' WHERE id_proyek='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query2 = "SELECT no_proyek FROM proyek WHERE id_proyek='$tbl_id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			$query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'membatalkan', 'proyek', '$tbl_id', '$row2[no_proyek]', '$timezone')";
			$result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			if ($result_notif) {
				$last_notifid = mysqli_insert_id($conn);
				$query_user = "SELECT * FROM user";
				$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
				while ($row_user = $result_user->fetch_assoc()) {
					$userid = $row_user['id_user'];
					$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
					$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
				}
			}
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// ALAT

if ($form_name == 'add_alat') {
	$productnama_alat = mysqli_real_escape_string($conn, trim($_POST['nama_alat']));
	$productmerek = mysqli_real_escape_string($conn, trim($_POST['merek']));
	$producttipe = mysqli_real_escape_string($conn, trim($_POST['tipe']));
	$productno = mysqli_real_escape_string($conn, trim($_POST['no_seri']));
	$productkode = mysqli_real_escape_string($conn, trim($_POST['kode_inventaris']));
	$productharga = mysqli_real_escape_string($conn, trim($_POST['harga']));
	$productpenyedia = mysqli_real_escape_string($conn, trim($_POST['penyedia']));
	$productrentang_ukur = mysqli_real_escape_string($conn, trim($_POST['rentang_ukur']));
	$productresolusi = mysqli_real_escape_string($conn, trim($_POST['resolusi']));
	$producttgl_diterima = mysqli_real_escape_string($conn, trim($_POST['tgl_diterima']));
	$producttgl_kalibrasi = mysqli_real_escape_string($conn, trim($_POST['tgl_kalibrasi']));
	$productlink_alat = mysqli_real_escape_string($conn, trim($_POST['link_alat']));
	$productdoc_alat = mysqli_real_escape_string($conn, trim($_POST['doc_alat']));

	$query1 = "SELECT kode_inventaris FROM alatkalibrasi WHERE kode_inventaris='$productkode'";
	$result1 = mysqli_query($conn, $query1) or die(mysql_error());
	$row1 = mysqli_num_rows($result1);

	if ($row1 == 0) {
		$query = "INSERT INTO alatkalibrasi (nama_alat, merek, tipe, no_seri, kode_inventaris, harga, penyedia, rentang_ukur, resolusi, tgl_diterima, tgl_kalibrasi, link_alat, doc_alat) 
		VALUES('$productnama_alat', '$productmerek', '$producttipe', '$productno', '$productkode', 
		'$productharga', '$productpenyedia', '$productrentang_ukur', '$productresolusi', '$producttgl_diterima',
		'$producttgl_kalibrasi', '$productlink_alat', '$productdoc_alat')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == "edit_alat") {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_alat']));
	$productnama_alat = mysqli_real_escape_string($conn, trim($_POST['nama_alat']));
	$productmerek = mysqli_real_escape_string($conn, trim($_POST['merek']));
	$producttipe = mysqli_real_escape_string($conn, trim($_POST['tipe']));
	$productno = mysqli_real_escape_string($conn, trim($_POST['no_seri']));
	$productkode = mysqli_real_escape_string($conn, trim($_POST['kode_inventaris']));
	$productharga = mysqli_real_escape_string($conn, trim($_POST['harga']));
	$productpenyedia = mysqli_real_escape_string($conn, trim($_POST['penyedia']));
	$productrentang_ukur = mysqli_real_escape_string($conn, trim($_POST['rentang_ukur']));
	$productresolusi = mysqli_real_escape_string($conn, trim($_POST['resolusi']));
	$producttgl_diterima = mysqli_real_escape_string($conn, trim($_POST['tgl_diterima']));
	$producttgl_kalibrasi = mysqli_real_escape_string($conn, trim($_POST['tgl_kalibrasi']));
	$productlink_alat = mysqli_real_escape_string($conn, trim($_POST['link_alat']));
	$productdoc_alat = mysqli_real_escape_string($conn, trim($_POST['doc_alat']));

	$query1 = "SELECT kode_inventaris FROM alatkalibrasi WHERE kode_inventaris='$productkode'";
	$result1 = mysqli_query($conn, $query1) or die(mysql_error());
	$row1 = mysqli_num_rows($result1);

	$query2 = "SELECT kode_inventaris FROM alatkalibrasi WHERE kode_inventaris='$productkode' AND id_alat='$productid'";
	$result2 = mysqli_query($conn, $query2) or die(mysql_error());
	$row2 = mysqli_num_rows($result2);

	if ($row1 == 0 || $row2 == 1) {
		$query = "UPDATE alatkalibrasi SET nama_alat='$productnama_alat', merek='$productmerek', tipe='$producttipe', no_seri='$productno', kode_inventaris='$productkode', harga='$productharga', 
		penyedia='$productpenyedia', rentang_ukur='$productrentang_ukur', resolusi='$productresolusi', tgl_diterima='$producttgl_diterima', tgl_kalibrasi='$producttgl_kalibrasi',
		link_alat='$productlink_alat', doc_alat='$productdoc_alat' WHERE id_alat='$productid'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == "del_alat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM alatkalibrasi WHERE id_alat='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}

/////////////////////////////// RIWAYAT ALAT

if ($form_name == 'add_riwayat') {
	$productid_alat = mysqli_real_escape_string($conn, trim($_POST['id_alat']));
	$productkategori = mysqli_real_escape_string($conn, trim($_POST['kategori_riwayat']));
	$productdeskripsi = mysqli_real_escape_string($conn, trim($_POST['deskripsi_riwayat']));
	$producttgl = mysqli_real_escape_string($conn, trim($_POST['tgl_riwayat']));
	$producttindakan = mysqli_real_escape_string($conn, trim($_POST['tindakan_riwayat']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "INSERT INTO riwayat (id_alat, kategori_riwayat, deskripsi_riwayat, tgl_riwayat, tindakan_riwayat) 
	VALUES('$productid_alat', '$productkategori', '$productdeskripsi', '$producttgl', '$producttindakan')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	// $query2 = "SELECT * FROM alatkalibrasi WHERE id_alat='$productid_alat'";
	// $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	// $row2 = mysqli_fetch_assoc($result2);

	if ($result) {
		echo "1";
		// /////////////// Data Notif ////////////////
		// $last_id = mysqli_insert_id($conn);
		// $query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menambah', 'riwayat', '$productid_alat', '$row2[nama_alat]', '$timezone')";
		// $result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

		// if ($result_notif) {
		// 	$last_notifid = mysqli_insert_id($conn);
		// 	$query_user = "SELECT * FROM user";
		// 	$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
		// 	while ($row_user = $result_user->fetch_assoc()) {
		// 		$userid = $row_user['id_user'];
		// 		$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
		// 		$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
		// 	}
		// }
	} else
		echo "0";
}

if ($form_name == "del_riwayat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {

		$query3 = "SELECT * FROM riwayat WHERE id_riwayat='$tbl_id'";
		$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
		$row3 = mysqli_fetch_assoc($result3);
		$alatid = $row3['id_alat'];

		$query2 = "SELECT * FROM alatkalibrasi WHERE id_alat='$alatid'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$row2 = mysqli_fetch_assoc($result2);

		$query = "DELETE FROM riwayat WHERE id_riwayat='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
			/////////////// Data Notif ////////////////
			// $query_notif = "INSERT INTO notif (iduser_notif, ket_notif, hal_notif, idhal_notif, namahal_notif, lastupdate_notif) VALUES ('$row_session[id_user]', 'menghapus', 'riwayat', '$row2[id_alat]', '$row2[nama_alat]', '$timezone')";
			// $result_notif = mysqli_query($conn, $query_notif) or die(mysqli_error($conn));

			// if ($result_notif) {
			// 	$last_notifid = mysqli_insert_id($conn);
			// 	$query_user = "SELECT * FROM user";
			// 	$result_user = mysqli_query($conn, $query_user) or die(mysql_error());
			// 	while ($row_user = $result_user->fetch_assoc()) {
			// 		$userid = $row_user['id_user'];
			// 		$query_baca = "INSERT INTO baca (id_notif, id_user) VALUES ('$last_notifid', '$userid')";
			// 		$result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
			// 	}
			// }
		} else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// PEMILIK

if ($form_name == 'add_pemilik') {
	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_pemilik']));

	$query2 = "SELECT nama_pemilik FROM pemilik WHERE nama_pemilik='$productnama'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	if ($row2 == 0) {
		$query = "INSERT INTO pemilik(nama_pemilik) 
		VALUES('$productnama')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == 'edit_pemilik') {
	$productid_p = mysqli_real_escape_string($conn, trim($_POST['id_pemilik']));
	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_pemilik']));

	$query2 = "SELECT nama_pemilik FROM pemilik WHERE nama_pemilik='$productnama'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($result2);

	$query3 = "SELECT nama_pemilik FROM pemilik WHERE nama_pemilik='$productnama' AND id_pemilik='$productid_p'";
	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
	$row3 = mysqli_num_rows($result3);

	if ($row2 == 0 || $row3 == 1) {
		$query = "UPDATE pemilik SET nama_pemilik='$productnama' WHERE id_pemilik='$productid_p'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "0";
}

if ($form_name == "del_pemilik") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM pemilik WHERE id_pemilik='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// SERTIFIKAT

// if ($form_name == 'add_sertifikat') {
// 	$productproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
// 	$productruangan = mysqli_real_escape_string($conn, trim($_POST['ruangan_sertifikat']));
// 	// $productnopesanan = mysqli_real_escape_string($conn, trim($_POST['nopesanan_sertifikat']));
// 	$productprogress = mysqli_real_escape_string($conn, trim($_POST['progress_sertifikat']));
// 	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_sertifikat']));
// 	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

// 	$query2 = "SELECT no_penawaranharga FROM penawaranharga WHERE id_proyek='$productproyek'";
// 	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
// 	$row2 = mysqli_fetch_assoc($result2);

// 	$nopesanan = $row2['no_penawaranharga'] . '.' . $productruangan;

// 	$query3 = "SELECT nopesanan_sertifikat FROM sertifikat WHERE nopesanan_sertifikat LIKE '$nopesanan%'";
// 	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
// 	$row3 = mysqli_num_rows($result3);
// 	if ($row3 == 0) {
// 		$no = (int)$row3 + 1;
// 		$productno = $nopesanan . '.' . $no;
// 	} else {
// 		$query4 = "SELECT MAX(nopesanan_sertifikat) AS nopesanan_sertifikat FROM sertifikat WHERE nopesanan_sertifikat LIKE '$nopesanan%'";
// 		$result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
// 		$row4 = mysqli_fetch_assoc($result4);
// 		$noPesananMax = explode('.', $row4['nopesanan_sertifikat']);
// 		$noPesananNow = (int)$noPesananMax[count($noPesananMax) - 1] + 1;
// 		$productno = $nopesanan . '.' . $noPesananNow;
// 	}

// 	$query = "INSERT INTO sertifikat(id_proyek, ruangan_sertifikat, nopesanan_sertifikat, progress_sertifikat, link_sertifikat, lastupdate_sertifikat) 
// 	VALUES('$productproyek', '$productruangan', '$productno', '$productprogress', '$productlink', '$timezone')";
// 	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// 	if ($result)
// 		echo "1";
// 	else
// 		echo "0";
// }

// if ($form_name == 'edit_sertifikat') {
// 	$productid_p = mysqli_real_escape_string($conn, trim($_POST['id_sertifikat']));
// 	$productproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
// 	$productruangan = mysqli_real_escape_string($conn, trim($_POST['ruangan_sertifikat']));
// 	$productnopesanan = mysqli_real_escape_string($conn, trim($_POST['nopesanan_sertifikat']));
// 	$productprogress = mysqli_real_escape_string($conn, trim($_POST['progress_sertifikat']));
// 	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_sertifikat']));
// 	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

// 	$query = "UPDATE sertifikat SET id_proyek='$productproyek', ruangan_sertifikat='$productruangan', nopesanan_sertifikat='$productnopesanan', progress_sertifikat='$productprogress', link_sertifikat='$productlink', lastupdate_sertifikat='$timezone'  WHERE id_sertifikat='$productid_p'";
// 	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// 	if ($result)
// 		echo "1";
// 	else
// 		echo "0";
// }

// if ($form_name == "del_sertifikat") {
// 	$chk_val = 0;
// 	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

// 	if ($chk_val == 0) {
// 		$query = "DELETE FROM sertifikat WHERE id_sertifikat='$tbl_id'";
// 		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
// 		if ($result)
// 			echo "1";
// 		else
// 			echo "0";
// 	} else
// 		echo "404-del";
// }

/////////////////////////////// PENYELIAAN SERTIFIKAT

if ($form_name == 'add_sertifikat2') {
	$productproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productruangan = mysqli_real_escape_string($conn, trim($_POST['ruangan_sertifikat']));
	// $productnopesanan = mysqli_real_escape_string($conn, trim($_POST['nopesanan_sertifikat']));
	$productprogress = mysqli_real_escape_string($conn, trim($_POST['progress_sertifikat']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_sertifikat']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query2 = "SELECT no_penawaranharga FROM penawaranharga WHERE id_proyek='$productproyek'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_fetch_assoc($result2);

	$nopesanan = $row2['no_penawaranharga'] . '.' . $productruangan;

	$query3 = "SELECT nopesanan_sertifikat FROM sertifikat WHERE nopesanan_sertifikat LIKE '$nopesanan%'";
	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
	$row3 = mysqli_num_rows($result3);
	if ($row3 == 0) {
		$no = (int)$row3 + 1;
		$productno = $nopesanan . '.' . $no;
	} else {
		$query4 = "SELECT MAX(nopesanan_sertifikat) AS nopesanan_sertifikat FROM sertifikat WHERE nopesanan_sertifikat LIKE '$nopesanan%'";
		$result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
		$row4 = mysqli_fetch_assoc($result4);
		$noPesananMax = explode('.', $row4['nopesanan_sertifikat']);
		$noPesananNow = (int)$noPesananMax[count($noPesananMax) - 1] + 1;
		$productno = $nopesanan . '.' . $noPesananNow;
	}

	$query = "INSERT INTO sertifikat(id_proyek, ruangan_sertifikat, nopesanan_sertifikat, progress_sertifikat, link_sertifikat, lastupdate_penyeliaan) 
	VALUES('$productproyek', '$productruangan', '$productno', '$productprogress', '$productlink', '$timezone')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == 'edit_sertifikat2') {
	$productid_p = mysqli_real_escape_string($conn, trim($_POST['id_sertifikat']));
	$productproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productruangan = mysqli_real_escape_string($conn, trim($_POST['ruangan_sertifikat']));
	$productnopesanan = mysqli_real_escape_string($conn, trim($_POST['nopesanan_sertifikat']));
	$productprogress = mysqli_real_escape_string($conn, trim($_POST['progress_sertifikat']));
	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_sertifikat']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE sertifikat SET id_proyek='$productproyek', ruangan_sertifikat='$productruangan', nopesanan_sertifikat='$productnopesanan', progress_sertifikat='$productprogress', link_sertifikat='$productlink', lastupdate_penyeliaan='$timezone'  WHERE id_sertifikat='$productid_p'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($result)
		echo "1";
	else
		echo "0";
}


/////////////////////////////// MIKROPIPET

if ($form_name == 'add_mikropipet') {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_mikropipet']));
	$productmerek = mysqli_real_escape_string($conn, trim($_POST['merek']));
	$producttipe = mysqli_real_escape_string($conn, trim($_POST['tipe']));
	$productno = mysqli_real_escape_string($conn, trim($_POST['no_seri']));
	$productvolume = mysqli_real_escape_string($conn, trim($_POST['volume']));
	$productlokasi = mysqli_real_escape_string($conn, trim($_POST['lokasi']));
	$productpenyedia = mysqli_real_escape_string($conn, trim($_POST['penyedia']));
	$producttgl_kalibrasi = mysqli_real_escape_string($conn, trim($_POST['tgl_kalibrasi']));
	$productlink_mikropipet = mysqli_real_escape_string($conn, trim($_POST['link_mikropipet']));

	$query1 = "SELECT no_seri FROM mikropipet WHERE no_seri='$productno'";
	$result1 = mysqli_query($conn, $query1) or die(mysql_error());
	$row1 = mysqli_num_rows($result1);

	if ($row1 == 0) {
		$query = "INSERT INTO mikropipet (merek, tipe, no_seri, volume, lokasi, penyedia, tgl_kalibrasi, link_mikropipet) 
		VALUES('$productmerek', '$producttipe', '$productno', '$productvolume', '$productlokasi', '$productpenyedia', '$producttgl_kalibrasi', '$productlink_mikropipet')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == "edit_mikropipet") {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_mikropipet']));
	$productmerek = mysqli_real_escape_string($conn, trim($_POST['merek']));
	$producttipe = mysqli_real_escape_string($conn, trim($_POST['tipe']));
	$productno = mysqli_real_escape_string($conn, trim($_POST['no_seri']));
	$productvolume = mysqli_real_escape_string($conn, trim($_POST['volume']));
	$productlokasi = mysqli_real_escape_string($conn, trim($_POST['lokasi']));
	$productpenyedia = mysqli_real_escape_string($conn, trim($_POST['penyedia']));
	$producttgl_kalibrasi = mysqli_real_escape_string($conn, trim($_POST['tgl_kalibrasi']));
	$productlink_mikropipet = mysqli_real_escape_string($conn, trim($_POST['link_mikropipet']));

	$query1 = "SELECT no_seri FROM mikropipet WHERE no_seri='$productno'";
	$result1 = mysqli_query($conn, $query1) or die(mysql_error());
	$row1 = mysqli_num_rows($result1);

	$query2 = "SELECT no_seri FROM mikropipet WHERE no_seri='$productno' AND id_mikropipet='$productid'";
	$result2 = mysqli_query($conn, $query2) or die(mysql_error());
	$row2 = mysqli_num_rows($result2);

	if ($row1 == 0 || $row2 == 1) {
		$query = "UPDATE mikropipet SET merek='$productmerek', tipe='$producttipe', no_seri='$productno', volume='$productvolume', lokasi='$productlokasi', penyedia='$productpenyedia', tgl_kalibrasi='$producttgl_kalibrasi', link_mikropipet='$productlink_mikropipet' WHERE id_mikropipet='$productid'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == "del_mikropipet") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM mikropipet WHERE id_mikropipet='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}


////////////////////////////////// PEMINJAMAN MIKROPIPET

if ($form_name == 'add_peminjamanmikropipet') {
	$noso = mysqli_real_escape_string($conn, trim($_POST['no_proyek']));
	$namapeminjam = mysqli_real_escape_string($conn, trim($_POST['nama_peminjam']));
	$namapelanggan = mysqli_real_escape_string($conn, trim($_POST['nama_pelanggan']));
	$tglpeminjaman = mysqli_real_escape_string($conn, trim($_POST['tgl_peminjaman']));
	$namapenerima = mysqli_real_escape_string($conn, trim($_POST['nama_penerima']));
	$linkpeminjaman = mysqli_real_escape_string($conn, trim($_POST['link_peminjaman']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query1 = "SELECT no_proyek FROM peminjamanmikropipet WHERE no_proyek='$noso'";
	$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
	$row1 = mysqli_num_rows($result1);

	if ($row1 == 0) {
		$query = "INSERT INTO peminjamanmikropipet (no_proyek, nama_peminjam, nama_pelanggan, tgl_peminjaman, nama_penerima, link_peminjaman) 
		VALUES ('$noso','$namapeminjam','$namapelanggan','$tglpeminjaman','$namapenerima','$linkpeminjaman')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) {
			echo "1";
		} else echo "0";
	}
}

if ($form_name == "edit_peminjamanmikropipet") {
	$peminjamanid = mysqli_real_escape_string($conn, trim($_POST['id_peminjaman']));
	$noso = mysqli_real_escape_string($conn, trim($_POST['no_proyek2']));
	$namapeminjam = mysqli_real_escape_string($conn, trim($_POST['nama_peminjam']));
	$namapelanggan = mysqli_real_escape_string($conn, trim($_POST['nama_pelanggan']));
	$tglpeminjaman = mysqli_real_escape_string($conn, trim($_POST['tgl_peminjaman']));
	$namapenerima = mysqli_real_escape_string($conn, trim($_POST['nama_penerima']));
	$linkpeminjaman = mysqli_real_escape_string($conn, trim($_POST['link_peminjaman']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	$query = "UPDATE peminjamanmikropipet SET no_proyek='$noso', nama_peminjam='$namapeminjam', nama_pelanggan='$namapelanggan', tgl_peminjaman='$tglpeminjaman', nama_penerima='$namapenerima', link_peminjaman='$linkpeminjaman' WHERE id_peminjaman='$peminjamanid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if ($result) {
		echo "1";
	} else echo "0";
}

if ($form_name == "del_peminjamanmikropipet") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	if ($chk_val == 0) {
		$query1 = "SELECT * FROM peminjamanmikropipet WHERE id_peminjaman='$tbl_id'";
		$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
		$row1 = mysqli_fetch_assoc($result1);
		$noso = $row1['no_proyek'];
		
		// $target_directory = 'data/ttd/' . $row1['nama_pelanggan'] . '/';
		
		// $target_directory = 'images/ttd/';
		// $namafile = $row1['ttd_penerima'];
		// $file = $target_directory . $namafile;

		$query3 = "SELECT * FROM detailpeminjamanmikropipet WHERE no_proyek='$noso'";
		$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
		while ($row3 = $result3->fetch_assoc()) {
			$status = $row3['kembali'];
			$idalat = $row3['id_mikropipet'];
			if ($status == 'Dipinjam') {
				$query4 = "UPDATE mikropipet SET lokasi='TABANAN' WHERE id_mikropipet='$idalat'";
				$result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
			}
		}
		$query2 = "DELETE FROM detailpeminjamanmikropipet WHERE no_proyek='$noso'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$query = "DELETE FROM peminjamanmikropipet WHERE id_peminjaman='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result) {
			// if ($namafile != '') if (file_exists($file)) unlink($file);
			echo "1";
		} else
			echo "0";
	} else {
		echo "404-del";
	}
}

////////////////////////////////// DETAIL PEMINJAMAN MIKROPIPET

if ($form_name == 'add_detailpeminjamanmikropipet') {
	$noso = mysqli_real_escape_string($conn, trim($_POST['no_proyek']));
	$idalat = mysqli_real_escape_string($conn, trim($_POST['merek']));

	$query1 = "SELECT id_mikropipet FROM detailpeminjamanmikropipet WHERE id_mikropipet='$idalat' AND no_proyek='$noso'";
	$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
	$row1 = mysqli_num_rows($result1);

	// $query2 = "SELECT id_mikropipet FROM detailpeminjamanmikropipet INNER JOIN mikropipet ON detailpeminjamanmikropipet.id_mikropipet = mikropipet.id_mikropipet 
	// 		WHERE id_mikropipet='$idalat' AND detailpeminjamanmikropipet.id_detailpeminjaman > '$detailpeminjamanid'";
	// $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	// $row2 = mysqli_num_rows($result2);

	$query2 = "SELECT nama_pelanggan FROM peminjamanmikropipet WHERE no_proyek='$noso'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_fetch_assoc($result2);
	$namapelanggan = $row2['nama_pelanggan'];

	if ($row1 == 0) {
		$query3 = "UPDATE mikropipet SET lokasi='$namapelanggan' WHERE id_mikropipet='$idalat'";
		$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));

		$query = "INSERT INTO detailpeminjamanmikropipet (no_proyek, id_mikropipet, kembali) 
			VALUES ('$noso','$idalat','Dipinjam')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == "edit_detailpeminjamanmikropipet") {
	$detailpeminjamanid = mysqli_real_escape_string($conn, trim($_POST['id_detailpeminjaman']));
	$kembali = mysqli_real_escape_string($conn, trim($_POST['kembali']));
	$noso = mysqli_real_escape_string($conn, trim($_POST['no_proyek']));
	// $idalat = mysqli_real_escape_string($conn, trim($_POST['merekfull']));
	$query1 = "SELECT id_mikropipet FROM detailpeminjamanmikropipet WHERE id_detailpeminjaman='$detailpeminjamanid'";
	$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
	$row1 = mysqli_fetch_assoc($result1);
	$idalat = $row1['id_mikropipet'];
	$query2 = "SELECT nama_pelanggan FROM peminjamanmikropipet WHERE no_proyek='$noso'";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$row2 = mysqli_fetch_assoc($result2);
	$namapelanggan = $row2['nama_pelanggan'];

	if ($kembali == 'Dipinjam') {
		$query3 = "UPDATE mikropipet SET lokasi='$namapelanggan' WHERE id_mikropipet='$idalat'";
	} else {
		$query3 = "UPDATE mikropipet SET lokasi='TABANAN' WHERE id_mikropipet='$idalat'";
	}
	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
	$query = "UPDATE detailpeminjamanmikropipet SET kembali='$kembali' WHERE id_detailpeminjaman='$detailpeminjamanid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "del_detailpeminjamanmikropipet") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query1 = "SELECT id_mikropipet FROM detailpeminjamanmikropipet WHERE id_detailpeminjaman='$tbl_id'";
		$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
		$row1 = mysqli_fetch_assoc($result1);
		$idalat = $row1['id_mikropipet'];
		$query2 = "UPDATE mikropipet SET lokasi='TABANAN' WHERE id_mikropipet='$idalat'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		$query = "DELETE FROM peminjamanmikropipet WHERE id_peminjaman='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$query = "DELETE FROM detailpeminjamanmikropipet WHERE id_detailpeminjaman='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "404-del";
	}
}



/////////////////////////////// USER

// if ($form_name == 'add_user') {
// 	// $productno = mysqli_real_escape_string($conn, trim($_POST['no_proyek']));
// 	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_user']));
// 	$producttelp = mysqli_real_escape_string($conn, trim($_POST['telp_user']));
// 	$productpass = mysqli_real_escape_string($conn, trim($_POST['pass']));
// 	$productpass2 = mysqli_real_escape_string($conn, trim($_POST['pass2']));

// 	// $timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));
// 	// $thn = gmdate('Y', time() + (60 * 60 * 8));
// 	// $bln = gmdate('m', time() + (60 * 60 * 8));
// 	// $noproyek = 'EC.PRO.' . $thn . '.' . $bln;

// 	$query2 = "SELECT no_proyek FROM proyek WHERE no_proyek LIKE '$noproyek%'";
// 	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
// 	$row2 = mysqli_num_rows($result2);
// 	if ($row2 == 0) {
// 		$no = (int)$row2 + 1;
// 		$productno = 'EC.PRO.' . $thn . '.' . $bln . '.' . $no;
// 	} else {
// 		$query3 = "SELECT MAX(no_proyek) AS no_proyek FROM proyek WHERE no_proyek LIKE '$noproyek%'";
// 		$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
// 		$row3 = mysqli_fetch_assoc($result3);
// 		$noProyekMax = explode('.', $row3['no_proyek']);
// 		$noProyekNow = $noProyekMax[count($noProyekMax)-1] + 1;
// 		$productno = 'EC.PRO.' . $thn . '.' . $bln . '.' . $noProyekNow;
// 	}

// 	$query = "INSERT INTO proyek(no_proyek, id_pelanggan, kategori_proyek, deadline_proyek, sumberdana_proyek, pagu_proyek, marketing_proyek, alatlaik_proyek, jenisalat_proyek, jmlalat_proyek, jmldana_proyek, jadwalkerja_proyek, daftarinventaris_proyek, deadlinesertifikat_proyek, catatan_proyek) 
// 		VALUES('$productno', '$productnama', '$productkategori', '$productdeadline', '$productsumberdana', '$productpagu', '$productmarketing', '$productalatlaik', '$productjenisalat', '$productjmlalat', '$productjmldana', '$productjadwalkerja', '$productdaftarinventaris', '$productdeadlinesertifikat', '$productcatatan')";
// 	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// 	if ($result)
// 		echo "1";
// 	else
// 		echo "0";
// }

// if ($form_name == 'edit_user') {
// 	$productid = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
// 	// $productno = mysqli_real_escape_string($conn, trim($_POST['no_proyek']));
// 	$productnama = mysqli_real_escape_string($conn, trim($_POST['id_pelanggan']));
// 	$productkategori = mysqli_real_escape_string($conn, trim($_POST['kategori_proyek']));
// 	$productdeadline = mysqli_real_escape_string($conn, trim($_POST['deadline_proyek']));
// 	$productsumberdana = mysqli_real_escape_string($conn, trim($_POST['sumberdana_proyek']));
// 	$productpagu = mysqli_real_escape_string($conn, trim($_POST['pagu_proyek']));
// 	$productmarketing = mysqli_real_escape_string($conn, trim($_POST['marketing_proyek']));
// 	// $productstatus = mysqli_real_escape_string($conn, trim($_POST['status_proyek']));	
// 	$productalatlaik = mysqli_real_escape_string($conn, trim($_POST['alatlaik_proyek']));
// 	$productjenisalat = mysqli_real_escape_string($conn, trim($_POST['jenisalat_proyek']));
// 	$productjmlalat = mysqli_real_escape_string($conn, trim($_POST['jmlalat_proyek']));
// 	$productjmldana = mysqli_real_escape_string($conn, trim($_POST['jmldana_proyek']));
// 	$productjadwalkerja = mysqli_real_escape_string($conn, trim($_POST['jadwalkerja_proyek']));
// 	$productdaftarinventaris = mysqli_real_escape_string($conn, trim($_POST['daftarinventaris_proyek']));
// 	$productdeadlinesertifikat = mysqli_real_escape_string($conn, trim($_POST['deadlinesertifikat_proyek']));
// 	$productcatatan = mysqli_real_escape_string($conn, trim($_POST['catatan_proyek']));


// 	$query = "UPDATE proyek SET id_pelanggan='$productnama', kategori_proyek='$productkategori', deadline_proyek='$productdeadline', sumberdana_proyek='$productsumberdana', pagu_proyek='$productpagu', marketing_proyek='$productmarketing', alatlaik_proyek='$productalatlaik', jenisalat_proyek='$productjenisalat', jmlalat_proyek='$productjmlalat', jmldana_proyek='$productjmldana', jadwalkerja_proyek='$productjadwalkerja', daftarinventaris_proyek='$productdaftarinventaris', deadlinesertifikat_proyek='$productdeadlinesertifikat', catatan_proyek='$productcatatan' WHERE id_proyek='$productid'";
// 	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// 	if ($result)
// 		echo "1";
// 	else
// 		echo "0";
// }

// if ($form_name == "del_user") {
// 	$chk_val = 0;
// 	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

// 	if ($chk_val == 0) {
// 		$query = "DELETE FROM proyek WHERE id_proyek='$tbl_id'";
// 		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
// 		if ($result)
// 			echo "1";
// 		else
// 			echo "0";
// 	} else
// 		echo "404-del";
// }


if ($form_name == 'add_user') {
	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_user']));
	$producttelp = mysqli_real_escape_string($conn, trim($_POST['telp_user']));
	$productpass = mysqli_real_escape_string($conn, trim($_POST['pass']));
	$productpass2 = mysqli_real_escape_string($conn, trim($_POST['pass2']));
	$producthash = openssl_encrypt($productpass, "AES-128-ECB", "malinicakep");

	$query1 = "SELECT nama_user FROM user WHERE nama_user='$productnama'";
	$result1 = mysqli_query($conn, $query1) or die(mysql_error());
	$row1 = mysqli_num_rows($result1);

	if (($row1 == 0) && ($productpass == $productpass2)) {
		$query = "INSERT INTO user (nama_user, telp_user, pass) 
		VALUES('$productnama', '$producttelp', '$producthash')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}

if ($form_name == "edit_user") {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_user']));
	$productposisi = mysqli_real_escape_string($conn, trim($_POST['posisi_user']));
	$productdivisi = mysqli_real_escape_string($conn, trim($_POST['divisi_user']));
	$productjoin = mysqli_real_escape_string($conn, trim($_POST['join_user']));
	$productstatuspegawai = mysqli_real_escape_string($conn, trim($_POST['status_user']));
	$productstatuskontrak = mysqli_real_escape_string($conn, trim($_POST['status_kontrak']));
	// $productusername = mysqli_real_escape_string($conn, trim($_POST['username']));

	// if($productusername == '') {

	$thn = substr($productjoin, 2, 2);

	if ($productdivisi == 'GM') $div = 1;
	else if ($productdivisi == 'Manager') $div = 2;
	else if ($productdivisi == 'Staff') $div = 3;

	if ($productposisi == 'GM') $pos = 1;
	if ($productposisi == 'PJ Teknis') $pos = 2;
	else if ($productposisi == 'PJ Mutu') $pos = 3;
	else if ($productposisi == 'Penyelia') $pos = 4;
	else if ($productposisi == 'Teknisi') $pos = 5;
	else if ($productposisi == 'Admin Teknis') $pos = 6;
	else if ($productposisi == 'Admin Umum') $pos = 7;
	else if ($productposisi == 'Finance') $pos = 8;
	else if ($productposisi == 'Marketing') $pos = 9;
	else if ($productposisi == 'HRGA') $pos = 10;

	///////////////////////////////////////////////////////////

	$productusername = '3.' . $div . '.' . $pos . '.' . $thn . '.' . $productid;

	// $nouser = '3.' . $div . '.' . $pos. '.' . $thn;

	// $query2 = "SELECT username FROM user WHERE username LIKE '$nouser%'";
	// $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	// $row2 = mysqli_num_rows($result2);
	// if ($row2 == 0) {
	// 	$no = (int)$row2 + 1;
	// 	$productusername = '3.' . $div . '.' . $pos. '.' . $thn. '.' . $no;
	// } else {
	// 	$query3 = "SELECT MAX(username) AS username FROM user WHERE username LIKE '$nouser%'";
	// 	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
	// 	$row3 = mysqli_fetch_assoc($result3);
	// 	$noProyekMax = explode('.', $row3['username']);
	// 	$noProyekNow = $noProyekMax[count($noProyekMax)-1] + 1;
	// 	$productusername = '3.' . $div . '.' . $pos. '.' . $thn. '.' . $noProyekNow;
	// }
	// }
	//////////////////////////////////////////////////////////

	$query = "UPDATE user SET username='$productusername', divisi_user='$productdivisi', posisi_user='$productposisi', join_user='$productjoin' , status_user='$productstatuspegawai' , status_kontrak='$productstatuskontrak' WHERE id_user='$productid'";
	$result = mysqli_query($conn, $query) or die(mysql_error());
	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "edit_user2") {
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_user']));
	$producttempat = mysqli_real_escape_string($conn, trim($_POST['tempat_lahir']));
	$producttgl = mysqli_real_escape_string($conn, trim($_POST['tgl_lahir']));
	$productalamat = mysqli_real_escape_string($conn, trim($_POST['alamat_user']));
	$productnpwp = mysqli_real_escape_string($conn, trim($_POST['npwp_user']));
	$productemail = mysqli_real_escape_string($conn, trim($_POST['email_user']));
	$productagama = mysqli_real_escape_string($conn, trim($_POST['agama_user']));
	$productstatusnikah = mysqli_real_escape_string($conn, trim($_POST['status_pernikahan']));
	$productpengalaman = mysqli_real_escape_string($conn, trim($_POST['pengalaman_user']));
	$productpendidikan = mysqli_real_escape_string($conn, trim($_POST['pendidikan_user']));
	$productkelamin = mysqli_real_escape_string($conn, trim($_POST['kelamin_user']));
	$productgambar = mysqli_real_escape_string($conn, trim($_POST['gambar_user']));

	$uploadStatus = 1;
	if ($productgambar == '1') {
		$target_directory = 'images/user/';
		if (!file_exists($target_directory)) mkdir($target_directory);
		$target_file = $target_directory . basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
		$filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$newfilename = $target_directory . $productid . "." . $filetype;
		$namaFileSave = $productid . "." . $filetype;

		if (move_uploaded_file($_FILES["file"]["tmp_name"], $newfilename)) {
			$query = "UPDATE user SET tempat_lahir='$producttempat', tgl_lahir='$producttgl', alamat_user='$productalamat', npwp_user='$productnpwp', email_user='$productemail', agama_user='$productagama', status_pernikahan='$productstatusnikah', pengalaman_user='$productpengalaman', pendidikan_user='$productpendidikan', kelamin_user='$productkelamin', foto_user='$namaFileSave' WHERE id_user='$productid'";
		} else {
			$uploadStatus = 0;
		}
	} else {
		$query = "UPDATE user SET tempat_lahir='$producttempat', tgl_lahir='$producttgl', alamat_user='$productalamat', npwp_user='$productnpwp', email_user='$productemail', agama_user='$productagama', status_pernikahan='$productstatusnikah', pengalaman_user='$productpengalaman', pendidikan_user='$productpendidikan', kelamin_user='$productkelamin' WHERE id_user='$productid'";
	}

	if ($uploadStatus == 1) {
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	}
}

if ($form_name == "del_user") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM user WHERE id_user='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}


/////////////////////////////// BACA

if ($form_name == "del_baca") {
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	$userid = $row_session['id_user'];
	$query = "DELETE FROM baca WHERE id_notif='$tbl_id' AND id_user='$userid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if ($result) echo "1" . $tbl_id . $userid;
	else echo "0";
}

if ($form_name == "del_allbaca") {
	$userid = $row_session['id_user'];
	$query = "DELETE FROM baca WHERE id_user='$userid'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if ($result) echo "1";
	else echo "0";
}





//////////////////////////////// IMPORT CSV SERTIFIKAT 

if ($form_name == 'import_xls_sertifikat') {
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));
	$timezone2 = gmdate('Y-m-d_H-i-s', time() + (60 * 60 * 8));
	$productid = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$sukses = '0';

	//////////////////////////////

	$target_dir = 'data/csv/';
	if (!file_exists($target_dir)) mkdir($target_dir);
	$target_file = $target_dir . $timezone2 . "_" . basename($_FILES["file"]["name"]);
	// $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		if (file_exists($target_file)) {
			$handle = fopen($target_file, "r");
			$i = 0;
			while (($Row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if ($i > 0) {
					$query1 = "SELECT kode_stiker_sertifikat FROM sertifikat WHERE kode_stiker_sertifikat='" . $Row[0] . "'";
					$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
					$row1 = mysqli_num_rows($result1);

					if ($row1 == 0) {
						if ($Row[0] != '' && $Row[1] != '' && $Row[2] != '') {
							$query = "INSERT INTO sertifikat (id_proyek, kode_stiker_sertifikat, no_sertifikat, nama_alat_sertifikat, merek_sertifikat, tipe_sertifikat, no_seri_sertifikat, ruangan_sertifikat, penguji_sertifikat)
							VALUES('$productid', '" . $Row[0] . "', '" . $Row[1] . "', '" . $Row[2] . "', '" . $Row[3] . "', '" . $Row[4] . "', '" . $Row[5] . "', '" . $Row[6] . "', '" . $Row[7] . "')";
							$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
							if ($result) $sukses = '1';
						}
					}
				}
				$i++;
			}
			fclose($handle);
		}
	}
	echo $sukses;
}


if ($form_name == "del_pdf") {
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);
	if (unlink($tbl_id))
		echo "1";
	else
		echo "0";
}





/////////////////////////////// SERTIFIKAT

// if ($form_name == 'add_sertifikat') {
// 	$productproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
// 	$productruangan = mysqli_real_escape_string($conn, trim($_POST['ruangan_sertifikat']));
// 	// $productnopesanan = mysqli_real_escape_string($conn, trim($_POST['nopesanan_sertifikat']));
// 	$productprogress = mysqli_real_escape_string($conn, trim($_POST['progress_sertifikat']));
// 	$productlink = mysqli_real_escape_string($conn, trim($_POST['link_sertifikat']));
// 	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

// 	$query2 = "SELECT no_penawaranharga FROM penawaranharga WHERE id_proyek='$productproyek'";
// 	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
// 	$row2 = mysqli_fetch_assoc($result2);

// 	$nopesanan = $row2['no_penawaranharga'] . '.' . $productruangan;

// 	$query3 = "SELECT nopesanan_sertifikat FROM sertifikat WHERE nopesanan_sertifikat LIKE '$nopesanan%'";
// 	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
// 	$row3 = mysqli_num_rows($result3);
// 	if ($row3 == 0) {
// 		$no = (int)$row3 + 1;
// 		$productno = $nopesanan . '.' . $no;
// 	} else {
// 		$query4 = "SELECT MAX(nopesanan_sertifikat) AS nopesanan_sertifikat FROM sertifikat WHERE nopesanan_sertifikat LIKE '$nopesanan%'";
// 		$result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
// 		$row4 = mysqli_fetch_assoc($result4);
// 		$noPesananMax = explode('.', $row4['nopesanan_sertifikat']);
// 		$noPesananNow = (int)$noPesananMax[count($noPesananMax) - 1] + 1;
// 		$productno = $nopesanan . '.' . $noPesananNow;
// 	}

// 	$query = "INSERT INTO sertifikat(id_proyek, ruangan_sertifikat, nopesanan_sertifikat, progress_sertifikat, link_sertifikat, lastupdate_sertifikat) 
// 	VALUES('$productproyek', '$productruangan', '$productno', '$productprogress', '$productlink', '$timezone')";
// 	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// 	if ($result)
// 		echo "1";
// 	else
// 		echo "0";
// }


if ($form_name == 'edit_sertifikat') {
	$productid_p = mysqli_real_escape_string($conn, trim($_POST['id_sertifikat']));
	$productproyek = mysqli_real_escape_string($conn, trim($_POST['id_proyek']));
	$productkodestiker = mysqli_real_escape_string($conn, trim($_POST['kode_stiker_sertifikat']));
	$productno = mysqli_real_escape_string($conn, trim($_POST['no_sertifikat']));
	$productnamaalat = mysqli_real_escape_string($conn, trim($_POST['nama_alat_sertifikat']));
	$productmerek = mysqli_real_escape_string($conn, trim($_POST['merek_sertifikat']));
	$producttipe = mysqli_real_escape_string($conn, trim($_POST['tipe_sertifikat']));
	$productnoseri = mysqli_real_escape_string($conn, trim($_POST['no_seri_sertifikat']));
	$productruangan = mysqli_real_escape_string($conn, trim($_POST['ruangan_sertifikat']));
	$productpenguji = mysqli_real_escape_string($conn, trim($_POST['penguji_sertifikat']));
	$timezone = gmdate('Y-m-d H:i:s', time() + (60 * 60 * 8));

	// $query = "UPDATE sertifikat SET id_proyek='$productproyek', ruangan_sertifikat='$productruangan', penguji_sertifikat='$productpenguji', no_seri_sertifikat='$productnoseri', tipe_sertifikat='$producttipe', merek_sertifikat='$productmerek', nama_alat_sertifikat='$productnamaalat', no_sertifikat='$productno', kode_stiker_sertifikat='$productkodestiker' WHERE id_sertifikat='$productid_p'";
	// $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	// if ($result)
	// 	echo "1";
	// else
	// 	echo "0";
	echo 'Kode='.$productkodestiker;
}

if ($form_name == "del_sertifikat") {
	$chk_val = 0;
	$tbl_id = mysqli_real_escape_string($conn, $_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "DELETE FROM sertifikat WHERE id_sertifikat='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else
		echo "404-del";
}