"use strict";

!function (NioApp, $) {
  "use strict"; // Variable

  var $win = $(window),
    $body = $('body'),
    breaks = NioApp.Break;

  NioApp.Calendar = function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    var TODAY = yyyy + '-' + mm + '-' + dd;
    var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
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
      timeZone: 'Asia/Singapore',
      initialView: mobileView ? 'listWeek' : 'dayGridMonth',
      themeSystem: 'bootstrap',
      headerToolbar: {
        left: 'title prev,next',
        center: null,
        right: 'today dayGridMonth,listWeek'
      },
      height: 800,
      contentHeight: 780,
      aspectRatio: 3,
      editable: true,
      droppable: true,
      views: {
        dayGridMonth: {
          dayMaxEventRows: 2
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
          title: info.event._def.title,
          content: info.event._def.extendedProps.description,
          placement: 'top'
        });
        info.event._def.extendedProps.description ? $(info.el).popover('show') : $(info.el).popover('hide');
      },
      eventMouseLeave: function eventMouseLeave(info) {
        $(info.el).popover('hide');
      },
      eventClick: function eventClick(info) {
        // Get data
        var title = info.event._def.title;
        var description = info.event._def.extendedProps.description;
        var start = info.event._instance.range.start;
        var startDate = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2, '0') + '-' + String(start.getDate()).padStart(2, '0');
        var end = info.event._instance.range.end;
        var endDate = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2, '0') + '-' + String(end.getDate()).padStart(2, '0');

        var className = info.event._def.ui.classNames[0].slice(3);

        var eventId = info.event._def.publicId; //Set data in eidt form

        $('#edit-event-title').val(title);
        $('#edit-event-start-date').val(startDate).datepicker('update');
        $('#edit-event-end-date').val(endDate).datepicker('update');
        $('#edit-event-description').val(description);
        $('#edit-event-theme').val(className);
        $('#edit-event-theme').trigger('change.select2');
        editEventForm.attr('data-id', eventId); // Set data in preview

        var previewStart = String(start.getDate()).padStart(2, '0') + ' ' + month[start.getMonth()] + ' ' + start.getFullYear();
        var previewEnd = String(end.getDate()).padStart(2, '0') + ' ' + month[end.getMonth()] + ' ' + end.getFullYear();
        $('#preview-event-title').text(title);
        $('#preview-event-header').addClass('fc-' + className);
        $('#preview-event-start').text(previewStart);
        $('#preview-event-end').text(previewEnd);
        $('#preview-event-description').text(description);
        !description ? $('#preview-event-description-check').css('display', 'none') : null;
        previewEventPopup.modal('show');
        $('.popover').popover('hide');
      },
      events: 'kegiatan.php',
    });
    calendar.render(); //Add event

    // addEventBtn.on("click", function (e) {
    //   e.preventDefault();
    //   var idProyek = $('#id_proyek').val();
    //   var eventTitle = $('#event-title').val();
    //   var eventStartDate = $('#event-start-date').val();
    //   var eventEndDate = $('#event-end-date').val();
    //   var eventDescription = $('#event-description').val();
    //   var eventTheme = $('#event-theme').val();
    //   console.log(eventTheme);

    //   calendar.addEvent({
    //     // id: 'added-event-id-' + Math.floor(Math.random() * 9999999),
    //     title: eventTitle,
    //     start: eventStartDate,
    //     end: eventEndDate,
    //     className: 'fc-' + eventTheme,
    //     description: eventDescription
    //   });
    //   addEventPopup.modal('hide');

    //   if ($("#addEventForm").valid() == true) {
    //     var form_data = new FormData();
    //     form_data.append('form_name', 'add_kegiatan');
    //     form_data.append('id_kegiatan', '');
    //     form_data.append('id_proyek', idProyek);
    //     form_data.append('nama_kegiatan', eventTitle);
    //     form_data.append('jenis_kegiatan', eventTheme);
    //     form_data.append('isi_kegiatan', eventDescription);
    //     form_data.append('stgl_kegiatan', eventStartDate);
    //     form_data.append('etgl_kegiatan', eventEndDate);

    //     $.ajax({
    //       type: 'POST',
    //       url: 'save_details.php',
    //       data: form_data,
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       success: function (data, status) {
    //         if (data == '1') {
    //           Swal.fire({
    //             icon: "success",
    //             title: "Data telah tersimpan.",
    //             showConfirmButton: false,
    //             timer: 1500,
    //           });
    //           setTimeout(function () {
    //             location.reload();
    //           }, 2000);
    //         } else {
    //           Swal.fire({
    //             icon: "error",
    //             title: "Data gagal tersimpan.",
    //             showConfirmButton: false,
    //             timer: 1500,
    //           });
    //         }
    //       },
    //       error: function (xhr, resp, text) {
    //         console.log(xhr, resp, text);
    //       }
    //     });
    //   }
    // });

    updateEventBtn.on("click", function (e) {
      e.preventDefault();
      var eventTitle = $('#edit-event-title').val();
      var eventStartDate = $('#edit-event-start-date').val();
      var eventEndDate = $('#edit-event-end-date').val();
      var eventStartTime = $('#edit-event-start-time').val();
      var eventEndTime = $('#edit-event-end-time').val();
      var eventDescription = $('#edit-event-description').val();
      var eventTheme = $('#edit-event-theme').val();
      var eventStartTimeCheck = eventStartTime ? 'T' + eventStartTime + 'Z' : '';
      var eventEndTimeCheck = eventEndTime ? 'T' + eventEndTime + 'Z' : '';
      var selectEvent = calendar.getEventById(editEventForm[0].dataset.id);
      selectEvent.remove();
      calendar.addEvent({
        id: editEventForm[0].dataset.id,
        title: eventTitle,
        start: eventStartDate + eventStartTimeCheck,
        end: eventEndDate + eventEndTimeCheck,
        className: "fc-" + eventTheme,
        description: eventDescription
      });
      editEventPopup.modal('hide');
    });
    deleteEventBtn.on("click", function (e) {
      e.preventDefault();
      var selectEvent = calendar.getEventById(editEventForm[0].dataset.id);
      selectEvent.remove();
    });

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

      var $cat = $('<span class="fc-' + cat.element.value + '"> <span class="dot"></span>' + cat.text + '</span>');
      return $cat;
    }

    ;
    NioApp.Select2('.select-calendar-theme', {
      templateResult: customCalSelect
    });
    addEventPopup.on('hidden.bs.modal', function (e) {
      setTimeout(function () {
        $('#addEventForm input,#addEventForm textarea').val('');
        $('#event-theme').val('event-primary');
        $('#event-theme').trigger('change.select2');
      }, 1000);
    });
    previewEventPopup.on('hidden.bs.modal', function (e) {
      $('#preview-event-header').removeClass().addClass('modal-header');
    });
  };

  NioApp.coms.docReady.push(NioApp.Calendar);
}(NioApp, jQuery);