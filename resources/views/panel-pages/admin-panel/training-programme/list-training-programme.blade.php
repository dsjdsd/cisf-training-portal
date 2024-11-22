@include('panel-pages.admin-panel.admin-panel-common-layout.header')
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Training Programmes</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Training Programmes List</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('adminAddTrainingProgramme')}}"><button class="btn btn-primary float-right">Add Training Programmes</button></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form class="d-lg-flex align-items-end justify-content-between mt-2 mb-2"  method="get">
                <div >
                    <label>Programme Name</label>
                    <input type="text" class="form-control" name="programme_name" placeholder="Programme Name"/>
                </div>
                <div >
                    <label>Course Directors Name</label>
                    <input type="text" class="form-control" name="course_director_name" placeholder="Course Directors Name" />
                </div>
                <div >
                    <label>From Date</label>
                    <input type="date" class="form-control" name="from_date" />
                </div>
                <div >
                    <label>To Date</label>
                    <input type="date" class="form-control" name="to_date" />
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
                                    <th >Programme Name</th>
                                    <th>Programme From Date</th>
                                    <th >Programme To Date</th>
                                    <th >Course Directors Name</th>
                                    <th >Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <!-- DataTables will populate this -->
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
            url: '{{ route('adminListTrainingProgramme') }}',
            type: 'GET',
            data: function(d) {
                // Add form data to DataTables request
                d.programme_name = $('input[name="programme_name"]').val();
                d.from_date = $('input[name="from_date"]').val();
                d.to_date = $('input[name="to_date"]').val();
                d.course_director_name = $('input[name="course_director_name"]').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // This will show the serial number
            { data: 'programme_name', name: 'programme_name' },
            { data: 'from_date', name: 'from_date' },
            { data: 'to_date', name: 'to_date' },
            { data: 'course_director_name', name: 'course_director_name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }

        ]
    });
    $('form').on('submit', function(e) {
        e.preventDefault();
        table.draw();
    });
    $('#users-table').on('click', '.programme-status', function() {
        var button = $(this);
        var programmeId = button.data('id');
        var currentStatus = button.data('status');
        var newStatus = currentStatus == '1' ? '0' : '1';
        var confirmationMessage = currentStatus == '1'
            ? "Are you sure you want to deactivate this program?"
            : "Are you sure you want to activate this program?";
        if (confirm(confirmationMessage)) {
            $.ajax({
            url: '{{ route('adminUpdateStatusTrainingProgramme') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                programmeId: programmeId,
                newStatus: newStatus,
            },
            success: function(res) {
                button.toggleClass('btn-success btn-danger');
                button.text(newStatus == '1' ? 'Active' : 'In-Active');
                button.data('status', newStatus);
                toastr.success(res.message);
            },
            error: function(xhr) {
                console.error('Error: ' + xhr.error);
            }
        });
        }
    });
});
</script>
@include('panel-pages.admin-panel.admin-panel-common-layout.footer')