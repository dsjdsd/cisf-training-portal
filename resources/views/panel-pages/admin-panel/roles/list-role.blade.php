@include('panel-pages.admin-panel.admin-panel-common-layout.header')
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Role</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">List Role</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('adminAddRole')}}" target="_blank"><button class="btn btn-primary float-right">Add Role</button></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card project_list">
                <div class="table-responsive">
                            <table id="users-table" class="table  table-hover c_table">
                                <thead>
                                <tr>
                                    <th >Sr. No</th>
                                    <th >Role Name</th>
                                    <th >Status</th>
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
            url: '{{ route('adminListRole') }}',
            type: 'GET',     
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'role_name', name: 'role_name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }

        ]
    });
    $('#users-table').on('click', '.role-status', function() {
        var button = $(this);
        var roleId = button.data('id');
        var currentStatus = button.data('status');
        var newStatus = currentStatus == '1' ? '0' : '1';
        var confirmationMessage = currentStatus == '1'
            ? "Are you sure you want to deactivate this role?"
            : "Are you sure you want to activate this role?";
        if (confirm(confirmationMessage)) {
            $.ajax({
            url: '{{ route('adminUpdateStatusRole') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                roleId: roleId,
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