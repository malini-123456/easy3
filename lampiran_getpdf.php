<?php
require_once('connect.php');
$proyekid = $_REQUEST['uid'];

$query1 = "SELECT * FROM proyek WHERE id_proyek='$proyekid'";
$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
$row1 = mysqli_fetch_assoc($result1);
$pelangganid = $row1['id_pelanggan'];

$query1a = "SELECT * FROM pelanggan WHERE id_pelanggan='$pelangganid'";
$result1a = mysqli_query($conn, $query1a) or die(mysqli_error($conn));
$row1a = mysqli_fetch_assoc($result1a);

$query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid'";
$result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
$row_kajiulang = mysqli_fetch_assoc($result_kajiulang);
$row_jml_kajiulang = mysqli_num_rows($result_kajiulang);

$query_sertifikat1 = "SELECT * FROM sertifikat WHERE id_proyek = '$proyekid'";
$result_sertifikat1 = mysqli_query($conn, $query_sertifikat1) or die(mysqli_error($conn));
$row_sertifikat1 = mysqli_fetch_assoc($result_sertifikat1);
$row_jml_sertifikat1 = mysqli_num_rows($result_sertifikat1);
?>


<style type="text/css">
    /* * {
    border: 1px;
} */

    th {
        height: 30px;
        color: #0e509e;
        font-size: 10px;
    }

    /* top right bottom left  */
</style>
<page backcolor="#FFFFFF" backtop="15mm" backbottom="8mm" style="font-size: 12pt"> <!-- #FEFEFE -->
    <page_header></page_header>
    <page_footer>
        <table style="width: 90%; margin-left: 40px; ">
            <tr>
                <td style="text-align: left; font-size: 10px; width: 80%">
                    PT ELEKTROMEDIKA INSTRUMEN TERA NUSANTARA - <?= $row1['no_proyek']; ?>
                </td>
                <td style="text-align: right; width: 20%; font-size: 10px; ">
                    <?php
                    $timezone = time() + (60 * 60 * 8);
                    // echo gmdate('d/m/Y - H:i:s', $timezone);
                    ?>
                </td>
            </tr>
        </table>
    </page_footer>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table cellspacing="0" style="width: 100%; font-size: 14px; padding: 5px 0px 5px 0; margin-left: 45px; vertical-align: middle; color: #000000;">
        <tr>
            <td style="width: 90%; height: 10px; text-align: left; font-size: 20px; vertical-align: middle; padding: -75px 0 5px 15px;">
                <br><strong>LAMPIRAN :</strong> ALAT TERKALIBRASI
            </td>
        </tr>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <table id="myTable" border="0.05px" cellspacing="0" style="width: 95%; text-align: center; font-size: 10px; padding-top: 0px; margin-left: 45px; color: #000000; ">
        <colgroup>
            <col style="width: 4%; padding: 5px;">
            <col style="width: 18%; padding: 5px;">
            <col style="width: 14%; padding: 5px;">
            <col style="width: 12%; padding: 5px;">
            <col style="width: 12%; padding: 5px;">
            <col style="width: 8%; padding: 5px;">
            <col style="width: 10%; padding: 5px;">
            <col style="width: 14%; padding: 5px;">
            <col style="width: 8%; padding: 5px;">
        </colgroup>
        <thead>
            <tr>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NO</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NAMA ALAT</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">MEREK</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">TIPE</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NO SERI</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">RUANGAN</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">HASIL</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">NO SERTIFIKAT</th>
                <th style="height: 5px; background-color: #0e509e; color: #ffffff;">UNIQ ID</th>
            </tr>
        </thead>

        <?php
        if ($row_jml_sertifikat1 > 0) {
            $sno = 0;

            $query_sertifikat = "SELECT * FROM sertifikat WHERE id_proyek = '$proyekid' ORDER BY id_sertifikat ASC";
            $result_sertifikat = mysqli_query($conn, $query_sertifikat) or die(mysqli_error($conn));
            while ($row_sertifikat = mysqli_fetch_array($result_sertifikat)) {

                $sno++;
                if ($sno % 2 != 0) {
        ?>
                    <tr>
                        <td style="text-align: center; background-color: #f5f6fa;">
                            <?= $sno; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_sertifikat['nama_alat_sertifikat']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_sertifikat['merek_sertifikat']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_sertifikat['tipe_sertifikat']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_sertifikat['no_seri_sertifikat']; ?></td>
                        <td style="text-align: left; background-color: #f5f6fa;">
                            <?= $row_sertifikat['ruangan_sertifikat']; ?></td>
                        <td style="text-align: center; background-color: #f5f6fa; ">
                            <?php if ($row_sertifikat['kode_stiker_sertifikat'][0] == 'H') { ?>
                                Laik Pakai
                            <?php } else { ?>
                                Tidak Laik Pakai
                            <?php } ?>
                        </td>
                        <td style="text-align: left; background-color: #f5f6fa; ">
                            <?= $row_sertifikat['no_sertifikat']; ?>
                        </td>
                        <td style="text-align: center; background-color: #f5f6fa; ">
                            <?= $row_sertifikat['kode_stiker_sertifikat']; ?>
                        </td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td style="text-align: center;">
                            <?= $sno; ?></td>
                        <td style="text-align: left;">
                            <?= $row_sertifikat['nama_alat_sertifikat']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_sertifikat['merek_sertifikat']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_sertifikat['tipe_sertifikat']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_sertifikat['no_seri_sertifikat']; ?></td>
                        <td style="text-align: left;">
                            <?= $row_sertifikat['ruangan_sertifikat']; ?></td>
                        <td style="text-align: center; ">
                            <?php if ($row_sertifikat['kode_stiker_sertifikat'][0] == 'H') { ?>
                                Laik Pakai
                            <?php } else { ?>
                                Tidak Laik Pakai
                            <?php } ?>
                        </td>
                        <td style="text-align: left; ">
                            <?= $row_sertifikat['no_sertifikat']; ?>
                        </td>
                        <td style="text-align: center; ">
                            <?= $row_sertifikat['kode_stiker_sertifikat']; ?>
                        </td>
                    </tr>
        <?php
                }
            }
        }
        ?>
    </table>

    <!-- /////////////////////////////////////////////////////////////////// -->

    <!-- /////////////////////////////////////////////////////////////////// -->

</page>

<?php
function fhari($nday)
{
    $hari = '';
    if ($nday == 0) {
        $hari = 'Minggu';
    } else if ($nday == 1) {
        $hari = 'Senin';
    } else if ($nday == 2) {
        $hari = 'Selasa';
    } else if ($nday == 3) {
        $hari = 'Rabu';
    } else if ($nday == 4) {
        $hari = 'Kamis';
    } else if ($nday == 5) {
        $hari = 'Jumat';
    } else if ($nday == 6) {
        $hari = 'Sabtu';
    }
    return $hari;
}
?>