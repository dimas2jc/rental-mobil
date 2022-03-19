'use strict';
$(document).ready(function () {

    var date = new Date();

    // var events = [
    //     {
    //         title: 'Travel',
    //         start: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-01',
    //         constraint: 'businessHours',
    //         className: 'bg-danger',
    //         icon: "camera",
    //         description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
    //     },
    //     {
    //         title: 'Team Assing',
    //         start: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-01',
    //         end: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-05',
    //         constraint: 'availableForMeeting',
    //         className: 'bg-primary',
    //         description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
    //     },
    //     {
    //         title: 'Friend',
    //         start: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-07',
    //         end: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-09',
    //         className: 'bg-info',
    //         icon: "user-o",
    //         description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
    //     },
    //     {
    //         title: 'Holidays',
    //         start: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-09',
    //         className: 'bg-success',
    //         description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
    //     },
    //     {
    //         title: 'Company',
    //         start: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-12',
    //         end: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-17',
    //         className: 'bg-secondary',
    //         icon: "building-o",
    //         description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
    //     },
    //     {
    //         id: 'availableForMeeting',
    //         start: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-12',
    //         end: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-14',
    //         rendering: 'background',
    //         description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
    //     },
    //     {
    //         start: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-20',
    //         end: date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-25',
    //         overlap: false,
    //         rendering: 'background',
    //         color: '#ff9f89',
    //         description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
    //     }
    // ];

    var events = [];
    $.ajax({
        type: 'GET',
        url: baseUrl+'/dashboard/get_booking',
        dataType: 'json',
        success: function (results) {
            console.log(results);
            for(let i = 0; i < results.length; i++){
                // events[i] = {
                //     title: results[i].NOPOL,
                //     id: results[i].ID_BOOKING,
                //     start: new Date(results[i].DATE_START).toISOString().slice(0, 10),
                //     end: new Date(results[i].DATE_FINISH).toISOString().slice(0, 10),
                //     description: 'Kendaraan dengan nomor polisi '+results[i].NOPOL+' pada tanggal '+new Date(results[i].DATE_START).toISOString().slice(0, 10)+' sampai '+new Date(results[i].DATE_FINISH).toISOString().slice(0, 10)+' oleh '+results[i].NAME_CUSTOMER
                // }

                events[i] = new Object();
                events[i].title = results[i].name_customer,
                events[i].id = results[i].id_booking,
                events[i].status = results[i].status,
                events[i].start = new Date(results[i].date_start).toISOString().slice(0, 10),
                events[i].end = new Date(results[i].date_finish_temp).toISOString().slice(0, 10),
                events[i].description = `<div class="form-group row">`+
                                            `<div class="col-sm-12">`+
                                                `<table style="border: 0px">`+
                                                    `<tr>`+
                                                        `<td>Customer</td>`+
                                                        `<td>: `+results[i].name_customer+`</td>`+
                                                    `</tr>`+
                                                    `<tr>`+
                                                        `<td>Sales</td>`+
                                                        `<td>: `+results[i].name_sales+`</td>`+
                                                    `</tr>`+
                                                    `<tr>`+
                                                        `<td>Kendaraan</td>`+
                                                        `<td>: `+results[i].kendaraan+`</td>`+
                                                    `</tr>`+
                                                    `<tr>`+
                                                        `<td>Nopol</td>`+
                                                        `<td>: `+results[i].nopol+`</td>`+
                                                    `</tr>`+
                                                    `<tr>`+
                                                        `<td>Tgl Diambil</td>`+
                                                        `<td>: `+new Date(results[i].date_start).toISOString().slice(0, 10)+`</td>`+
                                                    `</tr>`+
                                                    `<tr>`+
                                                        `<td>Tgl Dikembalikan</td>`+
                                                        `<td>: `+new Date(results[i].date_finish).toISOString().slice(0, 10)+`</td>`+
                                                    `</tr>`+
                                                `</table>`+
                                            `</div>`+
                                        `</div>`;
            }
console.log(events);
            $('#calendar-demo').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                editable: true,
                droppable: true,
                drop: function () {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                weekNumbers: true,
                eventLimit: true, // allow "more" link when too many events
                events: events,
                eventRender: function (event, element) {
                    if (event.icon) {
                        element.find(".fc-title").prepend("<i class='mr-1 fa fa-" + event.icon + "'></i>");
                    }
                },
                dayClick: function () {
                    $('#createEventModal').modal();
                },
                eventClick: function (event, jsEvent, view) {
                    var modal = $('#viewEventModal');
                    modal.find('.event-icon').html("<i class='fa fa-" + event.icon + "'></i>");
                    modal.find('.event-title').html(event.title);
                    modal.find('.event-body div').remove();
                    modal.find('.event-body').append(event.description);
                    modal.find('.reschedule').attr('id', event.id);
                    modal.find('.approve').attr('id', event.id);
                    if(event.status == 2){
                        modal.find('.approve').css('display', 'none');
                    }
                    modal.modal();
                },
            });
        },
        error:function(){
            console.log(results);
        }
    });

    $('#external-events .fc-event').each(function () {

        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true, // maintain when user navigates (see docs on the renderEvent method),
            color: $(this).find('i').css("color"),
            icon: $(this).find('i').data('icon')
        });

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0,  //  original position after the drag
            start: function () {
                $('.app-block .app-sidebar').css("overflow", "visible")
            },
            stop: function () {
                $('.app-block .app-sidebar').css("overflow", "hidden")
            }
        });

    });
});
