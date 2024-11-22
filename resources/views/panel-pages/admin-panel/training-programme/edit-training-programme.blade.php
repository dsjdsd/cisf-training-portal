@include('panel-pages.admin-panel.admin-panel-common-layout.header')
<style>
    .btn-simple{
        display:none;
    }
</style>
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Training Programmes</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('adminAddTrainingProgramme')}}"> Add Training Programmes</a></li>
                        <li class="breadcrumb-item active">Edit Training Programmes</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form  action="{{route('adminUpdateTrainingProgramme')}}" method="post" enctype="multipart/form-data">
                
                @csrf
                <div class="row" >
                <div class="col-lg-6 col-md-12">
                    <label for="Programmes Name">Programmes Name<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="hidden" id="id" name="id" class="form-control"  value="{{$programme->id}}" required>
                        <input type="text" id="programme_name" name="programme_name" class="form-control" placeholder="Programmes Name" value="{{$programme->programme_name}}" required>
                    </div>
                    @if ($errors->has('programme_name'))
                        <span class="text-danger">{{ $errors->first('programme_name') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Course Directors Name">Course Directors Name<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="text" id="course_director_name" name="course_director_name" class="form-control" placeholder="Course Directors Name" value="{{$programme->course_director_name}}" required>
                    </div>
                    @if ($errors->has('course_director_name'))
                        <span class="text-danger">{{ $errors->first('course_director_name') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="From Date">From Date<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="date" id="from_date" name="from_date" class="form-control"  value="{{$programme->from_date}}" required>
                    </div>
                    @if ($errors->has('from_date'))
                        <span class="text-danger">{{ $errors->first('from_date') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="To Date">To Date<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="date" id="to_date" name="to_date" class="form-control" value="{{$programme->to_date}}" required>
                    </div>
                    @if ($errors->has('to_date'))
                        <span class="text-danger">{{ $errors->first('to_date') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="From Time">From Time</label>
                    <div class="form-group">                                
                        <input type="time" id="from_time" name="from_time" class="form-control"  value="{{$programme->from_time}}" >
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="To Time">To Time</label>
                    <div class="form-group">                                
                        <input type="time" id="to_time" name="to_time" class="form-control"  value="{{$programme->to_time}}" >
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <label for="Course Fee">Course Fee<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="number" id="course_fee" name="course_fee" class="form-control" placeholder="Course Fee" value="{{$programme->course_fee}}" required>
                    </div>
                    @if ($errors->has('course_fee'))
                        <span class="text-danger">{{ $errors->first('course_fee') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Brochure">Brochure <a href="{{asset('training-programmes/brochures/'.$programme->brochure)}}" target="_balnk" class="text-danger">{{$programme->brochure}}</a></label>
                    <div class="form-group">                                
                        <input type="file" id="brochure" name="brochure" class="form-control" accept=".pdf">
                    </div>
                    @if ($errors->has('brochure'))
                        <span class="text-danger">{{ $errors->first('brochure') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Eligibility">Eligibility<span class="text-danger">*</span></label>
                    <div class="form-group"> 
                        <textarea  name="eligibility" class="form-control" required> {{$programme->eligibility}}</textarea>                               
                    </div>
                    @if ($errors->has('eligibility'))
                        <span class="text-danger">{{ $errors->first('eligibility') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Core Contents">Core Contents<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <textarea  name="core_contents" class="form-control" required>{{$programme->core_contents}}</textarea> 
                    </div>
                    @if ($errors->has('core_contents'))
                        <span class="text-danger">{{ $errors->first('core_contents') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Status">Status<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <select name="status" class="form-control">
                            <option value="1" {{ $programme->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $programme->status == "0" ? 'selected' : '' }}>In-Active</option>
                        </select>
                    </div>
                    @if ($errors->has('course_fee'))
                        <span class="text-danger">{{ $errors->first('course_fee') }}</span>
                    @endif
                </div>
            </div>
                <button type="submit" class="btn btn-primary ">UPDATE</button>

            </form>
        </div>
    </div>
</section>
@include('panel-pages.admin-panel.admin-panel-common-layout.footer')