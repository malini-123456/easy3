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
    $proyekStatus = $row0['status_proyek'];

    $idpelanggan = $row0['id_pelanggan'];
    $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_assoc($result1);

    // if (($row0['status_proyek'] == 9) || ($row0['status_proyek'] == 10)) {          // status batal atau selesai ini balik ke home
    //     header("location:home");
    // } else {
    //     $idpelanggan = $row0['id_pelanggan'];
    //     $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
    //     $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    //     $row1 = mysqli_fetch_assoc($result1);

    //     $status_proyek = $row0['status_proyek'];
    //     $query2 = "SELECT * FROM status_proyek WHERE id_status = '$status_proyek'";
    //     $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    //     $row2 = mysqli_fetch_assoc($result2);
    // }
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

                <?php include "./header.php" ?>

                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div>
                                    <ul class="nav nav-tabs nav-tabs-s2">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#" onclick="home()">CREATE ACCOUNT</a>
                                        </li>
                                        <li class=" nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="insiturev()">E-SERTIFIKAT</a>
                                        </li>
                                        <li class=" nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="eksiturev()">SUBKON</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="nk-block nk-nk-block-between">
                                            <div class="row g-gs">
                                                <div class="col-6">
                                                    <div class="card h-100">
                                                        <div class="d-flex bg-indigo text-white">
                                                            <div class="p-2 flex-grow-1">
                                                                <h6>DETAIL PROJECT</h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner">
                                                            <dl class="row">
                                                                <dt class="col-sm-5">Kode Proyek</dt>
                                                                <dd class="col-sm-7"><?= $row0['no_proyek']; ?>
                                                                </dd>
                                                                <dt class="col-sm-5">Nama Pelanggan</dt>
                                                                <dd class="col-sm-7"><?= $row1['nama_pelanggan']; ?>
                                                                </dd>
                                                                <dt class="col-sm-5">Nama Pemilik Sertifikat</dt>
                                                                <dd class="col-sm-7">
                                                                    <?= $row0['namapemilik_proyek']; ?></dd>
                                                                <dt class="col-sm-5">Jumlah Alat Realisasi</dt>
                                                                <dd class="col-sm-7 text-danger"><strong>tolong benerin ya seyeng</strong>
                                                                </dd>
                                                            </dl>
                                                            <!-- <div class="d-flex flex-row-reverse">
                                                                    <a href="#" id="<?= $idpelanggan; ?>" data-target="addPelanggan" data-dismiss="modal" class="toggle btn btn-editPel btn-info"><em class="icon ni ni-edit-fill"></em><span>Edit Pelanggan</span></a>
                                                                </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <div class="d-flex bg-indigo text-white">
                                                            <div class="p-2 flex-grow-1">
                                                                <h6>CREATE ACCOUNT</h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner">
                                                            <div class="row g-3 align-center">
                                                                <div class="col-5">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Username</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Password</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary btn-form-action"><span>Simpan</span></button>
                                                            <a href="#" class="btn btn-danger btn-form-action btn-reset">Clear</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- nk block -->
                                        <div class="nk-block nk-block-lg">
                                            <div class="card">
                                                <div class="card-header bg-teal text-white">
                                                    <h6>E-SERTIFIKAT</h6>
                                                </div>
                                                <div class="card-inner">
                                                    KAYAK SIRIS PLEK AJA
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-block nk-block-lg">
                                            <div class="card">
                                                <div class="card-header bg-pink text-white">
                                                    <h6>SUBKON</h6>
                                                </div>
                                                <div class="card-inner">
                                                    KAYAK SIRIS PLEK AJA
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- EDIT PROYEK  -->
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProyek" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Proyek Baru</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi proyek baru.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name" value="add_proyek" />
                                            <input type="hidden" id="id_proyek" name="id_proyek" value="0" />
                                            <input type="hidden" id="nama_pelanggan2" name="nama_pelanggan2" value="0" />

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="no_proyek">Nomor proyek</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="no_proyek" name="no_proyek" placeholder="No proyek" readonly />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="id_pelanggan">Pilih
                                                            Pelanggan</label>
                                                        <div class="form-control-wrap ">
                                                            <select class="form-control form-control-lg form-select" data-search="on" id="id_pelanggan" name="id_pelanggan" required data-msg="Mohon pilih pelanggan">
                                                                <?php
                                                                require_once('connect.php');
                                                                $sql = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama_pelanggan ASC");
                                                                echo "<option value=''>-- Pelanggan --</option>";
                                                                while ($row = $sql->fetch_assoc()) {
                                                                    echo "<option value=" . $row['id_pelanggan'] . ">" . $row['nama_pelanggan'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="id_pelanggan">Pilih
                                                            Pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="id_pelanggan"
                                                                    name="id_pelanggan" required
                                                                    data-msg="Mohon pilih instansi">
                                                                    <?php
                                                                    require_once('connect.php');
                                                                    $sql = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama_pelanggan ASC");
                                                                    echo "<option value=''>-- Pelanggan --</option>";
                                                                    while ($row = $sql->fetch_assoc()) {
                                                                        echo "<option value=" . $row['id_pelanggan'] . ">" . $row['nama_pelanggan'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tglorder_proyek">Tanggal
                                                            Order</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker invalid" data-date-format="yyyy-mm-dd" id="tglorder_proyek" name="tglorder_proyek" required data-msg="Mohon isi tglorder proyek">
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="marketing_proyek">Marketing
                                                            Proyek</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="marketing_proyek" name="marketing_proyek" placeholder="Marketing proyek" required data-msg="Mohon isi marketing proyek">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="namapemilik_proyek">Nama Pemilik
                                                            Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="namapemilik_proyek" name="namapemilik_proyek" placeholder="Nama Pemilik Sertifikat" required data-msg="Mohon isi Nama Pemilik Sertifikat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="alamatpemilik_proyek">Alamat
                                                            Pemilik Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="alamatpemilik_proyek" name="alamatpemilik_proyek" placeholder="Alamat Pemilik Sertifikat" required data-msg="Mohon isi Alamat Pemilik Sertifikat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="permohonan_proyek">Permohonan Diterima Melalui</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="permohonan_proyek" name="permohonan_proyek" placeholder="Permohonan Diterima Melalui" required data-msg="Mohon isi Permohonan Diterima Melalui">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="catatan_proyek">Catatan
                                                            Proyek</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="catatan_proyek" name="catatan_proyek" placeholder="Mohon isi catatan proyek" required data-msg="Mohon isi Permohonan Diterima Melalui">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="insitu_proyek">Realisasi Insitu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="insitu_proyek" name="insitu_proyek" placeholder="Realisasi Insitu">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="insitu_progres_proyek">Catatan
                                                            Insitu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="insitu_progres_proyek" name="insitu_progres_proyek" placeholder="Catatan Insitu">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="eksitu_proyek">Realisasi eksitu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="eksitu_proyek" name="eksitu_proyek" placeholder="Realisasi eksitu">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="eksitu_progres_proyek">Catatan
                                                            eksitu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="eksitu_progres_proyek" name="eksitu_progres_proyek" placeholder="Catatan eksitu">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="subkon_proyek">Realisasi subkon</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="subkon_proyek" name="subkon_proyek" placeholder="Realisasi subkon">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="subkon_progres_proyek">Catatan
                                                            subkon</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="subkon_progres_proyek" name="subkon_progres_proyek" placeholder="Catatan subkon">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-form-action btn-submit"><em class="icon ni ni-plus"></em><span>Simpan</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- .nk-block -->
                                </div>

                                <!-- EDIT PELANGGAN -->
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addPelanggan" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Pelanggan Baru</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi pelanggan baru.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_formPel" name="hl_formPel" class="form-validate is-alter" novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name" value="edit_pelanggan" />
                                            <input type="hidden" id="id_pelanggan" name="id_pelanggan" value=<?= "$idpelanggan"; ?> />

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nama_pelanggan">Nama Pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required data-msg="Mohon isi nama pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="alamat_pelanggan">Alamat pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-map-pin"></em>
                                                            </div>
                                                            <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" placeholder="Alamat pelanggan" required data-msg="Mohon isi alamat pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kontak_pelanggan">Kontak pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="kontak_pelanggan" name="kontak_pelanggan" placeholder="Kontak pelanggan" required data-msg="Mohon isi kontak pelanggan">
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <!-- <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kategori_pelanggan">Pilih
                                                            Kategori:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="kategori_pelanggan" name="kategori_pelanggan">
                                                                    <option value="Instansi Pemerintah">Instansi
                                                                        Pemerintah</option>
                                                                    <option value="Dinas Kesehatan">Dinas Kesehatan
                                                                    </option>
                                                                    <option value="RS Pemerintah">RS Pemerintah</option>
                                                                    <option value="RS Swasta">RS Swasta</option>
                                                                    <option value="Puskesmas">Puskesmas</option>
                                                                    <option value="General">General</option>
                                                                    <option value="Klinik">Klinik</option>
                                                                    <option value="Nakes">Nakes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="npwp_pelanggan">NPWP
                                                            pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="npwp_pelanggan" name="npwp_pelanggan" placeholder="NPWP pelanggan" required data-msg="Mohon isi NPWP pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="namanpwp_pelanggan">Nama NPWP
                                                            pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="namanpwp_pelanggan" name="namanpwp_pelanggan" placeholder="Nama NPWP pelanggan" required data-msg="Mohon isi nama NPWP pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="keuangan_pelanggan">PIC Keuangan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="keuangan_pelanggan" name="keuangan_pelanggan" placeholder="PIC Keuangan" required data-msg="Mohon isi PIC Keuangan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="teknis_pelanggan">PIC Teknis</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="teknis_pelanggan" name="teknis_pelanggan" placeholder="PIC Teknis" required data-msg="Mohon isi PIC Teknis">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="logo_pelanggan">Logo
                                                            pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="logo_pelanggan" name="logo_pelanggan" placeholder="Logo pelanggan">
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="catatan_pelanggan">Karakteristik
                                                            pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control" id="catatan_pelanggan" name="catatan_pelanggan"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-form-action btn-submitPel"><em class="icon ni ni-plus"></em><span>Simpan</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- .nk-block -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @s -->
                <?php include "./footer.html" ?>
                <!-- footer @e -->
            </div>
            <!-- content @e -->

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
            document.title = 'DP Revisi ' + '<?= $row0['no_proyek']; ?>';

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $(document).on('click', '.btn-submitPel', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);

                if ($("#hl_formPel").valid() == true) {
                    // btn_button.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                    // btn_button.attr("disabled", true);

                    var form_data = new FormData($('#hl_formPel')[0]);
                    // var form_data = $("#hl_form").serialize();
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
                                    '<em class="icon ni ni-plus"></em><span>Simpan</span>'
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

            $(document).on('click', '.btn-editPel', function(ev) {
                ev.preventDefault();

                // $('.nk-body').addClass('toggle-shown');
                // $('.nk-add-pelanggan').addClass('content-active');
                // $('.nk-content-body').append('<div class="toggle-overlay" data-target="addPelanggan"></div>');
                $('.productTitle').text('Edit pelanggan');
                $('.productDes').html('<p>Edit pelanggan.</p>');

                // var btn_button = $(this);
                // btn_button.html('<i class="fas fa-spinner fa-spin"></i>');
                var tbl_id = $(this).attr("id");

                console.log('ID=' + tbl_id);

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_pelanggan_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        // btn_button.html(
                        //     '<em class="icon ni ni-edit"></em><span>Edit pelanggan</span>'
                        // );
                        console.log(result);
                        // $("#form_name").val("edit_pelanggan");
                        // $("#id_pelanggan").val(result['id_pelanggan']);
                        $("#nama_pelanggan").val(result['nama_pelanggan']);
                        $("#alamat_pelanggan").val(result['alamat_pelanggan']);
                        // $("#kontak_pelanggan").val(result['kontak_pelanggan']);
                        // $("#kategori_pelanggan").val(result['kategori_pelanggan']);
                        $("#npwp_pelanggan").val(result['npwp_pelanggan']);
                        $("#namanpwp_pelanggan").val(result['namanpwp_pelanggan']);
                        $("#keuangan_pelanggan").val(result['keuangan_pelanggan']);
                        $("#teknis_pelanggan").val(result['teknis_pelanggan']);
                        // $("#logo_pelanggan").val(result['logo_pelanggan']);
                        $("#catatan_pelanggan").val(result['catatan_pelanggan']);
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            });

            $(document).on('click', '.btn-submit', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);

                if ($("#hl_form").valid() == true) {
                    // btn_button.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                    // btn_button.attr("disabled", true);

                    var form_data = new FormData($('#hl_form')[0]);
                    // var form_data = $("#hl_form").serialize();
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
                                    '<em class="icon ni ni-plus"></em><span>Simpan</span>'
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

            $(document).on('click', '.btn-edit', function(ev) {
                console.log('EDIT-DATA');
                ev.preventDefault();

                // $('.nk-body').addClass('toggle-shown');
                // $('.nk-add-proyek').addClass('content-active');
                // $('.nk-content-body').append('<div class="toggle-overlay" data-target="addProyek"></div>');
                $('.productTitle').text('Edit Proyek');
                $('.productDes').html('<p>Edit proyek.</p>');

                // var btn_button = $(this);
                // btn_button.html('<i class="fas fa-spinner fa-spin"></i>');
                var tbl_id = $(this).attr("id");

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_proyek_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        // btn_button.html(
                        //     '<em class="icon ni ni-edit"></em><span>Edit Proyek</span>'
                        // );
                        console.log(result);
                        $("#form_name").val("edit_proyek");
                        $("#id_proyek").val(result['id_proyek']);
                        $("#no_proyek").val(result['no_proyek']);
                        $("#id_pelanggan").val(result['id_pelanggan']);
                        $("#tglorder_proyek").val(result['tglorder_proyek']);
                        $("#marketing_proyek").val(result['marketing_proyek']);
                        $("#namapemilik_proyek").val(result['namapemilik_proyek']);
                        $("#alamatpemilik_proyek").val(result['alamatpemilik_proyek']);
                        $("#permohonan_proyek").val(result['permohonan_proyek']);
                        $("#catatan_proyek").val(result['catatan_proyek']);

                        $("#insitu_proyek").val(result['insitu_proyek']);
                        $("#insitu_progres_proyek").val(result['insitu_progres_proyek']);
                        $("#eksitu_proyek").val(result['eksitu_proyek']);
                        $("#eksitu_progres_proyek").val(result['eksitu_progres_proyek']);
                        $("#subkon_proyek").val(result['subkon_proyek']);
                        $("#subkon_progres_proyek").val(result['subkon_progres_proyek']);
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            });

            $(document).on('click', '.btn-add', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);
                console.log($(".select2-search__field").val());

                $("#form_name").val("add_pelanggan2");
                $("#nama_pelanggan2").val($(".select2-search__field").val());

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
            });

            $('#id_pelanggan').select2({
                closeOnSelect: false,
                allowClear: true,
                placeholder: "Pilih Pelanggan",
                escapeMarkup: function(markup) {
                    return markup;
                },
                language: {
                    noResults: function() {
                        return "Data tidak ditemukan. <a href='#' class='toggle btn btn-primary btn-add'><span>Add Pelanggan</span></a>";
                        // return $("<a href='http://google.com/'>Add</a>");
                    }
                }
            });

            cekDark();
        });


        function proyekdetail_rev(uid) {
            let link = 'proyekrev_detail?uid=' + uid;
            window.open(link, '_self');
        }

        function kajiulang_rev(uid) {
            let link = 'kajiulangrev?uid=' + uid;
            window.open(link, '_self');
        }

        function jadwal_rev(uid) {
            let link = 'jadwalrev?uid=' + uid;
            window.open(link, '_self');
        }

        function berkasteknisi_rev(uid) {
            let link = 'berkasteknisirev?uid=' + uid;
            window.open(link, '_self');
        }
    </script>

</body>

</html>