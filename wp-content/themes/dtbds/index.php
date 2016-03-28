<?php get_header(); ?>

    <section id="three-parallax" class="parallax" style="background-image: url('<?= get_template_directory_uri() ?>/images/background.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
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
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 first clearfix">
                    <?= get_template_part('template-parts/project', 'categories') ?>
                    <?= get_template_part('template-parts/banner', 'ads-3') ?>
                </div>
                <div class="col-lg-7 col-md-9 col-sm-9 col-xs-12 clearfix">
                    <div id="tabbed_widget" class="tabbable clearfix">
                        <?php
                        $areas = get_terms("project-area", 'order=DESC');
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
                            <div class="tab-pane active" id="prj-location-all">
                                <?php
                                $projects = getProjects(9);
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
                                <div class="tab-pane" id="prj-location-<?= $area->slug ?>">
                                    <?php
                                    $projects = getProjects(9, 1, [
                                        'tax_query' => [
                                            [
                                                'taxonomy' => 'project-status',
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

                    <?= get_template_part('template-parts/banner', 'ads-2') ?>

                    <?= get_template_part('template-parts/banner', 'ads-4') ?>

                    <?= get_template_part('template-parts/banner', 'ads-4') ?>

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
                        <?php
                        $agencies = getAgencies(2);
                        if ($agencies) {
                            while ($agencies->have_posts()) {
                                $agencies->the_post();
                                get_template_part('template-parts/agency', 'item-1');
                            }
                        }
                        ?>
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
                    <?php
                    $news = getNews(2);
                    if ($news) {
                        while ($news->have_posts()) {
                            $news->the_post();
                            get_template_part('template-parts/news', 'item-1');
                        }
                    }
                    ?>
                </div><!-- end col7 -->
            </div><!-- end row -->
        </div><!-- end dm_container -->
    </section><!-- end secondwrapper -->

<?php
wp_reset_query();
?>
<?php get_footer(); ?>
