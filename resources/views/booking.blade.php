@extends('layouts.app')

@section('extra-css')
    <!-- Fullcalendar -->
    <link rel="stylesheet" href="{{asset('vendors/fullcalendar/fullcalendar.min.css')}}" type="text/css">
@endsection

@section('content')

<div class="page-header d-md-flex justify-content-between">
    <div>
        <h3>Selamat Datang, Bony</h3>
        <!-- <p class="text-muted">This page shows an overview for your account summary.</p> -->
    </div>
    <div class="mt-3 mt-md-0">
        <div class="btn btn-outline-light">
            <span>@php echo date("d F Y"); @endphp</span>
        </div>
        <a href="#" class="btn btn-primary ml-0 ml-md-2 mt-2 mt-md-0 dropdown-toggle" data-toggle="dropdown">Actions</a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item">Download</a>
            <a href="#" class="dropdown-item">Print</a>
        </div>
    </div>
</div>
<div class="row no-gutters app-block">
    <!-- <div class="col-md-3 app-sidebar">
        <h3 class="mb-4">Calendar</h3>
        <button class="btn btn-primary btn-block mb-3" data-toggle="modal"
                data-target="#createEventModal">
            Add Event
        </button>
        <p class="font-weight-bold mb-1">Events</p>
        <p class="small text-muted mb-2">Drag and drop your event</p>
        <div>
            <div class="list-group list-group-flush" id="external-events">
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-success" data-icon="car"></i> Holidays
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-danger" data-icon="users"></i> Travel
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-info" data-icon="coffee"></i> Friend
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-warning" data-icon="diamond"></i> Company
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-primary" data-icon="glass"></i> Team Assing
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-secondary" data-icon="glass"></i> Family
                </div>
            </div>
        </div>
        <div class="custom-control custom-checkbox mt-3">
            <input type="checkbox" class="custom-control-input" id="drop-remove" checked="">
            <label class="custom-control-label" for="drop-remove">Remove after drop</label>
        </div>
    </div> -->
    <div class="col-md-12">
        <!-- <div class="app-content-overlay"></div> -->
        <div class="card">
            <div class="card-body">
                <div class="responsive" id="calendar-demo"></div>
            </div>
        </div>
    </div>
</div>

<!-- begin::Create Event Modal -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input id="event-title" type="text" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Event type</label>
                        <div class="col-sm-9">
                            <div class="mt-2" id="event-type">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                            class="custom-control-input">
                                    <label class="custom-control-label"
                                            for="customRadioInline1">Appointment</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                            class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Meeting</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row row-sm">
                        <label class="col-sm-3 col-form-label">Start</label>
                        <div class="col-sm-5">
                            <input id="event-start-date" type="text"
                                    class="form-control create-event-datepicker"
                                    placeholder="Date">
                        </div>
                        <div class="col-sm-4">
                            <input id="event-start-time" type="text" class="form-control create-event-demo"
                                    placeholder="Time">
                        </div>
                    </div>
                    <div class="form-group row row-sm">
                        <label class="col-sm-3 col-form-label">End</label>
                        <div class="col-sm-5">
                            <input id="event-end-date" type="text" class="form-control create-event-datepicker"
                                    placeholder="Date">
                        </div>
                        <div class="col-sm-4">
                            <input id="event-end-time" type="text" class="form-control create-event-demo"
                                    placeholder="Time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Participate</label>
                        <div class="col-sm-9">
                            <div class="avatar-group">
                                <figure class="avatar avatar-sm">
                                    <span class="avatar-title bg-success rounded-circle">K</span>
                                </figure>
                                <figure class="avatar avatar-sm">
                                    <span class="avatar-title bg-danger rounded-circle">S</span>
                                </figure>
                                <figure class="avatar avatar-sm">
                                    <span class="avatar-title bg-primary rounded-circle">C</span>
                                </figure>
                                <figure class="avatar avatar-sm">
                                    <img src="../../assets/media/image/user/women_avatar3.jpg"
                                            class="rounded-circle"
                                            alt="image">
                                </figure>
                            </div>
                            <button type="button" class="btn btn-outline-light btn-sm btn-floating">
                                <i class="ti-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea id="event-desc" class="form-control" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <button type="submit" id="btn-save" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end::Create Event Modal -->

<!-- begin::Event Info Modal -->
<div class="modal fade" id="viewEventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="event-icon mr-2"></span>
                    <span class="event-title">Modal Title</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="event-body"></div>
            </div>
        </div>
    </div>
</div>
<!-- end::Event Info Modal -->

@endsection

@section('extra-script')

    <!-- Fullcalendar -->
    <script src="{{asset('vendors/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('vendors/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/examples/fullcalendar.js')}}"></script>
    <script src="{{asset('assets/js/examples/pages/calendar.js')}}"></script>

    <script src="{{asset('assets/js/custom/booking.js')}}"></script>

@endsection