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
                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h4 class="title nk-block-title">Profile Setting</h4>
                                            <div class="nk-block-des">
                                                <p>Mengubah data profile anda</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h5 class="card-title">Profile Setting</h5>
                                            </div>


                                            <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                                novalidate="novalidate">
                                                <input type="hidden" id="form_name" name="form_name"
                                                    value="edit_user2" />
                                                <input type="hidden" id="id_user" name="id_user"
                                                    value="<?=$row_session['id_user'];?>" />
                                                <input type="hidden" id="gambar_user" name="gambar_user" value="0" />

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="tempat_lahir">Tempat
                                                                Lahir</label>
                                                            <span class="form-note">Tempat lahir anda.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <a class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-map-pin"></em>
                                                                </a>
                                                                <input type="text" class="form-control invalid"
                                                                    id="tempat_lahir" name="tempat_lahir"
                                                                    value="<?=$row_session['tempat_lahir'];?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="tgl_lahir">Tgl.Lahir</label>
                                                            <span class="form-note">Tgl lahir anda.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-calendar-alt"></em>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control date-picker invalid"
                                                                    data-date-format="yyyy-mm-dd" id="tgl_lahir"
                                                                    name="tgl_lahir"
                                                                    value="<?=$row_session['tgl_lahir'];?>" required>
                                                            </div>
                                                            <div class="form-note">Date format <code>yyyy-mm-dd</code>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="alamat_user">Alamat</label>
                                                            <span class="form-note">Alamat tempat tinggal anda.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control invalid"
                                                                    id="alamat_user" name="alamat_user"
                                                                    value="<?=$row_session['alamat_user'];?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="npwp_user">NPWP</label>
                                                            <span class="form-note">Nomor Pokok Wajib Pajak.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="npwp_user"
                                                                    name="npwp_user"
                                                                    value="<?=$row_session['npwp_user'];?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email_user">Email</label>
                                                            <span class="form-note">Almat email anda.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="email_user"
                                                                    name="email_user"
                                                                    value="<?=$row_session['email_user'];?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="agama_user">Agama</label>
                                                            <span class="form-note">Agama anda saat ini.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <div class="form-control-select">
                                                                    <select class="form-control invalid" id="agama_user"
                                                                        name="agama_user" required>
                                                                        <option
                                                                            value="<?=$row_session['agama_user'];?>">
                                                                            <?=$row_session['agama_user'];?></option>
                                                                        <?php if ($row_session['agama_user'] != 'Islam') { ?>
                                                                        <option value="Islam">Islam</option>
                                                                        <?php } if ($row_session['agama_user'] != 'Protestan') { ?>
                                                                        <option value="Protestan">Protestan</option>
                                                                        <?php } if ($row_session['agama_user'] != 'Katolik') { ?>
                                                                        <option value="Katolik">Katolik</option>
                                                                        <?php } if ($row_session['agama_user'] != 'Hindu') { ?>
                                                                        <option value="Hindu">Hindu</option>
                                                                        <?php } if ($row_session['agama_user'] != 'Buddha') { ?>
                                                                        <option value="Buddha">Buddha</option>
                                                                        <?php } if ($row_session['agama_user'] != 'Konghucu') { ?>
                                                                        <option value="Konghucu">Konghucu</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="status_pernikahan">Status
                                                                Pernikahan</label>
                                                            <span class="form-note">Status pernikahan anda saat
                                                                ini.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <div class="form-control-select">
                                                                    <select class="form-control invalid"
                                                                        id="status_pernikahan" name="status_pernikahan"
                                                                        required>
                                                                        <option
                                                                            value="<?=$row_session['status_pernikahan'];?>">
                                                                            <?=$row_session['status_pernikahan'];?>
                                                                        </option>
                                                                        <?php if ($row_session['status_pernikahan'] != 'Belum Kawin') { ?>
                                                                        <option value="Belum Kawin">Belum Kawin</option>
                                                                        <?php } if ($row_session['status_pernikahan'] != 'Kawin Tercatat') { ?>
                                                                        <option value="Kawin Tercatat">Kawin Tercatat
                                                                        </option>
                                                                        <?php } if ($row_session['status_pernikahan'] != 'Kawin Belum Tercatat') { ?>
                                                                        <option value="Kawin Belum Tercatat">Kawin Belum
                                                                            Tercatat</option>
                                                                        <?php } if ($row_session['status_pernikahan'] != 'Cerai Hidup') { ?>
                                                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                                                        <?php } if ($row_session['status_pernikahan'] != 'Cerai Mati') { ?>
                                                                        <option value="Cerai Mati">Cerai Mati</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="kelamin_user">Jenis
                                                                Kelamin</label>
                                                            <span class="form-note">Jenis kelamin anda saat ini.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <select class="form-control invalid" id="kelamin_user"
                                                                    name="kelamin_user" required>
                                                                    <option value="<?=$row_session['kelamin_user'];?>">
                                                                        <?=$row_session['kelamin_user'];?>
                                                                    </option>
                                                                    <?php if ($row_session['kelamin_user'] != 'Laki-laki') { ?>
                                                                    <option value="Laki-laki">Laki-laki</option>
                                                                    <?php } if ($row_session['kelamin_user'] != 'Perempuan') { ?>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="pendidikan_user">Bidang
                                                                Pendidikan</label>
                                                            <span class="form-note">Bidang Pendidikan Terakhir
                                                                anda.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control invalid"
                                                                    id="pendidikan_user" name="pendidikan_user"
                                                                    value="<?=$row_session['pendidikan_user'];?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="pengalaman_user">Pengalaman
                                                                Bekerja</label>
                                                            <span class="form-note">Pengalaman bekerja anda selama
                                                                ini.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control" id="pengalaman_user"
                                                                    name="pengalaman_user"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="nama_file">Foto
                                                                Profil</label>
                                                            <span class="form-note">Mohon gunakan gambar ukuran persegi
                                                                untuk hasil terbaik</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <div class="custom-file">
                                                                    <input type="file" onchange="updateFile2()"
                                                                        class="custom-file-input" id="nama_file"
                                                                        name="nama_file" accept=".jpg, .png, .jpeg">
                                                                    <label class="custom-file-label"
                                                                        for="nama_file"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3">
                                                    <div class="col-lg-7 offset-lg-5">
                                                        <div class="form-group mt-2">
                                                            <button class="btn btn-primary btn-submit">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- card -->
                                </div><!-- .nk-block -->

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
        reset();
        document.title = 'Data Pribadi';
        $("#pengalaman_user").val('<?=$row_session['pengalaman_user'];?>');

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-submit', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {

                var form_data = new FormData($('#hl_form')[0]);
                if ($("#gambar_user").val() == '1') {
                    var file_data = $('#nama_file').prop('files')[0];
                    form_data.append("file", file_data);
                }

                // var form_data = new FormData($('#hl_form')[0]);
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

        cekDark();
    });


    function updateFile2() {
        $("#gambar_user").val('1');
        file = $("#nama_file").prop('files')[0];
        var fileType = file.type;
        var validImgTypes = ['image/jpg', 'image/jpeg', 'image/png'];
        if (!validImgTypes.includes(fileType)) {
            alert('Mohon upload file image.');
            $("#nama_file").val('');
            $("#gambar_user").val('0');
            return false;
        }
    }

    function reset() {
        $("#gambar_user").val('0');
    }
    </script>

</body>

</html>