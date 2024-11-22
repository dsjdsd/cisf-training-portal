@include('panel-pages.admin-panel.admin-panel-common-layout.header')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Training Programmes</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('adminAddTrainingProgramme')}}"> Add Training Programmes</a></li>

                    <li class="breadcrumb-item active">Training Programmes Detail</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <div class="pt-4 pb-4">
        <div class="container_css">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <h6 class="p-2 m-auto bg-danger text-white">Training Programmes Detail</h6>
                        <div class="card">
                            <div class="body">
                                <div class="row w-100 justify-content-between">
                                    <div class="col-md-4 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">Programmes Name</h5>
                                        <div class="col-md-6 col-sm-12">{{$programme->programme_name}}</div>
                                    </div>
                                    <div class="col-md-5 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">Course Directors Name</h5>
                                        <div class="col-md-6 col-sm-12">{{$programme->course_director_name}}</div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">From Date</h5>
                                        <div class="col-md-6 col-sm-12">{{$programme->from_date}}</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row w-100 justify-content-between">
                                    <div class="col-md-4 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">To Date</h5>
                                        <div class="col-md-6 col-sm-12">{{$programme->to_date}}</div>
                                    </div>
                                    <div class="col-md-5 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">From Time</h5>
                                        <div class="col-md-6 col-sm-12">{{$programme->from_time}}</div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">To Time</h5>
                                        <div class="col-md-6 col-sm-12">{{$programme->to_time}}</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row w-100 justify-content-between">
                                    <div class="col-md-4 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">Course Fee</h5>
                                        <div class="col-md-6 col-sm-12">{{$programme->course_fee}}</div>
                                    </div>
                                    <div class="col-md-5 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">Brochure</h5>
                                        <div class="col-md-6 col-sm-12"><a href="{{asset('training-programmes/brochures/'.$programme->brochure)}}" target="_balnk" class="text-danger">{{$programme->brochure}}</a></div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 row align-items-center">
                                        <h5 class="col-md-6 col-sm-12 m-0 vehicle_font">Status</h5>
                                        <div class="col-md-6 col-sm-12">
                                            <button class="btn {{ $programme->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $programme->status == 1 ? 'Active' : 'In-Active' }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                    <div class="col-md-12 col-sm-12 row align-items-center">
                                        <h5 class="col-md-3 col-sm-12 m-0 vehicle_font">Eligibility</h5>
                                        <div class="col-md-9 col-sm-12">{{$programme->eligibility}}</div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12 col-sm-12 row align-items-center">
                                        <h5 class="col-md-3 col-sm-12 m-0 vehicle_font">Core Contents</h5>
                                        <div class="col-md-9 col-sm-12">{{$programme->core_contents}}</div>
                                    </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="text-center w-100 mb-4">
                        <a href="{{route('adminListTrainingProgramme')}}" class="btn btn-outline-danger">Back</a>
                        <a href="{{url('admin/edit-training-programme/' . Crypt::encryptString($programme->id))}}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('panel-pages.admin-panel.admin-panel-common-layout.footer')