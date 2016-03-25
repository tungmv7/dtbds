<?php get_header(); ?>

    <section id="three-parallax" class="parallax" style="background-image: url('<?= get_template_directory_uri() ?>/images/background.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="threewrapper">
            <div class="overlay1 dm-shadow">
                <div class="container">
                    <div class="row">
                        <div class="text-center clearfix">
                            <h3 class="big_title1"><?= pll__("Most Popular Properties") ?> <small><?= pll__("This week most admired properties") ?></small></h3>
                        </div>
                        <?= get_template_part('template-parts/project', 'home-featured') ?>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end overlay1 -->
        </div><!-- end threewrapper -->
    </section>

    <section class="generalwrapper dm-shadow clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 first clearfix">
                    <?= get_template_part('template-parts/project', 'categories') ?>
                </div>

                <div class="col-lg-7 col-md-9 col-sm-9 col-xs-12 clearfix">
                    <?= get_template_part('template-parts/project', 'home-items') ?>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12 last clearfix">

                    <?= get_template_part('template-parts/search', 'box') ?>

                    <?= get_template_part('template-parts/banner', 'ads-2') ?>

                    <?= get_template_part('template-parts/banner', 'ads-2') ?>

                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end dm_container -->
    </section><!-- end generalwrapper -->

    <section id="two-parallax" class="parallax" style="background-image: url('<?= get_template_directory_uri() ?>/images/background.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="threewrapper">
            <div class="overlay1 dm-shadow">
                <div class="container">
                    <div class="row">
                        <div class="text-center clearfix">
                            <h3 class="big_title">Agencies <small>Some real estate agencies working with us</small></h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="boxes agencies_widget first" data-effect="slide-bottom">
                                <div class="col-lg-3">
                                    <div class="image">
                                        <img class="img-responsive img-thumbnail" src="demos/agencies_logo.png" alt="">
                                    </div><!-- end agencies img -->
                                </div>
                                <div class="col-lg-9">
                                    <div class="agencies_desc">
                                        <h3 class="title">NYC Real Estate Group</h3>
                                        <p>Vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm...</p>
                                        <a href="demo-index.html#" class="btn btn-primary btn-sm">About Agencie</a> <a href="demo-index.html#" class="btn btn-primary btn-sm">Assigned Properties</a>

                                    </div><!-- agencies_desc -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="agencies_meta">
                                    <span><i class="fa fa-envelope"></i> <a href="mailto:support@sitename.com">support@sitename.com</a></span>
                                    <span><i class="fa fa-link"></i> <a href="demo-index.html#">www.sitename.com</a></span>
                                    <span><i class="fa fa-phone-square"></i> +1 232 444 55 66</span>
                                </div><!-- end agencies_meta -->
                            </div><!-- end boxes -->
                        </div><!-- end col-6 -->

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-effect="slide-bottom">
                            <div class="boxes agencies_widget last">
                                <div class="col-lg-3">
                                    <div class="image">
                                        <img class="img-responsive img-thumbnail" src="demos/agencies_logo.png" alt="">
                                    </div><!-- end agencies img -->
                                </div>
                                <div class="col-lg-9">
                                    <div class="agencies_desc">
                                        <h3 class="title">Istanbul Real Estate</h3>
                                        <p>Vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm...</p>
                                        <a href="demo-index.html#" class="btn btn-primary btn-sm">About Agencie</a> <a href="demo-index.html#" class="btn btn-primary btn-sm">Assigned Properties</a>

                                    </div><!-- agencies_desc -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="agencies_meta">
                                    <span><i class="fa fa-envelope"></i> <a href="mailto:support@sitename.com">support@sitename.com</a></span>
                                    <span><i class="fa fa-link"></i> <a href="demo-index.html#">www.sitename.com</a></span>
                                    <span><i class="fa fa-phone-square"></i> +1 232 444 55 66</span>
                                </div><!-- end agencies_meta -->
                            </div><!-- end boxes -->
                        </div><!-- end col-6 -->
                    </div>
                </div><!-- end container -->
            </div><!-- end overlay1 -->
        </div><!-- end threewrapper -->
    </section><!-- end parallax -->

    <section class="secondwrapper dm-shadow clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h3 class="big_title"><?= pll__("Recent Properties") ?> <small><?= pll__("Handpicked Properties for you") ?></small></h3>
                    <?php $carousel = []; ?>
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <?php
                            $type = 'du-an';
                            $args = array(
                                'post_type' => $type,
                                'post_status' => 'publish',
                                'posts_per_page' => 6,
                                'caller_get_posts' => 1
                            );
                            $my_query = null;
                            $my_query = new WP_Query($args);
                            if ($my_query->have_posts()):
                                $count = 1;
                                while ($my_query->have_posts()) : $my_query->the_post();
                                    $thumbnail = isset(get_field("project_gallery")[0]['sizes']['thumbnail']) ? get_field("project_gallery")[0]['sizes']['thumbnail'] : false;
                                    $image = isset(get_field("project_gallery")[0]['sizes']['large']) ? get_field("project_gallery")[0]['sizes']['large'] : false;
                                    $type = isset(wp_get_post_terms(get_the_ID(), 'project-type')[0]) ? wp_get_post_terms(get_the_ID(), 'project-type')[0] : '';
                                    $status = isset(wp_get_post_terms(get_the_ID(), 'project-status')[0]) ? wp_get_post_terms(get_the_ID(), 'project-status')[0] : '';
                                    $price = get_field("project_price_information");
                                    $price = is_numeric($price) ? number_format($price, 0, ",", ".") . " đ" : $price;
                                    if ($thumbnail): ?>
                                        <li>
                                            <div class="ps-mini-desc">
                                                <span class="type"><?= $type->name ?></span>
                                                <span class="price"><?= $price ?></span>
                                                <a href="#" class="status"><?= $status->name ?></a>
                                            </div>
                                            <img class="img-thumbnail" src="<?= $thumbnail ?>" alt="">
                                        </li>
                                        <?php
                                        $carousel[] = "<li><img class=\"img-thumbnail\" src=\"".$thumbnail."\" alt=\"\"></li>";
                                    endif;
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider">
                        <ul class="slides">
                            <?= implode("", $carousel) ?>
                        </ul>
                    </div>
                </div><!-- end col6 -->

                <div class="col-lg-7 col-md-7 col-sm-12">
                    <h3 class="big_title">News & Updates <small>The most popular real estate news</small></h3>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <article class="blog-wrap">
                            <div class="blog-media">
                                <iframe src="http://player.vimeo.com/video/73221098?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div><!-- end blog media -->
                            <div class="post-date">
                                <span class="day">01</span>
                                <span class="month">Feb</span>
                            </div><!-- end post-date -->

                            <div class="post-content">
                                <h2><a href="single-blog.html">New York City 124/56 for Sale!</a></h2>
                                <p>Er zijn vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel.</p>
                                <div class="post-meta">
                                    <span><i class="fa fa-user"></i> <a href="demo-index.html#">John Doe</a> </span>
                                    <span><i class="fa fa-tag"></i> <a href="demo-index.html#">Video</a> </span>
                                    <span><i class="fa fa-comments"></i> <a href="demo-index.html#">1 Comments</a></span>
                                </div><!-- end post-meta -->
                                <a href="single-blog.html" class="btn btn-primary btn-xs">read more</a>
                            </div><!-- post-content -->
                        </article><!-- end blog wrap -->
                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <article class="blog-wrap">
                            <div class="blog-media">
                                <iframe src="http://player.vimeo.com/video/64550407?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div><!-- end blog media -->
                            <div class="post-date">
                                <span class="day">12</span>
                                <span class="month">Jan</span>
                            </div><!-- end post-date -->

                            <div class="post-content">
                                <h2><a href="single-blog.html">Estate+ video presentation</a></h2>
                                <p>Er zijn vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel.</p>
                                <div class="post-meta">
                                    <span><i class="fa fa-user"></i> <a href="demo-index.html#">Mark Doe</a> </span>
                                    <span><i class="fa fa-tag"></i> <a href="demo-index.html#">Video</a> </span>
                                    <span><i class="fa fa-comments"></i> <a href="demo-index.html#">11 Comments</a></span>
                                </div><!-- end post-meta -->
                                <a href="single-blog.html" class="btn btn-primary btn-xs">read more</a>
                            </div><!-- post-content -->
                        </article><!-- end blog wrap -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end col7 -->
            </div><!-- end row -->
        </div><!-- end dm_container -->
    </section><!-- end secondwrapper -->

<?php
wp_reset_query();
?>
<?php get_footer(); ?>
