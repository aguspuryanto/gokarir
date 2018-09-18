        
        <!-- Include the footer -->
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Connect With Us</h3>
                        <div class="clearfix padding-vert-10">
                            <ul class="tags list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/almsaeedstudio/"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="https://twitter.com/ThemeQuarry"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="https://themequarry.com/contact"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <h3>Newsletter</h3>
                        
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <h3>Quick Links</h3>
                        <ul class="list-inline links">
                            <li class="list-inline-item"><a href="/">Home</a></li>
                            <li class="list-inline-item"><a href="/become-a-seller">Become a seller</a></li>
                            <li class="list-inline-item"><a href="/submission-guideline">Submission Guideline</a></li>
                            <li class="list-inline-item"><a href="/faq">FAQ</a></li>
                            <li class="list-inline-item"><a href="/privacy-policy">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="/terms-of-use">Terms of use</a></li>
                            <li class="list-inline-item"><a href="/licenses-details">Licenses details</a></li>
                        </ul>
                    </div><!-- /.col -->
                    <div class="col-md-12 text-center mt-2">
                        Copyright &copy; 2016-2017 <a href="/">ThemeQuarry Marketplace</a> by <a href="https://almsaeedstudio.com">Almsaeed Studio</a>.
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-footer -->
    </div>

    <div class="overlay"></div>

    <?php wp_footer(); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>