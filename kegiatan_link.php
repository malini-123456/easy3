<?php require_once('session.php'); 
    if ($username) {
        $query_session = "SELECT * FROM user WHERE username = '$username'";
        $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_assoc($result_session);
    }


if (isset($_REQUEST['uid'])) {       
    $proyekid = $_REQUEST['uid'];
    
    $json = array();
    $show = mysqli_query($conn, "SELECT * FROM kegiatan WHERE id_proyek = '$proyekid'");
    
    while ($row = mysqli_fetch_assoc($show)) {
        $proyekid = $row['id_proyek'];
        $show1 = mysqli_query($conn, "SELECT no_proyek FROM proyek WHERE id_proyek='$proyekid'");
        $row1 = mysqli_fetch_assoc($show1);

        $json[] = array(
            'id' => $row['id_kegiatan'],
            'id_proyek' => $row['id_proyek'],
            'no_proyek' => ' | ' . $row1['no_proyek'],
            'title' => $row['nama_kegiatan'],
            'start' => $row['stgl_kegiatan'] . 'T' . $row['sjam_kegiatan'],
            'end' => $row['etgl_kegiatan'] . 'T' . $row['ejam_kegiatan'],
            // 'startD' => $row['stgl_kegiatan'],
            // 'endD' => $row['etgl_kegiatan'],
            // 'startT' => $row['sjam_kegiatan'],
            // 'endT' => $row['ejam_kegiatan'],
            'className' => 'fc-' . $row['jenis_kegiatan'],
            'description'=> $row['isi_kegiatan'] 
        );
    }
    echo json_encode($json);
}
?>