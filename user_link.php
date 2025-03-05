<?php require_once('session.php');
if ($username) {
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
}
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
                                <h3>Data Karyawan</h3>
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <!-- <a href="#" data-target="addUser"
                                                class="toggle btn btn-primary btn-reset"><em
                                                    class="icon ni ni-plus"></em><span>Add Karyawan</span></a> -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <!-- <div class="col-md-12 col-lg-12 col-xxl-12"> -->
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <!-- <div class="preview-block"> -->
                                            <table class="datatable-init-export_action1asc wrap table" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>No.ID</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Divisi</th>
                                                        <th>Posisi</th>
                                                        <th>Tgl Bergabung</th>
                                                        <th>Kontrak</th>
                                                        <th>Status</th>
                                                        <th>NPWP</th>
                                                        <th>Telp</th>
                                                        <th>Email</th>
                                                        <th>Alamat</th>
                                                        <th>Agama</th>
                                                        <th>Status Pernikahan</th>
                                                        <th>Tempat / Tgl.Lahir</th>
                                                        <th>Pendidikan</th>
                                                        <th>Pengalaman</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sno = 0;

                                                    $query1 = "SELECT * FROM user ORDER BY id_user DESC";
                                                    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                    while ($row1 = mysqli_fetch_array($result1)) {

                                                        $sno++;
                                                    ?>
                                                        <tr>
                                                            <td class="nk-tb-col">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-left">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li>
                                                                            <a href="#" onclick="user_qr('<?= $row1['nama_user']; ?>', '<?= $row1['telp_user']; ?>', '<?= $row1['email_user']; ?>', '<?= $row1['posisi_user']; ?>')" class="toggle"><em class="icon ni ni-qr"></em><span>QR
                                                                                    Code</span></a>
                                                                        </li>
                                                                        <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'HRGA')) { ?>
                                                                            <li>
                                                                                <a href="#" id="<?= $row1['id_user']; ?>" data-target="addUser" data-dismiss="modal" class="toggle btn-edit"><em class="icon ni ni-edit-fill"></em><span>Edit
                                                                                        User</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#" id="<?= $row1['id_user']; ?>" class="toggle btn-delete"><em class="icon ni ni-trash-fill"></em><span>Delete
                                                                                        User</span></a>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </td>

                                                            <td class="nk-tb-col"><?= $row1['username']; ?></td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar bg-white d-none d-sm-flex">
                                                                        <?php if ($row1['foto_user'] != '') {
                                                                        ?>
                                                                            <img width="40px" height="40px" src="./images/user/<?= $row1['foto_user']; ?>">
                                                                        <?php } else { ?>
                                                                            <img src="./images/user/0.png">
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <span class="text-dark text-capitalize"><strong><?= $row1['nama_user']; ?></strong></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col text-capitalize">
                                                                <?= $row1['divisi_user']; ?>
                                                            </td>
                                                            <td class="nk tb-col text-capitalize">
                                                                <?= $row1['posisi_user']; ?>
                                                            </td>
                                                            <td class="nk-tb-col"><?= date_format(date_create($row1['join_user']), 'd F Y'); ?></td>

                                                            <?php if ($row1['status_kontrak'] == 'Internal') { ?>
                                                                <td><span class="badge badge-pill badge-success"><?= $row1['status_kontrak']; ?></span></td>
                                                            <?php } else { ?>
                                                                <td> <span class="badge badge-pill badge-warning"><?= $row1['status_kontrak']; ?></span></td>
                                                            <?php } ?>

                                                            <?php if ($row1['status_user'] == 'Aktif') { ?>
                                                                <td><span class="badge badge-dot badge-success"><?= $row1['status_user']; ?></span></td>
                                                            <?php } else { ?>
                                                                <td> <span class="badge badge-dot badge-danger"><?= $row1['status_user']; ?></span></td>
                                                            <?php } ?>

                                                            <!-- <td class="nk-tb-col text-success">
                                                                <?= $row1['status_user']; ?>
                                                            </td> -->
                                                            <td class="nk-tb-col text-capitalize">
                                                                <?= $row1['npwp_user']; ?>
                                                            </td>
                                                            <td class="nk-tb-col text-capitalize">
                                                                <?= $row1['telp_user']; ?>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <?= $row1['email_user']; ?>
                                                            </td>
                                                            <td class="nk-tb-col text-capitalize">
                                                                <?= $row1['alamat_user']; ?>
                                                            </td>
                                                            <td class="nk-tb-col text-capitalize">
                                                                <?= $row1['agama_user']; ?>
                                                            </td>
                                                            <td class="nk-tb-col text-capitalize">
                                                                <?= $row1['status_pernikahan']; ?>
                                                            </td>
                                                            <td class="nk-tb-col text-capitalize">
                                                                <?= $row1['tempat_lahir'] . ' / ' . date_format(date_create($row1['tgl_lahir']), 'd F Y'); ?>
                                                            </td>
                                                            <td class="nk-tb-col text-success">
                                                                <?= $row1['pendidikan_user']; ?>
                                                            </td>
                                                            <td class="nk-tb-col text-success">
                                                                <?= $row1['pengalaman_user']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <!-- </div> -->
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <!-- </div> -->
                                </div> <!-- nk-block -->


                                <!-- add  -->
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addUser" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Edit Karyawan</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Perubahan data karyawan.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name" value="add_user" />
                                            <input type="hidden" id="id_user" name="id_user" value="0" />
                                            <input type="hidden" id="username" name="username" value="" />

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="divisi_user">Pilih
                                                            Divisi:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="divisi_user" name="divisi_user" required>
                                                                    <option value="">--- Pilih Divisi ---</option>
                                                                    <option value="GM">Direktur / GM</option>
                                                                    <option value="Manager">Manager</option>
                                                                    <option value="Staff">Staff</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="posisi_user">Pilih
                                                            Posisi:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="posisi_user" name="posisi_user" required>
                                                                    <option value="">--- Pilih Posisi ---</option>
                                                                    <option value="GM">Direktur / GM</option>
                                                                    <option value="PJ Teknis">PJ Teknis</option>
                                                                    <option value="PJ Mutu">PJ Mutu</option>
                                                                    <option value="Penyelia">Penyelia</option>
                                                                    <option value="Teknisi">Teknisi</option>
                                                                    <option value="Admin Teknis">Admin Teknis</option>
                                                                    <option value="Admin Umum">Admin Umum</option>
                                                                    <option value="Finance">Finance / Accounting
                                                                    </option>
                                                                    <option value="Marketing">Marketing</option>
                                                                    <option value="HRGA">HRGA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="join_user">Tgl.Join</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="join_user" name="join_user" required>
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="status_user">Status
                                                            Kepegawaian:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="status_user" name="status_user" required>
                                                                    <option value="">--- Pilih Status ---</option>
                                                                    <option value="Aktif">Aktif</option>
                                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="status_kontrak">Status
                                                            Kontrak:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="status_kontrak" name="status_kontrak" required>
                                                                    <option value="">--- Pilih Status ---</option>
                                                                    <option value="Internal">Internal</option>
                                                                    <option value="Eksternal">Eksternal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- //////////////////////////////////////////////////////////////////// -->

                                                <!-- 
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="username">ID Karyawan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="username"
                                                                name="username" placeholder="ID karyawan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nama_user">Nama Lengkap</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="nama_user"
                                                                name="nama_user" placeholder="Nama Lengkap">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="divisi_user">Pilih
                                                            Divisi:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="divisi_user"
                                                                    name="divisi_user" required>
                                                                    <option value="">--- Pilih Divisi ---</option>
                                                                    <option value="GM">Direktur / GM</option>
                                                                    <option value="Manager">Manager</option>
                                                                    <option value="Staff">Staff</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="posisi_user">Pilih
                                                            Posisi:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="posisi_user"
                                                                    name="posisi_user" required>
                                                                    <option value="">--- Pilih Posisi ---</option>
                                                                    <option value="PJ Teknis">PJ Teknis</option>
                                                                    <option value="PJ Mutu">PJ Mutu</option>
                                                                    <option value="Penyelia">Penyelia</option>
                                                                    <option value="Teknisi">Teknisi</option>
                                                                    <option value="Admin Teknis">Admin Teknis</option>
                                                                    <option value="Admin Umum">Admin Umum</option>
                                                                    <option value="Finance">Finance / Accounting
                                                                    </option>
                                                                    <option value="Marketing">Marketing</option>
                                                                    <option value="HRGA">HRGA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="telp_user">Telp</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="telp_user"
                                                                name="telp_user" placeholder="Telp">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="email_user">Email</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="email_user"
                                                                name="email_user" placeholder="Email">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="join_user">Tgl.Join</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd" id="join_user"
                                                                name="join_user" required>
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tgl_lahir">Tgl.Lahir</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd" id="tgl_lahir"
                                                                name="tgl_lahir">
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tempat_lahir">Tempat
                                                            Lahir</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="tempat_lahir"
                                                                name="tempat_lahir" placeholder="Tempat Lahir">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="alamat_user">Alamat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="alamat_user"
                                                                name="alamat_user" placeholder="Alamat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="npwp_user">NPWP</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="npwp_user"
                                                                name="npwp_user" placeholder="NPWP">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="agama_user">Agama:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="agama_user"
                                                                    name="agama_user">
                                                                    <option value="">--- Pilih Agama ---</option>
                                                                    <option value="Islam">Islam</option>
                                                                    <option value="Protestan">Protestan</option>
                                                                    <option value="Katolik">Katolik</option>
                                                                    <option value="Hindu">Hindu</option>
                                                                    <option value="Buddha">Buddha</option>
                                                                    <option value="Konghucu">Konghucu</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="status_pernikahan">Status
                                                            Pernikahan:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="status_pernikahan"
                                                                    name="status_pernikahan">
                                                                    <option value="">--- Pilih Status ---</option>
                                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                                    <option value="Kawin Tercatat">Kawin Tercatat
                                                                    </option>
                                                                    <option value="Kawin Belum Tercatat">Kawin Belum
                                                                        Tercatat</option>
                                                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                                                    <option value="Cerai Mati">Cerai Mati</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->


                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-form-action btn-submit"><em class="icon ni ni-plus"></em><span>Simpan</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- .nk-block -->
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
            document.title = 'Data User';

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $(document).on('click', '.btn-reset', function(ev) {
                ev.preventDefault();
                $("#form_name").val("add_user");
                $("#id_user").val('');
                $("#join_user").val('');
                $("#divisi_user").val('');
                $("#posisi_user").val('');
                $("#status_user").val('');
                $("#status_kontrak").val('');
                $("#username").val('');
            });

            $(document).on('click', '.btn-submit', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);

                if ($("#hl_form").valid() == true) {
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
                                    '<span>Simpan</span>'
                                );
                                Swal.fire({
                                    icon: "success",
                                    title: "Data telah tersimpan.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                // $('.btn-reset').click();
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
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_user_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        // console.log(result);
                        $("#form_name").val("edit_user");
                        $("#id_user").val(result['id_user']);
                        $("#divisi_user").val(result['divisi_user']);
                        $("#posisi_user").val(result['posisi_user']);
                        $("#join_user").val(result['join_user']);
                        $("#status_user").val(result['status_user']);
                        $("#status_kontrak").val(result['status_kontrak']);
                        $("#username").val(result['username']);
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            });

            $(document).on('click', '.btn-delete', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang terhapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus data!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "del_user",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Data telah terhapus.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Data gagal terhapus.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Data gagal terhapus.",
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

        function user_qr(nama, tlp, email, posisi) {
            window.qrcode = new QrCodeWithLogo({
                content: 'BEGIN:VCARD\r\nVERSION:3.0\r\nFN:' + nama + '\r\nTEL;HOME;VOICE:' + tlp + '\r\nEMAIL:' +
                    email + '\r\nORG:PT. Elektromedika Instrumen Tera Nusantara\r\nTITLE:' + posisi +
                    '\r\nEND:VCARD',
                width: 380,
                logo: {
                    src: "./images/img/ens10.png",
                    logoSize: 0.2,
                    borderRadius: 100
                },
                // nodeQrCodeOptions: {
                // 	errorCorrectionLevel: "H"
                // }
            });
            qrcode.downloadImage(nama + '_' + posisi + '.png');
        }
    </script>

</body>

</html>