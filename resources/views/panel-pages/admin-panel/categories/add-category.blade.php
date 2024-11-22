@include('panel-pages.admin-panel.admin-panel-common-layout.header')
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Category</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('adminListCategory')}}"> List Category</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form  action="{{route('adminSaveCategory')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" >
                <div class="col-lg-6 col-md-12">
                    <label for="Category Name">Category Name<span class="text-danger">*</span></label>
                    <div class="form-group">                                
                        <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category Name" value="{{old('category_name')}}" required>
                    </div>
                    @if ($errors->has('category_name'))
                        <span class="text-danger">{{ $errors->first('category_name') }}</span>
                    @endif
                </div>
            </div>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
        </div>
    </div>
</section>
@include('panel-pages.admin-panel.admin-panel-common-layout.footer')