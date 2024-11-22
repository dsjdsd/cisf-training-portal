@include('panel-pages.admin-panel.admin-panel-common-layout.header')
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Users</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Users List</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    {{-- <a href="{{route('adminAddTrainingProgramme')}}"><button class="btn btn-primary float-right">Add User</button></a> --}}
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form class="d-lg-flex align-items-end justify-content-between mt-2 mb-2"  method="get">
                <div >
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name"/>
                </div>
                <div >
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" />
                </div>
                <div >
                    <label>Email-ID</label>
                    <input type="text" class="form-control" name="email" placeholder="Email-ID" />
                </div>
                <div >
                    <label>Category</label>
                    <select name="category_name"  class="form-control" id="category_name">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                    <label>Role</label>
                    <select name="role_name"  class="form-control" id="role_name">
                        <option value="">-- Select role --</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                   <button class="btn btn-primary">Search</button>
                </div>
            </form>
            <div class="row clearfix">
                <div class="card project_list">
                <div class="table-responsive">
                            <table id="users-table" class="table  table-hover c_table">
                                <thead>
                                <tr>
                                    <th >Sr. No</th>
                                    <th >Name</th>
                                    <th>Mobile Number</th>
                                    <th >Email-ID</th>
                                    <th >Categories</th>
                                    <th >Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('adminListUsers') }}',
            type: 'GET',
            data: function(d) {
                d.name = $('input[name="name"]').val();
                d.mobile_number = $('input[name="mobile_number"]').val();
                d.email = $('input[name="email"]').val();
                d.category_name = $('select[name="category_name"]').val();
                d.role_name = $('select[name="role_name"]').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // This will show the serial number
            { data: 'name', name: 'name' },
            { data: 'mobile_number', name: 'mobile_number' },
            { data: 'email', name: 'email' },
            { data: 'category_name', name: 'category_name' },
            { data: 'role_name', name: 'role_name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }

        ]
    });
    $('form').on('submit', function(e) {
        e.preventDefault();
        table.draw();
    });
});
</script>
@include('panel-pages.admin-panel.admin-panel-common-layout.footer')