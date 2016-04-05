<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="boxes agencies_widget first">
        <div class="col-lg-3">
            <div class="image">
                <img class="img-responsive img-thumbnail" src="<?= get_the_post_thumbnail_url() ?>" alt="">
            </div><!-- end agencies img -->
        </div>
        <div class="col-lg-9">
            <div class="agencies_desc">
                <h3 class="title"><?= get_the_title() ?></h3>
                <p><?= wp_trim_words(get_the_excerpt(), 40) ?></p>
                <a href="<?= get_permalink() ?>" class="btn btn-primary btn-sm"><?= pll__("About Agency") ?></a>
            </div><!-- agencies_desc -->
        </div>
        <div class="clearfix" style="margin-bottom: 20px;"></div>
    </div><!-- end boxes -->
</div>