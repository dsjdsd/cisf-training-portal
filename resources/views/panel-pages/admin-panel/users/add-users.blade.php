@include('panel-pages.admin-panel.admin-panel-common-layout.header')
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Users</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('adminListUsers')}}"> List Users</a></li>
                        <li class="breadcrumb-item active">Edit Users</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form  action="{{route('adminSaveUsers')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" >
                <div class="col-lg-6 col-md-12">
                    <label for="Name">Name<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{old('name')}}" required>
                    </div>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Mobile Number">Mobile Number<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="text" id="mobile_number" name="mobile_number" class="form-control" placeholder="Mobile Number" value="{{old('mobile_number')}}" required >
                    </div>
                    @if ($errors->has('mobile_number'))
                        <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                    @endif
                    
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Email-ID">Email-ID<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email-ID" value="{{old('email')}}" required >
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif

                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Title">Title<span class="text-danger">*</span></label>
                    <select name="title" class="form-control" required>
                        <option value="">-- Select Title --</option>
                        <option value="Dr."  {{ old('title') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                        <option value="Mr."  {{ old('title') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                        <option value="Ms." {{ old('title') == 'Ms.' ? 'selected' : '' }} >Ms.</option>
                        <option value="Prof."  {{ old('title') == 'Prof.' ? 'selected' : '' }}>Prof.</option>
                    </select>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Category">Category<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <select name="categories"  class="form-control" id="categories" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ old('categories') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('categories'))
                        <span class="text-danger">{{ $errors->first('categories') }}</span>
                    @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="State">State<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <select name="state" class="form-control" required>
                            <option value="">-- Select State --</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}" {{ old('state') == $state->id ? 'selected' : '' }}>{{$state->state_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('state'))
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="City">City<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="text" id="city" name="city" class="form-control" placeholder="City" value="{{old('city')}}" required>
                    </div>
                    @if ($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">SUBMIT</button>
            </form>
        </div>
    </div>
</section>
@include('panel-pages.admin-panel.admin-panel-common-layout.footer')