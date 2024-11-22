        <script src="{{ asset('all-view-assets/bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ asset('all-view-assets/bundles/vendorscripts.bundle.js') }}"></script>
        <!-- Jquery DataTable Plugin Js --> 
        <script src="{{ asset('all-view-assets/bundles/datatablescripts.bundle.js')}}"></script>
        <script src="{{asset('all-view-assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
        <script src="{{asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
        <script src="{{ asset('all-view-assets/bundles/jvectormap.bundle.js') }}"></script>
        <script src="{{ asset('all-view-assets/bundles/sparkline.bundle.js') }}"></script>
        <script src="{{ asset('all-view-assets/bundles/c3.bundle.js') }}"></script>
        <script src="{{ asset('all-view-assets/bundles/mainscripts.bundle.js') }}"></script>
         <!-- Jquery DataTablesss Pluginss Js --> 
        <script src="{{ asset('all-view-assets/js/pages/tables/jquery-datatable.js')}}"></script>
        <script src="{{ asset('all-view-assets/js/pages/index.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <!-- Custom Js --> 
        <link rel="stylesheet" href="{{ asset('all-view-assets/custom/js/custom-js.js') }}" />
        <script src="{{ asset('all-view-assets/plugins/summernote/dist/summernote.js')}}"></script>
        <!-- Toastr JS -->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
            @endif
            
            @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
            @endif
            
            @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
            @endif
            
            @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
            @endif
            </script>
    </body>
</html>