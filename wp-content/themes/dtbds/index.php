<?php get_header(); ?>

    <section id="one-parallax" class="parallax" style="background-image: url('<?= get_template_directory_uri() ?>/images/background.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="mapandslider">
            <div class="overlay1 dm-shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 main-custom-slide-container">
                            <div id="property-slider" class="clearfix">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <?php
                                        $projects = getProjects(5, 1, [
                                            'tax_query' => [
                                                'taxonomy' => 'mat-trang',
                                                'field' => 'slug',
                                                'terms' => 'noi-bat-trang-chu'
                                            ]
                                        ]);
                                        if ($projects) {
                                            while ($projects->have_posts()) {
                                                $projects->the_post();
                                                get_template_part('template-parts/project', 'item-6');
                                            }
                                        }
                                        ?>
                                    </ul><!-- end slides -->
                                </div><!-- end flexslider -->
                            </div><!-- end property-slider -->
                        </div><!-- end col-lg-8 -->
                    </div><!-- end row -->
                </div><!-- end dm_container -->
            </div>
        </div>
    </section><!-- end mapandslider -->

    <section id="three-parallax" class="parallax" style="display:none; background-image: url('<?= get_template_directory_uri() ?>/images/background.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="threewrapper">
            <div class="overlay1 dm-shadow">
                <div class="container">
                    <div class="row">
                        <div class="text-center clearfix">
                            <h3 class="big_title1"><?= pll__("Most Popular Properties") ?> <small><?= pll__("This week most admired properties") ?></small></h3>
                        </div>
                        <?php
                        $projects = getProjects(4);
                        if ($projects) {
                            while ($projects->have_posts()) {
                                $projects->the_post();
                                get_template_part('template-parts/project', 'item-3');
                            }
                        }
                        ?>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end overlay1 -->
        </div><!-- end threewrapper -->
    </section>

    <section class="generalwrapper dm-shadow clearfix">
        <div class="container">
            <div class="row">
                <div class="hidden-sm hidden-xs col-lg-2 col-md-3 first clearfix">
                    <?= get_template_part('template-parts/project', 'categories') ?>
                    <?php dynamic_sidebar('ads-homepage-1') ?>
                </div>
                <div class="col-lg-7 col-md-9 col-sm-12 clearfix">
                    <div id="tabbed_widget" class="tabbable clearfix">
                        <?php
                        $areas = get_terms("project-area", ['orderby' => 'count', 'limit' => 5, 'order' => 'DESC']);
                        if (!empty($areas)):
                            ?>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#prj-location-all"><?= pll__("All") ?></a></li>
                                <?php
                                foreach ($areas as $k => $area) {
                                    echo "<li><a data-toggle=\"tab\" href='#prj-location-".$area->slug."'>" . $area->name . "</a></li>";
                                }
                                ?>
                            </ul>
                        <?php endif; ?>
                        <div class="tab-content tabbed_widget clearfix">
                            <div class="tab-pane row active" id="prj-location-all">
                                <?php
                                $projects = getProjects(12);
                                if ($projects) {
                                    while ($projects->have_posts()) {
                                        $projects->the_post();
                                        get_template_part('template-parts/project', 'item-2');
                                    }
                                }
                                ?>
                            </div>

                            <?php
                                foreach($areas as $area):
                            ?>
                                <div class="tab-pane row" id="prj-location-<?= $area->slug ?>">
                                    <?php
                                    $projects = getProjects(9, 1, [
                                        'tax_query' => [
                                            [
                                                'taxonomy' => 'project-area',
                                                'field' => 'slug',
                                                'terms' => $area->slug
                                            ]
                                        ]
                                    ]);
                                    if ($projects) {
                                        while ($projects->have_posts()) {
                                            $projects->the_post();
                                            get_template_part('template-parts/project', 'item-2');
                                        }
                                    }
                                    ?>
                                </div>
                            <?php
                                endforeach;

                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12 last clearfix">

                    <?= get_template_part('template-parts/search', 'box') ?>
                    <?= get_template_part('template-parts/contact', 'box') ?>
                    <?php dynamic_sidebar('ads-homepage-2') ?>

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
                            <h3 class="big_title"><?= pll__("Agencies") ?> <small><?= pll__("Some real estate agencies working with us") ?></small></h3>
                        </div>
                        <div id="slider-agency" class="flexslider">
                            <ul class="slides">
                            <?php
                            $agencies = getAgencies(6);
                            if ($agencies) {
                                $count = 0;
                                while ($agencies->have_posts()) {
                                    if ($count % 2 == 0) {
                                        echo "<li>";
                                    }
                                    $agencies->the_post();
                                    get_template_part('template-parts/agency', 'item-1');

                                    if ($count % 2 != 0 || $count == ($agencies->post_count - 1)) {
                                        echo "</li>";
                                    }
                                    $count++;
                                }
                            }
                            ?>
                            </ul>
                        </div>
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
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <?php
                            $projects = getProjects(6);
                            if ($projects) {
                                while ($projects->have_posts()) {
                                    $projects->the_post();
                                    get_template_part('template-parts/project', 'item-4');
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider">
                        <ul class="slides">
                            <?php
                            $projects = getProjects(6);
                            if ($projects) {
                                while ($projects->have_posts()) {
                                    $projects->the_post();
                                    get_template_part('template-parts/project', 'item-5');
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-12">
                    <h3 class="big_title"><?= pll__("News") . " & " . pll__("Updates") ?> <small><?= pll__("The most popular real estate news") ?></small></h3>
                    <div class="row">
                    <?php
                    $news = getNews(2);
                    if ($news) {
                        while ($news->have_posts()) {
                            $news->the_post();
                            get_template_part('template-parts/news', 'item-1');
                        }
                    }
                    ?>
                    </div>
                </div><!-- end col7 -->
            </div><!-- end row -->
        </div><!-- end dm_container -->
    </section><!-- end secondwrapper -->


<?php
wp_reset_query();
?>
<?php get_footer(); ?>
