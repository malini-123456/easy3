<?php require_once('connect.php');
// if ($username) {
//     $query_session = "SELECT * FROM user WHERE username = '$username'";
//     $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
//     $row_session = mysqli_fetch_assoc($result_session);
// }

$json = array();

// DATA SPK 
$show = mysqli_query($conn, "SELECT * FROM spk");
while ($row = mysqli_fetch_assoc($show)) {
    $proyekid = $row['id_proyek'];
    $idtekkoor = $row['koordinator_spk'];
    $dataTek = $row['pelaksana_spk'];

    $noproyek = '';
    $namapelanggan = '';
    $namateknisi = 'Teknisi : ';
    $namakoordinator = 'Koordinator : ';
    $namamarketing = 'Marketing : ';
    $catatan = 'Catatan : ';
    $status = 'Status : ';

    // $totalAll = 0;
    // $totalMampu = 0;
    // $totalTidakMampu = 0;
    // $insitu = 0;
    // $eksitu = 0;
    // $ujilistrik = 0;
    // $subkon = 0;

    // echo json_encode($row);

    if ($proyekid != 152) {
        // DATA PROYEK 
        $show1 = mysqli_query($conn, "SELECT * FROM proyek WHERE id_proyek='$proyekid'");
        $row1 = mysqli_fetch_assoc($show1);
        $noproyek = ' | ' . $row1['no_proyek'];
        $idpelanggan = $row1['id_pelanggan'];

        if ($row1['catatan_proyek'] != '') {
            $catatan = $catatan . $row1['catatan_proyek'];
        } else {
            $catatan = $catatan . '-';
        }

        if ($row1['status_proyek'] != '') {
            $status = $status . $row1['status_proyek'];
        } else {
            $status = $status . '-';
        }

        // DATA MARKETING 
        if ($row1['marketing_proyek'] != '') {
            $namamarketing = $namamarketing . $row1['marketing_proyek'];
        } else {
            $namamarketing = $namamarketing . '-';
        }

        // DATA PELANGGAN 
        $show2 = mysqli_query($conn, "SELECT nama_pelanggan FROM pelanggan WHERE id_pelanggan='$idpelanggan'");
        $row2 = mysqli_fetch_assoc($show2);
        $namapelanggan = $row2['nama_pelanggan'];

        // DATA KOORDINATOR 
        // echo json_encode($idtekkoor);
        // $namakoordinator = 'Koordinator : 1. ';
        if ($row['koordinator_spk'] != '') {
            $show3 = mysqli_query($conn, "SELECT nama_user FROM user WHERE id_user='$idtekkoor'");
            $row3 = mysqli_fetch_assoc($show3);
            $namakoordinator = $namakoordinator . $row3['nama_user'];
        } else {
            $namakoordinator = $namakoordinator . '-';
        }

        // DATA TEKNISI
        // echo json_encode($dataTek);
        if ($dataTek != '') {
            $dataTekArr = explode(';', $dataTek);
            $j = count($dataTekArr);
            if ($j > 0) {
                // $namateknisi = " | Teknisi : ";
                for ($i = 0; $i < $j - 1; $i++) {
                    $noi = $i + 1;
                    $idTekPel = $dataTekArr[$i];
                    $show4 = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$idTekPel'");
                    $row4 = mysqli_fetch_assoc($show4);
                    $namateknisi = $namateknisi . $noi . '. ' . $row4['nama_user'] . ', ';
                }
            }
        } else {
            $namateknisi = $namateknisi . '-';
        }

        // DATA KAJIULANG 
        // $query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid'";
        // $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
        // $row_kajiulang = mysqli_fetch_assoc($result_kajiulang);
        // $row_jml_kajiulang = mysqli_num_rows($result_kajiulang);

        // if ($row_jml_kajiulang > 0) {
        //     $query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid' ORDER BY id_kajiulang ASC";
        //     $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
        //     while ($row_kajiulang = mysqli_fetch_array($result_kajiulang)) {

        //         $id_layanan = $row_kajiulang['id_layanan'];
        //         $query_layanan = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
        //         $result_layanan = mysqli_query($conn, $query_layanan) or die(mysqli_error($conn));
        //         $row_layanan = mysqli_fetch_assoc($result_layanan);

        //         if ($row_kajiulang['kategori_kajiulang'] === 'Tidak Bisa Dikalibrasi') {
        //             $totalTidakMampu = $totalTidakMampu + $row_kajiulang['jumlah_barang_kajiulang'];
        //         } else {
        //             $totalMampu = $totalMampu + $row_kajiulang['jumlah_barang_kajiulang'];
        //         }

        //         if ($row_kajiulang['kategori_kajiulang'] === 'Insitu') {
        //             $insitu = $insitu + $row_kajiulang['jumlah_barang_kajiulang'];
        //         } else if ($row_kajiulang['kategori_kajiulang'] === 'Eksitu') {
        //             $eksitu = $eksitu + $row_kajiulang['jumlah_barang_kajiulang'];
        //         } else if ($row_kajiulang['kategori_kajiulang'] === 'Uji Keselamatan Listrik') {
        //             $ujilistrik = $ujilistrik + $row_kajiulang['jumlah_barang_kajiulang'];
        //         } else if ($row_kajiulang['kategori_kajiulang'] === 'Subkontrak') {
        //             $subkon = $subkon + $row_kajiulang['jumlah_barang_kajiulang'];
        //         }
        //     }
        //     $totalAll = $totalMampu + $totalTidakMampu;
        // }
    }

    $json[] = array(
        'id' => $row['id_spk'],
        'id_proyek' => $row['id_proyek'],
        'no_proyek' => $noproyek,
        'title' => $namapelanggan,
        'start' => $row['stgl_spk'] . 'T' . $row['sjam_spk'],
        'end' => $row['etgl_spk'] . 'T' . $row['ejam_spk'],
        'className' => 'fc-event-teal',
        // 'description' => $catatan . ' | ' . $status . ' | ' . $namamarketing . ' | ' . $namakoordinator . ' | ' . $namateknisi . ' | Insitu : ' . $insitu . ' | Eksitu : ' . $eksitu . ' | Uji Listrik : ' . $ujilistrik . ' | Subkon : ' . $subkon . ' | Total Mampu : ' . $totalMampu . ' | Total Tidak Mampu : ' . $totalTidakMampu
        'description' => $catatan,
        'dataProyek' => $status . ' | ' . $namamarketing . ' | ' . $namakoordinator . ' | ' . $namateknisi
        // 'dataProyek' => $status . ' | ' . $namamarketing . ' | ' . $namakoordinator . ' | ' . $namateknisi . ' | Insitu : ' . $insitu . ' | Eksitu : ' . $eksitu . ' | Uji Listrik : ' . $ujilistrik . ' | Subkon : ' . $subkon . ' | Total Mampu : ' . $totalMampu . ' | Total Tidak Mampu : ' . $totalTidakMampu
    );
}
echo json_encode($json);