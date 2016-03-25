
<footer class="footer1">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 first clearfix">
                <div class="widget clearfix">
                    <div class="title"><h3>Site Links</h3><hr></div>
                    <ul class="list">
                        <li><a title="" href="demo-index.html#">Support</a></li>
                        <li><a title="" href="demo-index.html#">Get in touch</a></li>
                        <li><a title="" href="demo-index.html#">About us</a></li>
                        <li><a title="" href="demo-index.html#">Terms of use</a></li>
                        <li><a title="" href="demo-index.html#">Copyrights</a></li>
                        <li><a title="" href="demo-index.html#">Join us</a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-xs-12 clearfix">
                <div class="widget clearfix">
                    <div class="title"><h3><i class="fa fa-home"></i> About Estate+</h3><hr></div>
                    <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free.</p>
                    <a href="demo-index.html#" class="btn btn-primary btn-sm"><i class="fa fa-info"></i> read more</a>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-xs-12 clearfix">
                <div class="widget clearfix">
                    <div class="title"><h3>Twitter Stream</h3><hr></div>
                    <ul class="tweet">
                        <li><a title="" href="demo-index.html#">@support</a> Latin words, combined with sentence structures, to generate Lorem Ipsum which looks reasonable.
                            <small><a href="demo-index.html#">12 Minutes Ago</a></small>
                        </li>
                        <li><a title="" href="demo-index.html#">@designingmedia</a> To generate Lorem Ipsum which looks reasonable.
                            <small><a href="demo-index.html#">34 Minutes Ago</a></small>
                        </li>
                    </ul>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 last clearfix">
                <div class="widget clearfix">
                    <div class="title"><h3><i class="fa fa-envelope-o"></i> Newsletter Form</h3><hr></div>
                    <p>Latin words, combined with a handful of model sentence structures, to generate.</p>
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                        <button type="submit" class="btn btn-primary">SUBSCRIBE</button>
                    </form>
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- row -->
    </div><!-- container -->
</footer><!-- footer1 -->

<section class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6">
                <p><small>Estate+ a real estate template. Copyright 2014</small>
                    Preferred Hosting Partner - <a href="https://misshosting.com/hosting/" target="_blank">MissHosting.com,</a> Web Hosting at 1.00€ per month!</p>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="social clearfix pull-right">
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Twitter" title="" href="demo-index.html#"><i class="fa fa-twitter"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Facebook" title="" href="demo-index.html#"><i class="fa fa-facebook"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Google Plus" title="" href="demo-index.html#"><i class="fa fa-google-plus"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Linkedin" title="" href="demo-index.html#"><i class="fa fa-linkedin"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Github" title="" href="demo-index.html#"><i class="fa fa-github"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Pinterest" title="" href="demo-index.html#"><i class="fa fa-pinterest"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="RSS" title="" href="demo-index.html#"><i class="fa fa-rss"></i></a></span>
                </div><!-- end social -->
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end copyright -->

<!-- Bootstrap core and JavaScript's
================================================== -->
<script src="<?= get_template_directory_uri() ?>/js/jquery-1.10.2.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/bootstrap.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/jquery.parallax.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/jquery.fitvids.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/jquery.unveilEffects.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/retina-1.1.0.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/fhmm.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/bootstrap-select.js"></script>
<script src="<?= get_template_directory_uri() ?>/fancyBox/jquery.fancybox.pack.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/application.js"></script>

<!-- FlexSlider JavaScript
================================================== -->
<script src="<?= get_template_directory_uri() ?>/js/jquery.flexslider.js"></script>
<script>
    $(window).load(function() {
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: true,
            directionNav: false,
            animationLoop: true,
            slideshow: true,
            itemWidth: 114,
            itemMargin: 0,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: false,
            slideshow: true,
            sync: "#carousel"
        });

        $('#property-slider .flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 6000,
            animationSpeed:	1300,
            directionNav: true,
            controlNav: false,
            keyboardNav: true
        });
    });
</script>
<?= wp_footer() ?>
</body>
</html>
