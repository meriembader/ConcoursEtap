
<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 footer-widget footer-about">
                    <h3 class="widget-title">{{ __('traduction.A Propos') }}</h3>

                    <p>{{ __('traduction.enit presentation') }}</p>
                    <!-- Footer social end -->
                </div><!-- Col end -->

                <div class="col-md-4 col-sm-12 footer-widget">
    
                </div><!-- Col end -->

                <div class="col-md-4 col-sm-12 footer-widget">
                <h3 class="widget-title">{{ __('traduction.Nous Suivre') }}</h3>
                    <div class="footer-social">
                        <ul>
                            <li><a href="https://www.facebook.com// "><i class="fa fa-facebook"></i></a></li>
                            <li><a href=" https://www.linkedin.com//"><i class="fa fa-linkedin"></i></a></li>

                        </ul>
                    </div>
                    
                </div><!-- Col end -->


            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-md-12 text-center">
                     <span style="font-family:sans-serif;">{{ __('traduction.copyright') }}</span>
                    </div>
                </div>


            </div><!-- Row end -->


        </div><!-- Container end -->
    </div><!-- Copyright end -->

</footer><!-- Footer end -->


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @if (Session::has('sweet_alert.alert'))
    swal({!! Session::get('sweet_alert.alert') !!});
    @endif
</script>
