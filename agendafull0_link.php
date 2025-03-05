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
    $namateknisi = '';
    $namakoordinator = '';

    // echo json_encode($row);

    if ($proyekid != 152) {
        // DATA PROYEK 
        $show1 = mysqli_query($conn, "SELECT * FROM proyek WHERE id_proyek='$proyekid'");
        $row1 = mysqli_fetch_assoc($show1);
        $noproyek = ' | ' . $row1['no_proyek'];
        $idpelanggan = $row1['id_pelanggan'];

        // DATA PELANGGAN 
        $show2 = mysqli_query($conn, "SELECT nama_pelanggan FROM pelanggan WHERE id_pelanggan='$idpelanggan'");
        $row2 = mysqli_fetch_assoc($show2);
        $namapelanggan = $row2['nama_pelanggan'];

        // DATA KOORDINATOR 
        // echo json_encode($idtekkoor);
        $namakoordinator = 'Koordinator : 1. ';
        if ($row['koordinator_spk'] != '') {
            $show3 = mysqli_query($conn, "SELECT nama_user FROM user WHERE id_user='$idtekkoor'");
            $row3 = mysqli_fetch_assoc($show3);
            $namakoordinator = $namakoordinator . $row3['nama_user'];
        }

        // DATA TEKNISI
        // echo json_encode($dataTek);
        if ($dataTek != '') {
            $dataTekArr = explode(';', $dataTek);
            $j = count($dataTekArr);
            if ($j > 0) {
                $namateknisi = " | Teknisi : ";
                for ($i = 0; $i < $j - 1; $i++) {
                    $noi = $i + 2;
                    $idTekPel = $dataTekArr[$i];
                    $show4 = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$idTekPel'");
                    $row4 = mysqli_fetch_assoc($show4);
                    $namateknisi = $namateknisi . $noi . '. ' . $row4['nama_user'] . ', ';
                }
            }
        }
    }

    $json[] = array(
        'id' => $row['id_spk'],
        'id_proyek' => $row['id_proyek'],
        'no_proyek' => $noproyek,
        'title' => $namapelanggan,
        'start' => $row['stgl_spk'] . 'T' . $row['sjam_spk'],
        'end' => $row['etgl_spk'] . 'T' . $row['ejam_spk'],
        'className' => 'fc-event-teal',
        'description' => $namakoordinator . $namateknisi
    );
}
echo json_encode($json);