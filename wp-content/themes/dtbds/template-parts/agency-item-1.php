<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="boxes agencies_widget first" data-effect="slide-bottom">
        <div class="col-lg-3">
            <div class="image">
                <img class="img-responsive img-thumbnail" src="<?= get_the_post_thumbnail_url() ?>" alt="">
            </div><!-- end agencies img -->
        </div>
        <div class="col-lg-9">
            <div class="agencies_desc">
                <h3 class="title"><?= get_the_title() ?></h3>
                <p><?= get_the_excerpt() ?></p>
                <a href="<?= get_permalink() ?>" class="btn btn-primary btn-sm"><?= pll__("About Agency") ?></a>

            </div><!-- agencies_desc -->
        </div>
        <div class="clearfix"></div>
        <div class="agencies_meta">
            <span><i class="fa fa-envelope"></i> <a href="mailto:<?= get_field("agency_email") ?>"><?= get_field("agency_email") ?></a></span>
            <span><i class="fa fa-link"></i> <a href="<?= get_field("agency_website") ?>" target="_blank"><?= get_field("agency_website") ?></a></span>
            <span><i class="fa fa-phone-square"></i> <?= get_field("agency_phone") ?></span>
        </div><!-- end agencies_meta -->
    </div><!-- end boxes -->
</div>