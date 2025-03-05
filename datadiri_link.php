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

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Selamat Datang, <?=$row_session['nama_user'];?></h4>
                                        <div class="nk-block-des">
                                            <p>Sebelum mengakses sistem, silakan mengisi data di bawah ini.</p>
                                        </div>
                                    </div>
                                </div>

                                <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                    novalidate="novalidate">
                                    <input type="hidden" id="form_name" name="form_name" value="edit_user2" />
                                    <input type="hidden" id="id_user" name="id_user"
                                        value="<?=$row_session['id_user'];?>" />
                                    <input type="hidden" id="gambar_user" name="gambar_user" value="0" />

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a class="form-icon form-icon-right">
                                                <em class="icon ni ni-map-pin"></em>
                                            </a>
                                            <input type="text" class="form-control invalid" id="tempat_lahir"
                                                name="tempat_lahir" placeholder="Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="tgl_lahir">Tgl.Lahir</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-calendar-alt"></em>
                                            </div>
                                            <input type="text" class="form-control date-picker invalid"
                                                data-date-format="yyyy-mm-dd" id="tgl_lahir" name="tgl_lahir" required>
                                        </div>
                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="alamat_user">Alamat</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="alamat_user"
                                                name="alamat_user" placeholder="Alamat" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="npwp_user">NPWP</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="npwp_user" name="npwp_user"
                                                placeholder="NPWP">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="email_user">Email</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="email_user" name="email_user"
                                                placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="agama_user">Agama:</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control invalid" id="agama_user" name="agama_user"
                                                    required>
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

                                    <div class="form-group">
                                        <label class="form-label" for="status_pernikahan">Status Pernikahan:</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control invalid" id="status_pernikahan"
                                                    name="status_pernikahan" required>
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

                                    <div class="form-group">
                                        <label class="form-label" for="kelamin_user">Jenis Kelamin:</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control invalid" id="kelamin_user"
                                                    name="kelamin_user" required>
                                                    <option value="">--- Jenis Kelamin ---</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="pendidikan_user">Bidang Pendidikan</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control invalid" id="pendidikan_user"
                                                name="pendidikan_user" placeholder="Bidang Pendidikan" required>
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <label class="form-label" for="pengalaman_user">Pengalaman Bekerja</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control" id="pengalaman_user"
                                                name="pengalaman_user"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="nama_file">Foto Profil <i>(Mohon gunakan foto
                                                persegi)</i></label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file invalid">
                                                <input type="file" onchange="updateFile2()" class="custom-file-input"
                                                    id="nama_file" name="nama_file" accept=".jpg, .png, .jpeg" required>
                                                <label class="custom-file-label" for="nama_file"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <label class="form-label">Foto</label>
                                    <div class="upload-zone">
                                        <div class="dz-message" data-dz-message>
                                            <span class="dz-message-text">Drag and drop file</span>
                                            <span class="dz-message-or">or</span>
                                            <button class="btn btn-primary">SELECT</button>
                                        </div>
                                    </div> -->
                                    <br>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block btn-submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=2.9.0"></script>
    <script src="./assets/js/scripts.js?ver=2.9.0"></script>

    <script>
    $(document).ready(function(e) {
        reset();
        document.title = 'Daftar Riwayat Hidup';

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
                                window.open('home', '_self');
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

</html>