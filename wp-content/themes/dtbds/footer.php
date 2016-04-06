<?php $contactData = wp_cache_get('contact-data'); ?>
<section class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6">
                <p>
                    <small>COPYRIGHT <?= date("Y") ?>. Website DauTuBatDongSan.com.vn</small>
                    <a href="<?= pll_home_url() ?>lien-he" target="_blank"><?= pll__("Get in touch with us") ?></a> -
                    <a href="<?= pll_home_url() ?>term-of-use" target="_blank"><?= pll__("Term of use") ?></a> -
                    <a href="<?= pll_home_url() ?>lien-he" target="_blank"><?= pll__("About us") ?></a>
                </p>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="social clearfix pull-right">
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Facebook" title="" href="<?= $contactData['facebook'] ?>"><i class="fa fa-facebook"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Google Plus" title="" href="<?= $contactData['google-plus'] ?>"><i class="fa fa-google-plus"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="RSS" title="" href="<?= $contactData['rss'] ?>"><i class="fa fa-rss"></i></a></span>
                </div><!-- end social -->
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end copyright -->

<!-- Bootstrap core and JavaScript's
================================================== -->
<script src="<?= get_template_directory_uri() ?>/js/jquery-1.10.2.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/bootstrap.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/jquery.parallax.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/jquery.fitvids.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/fhmm.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/fancyBox/jquery.fancybox.pack.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/application.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/jquery.flexslider.min.js"></script>
<script>
    $(window).load(function() {
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: true,
            directionNav: false,
            animationLoop: true,
            slideshow: false,
            itemWidth: 114,
            itemMargin: 0,
            asNavFor: '#slider'
        });

        $('#slider-agency').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
        });

        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });

        $('#property-slider .flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 6000,
            animationSpeed:	1300,
            directionNav: true,
            controlNav: false,
            keyboardNav: true,
            slideshow: true,
        });

        $('#accordion_project_information').on('shown.bs.collapse', function () {
            var panel = $(this).find('.in');
            $('html, body').animate({
                scrollTop: panel.offset().top - 95
            }, 200);
        });

    });
</script>
<?= wp_footer() ?>
</body>
</html>
