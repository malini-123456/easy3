<?php 
require_once('session.php');
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

                            <?php if ($row_session['posisi_user'] == 'SA') { ?>

                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Upload Sertifikat</h3>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <div class="rows">
                                                <div class="col-md-8">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <form method="post" enctype="multipart/form-data" class="mb-3" id="uploadForm">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">File input</label>
                                                                    <input type="file" name="file[]" id="chooseFile" multiple>
                                                                </div>
                                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                            <!-- <h3>List File</h3> -->
                                                            <ul class="list-group" id="listFile" style="margin-top: 10px;">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div> <!-- nk-block -->

                            <?php } ?>


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
                                                            <th>Tgl Upload</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sno = 0;
                                                        $directory = 'data/pdf';
                                                        // $files = array_diff(scandir($directory), array('..', '.'));

                                                        $files = glob('data/pdf/*.pdf');
                                                        usort($files, function ($a, $b) {
                                                            return filemtime($b) - filemtime($a);
                                                        });

                                                        foreach ($files as $file) {
                                                            // $pdfName = 'data/pdf/' . $file;
                                                            $sno++;
                                                        ?>
                                                            <tr>
                                                                <td width='75'>
                                                                    <a href="#" id="<?= $file; ?>" class="btn btn-icon btn-trigger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Delete"><em class="icon ni ni-trash-fill"></em></a>
                                                                </td>
                                                                <td width='75'><?= $sno; ?></td>
                                                                <td><a href="<?= $file; ?>" target="_blank" class="toogle"><span><?= basename($file); ?></span></a></td>
                                                                <td><?= @date('d/m/Y - H:i:s', filemtime($file) + (60 * 60 * 8)) . ' WITA'; ?></td>
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
            /*download("0_5fcc333");*/

            document.title = 'Upload Sertifikat';

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
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
                            form_name: "del_pdf",
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


            ////////////////////////////////////////////////////////////////////


            $("#uploadForm").on('submit', (function(e) {
                e.preventDefault();
                var formdata = new FormData();
                var totalfiles = $('#chooseFile').prop("files");
                for (var index = 0; index < totalfiles.length; index++) {
                    formdata.append("file[]", totalfiles[index]);
                }
                $.ajax({
                    url: "upload2.php",
                    type: "POST",
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        var json = JSON.parse(data);
                        /*var document_id = json['document_id'];*/
                        console.log(json);
                        $('#listFile').html("");
                        for (var a = 0; a < json.length; a++) {
                            $('#listFile').append('<li class="list-group-item">' + json[a]['name'] + ' <button data-id="' + json[a]['document_id'] + '" class="btn btn-sm btn-primary download" style="float: right;padding: 5px 20px;margin-top: -5px;">Download</button></li>');
                        }

                        $(".download").on('click', (function(e) {
                            var id = $(this).attr('data-id');
                            download(id);
                        }));
                        //sign(document_id);
                        builksign(json);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }));

            function builksign(data) {
                var id = [];
                for (var a = 0; a < data.length; a++) {
                    id.push(data[a]['document_id']);
                }
                $.ajax({
                    url: "builksign.php",
                    type: "POST",
                    data: {
                        document_id: id
                    },
                    success: function(data) {
                        console.log(data);
                        var json = JSON.parse(data);
                        var file = json['JSONFile']['link'];
                        //download(document_id);
                        window.open(file, '_blank');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            /*function sign(document_id){
                $.ajax({
                    url: "sign.php",
                    type: "POST",
                    data:  {
                        document_id: document_id
                    },
                    success: function(data){
                        console.log(data);
                        download(document_id);
                    },
                    error: function(error){
                        console.log(error);
                    }             
                });
            }*/

            function download(document_id) {
                $.ajax({
                    url: "download_all.php",
                    type: "POST",
                    data: {
                        document_id: document_id
                    },
                    success: function(data) {
                        console.log(data);
                        var json = JSON.parse(data);
                        var name = json['name'];
                        var response = JSON.parse(json['response']);
                        var pdf = response['JSONFile']['file'];
                        downloadPDF(name, pdf);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function downloadPDF(name, pdf) {
                const linkSource = `data:application/pdf;base64,${pdf}`;
                const downloadLink = document.createElement("a");
                const fileName = name;
                downloadLink.href = linkSource;
                downloadLink.download = fileName;
                downloadLink.click();
            }

            // setInterval(downloadAll, 5000);

            // function downloadAll() {
            //     $.ajax({
            //         url: "download_process.php",
            //         type: "POST",
            //         success: function(data) {
            //             console.log(data);
            //             if (data === 'success') {
            //                 const greeting = new Notification('File sudah terunduh silahkan cek file');
            //             }
            //         },
            //         error: function(error) {
            //             console.log(error);
            //         }
            //     });
            // }

            cekDark();

        });
    </script>

</body>

</html>