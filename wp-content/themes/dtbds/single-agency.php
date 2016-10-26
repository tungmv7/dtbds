<?php
get_header(); ?>
<?php
while(have_posts()): the_post();
?>
    <?= get_template_part_with_vars('template-parts/breadcrumb', null,
        ['items' => getBreadcrumbItems("news-detail")]
    ) ?>
    <section class="generalwrapper dm-shadow clearfix">
        <div class="container">
            <div class="row">
                <div id="left_sidebar" class="hidden-sm hidden-xs col-lg-2 col-md-3 first clearfix">
                    <?= get_template_part('template-parts/project', 'categories') ?>
                    <?php dynamic_sidebar('ads-content-1') ?>
                </div><!-- #left_sidebar -->

                <div id="content" class="col-lg-7 col-md-6 col-sm-6 col-xs-12 clearfix">
                    <div class="agent_boxes boxes clearfix">
                        <div class="agent_details clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="agents_widget">
                                    <h3 class="big_title"><?= get_the_title() ?></h3>
                                    <div class="">
                                        <div style="float: left; margin: 0 1em 0 0; max-width: 15em;">
                                            <img style="margin-top: 0;" class="img-thumbnail img-responsive" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                                        </div>
                                        <div><?= get_the_content() ?></div>
                                    </div><!-- end agencies_widget -->
                                </div><!-- agents_widget -->
                            </div><!-- end col-lg-7 -->
                        </div><!-- end agent_details -->
                    </div><!-- end agent_boxes -->

                    <div class="property_wrapper boxes clearfix">
                        <h3 class="big_title"><?= pll__("Recent Properties") ?><small><?= pll__("View other properties from this agency")?></small></h3>
                        <div class="row">

                            <?php
                            $projects = getProjects(18, 1, [
                                'meta_query' => [
                                    [
                                        'key' => 'project_agency_information',
                                        'value' => '"' . get_the_ID() . '"',
                                        'compare' => 'LIKE'
                                    ]
                                ]
                            ]);
                            while ($projects->have_posts()) {
                                $projects->the_post();
                                get_template_part('template-parts/project', 'item-1');
                            };
                            ?>
                        </div><!-- end row -->
                    </div>
                </div>

                <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 sticky-col last clearfix">
                    <?= get_sidebar() ?>
                </div><!-- end sidebar -->

            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end generalwrapper -->

    <?php
endwhile;
?>
<?php get_footer(); ?>
