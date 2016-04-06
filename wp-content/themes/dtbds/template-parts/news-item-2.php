<div class="col-lg-6 col-md-6 col-sm-12">
    <article class="blog-wrap">
        <?php if ($thumbnail = get_the_post_thumbnail_url(get_the_ID(), "thumbnail")): ?>
            <div class="ImageWrapper blog-media">
                <img class="img-responsive" src="<?= $thumbnail ?>" alt="">
                <div class="ImageOverlayH"></div>
                <div class="Buttons StyleMg">
                    <span class="WhiteSquare"><a class="fancybox" href="<?= get_the_post_thumbnail_url(get_the_ID(), 'large') ?>"><i class="fa fa-search"></i></a></span>
                    <span class="WhiteSquare"><a href="<?= get_permalink() ?>"><i class="fa fa-link"></i></a></span>
                </div>
            </div><!-- end blog media -->
        <?php endif; ?>
        <div class="post-date">
            <span class="day"><?= get_the_date('d') ?></span>
            <span class="month"><?= get_the_date('M')?></span>
        </div><!-- end post-date -->

        <div class="post-content">
            <h2><a href="<?= get_permalink() ?>""><?= get_the_title() ?></a></h2>
            <p><?= wp_trim_words(get_the_content(), 30) ?></p>
            <div class="post-meta">
                <span><i class="fa fa-user"></i> <a href="javascript:;"><?= get_the_author() ?></a></span>
                <span><i class="fa fa-comments"></i> <a href="javascript:;"><?= wp_count_comments(get_the_ID())->approved ?> Comments</a></span>
            </div>
            <a href="<?= get_permalink() ?>" class="btn btn-primary btn-xs"><?= pll__("read more") ?></a>
        </div><!-- post-content -->
    </article><!-- end blog wrap -->
</div>