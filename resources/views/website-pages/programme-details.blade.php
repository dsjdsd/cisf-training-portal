@include('website-pages.common-layout.header')
        <div class="authentication">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <form class="card auth_form">
                            <div class="header">
                                <img class="logo" src="{{ asset('all-view-assets/images/logo.svg') }}" alt="">
                                <h5>The General Shutdown</h5>
                                <span>Maintenance or not?</span>
                            </div>
                            <div class="body">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                                    </div>
                                </div>
                                <a href="index.html" class="btn btn-primary btn-block waves-effect waves-light">GO TO HOMEPAGE</a>                        
                                <div class="signin_with mt-3">
                                    <a href="javascript:void(0);" class="link">Need Help?</a>
                                </div>
                            </div>
                        </form>
                        <div class="copyright text-center">
                            &copy;
                            <script>document.write(new Date().getFullYear())</script>,
                            <span><a href="templatespoint.net">Templates Point</a></span>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <img src="{{ asset('all-view-assets/images/maintanance.svg') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('website-pages.common-layout.footer')