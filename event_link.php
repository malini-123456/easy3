<?php require_once('session.php');
if ($username) {
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
}

$editMode = 0;
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
// include "./head.html" 
?>

<head>
    <!-- <base href="../"> -->
    <meta charset="utf-8" />
    <meta name="author" content="PT.Einsten" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Einsten System Information" />
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <!-- Page Title  -->
    <title>EASY</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" type="text/css" href="./assets/css/libs/fontawesome-icons.css" />
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=2.9.0" />
    <link id="skin-default" rel="stylesheet" href="./assets/css/skins/theme-egyptian.css" />

    <style type="text/css">
    .desc-space {
        margin: 0;
    }
    </style>
</head>

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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Event Calendar</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div id="calendar" class="nk-calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->


                <!-- ============================ MODAL VIEW EVENT ============================ -->
                <div class="modal fade" tabindex="-1" id="previewEventPopup">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div id="preview-event-header" class="modal-header">
                                <h5 id="preview-event-title" class="modal-title"></h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <div class="row gy-3 py-1">
                                    <div class="col-sm-6">
                                        <h6 class="overline-title">Tgl Awal</h6>
                                        <p id="preview-event-start"></p>
                                    </div>
                                    <div class="col-sm-6" id="preview-event-end-check">
                                        <h6 class="overline-title">Tgl Akhir</h6>
                                        <p id="preview-event-end"></p>
                                    </div>
                                    <div class="col-sm-10" id="preview-event-description-check">
                                        <h6 class="overline-title">Deskripsi</h6>
                                        <p id="preview-event-description"></p>
                                        <p id="preview-event-desc0" class="desc-space"></p>
                                        <p id="preview-event-desc1" class="desc-space"></p>
                                        <p id="preview-event-desc2" class="desc-space"></p>
                                        <p id="preview-event-desc3" class="desc-space"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
        document.title = 'Event Calendar';
        cekDark();
    });



    // =============================== EVENT CALENDER ===============================

    ! function(NioApp, $) {
        "use strict"; // Variable

        var $win = $(window),
            $body = $('body'),
            breaks = NioApp.Break;

        NioApp.Calendar = function() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            var TODAY = yyyy + '-' + mm + '-' + dd;
            var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            var calendarEl = document.getElementById('calendar');
            var eventsEl = document.getElementById('externalEvents');
            var previewEventPopup = $('#previewEventPopup');
            var mobileView = NioApp.Win.width < NioApp.Break.md ? true : false;
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                timeZone: 'Asia/Singapore',
                initialView: mobileView ? 'listWeek' : 'dayGridMonth',
                themeSystem: 'bootstrap',
                headerToolbar: {
                    left: 'title prev,next',
                    center: null,
                    right: 'today dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 800,
                contentHeight: 780,
                aspectRatio: 3,
                editable: false,
                droppable: false,
                views: {
                    dayGridMonth: {
                        dayMaxEventRows: 4
                    }
                },
                direction: NioApp.State.isRTL ? "rtl" : "ltr",
                nowIndicator: true,
                now: TODAY,
                // now: TODAY + 'T09:25:00',
                eventDragStart: function eventDragStart(info) {
                    $('.popover').popover('hide');
                },
                eventMouseEnter: function eventMouseEnter(info) {
                    $(info.el).popover({
                        template: '<div class="popover"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                        title: info.event._def.title + info.event._def.extendedProps
                            .no_proyek,
                        content: info.event._def.extendedProps.description,
                        placement: 'top'
                    });
                    info.event._def.extendedProps.description ? $(info.el).popover('show') : $(info.el)
                        .popover('hide');
                },
                eventMouseLeave: function eventMouseLeave(info) {
                    $(info.el).popover('hide');
                },
                eventClick: function eventClick(info) {
                    // console.log('DATA INFO = ' + info.event._def.title + info.event._def.extendedProps.no_proyek); 
                    // Get data
                    var desc = [];
                    $('#preview-event-description').text('');
                    $('#preview-event-desc0').text('');
                    $('#preview-event-desc1').text('');
                    $('#preview-event-desc2').text('');
                    $('#preview-event-desc3').text('');
                    var title = info.event._def.title + info.event._def.extendedProps.no_proyek;
                    var description = info.event._def.extendedProps.description;
                    var dataProyek = info.event._def.extendedProps.dataProyek;
                    desc = dataProyek.split('|');
                    var start = info.event._instance.range.start;
                    var sDate = start.toUTCString().split(' ');
                    var startDate = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2,
                        '0') + '-' + String(sDate[1]);
                    var startTime = start.toUTCString().split(' ');
                    startTime = startTime[startTime.length - 2];
                    startTime = startTime == '00:00:00' ? '' : startTime;
                    var end = info.event._instance.range.end;
                    var eDate = end.toUTCString().split(' ');
                    var endDate = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2,
                        '0') + '-' + String(eDate[1]);
                    var endTime = end.toUTCString().split(' ');
                    endTime = endTime[endTime.length - 2];
                    endTime = endTime == '00:00:00' ? '' : endTime;

                    var className = info.event._def.ui.classNames[0].slice(3);

                    var previewStart = String(sDate[1]) + ' ' + month[start.getMonth()] + ' ' + start
                        .getFullYear() + (startTime ? ' - ' + to12(startTime) : '');
                    var previewEnd = String(eDate[1]) + ' ' + month[end.getMonth()] + ' ' + end
                        .getFullYear() + (endTime ? ' - ' + to12(endTime) : '');
                    $('#preview-event-title').text(title);
                    $('#preview-event-header').addClass('fc-' + className);
                    $('#preview-event-start').text(previewStart);
                    $('#preview-event-end').text(previewEnd);
                    $('#preview-event-description').text(description);
                    $('#preview-event-desc0').text(desc[0]);
                    $('#preview-event-desc1').text(desc[1]);
                    $('#preview-event-desc2').text(desc[2]);
                    $('#preview-event-desc3').text(desc[3]);
                    !description ? $('#preview-event-description-check').css('display', 'none') : null;
                    previewEventPopup.modal('show');
                    $('.popover').popover('hide');
                },
                // events: 'kegiatan.php',
                events: 'kegiatanfull',
            });
            calendar.render(); //Add event


            function to12(time) {
                time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

                if (time.length > 1) {
                    time = time.slice(1);
                    time.pop();
                    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM

                    time[0] = +time[0] % 12 || 12;
                }

                time = time.join('');
                return time;
            }

            function customCalSelect(cat) {
                if (!cat.id) {
                    return cat.text;
                }

                var $cat = $('<span class="fc-' + cat.element.value + '"> <span class="dot"></span>' + cat.text +
                    '</span>');
                return $cat;
            }

            ;
            NioApp.Select2('.select-calendar-theme', {
                templateResult: customCalSelect
            });
            previewEventPopup.on('hidden.bs.modal', function(e) {
                $('#preview-event-header').removeClass().addClass('modal-header');
            });
        };

        NioApp.coms.docReady.push(NioApp.Calendar);
    }(NioApp, jQuery);
    </script>

</body>

</html>