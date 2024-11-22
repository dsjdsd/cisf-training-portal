        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{ asset('all-view-assets/bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ asset('all-view-assets/bundles/vendorscripts.bundle.js') }}"></script>
        <!-- Jquery DataTable Plugin Js --> 
        <script src="assets/bundles/datatablescripts.bundle.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

        <script src="{{ asset('all-view-assets/bundles/jvectormap.bundle.js') }}"></script>
        <script src="{{ asset('all-view-assets/bundles/sparkline.bundle.js') }}"></script>
        <script src="{{ asset('all-view-assets/bundles/c3.bundle.js') }}"></script>
        <script src="{{ asset('all-view-assets/bundles/mainscripts.bundle.js') }}"></script>
         <!-- Jquery DataTable Plugin Js --> 
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
        <script src="{{ asset('all-view-assets/js/pages/index.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- Custom Js --> 
        <link rel="stylesheet" href="{{ asset('all-view-assets/custom/js/custom-js.js') }}" />
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
            @endif
        </script>
    </body>
</html>