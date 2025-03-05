<!DOCTYPE html>
<html lang="zxx" class="js">

<?php include "./head.html" ?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php
            // include "./aside.php" 
            ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php
                // include "./header.php" 
                ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Jadwal Kalibrasi
                                                <!-- <h4>Kalender <small><?= $row0['no_proyek']; ?></small></h4> -->
                                            </h3>
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


                <!-- ============================ MODAL ADD EVENT ============================ -->

                <!-- ============================ MODAL EDIT EVENT ============================ -->

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================ MODAL DELETE EVENT ============================ -->

                <!-- ============================ MODAL EVENT ============================ -->



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

        document.title = 'Agenda';

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
            var removeEvent = document.getElementById('removeEvent');
            var addEventBtn = $('#addEvent');
            var addEventForm = $('#addEventForm');
            var addEventPopup = $('#addEventPopup');
            var updateEventBtn = $('#updateEvent');
            var editEventForm = $('#editEventForm');
            var editEventPopup = $('#editEventPopup');
            var previewEventPopup = $('#previewEventPopup');
            var deleteEventBtn = $('#deleteEvent');
            var mobileView = NioApp.Win.width < NioApp.Break.md ? true : false;
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                // timeZone: 'UTC',
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
                // now: TODAY + 'T08:00:00',
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
                    // Get data
                    var title = info.event._def.title + info.event._def.extendedProps.no_proyek;
                    var description = info.event._def.extendedProps.description;
                    var start = info.event._instance.range.start;
                    var sDate = start.toUTCString().split(' ');
                    // var startDate = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2,
                    //     '0') + '-' + String(start.getDate()).padStart(2, '0');
                    var startDate = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2,
                        '0') + '-' + String(sDate[1]);
                    var startTime = start.toUTCString().split(' ');
                    startTime = startTime[startTime.length - 2];
                    startTime = startTime == '00:00:00' ? '' : startTime;
                    var end = info.event._instance.range.end;
                    var eDate = end.toUTCString().split(' ');
                    // var endDate = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2,
                    //     '0') + '-' + String(end.getDate()).padStart(2, '0');
                    var endDate = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2,
                        '0') + '-' + String(eDate[1]);
                    var endTime = end.toUTCString().split(' ');
                    endTime = endTime[endTime.length - 2];
                    endTime = endTime == '00:00:00' ? '' : endTime;

                    // console.log(info);
                    // console.log('start=' + start.toUTCString().split(' ') + ' | ' + startDate + ' | ' +
                    //     startTime);
                    // console.log('end=' + end.toUTCString().split(' ') + ' | ' + endDate + ' | ' +
                    //     endTime);

                    var className = info.event._def.ui.classNames[0].slice(3);

                    $('#btn-ubah').show();
                    $('#btn-hapus').show();

                    var eventId = info.event._def.publicId; //Set data in eidt form

                    // $('#id_edit_kegiatan').val(eventId);
                    // $('#edit-event-title').val(info.event._def.title);
                    // $('#edit-event-no_proyek').text('Edit Event' + info.event._def.extendedProps.no_proyek);
                    // $('#edit-event-start-date').val(startDate).datepicker('update');
                    // $('#edit-event-end-date').val(endDate).datepicker('update');
                    // $('#edit-event-start-time').val(startTime);
                    // $('#edit-event-end-time').val(endTime);
                    // $('#edit-event-description').val(description);
                    // $('#edit-event-theme').val(className);
                    // $('#edit-event-theme').trigger('change.select2');
                    // editEventForm.attr('data-id', eventId); // Set data in preview

                    // var previewStart = String(start.getDate()).padStart(2, '0') + ' ' + month[start
                    //     .getMonth()] + ' ' + start.getFullYear() + (startTime ? ' - ' + to12(
                    //     startTime) : '');
                    // var previewEnd = String(end.getDate()).padStart(2, '0') + ' ' + month[end
                    //     .getMonth()] + ' ' + end.getFullYear() + (endTime ? ' - ' + to12(endTime) :
                    //     '');
                    var previewStart = String(sDate[1]) + ' ' + month[start
                        .getMonth()] + ' ' + start.getFullYear() + (startTime ? ' - ' + to12(
                        startTime) : '');
                    var previewEnd = String(eDate[1]) + ' ' + month[end
                        .getMonth()] + ' ' + end.getFullYear() + (endTime ? ' - ' + to12(endTime) :
                        '');
                    $('#preview-event-title').text(title);
                    $('#preview-event-header').addClass('fc-' + className);
                    $('#preview-event-start').text(previewStart);
                    $('#preview-event-end').text(previewEnd);
                    $('#preview-event-description').text(description);
                    $('#btn-hapus').val(eventId);
                    !description ? $('#preview-event-description-check').css(
                        'display', 'none') : null;
                    previewEventPopup.modal('show');
                    $('.popover').popover('hide');
                },
                events: 'agendafull',
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
            addEventPopup.on('hidden.bs.modal', function(e) {
                setTimeout(function() {
                    $('#addEventForm input,#addEventForm textarea').val('');
                    $('#event-theme').val('event-teal');
                    $('#event-theme').trigger('change.select2');
                }, 1000);
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