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
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="proyekdetail_rev(<?= $proyekid; ?>)">PROJECT DETAIL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="kajiulang_rev(<?= $proyekid; ?>)">KAJI ULANG PERMINTAAN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="jadwal_rev(<?= $proyekid; ?>)">JADWAL PEKERJAAN DAN
                                                AKOMODASI</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="berkasteknisi_rev(<?= $proyekid; ?>)">PEMINJAMAN
                                                KALIBRATOR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#" onclick="sertifikat_rev(<?= $proyekid; ?>)">SERTIFIKAT</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="d-flex border border-primary bg-white">
                                                <div class="p-2 flex-grow-1">
                                                    <h5><?= $row1['nama_pelanggan'] . ' | ' . $row0['namapemilik_proyek']; ?></h5>
                                                </div>
                                                <div class="p-2">
                                                    <h5><?= '#' . $row0['no_proyek']; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" tab-content">
                                            <div class="tab-pane active" id="tabItem10">
                                                <div class="nk-block nk-block-lg">
                                                    <div class="nk-block">
                                                        <div class="d-flex left-content-around">
                                                            <a href="#" onclick="esertifikat_pdf(<?= $proyekid; ?>)" class="btn btn-round btn-dim btn-outline-info"><em class="icon ni ni-printer-fill"></em><span>BAST Sertifikat</span>
                                                            </a>&emsp;
                                                            <a href="#" onclick="lampiran_pdf(<?= $proyekid; ?>)" class="btn btn-round btn-dim btn-outline-info"><em class="icon ni ni-printer-fill"></em><span>Lampiran</span>
                                                            </a>
															<button class="ml-auto p-2 btn btn-round btn-warning" data-toggle="modal" data-target="#Tutorial">Tutorial</button>
                                                        </div>
                                                    </div>

                                                    <div class="nk-block">
                                                        <div class="card card-preview">
                                                            <div class="card-header bg-teal text-white">
                                                                <h6>UPLOAD FILES</h6>
                                                            </div>

                                                            <!-- ////////////////////////////////////////////////////// -->


                                                            <div class="card-inner">
                                                                <div class="preview-block">
                                                                    <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                                                        <input type="hidden" id="form_name" name="form_name" value="import_xls_sertifikat" />
                                                                        <input type="hidden" id="id_sertifikat" name="id_sertifikat" value="0" />
                                                                        <input type="hidden" id="id_proyek" name="id_proyek" value="<?= $proyekid; ?>" />
                                                                        <!-- value="<?= $row0['id_proyek']; ?>" -->
                                                                        <div class="success-alert">
                                                                            <div class="alert alert-success alert-icon" style="display: none" role="alert">
                                                                                <em class="icon ni ni-check-circle"></em>
                                                                                <strong> Success ! </strong> Data saved successfully.
                                                                            </div>
                                                                        </div>
                                                                        <div class="failed-alert">
                                                                            <div class="alert alert-danger alert-icon" style="display: none" role="alert">
                                                                                <em class="icon ni ni-cross-circle"></em>
                                                                                <strong> Note ! </strong> Data saving failed.
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <strong>Mohon gunakan format file XLS yang telah
                                                                                disediakan : </strong>
                                                                            <button type="button" class="btn btn-round btn-dim btn-outline-success btn-download" title="CSV File" onclick="formatXLS()">
                                                                                <em class="icon ni ni-download"></em><em class="icon ni ni-file-xls"></em>
                                                                            </button>
                                                                        </div>
                                                                        <div class="row gy-4">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Laporan Sertifikat</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <!-- <input type="file" class="custom-file-input invalid" id="nama_file" name="nama_file" /> -->
                                                                                            <input type="file" class="custom-file-input invalid" id="nama_file" name="nama_file" onchange="updateFile2()" data-msg="Mohon upload file xls" />
                                                                                            <label class="custom-file-label" for="nama_file">Choose file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label text-danger">E-sertifikat (BLM NGERTI SISTEM api NYA KEK GIMANA)</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input type="file" class="custom-file-input" id="customFile">
                                                                                            <label class="custom-file-label" for="customFile">Choose files</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->

                                                                            <div class="col-12">
                                                                                <button class="btn btn-primary btn-form-action btn-submit btn-submit-import"><span>Upload</span></button>
                                                                                <!-- <a href="#" class="btn btn-danger btn-form-action btn-reset">Upload</a> -->
                                                                            </div>
                                                                        </div>


                                                                    </form>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="nk-block">
                                                    <div class="card">
                                                        <div class="card-header bg-primary text-white">
                                                            <h6>E-SERTIFIKAT</h6>
                                                        </div>
                                                        <div class="card-inner">
                                                            <div class="preview-block">
                                                                <table class="datatable-init-export_action1asc nowrap table" data-export-title="Export">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Action</th>
                                                                            <th>No.</th>
                                                                            <th>Kode Stiker</th>
                                                                            <th>No. Sertifikat</th>
                                                                            <th>Nama Alat</th>
                                                                            <th>Merek</th>
                                                                            <th>Tipe</th>
                                                                            <th>No.Seri</th>
                                                                            <th>Ruangan</th>
                                                                            <th>Penguji</th>
                                                                            <th>Hasil</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $sno = 0;
                                                                        $query = "SELECT * FROM sertifikat WHERE id_proyek = '$proyekid' ORDER BY id_sertifikat ASC";
                                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                            $pdfName = 'data/pdf/' . $row['kode_stiker_sertifikat'] . '.pdf';
                                                                            $sno++;
                                                                        ?>
                                                                            <tr>
                                                                                <!-- <td>
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-left">
                                                                                        <ul class="link-list-opt no-bdr">
                                                                                            <li>
                                                                                                <a href="#" id="<?= $row['id_sertifikat']; ?>" data-target="addSertifikat" data-dismiss="modal" class="toggle btn-edit"><em class="icon ni ni-edit-fill"></em><span>Edit Sertifikat</span></a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" id="<?= $row['id_sertifikat']; ?>" class="toggle btn-delete"><em class="icon ni ni-trash-fill"></em><span>Delete Sertifikat</span></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </td> -->
                                                                                <td>
                                                                                    <a href="#" id="<?= $row['id_sertifikat']; ?>" class="btn btn-icon btn-trigger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Delete"><em class="icon ni ni-trash-fill"></em></a>
                                                                                </td>
                                                                                <td><?= $sno; ?></td>
                                                                                <td><?= $row['kode_stiker_sertifikat']; ?></td>
                                                                                <td><?= $row['no_sertifikat']; ?></td>
                                                                                <td><?= $row['nama_alat_sertifikat']; ?></td>
                                                                                <td><?= $row['merek_sertifikat']; ?></td>
                                                                                <td><?= $row['tipe_sertifikat']; ?></td>
                                                                                <td><?= $row['no_seri_sertifikat']; ?></td>
                                                                                <td><?= $row['ruangan_sertifikat']; ?></td>
                                                                                <td><?= $row['penguji_sertifikat']; ?></td>

                                                                                <?php if ($row['kode_stiker_sertifikat'][0] == 'H') { ?>
                                                                                    <td><?= 'LAIK'; ?></td>
                                                                                <?php } else { ?>
                                                                                    <td><?= 'TIDAK LAIK'; ?></td>
                                                                                <?php } ?>

                                                                                <?php if (file_exists($pdfName)) { ?>
                                                                                    <td><a href="<?= $pdfName; ?>" target="_blank" class="toogle"><span>TERBIT</span></a></td>
                                                                                <?php } else { ?>
                                                                                    <td><?= 'BELUM TERBIT'; ?></td>
                                                                                <?php } ?>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div><!-- .card-inner -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addSertifikat" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Pelanggan Baru</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi pelanggan baru.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name" value="edit_sertifikat" />
                                            <input type="hidden" id="id_sertifikat" name="id_sertifikat" value="0" />
                                            <input type="hidden" id="id_proyek" name="id_proyek" value="0" />

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kode_stiker_sertifikat">Kode Stiker</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="kode_stiker_sertifikat" name="kode_stiker_sertifikat" placeholder="Kode Stiker" required data-msg="Mohon isi kode stiker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="no_sertifikat">No Stiker</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="no_sertifikat" name="no_sertifikat" placeholder="No Stiker" required data-msg="Mohon isi No stiker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nama_alat_sertifikat">Nama Alat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="nama_alat_sertifikat" name="nama_alat_sertifikat" placeholder="Nama Alat" required data-msg="Mohon isi Nama Alat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="merek_sertifikat">Merek Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="merek_sertifikat" name="merek_sertifikat" placeholder="Merek Sertifikat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tipe_sertifikat">Tipe Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="tipe_sertifikat" name="tipe_sertifikat" placeholder="Tipe Sertifikat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="no_seri_sertifikat">No Seri Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="no_seri_sertifikat" name="no_seri_sertifikat" placeholder="No Seri Sertifikat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="ruangan_sertifikat">Ruangan Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="ruangan_sertifikat" name="ruangan_sertifikat" placeholder="Ruangan Sertifikat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="penguji_sertifikat">Penguji Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="penguji_sertifikat" name="penguji_sertifikat" placeholder="Penguji Sertifikat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-form-action btn-submit"><em class="icon ni ni-plus"></em><span>Simpan</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php include "./footer.html" ?>
            </div>
            <!-- content @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
    </div>
    <!-- app-root @e -->
	
	
	<!--Modal-->
    <div class="modal fade" tabindex="-1" id="Tutorial" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tutorial</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="entry">
                        <p>1. Pilih <strong>Proyek ON-GOING</strong> yang akan ditambahkan rekapan sertifikatnya, lalu klik/download <STRONG>format csvnya (PENTING: dilarang mengubah extention file ini)</STRONG></p>
                        <p>2. Buka file yg barusan didownload,</p>
                        <ul class="list list-download">
                            <li>Kode Stiker : sesuaikan dengan stiker yang ditempel pada alat terkalibrasi (M/Hxxxxxx), <span class="text-success">H (hijau/laik)</span>, <span class="text-danger">M (merah/tidak laik)</span> diikuti dengan 6 digit angka;</li>
                            <li>No. Sertifikat, Nama Alat, Merek, Tipe, No. Seri, Ruangan, Penguji semua copy aja ya dari buku induk</li>
                            <li>Hasil : TERISI OTOMATIS SESUAI KODE STIKER (kode stiker harus bangeeet ikut cara penulisan seperti di atas);</li>
                            <li>Status : TERISI OTOMATIS DARI nama file yang diupload di e-certicate <strong>(maka dari itu harus matching)</strong></li>
                        </ul>
                        <p>3. Jangan lupa <strong>Save</strong> lalu kembali ke browser</p>
                        <p>4. Klik <strong>Choose File</strong>,lalu pilih file csv yg tadi. Klik <strong>Open</strong>, tunggu sebentar untuk loading, lalu <strong></strong></p>
                        <p>5. Proses selesai, periksa kelengkapan data. pastikan tidak ada yg ketinggalan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
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

            $(document).on('click', '.btn-submit-import', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);

                if ($("#hl_form").valid() == true) {
                    btn_button.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                    btn_button.attr("disabled", true);

                    var form_data = new FormData($('#hl_form')[0]);
                    if ($("#form_name").val() == "import_xls_sertifikat") {
                        // alert('import');
                        var file_data = $('#nama_file').prop('files')[0];
                        form_data.append("file", file_data);
                    }
                    $.ajax({
                        type: 'POST',
                        url: 'save_details.php',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data, status) {
                            if (data == '1') {
                                // alert("Data: " + data + "\nStatus: " + status);
                                $(".alert-danger").hide();
                                $(".alert-success").fadeIn(800);
                                btn_button.html('<i class="fas fa-check-circle"></i> Done');
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                // alert("Data: " + data + "\nStatus: " + status);
                                $(".alert-success").hide();
                                $(".alert-danger").fadeIn(800);
                                console.log(data);
                                // btn_button.html('Import').attr("disabled", false);
                            }
                        },
                        error: function(xhr, resp, text) {
                            console.log(xhr, resp, text);
                        }
                    });
                }
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
                            form_name: "del_sertifikat",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            if (data == '1') {
                                Swal.fire({
                                    icon: "success",
                                    title: "Data telah terhapus.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
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


            // $(document).on('click', '.btn-submit', function(ev) {
            //     ev.preventDefault();
            //     var btn_button = $(this);

            //     if ($("#hl_form").valid() == true) {
            //         var form_data = new FormData($('#hl_form')[0]);
            //         console.log('isi0='+JSON.stringify(form_data));
            //         $.ajax({
            //             type: 'POST',
            //             url: 'save_details.php',
            //             data: form_data,
            //             cache: false,
            //             contentType: false,
            //             processData: false,
            //             success: function(data, status) {
            //                 console.log('isi='+data);
            //                 if (data == '1') {
            //                     btn_button.html(
            //                         '<em class="icon ni ni-plus"></em><span>Simpan</span>'
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

            // $(document).on('click', '.btn-edit', function(ev) {
            //     console.log('EDIT-DATA');
            //     ev.preventDefault();

            //     $('.productTitle').text('Edit Sertifikat');
            //     $('.productDes').html('<p>Edit Sertifikat.</p>');
            //     var tbl_id = $(this).attr("id");

            //     $.ajax({
            //         cache: false,
            //         url: 'get_ajax_details.php', // url where to submit the request
            //         type: "GET", // type of action POST || GET
            //         dataType: 'json', // data type
            //         data: {
            //             cmd: "get_sertifikat_details",
            //             tbl_id: tbl_id
            //         }, // post data || get data
            //         success: function(result) {
            //             console.log(result);
            //             $("#form_name").val("edit_sertifikat");
            //             $("#id_sertifikat").val(result['id_sertifikat']);
            //             $("#id_proyek").val(result['id_proyek']);
            //             $("#kode_stiker_sertifikat").val(result['kode_stiker_sertifikat']);
            //             $("#no_sertifikat").val(result['no_sertifikat']);
            //             $("#nama_alat_sertifikat").val(result['nama_alat_sertifikat']);
            //             $("#merek_sertifikat").val(result['merek_sertifikat']);
            //             $("#tipe_sertifikat").val(result['tipe_sertifikat']);
            //             $("#no_seri_sertifikat").val(result['no_seri_sertifikat']);
            //             $("#ruangan_sertifikat").val(result['ruangan_sertifikat']);
            //             $("#penguji_sertifikat").val(result['penguji_sertifikat']);
            //         },
            //         error: function(xhr, resp, text) {
            //             console.log(xhr, resp, text);
            //         }
            //     });
            // });

            cekDark();
        });


        function create_account(uid) {
            let link = 'penyelia_detail?uid=' + uid;
            window.open(link, '_self');
        }

        function esertif(uid) {
            let link = 'esertifikat?uid=' + uid;
            window.open(link, '_self');
        }

        function formatXLS() {
            let link = 'data/format.csv';
            window.open(link, '_blank');
        }

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

        function sertifikat_rev(uid) {
            let link = 'esertifikat?uid=' + uid;
            window.open(link, '_self');
        }

        function esertifikat_pdf(uid) {
            let link = 'esertifikat_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function lampiran_pdf(uid) {
            let link = 'lampiran_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function downloadPdf(uid) {
            window.open(uid, '_blank');
        }

        function updateFile2() {
            file = $("#nama_file").prop('files')[0];
            var fileType = file.type;
            console.log(file.type);
            // var fileMimes = array(
            //     'text/x-comma-separated-values',
            //     'text/comma-separated-values',
            //     'application/octet-stream',
            //     'application/vnd.ms-excel',
            //     'application/x-csv',
            //     'text/x-csv',
            //     'text/csv',
            //     'application/csv',
            //     'application/excel',
            //     'application/vnd.msexcel',
            //     'text/plain'
            // );
            // var match = 'application/vnd.ms-excel';
            if (fileType != 'text/csv') {
                alert('Mohon upload file CSV.');
                $("#nama_file").val('');
                return false;
            }
        }
    </script>

</body>

</html>